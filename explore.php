<?php 

include_once('path.php'); 
include_once(ROOT_PATH . '/app/controllers/posts.php'); 
include_once(ROOT_PATH . '/app/helpers/postInfo.php');

$posts = getPublishedPosts();
// dd(limitDescriptionLength($posts[1]['body']));
// exit();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Explore</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<?php include_once (ROOT_PATH . '/app/includes/header.php'); ?>
    <div class="middle-wrap">
        <div class="app-wrap">
            <main class="app">

                <?php foreach ($posts as $post): ?>
                    <?php if(strtolower($post['topicname']) != strtolower('videos')): ?>
                        <a href="single.php?id=<?= $post['id']; ?>" class="all <?= $post['size']; ?>">
                            <img src="<?= BASE_URL . '/assets/images/' . $post['image']; ?>" alt="">
                                <div class="highlight">
                                    <div class="icons">
                                        <ion-icon name="share-social-outline"></ion-icon>
                                        <ion-icon name="bookmark-outline"></ion-icon>
                                    </div>
                                        <div class="description-wrap">
                                            <p class="description"><?= limitDescriptionLength($post['body']); ?></p>
                                            <div class="info-wrap">
                                                <p class="info"><span class="ital">by</span> Filip Djordjevic</p>
                                                <p class="info"><?= readTime($post['body']); ?></p>
                                            </div>
                                        </div>
                                </div>
                            <?php else: ?>
                                <a href="" class="all <?= $post['size']; ?>">
                                    <img src="<?= BASE_URL . '/assets/images/' . $post['image']; ?>" alt="">
                                        <div class="play"><ion-icon name="play"></ion-icon></div>
                                        <div class="highlight highlight-active"></div>
                            <?php endif; ?>
                            <div class="marker">
                                <p><?= $post['title'] ?></p>
                                <span>#<?= $post['topicname'] ?></span>
                            </div>
                        </a>
                <?php endforeach; ?>

                <a class="all menu S">
                <h3>MY MENU</h3>
                </a>
                <a class="all menu S">
                <h3>MY MENU</h3>
                </a>
                <a class="all menu S">
                <h3>MY MENU</h3>
                </a>

                <!-- 
                <div class="all burgers m">
                    <img src="assets/images/burgers.png">    
                    <div class="marker">
                        <p>Burgers</p>
                        <span>#Recipe</span>
                    </div>
                </div>
                <div class="all market">
                    <img src="assets/images/market.png">    
                    <div class="highlight">
                        <div class="icons">
                            <ion-icon name="share-social-outline"></ion-icon>
                            <ion-icon name="bookmark-outline"></ion-icon>
                        </div>
                        <p class="description">When researching travel to Marrakech there’s no doubt you’ve seen pictures of the markets of Marrakech.    They are a cacophony of colors and stores overflowing with things like shoes, lanterns, and clothing. It’s easy to get lost and wander for hours! But, many people find it very nerve wracking to be in such an environment and don’t relish the thought of being lost. That’s totally understandable....</p>
                        <div class="info-wrap">
                            <p class="info"><span class="ital">by</span> Filip Djordjevic</p>
                            <p class="info">5 min read</p>
                        </div>
                    </div>
                    <div class="marker">
                        <p>Markets in Morroco</p>
                        <span>#Article</span>
                    </div>
                </div>
                <div class="all street-food">
                    <img src="assets/images/street-food.png">    
                    <div class="marker">
                        <p>Street Food in Bangkok</p>
                        <span>#Video</span>
                    </div>
                </div> -->
            </main>
        </div>
 
<?php include_once (ROOT_PATH . '/app/includes/footer.php');?>
