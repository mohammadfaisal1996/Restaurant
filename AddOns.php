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
                    <br><h4 class="page-title" style="color:white">Add Ons Item</h4><br>

          




                    </div><br><br><br>

             

                    <form method='post' >
                    <button type="submit" class="btn btn-primary " name="Linke" >Link</button>

                    <div class="row p-2">

                    



                    <div class="   col-sm-6"  style ="width:600px; max-height: 600px;overflow-y:auto;background-color:white"  > 
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


                    
                    <div class="IngredientsItem   col-sm-6"  style ="width:600px; max-height: 600px;overflow-y:auto;background-color:white"  > 
                
                        <br><h3>Add Ons </h3><br>
                
                     
                   
       
                        <input type="text" class="form-group" id="IngredientName" placeholder="Add Ons Name" >
                        <input type="text" class="number-only form-group"   id="Ingredientprice"  placeholder="Add Ons Price" >
                        <button class="btn btn-primary" type="button" id="sendButton">add</button>


                
                        <div class="col-sm-6">
                        <br><h3>Select Ingredients </h3><br>
                        
                        <select class="form-control"  onchange="getIngredient(this)">
                        <?php 
                        $sql3="SELECT DISTINCT `IngredientName`, `price` FROM `AddOnes` ";
                        $stm3=$db->prepare($sql3);
                    
                        if($stm3->execute()){
                            ?>

                           
                            <option>select one </option>
                            <?php
                          while($row = $stm3->fetch(PDO::FETCH_ASSOC)) {
                          ?>
                          <option value="<?php echo $row['IngredientName'] ?>-<?php echo $row['price'] ?>"><?php echo $row['IngredientName']."  ".$row['price'] ?></option>
                          <?php
                          }
                        }
                        ?>
                         </select>

                 
                        <div>
                
           
                 


                     


                  
                        <div style="height:500px;width:600px;background-color:white;max-height: 500px;">
                        <table class="table" style="overflow-y:auto">
                                        <thead class=" text-secondary">

                                     
                                        <th>Add Ons Name</th>
                                        <th>price</th>
                                        <th>Action</th>
                                        </thead>

                                        <tbody id="Ingredients">
                                       
                                        
                                        </tbody>

                                        
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

$IngredientName=$_POST['IngredientName'];
$prices=$_POST['price'];
$items=$_POST['lang'];
$count1=0;
$count2=0;


foreach($items as $item){

    foreach($IngredientName as  $name){

        $count1++;
      
        foreach($prices as $price) {
            $count2++;
       
            if($count1 == $count2){
            
                $check = "select itemID from  `AddOnes` where `itemID` =$item and `IngredientName`='$name'";
                $Stmt1check = $db->prepare($check);
                $Stmt1check->execute();

                 if(!($Stmt1check->rowCount() > 0)){

                            $SQLU = "INSERT INTO `AddOnes`( `itemID`, `IngredientName`,`price`) VALUES($item,'$name',$price)";
                            $Stmt1 = $db->prepare($SQLU);
                            $Stmt1->execute();

                 }
           
              
            }
    
         
            
        }
        $count2=0;
    
    
    
    
    }
    $count1=0;
    
    
}

?>
<script>

swal("Add Ingredients Success!", "", "success").then(function(){

   
    location.replace("items.php");


});




</script>
<?php

unset($_POST['Linke']);
}
?>

             
<script>

$(document).ready(function () {

         const counter=0;
    
        $("#sendButton").click(function () {

            var name=$("#IngredientName").val();
            var price=$("#Ingredientprice").val();


            if(name != " "){
              $("#Ingredients").append("<tr><td><input type='hidden' name='IngredientName[]' value='"+name+"'><p>"+name+"</p></td><td><input type='hidden' name='price[]' value='"+price+"'><p>"+price+"</p>  </td><td><button id='delete'type='button'  class='btn btn-danger' onSubmit='return false'  onClick='deleteME(this)'><i class='fas fa-trash-alt'></i></button></td></tr>");


            }else{
              alert("Enter Name & price ");
            }

      
        });
    });


    function deleteME(button){

        $(button).parent().parent().remove();
    }


    $('.number-only').keypress(function(e) {
	if(isNaN(this.value+""+String.fromCharCode(e.charCode))) return false;
  })
  .on("cut copy paste",function(e){
	e.preventDefault();
  });




  function getIngredient(data){
    
    var leng=data.length;
    var value=data.value;

   var Name=value.substring(value.search("-"),-1);
   var price =value.substring(value.search("-")+1);

   $("#Ingredients").append("<tr><td><input type='hidden' name='IngredientName[]' value='"+Name+"'><p>"+Name+"</p></td><td><input type='hidden' name='price[]' value='"+price+"'><p>"+price+"</p>  </td><td><button id='delete'type='button'  class='btn btn-danger' onSubmit='return false'  onClick='deleteME(this)'><i class='fas fa-trash-alt'></i></button></td></tr>");


   

  }
</script>

<script>
 
        
 $("#addOns").on("keyup", function() {
 var value = $(this).val().toLowerCase();
 $("#myTableAddOns tr").filter(function() {
 $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
 });
 });


 </script>


                      
                 