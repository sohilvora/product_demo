<?php
require "include/dbconnect.php";
session_start();
if (!isset($_SESSION['user_email'])) {
    header("location:login.php");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    unset($_SESSION['productcart'][$id]);
    unset($_SESSION['qtycart'][$id]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/styles.min.css" />
</head>

<body>
    <?php include "include/navbar.php"; ?>
    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-lg-7">
                                    <h5 class="mb-3"><a href="display_product.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                                    <hr>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div>
                                            <p class="mb-1">Shopping cart</p>
                                        </div>
                                    </div>
                                    <?php
                                    if (isset($_SESSION['productcart']) && !empty($_SESSION['productcart'])) {
                                        $subt = 0;
                                        $totq = 0;
                                        foreach ($_SESSION['productcart'] as $key => $value) {
                                            $productq = mysqli_query($con, "select * from product_master where  pro_id={$value}") or die(mysqli_error($con));
                                            $prod = mysqli_fetch_array($productq);
                                            extract($prod);
                                            $qty = $_SESSION['qtycart'][$key];
                                    ?>
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex flex-row align-items-center">
                                                            <div class="d-flex">
                                                                <img src="image/<?= $pro_image; ?>" class="img-fluid rounded-3" alt="" style="width: 65px;">
                                                                <p><?= $pro_title; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-row align-items-center">
                                                            <div style="width: 50px;">
                                                                <h5 class="fw-normal mb-0"><?= $qty; ?></h5>
                                                            </div>
                                                            <div style="width: 80px;" class="mx-1">
                                                                <h5 class="mb-0 text-end"><?= $tot = $qty * $pro_price; ?></h5>
                                                            </div>
                                                            <a href="?id=<?= $key ?>" class="btn btn-danger mx-2">Remove</a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                            $subt = $subt + $tot;
                                            $totq = $totq + $qty;
                                        } ?>

                                </div>

                                <div class="col-lg-5">
                                    <div class="card bg-primary text-white rounded-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <h5 class="mb-0">Total Amount to Pay</h5>
                                            </div>

                                            <hr class="my-4">

                                            <div class="d-flex justify-content-between">
                                                <p class="mb-2">Subtotal</p>
                                                <p class="mb-2">₹<?= $subt; ?>.00</p>
                                            </div>

                                            <div class="d-flex justify-content-between">
                                                <p class="mb-2">Shipping</p>
                                                <p class="mb-2">₹50.00</p>
                                            </div>

                                            <div class="d-flex justify-content-between mb-4">
                                                <p class="mb-2">Total(Incl. taxes)</p>
                                                <p class="mb-2">₹<?= $subt + 50; ?>.00</p>
                                            </div>

                                            <a href="checkout.php" class="btn btn-warning btn-block btn-lg d-flex">
                                                <div class="d-flex justify-content-between">

                                                    <span>Check out</span>
                                                </div>
                                            </a>
                                        <?php
                                    } else {
                                        echo "Cart is Empty";
                                        echo "<br><br><a href='display_product.php' class='btn btn-primary'>Click here to Buy Products</a>";
                                    }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="assets/libs/jquery/dist/jquery.min.js"></script>
<script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/sidebarmenu.js"></script>
<script src="assets/js/app.min.js"></script>
<script src="assets/libs/simplebar/dist/simplebar.js"></script>

</html>