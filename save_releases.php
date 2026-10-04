<?php
$jsonData = file_get_contents('php://input');
$file = 'releases.json';

if (!empty($jsonData)) {
    if (file_put_contents($file, $jsonData)) {
        echo json_encode(['status' => 'success', 'message' => 'Releases saved successfully']);
    } else {
        http_response_code(500);
        echo json_encode(['status' => 'error', 'message' => 'Error saving releases']);
    }
} else {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'No data provided']);
}
?>