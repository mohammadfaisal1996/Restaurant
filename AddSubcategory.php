<?php

ob_start();

include('include/header.php') ?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
              
            

                        
			
					</div><br><br>           


          <div class="card-header card-header-warning">

            <div class="col-12 makeBLack" >   
            <br><h4 class="page-title" style="color:white">Add Sub Category</h4><br>
            </div>


          <form method="post" enctype="multipart/form-data">
                        <div class="col-md-3">
                          <div class="form-group">
                              <label style="padding-top: 5px;" class="bmd-label-floating">Title of Category</label>
                              <input id="app_name" required  type="text" name="title_cat" class="form-control" required>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label style="padding-top: 5px;" class="bmd-label-floating">Sub Title</label>
                              <input id="app_name"required  type="text" name="sub_title_cat" class="form-control" required>
                          </div>
                        </div>
                          <div class="col-md-3">
                          <div class="form-group">
                     
                          
                       
                        
                        
                            </div>
                        </div>

                        
                  


                          <br>
                        <!--
                        <input type="radio" id="Category" name="cat" value="Category">
                          <label for="Category">Category</label>
                          &nbsp; &nbsp; &nbsp; <input type="radio" id="Package" name="cat" value="Package">
                          <label for="Package">Package</label>
                          &nbsp; &nbsp; &nbsp; <input type="radio" id="Group" name="cat" value="Group">
                          <label for="Group">Group</label> 
                          <br>--><br>

                          <input type='file' required  name='file'  accept="image/x-png,image/gif,image/jpeg"  >
                          <br>
                                             <div class="custom-control " id="wrongSize" style="display:none">
                        <span style="color:red">The size of the image must be less than 500 KB  to be uploaded</span>
                        </div>
                          <br>
                          <input name = "cat_add" type="submit" class="btn btn-secondary pull-center" value="Add Category">
                        <a href="tables.php"  class="btn btn-secondary pull-center">Cancel</button></a>
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
            </div >
                      <?php include('include/footer.php') ?>
                      <?php
            

                      require 'aws/aws-autoloader.php';                       
                        if(isset($_POST["cat_add"]) && isset($_POST["title_cat"]) && isset($_POST["sub_title_cat"])&& isset($_FILES['file']['name']) ) 
                        {
                            // echo "<h1>afdsfadsf</h1>";

                            
                            $catmain=$_GET['catidMain'];
                            $Branchid=$_GET['Branchid'];

                            $title = $_POST["title_cat"];
                            $sub = $_POST["sub_title_cat"];
                  
                            
                  
                          


                            $nameImage= 'file';
                            $path ="uploads/images/imagesitems/";
                            $image = new addImage($nameImage,$path);

                            // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                            

                            
                            include_once  __DIR__ . '/connectionDb.php';
                            $database = new connectionDb();
                            $db = $database->getConnection();
              
                            
                            if($image->size <  524288){
                             
                              $sql = "INSERT INTO `category_items_list`( `sort_no`,`menuType`,
                              `is_reward_category`,
                               `category_master`, 
                               `category_image`, 
                               `category_list_type`, 
                               `item_price`, 
                               `related_item`,

                                `points`,offer_price,BranchesID) VALUES (1,2,0,$catmain,'".$image->name."',0,0,0,0,0,$Branchid)";
                                    $stmt = $db->prepare($sql);
                                    if($stmt->execute()){
                                    //   echo "<h1>ddddd2</h1>";
                                    }
                                      
                                    $id=$db->lastInsertId();
                                    $SQLU = "INSERT INTO `item_mapping`( `cat_id`, `item_id`) VALUES($catmain,$id)";
                                    $Stmt1 = $db->prepare($SQLU);
                                    if($Stmt1->execute()){
                                        // echo "dd";
                                    }
                          

                        
                            
                            $sql2 = "INSERT INTO `category_lang`(`category_id`, `language_code`, `category_title`, `category_subtitle`) VALUES($id,'en','$title','$sub')";
                            $stmt2 = $db->prepare($sql2);
                            
                            if($stmt2->execute()){
                            
                                header("Location:Itemslist.php?CATID=$catmain&branchid=$Branchid");
                            }

                             $image->moveImage();
                            
 
                            
                        }else{

                                                        ?>
                                                        <script>$("#wrongSize").show();</script>
                                                        <?php 
                                                }  
                    
                    
                    }
                      ?>




       
        
                   
    