<?php
include '../components/connect.php';
include '../components/validation.php';
$doctors = $user->get_specific();
$users = $user->getusers(['id', 'name', 'email', 'phone', 'role'], "user");

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
      <h1 class="heading" style="color:white;">all Doctors</h1>
      <?php
      if (isset($_SESSION['sql_error'])) {
                ?>
                    <div class="danger_massage_me"><?= $_SESSION['sql_error']; ?></div>
                <?php } unset($_SESSION['sql_error']) ;?>

      <div class="table-wrapper">
         <table class="fl-table">
            <thead>
               <tr>
                  <th> # </th>
                  <th>Doctor Name</th>
                  <th>Doctor Title</th>
                  <th>Image</th>
                  <th>Operations</th>
               </tr>
            </thead>
            <tbody>

               <?php
               foreach ($doctors as $doctor) :
               ?>
                  <tr>
                     <td><?= $doctor['id'] ?></td>
                     <td><?= $doctor['name'] ?></td>
                     <td><?= $doctor['title'] ?></td>
                     <td><img src="../doctors images/<?= $doctor['image'] ?>" alt="error"></td>
                     <td>
                        <a href="./operations/update_doctor.php?id=<?= $doctor['id'] ?>" class="update">Update</a>
                        <a href="./handlers/delete_handle.php?doctor_id=<?= $doctor['id'] ?>" class="delete">Delete</a>
                     </td>
                  </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>
   </section>
   <section class="products">
      <h1 class="heading" style="color:white;">all Users</h1>
      <div class="table-wrapper">
         <table class="fl-table">
            <thead>
               <tr>
                  <th> # </th>
                  <th>User Name</th>
                  <th>User Email</th>
                  <th>Phone</th>
                  <th>Operations</th>
               </tr>
            </thead>
            <tbody>

               <?php
               foreach ($users as $user) :
                  if ($user['role']=='user') {
                  
               ?>

                  <tr>
                     <td><?= $user['id'] ?></td>
                     <td><?= $user['name'] ?></td>
                     <td><?= $user['email'] ?></td>
                     <td><?= $user['phone'] ?></td>
                     <td>
                        <a href="./operations/update_user.php?id=<?= $user['id'] ?>" class="update">Update</a>
                        <a href="./handlers/delete_handle.php?user_id=<?= $user['id'] ?>" class="delete">Delete</a>
                     </td>
                  </tr>
               <?php
                  } endforeach; ?>
            </tbody>
         </table>
      </div>
   </section>
</body>
</html>