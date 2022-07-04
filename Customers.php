<?php 
ob_start();
include('include/header.php') ?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">Customers table</h4>
                        
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
                        </ul>
                        
			
					</div><br><br>                    
                       
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title">Customers table</h4>
                                          <form  action="downloadCustomer.php">
                        
                            <input type="hidden" value="basic" name="type">
                           <button type="submit"  class="btn mb-4 pull-right" style="color: #282a3c;margin-right: 10px;border:none;background-color:#fff" ><i class="fas fa-file-download fa-3x "></i></button>
                         </form>
                                    <br>


                   

                                    <input class="form-control" id="myInput" type="text" placeholder="Search..">
                                    
                <br>
                                    </div>
                                    <div class="card-body">
              <div id="typography">
                <div class="card-title">
              
           
                </div>
               
                
                  <table class="table">
                      <thead class=" text-secondary">
                        
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Action</th>
                      </thead>
                      <tbody id="myTable">
                          
                            
                      <?php


                          $json = file_get_contents('http://node.bluefig.digisolapps.com:8025/getUsers');
                          $obj = json_decode($json);

               
                         
                        
                          
                          


                           
                                  $count=1;
                                  foreach($obj as $data){
                                    ?>

                                    <tr class="D<?php echo $data->uid ?>">
                                    <?php
                                    if( $data->token != null){
                                      echo "<td>".$count++."</td><td>"?>
                                      
                                      <?php if(isset($data->name)){
                                        echo $data->name;
                                      }else{
                                        echo "-";
                                      } 
                                      
                                      ?>
                                      
                                      <?php echo "</td><td>"?>
                                      
                                      <?php if(isset($data->mobile)){
                                        echo $data->mobile;
                                      }else{
                                        echo "-";
                                      }  ?>
                                      
                                      <?php echo"</td><td>"?><?php if(!isset($data->email)){echo "-";}else{echo $data->email;}?></td>
                                      
                                      <td>
                                      
                                      <form method="post">
                                      <input type="hidden" value="<?php echo$data->uid  ?>" name="userID"?>
                                      <select class="form-group" name="chType" onchange='this.form.submit()'>
                                      <?php 
                                      if(isset($data->type) && $data->type == "user"){
                                        echo "<option>$data->type</option>";
                                        echo "<option value='vendor'>Vendor</option>";

                                      }else{
                                        echo "<option>$data->type</option>";
                                        echo "<option value='user'>User</option>";
                                      }

                                      ?>
                                      </select>
                                      <form>
                                      </td>
                                      
                                      
                                      
                                      <td>
                                      <form  onsubmit="return false" style="    display: inline-block !important;">
                                      <button  style='background-color:white;color:#FFA500' class="btn btn-default"  onclick="dodo('<?php echo $data->uid ?>')" ><i class="fas fa-paper-plane"></i></button>
                                      </form>
                                    <form onsubmit="return false" style="    display: inline-block !important;">
                                    <button class="btn btn-danger" id="DeleteUser" onclick="funn('<?php  echo $data->uid  ?>')"><i class="fas fa-trash-alt fa-lg"></i></button>
                                    </form>
                                      </td>
                                      <?php 
                                    }?>                                                    
                          
                                        
                                      
                                    <?php
                                    echo "</tr>";
                                    
                                  }?>
                                        
                               
                                        
                                        </tr>

                                                
                                        <?php       
                                        
                            
                      ?>
             

                      </tbody>
                    </table>
                    <?php 
                    // if(isset($_POST['submitFormMan'])){
                    //   include_once  __DIR__ . '/connectionDb.php';
                    //   $database = new connectionDb();
                    //   $db = $database->getConnection();

                    //   $value=$_POST['active'];
                    //    $userID=$_POST['userID'];           

                    //   $sql7 = "UPDATE user SET `status` =$value where user_id = '$userID' ";
                    //   $stmt7 = $db->prepare($sql7);
                    //   $stmt7->execute();
                    //   header("Refresh:0");
                    // }
                    
                    // ?>
                 
              </div>
            </div>
                                    

                    </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>


    <?php 
    
    if(isset($_POST['chType'])&&isset($_POST['userID'])){

       $userID=$_POST['userID'];
       $newtype=$_POST['chType'];

        //API Url
        $url = 'http://node.bluefig.digisolapps.com:8025/changeUserType';


        //The JSON data.
        $jsonData = array(
            'userID' =>  $userID,
            'newtype'=> $newtype,
        );

 


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


    header("Location:Customers.php");
    unset($_POST['userID']);
    unset($_POST['chType']);


    }
    
    ?>

    
    <script>
            function getIDAddress(AddressID){
                
                document.cookie = 'addressID' + '=' +escape( AddressID ) + '; expires=Fri, 27 Jul 2021 02:47:11 UTC; path=/';
                
                //alert('hello cookie');
            }
            
      </script>
            




 
       
<script src="https://www.gstatic.com/firebasejs/6.2.4/firebase-app.js"></script>

<!-- include only the Firebase features as you need -->
<script defer src="https://www.gstatic.com/firebasejs/6.2.4/firebase-auth.js"></script>
<script defer src="https://www.gstatic.com/firebasejs/6.2.4/firebase-firestore.js"></script>
<script defer src="https://www.gstatic.com/firebasejs/6.2.4/firebase-messaging.js"></script>


   

  <script>
   function dodo(id){

    var userID=id;


    var firebaseConfig = {
    apiKey: "AIzaSyAaUiaqlHOsgGrwLEk9klXJJW3YVCVQTNY",
    authDomain: "bluefigrest.firebaseapp.com",
    databaseURL: "https://bluefigrest.firebaseio.com",
    projectId: "bluefigrest",
    storageBucket: "bluefigrest.appspot.com",
    messagingSenderId: "129819136267",
    appId: "1:129819136267:web:c8fc01d0c5c2329cb1920e",
    measurementId: "G-TEGY3MTDLQ"
  };
   
   
    //    // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        var database=firebase.firestore();
   
         database.collection("users").get().then(snapshot => {
          snapshot.docs.forEach(decum => {
          
          if(decum.data()['token']  !== undefined && userID === decum.data()['uid']){

         
            window.location = 'sendNote.php?user='+decum.data()['token'];
           
      
          }
          });
          
          });

   }
   </script>



   <?php include('include/footer.php') ?>


   <script>
   
   function  funn(userid){


 
      

      
      


      
      swal({
  title: "Are you sure?",
  text: "It will permanently deleted!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
   



    var Userid=userid;

 
$.ajax({
type: "POST",
url:"DeleteUser.php",
data:{Delete:Userid}, // serializes the form's elements.
success: function(data)
{


  $(".D"+Userid).fadeOut("slow"); // show response from the php script.
}}).then(function(){
 

              swal("This record has been deleted.!", {
              icon: "success",
              });
              

        });




  } 
});


      
      }

   </script>
   
   <script>
 
        
 $("#myInput").on("keyup", function() {
 var value = $(this).val().toLowerCase();
 $("#myTable tr").filter(function() {
 $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
 });
 });


 </script>