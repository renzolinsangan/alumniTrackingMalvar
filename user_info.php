<?php
session_start();
include("db_conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
    if (empty($_POST['username']) && empty($_POST['password']) && empty($_POST['usertype'])) {
        header("Location: index.php?error=Please input your account details.");
        exit();
    } elseif (empty($_POST['username'])) {
        header("Location: index.php?error=Username is Required!");
        exit();
    } elseif (empty($_POST['password'])) {
        $_SESSION['entered_username'] = $_POST['username'];
        header("Location: index.php?error=Password is Required!");
        exit();
    } elseif ($_POST['usertype'] == "Select your User-type" || !in_array($_POST['usertype'], array("administrator", "alumni"))) {
        $_SESSION['entered_username'] = $_POST['username'];
        header("Location: index.php?error=User Type is Required!");
        exit();
    } else {
        $name = validate($_POST['username']);
        $pass = validate($_POST['password']);
        $usertype = validate($_POST['usertype']);

        $sql = "SELECT * FROM user_account WHERE username = ? AND usertype = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $name, $usertype);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row) {
            if (password_verify($pass, $row['password'])) {
                $_SESSION['usertype'] = $row['usertype'];
                $_SESSION['user_id'] = $row['user_id'];

                $stmt->close();
                $conn->close();

                if ($_SESSION['usertype'] === "alumni") {
                    header("Location: alumni/index.php");
                } elseif ($_SESSION['usertype'] === "administrator") {
                    header("Location: admin/index.php");
                } else {
                    header("Location: index.php?error=Invalid usertype");
                }
                exit();
            } else {
                $_SESSION['entered_username'] = $name;
                header("Location: index.php?error=Incorrect Password!");
                exit();
            }
        } else {
            header("Location: index.php?error=Incorrect details, try again!");
            exit();
        }
    }
} else {
    header("Location: index.php?error=Invalid request.");
    exit();
}
?>
