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
    <title>Edit Service - Job Card</title>
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
            if ($_GET["error"] == "invalidservice") {
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

            } else if ($_GET["error"] == "servicealreadyexist") {
              // code...
              echo '
              <div class="alert alert-important alert-warning alert-dismissible" role="alert">
                  <div class="d-flex">
                      <div>
                          <!-- SVG icon code with class="alert-icon" -->
                      </div>
                      <div>
                          Sorry! The service you added aleady exists.
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

        $query = "SELECT * FROM services WHERE id = '$id'";
        $query_run = mysqli_query($conn, $query);

        foreach ($query_run as $row ) {
          // code...

        ?>
        <form class="card card-md" action="./connection/updateservice.php" method="post" autocomplete="off">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Edit a service</h2>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="hidden" name="service_code" value="<?php echo $row['service_code']; ?>">
                <div class="mb-3">
                    <label class="form-label">Service</label>
                    <input type="text" name="serviceName" value="<?php echo $row['serviceName']; ?>" class="form-control" required>
                </div>
                <div class="form-footer text-right">
                  <a href="services.php" class="btn btn-danger">Cancel</a>
                    <button type="submit" name="updatebtn" class="btn btn-primary">Update Service</button>
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
