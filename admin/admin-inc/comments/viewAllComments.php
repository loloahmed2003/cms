<table class="table table-bordered table-hover">
    <thead>
        <th>ID</th>
        <th>Author</th>
        <th>Email</th>
        <th>Status</th>
        <th>In Responed To</th>
        <th>Date</th>
        <th>Approve</th>
        <th>UnApprove</th>
        <th>Delete</th>
    </thead>

    <tbody>
       
        <!-------------- show comments in admin pannal -------------->
        <?php viewAllCommentsInAdmin(); ?>
        <!-------------- show ccomments in admin pannal -------------->

    </tbody>
</table>


<!-------------- delete comment -------------->
<?php deletComment()?>
    <!-------------- delete comment -------------->


    <!-------------- approve comment -------------->
    <?php approveComment()?>
        <!-------------- approve comment -------------->
        

        <!-------------- UNapprove comment -------------->
        <?php unapproveComment()?>
            <!-------------- UNapprove comment -------------->
