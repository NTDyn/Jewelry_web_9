<?php

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "jewelry";
  
  $conn = new mysqLi($servername, $username, $password,$dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 



 


?>