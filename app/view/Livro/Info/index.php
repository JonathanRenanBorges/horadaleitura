<?php

use app\Utility\Builder;
use app\Utility\Session;
$server = $_SERVER['DOCUMENT_ROOT'];
$autoloadFolder = getenv('folderName');
require_once $server . $autoloadFolder;
$builder = new Builder();
$session = new Session();
$builder->buildHead('informacoes');
$builder->buildNavbar($_SESSION['email'], $_SESSION['name'], $_SESSION['permission']);
$builder->buildFile('Livro/Info/info.php');
$builder->buildScripts();