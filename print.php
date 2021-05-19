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
    <title>Print Invoice - Joack Consult.</title>
    <!-- CSS files -->
    <?php require './includes/head.php'; ?>
    <?php require 'connection/dbconnect.php'; ?>


</head>

<body class="antialiased">
    <div class="page">
        <!--Header-->
        <?php require './includes/header.php'; ?>
        <!--Header Ends-->
        <div class="content">
            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header d-print-none">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                Invoice
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                              
                        </div>
                    </div>
                </div>

                <?php
                if (isset($_GET['printout'])) {
                    $id = $_GET['printout'];

                    $sql = "SELECT name, address, number, email, services, amount_paid FROM orders WHERE id=$id";

                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                          ?>
                          <div class="page-header d-print-none">
                              <div class="row align-items-center">
                                  <div class="col">
                                  <a href="./dashboard.php" class="btn btn-success">
                                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                                      stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" />
                                      <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                      </svg>
                                        Return to Dashboard
                                    </a>
                                  </div>
                                  <!-- Page title actions -->
                                  <div class="col-auto ms-auto d-print-none">

                                  </div>
                                  <div class="col-auto ms-auto d-print-none">
                                      <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                              viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                              stroke-linecap="round" stroke-linejoin="round">
                                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                              <path
                                                  d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                                              <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                                              <rect x="7" y="13" width="10" height="8" rx="2" />
                                          </svg>
                                          Print Invoice
                                      </button>
                                  </div>
                              </div>
                          </div>
                          <div class="card card-lg">

                              <div class="card-body">
                                  <div class="row">
                                      <div class="col-6">
                                          <address class="h5">
                                            <strong><?= $row['name']; ?></strong><br>
                                              <?= $row['address']; ?><br>
                                              <?= $row['number']; ?><br>
                                              <?= $row['email']; ?><br>
                                          </address>
                                      </div>
                                      <div class="col-6 text-end">

                                          <address class="h5">
                                                          <a href="#">
                                            <img src="./dist/img/logo/logo.png" width="50" height="50" alt="Joack Consult"
                                                class="">
                                        </a><br>

                                      <strong>Joack Consult</strong><br>
                                              BO-0102-6690<br>
                                              Box 12 Nkoranza<br>
                                              Cooperative Distillers Building<br>
                                              024 914 5709<br>024 840 8416<br>
                                              jbfsgh@gmail.com
                                          </address>
                                      </div>
                                  </div>
                                  <table class="table table-transparent table-responsive">
                                      <thead>
                                          <tr>
                                              <th class="text-center" style="width: 1%"></th>
                                              <th>Services</th>
                                              <th></th>
                                              <th></th>
                                              <th class="text-end" style="width: 1%"></th>
                                          </tr>
                                      </thead>
                                            <tr>
                                                <td></td>
                                                <td><?= $row['services']; ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                      <tr>
                                          <td colspan="4" class="font-weight-bold text-uppercase text-end">Total Due</td>
                                          <td class="font-weight-bold text-end"><?= number_format($row['amount_paid'], 2); ?></td>
                                      </tr>
                                  </table>
                                  <p class="text-muted text-center mt-5">Thank you very much for doing business with us. We look
                                      forward to working with
                                      you again!</p>
                              </div>
                          </div>
<?php

                        }
                      } else {
                        echo "0 results";
                      }
                }

                ?>



            </div>
            <!--Footer-->
            <?php require './includes/footer.php'; ?>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="./dist/js/tabler.min.js"></script>
</body>

</html>
