<?php
$server="localhost";
$user = "root";
$password ="";
$db ="wtf";

$conn = mysqli_connect( $server,$user,$password,$db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

?>