<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta
* @link https://tabler.io
* Copyright 2018-2021 The Tabler Authors
* Copyright 2018-2021 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <title>Edit User - Job Card</title>
    <!-- CSS files -->
    <?php require './includes/head.php'; ?>
</head>

<body class="antialiased border-top-wide border-primary d-flex flex-column">
  <?php require './includes/header.php'; ?>
    <div class="flex-fill d-flex flex-column justify-content-center py-4">
        <div class="container-tight py-6">
          <?php
          if (isset($_GET["error"])) {
            // code...
            if ($_GET["error"] == "passworddontmatch") {
              // code...
              echo '

              <div class="alert alert-important alert-warning alert-dismissible" role="alert">
                  <div class="d-flex">
                      <div>
                          <!-- SVG icon code with class="alert-icon" -->
                      </div>
                      <div>
                          Sorry! The passwords you entred do not match.
                      </div>
                  </div>
                  <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
              </div>

              ';

            } else if ($_GET["error"] == "numberalreadytaken") {
              // code...
              echo '
              <div class="alert alert-important alert-warning alert-dismissible" role="alert">
                  <div class="d-flex">
                      <div>
                          <!-- SVG icon code with class="alert-icon" -->
                      </div>
                      <div>
                          Sorry! The number/email you entered is aleady taken.
                      </div>
                  </div>
                  <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
              </div>

              ';
          } else if ($_GET["error"] == "none") {
            // code...
            echo "<p>Please login</p>";
        }
      }

      ?>

      <?php
      //Database Connection
      require_once './connection/dbconnect.php';

      if(isset($_POST['edit_btn'])){
        $id = $_POST['edit_id'];

        $query = "SELECT * FROM users WHERE usersId = '$id'";
        $query_run = mysqli_query($conn, $query);

        foreach ($query_run as $row ) {
          // code...

        ?>
        <form class="card card-md" action="./connection/updateuser.php" method="post" autocomplete="off">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Update user details</h2>
                <input type="hidden" name="id" value="<?php echo $row['usersId']; ?>">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" value="<?php echo $row['usersName']; ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="<?php echo $row['usersEmail']; ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Telephone Number</label>
                    <input type="text" name="number" value="<?php echo $row['usersNumber']; ?>" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label class="form-label">
                        Password
                    </label>
                    <div class="input-group input-group-flat">
                        <input type="password" value="<?php echo $row['usersPwd'] ?>" name="pwd" class="form-control" autocomplete="off" required>
                        <span class="input-group-text">
                            <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><svg
                                    xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="12" cy="12" r="2" />
                                    <path
                                        d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                </svg>
                            </a>
                        </span>
                    </div>
                </div>
                <div class="mb-2">
                    <label class="form-label">
                        Confirm Password
                    </label>
                    <div class="input-group input-group-flat">
                        <input type="password" value="<?php echo $row['usersPwd'] ?>" name="pwdRepeat" class="form-control"                                 autocomplete="off" required>
                        <span class="input-group-text">
                            <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><svg
                                    xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="12" cy="12" r="2" />
                                    <path
                                        d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                </svg>
                            </a>
                        </span>
                    </div>
                </div>
                <div class="form-footer text-right">
                  <a href="users.php" class="btn btn-danger">Cancel</a>
                    <button type="submit" name="updatebtn" class="btn btn-primary">Update User</button>
                </div>
            </div>
        <?php
      }
}
      ?>



        </div>
        </form>

    </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <!--Scripts-->
    <?php require './includes/scripts.php'; ?>
    <!--Scripts Ends-->
</body>

</html>
