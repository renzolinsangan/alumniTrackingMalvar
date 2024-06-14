<?php
include("config.php");
$user_id = $_SESSION['user_id'];

// STUDYING FORM 
$sqlStudyingForm = "SELECT * FROM alumnistudying WHERE user_id = ?";
$stmtStudyingForm = $db->prepare($sqlStudyingForm);
$stmtStudyingForm->execute([$user_id]);
$studyingresult = $stmtStudyingForm->fetch(PDO::FETCH_ASSOC);

// WORKING FORM
$sqlWorkingForm = "SELECT * FROM alumniworking WHERE user_id = ?";
$stmtWorkingForm = $db->prepare($sqlWorkingForm);
$stmtWorkingForm->execute([$user_id]);
$workingresult = $stmtWorkingForm->fetch(PDO::FETCH_ASSOC);

// STUDYING AND WORKING FORM
$sqlSWForm = "SELECT * FROM alumnisw WHERE user_id = ?";
$stmtSWForm = $db->prepare($sqlSWForm);
$stmtSWForm->execute([$user_id]);
$swresult = $stmtSWForm->fetch(PDO::FETCH_ASSOC);

// NOT STUDYING AND WORKING FORM
$sqlNotSWForm = "SELECT * FROM alumninotsw WHERE user_id = ?";
$stmtNotSWForm = $db->prepare($sqlNotSWForm);
$stmtNotSWForm->execute([$user_id]);
$notswresult = $stmtNotSWForm->fetch(PDO::FETCH_ASSOC);
?>