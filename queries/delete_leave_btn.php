<?php
include '../includes/connection.php';

if (isset($_GET['delete'])) {

    $id = $_GET['delete'];
    $delete_query = "DELETE FROM leaves WHERE id = '$id'";
    $delete_conn = mysqli_query($connection, $delete_query);

    if ($delete_conn) {
        header("Location: ../admin/leaves.php");
    } else {
        die("Leave is not deleted! " . mysqli_error($connection));
    }

}

?>