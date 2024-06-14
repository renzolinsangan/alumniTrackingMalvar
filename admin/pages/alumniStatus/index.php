<?php
include ("phpConnection/restriction.php");
include ("../editDesign/phpConnection/logoSQL.php");
include ("../editDesign/phpConnection/footerSQL.php");
include ("../editDesign/phpConnection/headerpictureSQL.php");
include ("../editDesign/phpConnection/headertitleSQL.php");
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
  <title>Malvar Senior High School Admin</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <?php
  if ($logoResult) {
    $logo = $logoResult['logo'];
    ?>
    <link rel="shortcut icon" href="../editDesign/<?php echo $logo ?>" />
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
          <img id="navbar-logo" src="../editDesign/<?php echo $logo ?>" alt="Logo" width="80" height="80"
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
        <a id="logout" href="../../logout.php">
          <h5><i class="bi bi-person-circle" style="margin-right: 8px; font-size: 20px;"></i>Log out</h5>
        </a>
      </div>
    </div>
  </nav>
  <div class="row-header row text-align-center justify-content-start mb-1 no-gutters" style="margin-right: 10px;">
    <div class="nav-col d-flex justify-content-start" style="margin-left: 30vh;">
      <a id="profile-nav" href="../../index.php">
        <header>Dashboard</header>
      </a>
    </div>
    <div class="nav-col d-flex justify-content-start">
      <a id="profile-nav" href="../alumniList/index.php">
        <header>List of Alumni</header>
      </a>
    </div>
    <div class="nav-col d-flex justify-content-start">
      <a id="profile-nav" href="index.php">
        <header>Alumni Status</header>
      </a>
    </div>
    <div class="nav-col d-flex justify-content-start">
      <a id="profile-nav" href="../manageForms/index.php">
        <header>Manage Forms</header>
      </a>
    </div>
    <div class="nav-col d-flex justify-content-start">
      <a id="profile-nav" href="../editDesign/index.php">
        <header>Edit Design</header>
      </a>
    </div>
  </div>

  <!-- MALVAR BACKGROUND IMAGE -->
  <?php
  if ($pictureResult) {
    $headerpicture = $pictureResult['headerPicture']
      ?>
    <div class="container-header mb-3 d-flex flex-column justify-content-end align-items-center"
      style="background-image: url(../editDesign/<?php echo $headerpicture ?>)">
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
        <div class="row mb-4">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body" style="margin-left: 10px;">
                <div class="col mt-2">
                  <h1>Alumni Status</h1>
                </div>
                <div class="col mb-2">
                  <p class="text-body-secondary">To view the content and data in every survey, please choose below.</p>
                </div>
                <div class="col-md-4 mb-2">
                  <select class="form-select" style="padding: 10px;" id="selectForm">
                    <option disabled selected value>Choose survey status</option>
                    <option value="studying">Alumni Studying & Not Working</option>
                    <option value="working">Alumni Working & Not Studying</option>
                    <option value="sw">Alumni Studying & Working</option>
                    <option value="notsw">Alumni Not Studying & Not Working</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include ("table/indexTable.php"); ?>
      </div>
    </div>
  </div>

  <?php
  include ("js/script.php");
  ?>
</body>

</html>