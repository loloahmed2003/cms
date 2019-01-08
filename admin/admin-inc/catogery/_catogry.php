<div class="col-xs-6">

    <div class="breadcrumb">

        <!-------------- .add catogry -------------->
        <?php addCatogry()?>
        <!-------------- /.add catogry -------------->

        <form action="" method="post">

            <div class="form-group">
                <label for="intered_value">Add catogery</label>
                <input type="text" name="intered_value" placeholder="your txt here" class="form-control">
            </div>

            <div class="form-group">
                <input type="submit" name="submit" value="Add catogry" class="btn btn-primary">
            </div>

        </form>

    </div>
    <!-- /.breadcrumb -->

    <?php
    if(isset($_GET['edit'])){
    include 'admin-inc/catogery/update-catogry.php';
    }?>



</div>
<!-- /right col 6 -->



<div class="col-xs-6">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Catogry</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>

        <tbody>

            <!-------------- show categories from database -------------->
            <?php showCatogry()?>
            <!-------------- /show categories from database -------------->

        </tbody>

    </table>



    <!-------------- Delete categories from database -------------->
    <?php deleteCatogry()?>
    <!-------------- /Delete categories from database -------------->



</div>
<!-- /left col 6 -->
