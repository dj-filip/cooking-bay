<?php include_once ('../../path.php'); ?>
<?php include_once (ROOT_PATH . '/app/controllers/users.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Section - Add Users</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@5.3.0/dist/simplebar.css"/>
    <link rel="stylesheet" href="../../assets/css/reset.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  </head>

  <?php include_once (ROOT_PATH . '/app/includes/adminSidebar.php'); ?>

    <main class="admin">
      <div class="button-group">
        <a href="index.php" class="btn">Manage Users</a>
        <a href="create.php" class="btn">Add User</a>
      </div>
      <div class="content">
        <h2>Add User</h2>

        <?php include_once(ROOT_PATH . '/app/helpers/formErrors.php'); ?>

        <form class="" action="create.php" method="post">
          <div class="input-wrap">
            <input type="text" name="username" value="<?= $username; ?>" placeholder="Username..." onfocus="this.placeholder=''" onblur="this.placeholder='Username...'" autocomplete="off">
          </div>
          <div class="input-wrap">
            <input type="text" name="email" value="<?= $email; ?>" placeholder="Email..." onfocus="this.placeholder=''" onblur="this.placeholder='Email...'" autocomplete="off">
          </div>
          <div class="input-wrap">
            <input type="password" name="password" placeholder="Password..." onfocus="this.placeholder=''" onblur="this.placeholder='Password...'">
          </div>
          <div class="input-wrap">
            <input type="password" name="pwdrepeat" placeholder="Repeat password..." onfocus="this.placeholder=''" onblur="this.placeholder='Repeat password...'">
          </div>
          <div class="input-wrap admin-check-wrap">
            <?php if (isset($admin) && $admin == 1): ?>
              <input id="admin" type="checkbox" name="admin" checked><label for="admin">Admin</label>
            <?php else: ?>
              <input id="admin" type="checkbox" name="admin"><label for="admin">Admin</label>
            <?php endif; ?>
          </div>
          <div class="button-space">
            <button class="admin-sub" type="submit" name="create-admin">Add</button>
          </div>
        </form>
      </div>
    </main>

  </div>
  <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
  <script src="../../assets/js/main.js" type="text/javascript"></script>
  <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simplebar@5.3.0/dist/simplebar.min.js"></script>
  </body>
  </html>
