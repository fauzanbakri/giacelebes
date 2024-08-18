<!DOCTYPE html>
<html lang="en" data-footer="true">

<!-- Mirrored from acorn-html-classic-dashboard.coloredstrategies.com/Dashboards.Analytic.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Aug 2021 16:01:49 GMT -->
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
<title>Absensi</title>
<meta name="description" content="Another dashboard alternative that focused on data, listing and charts.">
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="img/favicon/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/favicon/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/favicon/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon-precomposed" sizes="60x60" href="img/favicon/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="img/favicon/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon-precomposed" sizes="76x76" href="img/favicon/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="img/favicon/apple-touch-icon-152x152.png">
<link rel="icon" type="image/png" href="img/favicon/favicon-196x196.png" sizes="196x196">
<link rel="icon" type="image/png" href="img/favicon/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="img/favicon/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="img/favicon/favicon-16x16.png" sizes="16x16">
<link rel="icon" type="image/png" href="img/favicon/favicon-128.png" sizes="128x128">
<meta name="application-name" content="&nbsp;">
<meta name="msapplication-TileColor" content="#FFFFFF">
<meta name="msapplication-TileImage" content="img/favicon/mstile-144x144.png">
<meta name="msapplication-square70x70logo" content="img/favicon/mstile-70x70.png">
<meta name="msapplication-square150x150logo" content="img/favicon/mstile-150x150.png">
<meta name="msapplication-wide310x150logo" content="img/favicon/mstile-310x150.png">
<meta name="msapplication-square310x310logo" content="img/favicon/mstile-310x310.png">
<link rel="stylesheet" href="css/vendor/select2.min.css"><link rel="stylesheet" href="css/vendor/select2-bootstrap4.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com/">
<link rel="stylesheet" href="css/vendor/datatables.min.css">
<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" href="font/CS-Interface/style.css">
<link rel="stylesheet" href="css/vendor/bootstrap.min.css">
<link rel="stylesheet" href="css/vendor/OverlayScrollbars.min.css">
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/main.css">
<script src="js/base/loader.js"></script>
</head>
<body>
<div id="root">
<div id="nav" class="nav-container d-flex">
<div class="nav-content d-flex">
<div class="logo position-relative">
<a href="Dashboards.Default.html">
<div class="img"></div>
</a>
</div>
<div class="user-container d-flex">
<a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<img class="profile" alt="profile" src="img/profile/default.png">
<div class="name"><?php echo $_SESSION['name']; ?></div>
</a>
<div class="dropdown-menu dropdown-menu-end user-menu wide">
<div class="row mb-1 ms-0 me-0">
<div class="col-6 pe-1 ps-1">
<ul class="list-unstyled">
<li>
<a href="Login/logout">
<i data-cs-icon="logout" class="me-2" data-cs-size="17"></i>
<span class="align-middle">Logout</span>
</a>
</li>
</ul>
</div>
</div>
</div>
</div>
<div class="menu-container flex-grow-1">
<ul id="menu" class="menu">
<li>
<a href="Home">
<i data-cs-icon="home" class="icon" data-cs-size="18"></i>
<span class="label">Dashboards</span>
</a>
</li>
<li>
<a href="#dashboards" data-href="Dashboards.html">
<i data-cs-icon="notebook-1" class="icon" data-cs-size="18"></i>
<span class="label">Jadwal</span>
</a>
<ul id="dashboards">
<li>
<a href="InputJadwal">
<span class="label">Input Jadwal</span>
</a>
</li>
<li>
<a href="LihatJadwal">
<span class="label">Lihat Jadwal</span>
</a>
</li>
</ul>
</li>
<li>
<a href="#dashboards" data-href="Dashboards.html">
<i data-cs-icon="edit" class="icon" data-cs-size="18"></i>
<span class="label">Input</span>
</a>
<ul id="dashboards">
<li>
<a href="InputJurusan">
<span class="label">Jurusan</span>
</a>
</li>
<li>
<a href="InputProdi">
<span class="label">Program Studi</span>
</a>
</li>
<li>
<a href="InputKelas">
<span class="label">Kelas</span>
</a>
</li>
<li>
<a href="InputMatakuliah">
<span class="label">Mata Kuliah</span>
</a>
</li>
<li>
<a href="InputDosen">
<span class="label">Dosen</span>
</a>
</li>
<li>
<a href="InputMahasiswa">
<span class="label">Mahasiswa</span>
</a>
</li>
<li>
<a href="InputRuangan">
<span class="label">Ruangan</span>
</a>
</li>
</ul>
</li>
<li>
<a href="#dashboards" data-href="Dashboards.html">
<i data-cs-icon="building" class="icon" data-cs-size="18"></i>
<span class="label">Data</span>
</a>
<ul id="dashboards">
<li>
<a href="DataJurusan">
<span class="label">Jurusan</span>
</a>
</li>
<li>
<a href="DataProdi">
<span class="label">Program Studi</span>
</a>
</li>
<li>
<a href="DataKelas">
<span class="label">Kelas</span>
</a>
</li>
<li>
<a href="DataMatakuliah">
<span class="label">Mata Kuliah</span>
</a>
</li>
<li>
<a href="DataDosen">
<span class="label">Dosen</span>
</a>
</li>
<li>
<a href="DataMahasiswa">
<span class="label">Mahasiswa</span>
</a>
</li>
<li>
<a href="DataRuangan">
<span class="label">Ruangan</span>
</a>
</li>
</ul>
</li>
<li>
<a href="#dashboards" data-href="Dashboards.html">
<i data-cs-icon="screen" class="icon" data-cs-size="18"></i>
<span class="label">Monitoring</span>
</a>
<ul id="dashboards">
<li>
<a href="AbsenMahasiswa">
<span class="label">Daftar Hadir Mahasiswa</span>
</a>
</li>
<li>
<a href="AbsenDosen">
<span class="label">Daftar Hadir Dosen</span>
</a>
</li>
</ul>
</li>
</ul>
</div>
<div class="mobile-buttons-container">
<a href="#" id="scrollSpyButton" class="spy-button" data-bs-toggle="dropdown">
<i data-cs-icon="menu-dropdown"></i>
</a>
<div class="dropdown-menu dropdown-menu-end" id="scrollSpyDropdown"></div>
<a href="#" id="mobileMenuButton" class="menu-button">
<i data-cs-icon="menu"></i>
</a>
</div>
</div>
<div class="nav-shadow"></div>
</div>