<?php include('include/header.php');
$baseUrl = new addImage("file","images/imagesitems/");


?>



<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">Link item</h4>
            

                        
			
					</div>                
                       
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title">link item with category</h4>
                                   
                                   
                                   
                                    <br><br><input class="form-control" id="myInput1" type="text" placeholder="Search.."><br><br>

                            
                                    </div>
                                    <?php    include_once  __DIR__ . '/connectionDb.php';
                                    $database = new connectionDb();
                                    $db = $database->getConnection();?>
                                   <div class=" col-sm-12"> 
                                    <form method="post" enctype="multipart/form-data">
                                       
                                        <div class="form-group form-floating-label ">

                                                
                                                <button name="Linke" type="submit" id="update1" class="btn btn-primary  pullRight " >Link itmes</button>

                                                <a href="Category.php" class="btn btn-primary pullRight mb-4">Cancel</a>
                                      


                                          <!-- <div class="dropdown"    >
                                          <button class="btn btn-secondary dropdown-toggle d-inline" style="display:inline" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          select one 
                                          </button> -->




                                
                                        <table class="table" >
                                        <thead class=" text-secondary">

                                        <th>-</th>
                                        <th>#</th>
                                        <th>Category_image</th>
                                        <th>Category_title</th>
                                        <th>Price</th>
                                        <th></th>
                                        <th>Action</th>

                                      



                                        </thead>
                                        <tbody  id="myTable1">
                                        
                                       
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

                                                      <td><input type="text"  id="one<?php echo $row['category_id'] ?>" onkeypress="myFunction(<?php echo $row['category_id'] ?>)"  class="number-only form-group" value=<?php echo $row['item_price']?>></td>
                                                      
                                                      <input type="hidden"  id="IDNEW<?php echo $row['category_id'] ?>" class="number-only form-group" value=<?php echo $row['category_id']?>>

                                                      <td><input type="hidden" name="price[]" id="tow<?php echo $row['category_id'] ?>" class="number-only form-group" value="<?php echo $row['category_id'] ?>" > </td>


                                                      <td>
                                                      <form  action="updateItemNew.php"  style="display: inline-block !important;">


                                                      <input type="hidden" name="catID" value="<?php echo $row["category_id"] ?>">
                                                      <input type="hidden" name="catidMain" value="<?php echo $_GET["catidMain"] ?>">
                                                      <input type="hidden" name="branchid" value="<?php echo $_GET["Branchid"] ?>">
                                                      <input type="hidden" name="typeOFLINK" value=1>



                                                 
                                                      
                                            


                                                      <button class="btn btn-primary"   ><i class="fas fa-pencil-alt"></i></button>
                                                      </form>

                                                      <form onsubmit="return false" style="    display: inline-block !important;">
                                                      <button class="btn btn-danger"  onsubmit="return false"  onclick="funn(<?php echo $row['category_id'] ?>)"><i class="fas fa-trash-alt"></i></button>
                                                      </form>

                                                      </td>


                                                      
                                                      
                                                      </tr>

                                                         
                                                          
                                                            <?php
                                                          }
                                                        }

                                            
                                            ?>




<?php 
                            
                                                       
                                                      
                                                    
                                                          $sql = "SELECT DISTINCT
                                                          category_items_list.category_id
                                                         ,category_items_list.category_image
                                                         ,category_items_list.item_price
                                                         ,category_items_list.IsSizes

                                                         
                                                         ,category_lang.category_title
                                                        
                                       
                                                         
                             
                                                         FROM category_items_list,category_lang where category_items_list.category_id = category_lang.category_id    and category_items_list.IsSizes = 1  ";
                                                          $stmt = $db->prepare($sql);
                                                          if($stmt->execute()){
                                                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                                ?>
                                                    
                                           
    
                                                      <tr class="D<?php echo $row['category_id'] ?>">
                                                      
                                                      <td><input   type="checkbox" name='lang[]' value="<?php echo $row['category_id'] ?>"></td>
                                                      <td><?php  echo $row['category_id']?></td>
                                                      <td><img     src="<?php echo $baseUrl->getBaseUrl().$row["category_image"] ?>" width='80' height='80' /></a></td>
                                                      <td><?php echo $row['category_title'] ?></td>
                                                    



                                                      <?php
                                             
                                             if($row['IsSizes'] == 1){

                                              $IDD=$row['category_id'];

                                              $sqlDD="SELECT  `type` FROM `ItemType` WHERE category_id=$IDD";
                                              $stmtDD = $db->prepare($sqlDD);
                                              $stmtDD->execute();

                                              $sqlDD2="SELECT  `price` FROM `ItemType` WHERE category_id=$IDD";
                                              $stmtDD2 = $db->prepare($sqlDD2);
                                              $stmtDD2->execute();

                                              echo " <td><table>";

                                              while($rowSize=$stmtDD->fetch(PDO::FETCH_ASSOC)){
                                               ?>
                                            <th><?php echo $rowSize['type']?></th>         
                                            <?php
                                              }
                                              echo "<tr>";

                                              while($rowSize2=$stmtDD2->fetch(PDO::FETCH_ASSOC)){
                                                ?>
                                                <td><?php echo $rowSize2["price"]?>JOD</td>
   

        
                                             <?php
                                               }
                                               echo "</tr>";

                                             echo "</table> </td>"; 
                                             }else{

                                           
                                            }
                                             
                                             
                                             ?>
                                             

                                             



                                                      <td></td>

                                                      <td>
                                                      <form  action="updateItemNew.php"  style="display: inline-block !important;">


                                                      <input type="hidden" name="catID" value="<?php echo $row["category_id"] ?>">
                                                      <input type="hidden" name="catidMain" value="<?php echo $_GET["catidMain"] ?>">
                                                      <input type="hidden" name="branchid" value="<?php echo $_GET["Branchid"] ?>">
                                                      <input type="hidden" name="typeOFLINK" value=2>

                                                      


                                                 
                                                      
                                            


                                                      <button class="btn btn-primary"   ><i class="fas fa-pencil-alt"></i></button>
                                                      </form>

                                                      <form onsubmit="return false" style="    display: inline-block !important;">
                                                      <button class="btn btn-danger"  onsubmit="return false"  onclick="funn(<?php echo $row['category_id'] ?>)"><i class="fas fa-trash-alt"></i></button>
                                                      </form>

                                                      </td>


                                                      
                                                      
                                                      </tr>

                                                         
                                                          
                                                            <?php
                                                          }
                                                        }

                                            
                                            ?>





                                   
                                   </table>
                                     
                                                           
</div>

            

                                        </div>
                                                
                         
                                        <br><br><br>
                                    </form> 
                             </div>
                            
                    </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

                <?php 



                //  upadte tax 

                if(isset($_POST['Linke'])){

                // $branchID

                include_once  __DIR__ . '/connectionDb.php';
                $database = new connectionDb();
                $db = $database->getConnection();


                if(!empty($_POST['lang'])){



                $category=$_GET['catidMain']; 
                $branchid=$_GET['Branchid']; 

                // foreach($_POST['lang'] as $ID){





                  
                //     $SQLU = "INSERT INTO `item_mapping`( `cat_id`, `item_id`) VALUES($category,$ID)";
                //     $Stmt1 = $db->prepare($SQLU);
                //     if($Stmt1->execute()){
                //       header("Location:Itemslist.php?CATID=$category&branchid=");
                      
                //     }
               
               
               
               
               
                // }

                
                 
                    foreach($_POST['lang'] as $ID){ 
                          
                        
                                 

                               



                                    foreach($_POST['price'] as $price){


                                     
                                            $count=strlen($price);
                                        
                                            $newID=substr($price,strpos($price,"-")+1,$count);
                                            if($ID == $newID){
                                                $NEWprice=substr($price,0,strpos($price,"-"));

                                                if ($NEWprice != null){


                                                                     $sqll = "SELECT DISTINCT
                                                category_items_list.category_id
                                               ,category_items_list.category_image
                                               ,category_items_list.points
                                               ,category_items_list.discount
                                               ,category_lang.category_title
                                               ,category_lang.category_subtitle
                                              
                             
                                               
                   
                                               FROM category_items_list,category_lang where category_items_list.category_id = category_lang.category_id     and category_items_list.item_price != 0.00 and  category_items_list.category_id=$ID";
                                                $stmtl = $db->prepare($sqll);
                                                if($stmtl->execute()){
                                                  while($rowl = $stmtl->fetch(PDO::FETCH_ASSOC)) {
                                                      
                                                
                                                  $file_name=$rowl['category_image'];
                                                  $offerPrice=$rowl['discount'];
                                                  $point=$rowl['points'];
                                                  $name=$rowl['category_title'];
                                                  $sub=$rowl['category_subtitle'];
                                                  }



                                                 
                                                  $sql12 = "INSERT INTO `category_items_list`( `sort_no`, `is_reward_category`, `category_image`, `category_list_type`, `item_price`, `related_item`, `store_name`,offer_price,`points`,BranchesID,discount) VALUES (1,1,'$file_name',1,$NEWprice,0,'null',0,$point,$branchid,$offerPrice)";
                                                  $stmt12 = $db->prepare($sql12);
                                             
                                                  if($stmt12->execute()){
                                                    echo "true";
                                                    
                                                  }


                                                $id=$db->lastInsertId();

                                                $sql122 = "INSERT INTO `category_lang`(`category_id`, `language_code`, `category_title`, `category_subtitle`,special,gluten,healthy,nuts,dairy,sugar,newone,yeast,whole) VALUES($id,'en','$name','$sub',0,0,0,0,0,0,0,0,0)";
                                                $stmt122 = $db->prepare($sql122);


                                                if($stmt122->execute()){

                                                    $SQLU = "INSERT INTO `item_mapping`( `cat_id`, `item_id`) VALUES($category,$id)";
                                                    $Stmt1 = $db->prepare($SQLU);
                                                    if($Stmt1->execute()){
                                                    echo "<h1 style='color:red'>ok</h1>";
                                                    }
                                                }





                                                  
                                                
                                            }

                                                }
                                                


                                             
                               

        
                                                
                                                
                                            }elseif($ID == $price){
                                                
                                            $SQLU = "INSERT INTO `item_mapping`( `cat_id`, `item_id`) VALUES($category,$ID)";
                                            $Stmt1 = $db->prepare($SQLU);
                                            if($Stmt1->execute()){
                                            //   header("Location:Itemslist.php?CATID=$category&branchid=");
                                            }

                                            }

                                        
                                   



                                }

                             }
                       
                   

                         
                         
                                 

                        }
                
      
              
 


                   
           

                }
            


                ?>


<?php include('include/footer.php') ?>

<script>

 
 $("#myInput1").on("keyup", function() {      
 var value = $(this).val().toLowerCase();
 $("#myTable1 tr").filter(function() {
 $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
 });

 });


 function  funn(name){
 
 var iDCat=name;

 $.ajax({
      type: "POST",
      url:"DeleteNItem.php",
      data:{Delete:iDCat}, // serializes the form's elements.
      success: function(data)
      {

        
          
          $(".D"+iDCat).fadeOut("slow"); // show response from the php script.
      }
    });

}

$('.number-only').keypress(function(e) {
	if(isNaN(this.value+""+String.fromCharCode(e.charCode))) return false;
  })
  .on("cut copy paste",function(e){
	e.preventDefault();    $('.number-only').keypress(function(e) {
	if(isNaN(this.value+""+String.fromCharCode(e.charCode))) return false;
  })
  .on("cut copy paste",function(e){
	e.preventDefault();
  });

  });




// jQuery implementation

function myFunction(ID){

    var newID=ID;
  
    var $src = $('#one'+newID),
        $dst = $('#tow'+newID);
    var  $newID=$("#IDNEW"+newID).val();    
    $src.on('input', function () {
        $dst.val($src.val()+"-"+$newID);
    });

}


 </script>