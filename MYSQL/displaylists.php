<?php
//include "connectdb.php";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tasklist";
?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>

<h2>List Table</h2>

<table>
  <tr>
    <th>Id</th>
    <th>List</th>
  </tr>
<?php
// Create connection
$conn =  connectdb($servername, $username, $password, $dbname);

$sql = "SELECT id,description FROM list";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "<td>" . $row["description"]. "<td></tr>";
    }
}
?>
</table>

</body>
</html>
<?php
$conn->close();
?>