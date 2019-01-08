<!---------------------------- .add post ---------------------------->
<?php addPost(); ?>
<!---------------------------- /.add post ---------------------------->



<form action="" method="post" enctype="multipart/form-data" class="col-md-8 col-md-offset-2">

    <div class="form-group">
        <label for="titleID">Post Title</label>
        <input type="text" name="title" id="titleID" class="form-control">
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

echo "<option value={$cat_id_num}>$cat_title_name</option>";

}//end while
 ?>
      </select>
    </div>


    <div class="form-group">
        <label for="authorID">Post Author</label>
        <input type="text" name="author" id="authorID" class="form-control">
    </div>


    <div class="form-group">
        <label for="statusID">Post Status</label>
        <input type="text" name="status" id="statusID" class="form-control">
    </div>


    <div class="form-group">
        <label for="imgID">Post Image</label>
        <input type="file" name="img" id="imgID" class="form-control">
    </div>


    <div class="form-group">
        <label for="tagsID">Post Tags</label>
        <input type="text" name="tags" id="tagsID" class="form-control">
    </div>


    <div class="form-group">
        <label for="contentID">Post Content</label>
        <textarea type="text" name="content" id="contentID" class="form-control" cols="30" rows="10"></textarea>
    </div>


    <div class="form-group">
        <input type="submit" value="Puplish Post" name="create_post" class="btn btn-success">
    </div>

</form>
