<?php
 ob_start();


include_once  __DIR__ . '/connectionDb.php';
$database = new connectionDb();
$db = $database->getConnection();
                            
                           


                       


if( $_GET['type'] == 'basic'){




$value="<th >Item name</th><th>Nubmer of like</th>";
                           
                          $sql2 = "SELECT    count(`item_fav_users`.item_no) as total ,`category_lang`.category_title as Itemname from item_fav_users JOIN category_lang on `category_lang`.category_id = `item_fav_users`.item_no  group by Itemname ";
                         $stmt2 = $db->prepare($sql2);
                          $stmt2->execute();
                          $itemCount = $stmt2->rowCount();
                          

                                     if ($itemCount > 0) {

                               while($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                                
                               
                              
                                 $value=$value."<tr><td>".$row['Itemname']."</td><td>".$row['total']."</td><tr>";


                                

                               }
                           
                           }
                     

                           



                                
                                                                             
                          
                                        
$file="FeedBack.xls";

$test = <<<excel
<table>
$value
</table>
excel;


header("Content-Encoding: UTF-8");
header("Content-type: text/csv; charset=UTF-8");
header("Content-Disposition: attachment; filename=$file");
header("Pragma: no-cache");
header("Expires: 0");

echo $test;
  } 

                        ?>
    
     


