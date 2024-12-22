<?php
class Medication {

  private $conn;

  function __construct() {
    $this->conn = (new Database())->getConnection();
  }

  function getMedications($user_id) {
    $sql = "SELECT * FROM medications WHERE user_id = :user_id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  function getMedicationById($med_id) {
    $sql = "SELECT * FROM medications WHERE med_id = :med_id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':med_id', $med_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch();
  }

  function createMedication($med_name, $user_id, $dosage, $frequency, $interval, $start_time) {
    $sql = "INSERT INTO medications (med_name, user_id, dosage, frequency, med_interval, start_time) VALUES (:med_name, :user_id ,:dosage, :frequency, :interval, :start_time)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':med_name', $med_name, PDO::PARAM_STR);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':dosage', $dosage, PDO::PARAM_STR);
    $stmt->bindParam(':frequency', $frequency, PDO::PARAM_STR);
    $stmt->bindParam(':interval', $interval, PDO::PARAM_INT);
    $stmt->bindParam(':start_time', $start_time, PDO::PARAM_STR);
    $stmt->execute();
  }


  function updateMedication($med_id, $med_name, $dosage, $frequency, $interval, $start_time) {
    $sql = "UPDATE medications SET med_name = :med_name, dosage = :dosage, frequency = :frequency, med_interval = :interval, start_time = :start_time WHERE med_id = :med_id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':med_id', $med_id, PDO::PARAM_INT);
    $stmt->bindParam(':med_name', $med_name, PDO::PARAM_STR);
    $stmt->bindParam(':dosage', $dosage, PDO::PARAM_STR);
    $stmt->bindParam(':frequency', $frequency, PDO::PARAM_STR);
    $stmt->bindParam(':interval', $interval, PDO::PARAM_INT);
    $stmt->bindParam(':start_time', $start_time, PDO::PARAM_STR);
    $stmt->execute();
  }


  function deleteMedication($med_id) {
    $sql = "DELETE FROM medications WHERE med_id = :med_id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':med_id', $med_id, PDO::PARAM_INT);
    $stmt->execute();
  }
}
