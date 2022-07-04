<?php include('include/header.php') ?>

<?php 

$braID=$_GET['branchid'];

$CATID=$_GET['CATID'];

?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">Sub Category  list</h4>
            
                        <ul class="breadcrumbs">
                              <li class="separator">
                              <i class=""></i>
                              </li>


                              <li class="nav-item" >
                              <a href="Lnkeitem.php?catidMain=<?php echo $CATID?>&Branchid=<?php echo $braID ?>" style="font-weight:bold;font-size:15px" >Link items</a>&nbsp&nbsp
                              </li>
                              <li class="separator">
                              <i class=""></i>
                              </li>
                        
                        
                        </ul>

                  
                        
			
					</div><br>                  
                       
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title"> Sub Category table</h4><br>
                                   
                                    <input class="form-control" id="myInput2" type="text" placeholder="Search..">
                <br>


  
                      <!--<form method="POST">
                        <input type="radio" id="Category" onchange="hideB(this)" name="type" value="Sub_Category">
                        <label for="Category"> Sub Category </label>
                        &nbsp; &nbsp; &nbsp; <input type="radio" id="Package" onchange="hideA(this)" name="type" value="Item" checked>
                        <label for="Package"> Item </label> 
                      </form>
                        <br><br>-->
                        
                       <div id="B ">
                     
      
                        </div>
                        </div>
                        <table class="table ">
                            <thead class=" text-secondary ">
                                <th>Item ID</th>
                                <th>Item Image</th>
                                <th>Item Name</th>
                                <th>Item Price</th>
                                <th>Status</th>
                                <th>Action</th>

                            </thead>
                            
                            <tbody id="myTable2">
                                
                                
                                   <?php
                                 
                                   
                              
                                   $catid=$_GET['CATID'];
                                
                 

                          
                            
                   

                                        include_once  __DIR__ . '/connectionDb.php';
                                        $database = new connectionDb();
                                        $db = $database->getConnection();
                                        
                                
                                        $sql ="SELECT 
                                       category_items_list.category_id,
                                       category_items_list.BranchesID,
                                       category_items_list.Status,
                                       category_items_list.Deliveryfree,

                                       
                                       category_items_list.item_price,
                                        category_lang.category_title,
                                        category_items_list.category_image as ImageName 
                                        
                                         from item_mapping 
                                         JOIN category_items_list on category_items_list.category_id=item_mapping.item_id 
                                         JOIN category_lang  on category_lang.category_id = category_items_list.category_id
                                         
                                         where cat_id=$catid ";

// where item_mapping.cat_id = $catid and category_items_list.category_list_type =1 and category_lang.language_code = 'en'
                                        $stmt = $db->prepare($sql);
                                        $stmt->execute();
                                        $itemCount = $stmt->rowCount();
   






                                      


                                        if ($itemCount > 0) {

                                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            
                                             
                                           
                                           ?>
                                          <tr id="D<?php echo $row["category_id"] ?>">
       



                                            <?php
                                              echo "<th> " . $row["category_id"]. "</th><th onclick=\"getID(".$row["category_id"].")\">";?> 
                                              
                                              
                                              <a href='ItemDesc.php?category_id=<?php echo $row["category_id"] ?>'>
                                              <?php 
                                              echo "<img src='",$row['ImageName'],"' width='75' height='75' />" . "</a></th><th>"
                                            . $row["category_title"]. "</th><th>".$row["item_price"]." JOD</th><th> ";
                                            ?>

                                              <form  method="post">
                                        <input type="hidden" name="catID" value="<?php echo $row["category_id"] ?>">


                                        <?php 
                                               if($row['Status'] == 0){
                                                   ?>
                                                    <div class="onoffswitch">
                                                    <input type="checkbox" name="onoffswitch" onclick="Switch(<?php echo $row['category_id'] ?>,this)" class="onoffswitch-checkbox" id="myonoffswitch<?php echo  $row["category_id"]?>" tabindex="0" >
                                                    <label class="onoffswitch-label" for="myonoffswitch<?php echo  $row["category_id"]?>">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                    </label>
                                                    </div>
                                                    </td>
                                                   <?php


                                               }else{
                                                   ?>

                                                    <div class="onoffswitch">
                                                    <input type="checkbox" name="onoffswitch" onclick="Switch(<?php echo $row['category_id'] ?>,this)" class="onoffswitch-checkbox" id="myonoffswitch<?php echo  $row["category_id"]?>" tabindex="0" checked>
                                                    <label class="onoffswitch-label" for="myonoffswitch<?php echo  $row["category_id"]?>">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                    </label>
                                                    </div>
                                                    </td>

                                                   <?php 
                                               } 
                                               ?>
                          
                                        </form>
                                            <?php echo "</th>";
                                        ?>

                                        
<td>
                                    <form >
                                    <select class="form-group" id="select<?php echo $row['category_id'] ?>" onchange="updateDFREE(this,<?php echo $row['category_id'] ?>)">
                                    <?php 
                                  
                                    switch($row['Deliveryfree']){
                                      case 'B':
                                        echo "<option value='B'>Both</option>";
                                        echo "<option value='N'>NO</option>";
                                        echo "<option value='E'>East</option>";
                                        echo "<option value='W'>West</option>";
                                        break;
                                      case 'N':  
                                        echo "<option value='N'>NO</option>";
                                        echo "<option value='B'>Both</option>";
                                        echo "<option value='E'>East</option>";
                                        echo "<option value='W'>West</option>";
                                        break;
                                      case 'E':  
                                          echo "<option value='E'>East</option>";
                                          echo "<option value='N'>NO</option>";
                                          echo "<option value='B'>Both</option>";
                                          echo "<option value='W'>West</option>";
                                          break;  
                                      case 'W':  
                                        echo "<option value='W'>West</option>";
                                        echo "<option value='E'>East</option>";
                                        echo "<option value='N'>NO</option>";
                                        echo "<option value='B'>Both</option>";                           
                                        break;    
                                        
                                    }
                                    ?>

                                    </select>
                                     
                                    </form>
                                    </td>
                                        <td>
                                          <form  action="updateItem.php" style="display: inline-block !important;">

                                          
                                          <input type="hidden" name="catID" value="<?php echo $row["category_id"] ?>">
                                          <input type="hidden" name="BranchesID" value="<?php echo $row["BranchesID"] ?>">
                                          <input type="hidden" name="CATIDHEAD" value="<?php echo $_GET["CATID"] ?>">

                                          



                                          <button class="btn btn-primary" id="updateCat"  ><i class="fas fa-pencil-alt"></i></button>
                                          </form>

                                        <form onsubmit="return false" style="    display: inline-block !important;">
                                          <button class="btn btn-danger" id="DeleteCat" onsubmit="return false"  onclick="funn(<?php echo $catid ?>,<?php echo $row['category_id'] ?>)"><i class="fas fa-trash-alt"></i></button>
                                          </form>

                                          </td>
                                          </tr>

                                          <?php
                                             
                                             

                                            }
                            
                                        }
                          
                                    ?>


                            </tbody>
                        </table> 
                        </div>
                        </div>
                        </div>

                        </div>
                        </div>
                        </div>

                        <script>
                            function getID(item_no){


                                document.cookie = 'item2' + '=' +escape( item_no ) + '; expires=Fri, 27 Jul 2021 02:47:11 UTC; path=/';


                            }

                      </script>
            

<script>
  
  function  funn(cat,item){
 


       var CatId=cat;
       var itemid=item;
 
      
       $.ajax({
            type: "POST",
            url:"DeleteItem.php",
            data:{'CatID':CatId,'itemid':itemid}, // serializes the form's elements.
            success: function(data)
            {
             
                $("#D"+itemid).fadeOut("slow"); // show response from the php script.
            }
          
          });
 
  }
   </script>
<?php include('include/footer.php') ?>
<script>


 
 $("#myInput2").on("keyup", function() {      
 var value = $(this).val().toLowerCase();
 $("#myTable2 tr").filter(function() {
 $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
 });

 });




 function Switch(catID,checkbox)
{


    if (checkbox.checked)
    {

      $.ajax({
            type: "POST",
            url:"updateCatSwitch.php",
            data:{catID:catID,status:1}, // serializes the form's elements.
            success: function(data)
            {
             
                // $("#D"+iDCat).fadeOut("slow"); // show response from the php script.
            }
          });
    }else{


      $.ajax({
            type: "POST",
            url:"updateCatSwitch.php",
            data:{catID:catID,status:0}, // serializes the form's elements.
            success: function(data)
            {
          

                // $("#D"+iDCat).fadeOut("slow"); // show response from the php script.
            }
          });
    }
}


function updateDFREE(Dvalue,catid)
{

var Deliveryfree =$('#select'+catid).val();




   

      $.ajax({
            type: "POST",
            url:"updateDFREE.php",
            data:{catID:catid,Deliveryfree:Deliveryfree}, // serializes the form's elements.
            success: function(data)
            {
             
        
                // $("#D"+iDCat).fadeOut("slow"); // show response from the php script.
            }
          });
   
}
 </script>