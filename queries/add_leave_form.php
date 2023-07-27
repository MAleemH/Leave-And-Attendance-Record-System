<?php
    include '../includes/connection.php';

    if (isset($_POST['add'])) {

        $leave_description = $_POST['leave_description'];
        $leave_total = $_POST['leave_total'];
        $leave_from = $_POST['leave_from'];
        $leave_to = $_POST['leave_to'];

        $query = "INSERT INTO leaves (leave_description, leave_total, leave_from, leave_to) VALUES ('$leave_description', '$leave_total', '$leave_from', '$leave_to')";

        if (!$query) {
            die("Query Failed!");
        }

        $result = mysqli_query($connection, $query);

        if ($result) {
            header("Location: ../admin/add_leave.php");
        } else {
            die("Query Connection Failed! " . mysqli_error($connection));
        }

    }

?>