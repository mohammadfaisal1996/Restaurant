<?php include('include/header.php');

$baseUrl = new addImage("file","images/imagesitems/");

?>



<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">offer  Section</h4>
            

                        
			
					</div><br><br>                    
                       
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title">Add Offer </h4><br>
                                   
                                   
                                   
                                   
                                   
                                                <ul class="navbar-nav">
                                                <li class="nav-item dropdown">
                                                <a style="color: white" class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-list-ul" style="color:white;font-weight: 600;">&nbsp;</i>

                                                Choose an Branches
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownMenuLink">
                                                <?php
                                                include_once  __DIR__ . '/connectionDb.php';
                                                $database = new connectionDb();
                                                $db = $database->getConnection();

                                                $sql = "SELECT DISTINCT branches_store.serial_no as  ID,  branch_store_lang.branch_name as name FROM `branches_store` LEFT JOIN branch_store_lang on branch_store_lang.branch_code=branches_store.serial_no";
                                                $stmt = $db->prepare($sql);
                                                $stmt->execute();
                                                $itemCount = $stmt->rowCount();

                                                if ($itemCount > 0) {

                                                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                                echo "<button style='background-color:white;color:black' onclick=\"getBranchesID(".$row["ID"].")\" class = 'dropdown-item btn btn-secondary' href='' >".$row["ID"]." - ".$row["name"]."</button>";

                                                }

                                                }
                                                ?>
                                                </div>
                                                </li>
                                                </ul>
                                    <br>

                                    <br>
                                    </div><br>

                                   <div class="col-lg-6  col-md-8   col-sm-12 " style="margin-left: 205px;"> 
                                    <form method="post" enctype="multipart/form-data">


                                    <div class="form-group form-floating-label mb-4">
                                  

                                  <input type="text" name="offerName" minlength="5"  class="form-control input-border-bottom" placeholder="Offar Name " REQUIRED>

                                  </div>

                                    <div class="form-group form-floating-label mb-4">
                                            
                                     

                                            <select class="form-control" required="" name="offerType" onchange="SelectType(this)">                               <
                                   
                                            <option value="">Select Offer Type </option>
                                            <option value=1>Deleviry Free</option>
                                            <option value=2>By Percent</option>

                                              
                                                            
                                            </select>



                                        </div>
                                       
                                        <div class="form-group form-floating-label mb-4 col-sm-4" id="price" style="display:none">
                                            <input id="inputFloatingLabel"   type="number" min="0" max="100" step="any"name="offerPrice" class="form-control input-border-bottom" >                                   

                                            <label for="inputFloatingLabel" class="placeholder">offer price %</label>

                                        </div>
                           



                                        <div class="form-group form-floating-label mb-4">

                                                <div class="input-group m-3">

                                                        <label class="mt-2">Start Offer :</label>&nbsp;&nbsp; 
                                                        <input type="datetime-local" class="form-control" name="from" required> 
                                                        <div class="input-group-append">
                                                            </div>&nbsp;&nbsp;<label class="mt-2">End Offer:</label>&nbsp;&nbsp;  
                                                            <input type="datetime-local" class="form-control"  name="to" required>
                                                            <div class="input-group-append">
                                                                </div>


                                                    </div>                                
                                        </div>






                                        <div class="form-group form-floating-label mb-4">
                                            
                                     

                                            <select class="form-control" required="" name="offerTypeItems" onchange="SelectItems(this)">
                                            <option >Select Offer Effect On</option>
                                            <option value="1">Category</option>
                                            <option value="2">Items</option>
                                            </select>
                                        </div>
                                        <div class="   col-sm-12"  style ="width:auto; max-height: 600px;overflow-y:auto;background-color:white;display:none" id="items" > 
                                       <br> <h3>Select Items </h3>
                                              <input class="form-control" id="offerCategory" type="text" placeholder="Search..">
                                        <table class="table">
                                        <thead class=" text-secondary">
                                        <th>-</th>
                                        <th>#</th>
                                        <th>Item_image</th>
                                        <th>Item_title</th>
                                        <th>Price</th>
                                        </thead>
                                        <tbody  id="tableOfferCaegory">
                                            <?php 

                                                $ItemIDs=array();
                                                $SelectCatFormOFFER2="SELECT DISTINCT `itemid` FROM `ItemOFFER`";
                                                $stmtSelect2 = $db->prepare($SelectCatFormOFFER2);
                                                if($stmtSelect2->execute()){
                                                while($rowOFFER2 = $stmtSelect2->fetch(PDO::FETCH_ASSOC)) {
            
                                                    array_push($ItemIDs,$rowOFFER2['itemid']);

                                                }
                                                }
                                                          $sql = "SELECT DISTINCT
                                                          category_items_list.category_id
                                                         ,category_items_list.category_image
                                                         ,category_items_list.item_price
                                                         ,category_lang.category_title
                                                         ,category_lang.category_subtitle
                                                        
                                       
                                                         
                             
                                                         FROM category_items_list,category_lang where category_items_list.category_id = category_lang.category_id     and category_items_list.item_price != 0.00  and category_items_list.category_id NOT IN ( '" . implode( "', '" , $ItemIDs ) . "' )";
                                                          $stmt = $db->prepare($sql);
                                                          if($stmt->execute()){
                                                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                                ?>
                                                    
                                           
    
                                                      <tr class="D<?php echo $row['category_id'] ?>">
                                                      
                                                      <td><input   type="checkbox" name='Items[]' value="<?php echo $row['category_id'] ?>"></td>
                                                      <td><?php  echo $row['category_id']?></td>
                                                      <td><img     src="<?php echo $baseUrl->getBaseUrl().$row["category_image"] ?>" width='80' height='80' /></a></td>
                                                      <td><?php echo $row['category_title'] ?></td>
                                                      <td><?php echo $row['item_price'] ?></td>


                                                      <td>

                                                      </td>


                                                      
                                                      
                                                      </tr>

                                                         
                                                          
                                                            <?php
                                                          }
                                                        }
                                            ?>
                                            <?php 

                                            $sqlL = "SELECT DISTINCT
                                            category_items_list.category_id
                                           ,category_items_list.category_image
                                           ,category_items_list.item_price
                                           ,category_lang.category_title
                                          
                                           FROM category_items_list,category_lang where category_items_list.category_id = category_lang.category_id     and category_items_list.IsSizes = 1 and category_items_list.category_id NOT IN ( '" . implode( "', '" , $ItemIDs ) . "' ) ";
                                            $stmtL = $db->prepare($sqlL);
                                            if($stmtL->execute()){
                                              while($row22 = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                  ?>
                                      
                             

                                        <tr class="D<?php echo $row22['category_id'] ?>">
                                        
                                        <td><input   type="checkbox" name='Items[]' value="<?php echo $row22['category_id'] ?>"></td>
                                        <td><?php  echo $row22['category_id']?></td>
                                        <td><img     src="<?php echo $baseUrl->getBaseUrl().$row["category_image"] ?>" width='80' height='80' /></a></td>
                                        <td><?php echo $row22['category_title'] ?></td>
                                        <td><?php echo $row22['item_price'] ?></td>


                                        <td>

                                        </td>


                                        
                                        
                                        </tr>

                                           
                                            
                                              <?php
                                            }
                                          }

                              
                              ?>
                                            </tbody>

                                   </table>

                    </div>
                       

                    <div class="   col-sm-12"  style ="width:auto; max-height: 600px;overflow-y:auto;background-color:white;display:none" id="category" > 
                   <br> <h3>Select Category </h3>
                                                       <input class="form-control" id="offerCategory" type="text" placeholder="Search..">
                                <table class="table">
                                        <thead class=" text-secondary">

                                        <th>-</th>
                                        <th>#</th>
                                        <th>Category_image</th>
                                        <th>Category_title</th>
                                        <th>category subtitle</th>
                                        

                                      



                                        </thead>
                                        <tbody  id="tableOfferCaegory">

                              
                                        
                                       
                                            <?php





                                                $CatIDs=array();
                                                
                                                $SelectCatFormOFFER="SELECT DISTINCT `category_id` FROM `ItemOFFER`";
                                                $stmtSelect = $db->prepare($SelectCatFormOFFER);
                                                if($stmtSelect->execute()){
            
            
                                                while($rowOFFER = $stmtSelect->fetch(PDO::FETCH_ASSOC)) {
            
                                                    array_push($CatIDs,$rowOFFER['category_id']);
                                            
            
                                                }
            
            
                                                }
                                                          $sql = "SELECT DISTINCT
                                                          category_items_list.category_id
                                                         ,category_items_list.category_image
                                                         ,category_items_list.item_price
                                                         ,category_lang.category_title
                                                         ,category_lang.category_subtitle
                                                        
                                       
                                                         
                             
                                                         FROM category_items_list,category_lang where category_items_list.category_id = category_lang.category_id     and category_items_list.item_price = 0.00 and category_items_list.category_master !=0 and category_items_list.category_master !='null'  and  category_items_list.category_master !=4 and category_items_list.category_id NOT IN ( '" . implode( "', '" , $CatIDs ) . "' ) ";
                                                          $stmt = $db->prepare($sql);
                                                          if($stmt->execute()){
                                                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                                ?>
                                                    
                                           
    
                                                      <tr class="D<?php echo $row['category_id'] ?>">
                                                      
                                                      <td><input   type="checkbox" name='Categorys[]' value="<?php echo $row['category_id'] ?>"></td>
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

                                            
                                            </tbody>
                                            
                                        
                                   
                                   </table>

            


                  
              
                    </div>



                    <br> <h3>Select Days </h3>
               
                    <div class="table-responsive overtable">
                    <table class="table">
                      <thead class=" text-secondary">
                      <th>Day</th>
                      <th>From Hour</th>
                      <th>To Hour</th>
                      </thead>
                      <tbody>
                       <?php $array=array("Saturday","Sunday","Monday","Tuesday","Wednesday","Thursday","Friday"); ?>
                       <?php  for($i=0;$i<count($array);$i++){?>
                       <tr>
                       <td>
                        <input type="checkbox" name="day[]" value="<?php echo $array[$i] ?>"> <?php echo $array[$i] ?>
                        </td>
                        <td>
                        <input type="time" class="form-control" name="fromH[]">
                        </td>
                        
                        <td>
                        <input type="time" class="form-control"  name="toH[]">
                        </td>
                        </tr>
                        <?php }?>

                        

                                       
                      
                      </tbody>
                     </table>
                                          
                    





                                                
                                        <button name="ADDOFFER" type="submit" id="update1" class="btn btn-primary  pullRight " disabled>ADD OFFER</button>
                                        
                                        <a href="Setting.php" class="btn btn-primary pullRight">Cancel</a>
                                        
                                        <br><br><br>
                                        <span id="note2" class="pullRight"><i class="fas fa-exclamation-circle">&nbsp </i>Plase select Branche</span>    
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

                if(isset($_POST['ADDOFFER'])){

                // $branchID

                include_once  __DIR__ . '/connectionDb.php';
                $database = new connectionDb();
                $db = $database->getConnection();


                if(isset($_POST['offerType'])){
              
                $offerType=$_POST['offerType'];  
              
                if(isset($_POST['offerPrice'])&&!empty($_POST['offerPrice'])){
                    $offerPrice=$_POST['offerPrice'];
                }else{
                    $offerPrice=0;
                }
                $From=$_POST['from'];  
                $TO=$_POST['to'];
                $branchID=$_COOKIE["branchesID"];

                }

                $Date1 = strstr($From,'T', true);
                $Date2 = strstr($TO,'T', true);
                $hour1=substr($From, 11); 
                $hour2=substr($TO, 11);
                $FromDate= $Date1." ".$hour1;
                $ToDate= $Date2." ".$hour2;



               if(isset($_POST['offerName'])){
                    $offerName=$_POST['offerName'];
               }else{
                   $offerName="Null";
               }

               if($offerType == 1){
                    $SQLU = "INSERT INTO `offer`(`Delivery_free_type`,`offer_type`, `offerName`,`offer_price`, `offer_starts_at`, `offer_ends_at`, `offer_branch`,`offer_status`) VALUES ('B',$offerType,'$offerName',$offerPrice,'$FromDate','$ToDate',1,1)";
                    $Stmt1 = $db->prepare($SQLU);
                    $Stmt1->execute();
               }else{
                   $SQLU = "INSERT INTO `offer`(`offer_type`, `offerName`,`offer_price`, `offer_starts_at`, `offer_ends_at`, `offer_branch`,`offer_status`) VALUES ($offerType,'$offerName',$offerPrice,'$FromDate','$ToDate',1,1)";
                   $Stmt1 = $db->prepare($SQLU);
                   $Stmt1->execute();
               }
          
               
                
                $itemCount1 = $Stmt1->rowCount();

                if($itemCount1 > 0){
                    $offerid=$db->lastInsertId();


                    if(isset($_POST['day'])){



                    $days=$_POST['day'];
                    $FromH=$_POST['fromH'];
                    $TOH=$_POST['toH'];
                    $counter1=-1;
                    $counter2=-1;
                    

                    if(!empty($_POST['Categorys'])||!empty($_POST['Items'])){

                        if(isset($_POST['Categorys'])){
                            $categorys=$_POST['Categorys'];
    
                            foreach($categorys as $category){
                                $sqlCAT ="SELECT 
                                category_items_list.category_id,
                                category_items_list.item_price,
                                category_items_list.IsSizes


                                  from item_mapping 
                                  JOIN category_items_list on category_items_list.category_id=item_mapping.item_id 
                                  where cat_id=$category  ";

                                 $stmtCat = $db->prepare($sqlCAT);
                                 $stmtCat->execute();

                                 while($rowCat = $stmtCat->fetch(PDO::FETCH_ASSOC)) {

                                    $valueCat= $rowCat['category_id'];
                                    $item_price11=$rowCat['item_price'];
                                    $IsSizes22=$rowCat['IsSizes'];
                                        
                                    if($offerType == 2){
                                                
                                                if($IsSizes22 == 1){
                                                    $selectItemsPrice ="SELECT `id`, `price` FROM `ItemType` WHERE `category_id`=$valueCat ";
                                                    $stmtItemsPrice = $db->prepare($selectItemsPrice);
                                                    $stmtItemsPrice->execute();

                                                   
                                                   

                                                    while($ItemPrices = $stmtItemsPrice->fetch(PDO::FETCH_ASSOC)) {
                                                        $offerPriceItemId=$ItemPrices['id'];
                                                        $offerPriceItemType=$ItemPrices['price'];

                                                        

                                                           $calculateItemType=(1-$offerPrice/100)*$offerPriceItemType; 

                                                            $updateItem="UPDATE category_items_list set discount = '$offerPrice',offer_price=$calculateItemType where category_id =$valueCat ";
                                                             $updateItemSTM= $db->prepare($updateItem);
                                                              $updateItemSTM->execute();

                                                           $updateItemType="UPDATE ItemType set OldPrice = $offerPriceItemType , `price`= $calculateItemType  where id =$offerPriceItemId ";
                                                            $updateItemSTMType= $db->prepare($updateItemType);
                                                            if($updateItemSTMType->execute()){
                                                                echo "calculate:".$calculateItemType."<br>"."id:$offerPriceItemId";
                                                            }



                                                    }



                                                }else{

                                                            $calculate=(1-$offerPrice/100)*$item_price11; 
                                                            $updateItem="UPDATE category_items_list set discount = '$offerPrice',offer_price='$calculate' where category_id =$valueCat ";
                                                            $updateItemSTM= $db->prepare($updateItem);
                                                            $updateItemSTM->execute();

                                                }
                                           
                                    }else{

                                                $updateItemDeliveryFree="UPDATE category_items_list set  Deliveryfree = 'B' where category_id =$valueCat ";
                                                $updateItemDeliveryFreeStm= $db->prepare($updateItemDeliveryFree);
                                                $updateItemDeliveryFreeStm->execute();
                                    }
                        
                                     


                                $sqITEm="INSERT INTO `ItemOFFER`( `itemid`,`IsSizes`,`item_price`, `offerID`,`category_id`) VALUES ($valueCat,$IsSizes22,$item_price11,$offerid,$category)";
                                $StmtItems= $db->prepare($sqITEm);
                                $StmtItems->execute();

                                 
                                 }
                


                                
                            
                                        }        
                        }
    
                        if(isset($_POST['Items'])){
                            $Items=$_POST['Items'];
                            foreach($Items as $Item){
                                $sqlCAT2 ="SELECT  DISTINCT
                                category_items_list.category_id,
                                category_items_list.item_price,
                                category_items_list.IsSizes
                                  from item_mapping 
                                  JOIN category_items_list on category_items_list.category_id=item_mapping.item_id 
                                  where item_mapping.item_id=$Item  limit 1";
                                $stmtCat2 = $db->prepare($sqlCAT2);
                                $stmtCat2->execute();


                                          while($rowCat = $stmtCat2->fetch(PDO::FETCH_ASSOC)) {
                                       
                                                                $valueCat= $rowCat['category_id'];
                                                                $item_price11=$rowCat['item_price'];
                                                                $IsSizes22=$rowCat['IsSizes'];

                                                            if($offerType == 2){


                                                                        if($IsSizes22 == 1){
                                                                                        $selectItemsPrice ="SELECT `id`, `price` FROM `ItemType` WHERE `category_id`=$valueCat ";
                                                                                        $stmtItemsPrice = $db->prepare($selectItemsPrice);
                                                                                        $stmtItemsPrice->execute();

                                                                                    
                                                   

                                                                                        while($ItemPrices = $stmtItemsPrice->fetch(PDO::FETCH_ASSOC)) {
                                                                                            $offerPriceItemId=$ItemPrices['id'];
                                                                                            $offerPriceItemType=$ItemPrices['price'];

                                                                                            

                                                                                                $calculateItemType=(1-$offerPrice/100)*$offerPriceItemType; 

                                                                                                $updateItem="UPDATE category_items_list set discount = '$offerPrice',offer_price=$calculateItemType,item_price=$offerPriceItemType where category_id =$valueCat ";
                                                                                                    $updateItemSTM= $db->prepare($updateItem);
                                                                                                    $updateItemSTM->execute();

                                                                                                $updateItemType="UPDATE ItemType set OldPrice = $offerPriceItemType , `price`= $calculateItemType  where id =$offerPriceItemId ";
                                                                                                $updateItemSTMType= $db->prepare($updateItemType);
                                                                                                if($updateItemSTMType->execute()){
                                                                                                    echo "calculate:".$calculateItemType."<br>"."id:$offerPriceItemId";
                                                                                                }



                                                                                        }
                                                                                    }else{

                                                                                          


                                                                                            $calculate=(1-$offerPrice/100)*$item_price11; 
                                                                                            $updateItem="UPDATE category_items_list set discount = '$offerPrice',offer_price='$calculate' where category_id =$valueCat ";
                                                                                            $updateItemSTM= $db->prepare($updateItem);
                                                                                            if($updateItemSTM->execute()){
                                                                                                echo "ok $offerPrice  ,$calculate";
                                                                                            }else{
                                                                                                echo "not ok";
                                                                                            }



                                                                                    }
                                                                }else{
                                                                            $updateItemDeliveryFree="UPDATE category_items_list set  Deliveryfree = 'B' where category_id =$valueCat ";
                                                                            $updateItemDeliveryFreeStm= $db->prepare($updateItemDeliveryFree);
                                                                            $updateItemDeliveryFreeStm->execute();
                                                                }

                                                    $sqITEm="INSERT INTO `ItemOFFER`( `itemid`,`item_price`, `offerID`) VALUES ($Item,$item_price11,$offerid)";
                                                    $StmtItems= $db->prepare($sqITEm);
                                                    $StmtItems->execute();
                                  }
                        }
                    }else{
                        ?>
                       <script>alert("Select Offer Effect On")</script> -->
                       <?php 
                      }
                 
                

                    $array=array("Saturday","Sunday","Monday","Tuesday","Wednesday","Thursday","Friday");
                    
                        foreach($days as $day){
                            $KEY=array_search($day,$array,true);
                                foreach($FromH as $fromhour){
                                    $counter1++;
                                    if( $counter1==$KEY){
                                        foreach($TOH as $toH){
                                            $counter2++;
                                            IF($counter1==$counter2){
                                                
                                                if(!empty($day)&&!empty($fromhour)&&!empty($toH)&&!empty($offerid)){
                                                $sqlDays="INSERT INTO `offerDays`( `day`, `fromHour`, `ToHour`, `offerID`) VALUES ('$day','$fromhour','$toH',$offerid)";
                                                $StmtDays = $db->prepare($sqlDays);
                                                $StmtDays->execute();
                                                }else{
                                                    ?>
                                                    <script>alert("Select Days Data")</script>
                                                    <?php
                                                }
                                               
                                            }
                                               
                                              
                                         }
                                         $counter2=-1;

                                    }

                               }
                               $counter1=-1;

                            
                     
                         
                            
                        }
                    
             
                }else{
                    ?>
                    <script>alert("Select Days Data")</script>
                 <?php 
                }
             }
               header("Location:offer.php");
                }
            }

                ?>


       
<script>

 $("#offerCategory").on("keyup", function() {      
 var value = $(this).val().toLowerCase();
 $("#tableOfferCaegory tr").filter(function() {
 $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
 });

 });

            function getBranchesID(item_no){
                if(item_no != " "){
                  $("#update1").attr("disabled", false);
              $("#note2").css("display","none");
              document.cookie = 'branchesID' + '=' +escape( item_no ) + '; expires=Fri, 27 Jul 2021 02:47:11 UTC; path=/';
                }
            }

            function isValidForm(){
 
              //get from cookie 
              $value=document.cookie  .split('; ')
            .find(row => row.startsWith('branchesID'))
            .split('=')[1];

            if (!$value){
                
                alert("select branches plase");
                return false;
             
             }
             
             }
            

            function SelectType(select){

                if(select.value==2){
                    $("#price").show();
                }else if(select.value==1){
                    $("#price").hide();
                }

              

            }

            function SelectItems(items){

        
                if(items.value==2){
                    $("#items").show();
                    $("#category").hide();


                }else if(items.value==1){
                    $("#items").hide();
                    $("#category").show();


                }

            }
      </script>