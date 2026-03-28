<?php
include 'koneksi.php';

$queryProfile = mysqli_query($conn, "SELECT * FROM profile LIMIT 1");
$profile = mysqli_fetch_assoc($queryProfile);

$queryExperiences = mysqli_query($conn, "SELECT * FROM experiences");
$querySkills = mysqli_query($conn, "SELECT * FROM skills");
$queryCertificates = mysqli_query($conn, "SELECT * FROM certificates");
$queryAwards = mysqli_query($conn, "SELECT * FROM awards");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nabdaff Portofolio</title>
    <link rel="icon" type="image/x-icon" href="assets/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Montserrat:wght@200;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body id="app">

<header class="navbar navbar-expand-lg fixed-top px-md-5">
    <div class="container-fluid">
        <div class="logo d-flex align-items-center fw-bold text-white text-uppercase">
            <?php echo $profile['name']; ?>
        </div>
        <nav class="ms-auto d-none d-md-block">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#certificates">Certificates</a>
            <a href="#achievements">Achievements</a>
        </nav>
    </div>
</header>

<section id="home" class="hero reveal mt-lg-5">
    <div class="container">
        <div class="row align-items-center justify-content-between py-5">
            <div class="col-lg-7 hero-text">
                <h2 class="font-premium text-uppercase mb-0">Hello, I'm</h2>
                <h1 class="display-3 fw-bold my-2 text-white"><?php echo $profile['name']; ?></h1>
                <h3 class="h4 text-gradient mb-4"><?php echo $profile['titles']; ?></h3>
                <p class="hero-desc lead mb-5 opacity-75"><?php echo $profile['bio']; ?></p>
                <div class="d-flex gap-3 align-items-center">
                    <a href="#about" class="btn-glow text-decoration-none">Explore More</a>
                    <a href="edit.php" class="btn btn-outline-warning rounded-pill px-4">Edit Profile</a>
                </div>
            </div>
            <div class="col-lg-5 hero-img d-flex justify-content-center mt-5 mt-lg-0">
                <div class="img-frame">
                    <img src="assets/Profile.jpeg" alt="<?php echo $profile['name']; ?>" class="img-fluid profile-pic">
                </div>
            </div>
        </div>
    </div>
</section>

<section id="about" class="about reveal">
    <div class="container">
        <h2 class="section-title">About Me</h2>
        <div class="row g-5 mt-4">
            <div class="col-lg-6 about-text">
                <p class="lead fw-normal text-white-50"><?php echo $profile['about_long']; ?></p>
                <h3 class="mt-5 mb-4 border-start border-info border-4 ps-3 text-white">Experience</h3>
                <ul class="experience-list text-white-50">
                    <?php while($exp = mysqli_fetch_assoc($queryExperiences)) : ?>
                        <li class="mb-3"><?php echo $exp['description']; ?></li>
                    <?php endwhile; ?>
                </ul>
            </div>
            <div class="col-lg-6 skills">
                <h3 class="mb-4 border-start border-info border-4 ps-3 text-white">Technical Proficiency</h3>
                <?php while($skill = mysqli_fetch_assoc($querySkills)) : ?>
                    <div class="mb-4">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="fw-bold text-white"><?php echo $skill['name']; ?></span>
                            <span class="text-info"><?php echo $skill['level']; ?>%</span>
                        </div>
                        <div class="progress progress-bg">
                            <div class="progress-bar" role="progressbar" style="width: <?php echo $skill['level']; ?>%" aria-valuenow="<?php echo $skill['level']; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>

<section id="certificates" class="certificates reveal">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h2 class="section-title mb-0">Certificates & Licenses</h2>
            <a href="tambah_cert.php" class="btn btn-info btn-sm rounded-pill px-4">+ Tambah Data</a>
        </div>
        
        <div class="row g-4 mt-2">
            <?php 
            $queryCertCards = mysqli_query($conn, "SELECT * FROM certificates");
            while($cert = mysqli_fetch_assoc($queryCertCards)) : 
            ?>
                <div class="col-md-4">
                    <div class="card h-100 card-glass border-0">
                        <div class="card-img-wrapper" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modalCert<?php echo $cert['id']; ?>">
                            <img src="<?php echo $cert['img']; ?>" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body p-4 text-center">
                            <h3 class="h5 fw-bold mb-2 text-white"><?php echo $cert['title']; ?></h3>
                            <p class="text-info-bright small mb-2"><?php echo $cert['issuer']; ?></p>
                            <a href="hapus_cert.php?id=<?php echo $cert['id']; ?>" class="btn btn-outline-danger btn-sm w-100 rounded-pill" onclick="return confirm('Hapus?')">Hapus</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <?php 
    $queryCertModals = mysqli_query($conn, "SELECT * FROM certificates");
    while($cert = mysqli_fetch_assoc($queryCertModals)) : 
    ?>
        <div class="modal fade modal-clean" id="modalCert<?php echo $cert['id']; ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header border-0 pb-0 justify-content-end p-2">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0 text-center">
                        <img src="<?php echo $cert['img']; ?>" class="img-fluid rounded" style="max-height: 85vh;" alt="...">
                        <h5 class="text-white mt-3 pb-3"><?php echo $cert['title']; ?></h5>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</section>

<section id="achievements" class="awards reveal">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h2 class="section-title mb-0">Achievements</h2>
            <a href="tambah.php" class="btn btn-info btn-sm rounded-pill px-4">+ Tambah Data</a>
        </div>
        <div class="row g-4">
            <?php 
            $queryAwardCards = mysqli_query($conn, "SELECT * FROM awards");
            while($award = mysqli_fetch_assoc($queryAwardCards)) : 
            ?>
                <div class="col-md-4">
                    <div class="card h-100 card-glass border-0">
                        <div class="card-img-wrapper" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modalAward<?php echo $award['id']; ?>">
                            <img src="<?php echo $award['img']; ?>" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body p-4 text-center">
                            <h3 class="h5 fw-bold mb-2 text-white"><?php echo $award['title']; ?></h3>
                            <p class="text-info-bright small mb-1"><?php echo $award['organization']; ?></p>
                            <p class="text-white-50 small mb-3"><?php echo $award['year']; ?></p>
                            <a href="hapus.php?id=<?php echo $award['id']; ?>" class="btn btn-outline-danger btn-sm w-100 rounded-pill" onclick="return confirm('Hapus?')">Hapus</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <?php 
    $queryAwardModals = mysqli_query($conn, "SELECT * FROM awards");
    while($award = mysqli_fetch_assoc($queryAwardModals)) : 
    ?>
        <div class="modal fade modal-clean" id="modalAward<?php echo $award['id']; ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header border-0 pb-0 justify-content-end p-2">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0 text-center">
                        <img src="<?php echo $award['img']; ?>" class="img-fluid rounded" style="max-height: 85vh;" alt="...">
                        <h5 class="text-white mt-3 pb-3"><?php echo $award['title']; ?></h5>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</section>

<footer class="footer-glass mt-5 py-4">
    <div class="container text-center">
        <p class="mb-0">© 2026 <?php echo $profile['name']; ?> • All Rights Reserved</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function reveal() {
        var reveals = document.querySelectorAll(".reveal");
        for (var i = 0; i < reveals.length; i++) {
            var windowHeight = window.innerHeight;
            var elementTop = reveals[i].getBoundingClientRect().top;
            var elementVisible = 100;
            if (elementTop < windowHeight - elementVisible) {
                reveals[i].classList.add("show");
            }
        }
    }
    window.addEventListener("scroll", reveal);
    document.addEventListener("DOMContentLoaded", reveal);
</script>

</body>
</html>