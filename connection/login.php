<?php
 if (isset($_POST["submit"])) {
   // code...
   $number = $_POST["number"];
   $pwd    = $_POST["pwd"];

   require_once 'dbconnect.php';
   require_once 'functions.php';

   if(emptyInputLogin($number, $pwd) !== false ){
      header("location: ../index.php?error=emptyinput");
      exit();
    }

    loginUser($conn, $number, $pwd);
  }
 else{
   header("location: ../index.php");
   exit();
 }
