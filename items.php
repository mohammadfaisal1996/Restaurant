<?php include('include/header.php');

$baseUrl = new addImage("file","images/imagesitems/");
?>




<div class="main-panel">
			<div class="content">
				<div class="page-inner">


        
                <div class="page-header">
                        <h4 class="page-title">Items </h4>
            
                        <ul class="breadcrumbs">
                              <li class="separator">
                              <i class=""></i>
                              </li>


                              <li class="nav-item" >
                              <a href="addItemList.php" style="font-weight:bold;font-size:10px;background-color:#282a3c;color:white" class="btn ">Add Items +</a>&nbsp&nbsp
                              </li>
                              <li class="separator">
                              <i class=""></i>
                              </li>


                              <li class="nav-item" >
                              <a href="AddOns.php" style="font-weight:bold;font-size:10px;background-color:#282a3c;color:white" class="btn ">Add Ons +</a>&nbsp&nbsp
                              </li>
                              <li class="separator">
                              <i class=""></i>
                              </li>
                        

                                 <li class="nav-item" >
                              <a href="AddExtra.php" style="font-weight:bold;font-size:10px;background-color:#282a3c;color:white" class="btn ">Add Extra +</a>&nbsp&nbsp
                              </li>
                                    <li class="separator">
                              <i class=""></i>
                              </li>


                              <li class="nav-item" >
                                    <a href="ItemsCopy.php" style="font-weight:bold;font-size:10px;background-color:#282a3c;color:white" class="btn "> copy items </a>&nbsp&nbsp
                                    </li>
                                    <li class="separator">
                                    <i class=""></i>
                              </li>
                        

                            <li class="nav-item" >

                                    <div class="dropdown">

                                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Item nutrition facts
                                            </button>
                                            <ul class="dropdown-menu p-2" >
                                                <li><a href="Add_nutrition_facts.php"   >Add nutrition facts</a>&nbsp&nbsp</li>
                                                <li><a href="show_nutrition_facts.php" >Show nutrition facts</a>&nbsp&nbsp</li>
                                            </ul>
                                    </div>       
                                


                            </li>

                        </ul>

                  
                        
			
					</div>
             
                       
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title"> Items Table</h4>
                                   
                                   
                                   
                                    <br><br><input class="form-control" id="myInput1" type="text" placeholder="Search.."><br><br>

                            
                                    </div>
                                    <?php    include_once  __DIR__ . '/connectionDb.php';
                                    $database = new connectionDb();
                                    $db = $database->getConnection();?>
                                   <div class=" col-sm-12"> 
                                    <form method="post" enctype="multipart/form-data">
                                       
                                        <div class="form-group form-floating-label ">

                                                
                                      
                                      


                                          <!-- <div class="dropdown"    >
                                          <button class="btn btn-secondary dropdown-toggle d-inline" style="display:inline" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          select one 
                                          </button> -->




                                
                                        <table class="table" >
                                        <thead class=" text-secondary">

                              
                                        <th>#</th>
                                        <th>Item_image</th>
                                        <th>Item_title</th>
                                        <th>Price</th>
                                        <th>Action</th>

                                      



                                        </thead>
                                        <tbody  id="myTable1">
                                        
                                       
                                            <?php 

                                            // count1 for pagination
                                            $Count1="SELECT DISTINCT
                                            category_items_list.category_id
                                            ,category_items_list.category_image
                                            ,category_items_list.item_price
                                            ,category_lang.category_title
                                            FROM category_items_list,category_lang where category_items_list.category_id = category_lang.category_id    and (category_items_list.item_price != 0.000 || category_items_list.IsSizes = 1)";

                                            $countPage1 = $db->prepare($Count1);
                                            if($countPage1->execute()){
                                            $numberOFRow1=$countPage1->rowCount();

                                            }





                                                       
                                                      
                                                    
                                                          $sql = "SELECT DISTINCT
                                                          category_items_list.category_id
                                                         ,category_items_list.category_image
                                                         ,category_items_list.item_price
                                                         ,category_lang.category_title
                                                        
                                       
                                                         
                             
                                                         FROM category_items_list,category_lang where category_items_list.category_id = category_lang.category_id    and category_items_list.item_price != 0.000 ";
                                                          $stmt = $db->prepare($sql);
                                                          if($stmt->execute()){
                                                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                                ?>
                                                    
                                           
    
                                                      <tr class="D<?php echo $row['category_id'] ?>">
                                                      
                                                      
                                                      <td><?php  echo $row['category_id']?></td>
                                                      <td><img     src="<?php echo $baseUrl->getBaseUrl().$row["category_image"] ?>" width='80' height='80' /></a></td>
                                                      <td><?php echo $row['category_title'] ?></td>
                                                      <td><?php echo $row['item_price'] ?></td>


                                                      <td>

                                                      <form></form>
                                                      <form id="<?php echo $row["category_id"]."a" ?>" action="updateItemNew.php"  style="display: inline-block !important;">
                                                      <input type="hidden" name="catID" value="<?php echo $row["category_id"] ?>">
                                                      <button class="btn btn-primary" id="updateCat"  ><i class="fas fa-pencil-alt"></i></button>
                                                      </form>



                                                      <form id="<?php echo $row["category_id"]."b" ?>"  onsubmit="return false" style="    display: inline-block !important;">
                                                      <button class="btn btn-danger" id="DeleteCat" onsubmit="return false"  onclick="funn(<?php echo $row['category_id'] ?>)"><i class="fas fa-trash-alt"></i></button>
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
                                                         ,category_lang.category_title
                                                        
                                       
                                                         
                             
                                                         FROM category_items_list,category_lang where category_items_list.category_id = category_lang.category_id    and category_items_list.IsSizes = 1 ";
                                                          $stmt = $db->prepare($sql);
                                                          if($stmt->execute()){
                                                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                                ?>
                                                    
                                           
    
                                                      <tr class="D<?php echo $row['category_id'] ?>">
                                                      
                                                      
                                                      <td><?php  echo $row['category_id']?></td>
                                                      <td><img     src="<?php echo $baseUrl->getBaseUrl().$row["category_image"] ?>" width='80' height='80' /></a></td>
                                                      <td><?php echo utf8_encode($row['category_title']) ?></td>
                                                      <td><?php echo $row['item_price'] ?></td>


                                                      <td>
                                                      <form  action="updateItemNew.php"  style="display: inline-block !important;">


                                                      <input type="hidden" name="catID" value="<?php echo $row["category_id"] ?>">
                           


                                                 
                                                      
                                            


                                                      <button class="btn btn-primary" id="updateCat"  ><i class="fas fa-pencil-alt"></i></button>
                                                      </form>

                                                      <form onsubmit="return false" style="    display: inline-block !important;">
                                                      <button class="btn btn-danger" id="DeleteCat" onsubmit="return false"  onclick="funn(<?php echo $row['category_id'] ?>)"><i class="fas fa-trash-alt"></i></button>
                                                      </form>

                                                      </td>


                                                      
                                                      
                                                      </tr>

                                                         
                                                          
                                                            <?php
                                                          }
                                                        }

                                            
                                            ?>




                                   
                                   </table>
                                   <!-- <div class="row"><div class="offset-4 col-sm-12" style="overflow-x:auto;">
                                   </div> -->
                                   <!-- <div class="offset-4 col-md-12">
                                   <div class="dataTables_paginate paging_simple_numbers" id="multi-filter-select_paginate">
                                   <ul class="pagination">
                                   <li class="paginate_button page-item previous " id="basic-datatables_previous"><a href="items.php?page=<?php //echo 1?>" aria-controls="basic-datatables" data-dt-idx="0" tabindex="0" class="page-link"><<</a></li>
                                   <li class="paginate_button page-item previous " id="basic-datatables_previous"><a href="items.php?page=<?php //echo $page-1?>" aria-controls="basic-datatables" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                 
                                  <?php 
                                //   for($page=$start;$page <= $end +1 ;++$page) {
                                //    if(isset($_GET['page']) && $_GET['page']==$page){
                                       ?>
                                   <li class="paginate_button page-item active"><a href="items.php?page=<?php //echo $page?>" aria-controls="multi-filter-select" data-dt-idx="1" tabindex="0" class="page-link"><?php //echo $page?></a></li>
                                  <?php 
                                //   }else{
                                      
                                      ?>
                                  <li class="paginate_button page-item"><a href="items.php?page=<?php //echo $page?>" aria-controls="multi-filter-select" data-dt-idx="1" tabindex="0" class="page-link"><?php //echo $page?></a></li>
                                 <?php
                                //   }
                                
                                    // }
                                    ?>  
                                    <li class="paginate_button page-item next" id="basic-datatables_next"><a href="items.php?page=<?php //echo $page+1?>" aria-controls="basic-datatables" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>                                
                                    <li class="paginate_button page-item next" id="basic-datatables_next"><a href="items.php?page=<?php //echo $buttonPage?>" aria-controls="basic-datatables" data-dt-idx="7" tabindex="0" class="page-link">>></a></li>                                
                                   
                                   </ul></div></div> -->
                                   
                                   </div>

                                     
                                                           
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
                $branchID=$_GET['branchid'];

                foreach($_POST['lang'] as $value){

                    $SQLU = "INSERT INTO `item_mapping`( `cat_id`, `item_id`) VALUES($category,$value)";
                    $Stmt1 = $db->prepare($SQLU);
                    if($Stmt1->execute()){
                      header("Location:Itemslist.php?CATID=$category&branchid=$branchID");
                      
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
 














    swal({
  title: "Are you sure?",
  text: "It will permanently deleted!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
   
    
    var iDCat=name;

$.ajax({
     type: "POST",
     url:"DeleteNItem.php",
     data:{Delete:iDCat}, // serializes the form's elements.
     success: function(data)
     {

       
         
         $(".D"+iDCat).fadeOut("slow"); // show response from the php script.
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