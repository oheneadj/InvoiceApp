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
    <title>CheckOut - Joack Consult</title>
    <!-- CSS files -->
    <?php require './includes/head.php'; ?>
    <?php
    require './connection/dbconnect.php';
    require './connection/config.php';


    $grand_total = 0;
    $allItems = '';
    $items = array();

    $sql = "SELECT CONCAT(serviceName, '(',qty,')') AS ItemQty, total_price FROM cart";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $grand_total += $row['total_price'];
        $items[] = $row['ItemQty'];
    }
    $allItems = implode(",", $items);
    ?>
</head>

<body class="antialiased border-top-wide border-primary d-flex flex-column">

    <div class="flex-fill d-flex flex-column justify-content-center py-4" id="order">

        <div class="container-tight py-6">
            <a href="./invoice.php" class="btn btn-primary mb-3">Go to Invoice Page</a>

            <div class="card mb-3">
                <div class="card-header">
                    <h3 class="card-title">Services</h3>
                </div>
                <div class="list-group list-group-flush list-group-hoverable">



                    <?php
                    $itemslengnth = count($items);

                    for ($x = 0; $x < $itemslengnth; $x++) {
                        echo '<div class="list-group-item">
                      <div class="row align-items-center">
                        <div class="col-auto"><span class="badge bg-blue"></span></div>
                        <div class="col-auto">
                        </div>
                        <div class="col text-truncate">
                          <a href="#" class="text-body d-block">

                          ' . $items[$x] . '

                          </a>
                        </div>
                      </div>
                    </div>';
                    }; ?>
                </div>
                <div class="card-footer">
                    <h4 class="text-danger">Total Amount: <span><strong>GHc
                                <?= number_format($grand_total, 2); ?></strong></h4>
                </div>
            </div>
            <form class="" action="" method="POST" id="placeOrder">
                <div class="text-center mb-4">
                    <a href="."><img src="./static/logo.svg" height="36" alt=""></a>
                </div>
                <div class="card card-md">
                    <div class="card-body text-center py-3 p-sm-3">
                        <h3 class="mt-1">Complete your order!</h3>
                    </div>
                    <div class="hr-text hr-text-center hr-text-spaceless">CLient Details</div>
                    <div class="card-body">


                        <div class="mb-3">
                            <label class="form-label">Client Name<span class="text-danger">*</span></label>
                            <div class="input-group input-group-flat">
                                <input name="name" type="text" class="form-control ps-2" autocomplete="off"
                                    placeholder="Eg. John Kofi/Company Ltd " required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address<span class="text-danger">*</span></label>
                            <div class="input-group input-group-flat">
                                <input name="address" type="text" class="form-control ps-2" autocomplete="off"
                                    placeholder="House No/ Digital Address/ Post Office" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Number<span class="form-help text-danger" data-bs-toggle="popover"
                                    data-bs-placement="top" data-bs-html="true"
                                    data-bs-content="<p> This field is required an must not be left empty.</p>">?</span></label>
                            <div class="input-group input-group-flat">
                                <input name="number" type="tel" class="form-control ps-2" autocomplete="off"
                                    placeholder="Eg. 0241234567" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <div class="input-group input-group-flat">
                                <input name="email" type="email" class="form-control ps-2" autocomplete="off"
                                    placeholder="Eg. client@email.com">
                            </div>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Payment Method</label>
                            <div class="input-group input-group-flat">
                                <select class="form-control form-select" name="pmode">
                                    <option value="" selected disabled>Select Payment Method</option>
                                    <option value="Cash">Cash</option>
                                    <option value="MobileMoney">Mobile Money</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="services" value="<?php echo $allItems; ?>">
                        <input type="hidden" name="amount_paid" value="<?php echo $grand_total; ?>">
                    </div>
                </div>
                <div class="row align-items-center mt-3">
                    <div class="col-6">
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    <a href="oheneadjei.com">&copy; Vybrant Web</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="btn-list justify-content-end">
                            <input value="Save Order" name="submit" type="submit" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <!--Scripts-->
    <?php require './includes/scripts.php'; ?>
    <script src="./dist/js/jquery.min.js"></script>
    <script src="./dist/js/propper.min.js"></script>
    <!--Ajax Scripts-->

    <script type="text/javascript">
    $(document).ready(function() {

        // Sending Form data to the server
        $("#placeOrder").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: './connection/action.php',
                method: 'post',
                data: $('form').serialize() + "&action=order",
                success: function(response) {
                    $("#order").html(response);
                }
            });
        });
    });
    </script>
    <!--Scripts Ends-->
</body>

</html>