<?php
define('ENGINE', dirname($_SERVER['DOCUMENT_ROOT']) . '/engine/');
define('ROOT_DIR', dirname(__DIR__));
define('DS', DIRECTORY_SEPARATOR);
define('CONTROLLER_NAMESPACE', 'app' . DS . 'controllers' . DS);
define('VIEWS_DIR', ROOT_DIR . DS . "views" . DS);

//include_once ENGINE . 'Autoload.php';
include_once ROOT_DIR . DS . 'vendor' . DS . 'autoload.php';


