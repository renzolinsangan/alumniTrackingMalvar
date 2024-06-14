<!-- CERTIFICATE UPLOAD SUCCESS ALERT -->
<?php if (isset($_SESSION['showCertficateUpload']) && $_SESSION['showCertficateUpload']): ?>
  <?php include("alerts/certificateUploadAlert.php"); ?>
  <?php
  unset($_SESSION['showCertficateUpload']);
?>
<?php endif; ?>

<!-- FORM 137 UPLOAD SUCCESS ALERT -->
<?php if (isset($_SESSION['showForm137Upload']) && $_SESSION['showForm137Upload']): ?>
  <?php include("alerts/form137UploadAlert.php"); ?>
  <?php
  unset($_SESSION['showForm137Upload']);
?>
<?php endif; ?>

<!-- GOOD MORAL UPLOAD SUCCESS ALERT -->
<?php if (isset($_SESSION['showGoodMoralUpload']) && $_SESSION['showGoodMoralUpload']): ?>
  <?php include("alerts/goodMoralUploadAlert.php"); ?>
  <?php
  unset($_SESSION['showGoodMoralUpload']);
?>
<?php endif; ?>

<!-- OTHER DOCUMENTS UPLOAD SUCCESS ALERT -->
<?php if (isset($_SESSION['showOtherDocumentsUpload']) && $_SESSION['showOtherDocumentsUpload']): ?>
  <?php include("alerts/otherDocumentsUploadAlert.php"); ?>
  <?php
  unset($_SESSION['showOtherDocumentsUpload']);
?>
<?php endif; ?>

<!-- APPROVE CERTIFICATE ALERT -->
<?php if (isset($_SESSION['showApproveCertificate']) && $_SESSION['showApproveCertificate']): ?>
  <?php include("alerts/alertCertificate.php"); ?>
  <?php
  unset($_SESSION['showApproveCertificate']);
?>
<?php endif; ?>

<!-- APPROVE GOOD MORAL ALERT -->
<?php if (isset($_SESSION['showApproveGoodMoral']) && $_SESSION['showApproveGoodMoral']): ?>
  <?php include("alerts/alertGoodMoral.php"); ?>
  <?php
  unset($_SESSION['showApproveGoodMoral']);
?>
<?php endif; ?>

<!-- APPROVE OTHER DOCUMENTS ALERT -->
<?php if (isset($_SESSION['showApproveOtherDocuments']) && $_SESSION['showApproveOtherDocuments']): ?>
  <?php include("alerts/alertOtherDocuments.php"); ?>
  <?php
  unset($_SESSION['showApproveOtherDocuments']);
?>
<?php endif; ?>

<!-- APPROVE FORM 137 ALERT -->
<?php if (isset($_SESSION['showApproveF137']) && $_SESSION['showApproveF137']): ?>
  <?php include("alerts/alertF137.php"); ?>
  <?php
  unset($_SESSION['showApproveF137']);
?>
<?php endif; ?>
