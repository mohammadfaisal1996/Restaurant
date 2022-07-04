<?php include('include/header.php') ?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">Branches</h4>
                        
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


					
							<li class="nav-item" style="font-weight: bold;" >
								<a href="AddBranches.php" class="btn " style="background-color:#282a3c;color:white">Add Branch +</a>
							</li>
                        </ul>
                        
			
					</div>                   
                       
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title">Branches table</h4><br>
                                    <input class="form-control mb-3" id="myInput1" type="text" placeholder="Search.."><br>

                                    </div>
                                    

       
            
                  </div>

                                    <div class="card-body">
                    <div class="table-responsive" id="order_table">
                        <table class="table" id="result2">
                      <thead class=" text-secondary">
                     
                        <th>Branch Number</th>
                        <th>Branch image</th>
                        <th>Branch Name</th>
                        <th>Area Name</th>
                        <th>Street Name</th>
                       

                        <th>status</th>
                        <th>Tax</th>
                         <th>mobile_number</th>
                        <th>action</th>

                        
                        
                      </thead>
                      <tbody  id="myTable1">
                      <?php


                                            $s = "";
                                            $t = "";
                                            include_once  __DIR__ . '/connectionDb.php';
                                            $database = new connectionDb();
                                            $db = $database->getConnection();






                                            $sql = "SELECT DISTINCT branches_store.Status,branches_store.tax,branches_store.serial_no as  ID,  branch_store_lang.branch_name as name,branch_store_lang.area_name,branches_store.store_Image,branches_store.phoneno,branch_store_lang.street_name FROM `branches_store` LEFT JOIN branch_store_lang on branch_store_lang.branch_code=branches_store.serial_no";
                                            $stmt = $db->prepare($sql);
                                            $stmt->execute();
                                            $itemCount = $stmt->rowCount();


                                            if ($itemCount > 0) {


                                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                              ?>
                                              <tr id="D<?php echo $row['ID'] ?>"><td><?php echo $row['ID']?></td>
                                              <td><img src="<?php echo $row['store_Image']?>"  width="200"> </td>
                                              <td><?php echo $row['name'] ?></td>
                                              <td><?php echo $row['area_name'] ?></td>
                                            <td><?php echo $row['street_name'] ?></td>



                                               <td>

                                               <?php
                                               if($row['Status'] == 0){
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


                                              <td><?php echo $row['tax']?></td>
                                              <td><?php echo $row['phoneno']?></td>

                                              <td>
                                    <form  action="UpdateBranch.php" style="display: inline-block !important;">


                                    <input type="hidden" name="BranchID" value="<?php echo $row["ID"] ?>">


                                    <button class="btn btn-primary" id="updateCat"  ><i class="fas fa-pencil-alt"></i></button>
                                    </form>

                                    <form onsubmit="return false" style="    display: inline-block !important;">
                                    <button class="btn btn-danger" id="DeleteCat" onsubmit="return false"  onclick="funn(<?php echo $row['ID'] ?>)"><i class="fas fa-trash-alt"></i></button>
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
if(isset($_POST['orderstat'])){

   $orderstatus=$_POST['orderstat'];
   $orderid=$_POST['orderid'];

   $oStatus="Pending";
   $orderNumber=$_POST['orderNumber'];

   $token=$_POST['token'];



    $sql = "UPDATE `ordersMaster` set order_status=$orderstatus where order_id=$orderid ";

    $stmt = $db->prepare($sql);
     if($stmt->execute()){


        switch($orderstatus){
            case 1: $oStatus="Pending";
            break;
            case 2: $oStatus="Accepted";
            break;
            case 3: $oStatus="Prepared";
            break;
            case 4: $oStatus="On the way";
            break;
            case 5: $oStatus="Delivered";
            break;
            case 6: $oStatus="Rejected";
            break;
            case 7: $oStatus="ready";
            break;

        }



        //API Url
            $url = 'http://node.bluefig.digisolapps.com:8025/orderStatus';

            // //Initiate cURL.
            // $ch = curl_init($url);

            //The JSON data.
            $jsonData = array(
                'orderst' =>  $oStatus,
                'token' =>$token,
                "ordernumber"=> $orderNumber,
                'order_id' => $orderid
            );

            // //Encode the array into JSON.
            // $jsonDataEncoded = json_encode($jsonData);

            // //Tell cURL that we want to send a POST request.
            // curl_setopt($ch, CURLOPT_POST, 1);

            // //Attach our encoded JSON string to the POST fields.
            // curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

            // //Set the content type to application/json
            // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

            // //Execute the request
            // $result = curl_exec($ch);


            $options = array(
                'http' => array(
                  'method'  => 'POST',
                  'content' => json_encode( $jsonData ),
                  'header'=>  "Content-Type: application/json\r\n" .
                              "Accept: application/json\r\n"
                  )
              );

              $context  = stream_context_create( $options );
              $result = file_get_contents( $url, false, $context );
              $response = json_decode( $result );


        header("Location:Orders.php");
        unset($_POST['orderstat']);
        unset($_POST['orderid']);


     }


}




?>


<?php include('include/footer.php') ?>
<!-- <script>
$("#orderStatus").on("change",function(){


});




</script> -->


<script>


function  funn(Branchid){




swal({
  title: "Are you sure?",
  text: "It will permanently be deleted with All related Data!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
   

    var BranchsID=Branchid;



$.ajax({
type: "POST",
url:"DeleteBranch.php",
data:{Delete:BranchsID}, // serializes the form's elements.
success: function(data)
{

    $("#D"+BranchsID).fadeOut("slow"); // show response from the php script.
}
}).then(function(){

              swal("This record has been deleted.!", {
              icon: "success",
              });
        });




  } 
});




}

 
 $("#myInput1").on("keyup", function() {      
 var value = $(this).val().toLowerCase();
 $("#myTable1 tr").filter(function() {
 $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
 });

 });


</script>
 <script>


 
  function Switch(BranchID,checkbox)
{


    if (checkbox.checked)
    {

  

      $.ajax({
            type: "POST",
            url:"updateBranchSwitch.php",
            data:{BranchID:BranchID,status:1}, // serializes the form's elements.
            success: function(data)
            {
             
                // $("#D"+iDCat).fadeOut("slow"); // show response from the php script.
            }
          });
    }else{
      



      $.ajax({
            type: "POST",
            url:"updateBranchSwitch.php",
            data:{BranchID:BranchID,status:0}, // serializes the form's elements.
            success: function(data)
            {
          

                // $("#D"+iDCat).fadeOut("slow"); // show response from the php script.
            }
          });
    }
}
   </script>       
