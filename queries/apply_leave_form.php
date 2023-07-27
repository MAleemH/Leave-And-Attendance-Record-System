<?php
    include '../includes/connection.php';

    if (isset($_POST['apply'])) {

        $user_id = $_POST['id'];
        $leave_type = $_POST['leave_type'];
        $description = $_POST['description'];
        $reason = $_POST['reason'];
        $leave_from = $_POST['leave_from'];
        $leave_to = $_POST['leave_to'];
        $attachment = $_FILES['attachment']['name'];
        $attachment_tmp = $_FILES['attachment']['tmp_name'];
        $status = "Pending";

        move_uploaded_file($attachment_tmp, "../images/$attachment");

        $reason = mysqli_real_escape_string($connection, $reason);

        $query = "INSERT INTO applied_leaves (user_id, leave_type, description, reason, leave_from, leave_to, attachment, status) VALUES ('$user_id', '$leave_type', '$description', '$reason', '$leave_from', '$leave_to', '$attachment', '$status')";

        if (!$query) {
            die("Query Failed!");
        }

        $result = mysqli_query($connection, $query);

        if ($result) {
            header("Location: ../employee/applied_leaves.php");
        } else {
            die("Query Connection Failed! " . mysqli_error($connection));
        }

    }

?>