<?php
require './dbconnect.php';

if(isset($_POST['updatebtn']))
{
  $id         = $_POST['id'];
  $name       = $_POST['name'];
  $email      = $_POST['email'];
  $number     = $_POST['number'];
  $password   = $_POST['pwd'];
  $pwdRepeat  = $_POST['pwdRepeat'];

  if($password !== $pwdRepeat)
  {
    header("location: ../edituser.php?error=passworddontmatch");
  }
  else
  {
      $query = "UPDATE users SET usersName='$name', usersEmail='$email', usersNumber='$number', usersPwd ='$password' WHERE usersId='$id'";
      $query_run = mysqli_query($conn, $query);

      if($query_run)
      {
        header("location: ../users.php?error=updated");
      }
      else
      {
      header("location: ../users.php?error=updateerror");
      }
  }

}
