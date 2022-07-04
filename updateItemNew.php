<?php include('include/header.php');

$baseUrl = new addImage("file","images/imagesitems/");


?>
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">Update item Data</h4>
            

     
                        <?php 
                                include_once  __DIR__ . '/connectionDb.php';
                                $database = new connectionDb();
                                $db = $database->getConnection();
  

                            
                                if( isset($_GET['catID'])){
                                    $catID=$_GET['catID'];
                                
                                    
                                    
                 
                            


                          
                                    $sql ="SELECT 
                                    category_items_list.category_id,
                                    category_items_list.BranchesID,
                                    category_items_list.item_price,
                                    category_lang.category_title,
                                    category_lang.Ingredients as Description,
                                     category_items_list.category_image as ImageName 
                                     
                                      from category_items_list 
                                      JOIN category_lang  on category_lang.category_id = category_items_list.category_id
                                      where category_items_list.category_id=$catID ";

                                     $stmt = $db->prepare($sql);
                                     $stmt->execute();
                                     $itemCount = $stmt->rowCount();







                                   


                                     if ($itemCount > 0) {

                                       
                             
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

                                        <label for="inputFloatingLabel" style ="color:black!important" class="placeholder">Edit item Name</label>
                                        <input    type="text" value="<?php echo $row['category_title']?>"   name="item_title" class="form-control input-border-bottom" required="">                                   
                                        </div>

                                        <div class=" form-group  mb-1">

                                        <label for="inputFloatingLabel" style ="color:black!important" class="placeholder">Edit item price </label>
                                        <input    type="text" value="<?php echo $row['item_price']?>"   name="item_price" class="form-control input-border-bottom" required="">   <span>JOD</span>                                
                                        </div>

                             

                                        <div class=" form-group  mb-1">

                                       
                                       <div class="row">
                                       <div class="col-sm-6">
                                        <img src="<?php echo $baseUrl->getBaseUrl().$row['ImageName']?>" width='175' height='200' />
                                        </div>





                                        <div class="col-sm-6">
                                         <h4>Item Sizes : </h4>
                                         
                                         
                                        <div style="height:300px;background-color:white;max-height: 500px;overflow-y:auto">
                                        <table class="table" style="">
                                        <thead class=" text-secondary">


                                        <th>Item Size</th>
                                        <th>price</th>
                                        <th>Action</th>
                                        </thead>

                                        <tbody >
                                        <?php 

                                            $sqlDD2="SELECT  `id`,`type`,`price` FROM `ItemType` WHERE category_id=$catID";
                                            $stmtDD2 = $db->prepare($sqlDD2);
                                            $stmtDD2->execute();

                                              

                                              while($rowSize=$stmtDD2->fetch(PDO::FETCH_ASSOC)){
                                                ?> 
                                                <tr id="D<?php echo $rowSize['id'] ?>">
                                                <td><?php echo $rowSize['type']?></td>
                                                <td><?php echo $rowSize['price'] ?></td>
                                                <td>
                                                
                                                <form onsubmit="return false" style="display: inline-block !important;">
                                                <button class="btn btn-danger" id="DeleteCat" onsubmit="return false"  onclick="funn(<?php echo $rowSize['id'] ?>)"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                                </td>

                                                </tr>
                                                

                                               <?php  
                                              }
                                                  ?>
                                                




                                        </tbody>


                                        </table>
                                        </div>

                                         </div>
                                






                                         </div>





                                        <br><br>
                                       <input type="file" name="file"   accept="image/x-png,image/gif,image/jpeg" />

                                        </div>
                                                 
                                        <div class="custom-control " id="wrongSize" style="display:none">
                                        <span style="color:red">The size of the image must be less than 500 kB  to be uploaded</span>


                                        </div>






                                    
                                        <div class=" form-group  mb-1">
                                        
                                        <input type="text" class="form-group" id="ItemSize" placeholder="Item Size" >
                                        <input type="text" class="number-only form-group"   id="ItemPrice"  placeholder="Price Size" >
                                        <button class="btn btn-primary" type="button" id="sendButton">add</button>


                                        <div style="height:300px;width:600px;background-color:white;max-height: 500px;overflow-y:auto">
                                        <table class="table" style="">
                                        <thead class=" text-secondary">


                                        <th>Item Size</th>
                                        <th>price</th>
                                        <th>Action</th>
                                        </thead>

                                        <tbody id="ItemSizeTable">


                                        </tbody>


                                        </table>
                                        </div>
                                        
                                        <div>
                                            <hr>



                                            <div class="col-sm-12 addons"  style="height:300px;background-color:white;max-height: 500px;overflow-y:auto">


                                                <?php



                                                $sqlDDD="SELECT `id`, `itemID`, `IngredientName`, `status`, `price` FROM `AddOnes` WHERE  itemID=$catID";
                                                $stmtDDD = $db->prepare($sqlDDD);
                                                $stmtDDD->execute();

                                                $count=$stmtDDD->rowCount();

                                                if($count>0){
                                                ?>
                                                <h3>Add Ons Table :-</h3>
                                                <table class="table" style="">
                                                    <thead class=" text-secondary">


                                                    <th>Addon Name</th>
                                                    <th>price</th>
                                                    <th>Action</th>
                                                    </thead>

                                                    <tbody >

                                                    <?php
                                                    while($rowAddons=$stmtDDD->fetch(PDO::FETCH_ASSOC)){
                                                        ?>


                                                        <tr id="D<?php echo $rowAddons['id'] ?>"><td><?php echo $rowAddons['IngredientName'] ?></td>
                                                            <td><?php  echo $rowAddons['price']?></td>

                                                            <td>
                                                                <form onsubmit="return false" style="display: inline-block !important;">
                                                                    <button class="btn btn-danger" id="DeleteADDons" onsubmit="return false"  onclick="funnADDON(<?php echo $rowAddons['id'] ?>)"><i class="fas fa-trash-alt"></i></button>
                                                                </form>
                                                            </td>

                                                        </tr>


                                                        <?php
                                                    }
                                                    }




                                                    ?>
                                                    <tbody >
                                                </table>

                                            </div>




                                            <div class="IngredientsItem   col-sm-12"  style =" max-height: 600px;overflow-y:auto;background-color:white"  >

                                                <br><h3>Add Ons </h3><br>




                                                <input type="text" class="form-group" id="IngredientName" placeholder="Add Ons Name" >
                                                <input type="text" class="number-only form-group"   id="Ingredientprice"  placeholder="Add Ons Price" >
                                                <button class="btn btn-primary" type="button" id="sendButton2">add</button>



                                                <div class="col-sm-12">
                                                    <br><h3>Select Ingredients </h3><br>

                                                    <select class="form-control"  onchange="getIngredient(this)">
                                                        <?php
                                                        $sql3="SELECT DISTINCT `IngredientName`, `price` FROM `AddOnes` ";
                                                        $stm3=$db->prepare($sql3);

                                                        if($stm3->execute()){
                                                            ?>


                                                            <option>select one </option>
                                                            <?php
                                                            while($rowAddons = $stm3->fetch(PDO::FETCH_ASSOC)) {
                                                                ?>
                                                                <option value="<?php echo $rowAddons['IngredientName'] ?>-<?php echo $rowAddons['price'] ?>"><?php echo $rowAddons['IngredientName']."  ".$rowAddons['price'] ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>


                                                </div>



                                                <div style="height:500px;width:100%;background-color:white;max-height: 500px;    max-width: 100%;">
                                                    <table class="table" style="overflow-y:auto">
                                                        <thead class=" text-secondary">


                                                        <th>Add Ons Name</th>
                                                        <th>price</th>
                                                        <th>Action</th>
                                                        </thead>

                                                        <tbody id="Ingredients">


                                                        </tbody>


                                                    </table>
                                                </div>
                                            </div>






                                            <div class=" col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="comment">Update Description </label>
                                                    <textarea   class="form-control"  rows="5"   name="Description"><?php  echo  $row['Description'] ?></textarea>
                                                </div>

                                            </div>


                                            <?php
                                            $ExtraDescription="SELECT `id`,`question` FROM `ExtraOption` WHERE item_id =$catID limit 1";
                                            $ExtraDescriptionStm=$db->prepare($ExtraDescription);
                                            $ExtraDescriptionStm->execute();
                                            $count=$ExtraDescriptionStm->rowCount();
                                            if($count > 0){

                                            ?>
                                            <div class="   col-sm-12"  style =" max-height: 600px;overflow-y:auto;background-color:white"  >

                                                <br><h3>Update Extra </h3><br>



                                                <div id="OptionData">
                                                    Question:<br>

                                                    <textarea class=" form-group"   name="Question" rows="4" cols="70" ><?php
                                                        $Extra = $ExtraDescriptionStm->fetch(PDO::FETCH_ASSOC);
                                                        echo $Extra['question'];

                                                        ?></textarea><br>
                                                    <input type="hidden"  value="<?php echo $Extra['id'] ?>" name="ExtraQuestionID">


                                                    <?php
                                                    }
                                                    if(isset($Extra['id'])&& !empty($Extra['id'])) {


                                                    $ExtraID= $Extra['id'];
                                                    $ExtraOption="SELECT `id`,`optionData`, `ExtraID` FROM `Options`  WHERE  ExtraID =$ExtraID ";
                                                    $ExtraOptionstm=$db->prepare($ExtraOption);
                                                    $ExtraOptionstm->execute();
                                                    $count=$ExtraOptionstm->rowCount();
                                                    if($count > 0){?>

                                                    <button class="btn btn-primary" type="button" id="sendButton3">add Option +</button><br>
                                                    <table class="table" style="overflow-y:auto">
                                                        <thead class=" text-secondary">


                                                        <th> Name</th>
                                                        <th>Action</th>
                                                        </thead>

                                                        <tbody id="Addextra">
                                                        <?php



                                                        while($RowOption=$ExtraOptionstm->fetch(PDO::FETCH_ASSOC)){
                                                            ?>
                                                            <tr  id="DExtra<?php echo $RowOption['id'] ?>">
                                                                <td><?php echo $RowOption['optionData'];?></td>
                                                                <td>

                                                                    <form onsubmit="return false" style="display: inline-block !important;">
                                                                        <button class="btn btn-danger" id="DeleteCat" onsubmit="return false"  onclick="funnExtra(<?php echo $RowOption['id'] ?>)"><i class="fas fa-trash-alt"></i></button>
                                                                    </form>
                                                                </td>
                                                            </tr>

                                                            <?php

                                                        }
                                                        }
                                                        }
                                                        ?>

                                                        </tbody>


                                                    </table>



                                                </div>
                                            </div>
                                    







                            


                                    <div class=" form-group  mb-1">
                                    
									
                                    <button type="submit" name="updateData" class="btn btn-primary">Update</button>
                                    </div>


                                    </form>

                                    <?php  
                                         
                                        
                                    }  }  }
          
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
            
            



                require 'aws/aws-autoloader.php';   


                if(isset($_POST['updateData'])&& isset($_GET['catID'])){

                   $catID=$_GET['catID'];

               
                  if(isset($_POST['item_title'])&&isset($_POST['item_price'])){
                                  $category_title= $_POST['item_title'];
                    $item_price= $_POST['item_price'];
                  }


                    if(isset($_POST['Description'])&&!empty($_POST['Description'])){

                        $Description= trim(filter_var($_POST['Description'], FILTER_SANITIZE_STRING));
                    }else{
                        $Description=NULL;
                    }




                    if(isset($_POST['IngredientName']) && isset($_POST['price'])){
                        $IngredientName=$_POST['IngredientName'];
                        $prices=$_POST['price'];


                        foreach($IngredientName as  $name){

                            $count3++;

                            foreach($prices as $price) {
                                $count4++;

                                if($count3 == $count4){




                                    $SQLU = "INSERT INTO `AddOnes`( `itemID`, `IngredientName`,`price`) VALUES($catID,'$name',$price)";
                                    $Stmt1 = $db->prepare($SQLU);
                                    $Stmt1->execute();


                                }



                            }
                            $count4=0;




                        }


                    }





                    if(isset($_POST['Question'])&&!empty($_POST['Question'])&&isset($_POST['ExtraQuestionID'])){


                        $ExtraQuestion_id=$_POST['ExtraQuestionID'];
                        $Question= trim(filter_var($_POST['Question'], FILTER_SANITIZE_STRING));
                        $UpdateQuestionExtra = "UPDATE `ExtraOption` SET `question`='$Question' WHERE `id`=$ExtraQuestion_id";
                        $extSTM=$db->prepare($UpdateQuestionExtra);
                        if($extSTM->execute()){

                        };






                    }
                    else{

                        if(isset($_POST['ExtraQuestionID']) && !empty($_POST['ExtraQuestionID'])){

                            $ExtraQuestion_id=$_POST['ExtraQuestionID'];

                            $DeleteExtra = "DELETE FROM  `ExtraOption`  WHERE `id`=$ExtraQuestion_id";
                            $DeleteSTM=$db->prepare($DeleteExtra);
                            if($DeleteSTM->execute()){

                                $DeleteOption = "DELETE  FROM `Options` WHERE ExtraID  = '$delete'";
                                $DeleteOptionStm=$db->prepare($DeleteOption);
                                $DeleteOptionStm->execute();
                            };

                        }


                    }



                    if(isset($_POST['optionSolve'])&&isset($_POST['ExtraQuestionID'])){

                        $extraID=$_POST['ExtraQuestionID'];
                        $optionSolve=$_POST['optionSolve'];


                        foreach($optionSolve as  $option){
                            $SQLO = "INSERT INTO `Options`(`optionData`,`ExtraID`) VALUES ('$option',$extraID)";
                            $Stmt2 = $db->prepare($SQLO);
                            $Stmt2->execute();

                        } }












                    if(isset($_POST['ItemSizeA'])&&isset($_POST['ItemPriceA'])){

                        $ItemSizeA=$_POST['ItemSizeA'];
                        $ItemPriceA=$_POST['ItemPriceA'];

                    }
                    
                    
            
                    $count1=0;
                    $count2=0;
                    
                    
                   
                    
                    if(isset($ItemSizeA)&&isset($ItemPriceA)&&!empty($ItemPriceA)&&!empty($ItemPriceA)){
                        foreach($ItemSizeA as  $nameSize){
                    
                            $count1++;
                          
                            foreach($ItemPriceA as $priceSize) {
                                $count2++;
                           
                                if($count1 == $count2){




            
                                    $SQLU = "INSERT INTO `ItemType`(`category_id`, `type`, `price`) VALUES ( $catID,'$nameSize',$priceSize)";
                                    $Stmt1 = $db->prepare($SQLU);
                                    if($Stmt1->execute()){

                                        $SQLU2 = "update category_items_list set  IsSizes =1 where category_id=$catID ";
                                        $Stmt2 = $db->prepare($SQLU2);
                                        $Stmt2->execute();
                                    }
                                  
                                }
                        
                             
                                
                            }
                            $count2=0;
                        
                        }

                    }
                




                
                    if(isset($_FILES['file']) && !empty($_FILES['file']['name'])){


                        $name= 'file';
                        $path ="uploads/images/imagesitems/";
                        $Imagelink = new addImage($name,$path);


                        if ($Imagelink->size < 524288)
                        {


                            if(isset($category_title)&&!empty($Imagelink->name)&&isset($item_price)){


                                $sql2 = "update category_items_list set  category_image ='".$Imagelink->name."',item_price=$item_price  where category_id=$catID  ";
                                $stmt2 = $db->prepare($sql2);
                                if($stmt2->execute()){

                                    $sql3 = "update category_lang set  category_title ='$category_title',`Ingredients`=:Description  where category_id=$catID";
                                    $stmt3 = $db->prepare($sql3);
                                    if($stmt3->execute(array(':Description'=>$Description))){

                                        $Imagelink->moveImage();


                                        header("Location:items.php");





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



                 
    
                    





                        $sql3 = "update category_lang set  category_title ='$category_title',`Ingredients`=:Description    where category_id=$catID";
                        $stmt3 = $db->prepare($sql3);
                        if($stmt3->execute(array(':Description'=>$Description))){

                            $sql2 = "update category_items_list set  item_price =$item_price where category_id=$catID   ";
                            $stmt2 = $db->prepare($sql2);
                            if($stmt2->execute()){

                            header("Location:items.php");
                        
                            }


                        }


                   


                }
              
            




            ?>
<!-- <script>

function  funn(name){
 
 var iDCat=name;


 $.ajax({
      type: "POST",
      url:"DeleteIngredients.php",
      data:{Delete:iDCat}, // serializes the form's elements.
      success: function(data)
      {
        
          $("#D"+iDCat).fadeOut("slow"); // show response from the php script.
      }
    });

}
</script> -->



<script>
        


        $("#sendButton").click(function () {
          

        var ItemPrice=$("#ItemSize").val();
        var price=$("#ItemPrice").val();

         if(ItemPrice !=0 && price != 0){
            $("#ItemSizeTable").append("<tr><td><input type='hidden' name='ItemSizeA[]' value='"+ItemPrice+"'><p>"+ItemPrice+"</p></td><td><input type='hidden' name='ItemPriceA[]' value='"+price+"'><p>"+price+"</p>  </td><td><button id='delete'type='button'  class='btn btn-danger' onSubmit='return false'  onClick='deleteME(this)'><i class='fas fa-trash-alt'></i></button></td></tr>");

         }else{
             alert("Enter Item Size  and  price Size ");
         }
       
        });

            function deleteME(button){

            $(button).parent().parent().remove();
            }

        function deleteME2(button){

            $(button).parent().remove();
        }
        $("#sendButton3").click(function () {



            $("#OptionData").append("<div><input class='form-group' type='text' name='optionSolve[]' placeholder='Option text'><button id='delete'type='button'  class='btn btn-danger' onSubmit='return false'  onClick='deleteME2(this)'><i class='fas fa-trash-alt'></i></button></div>");


        });
    
        </script>


<script>

function  funn(cat){



   var CatId=cat;



  
   $.ajax({
        type: "POST",
        url:"DeleteSizes.php",
        data:{'CatID':CatId}, // serializes the form's elements.
        success: function(data)
        {
         
            $("#D"+CatId).fadeOut("slow"); // show response from the php script.
        }
      
      });

}








function  funn2(cat){



    var CatId=cat;





    $.ajax({
        type: "POST",
        url:"DeleteOnes.php",
        data:{'Delete':CatId}, // serializes the form's elements.
        success: function(data)
        {

            $("#D"+CatId).fadeOut("slow"); // show response from the php script.
        }

    });

}
function getIngredient(data){

    var leng=data.length;
    var value=data.value;

    var Name=value.substring(value.search("-"),-1);
    var price =value.substring(value.search("-")+1);

    $("#Ingredients").append("<tr><td><input type='hidden' name='IngredientName[]' value='"+Name+"'><p>"+Name+"</p></td><td><input type='hidden' name='price[]' value='"+price+"'><p>"+price+"</p>  </td><td><button id='delete'type='button'  class='btn btn-danger' onSubmit='return false'  onClick='deleteME(this)'><i class='fas fa-trash-alt'></i></button></td></tr>");




}





const counter=0;

$("#sendButton2").click(function () {

    var name=$("#IngredientName").val();
    var price=$("#Ingredientprice").val();


    if(name != " "){
        $("#Ingredients").append("<tr><td><input type='hidden' name='IngredientName[]' value='"+name+"'><p>"+name+"</p></td><td><input type='hidden' name='price[]' value='"+price+"'><p>"+price+"</p>  </td><td><button id='delete'type='button'  class='btn btn-danger' onSubmit='return false'  onClick='deleteME(this)'><i class='fas fa-trash-alt'></i></button></td></tr>");


    }else{
        alert("Enter Name & price ");
    }


});




function  funnADDON(id){



    var addonsID=id;




    $.ajax({
        type: "POST",
        url:"DeleteOnes.php",
        data:{'Delete':addonsID}, // serializes the form's elements.
        success: function(data)
        {

            $("#D"+addonsID).fadeOut("slow"); // show response from the php script.
        }

    });

}



function  funnExtra(cat){



    var CatId=cat;




    $.ajax({
        type: "POST",
        url:"DeleteExtra.php",
        data:{'Delete':CatId}, // serializes the form's elements.
        success: function(data)
        {

            $("#DExtra"+CatId).fadeOut("slow"); // show response from the php script.
        }

    });

}

</script>