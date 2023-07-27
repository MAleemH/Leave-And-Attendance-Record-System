<?php
include '../includes/admin_head.php';
include '../includes/admin_navbar.php';
include '../includes/admin_sidebar.php';
?>

<main>
  <section>
    <?php

    if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];

      $query = "SELECT * FROM users WHERE user_id = '$user_id'";

      if (!$query) {
        die("Query Failed!");
      }

      $query_conn = mysqli_query($connection, $query);

      if (!$query_conn) {
        die("Query Connection Failed! " . mysqli_error($connection));
      }

      while ($result = mysqli_fetch_assoc($query_conn)) {
        $user_name = $result['user_name'];
        $user_image = $result['user_image'];
        $user_email = $result['user_email'];
        $user_password = $result['user_password'];
        $user_address = $result['user_address'];
        $user_contact = $result['user_contact'];
        $user_role = $result['user_role'];
      }

    }

    ?>
    <div>
      <div class="d-flex justify-content-between">
        <h3 class="text-uppercase">Profile</h3>
        <a onclick="savePageHistory()" href="edit_user.php?edit=<?php echo $user_id; ?>" class='btn btn-warning m-1'>Update</a>
      </div>
      <div>
        <div class='row g-0'>
          <div class='col-4 text-center'>
            <img class="rounded" src='../images/<?php echo $user_image; ?>' width="150" height="120" />
          </div>
          <div class='col-8'>
            <p><b>Name:</b>
              <?php echo $user_name; ?>
            </p>
            <p><b>Role:</b>
              <?php echo $user_role; ?>
            </p>
            <p><b>Address:</b>
              <?php echo $user_address; ?>
            </p>
            <p><b>Contact:</b>
              <?php echo $user_contact; ?>
            </p>
            <p><b>Email:</b>
              <?php echo $user_email; ?>
            </p>
            <p><b>Password:</b>
              <?php echo $user_password; ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
include '../includes/admin_footer.php';
?>