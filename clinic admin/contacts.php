<?php
include '../components/connect.php';
include '../components/validation.php';
$doctors = $user->get_specific();
$users = $user->getusers(['*'], "contacts");

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
      <h1 class="heading" style="color:white;">all Contacts</h1>
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
                  <th>UserName</th>
                  <th>User Email</th>
                  <th>User Phone</th>
                  <th>User Subject</th>
                  <th>User Message</th>
                  <th>Operations</th>

               </tr>
            </thead>
            <tbody>

               <?php
               foreach ($users as $user) :
               ?>
                  <tr>
                     <td><?= $user['id'] ?></td>
                     <td><?= $user['name'] ?></td>
                     <td><?= $user['email'] ?></td>
                     <td><?= $user['phone'] ?></td>
                     <td><?= $user['subject'] ?></td>
                     <td><?= $user['message'] ?></td>
                     <td>
                        <a href="./handlers/delete_handle.php?message_id=<?= $user['id'] ?>" class="delete">Delete</a>
                     </td>
                  </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>
   </section>

</body>

</html>