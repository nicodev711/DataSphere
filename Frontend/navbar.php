<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="#">
            <img src="Statics/img/logoImg.png" class="mx-4" alt="DataSphere Logo" height="60">
            <img src="Statics/img/logoName.png" alt="DataSphere Name" height="40">
        </a>

        <!-- Toggler Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>

            <!-- Authentication Links -->
            <ul class="navbar-nav mx-4">
                <?php
                session_start();

                if (isset($_SESSION['first_name'])) {
                    echo '<div class="dropdown">
                              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Welcome ' . htmlspecialchars($_SESSION['first_name']) . '
                              </a>

                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                        <li><a class="dropdown-item" href="#">Orders</a></li>
                                        <li><a class="dropdown-item" href="admin.php">Admin</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-danger" href="../Backend/logout.php">Logout</a></li>
                              </ul>
                            </div>';
                } else {
                    echo '
                    <li class="nav-item">
                    <button></button>
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                ';
                }
                ?>
            </ul>
            <!-- Cart Link -->
            <ul class="navbar-nav mx-4">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-cart-fill"></i> Cart
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
