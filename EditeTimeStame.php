<?php
ob_start();
include('include/header.php') ?>


<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">Tax Setting</h4>
            

                        
			
					</div><br><br>                    
                       
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title">Edit Tax</h4><br>
                                   
                                   

</div>

<form method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                 
                          <!-- <label class="bmd-label-floating p-3">Select :</label>
                          
                          <div class="btn-group " >
                                        <button  type="button" class="btn btn-default dropdown-toggle " data-toggle="dropdown">Select Day<span class="caret"></span></button>
                                        <ul class="dropdown-menu scrollable-menu" role="menu">
 
                                          <button onclick="getDay('Sunday')" class = "dropdown-item btn btn-secondary"    style='color:#FFA500;background-color:white' href="" >Sunday</button>
                                          <button onclick="getDay('Monday')" class = "dropdown-item btn btn-secondary"   style='color:#FFA500;background-color:white' href="" >Monday</button>
                                          <button onclick="getDay('Tuesday')" class = "dropdown-item btn btn-secondary"   style='color:#FFA500;background-color:white' href="" >Tuesday</button>
                                          <button onclick="getDay('Wednesday')" class = "dropdown-item btn btn-secondary"   style='color:#FFA500;background-color:white' href="" >Wednesday</button>
                                          <button onclick="getDay('Thursday')" class = "dropdown-item btn btn-secondary"   style='color:#FFA500;background-color:white' href="" >Thursday</button>
                                          <button onclick="getDay('Friday')" class = "dropdown-item btn btn-secondary"   style='color:#FFA500;background-color:white' href="" >Friday</button>
                                          <button onclick="getDay('Saturda')" class = "dropdown-item btn btn-secondary"   style='color:#FFA500;background-color:white' href="" >Saturda</button>


                                        </ul>
                                        &emsp; &emsp;  <span id="selectBranch" style="color:red">please select Branches <span>
        
            
         
                        </div> -->
                          
                       
                        <label  > &emsp; &emsp; From Time:  &emsp;</label>
                               <input type="time" id="date-input" name="FromTime" required class="btn btn-primary" /> 
                               <label  > &emsp; &emsp; To Time:  &emsp;</label>
                               <input type="time" id="date-input" name="ToTime" required class="btn btn-primary" /> 

                               <input type="hidden" name="branchID" value="<?php echo $_GET["branchid"] ?>">

                            

                               <div class="form-group">
                    <button  id="editeSub" name ="Stamp_settings" type="submit" class="btn btn-secondary pull-right" >Edit TimeStamp</button>
                     </div>
                            </div>   

                      </div>
    
                                          
                    <div class="clearfix"></div>
        
                  </form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
                <?php 


             //  upadte tax 

              if(isset($_POST['Stamp_settings'])){

                // $branchID

                  include_once  __DIR__ . '/connectionDb.php';
                  $database = new connectionDb();
                  $db = $database->getConnection();
         

                 if(isset($_POST['FromTime']) &&  isset($_POST["ToTime"]) &&  isset($_POST["branchID"]) ){
                    
                    $FromTime=$_POST['FromTime'];
                  $ToTime=$_POST["ToTime"];
            
             
                 
                  $branchID=$_POST["branchID"];

                  

                  $SQLU = "UPDATE `branches_store` SET timefrom = '$FromTime' , timeto = '$ToTime' WHERE serial_no = $branchID ";
                  $Stmt1 = $db->prepare($SQLU);
       
                  if($Stmt1->execute()){
                    header("location:TimeStamp.php");
                  }
                 
                 }
                

                    
                }
                
         
                ?>
                


    
    
<?php include('include/footer.php') ?>
       