<?php
include("config.php");

// FOR CERTIFICATE OF GRADUATION
$sqlCertificateData = "SELECT * FROM certificate ORDER BY date DESC";
$stmtCertificateData = $db->query($sqlCertificateData);

$sqlCertificateCount = "SELECT COUNT(*) AS totalCertificate FROM certificate";
$stmtCertificateCount = $db->query($sqlCertificateCount);
$row = $stmtCertificateCount->fetch(PDO::FETCH_ASSOC);
$totalCertificate = $row['totalCertificate'];

// FOR FORM 137
$sqlForm137Data = "SELECT * FROM form137 ORDER BY date DESC";
$stmtForm137Data = $db->query($sqlForm137Data);

$sqlForm137Count = "SELECT COUNT(*) AS totalForm137 FROM form137";
$stmtForm137Count = $db->query($sqlForm137Count);
$row = $stmtForm137Count->fetch(PDO::FETCH_ASSOC);
$totalForm137 = $row['totalForm137'];

// FOR GOOD MORAL
$sqlGoodMoralData = "SELECT * FROM goodmoral ORDER BY date DESC";
$stmtGoodMoralData = $db->query($sqlGoodMoralData);

$sqlGoodMoralCount = "SELECT COUNT(*) AS totalGoodMoral FROM goodmoral";
$stmtGoodMoralCount = $db->query($sqlGoodMoralCount);
$row = $stmtGoodMoralCount->fetch(PDO::FETCH_ASSOC);
$totalGoodMoral = $row['totalGoodMoral'];

// FOR OTHER DOCUMENT
$sqlOtherDocumentsData = "SELECT * FROM otherdocuments ORDER BY date DESC";
$stmtOtherDocumentsData = $db->query($sqlOtherDocumentsData);

$sqlOtherDocumentsCount = "SELECT COUNT(*) AS totalOtherDocuments FROM otherdocuments";
$stmtOtherDocumentsCount = $db->query($sqlOtherDocumentsCount);
$row = $stmtOtherDocumentsCount->fetch(PDO::FETCH_ASSOC);
$totalOtherDocuments = $row['totalOtherDocuments'];
?>