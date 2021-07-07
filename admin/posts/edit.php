<?php include_once ('../../path.php'); ?>
<?php include_once (ROOT_PATH . '/app/controllers/posts.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Section - Edit Posts</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@5.3.0/dist/simplebar.css"/>
    <link rel="stylesheet" href="../../assets/css/reset.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  </head>

  <?php include_once (ROOT_PATH . '/app/includes/adminSidebar.php'); ?>

    <main class="admin">
      <div class="button-group">
        <a href="index.php" class="btn">Manage Posts</a>
        <a href="create.php" class="btn">Add Post</a>
      </div>
      <div class="content">
        <h2>Edit Post</h2>

        <?php include_once(ROOT_PATH . '/app/helpers/formErrors.php'); ?>

        <form class="" action="edit.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $id ?>">
          <div class="input-wrap">
              <label>Title</label>
              <input type="text" value="<?php echo $title ?>" name="title">
            </div>
            <div class="input-wrap">
              <label>Body</label>
              <textarea name="body" id="editor"><?php echo $body ?></textarea>
            </div>
            <div class="img-topic-wrap">
              <div class="input-wrap">
                <label>Image</label>
                <input type="file" name="image" class="file-input">
              </div>
              <div class="input-wrap">
                  <label>Topic</label>
                  <select name="topic_id">
                    <option value=""></option>
                    <?php foreach ($topics as $key => $topic): ?>
                      <?php if (!empty($topic_id) && $topic_id == $topic['id'] ): ?>
                        <option selected value="<?php echo $topic['id']; ?>"><?php echo $topic['name']; ?></option>
                      <?php else: ?>
                        <option value="<?php echo $topic['id']; ?>"><?php echo $topic['name']; ?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
              </div>
              <div class="input-wrap">
                <label>Size</label>
                <select name="size">
                  <option value=""></option>
                  <?php foreach ($posts as $key => $post): ?>
                    <?php if (!empty($size) && $size == $post['size'] ): ?>
                      <option selected value="<?php echo $post['size']; ?>"><?php echo $post['size']; ?></option>
                    <?php else: ?>
                      <option value="<?php echo $post['size']; ?>"><?php echo $post['size']; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
            </div>
              <div class="input-wrap">
                <?php if (empty($published) && $published == 0): ?>
                  <input id="publish" type="checkbox" name="published"><label for="publish">Publish</label>
                <?php else: ?>
                  <input id="publish" type="checkbox" name="published" checked><label for="publish">Publish</label>
                <?php endif; ?>
              </div>
            </div>
          <div class="button-space">
            <button class="admin-sub" type="submit" name="update-post">Update</button>
          </div>
        </form>
      </div>
    </main>

  </div>
  <nav class="right">
  </nav>
  <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
  <script src="../../assets/js/main.js" type="text/javascript"></script>
  <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simplebar@5.3.0/dist/simplebar.min.js"></script>
  </body>
  </html>
