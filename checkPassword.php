<?php include('include/header.php') ?>
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">Account Setting</h4>
            

     

                        
			
					</div><br><br>                    
                       
                <div class="row">
                    <div class="offset-md-3 col-sm-12 col-md-6">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title " >check password</h4><br>
                                   
                                    <br>
                             

                            
                                    </div>
 
                                    <br>
                                   <div class=" col-lg-12  col-md-8   col-sm-12">                    
                                       
                                   <form  method="post" >
                                        <div class=" form-group  mb-1">

                                        <label for="inputFloatingLabel" style ="color:black!important" class="placeholder">Enter Current  password</label>
                                        <input id="inputFloatingLabel" type="password"    name="lastPassword" class="form-control input-border-bottom" required="">                                   
                                        </div>
                                     
                                        <div class="custom-control " id="wrongPassword">


                                        </div>


                                    <div class=" form-group  mb-1">

                                    <button type="submit" name="passwordCheck" class="btn btn-primary">Submit</button>
                                    </div>


                                    </form>
                                </div>
                            
                            </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
            </div>
        
            <?php 
                                include_once  __DIR__ . '/connectionDb.php';
                                $database = new connectionDb();
                                $db = $database->getConnection();
  
                                $username=$_SESSION['name'];
                                $sql = "select * from admin_user where user_name='$username'";
                                $stmt = $db->prepare($sql);
                                $stmt->execute();

                                
            
                                if(isset($_POST['passwordCheck'])){
                            
                            
                                    $lastPassword=$_POST['lastPassword'];

                                    
                                    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                            

                                        if (password_verify($lastPassword,$row['secret_password'])) {
                                            $data=$row['secret_password'];
                                            header("Location:updateData.php?Node=$data");
                                        } else {
                                            ?>
                 <script>document.getElementById('wrongPassword').innerHTML = '<span style="color:red"> password not valid</span>';</script>
                                            <?php
                                        }

                                    }

                                    
                                    
                                }
                                
                                
                                
                            
                                    ?>
            <?php include('include/footer.php') ?>