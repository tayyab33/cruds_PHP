<?php
include_once "database.php";
  if(isset($_FILES['Image'])) {
  	 $id= trim($_GET['id']);
     $sql1 = "SELECT * FROM customers where Name = '" .$id. "'";
     $query = mysqli_query($con, $sql1);
     $fetch = mysqli_fetch_assoc($query);
      if(file_exists($fetch['Image'])){
  	     unlink($fetch['Image']);
  	   }
  	 $name =  $_FILES['Image']['name'];
  	 $type = $_FILES['Image']['type'];

  	 $path = "Images/". $name;
  	 $jpeg = strchr($type, "/", 0);
  	 $sql = "Update customers set ";
  	 $sql .= " Phone = '" . $_POST['Phone'] . "',";
  	 $sql .= " Name = '" . $_POST['Name'] . "'";
  	
     if(is_uploaded_file($_FILES["Image"]['tmp_name'])){
  	 if($jpeg === "/jpeg"){
  	 	move_uploaded_file($_FILES['Image']['tmp_name'], $path);
  	 	 $sql .= ",";
  	 	 $sql .= " Image = '" . $path . "'";
  	 }
  	}
  	   $sql .= "Where Name = '". $id . "'";
  	   echo $sql;
  	 $query = mysqli_query($con, $sql);
     if($query){
     	 header("location: show.php");
     }
  }
?>