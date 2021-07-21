<?php include_once('path.php'); ?>
<?php include_once(ROOT_PATH . '/app/controllers/users.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign Up</title>

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
      </main>
      <section class="form-wrap">
        <form action="signup.php" method="post">
          <!-- <input class="full-name" type="text" name="name" placeholder="Full name..." onfocus="this.placeholder=''" onblur="this.placeholder='Full name...'" autocomplete="off"> -->
          <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Username..." onfocus="this.placeholder=''" onblur="this.placeholder='Username...'" autocomplete="off">
          <input type="text" name="email" value="<?php echo $email; ?>" placeholder="Email..." onfocus="this.placeholder=''" onblur="this.placeholder='Email...'" autocomplete="off">
          <input type="password" name="password" placeholder="Password..." onfocus="this.placeholder=''" onblur="this.placeholder='Password...'">
          <input type="password" name="pwdrepeat" placeholder="Repeat password..." onfocus="this.placeholder=''" onblur="this.placeholder='Repeat password...'">
          <button id="sbmt" class="sub" type="submit" name="signup-btn" disabled>Sign up</button>
          <span><a href="login.php">or Log in</a></span>
        </form>
      </section>
    </div>
  <script src="assets/js/main.js" type="text/javascript"></script>
  <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simplebar@5.3.0/dist/simplebar.min.js"></script>
  </body>
  </html>
