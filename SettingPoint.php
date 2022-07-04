<?php include('include/header.php') ?>



<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">Edit Points</h4>
                        

                        
			
					</div><br><br>                    
                       
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title">Edit Points</h4><br>
                                    </div>

                                   <div class="col-lg-6  col-md-8   col-sm-12"> 
                                    <form method="post" enctype="multipart/form-data">
                                       
                                        <div class="form-group form-floating-label mb-4">
                                            <input id="inputFloatingLabel" name="reg" type="text" class="form-control input-border-bottom" required="">                                   

                                            <label for="inputFloatingLabel" class="placeholder">Register Point</label>
                                            <button name="update_reg" type="submit" class="btn btn-primary  pullRight ">Change Points</button>

                                        </div>

                                

                                    </form> 
                                    
                                    <form method="post" enctype="multipart/form-data">

                                    <div class="form-group form-floating-label mb-4">
                                    <input id="inputFloatingLabel"  name="freind"type="text" class="form-control input-border-bottom" required="">
                                    <label for="inputFloatingLabel" class="placeholder">Invite Friend Point</label>
                                    <button name="update_fr" type="submit" class="btn btn-primary  pullRight ">Change Points</button>

                                    </div>
                            

                                    </form> 



                                    <form method="post" enctype="multipart/form-data">

                                    <div class="form-group form-floating-label mb-4">
                                    <input id="inputFloatingLabel" type="text" name="delivery" class="form-control input-border-bottom" required="">
                                    <label for="inputFloatingLabel" class="placeholder">Delivery Point</label>
                                    <button name="update_del" type="submit" class="btn btn-primary  pullRight ">Change Points</button>
 
                                </div>
              

                                    </form> 

                                <form method="post" enctype="multipart/form-data">

                                <div class="form-group form-floating-label mb-4">
                                <input id="inputFloatingLabel" type="text" name="order" class="form-control input-border-bottom" required="">
                                <label for="inputFloatingLabel" class="placeholder">Order Point</label>
                                <button name="update_or" type="submit" class="btn btn-primary  pullRight ">Change Points</button>

                                </div>
                          
                                </form> 


                                <div class="form-group">
                                <a href="Setting.php" class="btn btn-primary">Cancel</a>
                                </div>
                                  
                                 
                  
                                 
             
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
          
          
        if(isset($_POST["update_reg"]))
        {

        echo $_POST["update_reg"];
            $reg = $_POST["reg"];
           
            
     
            $sql = "UPDATE `app_settings` SET `register_point`= $reg";
            $stmt = $db->prepare($sql);
            $stmt->execute();
        }    
        
        if(isset($_POST["update_fr"]))
        {
            echo $_POST["update_fr"];
            
            $friend = $_POST["freind"];
            
            
  
            
            $sql = "UPDATE `app_settings` SET `invite_point`= $friend";
            $stmt = $db->prepare($sql);
            $stmt->execute();
        } 
        
        if(isset($_POST["update_del"]))
        {
            
            echo $_POST["update_del"];
            $dele = $_POST["delivery"];
            
            
            
     
            
            
            $sql = "UPDATE `app_settings` SET `delivery_point`= $dele";
            $stmt = $db->prepare($sql);
            $stmt->execute();
        }
        
        if(isset($_POST["update_or"]))
        {
            
            echo $_POST["update_or"];

            $order = $_POST["order"];
            
            
            
            
            $sql = "UPDATE `app_settings` SET `order_point`= $order";
            $stmt = $db->prepare($sql);
            $stmt->execute();
        }
        
    
    ?>
    

<?php include('include/footer.php') ?>
       
        