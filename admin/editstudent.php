<?php include('header.php'); ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php include('includes/sidebar.php'); ?>

<?php
 if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // fetch category from database
    $query = "SELECT * FROM students WHERE id=$id";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result)==1){
        $fetch = mysqli_fetch_assoc($result);
    }
}else{
    header('location: dashboard.php');
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

<!-- -------------------editStudent popup--------------- -->
<div class="main" style="margin-left: 15%;">
     <div class="col-lg-6 mx-auto mb-3">
        <h3 class="text-info">Edit Students</h3>
     </div>
     <hr class="bg-info">
        <?php if(isset($_SESSION['editStudent'])){ ?>
          <div class="alert alert-danger mx-auto w-75">
           <p>
            <?= $_SESSION['editStudent']; 
            unset($_SESSION['editStudent']);
           ?></p>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['editStudent-success'])){ ?>
          <div class="alert alert-success mx-auto w-75">
           <p>
            <?= $_SESSION['editStudent-success']; 
            unset($_SESSION['editStudent-success']);
           ?></p>
          </div>
        <?php } ?>
        <form action="../adminbackend/editStudent.php" class="form-horizontal w-50 mx-auto" method="POST" enctype="multipart/form-data">
             <input type="hidden" name="id" value="<?= $fetch['id'] ?>">
              <input
                type="text"
                name="firstname"
                class="form-control my-2"
                value="<?= $fetch['first_name'] ?>"
                placeholder="First Name"
              />
              <input
                type="text"
                name="lastname"
                class="form-control my-2"
                value="<?= $fetch['last_name'] ?>"
                placeholder="Last Name"
              />
              <input
                type="text"
                name="regnumber"
                class="form-control my-2"
                value="<?= $fetch['reg_number'] ?>"
                placeholder="Registration Number"
              />
              <input
                type="email"
                name="email"
                class="form-control my-2"
                value="<?= $fetch['email'] ?>"
                placeholder="Email"
              />
              <input
                type="text"
                name="phone"
                class="form-control my-2"
                value="<?= $fetch['phone'] ?>"
                placeholder="Phone Number"
              />
              <select name="faculty" class="form-control my-2">
                <?php while($faculty=mysqli_fetch_assoc($faculties)){?>

                <option class="form-control my-2" value="<?= $faculty['id']; ?>"><?= $faculty['name']; ?></option>
                <?php } ?>
              </select>
              <select name="departments" class="form-control my-2">
                <?php while($department=mysqli_fetch_assoc($departments)){?>

                <option class="form-control my-2" value="<?= $department['id']; ?>"><?= $department['name']; ?></option>
                <?php } ?>
              </select>
              <select name="courses" class="form-control my-2">
                <?php while($course=mysqli_fetch_assoc($courses)):?>
                <option class="form-control my-2" value="<?= $course['id']; ?>"><?= $course['name']; ?></option>
                <?php endwhile ?>
              </select>
              <input
                type="text"
                name="password"
                class="form-control my-2"
                value=""
                placeholder="password"
              />
              <input
                type="text"
                name="passwordConfirm"
                class="form-control my-2"
                value=""
                placeholder="Confirm Password"
              />
              <label for="avatar" class="my-2">Upload Photo</label>
              <input
                type="file"
                name="avatar"
                id="avatar"
                class="form-control my-2 pd-2"
              />
              <button type="submit"
              name="editStudent"
              class="btn btn-primary form-control">
                Edit student
              </button>
            </form>
 </div>            