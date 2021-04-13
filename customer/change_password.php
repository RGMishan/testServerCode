<div class="box">
	<center>
		<h3>Change Your Password</h3>
	</center>

	<form action="" method="POST">
		<div class="form-group">
			<!--  //boostarp div to ake form responsive -->
			<label>Enter Your Current Password</label>
			<input type="password" name="old_password" class="form-control">
		</div>

		<div class="form-group">
			<label>Enter New Password</label>
			<input type="password" name="new_password" class="form-control">
		</div>

		<div class="form-group">
			<label>Confirm New Password</label>
			<input type="password" name="c_n_password" class="form-control">
		</div>

		<div class="text-center">
			<button class="btn btn-primary btn-lg" name="update" type="submit">Update Now</button>
		</div>
	</form>
</div>

<?php
if (isset($_POST['update'])) {
	$c_email = $_SESSION['customer_email'];

	$old_password = $_POST['old_password'];
	$new_password = $_POST['new_password'];
	$c_n_password = $_POST['c_n_password'];

	$select_cust = "SELECT * FROM customers WHERE customer_email = '$c_email' AND customer_pass = '$old_password'";

	$run_q = mysqli_query($con, $select_cust);
	$check_old_pass = mysqli_num_rows($run_q);

	if ($check_old_pass = 0) {
		echo "<script>alert('Your current Password is not Valid!...Try Again!')</script>";
		exit();
	}

	if ($new_password != $c_n_password) {
		echo "<script>alert('Your New Password does not Match with Confirm Password!...Try Again!')</script>";
		exit();
	}

	$update_q = "UPDATE customers SET customer_pass = '$new_password' WHERE customer_email = '$c_email'";
	$run_q = mysqli_query($con, $update_q);
	echo "<script>alert('Your Password has been Changed!')</script>";
	echo "<script>windows.open('my_account.php?my_order', '_self')</script>";
}
?>