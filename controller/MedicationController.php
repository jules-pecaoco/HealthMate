<?php
class MedicationController extends Controller {


  // Function to get all medications
  public function getMedications() {
    $user = $_SESSION['user'];
    $medication = new Medication();
    return $medication->getMedications($user['user_id']);
  }

  // get medication by id
  public function getMedicationById($med_id) {
    $medication = new Medication();
    return $medication->getMedicationById($med_id);
  }

  // Function to create medication
  public function createMedication() {
    if (isset($_POST['med_name']) || isset($_POST['dosage']) || isset($_POST['frequency'])) {
      $user = $_SESSION['user'];
      $med_name = $_POST['med_name'];
      $dosage = $_POST['dosage'];
      $frequency = $_POST['frequency'];
      $interval = $_POST['interval'];
      $start_time = $_POST['start_time'];
      $medication = new Medication();
      $medication->createMedication($med_name, $user['user_id'], $dosage, $frequency, $interval, $start_time);
      //Swal
      echo "<script>
        Swal.fire({
          title: 'Medication Added!',
          text: 'Your medication has been added successfully!',
          icon: 'success',
          confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'nutrimed';
            }
        });
      </script>";
    }
  }

  // Function to update medication
  public function updateMedication() {
    if (isset($_GET['med_id'])) {
      $med_id = $_GET['med_id'];
      $med_name = $_POST['med_name'];
      $dosage = $_POST['dosage'];
      $frequency = $_POST['frequency'];
      $interval = $_POST['interval'];
      $start_time = $_POST['start_time'];
      $medication = new Medication();
      $medication->updateMedication($med_id, $med_name, $dosage, $frequency, $interval, $start_time);
      //Swal
      echo "<script>
        Swal.fire({
          title: 'Medication Updated!',
          text: 'Your medication has been updated successfully!',
          icon: 'success',
          confirmButtonText: 'OK'
        }).then((result) => {
          if (result.isConfirmed) {
              window.location.href = 'nutrimed';
          }
        });
      </script>";
    }
  }

  // Function to delete medication
  public function deleteMedication() {
    if (isset($_GET['med_id'])) {
      $med_id = $_GET['med_id'];
      $medication = new Medication();
      $medication->deleteMedication($med_id);
      //Swal
      echo "<script>
        Swal.fire({
          title: 'Medication Deleted!',
          text: 'Your medication has been deleted successfully!',
          icon: 'success',
          confirmButtonText: 'OK'
        }).then((result) => {
          if (result.isConfirmed) {
              window.location.href = 'nutrimed';
          }
        });
      </script>";
    }
  }
}
