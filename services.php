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

    <title>Services - Joack Consult.</title>
    <!-- CSS files -->
    <?php require './includes/head.php'; ?>

    <!--Database Connection-->
    <?php require_once './connection/dbconnect.php'; ?>
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
                    if ($_GET["error"] == "servicealreadyexists") {
                        // code...
                        echo '

                  <div class="alert alert-important alert-warning alert-dismissible" role="alert">
                      <div class="d-flex">
                          <div>
                              <!-- SVG icon code with class="alert-icon" -->
                          </div>
                          <div>
                              Sorry! This service already exists in your system.
                          </div>
                      </div>
                      <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
                  </div>

                  ';
                    } elseif ($_GET["error"] == "stmtfailed") {
                        // code...
                        echo '
                  <div class="alert alert-important alert-warning alert-dismissible" role="alert">
                      <div class="d-flex">
                          <div>
                              <!-- SVG icon code with class="alert-icon" -->
                          </div>
                          <div>
                              Sorry! There was a problem with your request, please try again.
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
                                Dashboard
                            </div>
                            <h2 class="page-title">
                                Services
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <a href="#" class="btn btn-success d-none d-sm-inline-block" data-bs-toggle="modal"
                                    data-bs-target="#modal-report">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                    Add a service
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
                <div class="row row-deck row-cards">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Services</h3>
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
                                <table class="table card-table table-vcenter text-nowrap datatable">
                                    <thead>
                                        <tr>
                                            <th class="w-1"><input class="form-check-input m-0 align-middle"
                                                    type="checkbox" aria-label="Select all invoices"></th>
                                            <th class="w-1">No. <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <polyline points="6 15 12 9 18 15" />
                                                </svg>
                                            </th>
                                            <th>Service</th>
                                            <th>Price</th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $query = "SELECT * FROM services";
                                        $query_run = mysqli_query($conn, $query);

                                        if (mysqli_num_rows($query_run) > 0) {
                                            // code...
                                            foreach ($query_run as $row) {
                                                // code...
                                                //echo $row['serviceId'];
                                        ?>
                                        <tr>
                                            <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select invoice"></td>
                                            <td><span class="text-muted"><?= $row['id']; ?></span></td>
                                            <td><span><?= $row['serviceName']; ?></span></td>
                                            <td class="text-end">
                                              <span class="dropdown">
<!--                                                <a href="./connection/action.php?edittrans=<?= $row['id']; ?>">
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
                                                    </a>-->
                                                    <a href="./connection/action.php?serviceremove=<?= $row['id']; ?>" onClick="return confirm('Delete This account?')">
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
                                                      Delete</button>
                                                    </a>
                          </div>
                          </span>
                          </td>
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
                                            next <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
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
    <!--Edit Service Modal-->
    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="" action="./connection/addservices.php" method="post" autocomplete="on">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Service</label>
                                    <input name="service" type="text" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-danger link-secondary" data-bs-dismiss="modal"
                                data-bs-dismiss="modal">
                                Cancel
                            </a>
                            <button type="submit" name="submit" class="btn btn-primary ms-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                                Add New Service</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    <!--Add Service Modal-->
    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="" action="./connection/addservices.php" method="post" autocomplete="on">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Service</label>
                                    <input name="service" type="text" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-danger link-secondary" data-bs-dismiss="modal"
                                data-bs-dismiss="modal">
                                Cancel
                            </a>
                            <button type="submit" name="submit" class="btn btn-primary ms-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                                Add New Service</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--Scripts-->
        <?php require './includes/scripts.php'; ?>
        <!--Scripts Ends-->
</body>

</html>
