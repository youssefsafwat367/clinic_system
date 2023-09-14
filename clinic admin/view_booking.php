<?php
include '../components/connect.php';
include '../components/validation.php';
$booking_details = $user->get_specific_doctor_by__id();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>View Products</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
   <link rel="stylesheet" href="./css/table_style.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="../assets/assets/css/style.css">
</head>

<body>

   <?php include 'components/header.php'; ?>
   <section class="products">
      <h1 class="heading" style="color:white;">all Booking</h1>
      <?php
      if (isset($_SESSION['confirmed'])) {
                ?>
                    <div class="success_massage_me"><?= $_SESSION['confirmed']; ?></div>
                <?php } elseif (isset($_SESSION['rejected'])) {
                ?>
                    <div class="danger_massage_me"><?= $_SESSION['rejected']; ?></div>
                <?php }
               unset($_SESSION['confirmed']);
               unset($_SESSION['rejected']);
                ?>
      <?php
      if (isset($_SESSION['sql_error'])) {
      ?>
         <div class="danger_massage_me"><?= $_SESSION['sql_error']; ?></div>
      <?php }
      unset($_SESSION['sql_error']); ?>

      <div class="table-wrapper">
         <table class="fl-table">
            <thead>
               <tr>
                  <th> # </th>
                  <th>Patient Name</th>
                  <th>Patient Email</th>
                  <th>Patient Phone</th>
                  <th>Booking Date</th>
                  <th>Doctor Name</th>
                  <th>Status</th>
                  <th>Operations</th>
               </tr>
            </thead>
            <tbody>

               <?php
               foreach ($booking_details as $booking_detail) :
               ?>
                  <tr>
                     <td><?= $booking_detail['id'] ?></td>
                     <td><?= $booking_detail['name'] ?></td>
                     <td><?= $booking_detail['email'] ?></td>
                     <td><?= $booking_detail['phone'] ?></td>
                     <td><?= $booking_detail['date'] ?></td>
                     <td><?= $booking_detail['doctor_name'] ?></td>
                     <td><?= $booking_detail['status'] ?></td>
                     <td>
                        <a href="./handlers/edit_booking.php?confirm_id=<?= $booking_detail['id'] ?>" class="update">Confirm</a>
                        <a href="./handlers/edit_booking.php?reject_id=<?= $booking_detail['id'] ?>" class="delete">Reject</a>
                     </td>
                  </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>
   </section>

</body>

</html>