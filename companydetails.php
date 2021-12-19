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
    <title>Company Details - Invoice App</title>
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
            if ($_GET["error"] == "updateerror") {
              // code...
              echo '

              <div class="alert alert-important alert-warning alert-dismissible" role="alert">
                  <div class="d-flex">
                      <div>
                          <!-- SVG icon code with class="alert-icon" -->
                      </div>
                      <div>
                          Sorry! There was a problem updating the company details. Please try again.
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

        $query = "SELECT * FROM company WHERE comId = '1'";
        $query_run = mysqli_query($conn, $query);

        foreach ($query_run as $row ) {
          // code...

        ?>
        <form class="card card-md" action="./connection/updatecompany.php" method="post" autocomplete="off">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Update company details</h2>
                <input type="hidden" name="comId" value="1">
                <div class="mb-3">
                    <label class="form-label">Company Name</label>
                    <input type="text" name="comName" value="<?php echo $row['comName']; ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label"> Company Address</label>
                    <input type="text" name="comAddress" value="<?php echo $row['comAddress']; ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label"> Company Telephone Number</label>
                    <input type="text" name="comTel" value="<?php echo $row['comTel']; ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Company Email Address</label>
                    <input type="text" name="comEmail" value="<?php echo $row['comEmail']; ?>" class="form-control" required>
                </div>
                <div class="form-footer text-right">
                  <a href="users.php" class="btn btn-danger">Cancel</a>
                    <button type="submit" name="updatebtn" class="btn btn-primary">Update Company Details</button>
                </div>
            </div>
        <?php
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
