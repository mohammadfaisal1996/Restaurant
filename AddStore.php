<?php include('include/header.php') ?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">Add Store</h4>
                        
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
                                    <br><h4 class="card-title">Add Store</h4><br>
                                    </div>
                                        <form method="post" enctype="multipart/form-data">
                                    
                                  

                                            <div class="col-sm-12 col-md-8 col-lg-4">
                                                <div class="form-group">
                                                    <label for="Bname">Store Name</label>
                                                    <input type="text" class="form-control" id="Bname" placeholder="Enter Name">
                                                </div>
                                            </div>

                                  
                                            <div class="col-sm-12 col-md-8 col-lg-4">
                                                 <div class="form-group">
                                                    <label for="email2">store Email Address</label>
                                                    <input type="email" class="form-control" id="email2" placeholder="Enter Email">
                                                    <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-8 col-lg-4">
                                                 <div class="form-group">
                                                    <label for="number">store Phone</label>
                                                    <input type="nubmer" class="form-control" id="number" placeholder="Enter Phone">
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-8 col-lg-4">
                                                 <div class="form-group">
                                                    <label for="fileImage">Select Image</label>
                                                    <input type="file" class="form-control" id="fileImage" placeholder="Enter Email">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-8 col-lg-4">
                                            <div class="form-group">
                                            <button name="sort_list" type="submit" class="btn btn-primary pull-center ">submit</button>
                                            </div>
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
       
        