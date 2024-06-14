<?php
include("config.php");

if (isset($_POST['submitLogo'])) {
  if (isset($_FILES['logo']) && !empty($_FILES['logo']['name'])) {
    $upload_directory = 'phpConnection/images/logo/';
    if ($_FILES['logo']['error'] === UPLOAD_ERR_OK) {
      $file_name = basename($_FILES['logo']['name']);
      $target_path = $upload_directory . $file_name;
      if (move_uploaded_file($_FILES['logo']['tmp_name'], $target_path)) {

        // Check if any record exists
        $check_sql = "SELECT COUNT(*) FROM headerlogo";
        $stmt_check = $db->prepare($check_sql);
        $stmt_check->execute();
        $record_exists = $stmt_check->fetchColumn() > 0;

        if ($record_exists) {
          $update_sql = "UPDATE headerlogo SET logo = ? WHERE headerlogo_id = (SELECT headerlogo_id FROM headerlogo LIMIT 1)";
          $stmt_update = $db->prepare($update_sql);
          $result = $stmt_update->execute([$target_path]);
        } else {
          $insert_sql = "INSERT INTO headerlogo (logo, logoStatus) VALUES (?, 'recent')";
          $stmt_insert = $db->prepare($insert_sql);
          $result = $stmt_insert->execute([$target_path]);
        }

        if ($result) {
          header("Location: editDesign.php");
          exit;
        } else {
          echo "Error updating profile picture.";
        }
      } else {
        echo "Error uploading the profile picture.";
      }
    } else {
      echo "Error: Profile picture upload failed with error code " . $_FILES['logo']['error'];
    }
  }
}

// Fetch the current logo
$sqlSelectLogo = "SELECT logo FROM headerlogo";
$stmtSelectLogo = $db->prepare($sqlSelectLogo);
$stmtSelectLogo->execute();
$logoResult = $stmtSelectLogo->fetch(PDO::FETCH_ASSOC);

?>