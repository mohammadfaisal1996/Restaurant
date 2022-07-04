
                  <?php include('include/header.php') ?>


<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">ItemDesc</h4>
            

                        
			
					</div><br><br>                    
                       
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title"> description</h4><br>
                                   
                                   

          
                    </div>
                    <form method="post" enctype="multipart/form-dadisabledta">
                        <div class="col-md-3">
                          <div class="form-group">
                              <label style="padding-top: 7px;" class="bmd-label-floating">
                                  <?php
                        
                                    
                                    $num2 = $_COOKIE["item2"];
                                    include_once  __DIR__ . '/connectionDb.php';
                                    $database = new connectionDb();
                                    $db = $database->getConnection();

                                    $sql = "select category_id from category_lang where category_id ='$num2'";
                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();
                                    
                                    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                                        printf ("%s (%s)\n","Item ID -> " ,$row[0]);
                                    }
                                    
                                ?>
                              </label>
                              <input id="app_name" type="text" name="app_name" class="form-control"  disabled>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label style="padding-top: 5px;" class="bmd-label-floating">
                                  <?php
                        
                                    
                                    $num2 = $_COOKIE["item2"];
                                    include_once  __DIR__ . '/connectionDb.php';
                                    $database = new connectionDb();
                                    $db = $database->getConnection();

                                    $sql = "select category_title from category_lang where category_id ='$num2' and language_code='en'";
                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();
                                    
                                    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                                        printf ("%s (%s)\n","Item Name -> " ,$row[0]);
                                    }
                                    
                                ?>
                              </label>
                              <input id="app_name" type="text" name="Item_name" class="form-control" >
                          </div>
                        </div>
                      
                      <div class="col-md-3">
                          <div class="form-group">
                              <label style="padding-top: 5px;" class="bmd-label-floating">
                                  <?php
                        
                                    
                                    $num2 = $_COOKIE["item2"];
                                    
                                    include_once  __DIR__ . '/connectionDb.php';
                                    $database = new connectionDb();
                                    $db = $database->getConnection();

                                    $sql = "select item_price from category_items_list where category_id ='$num2'";
                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();
                                    
                                    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                                        printf ("%s (%s)\n","Item Price -> " ,$row[0]);
                                    }
                                    
                                ?>
                              </label>
                              <input id="app_name" type="text" name="Item_price" class="form-control" >
                          </div>
                        </div>
                      
                      <div class="col-md-3">
                          <div class="form-group">
                              <label style="padding-top: 5px;" class="bmd-label-floating">
                                  <?php
                        
                                    
                                    $num2 = $_COOKIE["item2"];
                                    include_once  __DIR__ . '/connectionDb.php';
                                    $database = new connectionDb();
                                    $db = $database->getConnection();

                                    $sql = "select category_subtitle from category_lang where category_id ='$num2'";
                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();
                                    
                                    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                                        printf ("%s (%s)\n","Item Sub Title -> " ,$row[0]);
                                    }
                                    
                                ?>
                              </label>
                              <input id="app_name" type="text" name="txtSub" class="form-control">
                          </div>
                        </div>

                
                        
                            <br>

                            <input name = "EditItem" type="submit" class="btn btn-secondary pull-center" value="Edit Item">
                            <input name = "ItemList" type="submit" class="btn btn-secondary pull-center" value="Items List">
                        <a href="Itemslist.php" <button onclick="" name = "cancel" type="submit" class="btn btn-secondary pull-center">Cancel</a>

                    </form>
                        </div>
                        </div>

                        </div>
                        </div>
                        </div>
                  
                  <?php
                  
                  $num2 = $_COOKIE["item2"];
                  
                    if (isset($_POST["EditItem"]))
                    {
                        
                        
                        
                        include_once  __DIR__ . '/connectionDb.php';
                        $database = new connectionDb();
                        $db = $database->getConnection();
                        
                         if(isset($_POST["txtSub"]) && !empty($_POST["txtSub"])){
                          $txtSub = $_POST["txtSub"];
                          $sql = "update category_lang set category_subtitle = '$txtSub' where category_id = '$num2'";
                          $stmt = $db->prepare($sql);
                          $stmt->execute();
                         }
                 

                         if(isset($_POST["Item_price"]) && !empty($_POST["Item_price"])){
                          $item=$_POST["Item_price"];
                          $sql = "update category_items_list set item_price =$item where category_id = '$num2'";
                          $stmt = $db->prepare($sql);
                          $stmt->execute();
                         }

                   
                         if(isset($_POST["Item_name"]) && !empty($_POST["Item_name"])){
                          $Item_name = $_POST["Item_name"];

                          $sql = "update category_lang set category_title = '$Item_name' where category_id = '$num2'";
                          $stmt = $db->prepare($sql);
                          $stmt->execute();
                         }           
                         
                         
                   
                        
                        $sql22 = "update category_items_list set related_item = '$num2' where category_id = '$num2'";
                        $stmt3 = $db->prepare($sql22);
                        $stmt3->execute();
                
                        
                    }
                  
                  ?>
                  
                  <?php
                    if(isset($_POST["ItemList"]))
                    {
                        header("Location: SubItem.php");
                    }
                  
                  ?>
                  
   
      <script>
      function getID(item_no){


      document.cookie = 'sub_item_id' + '=' +escape( item_no ) + '; expires=Fri, 27 Jul 2021 02:47:11 UTC; path=/';


      }

      </script>
 