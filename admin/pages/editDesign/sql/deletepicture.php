<?php
include('../phpConnection/config.php');

    $sqlDeleteAccount = "DELETE FROM headerpicture";
    $result1 = $db->query($sqlDeleteAccount);

    if ($result1) {
        header('Location: ../index.php');
        exit();
    }

?>
