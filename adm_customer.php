<?php
    session_start();
        require_once('connect.php');
        $user_log_id=$_SESSION["user_log_id"];
        $_SESSION["user_log_id"]=$user_log_id;
        $id_number=$_SESSION["id_number"];
        $_SESSION["id_number"]=$id_number;
        $username=$_SESSION["username"];
        $_SESSION["username"]=$username;

        if(isset($_POST['add_customer'])) {

            $qry1 = mysqli_query($mysql, "select *,u.user_id as user_id from customer c, users u, users_customer uc where c.customer_id = uc.customer_id and
                                        u.user_id = uc.user_id and ((u.username = '$_POST[username]') or (c.lname = '$_POST[add_lname]' and c.fname = '$_POST[add_fname]'));");
            if (mysqli_num_rows($qry1) >= 1) {
                ?>
                    <script type="text/javascript">
                        alert("Data already exists");
                    </script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=adm_customer.php" />';
            } else {
                $query1 = mysqli_query($mysql, "insert into customer values('$_POST[add_customer_id]','$_POST[add_lname]',
                            '$_POST[add_fname]','$_POST[add_mname]','$_POST[add_ext]','$_POST[add_street]','$_POST[add_purok]','$_POST[add_brgy]',
                            '$_POST[add_town]','$_POST[add_region]','$_POST[add_contact]','$_POST[add_email]');");
                $query2 = mysqli_query($mysql, "insert into users values('$_POST[user_id]','$_POST[username]','$_POST[password]','customer',NOW());");
                $query3 = mysqli_query($mysql, "insert into users_customer values('$_POST[user_id]','$_POST[add_customer_id]');");
                $query4 = mysqli_query($mysql, "update count set customer='$_POST[cus_count]',user='$_POST[user_count]';");
                ?>
                    <script type="text/javascript">
                        alert("Data successfully added to database");
                    </script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=adm_customer.php" />';
            }
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

  <title>Lianga eShopping | Admin - Customer</title>
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
          <li class="dropdown"><a class="nav-link scrollto active" href="#"><span>Data Entry</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="adm_category.php">Category</a></li>
              <li><a href="adm_location.php">Location</a></li>
              <li><a href="adm_product.php">Product</a></li>
              <li><a href="adm_employee.php">Employee</a></li>
              <li><a href="#">Customer</a></li>
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

   <!-- Body -->
                        <!-- Table Section - -->
                        <div class="col-md-12" style="margin-top:80px;">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                     <h2>Customer</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                    <!-- Add Customer -->
                                  <div align="center" style="margin-bottom:0px;">
                                      <button type="submit" data-toggle="modal" data-target="#add_modal" class="btn btn-primary "><i class="fa fa-plus fa-fw fa-lg"></i> Add Customer</button>
                                  </div>
                                 <!--<div class="table-responsive-sm">-->
                                 <div class="table-responsive-sm">
                                    <table class="table table-striped table-bordered" id="dataTables-example">
                                       <thead>
                                          <tr style="color:#000099; font-weight:bold;">
                                             <th>ID Number</th>
                                             <th>Lastname</th>
                                             <th>First</th>
                                             <th>Middle</th>
                                             <th>Ext</th>
                                             <th>Prk/St</th>
                                             <th>Barangay</th>
                                             <th>Town/Region</th>
                                             <th>Contact</th>
                                             <th>Email</th>
                                             <th>Action</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                           <?php
                                                $qry2 = mysqli_query($mysql, "select * from customer;");
                                        		while($row2 = mysqli_fetch_array($qry2))
                                        		{
        	                                ?>
                                          <tr style=" font-family:Arial Narrow;" class="odd gradeX">
                                             <td><?php echo $row2['customer_id']; ?></td>
                                             <td><?php echo $row2['lname']; ?></td>
                                             <td><?php echo $row2['fname']; ?></td>
                                             <td><?php echo $row2['mname']; ?></td>
                                             <td><?php echo $row2['ext']; ?></td>
                                             <td><?php echo $row2['street']." ".$row2['purok']; ?></td>
                                             <td><?php echo $row2['brgy']; ?></td>
                                             <td><?php echo $row2['town'].", ".$row2['region']; ?></td>
                                             <td><?php echo $row2['contact']; ?></td>
                                             <td><?php echo $row2['email']; ?></td>
                                             <td>
                                                <a href="adm_editcustomer.php?id=<?php echo $row2['customer_id'];?>">
                                                <button class="btn btn-warning btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Update Data"><i class="fa fa-edit fa-fw fa-sm"></i></button> </a>
                                                <!--
                                                <a onclick="return confirm('Are you sure you want to permanently delete this data?');" href="delete_data.php?id=<?php echo $row2['customer_id']; ?>&name=customer">
                                                <button class="btn btn-danger btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Delete Data"><i class="fa fa-trash-o fa-fw fa-sm"></i></button> </a>
                                                -->

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
                     <h4 class="modal-title">Add Customer</h4>
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
                                $count1 = $row1['customer'] + 1;
                                $add1 = 40000 + $count1;
                                $id = "CUST-".$add1;

                                $count2 = $row1['user'] + 1;
                                $add2 = 90000 + $count2;
                                $user_id = "USER-".$add2;
                            ?>
                            <input type="hidden" name="cus_count" readonly value="<?php echo $count1;?>" />
                            <input type="hidden" name="user_count" readonly value="<?php echo $count2;?>" />
                            <input type="hidden" name="user_id" readonly value="<?php echo $user_id;?>" />
                           <div class="field">
                              <label class="label_field">Customer ID</label>
                              <input type="text" name="add_customer_id" readonly value="<?php echo $id;?>" />

                           </div>
                           <div class="field">
                              <label class="label_field">Lastname</label>
                              <input type="text" name="add_lname" placeholder="Ex. Dela Cruz" required />
                           </div>
                           <div class="field">
                              <label class="label_field">Firstname</label>
                              <input type="text" name="add_fname" placeholder="Ex. Juan" required />
                           </div>
                           <div class="field">
                              <label class="label_field">Middlename</label>
                              <input type="text" name="add_mname" placeholder="Ex. Gomez" />
                           </div>
                           <div class="field">
                              <label class="label_field">Name Ext</label>
                              <input type="text" name="add_ext" placeholder="Ex. Jr. Sr. I II III" />
                           </div>
                           <div class="field">
                              <label class="label_field">Street</label>
                              <input type="text" name="add_street" placeholder="Street Name" />
                           </div>
                           <div class="field">
                              <label class="label_field">Purok</label>
                              <input type="text" name="add_purok" placeholder="Purok Name" required />
                           </div>
                           <div class="field">
                              <label class="label_field">Barangay</label>
                              <select name="add_brgy" style="margin-left:55px; height:30px;" required>
                                  <option value="" selected disabled hidden> - Choose Barangay - </option>
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
                              <input type="hidden" name="add_town" value="Lianga" required />
                              <input type="hidden" name="add_region" value="Surigao del Sur" required />
                           </div>
                           <div class="field">
                              <label class="label_field">Contact</label>
                              <input type="text" name="add_contact" placeholder="Contact Number" required />
                           </div>
                           <div class="field">
                              <label class="label_field">Email</label>
                              <input type="text" name="add_email" placeholder="Email Address" />
                           </div>
                           <div class="field">
                              <label class="label_field">Username</label>
                              <input type="text" name="username" placeholder="Username" required />
                           </div>
                           <div class="field">
                              <label class="label_field">Password</label>
                              <input type="password" name="password" placeholder="Password" required />
                           </div>
                           <div align="center">
                              <input style="margin:20px 40px 20px 40px;" name="add_customer" type="submit" class="btn btn-primary" value="Add" />
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
