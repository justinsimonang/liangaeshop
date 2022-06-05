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

        if(isset($_POST['upd_adm_product'])) {

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

            //Insert to Database
            $query1 = mysqli_query($mysql, "update product set category_id='$_POST[upd_category]', type_id='$_POST[upd_type]', serial='$_POST[upd_serial]',
                        name='$_POST[upd_name]', description='$_POST[upd_description]', price='$_POST[upd_price]', brand='$_POST[upd_brand]',
                        supplier='$_POST[upd_supplier]', status='$_POST[upd_status]', image='$image' where product_id='$_POST[upd_product_id]';");
            //$query2 = mysqli_query($mysql, "update count set product='$_POST[pro_count]';");
                ?>
                    <script type="text/javascript">
                        alert("Data successfully updated");
                    </script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=adm_product.php" />';

       } else if(isset($_POST['upd_emp_product'])) {

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

            //Insert to Database
            $query1 = mysqli_query($mysql, "update product set category_id='$_POST[upd_category]', type_id='$_POST[upd_type]', serial='$_POST[upd_serial]',
                        name='$_POST[upd_name]', description='$_POST[upd_description]', price='$_POST[upd_price]', brand='$_POST[upd_brand]',
                        supplier='$_POST[upd_supplier]', status='$_POST[upd_status]', image='$image' where product_id='$_POST[upd_product_id]';");
            //$query2 = mysqli_query($mysql, "update count set product='$_POST[pro_count]';");
                ?>
                    <script type="text/javascript">
                        alert("Data successfully updated");
                    </script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=emp_product.php" />';

       } else if(isset($_POST['upd_sup_product'])) {

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

            //Insert to Database
            $query1 = mysqli_query($mysql, "update product set category_id='$_POST[upd_category]', type_id='$_POST[upd_type]', serial='$_POST[upd_serial]',
                        name='$_POST[upd_name]', description='$_POST[upd_description]', price='$_POST[upd_price]', brand='$_POST[upd_brand]',
                        supplier='$_POST[upd_supplier]', status='$_POST[upd_status]', image='$image' where product_id='$_POST[upd_product_id]';");
            //$query2 = mysqli_query($mysql, "update count set product='$_POST[pro_count]';");
                ?>
                    <script type="text/javascript">
                        alert("Data successfully updated");
                    </script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=sup_product.php" />';
       } else if(isset($_POST['upd_adm_category'])) {

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

            //Insert to Database
            $query1 = mysqli_query($mysql, "update category set category='$_POST[upd_category]', image='$image' where category_id='$_POST[upd_category_id]';");
            //$query2 = mysqli_query($mysql, "update count set product='$_POST[pro_count]';");
                ?>
                    <script type="text/javascript">
                        alert("Data successfully updated");
                    </script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=adm_category.php" />';

       } else if(isset($_POST['upd_emp_category'])) {

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

            //Insert to Database
            $query1 = mysqli_query($mysql, "update category set category='$_POST[upd_category]', image='$image' where category_id='$_POST[upd_category_id]';");
            //$query2 = mysqli_query($mysql, "update count set product='$_POST[pro_count]';");
                ?>
                    <script type="text/javascript">
                        alert("Data successfully updated");
                    </script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=emp_category.php" />';

       } else if(isset($_POST['upd_adm_type'])) {

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

            //Insert to Database
            $query1 = mysqli_query($mysql, "update types set types='$_POST[upd_type]', image='$image' where type_id='$_POST[upd_type_id]';");
            //$query2 = mysqli_query($mysql, "update count set product='$_POST[pro_count]';");
                ?>
                    <script type="text/javascript">
                        alert("Data successfully updated");
                    </script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=adm_type.php?id=' . $category_id . '&name=' . $category . '" />';

       } else if(isset($_POST['upd_emp_type'])) {

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

            //Insert to Database
            $query1 = mysqli_query($mysql, "update types set types='$_POST[upd_type]', image='$image' where type_id='$_POST[upd_type_id]';");
            //$query2 = mysqli_query($mysql, "update count set product='$_POST[pro_count]';");
                ?>
                    <script type="text/javascript">
                        alert("Data successfully updated");
                    </script>
                <?php
                echo '<meta http-equiv="refresh" content="0;url=emp_type.php?id=' . $category_id . '&name=' . $category . '" />';

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
