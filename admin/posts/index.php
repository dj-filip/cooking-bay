<?php include_once ('../../path.php'); ?>
<?php include_once (ROOT_PATH . '/app/controllers/posts.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Section - Manage Posts</title>

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
        <h2>Manage Posts</h2>

        <?php include_once (ROOT_PATH . '/app/includes/messages.php'); ?>

        <table>
          <thead>
            <th>SN</th>
            <th>Title</th>
            <th>Author</th>
            <th colspan="3">Action</th>
          </thead>
          <tbody>
            <?php foreach ($posts as $key => $post): ?>
              <tr>
                <td><?php echo $key +1; ?></td>
                <td><?php echo $post['title']; ?></td>
                <?php foreach ($users as $key => $user) {
                  if($post['user_id'] == $user['id']) {
                    echo "<td>" . $user['username'] . "</td>";
                  }
                } ?>
                <td class="tcenter"><a href="edit.php?id=<?=$post['id']; ?>" class="edit"><ion-icon name="create-outline" ></ion-icon></a></td>
                <td class="tcenter"><a href="edit.php?delete_id=<?=$post['id']; ?>" class="delete"><ion-icon name="trash-outline" ></ion-icon></a></td>
                <?php if ($post['published']): ?>
                  <td class="tcenter"><a href="edit.php?published=0&p_id=<?=$post['id'] ?>" class="unpublish">unpublish</a></td>
                <?php else: ?>
                  <td class="tcenter"><a href="edit.php?published=1&p_id=<?=$post['id'] ?>" class="publish">publish</a></td>
                <?php endif; ?>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </main>

  </div>
  <script src="../../assets/js/main.js" type="text/javascript"></script>
  <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simplebar@5.3.0/dist/simplebar.min.js"></script>
  </body>
  </html>
