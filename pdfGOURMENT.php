<?php include('include/header.php') ?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">PDF</h4>
                        
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
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ADD PDF FILE +</button>&nbsp&nbsp
                            </li>
                        </ul>
                        
			
					</div>                   
                       
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add  PDF  File</h5>
        <form method="post"  enctype="multipart/form-data">
        
        
        

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="col-sm-12 col-md-6">
                          <div class="form-group">

                          <?php
                        
                        include_once  __DIR__ . '/connectionDb.php';
                            $database = new connectionDb();
                            $db = $database->getConnection();
                          ?>
                       
                        
                        
                            </div>
                            
                        </div>

                        <div class="col-sm-12 col-md-6">

                        <div class="form-group">
                        <input type="file"  class="form-group"  accept="application/pdf" name='file' required id="myInput">

                        </div>
                        </div>


   

  

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="addPDF" class="btn btn-primary">Submit</button>
        
      </div>
      </form>
    </div>
  </div>
</div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title"></h4><br>
                                    <input class="form-control mb-3" id="myInput1" type="text" placeholder="Search.."><br>

                                    </div>
                                    

       
            
                  </div>

                                    <div class="card-body">
                    <div class="table-responsive" id="order_table">
                        <table class="table" id="result2">
                      <thead class=" text-secondary">
                     
                        <th>#</th>
                        <th>Type</th>
                        <th>File</th>
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
                               


                                      
                        
                                            $sql = "SELECT * FROM `PDF` where type='GOURMENT' ";
                                            $stmt = $db->prepare($sql);
                                            $stmt->execute();
                                            $itemCount = $stmt->rowCount();

                                            if ($itemCount > 0) {

                                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <tr id="D<?php echo $row['id'] ?>">
                                                <td><?php echo $row['id']?></td>
                                                <td>
                                                <?php echo $row['type']?>
                                          
                                                </td>
                                           
                                                <td>
                                                  <object data="<?php echo $row['file']?>" type="application/pdf">
                                                  <embed src="<?php echo $row['file']?>" type="application/pdf" />
                                                  </object>
                                                </td>
                                                <td>
                                                              <?php 
                                               if($row['status'] == 0){
                                                   ?>
                                                    <div class="onoffswitch">
                                                    <input type="checkbox" name="onoffswitch" onclick="Switch(<?php echo $row['id'] ?>,this)" class="onoffswitch-checkbox" id="myonoffswitch<?php echo  $row["id"]?>" tabindex="0" >
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
                                                    <input type="checkbox" name="onoffswitch" onclick="Switch(<?php echo $row['id'] ?>,this)" class="onoffswitch-checkbox" id="myonoffswitch<?php echo  $row["id"]?>" tabindex="0" checked>
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
    require 'aws/aws-autoloader.php';   

    if(isset($_POST['addPDF'])&&isset($_GET['Branchid'])&&isset($_FILES['file'])){


        $Branchid=$_GET['Branchid'];



        $name= 'file';
        $path ="uploads/pdf/";
        $Imagelink = new addImage($name,$path);




    
        $sql2="INSERT INTO `PDF`( `type`, `file`, `status`, `BranchesID`) VALUES ('GOURMENT','".$Imagelink->getImageFullName()."',0,$Branchid)";
        $stm2=$db->prepare($sql2);
        if($stm2->execute()){

            $Imagelink->moveImage();

          ?>
          <script>location.replace("pdfGOURMENT.php?Branchid=<?php echo $Branchid ?>");</script>
          <?php
        }
    }

    
    
    ?>




<?php include('include/footer.php') ?>
<script>


  function  Delete(name){
 

          swal({
  title: "Are you sure?",
  text: "It will permanently be deleted with All related Data!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
   
    iDVOR=name;
 
$.ajax({
            type: "POST",
            url:"deletePDF.php",
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



  function Switch(pdfID,checkbox)
{


     var G="GOURMENT";
    if (checkbox.checked)
    {

  

      $.ajax({
            type: "POST",
            url:"SwitchPDF.php",
            data:{pdfID:pdfID,status:1,type:G}, // serializes the form's elements.
            success: function(data)
            {
                window.location.replace('pdfGOURMENT.php');
            }
          });
    }else{
      



      $.ajax({
            type: "POST",
            url:"SwitchPDF.php",
            data:{pdfID:pdfID,status:0,type:G}, // serializes the form's elements.
            success: function(data)
            {
                window.location.replace('pdfGOURMENT.php');
            }
          });
    }
}



</script>
