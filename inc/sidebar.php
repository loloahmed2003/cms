<div class="col-md-4">


    <!-- Login Well -->
    <div class="well">
        <h4>Login</h4>
        <form method="post" action="inc/login.php">
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="example@example">
            </div>
            <div class="input-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <span class="input-group-btn">
                    <button class="btn btn-info" type="submit" name="login">login
                    <span class="fa fa-fw fa-sign-in"></span>
                    </button>
                </span>
            </div>
            <!-- /.input-group -->
        </form>

    </div>



    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form method="post" action="search.php">

            <div class="input-group">
                <input type="text" class="form-control" name="search">
                <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                </button>
                </span>
            </div>
            <!-- /.input-group -->
        </form>

    </div>




    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">


            <div class="col-lg-6">
                <ul class="list-unstyled">

                    <?php
                    $sql  = "SELECT * FROM `categories`";
                    $return_sql = mysqli_query($connection, $sql);


                   while($row = mysqli_fetch_assoc($return_sql)){
                        $cat_id = $row['cat_id'];
                        $cat_name = $row['cat_title'];

                        echo "<li> <a href='category.php?category=$cat_id'> {$cat_name} </a></li>";

                    ?>

                </ul>
            </div>


            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <?php
                                }
                                ?>
                </ul>
            </div>
            <!-- /.col-lg-6 -->


        </div>
        <!-- /.row -->
    </div>




    <!-- Side Widget Well -->
    <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>

</div>
