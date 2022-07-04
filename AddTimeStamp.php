<?php
ob_start();
include('include/header.php') ?>


<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">AddTimeStamp</h4>
            

                  
                        
			
					</div><br><br>                    
                       
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title">AddTime</h4><br>
                                   
                                    <ul class="navbar-nav">
                                                <li class="nav-item dropdown">
                                                <a style="color: white" class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-list-ul" style="color:white;font-weight: 600;">&nbsp;</i>

                                                Choose an Branches
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownMenuLink">
                                                <?php
                                                include_once  __DIR__ . '/connectionDb.php';
                                                $database = new connectionDb();
                                                $db = $database->getConnection();

                                                $sql = "SELECT DISTINCT branches_store.serial_no as  ID,  branch_store_lang.branch_name as name FROM `branches_store` LEFT JOIN branch_store_lang on branch_store_lang.branch_code=branches_store.serial_no";
                                                $stmt = $db->prepare($sql);
                                                $stmt->execute();
                                                $itemCount = $stmt->rowCount();

                                                if ($itemCount > 0) {

                                                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                                echo "<button style='background-color:white;color:black' onclick=\"getBranchesID(".$row["ID"].")\" class = 'dropdown-item btn btn-secondary' href='' >".$row["ID"]." - ".$row["name"]."</button>";

                                                }

                                                }
                                                ?>
                                                </div>
                                                </li>
                                                <span id="selectBranch" style="color:red">please select Branches <span>
                                                </ul>

</div>

                <div class="card-body">
                  <form method="post" onsubmit="return isValidForm()" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">

                          
                       
                        <label  > &emsp; &emsp; From Time:  &emsp;</label>
                               <input type="time" id="date-input" name="FromTime" required class="btn btn-primary" /> 
                               <label  >   &emsp; &emsp;  To Time:  &emsp;</label>
                               <input type="time" id="date-input" name="ToTime" required class="btn btn-primary" /> 

                            

                               <div class="form-group">
                    <button disabled id="submitTimeStamp" name ="Stamp_settings" type="submit" class="btn btn-secondary pull-right" value="">Add TimeStamp</button>
                     </div>
                            </div>   

                      </div>
    
                                          
                    <div class="clearfix"></div>
        
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <?php 


           
     
              if(isset($_POST['Stamp_settings'])){
           
                // $branchID
     
            include_once  __DIR__ . '/connectionDb.php';
            $database = new connectionDb();
            $db = $database->getConnection();
                 
                    
                 if(isset($_POST['FromTime'])  && isset($_COOKIE["branchesID"])){
     
                  $FromTime=$_POST['FromTime'];
                  $ToTime=$_POST['ToTime'];
                  $branchID=$_COOKIE["branchesID"];
                  
                
                  $sql = "UPDATE `branches_store` SET timefrom = '$FromTime' , timeto = '$ToTime' WHERE serial_no = $branchID ";
                  $Stmt1 = $db->prepare($sql);
                  if($Stmt1->execute()){
         
                  }
                    
                

                 }
                
       
                    
                }
                
         
                ?>
                
 
            
    
            

    <script>

            function getBranchesID(item_no){
            
                if(item_no != " "){
                  $('#submitTimeStamp').prop('disabled', false);
                  $("#selectBranch").css("display","none");
                  document.cookie = 'branchesID' + '=' +escape( item_no ) + '; expires=Fri, 27 Jul 2021 02:47:11 UTC; path=/';
          
                }
                
                
           
            }
            // function getDay(item_no){
             
             
            //   if(item_no != " "){
            //     pas2=1;
            //   //   $("#selectDay").css("display","none");
            //   //   document.cookie = 'Day' + '=' +escape( item_no ) + '; expires=Fri, 27 Jul 2021 02:47:11 UTC; path=/';
            //   //     $day=document.cookie  .split('; ')
            //   //     .find(row => row.startsWith('Day'))
            //   //     .split('=')[1];
            //   //     $(".Defbut").text($day);

            //   // }else{

            //   // }
              
            //   if($("#selectDay").is(":hidden") && $("#selectBranch").is(":hidden") ){
                

            //     $('#submitTimeStamp').prop('disabled', false);
  
            // }  
       
            // }

   

            
            function isValidForm(){

              //get from cookie 
              $value=document.cookie  .split('; ')
            .find(row => row.startsWith('branchesID'))
            .split('=')[1];
            
            //  $day=document.cookie  .split('; ')
            // .find(row => row.startsWith('Day'))
            // .split('=')[1];

             if (!$value){
                
                alert("select branches plase");
                return false;
             }
            //  if(!$day){
               
            //   alert("select day plase");
            //   return false;
              
            //  } 


            }
  
            
            
      </script>


<?php include('include/footer.php') ?>