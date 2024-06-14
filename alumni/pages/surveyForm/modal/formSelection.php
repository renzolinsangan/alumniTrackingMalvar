<style>
  .modal-header {
    border: none;
  }

  .container .row .col .card {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    padding: 40px;
    width: 100%;
  }

  .container .row .col .studying-card,
  .container .row .col .notsw-card,
  .container .row .col .working-card,
  .container .row .col .sw-card {
    text-decoration: none;
  }

  .container .row .col .studying-card .card:hover,
  .container .row .col .notsw-card .card:hover,
  .container .row .col .working-card .card:hover,
  .container .row .col .sw-card .card:hover {
    background-color: #00274C;
    color: white;
  }
</style>
<!-- DATA -->
<?php include ("sql/indexSQL.php"); ?>
<!-- Modal -->
<div class="modal fade" id="formSelection" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header mb-2">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body mb-5">
        <div class="container">
          <h2>
            Which survey would you like to take?
          </h2>
          <p class="text-body-secondary mb-5">
            Note: Please note that after you select a tracer survey form, you must avoid to exit or return
            or else your data will be reset.
          </p>
          <div class="row">
            <?php
            if (!$studyingresult) {
              ?>
              <div class="col">
                <a class="studying-card" href="phpConnection/studyingForm/index.php">
                  <div class="card">
                    <h4>Alumni Studying & Not Working</h4>
                    <img class="mb-2" src="images/study.png" alt="Studying Icon" height="100" width="100">
                  </div>
                </a>
              </div>
              <?php
            } else {
              ?>
              <div class="col">
                <a class="studying-card" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                  <div class="card">
                    <h4>Alumni Studying & Not Working</h4>
                    <img class="mb-2" src="images/study.png" alt="Studying Icon" height="100" width="100">
                  </div>
                </a>
              </div>
              <?php
            }
            ?>
            <?php
            if (!$workingresult) {
              ?>
              <div class="col">
                <a class="working-card" href="phpConnection/WorkingForm/index.php">
                  <div class="card">
                    <h4>Alumni Working & Not Studying</h4>
                    <img class="mb-2" src="images/work.png" alt="Working Icon" height="100" width="100">
                  </div>
                </a>
              </div>
              <?php
            } else {
              ?>
              <div class="col">
                <a class="working-card" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                  <div class="card">
                    <h4>Alumni Working & Not Studying</h4>
                    <img class="mb-2" src="images/work.png" alt="Working Icon" height="100" width="100">
                  </div>
                </a>
              </div>
              <?php
            }
            ?>
            <?php
            if (!$swresult) {
              ?>
              <div class="col">
                <a class="sw-card" href="phpConnection/SWForm/index.php">
                  <div class="card">
                    <h4>Alumni Studying & Working</h4>
                    <img src="images/working&studying.png" alt="Studying/Working Icon" height="108" width="108">
                  </div>
                </a>
              </div>
              <?php
            } else {
              ?>
              <div class="col">
                <a class="sw-card" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                  <div class="card">
                    <h4>Alumni Studying & Working</h4>
                    <img src="images/working&studying.png" alt="Studying/Working Icon" height="100" width="100">
                  </div>
                </a>
              </div>
              <?php
            }
            ?>
            <?php
            if (!$notswresult) {
              ?>
              <div class="col">
                <a class="notsw-card" href="phpConnection/notSWForm/index.php">
                  <div class="card">
                    <h4>Alumni Not Studying & Not Working</h4>
                    <img src="images/noticon.png" alt="Not Studying/Working Icon" height="108" width="108">
                  </div>
                </a>
              </div>
              <?php
            } else {
              ?>
              <div class="col">
                <a class="notsw-card" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                  <div class="card">
                    <h4>Alumni Not Studying & Not Working</h4>
                    <img src="images/noticon.png" alt="Not Studying/Working Icon" height="108" width="108">
                  </div>
                </a>
              </div>
              <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- MODAL FOR RETURN TO INDEX -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-body p-5">
        <h3>You've already answered this survey.</h3>
        <p class="text-body-secondary fs-5 mt-2">If you have concern, you can access and edit the survey generated in
          the indec form, press return to exit.</p>
      </div>
      <div class="modal-footer" style="border-top: none; margin-top: -10px;">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-arrow-return-left"></i>
          Return</button>
      </div>
    </div>
  </div>
</div>