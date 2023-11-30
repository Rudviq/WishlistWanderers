<?php
header('Content-Type: application/json');

// Receive the JSON data from the POST request
$data = json_decode(file_get_contents('php://input'), true);

// Process the data (e.g., store it in a database)
// Add your logic here

// Respond with a JSON response
$response = array(
    'message' => 'Data received and processed successfully'
);

echo json_encode($response);
?>
