<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>
    window.open('login.php', '_self')
</script>";
} else {

?>

    <!-- 1 Row Start -->
    <div class="row">
        <!--1st Row Star-->
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard
                </li>
            </ol>
        </div>
    </div>
    <!--1 Row End-->

    <!-- Products Card Start -->
    <!--2 Row Start-->
    <div class="row">
        <!--col-lg-3 col-md-6 start-->
        <div class="col-lg-3 col-md-6">
            <!-- panel panel-primary start -->
            <div class="panel panel-primary">
                <!-- panel-heading start -->
                <div class="panel-heading">
                    <!--panel-heading row start-->
                    <div class="row">
                        <!-- col-xs-3 start -->
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                            <!-- col-xs-3 end -->
                        </div>
                        <!-- col-xs-9 text-right start -->
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $count_pro ?></div>
                            <div>Products</div>
                        </div>
                        <!-- col-xs-9 text-right end -->
                    </div>
                    <!--panel-heading row end-->
                </div>
                <!-- panel-heading end -->
                <a href="index.php?view_product">
                    <!-- panel-footer start -->
                    <div class="panel-footer">
                        <span class="pull-left"> View Details </span>
                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                        <div class="clearfix"></div>
                    </div>
                    <!-- panel-footer end -->
                </a>
            </div>
            <!-- panel panel-primary end -->
        </div>
        <!--col-lg-3 col-md-6 end-->
        <!-- Products Card End -->

        <!-- Customers Card Start -->
        <!--col-lg-3 col-md-6 start-->
        <div class="col-lg-3 col-md-6">
            <!-- panel panel-green start -->
            <div class="panel panel-green">
                <!-- panel-heading start -->
                <div class="panel-heading">
                    <!--panel-heading row start-->
                    <div class="row">
                        <!-- col-xs-3 start -->
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                            <!-- col-xs-3 end -->
                        </div>
                        <!-- col-xs-9 text-right start -->
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $count_cust ?></div>
                            <div>Customers</div>
                        </div>
                        <!-- col-xs-9 text-right end -->
                    </div>
                    <!--panel-heading row end-->
                </div>
                <!-- panel-heading end -->
                <a href="index.php?view_customer">
                    <!-- panel-footer start -->
                    <div class="panel-footer">
                        <span class="pull-left"> View Details </span>
                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                        <div class="clearfix"></div>
                    </div>
                    <!-- panel-footer end -->
                </a>
            </div>
            <!-- panel panel-green end -->
        </div>
        <!--col-lg-3 col-md-6 end-->
        <!-- Customers Card End -->

        <!-- Product Categories Card Start -->
        <!--col-lg-3 col-md-6 start-->
        <div class="col-lg-3 col-md-6">
            <!-- panel panel-yellow start -->
            <div class="panel panel-yellow">
                <!-- panel-heading start -->
                <div class="panel-heading">
                    <!--panel-heading row start-->
                    <div class="row">
                        <!-- col-xs-3 start -->
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                            <!-- col-xs-3 end -->
                        </div>
                        <!-- col-xs-9 text-right start -->
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $count_p_cat ?></div>
                            <div>Product Categories</div>
                        </div>
                        <!-- col-xs-9 text-right end -->
                    </div>
                    <!--panel-heading row end-->
                </div>
                <!-- panel-heading end -->
                <a href="index.php?view_product_cat">
                    <!-- panel-footer start -->
                    <div class="panel-footer">
                        <span class="pull-left"> View Details </span>
                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                        <div class="clearfix"></div>
                    </div>
                    <!-- panel-footer end -->
                </a>
            </div>
            <!-- panel panel-yellow end -->
        </div>
        <!--col-lg-3 col-md-6 end-->
        <!-- Product Categories Card End -->

        <!-- Orders Card Start -->
        <!--col-lg-3 col-md-6 start-->
        <div class="col-lg-3 col-md-6">
            <!-- panel panel-red start -->
            <div class="panel panel-red">
                <!-- panel-heading start -->
                <div class="panel-heading">
                    <!--panel-heading row start-->
                    <div class="row">
                        <!-- col-xs-3 start -->
                        <div class="col-xs-3">
                            <i class="fa fa-support fa-5x"></i>
                            <!-- col-xs-3 end -->
                        </div>
                        <!-- col-xs-9 text-right start -->
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $count_order ?></div>
                            <div>Orders</div>
                        </div>
                        <!-- col-xs-9 text-right end -->
                    </div>
                    <!--panel-heading row end-->
                </div>
                <!-- panel-heading end -->
                <a href="index.php?view_order">
                    <!-- panel-footer start -->
                    <div class="panel-footer">
                        <span class="pull-left"> View Details </span>
                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                        <div class="clearfix"></div>
                    </div>
                    <!-- panel-footer end -->
                </a>
            </div>
            <!-- panel panel-red end -->
        </div>
        <!--col-lg-3 col-md-6 end-->
        <!-- Orders Card End -->
    </div>
    <!--2 Row End-->

    <!--3 Row Start-->
    <div class="row">
        <!-- col-lg-8 Start -->
        <div class="col-lg-8">
            <!-- panel panel-primary Start -->
            <div class="panel panel-primary">
                <!-- panel-heading Start -->
                <div class="panel-heading">
                    <!-- panel-title Start -->
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> New Orders
                    </h3>
                </div>

                <!-- panel-body Start -->
                <div class="panel-body">
                    <!-- table-responsive Start -->
                    <div class="table-responsive">
                        <!-- table table-bordered table-hover table-striped Start -->
                        <table class="table table-bordered table-hover table-striped">
                            <!-- thead Start -->
                            <thead>
                                <!-- tr Start -->
                                <tr>
                                    <th>Order No:</th>
                                    <th>Customer Email:</th>
                                    <th>Invoice No:</th>
                                    <th>Product ID:</th>
                                    <th>Total:</th>
                                    <th>Date:</th>
                                    <th>Status:</th>
                                </tr>
                                <!-- tr End -->
                            </thead>
                            <!-- thead End -->

                            <!-- tbody Start -->
                            <tbody>
                                <?php

                                $i = 0;
                                $get_order = "SELECT * FROM customer_order ORDER BY 1 DESC LIMIT 0,5";
                                $run_order = mysqli_query($con, $get_order);

                                while ($row_order = mysqli_fetch_array($run_order)) {
                                    $order_id = $row_order['order_id'];
                                    $customer_id = $row_order['customer_id'];
                                    $product_id = $row_order['product_id'];
                                    $invoice_no = $row_order['invoice_no'];
                                    $qty = $row_order['qty'];
                                    $size = $row_order['size'];
                                    $status = $row_order['order_status'];
                                    $i++;

                                ?>
                                    <!-- tr Start -->
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td>
                                            <?php
                                            $get_cust = "SELECT * FROM customers WHERE customer_id = '$customer_id'";
                                            $run_cust = mysqli_query($con, $get_cust);
                                            $row_customer = mysqli_fetch_array($run_cust);

                                            $customer_email = $row_customer['customer_email'];
                                            echo $customer_email;
                                            ?>
                                        </td>
                                        <td><?php echo $invoice_no ?></td>
                                        <td><?php echo $product_id ?></td>
                                        <td><?php echo $qty ?></td>
                                        <td><?php echo $size ?></td>
                                        <td><?php echo $status ?></td>
                                    </tr>
                                    <!-- tr End -->
                                <?php } ?>

                            </tbody>
                            <!-- tbody End -->
                        </table>
                        <!-- table table-bordered table-hover table-striped End -->
                    </div>
                    <!-- table-responsive End -->

                    <!-- text-right Start -->
                    <div class="text-right">
                        <a href="index.php?view_orders">
                            View All Orders <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                    <!-- text-right End -->
                </div>
                <!-- panel-body End -->
            </div>
            <!-- panel panel-primary End -->
        </div>
        <!-- col-lg-8 End -->

        <!-- col-md-4 Start -->
        <div class="col-md-4">
            <!-- panel Start -->
            <div class="panel">
                <!-- panel-body Start -->
                <div class="panel-body">
                    <!-- thumb-info mb-md Start -->
                    <div class="thumb-info mb-md">
                        <img src="admin_images/<?php echo $admin_image ?>" class="rounded img-thumbnail" alt="Admin Profile">
                        <!-- thumb-info-title Start -->
                        <div class="thumb-info-title">
                            <span class="thumb-info-inner"><?php echo $admin_name ?></span> <br>
                            <span class="thumb-info-type"><?php echo $admin_job ?></span> <br><br>
                        </div>
                        <!-- thumb-info-title End -->
                    </div>
                    <!-- thumb-info mb-md End -->

                    <!-- mb-md Start -->
                    <div class="mb-md">
                        <!-- widget-content-expaned Start -->
                        <div class="widget-content-expaned">
                            <i class="fa fa-user"></i> <span>Eamil: </span> <?php echo $admin_email ?> <br>
                            <i class="fa fa-user"></i> <span>Country: </span> <?php echo $admin_country ?> <br>
                            <i class="fa fa-user"></i> <span>Contact: </span> <?php echo $admin_contact ?> <br>
                        </div>

                        <hr class="dotted-short">
                        <h5 class="text-muted">About</h5>
                        <p><?php echo $admin_about ?></p>
                    </div>
                    <!-- mb-md End -->
                </div>
                <!-- panel-body End -->
            </div>
            <!-- panel End -->
        </div>
        <!-- col-md-4 End -->
    </div>
    <!--3 Row End-->
<?php } ?>