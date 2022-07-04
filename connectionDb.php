<?php
    
    class connectionDb { 
        function getConnection(){



              $username ="#############";
              $password = "#########";
              $dbName = "#####";
              $hostname = "localhost";
              $utf8="utf8";



                    

                try {

                    $dsn = sprintf('mysql:dbname=%s;host=%s;charset=%s', $dbName, $hostname,$utf8);


                    $conn = new PDO($dsn, $username, $password, [
                        PDO::ATTR_TIMEOUT => 5,
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                    ]);


                    return $conn;



                }catch (PDOException $err) {
                    return  $err->getMessage();
                }




        }
        
            }
    

?>

