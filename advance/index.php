<?php
 include_once "classes/function.php";
 if(!empty($_POST) && submit() === "POST"){
 $data = [];
 $data['Name'] = $_POST['Name'];
 $data['Phone'] = $_POST['Phone'];
 $data['Image'] = $_FILES['Image'];
  $send = insert($data);
}
?>
<button><a href="show.php">View Recored</a></button>
<form method="post" enctype="multipart/form-data">
 <input type="text" name="Name">
 <input type="number" name="Phone"> 
 <input type="file" name="Image"> 
 <input type="submit" name=submit">
</form>
<script>
    
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>