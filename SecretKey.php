<?php include('include/header.php') ?>



<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">SecretKey</h4>
            

                        
			
					</div><br><br>                    
                       
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title">Add SecretKey</h4><br>
                                    <br>

                                    <br>
                                    </div>

                                   <div class="col-lg-6  col-md-8   col-sm-12"> 
                                    <form method="post" enctype="multipart/form-data"><br><br>
                                       
                                        <div class="form-group form-floating-label mb-4">
                                            <input id="inputFloatingLabel" name="ValueKey"type="text" class="form-control input-border-bottom" required="">                                   

                                            <label for="inputFloatingLabel"  class="placeholder">Enter Key word</label>

                                        </div>
                                        <div class="form-group form-floating-label mb-4">
                                            <input id="inputFloatingLabel"  name="SecretKey" type="number" class="form-control input-border-bottom" required="">                                   

                                            <label for="inputFloatingLabel" class="placeholder">Enter Secret Value</label>

                                        </div>
                                        <div class="form-group form-floating-label mb-4">
                                            <input id="inputFloatingLabel" name="groupName" type="text" class="form-control input-border-bottom" required="">                                   

                                            <label for="inputFloatingLabel" class="placeholder">Enter group name</label>

                                        </div>

                              
                                                        <div class="form-group">
                                                            <div class="input-group m-3">
                                                                        <label class="mt-2">From :</label>&nbsp;&nbsp; 
                                                                        <input name="fromdate" type="datetime-local" class="form-control" >
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa-calendar"></i>
                                                                            </span>


                                                                            </div>&nbsp;&nbsp;<label class="mt-2">To :</label>&nbsp;&nbsp;  
                                                                            <input name="Todate"  type="datetime-local" class="form-control" >
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text">
                                                                                    <i class="fa fa-calendar"></i>
                                                                                </span>
                                                                                </div>
                                                                </div>
                                                        </div>
                                                    
                                        
                                                       
                                        <button name="Add_secret" type="submit" class="btn btn-primary  pullRight ">Add key</button>
                                        
                                        <a href="Setting.php" class="btn btn-primary pullRight">Cancel</a>
                                        
                                        <br><br><br>
                                    </form> 
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


           
             //  upadte tax 
       
              if(isset($_POST['Add_secret'])){

                // $branchID

            include_once  __DIR__ . '/connectionDb.php';
            $database = new connectionDb();
            $db = $database->getConnection();
                 


                 if( isset($_POST['ValueKey'])  && isset($_POST['SecretKey']) && isset($_POST['groupName']) && isset($_POST['fromdate']) && isset($_POST['Todate'])){     
                  $ValueKey=$_POST['ValueKey'];  
              
                  $secretKey=$_POST['SecretKey'];
                  $groupName=$_POST['groupName'];
                  $fromdate=date("Y-m-d H:i:s", strtotime($_POST['fromdate']));
                  $Todate=date("Y-m-d H:i:s", strtotime($_POST['Todate']));
                  
                  
                              
                  $SQLU = "INSERT INTO `secret_key`( `key_word`, `secret_value`, `group_name`, `from_date`, `to_date`) VALUES ('$ValueKey',$secretKey,'$groupName','$fromdate','$Todate')";

                  $Stmt1 = $db->prepare($SQLU);
                  $Stmt1->execute();

                  $itemCount2 = $Stmt1->rowCount();

                  if($itemCount2 > 0){
                      
                      ?>
      
                      <script>
      
                      swal(" Data Inserted!", " Data Inserted in Success!", "success").then(function(){
                      location.replace("index.php");
                      });
      
      
      
      
                      </script>
                  <?php
                  }

                 }
               

                    
                }
                
         
                ?>
       

  <script>
            function getBranchesID(item_no){
                
                
                document.cookie = 'branchesID' + '=' +escape( item_no ) + '; expires=Fri, 27 Jul 2021 02:47:11 UTC; path=/';
                
                
            }
            
      </script>


       
        