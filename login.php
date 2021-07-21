<?php include_once('path.php'); ?>
<?php include_once(ROOT_PATH . '/app/controllers/users.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Log in</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@5.3.0/dist/simplebar.css"/>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  </head>
  <body>
    <div class="wrap">
      <main class="log-in">
        <section class="headline-wrap">
          <a class="logo" href="<?php echo BASE_URL . '/explore.php' ?>"<h1><span class="italhead">Cooking</span> BAY</h1></a>
        </section>

        <?php include_once(ROOT_PATH . '/app/helpers/formErrors.php'); ?>

        <section class="form-wrap">
          <form action="login.php" method="post">
            <input type="text" name="username" value="<?php echo $username ?>" placeholder="Email or username..." onfocus="this.placeholder=''" onblur="this.placeholder='Email or username...'">
            <input type="password" name="password" placeholder="Password..." onfocus="this.placeholder=''" onblur="this.placeholder='Password...'">
            <button id="sbmt" class="sub" type="submit" name="submit" disabled>Log in</button>
            <span><a href="signup.php">or Sign up</a></span>
          </form>
        </section>
      </main>
    </div>
  <script src="assets/js/main.js" type="text/javascript"></script>
  <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simplebar@5.3.0/dist/simplebar.min.js"></script>
  </body>
  </html>
