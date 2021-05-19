<?php
if (isset($_POST['signup-submit'])) {

    require 'dbconnect.php';

    $name            = $_POST['name'];
    $email           = $_POST['email'];
    $number          = $_POST['number'];
    $password        = $_POST['password'];
    $passwordReapeat = $_POST['password-repeat'];

    if (empty($name) || empty($email) || empty($number) || empty($password) || empty($passwordReapeat)) {
        header("Location:../register.php?error=emptyfields&name=" . $name . "&number=" . $number . "&email=" . $email);
        exit(); # code...
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $name)) {
        header("Location:../register.php?error=invalidnamemailnumber");
        exit(); # code...
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location:../register.php?error=invalidemails&name=" . $name . "&number=" . $number);
        exit(); # code...
    } //elseif (!preg_match("/^[a-zA-Z0-9]*$/", $email)) {
    // header("Location:../register.php?error=invalidname=&email" . $email);
    // exit(); # code...
} elseif ($password !== $passwordReapeat) {
    header("Location:../register.php?error=passwordcheck&name" . $email . "&number=" . $number);
    exit(); # code...
} else {
    $sql = "SELECT number FROM users WHERE number =?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../register.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $number);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0) {
            header("Location:../register.php?error=numberexits&number" . $name . "&email=" . $email);
            exit();
        } else {
            $sql = "INSERT INTO users (name, email, number, password) VALUES (?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location:../register.php?error=sqlerror");
                exit();
            } else {

                $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $number, $hashedpassword);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                header("Location:../dashboard.php?signup=success");
                exit();
            }
        }
    }
}
//mysqli_stmt_close($stmt);
//mysqli_close($conn); 