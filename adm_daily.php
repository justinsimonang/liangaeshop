<?php
    session_start();
        require_once('connect.php');
        $user_log_id=$_SESSION["user_log_id"];
        $_SESSION["user_log_id"]=$user_log_id;
        $id_number=$_SESSION["id_number"];
        $_SESSION["id_number"]=$id_number;
        $username=$_SESSION["username"];
        $_SESSION["username"]=$username;
        //echo $username;

        if(isset($_POST['add_cart'])) {

            $query1 = mysqli_query($mysql, "insert into cart values('$_POST[add_cart_id]',NOW(),'$_POST[add_status]','$_POST[add_customer_id]','$_POST[add_product_id]');");
            $query2 = mysqli_query($mysql, "update count set cart='$_POST[cart_count]';");
        ?>
                    <script type="text/javascript">
                        alert("Data successfully added to database");
                    </script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=adm_cart.php" />';

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

  <title>Lianga eShopping | Admin - Cart</title>
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
        <h1><a href="adm_home.php">Lianga <span>e</span>Shopping</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="adm_home.php">Home</a></li>
          <li class="dropdown"><a href="#"><span>Data Entry</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="adm_category.php">Category</a></li>
              <li><a href="adm_location.php">Location</a></li>
              <li><a href="adm_product.php">Product</a></li>
              <li><a href="adm_employee.php">Employee</a></li>
              <li><a href="adm_customer.php">Customer</a></li>
              <li><a href="adm_supplier.php">Supplier</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Monitoring</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="adm_cart.php">Cart</a></li>
              <li><a href="adm_order.php">Order</a></li>
              <li><a href="adm_inventory.php">Inventory</a></li>
            </ul>
          </li>
          <li class="dropdown"><a class="nav-link scrollto active" href="#"><span>Sales Report</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Daily Report</a></li>
              <li><a href="adm_monthly.php">Monthly Report</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>User</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="adm_users.php">List of Users</a></li>
              <li><a href="adm_log.php">Log History</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Hi <?php echo $username;?></span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="" data-toggle="modal" data-target="#logout">Log Out</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

   <!-- Body -->
                        <!-- Table Section - -->
                        <div class="col-md-12" style="margin-top:80px;">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                     <h2>Daily Sales Report</h2>
                                 </div>
                              </div>
                                        <div class="tabbar padding_infor_info">
                                             <nav>
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                   <a class="nav-item nav-link active" id="nav-sales-tab" data-toggle="tab" href="#nav-sales" role="tab" aria-controls="nav-sales" style="font-weight:bold;" aria-selected="true">Sales Report</a>
                                                   <a class="nav-item nav-link" id="nav-summary-tab" data-toggle="tab" href="#nav-summary" role="tab" aria-controls="nav-summary" style="font-weight:bold;" aria-selected="false">Summary Report</a>
                                                </div>
                                             </nav>
                                             <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="nav-sales" role="tabpanel" aria-labelledby="nav-sales-tab">

                                                        <form action="" method="post" role="form">
                                                    <div class="col-md-12 col-xs-12" align="center">
                                                            Select date:
                                                            <input type="date" name="date_report" required />
                                                    </div><br>
                                                    <div class="col-md-12 col-xs-12" align="center">
                                                            <input type="submit" name="submit_date" class="btn btn-primary" value="Generate Report" />
                                                    </div><br><br>
                                                        </form>
                                                    <?php
                                                    if(isset($_POST['submit_date'])) {
                                                          $date = date($_POST['date_report']);
                                                          $now = date("M d, Y", strtotime("+$date"));
                                                    ?>
                                                        <div class="col-md-12 col-xs-12" align="center"><h4>SALES REPORT AS OF <?php echo $now;?></h4></div>
                                                        <span style="color:#FF0000; font-style:italic; font-size:12px;">Note: Hub profit = 5% of product price/income</span>

                                                        <div class="table-responsive-sm">
                                                            <table class="table table-bordered">
                                                               <thead style="text-align:center; background-color:#EEEEEE">
                                                                  <tr style="color:#000099; font-weight:bold;">
                                                                     <td rowspan=2>Product</td>
                                                                     <td colspan=2>Price</td>
                                                                     <td rowspan=2>Quantity</td>
                                                                     <td colspan=3>Income</td>
                                                                     <td rowspan=2>Hub Profit</td>
                                                                  </tr>
                                                                  <tr style="color:#000099; font-weight:bold;">
                                                                     <td>Supplier</td>
                                                                     <td>Hub</td>
                                                                     <td>Supplier</td>
                                                                     <td>Hub</td>
                                                                     <td>Delivery</td>
                                                                  </tr>
                                                               </thead>

                                                               <tbody>

                                                                   <?php
                                                                        $total_sup_price = 0;
                                                                        $total_hub_price = 0;
                                                                        $total_order_qty = 0;
                                                                        $total_sup_income = 0;
                                                                        $total_hub_income = 0;
                                                                        $total_delivery = 0;
                                                                        $total_hub_profit = 0;
                                                                        $qry2 = mysqli_query($mysql, "select *,o.quantity as order_qty from orders o, product p where o.product_id=p.product_id and cast(o.date_completed as Date) = '$_POST[date_report]' and o.status like '%Complete%';");
                                                                        $num_rows = mysqli_num_rows($qry2);
                                                                        if($num_rows == 0) {
                                                                            ?>
                                                                            <tr>
                                                                                <td colspan=8 align="center">No record found</td>
                                                                            </tr>
                                                                            <?php
                                                                        }
                                                                        while($row2 = mysqli_fetch_array($qry2))
                                                                		{
                                                                		    $hub_profit = $row2['price'] * 0.05;
                                                                            $supplier_price = $row2['price'] - $hub_profit;

                                                                            $hub_profit_income = $row2['total'] * 0.05;
                                                                            $supplier_income = $row2['total'] - $hub_profit_income;

                                                                            $total_sup_price += $supplier_price;
                                                                            $total_hub_price += $row2['price'];
                                                                            $total_order_qty += $row2['order_qty'];
                                                                            $total_sup_income += $supplier_income;
                                                                            $total_hub_income += $row2['total'];
                                                                            $total_delivery += $row2['charge'];
                                                                            $total_hub_profit += $hub_profit_income;
                                	                                ?>
                                                                  <tr class="odd gradeX">
                                                                    <td><?php echo $row2['description'];?></td>
                                                                    <td align="right"><?php echo "₱".$supplier_price;?></td>
                                                                    <td align="right"><?php echo "₱".$row2['price'];?></td>
                                                                    <td align="center"><?php echo $row2['order_qty']." item(s)";?></td>
                                                                    <td align="right"><?php echo "₱".$supplier_income;?></td>
                                                                    <td align="right"><?php echo "₱".$row2['total'];?></td>
                                                                    <td align="right"><?php echo "₱".$row2['charge'];?></td>
                                                                    <td align="right"><?php echo "₱".$hub_profit_income;?></td>

                                                                  </tr>
                                                                  <?php } ?>
                                                                  <tr class="odd gradeX" style="color:#000099; font-weight:bold;">
                                                                    <td colspan=3 align="right" style="font-weight:bold;">GRAND TOTAL</td>
                                                                    <td align="center"><?php echo $total_order_qty." item(s)";?></td>
                                                                    <td align="right"><?php echo "₱".$total_sup_income;?></td>
                                                                    <td align="right"><?php echo "₱".$total_hub_income;?></td>
                                                                    <td align="right"><?php echo "₱".$total_delivery;?></td>
                                                                    <td align="right"><?php echo "₱".$total_hub_profit;?></td>

                                                                  </tr>
                                                               </tbody>
                                                            </table>
                                                         </div>
                                                    <?php
                                                    } else {
                                                            date_default_timezone_set("Asia/Manila");
                                                            $now = date("M d, Y");

                                                    ?>
                                                        <div class="col-md-12 col-xs-12" align="center"><h4>SALES REPORT AS OF <?php echo $now;?></h4></div>
                                                        <span style="color:#FF0000; font-style:italic; font-size:12px;">Note: Hub profit = 5% of product price/income</span>

                                                        <div class="table-responsive-sm">
                                                            <table class="table table-bordered">
                                                               <thead style="text-align:center; background-color:#EEEEEE">
                                                                  <tr style="color:#000099; font-weight:bold;">
                                                                     <td rowspan=2>Product</td>
                                                                     <td colspan=2>Price</td>
                                                                     <td rowspan=2>Quantity</td>
                                                                     <td colspan=3>Income</td>
                                                                     <td rowspan=2>Hub Profit</td>
                                                                  </tr>
                                                                  <tr style="color:#000099; font-weight:bold;">
                                                                     <td>Supplier</td>
                                                                     <td>Hub</td>
                                                                     <td>Supplier</td>
                                                                     <td>Hub</td>
                                                                     <td>Delivery</td>
                                                                  </tr>
                                                               </thead>

                                                               <tbody>

                                                                   <?php
                                                                        $total_sup_price = 0;
                                                                        $total_hub_price = 0;
                                                                        $total_order_qty = 0;
                                                                        $total_sup_income = 0;
                                                                        $total_hub_income = 0;
                                                                        $total_delivery = 0;
                                                                        $total_hub_profit = 0;
                                                                        $qry2 = mysqli_query($mysql, "select *,o.quantity as order_qty from orders o, product p where o.product_id=p.product_id and cast(o.date_completed as Date) = cast(NOW() as Date) and o.status like '%Complete%';");
                                                                		while($row2 = mysqli_fetch_array($qry2))
                                                                		{

                                                                		    $hub_profit = $row2['price'] * 0.05;
                                                                            $supplier_price = $row2['price'] - $hub_profit;

                                                                            $hub_profit_income = $row2['total'] * 0.05;
                                                                            $supplier_income = $row2['total'] - $hub_profit_income;

                                                                            $total_sup_price += $supplier_price;
                                                                            $total_hub_price += $row2['price'];
                                                                            $total_order_qty += $row2['order_qty'];
                                                                            $total_sup_income += $supplier_income;
                                                                            $total_hub_income += $row2['total'];
                                                                            $total_delivery += $row2['charge'];
                                                                            $total_hub_profit += $hub_profit_income;
                                	                                ?>
                                                                  <tr class="odd gradeX">
                                                                    <td><?php echo $row2['description'];?></td>
                                                                    <td align="right"><?php echo "₱".$supplier_price;?></td>
                                                                    <td align="right"><?php echo "₱".$row2['price'];?></td>
                                                                    <td align="center"><?php echo $row2['order_qty']." item(s)";?></td>
                                                                    <td align="right"><?php echo "₱".$supplier_income;?></td>
                                                                    <td align="right"><?php echo "₱".$row2['total'];?></td>
                                                                    <td align="right"><?php echo "₱".$row2['charge'];?></td>
                                                                    <td align="right"><?php echo "₱".$hub_profit_income;?></td>

                                                                  </tr>
                                                                  <?php } ?>
                                                                  <tr class="odd gradeX" style="color:#000099; font-weight:bold;">
                                                                    <td colspan=3 align="right" style="font-weight:bold;">GRAND TOTAL</td>
                                                                    <td align="center"><?php echo $total_order_qty." item(s)";?></td>
                                                                    <td align="right"><?php echo "₱".$total_sup_income;?></td>
                                                                    <td align="right"><?php echo "₱".$total_hub_income;?></td>
                                                                    <td align="right"><?php echo "₱".$total_delivery;?></td>
                                                                    <td align="right"><?php echo "₱".$total_hub_profit;?></td>

                                                                  </tr>
                                                               </tbody>
                                                            </table>
                                                         </div>
                                                    <?php
                                                    }
                                                    ?>

                                                </div>
                                                <div class="tab-pane fade" id="nav-summary" role="tabpanel" aria-labelledby="nav-summary-tab">
                                                   <p>---</p>
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
        <div class="modal fade" id="add_modal">
            <div class="modal-dialog">
               <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                     <h4 class="modal-title">Add Cart</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                      <div class="login_form1">
                     <form action="" method="post" role="form">
                        <fieldset>
                            <?php
                                $qry1 = mysqli_query($mysql, "select * from count;");
                                $row1 = mysqli_fetch_array($qry1);
                                $count1 = $row1['cart'] + 1;
                                $add1 = 60000 + $count1;
                                $id = "CART-".$add1;
                            ?>
                            <input type="hidden" name="cart_count" readonly value="<?php echo $count1;?>" />
                           <div class="field">
                              <label class="label_field">Cart ID</label>
                              <input type="text" name="add_cart_id" readonly value="<?php echo $id;?>" />

                           </div>
                           <div class="field">
                              <label class="label_field">Status</label>
                              <input type="text" name="add_status" placeholder="Cart Status" required />
                           </div>
                           <div class="field">
                              <label class="label_field">Customer ID</label>
                              <input type="text" name="add_customer_id" placeholder="Customer ID" required />
                           </div>
                           <div class="field">
                              <label class="label_field">Product ID</label>
                              <input type="text" name="add_product_id" placeholder="Product ID" required />
                           </div>
                           <div align="center">
                              <input style="margin:20px 40px 20px 40px;" name="add_cart" type="submit" class="btn btn-primary" value="Add" />
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
