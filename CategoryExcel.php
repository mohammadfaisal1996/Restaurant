<?php

include_once  __DIR__ . '/connectionDb.php';
$database = new connectionDb();
$db = $database->getConnection();


$sqlExcel = "select DISTINCT
category_items_list.category_id
,category_items_list.category_image
,category_items_list.Status
,category_lang.category_title
,category_lang.category_subtitle

FROM category_items_list,category_lang where category_items_list.category_id = category_lang.category_id  and category_items_list.category_list_type=0 and category_items_list.BranchesID = 1 ";

$stmtExcel = $db->prepare($sqlExcel);
$stmtExcel->execute();
$itemCountExcel = $stmtExcel->rowCount();




if(isset($_POST['export'])){


    $file="demo.xls";
    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=$file");

    if($itemCount > 0){


        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
       echo "<tr>";
       echo "<th>".$row["category_image"]."<th>";
       echo "<th>".$row["category_title"]."</th>";
       echo "<th>".$row["category_subtitle"]."</th>";
       echo "</tr>";
        }



        
    }


}


?>




                      
