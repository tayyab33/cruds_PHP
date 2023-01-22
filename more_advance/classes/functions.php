<?php
 namespace app\classes;
 use \app\classes\db_con;

 class functions extends db_con
 {
    private $tmp_name = '';
    private $path = '';
    private $name = '';
    public function request(){
      return $_SERVER['REQUEST_METHOD'];
    }
    public function index(){
    	$sql = "SELECT * FROM customers";
    	$fetch  = $this->con->query($sql);
    	return $fetch;
    }
   
    public function insert($data){
      $sql = "INSERT into customers ";
      $sql .= "( Phone , Name , Image) Values ( ";
      $sql .= " :Phone, :Name , :Image )";
      print_r($data);
      $finalsql = $this->con->prepare($sql);
      if(!empty($data) && is_uploaded_file($data['Image']['tmp_name'])){
          $this->name = $data['Image']['name'];
          $this->tmp_name = $data['Image']['tmp_name'];
          $this->path = 'Images/' . $this->name; 
          if(file_exists($this->path)){
            unlink($this->path);
          }
          move_uploaded_file($data['Image']['tmp_name'], $this->path);
      }
      if($finalsql->execute(['Phone' => $data['Phone'], 'Name' => $data['Name'], 'Image' => $this->path])){
         return true;
      }else{
         return false;
      }
   }

   public function delete($data){
      $sql = $this->con->prepare("DELETE FROM customers WHERE Name = :Name");
      if($sql->execute(['Name' => $data['id']])){
          if(file_exists($data['file'])){
            return true;
          }
      }
   }
   public function fetcher($Name){
       $sql = $this->con->prepare("SELECT * FROM customers WHERE Name = :Name");
       if($sql->execute(['Name' => $Name]) >= 1){
         return $sql;
       }else{
         return false;
       }
   }
   public function update($data){
      $sql = "UPDATE customers SET Phone = :Phone, Name = :Name";
      if(!empty($data['Image']) && is_uploaded_file($data['Image']['tmp_name'])){
       $sql .= " ,";
       $sql .= "Image = :Image ";
       $finalsql = $this->con->prepare($sql);
       $this->name = $data['Image']['name'];
       $this->path = 'Images/' . $this->name;
       move_uploaded_file($data['Image']['tmp_name'], $this->path);
    if($finalsql->execute(['Phone' => $data['Phone'], 'Name' => $data['Name'], 'Image' => $this->path])){
         return true;
       }
      }else{
         $finalsql = $this->con->prepare($sql);
         if($finalsql->execute(['Phone' => $data['Phone'], 'Name' => $data['Name']])){
         return true;
       }
      }
   }
 }

?>