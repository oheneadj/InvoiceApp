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
    <title>Login in - Invoice App</title>
    <!-- CSS files -->
    <?php require './includes/head.php'; ?>
</head>

<body class="antialiased border-top-wide border-primary d-flex flex-column">
    <div class="flex-fill d-flex flex-column justify-content-center py-4">
        <div class="container-tight py-6">
          <?php
          if (isset($_GET["error"])) {
            // code...
            if ($_GET["error"] == "none") {
              // code...
              echo '
              <div class="alert alert-important alert-success alert-dismissible" role="alert">
                  <div class="d-flex">
                      <div>
                          <!-- SVG icon code with class="alert-icon" -->
                      </div>
                      <div>
                          Your registration was sucessful, please login!
                      </div>
                  </div>
                  <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
              </div>

              ';
            }
            elseif ($_GET["error"] == "wronglogin") {
              // code...
              echo '
              <div class="alert alert-important alert-warning alert-dismissible" role="alert">
                  <div class="d-flex">
                      <div>
                          <!-- SVG icon code with class="alert-icon" -->
                      </div>
                      <div>
                          Username or Password incorrect. Please try again!
                      </div>
                  </div>
                  <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
              </div>

              ';
            }
            elseif ($_GET["error"] == "emptyinput") {
              // code...
              echo '
              <div class="alert alert-important alert-warning alert-dismissible" role="alert">
                  <div class="d-flex">
                      <div>
                          <!-- SVG icon code with class="alert-icon" -->
                      </div>
                      <div>
                          Fields cannot be empty!
                      </div>
                  </div>
                  <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
              </div>

              ';
            }
            elseif ($_GET["error"] == "logout") {
              // code...
              echo '
              <div class="alert alert-important alert-warning alert-dismissible" role="alert">
                  <div class="d-flex">
                      <div>
                          <!-- SVG icon code with class="alert-icon" -->
                      </div>
                      <div>
                          You have logged out of the system!
                      </div>
                  </div>
                  <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
              </div>

              ';
            }
            elseif ($_GET["error"] == "accessdenied") {
              // code...
              echo '
              <div class="alert alert-important alert-warning alert-dismissible" role="alert">
                  <div class="d-flex">
                      <div>
                          <!-- SVG icon code with class="alert-icon" -->
                      </div>
                      <div>
                          Access Denied! Please login to access the system.
                      </div>
                  </div>
                  <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
              </div>

              ';
            }
          }

           ?>



            <div class="text-center mb-4">
                <h1>JOACK CONSULT</h1>
            </div>
            <form class="card card-md" action="./connection/login.php" method="post" autocomplete="off">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Login to your account</h2>
                    <div class="mb-3">
                        <label class="form-label">Username / Telephone Number</label>
                        <input name="number" type="text" class="form-control" placeholder="Enter Email or telephone" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">
                            Password
                            <span class="form-label-description">
                                <a href="#">I forgot my password</a>
                            </span>
                        </label>
                        <div class="input-group input-group-flat">
                            <input  name="pwd" type="password" class="form-control" placeholder="Password" autocomplete="off" required>
                            <span class="input-group-text">
                                <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><svg
                                        xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <circle cx="12" cy="12" r="2" />
                                        <path
                                            d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                    </svg>
                                </a>
                            </span>
                        </div>
                    </div>
                    <div class="mb-2">

                    </div>
                    <div class="form-footer">
                        <button name="submit" type="submit" class="btn btn-primary w-100">Sign in</button>
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
