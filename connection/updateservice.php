<?php
require './dbconnect.php';

if(isset($_POST['updatebtn']))
{
  $id                = $_POST['id'];
  $serviceName       = $_POST['serviceName'];
  $service_code      = $_POST['service_code'];
  

      $query = "UPDATE services SET serviceName='$serviceName', service_code='$service_code' WHERE id='$id'";
      $query_run = mysqli_query($conn, $query);

      if($query_run)
      {
        header("location: ../services.php?error=updated");
      }
      else
      {
        header("location: ../services.php?error=stmtfailed");
      }
  }


