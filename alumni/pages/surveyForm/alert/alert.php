<!-- SUCCESS ALERT -->
<?php if (isset($_SESSION['showSweetAlert']) && $_SESSION['showSweetAlert']): ?>
  <?php include("sweetalert.php"); ?>
  <?php
  unset($_SESSION['showSweetAlert']);
?>
<?php endif; ?>

<!-- EDIT SUCCESS ALERT -->
<?php if (isset($_SESSION['showEditAlert']) && $_SESSION['showEditAlert']): ?>
  <?php include("editalert.php"); ?>
  <?php
  unset($_SESSION['showEditAlert']);
?>
<?php endif; ?>