<?php
//include "connectdb.php";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tasklist";

// Create connection
$conn =  connectdb($servername, $username, $password, $dbname);

$sql = "DELETE FROM list WHERE description= 'School Tasks' ";

if ($conn->query($sql) === TRUE) {
    echo "Record successfully deleted";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
