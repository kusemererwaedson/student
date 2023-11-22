<?php include('header.php'); ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php include('includes/sidebar.php'); ?>

<?php
 if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // fetch category from database
    $query = "SELECT * FROM courses WHERE id=$id";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result)==1){
        $fetch = mysqli_fetch_assoc($result);
    }
}
      // fetch courses from database
      $query = "SELECT * FROM courses";
      $courses = mysqli_query($connection,$query);

      // fetch departments from database
      $query = "SELECT * FROM departments";
      $departments = mysqli_query($connection,$query);

      // fetch faculties from database
      $query = "SELECT * FROM faculties";
      $faculties = mysqli_query($connection,$query);

?>

<!-- -------------------editCourse popup--------------- -->
<div class="main" style="margin-left: 15%;">
     <div class="col-lg-6 mx-auto mb-3">
        <h3 class="text-info">Edit Courses</h3>
     </div>
     <hr class="bg-info">
        <?php if(isset($_SESSION['editCourse'])){ ?>
          <div class="alert alert-danger mx-auto w-75">
           <p>
            <?= $_SESSION['editCourse']; 
            unset($_SESSION['editCourse']);
           ?></p>
          </div>
        <?php } ?>
        <form action="../adminbackend/editcourse.php" class="form-horizontal w-50 mx-auto" method="POST">
             <input type="hidden" name="id" value="<?= $fetch['id'] ?>">

             <input class="form-control my-2" name="name" value="<?= $fetch['name'] ; ?>">

             <label for="faculty">SelectFaculty</label>
              <select name="faculty" class="form-control my-2">
                <?php while($faculty=mysqli_fetch_assoc($faculties)){?>
                <option class="form-control my-2" value="<?= $faculty['id']; ?>"><?= $faculty['name']; ?></option>
                <?php } ?>
              </select>

              <label for="departments">Select Departments</label>
              <select name="departments" class="form-control my-2">
                <?php while($department=mysqli_fetch_assoc($departments)){?>
                <option class="form-control my-2" value="<?= $department['id']; ?>"><?= $department['name']; ?></option>
                <?php } ?>
              </select>
              <button type="submit"
              name="submit"
              class="btn btn-primary form-control">
                Edit Course
              </button>
            </form>
 </div>            