<?php
ob_start();
include_once  __DIR__ . '/connectionDb.php';
$database = new connectionDb();
$db = $database->getConnection();

                        $sql="";


                                         
                        if($_POST['excel'] == 'customer-order'){

                            $sql="select ordersMaster.mobile_number,count(ordersMaster.mobile_number) as CountOfOrder from ordersMaster   GROUP by mobile_number";
                                                        $value="<th>Customer Mobile Number</th><th>Number Of Order For Customer</th>";
 

                        }

                                 if ($_POST['excel'] == 'category-order' ) {

                            $sql="SELECT category_lang.category_title,count(order_item.order_id) as orderNumber from category_lang,category_items_list,order_item  WHERE category_items_list.category_master=category_lang.category_id and order_item.item_id=category_items_list.category_id GROUP by category_lang.category_title";
                            $value="<th>Category Name</th><th>Number Of Order For Category</th>";

                        }
       


                        if( $_POST['excel'] == 'item-Order'){


                        $sql = "SELECT (select category_lang.category_title from category_lang where category_lang.category_id=category_items_list.category_id) as item_name ,category_items_list.category_image,count(item_id) as ItemCount ,category_items_list.item_price,sum(quantity) as order_item_quantity FROM order_item,category_items_list WHERE category_items_list.category_id=order_item.item_id GROUP by order_item.item_id order by order_item.item_id asc";
                        $value="<th>Item Name</th><th>Item Price</th><th>Number Of Order For Item</th><th>quantity Of Order</th>";

                        }
                        
               
                        
                        
                        




                        

                        
                           $stmt = $db->prepare($sql);
                     
                            $stmt->execute();
                            $itemCount = $stmt->rowCount();

                            if ($itemCount > 0) {

                                while($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {

                                            
                                         
                                     if( $_POST['excel'] == 'item-Order'){

                                            
                                            $value=$value."<tr><th>".$row['item_name']."</th><th>".$row['item_price']."</th><th>".$row['ItemCount']."</th><th>".$row['order_item_quantity']."</th></tr>";
                                            
                                            }else if ($_POST['excel'] == 'category-order') {

                                             $value=$value."<tr><th>".$row['category_title']."</th><th>".$row['orderNumber']."</th></tr>";

                                            }
                                            else if ($_POST['excel'] == 'customer-order') {
                                             $value=$value."<tr><th>".$row['mobile_number']."</th><th>".$row['CountOfOrder']."</th></tr>";

                                            }





                                }
                            }

                 

                        $file="orders.xls";

                        $test ="<table>$value</table>";
                    

                        header("Content-type: application/vnd.ms-excel");
                        header("Content-Disposition: attachment; filename=$file");
                        echo $test;

?>
    
     


