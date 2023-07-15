<?php
    include '../includes/connection.php';

    if (isset($_POST['mark'])) {

        $attendance_date = $_POST['attendance_date'];
        $time_in = $_POST['time_in'];
        $time_out = $_POST['time_out'];
        $user_id = $_POST['user_id'];
        $status = "Present";

        $query = "INSERT INTO attendance (user_id, attendance_date, time_in, time_out, status) VALUES ('$user_id', '$attendance_date', '$time_in', '$time_out', '$status')";

        if (!$query) {
            die("Query Failed!");
        }

        $result = mysqli_query($connection, $query);

        if ($result) {
            header("Location: ../employee/mark_attendance.php");
        } else {
            die("Query Connection Failed! " . mysqli_error($connection));
        }

    }

?>