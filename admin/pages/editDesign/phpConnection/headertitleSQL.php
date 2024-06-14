<?php
include ("config.php");

if (isset($_POST['submitTitle'])) {
  $titleup = $_POST['titleup'];
  $titlebelow = $_POST['titlebelow'];

  // Check if any record exists
  $check_sql = "SELECT * FROM headertitle";
  $stmt_check = $db->prepare($check_sql);
  $stmt_check->execute();
  $record_exists = $stmt_check->fetchColumn() > 0;

  if ($record_exists) {
    // Update existing record
    $update_sql = "UPDATE headertitle SET upperTitle = ?, lowerTitle = ?, titleStatus = 'recent' WHERE headertitle_id = (SELECT headertitle_id FROM headertitle LIMIT 1)";
    $stmt_update = $db->prepare($update_sql);
    $result = $stmt_update->execute([$titleup, $titlebelow]);
    
  } else {
    $insert_sql = "INSERT INTO headertitle (upperTitle, lowerTitle, titleStatus) VALUES (?, ?, 'recent')";
    $stmt_insert = $db->prepare($insert_sql);
    $result = $stmt_insert->execute([$titleup, $titlebelow]);

    header("Location: editDesign.php");
    exit();
  }
}

$sqlheaderTitle = "SELECT * FROM headertitle";
$stmtheaderTitle = $db->prepare($sqlheaderTitle);
$stmtheaderTitle->execute();
$titledata = $stmtheaderTitle->fetch(PDO::FETCH_ASSOC);
?>