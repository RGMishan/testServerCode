<?php
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php', '_self')</script>";
} else {
?>
<div class="row"><!-- row Starts -->
    <div class="col-lg-12"><!-- col-lg-12 starts -->
      <ol class="breadcrumb"><!-- breadcrump starts -->
        <li class="active">
        <i class="fa fa-dashboard"></i> Dashboard / View Users
        </li>
      </ol> <!-- breadcrump ends -->
    </div><!-- col-lg-12 ends -->
</div><!-- row ends -->

<div class="row"><!-- row 2 Star ts -->
    <div class="col-lg-12"><!-- col-lg-12 starts -->
      <div class="panel panel-default"><!-- panel panel-default Starts -->

        <div class="panel-heading"><!-- panel heading starts -->
          <h3 class="panel-title">
            <i class="fa fa-money fa-fw"></i> View Users
          </h3>
        </div> <!-- panel heading ends -->

        <div class="panel-body"><!-- panel body starts -->
          <div class="table-responsive"><!-- tabel-responsive Starts -->
            <table class="table table-bordered table-hover table-striped"><!-- table script starts -->
              <thead><!-- thead starts -->
                <tr>
                  <th>User Name:</th>
                  <th>User Email:</th>
                  <th>User Image:</th>
                  <th>User Country:</th>
                  <th>User Job:</th>
                  <th>Delete User:</th>
                </tr>
              </thead>

              <tbody>

<?php

$get_admin = "SELECT * from admins";
$run_admin = mysqli_query($con, $get_admin);
while ($row_admin = mysqli_fetch_array($run_admin)) {
  $admin_id = $row_admin['admin_id'];
  $admin_name = $row_admin['admin_name'];
  $admin_email = $row_admin['admin_email'];
  $admin_image = $row_admin['admin_image'];
  $admin_country = $row_admin['admin_country'];
  $admin_job = $row_admin['admin_job'];  
?>

<tr>
    <td><?php echo $admin_name; ?></td>
    <td><?php echo $admin_email; ?></td>
    <td><img src="admin_images/<?php echo $admin_image; ?>"
     width="60" height="60"></td>
    <td><?php echo $admin_country; ?></td>
    <td><?php echo $admin_job; ?></td>
    <td>
      <a href="index.php?user_delete=<?php echo $admin_id; ?>">
        <i class="fa fa-trash-o"></i> Delete
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
