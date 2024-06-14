<?php
include ("phpConnection/restriction.php");
$user_id = $_SESSION['user_id'];
include ("../../../admin/pages/editDesign/phpConnection/logoSQL.php");
include ("../../../admin/pages/editDesign/phpConnection/headerpictureSQL.php");
include ("../../../admin/pages/editDesign/phpConnection/headertitleSQL.php");
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
  <title>Malvar Senior High School Alumni</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <?php
  if ($logoResult) {
    $logo = $logoResult['logo'];
    ?>
    <link rel="shortcut icon" href="../../../admin/pages/editDesign/<?php echo $logo ?>" />
    <?php
  } else {
    ?>
    <link rel="shortcut icon" href="images/logoLogin.png" />
    <?php
  }
  ?>
</head>

<body style="background-color: #eee;">
  <nav class="navbar navbar-expand-lg">
    <div class="container" style="margin-left: 18vh;">
      <div class="container-margin" style="margin-right: 60px;"></div>
      <?php
      if ($logoResult) {
        $logo = $logoResult['logo'];
        ?>
        <a class="navbar-brand" href="index.php">
          <img id="navbar-logo" src="../../../admin/pages/editDesign/<?php echo $logo ?>" alt="Logo" width="80" height="80"
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
        <a id="logout" href="../../alumniLogout.php">
          <h5><i class="bi bi-person-circle" style="margin-right: 8px; font-size: 20px;"></i>Log out</h5>
        </a>
      </div>
    </div>
  </nav>
  <div class="row-header row text-align-center justify-content-start mb-1 no-gutters" style="margin-right: 10px;">
    <div class="nav-col col-md-1 d-flex justify-content-start" style="margin-left: 30vh;">
      <a id="profile-nav" href="../../index.php">
        <header>Profile</header>
      </a>
    </div>
    <div class="nav-col col-md-2 d-flex justify-content-start">
      <a id="profile-nav" href="index.php">
        <header>Tracer Survey Form</header>
      </a>
    </div>
    <div class="nav-col col-md-2 d-flex justify-content-start">
      <a id="profile-nav" href="../requestForm/index.php">
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
      style="background-image: url(../../../admin/pages/editDesign/<?php echo $headerpicture ?>)">
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
  <!-- SQL CONNECTION -->
  <?php include ("sql/indexSQL.php"); ?>
  <div class="container mb-5">
    <div class="main-card card">
      <div class="card-body">
        <div class="row mb-4">
          <div class="col-md-12">
            <div class="title-card card" style="border: none;">
              <div class="card-header p-4">
                <h1>ALUMNI TRACER SURVEY FORM</h1>
                <p class="text-body-secondary">
                  This survey aims to collect information about your current status in life, whether you are working or
                  studying
                  and not working not studying at the moment.
                </p>
                <p class="text-body-secondary">
                  The survey covers topics such as your personal details, university information including educational
                  experiences,
                  career and internship experiences, future aspirations, and feedback on your current status. By sharing
                  your thoughts
                  and experiences, you can contribute to the enhancement of educational and employment opportunities for
                  yourself and
                  your peers in the school.
                </p>
                <p class="text-body-secondary">
                  If you want to answer our tracer survey form, please click the button below and choose
                  the survey based on your status.
                </p>
                <button class="btn mt-2 mb-3" style="background-color: #00274C; color: white; padding: 10px;"
                  data-bs-toggle="modal" data-bs-target="#formSelection">
                  <i class="bi bi-archive" style="margin-right: 5px;"></i>Select survey form
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- STUDYING FORM -->
          <?php
          if ($studyingresult) {
            ?>
            <div class="col-md-4 mb-4">
              <div class="card">
                <div class="card-header"
                  style="height: 30vh; background-image: url(images/study1.jpg); background-size: cover;"></div>
                <div class="card-body">
                  <h5>Studying & Not Working Form</h5>
                  <p class="text-body-secondary mb-4"><?php echo $studyingresult['date'] ?></p>
                  <!-- EDIT STUDYING FORM -->
                  <a href="phpConnection/studyingForm/editForm.php?user_id=<?php echo $studyingresult['user_id'] ?>">
                    <button type="button" class="edit-btn btn" style="color: white; background-color: #00274C;">
                      Edit Studying Form
                    </button>
                  </a>
                </div>
              </div>
            </div>
            <?php
          }
          ?>
          <!-- WORKING FORM -->
          <?php
          if ($workingresult) {
            ?>
            <div class="col-md-4 mb-4">
              <div class="card">
                <div class="card-header"
                  style="height: 30vh; background-image: url(images/work1.jpg); background-size: cover;"></div>
                <div class="card-body">
                  <h5>Working & Not Studying Form</h5>
                  <p class="text-body-secondary mb-4"><?php echo $workingresult['date'] ?></p>
                  <!-- EDIT WORKING FORM -->
                  <a href="phpConnection/workingForm/editForm.php?user_id=<?php echo $workingresult['user_id'] ?>">
                    <button type="button" class="edit-btn btn" style="color: white; background-color: #00274C;">
                      Edit Working Form
                    </button>
                  </a>
                </div>
              </div>
            </div>
            <?php
          }
          ?>
          <!-- STUDYING & WORKING FORM -->
          <?php
          if ($swresult) {
            ?>
            <div class="col-md-4 mb-4">
              <div class="card">
                <div class="card-header"
                  style="height: 30vh; background-image: url(images/sw.jpg); background-size: cover;"></div>
                <div class="card-body">
                  <h5>Studying & Working Form</h5>
                  <p class="text-body-secondary mb-4"><?php echo $swresult['date'] ?></p>
                  <!-- EDIT WORKING FORM -->
                  <a href="phpConnection/SWForm/editForm.php?user_id=<?php echo $swresult['user_id'] ?>">
                    <button type="button" class="edit-btn btn" style="color: white; background-color: #00274C;">
                      Edit Studying & Working Form
                    </button>
                  </a>
                </div>
              </div>
            </div>
            <?php
          }
          ?>
          <!-- NOT STUDYING & WORKING FORM -->
          <?php
          if ($notswresult) {
            ?>
            <div class="col-md-4 mb-4">
              <div class="card">
                <div class="card-header"
                  style="height: 30vh; background-image: url(images/notSW.jpg); background-size: cover;"></div>
                <div class="card-body">
                  <h5>Not Studying & Working Form</h5>
                  <p class="text-body-secondary mb-4">July 7, 2027</p>
                  <!-- EDIT WORKING FORM -->
                  <a href="phpConnection/notSWForm/editForm.php?user_id=<?php echo $notswresult['user_id'] ?>">
                    <button type="button" class="edit-btn btn" style="color: white; background-color: #00274C;">
                      Edit Not Studying & Working Form
                    </button>
                  </a>
                </div>
              </div>
            </div>
            <?php
          }
          ?>
        </div>
      </div>
      <!-- ALERT -->
      <?php include ("alert/alert.php"); ?>
    </div>
  </div>

  <!-- MODAL -->
  <?php include ("modal/formSelection.php"); ?>
  <!-- FOOTER -->
  <?php include ("../../phpConnection/footer.php"); ?>
  <!-- JAVASCRIPT -->
  <?php include ("js/script.php") ?>
</body>

</html>