<?php
$server = $_SERVER['DOCUMENT_ROOT'];
$autoloadFolder = getenv('folderName');
require_once $server . $autoloadFolder;
use app\Utility\Builder;
use app\Utility\Session;
    
$session = new Session();
$session->verifyIfSession();
$builder = new Builder();
$builder->buildHead('main');
$builder->buildNavbar($_SESSION['email'], $_SESSION['name'], $_SESSION['permission']);
$builder->buildFile('main.php');
$builder->buildScripts();