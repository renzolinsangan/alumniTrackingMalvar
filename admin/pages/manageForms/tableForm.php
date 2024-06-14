<!-- CERTIFICATE OF GRADUATION -->
<style>
  #certificateCard,
  #form137Card,
  #goodmoralCard,
  #othersCard {
    display: none;
    padding: 10px;
    min-height: 60vh;
  }

  .table-responsive {
    display: block;
    width: 100%;
    overflow-x: auto;
  }

  .table-responsive .table {
    width: max-content;
    min-width: 100%;
    border-collapse: collapse;
  }

  .table-responsive .table .table-header {
    background-color: #00274C;
  }

  .table-responsive .table .table-header th {
    color: white;
    font-weight: normal;
    text-align: center;
    overflow: hidden;
  }

  .table-responsive .table .table-body td {
    overflow: hidden;
    text-align: left;
  }

  #emailAddress,
  #approvedDate {
    border: none;
    border-bottom: 1px solid #ccc;
    border-radius: 0;
    padding: 10px;
  }

  #emailAddress:focus,
  #approvedDate:focus {
    box-shadow: none;
    border-bottom: 2px solid #00274C;
  }

  #messageTextArea {
    padding: 10px;
    resize: none;
    overflow-x: hidden;
  }

  #messageTextArea:focus {
    border-color: #00274C;
    box-shadow: 0 0 0 0.15rem rgba(0, 0, 139, 0.5);
  }
</style>

<div class="card" id="certificateCard">
  <div class="card-body">
    <h1>Certificate of Graduation</h1>
    <div class="table-responsive">
      <table id="certificate" class="table text-center">
        <thead class="table-header">
          <tr>
            <th scope="col">Full Name</th>
            <th scope="col">Year Graduated</th>
            <th scope="col">Strand</th>
            <th scope="col">Email Address</th>
            <th scope="col">Contact Number</th>
            <th scope="col">Address</th>
            <th scope="col">Date</th>
            <th scope="col">Process Method</th>
            <th scope="col">Purpose</th>
            <th scope="col">Studying Survey</th>
            <th scope="col">Working Survey</th>
            <th scope="col">Status</th>
            <th scope="col">Document</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody class="table-body">
          <?php
          include("phpConnection/tableData.php");
          while ($certificateDetails = $stmtCertificateData->fetch(PDO::FETCH_ASSOC)) {
            $certificate_id = $certificateDetails['certificate_id'];
            $user_id = $certificateDetails['user_id'];
            $fullName = $certificateDetails['fullName'];
            $yeargraduated = $certificateDetails['yeargraduated'];
            $strand = $certificateDetails['strand'];
            $emailAddress = $certificateDetails['emailAddress'];
            $contactNumber = $certificateDetails['contactNumber'];
            $houseAddress = $certificateDetails['houseAddress'];
            $date = $certificateDetails['date'];
            $process = $certificateDetails['process'];
            $purpose = $certificateDetails['purpose'];
            $status = $certificateDetails['status'];
            $document = $certificateDetails['document'];
            ?>
            <tr>
              <td>
                <?php echo $fullName ?>
              </td>
              <td style="text-align: center;">
                <?php echo $yeargraduated ?>
              </td>
              <td style="text-align: center;">
                <?php echo $strand ?>
              </td>
              <td>
                <?php echo $emailAddress ?>
              </td>
              <td style="text-align: center;">
                <?php echo $contactNumber ?>
              </td>
              <td>
                <?php echo $houseAddress ?>
              </td>
              <td>
                <?php echo $date ?>
              </td>
              <td style="text-align: center;">
                <?php echo $process ?>
              </td>
              <td>
                <?php echo $purpose ?>
              </td>
              <td>
                <?php
                $sqlStudyingCount = "SELECT fullName FROM alumnistudying WHERE user_id = ?";
                $stmtStudyingCount = $db->prepare($sqlStudyingCount);
                $stmtStudyingCount->execute([$user_id]);

                if($stmtStudyingCount->rowCount() == 0) {
                  ?>
                  <p style="color: red;">No Survey</p>
                  <?php
                } else {
                  ?>
                  <p style="color: green;">Survey Confirmed</p>
                  <?php
                }
                ?>
              </td>
              <td>
                <?php
                $sqlWorkingCount = "SELECT fullName FROM alumniworking WHERE user_id = ?";
                $stmtWorkingCount = $db->prepare($sqlWorkingCount);
                $stmtWorkingCount->execute([$user_id]);

                if($stmtWorkingCount->rowCount() == 0) {
                  ?>
                  <p style="color: red;">No Survey</p>
                  <?php
                } else {
                  ?>
                  <p style="color: green;">Survey Confirmed</p>
                  <?php
                }
                ?>
              </td>
              <td style="text-align: center; <?php echo ($status == 'approve') ? 'color: green;' : 'color: red;' ?>">
                <?php echo ucfirst($status) ?>
              </td>
              <td>
                <?php
                $documentPath = 'requestedDocument/' . $certificateDetails['document'];
                if (file_exists($documentPath)) {
                  echo '<a href="' . $documentPath . '" download>' . $certificateDetails['document'] . '</a>';
                } else {
                  echo 'Document not found';
                }
                ?>
              </td>
              <td style="font-size: 18px; overflow: hidden; text-align: center;">
                <?php
                if ($process == 'online') {
                  ?>
                  <a href="#" class="link-dark" style="margin-right: 5px;" data-bs-toggle="modal"
                    data-bs-target="#approveCRequest_<?php echo $user_id ?>_<?php echo $certificate_id ?>">
                    <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom"
                      title="Manage Survey Form" style="color: #00274C;"></i></a>
                  <a href="#" class="link-dark" style="margin-right: 5px;" data-bs-toggle="modal"
                    data-bs-target="#certificateModal_<?php echo $user_id ?>">
                    <i class="bi bi-file-earmark-arrow-up" data-bs-toggle="tooltip" data-bs-placement="bottom"
                      title="Upload Requirements" style="color: #00274C;"></i>
                    <?php
                } else {
                  ?>
                    <a href="#" class="link-dark" style="margin-right: 5px;" data-bs-toggle="modal"
                      data-bs-target="#approveCRequest_<?php echo $user_id ?>_<?php echo $certificate_id ?>">
                      <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Manage Survey Form" style="color: #00274C;"></i></a>
                    <?php
                }
                ?>
                </a>
              </td>
            </tr>
            <!-- MODAL FOR UPLOADING CERTIFICATE -->
            <div class="modal fade" id="certificateModal_<?php echo $user_id ?>" data-bs-backdrop="static"
              data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog" style="margin-top: 25vh;">
                <div class="modal-content" style="padding: 10px;">
                  <div class="modal-body">
                    <form action="uploadDocument.php" method="POST" enctype="multipart/form-data">
                      <div class="text-start mb-3">
                        <p class="text-body-secondary">Note: The document will only be uploaded if the alumni request is
                          approved and choose online as process method.</p>
                        <label for="fileInput" class="form-label mb-3" style="font-size: 25px;">Upload Certificate</label>
                        <input type="hidden" name="alumni_id" value="<?php echo $user_id ?>">
                        <input type="file" name="certificate" class="form-control" id="fileInput" accept=".pdf">
                      </div>
                      <div class="modal-button mt-4 d-flex justify-content-end align-items-end">
                        <button type="button" class="btn" data-bs-dismiss="modal"
                          style="margin-right: 2vh; padding: 0; outline: none;">Cancel</button>
                        <button type="submit" class="btn" name="uploadCertificate"
                          style="color: #00274C; margin-top: 2vh; padding: 0; outline: none;">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- MODAL FOR APPROVING REQUEST -->
            <div class="modal fade" id="approveCRequest_<?php echo $user_id ?>_<?php echo $certificate_id ?>"
              data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
              aria-hidden="true">
              <!-- DATA FOR APPROVAL -->
              <?php
              $sqlCertificateModalData = "SELECT fullName, emailAddress, process, status FROM certificate 
              WHERE user_id = ? AND certificate_id = ?";
              $stmtCertificateModalData = $db->prepare($sqlCertificateModalData);
              $stmtCertificateModalData->execute([$user_id, $certificate_id]);
              $certificateResult = $stmtCertificateModalData->fetch(PDO::FETCH_ASSOC);
              ?>
              <div class="modal-dialog modal-lg">
                <div class="modal-content" style="padding: 10px;">
                  <div class="modal-header" style="border: none;">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form
                    action="email/emailCertificate.php?user_id=<?php echo $user_id ?>&certificate_id=<?php echo $certificate_id ?>"
                    method="POST">
                    <div class="modal-body mb-5">
                      <div class="row">
                        <h1 style="color: #00274C;">Certificate Request Approval</h1>
                        <p class="text-body-secondary">Note: This form will allow you to approve the request of this
                          alumni
                          which will send an email
                          with the date and details for the appointment request.</p>
                      </div>
                      <div class="row mb-4">
                        <div class="col-md-6">
                          <label for="fullname" style="font-size: 30px; color: #00274C;">Full Name</label>
                          <p style="font-size: 20px;">
                            <?php echo $certificateResult['fullName'] ?>
                          </p>
                        </div>
                        <div class="col-md-6">
                          <label for="process" style="font-size: 30px; color: #00274C;">Process</label>
                          <p style="font-size: 20px;">
                            <?php echo $certificateResult['process'] ?>
                          </p>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="col-md-6">
                          <label for="emailAddress" style="font-size: 30px; color: #00274C;">Email Address</label>
                          <input type="text" class="form-control" name="emailAddress" id="emailAddress"
                            value="<?php echo $certificateResult['emailAddress'] ?>" readonly>
                        </div>
                        <div class="col-md-6">
                          <label for="approvedDate" style="font-size: 30px; color: #00274C;">Approved Date</label>
                          <input type="date" class="form-control" name="approvedDate" id="approvedDate"
                            placeholder="Input the approved date here" min="<?php echo date('Y-m-d'); ?>">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="message" style="font-size: 30px; color: #00274C;">Message</label>
                          <textarea class="purpose form-control mt-2" name="message" id="messageTextArea"
                            rows="8"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer" style="border: none;">
                      <button type="submit" class="btn" name="approveCertificate"
                        style="background-color: #00274C; color: white; padding: 10px;">Approve Request <i
                          class="bi bi-check2"></i></button>
                  </form>
                </div>
              </div>
            </div>
      </div>
      <?php
          }
          ?>
    <?php
    ?>
    </tbody>
    </table>
  </div>
</div>
</div>

<!-- FORM 137 -->
<div class="card" id="form137Card" >
  <div class="card-body">
    <h1>Form 137</h1>
    <div class="table-responsive">
      <table id="form137" class="table text-center">
        <thead class="table-header">
          <tr>
            <th scope="col">Full Name</th>
            <th scope="col">Year Graduated</th>
            <th scope="col">Strand</th>
            <th scope="col">Email Address</th>
            <th scope="col">Contact Number</th>
            <th scope="col">Address</th>
            <th scope="col">Date</th>
            <th scope="col">Process Method</th>
            <th scope="col">Purpose</th>
            <th scope="col">Studying Survey</th>
            <th scope="col">Working Survey</th>
            <th scope="col">Status</th>
            <th scope="col">Document</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody class="table-body">
          <?php
          include("phpConnection/tableData.php");
          while ($form137Details = $stmtForm137Data->fetch(PDO::FETCH_ASSOC)) {
            $form137_id = $form137Details['form137_id'];
            $user_id = $form137Details['user_id'];
            $fullName = $form137Details['fullName'];
            $yeargraduated = $form137Details['yeargraduated'];
            $strand = $form137Details['strand'];
            $emailAddress = $form137Details['emailAddress'];
            $contactNumber = $form137Details['contactNumber'];
            $houseAddress = $form137Details['houseAddress'];
            $date = $form137Details['date'];
            $process = $form137Details['process'];
            $purpose = $form137Details['purpose'];
            $status = $form137Details['status'];
            $document = $form137Details['document'];
            ?>
            <tr>
              <input type="hidden" name="alumni_id" value="<?php echo $user_id ?>">
              <td>
                <?php echo $fullName ?>
              </td>
              <td style="text-align: center;">
                <?php echo $yeargraduated ?>
              </td>
              <td style="text-align: center;">
                <?php echo $strand ?>
              </td>
              <td>
                <?php echo $emailAddress ?>
              </td>
              <td style="text-align: center;">
                <?php echo $contactNumber ?>
              </td>
              <td>
                <?php echo $houseAddress ?>
              </td>
              <td>
                <?php echo $date ?>
              </td>
              <td style="text-align: center;">
                <?php echo $process ?>
              </td>
              <td>
                <?php echo $purpose ?>
              </td>
              <td>
                <?php
                $sqlStudyingCount = "SELECT fullName FROM alumnistudying WHERE user_id = ?";
                $stmtStudyingCount = $db->prepare($sqlStudyingCount);
                $stmtStudyingCount->execute([$user_id]);

                if($stmtStudyingCount->rowCount() == 0) {
                  ?>
                  <p style="color: red;">No Survey</p>
                  <?php
                } else {
                  ?>
                  <p style="color: green;">Survey Confirmed</p>
                  <?php
                }
                ?>
              </td>
              <td>
                <?php
                $sqlWorkingCount = "SELECT fullName FROM alumniworking WHERE user_id = ?";
                $stmtWorkingCount = $db->prepare($sqlWorkingCount);
                $stmtWorkingCount->execute([$user_id]);

                if($stmtWorkingCount->rowCount() == 0) {
                  ?>
                  <p style="color: red;">No Survey</p>
                  <?php
                } else {
                  ?>
                  <p style="color: green;">Survey Confirmed</p>
                  <?php
                }
                ?>
              </td>
              <td style="text-align: center; <?php echo ($status == 'approve') ? 'color: green;' : 'color: red;' ?>">
                <?php echo ucfirst($status) ?>
              </td>
              <td>
                <?php
                $documentPath = 'requestedDocument/' . $form137Details['document'];
                if (file_exists($documentPath)) {
                  echo '<a href="' . $documentPath . '" download>' . $form137Details['document'] . '</a>';
                } else {
                  echo 'Document not found';
                }
                ?>
              </td>
              <td style="font-size: 18px; overflow: hidden; text-align: center;">
                <?php
                if ($process == 'online') {
                  ?>
                  <a href="#" class="link-dark" style="margin-right: 5px;" data-bs-toggle="modal"
                    data-bs-target="#approveFRequest_<?php echo $user_id ?>_<?php echo $form137_id ?>">
                    <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom"
                      title="Manage Survey Form" style="color: #00274C;"></i></a>
                  <a href="#" class="link-dark" style="margin-right: 5px;" data-bs-toggle="modal"
                    data-bs-target="#form137Modal_<?php echo $user_id ?>">
                    <i class="bi bi-file-earmark-arrow-up" data-bs-toggle="tooltip" data-bs-placement="bottom"
                      title="Upload Requirements" style="color: #00274C;"></i>
                  </a>
                  <?php
                } else {
                  ?>
                  <a href="#" class="link-dark" style="margin-right: 5px;" data-bs-toggle="modal"
                    data-bs-target="#approveFRequest_<?php echo $user_id ?>_<?php echo $form137_id ?>">
                    <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom"
                      title="Manage Survey Form" style="color: #00274C;"></i></a>
                  <?php
                }
                ?>
              </td>
            </tr>

            <!-- MODAL FOR UPLOADING FORM 137 -->
            <div class="modal fade" id="form137Modal_<?php echo $user_id ?>" data-bs-backdrop="static"
              data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog" style="margin-top: 25vh;">
                <div class="modal-content" style="padding: 10px;">
                  <form action="uploadDocument.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                      <div class="text-start mb-3">
                        <p class="text-body-secondary">Note: The document will only be uploaded if the alumni request is
                          approved and choose online as process method.</p>
                        <label for="fileInput" class="form-label mb-3" style="font-size: 25px;">Upload Form 137</label>
                        <input type="hidden" name="alumni_id" value="<?php echo $user_id ?>">
                        <input type="file" name="form137" class="form-control" id="fileInput" accept=".pdf">
                      </div>
                      <div class="modal-button mt-4 d-flex justify-content-end align-items-end">
                        <button type="button" class="btn" data-bs-dismiss="modal"
                          style="margin-right: 2vh; padding: 0; outline: none;">Cancel</button>
                        <button type="submit" class="btn" name="uploadForm137"
                          style="color: #00274C; margin-top: 2vh; padding: 0; outline: none;">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- MODAL FOR APPROVING REQUEST -->
            <div class="modal fade" id="approveFRequest_<?php echo $user_id ?>_<?php echo $form137_id ?>"
              data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
              aria-hidden="true">
              <!-- DATA FOR APPROVAL -->
              <?php
              $sqlForm137ModalData = "SELECT fullName, emailAddress, process, status FROM form137 
              WHERE user_id = ? AND form137_id = ?";
              $stmtForm137ModalData = $db->prepare($sqlForm137ModalData);
              $stmtForm137ModalData->execute([$user_id, $form137_id]);
              $form137Result = $stmtForm137ModalData->fetch(PDO::FETCH_ASSOC);
              ?>
              <div class="modal-dialog modal-lg">
                <div class="modal-content" style="padding: 10px;">
                  <div class="modal-header" style="border: none;">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form
                    action="email/emailForm137.php?user_id=<?php echo $user_id ?>&form137_id=<?php echo $form137_id ?>"
                    method="POST">
                    <div class="modal-body mb-5">
                      <div class="row">
                        <h1 style="color: #00274C;">Form 137 Request Approval</h1>
                        <p class="text-body-secondary">Note: This form will allow you to approve the request of this
                          alumni
                          which will send an email
                          with the date and details for the appointment request.</p>
                      </div>
                      <div class="row mb-4">
                        <div class="col-md-6">
                          <label for="fullname" style="font-size: 30px; color: #00274C;">Full Name</label>
                          <p style="font-size: 20px;">
                            <?php echo $form137Result['fullName'] ?>
                          </p>
                        </div>
                        <div class="col-md-6">
                          <label for="process" style="font-size: 30px; color: #00274C;">Process</label>
                          <p style="font-size: 20px;">
                            <?php echo $form137Result['process'] ?>
                          </p>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="col-md-6">
                          <label for="emailAddress" style="font-size: 30px; color: #00274C;">Email Address</label>
                          <input type="text" class="form-control" name="emailAddress" id="emailAddress"
                            value="<?php echo $form137Result['emailAddress'] ?>" readonly>
                        </div>
                        <div class="col-md-6">
                          <label for="approvedDate" style="font-size: 30px; color: #00274C;">Approved Date</label>
                          <input type="date" class="form-control" name="approvedDate" id="approvedDate"
                            placeholder="Input the approved date here" min="<?php echo date('Y-m-d'); ?>">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="message" style="font-size: 30px; color: #00274C;">Message</label>
                          <textarea class="purpose form-control mt-2" name="message" id="messageTextArea"
                            rows="8"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer" style="border: none;">
                      <button type="submit" class="btn" name="approveForm137"
                        style="background-color: #00274C; color: white; padding: 10px;">Approve Request <i
                          class="bi bi-check2"></i></button>
                  </form>
                </div>
              </div>
            </div>
            <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- GOOD MORAL -->
<div class="card" id="goodmoralCard">
  <div class="card-body">
    <h1>Good Moral</h1>
    <div class="table-responsive">
      <table id="goodmoral" class="table text-center">
        <thead class="table-header">
          <tr>
            <th scope="col">Full Name</th>
            <th scope="col">Year Graduated</th>
            <th scope="col">Strand</th>
            <th scope="col">Email Address</th>
            <th scope="col">Contact Number</th>
            <th scope="col">Address</th>
            <th scope="col">Date</th>
            <th scope="col">Process Method</th>
            <th scope="col">Purpose</th>
            <th scope="col">Studying Survey</th>
            <th scope="col">Working Survey</th>
            <th scope="col">Status</th>
            <th scope="col">Document</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody class="table-body">
          <?php
          include("phpConnection/tableData.php");
          while ($goodMoralDetails = $stmtGoodMoralData->fetch(PDO::FETCH_ASSOC)) {
            $goodmoral_id = $goodMoralDetails['goodmoral_id'];
            $user_id = $goodMoralDetails['user_id'];
            $fullName = $goodMoralDetails['fullName'];
            $yeargraduated = $goodMoralDetails['yeargraduated'];
            $strand = $goodMoralDetails['strand'];
            $emailAddress = $goodMoralDetails['emailAddress'];
            $contactNumber = $goodMoralDetails['contactNumber'];
            $houseAddress = $goodMoralDetails['houseAddress'];
            $date = $goodMoralDetails['date'];
            $process = $goodMoralDetails['process'];
            $purpose = $goodMoralDetails['purpose'];
            $status = $goodMoralDetails['status'];
            $document = $goodMoralDetails['document'];
            ?>
            <tr>
              <input type="hidden" name="alumni_id" value="<?php echo $user_id ?>">
              <td>
                <?php echo $fullName ?>
              </td>
              <td style="text-align: center;">
                <?php echo $yeargraduated ?>
              </td>
              <td style="text-align: center;">
                <?php echo $strand ?>
              </td>
              <td>
                <?php echo $emailAddress ?>
              </td>
              <td style="text-align: center;">
                <?php echo $contactNumber ?>
              </td>
              <td>
                <?php echo $houseAddress ?>
              </td>
              <td>
                <?php echo $date ?>
              </td>
              <td style="text-align: center;">
                <?php echo $process ?>
              </td>
              <td>
                <?php echo $purpose ?>
              </td>
              <td>
                <?php
                $sqlStudyingCount = "SELECT fullName FROM alumnistudying WHERE user_id = ?";
                $stmtStudyingCount = $db->prepare($sqlStudyingCount);
                $stmtStudyingCount->execute([$user_id]);

                if($stmtStudyingCount->rowCount() == 0) {
                  ?>
                  <p style="color: red;">No Survey</p>
                  <?php
                } else {
                  ?>
                  <p style="color: green;">Survey Confirmed</p>
                  <?php
                }
                ?>
              </td>
              <td>
                <?php
                $sqlWorkingCount = "SELECT fullName FROM alumniworking WHERE user_id = ?";
                $stmtWorkingCount = $db->prepare($sqlWorkingCount);
                $stmtWorkingCount->execute([$user_id]);

                if($stmtWorkingCount->rowCount() == 0) {
                  ?>
                  <p style="color: red;">No Survey</p>
                  <?php
                } else {
                  ?>
                  <p style="color: green;">Survey Confirmed</p>
                  <?php
                }
                ?>
              </td>
              <td style="text-align: center; <?php echo ($status == 'approve') ? 'color: green;' : 'color: red;' ?>">
                <?php echo ucfirst($status) ?>
              </td>
              <td>
                <?php
                $documentPath = 'requestedDocument/' . $goodMoralDetails['document'];
                if (file_exists($documentPath)) {
                  echo '<a href="' . $documentPath . '" download>' . $goodMoralDetails['document'] . '</a>';
                } else {
                  echo 'Document not found';
                }
                ?>
              </td>
              <td style="font-size: 18px; overflow: hidden; text-align: center;">
                <?php
                if ($process == 'online') {
                  ?>
                  <a href="#" class="link-dark" style="margin-right: 5px;" data-bs-toggle="modal"
                    data-bs-target="#approveGRequest_<?php echo $user_id ?>_<?php echo $goodmoral_id ?>">
                    <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom"
                      title="Manage Survey Form" style="color: #00274C;"></i></a>
                  <a href="#" class="link-dark" style="margin-right: 5px;" data-bs-toggle="modal"
                    data-bs-target="#goodmoralModal_<?php echo $user_id ?>">
                    <i class="bi bi-file-earmark-arrow-up" data-bs-toggle="tooltip" data-bs-placement="bottom"
                      title="Upload Requirements" style="color: #00274C;"></i>
                  </a>
                  <?php
                } else {
                  ?>
                  <a href="#" class="link-dark" style="margin-right: 5px;" data-bs-toggle="modal"
                    data-bs-target="#approveGRequest_<?php echo $user_id ?>_<?php echo $goodmoral_id ?>">
                    <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom"
                      title="Manage Survey Form" style="color: #00274C;"></i></a>
                  <?php
                }
                ?>
              </td>
            </tr>

            <!-- MODAL FOR UPLOADING GOOD MORAL -->
            <div class="modal fade" id="goodmoralModal_<?php echo $user_id ?>" data-bs-backdrop="static"
              data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog" style="margin-top: 25vh;">
                <div class="modal-content" style="padding: 10px;">
                  <form action="uploadDocument.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                      <div class="text-start mb-3">
                        <p class="text-body-secondary">Note: The document will only be uploaded if the alumni request is
                          approved and choose online as process method.</p>
                        <label for="fileInput" class="form-label mb-3" style="font-size: 25px;">Upload Good Moral</label>
                        <input type="hidden" name="alumni_id" value="<?php echo $user_id ?>">
                        <input type="file" name="goodmoral" class="form-control" id="fileInput" accept=".pdf">
                      </div>
                      <div class="modal-button mt-4 d-flex justify-content-end align-items-end">
                        <button type="button" class="btn" data-bs-dismiss="modal"
                          style="margin-right: 2vh; padding: 0; outline: none;">Cancel</button>
                        <button type="submit" class="btn" name="uploadGoodmoral"
                          style="color: #00274C; margin-top: 2vh; padding: 0; outline: none;">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- MODAL FOR APPROVING REQUEST -->
            <div class="modal fade" id="approveGRequest_<?php echo $user_id ?>_<?php echo $goodmoral_id ?>"
              data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
              aria-hidden="true">
              <!-- DATA FOR APPROVAL -->
              <?php
              $sqlGoodMoralModalData = "SELECT fullName, emailAddress, process, status FROM goodmoral 
              WHERE user_id = ? AND goodmoral_id = ?";
              $stmtGoodMoralModalData = $db->prepare($sqlGoodMoralModalData);
              $stmtGoodMoralModalData->execute([$user_id, $goodmoral_id]);
              $goodMoralResult = $stmtGoodMoralModalData->fetch(PDO::FETCH_ASSOC);
              ?>
              <div class="modal-dialog modal-lg">
                <div class="modal-content" style="padding: 10px;">
                  <div class="modal-header" style="border: none;">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form
                    action="email/emailGoodMoral.php?user_id=<?php echo $user_id ?>&goodmoral_id=<?php echo $goodmoral_id ?>"
                    method="POST">
                    <div class="modal-body mb-5">
                      <div class="row">
                        <h1 style="color: #00274C;">Good Moral Request Approval</h1>
                        <p class="text-body-secondary">Note: This form will allow you to approve the request of this
                          alumni
                          which will send an email
                          with the date and details for the appointment request.</p>
                      </div>
                      <div class="row mb-4">
                        <div class="col-md-6">
                          <label for="fullname" style="font-size: 30px; color: #00274C;">Full Name</label>
                          <p style="font-size: 20px;">
                            <?php echo $goodMoralResult['fullName'] ?>
                          </p>
                        </div>
                        <div class="col-md-6">
                          <label for="process" style="font-size: 30px; color: #00274C;">Process</label>
                          <p style="font-size: 20px;">
                            <?php echo $goodMoralResult['process'] ?>
                          </p>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="col-md-6">
                          <label for="emailAddress" style="font-size: 30px; color: #00274C;">Email Address</label>
                          <input type="text" class="form-control" name="emailAddress" id="emailAddress"
                            value="<?php echo $goodMoralResult['emailAddress'] ?>" readonly>
                        </div>
                        <div class="col-md-6">
                          <label for="approvedDate" style="font-size: 30px; color: #00274C;">Approved Date</label>
                          <input type="date" class="form-control" name="approvedDate" id="approvedDate"
                            placeholder="Input the approved date here" min="<?php echo date('Y-m-d'); ?>">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="message" style="font-size: 30px; color: #00274C;">Message</label>
                          <textarea class="purpose form-control mt-2" name="message" id="messageTextArea"
                            rows="8"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer" style="border: none;">
                      <button type="submit" class="btn" name="approveGoodMoral"
                        style="background-color: #00274C; color: white; padding: 10px;">Approve Request <i
                          class="bi bi-check2"></i></button>
                  </form>
                </div>
              </div>
            </div>
            <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- OTHER DOCUMENTS -->
<div class="card" id="othersCard">
  <div class="card-body">
    <h1>Other Documents</h1>
    <div class="table-responsive">
      <table id="otherdocuments" class="table text-center">
        <thead class="table-header">
          <tr>
            <th scope="col">Full Name</th>
            <th scope="col">Year Graduated</th>
            <th scope="col">Strand</th>
            <th scope="col">Email Address</th>
            <th scope="col">Contact Number</th>
            <th scope="col">Address</th>
            <th scope="col">Date</th>
            <th scope="col">Process Method</th>
            <th scope="col">Others</th>
            <th scope="col">Purpose</th>
            <th scope="col">Studying Survey</th>
            <th scope="col">Working Survey</th>
            <th scope="col">Status</th>
            <th scope="col">Document</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody class="table-body">
          <?php
          include("phpConnection/tableData.php");
          while ($otherDocumentsDetails = $stmtOtherDocumentsData->fetch(PDO::FETCH_ASSOC)) {
            $otherDocuments_id = $otherDocumentsDetails['otherDocuments_id'];
            $user_id = $otherDocumentsDetails['user_id'];
            $fullName = $otherDocumentsDetails['fullName'];
            $yeargraduated = $otherDocumentsDetails['yeargraduated'];
            $strand = $otherDocumentsDetails['strand'];
            $emailAddress = $otherDocumentsDetails['emailAddress'];
            $contactNumber = $otherDocumentsDetails['contactNumber'];
            $houseAddress = $otherDocumentsDetails['houseAddress'];
            $date = $otherDocumentsDetails['date'];
            $process = $otherDocumentsDetails['process'];
            $otherdocument = $otherDocumentsDetails['otherdocument'];
            $purpose = $otherDocumentsDetails['purpose'];
            $status = $otherDocumentsDetails['status'];
            $document = $otherDocumentsDetails['document'];
            ?>
            <tr>
              <input type="hidden" name="alumni_id" value="<?php echo $user_id ?>">
              <td>
                <?php echo $fullName ?>
              </td>
              <td style="text-align: center;">
                <?php echo $yeargraduated ?>
              </td>
              <td style="text-align: center;">
                <?php echo $strand ?>
              </td>
              <td>
                <?php echo $emailAddress ?>
              </td>
              <td style="text-align: center;">
                <?php echo $contactNumber ?>
              </td>
              <td>
                <?php echo $houseAddress ?>
              </td>
              <td>
                <?php echo $date ?>
              </td>
              <td style="text-align: center;">
                <?php echo $process ?>
              </td>
              <td>
                <?php echo $otherdocument ?>
              </td>
              <td>
                <?php echo $purpose ?>
              </td>
              <td>
                <?php
                $sqlStudyingCount = "SELECT fullName FROM alumnistudying WHERE user_id = ?";
                $stmtStudyingCount = $db->prepare($sqlStudyingCount);
                $stmtStudyingCount->execute([$user_id]);

                if($stmtStudyingCount->rowCount() == 0) {
                  ?>
                  <p style="color: red;">No Survey</p>
                  <?php
                } else {
                  ?>
                  <p style="color: green;">Survey Confirmed</p>
                  <?php
                }
                ?>
              </td>
              <td>
                <?php
                $sqlWorkingCount = "SELECT fullName FROM alumniworking WHERE user_id = ?";
                $stmtWorkingCount = $db->prepare($sqlWorkingCount);
                $stmtWorkingCount->execute([$user_id]);

                if($stmtWorkingCount->rowCount() == 0) {
                  ?>
                  <p style="color: red;">No Survey</p>
                  <?php
                } else {
                  ?>
                  <p style="color: green;">Survey Confirmed</p>
                  <?php
                }
                ?>
              </td>
              <td style="text-align: center; <?php echo ($status == 'approve') ? 'color: green;' : 'color: red;' ?>">
                <?php echo ucfirst($status) ?>
              </td>
              <td>
                <?php
                $documentPath = 'requestedDocument/' . $otherDocumentsDetails['document'];
                if (file_exists($documentPath)) {
                  echo '<a href="' . $documentPath . '" download>' . $otherDocumentsDetails['document'] . '</a>';
                } else {
                  echo 'Document not found';
                }
                ?>
              </td>
              <td style="font-size: 18px; overflow: hidden; text-align: center;">
                <?php
                if ($process == 'online') {
                  ?>
                  <a href="#" class="link-dark" style="margin-right: 5px;" data-bs-toggle="modal"
                    data-bs-target="#approveORequest_<?php echo $user_id ?>_<?php echo $otherDocuments_id ?>">
                    <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom"
                      title="Manage Survey Form" style="color: #00274C;"></i></a>
                  <a href="#" class="link-dark" style="margin-right: 5px;" data-bs-toggle="modal"
                    data-bs-target="#otherdocumentModal_<?php echo $user_id ?>">
                    <i class="bi bi-file-earmark-arrow-up" data-bs-toggle="tooltip" data-bs-placement="bottom"
                      title="Upload Requirements" style="color: #00274C;"></i>
                  </a>
                  <?php
                } else {
                  ?>
                  <a href="#" class="link-dark" style="margin-right: 5px;" data-bs-toggle="modal"
                    data-bs-target="#approveORequest_<?php echo $user_id ?>_<?php echo $otherDocuments_id ?>">
                    <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom"
                      title="Manage Survey Form" style="color: #00274C;"></i></a>
                  <?php
                }
                ?>
              </td>
            </tr>

            <!-- MODAL FOR UPLOADING OTHER DOCUMENTS -->
            <div class="modal fade" id="otherdocumentModal_<?php echo $user_id ?>" data-bs-backdrop="static"
              data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog" style="margin-top: 25vh;">
                <div class="modal-content" style="padding: 10px;">
                  <form action="uploadDocument.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                      <div class="text-start mb-3">
                        <p class="text-body-secondary">Note: The document will only be uploaded if the alumni request is
                          approved and choose online as process method.</p>
                        <label for="fileInput" class="form-label mb-3" style="font-size: 25px;">Upload Other
                          Document</label>
                        <input type="hidden" name="alumni_id" value="<?php echo $user_id ?>">
                        <input type="file" name="otherdocument" class="form-control" id="fileInput" accept=".pdf">
                      </div>
                      <div class="modal-button mt-4 d-flex justify-content-end align-items-end">
                        <button type="button" class="btn" data-bs-dismiss="modal"
                          style="margin-right: 2vh; padding: 0; outline: none;">Cancel</button>
                        <button type="submit" class="btn" name="uploadOtherdocument"
                          style="color: #00274C; margin-top: 2vh; padding: 0; outline: none;">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- MODAL FOR APPROVING REQUEST -->
            <div class="modal fade" id="approveORequest_<?php echo $user_id ?>_<?php echo $otherDocuments_id ?>"
              data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
              aria-hidden="true">
              <!-- DATA FOR APPROVAL -->
              <?php
              $sqlOtherDocumentsModalData = "SELECT fullName, emailAddress, process, status FROM otherdocuments 
              WHERE user_id = ? AND otherDocuments_id = ?";
              $stmtOtherDocumentsModalData = $db->prepare($sqlOtherDocumentsModalData);
              $stmtOtherDocumentsModalData->execute([$user_id, $otherDocuments_id]);
              $otherDocumentsResult = $stmtOtherDocumentsModalData->fetch(PDO::FETCH_ASSOC);
              ?>
              <div class="modal-dialog modal-lg">
                <div class="modal-content" style="padding: 10px;">
                  <div class="modal-header" style="border: none;">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form
                    action="email/emailOtherDocuments.php?user_id=<?php echo $user_id ?>&otherDocuments_id=<?php echo $otherDocuments_id ?>"
                    method="POST">
                    <div class="modal-body mb-5">
                      <div class="row">
                        <h1 style="color: #00274C;">Other Documents Request Approval</h1>
                        <p class="text-body-secondary">Note: This form will allow you to approve the request of this
                          alumni
                          which will send an email
                          with the date and details for the appointment request.</p>
                      </div>
                      <div class="row mb-4">
                        <div class="col-md-6">
                          <label for="fullname" style="font-size: 30px; color: #00274C;">Full Name</label>
                          <p style="font-size: 20px;">
                            <?php echo $otherDocumentsResult['fullName'] ?>
                          </p>
                        </div>
                        <div class="col-md-6">
                          <label for="process" style="font-size: 30px; color: #00274C;">Process</label>
                          <p style="font-size: 20px;">
                            <?php echo $otherDocumentsResult['process'] ?>
                          </p>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="col-md-6">
                          <label for="emailAddress" style="font-size: 30px; color: #00274C;">Email Address</label>
                          <input type="text" class="form-control" name="emailAddress" id="emailAddress"
                            value="<?php echo $otherDocumentsResult['emailAddress'] ?>" readonly>
                        </div>
                        <div class="col-md-6">
                          <label for="approvedDate" style="font-size: 30px; color: #00274C;">Approved Date</label>
                          <input type="date" class="form-control" name="approvedDate" id="approvedDate"
                            placeholder="Input the approved date here" min="<?php echo date('Y-m-d'); ?>">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="message" style="font-size: 30px; color: #00274C;">Message</label>
                          <textarea class="purpose form-control mt-2" name="message" id="messageTextArea"
                            rows="8"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer" style="border: none;">
                      <button type="submit" class="btn" name="approveGoodMoral"
                        style="background-color: #00274C; color: white; padding: 10px;">Approve Request <i
                          class="bi bi-check2"></i></button>
                  </form>
                </div>
              </div>
            </div>
            <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>