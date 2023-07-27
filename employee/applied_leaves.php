<?php
include '../includes/user_head.php';
include '../includes/user_navbar.php';
include '../includes/user_sidebar.php';
?>

<main>
    <section>
        <div>
            <div class="d-flex justify-content-between">
                <h3 class="text-uppercase">Applied Leaves</h3>
                <a href="apply_leave.php" class='btn btn-success m-1'>Apply Leave</a>
            </div>
            <div>
            <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Description</th>
                            <th scope="col">Total</th>
                            <th scope="col">Availed</th>
                            <th scope="col">Remaining</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM leaves";
                        $query_conn = mysqli_query($connection, $query);

                        while ($result = mysqli_fetch_assoc($query_conn)) {
                            $leaves_id = $result['id'];
                            $leaves_description = $result['leave_description'];
                            $leaves_total = $result['leave_total'];

                            // Query to calculate the availed leaves (days) for a specific leave type
                            $employeeId = $_SESSION['user_id'];
                            $query_availed = "SELECT SUM(DATEDIFF(leave_to, leave_from) + 1) AS availed_days FROM applied_leaves WHERE user_id = $employeeId AND status = 'Approved' AND description = '$leaves_description'";
                            $query_availed_conn = mysqli_query($connection, $query_availed);
                            $result_availed = mysqli_fetch_assoc($query_availed_conn);
                            $availed_days = $result_availed['availed_days'] ?? 0; // Use null coalescing to set 0 if no availed days found

                            // Calculate remaining leaves
                            $remaining_days = $leaves_total - $availed_days;

                            ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $leaves_description; ?>
                                </th>
                                <td>
                                    <?php echo $leaves_total; ?>
                                </td>
                                <td>
                                    <?php echo $availed_days; ?>
                                </td>
                                <td>
                                    <?php echo $remaining_days; ?>
                                </td>
                            </tr>
                            <?php

                        }

                        ?>
                    </tbody>
                </table>
            </div>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Type</th>
                            <th scope="col">Description</th>
                            <th scope="col">Reason</th>
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Attachment</th>
                            <th scope="col">Status</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $employee_id = $_SESSION['user_id'];
                        $query = "SELECT * FROM applied_leaves WHERE user_id = $employee_id";
                        $query_conn = mysqli_query($connection, $query);

                        while ($result = mysqli_fetch_assoc($query_conn)) {
                            $leave_id = $result['id'];
                            $leave_type = $result['leave_type'];
                            $description = $result['description'];
                            $reason = $result['reason'];
                            $leave_from = $result['leave_from'];
                            $leave_to = $result['leave_to'];
                            $attachment = $result['attachment'];
                            $status = $result['status'];

                            ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $leave_id; ?>
                                </th>
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
                                    <?php if($status!='Approved'){?>
                                    <a onClick="javascript: return confirm('Do you want to delete this leave?');"
                                        href="../queries/delete_applied_leave_btn.php?delete=<?php echo $leave_id; ?>"
                                        class="btn btn-danger">Delete</a>
                                    <?php } ?>
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

<?php
include '../includes/user_footer.php';
?>