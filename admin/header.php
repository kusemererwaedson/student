<?php 
require ('config/database.php'); 

// check login status
if(!isset($_SESSION['user-id'])){
    header('location: index.php');
    die();
}
 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>student-Record-MS</title>
    <!-- javascript-bootstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
      crossorigin="anonymous"
    ></script>

    <!-- fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">

    <!-- css-bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dashboard.css" />

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<?php 
$id=($_SESSION['student-id']);
?>
   
  </head>
  <body>
    <nav class="navbar expand-md navbar-light bg-dark fixed-top p-2">
      <div class="container text-white">
        <a href="" class="navbar-brand text-white">Dashboard</a>
        <button class="btn btn-primary"><a href="../adminbackend/logout_admin.php?id=<?= $id; ?>" class="navbar-brand text-white">Logout</a></button>
      </div>
    </nav>