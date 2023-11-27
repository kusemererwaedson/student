<!-- <link rel="stylesheet" href="fonts/font-awesome.min.css"> -->

<div class="side_bar" style="background: #adff2f; width: 200px; ">
      <div class="row-lg-12  mt-5 mb-1 py-4">
      <a class="text-primary ml-3" style="text-decoration: none;" href="./dashboard.php"><i class="fa-solid fa-person"></i>&nbsp;&nbsp;&nbsp;&nbsp;View Profile</a>
      </div>

      
      <?php
            $id=($_SESSION['student-id']);
            $sql_enroll = "SELECT * FROM students WHERE id=$id";
            $query_enroll = mysqli_query($connection,$sql_enroll);
            $query_enroll_row  = mysqli_fetch_assoc($query_enroll);
            $reg_status = $query_enroll_row['reg_status'];

            if($reg_status == "pending"):
             ?>
                  <div class="row-lg-12 my-1 py-4">
                  <a class="text-primary ml-3" style="text-decoration: none;" href="./enroll.php"><i class="fa-regular fa-id-card"></i>&nbsp;&nbsp;&nbsp;&nbsp;Enroll</a>
                  </div>
            <?php endif ?>

     

</div>
