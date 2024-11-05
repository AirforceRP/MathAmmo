<?php
// Enable CORS for cross-origin requests (if needed)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Include the database configuration
require 'config.php';

// Get the request method
$requestMethod = $_SERVER["REQUEST_METHOD"];

// Function to fetch all diagnoses
function getDiagnoses($connection) {
    $sql = "SELECT * FROM diagnoses";
    $result = $connection->query($sql);
    $diagnoses = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $diagnoses[] = $row;
        }
    }

    echo json_encode($diagnoses);
}

// Function to log data (e.g., adding a diagnosis log)
function logDiagnosis($connection) {
    $data = json_decode(file_get_contents("php://input"), true);
    
    if (!isset($data["user_id"]) || !isset($data["diagnosis"]) || !isset($data["notes"])) {
        echo json_encode(["error" => "Invalid input"]);
        return;
    }

    $userId = $connection->real_escape_string($data["user_id"]);
    $diagnosis = $connection->real_escape_string($data["diagnosis"]);
    $notes = $connection->real_escape_string($data["notes"]);

    $sql = "INSERT INTO logs (user_id, diagnosis, notes) VALUES ('$userId', '$diagnosis', '$notes')";

    if ($connection->query($sql) === TRUE) {
        echo json_encode(["success" => "Log added successfully"]);
    } else {
        echo json_encode(["error" => "Error: " . $connection->error]);
    }
}

// Handle different request methods
switch ($requestMethod) {
    case "GET":
        getDiagnoses($connection);
        break;
    case "POST":
        logDiagnosis($connection);
        break;
    default:
        echo json_encode(["error" => "Invalid request method"]);
        break;
}
?>
