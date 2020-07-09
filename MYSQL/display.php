<?php
//include "connectdb.php";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tasklist";

// Create connection
$conn =  connectdb($servername, $username, $password, $dbname);

$sql = "SELECT id, description FROM list";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Description: " . $row["description"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();