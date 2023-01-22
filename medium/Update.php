<?php 
include_once "classes/functions.php";
$id = $_GET['id'];
$result = fetchwhere($id);
$fetch = mysqli_fetch_assoc($result);
if(!empty($_POST) && request() === "POST"){
	$data = [];
	$data['id'] = trim($_GET['id']);
    $data['Phone'] = $_POST['Phone'];
    $data['Name'] = $_POST['Name'];
    $data['Image'] = $_FILES['Image'];
    $send = update($data);
    if($send){
    	echo "<script>alert('data update')</script>";
    	header("location: show.php");
    }
}

?>

<form method="post" enctype="multipart/form-data">
	<input type="number" name="Phone" value="<?php echo $fetch['Phone']; ?>">
	<input type="text" name="Name" value="<?php echo $fetch['Name']; ?>">
	<input type="file" name="Image">
	<img width="100px" src="<?php echo $fetch['Image']; ?>">
	<input type="submit" name="sumbit">
</form>