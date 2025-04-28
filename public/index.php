<?php 
//This file is the entry point to the application

declare(strict_types=1);
session_start();

// Create a constant reference to the includes folder for convenience
const INCLUDES_DIR = __DIR__ . '/../includes';
const ROUTES_DIR = __DIR__ . '/../routes';

require_once INCLUDES_DIR . '/router.php';

// Handle request
dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
?>