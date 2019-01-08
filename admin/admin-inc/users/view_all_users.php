<table class="table table-bordered table-hover">
    <thead>
        <th>ID</th>
        <th>username</th>
        <th>Frist Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Image</th>
        <th>Role</th>
        <th>Administrator</th>
        <th>Subscriber</th>
        <th>Edit</th>
        <th>Delete</th>
    </thead>

    <tbody>

        <!-------------- showAllUsers -------------->
        <?php showAllUsers(); ?>
        <!-------------- showAllUsers -------------->

    </tbody>
</table>


<!---------------------------- .delete user ---------------------------->
<?php deleteUser(); ?>
<!---------------------------- /.delete user ---------------------------->


<!---------------------------- .changeToAdmin ---------------------------->
<?php changeToAdmin(); ?>
<!---------------------------- /.changeToAdmin ---------------------------->


<!---------------------------- .changeToSubscriper ---------------------------->
<?php changeToSubscriper(); ?>
<!---------------------------- /.changeToSubscriper ---------------------------->


