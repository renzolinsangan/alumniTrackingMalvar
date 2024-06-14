<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
include("config.php");
$user_id = $_GET['user_id'];

$sqlShowDetails = "SELECT * FROM user_account WHERE user_id = ?";
$stmtShowDetails = $db->prepare($sqlShowDetails);
$stmtShowDetails->execute([$user_id]);
$detailsResult = $stmtShowDetails->fetch(PDO::FETCH_ASSOC);

$strand = $detailsResult['strand'];
$fullName = $detailsResult['fullName'];
$emailAddress = $detailsResult['emailAddress'];
$age = $detailsResult['age'];
$houseAddress = $detailsResult['houseAddress'];
$contactNumber = $detailsResult['contactNumber'];
$gender = $detailsResult['gender'];
$yeargraduated = $detailsResult['yeargraduated'];

if (isset($_POST['editForm'])) {
  $emailAddress = $_POST['emailAddress'];
  $age = $_POST['age'];
  $houseAddress = $_POST['houseAddress'];
  $contactNumber = $_POST['contactNumber'];
  $gender = $_POST['gender'];
  $yeargraduated = $_POST['yeargraduated'];
  $award = $_POST['award'];

  $sqlUpdateDetails = "UPDATE user_account 
                      SET 
                        emailAddress = ?, 
                        age = ?, 
                        houseAddress = ?, 
                        contactNumber = ?, 
                        gender = ?, 
                        yeargraduated = ?, 
                      WHERE user_id = ?";
  $stmtUpdateDetails = $db->prepare($sqlUpdateDetails);
  $stmtUpdateDetails->execute([$emailAddress, $age, $houseAddress, $contactNumber, $gender, $yeargraduated, $user_id]);

    $_SESSION['editDetailsAlert'] = true;
    header("Location: ../index.php");
    exit();
}
?>