<body>
<nav class="left">
    <a class="logo" href="<?= BASE_URL . '/explore.php' ?>"><h1><span class="italhead">Cooking</span> BAY</h1></a>
    <ul class="nav-list">
        <li>
            <a href="<?= BASE_URL . '/explore.php' ?>"><ion-icon name="compass-outline"></ion-icon>Explore</a>
        </li>
        <li>
            <a href="<?= BASE_URL . '/recipes.php' ?>"><ion-icon name="restaurant-outline"></ion-icon>Recipes</a>
        </li>
        <li>
            <a href="<?= BASE_URL . '/articles.php' ?>"><ion-icon name="newspaper-outline"></ion-icon>Articles</a>
        </li>
        <li>
            <a href="<?= BASE_URL . '/videos.php' ?>"><ion-icon name="film-outline"></ion-icon>Videos</a>
        </li>
        <li>
            <a href="<?= BASE_URL . '/groceries.php' ?>"><ion-icon name="scale-outline"></ion-icon>Groceries</a>
        </li>
        <li>
            <a href="<?= BASE_URL . '/shops.php' ?>"><ion-icon name="storefront-outline"></ion-icon>Shops</a>
        </li>
    </ul>
    <ul class="topics-list">
        <h4>TOPICS</h4>
        <?php foreach ($topics as $key => $topic): ?>
            <li>
            <a href="<?= BASE_URL . '/' . strtolower($topic['name']) . '.php' ?>">#<?= $topic['name']; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
    <div class="settings-btn-wrap">
        <button>
            <ion-icon name="settings-outline"></ion-icon>
        </button>
    </div>
</nav>

<div class="main-wrap">
    <nav class="top">

        <?php include_once (ROOT_PATH . '/app/includes/messages.php'); ?>

        <?php if (isset($_SESSION['id'])): ?>
        <div class="account">
            <button><ion-icon name="person-outline"></ion-icon></button>
            <span><?= $_SESSION['username']; ?></span>
        </div>
        <div class="account-drop-wrap">
            <nav class="account-drop">
                <ul>
                    <?php if($_SESSION['admin']): ?>
                    <li>
                        <a class="bold" href="<?= BASE_URL . '/admin/posts/index.php' ?>">DASHBOARD</a>
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
                        <a href="<?= BASE_URL . '/logout.php' ?>">Sign Out</a>
                    </li>
                </ul>
            </nav>
        </div>

        <?php else: ?>
            <a id="login" href="<?= BASE_URL . '/login.php' ?>">Log In</a>
        <?php endif; ?>
    </nav>
    
