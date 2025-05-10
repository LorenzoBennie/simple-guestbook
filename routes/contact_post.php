<?php 
//CSRF

//print_r($_POST);

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

if (empty($name) || empty($email) || empty($message)) {
    badRequest("All fields are required");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    badRequest("Invalid Email");
}

var_dump($email, $name, $message);die;
?>