<?php
    session_start();
        require_once('connect.php');
        $user_log_id=$_SESSION["user_log_id"];
        $_SESSION["user_log_id"]=$user_log_id;
        $id_number=$_SESSION["id_number"];
        $_SESSION["id_number"]=$id_number;
        $fname=$_SESSION["fname"];
        $_SESSION["fname"]=$fname;

        if(isset($_POST['upd_supplier'])){
            $query1 = mysqli_query($mysql, "update supplier set store='$_POST[upd_store]', lname='$_POST[upd_lname]', fname='$_POST[upd_fname]',
                        mname='$_POST[upd_mname]', ext='$_POST[upd_ext]', street='$_POST[upd_street]', purok='$_POST[upd_purok]',
                        brgy='$_POST[upd_brgy]', town='$_POST[upd_town]', region='$_POST[upd_region]', contact='$_POST[upd_contact]',
                        email='$_POST[upd_email]' where supplier_id='$_POST[upd_supplier_id]';");
        ?>
                <script>alert("Data successfully updated.");</script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=emp_supplier.php" />';
        } else if(isset($_POST['upd_account'])){

            $query1 = mysqli_query($mysql, "update users set username='$_POST[username]', password='$_POST[password]' where user_id='$_POST[user_id]';");
        ?>
                <script>alert("Data successfully updated.");</script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=emp_editsupplier.php" />';
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

  <title>Lianga eShopping | Employee - Supplier</title>
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
        <h1><a href="emp_home.php">Lianga <span>e</span>Shopping</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="emp_home.php">Home</a></li>
          <li class="dropdown"><a class="nav-link scrollto active" href="#"><span>Data Entry</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <ul>
              <li><a href="emp_category.php">Category</a></li>
              <li><a href="emp_location.php">Location</a></li>
              <li><a href="emp_product.php">Product</a></li>
              <li><a href="#">Supplier</a></li>
            </ul>
            </ul>
          </li>
          <li><a href="emp_orders.php">Orders</a></li>
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

   <!-- Edit Product -->
        <div style="margin-top:80px; margin-bottom:10px;">
      <div class="full_container">
         <div class="container">
            <div class="center verticle_center">
               <div class="login_section">
                  <!-- Modal Header -->
                  <div class="modal-header">
                     <h4 class="modal-title">Update Supplier</h4>
                  </div>
                  <div class="login_form">
                     <form class="fill_up" action="" method="post" role="form">
                        <fieldset>
                           <?php
                                $id = $_GET['id'];
                                $query1 = mysqli_query($mysql, "select * from supplier where supplier_id='$id';");
                                while($row1 = mysqli_fetch_array($query1)){
                                    ?>

                           <div class="field">
                              <label class="label_field">Supplier ID</label>
                              <input type="text" name="upd_supplier_id" readonly value="<?php echo $row1['supplier_id'];?>" />

                           </div>
                           <div class="field">
                              <label class="label_field">Store</label>
                              <input type="text" name="upd_store" value="<?php echo $row1['store'];?>" required />
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
                              <select name="upd_brgy" style="height:30px;">
                                  <option value="<?php echo $row1['brgy'];?>" selected hidden> - <?php echo $row1['brgy'];?> - </option>
                                  <option value="Anibongan">Anibongan</option>
                                  <option value="Ban-as">Ban-as</option>
                                  <option value="Banahao">Banahao</option>
                                  <option value="Baucawe">Baucawe</option>
                                  <option value="Diatagon">Diatagon</option>
                                  <option value="Ganayon">Ganayon</option>
                                  <option value="Liatimco">Liatimco</option>
                                  <option value="Manyayay">Manyayay</option>
                                  <option value="Payasan">Payasan</option>
                                  <option value="Poblacion">Poblacion</option>
                                  <option value="St Christine">St Christine</option>
                                  <option value="San Isidro">San Isidro</option>
                                  <option value="San Pedro">San Pedro</option>
                              </select>
                           </div>
                           <div class="field">
                              <label class="label_field">Town/Region</label>
                              <input type="text" value="Lianga, Surigao del Sur" readonly />
                              <input type="hidden" name="upd_town" value="Lianga" required />
                              <input type="hidden" name="upd_region" value="Surigao del Sur" required />
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
                              <input style="margin:20px 40px 20px 40px;" name="upd_supplier" type="submit" class="btn btn-primary" value="Save" />
                              <a style="margin:20px 40px 20px 40px;;" href="emp_supplier.php" class="btn btn-danger">Cancel</a>
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
</body>
</html>