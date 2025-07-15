<?php
$dsn = "mysql:host=127.0.0.1;port=3307;dbname=demo;charset=utf8mb4";
$user = 'demo_user';
$pass = 'MyDemo2025!'; // type manually

try {
    $pdo = new PDO($dsn, $user, $pass);
    echo "✅ Connected successfully as demo_user";
} catch (PDOException $e) {
    echo "❌ Connection failed: " . $e->getMessage();
}
?>
