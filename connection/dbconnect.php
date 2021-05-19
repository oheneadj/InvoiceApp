<?php

$db_servername = "localhost";
$db_username   = "root";
$db_password   = "";
$db_name       = "JoarkDB";

$conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);

if (!$conn) {
    die("Connection Failed!:" . mysqli_connect_error());
}