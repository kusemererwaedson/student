<?php include('header.php'); ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php include('includes/sidebar.php'); ?>

<?php
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
                    <h3 class="text-info">Manage Departments</h3>
                </div>
                <div class="col-lg-6">
                    <button class="btn btn-info float-right">
                    <i class="fa-solid fa-user-plus"></i>&nbsp;&nbsp;<a
                      href=""
                      data-bs-toggle="modal"
                      data-bs-target="#addDepartment"
                      class="btn"
                      >Add New Departments</a
                    >
                    </button>
                </div>
        </div>        
        <hr class="bg-info">
        <?php if(isset($_SESSION['department'])){ ?>
          <div class="alert alert-danger mx-auto w-75">
           <p>
            <?= $_SESSION['department']; 
            unset($_SESSION['department']);
           ?></p>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['delete-department-success'])){ ?>
          <div class="alert alert-success mx-auto w-75">
           <p>
            <?= $_SESSION['delete-department-success']; 
            unset($_SESSION['delete-department-success']);
           ?></p>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['department-failure'])){ ?>
          <div class="alert alert-danger mx-auto w-75">
           <p>
            <?= $_SESSION['department-failure']; 
            unset($_SESSION['department-failure']);
           ?></p>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['department-success'])){ ?>
          <div class="alert alert-success mx-auto w-75">
           <p>
            <?= $_SESSION['department-success']; 
            unset($_SESSION['department-success']);
           ?></p>
          </div>
        <?php } ?>
        <div class="row mt-4">
                <div class="col-lg-12">
                    <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Departments NAME</th>
                        <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($department = mysqli_fetch_assoc($departments)): ?>
                        <tr>
                        <td><?= $department['name'] ?></td>
                        <td class="mx-auto">
                            <a
                            href="../adminbackend/editdepartment.php?id=<?= $epartment['id'] ?>"
                            class="text-warning"
                            ><i class="fa-solid fa-pen-to-square"></i></a
                            >&nbsp;&nbsp;&nbsp;&nbsp;
                            <a
                            href="../adminbackend/deletedepartments.php?id=<?= $department['id'] ?>"
                            class="text-danger" onclick="return confirm('Do you want to delete Departments?');"
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
            <!-- -------------------addDepartments popup--------------- -->
            <div
      class="modal fade"
      id="addDepartment"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Departments</h5>
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
            <form action="../adminbackend/department.php" class="form-horizontal" method="POST" enctype="multipart/form-data">

              <input
                type="text"
                name="departments"
                class="form-control my-2"
                value=""
                placeholder="Departments Name"
              />

              <label for="faculties" class="my-2">Select Faculty</label>
              <select name="faculties" class="form-control my-2">
                <?php while($faculty=mysqli_fetch_assoc($faculties)){?>
                <option class="form-control my-2" value="<?= $faculty['id']; ?>"><?= $faculty['name']; ?></option>
                <?php } ?>
              </select>
              <button type="submit"
              name="submit"
              class="btn btn-primary form-control">
                Add Department 
              </button>
            </form>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>