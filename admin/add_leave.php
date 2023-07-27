<?php
include '../includes/admin_head.php';
include '../includes/admin_navbar.php';
include '../includes/admin_sidebar.php';
?>

<main>
    <section>
        <div>
            <div class="d-flex justify-content-between">
                <h3 class="text-uppercase">Add New Leave</h3>
                <a href="leaves.php" class='btn btn-success m-1'>Back</a>
            </div>
            <div>
                <form action="../queries/add_leave_form.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Leave Description</label>
                        <input type="text" class="form-control" name="leave_description" placeholder="Casual Leave, Medical Leave, Compensatory Leave, Earned Leave" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Total Leaves</label>
                        <input type="number" class="form-control" name="leave_total" placeholder="10"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">From</label>
                        <input type="date" class="form-control" name="leave_from" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">To</label>
                        <input type="date" class="form-control" name="leave_to" required>
                    </div>
                    <div class="m-3">
                        <div class='text-center'>
                            <button type="submit" name="add" class="btn btn-success fw-bold w-25">Add</button>
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