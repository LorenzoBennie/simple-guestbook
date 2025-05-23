<?php 

function exceptionHandler(Throwable $exception) {
    $message = "Uncaught exception (" . get_class($exception) . "): " . $exception->getMessage() . 
    " in file: " . $exception->getFile() . 
    " on line: " . $exception->getFile();
    error_log($message);

    serverError("An unexpected error ocurred. Please try again later.");
}

function errorHandler(int $errno, string $errstr, string $errfile, int $errline) : bool {
    $message = "Error [$errno] $errstr on line $errline
    in file $errfile";
    error_log($message);

    serverError("An error occurred. Please try again later.");

    return true;
}

?>