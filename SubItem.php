<?php include('include/header.php') ?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">SubItem</h4>
                        
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
								<a href="index.php" >Dashboard</a>&nbsp&nbsp
    
							</li>
              <li class="separator">
								<i class=""></i>
                            </li>


				
                        </ul>
                        
			
					</div><br><br>                    
                       
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title">SubItem table</h4><br>
             
                                    <br><br>
                                    </div>

                                    <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>Item ID</th>
                        <th>Item Name</th>
                        <th>Item Price</th>
                   


                      
                       
                      </thead>
                      <tbody>
                          <?php
                            $num2 = $_COOKIE["item2"];
                            
                            include_once  __DIR__ . '/connectionDb.php';
                            $database = new connectionDb();
                            $db = $database->getConnection();
                            
                            $sql = "SELECT * FROM `category_items_list`  JOIN category_lang on category_lang.category_id = category_items_list.category_id and category_items_list.related_item = $num2";
                            $stmt = $db->prepare($sql);
                            $stmt->execute();
                            $itemCount = $stmt->rowCount();
                            
                            if ($itemCount > 0) {

                                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                     echo "<tr><th> " . $row["category_id"]. "</th><th>" .$row["category_subtitle"]. "</th><th>"
                                . $row["item_price"]. "</th></tr>";
                                
                                }
                            
                            }
                          
                          ?>
                      </tbody>
                    </table>
  
      
      
      <script>
            function getID(sub_item_id){
                
                
                document.cookie = 'sub_item_id' + '=' +escape( sub_item_id ) + '; expires=Fri, 27 Jul 2021 02:47:11 UTC; path=/';
                
                
            }
            
      </script>
            
  