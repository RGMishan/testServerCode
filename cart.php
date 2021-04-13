<?php
session_start();
include("includes/db.php");
include("functions/functions.php");

?>

<!DOCTYPE html>
<html>

<head>
	<title>GameStanza STORE</title>

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
					Shopping cart total price : INR <?php totalPrice(); ?>, Total Item <?php item(); ?>
				</a>

			</div><!-- //Bootstrap class creates 12 columns #CLOSED -->
			<div class="col-md-6">
				<ul class="menu">
					<li>
						<a href="customer_registration.php">
							Register
						</a>
					</li>

					<li>
						<?php
						if (!isset($_SESSION['customer_email'])) {
							echo "<a href='checkout.php'>My Account</a>";
						} else {
							echo "<a href='customer/my_account.php?my_order'>My Account</a>";
						}
						?>
					</li>

					<li>
						<a href="cart.php">
							Go to Cart
						</a>
					</li>

					<li>
						<?php
						if (!isset($_SESSION['customer_email'])) {
							echo "<a href = 'checkout.php'>Login</a>";
						} else {
							echo "<a href= logout.php>Logout</a>";
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
				<a class="navbar-brand home" href="index.php">
					<img src="images/wasdlogo.png" alt="WASD LOGO" height="45" width="150" class="hidden-xs"> <!-- //hidden when screen is extra small bootstrap -->
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
							<a href="index.php"> Home</a>
						</li>
						<li>
							<a href="shop.php"> Shop</a>
						</li>
						<li>
							<?php
							if (!isset($_SESSION['customer_email'])) {
								echo "<a href='checkout.php'>My Account</a>";
							} else {
								echo "<a href='customer/my_account.php?my_order'>My Account</a>";
							}
							?>
						</li>
						<li class="active">
							<a href="cart.php"> Shopping Cart</a>
						</li>
						<li>
							<a href="contactus.php">Contact Us</a>
						</li>
					</ul>
				</div><!--  //padding nav close -->
				<a href="cart.php" class="btn btn-primary navbar-btn right">
					<!--  //bootstrap used -->
					<i class="fa fa-shopping-cart"></i>
					<span><?php item(); ?> items in Cart</span>
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
					<li><a href="index.php">Home</a></li>
					<li>Shopping Cart</li>
				</ul>
			</div> <!-- //column on medium screen 1 open -->


			<!-- // Cart Page Portion Started -->

			<div class="col-md-9" id="cart">
				<div class="box">
					<form action="cart.php" method="post" enctype="multipart-form-data">
						<h1>Shopping Cart</h1>

						<?php
						$ip_add = getUserIP();
						$select_cart = "SELECT * FROM cart WHERE ip_add='$ip_add'";
						$run_cart = mysqli_query($con, $select_cart);
						$count = mysqli_num_rows($run_cart);
						?>

						<p class="text-muted"> Currently you have <?php echo $count ?> item(s) in your cart</p>
						<div class="table-responsive">
							<!-- //table responsive start -->
							<table class="table">
								<!-- //bootstrap class -->
								<thead>
									<!--  //makes bold -->
									<tr>
										<th colspan="2">Product</th>
										<th>Quantity</th>
										<th>Unit Price</th>
										<th>Edition</th>
										<th colspan="1">Delete</th>
										<th colspan="1">Sub Total</th>
									</tr>
								</thead>

								<tbody>
									<?php
									$total = 0;
									while ($row = mysqli_fetch_array($run_cart)) {
										$pro_id = $row['p_id'];
										$pro_size = $row['size'];
										$pro_qty = $row['qty'];
										$get_product = "SELECT * FROM products where product_id='$pro_id'";
										$run_pro = mysqli_query($con, $get_product);
										while ($row = mysqli_fetch_array($run_pro)) {
											$p_title = $row['product_title'];
											$p_img1 = $row['product_img1'];
											$p_price = $row['product_price'];
											$sub_total = $row['product_price'] * $pro_qty;
											$total += $sub_total;

									?>
											<tr>
												<td><img src="admin_area/product_images/<?php echo $p_img1 ?>"></td>
												<td><?php echo $p_title ?></td>
												<td><?php echo $pro_qty ?></td>
												<td>INR <?php echo $p_price ?></td>
												<td><?php echo $pro_size ?></td>
												<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id ?>"></td>
												<td>INR <?php echo $sub_total ?></td>
											</tr>
									<?php  }
									} ?>
								</tbody>

								<tfoot>
									<tr>
										<th colspan="5">Total</th>
										<th colspan="2">INR <?php echo  $total; ?></th>
									</tr>
								</tfoot>
							</table>
						</div> <!-- //table responsive closing -->


						<!--ChAGnES MADE This part is static -->
						<!--
<div class="box-footer" >  //footer box open 

				<div class="pull-left">  //pull left start 
					<h4>TOTAL PRICE</h4>
				</div>  //pull left closed 

				<div class ="pull-right">
				INR  <?php# echo  $total; ?>
				</div>

			</div>  //footer box closed
-->

						<div class="box-footer">
							<!--  //footer box open -->

							<div class="pull-left">
								<!--  //pull left start -->
								<a href="index.php" class="btn btn-default">
									<i class="fa fa-chevron-left">Continue Shopping</i>
								</a>
							</div> <!-- //pull left closed -->

							<div class="pull-right">
								<button class="btn btn-default" type="submit" name="update" value="Update Cart">
									<i class="fa fa-refresh"> Update Cart</i>
								</button>
								<a href="checkout.php" class="btn btn-primary">Proceed To Check Out<i class="fa fa-chevron-right"></i></a>
							</div>

						</div><!--  //footer box closed -->

					</form>
				</div> <!-- //box closing -->

				<!-- //Update and Delete -->
				<?php
				function update_cart()
				{
					global $con;
					if (isset($_POST['update'])) {

						foreach ($_POST['remove'] as $remove_id) {
							$delete_product = "DELETE FROM cart where p_id = '$remove_id' ";
							$run_del = mysqli_query($con, $delete_product);
							if ($run_del) {
								echo "<script>window.open('cart.php','_self')</script>";
							}
						}
					}
				}

				echo @$up_cart = update_cart();
				?>
			</div><!--  //cart main div closing -->


			<!-- // Cart Page Portion Ended -->


			<!-- //SIDE CART SUMMARY OPEN -->

			<div class="col-md-3">
				<!--  //col md 3 started -->
				<div class="box" id="order-summary">
					<div class="box-header">
						<h3>Order Summary</h3>
					</div>
					<p class="text-muted">Shipping and Additional Cost are calculated based on the values you have entered</p>
					<div class="table-responsive">
						<table class="table">
							<tbody>
								<tr>
									<td>Order Subtotal</td>
									<th>INR <?php echo $total ?></th>
								</tr>
								<tr>
									<td>Shipping and handling</td>
									<td>INR 0</td>
								</tr>
								<tr>
									<td>TAX</td>
									<td>INR 0</td>
								</tr>
								<tr class="total">
									<td>Total</td>
									<th>INR <?php echo $total ?></th>
								</tr>
							</tbody>
						</table>

					</div>

				</div>
			</div><!--  //col md 3 closed -->
		</div> <!-- //row closed -->
	</div> <!-- //container closed -->

	<!--FOOTER START-->
	<?php include("includes/footer.php"); ?>
	<!--FOOTER END-->

	<!-- //javascript bootstrap -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</body>

</html>