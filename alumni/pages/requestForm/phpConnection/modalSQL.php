<?php
include ("config.php");
$user_id = $_SESSION['user_id'];

// DETAILS FOR ONLINE CERTIFICATE
$sqlOnlineCertificate = "SELECT date, status, purpose, document FROM certificate WHERE user_id = ? AND process = 'online'";
$stmtOnlineCertificate = $db->prepare($sqlOnlineCertificate);
$stmtOnlineCertificate->execute([$user_id]);

// DETAILS FOR ONLINE FORM 137
$sqlOnlineForm137 = "SELECT date, status, purpose, document FROM form137 WHERE user_id = ? AND process = 'online'";
$stmtOnlineForm137 = $db->prepare($sqlOnlineForm137);
$stmtOnlineForm137->execute([$user_id]);

// DETAILS FOR ONLINE GOOD MORAL
$sqlOnlineGoodMoral = "SELECT date, status, purpose, document FROM goodmoral WHERE user_id = ? AND process = 'online'";
$stmtOnlineGoodMoral = $db->prepare($sqlOnlineGoodMoral);
$stmtOnlineGoodMoral->execute([$user_id]);

// DETAILS FOR OTHER DOCUMENTS
$sqlOnlineOtherDocuments = "SELECT date, status, purpose, document FROM otherdocuments WHERE user_id = ? AND process = 'online'";
$stmtOnlineOtherDocuments = $db->prepare($sqlOnlineOtherDocuments);
$stmtOnlineOtherDocuments->execute([$user_id]);
?>