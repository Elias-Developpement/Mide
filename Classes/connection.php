<?php
class Connection {
  private $_database,
          $_id,
          $_username,
          $_password,
          $_email,
          $_response;

  public function __construct($data, $database) {
    $this->_database = $database;
    $this->_username = $data['username'];
    $this->_password = $data['password'];

    if(self::getConnection()) {
      $_SESSION['id'] = $this->_id;
      $_SESSION['username'] = $this->_username;

      header('Location: index.php');
    }
    else {
      $this->_response = "Username or password incorrect !";
    }
  }

  public function username():string {
    return $this->_username;
  }

  public function password():string {
    return $this->_password;
  }

  public function response():string {
    return $this->_response;
  }

  public function getConnection():bool {
    $req_check_username_exist = $this->_database->prepare('SELECT * FROM users WHERE username = ?');
    $req_check_username_exist->execute(array($this->_username));

    $check_username_exist = $req_check_username_exist->fetch();

    if($check_username_exist) {
      if(password_verify($this->_password, $check_username_exist['password'])) {
        $this->_id = $check_username_exist['id'];
        $this->_email = $check_username_exist['email'];

        return true;
      }
    }

    return false;
  }
}
?>
