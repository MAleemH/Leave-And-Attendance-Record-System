<?php
include '../includes/admin_head.php';
include '../includes/admin_navbar.php';
include '../includes/admin_sidebar.php';
?>

<main>
    <section>
        <div>
            <div class="d-flex justify-content-between">
                <h3 class="text-uppercase">Users</h3>
                <a href="add_user.php" class='btn btn-success m-1'>Add User</a>
            </div>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Address</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Role</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $query = "SELECT * FROM users";
                        $query_conn = mysqli_query($connection, $query);

                        while ($result = mysqli_fetch_assoc($query_conn)) {
                            $user_id = $result['user_id'];
                            $user_name = $result['user_name'];
                            $user_image = $result['user_image'];
                            $user_address = $result['user_address'];
                            $user_contact = $result['user_contact'];
                            $user_email = $result['user_email'];
                            $user_password = $result['user_password'];
                            $user_role = $result['user_role'];

                            ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $user_id; ?>
                                </th>
                                <td>
                                    <?php echo $user_name; ?>
                                </td>
                                <td><img class="rounded" src="../images/<?php echo $user_image; ?>" width="50" height="50">
                                </td>
                                <td>
                                    <?php echo $user_address; ?>
                                </td>
                                <td>
                                    <?php echo $user_contact; ?>
                                </td>
                                <td>
                                    <?php echo $user_email; ?>
                                </td>
                                <td>
                                    <?php echo $user_password; ?>
                                </td>
                                <td>
                                    <?php echo $user_role; ?>
                                </td>
                                <td>
                                    <a href="edit_user.php?edit=<?php echo $user_id; ?>" class="btn btn-warning">Edit</a>
                                </td>
                                <?php
                                if ($user_id == $_SESSION['user_id']) {
                                    ?>
                                    <td><a href="#" class="btn btn-secondary disabled">Cannot Delete</a></td>
                                    <?php
                                } else {
                                    ?>
                                    <td><a onClick="javascript: return confirm('Do you want to delete this user?');"
                                            href="../queries/delete_user_btn.php?delete=<?php echo $user_id; ?>"
                                            class="btn btn-danger">Delete</a></td>
                                <?php } ?>
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