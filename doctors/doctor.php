<link rel="stylesheet" href="../assets/assets/css/style.css">
<?php include_once("../cont/header_doctor.php");
session_start();
if (empty($_SESSION)) {
  header("Location:./login.php");
}
include "../components/connect.php";
include "../components/validation.php";
$doctor = $validate->get_user_details("localhost", "root", "", "clinic", "doctors", "id={$_GET['id']}");
$_SESSION['doctor_id'] = $_GET['id'] ;
$me = $validate->get_user_details("localhost", "root", "", "clinic", "user", "email='{$_SESSION['email']}'");;   
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
            <a type="button" class="btn btn-outline-light navigation--button" href="../doctors/index.php">Doctors</a>
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
      <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb" class="fw-bold my-4 h4">
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item">
            <a class="text-decoration-none" href="../index.php">Home</a>
          </li>
          <li class="breadcrumb-item">
            <a class="text-decoration-none" href="./index.php">doctors</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            <?= $doctor[0][1] ?>
          </li>
        </ol>
      </nav>
      <div class="d-flex flex-column gap-3 details-card doctor-details">
        <div class="details d-flex gap-2 align-items-center">
          <img src="../doctors images/<?= $doctor[0][4] ?>" alt="doctor" class="img-fluid rounded-circle" height="150" width="150" />
          <div class="details-info d-flex flex-column gap-3">
            <h4 class="card-title fw-bold"><?= $doctor[0][1] ?></h4>
            <h6 class="card-title fw-bold">
              <?= $doctor[0][5] ?>
            </h6>
          </div>
        </div>
        <hr />
        <?php
        if (isset($_SESSION['errors_for_email'])) {
        ?>
          <div class="danger_massage"><?= $_SESSION['errors_for_email']; ?></div>
        <?php } elseif (isset($_SESSION['errors_for_username'])) {
        ?>
          <div class="danger_massage"><?= $_SESSION['errors_for_username']; ?></div>
        <?php } elseif (isset($_SESSION['errors_for_phone'])) {
        ?>
          <div class="danger_massage"><?= $_SESSION['errors_for_phone']; ?></div>
        <?php } elseif (isset($_SESSION['success'])) {
        ?>
          <div class="success_massage"><?= $_SESSION['success']; ?></div>
        <?php }
        unset($_SESSION['errors_for_username']);
        unset($_SESSION['errors_for_phone']);
        unset($_SESSION['errors_for_email']);
        unset($_SESSION['success']); ?>
        <form class="form" method="post" action="../handlers/booking_handle.php">
          <div class="form-items">
            <div class="mb-3">
              <input type="hidden" value=<?= $_GET['id'] ?> name="doctor_id">
              <label class="form-label required-label" for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="<?= $me[0][1] ?>" />
            </div>
            <div class="mb-3">
              <label class="form-label required-label" for="phone">Phone</label>
              <input type="tel" class="form-control" id="phone" name="phone" value="<?= $me[0][5] ?>" />
            </div>
            <div class="mb-3">
              <label class="form-label required-label" for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="<?= $me[0][2] ?>" />
            </div>
          </div>
          <button type="submit" class="btn btn-primary">
            Confirm Booking
          </button>
        </form>
      </div>
    </div>
  </div>
  <?php include_once("../cont/footer_doctor.php"); ?>
  <script>
    const stars = document.querySelectorAll(".star");

    stars.forEach((star, index) => {
      star.addEventListener("click", () => {
        const isActive = star.classList.contains("active");
        if (isActive) {
          star.classList.remove("active");
        } else {
          star.classList.add("active");
        }
        for (let i = 0; i < index; i++) {
          stars[i].classList.add("active");
        }
        for (let i = index + 1; i < stars.length; i++) {
          stars[i].classList.remove("active");
        }
      });
    });
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js" integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>