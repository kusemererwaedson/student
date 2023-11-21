<?php include('header.php'); ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php include('includes/sidebar.php'); ?>


<?php
$page = $_GET['page'];
      if(isset($_GET['page'])){
          include ('page.php');
      }else{
        include ('dashboard.php');
      }
      ?>