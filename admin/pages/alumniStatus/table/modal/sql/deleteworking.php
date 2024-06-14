<?php
include('../../../phpConnection/config.php');
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    // Delete from alumnistudying
    $sqlDeleteAccount = "DELETE FROM alumniworking WHERE user_id=$id";
    $result1 = $db->query($sqlDeleteAccount);

    // Delete from alumnistudyingdata
    $sqlDeleteData = "DELETE FROM alumniworkingdata WHERE user_id=$id";
    $result2 = $db->query($sqlDeleteData);

    // Delete from alumnistudyinghistory
    $sqlDeleteHistory = "DELETE FROM alumniworkinghistory WHERE user_id=$id";
    $result3 = $db->query($sqlDeleteHistory);

    if ($result1 && $result2 && $result3) {
        $_SESSION['showSweetAlert'] = true;
        header('Location: ../../../index.php');
        exit();
    }
}
?>
