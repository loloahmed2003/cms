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
                          <small><?=$_SESSION['user_FName']?></small>
                      </h1>
                      <?php
                      include 'admin-inc/dashboard.php';
                      ?>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php
include 'admin-inc/admin_footer.php';
?>
