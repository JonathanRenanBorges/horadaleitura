<?php

use app\DAO;
use app\Utility\Builder;
use app\Utility\Session;
$server = $_SERVER['DOCUMENT_ROOT'];
$autoloadFolder = getenv('folderName');
require_once $server . $autoloadFolder;
$builder = new Builder();
$session = new Session();
$session->verifyInsideSession(2);
$builder->buildHead('agendados');
$builder->buildNavbar($_SESSION['email'], $_SESSION['name'], $_SESSION['permission']);
$builder->buildFile('Admin/Agendados/agendados.php');
$builder->buildScripts();