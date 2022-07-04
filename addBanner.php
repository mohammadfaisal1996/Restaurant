<?php 

include('include/header.php');
$baseUrl = new addImage("file","images/imagesitems/");



if($_SESSION['status'] != " "){
// header("Location:login.php");
// echo "<script>console.log('loged in ')</script>";

}else{

// echo "<script>console.log(' not loged in ')</script>";

}

include_once  __DIR__ . '/connectionDb.php';
$database = new connectionDb();
$db = $database->getConnection();




?>
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                 <div class="page-header">
                        <h4 class="page-title">Add Banner</h4>
                        
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
                                    <br><h4 class="card-title " >ADD  Banner</h4><br>
                                   
                                    <br>
                             

                            
                                    </div>
 
                                    <br>
                                   <div class=" col-lg-12  col-md-8   col-sm-12">    




                                    <!-- Select type  -->
                                    <form method="post">



                                    <select id="selectBannerType"  class="form-group">
                                    <option value="">Select type of Banner</option>
                                    <option value="image">photo link with category</option>
                                    <option value="offer">photo linke with  text</option>
                                    <option value="video">video</option>
                                    </select><br><br>

                            







                                    </form>   






                                    <!-- add image   -->

                                    <div id="image" style="display:none">
         
                                   <form  method="post" enctype="multipart/form-data" id="image" >
                                   
                                         <span style="font-size:14px">select image :</span> 
                                        <input class="mb-5" type="radio" value="selectImag" name=1 id="selectImage">


                                       
                                     
                                        <div class="uploadImageDiv form-group  mb-1" style="display:none">
                                                    
                                       
                                       <br><br>
                                       <?php 
                                         $sql = "SELECT * FROM `offer` ";
                                         $stmt = $db->prepare($sql);
                                         $stmt->execute();
                                         $itemCount = $stmt->rowCount();
                                       ?>
                                       <table id="offerRow" class="table">
                                        <thead class=" text-secondary">
                                       <th>-</th>
                                       <th>Offer name </th>
                                       <th>Offer type</th>  
                                       </thead>
                                       <tbody>
                                       <?php
                                     

                                       if ($itemCount > 0) {

                                       while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {?>

                                         <!-- offer_id -->
                                       <tr>  
                                       <input type="hidden" value="<?php echo $row['offer_type'] ?>"  name="offer_type">
                                       <td><input type="radio"  value='<?php echo $row['offer_id'] ?>' name="RadiOoffer" required></td>
                                       <td><?php echo $row['offerName'] ?></td>
                                       <td><?php  
                                                
                                                if($row['offer_type']==1){
                                                    echo "Delivery Free ";

                                                }elseif($row['offer_type']==2){
                                                    echo "Percent";
                                                }
                                               
                                               ?></td>
                                       </tr>
                                   
                                       




                                       <?php
                                       }}
                                       ?>
                                       </tbody>
                                       </table>

                                 







                                       




                                       <button type="submit" name="AddImage" class="btn btn-primary">Next</button>

                                        </div>
                                     
                                        <div class="custom-control " id="wrongSize" style="display:none">
                                        <span style="color:red">The size of the image must be less than 1 MB in order to be uploaded</span>

                                        </div>
                                        </form>



                                        
                                        <form  method="post" class="selectImageDiv" enctype="multipart/form-data" style="display:none;" >

                                       
                                         <input type="file"  class="form-group"  accept="image/x-png,image/gif,image/jpeg" name="bannerimage" required >



                                        <div class=" form-group  mb-1" style="width:600px; max-height: 600px;overflow-y:auto;background-color:white">
                                              <table class="table">
                                        <thead class=" text-secondary">
                                        <input class="form-control" id="myInput1" type="text" placeholder="Search..">

                                        <th>-</th>
                                        <th>#</th>
                                        <th>Category_image</th>
                                        <th>Category_title</th>
                                        <th>Category_sub_title</th>
                                      

                                      



                                        </thead>
                                        <tbody  id="myTable1">
                                        
                                       
                                    <div class="custom-control " id="wrongSizeVideo" style="display:none">
                                      <span style="color:red">The size of the video must be less than 11 MB  to be uploaded</span>
                                    </div>                <?php 

                                                      
                                                    
                                                          $sql = "SELECT DISTINCT
                                                          category_items_list.category_id
                                                         ,category_items_list.category_image
                                                         ,category_items_list.item_price
                                                         ,category_lang.category_title
                                                         ,category_lang.category_subtitle
                                                        
                                       
                                                         
                             
                                                         FROM category_items_list,category_lang where category_items_list.category_id = category_lang.category_id and category_list_type < 4";
                                                          $stmt = $db->prepare($sql);
                                                          if($stmt->execute()){
                                                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                                ?>
                                                    
                                           
    
                                                      <tr class="D<?php echo $row['category_id'] ?>">
                                                      
                                                      <td><input   type="checkbox" name='itemsBANNER[]' value="<?php echo $row['category_id'] ?>"></td>
                                                      <td><?php  echo $row['category_id']?></td>
                                                      <td><img     src="<?php echo $baseUrl->getBaseUrl().$row["category_image"] ?>" width='80' height='80' /></a></td>
                                                      <td><?php echo $row['category_title'] ?></td>
                                                     <td><?php echo $row['category_subtitle'] ?></td>

                                                      
                                                     


                                                      <td>

                                                      </td>


                                                      
                                                      
                                                      </tr>

                                                         
                                                          
                                                            <?php
                                                          }
                                                        }

                                            
                                            ?>

                                            

                                       
                                            
                                            
                                            
                                        
                                   
                                   </table>

                                        </div>




                                    <div class=" form-group  mb-1">
                                    </div>
                                       <button type="submit" name="uploadImagepost" class="btn btn-primary">Add Banner</button>


                                    </form>
                                    </div>





                                    <!-- add video -->
                                    <div id="video" style="display:none">

                                    <form  method="post" enctype="multipart/form-data" id="video" >



                                    <label for="url">upload your video :</label>

                                    <input type="file" name="video" id="url"
                                    accept="video/mp4,video/x-m4v,video/*"
                                    required>
                                    <div class="custom-control " id="wrongSizeVideo" >
                                      <span style="color:red">The size of the video must be less than 11 MB  to be uploaded</span>
                                    </div>
                        


                       

                                    <div class=" form-group  mb-1">


                                    <button type="submit" name="AddVideo" class="btn btn-primary">Add Banner</button>
                                    </div>


                                    </form>

                                    </div>
                                 
                                 <!-- add banner offer  -->
                                    <div id="offer" style="display:none">


                                                <form  method="post" enctype="multipart/form-data" id="offer" >

                                            

                                                <div class=" form-group  mb-1">
                                                        <textarea id="w3review" class="form-control"  name="offerText" rows="4" cols="50"></textarea>
                                                </div>
                                                
                                                <label for="url">upload  image:</label>
                                                <input type="file"  class="form-control" accept="image/x-png,image/gif,image/jpeg" name="offer_image" required >

                                                <div class="custom-control " id="wrongSizeVideo" >
                                                <span style="color:red">The size of the video must be less than 5 MB  to be uploaded</span>
                                                </div>

                                                <div class=" form-group  mb-1">
                                                <button type="submit" name="Addbanneroffer" class="btn btn-primary">Add Banner</button>
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
            </div>
            <?php include('include/footer.php') ?>








            <?php 
            
                require 'aws/aws-autoloader.php';   

                               


                //add image 

                if(isset($_POST['AddImage'])){

                   

               
                  

                    

                   


    


              

                        if(isset($_POST['RadiOoffer'])&&isset($_POST['offer_type'])){
                            $offer_type=$_POST['offer_type'];
                            $ofid=$_POST['RadiOoffer'];
                            ?>

                        <script>location.replace("bannerofferitems.php?offer_type=<?php echo $offer_type ?>&ofID=<?php echo $ofid ?>");</script>

                        <?php
                        }
               
              
                  

    

                       

            
                 

                     

                    

                    
            
                }



                


                if(isset($_POST['uploadImagepost'])&& isset($_POST['itemsBANNER']) && isset($_FILES['bannerimage']) ){

                     $itemsBANNER=$_POST['itemsBANNER'];


                    $name= 'bannerimage';
                    $path ="uploads/images/imagesitems/";
                    $image = new addImage($name,$path);






                                 if($image->size < 524288){


                                foreach($itemsBANNER as $item){

                                    $insertintoBAnn="INSERT INTO `banner`(`type`, `banner`, `status`,`category_id`) VALUES ('image','".$image->getImageFullName()."',1,'$item')";
                                    $stmintobann=$db->prepare($insertintoBAnn);
                                    if($stmintobann->execute()){
                                        $image->moveImage();
                                    }

                             


                                }?>
                                <script>location.replace("Banner.php");</script>  
                                <?php
                                 }else{
                                     echo "<script>alert('The size of the image must be less than 500 KB  to be uploaded')</script>";
                                 }


                }
              
















                 //add video 

                if(isset($_POST['AddVideo'])){

                       $checkVedio="SELECT id from banner where type='video'";
                       $stmchekVedio=$db->prepare($checkVedio);
                       $stmchekVedio->execute();
                           
                  

                       if($stmchekVedio->rowCount() > 0){
                            echo "<script>swal('Only one video can be uploaded.!', {icon: 'error'});</script>";
                       }else{
                        
                    
                     if (isset($_FILES['video']['name']))
                    {



                   $name= 'video';
                   $path ="uploads/video/";
                   $video = new addImage($name,$path);


                    

                 if($video->size < 11000000){


                    $sql="INSERT INTO `banner`(`type`, `banner`, `status`,`category_id`,`sort`) VALUES ('video','".$video->getImageFullName()."',1,1,1)";
                    $stm=$db->prepare($sql);
                    if($stm->execute()){
                       echo  $video->moveImage();
                        }

                      echo "<script>location.replace('Banner.php');</script>";
          
              
                    }
                    else
                    {?>
                    <script>alert("upload wrong size  Video")</script>
                    <?php 
                    }
                }
              
                     }
                
                }



                //add banner offer

                if(isset($_POST['Addbanneroffer'])&& isset($_FILES['offer_image']) && isset($_POST['offerText'])){
                                




                                 $name= 'offer_image';
                                 $path ="uploads/images/imagesitems/";
                                 $offerImage = new addImage($name,$path);


                                $descriptionOffer=trim(filter_var($_POST['offerText'], FILTER_SANITIZE_STRING));
                                    

                                 if($offerImage->size < 524288){
                                            $OfferBanner="INSERT INTO `banner`(`type`, `banner`, `status`,`category_id`,`description`) VALUES ('offer','".$offerImage->getImageFullName()."',1,1,'$descriptionOffer')";
                                            $stmOfferBanner=$db->prepare($OfferBanner);
                                            if($stmOfferBanner->execute()){

                                                $offerImage->moveImage();
                                               echo "<script>location.replace('Banner.php');</script>";

                                            }else{
                                                echo "<script>alert('can't add this banner')</script>";
                                            }

                                 }             
                        
                        
                }




            
            




            ?>







<script>

 $("#myInput1").on("keyup", function() {      
 var value = $(this).val().toLowerCase();
 $("#myTable1 tr").filter(function() {
 $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
 });

 }); 

 
$("#selectBannerType").on("change",function(){

    var type=$(this).val();
    if(type == "image"){
        $("#image").show();
         $("#video").hide();
         $("#offer").hide();

    }
    else if (type == "video") {
         $("#image").hide();
         $("#video").show();
         $("#offer").hide();

    }else if(type == "offer"){
               $("#offer").show();
               $("#image").hide();
                $("#video").hide();
    }
    

});

$("#selectImage").on("click",function(){


    
    
  $(".selectImageDiv").show();
  $(".uploadImageDiv").hide();


    

});

$("#UploadImage").on("click",function(){

$(".uploadImageDiv").show();
$(".selectImageDiv").hide();
  

    

});



                                       


                                




</script>
















