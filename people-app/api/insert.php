<?php
header('Content-Type: application/json');
require 'db.php';

$name = trim($_POST['name'] ?? '');
$age  = intval($_POST['age'] ?? 0);

if ($name === '' || $age <= 0) {
    http_response_code(422);
    echo json_encode(['error' => 'Invalid name or age']);
    exit;
}

$stmt = $pdo->prepare("INSERT INTO people (name, age) VALUES (?, ?)");
$stmt->execute([$name, $age]);

echo json_encode(['success' => true]);
