<?php
@session_start();
ob_start();

unset($_SESSION['name']);
unset($_SESSION['Userimage']);
unset($_SESSION['admin_user_id']);
 


        if(session_destroy()){
                if(!isset($_SESSION['name']) && empty($_SESSION['name']) &&!isset($_SESSION['Userimage']) &&empty($_SESSION['Userimage']) && !isset($_SESSION['admin_user_id'])&& empty($_SESSION['admin_user_id']) ){


           $_SESSION = array();
           $_SESSION['status']=" ";

    
        @header("location:login.php"); 



   

        exit();

         }

        }

        
         
 
    
    



?>

