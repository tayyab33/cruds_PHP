 <?php 
  include_once "classes/function.php";
     $datas = showbyid($_GET['id']);
     if(!empty($datas)){
     $fetchs = $datas->fetch(PDO::FETCH_ASSOC);
     // print_r($fetchs);
 }
    if(isset($_POST) && submit() === 'POST'){
    	$data = [];
    	$data['Name'] = $_POST['Name'];
    	$data['Phone'] = $_POST['Phone'];
    	$data['Image'] = $_FILES['Image'];
    	$send = update($data);
    	if($send){
    		header("location: show.php");
    	}
    }
 ?>
<form method="post" enctype="multipart/form-data">
	<input type="text" name="Phone" value="<?php echo $fetchs['Phone'] ?? ''; ?>">
	<input type="text" name="Name" value="<?php echo $fetchs['Name'] ?? ''; ?>">
	<input type="file" name="Image"/>
    <img src="<?php echo $fetchs['Image'] ?? '' ?>" alt="image" width="100px" />
	<input type="submit" name="submit">
</form>