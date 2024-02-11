<?php
require "include/dbconnect.php";
session_start();
if (!isset($_SESSION['user_email'])) {
  header("location:login.php");
}
if (isset($_POST['submit'])) {
  $cat_name = mysqli_real_escape_string($con, $_POST['cat_name']);
  $is_active = mysqli_real_escape_string($con, $_POST['is_active']);

  $insertq = mysqli_query($con, "INSERT INTO category(cat_name,is_active) VALUES 
  ('{$cat_name}','{$is_active}')") or die(mysqli_error($con));

  if ($insertq) {
    echo "<script>alert('Category Added'); window.location='index.php';</script>";
  } else {
    echo "<script>alert('Somethong wents wrong ');</script>";
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Category</title>
  <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/styles.min.css" />
</head>

<body>
<?php include "include/navbar.php";?>
  <div class="container mt-5 col-lg-4">
    <h1> Add Sub Category</h1>
    <form action="" method="POST">
      <div class="form-group">
        <label>Category Name</label>
        <input type="text" name="   cat_name" class="form-control m-2" placeholder="Enter Category">
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