<?php
namespace app\Controller;
require_once $_SERVER['DOCUMENT_ROOT'] . getenv('folderName');

use app\Model\Estoque;
use app\Model\GeneroLivro;
use app\Model\Imagem;
use app\Model\Livro;
use app\DAO\AutorDAO as AutorDAO;
use app\DAO\ClassificacaoDAO as ClassificacaoDAO;
use app\DAO\EditoraDAO as EditoraDAO;
use app\DAO\EstoqueDAO as EstoqueDAO;
use app\DAO\GeneroLiterarioDAO as GeneroLiterarioDAO;
use app\DAO\GeneroLivroDAO as GeneroLivroDAO;
use app\DAO\ImagemDAO as ImagemDAO;
use app\DAO\LivroDAO as LivroDAO;
use ConnectDB;
$d = filter_input_array(INPUT_POST);

class ControllerLivro
{
  private $livro;
  public function __construct()
  {
    $this->livro = new Livro();
  }
  public function Cadastrar($autor, $editora, $titulo, $genero, $classificacao, $lancamento, $edicao, $paginas, $estoque, $descricao, $isbn)
  {
    $generoLivro = new GeneroLivro();
    $livroDao = new LivroDAO();
    $autorDao = new AutorDAO();
    $editoraDao = new EditoraDAO();
    $classificacaoDAO = new ClassificacaoDAO();
    $imagemDao = new ImagemDAO();
    $estoqueDao = new EstoqueDAO();
    $generoDao = new GeneroLiterarioDAO();
    $generoLivroDao = new GeneroLivroDAO();
    $autorModel = $autorDao->getOrInsertAutor($autor);
    $editoraModel = $editoraDao->getOrInsertEditora($editora);
    $generoModel = $generoDao->getOrInsertGeneroLiterario($genero);
    $classificacaoModel = $classificacaoDAO->getClassificacaoByDescricao($classificacao);
    if (isset($_FILES['imagem'])) {
      $file = $_FILES['imagem']['tmp_name'];
      $tamanho = $_FILES['imagem']['size'];
      $tipo = $_FILES['imagem']['type'];
      $filenome = $_FILES['imagem']['name'];

      if ($file) {
        $fp = fopen($file, "rb");
        $conteudo = fread($fp, $tamanho);
        $conteudo = addslashes($conteudo);
        fclose($fp);
        $imagem = new Imagem();
        $imagem->setNome($filenome);
        $imagem->setData($conteudo);
        $imagem->setTamanho($tamanho);
        $imagem->setTipo($tipo);

        $imagemDao->insertImagem($imagem);
        $imagemModel = $imagemDao->getImagemById(ConnectDB::getConexao()->lastInsertId());
        $this->livro->setImagem($imagemModel);
        print_r($imagemModel);

        $target_dir = __DIR__ . '/../../assets/img/livros/';
        $target_file = $target_dir . basename($filenome);
        move_uploaded_file($file, $target_file);
      } else {
        $imagemModel = $imagemDao->getImagemById(1);
        $this->livro->setImagem($imagemModel);
      }
    } else {
      $imagemModel = $imagemDao->getImagemById(1);
      $this->livro->setImagem($imagemModel);
    }

    $estoqueModel = new Estoque();
    $estoqueModel->setQuantidade($estoque);
    $estoqueModel->getId();
    $estoqueModel->setEmUso(0);
    $estoqueDao->insertEstoque($estoqueModel);
    $estoqueModel = $estoqueDao->getEstoqueById(ConnectDB::getConexao()->lastInsertId());

    $this->livro->setClassificacao($classificacaoModel);
    $this->livro->setTitulo($titulo);
    $this->livro->setDescricao($descricao);
    $this->livro->setAutor($autorModel);
    $this->livro->setEditora($editoraModel);
    $this->livro->setLancamento($lancamento);
    $this->livro->setEdicao($edicao);
    $this->livro->setPaginas($paginas);
    $this->livro->setEstoque($estoqueModel);
    $this->livro->setGeneroLivro($generoModel);
    $this->livro->setImagem($imagemModel);
    $this->livro->setIsbn($isbn);
    $livroDao->insertLivro($this->livro);
    $this->livro = $livroDao->getLivroById(ConnectDB::getConexao()->lastInsertId());

    $generoLivro->setFkGenero($generoModel);
    $generoLivro->setFkLivro($this->livro);
    $generoLivroDao->insertGeneroLivro($generoLivro);
  }
  public function Update($idLivro, $autor, $editora, $titulo, $genero, $classificacao, $lancamento, $edicao, $paginas, $estoque, $emUso, $descricao, $isbn)
  {
    $generoLivro = new GeneroLivro();
    $livroDao = new LivroDAO();
    $autorDao = new AutorDAO();
    $editoraDao = new EditoraDAO();
    $classificacaoDAO = new ClassificacaoDAO();
    $imagemDao = new ImagemDAO();
    $estoqueDao = new EstoqueDAO();
    $generoDao = new GeneroLiterarioDAO();
    $generoLivroDao = new GeneroLivroDAO();
    $autorModel = $autorDao->getOrInsertAutor($autor);
    $editoraModel = $editoraDao->getOrInsertEditora($editora);
    $generoModel = $generoDao->getOrInsertGeneroLiterario($genero);
    print_r($generoModel);
    $classificacaoModel = $classificacaoDAO->getClassificacaoByDescricao($classificacao);
    $this->livro = $livroDao->getLivroById($idLivro);
    if (isset($_FILES['imagem'])) {
      $file = $_FILES['imagem']['tmp_name'];
      $tamanho = $_FILES['imagem']['size'];
      $tipo = $_FILES['imagem']['type'];
      $filenome = $_FILES['imagem']['name'];

      if ($file) {
        $fp = fopen($file, "rb");
        $conteudo = fread($fp, $tamanho);
        $conteudo = addslashes($conteudo);
        fclose($fp);
        $imagem = new Imagem();
        $imagem->setNome($filenome);
        $imagem->setData($conteudo);
        $imagem->setTamanho($tamanho);
        $imagem->setTipo($tipo);

        $imagemDao->insertImagem($imagem);
        $imagemModel = $imagemDao->getImagemById(ConnectDB::getConexao()->lastInsertId());
        $this->livro->setImagem($imagemModel);

        $target_dir = __DIR__ . '/../../assets/img/livros/';
        $target_file = $target_dir . basename($filenome);
        move_uploaded_file($file, $target_file);
      } else {
        $imagemModel = $imagemDao->getImagemById($this->livro->getImagem());
        $this->livro->setImagem($imagemModel);
      }
    } else {
      $imagemModel = $imagemDao->getImagemById($this->livro->getImagem());
      $this->livro->setImagem($imagemModel);
    }

    $estoqueModel = $estoqueDao->getEstoqueById($this->livro->getEstoque());
    $estoqueModel->setQuantidade($estoque);
    $estoqueModel->setEmUso($emUso);
    if ($estoqueModel->getEmUso() > $estoqueModel->getQuantidade()) {
      $estoqueModel->setEmUso($estoqueModel->getQuantidade());
    }
    
    $estoqueModel = $estoqueDao->updateEstoque($estoqueModel);
    print_r($estoqueModel);
    $this->livro->setClassificacao($classificacaoModel);
    $this->livro->setTitulo($titulo);
    $this->livro->setAutor($autorModel);
    $this->livro->setEditora($editoraModel);
    $this->livro->setLancamento($lancamento);
    $this->livro->setEdicao($edicao);
    $this->livro->setDescricao($descricao);
    $this->livro->setPaginas($paginas);
    $this->livro->setGeneroLivro($generoModel);
    $this->livro->setImagem($imagemModel);
    $this->livro->setIsbn($isbn);
    $livroDao->updateLivro($this->livro);
    $generoLivroDao->updateGeneroLivroByLivro($this->livro->getId(), $this->livro->getGeneroLivro()->getId());
    $this->livro = $livroDao->getLivroById(ConnectDB::getConexao()->lastInsertId());

  }
}

$controllerLivro = new ControllerLivro();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['cadastrar'])) {
    $descricao = $d['descricao'];
    $classificacao = $d['classificacao'];
    $titulo = $d['titulo'];
    $autor = $d['autor'];
    $editora = $d['editora'];
    $genero = $d['genero'];
    $edicao = $d['edicao'];
    $paginas = $d['paginas'];
    $lancamento = $d['lancamento'];
    $isbn = $d['isbn'];
    $estoque = $d['estoque'];

    $controllerLivro->Cadastrar($autor, $editora, $titulo, $genero, $classificacao, $lancamento, $edicao, $paginas, $estoque, $descricao, $isbn);

    header('Location: ' . mainFolder);
    exit();
  } elseif (isset($_POST['update'])) {
    $idLivro = $d['idLivro'];
    $classificacao = $d['classificacao'];
    $titulo = $d['titulo'];
    $descricao = $d['descricao'];
    $autor = $d['autor'];
    $editora = $d['editora'];
    $genero = $d['genero'];
    $edicao = $d['edicao'];
    $paginas = $d['paginas'];
    $lancamento = $d['lancamento'];
    $estoque = $d['estoque'];
    $emuso = $d['emuso'];
    $isbn = $d['isbn'];
    $controllerLivro->Update($idLivro, $autor, $editora, $titulo, $genero, $classificacao, $lancamento, $edicao, $paginas, $estoque, $emuso, $descricao, $isbn);

    header('Location: ' . mainFolder . viewFolder . 'Livro');
    exit();
  }
}
