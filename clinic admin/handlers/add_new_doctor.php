<?php
session_start();
include '../components/connect.php' ;
include '../components/validation.php';
var_dump($_POST);
$name = $_POST['name'];
$major_id = $_POST['major_id'];
$doctor_bio = $_POST['doctor_bio'];
$image = $_FILES['image']['name'];
$ext = pathinfo($image, PATHINFO_EXTENSION);
$rename = time().'.'.$ext;
$image_tmp_name = $_FILES['image']['tmp_name'];
$image_folder = 'D:\My Courses\Back End\Eraa Soft Course\Sessions codes\project clinic\clinic\doctors images\\'.$rename;
$user->Insert(["name"=>$name , "major_id"=>$major_id , "bio"=>$doctor_bio ,"image"=>$rename ],"doctors") ;
move_uploaded_file($image_tmp_name, $image_folder);
$validate->redirect('../view_doctors_and_users.php');


?>