<?php require 'connection/dbconnect.php'; ?>
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
    <title>Dashboard - Joack Consult.</title>
    <?php require './includes/head.php'; ?>
</head>

<body class="antialiased">
    <div class="page">
        <!--Header-->
        <?php require './includes/header.php'; ?>
        <!--Header Ends-->
        <div class="content">
            <div class="container-xl">

              <?php
              if (isset($_GET["error"])) {
                  // code...
                  if ($_GET["error"] == "edittrans") {
                      // code...
                      echo ' <script>

                          </script>
                ';
              } elseif ($_GET["error"] == "orderdeleted") {
                      // code...
                      echo '
                      <div class="alert alert-important alert-success alert-dismissible" role="alert">
                          <div class="d-flex">
                              <div>
                                  <!-- SVG icon code with class="alert-icon" -->
                              </div>
                              <div>
                                  Your Oder has been deleted successfully!
                              </div>
                          </div>
                          <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
                      </div>
                ';
                  } else if ($_GET["error"] == "none") {
                      // code...
                      echo '

              <div class="alert alert-important alert-success alert-dismissible" role="alert">
                  <div class="d-flex">
                      <div>
                          <!-- SVG icon code with class="alert-icon" -->
                      </div>
                      <div>
                          Your Service has been added successfully!
                      </div>
                  </div>
                  <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
              </div>

              ';
                  } else if ($_GET["error"] == "serviceremove") {
                      // code...
                      echo '

              <div class="alert alert-important alert-danger alert-dismissible" role="alert">
                  <div class="d-flex">
                      <div>
                          <!-- SVG icon code with class="alert-icon" -->
                      </div>
                      <div>
                          Your service has been deleted and can not be restored.
                      </div>
                  </div>
                  <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
              </div>

              ';
                  }
              }
              ?>
                <!-- Page title -->
                <div class="page-header d-print-none">
                    <div class="row align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle">
                                <i class="fa fa-dashboard"></i> DASHBOARD
                            </div>
                            <?php
                            if (isset($_SESSION["usersName"])) {
                                // code...
                                echo '<h2 class="page-title"> Welcome, ' . $_SESSION["usersName"] . '
                              </h2>';
                            }

                            ?>

                        </div>
                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <span class="d-none d-sm-inline">
                                    <a href="./services.php" class="btn btn-white">
                                        Add new service
                                    </a>
                                </span>
                                <a href="invoice.php" class="btn btn-primary d-none d-sm-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                    Create new invoice
                                </a>
                                <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                                    data-bs-target="#modal-report" aria-label="Create new report">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


                <?php
                require './connection/dbconnect.php';
                require './connection/config.php';

                $stmt = $conn->prepare("SELECT * FROM orders");
                $stmt->execute();
                $result = $stmt->get_result();
                $grand_total = 0;
                $clients = 0;
                $no_clients = 0;

                while ($row = $result->fetch_assoc()) :
                ?>


                <?php $grand_total += $row['amount_paid']; ?>
                <?php $clients = $row['id'];
                    ?>
                <?php endwhile; ?>

                <div class="row row-deck row-cards">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">Total Invoices Issued</div>
                                    <div class="ms-auto lh-1">

                                    </div>
                                </div>
                                <div class="h1 mb-3"><?= $clients; ?> <span class="subheader ">Invoices</span></div>
                                <div class="d-flex mb-2">
                                    <div>Conversion rate</div>
                                    <div class="ms-auto">
                                        <span class="text-green d-inline-flex align-items-center lh-1">
                                            7% <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <polyline points="3 17 9 11 13 15 21 7" />
                                                <polyline points="14 7 21 7 21 14" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-blue" style="width: 23%" role="progressbar"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                        <span class="visually-hidden">75% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">Total Revenue</div>
                                    <div class="ms-auto lh-1">

                                    </div>
                                </div>
                                <div class="d-flex align-items-baseline">
                                    <div class="h1 mb-0 me-2">GHc <?= number_format($grand_total, 2); ?></div>
                                    <div class="me-auto">
                                        <span class="text-green d-inline-flex align-items-center lh-1">
                                            8% <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <polyline points="3 17 9 11 13 15 21 7" />
                                                <polyline points="14 7 21 7 21 14" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div id="chart-revenue-bg" class="chart-sm"></div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">Total Clients Served</div>
                                    <div class="ms-auto lh-1">

                                    </div>
                                </div>
                                <div class="d-flex align-items-baseline">
                                    <div class="h1 mb-3 me-2"><?= $clients; ?> <span
                                            class="subheader text-blue">Clients</span></div>
                                    <div class="me-auto">
                                        <span class="text-yellow d-inline-flex align-items-center lh-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <line x1="5" y1="12" x2="19" y2="12" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div id="chart-new-clients" class="chart-sm"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">

                        <?php
                        require './connection/dbconnect.php';
                        require './connection/config.php';

                        $stmt = $conn->prepare("SELECT * FROM users");
                        $stmt->execute();
                        $result = $stmt->get_result();

                        $users = 0;


                        while ($row = $result->fetch_assoc()) :
                        ?>



                        <?php $users = $row['usersId'];
                            ?>
                        <?php endwhile; ?>


                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">Active users</div>
                                    <div class="ms-auto lh-1">

                                    </div>
                                </div>
                                <div class="d-flex align-items-baseline">
                                    <div class="h1 mb-3 me-2"><?= $users; ?> <span class="subheader text-blue">users in
                                            system</span></div>
                                    <div class="me-auto">
                                        <span class="text-green d-inline-flex align-items-center lh-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <polyline points="3 17 9 11 13 15 21 7" />
                                                <polyline points="14 7 21 7 21 14" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div id="chart-active-users" class="chart-sm"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Invoices</h3>
                            </div>
                            <div class="card-body border-bottom py-3">
                                <div class="d-flex">
                                    <div class="text-muted">
                                        Show
                                        <div class="mx-2 d-inline-block">
                                            <input type="text" class="form-control form-control-sm" value="8" size="3"
                                                aria-label="Invoices count">
                                        </div>
                                        entries
                                    </div>
                                    <div class="ms-auto text-muted">
                                        Search:
                                        <div class="ms-2 d-inline-block">
                                            <input type="text" class="form-control form-control-sm"
                                                aria-label="Search invoice">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">

                                <table class="table card-table table-vcenter text-nowrap datatable table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Client Name</th>
                                            <th>Payment Mode</th>
                                            <th>Date Issued</th>
                                            <th>Amount Paid</th>
                                            <th></th>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $query = "SELECT * FROM orders";
                                        $query_run = mysqli_query($conn, $query);

                                        if (mysqli_num_rows($query_run) > 0) {
                                            // code...
                                            foreach ($query_run as $row) {
                                                // code...
                                                //echo $row['serviceId'];
                                        ?>
                                        <tr>
                                            <td><span class="text-muted"><?= $row['id']; ?></span></td>
                                            <td><span><?= $row['name']; ?></span></td>
                                            <td><span><?= $row['pmode']; ?></span></td>
                                            <td><span><?= $row['date']; ?></span></td>
                                            <td><span><strong>GHc
                                            </strong><?= number_format($row['amount_paid'], 2); ?></span></td>
                                            <td class="text-end">
                                                <span class="dropdown">
                                                <!--  <a href="./connection/action.php?edittrans=<?= $row['id']; ?>">
                                                    <button class="btn btn-success btn-sm align-text-top"> <svg
                                                            xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                                            <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                                            <line x1="16" y1="5" x2="19" y2="8" />
                                                        </svg>Edit</button>
                                                      </a>
                                                      <a >
                                                    <button class="btn btn-danger btn-sm align-text-top"><svg
                                                            xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <line x1="4" y1="7" x2="20" y2="7" />
                                                            <line x1="10" y1="11" x2="10" y2="17" />
                                                            <line x1="14" y1="11" x2="14" y2="17" />
                                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                        </svg>
                                                        Delete</button>-->
                                                      </a>
                                                      <a href="print.php?printout=<?= $row['id']; ?>">
                                                    <button class="btn btn-primary btn-sm align-text-top"><svg
                                                            xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                                                            <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                                                            <rect x="7" y="13" width="10" height="8" rx="2" />
                                                        </svg>
                                                        Print</button>
                                                      </a>
                            </div>
                            </span>
                            </td>
                            </tr>

                            <?php
                                            }
                                        } else {

                        ?>
                            <tr>
                                <td colspan="5">No Record Found</td>
                            </tr>

                            <?php
                                        }

                    ?>


                            </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            <p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of <span>16</span>
                                entries</p>
                            <ul class="pagination m-0 ms-auto">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <polyline points="15 6 9 12 15 18" />
                                        </svg>
                                        prev
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        next <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <polyline points="9 6 15 12 9 18" />
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Footer-->
        <?php require './includes/footer.php'; ?>
    </div>
    </div>
    <!--Modal-->
    <?php require './includes/modals.php'; ?>
    <!--Modal Ends-->

    <!--Scripts-->
    <?php require './includes/scripts.php'; ?>
    <!--Scripts Ends-->
    <script type="text/javascript">
      function OrderDelete()
    </script>
</body>

</html>
