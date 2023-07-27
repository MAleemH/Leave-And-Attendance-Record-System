<?php
    include '../includes/connection.php';

    if (isset($_POST['update'])) {
        $user_id = $_POST['id'];
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

        if (empty($user_image)) {
            $query = "SELECT * FROM users WHERE user_id='$user_id'";
            $select_img = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_img)) {
              $user_image = $row['user_image'];
            }
          }
        
        $user_address = mysqli_real_escape_string($connection, $user_address);
        
        $query = "UPDATE users SET user_name='$user_name', user_image='$user_image', user_address='$user_address', user_contact='$user_contact', user_email='$user_email', user_password='$user_password', user_role='$user_role' WHERE user_id='$user_id'";

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