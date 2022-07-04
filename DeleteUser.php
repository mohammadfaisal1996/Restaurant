<?php
 

      if(isset($_POST['Delete'])){
          
         $Delete=$_POST['Delete'];
    

         
      
         $url = 'http://node.bluefig.digisolapps.com:8025/DeleteUser';



         //The JSON data.
         $jsonData = array(
             'userid' =>  $Delete,
         );




         $options = array(
             'http' => array(
               'method'  => 'POST',
               'content' => json_encode( $jsonData ),
               'header'=>  "Content-Type: application/json\r\n" .
                           "Accept: application/json\r\n"
               )
           );
           
           $context  = stream_context_create( $options );
           $result = file_get_contents( $url, false, $context );
        //    $response = json_decode( $result );

      }

    
      
      ?>