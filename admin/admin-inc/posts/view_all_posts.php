<table class="table table-bordered table-hover">
    <thead>
        <th>ID</th>
        <th>Author</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Image</th>
        <th>Content</th>
        <th>Tags</th>
        <th>Date</th>
        <th>Comments</th>
        <th>Edit</th>
        <th>Delete</th>
    </thead>

    <tbody>

        <!-------------- showAllPosts -------------->
        <?php showAllPosts(); ?>
        <!-------------- showAllPosts -------------->

    </tbody>
</table>


<!---------------------------- .delete post ---------------------------->
<?php deletePost(); ?>
<!---------------------------- /.delete post ---------------------------->
