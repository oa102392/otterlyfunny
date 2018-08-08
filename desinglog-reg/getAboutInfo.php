<?php

class aboutInfo{

    private $dbHost     = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "Altav1dra";
    private $dbName     = "jk";
    private $userTbl    = "AboutInfo";
  
    public function __construct(){
        if(!isset($this->db)){
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }


  public function getAboutInfo($id) {
      
      $sql = " 
            SELECT *
              FROM   AboutInfo
              WHERE id = :id
          ";
      $stmt = $dbConn -> prepare($sql);
      $stmt -> execute(array(":id"=>$id));
      return $stmt->fetch();
  }
  }


  function getCategories() {
  $dbConn = getDatabaseConnection();
        $sql = "SELECT CategoryID, CategoryName FROM JokeCategories ORDER BY CategoryName";
  $stmt = $dbConn -> prepare($sql);
  $stmt -> execute();
  return $stmt -> fetchAll();
  }

