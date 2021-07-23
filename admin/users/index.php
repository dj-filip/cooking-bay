<?php include_once ('../../path.php'); ?>
<?php include_once (ROOT_PATH . '/app/controllers/users.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Admin Section - Manage Users</title>

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
                <h2>Manage Users</h2>

                <?php include_once (ROOT_PATH . '/app/includes/messages.php'); ?>

                <table>
                    <thead>
                        <th>SN</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th></th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $key => $user): ?>
                        <tr>
                            <td><?= $key + 1; ?></td>
                            <td><?= $user['username']; ?></td>
                            <td><?= $user['email']; ?></td>
                            <?php if ($user['admin']): ?>
                                <td>ADMIN</td>
                                <?php else: ?>
                                <td></td>
                            <?php endif; ?>
                            <td class="tcenter"><a href="edit.php?id=<?= $user['id']; ?>" class="edit"><ion-icon name="create-outline" ></ion-icon></a></td>
                            <td class="tcenter"><a href="index.php?delete_id=<?= $user['id']; ?>" class="delete"><ion-icon name="trash-outline" ></ion-icon></a></td>
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
