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
      <title>Lianga eShopping | Log In</title>
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
                        <i class="fa fa-key blue1_color" style="font-size: 23px; width: 30px"></i>
                        <h2 style="color: white; text-align:center;">Change Password</h2>
                     </div>
                  </div>
                  <div class="login_form">
                     <form class="fill_up" action="" method="post" role="form">
<?php
    session_start(); //Starting Session       
        require_once('connect.php');
            $user_id = $_SESSION['user_id'];
            $username = $_SESSION['username'];

            if(isset($_POST['change_password'])) {

            $query1=mysqli_query($mysql, "update users set password='$_POST[password]' where user_id='$user_id';");
            ?>
                    <script type="text/javascript">
                        alert("Password successfully changed");
                    </script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=login.php" />';
            }
?>
                        <fieldset>
                           <div class="field">
                              <label class="label_field">Username</label>
                              <input type="text" name="username" value="<?php echo $username;;?>" required readonly />
                           </div>
                           <div class="field">
                              <label class="label_field">New Password</label>
                              <input type="password" name="password" placeholder=" Input New Password" required />
                           </div>
                           <div align="center">
                              <input type="submit" name="change_password" class="btn btn-mm btn-primary" value="Save" style="width:100px; font-size:16px;" /><br><br>
                           </div>
                           <div align="center">
                              <a class="signup" href="index.php">Back to Home</a>
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