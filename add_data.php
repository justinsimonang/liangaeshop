<?php
    session_start();
        require_once('connect.php');
        $user_log_id=$_SESSION["user_log_id"];
        $_SESSION["user_log_id"]=$user_log_id;
        $id_number=$_SESSION["id_number"];
        $_SESSION["id_number"]=$id_number;

        $target_dir = "upload/";
        $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if(isset($_POST['adm_product'])) {

            //Image
            if(isset($_FILES['file'])) {

                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                  if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                  } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                  }
            }
            $image = $_FILES["fileToUpload"]["name"];

            //Insert into Product table
            $qry1 = mysqli_query($mysql, "select * from product where category_id = '$_POST[add_category]' and serial = '$_POST[add_serial]' and name = '$_POST[add_name]';");
            if (mysqli_num_rows($qry1) >= 1) {
                ?>
                    <script type="text/javascript">
                        alert("Data already exists");
                    </script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=adm_product.php" />';
            } else {
                $query1 = mysqli_query($mysql, "insert into product values('$_POST[add_product_id]','$_POST[add_category]','$_POST[add_type]','$_POST[add_serial]',
                            '$_POST[add_name]','$_POST[add_description]','$_POST[add_price]','$_POST[add_quantity]','$_POST[add_brand]',
                            '$_POST[add_supplier]','$_POST[add_status]','$image',NOW());");
                $query2 = mysqli_query($mysql, "update count set product='$_POST[pro_count]';");

                $qry1 = mysqli_query($mysql, "select * from count;");
                $row1 = mysqli_fetch_array($qry1);
                $count = $row1['monitoring'] + 1;
                $add = 80000 + $count;
                $monitoring_id = "MONI-".$add;

                //Insert new Monitoring data
                $query3 = mysqli_query($mysql, "insert into monitoring values('$monitoring_id','$_POST[add_product_id]','-','$id_number',
                            NOW(),'add','$_POST[add_quantity]',0,'$_POST[add_quantity]','Still available');");
                //Update Monitoring account
                $query4 = mysqli_query($mysql, "update count set monitoring='$count';");
                ?>
                    <script type="text/javascript">
                        alert("Data successfully added to database");
                    </script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=adm_product.php" />';
            }
       } else if (isset($_POST['emp_product'])) {

            //Image
            if(isset($_FILES['file'])) {

                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                  if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                  } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                  }
            }
            $image = $_FILES["fileToUpload"]["name"];

            //Insert into Product table
            $qry1 = mysqli_query($mysql, "select * from product where category_id = '$_POST[add_category]' and serial = '$_POST[add_serial]' and name = '$_POST[add_name]';");
            if (mysqli_num_rows($qry1) >= 1) {
                ?>
                    <script type="text/javascript">
                        alert("Data already exists");
                    </script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=emp_product.php" />';
            } else {
                $query1 = mysqli_query($mysql, "insert into product values('$_POST[add_product_id]','$_POST[add_category]','$_POST[add_type]','$_POST[add_serial]',
                            '$_POST[add_name]','$_POST[add_description]','$_POST[add_price]','$_POST[add_quantity]','$_POST[add_brand]',
                            '$_POST[add_supplier]','$_POST[add_status]','$image',NOW());");
                $query0 = mysqli_query($mysql, "insert into employee_product values('$id_number','$_POST[add_product_id]');");
                $query2 = mysqli_query($mysql, "update count set product='$_POST[pro_count]';");

                $qry1 = mysqli_query($mysql, "select * from count;");
                $row1 = mysqli_fetch_array($qry1);
                $count = $row1['monitoring'] + 1;
                $add = 80000 + $count;
                $monitoring_id = "MONI-".$add;

                //Insert new Monitoring data
                $query3 = mysqli_query($mysql, "insert into monitoring values('$monitoring_id','$_POST[add_product_id]','-','$id_number',
                            NOW(),'add','$_POST[add_quantity]',0,'$_POST[add_quantity]','Still available');");
                //Update Monitoring account
                $query4 = mysqli_query($mysql, "update count set monitoring='$count';");
                ?>
                <script>
                    alert("Data successfully added to database");
                </script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=emp_product.php" />';
            }
       } else if (isset($_POST['sup_product'])) {

            //Image
            if(isset($_FILES['file'])) {

                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                  if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                  } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                  }
            }
            $image = $_FILES["fileToUpload"]["name"];

            //Insert into Product table
            $qry1 = mysqli_query($mysql, "select * from product where category_id = '$_POST[add_category]' and serial = '$_POST[add_serial]' and name = '$_POST[add_name]';");
            if (mysqli_num_rows($qry1) >= 1) {
                ?>
                    <script type="text/javascript">
                        alert("Data already exists");
                    </script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=sup_product.php" />';
            } else {
                $query1 = mysqli_query($mysql, "insert into product values('$_POST[add_product_id]','$_POST[add_category]','$_POST[add_type]','$_POST[add_serial]',
                            '$_POST[add_name]','$_POST[add_description]','$_POST[add_price]','$_POST[add_quantity]','$_POST[add_brand]',
                            '$_POST[add_supplier]','$_POST[add_status]','$image',NOW());");
                $query0 = mysqli_query($mysql, "insert into supplier_product values('$id_number','$_POST[add_product_id]');");
                $query2 = mysqli_query($mysql, "update count set product='$_POST[pro_count]';");

                $qry1 = mysqli_query($mysql, "select * from count;");
                $row1 = mysqli_fetch_array($qry1);
                $count = $row1['monitoring'] + 1;
                $add = 80000 + $count;
                $monitoring_id = "MONI-".$add;

                //Insert new Monitoring data
                $query3 = mysqli_query($mysql, "insert into monitoring values('$monitoring_id','$_POST[add_product_id]','-','$id_number',
                            NOW(),'add','$_POST[add_quantity]',0,'$_POST[add_quantity]','Still available');");
                //Update Monitoring account
                $query4 = mysqli_query($mysql, "update count set monitoring='$count';");
                ?>
                <script>
                    alert("Data successfully added to database");
                </script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=sup_product.php" />';
            }
       } else if(isset($_POST['adm_category'])) {

            //Image
            if(isset($_FILES['file'])) {

                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                  if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                  } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                  }
            }
            $image = $_FILES["fileToUpload"]["name"];

            //Insert into Product table
            $qry1 = mysqli_query($mysql, "select * from category where category = '$_POST[add_category]';");
            if (mysqli_num_rows($qry1) >= 1) {
                ?>
                    <script type="text/javascript">
                        alert("Data already exists");
                    </script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=adm_category.php" />';
            } else {
                $query1 = mysqli_query($mysql, "insert into category values('$_POST[add_category_id]','$_POST[add_category]','$image');");
                $query2 = mysqli_query($mysql, "update count set category='$_POST[pro_count]';");
                ?>
                    <script type="text/javascript">
                        alert("Data successfully added to database");
                    </script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=adm_category.php" />';
            }
       } else if(isset($_POST['emp_category'])) {

            //Image
            if(isset($_FILES['file'])) {

                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                  if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                  } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                  }
            }
            $image = $_FILES["fileToUpload"]["name"];

            //Insert into Product table
            $qry1 = mysqli_query($mysql, "select * from category where category = '$_POST[add_category]';");
            if (mysqli_num_rows($qry1) >= 1) {
                ?>
                    <script type="text/javascript">
                        alert("Data already exists");
                    </script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=emp_category.php" />';
            } else {
                $query1 = mysqli_query($mysql, "insert into category values('$_POST[add_category_id]','$_POST[add_category]','$image');");
                $query2 = mysqli_query($mysql, "update count set category='$_POST[pro_count]';");
                ?>
                    <script type="text/javascript">
                        alert("Data successfully added to database");
                    </script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=emp_category.php" />';
            }
       } else if(isset($_POST['adm_type'])) {

            //Image
            if(isset($_FILES['file'])) {

                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                  if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                  } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                  }
            }
            $image = $_FILES["fileToUpload"]["name"];
            $category_id = $_POST['category_id'];
            $category = $_POST['category'];

            //Insert into Product table
            $qry1 = mysqli_query($mysql, "select * from types where types = '$_POST[add_type]';");
            if (mysqli_num_rows($qry1) >= 1) {
                ?>
                    <script type="text/javascript">
                        alert("Data already exists");
                    </script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=adm_type.php?id=' . $category_id . '&name=' . $category . '" />';
            } else {
                $query1 = mysqli_query($mysql, "insert into types values('$_POST[add_type_id]','$category_id','$_POST[add_type]','$image');");
                $query2 = mysqli_query($mysql, "update count set types='$_POST[type_count]';");
                ?>
                    <script type="text/javascript">
                        alert("Data successfully added to database");
                    </script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=adm_type.php?id=' . $category_id . '&name=' . $category . '" />';
            }
       } else if(isset($_POST['emp_type'])) {

            //Image
            if(isset($_FILES['file'])) {

                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                  if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                  } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                  }
            }
            $image = $_FILES["fileToUpload"]["name"];
            $category_id = $_POST['category_id'];
            $category = $_POST['category'];

            //Insert into Product table
            $qry1 = mysqli_query($mysql, "select * from types where types = '$_POST[add_type]';");
            if (mysqli_num_rows($qry1) >= 1) {
                ?>
                    <script type="text/javascript">
                        alert("Data already exists");
                    </script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=emp_type.php?id=' . $category_id . '&name=' . $category . '" />';
            } else {
                $query1 = mysqli_query($mysql, "insert into types values('$_POST[add_type_id]','$category_id','$_POST[add_type]','$image');");
                $query2 = mysqli_query($mysql, "update count set types='$_POST[type_count]';");
                ?>
                    <script type="text/javascript">
                        alert("Data successfully added to database");
                    </script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=emp_type.php?id=' . $category_id . '&name=' . $category . '" />';
            }
       }

        // Check if file already exists
        if (file_exists($target_file)) {
          echo "Sorry, file already exists.";
          $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }


?>
