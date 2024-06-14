<?php
include ("phpConnection/restriction.php");
include ("sql/indexSQL.php");
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
  if ($headerlogo) {
    $logo = $headerlogo['logo'];
    ?>
    <link rel="shortcut icon" href="<?php echo $logo ?>" />
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
      if ($headerlogo) {
        $logo = $headerlogo['logo'];
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
      <?php
      if ($headertitle) {
        $uppertitle = $headertitle['upperTitle'];
        $lowertitle = $headertitle['lowerTitle'];
        ?>
        <div class="school-title mt-3 text-align-left" style="margin-left: 10px;">
          <h4>
            <?php echo $uppertitle ?>
          </h4>
          <span class="border-title mb-1"></span>
          <p id="title-below">
            <?php echo $lowertitle ?>
          </p>
        </div>
        <?php
      } else {
        ?>
        <div class="school-title mt-3 text-align-left" style="margin-left: 10px;">
          <h4>
            Malvar Senior High School
          </h4>
          <span class="border-title mb-1"></span>
          <p id="title-below">
            HOME OF THE BLUE GENERALS
          </p>
        </div>
        <?php
      }
      ?>
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
      <a id="profile-nav" href="../alumniStatus/index.php">
        <header>Alumni Status</header>
      </a>
    </div>
    <div class="nav-col d-flex justify-content-start">
      <a id="profile-nav" href="../manageForms/index.php">
        <header>Manage Forms</header>
      </a>
    </div>
    <div class="nav-col d-flex justify-content-start">
      <a id="profile-nav" href="index.php">
        <header>Edit Design</header>
      </a>
    </div>
  </div>

  <!-- MALVAR BACKGROUND IMAGE -->
  <?php
  if ($headerpicture) {
    $headerpicture = $headerpicture['headerPicture']
      ?>
    <div class="container-header mb-3 d-flex flex-column justify-content-end align-items-center"
      style="background-image: url(<?php echo $headerpicture ?>)">
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
                  <h1>Web Design</h1>
                </div>
                <div class="col mb-2">
                  <p class="text-body-secondary">
                    This page will allow you to edit the header and footer of the page.
                  </p>
                </div>
                <div class="col mb-2">
                  <a href="editDesign.php">
                    <button class="btn" style="background-color: #00274C; color: white;">
                      Edit Design
                    </button>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-6 grid-margin stretch-card mb-4">
            <div class="card">
              <div class="card-body">
                <h3>Header Data</h3>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Attribute</th>
                      <th scope="col">Data Name</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include ("sql/indexSQL.php");
                    include ("modal/indexModal.php");
                    // HEADER LOGO
                    if ($headerlogo) {
                      $headerlogo_id = $headerlogo['headerlogo_id'];
                      $logo = $headerlogo['logo'];
                      ?>
                      <tr>
                        <th scope="row">Logo</th>
                        <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                          <?php echo $logo ?>
                        </td>
                        <div>
                          <td class="text-center" data-bs-toggle="modal" data-bs-target="#deletelogo"
                            style="color: red; cursor: pointer;">
                            <i class="bi bi-trash"></i>
                          </td>
                        </div>
                      </tr>
                      <?php
                    } else {
                      ?>
                      <tr>
                        <th scope="row">Logo</th>
                        <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                          images/logoLogin.jpg</td>
                      </tr>
                      <?php
                    }

                    // HEADER PICTURE
                    if ($headerpicture) {
                      $headerPicture = $headerpicture['headerPicture'];
                      ?>
                      <tr>
                        <th scope="row">Mid-header</th>
                        <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                          <?php echo $headerPicture ?>
                        </td>
                        <td class="text-center" data-bs-toggle="modal" data-bs-target="#deletepicture"
                          style="color: red; cursor: pointer;"><i class="bi bi-trash"></i></td>
                      </tr>
                      <?php
                    } else {
                      ?>
                      <tr>
                        <th scope="row">Mid-header</th>
                        <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                          images/LoginBackground.jpg</td>
                      </tr>
                      <?php
                    }

                    // UPPER TITLE AND LOWER TITLE
                    if ($headertitle) {
                      $uppername = $headertitle['upperTitle'];
                      $lowername = $headertitle['lowerTitle'];
                      ?>
                      <tr>
                        <th scope="row">Upper Name
                          <br>Lower Name
                        </th>
                        <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                          <?php echo $uppername ?>
                          <br><?php echo $lowername ?>
                        </td>
                        <td class="text-center" data-bs-toggle="modal" data-bs-target="#deleteheadername"
                          style="color: red; cursor: pointer;"><i class="bi bi-trash"></i></td>
                      </tr>
                      <?php
                    } else {
                      ?>
                      <tr>
                        <th scope="row">Upper Name
                          <br>Lower Name
                        </th>
                        <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                          Malvar Senior High School
                          <br>Home
                          of the Blue Generals
                        </td>
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h3>Footer Data</h3>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Attribute</th>
                      <th scope="col">Data Name</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if ($footerdata) {
                      $contact = $footerdata['contact'];
                      $email = $footerdata['email'];
                      $address = $footerdata['address'];
                      ?>
                      <tr>
                        <th scope="row">
                          Contact No. <br>
                          Email <br>
                          Address
                        </th>
                        <td><?php echo $contact ?> <br>
                          <?php echo $email ?> <br>
                          <?php echo $address ?></td>
                        <td class="text-center" data-bs-toggle="modal" data-bs-target="#deletefooter"
                          style="color: red; cursor: pointer;"><i class="bi bi-trash"></i></td>
                      </tr>
                      <?php
                    } else {
                      ?>
                      <tr>
                        <th scope="row"> Contact No. <br>
                          Email <br>
                          Address</th>
                        <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                          (043) 409 1072 <br>
                          info@shsinmalvar.org <br>
                          Poblacion Malvar, Batangas 4233
                        </td>
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include ("js/script.php"); ?>
</body>

</html>