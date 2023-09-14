<?php
session_start();
require('../components/validation.php');
require('../components/connect.php');
$id = $_POST['user_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
if (!$validate->sanitize($_SERVER['REQUEST_METHOD'])) {
    $errors = "The method is not defined";
    $_SESSION['error'] = $errors;
    $validate->redirect("../operations/update_user.php?id=$id");
    die;
} elseif ($validate->required_VALIDATION($name)) {
    $errors = "The Username is required";
    $_SESSION['error'] = $errors;
    $validate->redirect("../operations/update_user.php?id=$id");
    die;
} elseif ($validate->required_VALIDATION($email)) {
    $errors = "The Email is required";
    $_SESSION['error'] = $errors;
    $validate->redirect("../operations/update_user.php?id=$id");
    die;
} elseif ($validate->required_VALIDATION($password)) {
    $errors = "The User Password is required";
    $_SESSION['error'] = $errors;
    $validate->redirect("../operations/update_user.php?id=$id");
    die;
} elseif ($validate->required_VALIDATION($phone)) {
    $errors = "The User Phone is required";
    $_SESSION['error'] = $errors;
    $validate->redirect("../operations/update_user.php?id=$id");
    die;
} else {
    $user->update_user(['name' => $name, "email" => $email, "password" => sha1($password) , "phone" => $phone ], "user", "id=$id");
    $validate->redirect("../view_doctors_and_users.php");
}
