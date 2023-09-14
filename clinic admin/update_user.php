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
    <title>Update My Account</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="./css/table_style.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .update-form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .update-form h1 {
            font-size: 24px;
            margin: 0 0 20px;
        }

        .update-form input[type="text"],
        .update-form input[type="email"],
        .update-form input[type="password"],
        .update-form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .update-form input[type="file"] {
            margin-top: 10px;
        }

        .update-form button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .update-form button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <?php include 'components/header.php';

    $id = $_GET['id'] ;
    $users = $validate->get_user_details("localhost", "root", "", "clinic", "user", "id=$id");
    ?>

    <body>
        <br>
        <br>
        <div class="update-form">
            <h1>Update Profile</h1>
            <form action="./handlers/update_user_handle.php" method="POST">
                <?php

                if (isset($_SESSION['the_error'])) {

                    echo "<h2 style='color:black;'>" .$_SESSION['the_error']. "</h2>";
                    echo "<br>";
                }
                unset($_SESSION['the_error']);
                ?>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $users[0][1] ?>" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $users[0][2] ?>" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit" style="margin-left : 150px ;">Update</button>
            </form>
        </div>
    </body>

</html>
</body>

</html>