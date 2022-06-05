<?php
  session_start();
        require_once('connect.php');

          if($_GET['name']=='product') {
            $id=$_GET['id'];

                $query=mysqli_query($mysql, "delete from product where product_id='$id';");
                ?>
                <script>alert("Data successfully deleted.");</script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=adm_product.php" />';
          } else if($_GET['name']=='employee') {
            $id=$_GET['id'];

                $query1=mysqli_query($mysql, "delete from employee where employee_id='$id';");
                $query2=mysqli_query($mysql, "delete from users where id_number='$id';");
                ?>
                <script>alert("Data successfully deleted.");</script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=adm_employee.php" />';
          } else if($_GET['name']=='customer') {
            $id=$_GET['id'];

                $query1=mysqli_query($mysql, "delete from customer where customer_id='$id';");
                $query2=mysqli_query($mysql, "delete from users where id_number='$id';");
                ?>
                <script>alert("Data successfully deleted.");</script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=adm_customer.php" />';
          } else if($_GET['name']=='supplier') {
            $id=$_GET['id'];

                $query1=mysqli_query($mysql, "delete from supplier where supplier_id='$id';");
                $query2=mysqli_query($mysql, "delete from users where id_number='$id';");
                ?>
                <script>alert("Data successfully deleted.");</script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=adm_supplier.php" />';
          } else if($_GET['name']=='location') {
            $id=$_GET['id'];

                $query1=mysqli_query($mysql, "delete from location where location_id='$id';");
                ?>
                <script>alert("Data successfully deleted.");</script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=adm_location.php" />';
          } else if($_GET['name']=='cart') {
            $id=$_GET['id'];

                $query1=mysqli_query($mysql, "update cart set status='deleted' where cart_id='$id';");
                ?>
                <script>alert("Data successfully deleted.");</script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=cus_cart.php" />';
          } else if($_GET['name']=='cancel_order') {
            $id=$_GET['id'];

                    $query2=mysqli_query($mysql, "update orders set status='Cancelled' where order_id='$id';");
                    ?>
                    <script>alert("Order successfully cancelled.");</script>
                 <?php
                echo '<meta http-equiv="refresh" content="0;url=cus_orders.php" />';
          } else if($_GET['name']=='process101') {
                $id=$_GET['id'];

                $query=mysqli_query($mysql, "update orders set status='For Processing - Your order has been accepted' where order_id='$id';");
                ?>
                <script>alert("Status successfully changed.");</script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=emp_orders.php" />';
          } else if($_GET['name']=='order_received') {
                $id=$_GET['id'];

                $query=mysqli_query($mysql, "update orders set status='Order Received - Confirmation of payment' where order_id='$id';");
                ?>
                <script>alert("Status successfully changed.");</script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=cus_orders.php" />';
          }
?>