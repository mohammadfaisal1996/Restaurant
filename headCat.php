<?php include('include/header.php') ?>

<?php

$baseUrl = new addImage("file","images/imagesitems/");
?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">Main Category</h4>
                        
                        <ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
                            </li>

        <li class="nav-item" >
        <a href="AddmainBranch.php" style="font-weight:bold;font-size:10px;background-color:#282a3c;color:white" class="btn ">Add Main Category +</a>&nbsp&nbsp
        </li>


                        </ul>

                        </li>

          
        

                        
			
					</div>                 
                       
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title"><span >Main Category table</span> </h4>
                                                <li class="nav-item dropdown">
                                                <a style="color: white" class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-list-ul" style="color:white;font-weight: 600;">&nbsp;</i>

                                                Choose a Branch
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

                                                  ?>
                                                  <form method="post">
                                   <!-- <input type="hidden" name="branchID" value="<?php echo $row["ID"] ?>"> -->
                                   
                                  <button type="submit" name="getData"  class="btn btn-secondary "  onclick="getBranchesID(<?php echo $row["ID"] ?>)"><?php echo $row["name"]?></button>
                                  </form>
                                                          <?php 

                                                }

                                                }
                                                ?>
                                                </div>
                                                </li>
                                                </ul>
                                                <input class="form-control" id="myInput1" type="text" placeholder="Search..">
              <br>
                                    </div>

                                    <div class="card-body">
                  <div class="table-responsive overtable">
                    <table class="table">
                      <thead class=" text-secondary">
                        <th>Category ID</th>
                        <th>Category Image</th>
                        <th>Category Name</th>
                        <th>Category Sub Title</th>
                        <th>Status</th>
                         <th>Show In Slider</th>
                         <th>Delivery free</th>
                         <th>Sort Number</th>

                       

                       

                        <th>Action</th>
                      </thead>
                      <tbody id="myTable1">
                          <?php
                                   include_once  __DIR__ . '/connectionDb.php';
                                   $database = new connectionDb();
                                   $db = $database->getConnection();
                                           

                           

                             if(isset($_COOKIE['branchesID'])){
                             $branchID=$_COOKIE['branchesID'];
                             }else{
                                 $branchID=1;
                             }
                         



                       
                 
                  
                            $sql = "select DISTINCT
                             category_items_list.category_id,
                             category_items_list.sort_no,

                             
                             category_items_list.ShowINslider,
                             category_items_list.menuType
                            ,category_items_list.category_image
                            ,category_items_list.Status
                            ,category_items_list.Deliveryfree
                            ,category_lang.category_title
                            ,category_lang.category_subtitle
                            
                          
                            FROM category_items_list,category_lang where category_items_list.category_id = category_lang.category_id  and category_items_list.category_master=0 and category_items_list.BranchesID = $branchID ORDER BY `category_items_list`.`sort_no` ASC";

                            $stmt = $db->prepare($sql);
                            $stmt->execute();
                            $itemCount = $stmt->rowCount();
                            $tmp = array();
                            
                            if ($itemCount > 0) {

                                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                   ?>
                                   <tr id="D<?php echo $row["category_id"] ?>">
                                    <?php

                                if($row['menuType'] != 3 && $row['menuType'] != 6 &&  $row['menuType'] != 9 ){
                                echo "<th> " . $row["category_id"]. "</th><th onclick=\"getID(".$row["category_id"].")\">";?><a href='Category.php?CATID=<?php echo $row["category_id"]?>&Branchid=<?php echo $branchID?>'><?php echo"<img src='",$baseUrl->getBaseUrl().$row["category_image"],"' width='75' height='75' />" . "</a></th><th>"
                                . $row["category_title"]. "</th><th>".$row["category_subtitle"]."</th><th>";
                     
                              }elseif($row['menuType'] == 3){
                                echo "<th> " . $row["category_id"]. "</th><th onclick=\"getID(".$row["category_id"].")\">";?><a href='pdfCultures.php?Branchid=<?php echo $branchID?>'><?php echo"<img src='",$baseUrl->getBaseUrl().$row["category_image"],"' width='75' height='75' />" . "</a></th><th>"
                                . $row["category_title"]. "</th><th>".$row["category_subtitle"]."</th><th>";
                              }elseif($row['menuType'] == 6){
                                echo "<th> " . $row["category_id"]. "</th><th onclick=\"getID(".$row["category_id"].")\">";?><a href='pdfGOURMENT.php?Branchid=<?php echo $branchID?>'><?php echo"<img src='",$baseUrl->getBaseUrl().$row["category_image"],"' width='75' height='75' />" . "</a></th><th>"
                                . $row["category_title"]. "</th><th>".$row["category_subtitle"]."</th><th>";
                              }elseif($row['menuType'] == 9){
                                   echo "<th> " . $row["category_id"]. "</th><th onclick=\"getID(".$row["category_id"].")\">";?><a href='pdfConcept.php?Branchid=<?php echo $branchID?>'><?php echo"<img src='",$baseUrl->getBaseUrl().$row["category_image"],"' width='75' height='75' />" . "</a></th><th>"
                                . $row["category_title"]. "</th><th>".$row["category_subtitle"]."</th><th>";

                              }
                                
                                ?>
                                  <form name="ActCat" method="post">
                                    <input type="hidden" name="catID" value="<?php echo $row["category_id"] ?>">


                                    
                                    <?php 
                                               if($row['Status'] == 0){
                                                   ?>
                                                    <div class="onoffswitch">
                                                    <input  type="checkbox" name="onoffswitch" onclick="Switch(<?php echo $row['category_id'] ?>,this)" class="onoffswitch-checkbox" id="myonoffswitch<?php echo  $row["category_id"]?>" tabindex="0" >
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
                                    <form  action="updateCat.php" style="display: inline-block !important;">

                                    
                                    <input type="hidden" name="catID" value="<?php echo $row["category_id"] ?>">
                                    <input type="hidden" name="branchID" value="<?php echo $branchID ?>">
                                    <input type="hidden" name="from" value="headCat">


                                    <button class="btn btn-primary" id="updateCat"  ><i class="fas fa-pencil-alt"></i></button>
                                    </form>
                                      <form onsubmit="return false" style="    display: inline-block !important;">
                                    <?php if($row['menuType'] == 3 || $row['menuType'] == 6 || $row['menuType'] == 9 || $row['menuType'] == 5){?>
                                   <button class="btn btn-danger" id="DeleteCat" onsubmit="return false"><i class="fas fa-minus-circle"></i></button>

                                   
                                    <?php 
                                     }else{
                                         ?>
                                              <button class="btn btn-danger" id="DeleteCat" onsubmit="return false"  onclick="funn(<?php echo $row['category_id'] ?>)"><i class="fas fa-trash-alt"></i></button>

                                         <?php
                                     }
                                    
                                    ?> 
                                    </form>
                  
                                    </td>
                                    </tr>
                                    <?php 
                                }
                        
                               
                            
                              }else{
                              echo "<tr> <td>No category  in this  Branche ! </td></tr>";
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
    </div>
    </div>
    </div>



    <script>
            function getID(item_no){
                
                
                document.cookie = 'CARID' + '=' +escape( item_no ) + '; expires=Fri, 27 Jul 2021 02:47:11 UTC; path=/';
                
                
            }
            
      </script>
      
      <script>
            function getBranchesID(item_no){
                
      
                document.cookie = 'branchesID' + '=' +escape( item_no ) + '; expires=Fri, 27 Jul 2021 02:47:11 UTC; path=/';
                
                
            }
            
      </script>


<?php include('include/footer.php') ?>
       

<script>

 
 $("#myInput1").on("keyup", function() {      
 var value = $(this).val().toLowerCase();
 $("#myTable1 tr").filter(function() {
 $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
 });

 });


 </script>
<script>
  
  function  funn(name){
 
 






          swal({
  title: "Are you sure?",
  text: "It will permanently be deleted with All related Data!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
   
    iDCat=name;
 
 $.ajax({
      type: "POST",
      url:"DeleteCategory.php",
      data:{Delete:iDCat}, // serializes the form's elements.
      success: function(data)
      {


          $("#D"+iDCat).fadeOut("slow"); // show response from the php script.
      }
    }).then(function(){

              swal("This record has been deleted.!", {
              icon: "success",
              });
        });




  } 
});









 
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
             
                    
            }
          });
    }else{


      $.ajax({
            type: "POST",
            url:"updateCatSwitch.php",
            data:{catID:catID,status:0}, // serializes the form's elements.
            success: function(data)
            {
          

            
            }
          });
    }

    return completed();
}
function completed(){
  location.replace("headCat.php");

}


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


// updateDFREE
   </script>


