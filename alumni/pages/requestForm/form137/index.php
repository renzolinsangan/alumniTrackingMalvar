<?php
include ("phpConnection/restriction.php");
include ("phpConnection/form137Details.php");
include ("phpConnection/form137Submit.php");
include ("../../../../admin/pages/editDesign/phpConnection/logoSQL.php");
include ("../../../../admin/pages/editDesign/phpConnection/headertitleSQL.php");
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/styles.css">
  <title>Malvar Senior High School Alumni</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <?php
  if ($logoResult) {
    $logo = $logoResult['logo'];
    ?>
    <link rel="shortcut icon" href="../../../../admin/pages/editDesign/<?php echo $logo ?>" />
    <?php
  } else {
    ?>
    <link rel="shortcut icon" href="images/logoLogin.png" />
    <?php
  }
  ?>
</head>

<body style="background-color: #eee;">
  <nav class="navbar navbar-expand-lg mb-3">
    <div class="container" style="margin-left: 18vh;">
      <div class="container-margin" style="margin-right: 60px;"></div>
      <?php
      if ($logoResult) {
        $logo = $logoResult['logo'];
        ?>
        <a class="navbar-brand" href="index.php">
          <img id="navbar-logo" src="../../../../admin/pages/editDesign/<?php echo $logo ?>" alt="Logo" width="80"
            height="80" class="d-inline-block align-text-top"></a>
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
  </nav>

  <div class="container mb-5">
    <div class="main-card card">
      <div class="card-body">
        <div class="row mb-4">
          <div class="col-md-12">
            <div class="form137-title card" style="border: none; padding: 20px;">
              <div class="card-body">
                <h1>Form 137</h1>
                <p class="text-body-secondary">If you would like to go back, please click the button below.</p>
                <a href="../index.php">
                  <button type="button" class="back-button btn mb-2" data-bs-toggle="modal"
                    data-bs-target="#documentModal"><i class="bi bi-arrow-left"></i> Go Back</button>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form137-body card" style="border: none; padding: 20px;">
              <div class="card-body">
                <div class="title row">
                  <div class="col" style="border-bottom: 1px solid #ccc;">
                    <h3>
                      Request Form Details
                    </h3>
                    <p class="text-body-secondary">
                      Once you fill out the form, the result and feedback will be received once the administrator
                      approved the request.
                    </p>
                  </div>
                </div>
                <form action="#" method="POST">
                  <div class="body row mt-4 justify-content-between">
                    <div class="col">
                      <div class="row mb-4">
                        <div class="col-md-6">
                          <label for="strand">Strand</label>
                          <input type="text" class="disabled form-control mt-2" name="strand"
                            value="<?php echo $strand ?>" readonly>
                        </div>
                        <div class="col-md-6">
                          <label for="fullname">Full Name</label>
                          <input type="text" class="disabled form-control mt-2" name="fullname"
                            value="<?php echo $fullName ?>" readonly>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="col-md-6">
                          <label for="emailAddress">Email Address</label>
                          <input type="email" class="disabled form-control mt-2" name="emailAddress"
                            value="<?php echo $emailAddress ?>" readonly>
                        </div>
                        <div class="col-md-6">
                          <label for="contactNumber">Contact Number</label>
                          <input type="text" class="disabled form-control mt-2" name="contactNumber"
                            value="<?php echo $contactNumber ?>" readonly>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="col-md-6">
                          <label for="houseAddress">Address</label>
                          <input type="text" class="disabled form-control mt-2" name="houseAddress"
                            value="<?php echo $houseAddress ?>" readonly>
                        </div>
                        <div class="col-md-6">
                          <label for="date">Date</label>
                          <input type="text" class="disabled form-control mt-2" name="date"
                            value="<?php echo $conversionDate ?>" readonly>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="col-md-6">
                          <label for="yeargraduated">Year Graduated</label>
                          <input type="text" class="disabled form-control mt-2" name="yeargraduated"
                            value="<?php echo $yeargraduated ?>" readonly>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <label for="process">Process Method</label>
                        <div class="col-md-6">
                          <select name="process" class="purpose form-select mt-2" style="padding: 10px;">
                            <option disabled selected value>Choose process method</option>
                            <option value="walk-in">Walk-in</option>
                            <option value="online">Online</option>
                          </select>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col">
                          <label for="purpose">Purpose</label>
                          <textarea class="purpose form-control mt-2" name="purpose" id="exampleTextarea1"
                            rows="8"></textarea>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col text-end">
                          <button type="submit" class="btn" name="submitButton"
                            style="padding: 10px; background-color: #00274C; color: white;">
                            <i class="bi bi-box-arrow-right"></i> Submit Request
                          </button>
                        </div>
                      </div>
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

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
  <script src="js/validationSubmit.js"></script>
</body>

</html>