<?php include_once("../cont/header_doctor.php");
include "../components/connect.php";
include "../components/validation.php";
session_start();
if (empty($_SESSION)) {
    header("Location:./login.php");
}
if (!empty($_GET)) {
    $doctors = $user->get_specific_by_id($_GET['id']);
} else {
    $doctors = $user->get_specific();
}
?>

<body>
    <div class="page-wrapper">
        <nav class="navbar navbar-expand-lg navbar-expand-md bg-blue sticky-top">
            <div class="container">
                <div class="navbar-brand">
                    <a class="fw-bold text-white m-0 text-decoration-none h3" href="../index.php">VCare</a>
                </div>
                <button class="navbar-toggler btn-outline-light border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <div class="d-flex gap-3 flex-wrap justify-content-center" role="group">
                        <a type="button" class="btn btn-outline-light navigation--button" href="../index.php">Home</a>
                        <a type="button" class="btn btn-outline-light navigation--button" href="../majors.php">majors</a>
                        <a type="button" class="btn btn-outline-light navigation--button" href="./index.php">Doctors</a>
                        <?php if (empty($_SESSION['email'])) : ?>
                            <a type="button" class="btn btn-outline-light navigation--button" href="./login.php">login</a>
                        <?php endif; ?>
                        <?php if (!empty($_SESSION['email'])) : ?>
                            <a type="button" class="btn btn-outline-light navigation--button" href="../handlers/logout_handle.php">Logout</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="../index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">doctors</li>
                </ol>
            </nav>


            <div class="doctors-grid">
                <?php
                foreach ($doctors as $doctor) { ?>
                    <div class="card p-2" style="width: 18rem;">
                        <img src="../doctors images/<?= $doctor['image'] ?>" class="card-img-top rounded-circle card-image-circle" alt="major">
                        <div class="card-body d-flex flex-column gap-1 justify-content-center">
                            <h4 class="card-title fw-bold text-center"><?= $doctor['name'] ?></h4>
                            <h6 class="card-title fw-bold text-center"><?= $doctor['title'] ?></h6>
                            <a href="./doctor.php?id=<?= $doctor['id'] ?>" class="btn btn-outline-primary card-button">Book an
                                appointment</a>
                        </div>
                    </div>
                <?php
                } ?>
            </div>
        </div>

    </div>

    </div>
    </div>
    <?php include_once("../cont/footer_doctor.php"); ?>