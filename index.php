<?php 
include "config.php";

$data = mysqli_query($koneksi,"SELECT * FROM settings");
$data_sosial_media = mysqli_query($koneksi,"SELECT facebook, twitter, linkedin, instagram FROM settings");
$kegiatan = mysqli_query($koneksi, "SELECT * FROM kegiatan");

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <title>Web - Sistem Informasi Kelas Unggulan</title>
<!--
SOFTY PINKO
https://templatemo.com/tm-535-softy-pinko
-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-softy-pinko.css">

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <!-- <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>   -->
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">
                            <img src="assets/images/logo.png" alt="LogoS SMPN 12" style="width: 25%;"/>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="#welcome" class="active">Home</a></li>
                            <li><a href="#features">Tentang</a></li>
                            <li><a href="#work-process">Informasi</a></li>
                            <li><a href="#testimonials">Kegiatan</a></li>
                            <li><a href="register.php">Daftar</a></li>
                            <li><a href="login.php"><i class='fas fa-sign-in-alt'> &nbsp;</i>Masuk</a></li>
                            <!-- <li><a href="#contact-us">Contact Us</a></li> -->
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
    <?php while ($row = mysqli_fetch_assoc($data)) { ?>
    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="welcome">

        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            <div class="container">
                <div class="row">
                    <div class="offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 col-md-12 col-sm-12">
                        <h1><?= $row['title_header'] ?></h1>
                        <p><?= $row['lead_header'] ?></p>
                        <a href="login.php" class="main-button-slider">Daftar Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->
    <!-- ***** Features Big Item Start ***** -->
    <section class="section padding-top-70 padding-bottom-0" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-sm-12 align-self-center" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <img src="assets/images/left-image.png" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-top-fix">
                    <div class="left-heading">
                        <h2 class="section-title"><?= $row['title_tentang_1'] ?></h2>
                    </div>
                    <div class="left-text">
                        <?= $row['desk_tentang_1']?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="hr"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

    <!-- ***** Features Big Item Start ***** -->
    <section class="section padding-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-bottom-fix">
                    <div class="left-heading">
                        <h2 class="section-title"><?= $row['title_tentang_2'] ?></h2>
                    </div>
                    <div class="left-text">
                        <?= $row['desk_tentang_2'] ?>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5 col-md-12 col-sm-12 align-self-center mobile-bottom-fix-big" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <img src="assets/images/right-image.png" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

    <section class="section padding-top-70 padding-bottom-0" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-sm-12 align-self-center" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <img src="assets/images/left-image.png" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-top-fix">
                    <div class="left-heading">
                        <h2 class="section-title"><?= $row['title_tentang_3'] ?></h2>
                    </div>
                    <div class="left-text">
                        <p><?= $row['desk_tentang_3'] ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="hr"></div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <!-- ***** Home Parallax Start ***** -->
    <section class="mini" id="work-process">
        <div class="mini-content">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-3 col-lg-6">
                        <div class="info">
                            <h1>Informasi Pengumuman Kelulusan</h1>
                            <p>Daftar Informasi Kelulusan.</p>
                        </div>
                    </div>
                </div>



                <!-- ***** Mini Box Start ***** -->
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Hasil</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        // Menampilkan list laporan siswa
                        $query = "SELECT * FROM raport_siswa WHERE laporan='Lulus'";
                        $result	= mysqli_query($koneksi, $query);

                        $no = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $no++;
                        ?>
                        <tr>
                            <td scope="row"><?= $no ?></td>
                            <td scope="row"><?= $row['nama'] ?></td>
                            <td scope="row"><?= $row['kelas'] ?></td>
                            <td scope="row"><?= $row['laporan'];?></td>
                        </tr>

                        <?php } ?>
                        </tbody>
                    </table>
                <!-- ***** Mini Box End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Home Parallax End ***** -->

    <!-- ***** Testimonials Start ***** -->
    <section class="section" id="testimonials">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Kegiatan Kelas Pengayaan</h2>
                    </div>
                </div>
                <!-- <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Donec tempus, sem non rutrum imperdiet, lectus orci fringilla nulla, at accumsan elit eros a turpis. Ut sagittis lectus libero.</p>
                    </div>
                </div> -->
            </div>
            <!-- ***** Section Title End ***** -->
            <div class="row">
                <?php while($row_kegiatan = mysqli_fetch_assoc($kegiatan)) {?>
                <!-- ***** Testimonials Item Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="team-item">
                        <div class="team-content">
                            <a href="/upload/gambar/<?= $row_kegiatan['gambar'] ?>" target="_blank">
                                <img src="/upload/gambar/<?= $row_kegiatan['gambar'] ?>" alt="..." class="img-fluid">
                            </a>
                            <?= $row_kegiatan['deskripsi'] ?>
                        </div>
                    </div>
                </div>
                <!-- ***** Testimonials Item End ***** -->
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- ***** Testimonials End ***** -->

    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <?php while ($row_sosial_media = mysqli_fetch_assoc($data_sosial_media)) { ?>
                    <ul class="social">
                        <li><a target="blank_" href="<?= $row_sosial_media['facebook'] ?>"><i class="fa fa-facebook"></i></a></li>
                        <li><a target="blank_" href="<?= $row_sosial_media['twitter'] ?>"><i class="fa fa-twitter"></i></a></li>
                        <li><a target="blank_" href="<?= $row_sosial_media['linkedin'] ?>"><i class="fa fa-linkedin"></i></a></li>
                        <li><a target="blank_" href="<?= $row_sosial_media['instagram'] ?>"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p class="copyright">Copyright &copy; 2022</p>
                </div>
            </div>
        </div>
    </footer>

    
    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

  </body>
</html>