<?php
include ("config.php");

if (isset($_POST['submitFooter'])) {
  $contact = $_POST['contact'];
  $email = $_POST['email'];
  $address = $_POST['address'];

  // Check if any record exists
  $check_sql = "SELECT * FROM footerdata";
  $stmt_check = $db->prepare($check_sql);
  $stmt_check->execute();
  $record_exists = $stmt_check->fetchColumn() > 0;

  if ($record_exists) {
    // Update existing record
    $update_sql = "UPDATE footerdata SET contact = ?, email = ?, address = ?, footerStatus = 'recent' 
    WHERE footerdata_id = (SELECT footerdata_id FROM footerdata LIMIT 1)";
    $stmt_update = $db->prepare($update_sql);
    $result = $stmt_update->execute([$contact, $email, $address]);
    
  } else {
    $insert_sql = "INSERT INTO footerdata (contact, email, address, footerStatus) VALUES (?, ?, ?, 'recent')";
    $stmt_insert = $db->prepare($insert_sql);
    $result = $stmt_insert->execute([$contact, $email, $address]);

    header("Location: editDesign.php");
    exit();
  }
}

$sqlfooterData = "SELECT * FROM footerdata";
$stmtfooterData = $db->prepare($sqlfooterData);
$stmtfooterData->execute();
$footerdata = $stmtfooterData->fetch(PDO::FETCH_ASSOC);
?>