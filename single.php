<?php 

include_once('path.php'); 
include_once(ROOT_PATH . '/app/controllers/posts.php'); 
include_once(ROOT_PATH . '/app/helpers/postInfo.php');

$posts = getPublishedPosts();
// dd(limitDescriptionLength($posts[1]['body']));
// exit();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single</title>
</head>

<?php include_once (ROOT_PATH . '/app/includes/header.php'); ?>



<?php include_once (ROOT_PATH . '/app/includes/footer.php');?>
