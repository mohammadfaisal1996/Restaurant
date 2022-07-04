<?php include('include/header.php') ?>
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                       <br><br> <h4 class="page-title">Update branch Data</h4><br><br><br>
            

     
                        <?php 

                        if(isset($_GET['BranchID'])&&!empty($_GET['BranchID'])){
                            $BRAID=$_GET['BranchID'];
                        ?>
                        <?php
                                include_once  __DIR__ . '/connectionDb.php';
                                $database = new connectionDb();
                                $db = $database->getConnection();
  
                                $sql = "SELECT DISTINCT branches_store.Status,branches_store.tax,branches_store.serial_no as  ID,  branch_store_lang.branch_name as name,branch_store_lang.area_name,branches_store.store_Image,branches_store.phoneno,branch_store_lang.street_name FROM `branches_store` LEFT JOIN branch_store_lang on branch_store_lang.branch_code=branches_store.serial_no where branches_store.serial_no=$BRAID";
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
                                    <br><h4 class="card-title " >Update branch Data</h4><br>
                                   
                                    <br>
                             

                            
                                    </div>
 
                                    <br>
                                   <div class=" col-lg-12  col-md-8   col-sm-12">                    
                                       
                                   <form  method="post" enctype="multipart/form-data" >

                                        <div class=" form-group  mb-1">

                                        <label for="inputFloatingLabel" style ="color:black!important" class="placeholder">Edit branch Name</label>
                                        <input minlength="4"    type="text" value="<?php echo $row['name']?>"   name="branch_name" class="form-control input-border-bottom" required="">                                   
                                        </div>


                                        <div class=" form-group  mb-1">

                                        <label for="inputFloatingLabel" style ="color:black!important" class="placeholder">Edit phone Number </label>
                                        <input minlength="4"    type="text" value="<?php echo $row['phoneno']?>"   name="phoneno" class="form-control input-border-bottom" required="">                                   
                                        </div>

                                        <div class=" form-group  mb-1">

                                        <label for="inputFloatingLabel" style ="color:black!important" class="placeholder">Edit tax  </label>
                                        <input minlength="4"    type="text" value="<?php echo $row['tax']?>"   name="tax" class="form-control input-border-bottom" required="">                                   
                                        </div>
                                        <div class=" form-group  mb-1">
                                        <img src="<?php echo $row['store_Image']?>" width='185' height='200' />
                                        </div>

                                        
                                        
                                        <input class="mb-5" type="file" name="file"   accept="image/x-png,image/gif,image/jpeg" />



                                        <label calss="font-weight-bold"> Category Header : </label><br>

                                        <textarea   class="form-control mb-3"  rows="3"   name="street_name"><?php  echo  $row['street_name'] ?></textarea>
  
        

                                    
                              


                                    <div class=" form-group  mb-1">
                                    
									
                                    <button type="submit" name="updateBranch" class="btn btn-primary">Update</button>
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
            <?php 
                        }else{?>
                            <div class="row ">
                            <div class="">
                                <div class="card">
                        no data for this branch
                        </div></div></div>

                        <?php
                        
                        }
            ?>
            <?php include('include/footer.php') ?>

  
            <?php 
            
            



            require 'aws/aws-autoloader.php';   


            if(isset($_POST['updateBranch'])){

                
                $BranchID=$_GET['BranchID'];

                $branch_name=$_POST['branch_name'];
                $phoneno=$_POST['phoneno'];

                $tax=$_POST['tax'];



                if(!empty($_POST['street_name'])){
                        
                $street_name= trim(filter_var($_POST['street_name'], FILTER_SANITIZE_STRING));

                }else{

                $street_name= " ";

                }


                $name= 'file';
                $path ="uploads/images/branches/";
                $Image= new addImage($name,$path);



                if (empty($Image->size) )
                {
                    



                    $sql3 = "UPDATE `branches_store` SET `tax`=$tax,`phoneno`='$phoneno'  WHERE serial_no=$BranchID ";
                    $stmt3 = $db->prepare($sql3);
                    if($stmt3->execute()){


                        

                        $sql2 = "UPDATE `branch_store_lang` SET `branch_name`='$branch_name',street_name='$street_name' WHERE branch_code=$BranchID ";
                        $stmt2 = $db->prepare($sql2);
                        if($stmt2->execute()){

                            header("Location:Branches.php");

                    
                        }


                    }


               
                }
                 if ($Image->size < 1048576 && !empty($Image->size))
                {



              
           
          

                if(isset($phoneno)&&!empty($branch_name)&&isset($tax) && !empty($Image->name)){



               


           
                    $sql33 = "UPDATE `branches_store` SET `tax`=$tax,`phoneno`='$phoneno',store_Image='".$Image->getImageFullName()."'  WHERE serial_no=$BranchID ";
                    $stmt33 = $db->prepare($sql33);
                    if($stmt33->execute()){

                        $sql2 = "UPDATE `branch_store_lang` SET `branch_name`='$branch_name',street_name='$street_name' WHERE branch_code=$BranchID ";
                        $stmt2 = $db->prepare($sql2);
                        if($stmt2->execute()){

                          $Image->moveImage();


                            header("Location:Branches.php");

                        }
                    
                    }




                }
          
                }
                else
                {?>
                <script>$("#wrongSize").show();</script>
                <?php 
                }
            }
          
        




        ?>
          
 