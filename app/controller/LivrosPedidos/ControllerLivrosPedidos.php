<?php
namespace app\Controller;
require_once $_SERVER['DOCUMENT_ROOT'] . getenv('folderName');

use app\Model\LivrosPedidos;
use app\DAO\LivrosPedidosDAO;
use app\Model\Livro;
use app\DAO\LivroDAO;
use app\Model\Usuario;
use app\DAO\UsuarioDAO;
use app\Model\Estoque;
use app\DAO\EstoqueDAO;
$d = filter_input_array(INPUT_POST);

class ControllerLivrosPedidos
{
  public function __construct()
  {
  }
  public function Agendar($fkUsuario, $fkLivro, $retirada, $devolucao)
  {
    if (isset($fkUsuario)) {
      $livroPedido = new LivrosPedidos();
      $livroPedidoDAO = new LivrosPedidosDAO();
      $usuario = new Usuario();
      $usuarioDAO = new UsuarioDAO();
      $usuario = $usuarioDAO->getUserById($fkUsuario);
      $livroDAO = new LivroDAO();
      $livro = new Livro();
      $livro = $livroDAO->getLivroById($fkLivro);
      $current_datetime = date("Y-m-d-h-i-s");
      $livroPedido->setFkUsuario($usuario);
      $livroPedido->setFkLivro($livro);
      $livroPedido->setDataPedido($current_datetime);
      $livroPedido->setDataRetirada($retirada);
      $livroPedido->setDataDevolucao($devolucao);
      $livroPedido->setIsEmUso(0);
      $livroPedidoDAO->insertLivrosPedidos($livroPedido);

      //setting up estoque now

      $estoque = new Estoque();
      $estoqueDAO = new EstoqueDAO();

      $estoque = $estoqueDAO->getEstoqueById($livro->getEstoque());
      
      if ($estoque->getEmUso() > $estoque->getQuantidade()) {
        $estoque->setEmUso($estoque->getQuantidade());
      } else {
        $estoque->setEmUso($estoque->getEmUso() + 1);
      }
      print_r($estoque);
      $estoqueDAO->updateEstoque($estoque);

    }

  }
  public function Delete($pk){
    $livroAgendadoDAO = new LivrosPedidosDAO();
    $livroAgendado = new LivrosPedidos();
    $livroAgendado = $livroAgendadoDAO->getLivroPedidoById($pk);
    $livroAgendadoDAO->deleteLivroPedido($pk);
    $livro = new Livro();
    $livroDAO = new LivroDAO();
    $livro = $livroDAO->getLivroById($livroAgendado->getFkLivro());
    $estoqueDao = new EstoqueDAO();
    $estoque = new Estoque();
    $estoque = $estoqueDao->getEstoqueById($livro->getEstoque());
    $estoque->setEmUso($estoque->getEmUso() - 1);
    $estoqueDao->updateEstoque($estoque);
  }
  public function Update($pkLivro,$pedido,$retirada,$devolucao, $isEmuso)
  {
    if (isset($pkLivro)) {
      $livroPedidoDAO = new LivrosPedidosDAO();
      $livroPedido = new LivrosPedidos();
      $livroPedido->setId($pkLivro);
      
      $livroPedido = $livroPedidoDAO->getLivroPedidoById($pkLivro);
      echo $livroPedido->getDataRetirada();
      $livroPedido->setDataRetirada($retirada ?: $livroPedido->getDataRetirada());
      $livroPedido->setDataPedido($pedido ?: $livroPedido->getDataPedido());
      $livroPedido->setDataDevolucao($devolucao ?: $livroPedido->getDataDevolucao());
      $livroPedido->setIsEmUso($isEmuso ?:  0);
      print_r($livroPedido);
    
      $livroPedidoDAO->updateLivrosPedidos($livroPedido);
    }
  }
}

$controller = new ControllerLivrosPedidos();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['agendar'])) {
    echo "agendamento";
    $controller->Agendar($d['fkUsuario'], $d['fkLivro'], $d['retirada'], $d['devolucao']);
    header('Location: ' . mainFolder . viewFolder . 'Perfil/MeusLivros');
    exit();
  } elseif(isset($_POST['Delete'])) {
    echo "deletando";
    $controller->Delete($d['pkLivro']);
    header('Location: ' . mainFolder . viewFolder . 'Livro');
    exit();
  } elseif(isset($_POST['Confirm'])){
    echo "confirmando";
    $pkLivro = $d['pkLivro'];
    $pedido = isset($d['dataPedido']) ? $d['dataPedido'] : null;
    $retirada = isset($d['dataRetirada']) ? $d['dataRetirada'] : null;
    $devolucao = isset($d['dataDevolucao']) ? $d['dataDevolucao'] : null;
    $isEmuso = 1;
    $controller->Update($pkLivro, $pedido,$retirada, $devolucao, $isEmuso);
    header('Location: ' . mainFolder);
    exit();
  }
}