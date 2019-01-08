<?php
include 'admin-inc/admin_header.php';
?>


    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">


        <?php
          include 'admin-inc/admin_topNav.php';
          ?>


            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

            <?php
            include 'admin-inc/admin_sideNav.php';
            ?>

                <!-- /.navbar-collapse -->

    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome To Paradise
                        <small>Shehab</small>
                    </h1>
                </div>



                    <?php
                if(isset($_GET['source'])) {
                  $source = $_GET['source'];
                } else {
                  $source = "";
                }
                switch ($source) {
                  case 'add_user':
                    include 'admin-inc/users/add_user.php';
                    break;

                case 'edit_user':
                    include 'admin-inc/users/edit_user.php';
                    break;
                        
                  default:
                  include 'admin-inc/users/view_all_users.php';
                    break;
                }
                ?>

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->


    <?php
include 'admin-inc/admin_footer.php';
?>
