<?php
    include '../includes/connection.php';

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $leave_description = $_POST['leave_description'];
        $leave_total = $_POST['leave_total'];
        $leave_from = $_POST['leave_from'];
        $leave_to = $_POST['leave_to'];
        $return_url = $_POST['return_url'];
        
        $query = "UPDATE leaves SET leave_description='$leave_description', leave_total='$leave_total', leave_from='$leave_from', leave_to='$leave_to' WHERE id='$id'";

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