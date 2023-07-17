<?php
include '../includes/admin_head.php';
include '../includes/admin_navbar.php';
include '../includes/admin_sidebar.php';
?>

<main>
    <section>
        <div>
            <div class="d-flex justify-content-between">
                <h3 class="text-uppercase">Requested Leaves</h3>
            </div>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Employee</th>
                            <th scope="col">Leave Type</th>
                            <th scope="col">Description</th>
                            <th scope="col">Reason</th>
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Attachment</th>
                            <th scope="col">Status</th>
                            <th scope="col">Approve/Reject</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $query = "SELECT * FROM applied_leaves";
                        $query_conn = mysqli_query($connection, $query);

                        while ($result = mysqli_fetch_assoc($query_conn)) {
                            $leave_id = $result['id'];
                            $employeeId = $result['user_id'];
                            $leave_type = $result['leave_type'];
                            $description = $result['description'];
                            $reason = $result['reason'];
                            $leave_from = $result['leave_from'];
                            $leave_to = $result['leave_to'];
                            $attachment = $result['attachment'];
                            $status = $result['status'];

                            $employee_query = "SELECT user_name AS employee_name FROM users WHERE user_id = $employeeId";
                            $employee_conn = mysqli_query($connection, $employee_query);
                            $result_availed = mysqli_fetch_assoc($employee_conn);
                            $employee_name = $result_availed['employee_name'];

                            ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $leave_id; ?>
                                </th>
                                <td>
                                    <?php echo $employee_name; ?>
                                </td>
                                <td>
                                    <?php echo $leave_type; ?>
                                </td>
                                <td>
                                    <?php echo $description; ?>
                                </td>
                                <td>
                                    <?php echo $reason; ?>
                                </td>
                                <td>
                                    <?php echo $leave_from; ?>
                                </td>
                                <td>
                                    <?php echo $leave_to; ?>
                                </td>
                                <td>
                                    <a href="../images/<?php echo $attachment; ?>" download>
                                        <?php

                                        if (!empty($attachment)) {
                                            echo "<button class='btn btn-info'>Download</button>";
                                        }

                                        ?>
                                    </a>
                                </td>
                                <td>
                                    <?php echo $status; ?>
                                </td>
                                <td>
                                    <?php

                                    if ($status == 'Pending') { ?>
                                        <a class="btn btn-success" href="leave_requests.php?approve=<?php echo $leave_id; ?>">Approve</a>
                                        <a class="btn btn-danger" href="leave_requests.php?reject=<?php echo $leave_id; ?>">Reject</a>
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php

                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>

<!-- approve leave -->
<?php 

if (isset($_GET['approve'])) {
  $leave_id = $_GET['approve'];
  $approve_query = "UPDATE applied_leaves SET status='Approved' WHERE id = '$leave_id'";
  $approve_conn = mysqli_query($connection, $approve_query);
  if ($approve_conn) {
    header("Location: leave_requests.php");
  } else {
    die("Leave is not set to approved! " . mysqli_error($connection));
  }
  
}

?>
<!-- reject leave -->
<?php 

if (isset($_GET['reject'])) {
  $leave_id = $_GET['reject'];
  $reject_query = "UPDATE applied_leaves SET status='Rejected' WHERE id = '$leave_id'";
  $reject_conn = mysqli_query($connection, $reject_query);
  if ($reject_conn) {
    header("Location: leave_requests.php");
  } else {
    die("Leave is not set to rejected! " . mysqli_error($connection));
  }
  
}

?>

<?php
include '../includes/admin_footer.php';
?>