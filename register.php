<?php include_once("./cont/header.php");
session_start();
?>

<body>
    <div class="page-wrapper">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="./index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Register</li>
                </ol>
                <?php
                if (isset($_SESSION['error'])) {
                ?>
                    <div class="danger_massage"><?= $_SESSION['error']; ?></div>
                <?php } elseif (isset($_SESSION['errors_for_username'])) {
                ?>
                    <div class="danger_massage"><?= $_SESSION['errors_for_username']; ?></div>
                <?php } elseif (isset($_SESSION['errors_for_password'])) {
                ?>
                    <div class="danger_massage"><?= $_SESSION['errors_for_password']; ?></div>
                <?php } elseif (isset($_SESSION['errors_for_email'])) {
                ?>
                    <div class="danger_massage"><?= $_SESSION['errors_for_email']; ?></div>
                <?php } elseif (isset($_SESSION['errors_for_phone'])) {
                ?>
                    <div class="danger_massage"><?= $_SESSION['errors_for_phone']; ?></div>
                <?php } elseif (isset($_SESSION['success'])) { ?>
                    <div class="success_massage"><?= $_SESSION['success']; ?></div>
                <?php }
                unset($_SESSION['error']);
                unset($_SESSION['errors_for_username']);
                unset($_SESSION['errors_for_password']);
                unset($_SESSION['errors_for_phone']);
                unset($_SESSION['errors_for_email']);
                unset($_SESSION['success']);

                ?>
            </nav>
            <div class="d-flex flex-column gap-3 account-form mx-auto mt-5">
                <form class="form" method="post" action="./handlers/register_handle.php">
                    <div class="form-items">
                        <div class="mb-3">
                            <label class="form-label required-label" for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="phone">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="password">password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Create account</button>
                </form>
                <div class="d-flex justify-content-center gap-2">
                    <span>already have an account?</span><a class="link" href="./login.php"> login</a>
                </div>
            </div>

        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js" integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>