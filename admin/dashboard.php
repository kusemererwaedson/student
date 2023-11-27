    <?php include ('header.php'); ?>
    <?php


      // fetch students DESC from database
      $query = "SELECT * FROM students";
      $students = mysqli_query($connection,$query);

      // fetch students DESC from database
      $query = "SELECT * FROM students";
      $student_s = mysqli_query($connection,$query);

      // fetch courses from database
      $query = "SELECT * FROM courses";
      $courses = mysqli_query($connection,$query);

      // fetch departments from database
      $query = "SELECT * FROM departments";
      $departments = mysqli_query($connection,$query);

      // fetch faculties from database
      $query = "SELECT * FROM faculties";
      $faculties = mysqli_query($connection,$query);

      // delete form data session
      unset($_SESSION['add-post-data']);
      ?>
   
   <?php include('includes/sidebar.php') ?>

    <div class="main" style="margin-left: 15%;">
      <div class="container">
        <div class="row mt-3">
                <div class="col-lg-6">
                    <h3 class="text-info">Register Students</h3>
                </div>
                <div class="col-lg-6">
                    <button class="btn btn-info float-right">
                    <i class="fa-solid fa-user-plus"></i>&nbsp;&nbsp;<a
                      href=""
                      data-bs-toggle="modal"
                      data-bs-target="#addStudent"
                      class="btn"
                      >Add New Student</a
                    >
                    </button>
                </div>
        </div>
        <hr class="bg-info">
        <?php if(isset($_SESSION['signup'])){ ?>
          <div class="alert alert-danger mx-auto w-75">
           <p>
            <?= $_SESSION['signup']; 
            unset($_SESSION['signup']);
           ?></p>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['signup-success'])){ ?>
          <div class="alert alert-success mx-auto w-75">
           <p>
            <?= $_SESSION['signup-success']; 
            unset($_SESSION['signup-success']);
           ?></p>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['delete-user-success'])){ ?>
          <div class="alert alert-success mx-auto w-75">
           <p>
            <?= $_SESSION['delete-user-success']; 
            unset($_SESSION['delete-user-success']);
           ?></p>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['delete-user-success'])){ ?>
          <div class="alert alert-danger mx-auto w-75">
           <p>
            <?= $_SESSION['delete-user-success']; 
            unset($_SESSION['delete-user-success']);
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
        
        <?php if(isset($_SESSION['Edit-failure'])){ ?>
          <div class="alert alert-danger mx-auto w-75">
           <p>
            <?= $_SESSION['Edit-failure']; 
            unset($_SESSION['Edit-failure']);
           ?></p>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['editStudent'])){ ?>
          <div class="alert alert-danger mx-auto w-75">
           <p>
            <?= $_SESSION['editStudent']; 
            unset($_SESSION['editStudent']);
           ?></p>
          </div>
        <?php } ?>
        <div class="row">
          <div class="col-lg-12">
            <h5 class="text-center">Students</h5>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th scope="col">FIRST NAME</th>
                  <th scope="col">SECOND NAME</th>
                  <th scope="col">EMAIL</th>
                  <th scope="col">PHOTO</th>
                  <th scope="col">REGISTRATION NUMBER</th>
                  <th scope="col">COURSE</th>
                  <th scope="col">ACTION</th>
                </tr>
              </thead>
              <tbody>
                <?php while($student = mysqli_fetch_assoc($students)): ?>
                  <?php
                        $course_id = $student['course_id'];
                        $course_id_query= "SELECT * FROM courses WHERE id=$course_id";
                        $course_id_result = mysqli_query($connection, $course_id_query);
                        $course_id_name = mysqli_fetch_assoc($course_id_result);
                        ?>
                <tr>
                  <td><?= $student['first_name'] ?></td>
                  <td><?= $student['last_name'] ?></td>
                  <td style="width: 50px;"><?= $student['email'] ?></td>
                  <td><img src="../adminbackend/images/<?= $student['avatar'] ?>" style="width: 50px; height: 50px; border-radius: 50%;"></td>
                  <td><?= $student['reg_number'] ?></td>
                  <td><?= $course_id_name['name'] ?></td>
                  <td class="mx-auto">
                    <a
                      href="editstudent.php?id=<?= $student['id'] ?>"
                      class="text-warning"
                      ><i class="fa-solid fa-pen-to-square"></i></a
                    >&nbsp;&nbsp;&nbsp;&nbsp;
                    <a
                      href="../adminbackend/deletestudent.php?id=<?= $student['id'] ?>"
                      class="text-danger" onclick="return confirm('Do you want to delete user?');"
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

        <!-- -------------------addStudent popup--------------- -->
    <div
      class="modal fade"
      id="addStudent"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Student</h5>
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
            <form action="../adminbackend/register.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
              <input
                type="text"
                name="firstname"
                class="form-control my-2"
                value=""
                placeholder="First Name"
              />
              <input
                type="text"
                name="lastname"
                class="form-control my-2"
                value=""
                placeholder="Last Name"
              />
              <input
                type="text"
                name="regnumber"
                class="form-control my-2"
                value=""
                placeholder="Registration Number"
              />
              <input
                type="email"
                name="email"
                class="form-control my-2"
                value=""
                placeholder="Email"
              />
              <input
                type="text"
                name="phone"
                class="form-control my-2"
                value=""
                placeholder="Phone Number"
              />

              <label for="faculty" class="my-2">Select Faculty</label>
              <select name="faculty" class="form-control my-2">
                <?php while($faculty=mysqli_fetch_assoc($faculties)){?>
                <option class="form-control my-2" value="<?= $faculty['id']; ?>"><?= $faculty['name']; ?></option>
                <?php } ?>
              </select>

              <label for="departments" class="my-2">Select Department</label>
              <select name="departments" class="form-control my-2">
                <?php while($department=mysqli_fetch_assoc($departments)){?> 
                <option class="form-control my-2" value="<?= $department['id']; ?>"><?= $department['name']; ?></option>
                <?php } ?>
              </select>

              <label for="courses" class="my-2">Select Course</label>
              <select name="courses" class="form-control my-2">
                <?php while($course=mysqli_fetch_assoc($courses)):?>
                <option class="form-control my-2" value="<?= $course['id']; ?>"><?= $course['name']; ?></option>
                <?php endwhile ?>
              </select>

              <label for="reg_status" class="my-2">Select Registration status</label>
              <select name="reg_status" class="form-control my-2">
                <option class="form-control my-2" value="">Select Reg Status</option>
                <option class="form-control my-2" value="registered">registered</option>
                <option class="form-control my-2" value="pending">pending</option>
              </select>
              
              <input
                type="number"
                name="year"
                class="form-control my-2"
                value=""
                placeholder="Input Year"
                required
              />
               
              <input
                type="number"
                name="sem"
                class="form-control my-2"
                value=""
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
              name="submit"
              class="btn btn-primary form-control">
                Add student
              </button>
            </form>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>
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
  </body>
</html>
