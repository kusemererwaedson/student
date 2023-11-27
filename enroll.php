<?php include('includes/header.php'); ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php include('includes/sidebar.php'); ?>

<?php
if(isset($_SESSION['user-id'])){
  $id=($_SESSION['user-id']);
  $sql = "SELECT * FROM students WHERE id=$id";
  $query = mysqli_query($connection,$sql);
}

?>
<?php while($row = mysqli_fetch_assoc($query)): ?>
<div class="main" style="margin-left: 15%;">
  <div class="container">
  <div class="row mt-3">
                <div class="col-lg-12">
                <h5>"<span class='text-warning'><?= $row['first_name']; ?>&nbsp;<?= $row['last_name'];?></span>"&nbsp;<span class='text-info'>Confirm and Enroll</span></h5>
                </div>
                <div class="col-lg-6">
                </div>
        </div>        
        <hr class="bg-info">
        <?php if(isset($_SESSION['enroll'])): ?>
        <div class="alert alert-success w-50 mx-auto">
            <?= $_SESSION['enroll']; 
            unset($_SESSION['enroll']);
            ?> 
        </div>
        <?php endif; ?>
        <?php if(isset($_SESSION['enroll-failure'])): ?>
        <div class="alert alert-danger w-50 mx-auto">
            <?= $_SESSION['enroll-failure']; 
            unset($_SESSION['enroll-failure']);
            ?> 
        </div>
        <?php endif; ?>
    <div class="card w-75 mx-auto">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="col-lg-8 mx-auto">
            
            <div class="row-lg-8 mx-auto">
              <img class="mx-auto" src="adminbackend/images/<?= $row['avatar']; ?>" style="height: 200px; width: 200px;">
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="row-lg-12"> 
            <p><span class="text-primary">EMAIL : </span>&nbsp;&nbsp;<?= $row['email']; ?></p>               
            </div>
            <div class="row-lg-12"> 
                <p><span class="text-primary">YEAR : </span>&nbsp;&nbsp;<?= $row['year']; ?></p>               
            </div>
            <div class="row-lg-12"> 
                <p><span class="text-primary">SEMESTER : </span>&nbsp;&nbsp;<?= $row['sem']; ?></p>               
            </div>
            <?php 
             $faculty_id = $row['faculty_id'];
             $department_id = $row['department_id'];
             $course_id = $row['course_id'];

             $faculty = "SELECT * FROM students WHERE faculty_id='$faculty_id'";
             $faculty_query = mysqli_query($connection,$faculty);
             $faculty_result = mysqli_fetch_assoc($faculty_query);
             $faculty_row_id =  $faculty_result['faculty_id'];

             $department = "SELECT * FROM students WHERE department_id='$department_id'";
             $department_query = mysqli_query($connection,$department);
             $department_result = mysqli_fetch_assoc($department_query);
             $department_row_id =  $department_result['department_id'];

             $course = "SELECT * FROM students WHERE course_id='$course_id'";
             $course_query = mysqli_query($connection,$course);
             $course_result = mysqli_fetch_assoc($course_query);
             $course_row_id =  $course_result['course_id'];
            //  if(!$faculty_result){
            //   die(mysqli_error($connection));
            //  }

             $faculty_s = "SELECT * FROM faculties WHERE id=$faculty_row_id";
             $faculty_s_query = mysqli_query($connection,$faculty_s);

             $department_s = "SELECT * FROM departments WHERE id=$department_row_id";
             $department_s_query = mysqli_query($connection,$department_s);

             $course_s = "SELECT * FROM courses WHERE id=$course_row_id";
             $course_s_query = mysqli_query($connection,$course_s);
            ?>

            <?php while($faculty_s_res = mysqli_fetch_assoc($faculty_s_query)): ?>
            <div class="row-lg-12"> 
            <p><span class="text-primary">FACULTY : </span>&nbsp;&nbsp;<?= $faculty_s_res['name']; ?></p>               
            </div>
            <?php endwhile; ?>
            <?php while($department_s_res = mysqli_fetch_assoc($department_s_query)): ?>
            <div class="row-lg-12"> 
            <p><span class="text-primary">DEPARTMENT : </span>&nbsp;&nbsp;<?= $department_s_res['name']; ?></p>               
            </div>
            <?php endwhile; ?>
            <?php while($course_s_res = mysqli_fetch_assoc($course_s_query)): ?>
            <div class="row-lg-12"> 
            <p><span class="text-primary">COURSE : </span>&nbsp;&nbsp;<?= $course_s_res['name']; ?></p>               
            </div>
            <?php endwhile; ?>
            <div class="row-lg-12"> 
            <p><span class="text-primary">DATE OF REGISTERATION </span> : <?= $row['date_time']; ?></p>               
            </div>
            <div class="row-lg-12"> 
            <form method="POST" action="studentbackend/enroll.php">  
            <input type="hidden" name="id" value="<?= $row['id'] ?>">    
            <button type="submit" name="submit" class="btn btn-info float-center mb-3 mx-auto">
                    <i class="fa-solid fa-user-plus"></i>&nbsp;&nbsp;Enroll
                    </button> 
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    
                
            </form>                       
            </div>
                
        </div>
    </div>
    
</div>
<?php endwhile ?>