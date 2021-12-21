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
    <title> Create New Company - Invoice App</title>
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

        <form class="card card-md" action="./connection/createcompany.php" method="post" autocomplete="off">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Create New Company</h2>
                <!-- <div class="mb-3">
                    <label class="form-label">Company Logo</label>
                    <input type="file" name="comName" class="form-control" required>
                </div> -->
                <div class="mb-3">
                    <label class="form-label">Company Name</label>
                    <input type="text" name="comName" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label"> Company Address</label>
                    <input type="text" name="comAddress" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label"> Company Telephone Number</label>
                    <input type="text" name="comTel" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Company Email Address</label>
                    <input type="text" name="comEmail" class="form-control" required>
                </div>
                <div class="form-footer text-right">
                  <a href="dashboard.php" class="btn btn-danger">Cancel</a>
                    <button type="submit" name="createbtn" class="btn btn-primary">Create New Company</button>
                </div>
            </div>

        </div>
        </form>

    </div>
    </div>
    <!-- Scripts -->
    <?php require './includes/scripts.php'; ?>
    <!-- Scripts Ends -->
</body>

</html>
