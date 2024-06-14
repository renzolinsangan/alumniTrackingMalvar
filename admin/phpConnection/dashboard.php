<?php
include("config.php");

// TOTAL ALL ALUMNI
$sqlAlumniCount = "SELECT COUNT(*) AS totalAlumni FROM user_account WHERE usertype='alumni'";
$stmtAlumniCount = $db->query($sqlAlumniCount);
$row = $stmtAlumniCount->fetch(PDO::FETCH_ASSOC);
$totalAlumni = $row['totalAlumni'];

// TOTAL ALL ALUMNI (STUDYING)
$sqlAlumniStudyingCount = "SELECT COUNT(*) AS totalAlumniS FROM alumnistudying";
$stmtAlumniStudyingCount = $db->query($sqlAlumniStudyingCount);
$row = $stmtAlumniStudyingCount->fetch(PDO::FETCH_ASSOC);
$totalAlumniStudying = $row['totalAlumniS'];

//TOTAL ALL ALUMNI (WORKING)
$sqlAlumniWorkingCount = "SELECT COUNT(*) AS totalAlumniW FROM alumniworking";
$stmtAlumniWorkingCount = $db->query($sqlAlumniWorkingCount);
$row = $stmtAlumniWorkingCount->fetch(PDO::FETCH_ASSOC);
$totalAlumniWorking = $row['totalAlumniW'];
?>