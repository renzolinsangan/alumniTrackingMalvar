<?php
session_start();
include ("admin/pages/editDesign/phpConnection/logoSQL.php");
include ("admin/pages/editDesign/phpConnection/headerpictureSQL.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <?php
  if ($logoResult) {
    $logo = $logoResult['logo'];
    ?>
    <link rel="shortcut icon" href="admin/pages/editDesign/<?php echo $logo ?>" />
    <?php
  } else {
    ?>
    <link rel="shortcut icon" href="images/logoLogin.png" />
    <?php
  }
  ?>
  <title>Log in</title>
</head>

<body>
  <?php
  if ($pictureResult) {
    $headerpicture = $pictureResult['headerPicture'];
    ?>
    <div class="wrapper" style="background-image: url(admin/pages/editDesign/<?php echo $headerpicture ?>)">
      <div class="container main">
        <form action="user_info.php" method="POST" class="login-form" id="loginForm">
          <div class="row loginForm">
            <div class="col-md-6 left">
              <div class="container leftLogin">
                <!-- FOR SUCCESSFUL REGISTRATION -->
                <?php if (isset($_SESSION['showRegistrationAlert']) && $_SESSION['showRegistrationAlert']): ?>
                  <?php include ("alert/registrationalert.php"); ?>
                  <?php
                  unset($_SESSION['showRegistrationAlert']);
                  ?>
                <?php endif; ?>
                <!-- SENDING EMAIL FOR FORGOT PASSWORD -->
                <?php if (isset($_SESSION['emailalert']) && $_SESSION['emailalert']): ?>
                  <?php include ("alert/emailalert.php"); ?>
                  <?php
                  unset($_SESSION['emailalert']);
                  ?>
                <?php endif; ?>
                <!-- FOR SUCCESSFUL FORGOT PASSWORD -->
                <?php if (isset($_SESSION['forgotpasswordAlert']) && $_SESSION['forgotpasswordAlert']): ?>
                  <?php include ("alert/forgotpasswordalert.php"); ?>
                  <?php
                  unset($_SESSION['forgotpasswordAlert']);
                  ?>
                <?php endif; ?>
                <h4>New Here?</h4>
                <span style="font-size: small;">In order to create your account, you must click the button below and
                  register.</span>
                <button type="button" class="submitLeft" data-bs-toggle="modal" data-bs-target="#register">Sign
                  Up</button>
                <img class="imgLeft" src="images/loginLeftBackground.svg" alt="">
              </div>
            </div>
            <div class="col-md-6 right">
              <div class="input-box">
                <?php
                if ($logoResult) {
                  $logo = $logoResult['logo'];
                  ?>
                  <img class="loginLogo" src="admin/pages/editDesign/<?php echo $logo ?>" alt="Logo">
                  <?php
                } else {
                  ?>
                  <img class="loginLogo" src="images/loginLogo.png" alt="Logo">
                  <?php
                }
                ?>
                <?php
                if (isset($_GET['error'])) {
                  ?>
                  <p class="error">
                    <i class="bi bi-exclamation-triangle-fill" style="margin-right: 5px;"></i>
                    <?php echo $_GET['error']; ?>
                  </p>
                  <?php
                }
                ?>
                <div class="input-field" style="margin-top: 20px; position: relative;">
                  <i class="bi bi-person-fill"
                    style="position: absolute; font-size: 20px; left: 15px; top: 50%; transform: translateY(-80%);"></i>
                  <input type="text" class="input" name="username" id="username" style="padding-left: 30px;">
                  <label for="username" style="padding-left: 30px;">Username</label>
                </div>
                <div class="input-field" style="position: relative;">
                  <i class="bi bi-lock-fill"
                    style="position: absolute; font-size: 20px; left: 15px; top: 50%; transform: translateY(-80%);"></i>
                  <input type="password" class="input" name="password" id="pass" style="padding-left: 30px;">
                  <label for="pass" style="padding-left: 30px;">Password</label>
                  <span toggle="#pass" class="toggle-password bi bi-eye-slash"
                    style="position: absolute; right: 15px; top: 40%; transform: translateY(-50%); cursor: pointer; display: none;"></span>
                </div>
                <div class="input-field" style="margin-top: -10px; margin-bottom: 15px;">
                  <select class="form-select" name="usertype">
                    <option disabled selected value>Select your User-type</option>
                    <option value="administrator">Administrator</option>
                    <option value="alumni">Alumni</option>
                  </select>
                </div>
                <button type="submit" class="submit" name="submitButton">Log in</button>
                <div class="forgot">
                  <span>
                    <a class="fpass" href="#" data-bs-toggle="modal" data-bs-target="#forgotpassword">Forgot Password?
                    </a>
                  </span>
                </div>
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
                    <label for="email" class="form-label" style="color: #00274C;">Registered Email</label>
                    <input type="email" name="email" class="form-control">
                  </div>
                  <p class="text-body-secondary">Please input your registred email in your account to send
                    the link of changing your password.</p>
                </div>
                <div class="modal-footer" style="border: none;">
                  <button type="submit" name="email_upload" class="btn"
                    style="background-color: #00274C; color: white;">Send</button>
                </div>
              </div>
            </div>
          </div>
        </form>
        <div class="modal fade" id="register" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header" style="border: none;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body text-align-center justify-content-center">
                <div class="container">
                  <h4 style="margin-bottom: 5vh;">Register your account as an alumni student.</h4>
                  <div class="row align-items-center justify-content-center">
                    <div class="col-md-12" style="margin-bottom: 20px">
                      <a class="alumniRegistration" href="alumni/registrationAlumni.php">
                        <div class="card">
                          <div class="col" style="margin-bottom: 10px">
                            <img class="alumniIcon" src="images/alumniIcon.png" alt="">
                          </div>
                          <div class="col">
                            <h4>Alumni Graduate</h4>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer" style="border: none;"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
  } else {
    ?>
    <div class="wrapper">
      <div class="container main">
        <form action="user_info.php" method="POST" class="login-form" id="loginForm">
          <div class="row loginForm">
            <div class="col-md-6 left">
              <div class="container leftLogin">
                <!-- FOR SUCCESSFUL REGISTRATION -->
                <?php if (isset($_SESSION['showRegistrationAlert']) && $_SESSION['showRegistrationAlert']): ?>
                  <?php include ("alert/registrationalert.php"); ?>
                  <?php
                  unset($_SESSION['showRegistrationAlert']);
                  ?>
                <?php endif; ?>
                <!-- SENDING EMAIL FOR FORGOT PASSWORD -->
                <?php if (isset($_SESSION['emailalert']) && $_SESSION['emailalert']): ?>
                  <?php include ("alert/emailalert.php"); ?>
                  <?php
                  unset($_SESSION['emailalert']);
                  ?>
                <?php endif; ?>
                <!-- FOR SUCCESSFUL FORGOT PASSWORD -->
                <?php if (isset($_SESSION['forgotpasswordAlert']) && $_SESSION['forgotpasswordAlert']): ?>
                  <?php include ("alert/forgotpasswordalert.php"); ?>
                  <?php
                  unset($_SESSION['forgotpasswordAlert']);
                  ?>
                <?php endif; ?>
                <h4>New Here?</h4>
                <span style="font-size: small;">In order to create your account, you must click the button below and
                  register.</span>
                <button type="button" class="submitLeft" data-bs-toggle="modal" data-bs-target="#register">Sign
                  Up</button>
                <img class="imgLeft" src="images/loginLeftBackground.svg" alt="">
              </div>
            </div>
            <div class="col-md-6 right">
              <div class="input-box">
                <?php
                if ($logoResult) {
                  $logo = $logoResult['logo'];
                  ?>
                  <img class="loginLogo" src="admin/pages/editDesign/<?php echo $logo ?>" alt="Logo">
                  <?php
                } else {
                  ?>
                  <img class="loginLogo" src="images/loginLogo.png" alt="Logo">
                  <?php
                }
                ?>
                <?php
                if (isset($_GET['error'])) {
                  ?>
                  <p class="error">
                    <i class="bi bi-exclamation-triangle-fill" style="margin-right: 5px;"></i>
                    <?php echo $_GET['error']; ?>
                  </p>
                  <?php
                }
                ?>
                <div class="input-field" style="margin-top: 20px; position: relative;">
                  <i class="bi bi-person-fill"
                    style="position: absolute; font-size: 20px; left: 15px; top: 50%; transform: translateY(-80%);"></i>
                  <input type="text" class="input" name="username" id="username" style="padding-left: 30px;">
                  <label for="username" style="padding-left: 30px;">Username</label>
                </div>
                <div class="input-field" style="position: relative;">
                  <i class="bi bi-lock-fill"
                    style="position: absolute; font-size: 20px; left: 15px; top: 50%; transform: translateY(-80%);"></i>
                  <input type="password" class="input" name="password" id="pass" style="padding-left: 30px;">
                  <label for="pass" style="padding-left: 30px;">Password</label>
                  <span toggle="#pass" class="toggle-password bi bi-eye-slash"
                    style="position: absolute; right: 15px; top: 40%; transform: translateY(-50%); cursor: pointer; display: none;"></span>
                </div>
                <div class="input-field" style="margin-top: -10px; margin-bottom: 15px;">
                  <select class="form-select" name="usertype">
                    <option disabled selected value>Select your User-type</option>
                    <option value="administrator">Administrator</option>
                    <option value="alumni">Alumni</option>
                  </select>
                </div>
                <button type="submit" class="submit" name="submitButton">Log in</button>
                <div class="forgot">
                  <span>
                    <a class="fpass" href="#" data-bs-toggle="modal" data-bs-target="#forgotpassword">Forgot Password?
                    </a>
                  </span>
                </div>
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
                    <label for="email" class="form-label" style="color: #00274C;">Registered Email</label>
                    <input type="email" name="email" class="form-control">
                  </div>
                  <p class="text-body-secondary">Please input your registred email in your account to send
                    the link of changing your password.</p>
                </div>
                <div class="modal-footer" style="border: none;">
                  <button type="submit" name="email_upload" class="btn"
                    style="background-color: #00274C; color: white;">Send</button>
                </div>
              </div>
            </div>
          </div>
        </form>
        <div class="modal fade" id="register" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header" style="border: none;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body text-align-center justify-content-center">
                <div class="container">
                  <h4 style="margin-bottom: 5vh;">Register your account as an alumni student.</h4>
                  <div class="row align-items-center justify-content-center">
                    <div class="col-md-12" style="margin-bottom: 20px">
                      <a class="alumniRegistration" href="alumni/registrationAlumni.php">
                        <div class="card">
                          <div class="col" style="margin-bottom: 10px">
                            <img class="alumniIcon" src="images/alumniIcon.png" alt="">
                          </div>
                          <div class="col">
                            <h4>Alumni Graduate</h4>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer" style="border: none;"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
  }
  ?>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
  <?php include ("js/loginValidation.php") ?>
</body>

</html>