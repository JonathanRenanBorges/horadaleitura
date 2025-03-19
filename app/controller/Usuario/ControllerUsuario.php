<?php

namespace app\Controller;

use app\DAO\ImagemDAO;
use app\Model\Carrinho;
use ConnectDB;
use PDO;

$server = $_SERVER['DOCUMENT_ROOT'];
$autoloadFolder = getenv('folderName');
require_once $server . $autoloadFolder;;;

use app\Model\Usuario;
use app\Utility\Session as SessionManager;
use app\DAO\SenhaDAO as SenhaDAO;
use app\DAO\UsuarioDAO as UsuarioDAO;
use app\Model\Imagem;

$user = new Usuario();
$userdao = new UsuarioDAO();
$passwordDao = new SenhaDAO();
$session = new SessionManager();

$d = filter_input_array(INPUT_POST);

class ControllerUsuario
{
     public function Cadastrar($nome, $emailD, $senha, $telefone)
     {
          $acesso = 1;
          $user = new Usuario();
          $userdao = new UsuarioDAO();
          $passwordDao = new SenhaDAO();
          $session = new SessionManager();
          $user->setNome($nome);
          $user->setEmail($emailD);
          $hashedPassword = $passwordDao->hashPassword($senha);
          $user->setSenha($hashedPassword);
          $user->setTelefone(filter_var($telefone, FILTER_SANITIZE_NUMBER_INT));
          $user->setAcesso($acesso);
          $email = $user->getEmail();
          $query = "SELECT email FROM usuario where email = '$email'";
          $select = ConnectDB::getConexao()->query($query);
          if ($select->rowCount()) {
               header('Location: ' . mainFolder . viewFolder . "Conta");
               exit();
          }

          $userdao->insertUser($user);
          $session->setSession($user);
     }
     public function Login($email, $senha)
     {
          $user = new Usuario();
          $userdao = new UsuarioDAO();
          $passwordDao = new SenhaDAO();
          $session = new SessionManager();
          $user = $userdao->getUserByEmail($email);
          if (!$user) {
               setcookie("NoEmail", $email, time() + 60 * 60, "/");
               header('Location: ' . mainFolder . viewFolder . 'Conta');
               exit();
          } else {
               if ($passwordDao->matchPassword($senha, $user->getSenha())) {
                    $session->setSession($user);
                    header('Location: ' . mainFolder);

                    exit();
               } else {
                    setcookie("WrongPassword", $senha, time() + 60 * 60, "/");
                    header('Location: ' . mainFolder . viewFolder . 'Conta');
                    exit();
               }
          }
     }
     public function Update($pkUsuario, $fkAcesso, $nome, $email, $senha, $telefone)
     {
          $imagemDao = new ImagemDAO();
          $usuario = new Usuario();
          $usuarioDao = new UsuarioDAO();
          $usuario->setId($pkUsuario);
          echo$nome;
          $usuario = $usuarioDao->getUserById($usuario->getId());
          $usuario->setEmail($email ? $email : $usuario->getEmail());
          $usuario->setAcesso($fkAcesso ? $fkAcesso : $usuario->getAcesso());
          $usuario->setSenha($senha ? $senha : $usuario->getSenha());
          $usuario->setTelefone($telefone ? $telefone : $usuario->getTelefone());
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
                    $usuario->setFotoPerfil($imagemModel);
                    print_r($imagemModel);

                    $target_dir = __DIR__ . '/../../assets/img/perfis/';
                    $target_file = $target_dir . basename($filenome);
                    move_uploaded_file($file, $target_file);
               } else {
                    $imagemModel = $imagemDao->getImagemById(1);
                    $usuario->setFotoPerfil($imagemModel);
               }
          } else {
               $imagemModel = $imagemDao->getImagemById(1);
               $usuario->setFotoPerfil($imagemModel);
          }
          $usuarioDao->updateUser($usuario);
          echo"<hr>";
          print_r($usuario);
          echo "<hr>";
          print_r($usuarioDao->getUserById($usuario->getId()));
     }
}


$controllerUsuario = new ControllerUsuario();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
     if (isset($_POST['cadastrar'])) {
          $controllerUsuario->Cadastrar($d['nome'], $d['email'], $d['senha'], $d['telefone']);
          header('Location: ' . mainFolder);
          exit();
     }
     if(isset($_POST['update'])){
          $pkUser = $d['pkUsuario'];
          $nome = isset($d['nome']) ? $d['nome'] : null;
          $email = isset($d['email']) ? $d['email'] : null;
          $senha = isset($d['senha']) ? $d['senha'] : null;
          $telefone = isset($d['telefone']) ? $d['telefone'] : null;
          $fkAcesso = isset($d['acesso']) ? $d['acesso'] : null;
          $controllerUsuario->Update($pkUser, $fkAcesso, $nome,$email,$senha,$telefone);
          header('Location: ' . mainFolder . viewFolder . "Perfil");
          exit();
     }

     if (isset($_POST['login'])) {
          $email = $d['email'];
          $senha = $d['senha'];

          $controllerUsuario->Login($email, $senha);
          header('Location: ' . mainFolder);
          exit();
     }
    
}
