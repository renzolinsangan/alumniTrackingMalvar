<?php
include ("phpConnection/restriction.php");
include ("phpConnection/profileDetails.php");
include ("phpConnection/pictureSubmit.php");
include ("../admin/pages/editDesign/phpConnection/logoSQL.php");
include ("../admin/pages/editDesign/phpConnection/headerpictureSQL.php");
include ("../admin/pages/editDesign/phpConnection/headertitleSQL.php");
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/styleIndex.css">
  <title>Malvar Senior High School Alumni</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <?php
  if ($logoResult) {
    $logo = $logoResult['logo'];
    ?>
    <link rel="shortcut icon" href="../admin/pages/editDesign/<?php echo $logo ?>" />
    <?php
  } else {
    ?>
    <link rel="shortcut icon" href="images/logoLogin.png" />
    <?php
  }
  ?>
</head>

<body style="background-color: #eee;">
  <!-- FOR PROFILE PICTURE SUCCESS ALERT -->
  <?php if (isset($_SESSION['editSuccessAlert']) && $_SESSION['editSuccessAlert']): ?>
    <?php include ("phpConnection/sweetalert.php"); ?>
    <?php
    unset($_SESSION['editSuccessAlert']);
    ?>
  <?php endif; ?>

  <!-- FOR PROFILE DETAILS SUCCESS ALERT -->
  <?php if (isset($_SESSION['editDetailsAlert']) && $_SESSION['editDetailsAlert']): ?>
    <?php include ("phpConnection/alertDetails.php"); ?>
    <?php
    unset($_SESSION['editDetailsAlert']);
    ?>
  <?php endif; ?>
  <nav class="navbar navbar-expand-lg">
    <div class="container" style="margin-left: 18vh;">
      <div class="container-margin" style="margin-right: 60px;"></div>
      <?php
      if ($logoResult) {
        $logo = $logoResult['logo'];
        ?>
        <a class="navbar-brand" href="index.php">
          <img id="navbar-logo" src="../admin/pages/editDesign/<?php echo $logo ?>" alt="Logo" width="80" height="80"
            class="d-inline-block align-text-top"></a>
        <?php
      } else {
        ?>
        <a class="navbar-brand" href="index.php">
          <img id="navbar-logo" src="images/logoLogin.png" alt="Logo" width="80" height="80"
            class="d-inline-block align-text-top"></a>
        <?php
      }
      ?>
      <div class="school-title mt-3 text-align-left" style="margin-left: 10px;">
        <?php
        if ($titledata) {
          $uppertitle = $titledata['upperTitle'];
          $lowertitle = $titledata['lowerTitle'];
          ?>
          <h4>
            <?php echo $uppertitle ?>
          </h4>
          <span class="border-title mb-1"></span>
          <p id="title-below">
            <?php echo $lowertitle ?>
          </p>
          <?php
        } else {
          ?>
          <h4>
            Malvar Senior High School
          </h4>
          <span class="border-title mb-1"></span>
          <p id="title-below">
            HOME OF THE BLUE GENERALS
          </p>
          <?php
        }
        ?>
      </div>
      <div class="collapse navbar-collapse" id="navbarText">
      </div>
    </div>
    <div class="container" id="logout-container" style="margin-left: 37vh;">
      <div class="mt-3 ms-5">
        <a id="logout" href="alumniLogout.php">
          <h5><i class="bi bi-person-circle" style="margin-right: 8px; font-size: 20px;"></i>Log out</h5>
        </a>
      </div>
    </div>
  </nav>
  <div class="row-header row text-align-center justify-content-start mb-1 no-gutters" style="margin-right: 10px;">
    <div class="nav-col col-md-1 d-flex justify-content-start" style="margin-left: 30vh;">
      <a id="profile-nav" href="index.php">
        <header>Profile</header>
      </a>
    </div>
    <div class="nav-col col-md-2 d-flex justify-content-start">
      <a id="profile-nav" href="pages/surveyForm/index.php">
        <header>Tracer Survey Form</header>
      </a>
    </div>
    <div class="nav-col col-md-2 d-flex justify-content-start">
      <a id="profile-nav" href="pages/requestForm/index.php">
        <header>Request Forms</header>
      </a>
    </div>
  </div>

  <!-- MALVAR BACKGROUND IMAGE -->
  <?php
  if ($pictureResult) {
    $headerpicture = $pictureResult['headerPicture']
      ?>
    <div class="container-header mb-3 d-flex flex-column justify-content-end align-items-center"
      style="background-image: url(../admin/pages/editDesign/<?php echo $headerpicture ?>)">
      <div class="spacer" style="flex: 1;"></div>
      <h1 class="text-center" id="section-text" style="color: white;">
        (DASHBOARD SECTION)
      </h1>
    </div>
    <?php
  } else {
    ?>
    <div class="container-header mb-3 d-flex flex-column justify-content-end align-items-center">
      <div class="spacer" style="flex: 1;"></div>
      <h1 class="text-center" id="section-text" style="color: white;">
        (DASHBOARD SECTION)
      </h1>
    </div>
    <?php
  }
  ?>
  <div class="container mb-5">
    <div class="main-card card">
      <div class="card-body">
        <div class="profile-card card">
          <div class="card-body">
            <div class="row">
              <div class="primary-details col-md-5 mb-4">
                <h3>Account Details</h3>
                <div class="primary-profile mt-5">
                  <div class="row mb-4">
                    <h2 class="text-center mt-2">
                      <?php echo $strand ?>
                    </h2>
                    <div class="col-md-12 d-flex align-items-center justify-content-center">
                      <div class="profile-picture card">
                        <div class="picture" style="border-bottom: 1px solid #00274C;">
                          <img
                            src="images/profilePicture/<?php echo isset($profile) && !empty($profile) ? $profile : 'profile.png' ?>"
                            alt="profilePicture">
                        </div>
                        <div class="alumni-lrn text-center p-1">
                          <span>
                            <?php echo $fullName ?>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="mt-3">
                      <button class="profile-button btn" style="margin-lefT: 10vh;" data-bs-toggle="modal"
                        data-bs-target="#profileModal">Upload Picture</button>
                      <form action="#" method="post" enctype="multipart/form-data">
                        <div class="modal fade" id="profileModal" data-bs-backdrop="static" data-bs-keyboard="false"
                          tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog" style="width: 50vh; margin-top: 25vh;">
                            <div class="modal-content">
                              <div class="modal-body">
                                <div class="text-start mb-3">
                                  <label for="fileInput" class="form-label mb-3">Upload Profile</label>
                                  <input type="file" name="profile" class="form-control" id="fileInput" accept="image/*"
                                    capture="camera">
                                </div>
                                <div class="modal-button mt-3 d-flex justify-content-end align-items-end">
                                  <button type="button" class="btn" data-bs-dismiss="modal"
                                    style="margin-right: 2vh; padding: 0; outline: none;">Cancel</button>
                                  <button type="submit" class="btn" name="submitProfile"
                                    style="color: #00274C; margin-top: 2vh; padding: 0; outline: none;">Submit</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="row">
                    <div class="col">
                      <h3>Alumni Status</h3>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <p class="text-body-secondary ms-2" style="font-size: 20px;">
                        <?php
                        include ("phpConnection/config.php");

                        $sqlSelectStudying = "SELECT user_id FROM alumnistudying WHERE user_id = ?";
                        $stmtSelectStudying = $db->prepare($sqlSelectStudying);
                        $stmtSelectStudying->execute([$user_id]);

                        if ($stmtSelectStudying->rowCount() > 0) {
                          ?>
                          <i class="bi bi-circle-fill" style="color: #00274C; font-size: 15px;"></i> Studying & Not Working
                          <?php
                        } else {
                          ?>
                          <i class="bi bi-circle" style="font-size: 15px;"></i> Studying & Not Working
                          <?php
                        }
                        ?>
                      </p>
                    </div>
                    <div class="col-6">
                      <p class="text-body-secondary ms-2" style="font-size: 20px;">
                        <?php
                        include ("phpConnection/config.php");

                        $sqlSelectWorking = "SELECT user_id FROM alumniworking WHERE user_id = ?";
                        $stmtSelectWorking = $db->prepare($sqlSelectWorking);
                        $stmtSelectWorking->execute([$user_id]);

                        if ($stmtSelectWorking->rowCount() > 0) {
                          ?>
                          <i class="bi bi-circle-fill" style="color: #00274C; font-size: 15px;"></i> Working & Not Studying
                          <?php
                        } else {
                          ?>
                          <i class="bi bi-circle" style="font-size: 15px;"></i> Working & Not Studying
                          <?php
                        }
                        ?>
                      </p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <p class="text-body-secondary ms-2" style="font-size: 20px;">
                        <?php
                        include ("phpConnection/config.php");

                        $sqlSelectSW = "SELECT user_id FROM alumnisw WHERE user_id = ?";
                        $stmtSelectSW = $db->prepare($sqlSelectSW);
                        $stmtSelectSW->execute([$user_id]);

                        if ($stmtSelectSW->rowCount() > 0) {
                          ?>
                          <i class="bi bi-circle-fill" style="color: #00274C; font-size: 15px;"></i> Studying & Working
                          <?php
                        } else {
                          ?>
                          <i class="bi bi-circle" style="font-size: 15px;"></i> Studying & Working
                          <?php
                        }
                        ?>
                      </p>
                    </div>
                    <div class="col-6">
                      <p class="text-body-secondary ms-2" style="font-size: 20px;">
                        <?php
                        include ("phpConnection/config.php");

                        $sqlSelectnotSW = "SELECT user_id FROM alumninotsw WHERE user_id = ?";
                        $stmtSelectnotSW = $db->prepare($sqlSelectnotSW);
                        $stmtSelectnotSW->execute([$user_id]);

                        if ($stmtSelectnotSW->rowCount() > 0) {
                          ?>
                          <i class="bi bi-circle-fill" style="color: #00274C; font-size: 15px;"></i> Not Studying & Not Working
                          <?php
                        } else {
                          ?>
                          <i class="bi bi-circle" style="font-size: 15px;"></i> Not Studying & Not Working
                          <?php
                        }
                        ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="secondary-details col">
                <div class="profile-details card">
                  <div class="card-body">
                    <div class="row mb-3">
                      <div class="col">
                        <h3>Email:</h3>
                        <p class="text-body-secondary">
                          <?php echo $emailAddress ?>
                        </p>
                        <h3>Age:</h3>
                        <p class="text-body-secondary">
                          <?php echo $age ?>
                        </p>
                        <h3>Address:</h3>
                        <p class="text-body-secondary">
                          <?php echo $address ?>
                        </p>
                        <h3>Contact Number:</h3>
                        <p class="text-body-secondary">
                          <?php echo $contactNumber ?>
                        </p>
                        <h3>Gender:</h3>
                        <p class="text-body-secondary">
                          <?php echo $gender ?>
                        </p>
                        <h3>Year Graduated:</h3>
                        <p class="text-body-secondary">
                          <?php echo $yeargraduated ?>
                        </p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col text-end">
                        <a href="editDetails.php?user_id=<?php echo $user_id ?>">
                          <button class="details-button btn">Edit Details</button>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- FOOTER -->
  <?php include ("phpConnection/indexFooter.php"); ?>

  <!-- JAVASCRIPT -->
  <?php include ("js/script.php") ?>
</body>

</html>