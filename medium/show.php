<?php 
include_once 'classes/functions.php';
if(isset($_GET['id'])){
	$data = [];
	$data['Name'] = trim($_GET['id']);
	$data['Files'] = trim($_GET['Files']);
	$send = delete($data);
}
?>
<button > <a href="index.php">INsert new data</a></button>
<table border="1">
	<tr>
		<th>Name</th>
		<th>Phone</th>
		<th>Image</th>
		<th>Action</th>
		<th>Action</th>
	</tr>

	<?php $data = fetch(); if(!empty($data)){ while($rc = mysqli_fetch_assoc($data)){?>
	<tr>
		<td><?php echo $rc['Name']; ?></td>
		<td><?php echo $rc['Phone']; ?></td>
		<td><img width="100" src="<?php echo $rc['Image']; ?>"/></td>
		<td><a href="show.php?id=<?php echo $rc['Name']; ?>&Files=<?php echo $rc['Image']; ?>">Delete</a></td>
		<td><a href="Update.php?id=<?php echo $rc['Name']; ?>">Update</a></td>

	</tr>
	<?php } }?>
</table>