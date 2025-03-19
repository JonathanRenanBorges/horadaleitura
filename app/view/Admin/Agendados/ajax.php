<?php
use app\Controller\ControllerLivrosPedidos;
$server = $_SERVER['DOCUMENT_ROOT'];
$autoloadFolder = getenv('folderName');
require_once $server . $autoloadFolder;
$id = $_POST['id'];
$livroAgendadoController = new ControllerLivrosPedidos();
$livroAgendadoController->Delete($id);
