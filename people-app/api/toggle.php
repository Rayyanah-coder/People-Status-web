<?php
header('Content-Type: application/json');
require 'db.php';

$id = intval($_POST['id'] ?? 0);
if ($id <= 0) {
    http_response_code(422);
    echo json_encode(['error' => 'Invalid ID']);
    exit;
}

$pdo->prepare("UPDATE people SET status = 1 - status WHERE id = ?")->execute([$id]);
echo json_encode(['success' => true]);
