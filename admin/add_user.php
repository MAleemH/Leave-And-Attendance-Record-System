<?php
include '../includes/admin_head.php';
include '../includes/admin_navbar.php';
include '../includes/admin_sidebar.php';
?>

<main>
    <section>
        <div>
            <div class="d-flex justify-content-between">
                <h3 class="text-uppercase">Add New User</h3>
                <a href="users.php" class='btn btn-success m-1'>Back</a>
            </div>
            <div>
                <form action="../queries/registration_form.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label text-white fw-bold">Name</label>
                        <input type="text" class="form-control" name="user_name" placeholder="Full Name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white fw-bold">Image</label>
                        <input class="form-control" type="file" name="user_image" required>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" name="user_address" id="floatingTextarea2"
                                style="height: 100px" required></textarea>
                            <label for="floatingTextarea2">Address</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white fw-bold">Contact Number</label>
                        <input type="text" class="form-control" name="user_contact" placeholder="+923445387545"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white fw-bold">Email</label>
                        <input type="email" class="form-control" name="user_email" placeholder="example@gmail.com"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white fw-bold">Password</label>
                        <input type="password" class="form-control" name="user_password" placeholder="Password"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white fw-bold">Role</label>
                        <select class="form-select" name="user_role">
                            <option value="Admin">Admin</option>
                            <option value="Employee">Employee</option>
                        </select>
                    </div>
                    <input type="hidden" name="return_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                    <div class="m-3">
                        <div class='text-center'>
                            <button type="submit" name="register" class="btn btn-success fw-bold w-25">REGISTER</button>
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