<?php
    session_start();
        require_once('connect.php');
        if(isset($_POST['sign_up'])) {
            if($_POST['user_type'] == 'customer') {
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
                echo '<meta http-equiv="refresh" content="0;url=login.php" />';
            } else {
                $query1 = mysqli_query($mysql, "insert into supplier values('$_POST[add_supplier_id]','$_POST[add_store]','$_POST[add_lname]',
                            '$_POST[add_fname]','$_POST[add_mname]','$_POST[add_ext]','$_POST[add_street]','$_POST[add_purok]','$_POST[add_brgy]',
                            '$_POST[add_town]','$_POST[add_region]','$_POST[add_contact]','$_POST[add_email]');");
                $query2 = mysqli_query($mysql, "insert into users values('$_POST[user_id]','$_POST[username]','$_POST[password]','supplier',NOW());");
                $query3 = mysqli_query($mysql, "insert into users_supplier values('$_POST[user_id]','$_POST[add_supplier_id]');");
                $query4 = mysqli_query($mysql, "update count set supplier='$_POST[sup_count]',user='$_POST[user_count]';");
                ?>
                    <script type="text/javascript">
                        alert("Data successfully added to database");
                    </script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=login.php" />';
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
      <!-- site metas -->
      <title>Lianga eShopping | Sign Up</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="images/fevicon.png" type="image/png" />
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
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="inner_page login">
    <div style="margin-top:10px; margin-bottom:10px;">
      <div class="full_container">
         <div class="container">
            <div class="center verticle_center">
               <div class="login_section">
                  <div class="logo_login">
                     <div class="center">
                        <i class="fa fa-edit blue1_color" style="font-size: 23px; width: 30px"></i>
                        <h2 style="color: white;">Sign Up</h2>
                     </div>
                  </div>
                  <div class="login_form">
                     <form class="fill_up" action="" method="post" role="form">
                        <fieldset>
                            <?php
                                $qry1 = mysqli_query($mysql, "select * from count;");
                                $row1 = mysqli_fetch_array($qry1);
                                $count1 = $row1['customer'] + 1;
                                $add1 = 40000 + $count1;
                                $id1 = "CUST-".$add1;

                                $count2 = $row1['supplier'] + 1;
                                $add2 = 50000 + $count2;
                                $id2 = "SUPP-".$add2;

                                $count3 = $row1['user'] + 1;
                                $add3 = 90000 + $count3;
                                $user_id = "USER-".$add3;
                            ?>

                              <input type="hidden" name="add_customer_id" value="<?php echo $id1;?>" />
                              <input type="hidden" name="cus_count" value="<?php echo $count1;?>" />
                              <input type="hidden" name="add_supplier_id" value="<?php echo $id2;?>" />
                              <input type="hidden" name="sup_count" value="<?php echo $count2;?>" />
                              <input type="hidden" name="user_id" value="<?php echo $user_id;?>" />
                              <input type="hidden" name="user_count" value="<?php echo $count3;?>" />
                           <div class="field">
                              <label class="label_field">User Type</label>
                              <select name="user_type" onchange="yesnoCheck(this);" style="height:30px;">
                                  <option value="" selected disabled hidden> - Choose User Access - </option>
                                  <option value="customer">Customer</option>
                                  <option value="supplier">Supplier</option>
                              </select>
                           </div>
                           <script>
                              function yesnoCheck(that) {
                                    if (that.value == "supplier") {
                                        document.getElementById("ifYes").style.display = "block";
                                    } else {
                                        document.getElementById("ifYes").style.display = "none";
                                    }
                                }
                          </script>

                           <div class="field" id="ifYes" style="display: none;">
                              <label class="label_field">Store</label>
                              <input type="text" name="add_store" placeholder="Store Name" />
                           </div>
                           <div class="field">
                              <label class="label_field">Lastname</label>
                              <input type="text" name="add_lname" placeholder="Dela Cruz" />
                           </div>
                           <div class="field">
                              <label class="label_field">Firstname</label>
                              <input type="text" name="add_fname" placeholder="Juan" />
                           </div>
                           <div class="field">
                              <label class="label_field">Middlename</label>
                              <input type="text" name="add_mname" placeholder="Gomez" />
                           </div>
                           <div class="field">
                              <label class="label_field">Name Ext.</label>
                              <input type="text" name="add_ext" placeholder="Jr" />
                           </div>
                           <div class="field">
                              <label class="label_field">Street Name</label>
                              <input type="text" name="add_street" placeholder="Street Name" />
                           </div>
                           <div class="field">
                              <label class="label_field">Purok</label>
                              <input type="text" name="add_purok" placeholder="Purok Number" />
                           </div>
                           <div class="field">
                              <label class="label_field">Barangay</label>
                              <select name="add_brgy" style="height:30px;" required>
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
                              <label class="label_field">Contact No.</label>
                              <input type="text" name="add_contact" placeholder="Contact Number" />
                           </div>
                           <div class="field">
                              <label class="label_field">Email</label>
                              <input type="text" name="add_email" placeholder="Email Address" />
                           </div>
                           <div class="field">
                              <label class="label_field">Username</label>
                              <input type="text" name="username" placeholder="Username" />
                           </div>
                           <div class="field">
                              <label class="label_field">Password</label>
                              <input type="password" name="password" placeholder="Password" />
                           </div>
                           <div align="center">
                              <input type="submit" name="sign_up" class="btn btn-mm btn-primary" value="Sign Up" style="width:100px; font-size:16px;" /><br><br>
                           </div>
                           <div class="field">
                               <div style="float:left;">
                                    <a class="signup" href="login.php">Log In</a>
                               </div>
                               <div style="float:right;">
                                    <a class="forgot" href="index.php">Back to Home</a>
                               </div>
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
      </div>



      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/custom.js"></script>

   </body>
</html>