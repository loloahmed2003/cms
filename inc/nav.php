<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            <a class="navbar-brand" href="index.php">Start Bootstrap</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <?php

                    $sql  = "SELECT * FROM `categories`";
                    $return_sql = mysqli_query($connection, $sql);

                    while($row = mysqli_fetch_assoc($return_sql)){
                        $col_name = $row['cat_title'];

                        echo "<li> <a href='#'> {$col_name} </a></li>";
                    }

                    ?>

            </ul>


            <ul class="nav navbar-nav navbar-right">
                <li> <a href='admin'><span class="glyphicon glyphicon-user"></span> Admin</a></li>

            </ul>


        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
