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
                                    
                                </td>
                                <td>
                                    <?php echo $description; ?>
                                </td>
                                <td>
                                    <?php echo $leave_from; ?>
                                </td>
                                <td>
                                    <?php echo $leave_to; ?>
                                </td>
                                <td>
                                    <?php
                                        if(!empty($attachment)){
                                            echo "<img class='rounded' src='../images/<?php echo $attachment; ?>' width='50' height='50'>";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php echo $status; ?>
                                </td>
                                <td>
                                    <a onClick="javascript: return confirm('Do you want to delete this leave?');"
                                        href="../queries/delete_applied_leave_btn.php?delete=<?php echo $leave_id; ?>"
                                        class="btn btn-danger">Delete</a>
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