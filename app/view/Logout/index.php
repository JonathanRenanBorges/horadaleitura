<?php
use app\Utility\Session;
$server = $_SERVER['DOCUMENT_ROOT'];
$autoloadFolder = getenv('folderName');
require_once $server . $autoloadFolder;
$session = new Session();
$session->destructSessions();
header("Location: " . mainFolder);
exit();