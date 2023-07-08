<?php
    include 'includes/head.php';
    include 'includes/navbar.php';
?>

  <main>
    <section id="registration">
        <div class="text-white text-center">
            <h3 class="text-uppercase">Login</h3>
        </div>
        <!-- registration form -->
        <div>
          <?php if(isset($_GET['error'])) { ?>
              <div class="alert alert-danger w-25 mx-auto" role="alert">
                  <?php echo $_GET['error']; ?>
              </div>
          <?php } ?>
          <form action="queries/login_form.php" method="POST" class="w-25 mx-auto">
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
              <select class="form-select" name="user_role" required>
                  <option value="Admin">Admin</option>
                  <option value="User">User</option>
              </select>
            </div>
            <div class="mt-4">
                <div class='text-center'>
                    <button type="submit" name="login" class="btn btn-success fw-bold w-25">LOGIN</button>
                </div>
            </div>
          </form>
        </div>
    </section>
  </main>

<?php
    include 'includes/footer.php';
?>