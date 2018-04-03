<?php
class Configuration {
  private $_database;

  public function __construct() {
    session_start();

    try
    {
    	$this->_database = new PDO('mysql:host=localhost;dbname=DATABASE_NAME;charset=utf8', 'USERNAME', 'PASSWORD');
    }
    catch (Exception $e)
    {
            die("Error : Can't connect to the database !");
    }
  }

  public function database() {
    return $this->_database;
  }
}
?>
