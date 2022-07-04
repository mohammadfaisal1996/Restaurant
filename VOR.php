<?php include('include/header.php') ?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">VOR</h4>
                        
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
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Allow Register +</button>&nbsp&nbsp
                            </li>
                        </ul>
                        
			
					</div>                   
                       
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add  verification password</h5>
        <form method="post">
        
        

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="col-sm-12 col-md-6">
                          <div class="form-group">
                          <label style="padding-top: 5px;" class="bmd-label-floating">Select branche </label>
                          <?php
                        
                        include_once  __DIR__ . '/connectionDb.php';
                            $database = new connectionDb();
                            $db = $database->getConnection();
                            $sqlQ = "SELECT DISTINCT branches_store.serial_no as  ID,  branch_store_lang.branch_name as name FROM `branches_store` LEFT JOIN branch_store_lang on branch_store_lang.branch_code=branches_store.serial_no";
   
                            // $sqlQ = "SELECT serial_no ,`name` FROM `branches_store` ";
                            $stmt = $db->prepare($sqlQ);
                            echo "<select class='form-control' required name='Branches_ID'>";
                           if( $stmt->execute()){
                      
                              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                               ?>
                               <option value="<?php echo $row['ID'] ?>"><?php echo $row['name']?></option>
                               <?php
                            }
                          
                          }
                         ?>
                              </select>
                          
                       
                        
                        
                            </div>
                            
                        </div>

                        <div class="col-sm-12 col-md-6">

                        <div class="form-group">
                        <label style="padding-top: 5px;" class="bmd-label-floating">Add  Password </label>
                          <a  style="cursor: pointer;"onclick="myFunction()"><i class="fas fa-eye"></i></a>

                        <input type="password" minlength="8" class="form-group"  name="passwordVOR" required id="myInput">

                        </div>
                        </div>


   

  

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="addPassword" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 " >   
                                    <br><h4 class="card-title"></h4><br>
                                    <input class="form-control mb-3" id="myInput1" type="text" placeholder="Search.."><br>

                                    </div>
                                    

       
            
                  </div>

                                    <div class="card-body">
                    <div class="table-responsive" id="order_table">
                        <table class="table" id="result2">
                      <thead class=" text-secondary">
                     
                        <th>#</th>
                        <th>password</th>
                        <th>branch Name</th>
                        <th>ِAction</th>

                        

                        
                        
                      </thead>
                      <tbody  id="myTable1">
                      <?php
                          
                            
                      

             
                    
                    
                    
                    
                    
                        
                                            $s = "";
                                            $t = "";
                                            include_once  __DIR__ . '/connectionDb.php';
                                            $database = new connectionDb();
                                            $db = $database->getConnection();
                               


                                      
                        
                                            $sql = "SELECT * FROM `VOR` JOIN branch_store_lang on branch_store_lang.branch_code=VOR.branchID ";
                                            $stmt = $db->prepare($sql);
                                            $stmt->execute();
                                            $itemCount = $stmt->rowCount();

                                            if ($itemCount > 0) {

                                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <tr id="D<?php echo $row['id'] ?>">
                                                <td><?php echo $row['id']?></td>
                                                <td>
                                            
                                          <form  onSubmit="update(<?php echo $row['id'] ?>)" style="display: inline-block !important;">
                                          <input type="password" class="form-group"  minlength="8" id="<?php echo $row['id']?>password" value="<?php echo $row['password']?>" required >
                                          <button class="btn btn-primary" id="updateCat"  ><i class="fas fa-pencil-alt"></i></button>
                                          </form>


                                                </td>
                                           
                                                <td><?php echo $row['branch_name']?></td>
                                                <td>

                                                <button type="button" class="btn btn-primary" data-toggle="modal" onclick="show(<?php echo $row['id'] ?>)">
                                          <i class="fas fa-eye fa-lg"></i>
                                          </button>


                                          
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
    <?php 

    if(isset($_POST['addPassword'])&&isset($_POST['Branches_ID'])){
      

   
    
    if(  isset($_POST['passwordVOR']) and isset($_POST['Branches_ID']) ){
        $BranchID=$_POST['Branches_ID'];
        $password=$_POST['passwordVOR'];

      

        
    
        $sql2="INSERT INTO `VOR`(`password`, `branchID`) VALUES ('$password',$BranchID)";
        $stm2=$db->prepare($sql2);
        if($stm2->execute()){
         header("location:VOR.php");
        }
    }
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
   
    
 var iDVOR=id;

$.ajax({
            type: "POST",
            url:"DeleteVor.php",
            data:{Delete:iDVOR}, // serializes the form's elements.
            success: function(data)
            {
 
                $("#D"+iDVOR).fadeOut("slow"); // show response from the php script.
            }
            
            }).then(function(){

              swal("This record has been deleted.!", {
              icon: "success",
              });
        });




  } 
});





}

function update(id){
  var x = document.getElementById(id+"password");

  var value =x.value;
  
  

  $.ajax({
            type: "POST",
            url:"updateVor.php",
            data:{id:id,value:value}, // serializes the form's elements.
            success: function(data)
            {
     
            
            }
          });

}
</script>
