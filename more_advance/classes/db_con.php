<?php 
 namespace app\classes;

 class db_con{

	private $dns = 'mysql:host=localhost;dbname=crud';
	private $user = 'root';
	private $pass = '';

 	 public $con = '';
 	 public function __construct(){
           $this->con = new \PDO($this->dns,$this->user,$this->pass);
 	 }
 }



?>