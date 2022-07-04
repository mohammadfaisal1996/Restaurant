<?php include('include/header.php') ?>



<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">Tax Setting</h4>
            

                        
			
					</div><br><br>                    
                       
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title">Edit Tax</h4><br>
                                   
                                   
                                   
                                   
                                   
                                                <ul class="navbar-nav">
                                                <li class="nav-item dropdown">
                                                <a style="color: white" class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-list-ul" style="color:white;font-weight: 600;">&nbsp;</i>

                                                Choose a Branch
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
                                                </ul>
                                    <br>

                                    <br>
                                    </div>

                                   <div class="col-lg-6  col-md-8   col-sm-12"> 
                                    <form method="post" enctype="multipart/form-data">
                                       
                                        <div class="form-group form-floating-label mb-4">
                                            <input id="inputFloatingLabel" type="text" name="taxValue" class="form-control input-border-bottom" required="">                                   

                                            <label for="inputFloatingLabel" class="placeholder">Tax Value</label>

                                        </div>
                                                
                                        <button name="update_settings" type="submit" id="update1" class="btn btn-primary  pullRight " disabled>Update Tax</button>
                                        
                                        <a href="Setting.php" class="btn btn-primary pullRight">Cancel</a>
                                        
                                        <br><br><br>
                                        <span id="note2" class="pullRight"><i class="fas fa-exclamation-circle">&nbsp </i>Plase select Branche</span>    
                                    </form> 
                             </div>
                            
                    </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>


<?php include('include/footer.php') ?>
                <?php 



                //  upadte tax 

                if(isset($_POST['update_settings'])){

                // $branchID

                include_once  __DIR__ . '/connectionDb.php';
                $database = new connectionDb();
                $db = $database->getConnection();


                if(isset($_POST['taxValue'])){
                $tax=$_POST['taxValue'];  
                $branchID=$_COOKIE["branchesID"];

                }

                   
                $SQLU = "UPDATE `branches_store` SET `tax` = '$tax' WHERE serial_no = $branchID";
                $Stmt1 = $db->prepare($SQLU);
                $Stmt1->execute();

                $itemCount1 = $Stmt1->rowCount();

                if($itemCount1 > 0){
                    
                    ?>
    
                    <script>
    
                    swal(" Data update!", " Data updated in Success!", "success").then(function(){
                    location.reload();
                    });
    
    
    
    
                    </script>
                <?php
                }
               

                }


                ?>


       
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