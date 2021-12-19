<?php
require './dbconnect.php';

if(isset($_POST['updatebtn']))
{
  $comId         = $_POST['comId'];
  $comName       = $_POST['comName'];
  $comAddress    = $_POST['comAddress'];
  $comTel        = $_POST['comTel'];
  $comEmail      = $_POST['comEmail'];


      $query = "UPDATE company SET comName='$comName', comAddress ='$comAddress', comTel='$comTel', comEmail='$comEmail'  WHERE comId='$comId'";
      $query_run = mysqli_query($conn, $query);

      if($query_run)
      {
        header("location: ../dashboard.php?error=updated");
      }
      else
      {
      header("location: ../companydetails.php?error=updateerror");
      }
  }

