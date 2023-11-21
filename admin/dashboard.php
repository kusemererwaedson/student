    <?php include ('header.php'); ?>
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

      // delete form data session
      unset($_SESSION['add-post-data']);
      ?>
    <div class="side_bar ">
      <div class="row-lg-12 my-1 text-center py-4 bg-info">
        <div class="col-lg-12"><a style= "color: white;" href=""><i class="fa-solid fa-trash"></i>Dasboard</a></div>
      </div>
      <div class="row-lg-12 my-1 text-center py-4 bg-info">
        <div class="col-lg-12"><a style= "color: white;" href="">Dasboard</a></div>
      </div>
      <div class="row-lg-12 my-1 text-center py-4 bg-info">
        <div class="col-lg-12"><a style= "color: white;" href="">Dasboard</a></div>
      </div>
      <div class="row-lg-12 my-1 text-center py-4 bg-info">
        <div class="col-lg-12"><a style= "color: white;" href="">Dasboard</a></div>
      </div>
      <div class="row-lg-12 my-1 text-center py-4 bg-info">
        <div class="col-lg-12"><a style= "color: white;" href="">Dasboard</a></div>
      </div>
    </div>
    <div class="main" style="margin-left: 20%;">
      <div class="container">
        <div class="row mt-3">
                <div class="col-lg-6">
                    <h3 class="text-info">Register Users</h3>
                </div>
                <div class="col-lg-6">
                    <button class="btn btn-info float-right">
                    <i class="fa-solid fa-person-circle-plus"></i>&nbsp;&nbsp;<a
                      href=""
                      data-bs-toggle="modal"
                      data-bs-target="#addStudent"
                      class="btn"
                      >Add New User</a
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
                  <th scope="col">PASSWORD</th>
                  <th scope="col">COURSE</th>
                  <th scope="col">ACTION</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>KUSEMERERWA</td>
                  <td>EDSON</td>
                  <td style="width: 50px;">edsonkusemererwa@fms.lirauni.ac.ug</td>
                  <td><img src="../images/manager.png" style="width: 50px; height: 50px; border-radius: 50%;"></td>
                  <td>21/U/0461/LCS</td>
                  <td>computer science</td>
                  <td class="mx-auto">
                    <a
                      href=""
                      data-bs-toggle="modal"
                      data-bs-target="#editStudent"
                      class="btn btn-warning"
                      >Edit</a
                    >
                    <a
                      href=""
                      data-bs-toggle="modal"
                      data-bs-target="#deleteStudent"
                      class="btn btn-danger"
                      >Delete</a
                    >
                  </td>
                </tr>
                <tr>
                  <td>KUSEMERERWA</td>
                  <td>EDSON</td>
                  <td style="width: 50px;">edsonkusemererwa@fms.lirauni.ac.ug</td>
                  <td><img src="../images/manager.png" style="width: 50px; height: 50px; border-radius: 50%;"></td>
                  <td>21/U/0461/LCS</td>
                  <td>computer science</td>
                  <td class="mx-auto">
                    <a
                      href=""
                      data-bs-toggle="modal"
                      data-bs-target="#editStudent"
                      class="btn btn-warning"
                      >Edit</a
                    >
                    <a
                      href=""
                      data-bs-toggle="modal"
                      data-bs-target="#deleteStudent"
                      class="btn btn-danger"
                      >Delete</a
                    >
                  </td>
                </tr>
                <tr>
                  <td>KUSEMERERWA</td>
                  <td>EDSON</td>
                  <td style="width: 50px;">edsonkusemererwa@fms.lirauni.ac.ug</td>
                  <td><img src="../images/manager.png" style="width: 50px; height: 50px; border-radius: 50%;"></td>
                  <td>21/U/0461/LCS</td>
                  <td>computer science</td>
                  <td class="mx-auto">
                    <a
                      href=""
                      data-bs-toggle="modal"
                      data-bs-target="#editStudent"
                      class="btn btn-warning"
                      >Edit</a
                    >
                    <a
                      href=""
                      data-bs-toggle="modal"
                      data-bs-target="#deleteStudent"
                      class="btn btn-danger"
                      >Delete</a
                    >
                  </td>
                </tr>
                <tr>
                  <td>KUSEMERERWA</td>
                  <td>EDSON</td>
                  <td style="width: 50px;">edsonkusemererwa@fms.lirauni.ac.ug</td>
                  <td><img src="../images/manager.png" style="width: 50px; height: 50px; border-radius: 50%;"></td>
                  <td>21/U/0461/LCS</td>
                  <td>computer science</td>
                  <td class="mx-auto">
                    <a
                      href=""
                      data-bs-toggle="modal"
                      data-bs-target="#editStudent"
                      class="btn btn-warning"
                      >Edit</a
                    >
                    <a
                      href=""
                      data-bs-toggle="modal"
                      data-bs-target="#deleteStudent"
                      class="btn btn-danger"
                      >Delete</a
                    >
                  </td>
                </tr>
                <tr>
                  <td>KUSEMERERWA</td>
                  <td>EDSON</td>
                  <td style="width: 50px;">edsonkusemererwa@fms.lirauni.ac.ug</td>
                  <td><img src="../images/manager.png" style="width: 50px; height: 50px; border-radius: 50%;"></td>
                  <td>21/U/0461/LCS</td>
                  <td>computer science</td>
                  <td class="mx-auto">
                    <a
                      href=""
                      data-bs-toggle="modal"
                      data-bs-target="#editStudent"
                      class="btn btn-warning"
                      >Edit</a
                    >
                    <a
                      href=""
                      data-bs-toggle="modal"
                      data-bs-target="#deleteStudent"
                      class="btn btn-danger"
                      >Delete</a
                    >
                  </td>
                </tr>
                <tr>
                  <td>KUSEMERERWA</td>
                  <td>EDSON</td>
                  <td style="width: 50px;">edsonkusemererwa@fms.lirauni.ac.ug</td>
                  <td><img src="../images/manager.png" style="width: 50px; height: 50px; border-radius: 50%;"></td>
                  <td>21/U/0461/LCS</td>
                  <td>computer science</td>
                  <td class="mx-auto">
                    <a
                      href=""
                      data-bs-toggle="modal"
                      data-bs-target="#editStudent"
                      class="btn btn-warning"
                      >Edit</a
                    >
                    <a
                      href=""
                      data-bs-toggle="modal"
                      data-bs-target="#deleteStudent"
                      class="btn btn-danger"
                      >Delete</a
                    >
                  </td>
                </tr>
                <tr>
                  <td>KUSEMERERWA</td>
                  <td>EDSON</td>
                  <td style="width: 50px;">edsonkusemererwa@fms.lirauni.ac.ug</td>
                  <td><img src="../images/manager.png" style="width: 50px; height: 50px; border-radius: 50%;"></td>
                  <td>21/U/0461/LCS</td>
                  <td>computer science</td>
                  <td class="mx-auto">
                    <a
                      href=""
                      data-bs-toggle="modal"
                      data-bs-target="#editStudent"
                      class="btn btn-warning"
                      >Edit</a
                    >
                    <a
                      href=""
                      data-bs-toggle="modal"
                      data-bs-target="#deleteStudent"
                      class="btn btn-danger"
                      >Delete</a
                    >
                  </td>
                </tr>
                <tr>
                  <td>KUSEMERERWA</td>
                  <td>EDSON</td>
                  <td style="width: 50px;">edsonkusemererwa@fms.lirauni.ac.ug</td>
                  <td><img src="../images/manager.png" style="width: 50px; height: 50px; border-radius: 50%;"></td>
                  <td>21/U/0461/LCS</td>
                  <td>computer science</td>
                  <td class="mx-auto">
                    <a
                      href=""
                      data-bs-toggle="modal"
                      data-bs-target="#editStudent"
                      class="btn btn-warning"
                      >Edit</a
                    >
                    <a
                      href=""
                      data-bs-toggle="modal"
                      data-bs-target="#deleteStudent"
                      class="btn btn-danger"
                      >Delete</a
                    >
                  </td>
                </tr>
                <tr>
                  <td>KUSEMERERWA</td>
                  <td>EDSON</td>
                  <td style="width: 50px;">edsonkusemererwa@fms.lirauni.ac.ug</td>
                  <td><img src="../images/manager.png" style="width: 50px; height: 50px; border-radius: 50%;"></td>
                  <td>21/U/0461/LCS</td>
                  <td>computer science</td>
                  <td class="mx-auto">
                    <a
                      href=""
                      data-bs-toggle="modal"
                      data-bs-target="#editStudent"
                      class="btn btn-warning"
                      >Edit</a
                    >
                    <a
                      href=""
                      data-bs-toggle="modal"
                      data-bs-target="#deleteStudent"
                      class="btn btn-danger"
                      >Delete</a
                    >
                  </td>
                </tr>
                <tr>
                  <td>KUSEMERERWA</td>
                  <td>EDSON</td>
                  <td style="width: 50px;">edsonkusemererwa@fms.lirauni.ac.ug</td>
                  <td><img src="../images/manager.png" style="width: 50px; height: 50px; border-radius: 50%;"></td>
                  <td>21/U/0461/LCS</td>
                  <td>computer science</td>
                  <td class="mx-auto">
                    <a
                      href=""
                      data-bs-toggle="modal"
                      data-bs-target="#editStudent"
                      class="btn btn-warning"
                      >Edit</a
                    >
                    <a
                      href=""
                      data-bs-toggle="modal"
                      data-bs-target="#deleteStudent"
                      class="btn btn-danger"
                      >Delete</a
                    >
                  </td>
                </tr>
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
    <!-- -------------------edit popup--------------- -->
    <div
      class="modal fade"
      id="editStudent"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Student</h5>
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
          <form action="" class="form-horizontal" method="POST">
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
                type="email"
                name="email"
                class="form-control my-2"
                value=""
                placeholder="Email"
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
                name="phone"
                class="form-control my-2"
                value=""
                placeholder="Phone Number"
              />
              <input
                type="text"
                name="password"
                class="form-control my-2"
                value=""
                placeholder="password"
              />
              <label for="avatar" class="my-2">Upload Photo</label>
              <input
                type="file"
                name="avatar"
                class="form-control my-2 pd-2"
                value=""
              />
              <button type="submit" class="btn btn-primary form-control">
                Edit student
              </button>
            </form>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>
    <!-- -------delete popup -------- -->
    <div class="modal fade" id="deleteStudent" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <p>Do you want to Delete this Student</p>
                    <form action="/deletestudent/" method="POST">
                        <div class="text-center p-3">
                            <button type="button" class="btn m-4 bg-primary"
                                data-bs-dismiss="modal">No</button>
                            <button type="submit" name="delete_student" class="btn btn-danger"
                                id="confirmButton">Yes</button>
                        </div>
                    </form>
                </div>
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
