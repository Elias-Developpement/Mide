<?php
class Registration {
  private $_database,
          $_username,
          $_email,
          $_pass,
          $_response;

  public function __construct($data, $database) {
    $this->_database = $database;

    if(self::setUsername($data['username'])) {
      if(self::setEmail($data['email'])) {
        if(self::setPass($data['pass'], $data['pass2'])) {
          self::createAccount();
        }
        else {
          $this->_response = "Both passwords do not match !";
        }
      }
      else {
        $this->_response = "This email is already in use !";
      }
    }
    else {
      $this->_response = "Your username must be between 3 and 20 characters long !";
    }
  }

  public function username() {
    return $this->_username;
  }

  public function email() {
    return $this->_email;
  }

  public function pass() {
    return $this->_pass;
  }

  public function pass2() {
    return $this->_pass2;
  }

  public function response() {
    return $this->_response;
  }

  public function setUsername($username) {
    if(strlen($username) > 2 && strlen($username) <= 20) {
      $this->_username = $username;
      return true;
    }
    return false;
}

  public function setEmail($email) {
    $req_check_email_exist = $this->_database->prepare('SELECT * FROM users WHERE email = ?');
    $req_check_email_exist->execute(array($email));

    $check_email_exist = $req_check_email_exist->fetch();

    if(!$check_email_exist) {
      if(preg_match('/[\w.-]+@[\w.-]+\.[a-z]{2,6}/', $email)) {
        $this->_email = $email;
        return true;
      }
    }

    return false;
  }

  public function setPass($pass, $pass2) {
    if($pass === $pass2) {
      $this->_pass = password_hash($pass, PASSWORD_DEFAULT);
      return true;
    }

    return false;
  }

  public function createAccount() {
    $req_create_player = $this->_database->prepare('INSERT INTO membres (username, email, pass) VALUES (?, ?, ?)');
    $req_create_player->execute(array($this->_username, $this->_email, $this->_pass));

    $this->_response = "Your account has been created ! Confirm it now !";
  }
}
?>
