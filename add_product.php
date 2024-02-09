<?php
require "dbconnect.php";
if (isset($_POST['submit'])) {
  $pro_title = mysqli_real_escape_string($con, $_POST['pro_title']);
  $pro_detail = mysqli_real_escape_string($con, $_POST['pro_detail']);
  $pro_price = mysqli_real_escape_string($con, $_POST['pro_price']);
  $pro_image = $_FILES['pro_image']['name'];
  $sub_cat_id1 = mysqli_real_escape_string($con, $_POST['sub_cat_id1']);
  $pro_qty = mysqli_real_escape_string($con, $_POST['pro_qty']);
  $is_active = mysqli_real_escape_string($con, $_POST['is_active']);

  $insertq = mysqli_query($con, "INSERT INTO product_master(pro_title, pro_detail, pro_price, pro_image, sub_cat_id, pro_qty, is_active, is_delete) VALUES ('{$pro_title}','{$pro_detail}','{$pro_price}','{$pro_image}','{$sub_cat_id1}','{$pro_qty}','{$is_active}','0')") or die(mysqli_error($con));

  if ($insertq) {
    $fileupload = move_uploaded_file($_FILES['pro_image']['tmp_name'], "image/" . $pro_image);
    if ($fileupload) {
      echo "<script>alert('Product Added');  window.location='display_product.php';</script>";
    } else {
      echo "<script>alert('Somethong wents wrong ');</script>";
    }
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Product</title>
  <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/styles.min.css" />
</head>

<body>
<?php include "include/navbar.php";?>
  <div class="container mt-5 col-lg-4">
    <h1> Add Product</h1>
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="pro_title" class="form-control m-2" placeholder="Enter Name">
      </div>
      <div class="form-group">
        <label>Details</label>
        <textarea class="form-control m-2" name="pro_detail" placeholder="Enter Product Detials"></textarea>
      </div>
      <div class="form-group">
        <label>Price</label>
        <input type="text" name="pro_price" class="form-control m-2" placeholder="Enter Price">
      </div>
      <div class="form-group">
        <label>Image</label>
        <input type="file" name="pro_image" class="form-control m-2">
      </div>

      <div class="form-group">
        <label>Sub Category</label>
        <select class="form-control m-2" name="sub_cat_id1">
          <option class="text-center" value="#" selected disabled>----Select----</option>
          <?php
          $q = mysqli_query($con, "select * from sub_category") or die(mysqli_error($con));
          while ($r = mysqli_fetch_array($q)) {
            extract($r);
          ?>
            <option value="<?php echo $sub_cat_id; ?>"><?php echo $sub_cat_name; ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label> Qty</label>
        <input type="text" name="pro_qty" class="form-control m-2" placeholder="Enter Qty">
      </div>
      <div class="form-group">
        <label>Is Active</label>
        <select class="form-control m-2" name="is_active">
          <option class="text-center" value="#" selected disabled>----Select----</option>
          <option value="1">Yes</option>
          <option value="0">No</option>
        </select>
      </div>

      <div class="d-flex justify-content-center m-3">
        <input type="submit" class="btn btn-primary" name="submit">
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