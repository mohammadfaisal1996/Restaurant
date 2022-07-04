<?php include('include/header.php') ?>
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">Update Admin Data</h4>
            

     
                        <?php 
                                include_once  __DIR__ . '/connectionDb.php';
                                $database = new connectionDb();
                                $db = $database->getConnection();
  
                                $username=$_SESSION['name'];
                                $PSword=$_GET['Node'];
                                $sql = "select * from admin_user where user_name='$username' and secret_password='$PSword'";
                                $stmt = $db->prepare($sql);
                                $stmt->execute();

                             
                                    while($row= $stmt->fetch(PDO::FETCH_ASSOC)){
                                 
            
            
            
                                    ?>

                        
			
					</div><br><br>                    
                       
                <div class="row">
                    <div class="offset-md-3 col-sm-12 col-md-6">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title " >Update Admin Data</h4><br>
                                   
                                    <br>
                             

                            
                                    </div>
 
                                    <br>
                                   <div class=" col-lg-12  col-md-8   col-sm-12">                    
                                       
                                   <form  method="post" >

                                        <div class=" form-group  mb-1">

                                        <label for="inputFloatingLabel" style ="color:black!important" class="placeholder">Edit Admin Name</label>
                                        <input minlength="4"  onkeypress="return isNumberKey(event)"   type="text" value="<?php echo $row['user_name']?>"   name="AdminName" class="form-control input-border-bottom" required="">                                   
                                        </div>

                                        <div class=" form-group  mb-1">

                                        <label for="inputFloatingLabel" style ="color:black!important" class="placeholder">Edit Admin Email</label>
                                        <input  type="Email"  value="<?php echo $row['email_address'] ?>"  name="AdminEmail" class="form-control input-border-bottom" required="">                                   
                                        </div>

                                        <div class=" form-group  mb-1">

                                        <label for="inputFloatingLabel" style ="color:black!important" class="placeholder">Enter New password</label>
                                        <input  type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="at least one number and one uppercase and lowercase letter, and at least 8 or more characters"   name="lastPassword" class="form-control input-border-bottom" >                                   
                                        </div>
                                     
                                        <div class="custom-control " id="wrongPassword">


                                        </div>


                                    <div class=" form-group  mb-1">
                                    
									
                                    <button type="submit" name="passwordCheck" class="btn btn-primary">Update</button>
                                    </div>


                                    </form>

                                    <?php  
                                         
                                        
                                    }
                                    ?>
                                </div>
                            
                            </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
            </div>
            <?php include('include/footer.php') ?>

            <?php 
                 
                 if(isset($_POST['passwordCheck'])&&isset($_POST['AdminName'])&&isset($_POST['AdminEmail'])&&isset($_POST['lastPassword'])&& !Empty($_POST['lastPassword'])){
               
                    $userid=$_SESSION['admin_user_id'];
                    $AdminName=$_POST['AdminName'];
                    $AdminEmail=$_POST['AdminEmail'];
                  
    
                    $passPost=$_POST['lastPassword'];
                    $newP=password_hash($passPost, PASSWORD_DEFAULT);
                    $sql = "UPDATE `admin_user` SET `email_address`='$AdminEmail',`user_name`='$AdminName',`secret_password`='$newP'  where admin_user_id=$userid";
                    $stmt = $db->prepare($sql);
                    if($stmt->execute()){
                        $_SESSION['name']=$AdminName;
                        if ($stmt->rowCount() > 0){
                           
                            ?>
                            <script>

                            swal("Update Success!", "Update Admin Account success!", "success").then(function(){
                            location.replace("index.php");
                            });




                            </script>
                            <?php
                        }else{
                            ?>
                            <script>

                            swal("No Data update!", "No Data updated in admin account!", "info").then(function(){
                            location.replace("index.php");
                            });




                            </script>


                        <?php
                        
                        }
                        
      
                 
                        
                    }
                    
              
                }

                elseif(isset($_POST['passwordCheck'])&&isset($_POST['AdminName'])&&isset($_POST['AdminEmail'])){

                    $userid=$_SESSION['admin_user_id'];
                    $AdminName=$_POST['AdminName'];
                    $AdminEmail=$_POST['AdminEmail'];
                    
                    
            

                    
                    
                    $sql = " UPDATE `admin_user` SET `email_address`='$AdminEmail',`user_name`='$AdminName'  where admin_user_id=$userid";
                    $stmt = $db->prepare($sql);
                    if($stmt->execute()){
                        $_SESSION['name']=$AdminName;
                        if ($stmt->rowCount() > 0){
                          
                            ?>
                            <script>

                            swal("Update Success!", "Update Admin Account success!", "success").then(function(){
                            location.replace("index.php");
                            });




                            </script>
                            <?php
                        }else{
                            ?>
                            <script>

                            swal("No Data update!", "No Data updated in admin account!", "info").then(function(){
                            location.replace("index.php");
                            });




                            </script>


                        <?php
                        }
                      
                    }

                }
                
                    
 
    
            
            
            ?>
        
          
 