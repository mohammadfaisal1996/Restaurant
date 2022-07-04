<!DOCTYPE html>
<html lang="en">
<body>








  <?php include('include/scriptlink.php') ?>

<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/6.2.4/firebase-app.js"></script>


<!-- include only the Firebase features as you need -->
<script defer src="https://www.gstatic.com/firebasejs/6.2.4/firebase-auth.js"></script>
<script defer src="https://www.gstatic.com/firebasejs/6.2.4/firebase-firestore.js"></script>
<script defer src="https://www.gstatic.com/firebasejs/6.2.4/firebase-messaging.js"></script>
<?php 


if (isset($_POST['DECID']) && isset($_POST['STATE'])){  
?>
<script>
    $(document).ready(function() {

        const firebaseConfig = {
          apiKey: "AIzaSyAaUiaqlHOsgGrwLEk9klXJJW3YVCVQTNY",
          authDomain: "bluefigrest.firebaseapp.com",
          databaseURL: "https://bluefigrest.firebaseio.com",
          projectId: "bluefigrest",
          storageBucket: "bluefigrest.appspot.com",
          messagingSenderId: "129819136267",
          appId: "1:129819136267:web:c8fc01d0c5c2329cb1920e",
          measurementId: "G-TEGY3MTDLQ"
          };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        const database=firebase.firestore();
        
        database.collection("users").doc("<?php echo $_POST['DECID'] ?>").update({
            status:'<?php if($_POST['STATE']=='false'){echo 'true';}else{echo 'false';} ?>'
        });
        database.collection("users").doc("<?php echo $_POST['DECID'] ?>").get().then(function(doc) {
         var state="<?php echo $_POST['STATE']?>";
         if(doc.data()['status'] !=  state){
            window.location.href = "map.php";
         }else{
            window.location.href = "map.php";
         }    
        });
        
      

    });
    // location.reload();


</script>
<?php 

}
?>





</body>

</html>
