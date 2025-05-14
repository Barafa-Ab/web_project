<?php
// session_start();
// if (!isset($_SESSION['username'])) {
//     header("Location: index.html");
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KPR Kita</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/index.css" />
</head>

<body>

    <header class="main-header">
        <img src="images/logokomplit.png" alt="Logo" class="logo">
        <nav>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <li><a href="#contact">Contact Us</a></li>
                <li><a href="php/logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="home">
            <div class="home-hero">
                <div class="hero-content">
                    <h1>Welcome to KPR Kita</h1>
                    <p class="tagline">Solusi cerdas untuk hunian impian Anda</p>
                    <div class="hero-highlight">
                        <p>🛋️ Temukan konsep hidup seimbang dengan alam</p>
                        <p>🌿 100% Material Ramah Lingkungan</p>
                    </div>
                </div>

                <div class="caursel">
                    <div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/home1.jpg" class="d-block w-100" alt="bri">
                            </div>
                            <div class="carousel-item">
                                <img src="images/home2.jpg" class="d-block w-100" alt="mandiri">
                            </div>
                            <div class="carousel-item">
                                <img src="images/home3.jpg" class="d-block w-100" alt="btn">
                            </div>

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
        </section>

        <section id="about" class="about">
            <div class="about-container">
                <div class="about-content">
                    <h1 style="font-weight: 800;">Tentang KPR Kita</h1>
                    <div class="about-grid">
                        <div class="about-card">
                            <i class='bx bx-home-heart'></i>
                            <h3>15+ Tahun Pengalaman</h3>
                            <p>Memiliki jejak rekam terpercaya dalam membantu mewujudkan rumah impian keluarga Indonesia</p>
                        </div>
                        <div class="about-card">
                            <i class='bx bx-shield-alt-2'></i>
                            <h3>Proses Aman & Terjamin</h3>
                            <p>Transaksi terlindungi dengan sistem keamanan berlapis dan telah tersertifikasi ISO 27001</p>
                        </div>
                        <div class="about-card">
                            <i class='bx bx-star'></i>
                            <h3>5000+ Properti Tersedia</h3>
                            <p>Pilihan lengkap properti berkualitas dari developer terpercaya di seluruh Indonesia</p>
                        </div>
                    </div>

                    <div class="about-main">
                        <div class="about-text">
                            <h2>Mengapa Memilih Kami?</h2>
                            <ul class="about-list">
                                <li><i class='bx bx-check'></i> Proses pengajuan cepat - disetujui dalam 24 jam</li>
                                <li><i class='bx bx-check'></i> Bebas biaya administrasi bulanan</li>
                                <li><i class='bx bx-check'></i> Bunga kompetitif mulai dari 5% per tahun</li>
                                <li><i class='bx bx-check'></i> Tenaga profesional berpengalaman</li>
                            </ul>
                            <button class="cta-button">Hubungi Konsultan Kami</button>
                        </div>
                        <div class="about-image">
                            <img src="images/abouthome.jpg" alt="Dream House">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="gallery" class="gallery">
            <h1 style="font-weight: 800;">Gallery</h1>
            <div class="flex-img">
                <div class="home">
                    <h1>Senja</h1>
                    <img src="images/gallery1.jpg" alt="Home 1">
                    <p>A warm and simple home — perfect for young families seeking serenity.</p>
                </div>
                <div class="home">
                    <h1>Terra</h1>
                    <img src="images/gallery2.jpg" alt="Home 2">
                    <p>A modern yet grounded design with calming natural accents.</p>
                </div>
                <div class="home">
                    <h1>Sagara</h1>
                    <img src="images/gallery3.jpg" alt="Home 3">
                    <p>Elegant and spacious — made for those who love natural light and open space.</p>
                </div>
                <div class="home">
                    <h1>Verdant</h1>
                    <img src="images/gallery4.jpg" alt="Home 4">
                    <p>Eco-friendly design with lush green integration for nature lovers.</p>
                </div>
            </div>
            <div class="gallery-cta">
                <a href="gallery-details.html" class="cta-button">
                    Lihat Detail Lengkap Properti
                    <i class='bx bx-chevron-right'></i>
                </a>
            </div>
        </section>

        <footer class="custom-footer" id="contact">
            <div class="footer-container">
                <div class="footer-left">
                    <img src="images/logokomplit.png" alt="Logo KPR Kita">
                    <p>Copyright © KPR Kita 2025</p>
                    <p>PT KPR Kita Indonesia terdaftar di OJK dan Kominfo. Platform telah tersertifikasi ISO 27001.</p>
                </div>

                <div class="footer-links">
                    <div class="footer-column">
                        <h4>Menu</h4>
                        <ul>
                            <li><a href="#home">Home</a></li>
                            <li><a href="#about">About Us</a></li>
                            <li><a href="#gallery">Gallery</a></li>
                            <li><a href="#contact">Contact Us</a></li>
                        </ul>
                    </div>

                    <div class="footer-column">
                        <h4>Ikuti Kami</h4>
                        <div class="social-icons">
                            <a href="https://facebook.com" target="_blank"><i class='bx bxl-facebook-circle'></i></a>
                            <a href="https://instagram.com" target="_blank"><i class='bx bxl-instagram-alt'></i></a>
                            <a href="https://twitter.com" target="_blank"><i class='bx bxl-twitter'></i></a>
                            <a href="https://linkedin.com" target="_blank"><i class='bx bxl-linkedin-square'></i></a>
                        </div>
                    </div>

                    <div class="footer-column">
                        <h4>Kontak</h4>
                        <p>Kantor Pusat KPR Kita</p>
                        <p>Jl. Rumah Impian No. 88</p>
                        <p>Email: kprkita@gmail.com</p>
                        <p>Hotline: 1500-123</p>
                        <p>Jam Operasional: 09.00–18.00 WIB</p>
                    </div>
                </div>
            </div>
        </footer>


    </main>

</body>

</html>