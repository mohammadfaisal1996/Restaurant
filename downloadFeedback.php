<?php
 ob_start();


include_once  __DIR__ . '/connectionDb.php';
$database = new connectionDb();
$db = $database->getConnection();
                            
                           


                       
?>

<?php



if( $_GET['type'] == 'basic'){




$value="<th >UserName</th><th>Email</th><th>comment</th><th>comment</th><th>mobileNumber</th>";
                           
                            $sql1 = "SELECT * FROM Feedback";
                           $stmt = $db->prepare($sql1);
                           $stmt->execute();
                           $itemCount = $stmt->rowCount(); 

                                     if ($itemCount > 0) {

                               while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                
                               
                              
                                 $value=$value."<tr><td>".$row['UserName']."</td><td>".$row['Email']."</td><td>".$row['comment']."</td><td>".$row['mobileNumber']."</td><tr>";


                                

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
    
     


