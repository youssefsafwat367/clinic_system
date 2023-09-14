<?php
session_start();
include "../components/connect.php";
include "../components/validation.php";
if (($validate->sanitize($_SERVER["REQUEST_METHOD"]) && $validate->check_written($_SERVER["REQUEST_METHOD"]))) {
    foreach ($_POST as $key => $input) :
        $$key = trim($input);
    endforeach;
} else {
    echo "invalid method";
}
$error_for_email = null ;
$error_for_password = null ;
if (($validate->required_VALIDATION($email))) {
    $error_for_email = "Please Write Your Email";
}

if ($validate->required_VALIDATION($password)) {
    $error_for_password = "Please Write Your Password";
}
if (!empty($error_for_email) or !empty($error_for_password)) {
    $_SESSION['error_for_email'] = $error_for_email;
    $_SESSION['error_for_password'] = $error_for_password;
    $validate->redirect('../login.php');
}

$verify = 0 ; 
if (empty($error_for_email) && empty($error_for_password)) {
    $users = $validate->get_users("Localhost", "root", "", "clinic", "user");
    foreach ($users as $user) {
        foreach ($user as $value) {    
            if ($user[2] == $email) {
                if ($user[3] == sha1($password)) {
                    if ($user[4] =="user") {
                        $verify = 1 ; 
                        $_SESSION['email'] = $email;
                        $validate->redirect('../index.php');
                        die ;
                    }else{
                        $verify = 1; 
                        $_SESSION['email'] = $email;
                        $validate->redirect('../clinic admin/view_doctors_and_users.php');
                        die();
                    }
                }
            } 
        }
        
    }
    if ($verify == 0 ) {
    $error_for_password = "Email Or Password Is Incorrect";
    $_SESSION['error_for_password'] = $error_for_password;
    $validate->redirect('../login.php');
    }
}else {
    $error_for_password = "Email Or Password Is Incorrect";
    $_SESSION['error_for_password'] = $error_for_password;
    $validate->redirect('../login.php');
    die();
}
