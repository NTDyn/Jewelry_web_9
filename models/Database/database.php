<?php
  class connectDB{
    public $conn ;
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "jewelry";
    
    function connectDB(){
      $result = false ;
      if($this->conn = mysqli_connect($this->servername, $this->username, $this->password,$this->dbname, 3306))
        $result = true;
      mysqli_select_db($this->conn, $this->dbname);
      mysqli_query($this->conn, "SET NAMES 'utf8'");
  
      if ($this->conn->connect_error) {
        die("Connection failed: " . mysqli_connect_error());
        
      } 
      return $result;
      
    }
    
  
    
  
  
  }
  

 


?>