<?php
ob_start();

include('include/header.php') ?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
            

                        
			
					</div>   
                       
                    <div class="card-header card-header-warning">

                    <div class="col-12 makeBLack" >   
                    <br><h4 class="page-title" style="color:white">Add Item</h4><br>








                    
                    </div>
                      <form method="post" enctype="multipart/form-data">
                      <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label style="padding-top: 5px;" class="bmd-label-floating">Item Name</label>
                            <input id="app_name" type="text" name="item_name" class="form-control" required>
                        </div>
                      </div>

                      

                      <div class="col-sm-12 col-md-6">
                      <input type="radio"  name="priceType" value=1>
                        <div class="form-group">
                            <label style="padding-top: 5px;" class="bmd-label-floating">Item Price</label>
                            <input id="app_name" type="text" name="item_price" class="form-control" >
                        </div>
                      </div>



                      <div class="col-sm-12 col-md-6">
                      <input type="radio"  name="priceType"  value=2>


                      <div class=" form-group  mb-1">
                                        
                    <input type="text" class="form-group" id="ItemSize" placeholder="Item Size" >
                    <input type="text" class="number-only form-group"   id="ItemPrice"  placeholder="Price Size" >
                    <button class="btn btn-primary" type="button" id="sendButton">add</button><br>


                    <div style="height:300px;width:600px;background-color:white;max-height: 500px;overflow-y:auto">
                    <table class="table" style="">
                    <thead class=" text-secondary">


                    <th>Item Size</th>
                    <th>price</th>
                    <th>Action</th>
                    </thead>

                    <tbody id="ItemSizeTable">


                    </tbody>


                    </table>
                    </div>

                    <div>
                    </div>









                       
                      <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label style="padding-top: 5px;" class="bmd-label-floating">Item Sub Title</label>
                            <input id="app_name" type="text" name="item_sub" class="form-control" >
                        </div>
                      </div>


                      <div class="col-sm-12 col-md-6">
                          <div class="form-group">
                          <label style="padding-top: 5px;" class="bmd-label-floating">Select branche </label>
                          <?php
                        
                        include_once  __DIR__ . '/connectionDb.php';
                            $database = new connectionDb();
                            $db = $database->getConnection();
                            $sqlQ = "SELECT DISTINCT branches_store.serial_no as  ID,  branch_store_lang.branch_name as name FROM `branches_store` LEFT JOIN branch_store_lang on branch_store_lang.branch_code=branches_store.serial_no";
   
                            // $sqlQ = "SELECT serial_no ,`name` FROM `branches_store` ";
                            $stmt = $db->prepare($sqlQ);
                            echo "<select class='form-control' required name='Branches_ID'>";
                           if( $stmt->execute()){
                      
                              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                               ?>
                               <option value="<?php echo $row['ID'] ?>"><?php echo $row['name']?></option>
                               <?php
                            }
                          
                          }
                         ?>
                              </select>
                          
                       
                        
                        
                            </div>
                        </div>


                      <div class=" col-sm-12 col-md-6">
                        <div class="form-group">
                            <label style="padding-top: 5px;" class="bmd-label-floating">Item Offer price</label>
                            <input id="app_name" type="text" name="offerPrice" class="form-control" >
                        </div>
                      </div>
                          
                         
                      <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label style="padding-top: 5px;" class="bmd-label-floating">Item Point</label>
                            <input id="app_name" type="text" name="item_point" class="form-control">
                        </div>
                      </div>
                          <br>
                      
                          <div class=" col-sm-12 col-md-6">
                        <div class="form-group">
                        <input type='file' name='file' >
                        </div>
                        </div>
                        <br><br>

                        <div class=" col-sm-12 col-md-3">
                        <div class="form-group">
                            <label style="padding-top: 5px;" class="bmd-label-floating">Select custom</label><br>
                        </div>
                      </div>
                          <br>
                          <div class="col-md-12">
                          
                          special &nbsp<input type="checkbox" id="vehicle1" name="vehicle1" value=1 > healthy &nbsp<input type="checkbox" id="vehicle9" name="vehicle1" value=1 >
                          gluten &nbsp<input type="checkbox" id="vehicle1" name="vehicle2" value=1 >
                          nuts &nbsp<input type="checkbox" id="vehicle1" name="vehicle3" value=1 >
                          dairy &nbsp<input type="checkbox" id="vehicle1" name="vehicle4" value=1 >
                          sugar &nbsp<input type="checkbox" id="vehicle1" name="vehicle5" value=1 >
                          newone &nbsp<input type="checkbox" id="vehicle1" name="vehicle6" value=1 >
                          yeast &nbsp<input type="checkbox" id="vehicle1" name="vehicle7" value=1 >
                          whole &nbsp<input type="checkbox" id="vehicle1" name="vehicle8" value=1 >




                          
                          </div>

                        <div class="form-group">
                        <input name = "addItem" type="submit" class="btn btn-secondary pull-center" value="Add Item">
                       <a href="tables.php"  class="btn btn-secondary pull-center">Cancel</button></a>
                      </div>
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
                    
                      
                 
                      
                      <?php
                     
                    

          
                        @require 'aws/aws-autoloader.php';


                        
                        if(isset($_POST["addItem"]))
                        {



                            
                            $branchid=$_POST['Branches_ID'];
                      
                            if(!empty($_POST['offerPrice'])){
                            $offerPrice=$_POST['offerPrice'];

                            }else{
                            $offerPrice=0;
                            }

                            $name = $_POST["item_name"];

                            if(!empty($_POST["item_sub"])){
                            $sub = $_POST['item_sub'];
                            }else{
                            $sub="";
                            }
                            if(!empty($_POST["item_point"])){
                            $point = $_POST["item_point"];

                            }else{
                            $point=0;
                            }

                            
                            
                            $file_name = $_FILES['file']['name'];   
                            $temp_file_location = $_FILES['file']['tmp_name']; 


                            if($_POST['priceType'] == 1){

                     

                                                      $price = $_POST["item_price"];



                                                      echo "<H1>$name/$price/$sub/$point/$file_name/$branchid</H1>";
                                                      include_once  __DIR__ . '/connectionDb.php';
                                                        $database = new connectionDb();
                                                      $db = $database->getConnection();
                                                      
                                                    
                                                      $sql = "INSERT INTO `category_items_list`( `sort_no`, `is_reward_category`, `category_image`, `category_list_type`, `item_price`, `related_item`, `store_name`,offer_price,`points`,BranchesID,discount) VALUES (1,1,'$file_name',1,$price,0,'null',0,$point,$branchid,$offerPrice)";
                                                      $stmt = $db->prepare($sql);
                                                
                                                      if($stmt->execute()){
                                                        echo "true";
                                                      }
                          
                                                      // $last_id =  $id_add;
                                                      
                                                      if(isset($_POST['vehicle1'] ) && $_POST['vehicle1'] != 0 ){
                                                        $vehicle1=$_POST['vehicle1'];
                                                      }else{
                                                        $vehicle1=0;
                                                      }
                                                      if(isset($_POST['vehicle2'] ) && $_POST['vehicle2'] != 0 ){
                                                        $vehicle2=$_POST['vehicle2'];
                                                      }else{
                                                        $vehicle2=0;
                                                      }
                                                      if(isset($_POST['vehicle3'] ) && $_POST['vehicle3'] != 0 ){
                                                        $vehicle3=$_POST['vehicle3'];
                                                      }else{
                                                        $vehicle3=0;
                                                      }
                                                      if(isset($_POST['vehicle4'] ) && $_POST['vehicle4'] != 0 ){
                                                        $vehicle4=$_POST['vehicle4'];
                                                      }else{
                                                        $vehicle4=0;
                                                      }
                                                      if(isset($_POST['vehicle5'] ) && $_POST['vehicle5'] != 0 ){
                                                        $vehicle5=$_POST['vehicle5'];
                                                      }else{
                                                        $vehicle5=0;
                                                      }
                                                      if(isset($_POST['vehicle6'] ) && $_POST['vehicle6'] != 0 ){
                                                        $vehicle6=$_POST['vehicle6'];
                                                      }else{
                                                        $vehicle6=0;
                                                      }     if(isset($_POST['vehicle7'] ) && $_POST['vehicle7'] != 0 ){
                                                        $vehicle7=$_POST['vehicle7'];
                                                      }else{
                                                        $vehicle7=0;
                                                      }     if(isset($_POST['vehicle8'] ) && $_POST['vehicle8'] != 0 ){
                                                        $vehicle8=$_POST['vehicle8'];
                                                      }else{
                                                        $vehicle8=0;
                                                      
                                                    }
                                                    if(isset($_POST['vehicle9'] ) && $_POST['vehicle9'] != 0 ){
                                                      $vehicle9=$_POST['vehicle9'];
                                                    }else{
                                                      $vehicle9=0;
                                                    
                                                  }
                                                  
                          
                                                      
                          
                                                      $sql2 = "INSERT INTO `category_lang`(`category_id`, `language_code`, `category_title`, `category_subtitle`,special,gluten,healthy,nuts,dairy,sugar,newone,yeast,whole) VALUES(last_insert_id(),'en','$name','$sub',$vehicle1,$vehicle2,$vehicle9,$vehicle3,$vehicle4,$vehicle5,$vehicle6,$vehicle7,$vehicle8)";
                                                      $stmt2 = $db->prepare($sql2);
                          
                                                      if( $stmt2->execute()){
                                                        echo "true2";
                                                      }
                                                    
                                                  
                                                      
                                                      $sql3 = "INSERT INTO `items_media`(`media_type`, `media_name`, `item_no`) VALUES('image','$file_name',last_insert_id())";
                                                      $stmt3 = $db->prepare($sql3);
                                                
                          
                                                      if($stmt3->execute()){
                                                        echo "true3";
                                                        header("location:items.php");
                                                      }
                          
                          
                          
                          
                          
                                                      $s3 = new Aws\S3\S3Client([
                                                      'version' => 'latest',
                                                      'region'  => 'eu-central-1',
                                                      'credentials' => [
                                                      'key'    => 'AKIAJXBCMSSF7QPW2KCQ',
                                                      'secret' => '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'
                                                      ]
                                                      ]);


                                                      $bucketName = 'bluefig';

                                                      try {
                                                      $r = $s3->putObject([
                                                      'Bucket' => $bucketName,
                                                      'Key'    => "images/imagesitems/".$file_name,
                                                      'SourceFile' => $temp_file_location,
                                                      'ACL'    => 'public-read',
                                                      ]);
                                                      } catch (Aws\S3\Exception\S3Exception $e) {
                                                      echo "There was an error uploading the file $e.\n";
                                                      } 





                                                  
                                             



                            }elseif($_POST['priceType'] == 2){



                              $ItemSizeA=$_POST['ItemSizeA'];
                              $ItemPriceA=$_POST['ItemPriceA'];
                              $price=0;
                              $count1=0;
                              $count2=0;
                              
               

                              echo "<H1>$name/$price/$sub/$point/$file_name/$branchid</H1>";
                              include_once  __DIR__ . '/connectionDb.php';
                                $database = new connectionDb();
                              $db = $database->getConnection();
                              
                            
                              $sqlTB = "INSERT INTO `category_items_list`( `sort_no`, `is_reward_category`, `category_image`, `category_list_type`, `item_price`, `related_item`, `store_name`,offer_price,`points`,BranchesID,discount) VALUES (1,1,'$file_name',1,$price,0,'null',0,$point,$branchid,$offerPrice)";
                              $stmtTB = $db->prepare($sqlTB);
                        
                              if($stmtTB->execute()){
                                echo "true";
                              }
  
                              // $last_id =  $id_add;
                              
                              if(isset($_POST['vehicle1'] ) && $_POST['vehicle1'] != 0 ){
                                $vehicle1=$_POST['vehicle1'];
                              }else{
                                $vehicle1=0;
                              }
                              if(isset($_POST['vehicle2'] ) && $_POST['vehicle2'] != 0 ){
                                $vehicle2=$_POST['vehicle2'];
                              }else{
                                $vehicle2=0;
                              }
                              if(isset($_POST['vehicle3'] ) && $_POST['vehicle3'] != 0 ){
                                $vehicle3=$_POST['vehicle3'];
                              }else{
                                $vehicle3=0;
                              }
                              if(isset($_POST['vehicle4'] ) && $_POST['vehicle4'] != 0 ){
                                $vehicle4=$_POST['vehicle4'];
                              }else{
                                $vehicle4=0;
                              }
                              if(isset($_POST['vehicle5'] ) && $_POST['vehicle5'] != 0 ){
                                $vehicle5=$_POST['vehicle5'];
                              }else{
                                $vehicle5=0;
                              }
                              if(isset($_POST['vehicle6'] ) && $_POST['vehicle6'] != 0 ){
                                $vehicle6=$_POST['vehicle6'];
                              }else{
                                $vehicle6=0;
                              }     if(isset($_POST['vehicle7'] ) && $_POST['vehicle7'] != 0 ){
                                $vehicle7=$_POST['vehicle7'];
                              }else{
                                $vehicle7=0;
                              }     if(isset($_POST['vehicle8'] ) && $_POST['vehicle8'] != 0 ){
                                $vehicle8=$_POST['vehicle8'];
                              }else{
                                $vehicle8=0;
                              
                            }
                            if(isset($_POST['vehicle9'] ) && $_POST['vehicle9'] != 0 ){
                              $vehicle9=$_POST['vehicle9'];
                            }else{
                              $vehicle9=0;
                            
                          }   
                               
                              $id=$db->lastInsertId();





                              if(isset($ItemSizeA)&&isset($ItemPriceA)&&!empty($ItemPriceA)&&!empty($ItemPriceA)){
                                foreach($ItemSizeA as  $nameSize){
                            
                                    $count1++;
                                  
                                    foreach($ItemPriceA as $priceSize) {
                                        $count2++;
                                  
                                        if($count1 == $count2){
        
        
        
        
                    
                                            $SQLU = "INSERT INTO `ItemType`(`category_id`, `type`, `price`) VALUES ( $id,'$nameSize',$priceSize)";
                                            $Stmt1 = $db->prepare($SQLU);
                                            if($Stmt1->execute()){
        
                                                $SQLU2 = "update category_items_list set  IsSizes =1 where category_id=$id ";
                                                $Stmt2 = $db->prepare($SQLU2);
                                                $Stmt2->execute();
                                            }
                                          
                                        }
                                
                                    
                                        
                                    }
                                    $count2=0;
                                
                                }
        
                            }

                              $sql2 = "INSERT INTO `category_lang`(`category_id`, `language_code`, `category_title`, `category_subtitle`,special,gluten,healthy,nuts,dairy,sugar,newone,yeast,whole) VALUES($id,'en','$name','$sub',$vehicle1,$vehicle2,$vehicle9,$vehicle3,$vehicle4,$vehicle5,$vehicle6,$vehicle7,$vehicle8)";
                              $stmt2 = $db->prepare($sql2);
  
                              if( $stmt2->execute()){
                                echo "true2";
                              }






                            
                          
                              
                              $sql3 = "INSERT INTO `items_media`(`media_type`, `media_name`, `item_no`) VALUES('image','$file_name',last_insert_id())";
                              $stmt3 = $db->prepare($sql3);
                        
  
                              if($stmt3->execute()){
                                echo "true3";
                                header("location:items.php");
                              }
  
  
  
  
  
                              $s3 = new Aws\S3\S3Client([
                              'version' => 'latest',
                              'region'  => 'eu-central-1',
                              'credentials' => [
                              'key'    => 'AKIAJXBCMSSF7QPW2KCQ',
                              'secret' => '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'
                              ]
                              ]);


                              $bucketName = 'bluefig';

                              try {
                              $r = $s3->putObject([
                              'Bucket' => $bucketName,
                              'Key'    => "images/imagesitems/".$file_name,
                              'SourceFile' => $temp_file_location,
                              'ACL'    => 'public-read',
                              ]);
                              } catch (Aws\S3\Exception\S3Exception $e) {
                              echo "There was an error uploading the file $e.\n";
                              } 














                                            
                                          
                                            
                                         


                            }else{
                              ?>
                              <!-- <script>alert("Select Type of Price ")</script> -->
                               

                              <?php
                            
                            }

                           


                        
      
                                
        
                        }
                        
                      ?>

<?php include('include/footer.php') ?>




<script>
        


        $("#sendButton").click(function () {
          

        var ItemPrice=$("#ItemSize").val();
        var price=$("#ItemPrice").val();
        if(ItemPrice != 0 && price != 0){

          $("#ItemSizeTable").append("<tr><td><input type='hidden' name='ItemSizeA[]' value='"+ItemPrice+"'><p>"+ItemPrice+"</p></td><td><input type='hidden' name='ItemPriceA[]' value='"+price+"'><p>"+price+"</p>  </td><td><button id='delete'type='button'  class='btn btn-danger' onSubmit='return false'  onClick='deleteME(this)'><i class='fas fa-trash-alt'></i></button></td></tr>");

        }else{

          alert("Enter Item Size  and  price Size ");

        }
        });

            function deleteME(button){

            $(button).parent().parent().remove();
            }
    
        </script> 
                 