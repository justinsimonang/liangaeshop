<?php
    session_start();
        require_once('connect.php');
        $user_log_id=$_SESSION["user_log_id"];
        $_SESSION["user_log_id"]=$user_log_id;
        $id_number=$_SESSION["id_number"];
        $_SESSION["id_number"]=$id_number;
        $fname=$_SESSION["fname"];
        $_SESSION["fname"]=$fname;


        $product_name = $_SESSION['name'];
        $product_id = $_SESSION['id'];

        if(isset($_POST['upd_account'])){

            $query1 = mysqli_query($mysql, "update users set username='$_POST[username]', password='$_POST[password]' where user_id='$_POST[user_id]';");
        ?>
                <script>alert("Data successfully updated.");</script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=cus_temporary.php" />';
        } else if(isset($_POST['add_cart'])){

            $query1 = mysqli_query($mysql, "insert into cart values('$_POST[cart_id]',NOW(),'pending','$id_number','$product_id','$_POST[quantity]');");
            $query2 = mysqli_query($mysql, "update count set cart='$_POST[cart_count]';");
        ?>
                <script>alert("Data successfully added to cart.");</script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=cus_home.php" />';
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
                                    $qry1 = mysqli_query($mysql,"select * from product p, monitoring m, supplier s where p.product_id=m.product_id and p.supplier=s.supplier_id
                                                and p.product_id='$product_id' order by m.date_time desc limit 1;");
                                    while($row1=mysqli_fetch_array($qry1)){
                                        $product_id = $row1['product_id'];
                                        $product_name = $row1['name'];
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
                                        <ul>
                                          <li>
                                            <i class="bi bi-check"></i> Brand: <?php echo $row1['brand'];?>
                                          </li>
                                          <li>
                                            <i class="bi bi-check"></i> Supplier: <?php echo $row1['store'];?>
                                          </li>
                                        </ul><br>
                                        <form class="fill-up" action="" method="post" role="form">
                                            <fieldset>
                                            <?php
                                                $qry2 = mysqli_query($mysql, "select * from count;");
                                                $row2 = mysqli_fetch_array($qry2);
                                                $count2 = $row2['cart'] + 1;
                                                $add2 = 60000 + $count2;
                                                $id2 = "CART-".$add2;

                                                $qry3 = mysqli_query($mysql, "select * from customer c, location l where c.brgy=l.pickup and c.customer_id='$id_number';");
                                                $row3 = mysqli_fetch_array($qry3);
                                                $address = $row3['street']." ".$row3['purok']." ".$row3['brgy'].", ".$row3['town'].", ".$row3['region'];
                                                $charge = "₱".$row3['charge'];
                                            ?>
                                            <input type="hidden" name="cart_count" readonly value="<?php echo $count2;?>" />
                                            <input type="hidden" name="cart_id" readonly value="<?php echo $id2;?>" />
                                            <input type="hidden" name="product_name" id="product_name" readonly value="<?php echo $product_name;?>" />
                                            <input type="hidden" name="product_id" id="product_id" readonly value="<?php echo $product_id;?>" />
                                            <div class="field">
                                              <label class="label_field" style="width:100px;">My Location</label>
                                              <b><span><?php echo $address;?></span></b>
                                            </div>
                                            <div class="field">
                                              <label class="label_field" style="width:100px;">Charge Fee</label>
                                              <b><span><?php echo $charge;?></span></b>
                                            </div>
                                            <div class="field">
                                              <label class="label_field" style="width:100px;">Quantity</label>
                                              <input type="number" name="quantity" id="quantity" style="width:5em;" value=1 min=1  max="<?php echo $row1['stock'];?>" onkeyup="if(this.value><?php echo $row1['stock'];?>){this.value='<?php echo $row1['stock'];?>';}else if(this.value<1){this.value='1';}" required />
                                            </div>  <br>
                                            <button type="submit" name="add_cart" class="btn btn-outline-primary" ><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                            <a type="submit" id="buy_product" onclick="buyProduct()" href="" class="btn btn-primary" > Buy Product</a>
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
                                            $query3 = mysqli_query($mysql, "select *, max(sold) as max_sold, p.image as image from product p, monitoring m, category c where (p.product_id=m.product_id and p.category_id=c.category_id)
                                                                    and p.name like '%$product_name%' group by p.product_id order by m.date_time desc;");
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
                                                           <div style="position:relative; float:right; font-size:10px;"><?php echo $row3['max_sold']." sold";?></div>
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

    <script>
    function buyProduct(){
        var product_id = $('#product_id').val();
        var quantity = $('#quantity').val();
        var product_name = $('#product_name').val();
        var link = 'cus_buy.php?product_id=' + product_id + '&quantity=' + quantity + '&product_name=' + product_name;

        $("#buy_product").attr("href", link);
    }
    </script>
    <script src="js/jquery-1.10.2.js"></script>
</body>

</html>