
 <?php include('include/header.php') ?>



<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">Send notification</h4>
            

                        
			
					</div><br><br>                    
                       
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title">Send notification</h4><br>
                                   
 
 
 

                </div>

                
                <form method="post" onsubmit="return isValidForm()" enctype="multipart/form-data">


                <div class="row">
                <div class="col-md-5">
                <div class="form-group">

                <label class="bmd-label-floating p-3">send notification for user !</label>

                <!-- <input style=" zoom: 0.9;" type="checkbox"  id="useTax" class="form-control pb-3" > -->

                </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">

                <label class="bmd-label-floating">notification title   </label>
                <input   type="text" name="notificationTitle" required class="form-control" >

                </div>
                <div class="form-group">



                <div class="form-group">

                <label class="bmd-label-floating">notification body </label>


                <textarea class="form-control" name="notificationBody" required  rows="4" cols="50">

                </textarea>
                </div>




                </div>
                <!-- <input type="text" id="userIDToken"> -->

                <div class="clearfix"></div>
                <div class="form-group">
                <button name ="update_settings" id="update1" type="submit"  class="btn btn-secondary pull-right" >send massage</button>
                </div><br>&nbsp;&nbsp;

                </form>



              </div>
            </div>


            <div class="col-md-4">
              <div class="card card-profile">
              


              <?php include('include/footer.php') ?>

                <?php 
              
                // using  Firebase with php 
              
                // require 'vendor/autoload.php';

                //  use Kreait\Firebase\Factory;
                //  use Kreait\Firebase\ServiceAccount;
                 
                //  $fact = (new Factory)
                //          ->withServiceAccount(__DIR__.'/bahaaeldin-aebfa-firebase-adminsdk-tdznx-f7defff9aa.json')
                //          ->withDatabaseUri('https://bahaaeldin-aebfa.firebaseio.com')
                //          ->create();
                
                  

                //         //  $reference = $database->getReference('Services/');
                       
                //         //  $snapshot = $reference->getSnapshot();
                      
                //          $database = $fact->getDatabase();
                //          $refrence=$database->getReference('');

                //          $snapshot = $refrence->getSnapshot();
                         
                //          if ($snapshot->exists()) {
                //              printf('Document data:' . PHP_EOL);
                //              print_r($snapshot->data());
                //          } else {
                //              printf('Document %s does not exist!' . PHP_EOL, $snapshot->id());
                //          }








           
             //  upadte tax 
             
              if(isset($_POST['update_settings'])){
                

                $notificationTitle=$_POST['notificationTitle'];
                $notificationBody=$_POST['notificationBody'];;


                if(isset($_GET['user'])){
                  $to=$_GET['user'];
                }else{
                  $to=null;
                }

         

                $url = 'http://node.bluefig.digisolapps.com:8025/sendForONE';

            // //Initiate cURL.
            // $ch = curl_init($url);

            //The JSON data.
            $jsonData = array(
                'Title' =>  $notificationTitle,
                'Body' =>$notificationBody,
                'token'=>$to
          
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

              if($result){
                ?>

                <script>

                swal("Send Success!", "", "success").then(function(){
               
                });




                </script>


                <?php
              }

              
  
           
            }
                ?>
                
                    
                
                
         
            
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
            function getBranchesID(item_no){
                if(item_no != " "){
                  $("#update1").attr("disabled", false);
              $("#note2").css("display","none");
              document.cookie = 'branchesID' + '=' +escape( item_no ) + '; expires=Fri, 27 Jul 2021 02:47:11 UTC; path=/';
                }
            }

            function isValidForm(){
 
              //get from cookie 
              $value=document.cookie  .split('; ')
            .find(row => row.startsWith('branchesID'))
            .split('=')[1];

            if (!$value){
                
                alert("select branches plase");
                return false;
             
             }
             
             }
            

   
      </script>

