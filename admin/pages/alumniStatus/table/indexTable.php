<!-- SQL FOR STUDYING TABLE -->
<?php
include ("phpConnection/config.php");

// Fetch all alumni studying data
$sqlStudyingData = "SELECT * FROM alumnistudying";
$stmtStudyingData = $db->prepare($sqlStudyingData);
$stmtStudyingData->execute();
$studyingData = $stmtStudyingData->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- STUDYING TABLE -->
<div class="row mb-3" id="studyingTable" style="display: none;">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header">
        <h3 class="mt-2 mb-2">Alumni Studying & Not Working</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="studying" class="table text-center">
            <thead class="table-header">
              <tr>
                <th scope="col">Full Name</th>
                <th scope="col">Status</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($studyingData as $row) {
                // Fetch full name for each user_id
                $sqlFullName = "SELECT fullName FROM user_account WHERE user_id = ?";
                $stmtFullName = $db->prepare($sqlFullName);
                $stmtFullName->execute([$row['user_id']]);
                $user = $stmtFullName->fetch(PDO::FETCH_ASSOC);
                $fullName = htmlspecialchars($user['fullName']);
                ?>
                <tr>
                  <td><?php echo $fullName ?></td>
                  <td>Studying</td>
                  <td><?php echo $row['date'] ?></td>
                  <td class="d-flex justify-content-center align-items-center">
                    <div class="row">
                      <div class="col">
                        <a href="survey/studyingSurvey.php?user_id=<?php echo $row['user_id'] ?>"
                          style="text-decoration: none; color: #00274C;">
                          <i class="bi bi-file-earmark-arrow-down fs-5"></i>
                        </a>
                      </div>
                      <div class="col">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#studyingHistory_<?php echo $row['user_id'] ?>"
                          style="text-decoration: none; color: #00274C;">
                          <i class="bi bi-eye fs-5"></i>
                        </a>
                      </div>
                      <div class="col">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#deletestudying_<?php echo $row['user_id'] ?>"
                          style="text-decoration: none; color: red;">
                          <i class="bi bi-trash fs-5"></i>
                        </a>
                      </div>
                    </div>
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

<!-- SQL FOR WORKING TABLE -->
<?php
// Fetch all alumni studying data
$sqlWorkingData = "SELECT * FROM alumniworking";
$stmtWorkingData = $db->prepare($sqlWorkingData);
$stmtWorkingData->execute();
$workingData = $stmtWorkingData->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- WOKRING TABLE -->
<div class="row mb-3" id="workingTable" style="display: none;">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header">
        <h3 class="mt-2 mb-2">Alumni Working & Not Studying</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="working" class="table text-center">
            <thead class="table-header">
              <tr>
                <th scope="col">Full Name</th>
                <th scope="col">Status</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <?php
            foreach ($workingData as $row) {
              // Fetch full name for each user_id
              $sqlFullName = "SELECT fullName FROM user_account WHERE user_id = ?";
              $stmtFullName = $db->prepare($sqlFullName);
              $stmtFullName->execute([$row['user_id']]);
              $user = $stmtFullName->fetch(PDO::FETCH_ASSOC);
              $fullName = htmlspecialchars($user['fullName']);
              ?>
              <tr>
                <td><?php echo $fullName ?></td>
                <td>Working</td>
                <td><?php echo $row['date'] ?></td>
                <td class="d-flex justify-content-center align-items-center">
                  <div class="row">
                    <div class="col">
                      <a href="survey/workingSurvey.php?user_id=<?php echo $row['user_id'] ?>"
                        style="text-decoration: none; color: #00274C;">
                        <i class="bi bi-file-earmark-arrow-down fs-5" style="color: #00274C;"></i>
                      </a>
                    </div>
                    <div class="col">
                      <a href="#" data-bs-toggle="modal" data-bs-target="#workingHistory_<?php echo $row['user_id'] ?>"
                        style="text-decoration: none; color: #00274C;">
                        <i class="bi bi-eye fs-5"></i>
                      </a>
                    </div>
                    <div class="col">
                      <a href="#" data-bs-toggle="modal" data-bs-target="#deleteworking_<?php echo $row['user_id'] ?>"
                        style="text-decoration: none; color: red;">
                        <i class="bi bi-trash fs-5"></i>
                      </a>
                    </div>
                  </div>
                </td>
              </tr>
              <?php
            }
            ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- SQL FOR STUDYING AND WORKING TABLE -->
<?php
// Fetch all alumni studying data
$sqlSWData = "SELECT * FROM alumnisw";
$stmtSWData = $db->prepare($sqlSWData);
$stmtSWData->execute();
$swData = $stmtSWData->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- SW TABLE -->
<div class="row mb-3" id="swTable" style="display: none;">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header">
        <h3 class="mt-2 mb-2">Alumni Studying & Working</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="sw" class="table text-center">
            <thead class="table-header">
              <tr>
                <th scope="col">Full Name</th>
                <th scope="col">Status</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <?php
            foreach ($swData as $row) {
              // Fetch full name for each user_id
              $sqlFullName = "SELECT fullName FROM user_account WHERE user_id = ?";
              $stmtFullName = $db->prepare($sqlFullName);
              $stmtFullName->execute([$row['user_id']]);
              $user = $stmtFullName->fetch(PDO::FETCH_ASSOC);
              $fullName = htmlspecialchars($user['fullName']);
              ?>
              <tr>
                <td><?php echo $fullName ?></td>
                <td>Studying & Working</td>
                <td><?php echo $row['date'] ?></td>
                <td class="d-flex justify-content-center align-items-center">
                  <div class="row">
                    <div class="col">
                      <a href="survey/swSurvey.php?user_id=<?php echo $row['user_id'] ?>"
                        style="text-decoration: none; color: #00274C;">
                        <i class="bi bi-file-earmark-arrow-down fs-5" style="color: #00274C;"></i>
                      </a>
                    </div>
                    <div class="col">
                      <a href="#" data-bs-toggle="modal" data-bs-target="#swHistory_<?php echo $row['user_id'] ?>"
                        style="text-decoration: none; color: #00274C;">
                        <i class="bi bi-eye fs-5"></i>
                      </a>
                    </div>
                    <div class="col">
                      <a href="#" data-bs-toggle="modal" data-bs-target="#deletesw_<?php echo $row['user_id'] ?>"
                        style="text-decoration: none; color: red;">
                        <i class="bi bi-trash fs-5"></i>
                      </a>
                    </div>
                  </div>
                </td>
              </tr>
              <?php
            }
            ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- SQL FOR NOT STUDYING AND WORKING TABLE -->
<?php
// Fetch all alumni studying data
$sqlNotSWData = "SELECT * FROM alumninotsw";
$stmtNotSWData = $db->prepare($sqlNotSWData);
$stmtNotSWData->execute();
$notSWData = $stmtNotSWData->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- NOT SW TABLE -->
<div class="row mb-3" id="notswTable" style="display: none;">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header">
        <h3 class="mt-2 mb-2">Alumni Not Studying & Not Working</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="notsw" class="table text-center">
            <thead class="table-header">
              <tr>
                <th scope="col">Full Name</th>
                <th scope="col">Status</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <?php
            foreach ($notSWData as $row) {
              // Fetch full name for each user_id
              $sqlFullName = "SELECT fullName FROM user_account WHERE user_id = ?";
              $stmtFullName = $db->prepare($sqlFullName);
              $stmtFullName->execute([$row['user_id']]);
              $user = $stmtFullName->fetch(PDO::FETCH_ASSOC);
              $fullName = htmlspecialchars($user['fullName']);
              ?>
              <tr>
                <td><?php echo $fullName ?></td>
                <td>Not Studying & Not Working</td>
                <td><?php echo $row['date'] ?></td>
                <td class="d-flex justify-content-center align-items-center">
                  <div class="row">
                    <div class="col">
                      <a href="survey/notSWSurvey.php?user_id=<?php echo $row['user_id'] ?>"
                        style="text-decoration: none; color: #00274C;">
                        <i class="bi bi-file-earmark-arrow-down fs-5" style="color: #00274C;"></i>
                      </a>
                    </div>
                    <div class="col">
                      <a href="#" data-bs-toggle="modal" data-bs-target="#notSWHistory_<?php echo $row['user_id'] ?>"
                        style="text-decoration: none; color: #00274C;">
                        <i class="bi bi-eye fs-5"></i>
                      </a>
                    </div>
                    <div class="col">
                      <a href="#" data-bs-toggle="modal" data-bs-target="#deletenotsw_<?php echo $row['user_id'] ?>"
                        style="text-decoration: none; color: red;">
                        <i class="bi bi-trash fs-5"></i>
                      </a>
                    </div>
                  </div>
                </td>
              </tr>
              <?php
            }
            ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- MODAL FOR EACH TABLE -->
<?php include ("modal/tableModal.php"); ?>
<?php include ("modal/deleteModal.php"); ?>