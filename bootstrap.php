<?php 
// app initialization code to set all required constants and files
declare(strict_types=1);

require_once __DIR__ . '/error_handling.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);
set_exception_handler('exceptionHandler');
set_error_handler('errorHandler');

// Create a constant reference to the includes folder for convenience
const INCLUDES_DIR = __DIR__ . '/./includes';
const ROUTES_DIR = __DIR__ . '/./routes';
const TEMPLATES_DIR = __DIR__ . '/./templates';
const DB_DIR = __DIR__ . '/./db';

require_once INCLUDES_DIR . '/router.php';
require_once INCLUDES_DIR . '/view.php';
require_once INCLUDES_DIR . '/db.php';
require_once INCLUDES_DIR . '/flash.php';
require_once INCLUDES_DIR . '/csrf.php';
?>