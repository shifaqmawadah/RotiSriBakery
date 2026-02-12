<?php

class Dbhandler {
  private $host;
  private $user;
  private $pass;
  private $db;
  public $conn;

  public function __construct() {
    try {
      $this->connect();
    } catch (Exception $e) {
      echo "
        <script>
          alert('Database Connection failed: " . addslashes($e->getMessage()) . "');
        </script>
      ";
    }
  }

  private function connect() {
    $this->host = "localhost";
    $this->user = "root";
    $this->pass = "";
    $this->db = "ogtech";

    $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
    
    if ($this->conn->connect_error) {
      throw new Exception("Connection failed: " . $this->conn->connect_error);
    }
    return $this->conn;
  }

  public function executeQuery($sql) {
    try {
      $result = $this->conn->query($sql);
      if (!$result) {
        throw new Exception("SQL Query failed: " . $this->conn->error);
      }
      return $result;
    } catch (Exception $e) {
      echo "
        <script>
          alert('SQL Error: " . addslashes($e->getMessage()) . "');
        </script>
      ";
      return false;
    }
  }

  public function conn() {
    try {
      $this->conn = new mysqli("127.0.0.1", "root", "", "ogtech");
      if ($this->conn->connect_error) {
        throw new Exception("Connection failed: " . $this->conn->connect_error);
      }
      return $this->conn;
    } catch (Exception $e) {
      echo "
        <script>
          alert('Database Connection failed: " . addslashes($e->getMessage()) . "');
        </script>
      ";
    }
  }
}
?>