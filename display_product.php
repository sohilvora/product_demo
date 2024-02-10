<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/styles.min.css" />
</head>

<body>
    <?php include "include/navbar.php"; ?>
    <section style="background-color: #eee;">
        <div class="text-center container py-5">

            <h4 class="mt-4 mb-5"><strong>Products</strong></h4>
            <?php

            require "include/dbconnect.php";
            $subq = mysqli_query($con, "SELECT * FROM sub_category") or die(mysqli_error($con));
            while ($subcatrow = mysqli_fetch_array($subq)) {
                extract($subcatrow);
                echo "|<a href='display_product.php?subcatid={$sub_cat_id}' class='p-2 text-dark fw-bolder'>{$sub_cat_name}</a>|";
            }
            ?>
            <div class="row p-5">
                <?php
                if (isset($_GET['subcatid'])) {
                    $subcatid1 = $_GET['subcatid'];
                    $q = mysqli_query($con, "SELECT * FROM product_master where sub_cat_id ='{$subcatid1}'") or die(mysqli_error($con,));
                    $count = mysqli_num_rows($q);
                    if ($count < 1) {
                        echo  "No Records Found";
                    }
                } else if (isset($_GET['search'])) {
                    $search = $_GET['search'];
                    $q = mysqli_query($con, "SELECT * FROM product_master where pro_title like '%$search%'") or die(mysqli_error($con,));
                } else if (isset($_GET['starting']) && isset($_GET['ending'])) {

                    $starting = $_GET['starting'];
                    $ending = $_GET['ending'];
                    $q = mysqli_query($con, "SELECT * FROM product_master where pro_price between $starting and $ending") or die(mysqli_error($con,));
                } else {
                    $q = mysqli_query($con, "SELECT * FROM product_master") or die(mysqli_error($con,));
                }
                while ($r = mysqli_fetch_array($q)) {
                    extract($r);
                ?>
                    <div class="col-lg-4 col-md-12 mb-4">
                        <div class="card">
                            <div class="bg-image">
                                <img src="image/<?php echo $pro_image ?>" class="w-100" />
                                <a href="#!">
                                    <div class="mask">
                                        <div class="d-flex justify-content-start align-items-end h-100">
                                            <h5><span class="badge bg-primary ms-2">New</span></h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="card-body">
                                
                                    <a href="detail_product.php?pid=<?php echo $pro_id?>" class="card-title mb-3 fw-bolder"><?= $pro_title ?></a>
                                
                                <h5 class="card-title mb-3"><?= $pro_detail ?></h5>
                                <p>Category</p>
                                <h6 class="mb-3"><?php echo "₹ " . $pro_price; ?></h6>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
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