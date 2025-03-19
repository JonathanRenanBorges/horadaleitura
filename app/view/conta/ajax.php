<?php
$server = $_SERVER['DOCUMENT_ROOT'];
$autoloadFolder = getenv('folderName');
require_once $server . $autoloadFolder;
$typeInput = $_POST['input'];

use app\DAO\UsuarioDAO as UsuarioDAO;
use app\DAO\SenhaDAO as SenhaDAO;
$userDAO = new UsuarioDAO();
$passwordDao = new SenhaDAO();

if ($typeInput == "LOGIN") {
  $userEmail = $_POST['email'];
  $userSenha = $_POST['senha'];
  $checkEmail = $userDAO->getUserByEmail($userEmail);
  if ($checkEmail) {
    if ($checkEmail && $passwordDao->matchPassword($userSenha, $checkEmail->getSenha())) {
      $response = "Validado";
      echo json_encode($response);
      exit();
    }
    else{
      $response = "Senha incorreta";
      echo json_encode($response);
      exit();
    }
  }else {
    $response = "Email inexistente";
    echo json_encode($response);
    exit();
  }


} elseif ($typeInput == "SIGN") {
  $userEmail = $_POST['email'];
  $checkEmail = $userDAO->getUserByEmail($userEmail);
  if ($checkEmail) {
    $response = "Esse email já está em uso";
    echo json_encode($response);
    exit();
  } else {
    $response = "Validado";
    echo json_encode($response);
    exit();
  }


}



