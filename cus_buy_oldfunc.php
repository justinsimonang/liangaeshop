<?php
    session_start();
        require_once('connect.php');
        $product_name = $_GET['name'];
        $product_id = $_GET['id'];

        $user_log_id=$_SESSION["user_log_id"];
        $_SESSION["user_log_id"]=$user_log_id;
        $id_number=$_SESSION["id_number"];
        $_SESSION["id_number"]=$id_number;
        $fname=$_SESSION["fname"];
        $_SESSION["fname"]=$fname;

        //echo $id_number;
        if(isset($_POST['upd_account'])){

            $query1 = mysqli_query($mysql, "update users set username='$_POST[username]', password='$_POST[password]' where user_id='$_POST[user_id]';");
        ?>
                <script>alert("Data successfully updated.");</script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=cus_product.php" />';
        } else if(isset($_POST['buy_product'])){

            $query1 = mysqli_query($mysql, "insert into orders values('$_POST[ord_id]',NOW(),'$_POST[quantity]','$_POST[total_price]','$_POST[charge]','$_POST[total_payment]','For Review','$product_id','$id_number','$_POST[location_id]');");
            $query3 = mysqli_query($mysql, "update count set orders='$_POST[ord_count]';");

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
            $query5 = mysqli_query($mysql, "insert into monitoring values('$monitoring_id','$_POST[product_id]','$_POST[ord_id]','$id_number',
                        NOW(),'buy','$_POST[quantity]','$sold','$stock','Still available');");
            //Update Monitoring account
            $query6 = mysqli_query($mysql, "update count set monitoring='$count';");
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

  <main id="main">
                        <!-- All Products -->
                        <div class="col-md-12" style="margin-top:80px;">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2><?php echo $product_name;?></h2>
                                 </div>
                              </div>
                              <div class="full gallery_section_inner padding_infor_info">
                                 <div class="row">
                                  <!-- single-well start-->
                                  <?php
                                    $query1 = mysqli_query($mysql,"select * from product p, monitoring m, supplier s where p.product_id=m.product_id and p.supplier=s.supplier_id
                                                and p.product_id='$product_id' order by m.date_time desc limit 1;");
                                    while($row1=mysqli_fetch_array($query1)){
                                    ?>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="well-left" align="center">
                                      <div class="single-well" style="height:340px; border: solid #003366 2px;">
                                          <img class="product" src="<?php echo "upload/".$row1['image'];?>" alt="">
                                      </div>
                                    </div>
                                  </div>
                                  <!-- single-well end-->
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="well-middle">
                                      <div class="single-well">
                                        <h3><?php echo $row1['description'];?></h3>
                                        <p><?php echo $row1['sold']." Sold | ".$row1['stock']." Stocks Available";?></p>
                                        <h1><?php echo "₱".$row1['price'];?></h1>

                                        <form class="fill_up" action="" method="post" role="form" align="center">
                                            <fieldset>
                                            <?php
                                                $qry2 = mysqli_query($mysql, "select * from count;");
                                                $row2 = mysqli_fetch_array($qry2);
                                                $count2 = $row2['orders'] + 1;
                                                $add2 = 70000 + $count2;
                                                $id2 = "ORDE-".$add2;
                                            ?>

                                            <input type="hidden" name="ord_count" readonly value="<?php echo $count2;?>" />
                                            <input type="hidden" name="ord_id" readonly value="<?php echo $id2;?>" />
                                            <input type="hidden" name="product_id" readonly value="<?php echo $row1['product_id'];?>" />
                                            <script>
                                              function getAmount(){
                                                var price = $('#price').val();
                                                var quantity = $('#quantity').val();
                                                $('#total_price').val(price*quantity);

                                                var total_price = $('#total_price').val();
                                                var total_prices = parseInt(total_price);
                                                var charge = $('#charge').val();
                                                var charges = parseInt(charge);
                                                $('#total_payment').val(total_prices+charges);
                                              }
                                            </script>

                                            <div class="field">
                                              <label class="label_field">Quantity</label>
                                              <input type="hidden" name="price" id="price" value="<?php echo $row1['price'];?>" style="margin-left:50px; width:142px; height:30px" min=1 required />
                                              <input type="number" name="quantity" id="quantity" style="margin-left:50px; width:142px; height:30px"  min="1" max="<?php echo $row1['stock'];?>" onkeyup="if(this.value><?php echo $row1['stock'];?>){this.value='<?php echo $row1['stock'];?>';}else if(this.value<1){this.value='';} getAmount()" required />
                                            </div>
                                            <div class="field">
                                              <label class="label_field">Total Price</label>
                                              <input type="number" name="total_price" id="total_price" style="margin-left:38px; width:142px; height:30px" required readonly />
                                            </div>

                                                  <?php
                                                    $qry3 = mysqli_query($mysql, "select * from customer where customer_id='$id_number';");
                                                    $rw3 = mysqli_fetch_array($qry3);
                                                    $location = $rw3['brgy'];
                                                    $qry4 = mysqli_query($mysql, "select * from location where pickup='$location';");
                                                    while($row4 = mysqli_fetch_array($qry4))
                                                    {
                                                        $location_id = $row4['location_id'];
                                                        $charge = $row4['charge'];
                                                    }
                                                  ?>
                                            <div class="field">
                                              <label class="label_field">Charge Fee</label>
                                              <input type="hidden" name="location_id" id="location_id" style="margin-left:33px; width:142px; height:30px" value="<?php echo $location_id;?>" placeholder="<?php echo $location;?>" required readonly />
                                              <input type="number" name="charge" id="charge" style="margin-left:33px; width:142px; height:30px" value="<?php echo $charge;?>" readonly />
                                            </div>
                                            <div class="field">
                                              <label class="label_field">Amount to Pay</label>
                                              <input type="number" name="total_payment" id="total_payment" style="margin-left:10px; width:142px; height:30px" min=1 required readonly />
                                            </div> <br>
                                            <a href="cus_home.php" class="btn btn-outline-danger" >Cancel</a>
                                            <button type="submit" name="buy_product" class="btn btn-primary" >Confirm to Buy</button>
                                            </fieldset>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- End col-->
                                    <?php
                                    }
                                  ?>


                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- End All Products -->

                        <!-- All Products -->
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>All Products related to "<?php echo $product_name;?>"</h2>
                                 </div>
                              </div>
                              <div class="full gallery_section_inner padding_infor_info">
                                 <div class="row">
                                    <?php
                                            $query3 = mysqli_query($mysql, "select *,p.image as image from product p, monitoring m, category c where (p.product_id=m.product_id and p.category_id=c.category_id)
                                                                    and p.name like '%$product_name%' group by p.product_id order by sold desc;");
                                            while($row3 = mysqli_fetch_array($query3)) {
                                                ?>
                                                <div class="col-sm-4 col-md-2 col-6 margin_bottom_30">
                                                   <div class="column">
                                                      <a href="cus_product.php?id=<?php echo $row3['product_id'];?>&name=<?php echo $row3['name'];?>"><img class="all_product" src="<?php echo "upload/".$row3['image'];?>" alt="#" /></a>
                                                   </div>
                                                   <div class="heading_section3">
                                                       <div style="height:50px;">
                                                            <?php
                                                                if((strlen($row3['description']) >= 50)) {
                                                                    echo substr($row3['description'],0,50)."...";
                                                                } else {
                                                                    echo $row3['description'];
                                                                }
                                                            ?>
                                                       </div>
                                                       <div style="position:relative; margin: 0 5px 0 5px;">
                                                           <div style="position:relative; float:left;"><?php echo "₱".$row3['price'];?></div>
                                                           <div style="position:relative; float:right; font-size:10px;"><?php echo $row3['sold']."sold";?></div>
                                                       </div>
                                                   </div>
                                                </div>
                                                <?php
                                            }
                                     ?>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- End All Products -->
  </main>

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