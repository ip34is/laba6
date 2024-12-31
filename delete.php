<?php
$filename = 'data.json';
if (file_exists($filename)) {
    unlink($filename);
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'File not found']);
}
