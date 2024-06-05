<?php

// Connect to the finalproject database
$host = 'localhost';
$db   = 'finalproject';
$user = 'root';
$pass = 'Lisnaskea2024!';

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

return $mysqli;

//
class connect{

   public $host = "localhost";
   public $dbname = "finalproject";
   public $username = "root";
   public $password = "Lisnaskea2024!";

   public $conn;

   function __construct(){
       $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
       if($this->conn->connect_error){
           die("Connection failed");
       }
   }

   function select_all($contact){

         $sql = "SELECT * FROM $contact";
         $result = $this->conn->query($sql);
         return $result;

   }

   function select($contact, $id){

        $sql = "SELECT * FROM $contact WHERE id = $id";
        $result = $this->conn->query($sql);
        return $result;

   }

   function insert($query){
    if($this->conn->query($query) === TRUE){
        echo '<script>alert("We will contact you soon through your Email Address!")</script>';
   }else{
       echo $this->conn->error;
   }
   }
}
