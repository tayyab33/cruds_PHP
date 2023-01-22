<?php

  include_once "database.php";

   

   // mysqli_($create);
  if(isset($_POST['Name']) && $_POST['Phone'] != null && $_FILES['Image'] != null){
  	     $file_type = $_FILES['Image']['type'];
  	     $file_name = $_FILES['Image']['name'];
  	     // print_r($_FILES['Image']);
  	     $path = 'Images/' . $file_name;
  	     $replece = strchr($file_type, "/", 0);
  	     // print_r(__DIR__."/".$path);

  	    if($replece === "/jpeg"){
  	          move_uploaded_file($_FILES['Image']['tmp_name'],__DIR__."/".$path);
  	    	  $sql = "INSERT INTO customers ";
  	    	  $sql .= " ( Phone, Name, Image ) Values ";
  	    	  $sql .= " ( '". $_POST['Phone'] . "', ";
  	    	  $sql .= " '" . $_POST['Name'] . "',";
  	    	  $sql .= " '". $path . "' )";
  	    	  $query = mysqli_query($con, $sql);
  	    	  if($query){
  	    	  	echo "submit data successful";
  	    	  	header("Location: show.php");
  	    	  }
  	    }else{
  	    	echo "it's not jpeg";
  	    }
  }else{
  	return "<script> alert('please add some data')</script>";
  }


?>