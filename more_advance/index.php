<?php 
  require_once __DIR__."/vendor/autoload.php";
  use \app\classes\functions;
  $instance = new functions;
   if(!empty($_GET['id'])){
       $data = [];
       $data['id'] = $_GET['id'];
       $data['file'] = $_GET['file'];
       $send = $instance->delete($data);
       if($send){
        echo "<script> alert('delete successful') </script>";
        header('location: index.php');

       }
   }
 ?>
 <button><a href="Insert.php">Insert Record</a></button>
 <table>
   <tr>
     <th>Phone</th>
     <th>Name</th>
     <th>Image</th>
   </tr>
   <?php  $result = $instance->index(); 
    while($fetch = $result->fetch(PDO::FETCH_ASSOC)){?>
   <tr>
     <td><?php echo $fetch['Phone']; ?></td>
     <td><?php echo $fetch['Name']; ?></td>
     <td><img src="<?php echo $fetch['Image']; ?>" alt="imag" width="100px"></td>
     <td><a href="index.php?id=<?php echo $fetch['Name']; ?>&file=<?php echo $fetch['Image']; ?>">Delete</a></td>
     <td><a href="update.php?id=<?php echo $fetch['Name']; ?>">Update</a></td>

   </tr>
 <?php } ?>
 </table>