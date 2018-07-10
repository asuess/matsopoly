<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Database extends PDO {
  private static $_instance;
  private static $dsn = 'mysql:dbname=matsopoly;host=localhost';
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