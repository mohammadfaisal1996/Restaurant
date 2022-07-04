<?php include('include/header.php') ?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">Banner</h4>
                        
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

                            <li class="nav-item" >
                            <a  class="btn btn-primary" href="addBanner.php">Add Banner +</a>&nbsp&nbsp
                            </li>
                
                        </ul>
                        
			
					</div>                   
                       
<!-- Button trigger modal -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title">Banner table</h4><br>
                                    <input class="form-control mb-3" id="myInput1" type="text" placeholder="Search.."><br>

                                    </div>
                                    

       
            
                  </div>

                                    <div class="card-body">
                    <div class="table-responsive" id="order_table">
                        <table class="table" id="result2">
                      <thead class=" text-secondary">
                     
                        <th>#</th>
                        <th>banner</th>
                        <th>description</th>
                        <th>type</th>
                        <th>status</th>
                        <th>ِAction</th>

                        

                        
                        
                      </thead>
                      <tbody  id="myTable1">
                      <?php
                          
                            
                      

             
                    
                    
                    
                    
                    
                        
                                         
                                            include_once  __DIR__ . '/connectionDb.php';
                                            $database = new connectionDb();
                                            $db = $database->getConnection();
                               

                                      
                        
                                            $sql = "SELECT * FROM `banner` ORDER by sort";
                                            $stmt = $db->prepare($sql);
                                            $stmt->execute();
                                            $itemCount = $stmt->rowCount();

                                            if ($itemCount > 0) {

                                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <tr id="D<?php echo $row['ID'] ?>">
                                                <td><?php echo $row['ID']?></td>
                                            
                                           
                                                <td>
                                                
                                                <?php if($row['type'] == 'image' || $row['type'] == 'offer' ){
                                                    ?>
                                                    
                                                    <img src="<?php echo  $row['banner']?>" width='175' height='175' />
                                            
                                                    
                                                    <?php
                                                }else if($row['type'] == 'video'){?>


                                           <iframe width="175" height="175" src="<?php echo $row['banner'] ?>" frameborder="0" allowfullscreen></iframe>


                                                <?php

                                                } ?>
                                           
                                                
                                                </td>

                                                <td>
                                                    <?php if($row['type'] == 'offer'){ ?>

                                                        <textarea  class="form-control"  name="description" rows="4" cols="30"><?php echo $row['description'] ?></textarea>
                                                     <?php }?>
                                                
                                                </td>


                                                

                                              <td><?php echo $row['type'] ?> </td>


                                                <td>
                                                
                                                
                                            



                                                    <?php 
                                               if($row['status'] == 0){
                                                   ?>
                                                    <div class="onoffswitch">
                                                    <input type="checkbox" name="onoffswitch" onclick="Switch(<?php echo $row['ID'] ?>,this)" class="onoffswitch-checkbox" id="myonoffswitch<?php echo  $row["ID"]?>" tabindex="0" >
                                                    <label class="onoffswitch-label" for="myonoffswitch<?php echo  $row["ID"]?>">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                    </label>
                                                    </div>
                                                    </td>
                                                   <?php


                                               }else{
                                                   ?>

                                                    <div class="onoffswitch">
                                                    <input type="checkbox" name="onoffswitch" onclick="Switch(<?php echo $row['ID'] ?>,this)" class="onoffswitch-checkbox" id="myonoffswitch<?php echo  $row["ID"]?>" tabindex="0" checked>
                                                    <label class="onoffswitch-label" for="myonoffswitch<?php echo  $row["ID"]?>">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                    </label>
                                                    </div>
                                                    </td>

                                                   <?php 
                                               } 
                                               ?>
                                                








                                                </td>

                                                <td>
                                                <?php if($row['type'] == 'offer'){ ?>
                                                <form  action="EditBanner.php" style="display: inline-block !important;">


                                                       <input type="hidden" name="banner" value="<?php echo $row["ID"] ?>">
                                                       <button class="btn btn-primary" id="updateCat"  ><i class="fas fa-pencil-alt"></i></button>

                                                       
                                                </form>
                                                <?php }?>
                                    

                                                <form onsubmit="return false" style="    display: inline-block !important;">
                                                     <button class="btn btn-danger" id="DeleteCat" onsubmit="return false"  onclick="Delete(<?php echo $row['ID'] ?>)"><i class="fas fa-trash-alt"></i></button>
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


</script>

