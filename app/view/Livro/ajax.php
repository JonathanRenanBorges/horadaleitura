<?php
$server = $_SERVER['DOCUMENT_ROOT'];
$autoloadFolder = getenv('folderName');
require_once $server . $autoloadFolder;
use app\DAO\LivroDAO as LivroDAO;
$id = $_POST['id'];
$livroDao = new LivroDAO();
$livroDao->deleteLivro($id);