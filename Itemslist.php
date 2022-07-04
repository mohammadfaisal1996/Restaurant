<?php include('include/header.php') ?>

<?php
$baseUrl = new addImage("file","images/imagesitems/");

$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];

$_SESSION['typeOFCat'] = 1;

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
                    <a href="AddSubcategory.php?catidMain=<?php echo $CATID?>&Branchid=<?php echo $braID ?>" style="font-weight:bold;font-size:15px" >Add sub Category</a>&nbsp&nbsp
                    </li>
                    <li class="separator">
                    <i class=""></i>
                    </li>
            
            
                 
               
                    <li class="separator">
                    <i class=""></i>
                    </li>
                    <li class="nav-item" >
                    <a href="Lnkeitem.php?catidMain=<?php echo $CATID?>&branchid=<?php echo  $braID?>"  style="font-weight:bold;font-size:15px" >Link Items</a>&nbsp&nbsp
                    </li>

                    <li class="separator">
                    <i class=""></i>
                    </li>
                    <li class="nav-item" >

                            <div class="dropdown">

                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Category Data
                                    </button>
                                    <ul class="dropdown-menu p-2" >
                                        <li><a href="AddCategoryData.php?catidMain=<?php echo $CATID?>&branchid=<?php echo  $braID?>"   >Add Category Header</a>&nbsp&nbsp</li>
                                        <li><a href="showCategoryData.php?catidMain=<?php echo $CATID?>" >Show Category header</a>&nbsp&nbsp</li>
                                    </ul>
                             </div>       
                        


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
                                <th>Catgory ID</th>
                                <th>Catgory Image</th>
                                <th>Catgory Name</th>
                                <th>Catgory SubName</th>
                                <th>Item Price</th>
                                <th>Status</th>
                                <th>Show In Slider</th>
                                <th>Delivery free</th>
                                <th>Sort Numebr</th>

                            
                                <th>Action</th>

                            </thead>
                            
                            <tbody id="myTable2">
                                
                                
                                   <?php
                                 
                                   
                              
                                   $catid=$_GET['CATID'];


                                   $braID=$_GET['branchid'];

      

                            
                   

                                        include_once  __DIR__ . '/connectionDb.php';
                                        $database = new connectionDb();
                                        $db = $database->getConnection();
                                        
                                
                                        $sql ="SELECT 
                                       category_items_list.category_id,
                                       category_items_list.ShowINslider,
                                       category_items_list.sort_no,


                                       category_items_list.BranchesID,
                                       category_items_list.Status,
                                       category_items_list.Deliveryfree,
                                       category_items_list.IsSizes,

                                       

                                       
                                       category_items_list.item_price,
                                        category_lang.category_title,
                                        category_lang.category_subtitle,
                                        category_lang.Ingredients,
                                        category_items_list.category_image as ImageName 
                                        
                                         from item_mapping 
                                         JOIN category_items_list on category_items_list.category_id=item_mapping.item_id 
                                         JOIN category_lang  on category_lang.category_id = category_items_list.category_id
                                         
                                         where cat_id=$catid ORDER BY `category_items_list`.`sort_no` ASC";

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
                                              
                                              <!-- itemDesc -->
                                              <a href='ITEMLIST.php?CATID=<?php echo $row['category_id'] ?>&branchid=<?php echo $braID ?>'>
                                              <?php 
                                              echo "<img src='",$baseUrl->getBaseUrl().$row['ImageName'],"' width='75' height='75' />" . "</a></th><th>"
                                            . $row["category_title"]. "</th><th>".$row["category_subtitle"]."</th>";
                                            ?>

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

                                            echo "<td>".$row['item_price']."JOD</td>";

                                            }


                                            ?>
                                            <th>




                                            



                                            

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

                                                  <th>
                                                          <?php 
                                               if($row['ShowINslider'] == 0){
                                                   ?>
                                                    <div class="onoffswitch">
                                                    <input type="checkbox" name="onoffswitch" onclick="showINslider(<?php echo $row['category_id'] ?>,this)" class="onoffswitch-checkbox" id="myonoffswitch2<?php echo  $row["category_id"]?>" tabindex="0" >
                                                    <label class="onoffswitch-label" for="myonoffswitch2<?php echo  $row["category_id"]?>">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                    </label>
                                                    </div>
                                                    </td>
                                                   <?php


                                               }else{
                                                   ?>

                                                    <div class="onoffswitch">
                                                    <input type="checkbox" name="onoffswitch" onclick="showINslider(<?php echo $row['category_id'] ?>,this)" class="onoffswitch-checkbox" id="myonoffswitch2<?php echo  $row["category_id"]?>" tabindex="0" checked>
                                                    <label class="onoffswitch-label" for="myonoffswitch2<?php echo  $row["category_id"]?>">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                    </label>
                                                    </div>
                                                    </td>

                                                   <?php 
                                               } 
                                               ?>
                                               </th>
<td>

                                    <form >
                                    <select class="form-group"  id="select<?php echo $row['category_id'] ?>" onchange="updateDFREE(this,<?php echo $row['category_id'] ?>)"> 
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
                                     <td ><form ><input type='number' id="SortRecord" class="form-group" onchange="Sort(this.value,<?php echo $row['sort_no'] ?>,<?php echo $row['category_id'] ?>)"  name="sort_no" value="<?php echo $row['sort_no'] ?>"></form></td>

                                        <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong<?php echo  $row['category_id']?>">
                                          <i class="fas fa-eye fa-lg"></i>
                                          </button>
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


                                          

                  

                                      <!-- Modal -->
                                      <div class="modal fade" id="exampleModalLong<?php echo $row['category_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLongTitle">Item Information</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">


                                            <div class="row">

                          

                                            <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                            
                                            <?php echo "<img class='' src='",$baseUrl->getBaseUrl().$row['ImageName'],"' width='100%' height='100%' />"?>
                                            </div>
                                            </div>


                                            <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                            <label>Name</label>
                                            <h4><?php echo $row['category_title'] ?></h4>
                                            </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                            <div class="form-group form-group-default">
                                            <label>Status</label>
                                            <h4><?php  if($row['Status']==1){echo "Active";}else{echo "InActive";} ?></h4>
                                      
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                            <label>Delivery free</label>
                                            <h4><?php  if($row['Deliveryfree']=="N"){echo "NO";}elseif($row['Deliveryfree']=="B"){echo "Both East & West";}elseif($row['Deliveryfree']=="E"){echo "East";}elseif($row['Deliveryfree']=="W"){echo "West";} ?></h4>
                                            </div>
                                            </div>

                                            <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                            <label>Description</label>
                                              <textarea  wrap="virtual" class="form-control"  rows="5"   name="Description" readonly>
                                              <?php echo $row['Ingredients'] ?> 
                                              </textarea>
                                            </div>
                                            </div>






                                                                <div class="col-sm-12 addons" style="height:300px;background-color:white;max-height: 500px;overflow-y:auto">
                                                              <h5>Price:</h5>
                                                              <?php                                           
                                                              if($row['IsSizes'] == 1){

                                                              $IDD=$row['category_id'];

                                                              $sqlDD="SELECT  `price`,`type` FROM `ItemType` WHERE category_id=$IDD";
                                                              $stmtDD = $db->prepare($sqlDD);
                                                              $stmtDD->execute();

                                                       
                                                             

                                                              while($rowSize=$stmtDD->fetch(PDO::FETCH_ASSOC)){
                                                              ?>
                                                          
                                                              <div class="col-md-6">
                                                             <div class="form-group form-group-default"> 
                                                             <label><?php   echo $rowSize['type'] ?></label>
                                                              <?php echo $rowSize['price']." JOD"?>  
                                                              </div></div>       
                                                              <?php
                                                              }
                                               
                                                              }else{
                                                                ?>
                                                                 <div class="col-md-6">
                                                             <div class="form-group form-group-default"> 
                                                             <label>Price </label>

                                                             <?php 
                                                             
                                                             if($row['item_price'] != 0 ){
                                                              $_SESSION['typeOFCat'] = 2;
                                                             } 
                                                             
                                                             ?>

                                                             <?php echo  $row['item_price']." JOD"?>;

                                                              </div></div>


                                                              <?php

                                                              }


                                                              ?>
                                                              </div>
                                                              
                                                              



                                                              <div class="col-sm-12 addons" style="overflow-y:scroll;max-height: 100px;">
                                                          
                                                              
                                                              <?php 
                                                              $IDD=$row['category_id'];
                                                              $sqlDDD="SELECT `id`, `itemID`, `IngredientName`, `status`, `price` FROM `AddOnes` WHERE  itemID=$IDD";
                                                              $stmtDDD = $db->prepare($sqlDDD);
                                                              $stmtDDD->execute();
                                                              $count=$stmtDDD->rowCount();

                                                              if($count>0){
                                                                echo "<h5>Add Ons:</h5>";
                                                                while($rowAddons=$stmtDDD->fetch(PDO::FETCH_ASSOC)){
                                                                  ?>
  
                                                                  <div class="col-md-6" >
                                                                  <div class="form-group form-group-default" >
                                                                  <label><?php echo $rowAddons['IngredientName'] ?></label>
                                                                   <?php  echo $rowAddons['price']?>
                                                                  </div>
                                                                  </div>
  
                                                                  <?php 
                                                                }
                                                              }

                                                    
                                                                
                                                              ?></div>



                                                


                                            </div>
                                                                                        
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            
                                            </div>
                                          </div>
                                        </div>
                                      </div>




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
 














          swal({
  title: "Are you sure?",
  text: "It will permanently be deleted with All related Data!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
   

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
          
          }).then(function(){

              swal("This record has been deleted.!", {
              icon: "success",
              });
        });




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







 function Sort(value,elm,catid){

if(value == ""){
alert("this record can't be empty");
$("#SortRecord").val(elm);

}else{

$.ajax({
type: "POST",
url:"EditeSort.php",
data:{value:value,catid:catid}, // serializes the form's elements.
success: function(data)
{


}
});



}

 }


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



  function showINslider(catID,checkbox)
{


    if (checkbox.checked)
    {

      
      $.ajax({
            type: "POST",
            url:"showInSlider.php",
            data:{catID:catID,status:1}, // serializes the form's elements.
            success: function(data)
            {
             
            }
          });
    }else{

    

      $.ajax({
            type: "POST",
            url:"showInSlider.php",
            data:{catID:catID,status:0}, // serializes the form's elements.
            success: function(data)
            {
          

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