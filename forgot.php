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
      <title>Lianga eShopping | Forgot Password</title>
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
                        <i class="fa fa-question blue1_color" style="font-size: 23px; width: 30px"></i>
                        <h2 style="color: white;">Forgot Password</h2>
                     </div>
                  </div>
                  <div class="login_form">
                     <form class="fill_up" action="" method="post" role="form">
<?php
    session_start(); //Starting Session
        require_once('connect.php');
            if(isset($_POST['forgot'])) {

                $username=$_POST['username'];
                $contact=$_POST['contact'];
                $email=$_POST['email'];
               // SQL query to fetch information of registerd users and finds user match.
                $query1 = mysqli_query($mysql, "select *,u.user_id as user_id from customer c, users u, users_customer uc where c.customer_id = uc.customer_id and
                                        u.user_id = uc.user_id and u.username = '$username' and c.contact = '$contact' and c.email = '$email';");
                $row1 = mysqli_fetch_array($query1);

                $query2 = mysqli_query($mysql, "select *,u.user_id as user_id from supplier c, users u, users_supplier uc where c.supplier_id = uc.supplier_id and
                                        u.user_id = uc.user_id and u.username = '$username' and c.contact = '$contact' and c.email = '$email';");
                $row2 = mysqli_fetch_array($query2);

                $query3 = mysqli_query($mysql, "select *,u.user_id as user_id from employee c, users u, users_employee uc where c.employee_id = uc.employee_id and
                                        u.user_id = uc.user_id and u.username = '$username' and c.contact = '$contact' and c.email = '$email';");
                $row3 = mysqli_fetch_array($query3);


                if (mysqli_num_rows($query1) == 1) {
                    $_SESSION["user_id"]=$row1['user_id'];
                    $_SESSION["username"]=$username;
                    header("location:change_password.php");
                } else if (mysqli_num_rows($query2) == 1) {
                    $_SESSION["user_id"]=$row2['user_id'];
                    $_SESSION["username"]=$username;
                    header("location:change_password.php");
                } else if (mysqli_num_rows($query3) == 1) {
                    $_SESSION["user_id"]=$row3['user_id'];
                    $_SESSION["username"]=$username;
                    header("location:change_password.php");
                } else {
                    ?>
                    <div  align="center">
                        <span style="color:#FF0000;">Data not found in database. <a href="signup.php">Sign Up?</a></span>
                    </div>
                    <?php
                }
            }

?>
                        <fieldset>
                           <div class="field">
                              <label class="label_field">Username</label>
                              <input type="text" name="username" placeholder="Username" />
                           </div>
                           <div class="field">
                              <label class="label_field">Contact No.</label>
                              <input type="text" name="contact" placeholder="Contact Number" />
                           </div>
                           <div class="field">
                              <label class="label_field">Email</label>
                              <input type="text" name="email" placeholder="Email Address" />
                           </div>
                           <div align="center">
                              <input type="submit" name="forgot" class="btn btn-mm btn-primary" value="Confirm" style="width:100px; font-size:16px;" /><br><br>
                           </div>
                           <div class="field">
                               <div style="float:left;">
                                    <a class="signup" href="login.php">Log In</a>
                               </div>
                               <div style="float:right;">
                                    <a class="signup" href="index.php">Back to Home</a>
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