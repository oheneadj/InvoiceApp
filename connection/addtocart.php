<?php

if (isset($_POST["submit"])){

  $service      = $_POST["service"];
  $amount     = $_POST["amount"];

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

  if(serviceExits($conn, $number, $email) !== false ){
    header("location: ../services.php?error=servicealreadyexists");
    exit();
  }

  addService($conn, $service, $amount);

}else{
  header("location: ../services.php");
  exit();
}
