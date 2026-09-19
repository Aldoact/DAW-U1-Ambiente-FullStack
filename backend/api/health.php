<?php

header('Content-Type: application/json');

$host = getenv('DB_HOST');
$db = getenv('DB_NAME');
$user = getenv('DB_USER');
$password = getenv('DB_PASSWORD');

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$db;charset=utf8mb4",
        $user,
        $password
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo json_encode([
        'ok' => true,
        'backend' => 'PHP funcionando',
        'database' => 'MySQL conectado'
    ]);
} catch (PDOException $e) {
    http_response_code(500);

    echo json_encode([
        'ok' => false,
        'backend' => 'PHP funcionando',
        'database' => 'Error de conexión'
    ]);
}