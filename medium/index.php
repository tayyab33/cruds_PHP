<?php
include_once "classes/functions.php";
 
 if(!empty($_POST) && request() === "POST"){
   $data = [];
   $data['Name'] = $_POST['Name'];
   $data['Phone'] = $_POST['Phone'];
   $data['Image'] = $_FILES['Image'];
   $send = insert($data);
   if($send){
   	 echo "<script> alert('data inserted') </script>
   	 ";
   }
 }

?>

<button><a href="show.php">show data</a></button>
<form method="post" id="formId" enctype="multipart/form-data">
	<input type="number" name="Phone">
	<input type="text" name="Name">
	<input type="file" name="Image">
    <input type="submit" name="submit">
</form>
  
<script>
	
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>