<?php
 include_once "./db/db.php";

 const con = new PDO(DNS,DB_USER,DB_PASS);
 con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


?>