<?php include('header.php'); ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php include('includes/sidebar.php'); ?>

<?php
 if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $_SESSION['edit_faculty_id'] = $id;

    // fetch category from database
    $query = "SELECT * FROM faculties WHERE id=$id";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result)==1){
        $fetch = mysqli_fetch_assoc($result);
    }
}
?>

<!-- -------------------editFaculty popup--------------- -->
<div class="main" style="margin-left: 15%;">
     <div class="col-lg-6 mx-auto mb-3">
        <h3 class="text-info">Edit Faculty</h3>
     </div>
     <hr class="bg-info">
        <?php if(isset($_SESSION['editFaculty'])){ ?>
          <div class="alert alert-danger mx-auto w-75">
           <p>
            <?= $_SESSION['editFaculty']; 
            unset($_SESSION['editFaculty']);
           ?></p>
          </div>
        <?php } ?>
       
        <form action="../adminbackend/editfaculty.php" class="form-horizontal w-50 mx-auto" method="POST">
             <input type="hidden" name="id" value="<?= $fetch['id'] ?>">

             <input class="form-control my-2" name="name" value="<?= $fetch['name'] ; ?>" required>
              <button type="submit"
              name="submit"
              class="btn btn-primary form-control">
                Edit Faculty
              </button>
            </form>
 </div>    
 
 
 
       