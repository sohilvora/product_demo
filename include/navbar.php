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
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
            <li>
              <form class="form-control" action="./display_product.php" method="GET">
                <label>Starting Range</label>
                <input type="number" name="starting" required>

                <label>Ending Range</label>
                <input type="number" name="ending" required>

                <button type="submit" class="btn btn-outline-success">Search</button>
              </form>

            </li>
          </ul>
          <form class="d-flex" action="./display_product.php" method="GET">
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search" required>
            <button class="btn btn-outline-success" type="submit">search</button>
          </form>
        </div>
      </div>
    </nav>
  </header>
</body>

</html>