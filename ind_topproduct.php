<?php
    session_start();
        require_once('connect.php');
        $product_name = $_GET['name'];
        $product_id = $_GET['id'];
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

  <title>Lianga eShopping | Top Products</title>
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
                <h1><a href="index.php">Lianga <span>e</span>Shopping</a></h1>
            </div>
            <div class="logo">
                        <div class="input-group custom-search-form">
                            <form action="" method="post" role="form">
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
                  <li><a href="index.php">Home</a></li>
                  <li><a href="login.php">Log In</a></li>
                  <li><a href="signup.php">Sign Up</a></li>
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
                                    <h2>Top Products "<?php echo $product_name;?>"</h2>
                                 </div>
                              </div>
                              <div class="full gallery_section_inner padding_infor_info">
                                 <div class="row">
                                    <?php

                                        if(isset($_POST['search_button'])) {
                                            $product = $_POST['product'];
                                            $query3 = mysqli_query($mysql, "select *,max(sold) as max_sold, p.image as image from product p, monitoring m, category c where (p.name like '%$product%' or p.description like '%$product%' or p.brand like '%$product%')
                                                        and (p.product_id=m.product_id and p.category_id=c.category_id) and p.name like '%$product_name%' group by p.product_id order by max_sold desc limit 30;");
                                            while($row3 = mysqli_fetch_array($query3)) {
                                                ?>
                                                <div class="col-sm-4 col-md-2 col-6 margin_bottom_30">
                                                   <div class="column">
                                                      <a href="ind_product.php?id=<?php echo $row3['product_id'];?>&name=<?php echo $row3['name'];?>"><img class="all_product" src="<?php echo "upload/".$row3['image'];?>" alt="#" /></a>
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
                                        } else {
                                            $query3 = mysqli_query($mysql, "select *,max(sold) as max_sold, p.image as image from product p, monitoring m, category c where (p.product_id=m.product_id and p.category_id=c.category_id)
                                                                    and p.name like '%$product_name%' group by p.product_id order by max_sold desc;");
                                            while($row3 = mysqli_fetch_array($query3)) {
                                                ?>
                                                <div class="col-sm-4 col-md-2 col-6 margin_bottom_30">
                                                   <div class="column">
                                                      <a href="ind_product.php?id=<?php echo $row3['product_id'];?>&name=<?php echo $row3['name'];?>"><img class="all_product" src="<?php echo "upload/".$row3['image'];?>" alt="#" /></a>
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