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
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title> Create Invoice - Joack Consult</title>
    <!-- CSS files -->
    <?php require './includes/head.php'; ?>
    <!--Database Connection-->
    <?php require_once './connection/dbconnect.php'; ?>
</head>

<body class="antialiased">
    <div class="page">
        <!--Header-->
        <?php require './includes/header.php'; ?>
        <div class="content">
            <div class="container-xl">

                <?php
                if (isset($_GET["error"])) {
                    // code...
                    if ($_GET["error"] == "itemdeleted") {
                        // code...
                        echo '

              <div class="alert alert-important alert-warning alert-dismissible" role="alert">
                  <div class="d-flex">
                      <div>
                          <!-- SVG icon code with class="alert-icon" -->
                      </div>
                      <div>
                          The item was deleted successfully.
                      </div>
                  </div>
                  <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
              </div>

              ';
                    } elseif ($_GET["error"] == "alldeleted") {
                        // code...
                        echo '
              <div class="alert alert-important alert-warning alert-dismissible" role="alert">
                  <div class="d-flex">
                      <div>
                          <!-- SVG icon code with class="alert-icon" -->
                      </div>
                      <div>
                          All items were deleted!
                      </div>
                  </div>
                  <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
              </div>

              ';
                    }
                }
                ?>

                <div id="message">

                </div>

                <!-- Page title -->
                <div class="page-header d-print-none">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                Create an Invoice
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row row-cards">

                    <!-- Services -->

                    <div class="col-12">
                        <div class="card">
                            <form class="form-submit" action="">
                                <div class="table-responsive">
                                    <table class="table table-vcenter table-mobile-md card-table">
                                        <thead>
                                            <tr>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th class="w-1">&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                                                    <div class="  mb-3">
                                                        <label class="form-label">Select service</label>
                                                        <div class="input-group input-group-flat">
                                                            <select class="form-control form-select pname">
                                                                <option value="" selected disabled>Select Service
                                                                </option>
                                                                <?php
                                                                $query = "SELECT * FROM services";
                                                                $query_run = mysqli_query($conn, $query);

                                                                if (mysqli_num_rows($query_run) > 0) {
                                                                    // code...
                                                                    foreach ($query_run as $row) {
                                                                        // code...
                                                                ?>
                                                                <option value="<?= $row['serviceName']; ?>">
                                                                    <?= $row['serviceName']; ?></option>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <div class="  mb-3">
                                                        <label class="form-label">Amount</label>
                                                        <div class="input-group input-group-flat">
                                                            <input type="number" class="form-control ps-2 pprice"
                                                                autocomplete="off"
                                                                placeholder="Enter amount to be charged" required>
                                                            <input type="hidden" class="pcode"
                                                                value="<?= $row['service_code'] ?>">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td>

                                                    <div class=" mb-3 ">
                                                        <label class="form-label">&nbsp;</label>
                                                        <div class="input-group input-group-flat">
                                                            <button class="btn btn-primary addItemBtn"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                    <line x1="12" y1="5" x2="12" y2="19" />
                                                                    <line x1="5" y1="12" x2="19" y2="12" />
                                                                </svg>
                                                                Add Service
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>



                        <!--Cart-->

                        <div class="col-12 mt-5">
                            <div style=" display: <?php if (isset($_SESSION['showAlert'])) {
                                                        echo $_SESSION['showAlert'];
                                                    } else {
                                                        echo 'none';
                                                    }
                                                    unset($_SESSION['showAlert']); ?>"
                                class="alert alert-important alert-success alert-dismissible" role="alert">
                                <div class="d-flex">
                                    <div>
                                        <!-- SVG icon code with class="alert-icon" -->
                                    </div>
                                    <div>
                                        <?php if (isset($_SESSION['message'])) {
                                            echo $_SESSION['message'];
                                        }
                                        unset($_SESSION['showAlert']); ?>
                                    </div>
                                </div>
                                <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
                            </div>
                            <div class="col">
                                <h2 class="page-title m-2">
                                    Items Added
                                </h2>
                            </div>
                            <div class="card">
                                <div class="table-responsive">
                                    <table class="table table-vcenter table-mobile-md card-table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Service</th>
                                                <th></th>
                                                <th>Price</th>
                                                <th class="w-1">
                                                    <a href="./connection/action.php?clear=all"
                                                        class="btn btn-sm btn-danger me-auto">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
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
                                                        Clear All
                                                    </a>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require './connection/dbconnect.php';
                                            require './connection/config.php';

                                            $stmt = $conn->prepare("SELECT * FROM cart");
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            $grand_total = 0;

                                            while ($row = $result->fetch_assoc()) :
                                            ?>
                                            <tr>
                                                <td data-label="Name">
                                                    <div class="d-flex py-1 align-items-center">
                                                        <div class="flex-fill">
                                                            <div class="font-weight-medium"><?= $row['id'] ?></div>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td data-label="Title">
                                                    <div><?= $row['serviceName'] ?></div>
                                                </td>
                                                <td></td>
                                                <td class="text-muted" data-label="Role">
                                                    <strong>GHc </strong><?= number_format($row['serviceAmount'], 2); ?>
                                                </td>
                                                <td>
                                                    <div class="btn-list flex-nowrap">
                                                        <a href="./connection/action.php?remove=<?= $row['id']; ?>"
                                                            class="btn btn-outline-danger me-auto">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <line x1="4" y1="7" x2="20" y2="7" />
                                                                <line x1="10" y1="11" x2="10" y2="17" />
                                                                <line x1="14" y1="11" x2="14" y2="17" />
                                                                <path
                                                                    d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                            </svg>
                                                            Clear
                                                        </a>
                                                    </div>
                                </div>
                            </div>
                            </td>
                            </tr>
                            <?php $grand_total += $row['total_price']; ?>
                            <?php endwhile; ?>
                            <tr>
                                <td data-label="Name">
                                </td>
                                <td data-label="Title">

                                </td>
                                <td><strong>Grand Total</strong></td>
                                <td class="text-muted" data-label="Role">
                                    <h3><strong>GHc <?= number_format($grand_total, 2); ?></strong> </h3>
                                </td>
                                <td>
                                    <div class="btn-list flex-nowrap">

                                        <a href="checkout.php"
                                            class="btn btn-success <?= ($grand_total > 1) ? "" : "disabled" ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <circle cx="6" cy="19" r="2" />
                                                <circle cx="17" cy="19" r="2" />
                                                <path d="M17 17h-11v-14h-2" />
                                                <path d="M6 5l6.005 .429m7.138 6.573l-.143 .998h-13" />
                                                <path d="M15 6h6m-3 -3v6" />
                                            </svg> Check Out
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
    <!--Footer-->
    <?php require './includes/footer.php'; ?>
    </div>
    </div>

    <!--Scripts-->
    <?php require './includes/scripts.php'; ?>
    <script src="./dist/js/jquery.min.js"></script>
    <script src="./dist/js/propper.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $(".addItemBtn").click(function(e) {
            var $form = $(this).closest(".form-submit");
            var pid = $form.find(".pid").val();
            var pname = $form.find(".pname").val();
            var pprice = $form.find(".pprice").val();
            var pcode = $form.find(".pcode").val();

            $.ajax({
                url: './connection/action.php',
                method: 'post',
                data: {
                    pid: pid,
                    pname: pname,
                    pprice: pprice,
                    pcode: pcode
                },
                success: function(response) {
                    $("#message").html(response);
                    window.scrollTo(0, 0);
                }
            });
        });
    });
    </script>
    <!--Scripts Ends-->
</body>

</html>