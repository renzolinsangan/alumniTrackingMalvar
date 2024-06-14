<?php
session_start();
include("config.php");

if (isset($_POST['submitButton'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  $fullName = $_POST['name'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];
  $houseaddress = $_POST['houseaddress'];
  $email = $_POST['email'];
  $contactnumber = $_POST['contactnumber'];
  $strand = $_POST['strand'];
  $yearGraduated = $_POST['yearGraduated'];

  $sqlAlumniRegistration = "INSERT INTO user_account (username, password, fullName, gender, age, houseAddress, emailAddress, contactNumber,
  strand, yeargraduated, usertype) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'alumni')";
  $stmtAlumniRegistration = $db->prepare($sqlAlumniRegistration);
  $result = $stmtAlumniRegistration->execute([
    $username,
    $hashedPassword,
    $fullName,
    $gender,
    $age,
    $houseaddress,
    $email,
    $contactnumber,
    $strand,
    $yearGraduated,
  ]);

  if($result) {
    $_SESSION['showRegistrationAlert'] = true;
    header("Location: ../index.php");
    exit();
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}
?>