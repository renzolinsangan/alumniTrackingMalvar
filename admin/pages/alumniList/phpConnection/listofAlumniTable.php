<?php
include("config.php");
$sqlAlumniTable = "SELECT * FROM user_account WHERE usertype='alumni' ORDER by yeargraduated DESC";
$stmtAlumniTable = $db->query($sqlAlumniTable);

while ($alumniDetails = $stmtAlumniTable->fetch(PDO::FETCH_ASSOC)) {
  $user_id = $alumniDetails['user_id'];
  $fullName = $alumniDetails['fullName'];
  $gender = $alumniDetails['gender'];
  $age = $alumniDetails['age'];
  $houseAddress = $alumniDetails['houseAddress'];
  $emailAddress = $alumniDetails['emailAddress'];
  $contactNumber = $alumniDetails['contactNumber'];
  $strand = $alumniDetails['strand'];
  $yearGraduated = $alumniDetails['yeargraduated'];
  $usertype = $alumniDetails['usertype'];
  ?>
  <tr>
    <td>
      <?php echo $fullName ?>
    </td>
    <td style="text-align: center;">
      <?php echo $gender ?>
    </td>
    <td style="text-align: center;">
      <?php echo $age ?>
    </td>
    <td>
      <?php echo $houseAddress ?>
    </td>
    <td>
      <?php echo $emailAddress ?>
    </td>
    <td style="text-align: center;">
      <?php echo $contactNumber ?>
    </td>
    <td style="text-align: center;">
      <?php echo $strand ?>
    </td>
    <td style="text-align: center;">
      <?php echo $yearGraduated ?>
    </td>
    <td style="text-align: center;">
      <?php echo $usertype ?>
    </td>
    <td style="font-size: 18px; overflow: hidden; text-align: center;">
      <a href="#" class="link-dark" data-bs-toggle="modal" data-bs-target="#deleteAlumni_<?php echo $user_id ?>">
        <i class="bi bi-trash-fill" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete Alumni"
          style="color: #00274C;"></i>
      </a>
    </td>
    <!-- Modal -->
    <div class="modal fade" id="deleteAlumni_<?php echo $user_id ?>" data-bs-backdrop="static" data-bs-keyboard="false"
      tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="border: none;">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="body-icon col text-center"
              style="color: red; font-size: 25vh; margin-bottom: -20px; margin-top: -30px;">
              <i class="bi bi-exclamation-triangle"></i>
            </div>
            <div class="body-text col text-center">
              <h2>Delete Alumni</h2>
              <p class="text-body-secondary">This will delete the account of that alumni, would you like to continue?</p>
            </div>
          </div>
          <div class="modal-footer mb-4 d-flex align-items-center justify-content-center" style="border: none;">
            <a href="phpConnection/deleteAlumni.php?delete_id=<?php echo $user_id ?>">
              <button type="button" class="btn" style="background-color: red; color: white;">Delete Alumni</button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </tr>
  <?php
}
?>