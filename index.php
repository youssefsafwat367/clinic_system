<?php include_once("./cont/header.php");
session_start();
if (empty($_SESSION)) {
    header("Location:./login.php");
}
include "./components/connect.php";
include "./components/validation.php";
$majors = $user->getusers(['title', "image", 'id'], "major");
$doctors = $user->get_specific();
?>

<body>
    <div class="page-wrapper">
        <nav class="navbar navbar-expand-lg navbar-expand-md bg-blue sticky-top">
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
        <div class="container-fluid bg-blue text-white pt-3">
            <div class="container pb-5">
                <div class="row gap-2">
                    <div class="col-sm order-sm-2">
                        <img src="assets/images/banner.jpg" class="img-fluid banner-img banner-img" alt="banner-image" height="200">
                    </div>
                    <div class="col-sm order-sm-1">
                        <h1 class="h1">Have a Medical Question?</h1>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa nesciunt repellendus itaque,
                            laborum
                            saepe
                            enim maxime, delectus, dicta cumque error cupiditate nobis officia quam perferendis
                            consequatur
                            cum
                            iure
                            quod facere.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <h2 class="h1 fw-bold text-center my-4">majors</h2>
            <div class="majors-grid">
                <?php
                foreach ($majors as $major) { ?>
                    <div class="card p-2" style="width: 18rem;">
                        <img src="./major images/<?= $major['image'] ?>" class="card-img-top rounded-circle card-image-circle" alt="major">
                        <div class="card-body d-flex flex-column gap-1 justify-content-center">
                            <h4 class="card-title fw-bold text-center"><?= $major['title'] ?></h4>
                            <a href="./doctors/index.php?id=<?= $major['id'] ?>" class="btn btn-outline-primary card-button">Browse Doctors</a>
                        </div>
                    </div>
                <?php
                } ?>
                <h2 class="h1 fw-bold text-center my-4" style="position:absolute;        bottom: -234px;">doctors</h2>

                <section class="splide home__slider__doctors mb-5">
                    <div class="splide__track "> <br>
                        <br>
                        <br>
                        <br>
                        <ul class="splide__list">
                            <?php
                            foreach ($doctors as $doctor) { ?>
                                <li class="splide__slide">
                                    <div class="card p-2" style="width: 18rem;">
                                        <img src="./doctors images/<?= $doctor['image'] ?>" class="card-img-top rounded-circle card-image-circle" alt="major">
                                        <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                            <h4 class="card-title fw-bold text-center"><?= $doctor['name'] ?></h4>
                                            <h6 class="card-title fw-bold text-center"><?= $doctor['title'] ?></h6>
                                            <a href="./doctors/doctor.php?id=<?= $doctor['id'] ?>" class="btn btn-outline-primary card-button">Book an
                                                appointment</a>
                                        </div>
                                    </div>
                                </li>
                            <?php
                            } ?>
                        </ul>
                    </div>
                </section>
            </div>
            <div class="banner container d-block d-lg-grid d-md-block d-sm-block">
                <div class="info">
                    <div class="info__details">
                        <img src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/medical-care-icon.svg" alt="" width="50" height="50">
                        <h4 class="title m-0">
                            everything you need is found at VCare.
                        </h4>
                        <p class="content">
                            search for a doctor and book an appointment in a hospital, clinic, home visit or even by phone,
                            you
                            can also order medicine or book a surgery.
                        </p>
                    </div>
                </div>
                <div class="info">
                    <div class="info__details">
                        <img src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/medical-care-icon.svg" alt="" width="50" height="50">
                        <h4 class="title m-0">
                            everything you need is found at VCare.
                        </h4>
                        <p class="content">
                            search for a doctor and book an appointment in a hospital, clinic, home visit or even by phone,
                            you
                            can also order medicine or book a surgery.
                        </p>
                    </div>
                </div>
                <div class="info">
                    <div class="info__details">
                        <img src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/medical-care-icon.svg" alt="" width="50" height="50">
                        <h4 class="title m-0">
                            everything you need is found at VCare.
                        </h4>
                        <p class="content">
                            search for a doctor and book an appointment in a hospital, clinic, home visit or even by phone,
                            you
                            can also order medicine or book a surgery.
                        </p>
                    </div>
                </div>
                <div class="info">
                    <div class="info__details">
                        <img src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/medical-care-icon.svg" alt="" width="50" height="50">
                        <h4 class="title m-0">
                            everything you need is found at VCare.
                        </h4>
                        <p class="content">
                            search for a doctor and book an appointment in a hospital, clinic, home visit or even by phone,
                            you
                            can also order medicine or book a surgery.
                        </p>
                    </div>
                </div>
                <div class="bottom--left bottom--content bg-blue text-white">
                    <h4 class="title">download the application now</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus facere eveniet in id, quod
                        explicabo minus ut, sint possimus, fuga voluptas. Eius molestias eveniet labore ullam magnam sequi
                        possimus quaerat!</p>
                    <div class="app-group">
                        <div class="app"><img src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/google-play-logo.svg" alt="">Google Play</div>
                        <div class="app"><img src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/apple-logo.svg" alt="">App Store</div>
                    </div>
                </div>
                <div class="bottom--right bg-blue text-white">
                    <img src="assets/images/banner.jpg" class="img-fluid banner-img">
                </div>
            </div>
        </div>


        <?php include_once("./cont/footer.php"); ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js" integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="assets/scripts/home.js"></script>
</body>

</html>