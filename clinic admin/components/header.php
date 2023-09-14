<?php
session_start();
if (empty($_SESSION)) {
   header("Location:login.php");
}
require "components/val.php";
?>
<header class="header">
   <section class="flex">
      <a href="#" class="logo">Vcare</a>
      <nav class="navbar">
         <a href="add_doctor.php">Add New Doctor</a>
         <a href="./view_doctors_and_users.php">view Doctors And Users</a>
         <a href="./read_account.php">my Account</a>
         <a href="./view_booking.php">Booking</a>
         <a href="./contacts.php">Contacts</a>

         <a href="logout.php" class="cart-btn">Logout</a>
      </nav>
      <div id="menu-btn" class="fas fa-bars"></div>
   </section>
</header>