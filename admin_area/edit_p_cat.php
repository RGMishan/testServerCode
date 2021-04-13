<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php', '_self')</script>";
} else {
?>

    <?php
    if (isset($_GET['edit_p_cat'])) {
        $edit_p_cat_id = $_GET['edit_p_cat'];
        $edit_p_cat_query = "SELECT * FROM product_category WHERE p_cat_id = '$edit_p_cat_id'";
        $run_edit = mysqli_query($con, $edit_p_cat_query);
        $row_edit = mysqli_fetch_array($run_edit);

        $p_cat_id = $row_edit['p_cat_id'];
        $p_cat_title = $row_edit['p_cat_title'];
        $p_cat_desc = $row_edit['p_cat_desc'];
    }
    ?>
    <!-- Row 1 Start -->
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> Dashboard / Edit Product Category
                </li>
            </ol>
        </div>
    </div>
    <!-- Row 1 End -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> Edit Product Category
                    </h3>
                </div>

                <div class="panel-body">
                    <form action="" method="post" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Category Title</label>
                            <div class="col-md-6">
                                <input type="text" name="p_cat_title" class="form-control" value="<?php echo $p_cat_title; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Category Description</label>
                            <div class="col-md-6">
                                <textarea type="text" class="form-control" name="p_cat_desc"><?php echo $p_cat_desc; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" name="update" class="btn btn-primary form-control" value="Update Now">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['update'])) {
        $p_cat_title = $_POST['p_cat_title'];
        $p_cat_desc = $_POST['p_cat_desc'];

        $update_p_cat = "UPDATE product_category SET p_cat_title = '$p_cat_title', 
        p_cat_desc = '$p_cat_desc' WHERE p_cat_id = '$p_cat_id'";
        $run_p_cat = mysqli_query($con, $update_p_cat);

        if ($run_p_cat) {
            echo "<script>alert('Product Category has been Updated!')</script>";
            echo "<script>window.open('index.php?view_product_cat','_self')</script>";
        }
    }
    ?>

<?php } ?>