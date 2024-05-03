<?php
$servername = "localhost";
$username = "root";
$password = "";
$da="jewelry";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$da, 3307);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
