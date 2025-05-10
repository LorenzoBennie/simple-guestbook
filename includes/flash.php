<?php 
function addFlashMessage(string $type, string $message): void {
    $_SESSION['flash'][$type] = $message;
}

function getFlashMessages(): array {
    $messages = $_SESSION['flash'] ?? [];

    // remove flash messages from session once read/used
    unset($_SESSION['flash']);

    return $messages;
}
?>