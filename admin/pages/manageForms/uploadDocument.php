<!-- DOCUMENT SUBMISSION -->
<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
include("phpConnection/config.php");

//certificate
if (isset($_POST['uploadCertificate'])) {
  $certificate = $_POST['certificate'];
  $alumni_id = $_POST['alumni_id'];

  if (isset($_FILES['certificate']) && !empty($_FILES['certificate']['name'])) {
      $upload_directory = 'requestedDocument/';
      if ($_FILES['certificate']['error'] === UPLOAD_ERR_OK) {
          $file_name = basename($_FILES['certificate']['name']);
          $target_path = $file_name;

          // Assuming $db is your database connection
          $sqlCertificateUpdate = "UPDATE certificate SET document = ? WHERE user_id = ? AND process = 'online' AND status = 'approve'";
          $stmtCertificateUpdate = $db->prepare($sqlCertificateUpdate);

          if ($stmtCertificateUpdate->execute([$file_name, $alumni_id])) {
              $_SESSION['showCertficateUpload'] = true;
              if (move_uploaded_file($_FILES['certificate']['tmp_name'], $upload_directory . $file_name)) {
                  header("Location: index.php");
                  exit();
              } else {
                  echo "Failed to move uploaded file.";
              }
          } else {
              echo "Failed to update certificate document.";
          }
      } else {
          echo "Error uploading file: " . $_FILES['certificate']['error'];
      }
  } else {
      echo "No file uploaded.";
  }
}


//FORM 137
if (isset($_POST['uploadForm137'])) {
  $form137 = $_POST['form137'];
  $alumni_id = $_POST['alumni_id'];
  if (isset($_FILES['form137']) && !empty($_FILES['form137']['name'])) {
    $upload_directory = 'requestedDocument/';
    if ($_FILES['form137']['error'] === UPLOAD_ERR_OK) {
      $file_name = basename($_FILES['form137']['name']);
      $target_path = $file_name;
      if (move_uploaded_file($_FILES['form137']['tmp_name'], $upload_directory . $file_name)) {
        $sqlForm137Update = "UPDATE form137 SET document = ? WHERE user_id = ? AND process = 'online' AND status = 'approve'";
        $stmtForm137Update = $db->prepare($sqlForm137Update);
        $stmtForm137Update->execute([$file_name, $alumni_id]);

        if ($stmtForm137Update) {
          $_SESSION['showForm137Upload'] = true;
          header("Location: index.php");
          exit();
        } else {
          echo "Failed to update certificate document.";
        }
      } else {
        echo "Failed to move uploaded file.";
      }
    } else {
      echo "Error uploading file: " . $_FILES['certificate']['error'];
    }
  } else {
    echo "No file uploaded.";
  }
}

//GOOD MORAL
if (isset($_POST['uploadGoodmoral'])) {
  $goodmoral = $_POST['goodmoral'];
  $alumni_id = $_POST['alumni_id'];
  if (isset($_FILES['goodmoral']) && !empty($_FILES['goodmoral']['name'])) {
    $upload_directory = 'requestedDocument/';
    if ($_FILES['goodmoral']['error'] === UPLOAD_ERR_OK) {
      $file_name = basename($_FILES['goodmoral']['name']);
      $target_path = $file_name;
      if (move_uploaded_file($_FILES['goodmoral']['tmp_name'], $upload_directory . $file_name)) {
        $sqlGoodmoralUpdate = "UPDATE goodmoral SET document = ? WHERE user_id = ? AND process = 'online' AND status = 'approve'";
        $stmtGoodmoralUpdate = $db->prepare($sqlGoodmoralUpdate);
        $stmtGoodmoralUpdate->execute([$file_name, $alumni_id]);

        if ($stmtGoodmoralUpdate) {
          $_SESSION['showGoodMoralUpload'] = true;
          header("Location: index.php");
          exit();
        } else {
          echo "Failed to update certificate document.";
        }
      } else {
        echo "Failed to move uploaded file.";
      }
    } else {
      echo "Error uploading file: " . $_FILES['certificate']['error'];
    }
  } else {
    echo "No file uploaded.";
  }
}

//OTHER DOCUMENTS
if (isset($_POST['uploadOtherdocument'])) {
  $otherdocument = $_POST['otherdocument'];
  $alumni_id = $_POST['alumni_id'];
  if (isset($_FILES['otherdocument']) && !empty($_FILES['otherdocument']['name'])) {
    $upload_directory = 'requestedDocument/';
    if ($_FILES['otherdocument']['error'] === UPLOAD_ERR_OK) {
      $file_name = basename($_FILES['otherdocument']['name']);
      $target_path = $file_name;
      if (move_uploaded_file($_FILES['otherdocument']['tmp_name'], $upload_directory . $file_name)) {
        $sqlOtherdocumentUpdate = "UPDATE otherdocuments SET document = ? WHERE user_id = ? AND process = 'online' AND status = 'approve'";
        $stmtOtherdocumentUpdate = $db->prepare($sqlOtherdocumentUpdate);
        $stmtOtherdocumentUpdate->execute([$file_name, $alumni_id]);

        if ($stmtOtherdocumentUpdate) {
          $_SESSION['showOtherDocumentsUpload'] = true;
          header("Location: index.php");
          exit();
        } else {
          echo "Failed to update certificate document.";
        }
      } else {
        echo "Failed to move uploaded file.";
      }
    } else {
      echo "Error uploading file: " . $_FILES['certificate']['error'];
    }
  } else {
    echo "No file uploaded.";
  }
}
?>