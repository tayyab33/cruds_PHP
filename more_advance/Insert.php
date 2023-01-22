<?php
    require_once __DIR__.'/vendor/autoload.php';
    use \app\classes\functions;
    $instance = new functions();
    if(isset($_POST) && $instance->request() === "POST"){
    	 $data  = [];
    	 $data['Phone'] = $_POST['Phone'];
    	 $data['Name'] = $_POST['Name'];
    	 $data['Image'] = $_FILES['Image'];

        $send = $instance->insert($data);
    }
?>
<button><a href="index.php">View data</a></button>
<form method="post" enctype="multipart/form-data">
	<input type="number" name="Phone">
	<input type="text" name="Name">
	<input type="file" name="Image"> 
	<input type="submit" name="submit">
</form>