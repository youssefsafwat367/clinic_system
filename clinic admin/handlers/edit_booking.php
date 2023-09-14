<?php
session_start();
require "../components/connect.php";
require "../components/validation.php";
if (isset($_GET['confirm_id'])) {
    $booking_id = $_GET['confirm_id'] ;
    $user->update_user(['status' =>'Confirmed'] , "booking" , "id=$booking_id") ;
    $_SESSION['confirmed'] = "The Booking is Completely Confirmed" ;
    $validate->redirect('../view_booking.php');
}
if (isset($_GET['reject_id'])) {
    $booking_id = $_GET['reject_id'];
    $user->update_user(['status' => 'Rejected'], "booking", "id=$booking_id");
    $_SESSION['rejected'] = "The Booking is Completely Rejected";
    $validate->redirect('../view_booking.php');
}

