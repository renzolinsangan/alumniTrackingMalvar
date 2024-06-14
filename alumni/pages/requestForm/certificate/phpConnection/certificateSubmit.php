<?php
include("config.php");

if (isset($_POST['submitButton'])) {

  $user_id = $_SESSION['user_id'];
  $strand = $_POST['strand'];
  $fullname = $_POST['fullname'];
  $emailaddress = $_POST['emailAddress'];
  $contactnumber = $_POST['contactNumber'];
  $houseaddress = $_POST['houseAddress'];
  $date = $_POST['date'];
  $yeargraduated = $_POST['yeargraduated'];
  $process = $_POST['process'];
  $purpose = $_POST['purpose'];
  $status = 'not approve';

  $sqlCertificateSubmit = "INSERT INTO certificate (user_id, strand, fullName, emailAddress, contactNumber, 
  houseAddress, date, yeargraduated, process, purpose, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stmtCertificateSubmit = $db->prepare($sqlCertificateSubmit);
  $stmtCertificateSubmit->execute([$user_id, $strand, $fullname, $emailaddress, $contactnumber, $houseaddress, $date, $yeargraduated, $process, $purpose, $status]);
  
  $_SESSION['showSweetAlert'] = true;
  header("Location: ../index.php");
  exit();
}
?>