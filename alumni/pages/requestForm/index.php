<?php
include ("phpConnection/restriction.php");
include ("../../../admin/pages/editDesign/phpConnection/logoSQL.php");
include ("../../../admin/pages/editDesign/phpConnection/headerpictureSQL.php");
include ("../../../admin/pages/editDesign/phpConnection/headertitleSQL.php");
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
      <a id="profile-nav" href="../surveyForm/index.php">
        <header>Tracer Survey Form</header>
      </a>
    </div>
    <div class="nav-col col-md-2 d-flex justify-content-start">
      <a id="profile-nav" href="index.php">
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
  <div class="container mb-5">
    <div class="main-card card">
      <div class="card-body">
        <div class="row mb-4">
          <div class="col-md-12">
            <div class="title-card card" style="border: none;">
              <div class="card-body">
                <h1>
                  Request Form
                </h1>
                <p class="text-body-secondary">Please follow the guidelines below first before choosing your requested
                  document.</p>
                <button type="button" class="request-button btn" data-bs-toggle="modal"
                  data-bs-target="#documentModal">Select Document <i class="bi bi-file-text"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-12">
            <div class="guidelines-card card" style="border: none;">
              <div class="card-body">
                <h1>
                  Procedure Guidelines
                </h1>
                <p class="text-body-secondary mb-4">
                  Below are the following guidelines and steps to follow in order to request a document.
                </p>
                <div class="row">
                  <div class="col">
                    <div class="guideline-steps card">
                      <div class="card-header">
                        <h3>Process and Steps of Getting Documents in Registrar</h3>
                      </div>
                      <div class="card-body">
                        <ol class="list-group list-group-numbered">
                          <li class="list-group-item">
                            In requesting a document, you have to make sure that you are an existing
                            alumni of Malvar Senior High School.
                          </li>
                          <li class="list-group-item">
                            In attaining the verification of status, the alumni must have to make sure
                            that they answered survey from Tracer Survey Form.
                          </li>
                          <li class="list-group-item">
                            In selecting the document, the alumni can request documents such as Certificate of
                            Graduation,
                            Form 137, Good Moral, and Other Documents.
                          </li>
                          <li class="list-group-item">
                            After selecting the document to be requested, the alumni will provide details in which
                            other details will be provided automatically by the system, and select the process and
                            provide
                            purpose of requesting the document.
                          </li>
                          <li class="list-group-item">
                            After the process of requesting the document, they must wait for the approval of the
                            administrator
                            if the guidelines are met, and once the admin approve the request, an email will be send
                            with the
                            date and message with regards to the requested document.
                          </li>
                          <li class="list-group-item">
                            Please make sure to follow all of the guidelines and procedure to successfully request a
                            document.
                          </li>
                        </ol>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <h1 class="mb-4">Requested Document</h1>
          <div class="col-md-6 mb-5">
            <div class="card" id="certificate-card">
              <div class="card-header"></div>
              <div class="card-body">
                <h4 class="text-center">Certificate of Graduation</h4>
                <p class="text-body-secondary text-center">(online process)</p>
                <div class="text-center">
                  <button type="button" class="btn" style="background-color: #00274C; color: white;"
                    data-bs-toggle="modal" data-bs-target="#onlineCertificate">
                    View document <i class="bi bi-file-text"></i>
                  </button>
                </div>
                <br>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-5">
            <div class="card" id="form137-card">
              <div class="card-header"></div>
              <div class="card-body">
                <h4 class="text-center">Form 137</h4>
                <p class="text-body-secondary text-center">(online process)</p>
                <div class="text-center">
                  <button type="button" class="btn" style="background-color: #00274C; color: white;"
                    data-bs-toggle="modal" data-bs-target="#onlineForm137">
                    View document <i class="bi bi-file-text"></i>
                  </button>
                </div>
                <br>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-5">
            <div class="card" id="goodmoral-card">
              <div class="card-header"></div>
              <div class="card-body">
                <h4 class="text-center">Good Moral</h4>
                <p class="text-body-secondary text-center">(online process)</p>
                <div class="text-center">
                  <button type="button" class="btn" style="background-color: #00274C; color: white;"
                    data-bs-toggle="modal" data-bs-target="#onlineGoodMoral">
                    View document <i class="bi bi-file-text"></i>
                  </button>
                </div>
                <br>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-5">
            <div class="card" id="otherdocuments-card">
              <div class="card-header"></div>
              <div class="card-body">
                <h4 class="text-center">Other Documents</h4>
                <p class="text-body-secondary text-center">(online process)</p>
                <div class="text-center">
                  <button type="button" class="btn" style="background-color: #00274C; color: white;"
                    data-bs-toggle="modal" data-bs-target="#onlineOtherDocuments">
                    View document <i class="bi bi-file-text"></i>
                  </button>
                </div>
                <br>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- FOR SUCCESS ALERT -->
      <?php if (isset($_SESSION['showSweetAlert']) && $_SESSION['showSweetAlert']): ?>
        <?php include ("phpConnection/sweetalert.php"); ?>
        <?php
        unset($_SESSION['showSweetAlert']);
        ?>
      <?php endif; ?>

    </div>
  </div>
  
  <!-- FOOTER -->
  <?php include ("../../phpConnection/footer.php") ; ?>
  <!-- MODAL -->
  <?php include ("phpConnection/modal.php"); ?>
  <!-- JAVASCRIPT-->
  <?php include ("js/script.php"); ?>
</body>

</html>