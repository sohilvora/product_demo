<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <header class="default-header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./add_category.php">Add Category</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./add_sub_cat.php">Add Sub Category</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./add_product.php">Add Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./display_product.php">Display Product</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Category
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php

                require "include/dbconnect.php";
                $subq = mysqli_query($con, "SELECT * FROM sub_category") or die(mysqli_error($con));
                while ($subcatrow = mysqli_fetch_array($subq)) {
                  extract($subcatrow);
                  echo "<li><a href='./display_product.php?subcatid={$sub_cat_id}' class='nav-link fw-bolder'>{$sub_cat_name}</a></li>";
                }
                ?>
              </ul>
            </li>
          </ul>
          <form class="d-flex" action="./display_product.php" method="GET">
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search" required>
            <button class="btn btn-outline-success" type="submit">search</button>
          </form>
          <ul class="navbar-nav me-4 ms-3">
            <li class="nav-item">
              <a class="nav-link bg-success text-light btn m-2" href="./view_cart.php">Cart</a>
            </li>
            <?php if (isset($_SESSION['user_email'])) { ?>
              <li class="nav-item">
                <a class="nav-link bg-danger text-light btn m-2" href="./logout.php">Logout</a>
              </li>
            <?php } else { ?>
              <li class="nav-item">
                <a class=" nav-link bg-primary text-light btn m-2" href="./login.php">Login</a>
              </li>
            <?php
            } ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>
</body>

</html>