<?php
include("config.php");

$sqlStudyingAlumni = "SELECT * FROM alumnistudying ORDER BY date DESC";
$stmtStudyingAlumni = $db->query($sqlStudyingAlumni);

while ($tableData = $stmtStudyingAlumni->fetch(PDO::FETCH_ASSOC)) {
  $user_id = $tableData['user_id'];
  $fullName = $tableData['fullName'];
  $status = $tableData['status'];
  $schoolName = $tableData['schoolName'];
  $course = $tableData['course'];
  $department = $tableData['department'];
  $location = $tableData['location'];
  ?>
  <tr>
    <td class="text-start">
      <?php echo $fullName ?>
    </td>
    <td>
      <?php echo ucfirst($status) ?>
    </td>
    <td class="text-start">
      <?php echo $schoolName ?>
    </td>
    <td class="text-start">
      <?php echo $course ?>
    </td>
    <td class="text-start">
      <?php echo $department ?>
    </td>
    <td class="text-start">
      <?php echo $location ?>
    </td>
    <td style="font-size: 18px; overflow: hidden;">
      <a href="#" class="link-dark" style="margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#studyingHistory_<?php echo $user_id ?>">
        <i class="bi bi-eye" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View Survey History"
          style="color: #00274C;"></i>
      </a>
      <?php include("studyingModal.php") ?>
    </td>
  </tr>
  <?php
}
?>