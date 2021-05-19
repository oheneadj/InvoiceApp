<?php

require './dbconnect.php';
require './config.php';

if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pqty = 1;
    $pcode = $_POST['pcode'];

    $stmt = $conn->prepare("SELECT serviceName FROM cart WHERE  serviceName =?");
    $stmt->bind_param("s", $pname);
    $stmt->execute();
    $res = $stmt->get_result();
    $r = $res->fetch_assoc();

    $code = $r['serviceName'];

    if ($code != $pname) {
        // code...
        $query = $conn->prepare("INSERT INTO cart (serviceName,serviceAmount,qty,total_price,service_code) VALUES (?,?,?,?,?)");
        $query->bind_param("ssiss", $pname, $pprice, $pqty, $pprice, $pcode);
        $query->execute();

        echo '<div  class="alert alert-important alert-success alert-dismissible" role="alert">
         <div class="d-flex">
             <div>

             </div>
             <div>
                 Service was added successfully.
             </div>
         </div>
         <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
     </div>';
    } else {
        // code...

        echo '<div  class="alert alert-important alert-danger alert-dismissible" role="alert">
         <div class="d-flex">
             <div>
                 <!-- SVG icon code with class="alert-icon" -->
             </div>
             <div>
                 Service was already added to cart.
             </div>
         </div>
         <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
     </div>';
    }
}


//Delete one item
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];

    $stmt = $conn->prepare("DELETE FROM cart WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'Item removed!';

    header('location: ../invoice.php?error=itemdeleted');
}

//Delete all
if (isset($_GET['clear'])) {
    $stmt = $conn->prepare("DELETE FROM cart");
    $stmt->execute();

    header('location: ../invoice.php?error=alldeleted');
}


//CheckOut
if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $pmode = $_POST['pmode'];
    $services = $_POST['services'];
    $amount_paid = $_POST['amount_paid'];
    //$user = $_POST['user'];


    $data = '';

    $stmt = $conn->prepare("INSERT INTO orders (name,address,number,email,pmode,services,amount_paid)VALUES(?,?,?,?,?,?,?)");
    $stmt->bind_param('sssssss', $name, $address, $number, $email, $pmode, $services, $amount_paid);
    $stmt->execute();
    $stmt2 = $conn->prepare('DELETE FROM cart');
    $stmt2->execute();

    $data .= '
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
                    <strong>' . $name . '</strong><br>
                      ' . $address . '<br>
                      ' . $number . '<br>
                      ' . $email . '<br>
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
                        <td>' . $services . '</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
              <tr>
                  <td colspan="4" class="font-weight-bold text-uppercase text-end">Total Due</td>
                  <td class="font-weight-bold text-end">GHc ' . number_format($amount_paid, 2) . '</td>
              </tr>
          </table>
          <p class="text-muted text-center mt-5">Thank you very much for doing business with us. We look
              forward to working with
              you again!</p>
      </div>
  </div>

  ';

    echo $data;
}


//Delete from Services

if (isset($_GET['serviceremove'])) {
    $id = $_GET['serviceremove'];

    $stmt = $conn->prepare("DELETE FROM services WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'Item removed!';

    header('location: ../services.php?error=serviceremove');
}

//Delete one item from dashboard transactions

/*if (isset($_GET['deletetrans'])) {
    $id = $_GET['deletetrans'];

    $stmt = $conn->prepare("DELETE FROM orders WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();


    header('location: ../dashboard.php?error=order');
}
*/

//Print
