<?php
require_once __DIR__ . '/autoload.php';

$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';
$controllerClassName = $ctrl . 'Controller';
require_once __DIR__ . '/controller/' . $controllerClassName . '.php';
$controller = new $controllerClassName;
$method = 'action' . $act;
//echo $method; die;
$controller->$method();
