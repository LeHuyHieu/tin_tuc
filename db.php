<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tintuc";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8mb4");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
function getData($sql)
{
    $conn = $GLOBALS['conn'];
    $result = $conn->query($sql);
    $data = array();
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
}
?>