<?php if(count($errors) > 0): ?>
    <section class="form-errors">
      <?php foreach ($errors as $error): ?>
        <li><?php echo $error; ?></li>
      <?php endforeach; ?>
    </section>
<?php endif; ?>
