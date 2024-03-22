<?php
$username = $_POST["username"];
$password = $_POST["password"];

$hostname = "localhost";
$db_username = "root";
$db_password = "Arun@2003";
$database_name = "userdetails";

$con = new mysqli($hostname, $db_username, $db_password, $database_name);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT * FROM logincredentials WHERE username = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if ($password == $row["password"]) {
        echo $username;
    } else {
        echo $rows["password"];
        echo "Incorrect Password";
    }
} else {
    echo "User not found";
}

$stmt->close();
$con->close();
