<?php 

class LoginContr extends Login {

  private $username;
  private $pwd;

  public function __construct($username, $pwd)
  {
    $this->username = $username;
    $this->pwd = $pwd;
  }

  private function checkEmptyInput() {
    return !(empty($this->username) || empty($this->pwd));
  }

  public function loginUser() {
    try {
      // Validate inputs
      if (!$this->checkEmptyInput()) {
        throw new Exception("Empty input fields");
      }

      // Attempt login
      $this->getUser($this->username, $this->pwd);

    } catch (Exception $e) {
      // Redirect with an error message
      header("location: ../login.php?error=" . urlencode($e->getMessage()));
      exit();
    }
  }
}