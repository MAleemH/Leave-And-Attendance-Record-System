<?php

include '../includes/connection.php';
session_start();

if (isset($_POST['login'])) {

    $user_role = $_POST['user_role'];

    switch ($user_role) {

        case 'Admin':

            $user_email = $_POST['user_email'];
            $user_password = $_POST['user_password'];

            $user_email = mysqli_real_escape_string($connection, $user_email);
            $user_password = mysqli_real_escape_string($connection, $user_password);

            $query = "SELECT * FROM users WHERE user_email = '$user_email'";

            if (!$query) {
                die("Query Failed!" . mysqli_error($connection));
            }

            $query_conn = mysqli_query($connection, $query);

            if (!$query_conn) {
                die("Connection Query Failed!" . mysqli_error($connection));
            }

            while ($row = mysqli_fetch_assoc($query_conn)) {
                $db_user_id = $row['user_id'];
                $db_user_name = $row['user_name'];
                $db_user_email = $row['user_email'];
                $db_user_password = $row['user_password'];
                $db_user_image = $row['user_image'];
                $db_user_role = $row['user_role'];
            }

            if ($user_email == $db_user_email && $user_password == $db_user_password) {

                $_SESSION['user_id'] = $db_user_id;
                $_SESSION['user_name'] = $db_user_name;
                $_SESSION['user_email'] = $db_user_email;
                $_SESSION['user_password'] = $db_user_password;
                $_SESSION['user_image'] = $db_user_image;
                $_SESSION['user_role'] = $db_user_role;

                header("Location: ../admin/index.php");

            } else {
                $error = "Invalid username or password!";
                header("Location: ../login.php?error=" . urlencode($error));
            }

            break;

        case 'Employee':

            $user_email = $_POST['user_email'];
            $user_password = $_POST['user_password'];

            $user_email = mysqli_real_escape_string($connection, $user_email);
            $user_password = mysqli_real_escape_string($connection, $user_password);

            $query = "SELECT * FROM users WHERE user_email = '$user_email'";

            if (!$query) {
                die("Query Failed!" . mysqli_error($connection));
            }

            $query_conn = mysqli_query($connection, $query);

            if (!$query_conn) {
                die("Connection Query Failed!" . mysqli_error($connection));
            }

            while ($row = mysqli_fetch_assoc($query_conn)) {
                $db_user_id = $row['user_id'];
                $db_user_name = $row['user_name'];
                $db_user_email = $row['user_email'];
                $db_user_password = $row['user_password'];
                $db_user_image = $row['user_image'];
                $db_user_role = $row['user_role'];
            }

            if ($user_email == $db_user_email && $user_password == $db_user_password) {

                $_SESSION['user_id'] = $db_user_id;
                $_SESSION['user_name'] = $db_user_name;
                $_SESSION['user_email'] = $db_user_email;
                $_SESSION['user_password'] = $db_user_password;
                $_SESSION['user_image'] = $db_user_image;
                $_SESSION['user_role'] = $db_user_role;

                header("Location: ../employee/index.php");

            } else {
                $error = "Invalid username or password!";
                header("Location: ../login.php?error=" . urlencode($error));
            }

            break;

        default:
            echo "<h6 class='alert alert-danger'>Please Enter Correct Data!</h6>";
            break;
    }

}


?>