<?php

class Database
{
  private $db;
  private $statement;

  public function __construct()
  {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
    $option = [
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    try {
      $this->db = new PDO($dsn, DB_USER, DB_PASS, $option);
    } catch (PDOException $err) {
      die($err->getMessage());
    }
  }

  public function query($q)
  {
    $this->statement = $this->db->prepare($q);
    return $this;
  }

  public function execute()
  {
    $this->statement->execute();
    return $this;
  }

  public function resultSet()
  {
    return $this->statement->fetchAll(PDO::FETCH_OBJ);
  }

  public function single()
  {
    return $this->statement->fetch(PDO::FETCH_OBJ);
  }
}
