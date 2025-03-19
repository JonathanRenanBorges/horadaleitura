<?php
$server = $_SERVER['DOCUMENT_ROOT'];
$autoloadFolder = getenv('folderName');
require_once $server . $autoloadFolder;
use app\Model\Editora;


$editora = new Editora();
$editoraDAO = new EditoraDAO();
$d = filter_input_array(INPUT_POST);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
     if (isset($_POST['insert'])) {
        $user->setNome($d['nome']);

        $editoraDAO->insertEditora($user);
        print_r($user);
        header('Location: ' . mainFolder);
        exit();
     }
}
