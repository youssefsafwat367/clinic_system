<?php
include 'components/connect.php';
include 'components/validation.php'; 
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

</head>

<body >

    <?php include 'components/header.php';
    $id = $validate->get_id("localhost", "root", "", "clinic", "user", $_SESSION['email']);
    $users = $validate->get_user_details("localhost", "root", "", "clinic", "user", "id=$id");
    ?>
    <section class="products">
        <h1 class="heading" style="color:white;">My Account</h1>
        <div class="my_details">
            <div class="user-det">My Name : <div class="user_details"> <?= $users[0][1] ?></div>
                <div class="user-det">My Email : <div class="user_details"> <?= $users[0][2] ?></div>
                    <div class="user-det">My Role : <div class="user_details"> <?= $users[0][4] ?></div>
                        <br>
                        <br>
                        <div>
                            <a href="update_user.php?id=<?php echo $id ?>" class="update">Update</a>
                        </div>
                        <br>
                        <br>
                        <div>
                            <a href="./handlers/delete_user_handle.php?id=<?php echo $id ?>" class="delete">Delete</a>
                        </div>
                    </div>
    </section>

</body>

</html>