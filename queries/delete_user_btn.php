<!-- delete user -->
<?php
include '../includes/connection.php';

if (isset($_GET['delete'])) {

    $user_id = $_GET['delete'];
    $delete_query = "DELETE FROM users WHERE user_id = '$user_id'";
    $delete_conn = mysqli_query($connection, $delete_query);

    if ($delete_conn) {
        header("Location: ../admin/users.php");
    } else {
        die("User is not deleted! " . mysqli_error($connection));
    }

}

?>