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
                <h4 class="page-title">Coupon </h4>

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
                        <i class=""></i>
                    </li>



                    <li class="nav-item" style="font-weight: bold;" >
                        <a href="AddCoupon.php" class="btn " style="background-color:#282a3c;color:white">Add coupon +</a>
                    </li>
                </ul>


            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-warning">

                            <div class="col-12 makeBLack" >
                                <br><h4 class="card-title">Branches table</h4><br>
                                <input class="form-control mb-3" id="myInput1" type="text" placeholder="Search.."><br>

                            </div>




                        </div>

                        <div class="card-body">
                            <div class="table-responsive" id="order_table">
                                <table class="table" id="result2">
                                    <thead class=" text-secondary">
                                    <th>#ID</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Value</th>
                                    <th>End date</th>
                                    <th>max number of used</th>
                                    <th>Control</th>
                                    </thead>
                                    <tbody  id="myTable1">
                        <?php
                        $sql = "SELECT * FROM `coupon` order by created_at";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();
                        $itemCount = $stmt->rowCount();

                        if ($itemCount > 0) {

                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <tr>

                            <td><?php echo $row["id"]?></td>
                            <td><?php echo $row["coupon_text"]?></td>
                            <td><?php echo $row["coupon_type"]?></td>
                            <td><?php echo $row["coupon_value"]?></td>
                            <td><?php echo $row["expiry_date"]?></td>
                            <td><?php echo $row["uses_number"]?></td>

<!--                            <td>-->
<!--                                <a href="{{route("promoCode.edit", $promoCode->id)}}" class="control-link edit"><i class="fas fa-edit"></i></a>-->
<!--                                <form action="{{route("promoCode.destroy", $promoCode->id)}}" method="post" id="delete{{$promoCode->id}}" style="display: none" data-swal-title="Delete Promo Code" data-swal-text="Are Your Sure To Delete This promo code ?" data-yes="Yes" data-no="No" data-success-msg="the branch has been deleted succssfully">@csrf @method("delete")</form>-->
<!--                                <span href="#" class="control-link remove form-confirm" data-form-id="#delete{{$promoCode->id}}"><i class="far fa-trash-alt"></i></span>-->
<!--                            </td>-->

                        </tr>
                        <?php }}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('include/footer.php') ?>
