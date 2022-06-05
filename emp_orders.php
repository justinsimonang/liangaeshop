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
                echo '<meta http-equiv="refresh" content="0;url=emp_product.php" />';
        } else if(isset($_POST['confirm_product'])) {

            $query=mysqli_query($mysql, "update orders set status='Transaction Completed', date_completed=NOW() where order_id='$_POST[order_id]';");

            $query4 = mysqli_query($mysql, "select * FROM monitoring WHERE product_id = '$_POST[product_id]' AND
                                            date_time = (select max(date_time) from monitoring where product_id = '$_POST[product_id]');");
            $row4 = mysqli_fetch_array($query4);
            $sold = $row4['sold'] + $_POST['quantity'];
            $stock = $row4['stock'] - $_POST['quantity'];

            $qry1 = mysqli_query($mysql, "select * from count;");
            $row1 = mysqli_fetch_array($qry1);
            $count = $row1['monitoring'] + 1;
            $add = 80000 + $count;
            $monitoring_id = "MONI-".$add;

            //Insert new Monitoring data
            $query5 = mysqli_query($mysql, "insert into monitoring values('$monitoring_id','$_POST[product_id]','$_POST[order_id]','$_POST[customer_id]',
                        NOW(),'buy','$_POST[quantity]','$sold','$stock','Still available');");
            //Update Monitoring account
            $query6 = mysqli_query($mysql, "update count set monitoring='$count';");
        ?>
                <script>alert("Transaction successfully completed.");</script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=emp_orders.php" />';
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

  <title>Lianga eShopping | Employee - Product</title>
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
        <h1><a href="emp_home.php">Lianga <span>e</span>Shopping</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="emp_home.php">Home</a></li>
          <li class="dropdown"><a href="#"><span>Data Entry</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="emp_category.php">Category</a></li>
              <li><a href="emp_location.php">Location</a></li>
              <li><a href="emp_product.php">Product</a></li>
              <li><a href="emp_supplier.php">Supplier</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto active" href="#">Orders</a></li>
          <li class="dropdown"><a href="#"><span>Hi <?php echo $fname;?></span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="emp_personal.php">Personal Info</a></li>
              <li><a href="" data-toggle="modal" data-target="#account">Update Account</a></li>
              <li style="color:#FFFFFF;"><a href="" data-toggle="modal" data-target="#logout">Log Out</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

   <!-- Body -->                     <style>
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
                                     <h2>Orders</h2>
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
                                                    $qry1 = mysqli_query($mysql,"select count(*) as to_process from orders where status like 'For Process%';");
                                                    $row1 = mysqli_fetch_array($qry1); if($row1['to_process'] > 0) { $to_process = "(".$row1['to_process'].")"; }
                                                    $qry2 = mysqli_query($mysql,"select count(*) as to_deliver from orders where status like 'For Deliver%';");
                                                    $row2 = mysqli_fetch_array($qry2); if($row2['to_deliver'] > 0) { $to_deliver = "(".$row2['to_deliver'].")"; }
                                                    $qry3 = mysqli_query($mysql,"select count(*) as to_receive from orders where status like '%Receiv%';");
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
                                                        $qry2 = mysqli_query($mysql, "select *,o.quantity as order_qty,o.status as order_status from product p, orders o, location l where p.product_id=o.product_id and o.location_id=l.location_id and o.status like 'For Process%' order by o.date_time desc;");
                                                        $num_rows2 = mysqli_num_rows($qry2);
                                                        if($num_rows2 == 0) { ?>
                                                        <br><br><br><br><br>
                                                        <div class="row" align="center">
                                                            <div class="col-md-12 col-12">No orders available</div>
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
                                                        <div class="col-md-4 col-12" style="color:#155660; font-size:12px; font-style:italic;"><?php echo $row2['order_status'];?></div>

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
                                                            <a href="delete_data.php?id=<?php echo $row2['order_id']; ?>&name=process101">
                                                            <button class="btn btn-primary btn-md" type="button" data-toggle="tooltip" data-placement="top" title="Accept Order">Accept Order</button> </a>
                                                                <?php
                                                            } else {
                                                                ?>
                                                            <form action="update_status.php" method="post" role="form">
                                                                <select name="status" required>
                                                                    <option value="" selected disabled hidden> - Choose Status - </option>
                                                                    <option value="For Processing - Item has been picked up from supplier">Picked up from supplier</option>
                                                                    <option value="For Processing - Item has already packaged">Item Packaged</option>
                                                                    <option value="For Processing - Pending due to out-of-stock">Out-of-Stock</option>
                                                                    <option value="For Delivery - Preparing the packages to be delivered">For Delivery</option>
                                                                </select>
                                                                <input type="hidden" name="order_id" value="<?php echo $row2['order_id']; ?>" />
                                                                <input type="submit" name="update_status" class="btn btn-primary btn-sm" />
                                                            </form>
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
                                                        $qry2 = mysqli_query($mysql, "select *,o.quantity as order_qty,o.status as order_status from product p, orders o, location l where p.product_id=o.product_id and o.location_id=l.location_id and o.status like 'For Deliver%' order by o.date_time desc;");
                                                        $num_rows2 = mysqli_num_rows($qry2);
                                                        if($num_rows2 == 0) { ?>
                                                        <br><br><br><br><br>
                                                        <div class="row" align="center">
                                                            <div class="col-md-12 col-12">No orders available</div>
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
                                                        <div class="col-md-4 col-12" style="color:#155660; font-size:12px; font-style:italic;"><?php echo $row2['order_status'];?></div>

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
                                                            $query = mysqli_query($mysql, "select * from location where location_id='$row2[location_id]';");
                                                            $row = mysqli_fetch_array($query);
                                                            date_default_timezone_set("Asia/Manila");
                                                            $now = date("Y-m-d H:i:s");
                                                            $minutes = $row['travel_time'];
                                                            $arrival =  date("h:i A", strtotime("+$minutes minutes $now"));
                                                            $status1 = "For Delivery - Item will arrived at ".$arrival;
                                                            $status2 = "For Receiving Order - On-the-way arrival at ".$arrival;
                                                                ?>
                                                            <form action="update_status.php" method="post" role="form">
                                                                <select name="status" required>
                                                                    <option value="" selected disabled hidden> - Choose Status - </option>
                                                                    <option value="<?php echo $status1;?>">Preparing to Depart</option>
                                                                    <option value="For Delivery - Delivery not available as of this moment">Delivery not Available</option>
                                                                    <option value="<?php echo $status2;?>">For Receive</option>
                                                                </select>
                                                                <input type="hidden" name="order_id" value="<?php echo $row2['order_id']; ?>" />
                                                                <input type="submit" name="update_status" class="btn btn-primary btn-sm" />
                                                            </form>
                                                        </div>
                                                        <div class="border-top my-4"></div>
                                                    </div>
                                                    <?php    }
                	                                ?>
                                                </div>
                                                <div class="tab-pane fade" id="nav-receive" role="tabpanel" aria-labelledby="nav-receive-tab">
                                                   <?php
                                                        $qry2 = mysqli_query($mysql, "select *,o.quantity as order_qty,o.status as order_status from product p, orders o, location l, customer c where p.product_id=o.product_id and o.location_id=l.location_id and c.customer_id=o.customer_id and o.status like '%Receiv%' order by o.date_time desc;");
                                                        $num_rows2 = mysqli_num_rows($qry2);
                                                        if($num_rows2 == 0) { ?>
                                                        <br><br><br><br><br>
                                                        <div class="row" align="center">
                                                            <div class="col-md-12 col-12">No orders available</div>
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
                                                        <div class="col-md-4 col-12" style="color:#155660; font-size:12px; font-style:italic;"><?php echo $row2['order_status'];?></div>

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
                                                            $query = mysqli_query($mysql, "select * from location where location_id='$row2[location_id]';");
                                                            $row = mysqli_fetch_array($query);
                                                            date_default_timezone_set("Asia/Manila");
                                                            $now = date("Y-m-d H:i:s");
                                                            $minutes = $row['travel_time'];
                                                            $arrival =  date("h:i A", strtotime("+$minutes minutes $now"));
                                                            $status2 = "For Receiving Order - On-the-way arrival at ".$arrival;
                                                            $qry3 = mysqli_query($mysql, "select * from orders where order_id='$row2[order_id]' and status like 'Order Rec%';");
                                                            $count_rows = mysqli_num_rows($qry3);
                                                            if($count_rows >= 1) {
                                                                ?>
                                                            <form action="" method="post" role="form">
                                                                <input type="hidden" name="product_id" value="<?php echo $row2['product_id'];?>" />
                                                                <input type="hidden" name="order_id" value="<?php echo $row2['order_id'];?>" />
                                                                <input type="hidden" name="customer_id" value="<?php echo $row2['customer_id'];?>" />
                                                                <input type="hidden" name="quantity" value="<?php echo $row2['order_qty'];?>" />
                                                                <input type="submit" class="btn btn-primary btn-md" name="confirm_product" value="Confirm Payment" />
                                                            </form>
                                                                <?php
                                                            } else {
                                                                ?>
                                                            <form action="update_status.php" method="post" role="form">
                                                                <select name="status" required>
                                                                    <option value="" selected disabled hidden> - Choose Status - </option>
                                                                    <option value="For Receiving Order - Pending, receiver unattended/unlocated">Receiver Unlocated</option>
                                                                    <option value="<?php echo $status2; ?>">For Delivery</option>
                                                                </select>
                                                                <input type="hidden" name="order_id" value="<?php echo $row2['order_id']; ?>" />
                                                                <input type="submit" name="update_status" class="btn btn-primary btn-sm" />
                                                            </form>
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
                                                        $qry2 = mysqli_query($mysql, "select *,o.quantity as order_qty,o.status as order_status from product p, orders o, location l where p.product_id=o.product_id and o.location_id=l.location_id and o.status like '%Complete%' order by o.date_time desc;");
                                                        $num_rows2 = mysqli_num_rows($qry2);
                                                        if($num_rows2 == 0) { ?>
                                                        <br><br><br><br><br>
                                                        <div class="row" align="center">
                                                            <div class="col-md-12 col-12">No orders available</div>
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
                                                        <div class="col-md-4 col-12" style="color:#155660; font-size:12px; font-style:italic;"><?php echo $row2['order_status'];?></div>

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
                                                            <form action="update_status.php" method="post" role="form">
                                                                <select name="status" required>
                                                                    <option value="" selected disabled hidden> - Choose Status - </option>
                                                                    <option value="Transaction Completed - Item(s) returned and replaced">Return and Replace</option>
                                                                </select>
                                                                <input type="hidden" name="order_id" value="<?php echo $row2['order_id']; ?>" />
                                                                <input type="submit" name="update_status" class="btn btn-primary btn-sm" />
                                                            </form>
                                                        </div>
                                                        <div class="border-top my-4"></div>
                                                    </div>
                                                    <?php    }
                	                                ?>
                                                </div>
                                                <div class="tab-pane fade" id="nav-cancel" role="tabpanel" aria-labelledby="nav-cancel-tab">
                                                   <?php
                                                        $qry2 = mysqli_query($mysql, "select *,o.quantity as order_qty,o.status as order_status from product p, orders o, location l where p.product_id=o.product_id and o.location_id=l.location_id and o.status like '%Cancel%' order by o.date_time desc;");
                                                        $num_rows2 = mysqli_num_rows($qry2);
                                                        if($num_rows2 == 0) { ?>
                                                        <br><br><br><br><br>
                                                        <div class="row" align="center">
                                                            <div class="col-md-12 col-12">No orders available</div>
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
                                                        <div class="col-md-4 col-12" style="color:#155660; font-size:12px; font-style:italic;"><?php echo $row2['order_status'];?></div>

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
                                                            <span style="font-style:italic; font-size:12px;">Order Cancelled</span>
                                                        </div>
                                                        <div class="border-top my-4"></div>
                                                    </div>
                                                    <?php    }
                	                                ?>
                                                </div>
                                                <div class="tab-pane fade" id="nav-return" role="tabpanel" aria-labelledby="nav-return-tab">
                                                   <?php
                                                        $qry2 = mysqli_query($mysql, "select *,o.quantity as order_qty,o.status as order_status from product p, orders o, location l where p.product_id=o.product_id and o.location_id=l.location_id and o.status like '%Return%' order by o.date_time desc;");
                                                        $num_rows2 = mysqli_num_rows($qry2);
                                                        if($num_rows2 == 0) { ?>
                                                        <br><br><br><br><br>
                                                        <div class="row" align="center">
                                                            <div class="col-md-12 col-12">No orders available</div>
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
                                                        <div class="col-md-4 col-12" style="color:#155660; font-size:12px; font-style:italic;"><?php echo $row2['order_status'];?></div>

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
                                                            <span style="font-style:italic; font-size:12px;">Order Returned</span>
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

         <!-- The Add Product Modal  -->
        <div class="modal fade" id="add_modal">
            <div class="modal-dialog">
               <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                     <h4 class="modal-title">Add Product</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                      <div class="login_form1">
                     <form action="add_data.php" method="post" role="form" enctype="multipart/form-data">
                        <fieldset>
                            <?php
                                $qry1 = mysqli_query($mysql, "select * from count;");
                                $row1 = mysqli_fetch_array($qry1);
                                $count = $row1['product'] + 1;
                                $add = 20000 + $count;
                                $id = "PROD-".$add;
                            ?>
                            <input type="hidden" name="pro_count" readonly value="<?php echo $count;?>" />
                           <div class="field">
                              <label class="label_field">Product ID</label>
                              <input type="text" name="add_product_id" readonly value="<?php echo $id;?>" />

                           </div>
                           <div class="field">
                              <label class="label_field">Category</label>
                              <select name="add_category" style="margin-left:55px; height:30px;" required>
                                  <option value="" selected disabled hidden> - Choose Category - </option>
                                  <?php
                                    $qry4 = mysqli_query($mysql, "select * from category;");
                                    while($row4 = mysqli_fetch_array($qry4))
                                    { ?>
                                  <option value="<?php echo $row4['category_id']?>"><?php echo $row4['category'];?></option>
                                  <?php } ?>
                              </select>
                           </div>
                           <div class="field">
                              <label class="label_field">Serial</label>
                              <input type="text" name="add_serial" placeholder="Serial Number" required />
                           </div>
                           <div class="field">
                              <label class="label_field">Name</label>
                              <input type="text" name="add_name" placeholder="Product Name" required />
                           </div>
                           <div class="field">
                              <label class="label_field">Description</label>
                              <input type="text" name="add_description" placeholder="Product Desription" required />
                           </div>
                           <div class="field">
                              <label class="label_field">Price</label>
                              <input type="number" min=1 name="add_price" placeholder="Price" required />
                           </div>
                           <div class="field">
                              <label class="label_field">Quantity</label>
                              <input type="number" min=1 name="add_quantity" placeholder="Product Quantity" required />
                           </div>
                           <div class="field">
                              <label class="label_field">Brand</label>
                              <input type="text" name="add_brand" placeholder="Brand Name" />
                           </div>
                           <div class="field">
                              <label class="label_field">Supplier</label>
                              <select name="add_supplier" style="margin-left:55px; height:30px;" required>
                                  <option value="" selected disabled hidden> - Choose Supplier - </option>
                                  <?php
                                    $qry3 = mysqli_query($mysql, "select * from supplier;");
                                    while($row3 = mysqli_fetch_array($qry3))
                                    { ?>
                                  <option title="<?php echo $row3['store'];?>"value="<?php echo $row3['supplier_id']?>"><?php echo $row3['fname']." ".$row3['lname'];?></option>
                                  <?php } ?>
                              </select>
                           </div>
                           <div class="field">
                              <label class="label_field">Status</label>
                              <input type="text" name="add_status" placeholder="Status" />
                           </div>
                           <div class="field">
                              <label class="label_field">Image</label>
                              <input type="file" name="fileToUpload" id="fileToUpload" required />
                           </div>
                           <div align="center">
                              <input style="margin:20px 40px 20px 40px;" name="emp_product" type="submit" class="btn btn-primary" value="Add" />
                              <button style="margin:20px 40px 20px 40px;;" type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                           </div>
                           <div align="center">
                              <input type="reset" class="btn btn-light" value="Clear Form" />
                           </div>
                        </fieldset>
                     </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
         <!-- end Add Product modal -->

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
                                $query1 = mysqli_query($mysql, "select * frOm users u, users_employee ue where u.user_id=ue.user_id and ue.employee_id='$id_number';");
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
