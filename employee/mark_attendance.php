<?php
    include '../includes/user_head.php';
    include '../includes/user_navbar.php';
    include '../includes/user_sidebar.php';
?>

<main>
    <section>
        <div>
            <div class="d-flex justify-content-between">
                <h3 class="text-uppercase">Mark Attendance</h3>
                <a href="attendance.php" class='btn btn-success m-1'>Back</a>
            </div>
            <div>
                <form action="../queries/mark_attendance_form.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Date</label>
                        <input type="date" class="form-control" name="attendance_date" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Time In</label>
                        <input type="time" class="form-control" name="time_in" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Time Out</label>
                        <input type="time" class="form-control" name="time_out" required>
                    </div>
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                    <div class="m-3">
                        <div class='text-center'>
                            <button type="submit" name="mark" class="btn btn-success fw-bold w-25">MARK</button>
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