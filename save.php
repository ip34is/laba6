<?php
$data = json_decode(file_get_contents('php://input'), true);
if ($data) {
    $filename = 'data.json';
    $currentData = file_exists($filename) ? json_decode(file_get_contents($filename), true) : [];

    if (count($currentData) >= 10) {
        array_shift($currentData); // Видаляємо перший елемент
    }

    $currentData[] = $data;
    file_put_contents($filename, json_encode($currentData));
    echo json_encode(['status' => 'success']);
} else {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
}
