<?php 

include('include/header.php');

include_once  __DIR__ . '/connectionDb.php';
$database = new connectionDb();
$db = $database->getConnection();
?>
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                 <div class="page-header">
                        <h4 class="page-title">Add category data</h4>
                        
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
                            <i class="flaticon-right-arrow"></i>
                            </li>

                            <li class="nav-item" >
                            </li>
                
                        </ul>
                        
			
					</div>  

                    <br><br>                    
                       
                <div class="row">
                    <div class="offset-md-3 col-sm-12 col-md-6">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title " >Add Category Data</h4><br>
                                   
                                    <br>
                             

                            
                                    </div>
 
                                    <br>
                                   <div class=" col-lg-12  col-md-8   col-sm-12">    




                                 
                                 <!-- add banner offer  -->
                                    <div >


                                                <form  method="post" enctype="multipart/form-data"  >

                                            

                                                <div class=" form-group  mb-1">
                                                        <textarea id="w3review" class="form-control"  name="category_text" rows="4" cols="50"></textarea>
                                                </div>
                                                
                                                <label for="url">upload  pdf:</label>
                                                <input type="file"  class="form-control" accept="application/pdf" name="category_pdf"  >

                                                <div class="custom-control " id="wrongData"   style="display:none">
                                                <span style="color:red">you already add info for this category</span>
                                                </div>

                                                <div class=" form-group  mb-1">
                                                <button type="submit" name="Add" class="btn btn-primary">Add +</button>
                                                </div>
                                                </form>

                                    </div>




                              

                              

                               
                                </div>
                            
                            </div>
                    </div>
                </div>
            </div>
</div>           
            <?php include('include/footer.php') ?>








            <?php 
            


    

                if(isset($_POST['Add']) && isset($_POST['category_text'])){


                                if(isset($_GET['catidMain'])&&isset($_GET['branchid'])){
                                    $GetCatId=$_GET['catidMain'];
                                    $branchid=$_GET['branchid'];

                                }else{
                                    echo "<script>location.replace('headCat.php');</script>";

                                }
                                

                                if(isset($_FILES['category_pdf']) && isset($_FILES['category_pdf']['name']) &&  !empty($_FILES['category_pdf']['name']) ){

                                            


                                    $name= 'category_pdf';
                                    $path ="uploads/pdf/";
                                    $image = new addImage($name,$path);


                                }else{
                                    $pdfDB=" ";
                                }
                            
                                $category_text=trim(filter_var($_POST['category_text'], FILTER_SANITIZE_STRING));

                                $select="select CatID  from categoryInfo  where CatID=$GetCatId";
                                $selectCat=$db->prepare($select);    
                               
                                if($selectCat->execute()){

                                        

                                        if(!$selectCat->rowCount() > 0 ){

                                                 
                                            $categoryData="INSERT INTO `categoryInfo`(`CatID`, `Text`,`pdf_file`) VALUES ($GetCatId,'$category_text','".$image->getImageFullName()."')";
                                            $executeCategory=$db->prepare($categoryData);
                                                if($executeCategory->execute()){
    
                                              
                                                        if(!empty($category_pdf)){
                                                            $image->moveImage();
                                                        }
                                    

                                                    echo "<script>location.replace('showCategoryData.php?catidMain=$GetCatId');</script>";
                                                }else{
                                                    echo "<script>alert('can't add this Category Info')</script>";
                                                }



                                            }else{
                                                    echo "<script>$('#wrongData').show();</script>";

                                            }
             


                                }else{

                                       echo "<script>location.replace('headCat.php');</script>";

                                    
                                }                       


               
                                     
                        
                        
                }




            
            




            ?>
























