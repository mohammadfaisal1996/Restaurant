<?php
ob_start();
include("security/security.php");
include("addImage.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>BlueFig</title>
     <meta charset="UTF-8">
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/logo/logo.jpg" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<!-- <script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script> -->

	<!-- CSS Files -->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/fontawesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/brands.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/solid.css">

	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/azzara.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">

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


	.overtable{
		height:auto;
	    max-height:800px!important;
	}

	.sidebar .nav>.nav-item a i {
    color: black;

}

.sidebar .nav>.nav-item a p {
    color: black;

}

.onoffswitch {
    position: relative; width: 93px;
    -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
}
.onoffswitch-checkbox {
    position: absolute;
    opacity: 0;
    pointer-events: none;
}
.onoffswitch-label {
    display: block; overflow: hidden; cursor: pointer;
    border: 2px solid #999999; border-radius: 46px;
}
.onoffswitch-inner {
    display: block; width: 200%; margin-left: -100%;
    transition: margin 0.3s ease-in 0s;
}
.onoffswitch-inner:before, .onoffswitch-inner:after {
    display: block; float: left; width: 50%; height: 32px; padding: 0; line-height: 32px;
    font-size: 19px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
    box-sizing: border-box;
}
.onoffswitch-inner:before {
    content: "ON";
    padding-left: 20px;
    background-color: #36003D; color: #FFFFFF;
}
.onoffswitch-inner:after {
    content: "OFF";
    padding-right: 20px;
    background-color: #EEEEEE; color: #999999;
    text-align: right;
}
.onoffswitch-switch {
    display: block; width: 17px; margin: 7.5px;
    background: #FFFFFF;
    position: absolute; top: 0; bottom: 0;
    right: 57px;
    border: 2px solid #999999; border-radius: 46px;
    transition: all 0.3s ease-in 0s; 
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
    margin-left: 0;
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
    right: 0px; 
}




.page-item.active .page-link {
    z-index: 1;
    color: #fff;
    background-color: #282a3c;
    border-color: #282a3c;
}

.sidebar .nav>.nav-item a {
    display: flex;
    align-items: center;
    color: #575962;
    padding: 0px 25px;
    width: 100%;
    font-size: 14px;
    font-weight: 400;
    position: relative;
    margin-bottom: 3px;
}

.sidebar .nav .nav-section .text-section {
    padding: 0px 30px;
    font-size: 11px;
    color: #727275;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: .5px;
    margin-bottom: 12px;
    margin-top: 20px;
}

.sidebar .nav>.nav-item a:focus i, .sidebar .nav>.nav-item a:hover i {
	color: rgb(255, 196, 0)!important;
}


#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}




/* Hide all steps by default: */
.tab {
  display: none;
}



#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}

.sidebar .nav>.nav-item.active>a {
    color: white!important;
    background: #282a3c;
}
.sidebar .nav>.nav-item.active>a p {
    color: white!important;
}
.sidebar .nav>.nav-item.active a i {
    color: white;
}



    </style>


</head>
<body>
	<div class="wrapper">
		<!--
			Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" data-background-color="purple">
			<!-- Logo Header -->
			<div class="logo-header">
				
				<a href="index.php" class="logo"><img src="../assets/img/logo/logo.jpg" width=20px;>
				<span style="color:white">BlueFig<span>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						
						
					
		
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="../assets/img/<?php @session_start();  echo $_SESSION['Userimage'];?>" alt=""  onerror="this.onerror=null; this.src='../assets/img/user.png'" class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<li>
									<div class="user-box">
										<div class="avatar-lg"><img src="../assets/img/<?php echo $_SESSION['Userimage'] ?>" alt="" onerror="this.onerror=null; this.src='../assets/img/user.png'" class="avatar-img rounded"></div>
										<div class="u-text">
										Administrator
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown-divider"></div>
									
									<a class="dropdown-item" href="userSetting.php">UserAccount</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="Setting.php">Setting</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" name="link" href="logout.php">Logout</a>

                                  
								</li>
							</ul>
						</li>
						
					</ul>
						
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

<?php 

function is_active($name){

    if(basename($_SERVER['PHP_SELF']) == $name){

      return "active";
     }
    }
?>


		<!-- Sidebar -->
		<div class="sidebar">
			
			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
		
					<ul class="nav">
                        
                        <li class="nav-item <?php echo is_active("index.php") ?>">
							<a href="index.php" class="Alinke active" >
								<i class="fas fa-th-large childItem"  ></i>
								<p>Dashboard</p>
							</a>
                        </li>
                        

						<li class="nav-section">
							<h4 class="text-section"><hr></h4>
                        </li>
                        

						<li class="nav-item <?php echo is_active("Setting.php") ?>">
							<a href="Setting.php">
								<i class="fas fa-cog"></i>
								<p>Setting</p>
								
							</a>
                        </li>

                        <li class="nav-section">
							<h4 class="text-section"><hr></h4>
                        </li>

						<li class="nav-item  <?php echo is_active("Branches.php") ?>">
							<a href="Branches.php">
								<i class="fas fa-store-alt"></i>
								<p>Branches</p>
								
							</a>
                        </li>

                        <li class="nav-section">
							<h4 class="text-section"><hr></h4>
                        </li>


                        <li class="nav-item <?php echo is_active("headCat.php") ?>">
							<a href="headCat.php">
							<i class="fas fa-clone"></i>
								<p>Category</p>
							</a>
                        </li>

                        <li class="nav-section ">
							<h4 class="text-section"><hr></h4>
                        </li>

                        <li class="nav-item <?php echo is_active("Customers.php") ?>">
							<a href="Customers.php">
								<i class="fas fa-users"></i>
								<p>Customers</p>
							</a>
                        </li>



               



                        		<li class="nav-section">
							<h4 class="text-section"><hr></h4>
                        </li>


                        <li class="nav-item <?php echo is_active("items.php") ?>">
							<a href="items.php">
							<i class="fas fa-clone"></i>
								<p>Items</p>
							</a>
                        </li>


                        <li class="nav-section">
							<h4 class="text-section"><hr></h4>
                        </li>

                        <li class="nav-item <?php echo is_active("Orders.php") ?>">
							<a href="Orders.php">
								<i class="fas fa-box-open"></i>
								<p>Orders</p>
							</a>
                        </li>



                        <li class="nav-section ">
							<h4 class="text-section"><hr></h4>
                        </li>

                        <li class="nav-item <?php echo is_active("Quote.php") ?>">
							<a href="Quote.php">
								<i class="fas fa-quote-left"></i>
								<p>Quote</p>
							</a>
                        </li>


                        <li class="nav-section">
							<h4 class="text-section"><hr></h4>
                        </li>

                        <li class="nav-item <?php echo is_active("VOR.php") ?>">
							<a href="VOR.php">
								<i class="fas fa-box-open"></i>
								<p>VOR</p>
							</a>
                        </li>

                        <li class="nav-section">
                        <h4 class="text-section"><hr></h4>
                        </li>

                        <li class="nav-item <?php echo is_active("Banner.php") ?>">
                        <a href="Banner.php">
                        <i class="fas fa-photo-video"></i>
                        <p>Banner</p>
                        </a>
                        </li>


						<li class="nav-section">
                        <h4 class="text-section"><hr></h4>
                        </li>

                        <li class="nav-item <?php echo is_active("slider.php") ?>">
                        <a href="slider.php">
						<i class="fas fa-images"></i>			
								 <p>Slider</p>
                        </a>
                        </li>


                        <li class="nav-section">
                        <h4 class="text-section"><hr></h4>
                        </li>

                        <li class="nav-item <?php echo is_active("Report.php") ?>">
                        <a href="Report.php">
            <i class="fas fa-file-alt"></i>
                        <p>Reports</p>
                        </a>
                        </li>
                   



                        <li class="nav-section">
							<h4 class="text-section"><hr></h4>
                        </li>

                        <li class="nav-item  <?php echo is_active("offer.php") ?>">
							<a href="offer.php">
							<i class="fas fa-percentage"></i>
								<p>Offer</p>
							</a>
                        </li>
                        

                   
<!-- 
                        <li class="nav-item">
							<a href="DeliveryBoy.php">
								<i class="fas fa-truck"></i>
								<p>Delivery Boy</p>
							</a>
                        </li> -->
                        

                        <!-- <li class="nav-section"> -->
							<!-- <h4 class="text-section"><hr></h4> -->
                            
                             <li class="nav-section">
							<h4 class="text-section"><hr></h4>
                        </li>

                        <li class="nav-item <?php echo is_active("FeedBack.php") ?>">
							<a href="FeedBack.php">
								<i class="fa fa-bell"></i>
								<p>FeedBack</p>
							</a>
                        </li>


                        <li class="nav-section">
                            <h4 class="text-section"><hr></h4>
                        </li>

                        <li class="nav-item <?php echo is_active("coupon.php") ?>">
                            <a href="coupon.php">
                                <i class="fas fa-barcode"></i>
                                <p>Coupon</p>
                            </a>
                        </li>
                        

					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->