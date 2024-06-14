<?php
include("phpConnection/registrationAdminConnection.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/registrationAdmin.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/logoLogin.png"/>
  <title>Malvar Senior High School Admin</title>
</head>

<body>
  <div class="wrapper">
    <div class="container main">
      <form action="#" method="POST" class="scrollable-form">
        <div class="row loginForm">
          <div class="col-md-6 left">
            <div class="input-box">
              <h4>Sign Up</h4>
              <span>(Administrator)</span>
              <div class="midheader" style="margin-bottom: 20px;"></div>
              <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible fade show" id="validationAlert" role="alert"
                  style="display: none; font-size: 15px; padding: 10px; margin-bottom: 30px;">
                  <i class="bi bi-exclamation-triangle-fill" style="margin-right: 5px;"></i> Please fill out the inputs correctly.
                </div>
              </div>
              <div class="col-md-12">
                <div class="input-field" style="margin-top: 20px; position: relative;">
                  <i class="bi bi-person-fill"
                    style="position: absolute; font-size: 20px; left: 17px; top: 50%; transform: translateY(-80%);"></i>
                  <input type="text" class="input" name="username" id="username" style="padding-left: 30px;" required>
                  <label for="username" style="padding-left: 30px;">Username</label>
                </div>
              </div>
              <div class="col-md-12">
                <div class="input-field" style="position: relative;">
                  <i class="bi bi-lock-fill"
                    style="position: absolute; font-size: 20px; left: 15px; top: 50%; transform: translateY(-80%);"></i>
                  <input type="password" class="input" name="password" id="pass" style="padding-left: 30px;" required>
                  <label for="pass" style="padding-left: 30px;">Password (8 characters)</label>
                  <span toggle="#pass" class="toggle-password bi bi-eye-slash"
                  style="position: absolute; right: 15px; top: 40%; transform: translateY(-50%); cursor: pointer; display: none;"></span>
                </div>
              </div>
              <div class="col-md-12">
                <div class="input-field" style="position: relative;">
                  <i class="bi bi-envelope-fill"
                    style="position: absolute; font-size: 18px; left: 15px; top: 50%; transform: translateY(-80%);"></i>
                  <input type="email" class="input" name="email" id="email" style="padding-left: 30px;" required>
                  <label for="email" style="padding-left: 30px;">Email Address</label>
                </div>
              </div>
              <button type="submit" class="submit" name="submitButton">Sign Up</button>
            </div>
          </div>
      </form>
      <div class="col-md-6 right">
        <div class="container rightLogin">
          <img class="registerAdminLogo" src="images/administratorIcon.png" alt="">
          <h4>Already have account?</h4>
          <span style="font-size: small;">If you already created your account, you can go back and proceed to sign
            in.</span>
          <a href="../index.php" class="index-link">
            <button type="button" class="submitLeft">Sign
              In</button>
          </a>
          <img class="imgRight" src="images/loginRightBackground.svg" alt="">
        </div>
      </div>
    </div>
  </div>
  </div>

  <?php
  include("js/registrationScript.php");
  ?>
</body>

</html>