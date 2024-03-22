<?php
require 'vendor/autoload.php';

// Retrieve username from the request
$username = $_GET["username"];

$connection_string = "mongodb://localhost:27017/";
$database_name = "guvidb";
$collection_name = "userDetails";

$connection = new MongoDB\Client();
$database = $connection->$database_name;

$collection = $connection->selectCollection($database_name, $collection_name);

// Fetch user data using the username
$data = $collection->findOne(["username" => $username]);

if ($data) {
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    http_response_code(404);
    echo json_encode(['error' => 'User not found']);
}
