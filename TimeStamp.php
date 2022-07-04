<?php include('include/header.php') ?>



<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">Time stamp Setting</h4>
                        <ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
								</a>
                            </li>
                            <li class="nav-item">
								<a href="Setting.php">Setting</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="">Time stamp Setting</a>
							</li>
						</ul>

                        
			
					</div><br><br>                    
                       
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title">Time stamp Table </h4><br>

                                    
                                    <ul class="navbar-nav">
                  <!-- echo "<button onclick=\"getBranchesID(".$row["ID"].")\" class = 'dropdown-item btn ' style='color:#FFA500;background-color:white' href='' >".$row["ID"]." - ".$row["name"]."</button>"; -->

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
                                        ?>
                                        <form method="post">
                                        <input type="hidden" name="branchID" value="<?php echo $row["ID"]?>">
                                       <button type="submit" style='color:#black;background-color:white' name="getData"  class="btn btn-secondary "  style="color:#FFA500;background-color:white"><?php echo $row["name"]?></button>
                                       </form>
                                         <?php
                                          }

                                      }
                                ?>
                        
                              </div>
                              
                            </li>
                                                                </ul>
                       
                                    <br>

                                    <br>
                                    </div>

                                 
                                   <table class="table table-hover">
                                                        <thead>
                                                        <?php
                          
                            
                          
               
                        
                          include_once  __DIR__ . '/connectionDb.php';
               $database = new connectionDb();
                           $db = $database->getConnection();
 
                           if(isset($_POST["branchID"]) &&  !empty($_POST["branchID"]) ){
                           
                             $branchID=$_POST["branchID"]; 
                             $sql = "select * from branches_store where serial_no= $branchID";
                             $stmt = $db->prepare($sql);
                             $stmt->execute();
                             $itemCount = $stmt->rowCount();
                             $tmp = array();
                             
                             if ($itemCount > 0) {
                                 echo "<tr>";
                                 while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                                 <td><?php 
                                    $from=$row['timefrom'];
                                    $to=$row['timeto'];
                                    $Data=substr($from,0,2);
                                    $Data2=substr($row['timefrom'],2);
                                      
                                    $Data3=substr($to,0,2);
                                    $Data4=substr($to,2);
                                      
                                     
                                     if($Data == "00"){
                                       echo "12".$Data2."AM"; 
                                     }elseif($Data == "12"){
                                       echo "12".$Data2."PM";
                                     }
                                     else{
                                       echo $from;
                                     }
                                     ?></td>
 
                                   <td><?php 
                                   if($Data3 == "00"){
                                   echo "12".$Data4."AM";
                                   }
                                   elseif($Data3 == "12"){
                                   echo "12".$Data4."PM";
                                   }
                                   else{
                                   echo $to;
                                   }
                                   ?></td>
                                    <td>
                                        <form method="GET" action="EditeTimeStame.php">
                                      
                                     <input type="hidden" value="<?php echo $row['serial_no']?>" name="branchid">
                             
 
 
                                        <button type="submit"  class="btn btn-secondary ">update</button>
                                        </form>
                                 
                                     </td>
                                 </tr>
                                    <?php
                                     
                                 }
                             
                             }else{
                                 echo "<tr><td>Empty table  plase select branch</td></tr>";
                             }
                           }else{
                             echo "<tr><td>Empty table  plase select branch</td></tr>";
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




<?php include('include/footer.php') ?>
       
        