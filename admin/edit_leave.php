<?php
include '../includes/admin_head.php';
include '../includes/admin_navbar.php';
include '../includes/admin_sidebar.php';
?>

<main>
    <section>
        <div>
            <div class="d-flex justify-content-between">
                <h3 class="text-uppercase">Update Leave</h3>
                <a href="leaves.php" class='btn btn-success m-1'>Back</a>
            </div>
            <div>
                <?php

                if (isset($_GET['edit'])) {

                    $id = $_GET['edit'];

                    $query = "SELECT * FROM leaves WHERE id='$id'";

                    if (!$query) {
                        die("Query Failed!");
                    }

                    $query_conn = mysqli_query($connection, $query);

                    if (!$query_conn) {
                        die("Query Connection Failed! " . mysqli_error($connection));
                    }

                    while ($result = mysqli_fetch_assoc($query_conn)) {
                        $leave_description = $result['leave_description'];
                        $leave_total = $result['leave_total'];
                        $leave_from = $result['leave_from'];
                        $leave_to = $result['leave_to'];
                    }

                }

                ?>
                <form action="../queries/update_leave_form.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Leave Description</label>
                        <input type="text" class="form-control" name="leave_description" placeholder="Casual Leave, Medical Leave, Compensatory Leave, Earned Leave" value="<?php echo $leave_description; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Total Leaves</label>
                        <input type="number" class="form-control" name="leave_total" placeholder="10" value="<?php echo $leave_total; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">From</label>
                        <input type="date" class="form-control" name="leave_from" value="<?php echo $leave_from; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">To</label>
                        <input type="date" class="form-control" name="leave_to" value="<?php echo $leave_to; ?>" required>
                    </div>
                    <input type="hidden" name="return_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="m-3">
                        <div class='text-center'>
                            <button type="submit" name="update" class="btn btn-success fw-bold w-25">UPDATE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<?php
include '../includes/admin_footer.php';
?>