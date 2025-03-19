<?php
$server = $_SERVER['DOCUMENT_ROOT'];
$autoloadFolder = getenv('folderName');
require_once $server . $autoloadFolder;

use app\Utility\Builder;
use app\Utility\Session;
$builder = new Builder();

$session = new Session();
$session->verifyIfSession();

$builder->buildHead('main');
$builder->buildNavbar($_SESSION['email'], $_SESSION['name'], $_SESSION['permission']);
$builder->buildFile('dont.php');
$builder->buildScripts();