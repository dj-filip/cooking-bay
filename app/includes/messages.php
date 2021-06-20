<?php if (isset($_SESSION['message'])): ?>
  <div class="wlcm <?=$_SESSION['type'] ?>">
    <?php echo $_SESSION['message']; ?>
  </div>
<?php
  unset($_SESSION['message']);
?>
<?php endif; ?>
