<?php

if (isset($_POST["submit"])){

  $name      = $_POST["name"];
  $email     = $_POST["email"];
  $number    = $_POST["number"];
  $pwd       = $_POST["pwd"];
  $pwdRepeat = $_POST["pwdRepeat"];

  require_once 'dbconnect.php';
  require_once 'functions.php';

 /*
 if(emptyInputSignup($name, $email, $number, $pwd, $pwdRepeat) !== false ){
    header("location: ../register.php?error=emptyinput");
    exit();
  }


  if(invalidNumber($number) !== false ){
    header("location: ../register.php?error=invalidNumber");
    exit();
  }

  if(invalidEmail($email) !== false ){
    header("location: ../register.php?error=invalidEmail");
    exit();
  }*/

  if(pwdMatch($pwd, $pwdRepeat) !== false ){
    header("location: ../register.php?error=passworddontmatch");
    exit();
  }

  if(uidExits($conn, $number, $email) !== false ){
    header("location: ../register.php?error=numberalreadytaken");
    exit();
  }

  createUser($conn, $name, $email, $number, $pwd);

}else{
  header("location: ../register.php");
  exit();
}
