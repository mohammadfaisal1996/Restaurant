<?php
 ob_start();
?>

<?php

$sql="";


if( $_GET['type'] == 'basic'){



                 $json = file_get_contents('http://node.bluefig.digisolapps.com:8025/getUsers');
                          $obj = json_decode($json);


$value="<th >Customer ID</th><th>Customer Name</th><th>Phone Number</th><th>Email</th><th>Type</th>";
                           
                                  $count=1;
                                  foreach($obj as $data){
                                    

                                   $value=$value."<tr><td>".$count++."</td>";


                                    if(isset($data->name)){
                                    $value=$value."<td>".$data->name."</td>";
                                    }else{
                                    $value=$value."<td> </td>";
                                    }  

                                         if(isset($data->mobile)){
                                    $value=$value."<td>".$data->mobile."</td>";
                                    }else{
                                    $value=$value."<td> </td>";
                                    }  
                                

                                    if(!isset($data->email)){$value=$value."<td>  </td>";}else{$value=$value."<td>".$data->email."</td>";}
                                    $value=$value."</tr>";
                                
                                }
                                
                                                                             
                          
                                        
$file="customers.xls";

$test = <<<excel
<table>
$value
</table>
excel;

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");
echo $test;
  } 

                        ?>
    
     


