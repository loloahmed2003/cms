<?php include 'admin/admin-inc/functions.php' ?>


<!-- header -->
<?php
include "inc/header.php";
?>

    <!---------------------------- .add user ---------------------------->
    <?php addRegisteredUser(); ?>
    <!---------------------------- /.add user ---------------------------->


    <form action="" method="post" enctype="multipart/form-data" class="col-md-8 col-md-offset-2">

        <div class="form-group">
            <label style="color: green"><h2>Create a new account</h2></label>
        </div>

        <div class="form-group">
            <label for="usernameID">Username</label>
            <input type="text" name="username" id="usernameID" class="form-control">
        </div>


        <div class="form-group">
            <label for="FNameID">Frist Name</label>
            <input type="text" name="userFName" id="FNameID" class="form-control">
        </div>


        <div class="form-group">
            <label for="LNameID">Last Name</label>
            <input type="text" name="userLName" id="LNameID" class="form-control">
        </div>


        <div class="form-group">
            <label for="roleID">User Role</label>

            <div class="form-inline">
                <input type="radio" name="userRole" id="roleID" value="Admin" class="form-control"> Admin
                <input type="radio" name="userRole" id="roleID" value="Subscriber" class="form-control"> Subscriber
            </div>

        </div>


        <div class="form-group">
            <label for="emailID">Email</label>
            <input type="email" name="userEmail" id="emailID" placeholder="example@example.com" class="form-control">
        </div>


        <div class="form-group">
            <label for="passID">Password</label>
            <input type="password" name="userPass" id="passID" class="form-control">
        </div>



        <div class="form-group">
            <label for="imgID">Post Image</label>
            <input type="file" name="img" id="imgID" class="form-control">
        </div>


        <div class="form-group">
            <input type="submit" value="Create Account" name="create_user" class="btn btn-success">
        </div>

    </form>

    <div class="container">
        <!-- Footer -->
        <?php
include "inc/footer.php";
?>
    </div>
