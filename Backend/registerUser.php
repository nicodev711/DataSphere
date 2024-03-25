<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require('./connect_db.php');

    $errors = array();

    #Check for first name
    if (empty($_POST['inputFirstName'])) {
        $errors[] = 'Enter your first name.';
    } else {
        $firstName = mysqli_real_escape_string($link, trim($_POST['inputFirstName']));
    }
    #Check for last name
    if (empty($_POST['inputLastName'])) {
        $errors[] = 'Enter your Last name.';
    } else {
        $lastName = mysqli_real_escape_string($link, trim($_POST['inputLastName']));
    }
    #Check for email
    if (empty($_POST['inputEmail'])) {
        $errors[] = 'Enter your Email.';
    } else {
        $email = mysqli_real_escape_string($link, trim($_POST['inputEmail']));
    }
    #Check for password
    if (empty($_POST['inputPassword'])) {
        $errors[] = 'Enter a password.';
    } else {
        if (empty($_POST['inputPasswordVerif'])) {
            $errors[] = 'Enter the same password.';
        } else {
            if ($_POST['inputPassword'] === $_POST['inputPasswordVerif']) {
                $password = password_hash($_POST['inputPasswordVerif'], PASSWORD_DEFAULT);
            } else {
                $errors[] = "Password don't match";
            }
        }
    }

    if (empty($errors)) {
        $q = 'INSERT INTO users (firstname, lastname, email, password, created_at) VALUES (?, ?, ?, ?, NOW())';
        $stmt = mysqli_prepare($link, $q);

        mysqli_stmt_bind_param($stmt, 'ssss', $firstName, $lastName, $email, $password);

        $r = mysqli_stmt_execute($stmt);

        if ($r) {
            include_once('../Frontend/navbar.php');
            echo 'Account created succesfully';
            //TODO: Create Successfull Page
            echo '<a class="btn btn-success" href="../Frontend/login.php">Go to Login Page</a>';
            mysqli_close($link);

            exit();
        } else {
            echo '<p>The following error(s) occurred:</p>';
            foreach ($errors as $msg) {
                echo "$msg<br>";
            }
            echo '<p>Please try again.</p></div>';
            # Close database connection.
            mysqli_close($link);

        }
    }
}
