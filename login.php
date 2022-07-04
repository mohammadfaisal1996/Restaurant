<?php

  $_SESSION = array();
  session_start();
  ob_start();



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>BlueFig</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/logo/logo.jpg" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/fontawesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/brands.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/solid.css">


	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/azzara.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css">
    <style>

        .custom-template .custom-toggle {

        background-color:black;
        }
        .main-header[data-background-color=purple] {
        background: #282a3c!important;
        }

        .main-header[data-background-color=purple] .navbar-header {
        background: #282a3c!important;
        }
        .btn-primary {
        background: #282a3c!important;
        border-color: white!important;
        }

        .card-title {
        margin: 0;
        color: white;
        font-size: 18px;
        font-weight: 400;
        line-height: 1.6;
        }
        .makeBLack{
            background-color:#282a3c;
        }
        .sidebar .nav>.nav-item.active a i {
        color: #282a3c;
        }

        .sidebar .nav>.nav-item a[data-toggle=collapse][aria-expanded=true]:before, .sidebar .nav>.nav-item.active:hover>a:before, .sidebar .nav>.nav-item.active>a:before {
        background: #282a3c;
        opacity: 1!important;
        position: absolute;
        z-index: 1;
        width: 3px;
        height: 100%;
        content: '';
        left: 0;
        top: 0;
        }
        .custom-template .title {
        padding: 15px;
        text-align: left;
        font-size: 16px;
        font-weight: 600;
        color: #ffffff;
        border-top-left-radius: 5px;
        border-bottom: 1px solid #ebedf2;
        background: #282a3c;
        }

        .pullRight{
            float: right;

        }
        .main-header[data-background-color=purple] {
        background: #282a3c!important;
        }

		.btn-secondary {

			background: rgb(0,0,0,0.0)!important;
    border-color: rgb(0,0,0,0.5)!important;
	color:black;
		}

		.btn-secondary:hover {

background: rgb(0,0,0,0.5)!important;
border-color: black!important;
}

.btn-primary:disabled, .btn-primary:focus, .btn-primary:hover {
    background: rgb(0,0,0,0.5)!important;
    border-color: black!important;
}



.btn-secondary:disabled, .btn-secondary:focus, .btn-secondary:hover {
	background: rgb(0,0,0,0.5)!important;
    border-color: black!important;
}

.btn-primary {
    background: white!important;
    border-color: black!important;

	color:black;
}
.form-floating-label .form-control:valid+.placeholder {
    font-size: 110%!important;}

    </style>
<body class="login" >


    <div class="col-sm-12">
        <div class="row">   


        <div class="col-sm-12"> 
          
      
   
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn"  ">
       

		<form method="post">
            <h3 class="text-center mr-3">Admin Login </h3>

            <img src="assets/img/logo/logo.jpg"/ class="offset-3 mr-5 p-4"> 
			<div class="login-form">
				<div class="form-group form-floating-label">
                     <label for="email2">Username</label>
					<input id="username" name="username" type="text" class="form-control " required>
					<label for="username" class="placeholder"></label>
				</div>
				<div class="form-group form-floating-label">
                     <label for="email2">Password</label>
					<input id="password" name="password" type="password" class="form-control input-border-bottom" required>
				
				</div>
				<div class="row form-sub m-0">
					<div class="custom-control " id="wrongPassword">
					
					</div>
          
					
				</div>
				<div class="form-action mb-3">
					<button type="submit" name="login" class="btn btn-primary btn-rounded btn-login">Login In</button>
				</div>
				<div class="login-account">
				
					
				</div>
			</div>
		</div>
        </form>
	
    </div>
</div>
</div>               


</body>


	<?php
           if(isset($_SESSION['name'])&&isset($_SESSION['Userimage'])&& !empty($_SESSION['Userimage']) && !empty($_SESSION['name'])){
                header("Location:index.php");
            }
            
            if(isset($_POST["login"]))
            {
                
   	
   	     	    include_once  __DIR__ . '/connectionDb.php';
                 
                $database = new connectionDb();
                $db = $database->getConnection();


                
                
                $username = $_POST["username"];
                $pass = $_POST["password"];
                

                
                
                $sql = "SELECT admin_user_id,user_name,secret_password,UserImage FROM `admin_user` WHERE user_name = '$username' ";
                
                
                $stmt = $db->prepare($sql);
                $stmt->execute();
                $itemCount = $stmt->rowCount();
 
                            // $newP=password_hash($passPost, PASSWORD_DEFAULT);

     

                if ($itemCount > 0) {
                    while($row= $stmt->fetch(PDO::FETCH_ASSOC)){
                        if (password_verify($pass,$row['secret_password'])) {
                            $_SESSION['name']=$row["user_name"];
                            $_SESSION['admin_user_id']=$row["admin_user_id"];
                            $_SESSION['Userimage']=$row["UserImage"];
                            $_SESSION['status']="logedin";
                            header("Location:index.php");
                        } else {
                            ?>
                            <script>document.getElementById('wrongPassword').innerHTML = '<span style="color:red">UserName or password not valid</span>';</script>
                            <?php
                        }
                     }
                }else{
                    ?>
                 <script>document.getElementById('wrongPassword').innerHTML = '<span style="color:red">UserName or password not valid</span>';</script>

               <?php
                }
          
                
            }

     

          ?>
	<?php include('include/footer.php') ?>
       