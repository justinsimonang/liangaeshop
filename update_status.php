<?php
  session_start();
        require_once('connect.php');

        if(isset($_POST['update_status'])) {
                $id=$_POST['order_id'];

                $query=mysqli_query($mysql, "update orders set status='$_POST[status]' where order_id='$id';");
                ?>
                <script>alert("Status successfully changed.");</script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=emp_orders.php" />';
          }
?>