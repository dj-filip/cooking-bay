<?php

function validateUser($user)
{
  $errors = array();

  if (empty($user['username'])) {
    array_push($errors, 'Username is required!');
  }

  if (empty($user['email'])) {
    array_push($errors, 'Email is required!');
  }

  if (empty($user['password'])) {
    array_push($errors, 'Password is required!');
  }

  if ($user['pwdrepeat'] !== $user['password']) {
    array_push($errors, 'Passwords do not match!');
  }

  // $existingEmail = selectOne('users', ['email' => $user['email']]);
  // if ($existingEmail) {
  //   array_push($errors, 'Email already exists!');
  // }


  $existingEmail = selectOne('users', ['email' => $user['email']]);
  if ($existingEmail) {
    if (isset($user['update-user']) && $existingEmail['email'] != $user['email']) {
      array_push($errors, 'Email already exists!');
    }

    if (isset($user['create-admin'])) {
      array_push($errors, 'Email already exists!');
    }
  }

  $existingUsername = selectOne('users', ['username' => $user['username']]);
  if ($existingUsername) {

    if (isset($user['update-user']) && $existingUsername['id'] != $user['id']) {
      array_push($errors, 'Username already exists!');
    }

    if (isset($user['create-admin'])) {
      array_push($errors, 'Username already exists!');
    }

  }

  return $errors;
}


function validateLogin($user)
{
  $errors = array();

  if (empty($user['username'])) {
    array_push($errors, 'Username is required!');
  }

  if (empty($user['password'])) {
    array_push($errors, 'Password is required!');
  }

  return $errors;
}
