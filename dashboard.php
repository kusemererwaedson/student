<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Record</title>
    <!-- bootstrap link -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- fonts cdn -->
    <script src="https://kit.fontawesome.com/1029c5e094.js" crossorigin="anonymous"></script>
   <!-- custom css -->
   <link rel="stylesheet" href="css/index.css">
    </head>
<body>
    <div id="app">
        <div class="container-fluid">
            <div class="row bg-dark">
                <div class="col-lg-12">
                    <p class="text-center text-light display-4 pt-2" style='font-size:25px;'>STUDENT RECORD MANAGEMENT SYSTEM</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-3">
                <div class="col-lg-6">
                    <h3 class="text-info">Register Users</h3>
                </div>
                <div class="col-lg-6">
                    <button class="btn btn-info float-right" @click="showAddModal=true">
                        <i class="fas fa-user"></i>&nbsp;&nbsp;Add New User
                    </button>
                </div>
            </div>
            <hr class="bg-info">
            <div class="alert alert-danger" v-if="errorMsg">
                Error Message
            </div>
            <div class="alert alert-success" v-if="successMsg">
                success Message
            </div>

                <!-- Displaying Records -->
                 <div class="row">
                    <div class="col-lg-4">
                        
                    </div>
                    <div class="col-lg-8">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center bg-info text-light">                                    
                                    <th>FIRST NAME</th>
                                    <th>LAST NAME</th>
                                    <th>STUDENT IMAGE</th>
                                    <th>VIEW STUDENT DATA</th>
                                    <th>EDIT</th>
                                    <th>DELETE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td>KUSEMERERWA</td>
                                    <td>EDSON</td>
                                    <td><img src="../images/manager.png" style="width: 50px; height: 50px; boder-radius: 50%;"></td>
                                    <td><a href="#" class="text-success" @click='showEditModal=true'>View Details</a></td>
                                    <td><a href="#" class="text-success" @click='showEditModal=true'><i class="fa-solid fa-pen-to-square"></i></a></td>
                                    <td><a href="#" class="text-danger" @click='showDeleteModal=true'><i class="fa-regular fa-trash-can"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> 
        </div>

        <!-- Add New User Model -->
        <div id="overlay" v-if="showAddModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New User</h5>
                            <button type="button" class="close" @click="showAddModal=false">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body p-4">
                        <form action="#" method="post">
                            <div class="form-group">
                                <input type="text" name='reg' class="form-control form-control-lg" placeholder='REGISTRATION NUMBER'>
                            </div>
                            <div class="form-group">
                                <input type="text" name='firstname' class="form-control form-control-lg" placeholder='FIRST NAME'>
                            </div>
                            <div class="form-group">
                                <input type="text" name='lastname' class="form-control form-control-lg" placeholder='LAST NAME'>
                            </div>
                            <div class="form-group">
                                <input type="email" name='name' class="form-control form-control-lg" placeholder='E-MAIL'>
                            </div>
                            <div class="form-group">
                                <input type="tel" name='phone' class="form-control form-control-lg" placeholder='PHONE NUMBER'>
                            </div>
                            <div class="form-group">
                                <label for="course">SELECT COURSE</label>
                                <select name="course" class="form-control form-control-lg">
                                    <option value="" class="form-control form-control-lg">COMPUTER SCIENCE</option>
                                    <option value="" class="form-control form-control-lg">COMMUNITY PSYCHOLOGY</option>
                                    <option value="" class="form-control form-control-lg">PUBLIC HEALTH</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info btn-block btn-lg">Add User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit User Model -->
        <div id="overlay" v-if="showEditModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit User</h5>
                            <button type="button" class="close" @click="showEditModal=false">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body p-4">
                        <form action="#" method="post">
                            <div class="form-group">
                                <input type="text" name='reg' class="form-control form-control-lg" placeholder='REGISTRATION NUMBER'>
                            </div>
                            <div class="form-group">
                                <input type="text" name='firstname' class="form-control form-control-lg" placeholder='FIRST NAME'>
                            </div>
                            <div class="form-group">
                                <input type="text" name='lastname' class="form-control form-control-lg" placeholder='LAST NAME'>
                            </div>
                            <div class="form-group">
                                <input type="email" name='name' class="form-control form-control-lg" placeholder='E-MAIL'>
                            </div>
                            <div class="form-group">
                                <input type="tel" name='phone' class="form-control form-control-lg" placeholder='PHONE NUMBER'>
                            </div>
                            <div class="form-group">
                                <label for="course">SELECT COURSE</label>
                                <select name="course" class="form-control form-control-lg">
                                    <option value="" class="form-control form-control-lg">COMPUTER SCIENCE</option>
                                    <option value="" class="form-control form-control-lg">COMMUNITY PSYCHOLOGY</option>
                                    <option value="" class="form-control form-control-lg">PUBLIC HEALTH</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info btn-block btn-lg">Update User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

         <!-- Delete User Model -->
         <div id="overlay" v-if="showDeleteModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete User</h5>
                            <button type="button" class="close" @click="showDeleteModal=false">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body p-4">
                        <h4 class="text-danger">Are you sure you want to delete this user?</h4> 
                        <h5>You are deleting <span class="text-primary">'Kusemererwa Edson '</span></h5>
                        <hr>
                        <button class="btn btn-danger btn-lg" @click="showDeleteModal=false">Yes</button>&nbsp;&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-success btn-lg" @click="showDeleteModal=false">No</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Display single user Modal -->
        <!-- <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center bg-info text-light">
                                    <th>STUDENT REGISTRATION NUMBER</th>
                                    <th>FIRST NAME</th>
                                    <th>LAST NAME</th>
                                    <th>EMAIL</th>
                                    <th>PHONE NUMBER</th>
                                    <th>COURSE</th>
                                    <th>AVATAR</th>
                                    <th>PASSWORD</th>
                                    <th>EDIT</th>
                                    <th>DELETE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td>21/U/0461/LCS</td>
                                    <td>KUSEMERERWA</td>
                                    <td>EDSON</td>
                                    <td>edsonkusemererwa2000@gmail.com</td>
                                    <td>0761488516</td>
                                    <td>COMPUTER SCIENCE</td>
                                    <td><img src="../images/manager.png" style="width: 50px; height: 50px; boder-radius: 50%;"></td>
                                    <td>EddyKusem@</td>
                                    <td><a href="#" class="text-success" @click='showEditModal=true'><i class="fa-solid fa-pen-to-square"></i></a></td>
                                    <td><a href="#" class="text-danger" @click='showDeleteModal=true'><i class="fa-regular fa-trash-can"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> 
        </div> -->
     <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script>
            var app = new Vue({
        el: '#app',
        data: {
            errorMsg: false,
            successMsg: false,
            showAddModal: false,
            showEditModal: false,
            showDeleteModal:false

        }
    });

    </script>
</body>
</html>