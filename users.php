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

    <title>Users - Joack Consult.</title>
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
                              Sorry! This user already exists in your system.
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
                            User has been added successfully!
                        </div>
                    </div>
                    <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
                </div>

                ';
                    } else if ($_GET["error"] == "updated") {
                        // code...
                        echo '

                <div class="alert alert-important alert-success alert-dismissible" role="alert">
                    <div class="d-flex">
                        <div>
                            <!-- SVG icon code with class="alert-icon" -->
                        </div>
                        <div>
                            User has been updated successfully!
                        </div>
                    </div>
                    <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
                </div>

                ';
              } else if ($_GET["error"] == "updateerror") {
                        // code...
                        echo '

                <div class="alert alert-important alert-warning alert-dismissible" role="alert">
                    <div class="d-flex">
                        <div>
                            <!-- SVG icon code with class="alert-icon" -->
                        </div>
                        <div>
                            Something went wrong whiles processing your request, please try again
                        </div>
                    </div>
                    <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
                </div>

                ';
                    } else if ($_GET["error"] == "userdelete") {
                        // code...
                        echo '

                <div class="alert alert-important alert-danger alert-dismissible" role="alert">
                    <div class="d-flex">
                        <div>
                            <!-- SVG icon code with class="alert-icon" -->
                        </div>
                        <div>
                            User account has been deleted and can not be restored.
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
                                Users
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <a href="register.php" class="btn btn-success d-none d-sm-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                    Add a user
                                </a>
                                <a href="register.php" class="btn btn-primary d-sm-none btn-icon"  aria-label="Create new report">
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
                                <h3 class="card-title">Users</h3>
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
                                <table id="example" class="table card-table table-vcenter text-nowrap datatable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Number</th>
                                            <th>Password</th>
                                            <th></th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $query = "SELECT * FROM users";
                                        $query_run = mysqli_query($conn, $query);

                                        if (mysqli_num_rows($query_run) > 0) {
                                            // code...
                                            foreach ($query_run as $row) {
                                                // code...
                                                //echo $row['serviceId'];
                                        ?>
                                        <tr>
                                            <td><span class="text-muted"><?= $row['usersName']; ?></span></td>
                                            <td><span><?= $row['usersEmail']; ?></span></td>
                                            <td><span><?= $row['usersNumber']; ?></span></td>
                                            <td><span>*********</span></td>
                                            <td class="text-end">
                                              <span class="dropdown">
                                                <form class="" action="edituser.php" method="post">
                                                  <input type="hidden" name="edit_id" value="<?php echo $row['usersId']; ?>">
                                                  <button class="btn btn-success btn-sm align-text-top" type="submit" name="edit_btn"> <svg
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
                                                </form>
                                            </td>
                                            <td>
                                                  <a href="./connection/action.php?userdelete=<?= $row['usersId']; ?>" onClick="return confirm('Delete this user?')">
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
    <script type="text/javascript">
      $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
    <!--Device Type Modal-->
    <?php require './includes/modals.php'; ?>
        <!--Scripts-->
        <?php require './includes/scripts.php'; ?>
        <!--Scripts Ends-->
</body>

</html>
