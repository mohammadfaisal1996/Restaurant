<?php include('include/header.php') ?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">Delivery Boy</h4>
                        
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
                                    <br><h4 class="card-title">Delivery Boy table</h4><br>
                                    </div>



                                    <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-secondary">
                        <th>CarModel</th>
                        <th>CarType</th>
                        <th>CityName</th>
                        <th>gendor</th>
                        <th>image</th>
                        <th>nickName</th>
                        <th>PhoneNumber</th>
                        <th>UserName</th>
                        <th>-</th>

                      </thead>
                      <tbody id="Tablebody">
                      <?php 
                      if(isset($_POST['active'])){
                      ?>
                      <span id="activeSpan" rel="<?php echo $_POST['active']; ?>"></span>
                      
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
       
        <!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/6.2.4/firebase-app.js"></script>

<!-- include only the Firebase features as you need -->
<script defer src="https://www.gstatic.com/firebasejs/6.2.4/firebase-auth.js"></script>
<script defer src="https://www.gstatic.com/firebasejs/6.2.4/firebase-firestore.js"></script>
<script defer src="https://www.gstatic.com/firebasejs/6.2.4/firebase-messaging.js"></script>


  <script>

    $(document).ready(function() {


      $().ready(function() {

          const firebaseConfig = {
          apiKey: "AIzaSyAaUiaqlHOsgGrwLEk9klXJJW3YVCVQTNY",
          authDomain: "bluefigrest.firebaseapp.com",
          databaseURL: "https://bluefigrest.firebaseio.com",
          projectId: "bluefigrest",
          storageBucket: "bluefigrest.appspot.com",
          messagingSenderId: "129819136267",
          appId: "1:129819136267:web:c8fc01d0c5c2329cb1920e",
          measurementId: "G-TEGY3MTDLQ"
          };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);

        const database=firebase.firestore();

       
   database.collection("users").get().then(snapshot => {
                snapshot.docs.forEach(decum => {
                if(decum.data().type == "delivery"){
                  var active="";
                  var caremodel=decum.data().carmodel
                      ,cartype=decum.data().cartype
                      ,cityName=decum.data().cityName
                      ,gendor=decum.data().gendor
                      ,image=decum.data().image
                      ,nickName=decum.data().nickName
                      ,phonenumber=decum.data().phonenumber
                      ,username=decum.data().username
                      ,status=decum.data().status
                      ,decID=decum.id;
                       
                     if(status == 'true'){
                       active="Active";
                     }else
                     {
                      active='UNActive';
                     }

                      // <ul class='dropdown-menu scrollable-menu' role='menu'><li><button  style='background-color:white;color:#FFA500' type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'><span class='caret'>unactive</span></button><form method='post' ><input type='hidden' value="+decum.id+"><button style='submit' name='submitFormMan' class ='dropdown-item' href='#' >active</button></form></li></ul>
               
                  $("#Tablebody").append('<tr><td>'+caremodel+'</td><td>'+cartype+'</td><td>'+cityName+'</td><td>'+gendor+'</td><td><img src='+image+' width="150"></td><td>'+nickName+'</td><td>'+phonenumber+'</td><td>'+username+'</td><td><form method="post" action="updateDriver.php"><input type="hidden" id="avtiveHID" value='+status+' name="STATE"><input type="hidden" id="DECU" value='+decID+' name="DECID"><button style="background-color:white;color:#FFA500" id="active" type="submit" class ="btn" id="kill" onclick=ff("'+decID+'") >'+active+'</button></form></td></tr>');
                
                
                                     

                                  
                 }
                });
});


         
        });
    });