<?php 

include('include/header.php');

include_once  __DIR__ . '/connectionDb.php';
$database = new connectionDb();
$db = $database->getConnection();
?>
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                 <div class="page-header">
                        <h4 class="page-title">Add banner</h4>
                        
                        <ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
                            </li>
							<li class="nav-item" >
								<a href="index.php" >Dashboard</a>
							</li>

                                   <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                            </li>

                            <li class="nav-item" >
                            </li>
                
                        </ul>
                        
			
					</div>  

                    <br><br>                    
                       
                <div class="row">
                    <div class="offset-md-3 col-sm-12 col-md-6">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title " ><i class="fas fa-edit"></i></h4><br>
                                   
                                    <br>
                             

                            
                                    </div>
 
                                    <br>
                                   <div class=" col-lg-12  col-md-8   col-sm-12">    




                              






         
                                   <form  method="post"  enctype="multipart/form-data" id="image" >
                                   
                                   
                                   Select banner Image:<br><br><br>
                                   <input type="file" calss="mb-5" name="file"   required class="mb-4" accept="image/x-png,image/gif,image/jpeg" /><br>



                                       
                                         <div class="offset-4 col-sm-4"><h3>Navigation to category </h3></div>
                                        <div class="uploadImageDiv form-group  mb-1"  style="height:500px;background-color:white;max-height: 500px;overflow-y:auto">
                                                    
                                       
                                       <br><br>
                                       <?php 
                                                                   if($_GET['offer_type']==2){
                                                    //2 == parcent 

                                                    $offer_id=$_GET['ofID'];
                                                    $sqlOFFER="SELECT DISTINCT `category_id` FROM `ItemOFFER` where offerID=$offer_id ";

                                                 
                                                

                                                

                                                    $stmtOFFER = $db->prepare($sqlOFFER );
                                                    $stmtOFFER ->execute();
                                                    $itemCountOFFER  = $stmtOFFER ->rowCount();
        
                                                    if ($itemCountOFFER  > 0) {?>
                                                      

                                                    <?php
                                                     
        
                                                    while($rowOFFER  = $stmtOFFER ->fetch(PDO::FETCH_ASSOC)) {
                                                      

                                                         if(!empty($rowOFFER['category_id'])&& $rowOFFER['category_id'] != NULL ){
                                                            //category....
                                                            $category_id=$rowOFFER['category_id'];

                                                            ?>
                                                                   <table class="table ">
                                                                    <thead class=" text-secondary ">
                                                                    <th>-</th>
                                                                    <th>Category Image</th>
                                                                    <th>Category Name</th>
                                                                    </thead>
                                                                    <tbody>
                                                           
                                                                    <td><input type="radio"  value='<?php echo $rowOFFER['category_id'] ?>' name="RadiOITEM" required></td>

                                                                    <?php 
                                                                    $GETIMAGE ="SELECT  category_lang.category_title,category_items_list.category_image as ImageName from category_items_list JOIN category_lang  on category_lang.category_id = category_items_list.category_id where  category_items_list.category_id=$category_id"; 
                                                                    $getimagestm = $db->prepare($GETIMAGE );
                                                                    $getimagestm ->execute();
                                                                    $rowimage  = $getimagestm ->fetch(PDO::FETCH_ASSOC);
                                                                    echo "<td><img class='mr-5' src='",$rowimage['ImageName'],"' width='75' height='75' /></td>";
                                                                    echo "<td>".$rowimage['category_title']."</td>";?>
                                                                    </tbody>
                                                                    </table>
                                                                    
                                                                    <?php
                                                                 

                                                        }else{?>


                                                     <table class="table ">
                                                                <thead class=" text-secondary ">
                                                                <th>-</th>
                                                                <th>Item Image</th>
                                                                <th>Item Name</th>
                                                                <th>Item Price</th>
                                                                

                                                                </thead>

                                                                <tbody>
                                                           <?php
                                                            static $im="https://bluefig.s3.eu-central-1.amazonaws.com/images/";

                                                            static $age ="imagesitems/";
                                                         
                                                            
                                                            $sqlOFFERITEM="SELECT DISTINCT `itemid` FROM `ItemOFFER` where offerID=$offer_id ";
        
                                                         
                                                         
                                                            $stmtOFFERITEM = $db->prepare($sqlOFFERITEM );
                                                            $stmtOFFERITEM ->execute();
                                                            $itemCountOFFERITEM  = $stmtOFFERITEM ->rowCount();
                
                                                            if ($itemCountOFFERITEM  > 0) {
                                                             
                
                                                            while($rowOFFERitem  = $stmtOFFERITEM ->fetch(PDO::FETCH_ASSOC)) {
                                                                $item=$rowOFFERitem['itemid'];
                                                                ?>




                                                        
                                                                
                                                                
                                                            


                                                            <?php
                                                             
                                                            $sqlOFFERCAT2 ="SELECT 
                                                            category_items_list.category_id,
                                                            
                     
                                                            category_items_list.BranchesID,
                                                            category_items_list.IsSizes,
                                                          
                                                            category_items_list.Deliveryfree,
                     
                                 
                                                            
                                                            category_items_list.item_price,
                                                             category_lang.category_title,
                                                           
                                                             category_items_list.category_image as ImageName 
                                                             
                                                              from item_mapping 
                                                              JOIN category_items_list on category_items_list.category_id=item_mapping.item_id 
                                                              JOIN category_lang  on category_lang.category_id = category_items_list.category_id
                                                              
                                                              where category_items_list.category_id=$item ";

                                                             
                                                            $stmtOFFERCAt2 = $db->prepare($sqlOFFERCAT2);
                                                            $stmtOFFERCAt2 ->execute();

                                                            while($itemsOFFERCAT  = $stmtOFFERCAt2->fetch(PDO::FETCH_ASSOC)) {
                                                              ?>

                                                                  
                                                             <tr id="D<?php echo $itemsOFFERCAT["category_id"] ?>">
                                                                
                                                                
                                                                <td><input type="radio"  value='<?php echo $itemsOFFERCAT['category_id'] ?>' name="RadiOITEM" required></td>
       



                                                                <?php
                                                                  echo "<td>";
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  echo "<img src='",$im.$age.$itemsOFFERCAT['ImageName'],"' width='75' height='75' />"."</td><td>"
                                                                . $itemsOFFERCAT["category_title"]. "</td>"?>
                                                                
                                                                
                                                                 <?php
                                                                 
                                                                 if($itemsOFFERCAT['IsSizes'] == 1){
                    
                                                                  $IDD=$itemsOFFERCAT['category_id'];
                    
                                                                  $sqlDD="SELECT  `type` FROM `ItemType` WHERE category_id=$IDD";
                                                                  $stmtDD = $db->prepare($sqlDD);
                                                                  $stmtDD->execute();
                    
                                                                  $sqlDD2="SELECT  `price` FROM `ItemType` WHERE category_id=$IDD";
                                                                  $stmtDD2 = $db->prepare($sqlDD2);
                                                                  $stmtDD2->execute();
                    
                                                                  echo " <td><table>";
                    
                                                                  while($rowSize=$stmtDD->fetch(PDO::FETCH_ASSOC)){
                                                                   ?>
                                                                <th><?php echo $rowSize['type']?></th>         
                                                                <?php
                                                                  }
                                                                  echo "<tr>";
                    
                                                                  while($rowSize2=$stmtDD2->fetch(PDO::FETCH_ASSOC)){
                                                                    ?>
                                                                    <td><?php echo $rowSize2["price"]?>JOD</td>
                            
                                                                 <?php
                                                                   }
                                                                   echo "</tr>";
                    
                                                                 echo "</table> </td>"; 
                                                                 }else{
                    
                                                                 echo "<td>".$itemsOFFERCAT['item_price']."JOD</td>";
                                                               
                                                                }
                                                                 
                                                                 
                                                                 ?>
                                                                 </tr>
                                                                


                                                               
                                                            <?php
                                                            }
                                                            ?>


                                                      
 

                    
                                                            <?php


                                                            }

                                                            ?>

                                                            </tbody>
                                                            </table>


                                                            <?php


                                                          }

                                                  
                                                   


                                                        }

                                                         }



                                                      }
                                                    }elseif($_GET['offer_type']==1){
                                                        // 1 == delivery
   
   
                                                        static $im="https://bluefig.s3.eu-central-1.amazonaws.com/images/";

                                                        static $age ="imagesitems/";
   
                                                        $offer_id=$_GET['ofID'];
                                                       $sqlOFFER="SELECT DISTINCT `category_id` FROM `ItemOFFER` where offerID=$offer_id ";
   
                                                    
                                                   
   
                                                       $stmtOFFER = $db->prepare($sqlOFFER );
                                                       $stmtOFFER ->execute();
                                                       $itemCountOFFER  = $stmtOFFER ->rowCount();
           
                                                       if ($itemCountOFFER  > 0) {
                                                        
           
                                                       while($rowOFFER  = $stmtOFFER ->fetch(PDO::FETCH_ASSOC)) {?>

                                                           
                                                            <?php 
                                                            if(!empty($rowOFFER['category_id'])&& $rowOFFER['category_id'] != NULL ){
                                                               //category....
                                                               $category_id=$rowOFFER['category_id'];
   
                                                               ?>
                                                           
                                                                 <table class="table ">
                                                                <thead class=" text-secondary ">
                                                                <th>-</th>
                                                                <th>Category Image</th>
                                                                <th>Category Name</th>
                                                                </thead>
                                                                <tbody>
                                                                      <td><input type="radio"  value='<?php echo $rowOFFER['category_id'] ?>' name="RadiOITEM" required></td>

                                                                       <?php 
                                                                       
                                                                       $GETIMAGE2 ="SELECT  category_lang.category_title,category_items_list.category_image as ImageName from category_items_list JOIN category_lang  on category_lang.category_id = category_items_list.category_id where  category_items_list.category_id=$category_id"; 
                                                                       $getimagestm2 = $db->prepare($GETIMAGE2 );
                                                                       $getimagestm2 ->execute();
                                                                       $rowimage2  = $getimagestm2 ->fetch(PDO::FETCH_ASSOC);
                                                                       echo "<td><img class='mr-5' src='",$im.$age.$rowimage2['ImageName'],"' width='75' height='75' /></td>";
                                                                       echo "<td>".$rowimage2['category_title']."</td>";
   
   
   
   
                                                                       
                                                                       ?>
                                                                    
                                                               
   
                                        
   
                                                                
   
                                                                   </tbody>
                                                                   </table>
                                                                   
                                                               
   
   
                                                          
   
   
   
                                                               <?php
                                                
                                                   
                                                            }else{?>
                                                        
                                                        <table class="table ">
                                                                   <thead class=" text-secondary ">
                                                                    <th>-</th>
                                                                    <th>Item Image</th>
                                                                    <th>Item Name</th>
                                                                    <th>Item Price</th>
                                                                   
   
                                                                   </thead>
   
                                                                   <tbody>
                                                              <?php
                                                                static $im="https://bluefig.s3.eu-central-1.amazonaws.com/images/";

                                                                static $age ="imagesitems/";
                                                                
                                                               
                                                               $sqlOFFERITEM="SELECT DISTINCT `itemid` FROM `ItemOFFER` where offerID=$offer_id ";
           
                                                            
                                                            
                                                               $stmtOFFERITEM = $db->prepare($sqlOFFERITEM );
                                                               $stmtOFFERITEM ->execute();
                                                               $itemCountOFFERITEM  = $stmtOFFERITEM ->rowCount();
                   
                                                               if ($itemCountOFFERITEM  > 0) {
                                                                
                   
                                                               while($rowOFFERitem  = $stmtOFFERITEM ->fetch(PDO::FETCH_ASSOC)) {
                                                                   $item=$rowOFFERitem['itemid'];
                                                                   ?>
   
   
   
   
                                                           
                                                                   
                                                                   
                                                               
   
   
                                                               <?php
                                                                
                                                               $sqlOFFERCAT2 ="SELECT DISTINCT
                                                               category_items_list.category_id,
                                                               category_items_list.ShowINslider,
                        
                                                               category_items_list.BranchesID,
                                                               category_items_list.IsSizes,
                                                               category_items_list.Status,
                                                               category_items_list.Deliveryfree,
                        
                                    
                                                               
                                                               category_items_list.item_price,
                                                                category_lang.category_title,
                                                                category_lang.Ingredients as Description,
                                                                category_items_list.category_image as ImageName 
                                                                
                                                                 from item_mapping 
                                                                 JOIN category_items_list on category_items_list.category_id=item_mapping.item_id 
                                                                 JOIN category_lang  on category_lang.category_id = category_items_list.category_id
                                                                 
                                                                 where category_items_list.category_id=$item ";
   
                                                                
                                                               $stmtOFFERCAt2 = $db->prepare($sqlOFFERCAT2);
                                                               $stmtOFFERCAt2 ->execute();
   
                                                               while($itemsOFFERCAT  = $stmtOFFERCAt2->fetch(PDO::FETCH_ASSOC)) {
                                                                 ?>
   
                                                                     
                                                                <tr id="D<?php echo $itemsOFFERCAT["category_id"] ?>">
          
                                                                <td><input type="radio"  value='<?php echo $itemsOFFERCAT['category_id'] ?>' name="RadiOITEM" required></td>

   
   
                                                                   <?php
                                                                     
                                                                     
                                                                    
                                                                     
                                                                     echo "<td><img src='",$im.$age.$itemsOFFERCAT['ImageName'],"' width='75' height='75' />" . "</td><td>"
                                                                   . $itemsOFFERCAT["category_title"]. "</td>"?>
                                                                   
                                                                
   
                                                                    </tr>
                                                                   
   
   
                                                                  
                                                               <?php
                                                               }
                                                               ?>
   
   
                                                         
    
   
                       
                                                               <?php
   
   
                                                               }
   
                                                               ?>
   
                                                               </tbody>
                                                               </table>
   
   
                                                               <?php
   
   
                                                             }
                                                            }
   
   
   
                                                         }
                                                       }
                                                         
   
   
   
   
   
   
   
   
   
    
   
   
                                                   }


                                                
                                            
                                                
                                                ?>
                                                         

                                      
                              



                                 
                                 







                                       




                                      

                                        </div>
                                        <button type="submit" name="AddImage" class="btn btn-primary">Add Banner</button>
                                        <div class="custom-control " id="wrongSize" style="display:none">
                                        <span style="color:red">The size of the image must be less than 1 MB in order to be uploaded</span>

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
            <?php include('include/footer.php') ?>








            <?php 
            
                require 'aws/aws-autoloader.php';   

                               


                //add image 

                if(isset($_POST['AddImage'])){

                   
                   if(isset($_POST['RadiOITEM'])&&!empty($_POST['RadiOITEM'])){

                    $category_id=$_POST['RadiOITEM'];
                    echo "<h1>////////////////$category_id</h1>";
                   }




                    $nameImage= 'file';
                    $path ="uploads/images/imagesitems/";
                    $image = new addImage($nameImage,$path);
                
                    if (empty($name))
                    {
          
                    {?>
                    <script>alert("Error ADD TO banner")</script>
                    <?php 
                    }

                    }


                   
                    
                     if ($image->size < 1048576)
                    {
                        echo "<h1>".$category_id."</h1>";

                  
               
              
                    $sql="INSERT INTO `banner`(`type`, `banner`, `status`,`category_id`) VALUES ('offer','".$image->getImageFullName()."',1,$category_id)";
                    $stm=$db->prepare($sql);
                    $stm->execute();

                    $image->moveImage();

                       ?>

            
                 

                    <script>location.replace("Banner.php");</script>  

                    <?php 

                    
              
                    }
                    else
                    {?>
                    <script>alert("image must be less Than 1 MB")</script>
                    <?php 
                    }
                }



                


            
              
















                   

               
                   



                   
          
              
            




            
            




            ?>











                                       


                                













