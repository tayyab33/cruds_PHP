 <?php
  include_once "database.php";
  $sql = "SELECT * FROM customers WHERE Name = '" . trim($_GET['id']) . "'";
  $query = mysqli_query($con, $sql);
  $fetch = mysqli_fetch_assoc($query);
 ?>
<form method="post" action="U_update.php?id=<?php echo trim($_GET['id']); ?>" enctype="multipart/form-data">
	<input type="number" name="Phone" value="<?php echo $fetch['Phone']; ?>">
	<input type="text" name="Name" value="<?php echo $fetch['Name']; ?>">
	<img src="<?php echo $fetch['Image']; ?>" width="100px">
	<input type="file" name="Image">
	<input type="submit" name="submit">
</form>