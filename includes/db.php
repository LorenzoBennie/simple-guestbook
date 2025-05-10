<?php

//connect to the database

use PgSql\Lob;

function connectDb(): PDO {
    $pdo = new PDO('sqlite:' . DB_DIR . '/db.sqlite');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
}

// used to run the schema in  the CLI
function loadSchema(PDO $pdo, string $schemaFile): void {
    $sql = file_get_contents($schemaFile);
    if (false === $sql) {
        die("Failed to load schema from file: $schemaFile");
    }

    $pdo->exec($sql);
    echo "Schema successfully.\n";
}
?>