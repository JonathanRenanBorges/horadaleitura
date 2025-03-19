<?php
$server = $_SERVER['DOCUMENT_ROOT'];
$autoloadFolder = getenv('folderName');
require_once $server . $autoloadFolder;
use app\Model\Autor;
use app\Model\Editora;


$autor = new Autor();
$editoraDAO = new AutorDAO();
$d = filter_input_array(INPUT_POST);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
     if (isset($_POST['insert'])) {
        $user->setNome($d['nome']);

        $editoraDAO->insertAutor($user);
        print_r($user);
        header('Location: ' . mainFolder);
        exit();
     }
}
