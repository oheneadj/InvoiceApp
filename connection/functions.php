<?php

//Test SignUp input
function emptyInputSignup($name, $email, $number, $pwd, $pwdRepeat){
  $result;
  if (empty($name)|| empty($email) || empty($number) || empty($pwd) || empty($pwdRepeat)) {
    // code...
    $result = true;
  }else {
    $result = false;
  }
  return $result;
}

//Test Number
function invalidNumber($number){
  $result;
  if (!preg_match("/^[0-9]*$/", $number)) {
    // code...
    $result = true;
  }else {
    $result = false;
  }
  return $result;
}

//Invalid Email
function invalidEmail($email){
  $result;
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // code...
    $result = true;
  }else {
    $result = false;
  }
  return $result;
}

//Password Match
function pwdMatch($pwd, $pwdRepeat){
  $result;
  if ($pwd !== $pwdRepeat) {
    // code...
    $result = true;
  }else {
    $result = false;
  }
  return $result;
}

//Number Exits
function uidExits($conn, $number, $email){
$result;
$sql = "SELECT * FROM users WHERE usersNumber = ? OR usersEmail = ?;";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
  header("location: ../register.php?error=stmtfailed");
  exit();
  // code...
}

mysqli_stmt_bind_param($stmt, "ss", $number, $email);
mysqli_stmt_execute($stmt);

$resultData = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($resultData)) {
return $row;
  // code...
}else {
  $result = false;
  return $result;
  // code...
}

mysqli_stmt_close($stmt);

}

//Create Users
function createUser($conn, $name, $email, $number, $pwd){
$sql = "INSERT INTO users (usersName, usersEmail, usersNumber, usersPwd) VALUES (?, ?, ?, ?);";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
  header("location: ../register.php?error=stmtfailed");
  exit();
  // code...
}



mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $number, $pwd);
mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);

header("location: ../index.php?error=none");
exit();
}


//Test Login input
function emptyInputLogin($number, $pwd){
  $result;
  if (empty($number) || empty($pwd)) {
    // code...
    $result = true;
  }else {
    $result = false;
  }
  return $result;
}

//Login Users
function  loginUser($conn, $number, $pwd){
  $uidExists = uidExits($conn, $number, $number);

  if($uidExists === false ){
    header("location: ../index.php?error=wronglogin");
    exit();
}

  $usersPwd = $uidExists["usersPwd"];


  if($usersPwd !== $pwd){
    header("location: ../index.php?error=wronglogin");
    exit();

  }else if ($usersPwd === $pwd) {
    // code...
    session_start();
    $_SESSION["userid"] = $uidExists["usersId"];
    $_SESSION["usersName"] = $uidExists["usersName"];

    header("location: ../dashboard.php");
    exit();
  }
}


//Service Exits
function serviceExits($conn, $service){
$result;
$sql = "SELECT * FROM services WHERE serviceName = ?;";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
  header("location: ../services.php?error=stmtfailed");
  exit();
  // code...
}

mysqli_stmt_bind_param($stmt, "s", $service);
mysqli_stmt_execute($stmt);

$resultData = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($resultData)) {
 return $row;
  // code...
}else {
  $result = false;
  return $result;
  // code...
}

mysqli_stmt_close($stmt);

}


//Create Services
function addService($conn, $service){
$servicecode = mt_rand (10,100);
$sql = "INSERT INTO services (serviceName, service_code) VALUES ( ?, ?);";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
  header("location: ../services.php?error=stmtfailed");
  exit();
  // code...
}



mysqli_stmt_bind_param($stmt, "ss", $service, $servicecode);
mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);

header("location: ../services.php?error=none");
exit();
}
