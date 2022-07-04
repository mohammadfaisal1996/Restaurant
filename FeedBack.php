<?php include('include/header.php') ?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">Feedback</h4>
                        
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
								<i class=""></i>
                            </li>
              <li class="nav-item" >
              <!-- <a class="navbar-brand" href="comments.php " style="font-weight:bold;font-size:15px">comments</a> -->
							</li>
              <li class="separator">
								<i class=""></i>
                            </li>
              <li class="nav-item" >
              <a class="navbar-brand" href="Like.php" style="font-weight:bold;font-size:15px">Likes</a>
							</li>

        
 
          </div>
                        </ul>
                        
			
					</div><br><br>                    
                       
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title">Feedback table</h4>

                                        <form  action="downloadFeedback.php">
                                        <input type="hidden" value="basic" name="type">
                                        <button type="submit"  class="btn mb-4 pull-right" style="color: #282a3c;margin-right: 10px;border:none;background-color:#fff" ><i class="fas fa-file-download fa-3x "></i></button>
                                        </form>
                                    <br>
                                    <input class="form-control" id="myInput6" type="text" placeholder="Search..">
                <br>  
                                    </div>


                                    <div class="card-body"  style="height:500px;background-color:white;max-height: 500px;overflow-y:auto">
                  <div class="table-responsive">
                      <table class="table">
                      <thead class=" text-secondary">





                        <th>UserName</th>
       
                        <th>Email </th>
                        
                        <th>comment</th>
                        <th>mobileNumber</th>
                        <th>Action</th>


                      </thead>
                      <tbody id="myTable6">
                      <?php
                           
                            
                           include_once  __DIR__ . '/connectionDb.php';
                           $database = new connectionDb();
                           $db = $database->getConnection();
                            
                           //get , , comments,   from order 


                           $sql1 = "SELECT * FROM Feedback";
                           $stmt = $db->prepare($sql1);
                           $stmt->execute();
                           $itemCount = $stmt->rowCount(); 

                           


                          

                           if ($itemCount > 0) {

                               while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                
                               
                                 ?>
                                 <tr id="D<?php echo $row['serial_no'] ?>">
                                    
                                 <td> <?php echo $row['UserName']?> </td>  
                                 <td><?php echo $row['Email']?></td>
                                 
                                 <td><?php echo $row['comment']?></td>
                                 <td><?php echo $row['mobileNumber']?></td>


                                <td>
                                <form onsubmit="return false" style="    display: inline-block !important;">
                                <button class="btn btn-danger" id="DeleteCat" onsubmit="return false"  onclick="funn(<?php echo $row['serial_no'] ?>)"><i class="fas fa-trash-alt"></i></button>
                                </form>
                                </td>

                   
                                 

                          
                    
                                 <tr>


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
       
<script>

     
$("#myInput6").on("keyup", function() {
var value = $(this).val().toLowerCase();
$("#myTable6 tr").filter(function() {
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
        url:"DeleteFEED.php",
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
</script>

