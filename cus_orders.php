<?php
    session_start();
        require_once('connect.php');
        $user_log_id=$_SESSION["user_log_id"];
        $_SESSION["user_log_id"]=$user_log_id;
        $id_number=$_SESSION["id_number"];
        $_SESSION["id_number"]=$id_number;
        $fname=$_SESSION["fname"];
        $_SESSION["fname"]=$fname;

        if(isset($_POST['upd_account'])){

            $query1 = mysqli_query($mysql, "update users set username='$_POST[username]', password='$_POST[password]' where user_id='$_POST[user_id]';");
        ?>
                <script>alert("Data successfully updated.");</script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=cus_cart.php" />';
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">

      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <!-- calendar file css -->
      <link rel="stylesheet" href="js/semantic.min.css" />
      <!-- fancy box js -->
      <link rel="stylesheet" href="css/jquery.fancybox.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Lianga eShopping | Customer - Orders</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  -->
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

    <!-- Core CSS - Include with every page
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    -->
    <!-- Page-Level Plugin CSS - Tables -->
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: eBusiness - v4.7.0
  * Template URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div class="logo">
        <h1><a href="cus_home.php">Lianga <span>e</span>Shopping</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="cus_home.php">Home</a></li>
          <li><a href="cus_cart.php">My Cart</a></li>
          <li><a class="nav-link scrollto active" href="#">My Orders</a></li>
          <li class="dropdown"><a href="#"><span>Hi <?php echo $fname;?></span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="cus_personal.php">Personal Info</a></li>
              <li><a href="" data-toggle="modal" data-target="#account">Update Account</a></li>
              <li style="color:#FFFFFF;"><a href="" data-toggle="modal" data-target="#logout">Log Out</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

   <!-- Body -->                        <style>
                                            .zoom {
                                                transition: transform .2s; /* Animation */
                                                margin: 0 auto;
                                                width: 50px; /* width of container */
                                                height: 50px; /* height of container */
                                                object-fit: contain;
                                            }
                                            .zoom:hover {
                                                transition: transform .5s ease;
                                                transform: scale(2.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
                                                position:relative;
                                                z-index:2;
                                            }
                                       </style>

                        <!-- Table Section - -->
                        <div class="col-md-12" style="margin-top:80px;">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                     <h2>My Orders</h2>
                                 </div>
                              </div>
                              <div class="full inner_elements">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="tab_style1">
                                          <div class="tabbar padding_infor_info">
                                             <nav>
                                                <?php
                                                    $to_process = '';
                                                    $to_deliver = '';
                                                    $to_receive = '';
                                                    $qry1 = mysqli_query($mysql,"select count(*) as to_process from orders where customer_id='$id_number' and status like 'For Process%';");
                                                    $row1 = mysqli_fetch_array($qry1); if($row1['to_process'] > 0) { $to_process = "(".$row1['to_process'].")"; }
                                                    $qry2 = mysqli_query($mysql,"select count(*) as to_deliver from orders where customer_id='$id_number' and status like 'For Deliver%';");
                                                    $row2 = mysqli_fetch_array($qry2); if($row2['to_deliver'] > 0) { $to_deliver = "(".$row2['to_deliver'].")"; }
                                                    $qry3 = mysqli_query($mysql,"select count(*) as to_receive from orders where customer_id='$id_number' and status like '%Receiv%';");
                                                    $row3 = mysqli_fetch_array($qry3); if($row3['to_receive'] > 0) { $to_receive = "(".$row3['to_receive'].")"; }
                                                ?>
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                   <a class="nav-item nav-link active" id="nav-process-tab" data-toggle="tab" href="#nav-process" role="tab" aria-controls="nav-process" style="font-weight:bold;" aria-selected="true">To Process&nbsp;&nbsp;<span style="color:#FF0000"><?php echo $to_process;?></span></a>
                                                   <a class="nav-item nav-link" id="nav-deliver-tab" data-toggle="tab" href="#nav-deliver" role="tab" aria-controls="nav-deliver" style="font-weight:bold;" aria-selected="false">To Deliver&nbsp;&nbsp;<span style="color:#FF0000"><?php echo $to_deliver;?></span></a>
                                                   <a class="nav-item nav-link" id="nav-receive-tab" data-toggle="tab" href="#nav-receive" role="tab" aria-controls="nav-receive" style="font-weight:bold;" aria-selected="false">To Receive&nbsp;&nbsp;<span style="color:#FF0000"><?php echo $to_receive;?></span></a>
                                                   <a class="nav-item nav-link" id="nav-complete-tab" data-toggle="tab" href="#nav-complete" role="tab" aria-controls="nav-complete" style="font-weight:bold;" aria-selected="false">Completed</a>
                                                   <a class="nav-item nav-link" id="nav-cancel-tab" data-toggle="tab" href="#nav-cancel" role="tab" aria-controls="nav-cancel" style="font-weight:bold;" aria-selected="false">Cancelled</a>
                                                   <a class="nav-item nav-link" id="nav-return-tab" data-toggle="tab" href="#nav-return" role="tab" aria-controls="nav-return" style="font-weight:bold;" aria-selected="false">Returned</a>
                                                </div>
                                             </nav>
                                             <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="nav-process" role="tabpanel" aria-labelledby="nav-process-tab">
                                                    <?php
                                                        $qry2 = mysqli_query($mysql, "select *,o.quantity as order_qty,o.status as order_status from product p, orders o, location l where p.product_id=o.product_id and o.location_id=l.location_id and o.customer_id='$id_number' and o.status like 'For Process%' order by o.date_time desc;");
                                                        $num_rows2 = mysqli_num_rows($qry2);
                                                        if($num_rows2 == 0) { ?>
                                                        <br><br><br><br><br>
                                                        <div class="row" align="center">
                                                            <div class="col-md-12 col-12">No orders available</div>
                                                            <div class="col-md-12 col-12"><a type="submit" id="order_now" href="cus_home.php" class="btn btn-primary" ><i class="fa fa-shopping-cart"></i> Order Now!</a></div>
                                                        </div>
                                                        <br><br><br><br><br>
                                                        <?php }

                                                        while($row2 = mysqli_fetch_array($qry2))
                                                		{
                                                		    $sub_total = $row2['price'] * $row2['order_qty'];
                                                            $order_total = $sub_total + $row2['charge'];
                                                		    ?>
                                                    <div class="row">
                                                        <div class="col-md-1 col-2"><img class="zoom" style="margin: 0 10px 0 10px;" src="<?php echo "upload/".$row2['image'];?>"></div>
                                                        <div class="col-md-4 col-10"><?php echo $row2['description'];?></div>
                                                        <div class="col-md-1 col-6"><?php echo "₱".$row2['price'];?></div>
                                                        <div align="right" class="col-md-1 col-6"><?php echo $row2['order_qty']." item(s)";?></div>
                                                        <div class="col-md-1 col-12"></div>
                                                        <div class="col-md-4 col-12" style="color:#155660; font-size:12px; font-style:italic;"><?php echo $row2['order_status'];?></div><br>
                                                        <div class="col-md-9 col-12"></div>
                                                        <div class="col-md-2 col-6">Subtotal: &nbsp;</div>
                                                        <div align="right" class="col-md-1 col-6"><?php echo "₱".$sub_total;?></div>

                                                        <div class="col-md-9 col-12"></div>
                                                        <div class="col-md-2 col-6">Delivery Fee: &nbsp;</div>
                                                        <div align="right" class="col-md-1 col-6"><?php echo "₱".$row2['charge'];?></div>

                                                        <div class="col-md-7 col-12"></div>
                                                        <div class="col-md-2 col-12"></div>
                                                        <div class="col-md-2 col-6">Amount Payable: &nbsp;</div>
                                                        <div align="right" class="col-md-1 col-6" style="font-size:20px; color:#155660;"><b><?php echo "₱".$order_total;?></b></div>
                                                        <br><br>
                                                        <div class="col-md-9 col-12"></div>
                                                        <div class="col-md-3 col-12" align="center">
                                                            <?php
                                                            if($row2['order_status'] == 'For Processing - Waiting to accept order') {
                                                                ?>
                                                            <a onclick="return confirm('Are you sure you want to cancel this order?');" href="delete_data.php?id=<?php echo $row2['order_id']; ?>&name=cancel_order">
                                                            <button class="btn btn-danger btn-md" type="button" data-toggle="tooltip" data-placement="top" title="Cancel">Cancel Order</button></a>
                                                                <?php
                                                            } else {
                                                                ?>
                                                            <span style="font-style:italic; font-size:12px;">Order is now on process</span>
                                                                <?php

                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="border-top my-4"></div>
                                                    </div>
                                                    <?php    }
                	                                ?>

                                                </div>
                                                <div class="tab-pane fade" id="nav-deliver" role="tabpanel" aria-labelledby="nav-deliver-tab">
                                                    <?php
                                                        $qry2 = mysqli_query($mysql, "select *,o.quantity as order_qty,o.status as order_status from product p, orders o, location l where p.product_id=o.product_id and o.location_id=l.location_id and o.customer_id='$id_number' and o.status like 'For Deliver%' order by o.date_time desc;");
                                                        $num_rows2 = mysqli_num_rows($qry2);
                                                        if($num_rows2 == 0) { ?>
                                                        <br><br><br><br><br>
                                                        <div class="row" align="center">
                                                            <div class="col-md-12 col-12">No orders available</div>
                                                            <div class="col-md-12 col-12"><a type="submit" id="order_now" href="cus_home.php" class="btn btn-primary" ><i class="fa fa-shopping-cart"></i> Order Now!</a></div>
                                                        </div>
                                                        <br><br><br><br><br>
                                                        <?php }

                                                        while($row2 = mysqli_fetch_array($qry2))
                                                		{
                                                		    $sub_total = $row2['price'] * $row2['order_qty'];
                                                            $order_total = $sub_total + $row2['charge'];
                                                		    ?>
                                                    <div class="row">
                                                        <div class="col-md-1 col-2"><img class="zoom" style="margin: 0 10px 0 10px;" src="<?php echo "upload/".$row2['image'];?>"></div>
                                                        <div class="col-md-4 col-10"><?php echo $row2['description'];?></div>
                                                        <div class="col-md-1 col-6"><?php echo "₱".$row2['price'];?></div>
                                                        <div align="right" class="col-md-1 col-6"><?php echo $row2['order_qty']." item(s)";?></div>
                                                        <div class="col-md-1 col-12"></div>
                                                        <div class="col-md-4 col-12" style="color:#155660; font-size:12px; font-style:italic;"><?php echo $row2['order_status'];?></div><br>
                                                        <div class="col-md-9 col-12"></div>
                                                        <div class="col-md-2 col-6">Subtotal: &nbsp;</div>
                                                        <div align="right" class="col-md-1 col-6"><?php echo "₱".$sub_total;?></div>

                                                        <div class="col-md-9 col-12"></div>
                                                        <div class="col-md-2 col-6">Delivery Fee: &nbsp;</div>
                                                        <div align="right" class="col-md-1 col-6"><?php echo "₱".$row2['charge'];?></div>

                                                        <div class="col-md-7 col-12"></div>
                                                        <div class="col-md-2 col-12"></div>
                                                        <div class="col-md-2 col-6">Amount Payable: &nbsp;</div>
                                                        <div align="right" class="col-md-1 col-6" style="font-size:20px; color:#155660;"><b><?php echo "₱".$order_total;?></b></div>
                                                        <br><br>
                                                        <div class="col-md-9 col-12"></div>
                                                        <div class="col-md-3 col-12" align="center">

                                                        </div>
                                                        <div class="border-top my-4"></div>
                                                    </div>
                                                    <?php    }
                	                                ?>

                                                </div>
                                                <div class="tab-pane fade" id="nav-receive" role="tabpanel" aria-labelledby="nav-receive-tab">
                                                    <?php
                                                        $qry2 = mysqli_query($mysql, "select *,o.quantity as order_qty,o.status as order_status from product p, orders o, location l where p.product_id=o.product_id and o.location_id=l.location_id and o.customer_id='$id_number' and o.status like '%Receiv%' order by o.date_time desc;");
                                                        $num_rows2 = mysqli_num_rows($qry2);
                                                        if($num_rows2 == 0) { ?>
                                                        <br><br><br><br><br>
                                                        <div class="row" align="center">
                                                            <div class="col-md-12 col-12">No orders available</div>
                                                            <div class="col-md-12 col-12"><a type="submit" id="order_now" href="cus_home.php" class="btn btn-primary" ><i class="fa fa-shopping-cart"></i> Order Now!</a></div>
                                                        </div>
                                                        <br><br><br><br><br>
                                                        <?php }

                                                        while($row2 = mysqli_fetch_array($qry2))
                                                		{
                                                		    $sub_total = $row2['price'] * $row2['order_qty'];
                                                            $order_total = $sub_total + $row2['charge'];
                                                		    ?>
                                                    <div class="row">
                                                        <div class="col-md-1 col-2"><img class="zoom" style="margin: 0 10px 0 10px;" src="<?php echo "upload/".$row2['image'];?>"></div>
                                                        <div class="col-md-4 col-10"><?php echo $row2['description'];?></div>
                                                        <div class="col-md-1 col-6"><?php echo "₱".$row2['price'];?></div>
                                                        <div align="right" class="col-md-1 col-6"><?php echo $row2['order_qty']." item(s)";?></div>
                                                        <div class="col-md-1 col-12"></div>
                                                        <div class="col-md-4 col-12" style="color:#155660; font-size:12px; font-style:italic;"><?php echo $row2['order_status'];?></div><br>
                                                        <div class="col-md-9 col-12"></div>
                                                        <div class="col-md-2 col-6">Subtotal: &nbsp;</div>
                                                        <div align="right" class="col-md-1 col-6"><?php echo "₱".$sub_total;?></div>

                                                        <div class="col-md-9 col-12"></div>
                                                        <div class="col-md-2 col-6">Delivery Fee: &nbsp;</div>
                                                        <div align="right" class="col-md-1 col-6"><?php echo "₱".$row2['charge'];?></div>

                                                        <div class="col-md-7 col-12"></div>
                                                        <div class="col-md-2 col-12"></div>
                                                        <div class="col-md-2 col-6">Amount Payable: &nbsp;</div>
                                                        <div align="right" class="col-md-1 col-6" style="font-size:20px; color:#155660;"><b><?php echo "₱".$order_total;?></b></div>
                                                        <br><br>
                                                        <div class="col-md-9 col-12"></div>
                                                        <div class="col-md-3 col-12" align="center">
                                                            <?php
                                                            $qry3 = mysqli_query($mysql, "select * from orders where order_id='$row2[order_id]' and status like 'Order Receiv%';");
                                                            $count_rows = mysqli_num_rows($qry3);
                                                            if($count_rows == 0) {
                                                                ?>
                                                            <a href="delete_data.php?id=<?php echo $row2['order_id']; ?>&name=order_received">
                                                            <button class="btn btn-primary btn-md" type="button" data-toggle="tooltip" data-placement="top" title="Order Received">Order Received</button> </a>
                                                                <?php
                                                            } else {
                                                                ?>
                                                            <span style="font-style:italic; font-size:12px;">Almost there to complete transaction</span>
                                                                <?php

                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="border-top my-4"></div>
                                                    </div>
                                                    <?php    }
                	                                ?>

                                                </div>
                                                <div class="tab-pane fade" id="nav-complete" role="tabpanel" aria-labelledby="nav-complete-tab">
                                                   <?php
                                                        $qry2 = mysqli_query($mysql, "select *,o.quantity as order_qty,o.status as order_status from product p, orders o, location l where p.product_id=o.product_id and o.location_id=l.location_id and o.customer_id='$id_number' and o.status like '%Complete%' order by o.date_time desc;");
                                                        $num_rows2 = mysqli_num_rows($qry2);
                                                        if($num_rows2 == 0) { ?>
                                                        <br><br><br><br><br>
                                                        <div class="row" align="center">
                                                            <div class="col-md-12 col-12">No orders available</div>
                                                            <div class="col-md-12 col-12"><a type="submit" id="order_now" href="cus_home.php" class="btn btn-primary" ><i class="fa fa-shopping-cart"></i> Order Now!</a></div>
                                                        </div>
                                                        <br><br><br><br><br>
                                                        <?php }

                                                        while($row2 = mysqli_fetch_array($qry2))
                                                		{
                                                		    $sub_total = $row2['price'] * $row2['order_qty'];
                                                            $order_total = $sub_total + $row2['charge'];
                                                		    ?>
                                                    <div class="row">
                                                        <div class="col-md-1 col-2"><img class="zoom" style="margin: 0 10px 0 10px;" src="<?php echo "upload/".$row2['image'];?>"></div>
                                                        <div class="col-md-4 col-10"><?php echo $row2['description'];?></div>
                                                        <div class="col-md-1 col-6"><?php echo "₱".$row2['price'];?></div>
                                                        <div align="right" class="col-md-1 col-6"><?php echo $row2['order_qty']." item(s)";?></div>
                                                        <div class="col-md-1 col-12"></div>
                                                        <div class="col-md-4 col-12" style="color:#155660; font-size:12px; font-style:italic;"><?php echo $row2['order_status'];?></div><br>
                                                        <div class="col-md-9 col-12"></div>
                                                        <div class="col-md-2 col-6">Subtotal: &nbsp;</div>
                                                        <div align="right" class="col-md-1 col-6"><?php echo "₱".$sub_total;?></div>

                                                        <div class="col-md-9 col-12"></div>
                                                        <div class="col-md-2 col-6">Delivery Fee: &nbsp;</div>
                                                        <div align="right" class="col-md-1 col-6"><?php echo "₱".$row2['charge'];?></div>

                                                        <div class="col-md-7 col-12"></div>
                                                        <div class="col-md-2 col-12"></div>
                                                        <div class="col-md-2 col-6">Amount Paid: &nbsp;</div>
                                                        <div align="right" class="col-md-1 col-6" style="font-size:20px; color:#155660;"><b><?php echo "₱".$order_total;?></b></div>
                                                        <br><br>
                                                        <div class="col-md-9 col-12"></div>
                                                        <div class="col-md-3 col-12" align="center">
                                                            <a href="cus_product.php?id=<?php echo $row2['product_id']; ?>&name=<?php echo $row2['name']; ?>">
                                                            <button class="btn btn-primary btn-md" type="button" data-toggle="tooltip" data-placement="top" title="Buy Again">Buy Again</button></a>
                                                        </div>
                                                        <div class="border-top my-4"></div>
                                                    </div>
                                                    <?php    }
                	                                ?>
                                                </div>
                                                <div class="tab-pane fade" id="nav-cancel" role="tabpanel" aria-labelledby="nav-cancel-tab">
                                                   <?php
                                                        $qry2 = mysqli_query($mysql, "select *,o.quantity as order_qty,o.status as order_status from product p, orders o, location l where p.product_id=o.product_id and o.location_id=l.location_id and o.customer_id='$id_number' and o.status like '%Cancel%' order by o.date_time desc;");
                                                        $num_rows2 = mysqli_num_rows($qry2);
                                                        if($num_rows2 == 0) { ?>
                                                        <br><br><br><br><br>
                                                        <div class="row" align="center">
                                                            <div class="col-md-12 col-12">No orders available</div>
                                                            <div class="col-md-12 col-12"><a type="submit" id="order_now" href="cus_home.php" class="btn btn-primary" ><i class="fa fa-shopping-cart"></i> Order Now!</a></div>
                                                        </div>
                                                        <br><br><br><br><br>
                                                        <?php }

                                                        while($row2 = mysqli_fetch_array($qry2))
                                                		{
                                                		    $sub_total = $row2['price'] * $row2['order_qty'];
                                                            $order_total = $sub_total + $row2['charge'];
                                                		    ?>
                                                    <div class="row">
                                                        <div class="col-md-1 col-2"><img class="zoom" style="margin: 0 10px 0 10px;" src="<?php echo "upload/".$row2['image'];?>"></div>
                                                        <div class="col-md-4 col-10"><?php echo $row2['description'];?></div>
                                                        <div class="col-md-1 col-6"><?php echo "₱".$row2['price'];?></div>
                                                        <div align="right" class="col-md-1 col-6"><?php echo $row2['order_qty']." item(s)";?></div>
                                                        <div class="col-md-1 col-12"></div>
                                                        <div class="col-md-4 col-12" style="color:#155660; font-size:12px; font-style:italic;"><?php echo $row2['order_status'];?></div><br>
                                                        <div class="col-md-9 col-12"></div>
                                                        <div class="col-md-2 col-6">Subtotal: &nbsp;</div>
                                                        <div align="right" class="col-md-1 col-6"><?php echo "₱".$sub_total;?></div>

                                                        <div class="col-md-9 col-12"></div>
                                                        <div class="col-md-2 col-6">Delivery Fee: &nbsp;</div>
                                                        <div align="right" class="col-md-1 col-6"><?php echo "₱".$row2['charge'];?></div>

                                                        <div class="col-md-7 col-12"></div>
                                                        <div class="col-md-2 col-12"></div>
                                                        <div class="col-md-2 col-6">Amount Payable: &nbsp;</div>
                                                        <div align="right" class="col-md-1 col-6" style="font-size:20px; color:#155660;"><b><?php echo "₱".$order_total;?></b></div>
                                                        <br><br>
                                                        <div class="col-md-9 col-12"></div>
                                                        <div class="col-md-3 col-12" align="center">
                                                            <a href="cus_product.php?id=<?php echo $row2['product_id']; ?>&name=<?php echo $row2['name']; ?>">
                                                            <button class="btn btn-primary btn-md" type="button" data-toggle="tooltip" data-placement="top" title="Buy Again">Re-order</button></a>
                                                        </div>
                                                        <div class="border-top my-4"></div>
                                                    </div>
                                                    <?php    }
                	                                ?>
                                                </div>
                                                <div class="tab-pane fade" id="nav-return" role="tabpanel" aria-labelledby="nav-return-tab">
                                                   <?php
                                                        $qry2 = mysqli_query($mysql, "select *,o.quantity as order_qty,o.status as order_status from product p, orders o, location l where p.product_id=o.product_id and o.location_id=l.location_id and o.customer_id='$id_number' and o.status like '%Return%' order by o.date_time desc;");
                                                        $num_rows2 = mysqli_num_rows($qry2);
                                                        if($num_rows2 == 0) { ?>
                                                        <br><br><br><br><br>
                                                        <div class="row" align="center">
                                                            <div class="col-md-12 col-12">No orders available</div>
                                                            <div class="col-md-12 col-12"><a type="submit" id="order_now" href="cus_home.php" class="btn btn-primary" ><i class="fa fa-shopping-cart"></i> Order Now!</a></div>
                                                        </div>
                                                        <br><br><br><br><br>
                                                        <?php }

                                                        while($row2 = mysqli_fetch_array($qry2))
                                                		{
                                                		    $sub_total = $row2['price'] * $row2['order_qty'];
                                                            $order_total = $sub_total + $row2['charge'];
                                                		    ?>
                                                    <div class="row">
                                                        <div class="col-md-1 col-2"><img class="zoom" style="margin: 0 10px 0 10px;" src="<?php echo "upload/".$row2['image'];?>"></div>
                                                        <div class="col-md-4 col-10"><?php echo $row2['description'];?></div>
                                                        <div class="col-md-1 col-6"><?php echo "₱".$row2['price'];?></div>
                                                        <div align="right" class="col-md-1 col-6"><?php echo $row2['order_qty']." item(s)";?></div>
                                                        <div class="col-md-1 col-12"></div>
                                                        <div class="col-md-4 col-12" style="color:#155660; font-size:12px; font-style:italic;"><?php echo $row2['order_status'];?></div><br>
                                                        <div class="col-md-9 col-12"></div>
                                                        <div class="col-md-2 col-6">Subtotal: &nbsp;</div>
                                                        <div align="right" class="col-md-1 col-6"><?php echo "₱".$sub_total;?></div>

                                                        <div class="col-md-9 col-12"></div>
                                                        <div class="col-md-2 col-6">Delivery Fee: &nbsp;</div>
                                                        <div align="right" class="col-md-1 col-6"><?php echo "₱".$row2['charge'];?></div>

                                                        <div class="col-md-7 col-12"></div>
                                                        <div class="col-md-2 col-12"></div>
                                                        <div class="col-md-2 col-6">Amount: &nbsp;</div>
                                                        <div align="right" class="col-md-1 col-6" style="font-size:20px; color:#155660;"><b><?php echo "₱".$order_total;?></b></div>
                                                        <br><br>
                                                        <div class="col-md-9 col-12"></div>
                                                        <div class="col-md-3 col-12" align="center">
                                                            <span style="font-style:italic; font-size:12px;">Product Returned</span>
                                                        </div>
                                                        <div class="border-top my-4"></div>
                                                    </div>
                                                    <?php    }
                	                                ?>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- End Table -->
    <!-- Footer -->
    <footer>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                &copy; Copyright <strong>eBusiness</strong>. All Rights Reserved
              </p>
            </div>
            <div class="credits">
              <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eBusiness
            -->
              Designed by <a href="#https://bootstrapmade.com/">BM</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

         <!-- The Log Out Modal  -->
        <div class="modal fade" id="logout" style="margin-top: 150px;">
            <div class="modal-dialog">
               <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                     <h4 class="modal-title">Log Out</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                     Are you sure you want to logout?
                  </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                     <a href="logout_session.php" id="button-loading-content" type="button" class="btn btn-primary">Yes</a>
                     <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                  </div>
               </div>
            </div>
         </div>
         <!-- end logout modal -->

         <!-- The Add Employee Modal  -->
        <div class="modal fade" id="account">
            <div class="modal-dialog">
               <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                     <h4 class="modal-title">Update My Account</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                      <div class="login_form1">
                     <form class="fill_up" action="" method="post" role="form">
                        <fieldset>
                           <?php
                                $query1 = mysqli_query($mysql, "select * from users u, users_customer uc where u.user_id=uc.user_id and uc.customer_id='$id_number';");
                                while($row1 = mysqli_fetch_array($query1)){
                                    ?>

                           <div class="field">
                              <label class="label_field">Username</label>
                              <input type="text" name="username" required value="<?php echo $row1['username'];?>" />
                              <input type="hidden" name="user_id" value="<?php echo $row1['user_id'];?>" />
                           </div>
                           <div class="field">
                              <label class="label_field">Password</label>
                              <input type="password" name="password" required value="<?php echo $row1['password'];?>" />
                           </div>
                           <div align="center">
                              <input style="margin:20px 40px 20px 40px;" name="upd_account" type="submit" class="btn btn-primary" value="Save" />
                              <button style="margin:20px 40px 20px 40px;;" type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                           </div>
                           <?php
                                }
                           ?>
                        </fieldset>
                     </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
         <!-- end Add Product modal -->

         <!-- The Add Employee Modal  -->
        <div class="modal fade" id="add_modal">
            <div class="modal-dialog">
               <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                     <h4 class="modal-title">Update My Personal Info</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                      <div class="login_form1">
                     <form class="fill_up" action="" method="post" role="form">
                        <fieldset>
                           <?php
                                $query1 = mysqli_query($mysql, "select * from customer where customer_id='$id_number';");
                                while($row1 = mysqli_fetch_array($query1)){
                                    ?>

                           <div class="field">
                              <label class="label_field">Customer ID</label>
                              <input type="text" name="upd_customer_id" readonly value="<?php echo $row1['customer_id'];?>" />

                           </div>
                           <div class="field">
                              <label class="label_field">Lastname</label>
                              <input type="text" name="upd_lname" value="<?php echo $row1['lname'];?>" required />
                           </div>
                           <div class="field">
                              <label class="label_field">Firstname</label>
                              <input type="text" name="upd_fname" value="<?php echo $row1['fname'];?>" required />
                           </div>
                           <div class="field">
                              <label class="label_field">Middlename</label>
                              <input type="text" name="upd_mname" value="<?php echo $row1['mname'];?>"  />
                           </div>
                           <div class="field">
                              <label class="label_field">Name Ext</label>
                              <input type="text" name="upd_ext" value="<?php echo $row1['ext'];?>"  />
                           </div>
                           <div class="field">
                              <label class="label_field">Street</label>
                              <input type="text" name="upd_street" value="<?php echo $row1['street'];?>" />
                           </div>
                           <div class="field">
                              <label class="label_field">Purok</label>
                              <input type="text" name="upd_purok" value="<?php echo $row1['purok'];?>" required />
                           </div>
                           <div class="field">
                              <label class="label_field">Barangay</label>
                              <input type="text" name="upd_brgy" value="<?php echo $row1['brgy'];?>" required />
                           </div>
                           <div class="field">
                              <label class="label_field">Town</label>
                              <input type="text" name="upd_town" value="<?php echo $row1['town'];?>" required />
                           </div>
                           <div class="field">
                              <label class="label_field">Region</label>
                              <input type="text" name="upd_region" value="<?php echo $row1['region'];?>" required />
                           </div>
                           <div class="field">
                              <label class="label_field">Contact</label>
                              <input type="text" name="upd_contact" value="<?php echo $row1['contact'];?>" required />
                           </div>
                           <div class="field">
                              <label class="label_field">Email Add</label>
                              <input type="text" name="upd_email" value="<?php echo $row1['email'];?>" />
                           </div>
                           <div align="center">
                              <input style="margin:20px 40px 20px 40px;" name="upd_customer" type="submit" class="btn btn-primary" value="Save" />
                              <button style="margin:20px 40px 20px 40px;;" type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                           </div>
                           <?php
                                }
                           ?>
                        </fieldset>
                     </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
         <!-- end Add Product modal -->


<!-- PASS VALUE TO MODAL -->


  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script>
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- fancy box js -->
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/jquery.fancybox.min.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <!-- calendar file css -->
      <script src="js/semantic.min.js"></script>
      <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Tables -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>
</body>

</html>
