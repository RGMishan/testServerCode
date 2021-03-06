<?php

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php', '_self')</script>";
} else {

?>

    <?php
    if (isset($_GET['edit_product'])) {
        $edit_id = $_GET['edit_product'];
        $get_p = "SELECT * FROM products WHERE product_id = '$edit_id'";

        $run_edit = mysqli_query($con, $get_p);
        $row_edit = mysqli_fetch_array($run_edit);

        $p_id = $row_edit['product_id'];
        $p_title = $row_edit['product_title'];
        $p_cat = $row_edit['p_cat_id'];
        $cat = $row_edit['cat_id'];
        $p_image1 = $row_edit['product_img1'];
        $p_image2 = $row_edit['product_img2'];
        $p_image3 = $row_edit['product_img3'];
        $p_price = $row_edit['product_price'];
        $p_desc = $row_edit['product_desc'];
        $p_keyword = $row_edit['product_keyword'];
    }

    $get_p_cat = "SELECT * FROM product_category WHERE p_cat_id = '$p_cat'";

    $run_p_cat = mysqli_query($con, $get_p_cat);
    $row_p_cat = mysqli_fetch_array($run_p_cat);

    $p_cat_title = $row_p_cat['p_cat_title'];

    $get_cat = "SELECT * FROM categories WHERE cat_id = '$cat'";

    $run_cat = mysqli_query($con, $get_cat);
    $row_cat = mysqli_fetch_array($run_cat);

    $cat_title = $row_cat['cat_title'];
    ?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Edit Product</title>
    </head>

    <body>
        <div class="row">
            <!--  //row starting -->
            <div class="col-lg-12">
                <div class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"> </i> DASHBOARD / Edit Product
                    </li>
                </div>
            </div>
        </div> <!-- //row closing -->

        <div class="row">
            <!--  //row starting -->
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <!-- //panel heading started -->
                        <h3 class="panel-title">
                            <i class="fa fa-money fa-w"></i> Edit Product
                        </h3>
                    </div><!--  ..panel bodyclosed -->

                    <div class="panel-body">
                        <!-- //panel heading started -->
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Game Name</label>
                                <div class="col-md-6">
                                    <input type="text" name="product_title" class="form-control" required value="<?php echo $p_title; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Product Category</label>
                                <div class="col-md-6">
                                    <select name="product_cat" class="form-control">
                                        <option value="<?php echo $p_cat; ?>"><?php echo $p_cat_title ?></option>

                                        <?php
                                        $get_p_cats = "SELECT * FROM product_category";
                                        $run_p_cats = mysqli_query($con, $get_p_cats);
                                        while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
                                            $p_cat_id = $row_p_cats['p_cat_id'];
                                            $p_cat_title = $row_p_cats['p_cat_title'];
                                            echo "<option value='$p_cat_id' > $p_cat_title </option>";
                                        }
                                        ?>

                                    </select>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Categories</label>
                                <div class="col-md-6">
                                    <select name="cat" class="form-control">
                                        <option value="<?php echo $cat ?>"><?php echo $cat_title ?></option>

                                        <?php
                                        $get_cat = "SELECT * FROM categories";
                                        $run_cat = mysqli_query($con, $get_cat);
                                        while ($row_cat = mysqli_fetch_array($run_cat)) {
                                            $cat_id = $row_cat['cat_id'];
                                            $cat_title = $row_cat['cat_title'];
                                            echo "<option value='$cat_id'> $cat_title </option>";
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Product Image 1</label>
                                <div class="col-md-6">
                                    <input type="file" name="product_img1" class="form-control" required>
                                    <br>
                                    <img src="product_images/<?php echo $p_image1; ?>" width="70" height="70" alt="Product Image 1">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Product Image 2</label>
                                <div class="col-md-6">
                                    <input type="file" name="product_img2" class="form-control" required>
                                    <br>
                                    <img src="product_images/<?php echo $p_image2; ?>" width="70" height="70" alt="Product Image 2">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Product Image 3</label>
                                <div class="col-md-6">
                                    <input type="file" name="product_img3" class="form-control" required>
                                    <br>
                                    <img src="product_images/<?php echo $p_image3; ?>" width="70" height="70" alt="Product Image 3">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Product Price</label>
                                <div class="col-md-6">
                                    <input type="text" name="product_price" class="form-control" value="<?php echo $p_price; ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Product Keywoard</label>
                                <div class="col-md-6">
                                    <input type="text" name="product_keyword" class="form-control" value="<?php echo $p_keyword; ?>" required>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product Description</label>
                                <div class="col-md-6">
                                    <textarea name="product_desc" class="form-control" rows="6" cols="9">
                                        <?php echo $p_desc; ?>
                                    </textarea>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-6">
                                    <input type="submit" name="update" value="Update Product" class="btn btn-primary form-control">
                                </div>

                            </div>
                        </form>
                    </div> <!--  ..panel body closed -->
                </div>
            </div>
        </div> <!-- //row closing -->

    </body>

    </html>

    <?php
    if (isset($_POST['update'])) {
        $product_title = $_POST['product_title'];
        $product_cat = $_POST['product_cat'];
        $cat = $_POST['cat'];
        $product_price = $_POST['product_price'];
        $product_desc = $_POST['product_desc'];
        $product_keywords = $_POST['product_keyword'];

        $product_img1 = $_FILES['product_img1']['name'];
        $product_img2 = $_FILES['product_img2']['name'];
        $product_img3 = $_FILES['product_img3']['name'];

        $temp_name1 = $_FILES['product_img1']['tmp_name'];
        $temp_name2 = $_FILES['product_img2']['tmp_name'];
        $temp_name3 = $_FILES['product_img3']['tmp_name'];

        move_uploaded_file($temp_name1, "product_images/$product_img1");
        move_uploaded_file($temp_name2, "product_images/$product_img2");
        move_uploaded_file($temp_name3, "product_images/$product_img3");

        $update_product = "UPDATE products SET p_cat_id = '$product_cat', cat_id = '$cat', date = NOW(), product_title = '$product_title',
        product_img1 = '$product_img1', product_img2 = '$product_img2', product_img3 = '$product_img3', product_price = '$product_price',
        product_desc = '$product_desc', product_keyword = '$product_keywords' WHERE product_id = '$p_id'";

        $run_product = mysqli_query($con, $update_product);

        if ($run_product) {
            echo "<script>alert('Product has been Successfuly Updated!')</script>";
            echo "<script>window.open('index.php?view_product','_self')</script>";
        }
    }
    ?>

<?php } ?>