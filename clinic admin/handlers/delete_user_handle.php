<?php
session_start();
require "../components/connect.php";
require "../components/validation.php";
$id = $_GET['id'];
$user->delete_user("user", "id=$id");
$validate->redirect("../../login.php");
