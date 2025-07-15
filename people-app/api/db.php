<?php
$host = '127.0.0.1';
$db   = 'demo';
$user = 'demo_user';
$pass = 'MyDemo2025!';

$dsn = "mysql:host=$host;port=3307;dbname=$db;charset=utf8mb4";   // ← 3307 here

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
    exit;
}
?>
