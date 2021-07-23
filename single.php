<?php 

include_once('path.php'); 
include_once(ROOT_PATH . '/app/controllers/posts.php'); 
include_once(ROOT_PATH . '/app/helpers/postInfo.php');

if (isset($_GET['id'])) {
    $post = selectOne('posts', ['id' => $_GET['id']]);
}

// dd($post);
// exit();
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title><?= $post['title']; ?> | Cooking Bay</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@5.3.0/dist/simplebar.css"/>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<?php include_once (ROOT_PATH . '/app/includes/header.php'); ?>

<div class="middle-wrap">
    <main class="article-main">
        <article>
            <section>
                <h3><?= $post['title']; ?></h3>
                <div class="info-wrap">
                    <p class="info"><span class="ital">by</span> Filip Djordjevic</p>
                    <p class="info"><?= readTime($post['body']); ?></p>
                </div>
                <p><?= decode($post['body']); ?></p>
                <img src="<?= BASE_URL . '/assets/images/' . $post['image']; ?>" alt="">
            </section>
            <section>

            </section>
        </article>
    </main>


<?php include_once (ROOT_PATH . '/app/includes/footer.php');?>
