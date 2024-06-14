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
  $document = $_POST['document'];
  $purpose = $_POST['purpose'];
  $status = 'not approve';

  $sqlForm137Submit = "INSERT INTO otherdocuments (user_id, strand, fullName, emailAddress, contactNumber, 
  houseAddress, date, yeargraduated, process, otherdocument, purpose, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stmtForm137Submit = $db->prepare($sqlForm137Submit);
  $stmtForm137Submit->execute([$user_id, $strand, $fullname, $emailaddress, $contactnumber, $houseaddress, $date, $yeargraduated, $process, $document, $purpose, $status]);

  $_SESSION['showSweetAlert'] = true;
  header("Location: ../index.php");
  exit();
}
?>