<?php
class Database {
  public static $instance;
  public static $table = 'myunsplash';

  private function __construct() {
    $host = 'mysql.agencia.vip';
    $dbname = 'bancokuririn';
    $user = 'danielkurirn';
    $pass = 'kuririn@2022';

    try {
      self::$instance = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
      self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      self::$instance->exec('SET NAMES utf8');
    } catch (PDOException $e) {
      die("erro");
    }
  }

  public static function conexao() {
    if (!isset(self::$instance))
      new Database;

    return self::$instance;
  }
}
