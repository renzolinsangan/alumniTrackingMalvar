<?php
session_start();
include("config.php");

if (isset($_POST['submitButton'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  $email = $_POST['email'];

  $sqlAdminRegistration = "INSERT INTO user_account (username, password, emailAddress, usertype) VALUES (?, ?, ?, 'administrator')";
  $stmtAdminRegistration = $db->prepare($sqlAdminRegistration);
  $result = $stmtAdminRegistration->execute([$username, $hashedPassword, $email]);

  if($result) {
    $_SESSION['showRegistrationAlert'] = true;
    header("Location: ../index.php");
    exit();
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}
?>