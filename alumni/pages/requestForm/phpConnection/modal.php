<!-- MODAL FOR CHOOSING THE FORM -->
<div class="modal fade" id="documentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body mt-4">
        <h3>Which document would you like to request?</h3>
        <p class="text-body-secondary">
          NOTE: Tracer Survey Form mush be accomplished first before requesting for academic requirements.
          Failure to do so will invalidate the submitted request form and not be approved.
        </p>
        <div class="row mt-5 mb-5">
          <div class="col">
            <a href="certificate/index.php">
              <div class="certificate-card card">
                <div class="row">
                  <div class="col mt-3">
                    <h4 class="text-center">
                      Certificate of Graduation
                    </h4>
                  </div>
                </div>
                <div class="row">
                  <div class="col text-center">
                    <i class="bi bi-file-text" style="font-size: 50px;"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col">
            <a href="form137/index.php">
              <div class="form137-card card">
                <div class="row">
                  <div class="col mt-3">
                    <h4 class="text-center">
                      Form 137
                    </h4>
                    <br>
                  </div>
                </div>
                <div class="row">
                  <div class="col text-center">
                    <i class="bi bi-file-text" style="font-size: 50px;"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col">
            <a href="goodmoral/index.php">
              <div class="goodmoral-card card">
                <div class="row">
                  <div class="col mt-3">
                    <h4 class="text-center">
                      Good Moral
                    </h4>
                    <br>
                  </div>
                </div>
                <div class="row">
                  <div class="col text-center">
                    <i class="bi bi-file-text" style="font-size: 50px;"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col">
            <a href="otherDocuments/index.php">
              <div class="others-card card">
                <div class="row">
                  <div class="col mt-3">
                    <h4 class="text-center">
                      Other Document
                    </h4>
                    <br>
                  </div>
                </div>
                <div class="row">
                  <div class="col text-center">
                    <i class="bi bi-file-text" style="font-size: 50px;"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include ("modalSQL.php"); ?>
<!-- MODAL FOR ONLINE CERTIFICATE -->
<div class="modal fade" id="onlineCertificate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body mb-5">
        <?php
        if ($stmtOnlineCertificate->rowCount() > 0) {
          while ($onlinecertificate = $stmtOnlineCertificate->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <div class="row mt-3">
              <div class="col">
                <h3 style="color: <?php echo ($onlinecertificate['status'] === 'approve') ? 'green' : 'red'; ?>">
                  <?php echo ucfirst($onlinecertificate['status']) ?>
                </h3>
              </div>
              <div class="col">
                <h4 class="text-end">
                  <?php echo $onlinecertificate['date'] ?>
                </h4>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <h4>
                  Purpose on Document Request
                </h4>
                <p class="text-body-secondary">
                  <?php echo $onlinecertificate['purpose'] ?>
                </p>
              </div>
              <div class="col-12">
                <h5>
                  Document:
                </h5>
                <?php
                if (empty ($onlinecertificate['document'])) {
                  ?>
                  <p class="text-body-secondary">There is no document uploaded.</p>
                  <?php
                } else {
                  ?>
                  <a href="../../../admin/pages/manageForms/requestedDocument/<?php echo $onlinecertificate['document'] ?>">
                    <?php echo $onlinecertificate['document'] ?>
                  </a>
                  <?php
                }
                ?>
              </div>
            </div>
            <?php
          }
        } else {
          ?>
          <h2>You have no document requested online.</h2>
          <p class="text-body-secondary">There is no data available to show.</p>
          <?php
        }
        ?>
      </div>
    </div>
  </div>
</div>

<!-- MODAL FOR ONLINE FORM137 -->
<div class="modal fade" id="onlineForm137" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body mb-5">
        <?php
        if ($stmtOnlineForm137->rowCount() > 0) {
          while ($onlineform137 = $stmtOnlineForm137->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <div class="row mt-3">
              <div class="col">
                <h3 style="color: <?php echo ($onlineform137['status'] === 'approve') ? 'green' : 'red'; ?>">
                  <?php echo ucfirst($onlineform137['status']) ?>
                </h3>
              </div>
              <div class="col">
                <h4 class="text-end">
                  <?php echo $onlineform137['date'] ?>
                </h4>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <h4>
                  Purpose on Document Request
                </h4>
                <p class="text-body-secondary">
                  <?php echo $onlineform137['purpose'] ?>
                </p>
              </div>
              <div class="col-12">
                <h5>
                  Document:
                </h5>
                <?php
                if (empty ($onlineform137['document'])) {
                  ?>
                  <p class="text-body-secondary">There is no document uploaded.</p>
                  <?php
                } else {
                  ?>
                  <a href="../../../admin/pages/manageForms/requestedDocument/<?php echo $onlineform137['document'] ?>">
                    <?php echo $onlineform137['document'] ?>
                  </a>
                  <?php
                }
                ?>
              </div>
            </div>
            <?php
          }
        } else {
          ?>
          <h2>You have no document requested online.</h2>
          <p class="text-body-secondary">There is no data available to show.</p>
          <?php
        }
        ?>
      </div>
    </div>
  </div>
</div>

<!-- MODAL FOR ONLINE GOODMORAL -->
<div class="modal fade" id="onlineGoodMoral" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body mb-5">
        <?php
        if ($stmtOnlineGoodMoral->rowCount() > 0) {
          while ($onlinegoodmoral = $stmtOnlineGoodMoral->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <div class="row mt-3">
              <div class="col">
                <h3 style="color: <?php echo ($onlinegoodmoral['status'] === 'approve') ? 'green' : 'red'; ?>">
                  <?php echo ucfirst($onlinegoodmoral['status']) ?>
                </h3>
              </div>
              <div class="col">
                <h4 class="text-end">
                  <?php echo $onlinegoodmoral['date'] ?>
                </h4>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <h4>
                  Purpose on Document Request
                </h4>
                <p class="text-body-secondary">
                  <?php echo $onlinegoodmoral['purpose'] ?>
                </p>
              </div>
              <div class="col-12">
                <h5>
                  Document:
                </h5>
                <?php
                if (empty ($onlinegoodmoral['document'])) {
                  ?>
                  <p class="text-body-secondary">There is no document uploaded.</p>
                  <?php
                } else {
                  ?>
                  <a href="../../../admin/pages/manageForms/requestedDocument/<?php echo $onlinegoodmoral['document'] ?>">
                    <?php echo $onlinegoodmoral['document'] ?>
                  </a>
                  <?php
                }
                ?>
              </div>
            </div>
            <?php
          }
        } else {
          ?>
          <h2>You have no document requested online.</h2>
          <p class="text-body-secondary">There is no data available to show.</p>
          <?php
        }
        ?>
      </div>
    </div>
  </div>
</div>

<!-- MODAL FOR ONLINE OTHERDOCUMENTS -->
<div class="modal fade" id="onlineOtherDocuments" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body mb-5">
        <?php
        if ($stmtOnlineOtherDocuments->rowCount() > 0) {
          while ($onlineotherdocuments = $stmtOnlineOtherDocuments->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <div class="row mt-3">
              <div class="col">
                <h3 style="color: <?php echo ($onlineotherdocuments['status'] === 'approve') ? 'green' : 'red'; ?>">
                  <?php echo ucfirst($onlineotherdocuments['status']) ?>
                </h3>
              </div>
              <div class="col">
                <h4 class="text-end">
                  <?php echo $onlineotherdocuments['date'] ?>
                </h4>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <h4>
                  Purpose on Document Request
                </h4>
                <p class="text-body-secondary">
                  <?php echo $onlineotherdocuments['purpose'] ?>
                </p>
              </div>
              <div class="col-12">
                <h5>
                  Document:
                </h5>
                <?php
                if (empty ($onlineotherdocuments['document'])) {
                  ?>
                  <p class="text-body-secondary">There is no document uploaded.</p>
                  <?php
                } else {
                  ?>
                  <a
                    href="../../../admin/pages/manageForms/requestedDocument/<?php echo $onlionlineotherdocumentsnegoodmoral['document'] ?>">
                    <?php echo $onlineotherdocuments['document'] ?>
                  </a>
                  <?php
                }
                ?>
              </div>
            </div>
            <?php
          }
        } else {
          ?>
          <h2>You have no document requested online.</h2>
          <p class="text-body-secondary">There is no data available to show.</p>
          <?php
        }
        ?>
      </div>
    </div>
  </div>
</div>