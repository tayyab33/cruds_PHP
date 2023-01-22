<?php include_once  "classes/function.php" ;
 if(!empty($_GET['id'])){
 	$datas = [];
 	$datas['Name'] = $_GET['id'];
 	$datas['Image'] = $_GET['File'] ?? '';
 	$send = delete($datas);
 	if($send){
 		echo "<script> alert('record delete successful') </script>";
 	}
 }

?>
<button><a href="index.php">insert new</a></button>
<table>
	<tr>
		<th>Phone</th>
		<th>Name</th>
		<th>Image</th>
		<th>Action</th>
	</tr>
	<?php $data = show();
	 $data->execute(); 
	 while ($fetch = $data->fetch(PDO::FETCH_ASSOC)) {
	 ?>
	<tr>
		<td>
			<?php echo $fetch['Phone']; ?>
		</td>
		<td>
			<?php echo $fetch['Name']; ?>
		</td>
		<td>
			<img src="<?php echo $fetch['Image']; ?>" alt="Image" width="100px" />
		</td>
		<td>
			<a href="show.php?id=<?php echo $fetch['Name']; ?>&File=<?php echo $fetch['Image']; ?>">Delete</a><br />
			<a href="update.php?id=<?php echo $fetch['Name']; ?>">Update</a>
		</td>
	</tr>
<?php } ?>
</table>