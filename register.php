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
    <title>Register in - Joack Consult</title>
    <!-- CSS files -->
    <?php require './includes/head.php'; ?>
</head>

<body class="antialiased border-top-wide border-primary d-flex flex-column">
    <div class="flex-fill d-flex flex-column justify-content-center py-4">
        <div class="container-tight py-6">
          <?php
          if (isset($_GET["error"])) {
            // code...
            if ($_GET["error"] == "passworddontmatch") {
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

            } else if ($_GET["error"] == "numberalreadytaken") {
              // code...
              echo '
              <div class="alert alert-important alert-warning alert-dismissible" role="alert">
                  <div class="d-flex">
                      <div>
                          <!-- SVG icon code with class="alert-icon" -->
                      </div>
                      <div>
                          Sorry! The number/email you entered is aleady taken.
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

            <div class="text-center mb-4">
                <h1>JOACK CONSULT</h1>
            </div>
            <form class="card card-md" action="./connection/signup.php" method="post" autocomplete="off">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Register your account</h2>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telephone Number</label>
                        <input type="text" name="number" class="form-control" placeholder="Enter telephone" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">
                            Password
                        </label>
                        <div class="input-group input-group-flat">
                            <input type="password" name="pwd" class="form-control" placeholder="Password"
                                autocomplete="off" required>
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
                        <label class="form-label">
                            Confirm Password
                        </label>
                        <div class="input-group input-group-flat">
                            <input type="password" name="pwdRepeat" class="form-control" placeholder="Password"
                                autocomplete="off" required>
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
                    <div class="form-footer">
                        <button type="submit" name="submit" class="btn btn-primary w-100">Sign in</button>
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
