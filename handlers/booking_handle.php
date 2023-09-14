<?php
session_start();
require_once('../components/validation.php');
include "../components/connect.php";

// check method and written inputs
if (($validate->sanitize($_SERVER["REQUEST_METHOD"]) && $validate->check_written($_SERVER["REQUEST_METHOD"]))) {
    foreach ($_POST as $key => $input) :
        $$key = trim(htmlspecialchars(htmlentities($input)));
    endforeach;
} else {
    $_SESSION['error'] = "invalid method";
}
if (!empty($_SESSION['error'])) {
    $validate->redirect("../doctors/doctor.php?id={$_POST['doctor_id']}");
}

####################################------------- username Validation -------------##################################
// check username is set or not 
if ($validate->required_VALIDATION($name)) {
    $errors_for_username = "Username Is Required";
}
// check username characters is grater than 3 or not 
elseif ($validate->min_VALIDATION($name)) {
    $errors_for_username = "Username Characters Must Be Greater Than 3";
}
// check username characters is grater than 3 or not
elseif ($validate->max_VALIDATION($name)) {
    $errors_for_username = "Username Characters Must Be Lower Than 25 ";
}
// to return to register page with array 
if (!empty($errors_for_username)) {
    $_SESSION['errors_for_username'] =  $errors_for_username;
    $validate->redirect("../doctors/doctor.php?id={$_POST['doctor_id']}");
}
####################################------------- Email Validation -------------##################################
$check = $validate->check_existing("Localhost", "root", "", "clinic", "user", $email);
// check email is set or not 
if ($validate->required_VALIDATION($email)) {
    $errors_for_email = "Email Is Required";
}
// check if it is a correct email or not 
elseif (!$validate->valid_email_VALIDATION($email)) {
    $errors_for_email = "Please Enter A Valid Email";
}
if (!empty($errors_for_email)) {
    $_SESSION['errors_for_email'] =  $errors_for_email;
    $validate->redirect("../doctors/doctor.php?id={$_POST['doctor_id']}");
}

####################################------------- phone Validation -------------##################################
// check phone is set or not 
if ($validate->required_VALIDATION($phone)) {
    $errors_for_phone = "phone Is Required";
}
// check phone characters is grater than 8 or not 
elseif ($validate->min_password_VALIDATION($phone)) {
    $errors_for_phone = "phone Numbers Must Be Greater Than 8";
}
if (!empty($errors_for_phone)) {
    $_SESSION['errors_for_phone'] =  $errors_for_phone;
    $validate->redirect("../doctors/doctor.php?id={$_POST['doctor_id']}");
}


if (empty($error_for_email) && empty($error_for_password)) {
   $booking = $user->Insert(["name" => "$name" , "email" =>"$email" , "phone"=>"$phone" , "doctor_id"=>"{$_POST['doctor_id']}"] , "booking");
    $_SESSION['success'] = "The Booking Is Created Successfully";
    $validate->redirect("../doctors/doctor.php?id={$_POST['doctor_id']}");
}