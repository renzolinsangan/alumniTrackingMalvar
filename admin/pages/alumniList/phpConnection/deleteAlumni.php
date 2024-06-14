<?php
session_start();

include('config.php');
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    $sqlDeleteAccount = "DELETE FROM user_account WHERE user_id=$id";
    $result = $db->query($sqlDeleteAccount);

    if ($result) {
        $_SESSION['showSweetAlert'] = true;
        header('Location: ../index.php');
        exit();
    } else {
        die("Connection Failed " . mysqli_connect_error());
    }
}
?>