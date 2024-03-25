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
<?php require '../Backend/connect_db.php'; ?>
<?php include_once "navbar.php"; ?>

<main class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="mb-4 text-center" id="register-title">Login</h1>
            <div class="card" style="border: none; background-color: var(--color3)">
                <div class="card-body" style="background: linear-gradient(135deg, #02a7a9, #04BAC5, #02a7a9);border-radius: 20px;">
                    <form method="post" action="../Backend/loginUser.php">
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label"><h5 class="m-0" style="color: var(--color2)">Email</h5></label>
                            <input type="email" class="form-control" id="inputEmail" name="inputEmail">
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label"><h5 class="m-0" style="color: var(--color2)">Password</h5></label>
                            <input type="password" class="form-control" id="inputPassword" name="inputPassword">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg">Login</button>
                        </div>
                    </form>
                    <a href="register.php">Need to register?</a>
                </div>
            </div>
        </div>
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
