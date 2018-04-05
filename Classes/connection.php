<?php
class Connection {
  private $_database,
          $_id,
          $_username,
          $_password,
          $_response;

  public function __construct($data, $database) {
    $this->_database = $database;
    $this->_username = $data['username'];
    $this->_password = $data['password'];

    if(self::getConnection()) {
      $_SESSION['id'] = $this->_id;
      $_SESSION['username'] = $this->_username;
      $_SESSION['email'] = $this->_email;

      header('Location: index.php');
    }
    else {
      $this->_response = "Username or password incorrect !";
    }
  }

  public function username() {
    return $this->_username;
  }

  public function password() {
    return $this->_password;
  }

  public function response() {
    return $this->_response;
  }

  public function getConnection() {
    $req_check_username_exist = $this->_database->prepare('SELECT * FROM users WHERE username = ?');
    $req_check_username_exist->execute(array($this->_username));

    $check_username_exist = $req_check_username_exist->fetch();

    if($check_username_exist) {
      if(password_verify($this->_password, $check_username_exist['password'])) {
        $this->_id = $check_username_exist['id'];

        return true;
      }
    }

    return false;
  }
}
?>
