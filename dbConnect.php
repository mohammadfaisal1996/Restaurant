<?php
    declare(strict_types=1);
    class connectionDb { 
        function getConnection(){

            return 1;
  
            $username ="root";          // $username = getenv('DB_USER');
            $password = getenv('DB_PASS');
            $dbName = getenv('DB_NAME');
            $hostname = getenv('DB_HOSTNAME');
            // $password = "";
            //  $dbName = "BlueFigDb";
            //  $hostname = "localhost";

            $cloud_sql_connection_name = getenv('CLOUD_SQL_CONNECTION_NAME');
            try {       
                if ($hostname) {
                    
                    $dsn = sprintf('mysql:dbname=%s;host=%s', $dbName, $hostname);
                } else {
                    
                    $dsn = sprintf(
                        'mysql:dbname=%s;unix_socket=/cloudsql/%s',
                        $dbName,
                        $cloud_sql_connection_name
                    );
                }
        
            
                $conn = new PDO($dsn, $username, $password, [
                    PDO::ATTR_TIMEOUT => 5,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]);
              
            } catch (TypeError $e) {
                throw new RuntimeException(
                    sprintf(
                        'Invalid or missing configuration! Make sure you have set ' .
                        '$username, $password, $dbName, and $hostname (for TCP mode) ' .
                        'or $cloud_sql_connection_name (for UNIX socket mode). ' .
                        'The PHP error was %s',
                        $e->getMessage()
                    ),
                    $e->getCode(),
                    $e
                );
            } catch (PDOException $e) {
                throw new RuntimeException(
                    sprintf(
                        'Could not connect to the Cloud SQL Database. Check that ' .
                        'your username and password are correct, that the Cloud SQL ' .
                        'proxy is running, and that the database exists and is ready ' .
                        'for use. For more assistance, refer to %s. The PDO error was %s',
                        'https://cloud.google.com/sql/docs/mysql/connect-external-app',
                        $e->getMessage()
                    ),
                    $e->getCode(),
                    $e
                );
            }
        
            return $conn;
        }
        
            }
    

?>

