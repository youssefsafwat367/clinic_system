<?php
session_start();
require "../components/validation.php";
require "../components/connect.php";
$id = $_GET['id'];
$details = $validate->get_user_details("localhost", "root", "", "clinic", "user", "id=$id");

$id = $details[0][0];
$name = $details[0][1];
$email = $details[0][2];
$password = $details[0][3];
$phone = $details[0][5];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Update Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f1f1f1;
        }

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

        .button_to_edit {
            width: 98%;
            padding-top: 8px;
            padding-bottom: 8px;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="update-form">
        <h1>Update Profile</h1>

        <form action="../handlers/edit_user_handle.php" method="POST">
            <?php

            if (isset($_SESSION['error'])) {
                echo $_SESSION['error'];
                echo "<br>";
            }
            unset($_SESSION['error']);
            ?>
            <input type="hidden" name="user_id" value="<?php echo $id ?>">


            <label for="name">Name:</label>
            <br>
            <input class="button_to_edit" type=" text" id="name" name="name" value="<?php echo $name ?>">
            <br>
            <br>
            <label for="name">Email:</label>
            <br>
            <input class="button_to_edit" type=" email" id="category" name="email" value="<?php echo $email ?>">
            <br>
            <br>
            <label for="password">password:</label>
            <input class="button_to_edit" type="password" id="password" name="password">
            <br>
            <label for="phone">phone:</label>
            <br>
            <input class="button_to_edit" type="number" name="phone" value="<?php echo $phone ?>">
            <br>
            <br>
            <button type="submit" style="margin-left : 150px ;">Update</button>
        </form>
    </div>
</body>

</html>