<?php
include("config.php");
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../user_login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_POST['submitProfile'])) {
    if (isset($_FILES['profile']) && !empty($_FILES['profile']['name'])) {
      $upload_directory = 'images/profilePicture/';
      if ($_FILES['profile']['error'] === UPLOAD_ERR_OK) {
        $file_name = basename($_FILES['profile']['name']);
        $target_path = $file_name;
        if (move_uploaded_file($_FILES['profile']['tmp_name'], $upload_directory . $file_name)) {
          $update_status_sql = "UPDATE user_profile SET profileStatus = 'old' WHERE user_id = ?";
          $stmt_update_status = $db->prepare($update_status_sql);
          $stmt_update_status->execute([$user_id]);
  
          $insert_sql = "INSERT INTO user_profile (user_id, profile, profileStatus) VALUES (?, ?, 'recent')";
          $stmt_insert = $db->prepare($insert_sql);
          $result = $stmt_insert->execute([$user_id, $target_path]);
  
          if ($result) {
            $_SESSION['editSuccessAlert'] = true;
            header("Location: index.php");
            exit;
          } else {
            echo "Error updating profile picture.";
          }
        } else {
          echo "Error uploading the profile picture.";
        }
      } else {
        echo "Error: Profile picture upload failed with error code " . $_FILES['profile']['error'];
      }
    }
  }

  $sqlSelectProfile = "SELECT profile FROM user_profile WHERE user_id = ? AND profileStatus = 'recent'";
  $stmtSelectProfile = $db->prepare($sqlSelectProfile);
  $stmtSelectProfile->execute([$user_id]);
  $profileResult = $stmtSelectProfile->fetch(PDO::FETCH_ASSOC);

  if($profileResult) {
    $profile = $profileResult['profile'];
  }
?>