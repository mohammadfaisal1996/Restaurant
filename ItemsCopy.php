<?php
ob_start();

include('include/header.php');
$baseUrl = new addImage("file","images/imagesitems/");

?>


<?php    include_once  __DIR__ . '/connectionDb.php';
                                    $database = new connectionDb();
                                    $db = $database->getConnection();
                          

                                    
                                    
                                    ?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
            
            

                        
			
					</div>   
                       
                       
                    <div class="card-header card-header-warning">

                    <div class="col-12 makeBLack" >   
                    <br><h4 class="page-title" style="color:white">Copy Items</h4><br>

          




                    </div><br><br><br>

             

                    <form method='post' >
                    <button type="submit" class="btn btn-primary " name="Linke" >Copy</button>

                    <div class="row p-2">

                    



                    <div class="   col-sm-12"  style ="width:600px; max-height: 600px;overflow-y:auto;background-color:white"  > 
                   <br> <h3>Select Items </h3>
                                <table class="table">
                                        <thead class=" text-secondary">
                                        <input class="form-control" id="addOns" type="text" placeholder="Search..">

                                        <th>-</th>
                                        <th>#</th>
                                        <th>Category_image</th>
                                        <th>Category_title</th>
                                        <th>Price</th>

                                      



                                        </thead>
                                        <tbody  id="myTableAddOns">
                                        
                                       
                                            <?php 

                                                       
                                                      
                                                    
                                                          $sql = "SELECT DISTINCT
                                                          category_items_list.category_id
                                                         ,category_items_list.category_image
                                                         ,category_items_list.item_price
                                                         ,category_lang.category_title
                                                        
                                       
                                                         
                             
                                                         FROM category_items_list,category_lang where category_items_list.category_id = category_lang.category_id     and category_items_list.item_price != 0.00  ";
                                                          $stmt = $db->prepare($sql);
                                                          if($stmt->execute()){
                                                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                                ?>
                                                    
                                           
    
                                                      <tr class="D<?php echo $row['category_id'] ?>">
                                                      
                                                      <td><input   type="checkbox" name='lang[]' value="<?php echo $row['category_id'] ?>"></td>
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
                                          
                         
                                           
               
                                           FROM category_items_list,category_lang where category_items_list.category_id = category_lang.category_id     and category_items_list.IsSizes = 1  ";
                                            $stmtL = $db->prepare($sqlL);
                                            if($stmtL->execute()){
                                              while($row22 = $stmtL->fetch(PDO::FETCH_ASSOC)) {
                                                  ?>
                                      
                             

                                        <tr class="D<?php echo $row22['category_id'] ?>">
                                        
                                        <td><input   type="checkbox" name='lang[]' value="<?php echo $row22['category_id'] ?>"></td>
                                        <td><?php  echo $row22['category_id']?></td>
                                        <td><img     src="<?php echo $baseUrl->getBaseUrl().$row22["category_image"] ?>" width='80' height='80' /></a></td>
                                        <td><?php echo $row22['category_title'] ?></td>
                                        <td><?php echo $row22['item_price'] ?></td>


                                        <td>

                                        </td>


                                        
                                        
                                        </tr>

                                           
                                            
                                              <?php
                                            }
                                          }

                              
                              ?>
                                            
                                            
                                            
                                        
                                   
                                   </table>

              

                      
                     


                  
              
                    </div>


                    
              
                 


                     


                
                   
                        </form>

                        </div>
                        </div>










                    </div>
                    </div>
                    </div>
                    </div>

                    <?php include('include/footer.php') ?>


<?php 


if(isset($_POST['Linke'])){

// $branchID

if(isset($_POST['lang']) && !empty($_POST['lang'])){
$items=$_POST['lang'];

$array=Array();

foreach($items as $item){

array_push($array,$item);


}

$_SESSION['CopyItem'] = $array;


 header("Location:copyItemTable.php");

                    }}
?>



<script>
 
        
 $("#addOns").on("keyup", function() {
 var value = $(this).val().toLowerCase();
 $("#myTableAddOns tr").filter(function() {
 $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
 });
 });


 </script>







                      
                 