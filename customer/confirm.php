<?php
session_start();
if (!isset($_SESSION['customer_email'])) {
	echo "<script>window.open('../checkout.php','_self')</script>";
} else {
	include("includes/db.php");
	include("functions/functions.php");
	if (isset($_GET['order_id'])) {
		$order_id = $_GET['order_id'];
	}
?>


	<!DOCTYPE html>
	<html>

	<head>
		<title>WASD STORE</title>
		<meta charset="utf-8">
		<meta name="viewpoint" content="width=device-width, initial-scale=1">

		<!-- CSS LINK -->
		<link rel="stylesheet" href="styles/style.css">

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	</head>

	<!-- The top and container are the class and id called from the bootstrap and css -->

	<body>
		<div id="top">
			<!-- Top Bar Start (ONLY) -->
			<div class="container">
				<!-- Container Start -->
				<div class="col-md-6 offer">
					<!-- //Bootstrap class creates 12 columns for navbar and used half -->
					<a href="#" class="btn btn-success btn sm">
						<!-- //class to get button and that button is small-->
						<?php
						if (!isset($_SESSION['customer_email'])) {
							echo "WELCOME GAMER";
						} else {
							echo "WELCOME: " . $_SESSION['customer_email'] . "";
						}
						?>
					</a>

					<a href="#">
						Shopping cart total price : INR 100, Total Item 2
					</a>

				</div><!-- //Bootstrap class creates 12 columns #CLOSED -->
				<div class="col-md-6">
					<ul class="menu">
						<li>
							<a href="../customer_registration.php">
								Register
							</a>
						</li>

						<li>
							<a href="my_account.php">
								My Account
							</a>
						</li>

						<li>
							<a href="../cart.php">
								Go to Cart
							</a>
						</li>

						<li>
							<?php
							if (!isset($_SESSION['customer_email'])) {
								echo "<a href = 'checkout.php'>Login</a>";
							} else {
								echo "<a = logout.php>Logout</a>";
							}
							?>
						</li>
					</ul>

				</div>
			</div><!-- Container Closed -->

		</div><!-- Top Bar Closed -->

		<div class="navbar navbar-default" id="navbar">
			<!--  //navbar opening -->
			<div class="container">
				<!--  //container opening -->
				<div class="navbar-header">
					<!-- // header opening -->
					<a class="navbar-brand home" href="../index.php">
						<img src="images/logo.jpg" alt="WASD LOGO" height="45" width="150" class="hidden-xs"> <!-- //hidden when screen is extra small bootstrap -->
						<img src="images/logo_small.png" alt="GameStanza Small Logo" height="45" width="40" class="visible-xs"> <!-- //when screen is extra small bootstrap -->
					</a>

					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
						<span class="sr-only"> Toggle Navigation </span>
						<i class="fa fa-align-justify">
							<!-- //get icon from font swesome 3 dot icon -->
						</i>
					</button>

					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
						<span class="sr-only"></span>
						<i class="fa fa-search"></i>
					</button>
				</div> <!-- // header closing -->

				<div class="navbar-collapse collapse" id="navigation">
					<!--  // navbar collapse start -->
					<div class="padding-nav">
						<!--  //padding nav open -->
						<ul class="nav navbar-nav navbar-left">
							<li>
								<a href="../index.php"> Home</a>
							</li>
							<li>
								<a href="../shop.php"> Shop</a>
							</li>
							<li class="active">
								<a href="my_account.php"> My Account</a>
							</li>
							<li>
								<a href="../cart.php"> Shopping Cart</a>
							</li>
							<li>
								<a href="../index.php"> About Us</a>
							</li>
							<li>
								<a href="../services.php">Services</a> <!-- //COMPATIBILITY GOES HERE -->
							</li>
							<li>
								<a href="../contactus.php">Contact Us</a>
							</li>
						</ul>
					</div><!--  //padding nav close -->
					<a href="cart.php" class="btn btn-primary navbar-btn right">
						<!--  //bootstrap used -->
						<i class="fa fa-shopping-cart"></i>
						<span>4 items in Cart</span>
					</a>
					<div class="navbar-collapse collapse right">
						<!--  //nav collapse right start -->
						<button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
							<span class="sr-only"> Toggle Search</span>
							<i class="fa fa-search"></i>
						</button>
					</div><!--  //navbar collapse right end -->

					<div class="collapse clearfix" id="search">
						<form class="navbar-form" method="get" action="result.php">
							<div class="input-group">
								<input type="text" name="user_query" placeholder="Search" class="form-control" required="">
								<span class="input-group-btn">
									<button type="submit" value="Search" name="search" class="btn btn-primary">
										<i class="fa fa-search"></i>
									</button>
								</span>
							</div>
						</form>
					</div>

				</div> <!-- // navbar collapse end -->

			</div><!--  //container closing -->
		</div> <!-- //navbar close -->

		<!-- // Main shop work start -->

		<div id="content">
			<div class="container">
				<!--  //starting container -->
				<div class="col-md-12">
					<!--  //column on medium screen 1 open -->
					<ul class="breadcrumb">
						<!--  //bootstrap default class for navigation-->
						<li><a href="../index.php">Home</a></li>
						<li>My Account</li>
					</ul>
				</div> <!-- //column on medium screen 1 open -->

				<!-- // sidebar code start -->
				<div class="col-md-3">

					<?php
					include("includes/sidebar.php");
					?>

				</div>
				<!-- // sidebar code end -->


				<!-- //CONFIRM WORK STARTES -->

				<div class="col-md-9">
					<div class="box">
						<h1 align="center">Please confirm your payment</h1>
						<form action="confirm.php?update_id=<?php echo $order_id ?>" method="post" enctype="multipart/form-data">

							<div class="form-group">
								<label>Invoice Number</label>
								<input type="text" class="form-control" required name="invoice_id">
							</div>
							<div class="form-group">
								<label>Amount</label>
								<input type="text" class="form-control" required name="amount">
							</div>
							<div class="form-group">
								<label>Select Payment Mode</label>
								<select class="form-control" name="payment_mode">
									<option>Bank Transfer</option>
									<option>PayPal</option>
									<option>PayTm/GPay</option>
									<option>PayuMoney</option>
								</select>
							</div>
							<div class="form-group">
								<label>Transaction Number</label>
								<input type="text" class="form-control" required name="ref_no">
							</div>
							<div class="form-group">
								<label>Payment Date</label>
								<input type="date" class="form-control" required name="date">
							</div>

							<div class="text-center">
								<button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">Confirm Payment</button>

							</div>
						</form>

						<?php

						if (isset($_POST['confirm_payment'])) {
							$update_id = $_GET['update_id'];
							$invoice_number = $_POST['invoice_id'];
							$amount = $_POST['amount'];
							$payment_mode = $_POST['payment_mode'];
							$trfr_number = $_POST['ref_no'];
							$date = $_POST['date'];
							$complete = "Completed";

							$insert = "INSERT INTO payments (invoice_id, amount, payment_mode, ref_no, payment_date) values ('$invoice_number', '$amount', '$payment_mode', '$trfr_number', '$date')";
							$run_insert = mysqli_query($con, $insert);

							$update_q = "UPDATE customer_order SET order_status= '$complete' WHERE order_id='$update_id'";
							$run_insert = mysqli_query($con, $update_q);

							// $update_p = "UPDATE pending_order SET order_status= '$complete' where order_id='$update_id'";
							// $run_insert = mysqli_query($con, $update_p);

							echo "<script> alert('Your order has been received') </script>";
							echo "<script> window.open('my_account.php?my_order', '_self') </script>";
						}
						?>

					</div>
				</div>

				<!-- //CONFIRM WORK ENDED -->


			</div><!--  //closing container -->
		</div> <!-- closing content -->



		<!-- // Main shop work end -->




		<!--FOOTER START-->
		<?php include("includes/footer.php"); ?>
		<!--FOOTER END-->

		<!-- //javascript bootstrap -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	</body>

	</html>
<?php } ?>