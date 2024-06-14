<?php
include ("phpConnection/restriction.php");
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/footer.css">
  <title>Malvar Senior High School Admin</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="shortcut icon" href="images/logoLogin.png" />
</head>

<body style="background-color: #eee;">
  <nav class="navbar navbar-expand-lg" style="border-bottom: 5px solid #ccc;">
    <div class="container" style="margin-left: 18vh;">
      <div class="container-margin" style="margin-right: 60px;"></div>
      <span style="color: white; margin-right: 10px;">Upload Logo</span>
      <?php
      include ("phpConnection/logoSQL.php");

      if ($logoResult) {
        $logo = $logoResult['logo'];
        ?>
        <div class="navbar-brand" data-bs-toggle="modal" data-bs-target="#logomodal" style="cursor: pointer;">
          <img id="navbar-logo" src="<?php echo $logo ?>" alt="Logo" width="80" height="80"
            class="d-inline-block align-text-top">
        </div>
        <?php
      } else {
        ?>
        <div class="navbar-brand" data-bs-toggle="modal" data-bs-target="#logomodal" style="cursor: pointer;">
          <img id="navbar-logo" src="images/logoLogin.png" alt="Logo" width="80" height="80"
            class="d-inline-block align-text-top">
        </div>
        <?php
      }
      ?>
      <!-- HEADER TITLE -->
      <?php
      include ("phpConnection/headertitleSQL.php");

      if ($titledata) {
        $upperTitle = $titledata['upperTitle'];
        $lowerTitle = $titledata['lowerTitle'];
        ?>
        <form action="#" method="POST">
          <div class="school-title mt-3 text-align-left" style="margin-left: 10px;">
            <div class="row">
              <div class="col-12">
                <input class="form-control mb-2" type="text" name="titleup" value="<?php echo $upperTitle ?>"
                  style="background-color: transparent; color: white; width: 100%;">
              </div>
              <span class="border-title mb-2"></span>
              <div class="col-12">
                <input class="form-control" type="text" name="titlebelow" value="<?php echo $lowerTitle ?>"
                  style="background-color: transparent; color: white; width: 100%;">
              </div>
              <div class="col">
                <button class="submit-btn btn mt-3" type="submit" name="submitTitle"
                  style="background-color: white; color: #00274C;">
                  <span>Edit title</span>
                </button>
              </div>
            </div>
          </div>
        </form>
        <?php
      } else {
        ?>
        <form action="#" method="POST">
          <div class="school-title mt-3 text-align-left" style="margin-left: 10px;">
            <div class="row">
              <div class="col-12">
                <input class="form-control mb-2" type="text" name="titleup" value="Malvar Senior High School"
                  style="background-color: transparent; color: white; width: 100%;">
              </div>
              <span class="border-title mb-2"></span>
              <div class="col-12">
                <input class="form-control" type="text" name="titlebelow" value="HOME OF THE BLUE GENERALS"
                  style="background-color: transparent; color: white; width: 100%;">
              </div>
              <div class="col">
                <button class="submit-btn btn mt-3" type="submit" name="submitTitle"
                  style="background-color: white; color: #00274C;">
                  <span>Edit title</span>
                </button>
              </div>
            </div>
          </div>
        </form>
        <?php
      }
      ?>
      <div class="collapse navbar-collapse" id="navbarText">
      </div>
    </div>
    <div class="container" id="logout-container" style="margin-left: 37vh;">
      <div class="mt-3 ms-5">
        <a id="logout" href="index.php">
          <h5><i class="bi bi-box-arrow-left" style="margin-right: 8px; font-size: 20px;"></i>Return</h5>
        </a>
      </div>
    </div>
  </nav>
  <!-- MALVAR BACKGROUND IMAGE -->
  <?php
  include ("phpConnection/headerpictureSQL.php");

  if ($pictureResult) {
    $headerpicture = $pictureResult['headerPicture'];
    ?>
    <div class="container-header d-flex flex-column justify-content-end align-items-center"
      style="background-image: url(<?php echo $headerpicture ?>)">
      <div class="spacer" style="flex: 1;"></div>
      <div class="text-center" id="section-text" style="color: white;" data-bs-toggle="modal"
        data-bs-target="#headerPicture">
        <h4 style="cursor: pointer;">
          Edit Header Picture
        </h4>
      </div>
    </div>
    <?php
  } else {
    ?>
    <div class="container-header d-flex flex-column justify-content-end align-items-center">
      <div class="spacer" style="flex: 1;"></div>
      <div class="text-center" id="section-text" style="color: white;" data-bs-toggle="modal"
        data-bs-target="#headerPicture">
        <h4 style="cursor: pointer;">
          Edit Header Picture
        </h4>
      </div>
    </div>
    <?php
  }
  ?>
  <!-- FOOTER -->
  <div class="footer" style="border-top: 5px solid #ccc;">
    <div class="footer-container container">
      <div class="row" style="gap: 20px; width: 100%; margin-left: 20vh;">
        <div class="col col-md-2 mt-4">
          <h5 class="quick-link">Quick Links</h5>
          <a href="#">
            <p>Profile</p>
          </a>
          <a href="#">
            <p>Tracer Survey Form</p>
          </a>
          <a href="#">
            <p>Request Forms</p>
          </a>
        </div>
        <div class="col col-md-2 mt-4">
          <h5 class="survey-header">Survey Form</h5>
          <ul>
            <li>
              <p class="studying" style="margin-bottom: 4px;">
                Tracer Survey Form
              </p>
            </li>
          </ul>
        </div>
        <div class="col col-md-2 mt-4">
          <h5 class="request-header">Request Form</h5>
          <ul>
            <li>
              <p class="certificateFooter" style="margin-bottom: 2px;">
                Certificate of Graduation
              </p>
            </li>
            <li>
              <p class="form137Footer" style="margin-bottom: 2px;">
                Form 137
              </p>
            </li>
            <li>
              <p class="goodmoralFooter" style="margin-bottom: 2px;">
                Good Moral
              </p>
            </li>
            <li>
              <p class="othersFooter" style="margin-bottom: 2px;">
                Other Documents
              </p>
            </li>
          </ul>
        </div>
        <div class="col" style="border-left: 1px solid white; padding-left: 5vh;">
          <!-- FOOTER DATA -->
          <?php
          include ("phpConnection/footerSQL.php");
          if ($footerdata) {
            $contact = $footerdata['contact'];
            $email = $footerdata['email'];
            $address = $footerdata['address'];
            ?>
            <form action="#" method="POST">
              <div class="col-6 mb-2">
                <h5 class="contact-header mt-3">Contact Us</h5>
                <input type="text" class="form-control" name="contact" value="<?php echo $contact ?>"
                  style="background-color: #00274C; border: 1px solid #ccc; color: white;">
              </div>
              <div class="col-10">
                <h5 class="email-header">Email:</h5>
                <ul>
                  <li><input type="text" class="form-control" name="email" value="<?php echo $email ?>"
                      style="background-color: #00274C; border: 1px solid #ccc; color: white;"></li>
                </ul>
              </div>
              <div class="col-10 mb-3">
                <h5 class="address-header">Address:</h5>
                <input type="text" class="form-control" name="address" value="<?php echo $address ?>"
                  style="background-color: #00274C; border: 1px solid #ccc; color: white;">
              </div>
              <button type="submit" name="submitFooter" class="footer-btn btn"
                style="background-color: white; color: #00274C;">
                Edit Footer
              </button>
            </form>
            <?php
          } else {
            ?>
            <form action="#" method="POST">
              <div class="col-6 mb-2">
                <h5 class="contact-header mt-3">Contact Us</h5>
                <input type="text" class="form-control" name="contact" value="(043) 409 1072"
                  style="background-color: #00274C; border: 1px solid #ccc; color: white;">
              </div>
              <div class="col-10">
                <h5 class="email-header">Email:</h5>
                <ul>
                  <li><input type="text" class="form-control" name="email" value="info@shsinmalvar.org"
                      style="background-color: #00274C; border: 1px solid #ccc; color: white;"></li>
                </ul>
              </div>
              <div class="col-10 mb-3">
                <h5 class="address-header">Address:</h5>
                <input type="text" class="form-control" name="address" value="Poblacion Malvar, Batangas 4233"
                  style="background-color: #00274C; border: 1px solid #ccc; color: white;">
              </div>
              <button type="submit" name="submitFooter" class="footer-btn btn"
                style="background-color: white; color: #00274C;">
                Edit Footer
              </button>
            </form>
            <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <!-- MODAL FOR UPLOADING LOGO -->
  <?php include ("phpConnection/logoSQL.php"); ?>
  <form action="#" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="logomodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog" style="width: 50vh; margin-top: 25vh;">
        <div class="modal-content">
          <div class="modal-body">
            <div class="text-start mb-3">
              <label for="fileInput" class="form-label mb-3">Upload Logo</label>
              <input type="file" name="logo" class="form-control" id="fileInput" accept="image/*" capture="camera">
            </div>
            <div class="modal-button mt-3 d-flex justify-content-end align-items-end">
              <button type="button" class="btn" data-bs-dismiss="modal"
                style="margin-right: 2vh; padding: 0; outline: none;">Cancel</button>
              <button type="submit" class="btn" name="submitLogo"
                style="color: #00274C; margin-top: 2vh; padding: 0; outline: none;">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  <!-- MODAL FOR UPLOADING HEADER PICTURE -->
  <?php include ("phpConnection/headerpictureSQL.php"); ?>
  <form action="#" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="headerPicture" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog" style="width: 50vh; margin-top: 25vh;">
        <div class="modal-content">
          <div class="modal-body">
            <div class="text-start mb-3">
              <label for="fileInput" class="form-label mb-3">Upload Header Picture</label>
              <input type="file" name="headerpicture" class="form-control" id="fileInput" accept="image/*"
                capture="camera">
            </div>
            <div class="modal-button mt-3 d-flex justify-content-end align-items-end">
              <button type="button" class="btn" data-bs-dismiss="modal"
                style="margin-right: 2vh; padding: 0; outline: none;">Cancel</button>
              <button type="submit" class="btn" name="submitPicture"
                style="color: #00274C; margin-top: 2vh; padding: 0; outline: none;">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  <?php
  include ("js/script.php");
  ?>
</body>

</html>