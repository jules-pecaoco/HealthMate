<?php
class User {


  private $conn;

  function __construct() {
    $this->conn = (new Database())->getConnection();
  }

  

  function getUserByEmail($email) {
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    return $stmt->fetch();
  }


  function createUser($name, $email, $phone, $password, $health_goal) {
    $sql = "INSERT INTO users (name, email, number  , password, health_goal) VALUES (:name, :email, :phone, :password, :health_goal)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->bindParam(':health_goal', $health_goal, PDO::PARAM_STR);
    $stmt->execute();
  }
}
