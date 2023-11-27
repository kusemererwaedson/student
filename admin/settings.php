<?php include('header.php'); ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php include('includes/sidebar.php'); ?>

<?php
if(isset($_SESSION['user-id'])){
  $id=($_SESSION['user-id']);
  $sql = "SELECT * FROM admin WHERE id=$id";
  $query = mysqli_query($connection,$sql);
}

?>

<div class="main" style="margin-left: 15%;">
  <div class="container">
  <div class="row mt-3">
                <div class="col-lg-6">
                    <h3 class="text-info">Admin</h3>
                </div>
                <div class="col-lg-6">
                    <button class="btn btn-info float-right">
                    <i class="fa-solid fa-user-plus"></i>&nbsp;&nbsp;<a
                      href=""
                      data-bs-toggle="modal"
                      data-bs-target="#editAdmin"
                      class="btn"
                      >Edit Admin Details</a
                    >
                    </button>
                </div>
        </div>        
        <hr class="bg-info">
        <?php if(isset($_SESSION['admin'])): ?>
        <div class="alert alert-danger w-25 mx-auto">
            <?= $_SESSION['admin']; 
            unset($_SESSION['admin']);
            ?> 
        </div>
        <?php endif; ?>
        <?php if(isset($_SESSION['admin-success'])): ?>
        <div class="alert alert-success w-25 mx-auto">
            <?= $_SESSION['admin-success']; 
            unset($_SESSION['admin-success']);
            ?> 
        </div>
        <?php endif; ?>
        <?php if(isset($_SESSION['Edit-admin'])): ?>
        <div class="alert alert-danger w-25 mx-auto">
            <?= $_SESSION['Edit-admin']; 
            unset($_SESSION['Edit-admin']);
            ?> 
        </div>
        <?php endif; ?>
    <div class="card w-75 mx-auto">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="col-lg-8 mx-auto">
            <?php while($row = mysqli_fetch_assoc($query)): ?>
            <div class="row-lg-8 mx-auto">
              <img class="mx-auto" src="../adminbackend/images/<?= $row['avatar']; ?>" style="height: 200px; width: 200px;">
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="row-lg-12"> 
                <p><?= $row['email']; ?></p>               
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="row-lg-12"> 
                Date of Entry &nbsp;&nbsp; <p><?= $row['datetime']; ?></p>               
            </div>
            <div class="row-lg-12"> 
            <button class="btn btn-info float-center mb-3 mx-auto">
                    <i class="fa-solid fa-user-plus"></i>&nbsp;&nbsp;<a
                      href=""
                      data-bs-toggle="modal"
                      data-bs-target="#password"
                      class="btn"
                      >Change Password</a
                    >
                    </button> 
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;              
            </div>
                
        </div>
    </div>
    
</div>

 <!-- -------------------edit admin popup--------------- -->
 <div
      class="modal fade"
      id="editAdmin"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Admin</h5>
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
            <form action="../adminbackend/editadmin.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
              <input
                type="text"
                name="email"
                class="form-control my-2"
                value="<?= $row['email'] ?>"
                placeholder="Email"
                required
              />
            
              <label for="avatar" class="my-2">Edit Photo</label>
              <input
                type="file"
                name="avatar"
                id="avatar"
                class="form-control my-2 pd-2"
                required
              />
              <button type="submit"
              name="submit"
              class="btn btn-primary form-control">
                Edit Admin 
              </button>
            </form>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>
    <!-- edit password popup-->
    <div
      class="modal fade"
      id="password"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Change Password</h5>
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
            <form action="../adminbackend/editadminpass.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
              <input
                type="text"
                name="password"
                class="form-control my-2"
                value=""
                placeholder="Password"
                required
              />
              <input
                type="text"
                name="confirmpassword"
                class="form-control my-2"
                value=""
                placeholder="Confirm Password"
                required
              />
              
              <button type="submit"
              name="submitpassword"
              class="btn btn-primary form-control">
                Change Password 
              </button>
            </form>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>
    <?php endwhile ?>