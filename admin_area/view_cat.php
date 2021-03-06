<?php
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php', '_self')</script>";
} else {
?>

  <div class="row">
    <!-- row Starts -->
    <div class="col-lg-12">
      <!-- col-lg-12 starts -->
      <ol class="breadcrumb">
        <!-- breadcrump starts -->
        <li class="active">
          <i class="fa fa-dashboard"></i> Dashboard / View Categories
        </li>
      </ol> <!-- breadcrump ends -->
    </div><!-- col-lg-12 ends -->
  </div><!-- row ends -->

  <div class="row">
    <!-- row 2 Starts -->
    <div class="col-lg-12">
      <!-- col-lg-12 starts -->
      <div class="panel panel-default">
        <!-- panel panel-default Starts -->

        <div class="panel-heading">
          <!-- panel heading starts -->
          <h3 class="panel-title">
            <i class="fa fa-money fa-fw"></i> View Categories
          </h3>
        </div> <!-- panel heading ends -->

        <div class="panel-body">
          <!-- panel body starts -->
          <div class="table-responsive">
            <!-- tabel-responsive Starts -->
            <table class="table table-bordered table-hover table-striped">
              <!-- table script starts -->
              <thead>
                <!-- thead starts -->

                <tr>
                  <th>Category ID:</th>
                  <th>Category Title:</th>
                  <th>Category Description:</th>
                  <th>Delete Category:</th>
                  <th>Edit Category:</th>
                </tr>
              </thead>

              <tbody>

                <?php

                $i = 0;
                $get_cats = "SELECT * from categories";
                $run_cats = mysqli_query($con, $get_cats);
                while ($row_cats = mysqli_fetch_array($run_cats)) {
                  $cat_id = $row_cats['cat_id'];
                  $cat_title = $row_cats['cat_title'];
                  $cat_desc = $row_cats['cat_desc'];
                  $i++;

                ?>

                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $cat_title; ?></td>
                    <td width="300"><?php echo $cat_desc; ?></td>
                    <td>
                      <a href="index.php?delete_cat=<?php echo $cat_id; ?>">
                        <i class="fa fa-trash-o"></i> Delete
                      </a>
                    </td>
                    <td>
                      <a href="index.php?edit_cat=<?php echo $cat_id; ?>">
                        <i class="fa fa-pencil"></i> Edit
                      </a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>

          </div> <!-- tabel-responsive ends -->
        </div> <!-- panel body ends -->

      </div> <!-- panel panel-default Ends-->
    </div> <!-- col-lg-12 ends -->
  </div> <!-- row 2 Ends-->

<?php } ?>