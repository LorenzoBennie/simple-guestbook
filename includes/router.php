<?php
declare(strict_types=1);
const ALLOWED_METHODS = ['GET', 'POST'];
const INDEX_URI = '';
const INDEX_ROUTE = 'index';

function normalizeUri (string $uri) : string {
    $uri = strtolower(trim($uri, '/'));

    return $uri === INDEX_URI ? INDEX_ROUTE : $uri;
}

function notFound() : void {
    http_response_code(404);
    echo "404 Not Found";
    exit;
}

//return full name of the php file requested
function getFilePath (string $uri, string $method) : string {
    return ROUTES_DIR . '/' . normalizeUri($uri) . '_' . strtolower($method) . '.php';
}

function dispatch(string $uri, string $method) : void {
    // normalize the URI
    $uri = normalizeUri($uri);
    //var_dump($uri, $method);die;

    // Ensure to support the given method - if method is not GET||POST return 404
    $method = strtoupper($method);
    if (!in_array($method, ALLOWED_METHODS)) {
        notFound();
    }

    // Converting the URI and method to the actual PHP path
    $filePath = getFilePath($uri, $method);

    // check if the actual file exists
    //echo $filePath;
    if (file_exists($filePath)) {
        include($filePath);
        return;
    }
    notFound();
    // is exists handle the route by including the PHP file
}

?>