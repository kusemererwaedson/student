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
        <?php if(isset($_SESSION['editStudent'])){ ?>
          <div class="alert alert-success mx-auto w-75">
           <p>
            <?= $_SESSION['editStudent']; 
            unset($_SESSION['editStudent']);
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
              <select name="faculty" id="faculty" class="form-control my-2">

                <option class="form-control my-2" value="">Select Faculty</option>
              </select>
              <select name="departments" id="departments" class="form-control my-2">

                <option class="form-control my-2" value="">Select Departments</option>
              </select>
              <select name="courses" id="courses" class="form-control my-2">
                <option class="form-control my-2" value="">Select Course</option>
              </select>

              <label for="reg_status" class="my-2">Select Registration status</label>
              <select name="reg_status" class="form-control my-2" required>
                <option class="form-control my-2" value="">Select Reg Status</option>
                <option class="form-control my-2" value="registered">registered</option>
                <option class="form-control my-2" value="pending">pending</option>
              </select>
              
              <input
                type="number"
                name="year"
                class="form-control my-2"
                value="<?= $fetch['year'] ?>"
                placeholder="Input Year"
                required
              />
               
              <input
                type="number"
                name="sem"
                class="form-control my-2"
                value="<?= $fetch['sem'] ?>"
                placeholder="Input Semester"
                required
              />    


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

 <script>
        $(document).ready(function() {
            // Populate categories dropdown on page load
            $.ajax({
                type: 'GET',
                url: 'jquery/getfaculty.php',
                dataType: 'json',
                success: function(data) {
                    $.each(data, function(index, faculty) {
                        $('#faculty').append('<option value="' + faculty.id + '">' + faculty.name + '</option>');
                    });
                }
            });

            // Handle category change event
            $('#faculty').change(function() {
                var faculty_id = $(this).val();

                // Clear subcategory dropdown
                 // Clear subcategory dropdown
                 $('#departments').html('<option value="">Select Department</option>');

                if (faculty_id !== '') {
                    // Populate subcategories dropdown based on selected category
                    $.ajax({
                        type: 'POST',
                        url: 'jquery/getdepartments.php',
                        data: { faculty_id: faculty_id },
                        dataType: 'json',
                        success: function(data) {
                            $.each(data, function(index, department) {
                                $('#departments').append('<option value="' + department.id + '">' + department.name + '</option>');
                            });
                        }
                    });
                }
            });
              // Handle department change event
              $('#departments').change(function() {
                var department_id = $(this).val();

                // Clear subcategory dropdown
                 // Clear subcategory dropdown
                 $('#courses').html('<option value="">Select Course</option>');

                if (department_id !== '') {
                    // Populate subcategories dropdown based on selected category
                    $.ajax({
                        type: 'POST',
                        url: 'jquery/getcourse.php',
                        data: { department_id: department_id },
                        dataType: 'json',
                        success: function(data) {
                            $.each(data, function(index, course) {
                                $('#courses').append('<option value="' + course.id + '">' + course.name + '</option>');
                            });
                        }
                    });
                }
            });
        });
    </script>