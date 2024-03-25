<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # Connect to the database.
    require('connect_db.php');

    # Initialize an error array.
    $errors = array();

    # Check for name.
    if (empty($_POST['name'])) {
        $errors[] = 'Enter name.';
    } else {
        $t = mysqli_real_escape_string($link, trim($_POST['name']));
    }

    # Check for description.
    if (empty($_POST['description'])) {
        $errors[] = 'Enter description.';
    } else {
        $d = mysqli_real_escape_string($link, trim($_POST['description']));
    }

    # Check for price.
    if (empty($_POST['price'])) {
        $errors[] = 'Enter price.';
    } else {
        $p = mysqli_real_escape_string($link, trim($_POST['price']));
    }

    # Check for category.
    if (empty($_POST['category'])) {
        $errors[] = 'Enter category.';
    } else {
        $c = mysqli_real_escape_string($link, trim($_POST['category']));
    }

    # Check for stock quantity.
    if (empty($_POST['stock_quantity'])) {
        $errors[] = 'Enter a quantity.';
    } else {
        $s = mysqli_real_escape_string($link, trim($_POST['stock_quantity']));
    }

    # Handle image upload
    if ($_FILES['productImage']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["productImage"]["name"]);
        $imageURL = $target_dir . htmlspecialchars(basename($_FILES["productImage"]["name"]));

        if (!move_uploaded_file($_FILES["productImage"]["tmp_name"], $target_file)) {
            $errors[] = 'Error uploading the file.';
        }
    } else {
        $errors[] = 'Error uploading the file.';
    }

    # If no errors, insert data into database.
    if (empty($errors)) {
        $q = "INSERT INTO products (name, description, price, category, stock_quantity, image_url) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($link, $q);
        mysqli_stmt_bind_param($stmt, 'sssdss', $t, $d, $p, $c, $s, $imageURL);
        $r = mysqli_stmt_execute($stmt);
        if ($r) {
            header("Location: ../Frontend/index.php");
        } else {
            echo '<p>Error while inserting the product.</p>';
        }
        mysqli_stmt_close($stmt);
    } else {
        echo '<p>The following error(s) occurred:</p>';
        foreach ($errors as $msg) {
            echo "$msg<br>";
        }
        echo '<p>Please try again.</p>';
    }

    # Close database connection.
    mysqli_close($link);
}
?>
