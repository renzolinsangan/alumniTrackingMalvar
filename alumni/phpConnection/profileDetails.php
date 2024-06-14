<?php
include("config.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../user_login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sqlProfileDetails = "SELECT * FROM user_account WHERE user_id = ?";
$stmtProfileDetails = $db->prepare($sqlProfileDetails);
$stmtProfileDetails->execute([$user_id]);
$result = $stmtProfileDetails->fetch(PDO::FETCH_ASSOC);

if($result) {
    $strand = strtoupper($result['strand']);
    $fullName = strtoupper($result['fullName']);
    $emailAddress = $result['emailAddress'];
    $age = $result['age'];
    $address = ucfirst($result['houseAddress']);
    $contactNumber = $result['contactNumber'];
    $gender = ucfirst($result['gender']);
    $yeargraduated = $result['yeargraduated'];
}
?>