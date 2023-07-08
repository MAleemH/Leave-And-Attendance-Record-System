<?php
    include 'includes/head.php';
    include 'includes/navbar.php';
?>

  <main>
    <section id="registration">
        <div class="text-white text-center">
            <h3 class="text-uppercase">Registration</h3>
        </div>
        <!-- registration form -->
        <div>
          <form action="queries/registration_form.php" method="POST" enctype="multipart/form-data">
            <div class="mb-4">
                <label class="form-label text-white fw-bold">Name</label>
                <input type="text" class="form-control" name="user_name" placeholder="Full Name" required>
            </div>
            <div class="mb-4">
                <label class="form-label text-white fw-bold">Image</label>
                <input class="form-control" type="file" name="user_image" required>
            </div>
            <div class="mb-4">
                <div class="form-floating">
                    <textarea class="form-control" name="user_address" id="floatingTextarea2"
                        style="height: 100px" required></textarea>
                    <label for="floatingTextarea2">Address</label>
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label text-white fw-bold">Contact Number</label>
                <input type="text" class="form-control" name="user_contact" placeholder="+923445387545" required>
            </div>
            <div class="mb-4">
                <label class="form-label text-white fw-bold">Email</label>
                <input type="email" class="form-control" name="user_email" placeholder="example@gmail.com" required>
            </div>
            <div class="mb-4">
                <label class="form-label text-white fw-bold">Password</label>
                <input type="password" class="form-control" name="user_password" placeholder="Password" required>
            </div>
            <div class="mb-4">
              <label class="form-label text-white fw-bold">Role</label>
              <select class="form-select" name="user_role">
                  <option value="Admin">Admin</option>
                  <option value="User">User</option>
              </select>
            </div>
            <input type="hidden" name="return_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <div class="mt-4">
                <div class='text-center'>
                    <button type="submit" name="register" class="btn btn-success fw-bold w-25">REGISTER</button>
                </div>
            </div>
          </form>
        </div>
    </section>
  </main>

<?php
    include 'includes/footer.php';
?>