<?php

include_once(ROOT_PATH . '/app/database/db.php');
include_once(ROOT_PATH . '/app/helpers/validateUser.php');


$table = 'users';

$admin_users = selectAll($table, ['admin' => 1]);
$users = selectAll($table);


$errors = array();
$id = '';
$username = '';
$email = '';
$password = '';
$passwordConf = '';
$admin = '';


function loginUser($user) {
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['message'] = 'Welcome!';
    $_SESSION['type'] = 'success';

    if ($_SESSION['admin']) {
        header('location: ' . BASE_URL . '/dashboard.php');
    }
    header('location: ' . BASE_URL . '/explore.php');
    exit();
}


if (isset($_POST['signup-btn']) || isset($_POST['create-admin'])) {
    $errors = validateUser($_POST);

    if (count($errors) === 0) {
        unset($_POST['signup-btn'], $_POST['pwdrepeat'], $_POST['create-admin']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if (isset($_POST['admin'])) {
            $_POST['admin'] = 1;
            $user_id = create($table, $_POST);
            $_SESSION['message'] = 'Admin User created!';
            header('location: ' . BASE_URL . '/admin/users/index.php');
            exit();
        } else {
            $_POST['admin'] = 0;
            $user_id = create($table, $_POST);    
            $user = selectOne($table, ['id' => $user_id]);
            loginUser($user);
        }
    } else {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['pwdrepeat'];
        $admin = isset($_POST['admin']);
    }
}


if (isset($_POST['update-user'])) {
    $errors = validateUser($_POST);

    if (count($errors) == 0) {
        $id = $_POST['id'];
        unset($_POST['update-user'], $_POST['pwdrepeat'], $_POST['id']);

        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $_POST['admin'] = isset($_POST['admin']);
        $count = update($table, $id, $_POST);
        $_SESSION['message'] = 'Admin User updated!';
        header('location: ' . BASE_URL . '/admin/users/index.php');
        exit();
    } else {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['pwdrepeat'];
        $admin = isset($_POST['admin']);
    }
}



if (isset($_GET['id'])) {
    $user = selectOne($table, ['id' => $_GET['id']]);
    $id = $user['id'];
    $username = $user['username'];
    $email = $user['email'];
    $admin = $user['admin'];
}


if (isset($_POST['submit'])) {
    $errors = validateLogin($_POST);

    if (count($errors) === 0) {
        $user = selectOne($table, ['username' => $_POST['username']]);

        if ($user && password_verify($_POST['password'], $user['password'])) {
            loginUser($user);
        } else {
            array_push($errors, 'The username and password dont match!');
        }
    }

    $username = $_POST['username'];
}


// DELETE Admin User
if (isset($_GET['delete_id'])) {
    $count = delete($table, $_GET['delete_id']);
    $_SESSION['message'] = 'Admin User deleted!';
    header('location: ' . BASE_URL . '/admin/users/index.php');
    exit();
}
