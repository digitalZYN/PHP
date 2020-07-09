<?php
//include "connectdb.php";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tasklist";

// Create connection
$conn = connectdb($servername, $username, $password, $dbname);

$sql = "INSERT INTO list(id, description) VALUES (NULL, 'School Tasks')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
