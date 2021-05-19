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
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Company Details - Joack Consult</title>
    <!-- CSS files -->
<?php require './includes/head.php'; ?>
  </head>
  <body class="antialiased border-top-wide border-primary d-flex flex-column">
    <div class="flex-fill d-flex flex-column justify-content-center py-4">
      <div class="container-tight py-6">
        <form class="" action="#" method="post">
        <div class="text-center mb-4">
          <a href="."><img src="./static/logo.svg" height="36" alt=""></a>
        </div>
        <div class="card card-md">
          <div class="card-body text-center py-4 p-sm-4">
            <h1 class="mt-1">Enter your company details!</h1>
          </div>
          <div class="hr-text hr-text-center hr-text-spaceless">your data</div>
          <div class="card-body">



            <div class="mb-3">
              <label class="form-label">Company Name</label>
              <div class="input-group input-group-flat">
                <input type="text" class="form-control ps-2"  autocomplete="off" placeholder="Eg. Vybrant Web Company" required>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Digital Address</label>
              <div class="input-group input-group-flat">
                <input type="text" class="form-control ps-2"  autocomplete="off" placeholder="Eg. AA-1234-5678" required>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Postal Address</label>
              <div class="input-group input-group-flat">
                <input type="text" class="form-control ps-2"  autocomplete="off" placeholder="Eg. Box 123, Accra" required>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Location</label>
              <div class="input-group input-group-flat">
                <input type="text" class="form-control ps-2"  autocomplete="off" placeholder="Circle Near Market">
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Number</label>
              <div class="input-group input-group-flat">
                <input type="text" class="form-control ps-2"  autocomplete="off" placeholder="Eg. 0241234567" required>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <div class="input-group input-group-flat">
                <input type="email" class="form-control ps-2"  autocomplete="off" placeholder="Eg. mycompany@email.com" required>
              </div>
            </div>
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
              <button href="#" name="submit" type="submit" class="btn btn-primary">
                Save details
              </button>
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
    <!--Scripts Ends-->
  </body>
</html>
