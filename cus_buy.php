<?php
    session_start();
        require_once('connect.php');

        $user_log_id=$_SESSION["user_log_id"];
        $_SESSION["user_log_id"]=$user_log_id;
        $id_number=$_SESSION["id_number"];
        $_SESSION["id_number"]=$id_number;
        $fname=$_SESSION["fname"];
        $_SESSION["fname"]=$fname;

        $description=$_GET['description'];
        $product_id=$_GET['product_id'];
        $quantity=$_GET['quantity'];

        //echo $id_number;
        if(isset($_POST['upd_account'])){

            $query1 = mysqli_query($mysql, "update users set username='$_POST[username]', password='$_POST[password]' where user_id='$_POST[user_id]';");
        ?>
                <script>alert("Data successfully updated.");</script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=cus_product.php" />';
        } else if(isset($_POST['place_order'])){

            $query1 = mysqli_query($mysql, "insert into orders values('$_POST[order_id]',NOW(),'$quantity','$_POST[sub_total]','$_POST[charge]','$_POST[order_total]','For Processing - Waiting to accept order','$product_id','$id_number','$_POST[location_id]','');");
            $query3 = mysqli_query($mysql, "update count set orders='$_POST[order_count]';");


        ?>
                <script>alert("Data successfully added to orders.");</script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=cus_orders.php" />';

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

  <title>Lianga eShopping | <?php echo $product_name;?></title>
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

  <!-- =======================================================
  * Template Name: eBusiness - v4.7.0
  * Template URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <script src="autocomplete.js"></script>
  <link rel="stylesheet" href="autocomplete.css">
</head>

<body>

  <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex justify-content-between" style="margin-top: 10px;">
            <div class="logo" style="margin: 0 0 0 20px;">
                <h1><a href="cus_home.php">Lianga <span>e</span>Shopping</a></h1>
            </div>
            <div class="logo">
                        <div class="input-group custom-search-form">
                            <form action="cus_result.php" method="post" role="form">
                                <input type="text" id="display" name="product" class="form-control" placeholder="Search..." value="<?php echo (isset($_POST['search_button']) ? $_POST['product'] : '') ?>">
                                <span class="input-group-btn">
                                    <button type="submit" name="search_button" class="btn btn-default" >
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </form>
                        </div>
            </div>
            <script type="text/javascript">
            	// (C) ATTACH AUTOCOMPLETE TO INPUT FIELD
                ac.attach({
                  target: document.getElementById("display"),
                  data: "2b-search.php",
                });
            </script>
        </div>
            <nav id="navbar" class="navbar" style="margin: 0 20px 0 0;">
        <ul>
          <li><a href="cus_home.php">Home</a></li>
          <li><a href="cus_cart.php">My Cart</a></li>
          <li><a href="cus_orders.php">My Orders</a></li>
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
    </header><!-- End Header -->

  <form name=form1 action="" method="post">
  <main id="main">
                                        <style>
                                            .zoom {
                                                transition: transform .2s; /* Animation */
                                                margin: 0 auto;
                                                width: 40px; /* width of container */
                                                height: 40px; /* height of container */
                                                object-fit: contain;
                                            }
                                            .zoom:hover {
                                                transition: transform .5s ease;
                                                transform: scale(2.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
                                                position:relative;
                                                z-index:2;
                                            }
                                       </style>
                        <?php
                            $qry2 = mysqli_query($mysql, "select * from count;");
                            $row2 = mysqli_fetch_array($qry2);
                            $count2 = $row2['orders'] + 1;
                            $add2 = 70000 + $count2;
                            $id2 = "ORDE-".$add2;

                            $qry3 = mysqli_query($mysql, "select * from customer c, product p, location l where c.brgy=l.pickup and c.customer_id='$id_number' and p.product_id='$product_id';");
                            $row3 = mysqli_fetch_array($qry3);
                            $address = $row3['street']." ".$row3['purok']." ".$row3['brgy'].", ".$row3['town'].", ".$row3['region'];
                            $name = $row3['fname']." ".$row3['lname'];
                            $price = $row3['price'];
                            $charge = $row3['charge'];
                            $sub_total = $price * $quantity;
                            $order_total = $sub_total + $charge;
                            $contact = $row3['contact'];
                            $location_id = $row3['location_id'];
                        ?>

                        <!-- All Products -->
                        <div class="col-md-12" style="margin-top:80px;">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Buy Product(s)</h2>
                                 </div>
                              </div>
                            <input type="hidden" name="order_count" value="<?php echo $count2;?>" />
                            <input type="hidden" name="order_id" value="<?php echo $id2;?>" />
                            <input type="hidden" name="sub_total" value="<?php echo $sub_total;?>" />
                            <input type="hidden" name="charge" value="<?php echo $charge;?>" />
                            <input type="hidden" name="order_total" value="<?php echo $order_total;?>" />
                            <input type="hidden" name="location_id" value="<?php echo $location_id;?>" />
                              <div class="full gallery_section_inner padding_infor_info">
                                 <div class="row">
                                     <h6><i class="fa fa-map-marker fa-fw fa-sm"></i> Delivery Address</h6>
                                     <p><b><?php echo $name." | ".$contact;?></b><?php echo " - ".$address;?></p>
                                 </div>
                                 <div class="border-top my-3"></div>
                                 <div class="row">
                                     <h6>Products Ordered</h6>
                                     <div class="col-md-1 col-2"><img class="zoom" style="margin: 0 10px 0 10px;" src="<?php echo "upload/".$row3['image'];?>"></div>
                                     <div class="col-md-5 col-10"><?php echo $description;?></div>
                                     <div class="col-md-1 col-6"><?php echo "₱".$price;?></div>
                                     <div align="right" class="col-md-1 col-6"><?php echo $quantity." item(s)";?></div>
                                     <div class="col-md-1 col-12"></div><br>
                                     <div class="col-md-2 col-6">Subtotal: &nbsp;</div>
                                     <div align="right" class="col-md-1 col-6"><?php echo "₱".$sub_total;?></div>

                                     <div class="col-md-9 col-12"></div>
                                     <div class="col-md-2 col-6">Delivery Fee: &nbsp;</div>
                                     <div align="right" class="col-md-1 col-6"><?php echo "₱".$charge;?></div>
                                     <div class="col-md-9 col-12"></div>
                                     <div class="col-md-2 col-6">Order Total: &nbsp;</div>
                                     <div align="right" class="col-md-1 col-6"><b><?php echo "₱".$order_total;?></b></div>
                                 </div>
                                 <div class="border-top my-4"></div>
                                 <div class="row">
                                     <h6>Payment Method</h6>
                                     <div class="col-md-9 col-12"></div>
                                     <div align="center" class="col-md-3 col-12"><p class="note_cont" style="height:35px; padding:5px 0 5px 0; margin:0 0 20px 0;">Cash on Delivery</p></div>
                                     <div class="col-md-9 col-12"></div>
                                     <div class="col-md-2 col-7">Merchandise Subtotal: &nbsp;</div>
                                     <div align="right" class="col-md-1 col-5"><?php echo "₱".$sub_total;?></div>
                                     <div class="col-md-9 col-12"></div>
                                     <div class="col-md-2 col-7">Delivery Fee Subtotal: &nbsp;</div>
                                     <div align="right" class="col-md-1 col-5"><?php echo "₱".$charge;?></div>
                                     <div class="col-md-9 col-12"></div>
                                     <div class="col-md-2 col-7" style="color:#155660;"><b>Total Payment: &nbsp;</b></div>
                                     <div align="right" class="col-md-1 col-5" style="font-size:20px; color:#155660;"><b><?php echo "₱".$order_total;?></b></div>
                                 </div>
                              </div>
                           </div>
                        </div>
    <header id="header" class="fixed-bottom d-flex align-items-center" style="background:#FFF; opacity:.90;">
        <div class="container d-flex justify-content-between">
          <div class="col-md-11 col-7" align="right" style="font-size:20px; color:#155660;">
            <div style="font-size:14px;">Total Payment:</div>
            &nbsp;<b><div id=msg1 style="float:right;"><?php echo "₱".$order_total;?></div></b>
          </div>
          <div align="left" class="col-md-1 col-5">
            <button class="btn btn-primary btn-lg" name="place_order" type="submit" data-toggle="tooltip" data-placement="top" title="Place Order">Place Order</button>
          </div>
        </div>
    </header>
  </main>
  </form>

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


<!-- The Modal -->
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
         <!-- end model popup -->

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
<script src="jquery-3.3.1.min.js"></script>
<script src="bootstrap.min.js"></script>

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
</body>

</html>