<?php include('include/header.php') ?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">Quote</h4>
                        
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
                        <th>image</th>
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
                               


                                      
                        
                                            $sql = "SELECT * FROM `Quote` limit 1";
                                            $stmt = $db->prepare($sql);
                                            $stmt->execute();
                                            $itemCount = $stmt->rowCount();

                                            if ($itemCount > 0) {




                                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                ?>

                                                <!-- Button trigger modal -->
                                                <div class="modal fade" id="exampleModalLabel123" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel123" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel123">Update Quote image </h5>
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
                                                <input type="hidden" name="QuoteID" value="<?php echo $row['id'] ?>">
                                                <input type="file"  class="form-group"  accept="image/x-png,image/gif,image/jpeg" name='file' required id="myInput">
                                                <div class="custom-control " id="wrongSize">
                                                <span style="color:red">The size of the image must be less than 500 KB  to be uploaded</span>
                                                </div>
                                                </div>



                                                </div>






                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="updateQuote" class="btn btn-primary">Submit</button>

                                                </div>
                                                </form>
                                                </div>
                                                </div>
                                                </div>




                                                <tr>
                                                <td><?php echo $row['id']?></td>
                                                <td>
                                                <img src="<?php echo $row['image']?>" width="250">
                                                </td>

                                                <td>
                                                
                                                
                                       
                                                    <?php 
                                               if($row['status'] == 0){
                                                   ?>
                                                    <div class="onoffswitch">
                                                    <input type="checkbox" name="onoffswitch" onclick="SwitchQuote(<?php echo $row['id'] ?>,this)" class="onoffswitch-checkbox" id="myonoffswitch<?php echo  $row["id"]?>" tabindex="0" >
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
                                                    <input type="checkbox" name="onoffswitch" onclick="SwitchQuote(<?php echo $row['id'] ?>,this)" class="onoffswitch-checkbox" id="myonoffswitch<?php echo  $row["id"]?>" tabindex="0" checked>
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

                                      



                                         


                                          

                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLabel123">
                                                <i class="fas fa-pencil-alt"></i></button>
                                               
                                    
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
    require 'aws/aws-autoloader.php';   

    if(isset($_POST['updateQuote'])&&isset($_POST['QuoteID'])&&isset($_FILES['file'])){


     

        $QuoteID=$_POST['QuoteID'];



        $name= 'file';
        $path ="uploads/pdf/";
        $Image = new addImage($name,$path);

      
        

         if($Image->size < 524288){

        $sql2="Update Quote set image ='".$Image->getImageFullName()."' where  id = $QuoteID ";
        $stm2=$db->prepare($sql2);
        if($stm2->execute()){

            $Image->moveImage();

          ?>
          <script>location.replace("Quote.php");</script>
          <?php
        }

         }
  
    }

    
    
    ?>




<?php include('include/footer.php') ?>
<script>

  function SwitchQuote(QuotID,checkbox)
{


    if (checkbox.checked)
    {
      $.ajax({
            type: "POST",
            url:"SwitchQuote.php",
            data:{QuotID:QuotID,status:1}, // serializes the form's elements.
            success: function(data)
            {
       
            }
          });
    }else{
      $.ajax({
            type: "POST",
            url:"SwitchQuote.php",
            data:{QuotID:QuotID,status:0}, // serializes the form's elements.
            success: function(data)
            {
     
            }
          });
    }
}





</script>
