<?php
session_start();
require "../../components/validation.php";
require "../../components/connect.php";
$id = $_GET['id'];
$details = $user->get_specific_by__id($id);

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
    </style>
</head>

<body>
    <div class="update-form">
        <h1>Update Profile</h1>

        <form action="../handlers/edit_doctor_handle.php" method="POST" enctype="multipart/form-data">
            <?php
            if (isset($_SESSION['error'])) {
                echo $_SESSION['error'];
                echo "<br>";
            }
            unset($_SESSION['error']);
            ?>
            <input type="hidden" name="id" value="<?=$id?>">
            <label for="name">Name:</label>
            <input type=" text" id="name" name="name" value="<?php echo $details[0]['name'] ?>">
            <br>
            <br>
            <label for="image">Image:</label>
            <input type="file" name="image">
            <br>
            <button type="submit" style="margin-left : 150px ;">Update</button>
        </form>
    </div>
</body>

</html>