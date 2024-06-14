<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$sname = "localhost";
$unmae = "root";
$password = "";
$db_name = "alumnimalvar";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
  echo "Connection failed!";
}

$token = $_GET["token"];

$token_hash = hash("sha256", $token);

$sql = "SELECT * FROM user_account WHERE reset_token_hash = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $token_hash);
$stmt->execute();
$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user === null) {
  die("Token not found");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
  die("Token has expired");
}

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $password = $_POST["password"];
  $resetpassword = $_POST["resetpassword"];

  if (empty($password)) {
    $errors[] = "Please input a password.";
  } elseif (strlen($password) < 8) {
    $errors[] = "Password must be at least 8 characters.";
  } elseif ($password !== $resetpassword) {
    $errors[] = "Passwords must match.";
  }

  if (empty($errors)) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE user_account SET password = ?, reset_token_hash = NULL, reset_token_expires_at = NULL WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $hashedPassword, $user["user_id"]);
    $stmt->execute();

    $_SESSION['forgotpasswordAlert'] = true;
    header("Location: index.php");
    exit();
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/reset_password.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="shortcut icon" href="images/loginLogo.png" />
  <title>Log in</title>
</head>

<body>
  <div class="wrapper">
    <div class="container main">
      <form action="reset_password.php?token=<?= htmlspecialchars($token) ?>" method="POST">
        <div class="row loginForm">
          <div class="col-md-6 left">
            <div class="container leftLogin">
              <h4>Already done?</h4>
              <span style="font-size: small;">If you wish to go back and cancel the process, please click
                sign-in.</span>
              <a href="index.php">
                <button type="button" class="submitLeft">Sign
                  In</button>
              </a>
              <img class="imgLeft" src="images/loginLeftBackground.svg" alt="">
            </div>
          </div>
          <div class="col-md-6 right">
            <div class="input-box">
              <?php
              $sqlUserType = "SELECT usertype FROM user_account WHERE user_id = ?";
              $stmtUserType = $conn->prepare($sqlUserType);
              $stmtUserType->bind_param("i", $user["user_id"]);
              $stmtUserType->execute();
              $stmtUserType->bind_result($userType);
              $stmtUserType->fetch();

              if ($userType == 'alumni') {
                ?>
                <div class="header-top" style="margin-top: -50px;">
                  <img src="images/alumniIcon.png" class="headerIcon mb-3" style="width: 20vh; height: 20vh;">
                  <h4>Forgot Password</h4>
                  <p class="text-body-secondary" style="margin-top: -5px; margin-bottom: 10px;">(Alumni)</p>
                </div>
                <?php
              } else {
                ?>
                <div class="header-top" style="margin-top: -50px;">
                  <img src="images/administratorIcon.png" class="headerIcon mb-3" style="width: 20vh; height: 20vh;">
                  <h4>Forgot Password</h4>
                  <p class="text-body-secondary" style="margin-top: -5px; margin-bottom: 10px;">(Administrator)</p>
                </div>
                <?php
              }
              ?>
              <?php
              if (!empty($errors)) {
                echo '<div class="alert alert-danger" role="alert" style="display: flex; text-align: left; align-items: center; height: 8vh;">';
                foreach ($errors as $error) {
                  echo '<p class="mt-3">' . htmlspecialchars($error) . '</p>';
                }
                echo '</div>';
              }
              ?>
              <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
              <div class="input-field" style="margin-top: 20px; position: relative;">
                <i class="bi bi-lock-fill"
                  style="position: absolute; font-size: 20px; left: 15px; top: 50%; transform: translateY(-80%);"></i>
                <input type="password" class="input" name="password" id="password" style="padding-left: 30px;">
                <label for="password" style="padding-left: 30px;">New Password</label>
                <span toggle="#pass" class="toggle-password bi bi-eye-slash"
                  style="position: absolute; right: 15px; top: 40%; transform: translateY(-50%); cursor: pointer; display: none;"></span>
              </div>
              <div class="input-field" style="position: relative;">
                <i class="bi bi-lock-fill"
                  style="position: absolute; font-size: 20px; left: 15px; top: 50%; transform: translateY(-80%);"></i>
                <input type="password" class="input" name="resetpassword" id="resetpassword"
                  style="padding-left: 30px;">
                <label for="resetpassword" style="padding-left: 30px;">Repeat Password</label>
                <span toggle="#pass" class="toggle-password bi bi-eye-slash"
                  style="position: absolute; right: 15px; top: 40%; transform: translateY(-50%); cursor: pointer; display: none;"></span>
              </div>
              <button type="submit" class="submit" name="submitButton">Submit</button>
            </div>
          </div>
        </div>
      </form>
      <form action="sendReset_password.php" method="post">
        <div class="modal fade" id="forgotpassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header" style="border: none;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <h2 class="mb-3">Change your Password</h2>
                <div class="mb-3">
                  <label for="email" class="form-label" style="color: blue;">Registered Email</label>
                  <input type="email" name="email" class="form-control">
                </div>
                <p class="text-body-secondary">Please input your registred email in your account to send
                  the link of changing your password.</p>
              </div>
              <div class="modal-footer" style="border: none;">
                <button type="submit" name="email_upload" class="btn"
                  style="background-color: blue; color: white;">Send</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
  <script src="js/resetShowPassword.js"></script>
</body>

</html>