<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="./css/styleuser.css">

</head>

<body>


    <section class="form-container">

        <form action="./handlers/register_handle.php" method="post">
            <?php if (!empty($_SESSION['success'])) :
            ?>
                <div class="delete-btn"><?php echo $_SESSION['success'] ?></div>
            <?php endif;  unset($_SESSION['success'])?>
            <h3>register now</h3>
            <input type="text" name="name" placeholder="enter your username" maxlength="20" class="box">
            <?php if (!empty($_SESSION['errors_for_username'][0])) :
            ?>
                <div class="delete-btn"><?php echo $_SESSION['errors_for_username'][0] ?></div>
            <?php endif;
            unset($_SESSION['errors_for_username'][0]) ?>
            <input type="email" name="email" placeholder="enter your email" maxlength="50" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
            <?php if (!empty($_SESSION['$errors_for_email'][0])) :
            ?>
                <div class="delete-btn"><?php echo $_SESSION['$errors_for_email'][0] ?></div>
            <?php endif;
            unset($_SESSION['$errors_for_email'][0]) ?>
            <input type="password" name="password" placeholder="enter your password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
            <?php if (!empty($_SESSION['errors_for_password'][0])) :
            ?>
                <div class="delete-btn"><?php echo $_SESSION['errors_for_password'][0] ?></div>
            <?php endif;
            unset($_SESSION['errors_for_password'][0]) ?>
            <input type="submit" value="register now" class="btn" name="submit">
            <p>Already Have An Account?</p>
            <a href="login.php" class="option-btn">login now</a>
        </form>

    </section>


    <!-- <script src="js/script.js"></script> -->

</body>

</html>