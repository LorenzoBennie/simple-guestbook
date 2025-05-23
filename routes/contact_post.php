<?php 
//CSRF protection

if (!validateCsrfToken($_POST['csrfToken'] ?? null)) {
    addFlashMessage('error', 'Sorry, please send the form again');
    redirect('/contact');
}

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

//var_dump($email, $name, $message);die;

$inserted =  insertMessage(connectDb(), $name, $email, $message);

if ($inserted) {
    $safeName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    addFlashMessage('success', "Thank you, $safeName,  for your message. It was stored");
}
else {
    addFlashMessage('error', 'Could not store the message, sorry');
}

redirect('/guestbook')
?>