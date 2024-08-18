
<main>
<div class="container">
<div class="row">
<div class="col-12">
<div class="page-title-container">
<h1 class="mb-0 pb-0 display-4" id="title">Dashboard</h1>
<nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
<ul class="breadcrumb pt-0">
<li class="breadcrumb-item"><a href="Dashboards.Default.html">Home</a></li>
<li class="breadcrumb-item"><a href="Dashboards.html">Dashboards</a></li>
</ul>
</nav>
</div>
</div>
</div>
<div class="row">
<div class="col-12 col-lg-6">
<div class="d-flex">
<h2 class="small-title">Stats</h2>
</div>
<div class="mb-5">
<div class="row g-2">
<div class="col-12 col-sm-6 col-lg-6">
<div class="card sh-11 hover-scale-up cursor-pointer">
<div class="h-100 row g-0 card-body align-items-center py-3">
<div class="col-auto pe-3">
<div class="bg-gradient-2 sh-5 sw-5 rounded-xl d-flex justify-content-center align-items-center">
<i data-cs-icon="building-large" class="text-white"></i>
</div>
</div>
<div class="col">
<div class="row gx-2 d-flex align-content-center">
<div class="col-12 col-xl d-flex">
<div class="d-flex align-items-center lh-1-25">Jurusan</div>
</div>
<div class="col-12 col-xl-auto">
<div class="cta-2 text-primary"><?php echo $jurusan; ?></div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-12 col-sm-6 col-lg-6">
<div class="card sh-11 hover-scale-up cursor-pointer">
<div class="h-100 row g-0 card-body align-items-center py-3">
<div class="col-auto pe-3">
<div class="bg-gradient-2 sh-5 sw-5 rounded-xl d-flex justify-content-center align-items-center">
<i data-cs-icon="building" class="text-white"></i>
</div>
</div>
<div class="col">
<div class="row gx-2 d-flex align-content-center">
<div class="col-12 col-xl d-flex">
<div class="d-flex align-items-center lh-1-25">Program Studi</div>
</div>
<div class="col-12 col-xl-auto">
<div class="cta-2 text-primary"><?php echo $prodi; ?></div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-12 col-sm-6 col-lg-6">
<div class="card sh-11 hover-scale-up cursor-pointer">
<div class="h-100 row g-0 card-body align-items-center py-3">
<div class="col-auto pe-3">
<div class="bg-gradient-2 sh-5 sw-5 rounded-xl d-flex justify-content-center align-items-center">
<i data-cs-icon="user" class="text-white"></i>
</div>
</div>
<div class="col">
<div class="row gx-2 d-flex align-content-center">
<div class="col-12 col-xl d-flex">
<div class="d-flex align-items-center lh-1-25">Dosen</div>
</div>
<div class="col-12 col-xl-auto">
<div class="cta-2 text-primary"><?php echo $dosen; ?></div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-12 col-sm-6 col-lg-6">
<div class="card sh-11 hover-scale-up cursor-pointer">
<div class="h-100 row g-0 card-body align-items-center py-3">
<div class="col-auto pe-3">
<div class="bg-gradient-2 sh-5 sw-5 rounded-xl d-flex justify-content-center align-items-center">
<i data-cs-icon="user" class="text-white"></i>
</div>
</div>
<div class="col">
<div class="row gx-2 d-flex align-content-center">
<div class="col-12 col-xl d-flex">
<div class="d-flex align-items-center lh-1-25">Mahasiswa</div>
</div>
<div class="col-12 col-xl-auto">
<div class="cta-2 text-primary"><?php echo $mahasiswa; ?></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>	
</div>
<div class="col-12 col-lg-6 mb-5">
<div class="d-flex justify-content-between">
<h2 class="small-title">Aktivitas Terbaru</h2>
</div>
<div class="scroll-out">
<div class="scroll-by-count" data-count="8">

<?php 
foreach ($aktivitas as $row) {
	echo '
	<div class="card mb-2 sh-10 sh-md-8">
	<div class="card-body pt-0 pb-0 h-100">
	<div class="row g-0 h-100 align-content-center">
	<div class="col-12 col-md-4 d-flex align-items-center mb-2 mb-md-0">
	<a href="Pages.Portfolio.Detail.html" class="body-link text-truncate">'.$row->nama.'</a>
	</div>
	<div class="col-4 col-md-2 d-flex align-items-center text-muted text-medium mb-1 mb-md-0">
	<span class="badge bg-outline-tertiary me-1">'.$row->role.'</span>
	</div>
	<div class="col-4 col-md-3 d-flex align-items-center text-medium justify-content-center">
	<span class="text-medium">'.$row->timestamp.'</span>
	</div>
	<div class="col-4 col-md-3 d-flex align-items-center justify-content-end text-muted text-medium">
	<span>'.$row->ruangan.'</span>
	</div>
	</div>
	</div>
	</div>
	';
}
?>

</div>
</div>
</div>
</div>
</div>
</main>
<footer>
<div class="footer-content">
<div class="container">
<div class="row">
<div class="col-12 col-sm-6">
<p class="mb-0 text-muted text-medium">Colored Strategies 2021</p>
</div>
<div class="col-sm-6 d-none d-sm-block">
<ul class="breadcrumb pt-0 pe-0 mb-0 float-end">
<li class="breadcrumb-item mb-0 text-medium">
<a href="https://1.envato.market/BX5oGy" target="_blank" class="btn-link">Review</a>
</li>
<li class="breadcrumb-item mb-0 text-medium">
<a href="https://1.envato.market/BX5oGy" target="_blank" class="btn-link">Purchase</a>
</li>
<li class="breadcrumb-item mb-0 text-medium"><a href="https://acorn-html-docs.coloredstrategies.com/" target="_blank" class="btn-link">Docs</a></li>
</ul>
</div>
</div>
</div>
</div>
</footer>
</div>
<script src="js/vendor/jquery-3.5.1.min.js"></script>
<script src="js/vendor/bootstrap.bundle.min.js"></script>
<script src="js/vendor/OverlayScrollbars.min.js"></script>
<script src="js/vendor/autoComplete.min.js"></script>
<script src="js/vendor/clamp.min.js"></script>
<script src="js/vendor/Chart.bundle.min.js"></script><script src="js/vendor/chartjs-plugin-datalabels.js"></script><script src="js/vendor/chartjs-plugin-rounded-bar.min.js"></script>
<script src="font/CS-Line/csicons.min.js"></script>
<script src="js/base/helpers.js"></script>
<script src="js/base/globals.js"></script>
<script src="js/base/nav.js"></script>
<script src="js/base/search.js"></script>
<script src="js/base/settings.js"></script>
<script src="js/base/init.js"></script>
<script src="js/cs/charts.extend.js"></script><script src="js/pages/dashboard.analytic.js"></script>
<script src="js/common.js"></script>
<script src="js/scripts.js"></script>
</body>

<!-- Mirrored from acorn-html-classic-dashboard.coloredstrategies.com/Dashboards.Analytic.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Aug 2021 16:01:49 GMT -->
</html>
