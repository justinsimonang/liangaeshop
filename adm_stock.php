<?php
    session_start();
        require_once('connect.php');
        $user_log_id=$_SESSION["user_log_id"];
        $_SESSION["user_log_id"]=$user_log_id;
        $id_number=$_SESSION["id_number"];
        $_SESSION["id_number"]=$id_number;
        $username=$_SESSION["username"];
        $_SESSION["username"]=$username;

        if(isset($_POST['add_stock'])) {
            //Select the last transaction of monitoring
            $query2 = mysqli_query($mysql, "select * FROM monitoring WHERE product_id = '$_POST[upd_product_id]' AND
                                            date_time = (select max(date_time) from monitoring where product_id = '$_POST[upd_product_id]');");
            $row2 = mysqli_fetch_array($query2);
            $sold = $row2['sold'] + 0;
            //Operation of action taken
            if($_POST['action'] == 'add'){
                $stock = $row2['stock'] + $_POST['upd_quantity'];
                $new_stock = $_POST['stock'] + $_POST['upd_quantity'];
            } else {
                $stock = $row2['stock'] - $_POST['upd_quantity'];
                $new_stock = $_POST['stock'] - $_POST['upd_quantity'];
            }

            //Update total number of stock added in Product table
            $query1 = mysqli_query($mysql, "update product set quantity='$new_stock' where product_id='$_POST[upd_product_id]';");

            $qry1 = mysqli_query($mysql, "select * from count;");
            $row1 = mysqli_fetch_array($qry1);
            $count = $row1['monitoring'] + 1;
            $add = 80000 + $count;
            $monitoring_id = "MONI-".$add;

            //Insert new Monitoring data
            $query3 = mysqli_query($mysql, "insert into monitoring values('$monitoring_id','$_POST[upd_product_id]','-','$id_number',
                        NOW(),'$_POST[action]','$_POST[upd_quantity]','$sold','$stock','Still available');");
            //Update Monitoring account
            $query4 = mysqli_query($mysql, "update count set monitoring='$count';");
            ?>
                    <script type="text/javascript">
                        alert("Number of stock successfully updated");
                    </script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=adm_product.php" />';

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

  <title>Lianga eShopping | Admin - Product</title>
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
          <li class="dropdown"><a class="nav-link scrollto active" href="#"><span>Data Entry</span> <i class="bi bi-chevron-down"></i></a>
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
          <li class="dropdown"><a href="#"><span>Sales Report</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="adm_daily.php">Daily Report</a></li>
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

   <!-- Edit Product -->
        <div style="margin-top:80px; margin-bottom:10px;">
      <div class="full_container">
         <div class="container">
            <div class="center verticle_center">
               <div class="login_section">
                  <!-- Modal Header -->
                  <div class="modal-header">
                     <h4 class="modal-title">Update Stock</h4>
                  </div>
                  <div class="login_form">
                     <form class="fill_up" action="" method="post" role="form" enctype="multipart/form-data">
                        <fieldset>
                           <?php
                                $id = $_GET['id'];
                                $query1 = mysqli_query($mysql, "select * from product where product_id='$id';");
                                while($row1 = mysqli_fetch_array($query1)){
                                    ?>

                           <div class="field">
                              <label class="label_field">Product_ID</label>
                              <input type="text" name="upd_product_id" value="<?php echo $row1['product_id'];?>" readonly />
                           </div>
                           <div class="field">
                              <label class="label_field">Name</label>
                              <input type="text" name="upd_name" value="<?php echo $row1['name'];?>" required readonly />
                           </div>
                           <div class="field">
                              <label class="label_field">Action</label>
                              <select name="action">
                                  <option value="" selected disabled hidden> - Choose Action - </option>
                                  <option value="add">Add</option>
                                  <option value="remove">Remove</option>
                              </select>
                           </div>
                           <div class="field">
                              <label class="label_field">Quantity</label>
                              <input type="hidden" name="stock" value="<?php echo $row1['quantity'];?>" />
                              <input type="number" name="upd_quantity" required />
                           </div>
                           <div align="center">
                              <input style="margin:20px 40px 20px 40px;" name="add_stock" type="submit" class="btn btn-primary" value="Save" />
                              <a style="margin:20px 40px 20px 40px;;" href="adm_product.php" class="btn btn-danger">Cancel</a>
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
      </div>
         <!-- end Edit Product  -->




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
</body>
</html>