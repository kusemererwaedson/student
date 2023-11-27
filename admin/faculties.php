<?php include('header.php'); ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php include('includes/sidebar.php'); ?>

<?php
// fetch departments from database
$query = "SELECT * FROM faculties";
$faculties = mysqli_query($connection,$query);

?>

<div class="main" style="margin-left: 15%;">
    <div class="container">
    <div class="row mt-3">
                <div class="col-lg-6">
                    <h3 class="text-info">Manage Faculties</h3>
                </div>
                <div class="col-lg-6">
                    <button class="btn btn-info float-right">
                    <i class="fa-solid fa-user-plus"></i>&nbsp;&nbsp;<a
                      href=""
                      data-bs-toggle="modal"
                      data-bs-target="#addFaculty"
                      class="btn"
                      >Add New Faculties</a
                    >
                    </button>
                </div>
        </div>        
        <hr class="bg-info">
        <?php if(isset($_SESSION['faculty'])){ ?>
          <div class="alert alert-danger mx-auto w-75">
           <p>
            <?= $_SESSION['faculty']; 
            unset($_SESSION['faculty']);
           ?></p>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['delete-faculty-success'])){ ?>
          <div class="alert alert-success mx-auto w-75">
           <p>
            <?= $_SESSION['delete-faculty-success']; 
            unset($_SESSION['delete-faculty-success']);
           ?></p>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['editFaculty-success'])){ ?>
          <div class="alert alert-success mx-auto w-75">
           <p>
            <?= $_SESSION['editFaculty-success']; 
            unset($_SESSION['editFaculty-success']);
           ?></p>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['faculty-success'])){ ?>
          <div class="alert alert-success mx-auto w-75">
           <p>
            <?= $_SESSION['faculty-success']; 
            unset($_SESSION['faculty-success']);
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
                        <?php while($faculty = mysqli_fetch_assoc($faculties)): ?>
                        <tr>
                        <td><?= $faculty['name'] ?></td>
                        <td class="mx-auto">
                            <a
                            href="editfaculties.php?id=<?= $faculty['id'] ?>"
                            class="text-warning"
                            ><i class="fa-solid fa-pen-to-square"></i></a
                            >&nbsp;&nbsp;&nbsp;&nbsp;
                            <a
                            href="../adminbackend/deletefaculties.php?id=<?= $faculty['id'] ?>"
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
            <!-- -------------------addFaculty popup--------------- -->
            <div
      class="modal fade"
      id="addFaculty"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Faculty</h5>
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
            <form action="../adminbackend/faculty.php" class="form-horizontal" method="POST" enctype="multipart/form-data">

              <input
                type="text"
                name="faculties"
                class="form-control my-2"
                value=""
                placeholder="Faculty Name"
                required
              />
              <button type="submit"
              name="submit"
              class="btn btn-primary form-control">
                Add Faculty 
              </button>
            </form>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>