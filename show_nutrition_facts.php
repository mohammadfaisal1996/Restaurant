<?php include('include/header.php') ?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title"> show nutrition facts</h4>
                        
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
                            <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                            </li>

              
                        </ul>
                        
			
					</div>                   
                  



                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 " >   
                                    <br><h4 class="card-title"></h4><br>
                                    </div>
                            
                  </div>

                                    <div class="card-body">
                    <div class="table-responsive" id="order_table">
                        <table class="table" id="result2">
                      <thead class=" text-secondary">
                     
                        <th>#</th>
                        <th>Item name</th>
                        <th>Item  sub name</th>

                        <th>Item Image</th>
                        <th>Nutrition Facts Image</th>
                        <th>status</th>
                        <th>ِAction</th>

                        

                        
                        
                      </thead>
                      <tbody  id="myTable1">
                      <?php
                          
                                            $s = "";
                                            $t = "";
                                            include_once  __DIR__ . '/connectionDb.php';
                                            $database = new connectionDb();
                                            $db = $database->getConnection();

                                           

                               


                                     
                        
                                            $sql = "SELECT item_nutrition_fads.*,category_items_list.category_image,category_lang.category_title,category_lang.category_subtitle FROM `item_nutrition_fads`,category_items_list,category_lang   where   item_nutrition_fads.item_id=category_items_list.category_id and category_items_list.category_id = category_lang.category_id";
                                            $stmt = $db->prepare($sql);
                                            $stmt->execute();
                                            $itemCount = $stmt->rowCount();

                                            if ($itemCount > 0) {




                                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                ?>






                                                <tr id="D<?php echo $row['id']?>">
                                                <td><?php echo $row['id']?></td>
                                                
                                                <td>
                                                <?php echo $row['category_title']?>
                                                </td>
                                                <td>
                                                <?php echo $row['category_subtitle']?>
                                                </td>
                                                <td><img  src="<?php echo "https://dashboard.bluefig.digisolapps.com/uploads/images/imagesitems/".$row["category_image"] ?>" width='80' height='80' /></a></td>
                                        
                                                <td><img  src="<?php echo $row["image"] ?>" width='80' height='80' /></a></td>

                                         

                                                <td>
                                                
                                                
                                       
                                                    <?php 
                                               if($row['status'] == 0){
                                                   ?>
                                                    <div class="onoffswitch">
                                                    <input type="checkbox" name="onoffswitch" onclick="SwitchFad(<?php echo $row['id'] ?>,this)" class="onoffswitch-checkbox" id="myonoffswitch<?php echo  $row["id"]?>" tabindex="0" >
                                                    <label class="onoffswitch-label" for="myonoffswitch<?php echo  $row["id"]?>">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                    </label>
                                                    </div>
                                                    </td>
                                                   <?php


                                               }else{
                                                   ?>

                                                    <div class="onoffswitch">
                                                    <input type="checkbox" name="onoffswitch" onclick="SwitchFad(<?php echo $row['id'] ?>,this)" class="onoffswitch-checkbox" id="myonoffswitch<?php echo  $row["id"]?>" tabindex="0" checked>
                                                    <label class="onoffswitch-label" for="myonoffswitch<?php echo  $row["id"]?>">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                    </label>
                                                    </div>
                                                    </td>

                                                   <?php 
                                               } 
                                               ?>
                                                
                                           

                                                <td>

                                                  
                                                    <button type="button" id="updateModel" value="<?php echo $row['id']?>" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLabel123<?php echo $row['id']?>">
                                                    <i class="fas fa-pencil-alt"></i></button>

                                                                                                        <!-- Button trigger modal -->
                                                    <div class="modal fade" id="exampleModalLabel123<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel123<?php echo $row['id']?>" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel123<?php echo $row['id']?>">Update nutrition facts image </h5>
                                                    <form method="post"  enctype="multipart/form-data">




                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <div class="col-sm-12 col-md-6">
                                                    <div class="form-group">


                                                    </div>

                                                    </div>

                                                    <div class="col-sm-12 col-md-6">





                                                    <div class="form-group">

                                                    <label for="exampleFormControlFile1">Upload</label>
                                        
                                                    <input type="hidden" name="FadID" id="fadIDValue" value="<?php echo $row['id'] ?>">
                                                    <input type="file"  class="form-group"  accept="image/x-png,image/gif,image/jpeg" name='file' required id="myInput">
                                                    <div class="custom-control " id="wrongSize">
                                                    <span style="color:red">The size of the image must be less than 500 KB  to be uploaded</span>
                                                    </div>
                                                    </div>



                                                    </div>






                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="updateFad" class="btn btn-primary">Submit</button>

                                                    </div>
                                                    </form>
                                                    </div>
                                                    </div>
                                                    </div>    

                                                    <form onsubmit="return false" style="    display: inline-block !important;">
                                                       <button class="btn btn-danger" id="DeleteCat" onsubmit="return false"  onclick="Delete(<?php echo $row['id'] ?>)"><i class="fas fa-trash-alt"></i></button>
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
    </div>
    </div>



<?php include('include/footer.php') ?>
<?php 

    @require 'aws/aws-autoloader.php';

if(isset($_POST['updateFad'])&&isset($_POST['FadID'])&&isset($_FILES['file'])){


     

     $fadID=$_POST['FadID'];


    $name= 'file';
    $path ="uploads/pdf/";
    $Image = new addImage($name,$path);

      
        
    
         if($Image->size < 524288){

            $sql2="Update item_nutrition_fads set image ='".$Image->getImageFullName()."' where  id = $fadID ";
            echo "<script>alert($sql2)</script>";
            $stm2=$db->prepare($sql2);
            if($stm2->execute()){

                $Image->moveImage();



                    ?>
                    <script>
                    swal("Update nutrition fad Success!", "", "success").then(function(){

                        location.replace("show_nutrition_facts.php");

                    });
                    </script>
                    <?php

            }


        }
    
    }

        ?>

<script>
function  Delete(ID){



        swal({
        title: "Are you sure?",
        text: "It will permanently deleted!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {


        $.ajax({
                    type: "POST",
                    url:"nutrition_fadsCRUD.php",
                    data:{Delete:ID}, // serializes the form's elements.
                    success: function(data)
                    {
                    
                        $("#D"+ID).fadeOut("slow"); // show response from the php script.
                    },
                    error:function(){
                            swal("can't deleted record.!", {
                            icon: "error",
                            });
                            return 0;
                    }
                }).then(function(){

                    swal("This record has been deleted.!", {
                    icon: "success",
                    });
                });
        } 
        });


}


 function SwitchFad(ID,checkbox)
{


    if (checkbox.checked)
    {
      $.ajax({
            type: "POST",
            url:"nutrition_fadsCRUD.php",
            data:{update:ID,status:1}, // serializes the form's elements.
            success: function(data)
            {
             
                // $("#D"+iDCat).fadeOut("slow"); // show response from the php script.
            }
          });
    }else{
      $.ajax({
            type: "POST",
            url:"nutrition_fadsCRUD.php",
            data:{update:ID,status:0}, // serializes the form's elements.
            success: function(data)
            {
          

                // $("#D"+iDCat).fadeOut("slow"); // show response from the php script.
            }
          });
    }
}



$("#updateModel").click(function(){

   
    var fadID=$(this).val();
    $("#fadIDValue").val(fadID);
});

</script>