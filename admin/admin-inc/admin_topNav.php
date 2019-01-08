<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="../index.php"><span class="glyphicon glyphicon-home"></span> Home Site</a>
</div>


<!-- Top Menu Items -->
<ul class="nav navbar-right top-nav">

    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <img src="../images/imgsUsers/<?=$_SESSION['user_img']?>" width="50" alt="">
       <?=$_SESSION['user_FName']?> <?=$_SESSION['user_LName']?> 
        <b class="caret"></b>
        </a>

        <ul class="dropdown-menu">

            <li>
                <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
            </li>


            <li class="divider"></li>

            <li>
                <a href="admin-inc/logOut.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
            </li>

        </ul>
    </li>

</ul>
