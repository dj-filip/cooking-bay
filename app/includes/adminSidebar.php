<?php include_once (ROOT_PATH . '/app/database/db.php'); ?>

  <body>
    <nav class="left">
      <a class="logo" href="<?php echo BASE_URL . '/explore.php' ?>"><h1><span class="italhead">Cooking</span> BAY</h1></a>
      <ul>
        <li>
          <a href="<?php echo BASE_URL . '/admin/posts/index.php' ?>">Posts</a>
        </li>
        <li>
          <a href="<?php echo BASE_URL . '/admin/users/index.php' ?>">Users</a>
        </li>
        <li>
          <a href="<?php echo BASE_URL . '/admin/topics/index.php' ?>">Topics</a>
        </li>
      </ul>
    </nav>
    <div class="main-wrap">
      <nav class="top">

        <?php if (isset($_SESSION['id'])): ?>
          <div class="account">
            <button><ion-icon name="person-outline"></ion-icon></button>
            <span><?php echo $_SESSION['username']; ?></span>
          </div>
          <div class="account-drop-wrap">
            <nav class="account-drop">
              <ul>
                <?php if($_SESSION['admin']): ?>
                  <li>
                    <a class="bold" href="<?php echo BASE_URL . '/admin/posts/index.php' ?>">DASHBOARD</a>
                  </li>
                <?php endif; ?>
                <li>
                  <a href="#">Profile</a>
                </li>
                <li>
                  <a href="#">Appearance</a>
                </li>
                <li>
                  <a href="#">Help</a>
                </li>
                <li>
                <a href="<?php echo BASE_URL . '/logout.php' ?>">Sign Out</a>
                </li>
              </ul>
            </nav>
          </div>
        <?php else: ?>
          <a id="login" href="<?php echo BASE_URL . '/login.php' ?>">Log In</a>
        <?php endif; ?>
      </nav>
