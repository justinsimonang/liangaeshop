<?php
    session_start(); //Starting Session
        require_once('connect.php');
        
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
                        <i class="fa fa-shopping-cart blue1_color" style="font-size: 23px; width: 30px"></i>
                        <h2 style="color: white; text-align:center;">Lianga eShopping</h2>
                     </div>
                  </div>
                  <div class="login_form">
                     <form class="fill_up" action="" method="post" role="form">
<?php
            if(isset($_POST['login'])) {

                // Define $username and $password
                $username=$_POST['username'];
                $password=md5($_POST['password']);

                // To protect MySQL injection for Security purpose
                $username = stripslashes($username);
                $password = stripslashes($password);
                $username = mysqli_real_escape_string($mysql, $username,);
                $password = mysqli_real_escape_string($mysql, $password);

                // SQL query to fetch information of registerd users and finds user match.
                $query1 = mysqli_query($mysql, "select * from users where md5(password)='$password' AND username='$username';");
                $row1 = mysqli_num_rows($query1);

                if ($row1 == 1) {

                    while($row2 = mysqli_fetch_array($query1)) {
                        $level = $row2['level'];
                        $user_id = $row2['user_id'];
                        $username = $row2['username'];
                    }

                        $qry1 = mysqli_query($mysql, "select * from count;");
                        $row3 = mysqli_fetch_array($qry1);
                        $count = $row3['users_log'] + 1;
                        $add = 90000 + $count;
                        $user_log_id = "LOG-".$add;
                        $query2 = mysqli_query($mysql, "insert into users_log values('$user_log_id',NOW(),'Still logged in','$user_id');");
                        $query3 = mysqli_query($mysql, "update count set users_log='$count';");

                    if($level == 'admin') {
                        $_SESSION["user_log_id"]=$user_log_id;
                        $_SESSION["id_number"]=$user_id;
                        $_SESSION["username"]=$username;
                        header("location:adm_home.php");
                    } else if($level == 'customer') {
                        $qry4 = mysqli_query($mysql, "select * from customer c, users_customer uc where c.customer_id=uc.customer_id and uc.user_id='$user_id';");
                        $row4 = mysqli_fetch_array($qry4);
                        $id_number = $row4['customer_id'];
                        $fname = $row4['fname'];

                        $_SESSION["user_log_id"]=$user_log_id;
                        $_SESSION["id_number"]=$id_number;
                        $_SESSION["fname"]=$fname;
                        header("location:cus_home.php");
                    } else if($level == 'employee') {
                        $qry4 = mysqli_query($mysql, "select * from employee e, users_employee ue where e.employee_id=ue.employee_id and ue.user_id='$user_id';");
                        $row4 = mysqli_fetch_array($qry4);
                        $id_number = $row4['employee_id'];
                        $fname = $row4['fname'];

                        $_SESSION["user_log_id"]=$user_log_id;
                        $_SESSION["id_number"]=$id_number;
                        $_SESSION["fname"]=$fname;
                        header("location:emp_home.php");
                    } else {
                        $qry4 = mysqli_query($mysql, "select * from supplier s, users_supplier us where s.supplier_id=us.supplier_id and us.user_id='$user_id';");
                        $row4 = mysqli_fetch_array($qry4);
                        $id_number = $row4['supplier_id'];
                        $fname = $row4['fname'];

                        $_SESSION["user_log_id"]=$user_log_id;
                        $_SESSION["id_number"]=$id_number;
                        $_SESSION["fname"]=$fname;
                        header("location:sup_home.php");
                    }
                } else {
                    ?>
                    <div  align="center">
                        <span style="color:#FF0000;">Invalid Username or Password</span>
                    </div>
                    <?php
                }
            }
?>
                        <fieldset>
                           <div class="field">
                              <label class="label_field">Username</label>
                              <input type="text" name="username" placeholder="Username" required />
                           </div>
                           <div class="field">
                              <label class="label_field">Password</label>
                              <input type="password" name="password" placeholder="Password" required />
                           </div>
                           <div align="center">
                              <input type="submit" name="login" class="btn btn-mm btn-primary" value="Login" style="width:100px; font-size:16px;" /><br><br>
                           </div>
                           <div>
                               <div style="float:left;">
                                    <a class="signup" href="signup.php">Sign Up</a>
                               </div>
                               <div style="float:right;">
                                    <a class="forgot" href="forgot.php">Forgot Password?</a>
                               </div>
                           </div> <br><br>
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