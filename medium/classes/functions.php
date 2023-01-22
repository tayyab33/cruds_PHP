<?php

include_once "db_Imp.php";

// check if data is post or get
function request()
{
	 return $_SERVER['REQUEST_METHOD'];
}

// insert function 
function insert($data){
	$sql = "INSERT INTO customers ";
	$sql .= " (Phone, Name, Image) ";
	$sql .= " values ( ";
	$sql .= "'" . $data['Phone'] . "',";
	$sql .= "'" . $data['Name'] . "'";
	$filename = $data['Image']['name'];
	$filetmp = $data['Image']['tmp_name'];
	$filetype = $data['Image']['type'];
	$jpeg = strchr($filetype, "/", 0);
	if($jpeg === '/jpeg' && is_uploaded_file($data['Image']['tmp_name'])) {
		$path = "Images/". $filename;
		move_uploaded_file($filetmp, $path);
		$sql .= ",";
        $sql .= "'" . $path . "' )";
	}
	$query = con->query($sql);
	if($query){
		return true;
	}else{
		return false;
		die();
	}
}

//fetch all data here
function fetch(){
   $sql = "SELECT * FROM customers";
   $query = con->query($sql);
    if(mysqli_num_rows($query) > 0){
    	return $query;
    }
}

function fetchwhere($name){
	$sql = "SELECT * FROM customers WHERE Name = '".  trim($name) .  "'";
	$query = con->query($sql);
	return $query;
}
// update funciton here
function update($data){
	// if(!empty($data)){
	  $sql = "UPDATE customers SET ";
 	  $sql .= " Phone = '" . $data['Phone'] . "',";
 	  $sql .= " Name ='" . $data['Name'] . "'";
      $name = $data['Image']['name'];
      $filetype = $data['Image']['type'];
      $filetmp = $data['Image']['tmp_name'];
      $path = "Images/" . $name;
 if(isset($data['Image']) && is_uploaded_file($data['Image']['tmp_name'])){
      if(pathinfo($name, PATHINFO_EXTENSION) === 'jpg'){
        $sql .= ",";
        $sql .= " Image ='" . $path ."' ";
        move_uploaded_file($filetmp, $path);
      }
  }
      $sql .= "where Name = '" . $data['id'] . "'";
      $query = con->query($sql);
      if($query){
      	return true;
      }else{
      	return false;
      }
 }

 function delete($data){
    $sql = "DELETE FROM customers WHERE Name ='". $data['Name'] ."'";
    if(!empty($data['Files'] && file_exists($data['Files']))){
       unlink($data['Files']);
    }
    
    if(con->query($sql)){
    	header('location: show.php');
    }
 }
// }