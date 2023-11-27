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

             <input class="form-control my-2" name="name" value="<?= $fetch['name'] ; ?>" required>

             <label for="faculty">SelectFaculty</label>
              <select name="faculty" id="faculty" class="form-control my-2" required>
                <option class="form-control my-2" value="">Select Faculty</option>
              </select>

              <label for="departments">Select Departments</label>
              <select name="departments" id="departments" class="form-control my-2" required>
                <option class="form-control my-2" value="">Select Departments</option>
              </select>
              <button type="submit"
              name="submit"
              class="btn btn-primary form-control">
                Edit Course
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
                 $('#departments').html('<option value="">Select Subcategory</option>');

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
        });
    </script>