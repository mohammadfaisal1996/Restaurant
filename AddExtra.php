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
                    <br><h4 class="page-title" style="color:white">Add Extra </h4><br>

          




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
                                                        <td><input   type="checkbox" name='lang[]' value="<?php echo $row22['category_id'] ?>"></td>
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
                
                        <br><h3>Add Extra </h3><br>
                
                     
                   
                        <div id="OptionData">
                            <textarea class=" form-group"   name="Question" rows="4" cols="70" >Enter Question</textarea><br>


                            <button class="btn btn-primary" type="button" id="sendButton2">add Option +</button><br>
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

if(isset($_POST['Linke']) && isset($_POST['Question']) && isset($_POST['lang']) && isset($_POST['optionSolve'])  ){

// $branchID

$TitleName=" ";
$Question=$_POST['Question'];
$items=$_POST['lang'];
$optionSolve=$_POST['optionSolve'];

$count1=0;
$count2=0;


foreach($items as $item){

    $extraQuestion="SELECT * FROM `ExtraOption`  where item_id  = $item";

    $Que = $db->prepare($extraQuestion);
    if($Que->execute()){



    if($Que->rowCount() > 0){ 
     ?>
        <script>alert("This item Id: <?php echo $item ?> have Extra")</script>
        <?php
    }else{

    
    $SQLU = "INSERT INTO `ExtraOption`(`Title`, `question`,`item_id`) VALUES ('$TitleName','$Question','$item')";
    $Stmt1 = $db->prepare($SQLU);
    if($Stmt1->execute()){
    $last_id = $db->lastInsertId();
    foreach($optionSolve as  $option){
    $SQLO = "INSERT INTO `Options`(`optionData`,`ExtraID`) VALUES ('$option',$last_id)";
    $Stmt2 = $db->prepare($SQLO);
    $Stmt2->execute();

    }    
    }
    
?>
<script>

swal("Add Extra Success!", "", "success").then(function(){

   
    location.replace("items.php");


});




</script>
<?php
}
    

}
    
    
}



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



             $("#sendButton2").click(function () {

         

              $("#OptionData").append("<div><input class='form-group' type='text' name='optionSolve[]' placeholder='Option text'><button id='delete'type='button'  class='btn btn-danger' onSubmit='return false'  onClick='deleteME2(this)'><i class='fas fa-trash-alt'></i></button></div>");


            });

      
      
    });


    





        function deleteME2(button){

        $(button).parent().remove();
    }

    $('.number-only').keypress(function(e) {
	if(isNaN(this.value+""+String.fromCharCode(e.charCode))) return false;
  })
  .on("cut copy paste",function(e){
	e.preventDefault();
  });




</script>

<script>
 
        
 $("#addOns").on("keyup", function() {
 var value = $(this).val().toLowerCase();
 $("#myTableAddOns tr").filter(function() {
 $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
 });
 });


 </script>


                      
                 