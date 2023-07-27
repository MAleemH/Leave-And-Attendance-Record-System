<?php
    include '../includes/user_head.php';
    include '../includes/user_navbar.php';
    include '../includes/user_sidebar.php';
?>

  <main>
    <section>
        <div>
            <h3 class="text-uppercase">Welcome <?php echo $_SESSION['user_name']; ?></h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ornare rutrum nunc, vel consectetur elit tincidunt eget. Suspendisse congue enim eget enim volutpat, eget vestibulum nisl commodo. Suspendisse justo arcu, tristique in dui eget, maximus hendrerit odio. Nunc pharetra ex quam, vitae dapibus massa pellentesque id. Sed eu orci at purus egestas cursus vitae iaculis ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec erat ante, condimentum nec ultrices in, dictum vitae felis. Nunc gravida nisl a nisi pretium, id ultrices dolor sollicitudin. Aliquam rhoncus odio in odio pharetra egestas. Aenean tincidunt elit nec libero feugiat, a tempus ex faucibus. Nunc augue metus, ultricies elementum tortor pellentesque, pulvinar viverra mi. Mauris vitae commodo lorem.
            </p>
        </div>
    </section>
  </main>

<?php
    include '../includes/user_footer.php';
?>