<?php
    include '../includes/connection.php';

    if (isset($_POST['register'])) {

        $user_name = $_POST['user_name'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];
        $user_address = $_POST['user_address'];
        $user_contact = $_POST['user_contact'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $user_role = $_POST['user_role'];
        $return_url = $_POST['return_url'];

        move_uploaded_file($user_image_tmp, "../images/$user_image");

        $user_address = mysqli_real_escape_string($connection, $user_address);

        $query = "INSERT INTO users (user_name, user_image, user_address, user_contact, user_email, user_password, user_role) VALUES ('$user_name', '$user_image', '$user_address', '$user_contact', '$user_email', '$user_password', '$user_role')";

        if (!$query) {
            die("Query Failed!");
        }

        $result = mysqli_query($connection, $query);

        if ($result) {
            header("Location: $return_url");
        } else {
            die("Query Connection Failed! " . mysqli_error($connection));
        }

    }

?>