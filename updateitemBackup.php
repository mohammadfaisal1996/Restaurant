<?php include('include/header.php') ?>
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">Update item Data</h4>
            

     
                        <?php 
                                include_once  __DIR__ . '/connectionDb.php';
                                $database = new connectionDb();
                                $db = $database->getConnection();
  
                                static $im="https://bluefig.s3.eu-central-1.amazonaws.com/images/";
                    
                                static $age ="imagesitems/";
                            
                                if( isset($_GET['catID'])){
                                    $catID=$_GET['catID'];
                                    $branchID=$_GET['BranchesID'];
                                    
                                    
                 
                            


                          
                                    $sql ="SELECT 
                                    category_items_list.category_id,
                                    category_items_list.item_price,
                                     category_lang.category_title,
                                     category_items_list.category_image as ImageName 
                                     
                                      from category_items_list 
                                      JOIN category_lang  on category_lang.category_id = category_items_list.category_id
                                      where category_items_list.category_id=$catID and BranchesID=$branchID";

// where item_mapping.cat_id = $catid and category_items_list.category_list_type =1 and category_lang.language_code = 'en'
                                     $stmt = $db->prepare($sql);
                                     $stmt->execute();
                                     $itemCount = $stmt->rowCount();







                                   


                                     if ($itemCount > 0) {

                                       
                             
                                    while($row= $stmt->fetch(PDO::FETCH_ASSOC)){
                                 
            
            
            
                                    ?>

                        
			
					</div><br><br>                    
                       
                <div class="row">
                    <div class="offset-md-3 col-sm-12 col-md-6">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title " >Update  Data</h4><br>
                                   
                                    <br>
                             

                            
                                    </div>
 
                                    <br>
                                   <div class=" col-lg-12  col-md-8   col-sm-12">                    
                                       
                                   <form  method="post" enctype="multipart/form-data">

                                        <div class=" form-group  mb-1">

                                        <label for="inputFloatingLabel" style ="color:black!important" class="placeholder">Edit item Name</label>
                                        <input    type="text" value="<?php echo $row['category_title']?>"   name="item_title" class="form-control input-border-bottom" required="">                                   
                                        </div>

                                        <div class=" form-group  mb-1">

                                        <label for="inputFloatingLabel" style ="color:black!important" class="placeholder">Edit item price </label>
                                        <input    type="text" value="<?php echo $row['item_price']?>"   name="item_price" class="form-control input-border-bottom" required="">   <span>JOD</span>                                
                                        </div>

                             

                                        <div class=" form-group  mb-1">

                                    
                                        <img src="<?php echo $im.$age.$row['ImageName']?>" width='175' height='200' />
                                        <br><br>
                                       <input type="file" name="file"   accept="image/x-png,image/gif,image/jpeg" />

                                        </div>
                                     
                                        <div class="custom-control " id="wrongSize" style="display:none">
                                        <span style="color:red">The size of the image must be less than 1 MB in order to be uploaded</span>


                                        </div>


                                    <div class=" form-group  mb-1">
                                    
									
                                    <button type="submit" name="updateData" class="btn btn-primary">Update</button>
                                    </div>


                                    </form>

                                    <?php  
                                         
                                        
                                    }  }  }
          
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
            
            



                require 'aws/aws-autoloader.php';   


                if(isset($_POST['updateData'])){

                   

               

                    $category_title= $_POST['item_title'];
                    $item_price= $_POST['item_price'];
                    $branchID=$_GET['BranchesID'];
                    $catID=$_GET['catID'];
                    
                    $catIDHead=$_GET['CATIDHEAD'];


              



                    $name= 'file';
                    $path ="uploads/pdf/";
                    $Imagelink = new addImage($name,$path);





                    if (empty($Imagelink->name))
                    {



                        $sql3 = "update category_lang set  category_title ='$category_title'   where category_id=$catID";
                        $stmt3 = $db->prepare($sql3);
                        if($stmt3->execute()){

                            $sql2 = "update category_items_list set  item_price =$item_price where category_id=$catID and BranchesID=$branchID  ";
                            $stmt2 = $db->prepare($sql2);
                            if($stmt2->execute()){

                            header("Location:Itemslist.php?CATID=$catIDHead");
                        
                            }


                        }


                   
                    }
                     if ($Imagelink->size < 1048576)
                    {
                        // echo "<script>alert(".$name.")</script>";
                        echo "<script>alert('sadsad2')</script>";


                  
               
              

                    if(isset($category_title)&&!empty($Imagelink->name)&&isset($item_price)){

                       
               
                   


               

                    $sql2 = "update category_items_list set  category_image ='".$Imagelink->getImageFullName()."',item_price=$item_price  where category_id=$catID and BranchesID=$branchID  ";
                    $stmt2 = $db->prepare($sql2);
                    if($stmt2->execute()){
                    

                       



                        $sql3 = "update category_lang set  category_title ='$category_title'  where category_id=$catID";
                        $stmt3 = $db->prepare($sql3);
                        if($stmt3->execute()){

                            $Imagelink->moveImage();
    
                            


                  


                  header("Location:Itemslist.php?CATID=$catIDHead");

                                

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
