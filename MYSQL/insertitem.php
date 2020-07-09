<?php
//include "connectdb.php";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tasklist";

// Create connection
$conn = connectdb($servername, $username, $password, $dbname);

$sql = "INSERT INTO listitem(id, list_id, description,completed) VALUES (NULL, 2,'Finish PHP Project','N')";

if ($conn->query($sql) === TRUE) {
    echo "New listitem record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
