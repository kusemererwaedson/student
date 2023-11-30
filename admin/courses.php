<?php include('header.php'); ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php include('includes/sidebar.php'); ?>

<?php
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

<div class="main" style="margin-left: 15%;">
    <div class="container">
    <div class="row mt-3">
                <div class="col-lg-6">
                    <h3 class="text-info">Manage Courses</h3>
                </div>
                <div class="col-lg-6">
                    <button class="btn btn-info float-right">
                    <i class="fa-solid fa-user-plus"></i>&nbsp;&nbsp;<a
                      href=""
                      data-bs-toggle="modal"
                      data-bs-target="#addCoursedata"
                      class="btn"
                      >Add New Course</a
                    >
                    </button>
                </div>
        </div>        
        <hr class="bg-info">
        <?php if(isset($_SESSION['course'])){ ?>
          <div class="alert alert-danger mx-auto w-75">
           <p>
            <?= $_SESSION['course']; 
            unset($_SESSION['course']);
           ?></p>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['delete-course-success'])){ ?>
          <div class="alert alert-success mx-auto w-75">
           <p>
            <?= $_SESSION['delete-course-success']; 
            unset($_SESSION['delete-course-success']);
           ?></p>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['course-failure'])){ ?>
          <div class="alert alert-danger mx-auto w-75">
           <p>
            <?= $_SESSION['course-failure']; 
            unset($_SESSION['course-failure']);
           ?></p>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['course-success'])){ ?>
          <div class="alert alert-success mx-auto w-75">
           <p>
            <?= $_SESSION['course-success']; 
            unset($_SESSION['course-success']);
           ?></p>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['editCourse-success'])){ ?>
          <div class="alert alert-success mx-auto w-75">
           <p>
            <?= $_SESSION['editCourse-success']; 
            unset($_SESSION['editCourse-success']);
           ?></p>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['Edit-failure'])){ ?>
          <div class="alert alert-danger mx-auto w-75">
           <p>
            <?= $_SESSION['Edit-failure']; 
            unset($_SESSION['Edit-failure']);
           ?></p>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['editCourse'])){ ?>
          <div class="alert alert-danger mx-auto w-75">
           <p>
            <?= $_SESSION['editCourse']; 
            unset($_SESSION['editCourse']);
           ?></p>
          </div>
        <?php } ?>
        <div class="row mt-4">
                <div class="col-lg-12">
                    <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <th scope="col">COURSE NAME</th>
                        <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($course = mysqli_fetch_assoc($courses)): ?>
                        <tr>
                        <td><?= $course['name'] ?></td>
                        <td class="mx-auto">
                        <a
                            href="../admin/editcourses.php?id=<?= $course['id'] ?>"
                            class="text-warning"
                            ><i class="fa-solid fa-pen-to-square"></i></a
                            >
                             &nbsp;&nbsp;&nbsp;&nbsp;
                            <a
                            href="../adminbackend/deletecourse.php?id=<?= $course['id'] ?>"
                            class="text-danger" onclick="return confirm('Do you want to delete course?');"
                            ><i class="fa-solid fa-trash"></i></a
                            >
                        </td>

                        <?php endwhile ?>
                    </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
           

                <!-- -------------------addCourse popup--------------- -->
                <div
      class="modal fade"
      id="addCoursedata"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Course</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            >
              X
            </button>
          </div>
          <div class="modal-body">
            <form action="../adminbackend/course.php" class="form-horizontal" method="POST" enctype="multipart/form-data">

              <input
                type="text"
                name="courseName"
                class="form-control my-2"
                value=""
                placeholder="Course Name"
              />

              <label for="faculties" class="my-2">Select Faculty</label>
              <select name="faculties" id="faculty" class="form-control my-2">
                <option class="form-control my-2" value="">Select Faculty</option>
              </select>

              <label for="departments" class="my-2">Select Department</label>
              <select name="departments" id="departments" class="form-control my-2">
                <option class="form-control my-2" value="">Select Department</option>
              </select>
              <button type="submit"
              name="submit"
              class="btn btn-primary form-control">
                Add Course 
              </button>
            </form>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
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
        });
    </script>