<div class="breadcrumb">
    <form action="" method="post">

        <div class="form-group">
            <label for="name_update_value">Edit catogery</label>

            <!-------------- .add catogry -------------->
            <?php passCatogryToEdit(); ?>
            <!-------------- /.add catogry -------------->

        </div>

        <div class="form-group">
            <input type="submit" name="submit_update_catogry" value="Edit catogry" class="btn btn-primary">
        </div>

    </form>
</div>



<!-------------- .add catogry -------------->
<?php editCatogry(); ?>
<!-------------- /.add catogry -------------->
