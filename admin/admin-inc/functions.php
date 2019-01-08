<!---------------------** catogeries **--------------------->

<?php
function showCatogry() {

global $connection;


$sql = "SELECT * FROM `categories`";
$catogry_query = mysqli_query($connection, $sql);
while ($row = mysqli_fetch_assoc($catogry_query)) {
  # code...
  $cat_id_num = $row['cat_id'];
  $cat_title_name = $row['cat_title'];

 ?>

    <tr>
        <td>
            <?=$cat_id_num?>
        </td>
        <td>
            <?=$cat_title_name?>
        </td>

        <td><a href='catogories.php?delete=<?=$cat_id_num?>'><i class="fa fa-fw fa-trash-o"></i></a></td>
        <td><a href='catogories.php?edit=<?=$cat_id_num?>'><i class="fa fa-fw fa-edit"></i></a></td>
    </tr>

    <?php } //while
}//showCatogry()


function addCatogry() {

global $connection;
if (isset($_POST['submit'])) {

  $new_intered_value = $_POST['intered_value'];

  if ($new_intered_value == "" || empty($new_intered_value)) {
    echo "<h3>Invalid Value</h3>";
  }

  else {
      $sql = "INSERT INTO `categories`(`cat_title`) VALUES ('$new_intered_value')";
      $create_cat = mysqli_query($connection, $sql);


  if (!$create_cat) {
    die('Query Faild'.mysqli_error($connection));
  } //conn die

  }//else

}//isset[submit]

}//addCatogry()


function deleteCatogry() {

global $connection;

if (isset($_GET['delete'])) {
  $the_cat_id = $_GET['delete'];

  $sql = "DELETE FROM `categories` WHERE cat_id = {$the_cat_id}";
  $delete_cat = mysqli_query($connection, $sql);
  header('location:catogories.php');
}


}//deleteCatogry()



function passCatogryToEdit() {

global $connection;

global $edit_cat_id;
     $edit_cat_id = $_GET['edit'];

    if (isset($edit_cat_id)) {

      $sql = "SELECT * FROM `categories` WHERE cat_id = {$edit_cat_id}";
      $update_query = mysqli_query($connection, $sql);

      while ($row = mysqli_fetch_assoc($update_query)) {
        # code...
        $cat_id_num = $row['cat_id'];
        $cat_title_name = $row['cat_title'];
     ?>


    <input type="text" name="name_update_value" class="form-control" value="<?php if(isset($cat_title_name)){echo $cat_title_name;}?>">

    <?php
      }//while
    }//if (isset)

}//passEditValue()



function editCatogry() {

global $connection;
global $edit_cat_id;

    if (isset($_POST['submit_update_catogry'])) {
  $updated_cat_title = $_POST['name_update_value'];

  $sql = "UPDATE `categories` SET cat_title = '$updated_cat_title' WHERE cat_id = {$edit_cat_id}";
  $update_cat = mysqli_query($connection, $sql);
  header('location:catogories.php');



 if (!$update_cat) {
    die('Query Faild'.mysqli_error($connection));
  } //conn die

}

}//editCatogry()
?>

<!---------------------** catogeries **--------------------->





<!---------------------** Posts **--------------------->
<?php
function showAllPosts() {

global $connection;

    $sql = "SELECT * FROM `posts`";
$select_posts = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_assoc($select_posts)) //all things from table 'posts'
{
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_img = $row['post_img'];
    $post_tags = $row['post_tags'];
    $post_date = $row['post_date'];
    $post_comments_count = $row['post_comments_count'];
    $post_content = $row['post_content'];
?>
            <tr>
                <td>
                    <?=$post_id?>
                </td>
                <td>
                    <?=$post_author?>
                </td>
                <td>
                    <?=$post_title?>
                </td>

                <!-- ------------------------ -->
                <?php
      $sql = "SELECT * FROM `categories` WHERE cat_id = {$post_category_id}";
      $catogry_query = mysqli_query($connection, $sql);
      while ($row = mysqli_fetch_assoc($catogry_query)) {

          $cat_id= $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<td>{$cat_title}</td>";

     }//end while
      ?>
                    <!-- ------------------------ -->

                    <td>
                        <?=$post_status?>
                    </td>
                    <td><img src="../images/imgsPosts/<?=$post_img?>" width="100" alt=""></td>
                    <td>
                        <?=$post_content?>
                    </td>
                    <td>
                        <?=$post_tags?>
                    </td>
                    <td>
                        <?=$post_date?>
                    </td>
                    <td>
                        <?=$post_comments_count?>
                    </td>
                    <td><a href='posts.php?source=edit_post&post_id=<?=$post_id?>'><i class="fa fa-fw fa-edit"></i></a></td>
                    <td><a href='posts.php?delete_post=<?=$post_id?>'><i class="fa fa-fw fa-trash-o"></i></a></td>

            </tr>
            <?php
  }//end while 'posts'

}//showAllPosts()


function deletePost() {
    global $connection;

    if (isset($_GET['delete_post'])) {
  $the_post_id = $_GET['delete_post'];

  $sql = "DELETE FROM `posts` WHERE post_id = {$the_post_id}";
  $delete_post = mysqli_query($connection, $sql);
  header('location:posts.php');
}
}//deletePost()


function addPost () {
    global $connection;

    if (isset($_POST['create_post'])) {
  //echo $_POST['title'];
  $newPostTitle = $_POST['title'];
  $newPostAuthor = $_POST['author'];
  $newPostCategoryID = $_POST['post_category'];

  $newPostImageName = $_FILES['img']['name'];
  $newPostImageTempLocat = $_FILES['img']['tmp_name'];
  move_uploaded_file($newPostImageTempLocat, "../images/imgsPosts/$newPostImageName");

  $newPostContent = $_POST['content'];
  $newPostStatus = $_POST['status'];
  $newPostTags = $_POST['tags'];
  $newPostDate = date('d-m-y');


    $sql = "INSERT INTO `posts`
    (`post_title`, `post_author`, `post_category_id`, `post_img`, `post_content`, `post_status`, `post_tags`, `post_date`)

    VALUES

    ('{$newPostTitle}', '{$newPostAuthor}', '{$newPostCategoryID}', '{$newPostImageName}', '{$newPostContent}', '{$newPostStatus}', '{$newPostTags}', now())";

    $catogry_query = mysqli_query($connection, $sql);

    //echo "<script>alert('all Correct')</script>";

    header('location:posts.php');

}// if(isset(create_post))


}//addPost()


function retrevePostToEdit () {
    global $connection;
    //$_GET['post_id'] from defined var in Edit link
    if (isset($_GET['post_id'])) {
        global $edit_post_id;
        $edit_post_id = $_GET['post_id'];

        $sql = "SELECT * FROM `posts` WHERE post_id = $edit_post_id";
        $select_posts_byID = mysqli_query($connection, $sql);

        while ($row = mysqli_fetch_assoc($select_posts_byID)) //all things from table 'posts'
        {
            $post_id = $row['post_id'];
            $post_author = $row['post_author'];
            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            $post_status = $row['post_status'];
            $post_img = $row['post_img'];
            $post_tags = $row['post_tags'];
            $post_date = $row['post_date'];
            $post_content = $row['post_content'];

           ?>
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label style="color: #843534"><h2>Edit Post</h2></label>
                    </div>

                    <div class="form-group">
                        <label for="titleID">Post Title</label>
                        <input type="text" name="title" id="titleID" class="form-control" value="<?=$post_title?>">
                    </div>



                    <div class="form-group">
                        <label for="categoriesID">Categories</label>
                        <select class="" name="post_category" id="categoriesID">
                        <?php
                            $sql = "SELECT * FROM `categories`";
                            $catogry_query = mysqli_query($connection, $sql);

                            while ($row = mysqli_fetch_assoc($catogry_query)) {
                              $cat_id_num = $row['cat_id'];
                              $cat_title_name = $row['cat_title'];

                                if($cat_id_num == $post_category_id){
                                    echo "<option selected value={$cat_id_num}>$cat_title_name</option>";
                                } else {
                                    echo "<option value={$cat_id_num}>$cat_title_name</option>";
                                }//else

                            }//end while categories
                        ?>
                    </select>
                    </div>


                    <div class="form-group">
                        <label for="authorID">Post Author</label>
                        <input type="text" name="author" id="authorID" class="form-control" value="<?=$post_author?>">
                    </div>


                    <div class="form-group">
                        <label for="statusID">Post Status</label>
                        <input type="text" name="status" id="statusID" class="form-control" value="<?=$post_status?>">
                    </div>


                    <div class="form-group">
                        <label for="imgID">Post Image</label>
                        <img width="100" src="../images/imgsPosts/<?=$post_img?>" alt="">
                        <input type="file" name="img" id="imgID" class="form-control">
                    </div>


                    <div class="form-group">
                        <label for="tagsID">Post Tags</label>
                        <input type="text" name="tags" id="tagsID" class="form-control" value="<?=$post_tags?>">
                    </div>


                    <div class="form-group">
                        <label for="contentID">Post Content</label>
                        <textarea type="text" name="content" id="contentID" class="form-control" cols="30" rows="10">
                        <?=$post_content?>
                    </textarea>
                    </div>


                    <div class="form-group">
                        <input type="submit" value="Update Post" name="update_post" class="btn btn-danger">
                    </div>

                </form>
                <?php

            }//while posts

    }//isset(post_id)
}//retrevePostToEdit()


function saveUpdatedPost () {

    global $connection;
    global $edit_post_id;

    if (isset($_POST['update_post'])) {

  $new2PostTitle = $_POST['title'];
  $new2PostAuthor = $_POST['author'];
  $new2PostCategoryID = $_POST['post_category'];

          /*-- ------------------------ --*/

  $new2PostImageName = $_FILES['img']['name'];
  $new2PostImageTempLocat = $_FILES['img']['tmp_name'];
  move_uploaded_file($new2PostImageTempLocat, "../images/imgsPosts/$new2PostImageName");

    if(empty($new2PostImageName)) {

        $sql = "SELECT * FROM `posts` WHERE post_id = $edit_post_id";
        $select_img = mysqli_query($connection, $sql);

        while ($row = mysqli_fetch_assoc($select_img)) {
          $new2PostImageName = $row['post_img'];
        }

    }//if(empty(img))
          /*-- ------------------------ --*/

  $new2PostContent = $_POST['content'];
  $new2PostStatus = $_POST['status'];
  $new2PostTags = $_POST['tags'];
//  $new2PostDate = date('d-m-y');


    $sql = "UPDATE `posts` SET
    `post_title`= '$new2PostTitle',
    `post_author`= '$new2PostAuthor',
    `post_category_id`= '$new2PostCategoryID',
    `post_img`= '$new2PostImageName',
    `post_content`= '$new2PostContent',
    `post_status`= '$new2PostStatus',
    `post_tags`= '$new2PostTags',
    `post_date`= now()

    WHERE post_id = '{$edit_post_id}'";

    $post_query = mysqli_query($connection, $sql);

    //echo "<script>alert('all Correct')</script>";

    header('location:posts.php');
}// if(isset)


}//saveUpdatedPost()


/*function showSinglePost () {
    global $connection;
    global $the_post_id;
   $the_post_id = $_GET['p_id'];//for show in URL

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
                        <img class="img-responsive" src="images/<?=$post_img?>" alt="">

                        <hr>

                        <!-- Post Content -->

                        <p class="lead">
                            <?=$post_content?>
                        </p>


                        <hr>

                        <?php

                        }//while

                    }//if(isset(p_id))

}//showSinglePost()*/
?>
<!---------------------** Posts **--------------------->





<!---------------------** Comments **--------------------->
<?php
function viewAllCommentsInAdmin () {
    global $connection;

$sql = "SELECT * FROM `comments`";
$select_comments = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_assoc($select_comments)) //all things from table 'posts'
{
    $comment_id = $row['comment_id'];
    $comment_post_id = $row['comment_post_id'];
    $comment_author = $row['comment_author'];
    $comment_email = $row['comment_email'];
    $comment_content = $row['comment_content'];
    $comment_date = $row['comment_date'];
    $comment_status = $row['comment_status'];
?>
        <tr>
            <td>
                <?=$comment_id?>
            </td>
            <td>
                <?=$comment_author?>
            </td>
            <td>
                <?=$comment_email?>
            </td>
            <td>
                <?=$comment_status?>
            </td>

            <!-- ------------------------ -->
            <?php
      $sql = "SELECT * FROM `posts` WHERE post_id = {$comment_post_id}";
      $post_query = mysqli_query($connection, $sql);
      while ($row = mysqli_fetch_assoc($post_query)) {

          $post_id= $row['post_id'];
        $post_title = $row['post_title'];

        echo "<td><a href='posts.php?p_id=$post_id'>{$post_title}</a></td>";

     }//end while
      ?>
            <!-- ------------------------ -->

                <td>
                    <?=$comment_date?>
                </td>
                <td><a href='comments.php?approve=<?=$comment_id?>'><i class="fa fa-fw fa-eye"></i></a></td>
                <td><a href='comments.php?unapprove=<?=$comment_id?>'><i class="fa fa-fw fa-eye-slash"></i></a></td>
                <td><a href='comments.php?delete_comment=<?=$comment_id?>'><i class="fa fa-fw fa-trash-o"></i></a></td>

        </tr>
        <?php
  }//end while 'comments'


}//viewAllComments()


function deletComment () {
    global $connection;

    if (isset($_GET['delete_comment'])) {
  $the_comment_id = $_GET['delete_comment'];

  $sql = "DELETE FROM `comments` WHERE comment_id = {$the_comment_id}";
  $delete_comment = mysqli_query($connection, $sql);


  header('location:comments.php');
}
}//deletComment()


function approveComment () {
    global $connection;

    if (isset($_GET['approve'])) {
  $the_comment_status = $_GET['approve'];

  $sql = "UPDATE `comments`
  SET comment_status = 'approved'
  WHERE comment_id = {$the_comment_status}";
  $approve_comment = mysqli_query($connection, $sql);
      header('location:comments.php');
}
}//approveComment()


function unapproveComment () {
    global $connection;

    if (isset($_GET['unapprove'])) {
  $the_comment_status = $_GET['unapprove'];

  $sql = "UPDATE `comments` SET comment_status = 'unapproved' WHERE comment_id = {$the_comment_status}";
  $unapprove_comment = mysqli_query($connection, $sql);
      header('location:comments.php');
}
}//unapproveComment()


/*function createComment () {
    global $connection;

        global $the_post_id;
        global $comment_author;
        global $comment_email;
        global $comment_content;

     if (isset($_POST['create_comment'])) {

            $the_post_id = $_GET['p_id'];
            $comment_author = $_POST['commentAuthor'];
          $comment_email = $_POST['commentEmail'];
          $comment_content = $_POST['commentContent'];

            if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {

               $sql = "INSERT INTO `comments`
               (`comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_date`, `comment_status`)

               VALUES

               ('{$the_post_id}', '$comment_author', '$comment_email', '$comment_content', now(), 'unapproved')";

                $comment_query = mysqli_query($connection, $sql);

                -- ---------------------------------------- --

                $query = "UPDATE `posts`
                SET `post_comments_count` = post_comments_count + 1
                WHERE post_id = {$the_post_id}";

                $Update_comment_count = mysqli_query($connection, $query);


            }//if(!empt())

            else {
                        echo "<script>alert('field not found')</script>";
                    }

        }//if isset(create_comment)



}//createComment()*/


/*function viewApprovedComments () {
    global $connection;
        global $the_post_id;
        global $comment_author;
        global $comment_content;

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
                <img class="media-object" src="images/1.jpg" width="100" height="100" alt="">
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

}//viewApprovedComments()*/
?>
<!---------------------** Comments **--------------------->





<!---------------------** USERS **--------------------->
<?php
function showAllUsers() {

global $connection;

    $sql = "SELECT * FROM `users`";
$select_posts = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_assoc($select_posts)) //all attrs from DB -> table 'users'
{
    $user_id = $row['user_id'];
    $user_name = $row['user_name'];
    $user_password = $row['user_password'];
    $user_FName = $row['user_FName'];
    $user_LName = $row['user_LName'];
    $user_email = $row['user_email'];
    $user_img = $row['user_img'];
    $user_role = $row['user_role'];
?>
            <tr>
                <td><?=$user_id?></td>
                <td><?=$user_name?></td>
                <td><?=$user_FName?></td>
                <td><?=$user_LName?></td>
                <td><?=$user_email?></td>
                <td><?=$user_password?></td>
                <td><img src="../images/imgsUsers/<?=$user_img?>" width="100" alt=""></td>
                <td><?=$user_role?></td>

                <td><a href='users.php?changeToAdmin=<?=$user_id?>' class="btn bg-danger">Admin</a></td>
                <td><a href='users.php?changeToSubscriper=<?=$user_id?>' class="btn btn-warning">Subscriber</a></td>
                <td><a href='users.php?source=edit_user&userID=<?=$user_id?>'><i class="fa fa-fw fa-edit"></i></a></td>
                <td><a href='users.php?deleteUser=<?=$user_id?>'><i class="fa fa-fw fa-trash-o"></i></a></td>

            </tr>
            <?php
  }//end while 'posts'

}//showAllUsers()


function addUser () {
    global $connection;

    if (isset($_POST['create_user'])) {
        //name of the Form
  $username = $_POST['username'];
  $userFirstName = $_POST['userFName'];
  $userLastName = $_POST['userLName'];

  $userRole = $_POST['userRole'];
  $userEmail = $_POST['userEmail'];
  $userPass = $_POST['userPass'];

  $userImageName = $_FILES['img']['name'];
  $userImageTempLocat = $_FILES['img']['tmp_name'];
  move_uploaded_file($userImageTempLocat, "../images/imgsUsers/$userImageName");

    $sql = "INSERT INTO `users`
    (`user_name`, `user_password`, `user_FName`, `user_LName`, `user_email`, `user_img`, `user_role`)

    VALUES

    ('$username', '$userPass', '$userFirstName', '$userLastName', '$userEmail', '$userImageName', '$userRole')";

    $createUser = mysqli_query($connection, $sql);


    header('location:users.php');

}// if(isset(create_user))


}//addUser()


function deleteUser () {
    global $connection;

    if (isset($_GET['deleteUser'])) {
  $the_user_id = $_GET['deleteUser'];

  $sql = "DELETE FROM `users` WHERE user_id = {$the_user_id}";
  $delete_user = mysqli_query($connection, $sql);

  header('location:users.php');
}
}//deleteUser()


function changeToAdmin () {
    global $connection;

    if (isset($_GET['changeToAdmin'])) {
  $changeToAdmin = $_GET['changeToAdmin'];

  $sql = "UPDATE `users`
  SET user_role = 'Admin'
  WHERE user_id = '$changeToAdmin'";
  $changeToAdmin = mysqli_query($connection, $sql);
      header('location:users.php');
}
}//changeToAdmin()


function changeToSubscriper () {
    global $connection;

    if (isset($_GET['changeToSubscriper'])) {
  $changeToSubscriper = $_GET['changeToSubscriper'];

  $sql = "UPDATE `users`
  SET user_role = 'Subscriber'
  WHERE user_id = '$changeToSubscriper'";
  $changeToSubscriper = mysqli_query($connection, $sql);
      header('location:users.php');
}
}//changeToAdmin()


function retreveUserToEdit () {
    global $connection;

    if (isset($_GET['userID'])) {
        global $edit_user_id;
        $edit_user_id = $_GET['userID'];

        $sql = "SELECT * FROM `users` WHERE user_id = '{$edit_user_id}'";
        $select_users_byID = mysqli_query($connection, $sql);

        while ($row = mysqli_fetch_assoc($select_users_byID)) //all attrs from table 'users'
        {
            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $user_password = $row['user_password'];
            $user_FName = $row['user_FName'];
            $user_LName = $row['user_LName'];
            $user_email = $row['user_email'];
            $user_img = $row['user_img'];
            $user_role = $row['user_role'];

           ?>


<form action="" method="post" enctype="multipart/form-data" class="col-md-8 col-md-offset-2">

    <div class="form-group">
        <label style="color: #843534"><h2>Edit User</h2></label>
    </div>

    <div class="form-group">
        <label for="usernameID">Username</label>
        <input type="text" name="username" id="usernameID" class="form-control" value="<?=$user_name?>">
    </div>


    <div class="form-group">
        <label for="FNameID">Frist Name</label>
        <input type="text" name="userFName" id="FNameID" class="form-control" value="<?=$user_FName?>">
    </div>


    <div class="form-group">
        <label for="LNameID">Last Name</label>
        <input type="text" name="userLName" id="LNameID" class="form-control" value="<?=$user_LName?>">
    </div>


    <div class="form-group">
        <label for="roleID">User Role</label>

       <select name="userRole" id="roleID">
          <option selected value="<?=$user_role?>"><?=$user_role?></option>
           <?php
        if($user_role == 'Admin'){
            echo "<option value='Subscriber'>Subscriber</option>";
        } else {
            echo "<option value='Admin'>Admin</option>";

        }//else
        ?>
       </select>



    </div>


    <div class="form-group">
        <label for="emailID">Email</label>
        <input type="email" name="userEmail" id="emailID" placeholder="example@example.com" class="form-control" value="<?=$user_email?>">
    </div>


    <div class="form-group">
        <label for="passID">Password</label>
        <input type="password" name="userPass" id="passID" class="form-control" value="<?=$user_password?>">
    </div>



    <div class="form-group">
        <label for="imgID">User Image</label>
        <img width="100" src="../images/imgsUsers/<?=$user_img?>" alt="">
        <input type="file" name="img" id="imgID" class="form-control">
    </div>


    <div class="form-group">
        <input type="submit" value="Update User" name="update_user" class="btn btn-danger">
    </div>

</form>

                <?php
}//while users

        }//isset($_GET['edit_user']))
}//retreveUserToEdit()


function saveUpdatedUser () {

    global $connection;
    global $edit_user_id;

    if (isset($_POST['update_user'])) {

  //name of the Form
  $newUsername = $_POST['username'];
  $newUserFirstName = $_POST['userFName'];
  $newUserLastName = $_POST['userLName'];

  $newUserRole = $_POST['userRole'];
  $newUserEmail = $_POST['userEmail'];
  $newUserPass = $_POST['userPass'];



  $newUserImageName = $_FILES['img']['name'];
  $newUserImageTempLocat = $_FILES['img']['tmp_name'];
  move_uploaded_file($newUserImageTempLocat, "../images/imgsUsers/$newUserImageName");

    if(empty($newUserImageName)) {

        $sql = "SELECT * FROM `users` WHERE user_id = '{$edit_user_id}'";
        $select_img = mysqli_query($connection, $sql);

        while ($row = mysqli_fetch_assoc($select_img)) {
          $newUserImageName = $row['user_img'];
        }

    }//if(empty(img))


    $sql = "UPDATE `users` SET
    `user_name`= '$newUsername',
    `user_password`= '$newUserPass',
    `user_FName`= '$newUserFirstName',
    `user_LName`= '$newUserLastName',
    `user_email`= '$newUserEmail',
    `user_img`= '$newUserImageName',
    `user_role`= '$newUserRole'

    WHERE user_id = '{$edit_user_id}'";

    $post_query = mysqli_query($connection, $sql);


    header('location:users.php');
}// if(isset)


}//saveUpdatedPost()
?>
<!---------------------** USERS **--------------------->

<?php
function addRegisteredUser () {
    global $connection;

    if (isset($_POST['create_user'])) {
        //name of the Form
  $username = $_POST['username'];
  $userFirstName = $_POST['userFName'];
  $userLastName = $_POST['userLName'];

  $userRole = $_POST['userRole'];
  $userEmail = $_POST['userEmail'];
  $userPass = $_POST['userPass'];

  $userImageName = $_FILES['img']['name'];
  $userImageTempLocat = $_FILES['img']['tmp_name'];
  move_uploaded_file($userImageTempLocat, "../images/imgsUsers/$userImageName");

    $sql = "INSERT INTO `users`
    (`user_name`, `user_password`, `user_FName`, `user_LName`, `user_email`, `user_img`, `user_role`)

    VALUES

    ('$username', '$userPass', '$userFirstName', '$userLastName', '$userEmail', '$userImageName', 'Subscriber')";

    $createUser = mysqli_query($connection, $sql);

            header('location:index.php');

}//if (isset(role))

}//addRegisteredUser()
?>
