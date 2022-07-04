<?php include('include/header.php') ?>


<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">Update Offer Data</h4>
            

     
                        <?php 
                                include_once  __DIR__ . '/connectionDb.php';
                                $database = new connectionDb();
                                $db = $database->getConnection();
  

                            
                                if( isset($_GET['offer_id'])){
                                    $offer_id=$_GET['offer_id'];
                                
                                    
                                    
                 
                            


                          
                                    $sql = "SELECT * FROM `offer` JOIN branch_store_lang on branch_store_lang.branch_code=offer.offer_branch where offer_id=$offer_id  ";


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


                                
                                   <div class="form-group form-floating-label mb-4">
                                            
                                     

                                            <select class="form-control  " required="" name="offerType" onchange="SelectType(this)">                               
                                            <?php 
                                            if($row['offer_type']==1){
                                            echo "<option value=1>Deleviry Free</option>";
                                            echo "<option value=2>By Percent</option>";

                                            }elseif($row['offer_type']==2){
                                            echo "<option value=2>By Percent</option>";
                                            echo "<option value=1>Deleviry Free</option>";
                                            }
                                            ?>          
                                            </select>



                                        </div>
                                        

                                        <?php 
                                            if($row['offer_type']==1){
                                            ?>
                                            
                                            <div class="form-group form-floating-label mb-4 col-sm-4" id="DeliveryType" >




                                            <select class="form-control mt-4"  name="DeliverySelect">
                                            <?php   
                                            
                                            if($row['Delivery_free_type'] != null){
                                                $DFreeType=$row['Delivery_free_type'];
                                                switch($DFreeType){
                                                    case "B":
                                                        echo "<option value='B'>Both</option><option value='E'>East</option> <option value='W'>west</option>";
                                                        break;

                                                     case "E":
                                                        echo "<option value='E'>East</option><option value='B'>Both</option> <option value='W'>west</option>";
                                                        break;

                                                     case "W":
                                                        echo "<option value='W'>west</option><option value='B'>Both</option><option value='E'>East</option>";
                                                        break;
                                                    
                                                }

                                             

                                                
                                            }
                            
                                            ?>
                                            </select>

                                           
                                         


                                            <label for="inputFloatingLabel" class="placeholder mb-2">select Delivery type </label>

                                            </div>



                                            


                                            <div class="form-group form-floating-label mb-4 col-sm-4" id="priceDele" style="display:none">
                                            <input id="inputFloatingLabel"   type="number" min="0" max="100" step="any"name="offerPriceD" class="form-control input-border-bottom" >                                   

                                            <label for="inputFloatingLabel" class="placeholder">offer Percent %</label>
                                        </div>








                                        <input type="hidden" name="typeOOFF" value="<?php echo $row['offer_type'] ?>" >






                                            <?php

                                            }elseif($row['offer_type']==2){

                                                if(!empty($row['offer_price'])){
                                                    $offer_price=$row['offer_price'];
                                                }else{
                                                    $offer_price=0;
                                                }
                                              ?>

                                                
                                            <div class="form-group form-floating-label mb-4 col-sm-4" id="priceDele" >
                                            <input id="inputFloatingLabel" value="<?php echo $offer_price; ?>"   type="number" min="0" max="100" step="any"name="offerPrice" class="form-control input-border-bottom" >                                   

                                            <label for="inputFloatingLabel" class="placeholder">offer price %</label>

                                            </div>

                                           
                                            <div class="form-group form-floating-label mb-4 col-sm-4" id="DeliveryType" style="display:none">
                                            <select class="form-control mt-4"  name="DeliverySelectP">
                                            
                                            <option value="">Select One</option>
                                            <option value="B">Both</option>
                                            <option value="E">East</option>
                                            <option value="W">west</option>
                                            </select>
                                            <label for="inputFloatingLabel" class="placeholder mb-2">select Delivery type </label>

                                        </div>
                                        <input type="hidden" name="typeOOFF" value="<?php echo $row['offer_type'] ?>" >
                                            <?php
                                            }
                                            ?>
                                            

                                     
                                       
                                       







                                    





                                <div class="form-group form-floating-label mb-4">

                                <div class="input-group m-3">

                                <label class="mt-2">Start Offer :</label>&nbsp;&nbsp; 
                                <input type="datetime-local" class="form-control" name="from" "> 
                                <div class="input-group-append">
                                </div>&nbsp;&nbsp;<label class="mt-2">End Offer:</label>&nbsp;&nbsp;  
                                <input type="datetime-local" class="form-control"  name="to"  >
                                <div class="input-group-append">
                                </div>


                                </div>                                
                                </div>



                                    <div class="form-group form-floating-label mb-4">
                                    <label>select branch:</label>
                                    <select name="selectBranch" class="form-control mt-4">
                                    <?php  $sql2 = "SELECT DISTINCT branches_store.serial_no as  ID,  branch_store_lang.branch_name as name FROM `branches_store` LEFT JOIN branch_store_lang on branch_store_lang.branch_code=branches_store.serial_no";
                                                $stmt2 = $db->prepare($sql2);
                                                $stmt2->execute();
                                                $itemCount2 = $stmt2->rowCount();
                                                $check=0;

                                                if ($itemCount2 > 0) {
                                                    if($row['offer_branch'] == $_GET['offer_branch']){
                                                    ?>
                                                    <option value="<?php echo $row['offer_branch']; ?>"><?php echo $_GET['branch_name'] ?></option>
                                                    <?php 
                                                    }

                                                while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                                                
                                                    if($row['offer_branch'] != $row2['ID']){

                                                        ?>
                                                        <option value="<?php echo $row2['ID']; ?>"><?php echo $row2['name'] ?></option>
                                                        <?php
                                                        
                                                    }
                                            


                                                } 
                                                }
                                                
                                                
                                                ?>

                                                </select>

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
         

            <?php 
            
            



                require 'aws/aws-autoloader.php';   


                if(isset($_POST['updateData'])){


                    include_once  __DIR__ . '/connectionDb.php';
                    $database = new connectionDb();
                    $db = $database->getConnection();

                        if(isset($_GET['offer_id'])){
                         $offerid=$_GET['offer_id'];
                       }


                       if(isset($_POST['from'])&&!empty($_POST['from'])&&isset($_POST['to'])&&!empty($_POST['to'])){

                        $from=$_POST['from'];
                        $to=$_POST['to'];

                        }elseif(isset($_GET['FromDate'])&&isset($_GET['ToDate'])){


                            $from=$_GET['FromDate'];
                            $to=$_GET['ToDate'];


                        }
                        if(isset($_POST['selectBranch'])){

                        $branch=$_POST['selectBranch'];
                        }    

                      
                 

                    

                   

                     if(isset($_POST['typeOOFF'])){

                        $type=$_POST['typeOOFF'];
                

                        if($_POST['typeOOFF'] == 1){
                            
                            

                            if(isset($_POST['showSELECtD'])&& !empty($_POST['showSELECtD'])&& $_POST['showSELECtD'] == 1){

                                $deliveryType=$_POST['DeliverySelect'];
                               

                              


                                $sql2 = "update offer set offer_type=1,offer_price=0,Delivery_free_type='$deliveryType',offer_starts_at='$from',offer_ends_at='$to',offer_branch=$branch WHERE offer_id=$offerid";
                                $stmt2 = $db->prepare($sql2);
                                if($stmt2->execute()){

                                    header("Location:offer.php");

                                }
                                

                            }elseif(isset($_POST['showSELECtD'])&& !empty($_POST['showSELECtD'])&& $_POST['showSELECtD'] == 2){

                           

                                $offerPriceD=$_POST['offerPriceD'];
                          

                                $sql2 = "update offer set offer_type=2 , Delivery_free_type=NULL , offer_price=$offerPriceD,offer_starts_at='$from',offer_ends_at='$to',offer_branch=$branch WHERE offer_id=$offerid";
                                $stmt2 = $db->prepare($sql2);
                                if($stmt2->execute()){

                                    header("Location:offer.php");

                                }

                            }
                            
                            
                            

                        }
                       elseif($_POST['typeOOFF']==2){






                            if(isset($_POST['showSELECtD'])&& !empty($_POST['showSELECtD'])&& $_POST['showSELECtD'] == 2){

                                $offerPrice=$_POST['offerPrice'];

                           


                                $   $sql2 = "update offer set offer_type=2 , Delivery_free_type=NULL , offer_price=$offerPrice,offer_starts_at='$from',offer_ends_at='$to',offer_branch=$branch WHERE offer_id=$offerid";
                                $stmt2 = $db->prepare($sql2);
                                if($stmt2->execute()){

                                    header("Location:offer.php");

                                }


                            }elseif(isset($_POST['showSELECtD'])&& !empty($_POST['showSELECtD'])&& $_POST['showSELECtD'] == 1){

                                $DeliverySelectP=$_POST['DeliverySelectP'];
                              

                                $sql2 = "update offer set offer_type=1,offer_price=0,Delivery_free_type='$DeliverySelectP',offer_starts_at='$from',offer_ends_at='$to',offer_branch=$branch WHERE offer_id=$offerid";
                                $stmt2 = $db->prepare($sql2);
                                if($stmt2->execute()){

                                    header("Location:offer.php");

                                }

                            }







                             
                        }



                    }}
                // }
              
            




            ?>

<?php include('include/footer.php') ?>
<script>



function SelectType(select){

if(select.value==2){
    $("#priceDele").show();
    $("#DeliveryType").hide();
     $("#DELIVERY").remove();
     $("#DeliveryType").append("<input type='hidden'  name='showSELECtD' value='2' id='DELIVERY'>");




}else if(select.value==1){
    $("#priceDele").hide();
    $("#DeliveryType").show();
    $("#DELIVERY").remove();
    $("#DeliveryType").append("<input type='hidden'  name='showSELECtD' value='1' id='DELIVERY'>");
}



}







if($("#DeliveryType").is(':visible'))   {
    $("#DeliveryType").append("<input type='hidden'  name='showSELECtD' value='1' id='DELIVERY'>");
}


if($("#priceDele").is(':visible'))   {
    $("#priceDele").append("<input type='hidden'  name='showSELECtD' value='2' id='DELIVERY'>");
}

</script>