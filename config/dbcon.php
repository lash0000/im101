<?php
$mysql_hostname = "localhost";
$mysql_username = "root";
$mysql_password = "";
$mysql_database = "im101-pastry";

$conn = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password, $mysql_database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected to MySQL!";
}
?>
