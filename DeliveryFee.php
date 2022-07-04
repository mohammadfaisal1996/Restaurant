<?php include('include/header.php') ?>



<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">DeliveryFee Setting</h4>
            

                        
			
					</div><br><br>                    
                       
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title"> Branches DeliveryFee </h4>

                                

                                    <br>
                                    </div>

                                   <div class="col-lg-6  col-md-8   col-sm-12"><br><br> 
                            
          
                                   <div class="card-body">
                    <div class="table-responsive" id="order_table">
                        <table class="table" id="result2">
                      <thead class=" text-secondary">
                     
                        <th>#</th>
                        <th>Delivery Fee</th>
                        <th>place</th>
                      

                        

                        
                        
                      </thead>
                      <tbody  id="myTable1">
                      <?php
                          
                            
                      

             
                    
                    
                    
                    
                    
                        
                                   
                                            include_once  __DIR__ . '/connectionDb.php';
                                            $database = new connectionDb();
                                            $db = $database->getConnection();
                               


                                      
                        
                                            $sql = "SELECT DISTINCT  delivery_fee_list.serial_no,delivery_fee_list_lang.title,delivery_fee_list.delivery_fee FROM `delivery_fee_list` JOIN delivery_fee_list_lang ON delivery_fee_list.serial_no = delivery_fee_list_lang.master_Id where delivery_fee_list.serial_no=45 || delivery_fee_list.serial_no=46 ";
                                            $stmt = $db->prepare($sql);
                                            $stmt->execute();
                                            $itemCount = $stmt->rowCount();

                                            if ($itemCount > 0) {

                                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <tr>
                                                <td><?php echo $row['serial_no']?></td>
                                                <td>
                                            
                                          <form  method="post" style="display: inline-block !important;">
                                          <input type="text" class="form-group"  minlength="1" name="DeliveryFee" value="<?php echo $row['delivery_fee']?>"  required>
                                          <input type="hidden" value="<?php echo $row['serial_no'] ?>" name="placenumber">
                                          <button class="btn btn-primary" type="submit" name="updateDElivery"  ><i class="fas fa-pencil-alt"></i></button>
                                          </form>


                                                </td>
                                           
                                                <td><?php echo $row['title']?></td>
                                       
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
    </div>



    <?php include('include/footer.php') ?>
       
    <?php 
               
               if(isset($_POST['updateDElivery'])){
                

                // submit by place
                                include_once  __DIR__ . '/connectionDb.php';
                                $database = new connectionDb();
                                $db = $database->getConnection(); 

                        if(isset($_POST['DeliveryFee'])){
                        $value=$_POST['DeliveryFee'];
                        $placenumber=$_POST['placenumber'];
                        
                     
              
                  
                          $Sl33 = "UPDATE `delivery_fee_list` SET `delivery_fee`=$value WHERE `serial_no`=$placenumber";

                          $stmt77 = $db->prepare($Sl33);
                          if($stmt77->execute()){
                            ?>
                            <script>

                            swal("Update Success!", "Update Delivery Fee  success!", "success").then(function(){
                            location.replace("Setting.php");
                            });




                            </script>
                            <?php
                        }else{
                            ?>
                            <script>

                            swal("No Data update!", "No Data updated in admin account!", "info").then(function(){
                            location.replace("Setting.php");
                            });




                            </script>


                        <?php
                        }


             



                      }                
               }

               ?>  







