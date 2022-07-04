<?php include('include/header.php') ?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">show category header</h4>
                        
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




  <div class="modal fade" id="exampleModalLabel123" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel123" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel123">Update header category </h5>
                <form method="post"  enctype="multipart/form-data">




                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">


                <div class="col-sm-12 ">





                <div class="form-group">

                <label for="exampleFormControlFile1">Upload</label>



                         <input type="hidden" name="ID" id="fadIDValue" >
-

                        <div class=" form-group  mb-1">
                                <textarea id="Text" class="form-control"  name="category_text" rows="4" cols="50"></textarea>
                        </div>
                        
                        <label for="url">upload  pdf:</label>
                        <input type="file"  class="form-control" accept="application/pdf" name="category_pdf"  >

                        <div class="custom-control " id="wrongSizeVideo"   style="display:none">
                        <span style="color:red">you already add info for this category</span>
                        </div>

         
                </div>



                </div>






                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="updateCategory" class="btn btn-primary">Submit</button>

                </div>
                </form>
                </div>
                </div>
                </div>                      






                                    <div class="card-body">
                    <div class="table-responsive" id="order_table">
                        <table class="table" id="result2">
                      <thead class=" text-secondary">
                     
                        <th>#</th>
                        <th>Text</th>
                        <th>pdf_file</th>
                        <th>status</th>
                        <th>ِAction</th>

                        

                        
                        
                      </thead>
                      <tbody  id="myTable1">
                      <?php
                          
                                            $s = "";
                                            $t = "";
                                            $sql="";
                                            include_once  __DIR__ . '/connectionDb.php';
                                            $database = new connectionDb();
                                            $db = $database->getConnection();

                                            if(isset($_GET['catidMain']) && !empty($_GET['catidMain'] )) {

                                                $catidMain=$_GET['catidMain'];
                                                 $sql = "SELECT * FROM `categoryInfo` where CatID=$catidMain";


                                            }
        
                                            $stmt = $db->prepare($sql);
                                            if($stmt->execute()){

                                                              $itemCount = $stmt->rowCount();

                                            if ($itemCount > 0) {




                                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                ?>






                                                <tr id="D<?php echo $row['id']?>">
                                                <td><?php echo $row['id']?></td>
                                                <td>
                                                      <textarea  class="form-control" id="oldtext"  name="Text" rows="4" cols="30"><?php echo $row['Text'] ?></textarea>
                                                </td>

                                                <td>
                                                <?php if(isset($row['pdf_file']) && !empty($row['pdf_file'])){?>
                                                  <object data="<?php echo $row['pdf_file']?>" type="application/pdf">
                                                      <embed src="<?php echo $row['pdf_file']?>" type="application/pdf" />
                                                  </object>
                                                <?php } else {
                                                    # code...
                                                    echo "no pdf for this category";
                                                }?>
                                                </td>

                                                <td>
                                                
                                                
                                       
                                                    <?php 
                                               if($row['status'] == 0){
                                                   ?>
                                                    <div class="onoffswitch">
                                                    <input type="checkbox" name="onoffswitch" onclick="SwitchCategory(<?php echo $row['id'] ?>,this)" class="onoffswitch-checkbox" id="myonoffswitch<?php echo  $row["id"]?>" tabindex="0" >
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
                                                    <input type="checkbox" name="onoffswitch" onclick="SwitchCategory(<?php echo $row['id'] ?>,this)" class="onoffswitch-checkbox" id="myonoffswitch<?php echo  $row["id"]?>" tabindex="0" checked>
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

                                                       <button type="button" id="updateModel" value="<?php echo $row['id']?>" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLabel123">
                                                       <i class="fas fa-pencil-alt"></i></button>

                                                        <form onsubmit="return false" style="    display: inline-block !important;">
                                                        <button class="btn btn-danger" id="DeleteCat" onsubmit="return false"  onclick="Delete(<?php echo $row['id'] ?>)"><i class="fas fa-trash-alt"></i></button>
                                                        </form>
                                               
                                    
                                             </td>
                                                </tr>
                                    
                                               <?php
                                                 }
                                          
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
            


    

                if(isset($_POST['updateCategory']) && isset($_POST['category_text'])){


                             $category_text=trim(filter_var($_POST['category_text'], FILTER_SANITIZE_STRING));
                             $ID=$_POST['ID'];
                                if(isset($_FILES['category_pdf'])&& !empty($_FILES['category_pdf']['name'])){



                                            $name= 'category_pdf';
                                            $path ="uploads/pdf/";
                                            $Image= new addImage($name,$path);


                                    $categoryData="update  `categoryInfo` set `Text`='$category_text',`pdf_file`='".$Image->getImageFullName()."' where id =$ID ";
                                    $executeCategory=$db->prepare($categoryData);

                                    if($executeCategory->execute()){


                                        if(!empty($Image->name)){
                                            $Image->moveImage();
                                        }

                                        echo "<script>location.replace('showCategoryData.php?catidMain=$catidMain');</script>";

                                    }else{
                                        echo "<script>alert('can't add this Category Info')</script>";
                                    }


                                }




                    $categoryData="update  `categoryInfo` set `Text`='$category_text' where id =$ID ";
                    $executeCategory=$db->prepare($categoryData);

                    if($executeCategory->execute()){

                        echo "<script>location.replace('showCategoryData.php?catidMain=$catidMain');</script>";

                    }else{
                        echo "<script>alert('can't add this Category Info')</script>";
                    }

                }
             






                                  


               
                                     
                        





            
            




            ?>





<?php include('include/footer.php') ?>

<script>

 function SwitchCategory(ID,checkbox)
{


    if (checkbox.checked)
    {
      $.ajax({
            type: "POST",
            url:"CategoryDataCRUD.php",
            data:{UpdateStatus:ID,status:1}, // serializes the form's elements.
            success: function(data)
            {
             
                // $("#D"+iDCat).fadeOut("slow"); // show response from the php script.
            }
          });
    }else{
      $.ajax({
            type: "POST",
            url:"CategoryDataCRUD.php",
            data:{UpdateStatus:ID,status:0}, // serializes the form's elements.
            success: function(data)
            {
          

                // $("#D"+iDCat).fadeOut("slow"); // show response from the php script.
            }
          });
    }
}




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
                    url:"CategoryDataCRUD.php",
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
$("#updateModel").click(function(){

   
    var fadID=$(this).val();
    $("#fadIDValue").val(fadID);
    $("#Text").val($("#oldtext").val());
});


</script>