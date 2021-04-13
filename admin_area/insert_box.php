<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php', '_self')</script>";
} else {
?>
    <hr>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> Dashboard / Insert Box
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> Insert Box
                    </h3>
                </div>

                <div class="panel-body">
                    <form action="" method="POST" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Box Title</label>
                            <div class="col-md-6">
                                <input type="text" name="box_title" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Box Description</label>
                            <div class="col-md-6">
                                <textarea type="text" name="box_desc" class="form-control" required></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" name="submit" value="Insert Box" class="btn btn-primary form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $box_title = $_POST['box_title'];
        $box_desc = $_POST['box_desc'];

        $insert = "INSERT INTO boxes_section (box_title, box_desc) VALUES ('$box_title','$box_desc');";

        $run_box = mysqli_query($con, $insert);

        if ($run_box) {
            echo "<script>alert('One Box has been Successfully Inserted!')</script>";
            echo "<script>window.open('index.php?view_box', '_self')</script>";
        }
    }
    ?>

<?php } ?>