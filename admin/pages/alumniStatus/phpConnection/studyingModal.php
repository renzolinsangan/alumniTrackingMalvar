<!-- Modal -->
<style>
  .modal-dialog {
    padding: 10px;
  }

  .modal-header {
    border: none;
  }

  .modal .modal-dialog .modal-content .modal-body .table-responsive {
    display: block;
    width: 100%;
    overflow-x: auto;
  }

  .table-responsive .table {
    width: max-content;
    min-width: 100%;
    border-collapse: collapse;
  }

  .table-responsive .table .table-header th {
    color: white;
    font-weight: normal;
    text-align: center;
    overflow: hidden;
    background-color: #00274C;
  }

  .table-responsive .table .table-body td {
    overflow: hidden;
    text-align: center;
  }
</style>
<div class="modal fade" id="studyingHistory_<?php echo $user_id ?>" data-bs-backdrop="static" data-bs-keyboard="false"
  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
        include("config.php");
        $sqlFullName = "SELECT fullName FROM user_account WHERE user_id = ?";
        $stmtFullName = $db->prepare($sqlFullName);
        $stmtFullName->execute([$user_id]);
        $fullname = $stmtFullName->fetch(PDO::FETCH_ASSOC);
        ?>
        <h1 class="text-start" style="color: #00274C;">History Update</h1>
        <h4 class="text-start">
          <?php echo $fullname['fullName']; ?>
        </h4>
        <p class="text-body-secondary text-start mb-3">(Studying)</p>
        <div class="card mb-5 ps-3">
          <?php
          $sqlHistoryDetails = "SELECT * FROM studyinghistory WHERE user_id = ?";
          $stmtHistoryDetails = $db->prepare($sqlHistoryDetails);
          $stmtHistoryDetails->execute([$user_id]);

          while ($historydetails = $stmtHistoryDetails->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <div class="card-body">
              <h2 class="text-start mt-2">History Details
                <span class="text-body-secondary">(<?php echo $historydetails['date']; ?>)</span>
              </h2>
              <div class="row">
                <div class="col-md-6 text-start">
                  <label for="schoolname" style="color: #00274C; font-size: 30px;">School Name</label>
                  <p class="text-body-secondary">
                    <?php echo $historydetails['schoolname']; ?>
                  </p>
                </div>
                <div class="col-md-6 text-start">
                  <label for="course" style="color: #00274C; font-size: 30px;">Course</label>
                  <p class="text-body-secondary">
                    <?php echo $historydetails['course']; ?>
                  </p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 text-start">
                  <label for="department" style="color: #00274C; font-size: 30px;">Department</label>
                  <p class="text-body-secondary">
                    <?php echo $historydetails['department']; ?>
                  </p>
                </div>
                <div class="col-md-6 text-start">
                  <label for="location" style="color: #00274C; font-size: 30px;">Location</label>
                  <p class="text-body-secondary">
                    <?php echo $historydetails['location']; ?>
                  </p>
                </div>
              </div>
            </div>
            <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>