<?php include('include/header.php') ?>
<?php
$baseUrl = new addImage("file","images/imagesitems/");

?>
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">Slider</h4>
                        
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
								<a href="index.php" >Dashboard</a>
							</li>

                
                        </ul>
                        
			
					</div>                   
                       
<!-- Button trigger modal -->

  



                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title">Slider table</h4><br>
                                    <input class="form-control mb-3" id="myInput1" type="text" placeholder="Search.."><br>

                                    </div>
                                    

       
            
                  </div>

                                    <div class="card-body">
                    <div class="table-responsive" id="order_table">
                        <table class="table" id="result2">
                      <thead class=" text-secondary">
                     
                        <th>#</th>
                        <th>slider</th>
                        <th>category_title </th>
                        <th>category_subtitle </th>
                        
                        <th>status</th>

                        

                        
                        
                      </thead>
                      <tbody  id="myTable1">
                      <?php
                          
                            
                      

             
                    
                    
                    
                    
                    
                        
                                         
                                            include_once  __DIR__ . '/connectionDb.php';
                                            $database = new connectionDb();
                                            $db = $database->getConnection();
                               


                                      
                                            $sql = "
                                            select DISTINCT category_items_list.category_id, category_items_list.ShowINslider ,category_items_list.category_image ,category_lang.category_title ,category_lang.category_subtitle FROM category_items_list,category_lang where category_items_list.category_id = category_lang.category_id and category_items_list.ShowINslider =1 ";
               
                                            $stmt = $db->prepare($sql);
                                            $stmt->execute();
                                            $itemCount = $stmt->rowCount();

                                            if ($itemCount > 0) {

                                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <tr id="D<?php echo $row['category_id'] ?>">
                                                <td><?php echo $row['category_id']?></td>
                                            
                                           
                                                <td>
                                 
                                                    <img src="<?php echo  $baseUrl->getBaseUrl().$row['category_image']?>" width='175' height='175' />
                                   
                                                
                                                </td>
                                                <td><?php echo $row ['category_title'] ?>                                                
                                                </td>

                                                <td><?php echo $row ['category_subtitle'] ?>                                                
                                                </td>

                                                <td>
                                                
                                                
                                            



                                                    <?php 
                                               if($row['ShowINslider'] == 0){
                                                   ?>
                                                    <div class="onoffswitch">
                                                    <input type="checkbox" name="onoffswitch" onclick="showINslider(<?php echo $row['category_id'] ?>,this)" class="onoffswitch-checkbox" id="myonoffswitch<?php echo  $row["category_id"]?>" tabindex="0" >
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
                                                    <input type="checkbox" name="onoffswitch" onclick="showINslider(<?php echo $row['category_id'] ?>,this)" class="onoffswitch-checkbox" id="myonoffswitch<?php echo  $row["category_id"]?>" tabindex="0" checked>
                                                    <label class="onoffswitch-label" for="myonoffswitch<?php echo  $row["category_id"]?>">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                    </label>
                                                    </div>
                                                    </td>

                                                   <?php 
                                               } 
                                               ?>
                                                








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
    </div>
    </div>
    <?php 




if(isset($_POST['addVideo'])){
?>
<script>alert("Video")</script>
<?php

}

if(isset($_POST['addImage'])){
?>
<script>alert("ddImage")</script>
<?php


}
    
    
    ?>




<?php include('include/footer.php') ?>
<script>

function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function show(id){


  var x = document.getElementById(id+"password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}


function  Delete(id){
 




          swal({
  title: "Are you sure?",
  text: "It will permanently deleted!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {

    var BannerID=id;

$.ajax({
            type: "POST",
            url:"DeleteBanner.php",
            data:{Delete:BannerID}, // serializes the form's elements.
            success: function(data)
            {
             
 
 
                $("#D"+BannerID).fadeOut("slow"); // show response from the php script.
            }
          }).then(function(){

              swal("This record has been deleted.!", {
              icon: "success",
              });
        });




  } 
});


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

</script>

