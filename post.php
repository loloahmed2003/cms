<!-- header -->
<?php
include "inc/header.php";
?>

    <!-- Navigation -->
    <?php
include "inc/nav.php";
?>

        <!-- Page Content -->
        <div class="container">

            <div class="row">

                <!-- Blog Post Content Column -->
                <div class="col-lg-8">

                    <!-- Blog Post -->


                    <?php //showSinglePost()?>

                    <?php
                    $the_post_id = $_GET['p_id'];//for show in URL (Read more) in conten.php

                    if (isset($_GET['p_id'])) {

                    $sql  = "SELECT * FROM `posts` WHERE post_id = $the_post_id";
                    $return_sql = mysqli_query($connection, $sql);

                    while($row = mysqli_fetch_assoc($return_sql)){
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_img = $row['post_img'];
                        $post_content = $row['post_content'];
                        //$post_content = substr($row['post_content'],0,150);

                    ?>


                        <!-- Title -->
                        <h1>
                            <?=$post_title?>
                        </h1>

                        <!-- Author -->
                        <p class="lead">
                            by
                            <a href="#">
                                <?=$post_author?>
                            </a>
                        </p>

                        <hr>

                        <!-- Date/Time -->
                        <p><span class="glyphicon glyphicon-time"></span> Posted on
                            <?=$post_date?>
                        </p>

                        <hr>

                        <!-- Preview Image -->
                        <img class="img-responsive" src="images/imgsPosts/<?=$post_img?>" alt="">

                        <hr>

                        <!-- Post Content -->

                        <p class="lead">
                            <?=$post_content?>
                        </p>


                        <hr>

                        <?php

                        }//while

                    }//if(isset(p_id))
                    ?>


<!---------------------------- .create comment ---------------------------->
    <?php //createComment()?>

    <?php
        if (isset($_POST['create_comment'])) {
            $the_post_id = $_GET['p_id'];

            //data from name fo the form
            $comment_author = $_POST['commentAuthor'];
          $comment_email = $_POST['commentEmail'];
          $comment_content = $_POST['commentContent'];

            if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {

               $sql = "INSERT INTO `comments`
               (`comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_date`, `comment_status`)

               VALUES

               ({$the_post_id}, '$comment_author', '$comment_email', '$comment_content', now(), 'unapproved')";

                $comment_query = mysqli_query($connection, $sql);

                /*-- ---------------------------------------- --*/

                $query = "UPDATE `posts`
                SET `post_comments_count` = post_comments_count + 1
                WHERE post_id = {$the_post_id}";

                $Update_comment_count = mysqli_query($connection, $query);


            }//if(!empt())

            else {
                        echo "<script>alert('field not found')</script>";
                    }//else

        }//if isset(create_comment)
    ?>
<!---------------------------- /.create comment ---------------------------->



<!---------------------------- /.show comment ---------------------------->


        <!-- Blog Comments -->

        <!-- Comments Form -->
        <div class="well">
            <h4><b>Leave a Comment:</b></h4>
            <form action="" method="post" role="form">

                <div class="form-group">
                    <label for="authorID">Author</label>
                    <input type="text" name="commentAuthor" id="authorID" class="form-control">
                </div>

                <div class="form-group">
                    <label for="emailID">Email</label>
                    <input type="text" name="commentEmail" id="emailID" class="form-control">
                </div>

                <div class="form-group">
                    <label for="contentID">Your comment</label>
                    <textarea name="commentContent" id="contentID" class="form-control" rows="3"></textarea>
                </div>

                <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>

            </form>
        </div>

        <hr>

        <!-- Posted Comments -->

        <?php //viewApprovedComments()?>

        <?php

            $sql = "SELECT * FROM `comments`
        WHERE comment_post_id = {$the_post_id}
        AND comment_status = 'approved'
        ORDER BY 'comment_id' DESC";
$showComments = mysqli_query($connection, $sql);
while ($row = mysqli_fetch_assoc($showComments)) {
  # code...
  $comment_date = $row['comment_date'];
        $comment_author = $row['comment_author'];
        $comment_content = $row['comment_content'];


?>


        <!-- Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="images/imgsUsers/2.jpg" width="100" height="100" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading"><?=$comment_author;?>
                    <small><?=$comment_date;?></small>
                </h4>
                <?=$comment_content;?>
            </div>
        </div>
        <hr>

           <?php
            }//while

        ?>
<!---------------------------- /.show comment ---------------------------->


                </div><!-- col-8 -->



                <!-- Blog Sidebar Widgets Column -->

                <?php
            include "inc/sidebar.php";
            ?>



            </div>
            <!-- /.row -->

            <hr>

            <!-- Footer -->
            <?php
include "inc/footer.php";
?>
