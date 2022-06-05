<?php
    // Initialize the session.
    // If you are using session_name("something"), don't forget it now!
    session_start();
    require_once('connect.php');
    $user_log_id=$_SESSION["user_log_id"];
    $id_number=$_SESSION["id_number"];

        $query = mysqli_query($mysql, "update users_log set datetime_out=NOW() where user_log_id='$user_log_id';");

    // Finally, destroy the session.
    session_destroy();
    header('location:index.php');
?>