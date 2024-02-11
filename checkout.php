<?php
require "include/dbconnect.php";
session_start();
if (!isset($_SESSION['user_email'])) {
    header("location:login.php");
}
if ($_POST) {
    $shipping_name = mysqli_real_escape_string($con, $_POST['name']);
    $shipping_mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $shipping_address = mysqli_real_escape_string($con, $_POST['address']);
    $orderdate = date('d-m-y');
    $user_id = $_SESSION['user_id'];

    $ordermasterq = mysqli_query($con, "INSERT INTO order_master(order_date, user_id, order_status, shipping_name,shipping_address, shipping_mobile) 
    VALUES ('{$orderdate}','{$user_id}','pending','{$shipping_name}','{$shipping_address}','{$shipping_mobile}')") or die(mysqli_error($con));

    $order_id = mysqli_insert_id($con);

    foreach ($_SESSION['productcart'] as $key => $value) {
        $productq = mysqli_query($con, "select * from product_master where  pro_id={$value}") or die(mysqli_error($con));
        $prod = mysqli_fetch_array($productq);
        extract($prod);

        $product_qty = $_SESSION['qtycart'][$key];
        
        $orderdetailq = mysqli_query($con,"insert into order_details(order_id,product_id,product_qty,product_price)values('{$order_id}','{$value}','{$product_qty}','{$pro_price}')") or die(mysqli_error($con));
    }
    unset($_SESSION['productcart']);
    unset($_SESSION['qtycart']);
    unset($_SESSION['countercart']);

    

        echo "<script>alert('Order Placed Successfully');  window.location='display_product.php';</script>";
    
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/styles.min.css" />
</head>

<body>
    <?php include "include/navbar.php"; ?>
    <div class="container mt-5 col-lg-4">
        <h1> Add Product</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control m-2" placeholder="Enter Shipping Name">
            </div>
            <div class="form-group">
                <label>Mobile No.</label>
                <input type="text" name="mobile" class="form-control m-2" maxlength="10" placeholder="Enter Mobile Number">
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea class="form-control m-2" name="address" placeholder="Enter Shipping Address"></textarea>
            </div>
            <div class="d-flex justify-content-center m-3">
                <input type="submit" class="btn btn-success" name="Confirm Order">
            </div>
        </form>
    </div>

</body>
<script src="assets/libs/jquery/dist/jquery.min.js"></script>
<script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/sidebarmenu.js"></script>
<script src="assets/js/app.min.js"></script>
<script src="assets/libs/simplebar/dist/simplebar.js"></script>

</html>