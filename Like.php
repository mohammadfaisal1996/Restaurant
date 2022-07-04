<?php include('include/header.php') ?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">like page</h4>
                        
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
								<a href="FeedBack.php" >FeedBack</a>
							</li>
              <li class="separator">
								<i class=""></i>
                            </li>


        
 
          </div>
                        </ul>
                        
			
					</div><br><br>                    
                       
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title">likes table</h4>
                                          <form  action="downloadLike.php">
                                        <input type="hidden" value="basic" name="type">
                                        <button type="submit"  class="btn mb-4 pull-right" style="color: #282a3c;margin-right: 10px;border:none;background-color:#fff" ><i class="fas fa-file-download fa-3x "></i></button>
                                        </form>
                                    <br>
                                    <input class="form-control" id="myInput5" type="text" placeholder="Search..">
                <br>
                                    </div>


                                    <div class="card-body" style="height:500px;background-color:white;max-height: 500px;overflow-y:auto">
                  <div class="table-responsive">
                      <table class="table">
                      <thead class=" text-secondary">
                        
                
                        <th>Item name</th>
                        <th> Nubmer of like</th>
                  
              
                       
                      </thead>
                      <tbody id="myTable5">
                      <?php
                           
                            
                           include_once  __DIR__ . '/connectionDb.php';
                           $database = new connectionDb();
                           $db = $database->getConnection();
                            
                          $sql2 = "SELECT    count(`item_fav_users`.item_no) as total ,`category_lang`.category_title as Itemname from item_fav_users JOIN category_lang on `category_lang`.category_id = `item_fav_users`.item_no  group by Itemname ";
                        //          

                          $stmt2 = $db->prepare($sql2);
                          $stmt2->execute();
                          $itemCount1 = $stmt2->rowCount();



                          while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                          ?>
                          <tr>
                          
                          <td><?php  echo $row2['Itemname']?></td>

                          <td><?php  echo $row2['total']?></td>
                          </tr>

                          <?php
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
</script>



<?php include('include/footer.php') ?>
<script>

     
$("#myInput5").on("keyup", function() {
var value = $(this).val().toLowerCase();
$("#myTable5 tr").filter(function() {
$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
});
});


</script>