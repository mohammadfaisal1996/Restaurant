<?php
ob_start();

include('include/header.php');
include_once  __DIR__ . '/connectionDb.php';
$database = new connectionDb();
$db = $database->getConnection();


?>


<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Add Coupon</h4>

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
                        <a href="index.php" >Dashboard </a>
                    </li>

                    <li class="separator">
                        <i class=""></i>
                    </li>
                </ul>


            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Coupon Text</label>
                                        <input class="form-control <?php if(isset($_POST["coupon_text"]) && strlen($_POST["coupon_text"]) > 6){ echo 'is-invalid';}?>" type="text" name="coupon_text" required placeholder="Enter title" value="<?php if(isset($_POST["coupon_text"])){echo $_POST["coupon_text"];}?>" >
                                    </div>
                                    <?php if(strlen($_POST["coupon_text"]) > 6){ ?>
                                        <div class="input-error text-danger" >coupon text must be less than 6 char</div>
                                    <?php }?>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Enter Max use number </label>
                                        <input class="form-control " type="number" name="max" required placeholder="Enter Max Use" value="<?php if(isset($_POST["max"])){echo $_POST["max"];}?>" >
                                    </div>
                                </div>


                                <div class="col-lg-6 " >
                                    <div class="form-group">
                                        <label for="exampleSelect1" >Coupon Type</label>
                                        <select class="form-control " required id="NavigateList" name="type"  >
                                            <option value="">None</option>
                                            <option value="percent">percentage</option>
                                            <option value="value">Value</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Enter Value </label>
                                        <input class="form-control <?php if(isset($_POST["value"])&&  $_POST["type"]=="percent" && $_POST["value"] > 100){ echo "is-invalid";}?>" required type="number" name="value" placeholder="Enter value" value="<?php if(isset($_POST["value"])){echo $_POST["value"];}?>">
                                    </div>
                                    <?php if(isset($_POST["type"]) &&  $_POST["type"]=="percent" && $_POST["value"] > 100){ ?>
                                        <div class="input-error text-danger">value must be less or equal 100</div>
                                    <?php }?>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Select Expiry Date</label>
                                        <input class="form-control " required type="date" name="End_time" value="<?php if(isset($_POST["value"])){echo $_POST["date"];}?>">
                                    </div>
                                </div>
                            </div>

                                <div class="tile-footer">
                                <button class="btn btn-primary" name="AddCoupon" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Create</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<?php include('include/footer.php') ?>
<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;

}

function test_requests($key)
{
    $bool=0;
    if( isset($_POST[$key]) && !empty($_POST[$key]) ){
        $bool= 1;
    }
    return $bool;
}

if(isset($_POST["AddCoupon"])) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $request = [];
        $error  = [];
        $request['coupon_text'] = $request['max'] = $request['type'] = $request['value'] = $request['End_time'] = null;

        foreach ($request as $key => $data) {
            if (!test_requests($key)) {
                $error[$key] = "required";
            } else {
                $request[$key] = test_input($_POST[$key]);
            }
        }

        if(count($error) > 0 ){
            $_POST["test"]=$error;
            var_dump($_POST["test"]);
        }else{
            if(!($_POST["type"]=="percent" && $_POST["value"] > 100 && strlen($_POST["coupon_text"]) > 6)){

                $text =$request['coupon_text'];
                $SQLU = "SELECT id FROM coupon where coupon_text ='$text'";
                $Stmt1 = $db->prepare($SQLU);
                if (!($Stmt1->rowCount() > 0)) {
                    $coupon_text=strtoupper($request['coupon_text']);
                    $max=$request['max'];
                    $type=$request['type'];
                    $value=$request['value'];
                    $End_time=$request['End_time'];

                    $SQLU = "INSERT INTO `coupon`(`coupon_text`, `uses_number`, `expiry_date`, `coupon_type`, `coupon_value`) VALUES ('$coupon_text',$max,'$End_time','$type',$value)";
                    $Stmt1 = $db->prepare($SQLU);
                    if ($Stmt1->execute()) {

                    }
                }else{
                    echo "<th class='text-danger'>This text already exists</th>";
                }


            }

        }


    }



}
?>