<?php
    include '../includes/connection.php';
    ob_start();
    session_start();

    if (isset($_SESSION['user_role'])) {
      if ($_SESSION['user_role'] !== 'User') {
        header("Location: ../login.php");
      }
    } elseif (!isset($_SESSION['user_id'])) {
      header("Location: ../login.php");
    }
?>
<!doctype html>
<html lang="en">

<head>
  <title>Leave and Attendance Record System</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/user_style.css?v=<?php echo time(); ?>">

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/2f09744991.js" crossorigin="anonymous"></script>

</head>

<body>