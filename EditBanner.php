<?php include('include/header.php') ?>
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                       <br><br> <h4 class="page-title">Update Banner Data</h4><br><br><br>
            

     
                        <?php 

                        if(isset($_GET['banner'])&&!empty($_GET['banner'])){
                            $banner=$_GET['banner'];
                        ?>
                        <?php
        

                                include_once  __DIR__ . '/connectionDb.php';
                                $database = new connectionDb();
                                $db = $database->getConnection();
  
                                $sql = "SELECT * FROM `banner` where id =$banner";
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
                                    <br><h4 class="card-title " >Update Banner Data</h4><br>
                                   
                                    <br>
                             

                            
                                    </div>
 
                                    <br>
                                   <div class=" col-lg-12  col-md-8   col-sm-12">                    
                                       
                                   <form  method="post" enctype="multipart/form-data" >

            


                                        <div class=" form-group  mb-1">

                                        <label for="inputFloatingLabel" style ="color:black!important" class="placeholder">Description </label>
                                                 <textarea id="w3review" class="form-control"  name="description" rows="4" cols="50"><?php echo $row['description'] ?></textarea>

                                        </div>

                                 
                                        <div class=" form-group  mb-1">
                                        <img src="<?php echo $row['banner']?>" width='185' height='200' />
                                        </div>

                            
                                        
                                        <input class="mb-5" type="file" name="file"   accept="image/x-png,image/gif,image/jpeg" />
  
        

                                    
                              


                                    <div class=" form-group  mb-1">
                                    
									
                                    <button type="submit" name="updateBanner" class="btn btn-primary">Update</button>
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
                        no data for this banner
                        </div></div></div>

                        <?php
                        
                        }
            ?>
            <?php include('include/footer.php') ?>

  
            <?php 
            
            



            require 'aws/aws-autoloader.php';   


            if(isset($_POST['updateBanner'])){

                
                $banner_ID=$_GET['banner'];


                if(!empty($_POST['description'])){
                        
                $description= trim(filter_var($_POST['description'], FILTER_SANITIZE_STRING));

                }else{

                $description= " ";

                }
                
        
  
               
              





                $name= 'file';
                $path ="uploads/images/imagesitems/";
                $image = new addImage($name,$path);




                

             

                

                if (empty($image->name))
                {
                    



                    $sql3 = "UPDATE `banner` SET `description`='$description'   WHERE id=$banner_ID ";
                    $stmt3 = $db->prepare($sql3);
                    if($stmt3->execute()){


                    
                            
                            header("Location:Banner.php");
                    
                        


                    }


               
                }else{



                      if ($image->size < 1048576)
                {
                   
            

              
           
          

                if(isset($image->name)){

                   
           
               



                    $sql33 = "UPDATE banner SET description='$description',banner='".$image->getImageFullName()."'   WHERE id=$banner_ID ";
                    $stmt33 = $db->prepare($sql33);
                    if($stmt33->execute()){
                    
              


                          $image->moveImage();


                            
                            header("Location:Banner.php");
                    
                        
                    
                    }




                }
          
                }
                else
                {?>
                <script>$("#wrongSize").show();</script>
                <?php 
                }
                
                }
               
            }
          
        




        ?>
          
 