<?php
    include '../includes/user_head.php';
    include '../includes/user_navbar.php';
    include '../includes/user_sidebar.php';
?>

<main>
    <section>
        <div>
            <div class="d-flex justify-content-between">
                <h3 class="text-uppercase">Update User</h3>
                <a onclick="goBack()" class='btn btn-success m-1'>Back</a>
            </div>
            <div>
                <?php

                if (isset($_GET['edit'])) {

                    $user_id = $_GET['edit'];

                    $query = "SELECT * FROM users WHERE user_id='$user_id'";

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
                        $user_address = $result['user_address'];
                        $user_contact = $result['user_contact'];
                        $user_email = $result['user_email'];
                        $user_password = $result['user_password'];
                        $user_role = $result['user_role'];
                    }

                }

                ?>
                <form action="../queries/update_user_form.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Name</label>
                        <input type="text" class="form-control" name="user_name" placeholder="Full Name"
                            value="<?php echo $user_name; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Image</label>
                        <img class="rounded" src="../images/<?php echo $user_image; ?>" width="50" height="50">
                        <input class="form-control" type="file" name="user_image">
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" name="user_address" id="floatingTextarea2"
                                style="height: 100px" required><?php echo $user_address; ?></textarea>
                            <label for="floatingTextarea2">Address</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Contact Number</label>
                        <input type="text" class="form-control" name="user_contact" value="<?php echo $user_contact; ?>"
                            placeholder="+923445387545" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>"
                            placeholder="example@gmail.com" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Password</label>
                        <input type="password" class="form-control" name="user_password"
                            value="<?php echo $user_password; ?>" placeholder="Password" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Role</label>
                        <select class="form-select" name="user_role">
                            <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
                        </select>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $user_id; ?>">
                    <input type="hidden" name="return_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
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
    include '../includes/user_footer.php';
?>