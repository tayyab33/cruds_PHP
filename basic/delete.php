<?php
  if(isset($_GET['id'])){
  	  $Name = trim($_GET['id']);
  	 include_once "database.php";
     $sql = "DELETE FROM customers ";
     $sql .= "where Name='".$Name."'" ;
     $query = mysqli_query($con, $sql);
     if($query){
            header("Location: show.php");
     }
  }


?>