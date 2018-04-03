<?php
class AdvancedConfiguration {
  private $_database;

  public function __construct($host, $database_name, $username, $password) {
    session_start();

    try
    {
    	$this->_database = new PDO('mysql:host=' . $host .';dbname=' . $database_name . ';charset=utf8', $username, $password);
    }
    catch (Exception $e)
    {
            die("Error : Can't connect to the database !");
    }
  }

  public function database():pdo {
    return $this->_database;
  }
}
?>
