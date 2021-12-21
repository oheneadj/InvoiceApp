<?php
require './dbconnect.php';

if(isset($_POST['createbtn']))
{
  $comId         = $_POST['comId'];
  $comName       = $_POST['comName'];
  $comAddress    = $_POST['comAddress'];
  $comTel        = $_POST['comTel'];
  $comEmail      = $_POST['comEmail'];

  $sql = "INSERT INTO company (comName, comAddress, comTel, comEmail) VALUES ( ?, ?, ?, ?)";
  $stmt = mysqli_stmt_init($conn);
      
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../createcompany.php?error=stmtfailed");
    exit();
        // code...
  }
    mysqli_stmt_bind_param($stmt, "ssss", $comName, $comAddress, $comTel, $comEmail);
    mysqli_stmt_execute($stmt);
  
    mysqli_stmt_close($stmt);
  
    header("location: ../dashboard.php?error=companyerrnone");
    exit();

  }