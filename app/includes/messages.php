<?php if (isset($_SESSION['message'])): ?>
    <div class="wlcm <?= $_SESSION['type']; ?>">
        <?= $_SESSION['message']; ?>
    </div>
<?php
    unset($_SESSION['message']);
    endif; 
?>
