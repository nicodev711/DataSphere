<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataSphere Inc.</title>
    <link rel="icon" href="Statics/img/favicon-16x16.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .rounded-table {
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 20px;
            overflow: hidden; /* This ensures the inner elements do not overflow the rounded corners */
        }

        .rounded-table thead tr:first-child th:first-child {
            border-top-left-radius: 20px;
        }

        .rounded-table thead tr:first-child th:last-child {
            border-top-right-radius: 20px;
        }

        .rounded-table tbody tr:last-child td:first-child {
            border-bottom-left-radius: 20px;
        }

        .rounded-table tbody tr:last-child td:last-child {
            border-bottom-right-radius: 20px;
        }
    </style>
</head>
<body>
<?php
require '../Backend/connect_db.php';
include_once "navbar.php";
?>

<div class="container-fluid mt-5">
    <h1 class="mb-4 text-center" id="register-title">Admin Dashboard</h1>
    <div class="row">
        <div class="col-md-2 mb-3">

        </div>
        <div class="col-md">
            <form class="mb-3">
                <div class="mb-3">
                    <label for="product" class="form-label">View:</label>
                    <select name="product" id="product" class="form-select">
                        <option value="all">all</option>
                        <option value="shirt">Shirt</option>
                        <option value="trouser">Trouser</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="col-md-2">
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 mb-3">
            <div class="card" style="background: linear-gradient(135deg, #02a7a9, #04BAC5, #02a7a9);border-radius: 20px; min-height: 200px;">
                <div class="card-body" >
                    <h5 class="card-title">Actions</h5>
                    <p class="card-text">Manage your products efficiently.</p>
                    <a href="addProduct.php" class="btn btn-primary">Add new product</a>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="table-responsive p-2" style="background: linear-gradient(135deg, #02a7a9, #04BAC5, #02a7a9);border-radius: 20px;min-height: 200px;">
                <table class="table table-hover rounded-table">
                    <thead>
                    <tr class="table-primary">
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Category</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    require '../Backend/connect_db.php';
                    $sql = "SELECT product_id, name, description, price, stock_quantity, category FROM products";
                    $r = @mysqli_query($link, $sql);
                    if (mysqli_num_rows($r) != 0);

                    while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                        echo '<tr>
      <th scope="row">'.$row['product_id'].'</th>
      <td>'.$row['name'].'</td>
      <td>'.substr($row['description'], 0, 50).'</td>
      <td>£ '.$row['price'].'</td>
      <td>'.$row['category'].'</td>
      <td>'.$row['stock_quantity'].'</td>
      <td>
          <a href="update.php?id='.$row['product_id'].'&name='.urlencode($row['name']).'&description='.urlencode($row['description']).'&price='.urlencode($row['price']).'&category='.urlencode($row['category']).'&stock='.urlencode($row['stock_quantity']).'" class="btn btn btn-c my-1" style="min-width: 80px;">Update</a>
          <a href="../Backend/delete.php?id='.$row['product_id'].'" class="btn btn-danger" style="min-width: 80px;">Delete</a>
      </td>
    </tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card" style="background: linear-gradient(135deg, #02a7a9, #04BAC5, #02a7a9);border-radius: 20px;min-height: 200px;">
                <div class="card-body">
                    <h5 class="card-title">Information</h5>
                    <p class="card-text">Additional details or actions.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="bg-dark text-white text-center p-3 mt-4">
    © 3156 Future Data Shop
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="main.js"></script>
</body>
</html>
