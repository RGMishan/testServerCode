<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php', '_self')</script>";
} else {
?>
    <?php

    if (isset($_GET['edit_box'])) {
        $edit_box = $_GET['edit_box'];
        $get_box = "SELECT * FROM boxes_section WHERE box_id = '$edit_box'";
        $run_box = mysqli_query($con, $get_box);
        $row_box = mysqli_fetch_array($run_box);

        $box_id = $row_box['box_id'];
        $box_title = $row_box['box_title'];
        $box_desc = $row_box['box_desc'];
    }
    ?>

    <hr>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> Dashboard / Edit Boxes
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <!--row 2 starts -->
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> Edit Box
                    </h3>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" action="" method="post">
                        <!--form-horizontol Starts -->

                        <div class="form-group">
                            <label class="col-md-3 control-label">Box Title</label>

                            <div class="col-md-6">
                                <input type="text" name="box_title" class="form-control" value="<?php echo $box_title; ?>">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Box Description</label>

                            <div class="col-md-6">
                                <textarea type="text" name="box_desc" class="form-control"><?php echo $box_desc; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <!--form-group Starts -->
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" name="update" value="Update Box" class="btn btn-primary form-control">
                            </div>
                        </div>
                        <!--form-group Ends -->
                    </form>
                    <!--form-horizontol Ends -->
                </div>
                <!--panel-body Ends -->
            </div>
            <!--panel panel-default Ends -->
        </div>
        <!--col-lg-12 Ends -->
    </div>
    <!--row-2 Ends -->

    <?php

    if (isset($_POST['update'])) {
        $b_title = $_POST['box_title'];
        $b_desc = $_POST['box_desc'];
        $update_box = "UPDATE boxes_section SET box_title='$b_title', box_desc='$b_desc' WHERE box_id='$box_id'";

        $run = mysqli_query($con, $update_box);

        if ($run) {
            echo "<script> alert('One Box has Been Updated') </script>";
            echo "<script>window.open('index.php?view_box', '_self')</script>";
        }
    }
    ?>
<?php } ?>