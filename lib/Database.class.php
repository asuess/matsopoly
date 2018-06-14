<?php

class Database extends PDO {
  private static $_instance;
  private static $dsn = 'mysql:dbname=webeng;host=127.0.0.1';
  private static $user = "root";
  private static $password = "";
  /*
  Get an instance of the Database
  @return Instance
  */
  public static function getInstance() {
    if(!self::$_instance) { // If no instance then make one
      self::$_instance = new Database(self::$dsn, self::$user, self::$password);
    }
    return self::$_instance;
  }
  /*
  Close connection to the database
  @void
  */
  public static function close() {
    self::$_instance=null;
  }
}