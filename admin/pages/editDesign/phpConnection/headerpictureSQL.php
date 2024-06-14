<?php
include("config.php");

if (isset($_POST['submitPicture'])) {
  if (isset($_FILES['headerpicture']) && !empty($_FILES['headerpicture']['name'])) {
    $upload_directory = 'phpConnection/images/headerpicture/';
    if ($_FILES['headerpicture']['error'] === UPLOAD_ERR_OK) {
      $file_name = basename($_FILES['headerpicture']['name']);
      $target_path = $upload_directory . $file_name;
      if (move_uploaded_file($_FILES['headerpicture']['tmp_name'], $target_path)) {

        // Check if any record exists
        $check_sql = "SELECT COUNT(*) FROM headerpicture";
        $stmt_check = $db->prepare($check_sql);
        $stmt_check->execute();
        $record_exists = $stmt_check->fetchColumn() > 0;

        if ($record_exists) {
          $update_sql = "UPDATE headerpicture SET headerpicture = ? WHERE headerpicture_id = (SELECT headerpicture_id FROM headerpicture LIMIT 1)";
          $stmt_update = $db->prepare($update_sql);
          $result = $stmt_update->execute([$target_path]);
        } else {
          $insert_sql = "INSERT INTO headerpicture (headerPicture, pictureStatus) VALUES (?, 'recent')";
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
      echo "Error: Profile picture upload failed with error code " . $_FILES['headerpicture']['error'];
    }
  }
}

// Fetch the current picture
$sqlSelectPicture = "SELECT headerPicture FROM headerpicture";
$stmtSelectPicture = $db->prepare($sqlSelectPicture);
$stmtSelectPicture->execute();
$pictureResult = $stmtSelectPicture->fetch(PDO::FETCH_ASSOC);
?>