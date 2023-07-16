<?php
include '../includes/user_head.php';
include '../includes/user_navbar.php';
include '../includes/user_sidebar.php';
?>

<main>
    <section>
        <div>
            <div class="d-flex justify-content-between">
                <h3 class="text-uppercase">Apply A Leave</h3>
                <a href="applied_leaves.php" class='btn btn-success m-1'>Back</a>
            </div>
            <div>
                <form action="../queries/apply_leave_form.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Type</label>
                        <select class="form-select" name="leave_type">
                            <option value="Full">Full</option>
                            <option value="Half">Half</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Description</label>
                        <select class="form-select" name="description">
                            <?php
                                $query = "SELECT * FROM leaves";
                                $query_conn = mysqli_query($connection, $query);
                                while($result = mysqli_fetch_assoc($query_conn)){
                                    $leave_description = $result['leave_description'];
                                    echo "<option value='$leave_description'>$leave_description</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" name="reason" id="floatingTextarea2"
                                style="height: 100px" required></textarea>
                            <label for="floatingTextarea2">Reason</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">From</label>
                        <input type="date" class="form-control" name="leave_from"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">To</label>
                        <input type="date" class="form-control" name="leave_to"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Upload Attachment</label>
                        <input class="form-control" type="file" name="attachment">
                    </div>
                    <input type="hidden" name="id" value="<?php echo $_SESSION['user_id']; ?>">
                    <div class="m-3">
                        <div class='text-center'>
                            <button type="submit" name="apply" class="btn btn-success fw-bold w-25">APPLY</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<?php
include '../includes/user_footer.php';
?>