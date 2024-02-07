<?php
include "dbconnect.php";
if ($_POST) {
  $p_name = $_POST['p_name'];
  $p_price = $_POST['p_price'];
  $p_detail = $_POST['p_detail'];
  $q = mysqli_query($con, "INSERT INTO product(p_name, p_price, p_detail) VALUES ('$p_name','$p_price','$p_detail')");

  if ($q) {
    echo "<script type='text/javascript'>alert('Record Added');window.location='view_product.php';</script>";
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/styles.min.css" />
</head>

<body>
  <div class="container mt-5 col-lg-4">
    <h1> Add Product</h1>
    <form>
      <div class="form-group">
        <label >Name</label>
        <input type="text" name="pro_titile" class="form-control m-2"  placeholder="Enter Name">
      </div>
      <div class="form-group">
        <label >Details</label>
        <textarea  class="form-control m-2" placeholder="Enter Product Detials"></textarea>
      </div>
      <div class="form-group">
        <label >Price</label>
        <input type="text" name="pro_price" class="form-control m-2"  placeholder="Enter Price">
      </div>
      <div class="form-group">
        <label>Image</label>
        <input type="file" name="pro_image" class="form-control m-2">
      </div>
      <div class="form-group">
        <label >Price</label>
        <input type="text" name="pro_price" class="form-control m-2"  placeholder="Enter Price">
      </div>
      <div class="form-group">

        <label >Sub Category</label>
        <select>
        <?php
        $q = mysqli_query($con,"select * from sub_cetegory")or die(mysqli_error($con));
        while($r = mysqli_fetch_array($q))
        {
        ?>
          <option value=""></option>
        </select>
      </div>
      
      
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

</body>
<script src="assets/libs/jquery/dist/jquery.min.js"></script>
<script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/sidebarmenu.js"></script>
<script src="assets/js/app.min.js"></script>
<script src="assets/libs/simplebar/dist/simplebar.js"></script>

</html>