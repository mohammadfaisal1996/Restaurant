<?php include('include/header.php');
$baseUrl = new addImage("file","images/imagesitems/");

?>
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">Update Category Data </h4>
            

     
                        <?php 
                                include_once  __DIR__ . '/connectionDb.php';
                                $database = new connectionDb();
                                $db = $database->getConnection();
  
                            
                                if( isset($_GET['catID']) && isset($_GET['branchID'])){
                                    $catID=$_GET['catID'];
                                    $branchID=$_GET['branchID'];
                            


                          
                                $sql = "select DISTINCT
                                category_items_list.category_id
                               ,category_items_list.category_image
                               ,category_items_list.Status
                               ,category_lang.category_title
                               ,category_lang.category_subtitle
                               ,category_lang.Ingredients
                               ,category_lang.header1
                               ,category_lang.header2
                               ,category_lang.header3
                               ,category_lang.header4
                               ,category_lang.header5
                             
                               FROM category_items_list,category_lang where category_items_list.category_id = category_lang.category_id  and category_items_list.category_list_type=0 and category_items_list.BranchesID = $branchID and category_items_list.category_id=$catID";
                                $stmt = $db->prepare($sql);
                                $stmt->execute();


                             
                                    while($row= $stmt->fetch(PDO::FETCH_ASSOC)){
                                 
            
            
            
                                    ?>

                        
			
					</div><br><br>                    
                       
                <div class="row">
                    <div class="offset-md-3 col-sm-12 col-md-6">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title " >Update  Data</h4><br>
                                   
                                    <br>
                             

                            
                                    </div>
 
                                    <br>
                                   <div class=" col-lg-12  col-md-8   col-sm-12">                    
                                       
                                   <form  method="post" enctype="multipart/form-data">

                                        <div class=" form-group  mb-1">

                                        <label for="inputFloatingLabel" style ="color:black!important" class="placeholder">Edit Category Name</label>
                                        <input    type="text" value="<?php echo $row['category_title']?>"   name="category_title" class="form-control input-border-bottom" required="">                                   
                                        </div>

                                        <div class=" form-group  mb-1">

                                        <label for="inputFloatingLabel" style ="color:black!important" class="placeholder">Edit sub Category Name </label>
                                        <input  type="text"  value="<?php echo $row['category_subtitle'] ?>"  name="category_subtitle" class="form-control input-border-bottom" >                                   
                                        </div>

                                        <div class=" form-group  mb-1">

                                    
                                        <img src="<?php echo $baseUrl->getBaseUrl().$row['category_image']?>" width='175' height='200' />
                                        <br><br>
                                       <input type="file" name="file"   accept="image/x-png,image/gif,image/jpeg" />

                                        </div>
                                     
                                        <div class="custom-control " id="wrongSize" style="display:none">
                                        <span style="color:red">The size of the image must be less than 500 KB to be uploaded</span>


                                        </div>

                                                             <div class=" col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                    <label for="comment">Update Description </label>
                                                    <textarea   class="form-control"  rows="5"   name="Ingredients"><?php  echo  $row['Ingredients'] ?></textarea>
                                                    
                                                    
                                                    </div>

                                                    </div>

                                                    <hr> 

                                                   <label calss="font-weight-bold"> Category Header : </label><br>

                                                    <textarea   class="form-control mb-3"  rows="3"   name="header1"><?php  echo  $row['header1'] ?></textarea>
                                                    <textarea   class="form-control mb-3"  rows="3"   name="header2"><?php  echo  $row['header2'] ?></textarea>
                                                    <textarea   class="form-control mb-3"  rows="3"   name="header3"><?php  echo  $row['header3'] ?></textarea>
                                                    <textarea   class="form-control mb-3"  rows="3"   name="header4"><?php  echo  $row['header4'] ?></textarea>
                                                    <textarea   class="form-control mb-3"  rows="3"   name="header5"><?php  echo  $row['header5'] ?></textarea>









                                    <div class=" form-group  mb-1">
                                    
									
                                    <button type="submit" name="updateData" class="btn btn-primary">Update</button>
                                    </div>


                                    </form>

                                    <?php  
                                         
                                        
                                    }    }
          
                                    ?>
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
            
            






                if(isset($_POST['updateData'])&&isset($_GET['catID'])&&isset($_GET['branchID'])){

                   

               

                    $category_title= $_POST['category_title'];

                    if(!empty($_POST['category_subtitle'])){
                    $category_subtitle= $_POST['category_subtitle'];

                    }else{

                    $category_subtitle= " ";

                    }


                    if(!empty($_POST['Ingredients'])){
                         
                    $Ingredients= trim(filter_var($_POST['Ingredients'], FILTER_SANITIZE_STRING));

                    }else{

                    $Ingredients= " ";

                    }


                   if(!empty($_POST['header1']) ){
                         
                    $header1= trim(filter_var($_POST['header1'], FILTER_SANITIZE_STRING));

                    }else{

                    $header1= " ";

                    }
                         if(!empty($_POST['header2']) ){
                         
                    $header2= trim(filter_var($_POST['header2'], FILTER_SANITIZE_STRING));

                    }else{

                    $header2= " ";

                    }
                         if(!empty($_POST['header3']) ){
                         
                    $header3= trim(filter_var($_POST['header3'], FILTER_SANITIZE_STRING));

                    }else{

                    $header3= " ";

                    }


                                if(!empty($_POST['header4']) ){
                         
                    $header4= trim(filter_var($_POST['header4'], FILTER_SANITIZE_STRING));

                    }else{

                    $header4= " ";

                    }


            if(!empty($_POST['header5']) ){
                         
                    $header5= trim(filter_var($_POST['header5'], FILTER_SANITIZE_STRING));

                    }else{

                    $header5= " ";

                    }




                    $catID=$_GET['catID'];
                    $branchID=$_GET['branchID'];
              

                    if(isset($_FILES['file'])){
                        $name= 'file';
                        $path ="uploads/images/imagesitems/";
                        $Image = new addImage($name,$path);
                    }
                  
    
                 
    
                
                    if (empty($Image->size))
                    {
                        $sql3 = "update category_lang set  category_title ='$category_title' ,category_subtitle='$category_subtitle',`Ingredients`='$Ingredients',`header1`='$header1',`header2`='$header2',`header3`='$header3',`header4`='$header4',`header5`='$header5'  where category_id=$catID";
                        $stmt3 = $db->prepare($sql3);
                        if($stmt3->execute()){

                            if($_GET['from']=="headCat"){
                                header("Location:headCat.php");
                            }else if($_GET['from']=="category" && isset($_GET['back'])){

                                $back=$_GET['back'];
                                header("Location:Category.php?CATID=$back&Branchid=$branchID");

                            }
                            


                        }


                   
                    }
                     if ($Image->size < 524288 &&  !empty($Image->size))
                    {
                  
               
              

                    if(isset($category_title)&&!empty($Image->name)){

                        if(isset($_POST['category_subtitle']) && !empty($_POST['category_subtitle']) ){

                               $category_subtitle= $_POST['category_subtitle'];

                    }else{

                    $category_subtitle= " ";

                    }

                       
               
                   


               

                    $sql2 = "update category_items_list set  category_image ='".$Image->name."' where category_id=$catID and BranchesID=$branchID  ";
                    $stmt2 = $db->prepare($sql2);
                    if($stmt2->execute()){

                        echo  $Image->moveImage();
                        echo "<h1>this is not true </h1>";

                       



                        $sql3 = "update category_lang set  category_title ='$category_title' ,category_subtitle='$category_subtitle',`Ingredients`='$Ingredients' ,`header1`='$header1',`header2`='$header2',`header3`='$header3',`header4`='$header4',`header5`='$header5' where category_id=$catID";
                        $stmt3 = $db->prepare($sql3);
                        if($stmt3->execute()){





                               if($_GET['from']=="headCat"){
                                header("Location:headCat.php");
                            }else if($_GET['from']=="category" && isset($_GET['back'])){

                                $back=$_GET['back'];
                                header("Location:Category.php?CATID=$back&Branchid=$branchID");

                            }

                                

                    }



                    } 
    
                    }
              
                    }
                    else
                    {?>
                    <script>$("#wrongSize").show();</script>
                    <?php 
                    }
                }
              
            




            ?>
