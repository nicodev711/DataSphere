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
</head>
<body>
<header>
    <?php
    include_once "navbar.php";
    include_once "hero.php";
    ?>
</header>

<main class="container mt-5">
    <!-- Showcase of products -->
    <div class="row">
        <?php
        include_once "../Backend/connect_db.php";
        $sql = "SELECT product_id, name, description, price, image_url FROM products";
        $result = mysqli_query($link, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="col-md-3 mb-4">
                        <div class="card">
                            <img src="' . $row['image_url'] . '" class="card-img-top" alt="' . htmlspecialchars($row['name']) . '">
                            <div class="card-body">
                                <h5 class="card-title">' . htmlspecialchars($row['name']) . '</h5>
                                <p class="card-text">' . htmlspecialchars(mb_substr($row['description'], 0, 150)) . (mb_strlen($row['description']) > 150 ? '...' : '') . '</p>
                                <div class="text-center">
                                    <h5 class="card-title"><i class="bi bi-currency-pound"></i> ' . htmlspecialchars($row['price']) . '</h5>
                                    <a href="product.php?id=' . $row['product_id'] . '" class="btn btn-c">View Details</a>
                                    <a href="#" class="btn btn-light btn-block"><i class="bi bi-cart-plus-fill"></i> Add</a>
                                </div>    
                            </div>
                        </div>
                    </div>';
            }
        } else {
            echo '<p>No products found.</p>';
        }
        ?>
    </div>
</main>

<footer class="bg-dark text-white text-center p-3 mt-4">
    © 3156 Future Data Shop
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="main.js"></script>
</body>
</html>
