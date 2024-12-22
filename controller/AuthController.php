<?php
class AuthController extends Controller {
  private $User;

  function __construct() {
    $this->User = $this->model('User');
  }



  function loginUser() {
    if (isset($_POST['email']) || isset($_POST['password'])) {

      $email = $_POST['email'];
      $password = $_POST['password'];

      $user = $this->User->getUserByEmail($email);

      if ($user) {
        if (password_verify($password, $user['password'])) {
          $_SESSION['user'] = $user;

          echo "<script>window.location.href = 'home/dashboard';</script>";
        } else {
          echo "<script>Swal.fire({
            title: 'Invalid password',
            text: 'Please try again',
            icon: 'error',
          });</script>";
        }
      } else {
        echo "<script>Swal.fire({
          title: 'User not found',
          text: 'Please register an account',
          icon: 'error',
        });</script>";
      }
    }
  }



  function registerUser() {
    if (isset($_POST['name']) || isset($_POST['email']) || isset($_POST['phone']) || isset($_POST['password'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $password = $_POST['password'];
      $health_goal = $_POST['health_goal'];

      $user = $this->User->getUserByEmail($email);

      if ($user) {
        echo "<script>
                Swal.fire({
                    title: 'Email already exists',
                    text: 'Please use a different email',
                    icon: 'error',
                });
            </script>";
      } else {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $this->User->createUser($name, $email, $phone, $password, $health_goal);
        echo "<script>
                Swal.fire({
                    title: 'Account created',
                    text: 'You can now login',
                    icon: 'success',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'login';
                    }
                });
            </script>";
      }
    }
  }
}
