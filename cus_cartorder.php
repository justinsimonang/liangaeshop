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

  <title>Lianga eShopping | Customer - Cart</title>
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
  <form action="">
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
          <li><a class="nav-link scrollto active" href="#">My Cart</a></li>
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
    </div>

  </header><!-- End Header -->

   <!-- Body -->
                        <!-- Table Section - -->
                        <div class="col-md-12" style="margin-top:80px;">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                     <h2>My Cart</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                    <!-- Add Location
                                  <div align="center" style="margin-bottom:0px;">
                                      <button type="submit" data-toggle="modal" data-target="#add_modal" class="btn btn-primary "><i class="fa fa-plus fa-fw fa-lg"></i> Add Cart</button>
                                  </div>
                                 <!--<div class="table-responsive-sm">-->
                                 <div class="table-responsive-sm">
                                    <table class="table table-striped table-bordered" id="dataTables-example">
                                       <thead>
                                          <tr style="color:#000099; font-weight:bold;">
                                             <th><input type="checkbox" /> All</th>
                                             <th>Product</th>
                                             <th>Price</th>
                                             <th>Quantity</th>
                                             <th>Total Price</th>
                                             <th>Action</th>
                                          </tr>
                                       </thead>
                                       <style>
                                            .zoom {
                                                transition: transform .2s; /* Animation */
                                                margin: 0 auto;
                                                width: 25px; /* width of container */
                                                height: 25px; /* height of container */
                                                object-fit: contain;
                                            }
                                            .zoom:hover {
                                                transition: transform .5s ease;
                                                transform: scale(3.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
                                                position:relative;
                                                z-index:2;
                                            }
                                       </style>

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

                                       <tbody>

                                           <?php
                                                $qry2 = mysqli_query($mysql, "select *,c.date_time as date_time from product p, cart c, customer cu, location l where p.product_id=c.product_id
                                                        and c.customer_id=cu.customer_id and cu.brgy=l.pickup and c.customer_id='$id_number' and c.status='pending' order by c.date_time desc;");
                                        		while($row2 = mysqli_fetch_array($qry2))
                                        		{
                                        		    $product_id = $row2['product_id'];
                                        		    $qry3 = mysqli_query($mysql, "select * FROM monitoring WHERE product_id = '$product_id' AND
                                                                                    date_time = (select max(date_time) from monitoring where product_id = '$product_id');");
                                                    $row3 = mysqli_fetch_array($qry3);
        	                                ?>
                                          <tr style=" font-family:Arial Narrow;" class="odd gradeX">
                                              <input type="hidden" value="<?php echo $row2['charge'];?>"  />
                                              <td align="center"><input type="checkbox" /></td>
                                             <td><img class="zoom" style="margin: 0 10px 0 10px;" src="<?php echo "upload/".$row2['image'];?>"><?php echo $row2['description']; ?></td>
                                             <td><input type="hidden" name="price" id="price" style="width:4em; background:transparent; border:none; outline:none;" value="<?php echo "???".$row2['price']; ?>" readonly /><?php echo "???".$row2['price']; ?></td>
                                             <td><input type="number" name="quantity" id="quantity" style="width:4em;" min=1  max="<?php echo $row3['stock'];?>" onkeyup="if(this.value><?php echo $row3['stock'];?>){this.value='<?php echo $row3['stock'];?>';}else if(this.value<1){this.value='';} getAmount()" required /></td>
                                             <td><input type="number" name="total" id="total" style="width:4em; background:transparent; border:none; outline:none;"  readonly /></td>

                                             <td>
                                                 <!--
                                                <a href="cus_cartbuy.php?id=<?php echo $row2['product_id'];?>&name=<?php echo $row2['name'];?>&cart=<?php echo $row2['cart_id'];?>">
                                                <button class="btn btn-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Buy Product"><i class="fa fa-plus fa-fw fa-sm"></i></button> </a>
                                                 -->
                                                <a onclick="return confirm('Are you sure you want to delete this data?');" href="delete_data.php?id=<?php echo $row2['cart_id']; ?>&name=cart">
                                                <button class="btn btn-danger btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o fa-fw fa-sm"></i></button> </a>


                                             </td>

                                          </tr>
                                          <?php } ?>


                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- End Table -->
    <header id="header" class="fixed-bottom d-flex align-items-center" style="background:#99CCFF;">
        <div class="container d-flex justify-content-between">
          <div class="logo">
            <button class="btn btn-outline-danger btn-sm" name="del_allcart" type="submit" data-toggle="tooltip" data-placement="top" title="Delete">Delete</button>
          </div>
          <div class="logo" style="font-size: 18px;">
            Total: <b>???<span>10000</span></b>
          </div>
          <div class="logo">
            <button class="btn btn-primary btn-lg" name="order_now" type="submit" data-toggle="tooltip" data-placement="top" title="Order Now">Buy Now</button>
          </div>
        </div>
    </header>
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
