<?php
include('../phpConnection/config.php');

    $sqlDeleteAccount = "DELETE FROM headertitle";
    $result1 = $db->query($sqlDeleteAccount);

    if ($result1) {
        header('Location: ../index.php');
        exit();
    }
?>
