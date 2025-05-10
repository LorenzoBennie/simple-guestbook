<?php 
//This file is the entry point to the application

declare(strict_types=1);

require_once '../bootstrap.php';

session_start();

// Handle request
dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
?>