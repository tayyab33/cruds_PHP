 <?php 
    include_once "database.php";
    $sql = "SELECT * FROM customers";
    $query = mysqli_query($con, $sql);
  ?>
  <button><a href="index.php">Create New</a></button>
<table border="1">

	   <tr>
	    <th>Name</th>
	    <th>Phone</th>
	    <th>Image</th>
	   </tr>
	 
	   	<?php while($fetch = mysqli_fetch_assoc($query)) { ?>
	   		  <tr>
	   	<td> <?php echo $fetch['Name']; ?></td>
	   	<td> <?php echo $fetch['Phone']; ?></td>
	   	<td><img src="<?php echo $fetch['Image']; ?>" width="100px" alt="image" /></td>
	   	<td> <a href="delete.php?id= <?php echo $fetch['Name']; ?> " >Delete</a></td>
	   	<td> <a href="Update.php?id= <?php echo $fetch['Name']; ?> " >Update</a></td>
              </tr>
	   	<?php } ?>
	 
	   	
	
</table>