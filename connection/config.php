<?php
$conn = new mysqli("localhost", "root","", "JoarkDB");

if($conn->connect_error){
  die("Connection Failed". connect_error);
}
 ?>
