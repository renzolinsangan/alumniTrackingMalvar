<?php
include("config.php");
$user_id = $_SESSION['user_id'];

$sqlCertificateDetails = "SELECT * FROM user_account WHERE user_id = ?";
$stmtCertificateDetails = $db->prepare($sqlCertificateDetails);
$stmtCertificateDetails->execute([$user_id]);
$detailsResult = $stmtCertificateDetails->fetch(PDO::FETCH_ASSOC);

if($detailsResult) {
    $fullName = $detailsResult['fullName'];
    $emailAddress = $detailsResult['emailAddress'];
    $contactNumber = $detailsResult['contactNumber'];
    $strand = $detailsResult['strand'];
    $houseAddress = $detailsResult['houseAddress'];
    $yeargraduated = $detailsResult['yeargraduated'];
    $dateToday = date('Y-m-d');
    $conversionDate = date('F j, Y', strtotime($dateToday));
}
?>