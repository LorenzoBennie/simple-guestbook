<?php 

declare(strict_types=1);

const CSRF_TOKEN_LENGTH = 32;

const CSRF_TOKEN_LIFETIME = 60 * 30; //30 MINUTES

function generateCsrfToken(): string {
    $token = bin2hex(random_bytes(CSRF_TOKEN_LENGTH));
    setCsrTokenAndTime($token);
    return $token;
}

function getCsrfTokenAndTime(): array {
    return [
        $_SESSION['csrf_token'] ?? null,
        $_SESSION['csrf_token_time'] ?? null
    ];
}

function setCsrTokenAndTime(?string $token): void {
    if ($token === null) {
        unset(
            $_SESSION['csrf_token'],
            $_SESSION['csrf_token_time']
        );
    }
    else {
        $_SESSION['csrf_token'] = $token;
        $_SESSION['csrf_token_time'] = time();
    }
}

function isTokenExpired (?int $time): bool {
    return $time === null || (time() - $time > CSRF_TOKEN_LIFETIME);
}


function getCurrentCsrfToken(): string {
    // check if there is a valid non-expired token and return if it is
    // otherwise generate a new one and return it
    [$token, $time] = getCsrfTokenAndTime();
    if (!isset($token, $time) || 
    isTokenExpired($time)) {
        return generateCsrfToken();
    }
    return $_SESSION['csrf_token'];
}

function validateCsrfToken(?string $token): bool {
    [$storedToken, $time] = getCsrfTokenAndTime();

    if (!isset($storedToken, $time)) {
        return false;
    }

    if (isTokenExpired($time)) {
        setCsrTokenAndTime(null);
        return false;
    }

    // Validate token
    $valid = hash_equals($storedToken, $token ?? '');

    if ($valid) {
        generateCsrfToken();
    }
    return $valid;
}

?>