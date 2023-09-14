<?php
session_start();
require "../components/connect.php";
require "../components/validation.php";
try {
    if (isset($_GET['user_id'])) {
        $id = $_GET['user_id'];
        $user->delete_user("user", "id=$id");
        $validate->redirect("../view_doctors_and_users.php");
    }
} catch (PDOException $th) {
    $_SESSION['sql_error'] = "Can't Delete This User As It Has A Foreign Key That References it";
    $validate->redirect("../view_doctors_and_users.php");
}
try {
    if (isset($_GET['doctor_id'])) {
        $id = $_GET['doctor_id'];
        $user->delete_user("doctors", "id=$id");
        $validate->redirect("../view_doctors_and_users.php");
    }
} 
catch (PDOException $th) {
    $_SESSION['sql_error'] = "Can't Delete This Doctor As It Has A Foreign Key That References it";
    $validate->redirect("../view_doctors_and_users.php");
}

    if (isset($_GET['message_id'])) {
        $id = $_GET['message_id'];
        $user->delete_user("contacts", "id=$id");
        $validate->redirect("../contacts.php");
    }

