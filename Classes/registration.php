<?php
class Registration {
  private $_database,
          $_username,
          $_email,
          $_password,
          $_response;

  public function __construct($data, $database) {
    $this->_database = $database;

    if(self::setUsername($data['username'])) {
      if(self::setEmail($data['email'])) {
        if(self::setPass($data['password'], $data['password2'])) {
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

  public function username():string {
    return $this->_username;
  }

  public function email():string {
    return $this->_email;
  }

  public function password():string {
    return $this->_password;
  }

  public function response():string {
    return $this->_response;
  }

  public function setUsername($username):bool {
    if(strlen($username) > 2 && strlen($username) <= 20) {
      $this->_username = $username;
      return true;
    }
    return false;
}

  public function setEmail($email):bool {
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

  public function setPass($pass, $pass2):bool {
    if($pass === $pass2) {
      $this->_pass = password_hash($pass, PASSWORD_DEFAULT);
      return true;
    }

    return false;
  }

  public function createAccount():void {
    $req_create_player = $this->_database->prepare('INSERT INTO users (username, password, email) VALUES (?, ?, ?)');
    $req_create_player->execute(array($this->_username, $this->_pass, $this->_email));

    $this->_response = "Your account has been created ! Confirm it now !";
  }
}
?>
