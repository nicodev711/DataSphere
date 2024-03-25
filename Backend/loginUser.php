<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require('connect_db.php');
    $errors = array();

    # Check for email
    if (empty($_POST['inputEmail'])) {
        $errors[] = 'Type your Email.';
    } else {
        $email = mysqli_real_escape_string($link, trim($_POST['inputEmail']));
    }

    # Check for password
    if (empty($_POST['inputPassword'])) {
        $errors[] = 'Type your password.';
    } else {
        $password = mysqli_real_escape_string($link, trim($_POST['inputPassword']));
    }

    if (empty($errors)) {
        # Prepare the query to fetch the user
        $query = "SELECT user_id, firstname, lastname, email, password FROM users WHERE email = ?";
        $stmt = mysqli_prepare($link, $query);

        # Bind parameters
        mysqli_stmt_bind_param($stmt, "s", $email);

        # Execute the query
        mysqli_stmt_execute($stmt);

        # Bind the results
        mysqli_stmt_bind_result($stmt, $id, $firstName, $lastName, $email, $hashedPassword);

        # Fetch the results
        if (mysqli_stmt_fetch($stmt)) {
            if (password_verify($password, $hashedPassword)) {
                $_SESSION['user_id'] = $id;
                $_SESSION['first_name'] = $firstName;
                $_SESSION['last_name'] = $lastName;
                $_SESSION['email'] = $email;

                header("Location: ../Frontend/index.php");
                exit();
            } else {
                $errors[] = 'Invalid email/password combination.';
            }
        } else {
            $errors[] = 'No user found with the provided email.';
        }

        # Close statement
        mysqli_stmt_close($stmt);
    }

    # Close database connection
    mysqli_close($link);

    # Display errors if there are any
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}
?>
