<?php include('include/header.php') ?>
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">Account Setting</h4>
            

                                <?php 
                                include_once  __DIR__ . '/connectionDb.php';
                                $database = new connectionDb();
                                $db = $database->getConnection();
  
                                $username=$_SESSION['name'];
                                $sql = "select * from admin_user where user_name='$username'";
                                $stmt = $db->prepare($sql);
                                $stmt->execute();
                                    ?>

                        
			
					</div><br><br>                    
                       
                <div class="row">
                    <div class="offset-md-3 col-sm-12 col-md-6">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title">User Information</h4><br>
                                   
                                    <br>

                            
                                    </div>
 
                                    <br>
                                   <div class=" col-lg-12  col-md-8   col-sm-12"> 
                                    <form method="post" action="checkPassword.php" enctype="multipart/form-data">

                                        <?php
                                                 while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <div class=" form-group  mb-1">

                                        <label for="inputFloatingLabel" class="placeholder">User Name</label>
                                        <input id="inputFloatingLabel" type="text" value="<?php echo $row['user_name'] ?>" readonly  name="Username" class="form-control input-border-bottom" required="">                                   
                                        </div>

                                        <div class=" form-group  mb-1">

                                        <label for="inputFloatingLabel" class="placeholder">Email</label>
                                        <input id="inputFloatingLabel" type="email" value="<?php echo $row['email_address'] ?>" readonly name="Email" class="form-control input-border-bottom" required="">                                   
                                        </div>
                                        <div class=" form-group  mb-1">

                                        <label for="inputFloatingLabel" class="placeholder p-1">Password</label>
    
                                        <input id="inputFloatingLabel" type="password" name="password" value="<?php echo $row['secret_password'] ?>" readonly name="taxValue" class="form-control input-border-bottom" required="">                                   

                                        </div>

                                                
                                        <button name="update_settings" type="submit" id="update1" class="btn btn-primary  pullRight " >Update</button>
                                        
                                        <a href="index.php" class="btn btn-primary pullRight">Cancel</a>
                                        
                                        <br><br><br>
                                         <?php
                                        }
                                        ?>
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
    
    if(isset($_POST['update_settings'])&&!empty($_POST['update_settings'])){


        
        
        
    }
    
    
    
    ?>
    <?php include('include/footer.php') ?>