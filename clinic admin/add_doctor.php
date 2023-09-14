<?php
session_start();
include "./components/connect.php";
include "./components/validation.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add Product</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">

</head>

<body>

   <?php include 'components/header.php'; ?>

   <section class="product-form">

      <form action="./handlers/add_new_doctor.php" method="POST" enctype="multipart/form-data">
         <h3>Doctor info</h3>
         <p>Doctor name <span>*</span></p>
         <input type="text" name="name" placeholder="enter Doctor name" required maxlength="50" class="box">
         <p>Major Id <span>*</span></p>
         <input type="number" name="major_id" placeholder="enter Major Id" required min="0" max="9999999999" maxlength="10" class="box">
         <p>Doctor bio <span>*</span></p>
         <textarea  id="" cols="30" rows="10" class="box" name="doctor_bio"></textarea>
         <p>Doctor image <span>*</span></p>
         <input type="file" name="image" required accept="image/*" class="box">
         <input type="submit" class="btn"  value="Add New Doctor">
      </form>
   </section>


   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

   <script src="js/script.js"></script>

   <?php include 'components/alert.php'; 
   ?>

</body>

</html>