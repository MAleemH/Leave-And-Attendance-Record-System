<?php
include '../includes/admin_head.php';
include '../includes/admin_navbar.php';
include '../includes/admin_sidebar.php';
?>

<main>
    <section>
        <div>
            <div class="d-flex justify-content-between">
                <h3 class="text-uppercase">Leaves</h3>
                <a href="add_leave.php" class='btn btn-success m-1'>Add Leave</a>
            </div>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Leave Description</th>
                            <th scope="col">No. of Leaves</th>
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $query = "SELECT * FROM leaves";
                        $query_conn = mysqli_query($connection, $query);

                        while ($result = mysqli_fetch_assoc($query_conn)) {
                            $id = $result['id'];
                            $leave_description = $result['leave_description'];
                            $leave_total = $result['leave_total'];
                            $leave_from = $result['leave_from'];
                            $leave_to = $result['leave_to'];

                            ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $id; ?>
                                </th>
                                <td>
                                    <?php echo $leave_description; ?>
                                </td>
                                <td>
                                    <?php echo $leave_total; ?>
                                </td>
                                <td>
                                    <?php echo $leave_from; ?>
                                </td>
                                <td>
                                    <?php echo $leave_to; ?>
                                </td>
                                <td>
                                    <a href="edit_leave.php?edit=<?php echo $id; ?>" class="btn btn-warning">Edit</a>
                                </td>
                                <td>
                                    <a onClick="javascript: return confirm('Do you want to delete this leave?');"
                                            href="../queries/delete_leave_btn.php?delete=<?php echo $id; ?>"
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
include '../includes/admin_footer.php';
?>