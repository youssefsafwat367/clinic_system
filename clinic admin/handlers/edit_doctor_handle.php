<?php
session_start();
require('../components/validation.php');
require('../components/connect.php');
$name = $_POST['name'];
$id = $_POST['id'];
if (!$validate->sanitize($_SERVER['REQUEST_METHOD'])) {
    $errors = "The method is not defined";
    $_SESSION['error'] = $errors;
    $validate->redirect("../operations/update_doctor.php?id= $id");
    die;
} elseif ($validate->required_VALIDATION($_POST['name'])) {
    $errors = "The doctor name is required";
    $_SESSION['error'] = $errors;
    $validate->redirect("../operations/update_doctor.php?id=$id");
    die;
} elseif ($validate->required_VALIDATION($_FILES['image']['name'])) {
    $errors = "The doctor image is required";
    $_SESSION['error'] = $errors;
    $validate->redirect("../operations/update_doctor.php?id=$id");
    die; }
else {
    $image = $_FILES['image']['name'];
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $rename = time() . '.' . $ext;
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'D:\My Courses\Back End\Eraa Soft Course\Sessions codes\project clinic\clinic\doctors images\\' . $rename;
    $user->update_user(['name' => $name ,"image" => $rename] , "doctors" , "id=$id") ;
    move_uploaded_file($image_tmp_name, $image_folder);
    $validate->redirect("../view_doctors_and_users.php");

}
