<?php
ob_start();

include('include/header.php');
$baseUrl = new addImage("file","images/imagesitems/");

?>


<?php    include_once  __DIR__ . '/connectionDb.php';
                                    $database = new connectionDb();
                                    $db = $database->getConnection();
                          
 if(isset($_SESSION['CopyItem'])){



                   $CopyItem_array=$_SESSION['CopyItem'];                
                                    
                                    ?>
     

          
     
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
            
            

                        
			
					</div>   

              
                       
                       
                    <div class="card-header card-header-warning">

                    <div class="col-12 makeBLack" >   
                    <br><h4 class="page-title" style="color:white">Copy Items table</h4><br>

          




                    </div><br><br><br>

             

                    <form method='post' >
                    <button type="submit" class="btn btn-primary " name="Linke" >Save</button>

                    <div class="row p-2">

                    



                    <div class="   col-sm-12"  style ="width:600px; max-height: 600px;overflow-y:auto;background-color:white"  > 
                  
                                <table class="table">
                                        <thead class=" text-secondary"><br><br>
                                        <input class="form-control" id="itemcmy" type="text" placeholder="Search..">

                            
                                        <th>Category_image</th>
                                        <th>Category_title</th>
                                        <th>Price</th>

                                      



                                        </thead>
                                        <tbody  id="itemcmytable">
                                        
                                       
                                            <?php 

                                                $matches = implode(',', $CopyItem_array);

                                                       
                                                      
                                                    
                                                          $sql = "SELECT DISTINCT
                                                          category_items_list.category_id
                                                         ,category_items_list.category_image
                                                         ,category_items_list.item_price
                                                         ,category_lang.category_title
                                                        
                                       
                                                         
                             
                                                         FROM category_items_list,category_lang where category_items_list.category_id = category_lang.category_id  and category_items_list.category_id in ($matches)  ";
                                                          $stmt = $db->prepare($sql);
                                                          if($stmt->execute()){
                                                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                                ?>
                                                    
                                           
    
                                                      <tr class="D<?php echo $row['category_id'] ?>">
                                                      
                                                      
                                                      <td><img     src="<?php echo $baseUrl->getBaseUrl().$row["category_image"] ?>" width='80' height='80' /></a></td>
                                                      <input type="hidden"  value="<?php echo $row['category_image'] ?>" name="category_image[]">

                                                      <td><input type="text"  value="<?php echo $row['category_title'] ?>" name="category_title[]"></td>
                                                      <td><input type="number"  value=<?php echo $row['item_price'] ?> step="0.01" name="item_price[]"></td>



                                                      <td>

                                                      </td>


                                                      
                                                      
                                                      </tr>

                                                         
                                                          
                                                            <?php
                                                          }}?>
                                                        

                            
                                            
                                            
                                            
                                        
                                   
                                   </table>

              

    
                    </div>


                    
              
                 


                     


                
                   
                        </form>

                        </div>
                        </div>

                                                        <?php }?>








                    </div>
                    </div>
                    </div>
                    </div>

                    <?php include('include/footer.php') ?>

<?php 

if(isset($_POST['Linke'])){

  $category_titles=$_POST['category_title'];
  $item_prices=$_POST['item_price'];
  $category_images=$_POST['category_image'];
  

$count1=0;
$count2=0;
$count3=0;




foreach($category_titles as $category_title){
        $count1++;

    foreach($item_prices as $item_price){

                $count2++;
       
            if($count1 == $count2){

                   
                    foreach($category_images as $category_image){
                         $count3++;
                    if($count2 == $count3){

                    
                       $sql = "INSERT INTO `category_items_list`( `sort_no`, `is_reward_category`, `category_image`, `category_list_type`, `item_price`, `related_item`, `store_name`,offer_price,`points`,`BranchesID`,`discount`) VALUES (1,1,'$category_image',1,$item_price,0,'null',0,0,1,0)";
                                                      $stmt = $db->prepare($sql);
                                                
                                                      if($stmt->execute()){
                                                        echo "true1";
                                                                   $newCatTitle=trim(filter_var($category_title, FILTER_SANITIZE_STRING));

                                                                    $sql2 = "INSERT INTO `category_lang`(`category_id`, `language_code`, `category_title`,`Ingredients`, `category_subtitle`,special,gluten,healthy,nuts,dairy,sugar,newone,yeast,whole) VALUES(last_insert_id(),'en','$newCatTitle',' ',' ',0,0,0,0,0,0,0,0,0)";
                                                                    $stmt2 = $db->prepare($sql2);

                                                                    if( $stmt2->execute()){
                                                                    echo "true2";
                                                                    }







                                                      }



                          




                    }
            }
            $count3=0;
            
    }
   
    }
      $count2=0;

}?>

<script>


swal("Add Items Success!", "", "success").then(function(){

   
    location.replace("items.php");


});




</script>
<?php
}
?>
<script>


 $("#itemcmy").on("keyup", function() {
 var value = $(this).val().toLowerCase();
 $("#itemcmytable tr").filter(function() {
 $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
 });
 });
 
 </script>


