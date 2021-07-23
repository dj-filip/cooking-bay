<?php include_once ('../../path.php'); ?>
<?php include_once (ROOT_PATH . '/app/controllers/topics.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Admin Section - Add Topics</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@5.3.0/dist/simplebar.css"/>
    <link rel="stylesheet" href="../../assets/css/reset.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
</head>

<?php include_once (ROOT_PATH . '/app/includes/adminSidebar.php'); ?>

        <main class="admin">
            <div class="button-group">
                <a href="index.php" class="btn">Manage Topics</a>
                <a href="create.php" class="btn">Add Topic</a>
            </div>
            <div class="content">
                <h2>Add Topic</h2>
                <?php include_once(ROOT_PATH . '/app/helpers/formErrors.php'); ?>
                <form action="create.php" method="post">
                    <div class="input-wrap">
                        <label>Name</label>
                        <input type="text" name="name" value="<?php echo $name; ?>">
                    </div>
                    <div class="input-wrap">
                        <label>Description</label>
                        <textarea name="description" id="editor"><?php echo $description; ?></textarea>
                    </div>
                    <div class="button-space">
                        <button id="sbmt" class="admin-sub" type="submit" name="add-topic" disabled>Add</button>
                    </div>
                </form>
            </div>
        </main>

    </div>
<script src="../../assets/js/main.js" type="text/javascript"></script>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simplebar@5.3.0/dist/simplebar.min.js"></script>
</body>
</html>
