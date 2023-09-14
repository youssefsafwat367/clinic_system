<?php include_once("./cont/header.php");
session_start();
if (empty($_SESSION)) {
    header("Location:./login.php");
}
?>


<body>
    <div class="page-wrapper">
        <nav class="navbar navbar-expand-lg navbar-expand-md bg-blue sticky-top navbar-light">
            <div class="container">
                <div class="navbar-brand">
                    <a class="fw-bold text-white m-0 text-decoration-none h3" href="./index.php">VCare</a>
                </div>
                <button class="navbar-toggler btn-outline-light border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <div class="d-flex gap-3 flex-wrap justify-content-center" role="group">
                        <a type="button" class="btn btn-outline-light navigation--button" href="./index.php">Home</a>
                        <a type="button" class="btn btn-outline-light navigation--button" href="./majors.php">majors</a>
                        <a type="button" class="btn btn-outline-light navigation--button" href="./doctors/index.php">Doctors</a>
                        <?php if (empty($_SESSION['email'])) : ?>
                            <a type="button" class="btn btn-outline-light navigation--button" href="./login.php">login</a>
                        <?php endif; ?>
                        <?php if (!empty($_SESSION['email'])) : ?>
                            <a type="button" class="btn btn-outline-light navigation--button" href="./handlers/logout_handle.php">Logout</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="./index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">contact</li>
                </ol>
            </nav>
            <div class="d-flex flex-column gap-3 account-form mx-auto mt-5">
                <?php
                if (isset($_SESSION['error'])) {
                ?>
                    <div class="danger_massage"><?= $_SESSION['error']; ?></div>
                <?php } elseif (isset($_SESSION['errors_for_username'])) {
                ?>
                    <div class="danger_massage"><?= $_SESSION['errors_for_username']; ?></div>
                <?php } elseif (isset($_SESSION['errors_for_phone'])) {
                ?>
                    <div class="danger_massage"><?= $_SESSION['errors_for_phone']; ?></div>
                <?php } elseif (isset($_SESSION['errors_for_subject'])) {
                ?>
                    <div class="danger_massage"><?= $_SESSION['errors_for_subject']; ?></div>
                <?php } elseif (isset($_SESSION['errors_for_email'])) {
                ?>
                    <div class="danger_massage"><?= $_SESSION['errors_for_email']; ?></div>
                <?php } elseif (isset($_SESSION['errors_for_message'])) {
                ?>
                    <div class="danger_massage"><?= $_SESSION['errors_for_message']; ?></div>
                <?php } elseif (isset($_SESSION['success'])) {
                ?>
                    <div class="success_massage"><?= $_SESSION['success']; ?></div>
                <?php }
                unset($_SESSION['error']);
                unset($_SESSION['errors_for_username']);
                unset($_SESSION['errors_for_phone']);
                unset($_SESSION['errors_for_subject']);
                unset($_SESSION['errors_for_message']);

                unset($_SESSION['errors_for_email']);
                unset($_SESSION['success']);
                ?>
                <form class="form" method="post" action="./handlers/contact_handle.php">
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
                            <label class="form-label required-label" for="subject">subject</label>
                            <input type="text" class="form-control" id="subject" name="subject">
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="message">message</label>
                            <textarea class="form-control" id="message" name="message"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>

    <?php include_once("./cont/footer.php"); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js" integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>