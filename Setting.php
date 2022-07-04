<?php include('include/header.php') ?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">Setting</h4>
                        
                        <ul class="breadcrumbs">
               
							<li class="separator">
								<i class=""></i>
                            </li>

							<li class="nav-item" class="h2" style="font-weight: bold;">
								<a href="SettingPoint.php">Points Setting</a>
                            </li>
                            
							<li class="separator">
								<i class=""></i>
                            </li>

                            <li class="separator">
								<i class=""></i>
                            </li>
                            
                            <li class="nav-item" style="font-weight: bold;" >
								<a href="TaxSetting.php" >Tax Setting</a>
                            </li>
                            
                            <li class="separator">
								<i class=""></i>
                            </li>
                            
                            <li class="nav-item" style="font-weight: bold;" >
								<a href="DeliveryFee.php" >Delivery Fee</a>
                            </li>
                            
                            <li class="separator">
								<i class=""></i>
                            </li>
                            

                            <li class="nav-item" style="font-weight: bold;" >
								<a href="TimeStamp.php" >TimeStamp Setting</a>
                            </li>
                            
                            <li class="separator">
								<i class=""></i>
                            </li>
                            
                            <li class="nav-item" style="font-weight: bold;" >
								<a href="SecretKey.php" >Secret Key</a>
							</li>

                                <li class="separator">
								<i class=""></i>
                            </li>
                            
                            <li class="nav-item" style="font-weight: bold;" >
								<a href="addBanner.php" >ADD banner</a>
							</li>
                        </ul>
                        
			
					</div><br><br>                    
                       
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">


                            <?php
                            include_once  __DIR__ . '/connectionDb.php';
                            $database = new connectionDb();
                            $db = $database->getConnection();
                            ?>


                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title">Edit Profile</h4><br>
                                    </div>

                                   <div class="col-sm-4"> 
                                    <form method="post" enctype="multipart/form-data">
                              
                                        <div class="form-group form-floating-label">
                                            <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom " required="" disabled>
                                            <label for="inputFloatingLabel" class="placeholder p-2">App  Name ( 
                                                <?php
                                                $sql = "select app_name from app_settings_lang where serial_no = 1";
                                                $stmt = $db->prepare($sql);
                                                $stmt->execute();
                                                $itemCount = $stmt->rowCount();

                                                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                                                print "<span style='font-weight:bold'>".$row[0]."</span>";

                                                }

                                                ?>

                                             )</label>
                                        </div>
                                   
                                  
                                    <div class="form-group form-floating-label">
										<input id="inputFloatingLabel" type="text" name="app_email" class="form-control input-border-bottom" >
                                        <label for="inputFloatingLabel" class="placeholder p2">App Email Address(
                                     <?php
                                            $sql3 = "select email from app_settings where serial_no = 1";
                                    $stmt3 = $db->prepare($sql3);
                                    $stmt3->execute();
                                    $itemCount3 = $stmt3->rowCount();
                                    
                                    while ($row3 = $stmt3->fetch(PDO::FETCH_NUM)) {
                                        print "<span style='font-weight:bold'>".$row3[0]."</span>";
                                    } 

                                    
                                ?>

                                        )</label>
                                    </div>


                                    <div class="form-group form-floating-label">
										<input id="inputFloatingLabel" name="android_v" type="text" class="form-control input-border-bottom" >
										<label for="inputFloatingLabel" class="placeholder p-2">Android version (
                                        <?php
                                        $sql2 = "select ver_android from app_settings where serial_no = 1";
                                        $stmt2 = $db->prepare($sql2);
                                        $stmt2->execute();
                                        $itemCount2 = $stmt2->rowCount();

                                        while ($row2 = $stmt2->fetch(PDO::FETCH_NUM)) {
                                            print "<span style='font-weight:bold'>".$row2[0]." V</span>";
                                        }
                                        ?>

                                        )</label>
                                    </div>

                                    <div class="form-group form-floating-label">
										<input id="inputFloatingLabel"  name="ios_v" type="text" class="form-control input-border-bottom" >
										<label for="inputFloatingLabel" class="placeholder p-2">IOS version(

                                            <?php
                                            $sql = "select ver_ios from app_settings where serial_no = 1";
                                            $stmt = $db->prepare($sql);
                                            $stmt->execute();
                                            $itemCount = $stmt->rowCount();
                                        ?>
                                         <?php
                                        $stmt->execute();
                                        $itemCount = $stmt->rowCount();
                                            while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                                                print "<span style='font-weight:bold'>".$row[0]." V</span>";
                                            }
                                            ?>

                                            )

                                        </label>
                                    </div>

                  
                                
                                    <div class="form-group">
                                    <button name="update_settings" type="submit" class="btn btn-primary  pullRight">update</button>
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
        if(isset($_POST["update_settings"]) )
        {
            $email = $_POST["app_email"];
            $and = $_POST["android_v"];
            $ios = $_POST["ios_v"];
            
            include_once  __DIR__ . '/connectionDb.php';
            $database = new connectionDb();
            $db = $database->getConnection();
            
            $re_email ="";
            $sql1 = "select email from app_settings where serial_no = 1";
            $stmt = $db->prepare($sql1);
            $stmt->execute();
            $itemCount = $stmt->rowCount();

                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    $re_email = $row[0];
            }
            
            if($email == "")
            {
                $email = $re_email;
            }
            
            $re_and="";
            $sql2 = "select ver_android from app_settings where serial_no = 1";
            $stmt2 = $db->prepare($sql2);
            $stmt2->execute();
            $itemCount2 = $stmt2->rowCount();
            
                while ($row = $stmt2->fetch(PDO::FETCH_NUM)) {
                    $re_and= $row[0];
            }
            
            if($and == "")
            {
                $and = $re_and;
            }
            
            
            $re_ios;
            $sql3 = "select ver_ios from app_settings where serial_no = 1";
            $stmt3 = $db->prepare($sql3);
                                    $stmt3->execute();
                                    $itemCount3 = $stmt3->rowCount();
                while ($row = $stmt3->fetch(PDO::FETCH_NUM)) {
                    $re_ios= $row[0];
            }
            
            if($ios == "")
            {
                $ios = $re_ios;
            }
            
            
            
                                                    
            $sql7 = "UPDATE `app_settings` SET `email` = '$email' , `ver_android` = '$and' , `ver_ios` = '$ios'";
            $stmt7 = $db->prepare($sql7);
            $stmt7->execute();


            $itemCount1 = $stmt7->rowCount();

            if($itemCount1 > 0){
                
                ?>

                <script>

                swal(" Data update!", " Data updated in Success!", "success").then(function(){
                location.reload();
                });




                </script>
            <?php
            }


            
        }
    
    ?>



       
        