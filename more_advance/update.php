<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>update</title>
</head>
<body>
	<?php 
	   require_once __DIR__."/vendor/autoload.php";
	   use \app\classes\functions;
       $instance = new functions();
       if(!empty($_GET['id'])){
          $send = $instance->fetcher($_GET['id']);
          if(!empty($send)){
          	$fetch = $send->fetch(PDO::FETCH_ASSOC); 
          }
       }else{
       	header('location: index.php');
       }
       if(!empty($_POST) && $instance->request() === "POST"){
       	$data = [];
       	$data['id'] = $_GET['id'];
       	$data['Name'] = $_POST['Name'];
       	$data['Phone'] = $_POST['Phone'];
       	$data['Image'] = $_FILES['Image'];
       	$send = $instance->update($data);
       }

	 ?>
    <form method="post" enctype="multipart/form-data">
    	<input type="file" name="Image">
    	<input type="text" name="Name" value="<?php echo $fetch['Name'] ?>">
    	<input type="number" name="Phone" value="<?php echo $fetch['Phone'] ?>">
    	<img src="<?php echo $fetch['Image'] ?>" alt="Image" width="100px"/>
    	<input type="submit" name="submit">
    </form>

</body>
</html>