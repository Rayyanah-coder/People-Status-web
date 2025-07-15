<?php
header('Content-Type: application/json');

require __DIR__ . '/db.php'; // Connect to DB using PDO

try {
    $stmt = $pdo->query("SELECT * FROM people"); // Replace 'people' with your actual table name
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($rows);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
