<?php
include("phpConnection/config.php");

// HEADER LOGO
$sqlheaderLogo = "SELECT headerlogo_id, logo FROM headerlogo";
$stmtheaderLogo = $db->prepare($sqlheaderLogo);
$stmtheaderLogo->execute();
$headerlogo = $stmtheaderLogo->fetch(PDO::FETCH_ASSOC);

// HEADER PICTURE 
$sqlheaderPicture = "SELECT headerPicture FROM headerpicture";
$stmtheaderPicture = $db->prepare($sqlheaderPicture);
$stmtheaderPicture->execute();
$headerpicture = $stmtheaderPicture->fetch(PDO::FETCH_ASSOC);

// HEADER TITLE
$sqlheaderTitle = "SELECT upperTitle, lowerTitle FROM headertitle";
$stmtheaderTitle = $db->prepare($sqlheaderTitle);
$stmtheaderTitle->execute();
$headertitle = $stmtheaderTitle->fetch(PDO::FETCH_ASSOC);

// FOOTER DATA
$sqlfooterData = "SELECT contact, email, address FROM footerdata";
$stmtfooterData = $db->prepare($sqlfooterData);
$stmtfooterData->execute();
$footerdata = $stmtfooterData->fetch(PDO::FETCH_ASSOC);
?>