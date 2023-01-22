<?php 
 include_once 'connect.php';


 function submit(){
 	return $_SERVER['REQUEST_METHOD'];
 }
 function insert($data){
 	if(!empty($data) && is_uploaded_file($data['Image']['tmp_name'])){
   $sql = con->prepare("INSERT INTO customers (Phone, Name, Image) values (:Phone , :Name, :Image)");
   $sql->bindValue('Phone',$data['Phone']);
   $sql->bindValue('Name',$data['Name']);
   $file_name = $data['Image']['name'];
   $file_tmp = $data['Image']['tmp_name'];
   $path = "Images/". $file_name;
   move_uploaded_file($file_tmp, $path);
   $sql->bindValue('Image',$path);

   if($sql->execute()){
   	return "success";
   }else{
   	return "unsuccessful";
   }
}
 }
 function show(){
    $sql = con->prepare("SELECT * FROM customers");
    if($sql){
       return $sql;
    }
 }
 function showbyid($data){
  if(!empty(trim($data))){
   $sql = con->prepare("SELECT * FROM customers WHERE Name =:Name");
   $sql->bindValue('Name', trim($data));
   if($sql->execute()){
     return $sql;
   }
 }
 }
 function delete($data){
  $sql = con->prepare("DELETE FROM customers WHERE Name =:Name");
  $sql->bindValue('Name' ,$data['Name']);
  if(file_exists($data['Image'])){
    unlink($data['Image']);
  }
  if($sql->execute()){
    return true;
  }
 }
 function update($data){
  $sql = "UPDATE customers SET Phone = :Phone, Name = :Name";
  if(!empty($data['Image']) && is_uploaded_file($data['Image']['tmp_name'])){
    $sql .= ",";
    $sql .= " Image = :Image";
    $sql = con->prepare($sql);
    $name = $_FILES['Image']['name'];
    $tmp_name = $_FILES['Image']['tmp_name'];
    $path = "Images/". $name;
    move_uploaded_file($_FILES['Image']['tmp_name'], $path);
   if($sql->execute([ 'Phone' => $data['Phone'], 'Name' => $data['Name'], 'Image' => $path])){
      return true;
   }
  }else{
   $sql = con->prepare($sql);
   $sql->execute([ 'Phone' => $data['Phone'], 'Name' => $data['Name'] ]);
   return true;
 }
 }
 ?>