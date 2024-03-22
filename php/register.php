<?php
require 'vendor/autoload.php';


$username = $_POST["username"];
$name = $_POST["name"];
$email = $_POST["email"];
$contact = (int) $_POST["contact"];
$dob = $_POST["dob"];
$gender = $_POST["gender"];
$password = $_POST["password"];

$hostname = "localhost";
$db_username = "root";
$db_password = "Arun@2003";
$database = "userdetails";

$con = new mysqli($hostname, $db_username, $db_password, $database);


$sql = "INSERT INTO logincredentials (username , password) VALUES (? , ?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("ss", $username, $password);

$stmt->execute();

$stmt->close();
$con->close();


$connection_string = "mongodb://localhost:27017/";
$database_name = "guvidb";
$collection_name = "userDetails";

$connection = new MongoDB\Client();
$database = $connection->$database_name;

$collection = $connection->selectCollection($database_name, $collection_name);


$document = [
    "username" => $username,
    "name" => $name,
    "email" => $email,
    "contact" => $contact,
    "dob" => $dob,
    "gender" => $gender
];

$inserted = $collection->insertOne($document);


echo "Data is inputted in MongoDB Database";
