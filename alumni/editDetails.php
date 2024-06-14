<?php
include("phpConnection/restriction.php");
include("phpConnection/pictureSubmit.php");
?>
<?php
include("phpConnection/editSQL.php");
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
  <link rel="shortcut icon" href="../admin/images/logoLogin.png" />
</head>

<body style="background-color: #eee;">
  <!-- FOR SUCCESS ALERT -->
  <?php if (isset($_SESSION['editSuccessAlert']) && $_SESSION['editSuccessAlert']): ?>
    <?php include("phpConnection/sweetalert.php"); ?>
    <?php
    unset($_SESSION['editSuccessAlert']);
    ?>
  <?php endif; ?>
  <nav class="navbar navbar-expand-lg">
    <div class="container" style="margin-left: 18vh;">
      <div class="container-margin" style="margin-right: 60px;"></div>
      <a class="navbar-brand" href="index.php">
        <img id="navbar-logo" src="images/logoLogin.png" alt="Logo" width="80" height="80"
          class="d-inline-block align-text-top"></a>
      <div class="school-title mt-3 text-align-left" style="margin-left: 10px;">
        <h4>
          Malvar Senior High School
        </h4>
        <span class="border-title mb-1"></span>
        <p id="title-below">
          HOME OF THE BLUE GENERALS
        </p>
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
  <div class="container-header mb-3 d-flex flex-column justify-content-end align-items-center">
    <div class="spacer" style="flex: 1;"></div>
    <h1 class="text-center" id="section-text" style="color: white;">
    (EDIT PROFILE SECTION)
    </h1>
  </div>
  <div class="container mb-5">
    <div class="main-card card">
      <div class="card-body">
        <div class="profile-card card">
          <div class="card-body">
            <div class="row">
              <div class="primary-details col-md-5 mb-4">
                <h3>Account Details</h3>
                <div class="primary-profile mt-5">
                  <div class="row">
                    <h2 class="text-center mt-2">
                      <?php echo $strand ?>
                    </h2>
                    <div class="col-md-12 d-flex align-items-center justify-content-center">
                      <div class="profile-picture card">
                        <div class="picture" style="border-bottom: 1px solid darkblue;">
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
                                    style="color: darkblue; margin-top: 2vh; padding: 0; outline: none;">Submit</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="row mt-4">
                      <div class="row">
                        <div class="col">
                          <h3>Alumni Status</h3>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <p class="text-body-secondary ms-2" style="font-size: 20px;">
                            <?php
                            include("phpConnection/config.php");

                            $sqlSelectStudying = "SELECT user_id FROM alumnistudying WHERE user_id = ?";
                            $stmtSelectStudying = $db->prepare($sqlSelectStudying);
                            $stmtSelectStudying->execute([$user_id]);

                            if ($stmtSelectStudying->rowCount() > 0) {
                              ?>
                              <i class="bi bi-circle-fill" style="color: darkblue; font-size: 15px;"></i> Studying
                              <?php
                            } else {
                              ?>
                              <i class="bi bi-circle" style="font-size: 15px;"></i> Studying
                              <?php
                            }
                            ?>
                          </p>
                        </div>
                        <div class="col-12">
                          <p class="text-body-secondary ms-2" style="font-size: 20px;">
                            <?php
                            include("phpConnection/config.php");

                            $sqlSelectWorking = "SELECT user_id FROM alumniworking WHERE user_id = ?";
                            $stmtSelectWorking = $db->prepare($sqlSelectWorking);
                            $stmtSelectWorking->execute([$user_id]);

                            if ($stmtSelectWorking->rowCount() > 0) {
                              ?>
                              <i class="bi bi-circle-fill" style="color: darkblue; font-size: 15px;"></i> Working
                              <?php
                            } else {
                              ?>
                              <i class="bi bi-circle" style="font-size: 15px;"></i> Working
                              <?php
                            }
                            ?>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="secondary-details col">
                <div class="profile-details card">
                  <div class="card-body">
                    <form action="phpConnection/editSQL.php?user_id=<?php echo $user_id ?>" method="POST">
                      <div class="row mb-4">
                        <div class="col">
                          <h3>Email:</h3>
                          <p class="text-body-secondary">
                            <input type="text" class="form-control" name="emailAddress"
                              value="<?php echo $emailAddress ?>">
                          </p>
                          <h3>Age:</h3>
                          <p class="text-body-secondary">
                            <input type="text" class="form-control" name="age" value="<?php echo $age ?>">
                          </p>
                          <h3>Address:</h3>
                          <p class="text-body-secondary">
                            <input type="text" class="form-control" name="houseAddress"
                              value="<?php echo $houseAddress ?>">
                          </p>
                          <h3>Contact Number:</h3>
                          <p class="text-body-secondary">
                            <input type="text" class="form-control" name="contactNumber"
                              value="<?php echo $contactNumber ?>">
                          </p>
                          <h3>Gender:</h3>
                          <p class="text-body-secondary">
                            <input type="text" class="form-control" name="gender" value="<?php echo $gender ?>" readonly>
                          </p>
                          <h3>Year Graduated:</h3>
                          <p class="text-body-secondary">
                            <input type="text" class="form-control" name="yeargraduated"
                              value="<?php echo $yeargraduated ?>" readonly>
                          </p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col d-flex justify-content-center align-items-center">
                          <a href="index.php">
                            <button type="button" class="details-button btn" style="margin-right: 20px;">Cancel
                              Form</button>
                          </a>
                          <button type="submit" name="editForm" class="details-button btn">Submit Form</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
  <script src="js/pieChart.js"></script>
  <script src="js/barChart.js"></script>
</body>

</html>