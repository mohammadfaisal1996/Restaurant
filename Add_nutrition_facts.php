<?php
ob_start();

include('include/header.php') ;

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
                    <br><h4 class="page-title" style="color:white">Add nutrition facts</h4><br>

          




                    </div><br><br><br>

             

                    <form method='post' enctype="multipart/form-data" >
                    <button type="submit" class="btn btn-primary " name="Linke" >Link</button>

                    <div class="row p-2">

                    



                    <div class="   col-sm-6"  style ="width:600px; max-height: 600px;overflow-y:auto;background-color:white"  > 
                   <br> <h3>Select Items </h3>
                                <table class="table">
                                        <thead class=" text-secondary">
                                        <input class="form-control" id="nutrition_facts_filter" type="text" placeholder="Search..">

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
                                                      
                                                      <td><input   type="checkbox" name='items[]' value="<?php echo $row['category_id'] ?>"></td>
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

                                  
                                            
                                            
                                                                                   
                                            $sqlL = "SELECT DISTINCT
                                            category_items_list.category_id
                                           ,category_items_list.category_image
                                           ,category_items_list.item_price
                                           ,category_lang.category_title
                                          
                         
                                           
               
                                           FROM category_items_list,category_lang where category_items_list.category_id = category_lang.category_id    and category_items_list.IsSizes = 1  ";
                                            $stmtL = $db->prepare($sqlL);
                                            if($stmtL->execute()){

                                

                                                    while($row22 = $stmtL->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>



                                                    <tr class="D<?php echo $row22['category_id'] ?>">
                                                        <td><input   type="checkbox" name='items[]' value="<?php echo $row22['category_id'] ?>"></td>
                                                        <td><?php  echo $row22['category_id']?></td>
                                                        <td><img     src="<?php echo $baseUrl->getBaseUrl().$row22["category_image"] ?>" width='80' height='80' /></a></td>
                                                        <td><?php echo $row22['category_title'] ?></td>
                                                        <td><?php echo $row22['item_price'] ?></td>

                                                    </tr>



                                                    <?php
                                                    }
                                          }

                              
                              ?>
                                            
                                            
                                            
                                        
                                   
                                   </table>

              

                      
                     


                  
              
                    </div>


                    
                    <div class="IngredientsItem   col-sm-6"  style ="width:600px; max-height: 600px;overflow-y:auto;background-color:white"  > 
                
                        <br><h3>Add nutrition facts </h3><br>
                
                     

                    
                            <label for="url">upload  image:</label>
                            <input type="file"  class="form-control" accept="image/x-png,image/gif,image/jpeg" name="nutrition_image" required >


                                    <div class="custom-control " id="wrongSize" style="display:none">
                                           <span style="color:red">The size of the image must be less than 500 KB in order to be uploaded</span>

                                    </div>




                
                        <div class="col-sm-6">
            
         
    
                        </form>

                        </div>
                        </div>




   





                    </div>
                    </div>
                    </div>
                    </div>

                    <?php include('include/footer.php') ?>


<?php 

if(isset($_POST['Linke']) && isset($_POST['items'])&& isset($_FILES['nutrition_image']) && !empty($_FILES['nutrition_image']['name'])  ){
 
// $branchID

$items=$_POST['items'];
$name= 'nutrition_image';
$path ="uploads/images/nutrition_fads/";
$image = new addImage($name,$path);

if($image->size < 524288){
foreach($items as $item){

    $ItemNutrition="SELECT id FROM `item_nutrition_fads`  where item_id  = $item";

    $Nutrition = $db->prepare($ItemNutrition);
    if($Nutrition->execute()){



    if($Nutrition->rowCount() > 0){ 
     ?>
        <script>alert("This IMAGE SIZE <?PHP  ECHO $image->size ?> item Id: <?php echo $image->name ?> have item nutrition fads image")</script>
        <?php
    }else{

        if($image->moveImage()){
            $SQLU = "INSERT INTO `item_nutrition_fads`(`item_id`, `image`) VALUES ($item,'".$image->getImageFullName()."')";
            $Stmt1 = $db->prepare($SQLU);

           if($Stmt1->execute()){



?>
<script>



swal("Add nutrition fad Success!", "", "success").then(function(){

    location.replace("show_nutrition_facts.php");

});
</script>
<?php
}
        }else{?>

            <script>

            swal("Add nutrition fad unSuccess!", "", "error").then(function(){
            });
            </script>
            <?php
        }

    }
    

}
    
    
}
}else{
    ?>
    
    <script>$("#wrongSize").show();</script>
    <?php 
}

unset($_POST['Linke']);
}
?>

<script>

 $("#nutrition_facts_filter").on("keyup", function() {      
 var value = $(this).val().toLowerCase();
 $("#myTableAddOns tr").filter(function() {
 $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
 });

 });
</script>

          
                 