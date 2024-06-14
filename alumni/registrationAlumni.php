<?php
include ("phpConnection/registrationAlumniConnection.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/alumniRegistration.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="shortcut icon" href="../images/loginLogo.png" />
  <title>Malvar Senior High School Alumni</title>
</head>

<body>
  <div class="wrapper">
    <div class="container main">
      <form action="#" method="POST" class="scrollable-form">
        <div class="row loginForm">
          <div class="col-md-6 leftFirstForm">
            <div class="input-box">
              <div class="text-start" data-bs-toggle="tooltip" data-bs-placement="bottom"
                title="Registration Guidelines">
                <span data-bs-toggle="modal" data-bs-target="#infoIconModal"
                  style="color: #00274C; cursor: pointer;">Show Guidelines</span>
              </div>
              <h4>Sign Up</h4>
              <span>(Alumni)</span>
              <div class="alert alert-danger alert-dismissible fade show" id="validationAlertFirstForm" role="alert"
                style="display: none; font-size: 15px; padding: 10px; margin-top: 10px; margin-bottom: -20px;">
                <i class="bi bi-exclamation-triangle-fill" style="margin-right: 5px;"></i>Please fill out the inputs,
                and do it correctly.
              </div>
              <div class="midheader" style="margin-bottom: 40px;"></div>
              <div class="input-field">
                <div class="row">
                  <div class="col-md-12">
                    <div class="input-field" style="position: relative;">
                      <i class="bi bi-person-fill"
                        style="position: absolute; font-size: 20px; left: 15px; top: 35%; transform: translateY(-50%);"></i>
                      <input type="text" class="input" name="username" id="username" style="padding-left: 35px;"
                        required>
                      <label for="username" style="padding-left: 35px;">Username</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="input-field" style="position: relative;">
                      <i class="bi bi-lock-fill"
                        style="position: absolute; font-size: 20px; left: 15px; top: 35%; transform: translateY(-50%);"></i>
                      <input type="password" class="input" name="password" id="pass" style="padding-left: 35px;"
                        required>
                      <label for="pass" style="padding-left: 35px;">Password</label>
                      <span toggle="#pass" class="toggle-password bi bi-eye-slash"
                        style="position: absolute; right: 15px; top: 40%; transform: translateY(-50%); cursor: pointer; display: none;"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="input-field" style="position: relative;">
                      <i class="bi bi-person-vcard-fill"
                        style="position: absolute; font-size: 20px; left: 15px; top: 35%; transform: translateY(-50%);"></i>
                      <input type="text" class="input" name="name" id="name" style="padding-left: 35px;" required>
                      <label for="name" style="padding-left: 35px;">Full Name</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="input-field" style="position: relative;">
                      <i class="bi bi-gender-ambiguous"
                        style="position: absolute; font-size: 20px; left: 15px; top: 35%; transform: translateY(-50%);"></i>
                      <input type="text" class="input" name="gender" id="gender" style="padding-left: 35px;" required>
                      <label for="gender" style="padding-left: 35px;">Gender</label>
                    </div>
                  </div>
                </div>
              </div>
              <button type="button" class="nextButtonFirstForm">Next <i class="bi bi-arrow-right"></i> </button>
            </div>
          </div>
          <div class="col-md-6 leftSecondForm" style="display: none;">
            <div class="input-box">
              <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Registration Guidelines">
                <i class="bi bi-info-circle info-icon" data-bs-toggle="modal" data-bs-target="#infoIconModal"></i>
              </div>
              <h4>Sign Up</h4>
              <span>(Alumni)</span>
              <div class="alert alert-danger alert-dismissible fade show" id="validationAlertSecondForm" role="alert"
                style="display: none; font-size: 15px; padding: 10px; margin-top: 10px; margin-bottom: -20px;">
                <i class="bi bi-exclamation-triangle-fill" style="margin-right: 5px;"></i>Please fill out the inputs,
                and do it correctly.
              </div>
              <div class="midheader" style="margin-bottom: 40px;"></div>
              <div class="input-field">
                <div class="row">
                  <div class="col-md-12">
                    <div class="input-field" style="position: relative;">
                      <i class="bi bi-person-bounding-box"
                        style="position: absolute; font-size: 20px; left: 15px; top: 35%; transform: translateY(-50%);"></i>
                      <input type="text" class="input" name="age" id="age" style="padding-left: 35px;" required>
                      <label for="age" style="padding-left: 35px;">Age</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="input-field" style="position: relative;">
                      <i class="bi bi-house-fill"
                        style="position: absolute; font-size: 20px; left: 15px; top: 35%; transform: translateY(-50%);"></i>
                      <input type="text" class="input" name="houseaddress" id="houseaddress" style="padding-left: 35px;"
                        required>
                      <label for="houseaddress" style="padding-left: 35px;">House Address</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="input-field" style="position: relative;">
                      <i class="bi bi-envelope-fill"
                        style="position: absolute; font-size: 20px; left: 15px; top: 35%; transform: translateY(-50%);"></i>
                      <input type="email" class="input" name="email" id="email" style="padding-left: 35px;" required>
                      <label for="email" style="padding-left: 35px;">Email Address</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="input-field" style="position: relative;">
                      <i class="bi bi-phone-fill"
                        style="position: absolute; font-size: 20px; left: 15px; top: 35%; transform: translateY(-50%);"></i>
                      <input type="tel" class="input" name="contactnumber" id="contactnumber"
                        style="padding-left: 35px;" pattern="^(09|\+639)\d{9}$" maxlength="11" required>
                      <label for="contactnumber" style="padding-left: 35px;">Contact Number</label>
                    </div>
                  </div>
                </div>
              </div>
              <button type="button" class="backButton"><i class="bi bi-arrow-left"></i> Back</button>
              <button type="button" class="nextButtonSecondForm ml-3">Next <i class="bi bi-arrow-right"></i></button>
            </div>
          </div>
          <div class="col-md-6 leftThirdForm" style="display: none;">
            <div class="input-box">
              <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Registration Guidelines">
                <i class="bi bi-info-circle info-icon" data-bs-toggle="modal" data-bs-target="#infoIconModal"></i>
              </div>
              <h4>Sign Up</h4>
              <span>(Alumni)</span>
              <div class="alert alert-danger alert-dismissible fade show" id="validationAlertThirdForm" role="alert"
                style="display: none; font-size: 15px; padding: 10px; margin-top: 10px; margin-bottom: -20px;">
                <i class="bi bi-exclamation-triangle-fill" style="margin-right: 5px;"></i>Please fill out the inputs,
                and do it correctly.
              </div>
              <div class="midheader" style="margin-bottom: 40px;"></div>
              <div class="input-field">
                <div class="row">
                  <div class="col-md-12">
                    <div class="input-field" style="position: relative;">
                      <i class="bi bi-briefcase-fill"
                        style="position: absolute; font-size: 20px; left: 15px; top: 35%; transform: translateY(-50%);"></i>
                      <input type="text" class="input" name="strand" id="strand" style="padding-left: 35px;" required>
                      <label for="strand" style="padding-left: 35px;">Academic Strand</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="input-field" style="position: relative;">
                    <i class="bi bi-mortarboard-fill"
                        style="position: absolute; font-size: 20px; left: 15px; top: 35%; transform: translateY(-50%);"></i>
                      <select class="input" name="yearGraduated" id="yearGraduated" style="padding-left: 35px;" required>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <button type="button" class="backButton"><i class="bi bi-arrow-left"></i> Back</button>
              <button type="submit" class="submitButton ml-3" name="submitButton">Submit <i
                  class="bi bi-check2-circle"></i></button>
            </div>
          </div>
          <div class="col-md-6 right">
            <div class="container rightLogin">
              <img class="registerAdminLogo" src="images/alumniIcon.png" alt="">
              <div class="rightheader"></div>
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
      </form>
      <div class="modalForInfoIcon">
        <div class="modal fade" id="infoIconModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <div class="row align-items-center mb-1">
                  <div class="col text-center">
                    <i class="bi bi-exclamation-triangle" style="font-size: 40px; color: #00274C;"></i>
                  </div>
                </div>
                <div class="row align-items-center" style="border-bottom: 1px solid #00274C;">
                  <div class="col text-center">
                    <h4>Registration Guidelines</h4>
                    <p class="text-body-secondary">Strictly follow the guidelines below to ensure the success of
                      creating your account.</p>
                  </div>
                </div>
                <div class="row mt-3" style="border-bottom: 1px solid #00274C;">
                  <div class="col">
                    <ul class="justify-content-between">
                      <li>All of the inputs must not be empty to proceed to the next part and to submit the form.</li>
                      <li>Any combination of letters and numbers for username is available.</li>
                      <li>Password must be 8 characters and above.</li>
                      <li>Patrick T. Star or Patrick The Star are accepted as full name.</li>
                      <li>Any type of gender is accepted by the system.</li>
                      <li>Age should be numbers not letters.</li>
                      <li>House Address will accept any combination of letters and numbers.</li>
                      <li>Email Address should be emailaddress@gmail.com or can accept any extension</li>
                      <li>Contact Number should start at 09 and must be 11 numbers.</li>
                      <li>Academic Strand will only accept acronym, like STEM and etc.</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="modal-footer d-flex justify-content-center" style="margin-top: -10px;">
                <button type="button" class="backButton" data-bs-dismiss="modal" style="border: 1px solid #00274C;">
                  Exit<i class="bi bi-x-octagon" style="padding-left: 5px;"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.1/js/bootstrap.min.js"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
  <script src="js/alumniRegistration.js"></script>
  <script src="js/yearSelect.js"></script>
  <script src="js/showPassword.js"></script>
</body>

</html>