<?php
@session_start();
    if( !isset($_SESSION['name']) && empty($_SESSION['name'])&& !isset($_SESSION['Userimage']) && empty($_SESSION['Userimage'])&& !isset($_SESSION['admin_user_id']) && empty($_SESSION['admin_user_id'])){
        
        unset($_SESSION['name']);
        unset($_SESSION['Userimage']);
        unset($_SESSION['admin_user_id']);

        header("Location:login.php");
    }
 


?>