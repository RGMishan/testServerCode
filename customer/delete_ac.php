<div class="box">
	<center>
		<h1>Do You Really Want To Delete Your Account?</h1>
		<br>
		<br>
		<form action="" method="post">
			<input type="submit" name="yes" value="Yes, I Want To Delete." class="btn btn-danger">
			<input type="submit" name="no" value="No, I Changed My Mind." class="btn btn-primary">
		</form>
	</center>
</div>

<?php
$c_email = $_SESSION['customer_email'];

if (isset($_POST['yes'])) {
	$delete_q = "DELETE FROM customers WHERE customer_email = '$c_email'";
	$run_q = mysqli_query($$con, $delete_q);

	if ($run_q) {
		session_destroy();
		echo "<script>alert('Your Account has been Deleted!')</script>";
		echo "<script>window.open('../index.php','_self')</script>";
	}
}
?>