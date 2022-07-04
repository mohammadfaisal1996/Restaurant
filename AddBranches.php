<?php

include('include/header.php');


?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">Add Branches</h4>
                        
                        <ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
                            </li>
							<li class="nav-item" >
								<a href="index.php" >Dashboard</a>
							</li>
                            <li class="separator">
								<i class=""></i>
                            </li>
              <li class="nav-item" >
								<a href="AddTimeStamp.php"  style="font-weight:bold;font-size:15px" >Add Time Stamp</a>&nbsp&nbsp
							</li>


                      
                        </ul>
                        
			
					</div><br><br>                    
                       
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title">Add Branche</h4><br>
                                    </div>
                                        <form method="post" enctype="multipart/form-data">
                                    
                                  
                                        <div class="col-sm-12 col-md-8 col-lg-4">
                          <div class="form-group"> 
                          
                          <a href="SelectBranchesAddress.php">
                                <label style="padding-top: 5px;" class="bmd-label-floating">Select branche Address / (<?php 
                                    if(isset( $_COOKIE["address_Branches_lat"]) && isset($_COOKIE["address_Branches_lng"])){
                                      echo $_COOKIE["address_Branches_lat"] . " - " . $_COOKIE["address_Branches_lng"];         
                                    }
                              ?>)</label></br></br>
                                    <input id="app_name"  type="text" name="b_address" class="form-control"> 
                                </a>

                                </div>
                        </div>



                                            <div class="col-sm-12 col-md-8 col-lg-4">
                                                <div class="form-group">
                                                    <label for="Bname">Branche Name</label>
                                                    <input type="text" class="form-control" id="Bname"  name="bname"placeholder="Enter Name" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-8 col-lg-4">
                                                 <div class="form-group">
                                                    <label for="subname">Branche Sub Name</label>
                                                    <input type="text" class="form-control" id="subname" name="subname" placeholder="Enter Subname" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-8 col-lg-4">
                                                 <div class="form-group">
                                                    <label for="email2">Branche Email Address</label>
                                                    <input type="email"  name="email"class="form-control" id="email2" placeholder="Enter Email" required>
                                                    <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-8 col-lg-4">
                                                 <div class="form-group">
                                                    <label for="number">Branche Phone</label>
                                                    <input type="nubmer" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Enter Phone" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-8 col-lg-4">
                                                 <div class="form-group">
                                                    <label for="number">building number</label>
                                                    <input type="nubmer" class="form-control" id="phoneNumber" name="building" placeholder="Enter  building" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-8 col-lg-4">
                                                 <div class="form-group">
                                                    <label for="fileImage">Select Image</label>
                                                    <input type="file" class="form-control" name='file' accept="image/x-png,image/gif,image/jpeg" id="fileImage" placeholder="Enter Email" required>
                                                </div>
                                            </div>
                                            <div class="custom-control " id="wrongSize" style="display:none">
                                            <span style="color:red">The size of the image must be less than 500 KB  to be uploaded</span>
                                            </div>



                                            <div class="col-sm-12 col-md-8 col-lg-4">
                                            <div class="form-group">
                                            <button name="addBranches" type="submit" class="btn btn-primary pull-center ">submit</button>
                                            </div>
                                             </div>


                        </form>
                    </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
<?php include('include/footer.php') ?>
       
        
    <?php        
      



      require 'aws/aws-autoloader.php';


 
       

        if(isset($_POST["addBranches"]))
        {
  


         
              // $store_num = $_COOKIE["storeNUM"];
              $lat_b = $_COOKIE["address_Branches_lat"];
              $lng_b = $_COOKIE["address_Branches_lng"];

                function getaddress($lat,$lng)
                {

                    
                $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.$lat.','.$lng.'&sensor=false&key=AIzaSyDRZK7VleDaoPBkjdu2XbV08fUK0cnca1M';
                $json = @file_get_contents($url);
                $data=json_decode($json);
                $status = $data->status;
                if($status=="OK")
                {
                return $data->results[0]->formatted_address;
                }
                else
                {
                return false;
                }
                }

 
                if(isset($lat_b)&&isset($lng_b)){

                            
                    $lat= $lat_b; //latitude
                    $lng=$lng_b; //longitude
                    //longitude
                    $address= getaddress($lat,$lng);
                    if($address)
                    {
                    $areaname= $address;
                    }
                    else
                    {
                     $areaname= "Not found";
                    }

                }
     



  
              if(isset($_POST['subname'])&&isset($_POST['bname'])&&isset($_POST['email'])&&isset($_POST['phoneNumber'])&&isset($_POST['building']) &&isset($_FILES['file'])){
                                $subtitle=$_POST['subname'];
                                $name = $_POST["bname"];
                                $email = $_POST["email"];
                                $phone=$_POST["phoneNumber"];
                                $building=$_POST['building'];


                                $name= 'file';
                                $path ="uploads/images/branches/";
                                $image = new addImage($name,$path);
              }else{
                $subtitle="null";
              }


              
              

            
            //   @$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
              
                          
              include_once  __DIR__ . '/connectionDb.php';
              $database = new connectionDb();
              $db = $database->getConnection();


      if($image->size <  524288){
              $sql = "INSERT INTO `branches_store`(
                branch_type,
                mainbranch,
                 `branch_logo`,
                  `timefrom`, 
                  `timeto`,
                   `store_Image`, `tax`, `phoneno`, `vendorID`,country ) 
                 VALUES (0,1,'null',0,0,'".$image->getImageFullName()."',0,'$phone','null',1)";
              $stmt = $db->prepare($sql);      
              if($stmt->execute()){
               echo "Dd";
              }

   
              $last_id = $db->lastInsertId();

              $sql2 = "INSERT INTO `branch_store_lang`(
                branch_code,
                 `language_code`,
                  `branch_name`, 
                  `latitude`,
                   `Longitude`, `branch_sub_title`, `street_name`,buildingno,area_name ,`city_name`, `governorate_name`) 
                 VALUES ($last_id,'en','$name','$lat_b','$lng_b','$subtitle','null','$building','$areaname','Amman','Amman')";


              $stmt2 = $db->prepare($sql2);
            
              if($stmt2->execute()){
                  $image->moveImage();
                  header("Location:Branches.php");
            } 
              }else{

                    ?>
                    <script>$("#wrongSize").show();</script>
                    <?php 
            
            }

        }

              
              


                         


              
            
      

        
      ?>


