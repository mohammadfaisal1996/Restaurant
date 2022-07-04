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
                     
                        <div class="form-group">
                            <label style="padding-top: 5px;" class="bmd-label-floating">Item Price</label>
                        
                          <input  id="app_name"  type="number" name="item_price" required class="form-control"  step="0.01">
                            
                        </div>
                      </div>



                









                       
                      <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label style="padding-top: 5px;" class="bmd-label-floating">Item Sub Title</label>
                            <input id="app_name" type="text" name="item_sub" class="form-control" >
                        </div>
                      </div>


                      <div class="col-sm-12 col-md-6">
                          <div class="form-group">
                          <label style="padding-top: 5px;" class="bmd-label-floating">Select branch </label>
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
                        <input type='file' name='file' accept="image/x-png,image/gif,image/jpeg" required>
                        </div>
                        </div>
                        <div class="custom-control " id="wrongSize" style="display:none">
                        <span style="color:red">The size of the image must be less than 500 KB  to be uploaded</span>


                        </div>

                        <div class=" col-sm-12 col-md-6">
                        <div class="form-group">
                        <label for="comment">ADD Description </label>
                        <textarea class="form-control" id="comment" rows="5" spellcheck="false"  name="Description">
                        </textarea>
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
                    
                      
                 <?php include('include/footer.php') ?>

                      
                      <?php
                     
                    

          
                        @require 'aws/aws-autoloader.php';


                        
                        if(isset($_POST["addItem"]))
                        {


                        if(isset($_POST['Branches_ID'])){
                            $branchid=$_POST['Branches_ID'];
                        }
                            
                            
                      
                            if(!empty($_POST['offerPrice'])){
                            $offerPrice=$_POST['offerPrice'];

                            }else{
                            $offerPrice=0;
                            }

                          




                        if(isset($_POST["item_name"])){
                           $name = $_POST["item_name"];
                        } 



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

                            if(isset($_POST['Description'])){
                                
                               $trimmed = trim(filter_var($_POST['Description'], FILTER_SANITIZE_STRING)); 


                              $Description=$trimmed;
                            }else{
                              $Description=NULL;
                            }

                            
                            
                          


                        if(isset($_FILES['file'])){


                            $nameImage= 'file';
                            $path ="uploads/images/imagesitems/";
                            $image = new addImage($nameImage,$path);


                        } 
                           
                        if(isset($_POST["item_price"])){
                            $price = $_POST["item_price"];
                        } 


                     

                            



                                                      include_once  __DIR__ . '/connectionDb.php';
                                                        $database = new connectionDb();
                                                      $db = $database->getConnection();
                                                      
                                                    
                                                      if($image->size <  524288){

                                                       $sql = "INSERT INTO `category_items_list`( `sort_no`, `is_reward_category`, `category_image`, `category_list_type`, `item_price`, `related_item`, `store_name`,offer_price,`points`,`BranchesID`,`discount`) VALUES (1,1,'".$image->name."',1,$price,0,'null',0,$point,$branchid,$offerPrice)";
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
                                                  
                          

                          
                                                      $sql2 = "INSERT INTO `category_lang`(`category_id`, `language_code`, `category_title`,`Ingredients`, `category_subtitle`,special,gluten,healthy,nuts,dairy,sugar,newone,yeast,whole) VALUES(last_insert_id(),'en','$name','$Description','$sub',$vehicle1,$vehicle2,$vehicle9,$vehicle3,$vehicle4,$vehicle5,$vehicle6,$vehicle7,$vehicle8)";
                                                      $stmt2 = $db->prepare($sql2);
                          
                                                      if( $stmt2->execute()){
                                                        echo "true2";
                                                      }
                                                    
                                                  
                                                      
                                                      $sql3 = "INSERT INTO `items_media`(`media_type`, `media_name`, `item_no`) VALUES('image','".$image->getImageFullName()."',last_insert_id())";
                                                      $stmt3 = $db->prepare($sql3);
                                                
                          
                                                      if($stmt3->execute()){
                                                        echo "true3";
                                                        header("location:items.php");
                                                      }
                          
                          
                                                      $image->moveImage();



                                                      }else{

                                                        ?>
                                                        <script>$("#wrongSize").show();</script>
                                                        <?php 
                                                }      

                        }
                        
                      ?>





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
                 