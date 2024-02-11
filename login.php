<?php
session_start();
require("include/dbconnect.php");
if ($_POST) {
    $user_email = $_POST['email'];
    $user_password = $_POST['ps'];

    $q = mysqli_query($con, "select * from register where user_email='" . $user_email . "' and user_password = '" . $user_password . "' ");
    $count = mysqli_num_rows($q);
    $row = mysqli_fetch_array($q);

    if ($count > 0) {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['user_email'] = $row['user_email'];

        header('location:index.php');
    } else {
        echo "<script>alert('Could'nt Login');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login Page</title>
</head>

<body>
    

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.png" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/styles.min.css" />
    </head>

    <body>
        <?php include "include/navbar.php"; ?>
        <div class="container mt-5 col-lg-2">
            <h1 class="text-center"> Login</h1>
            <form action="" method="POST">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" placeholder="Enter Email" class="form-control m-2">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="ps" placeholder="Enter password" class="form-control m-2">
                </div>


                <div class="d-flex justify-content-center m-3">
                    <input type="submit" class="btn btn-primary" name="Login">
                </div>
            </form>
        </div>

    </body>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.js"></script>

</body>

</html>