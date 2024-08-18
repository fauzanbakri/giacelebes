<main>
<div class="container">
<div class="row">
<div class="col">
<section class="scroll-section" id="title">
<div class="page-title-container">
<h1 class="mb-0 pb-0 display-4">Input Program Studi</h1>
<nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
<ul class="breadcrumb pt-0">
<li class="breadcrumb-item"><a href="Dashboards.Default.html">Home</a></li>
<li class="breadcrumb-item"><a href="Interface.html">Interface</a></li>
<li class="breadcrumb-item"><a href="Interface.Forms.html">Forms</a></li>
</ul>
</nav>
</div>
</section>
<div>
<section class="scroll-section" id="formRow">
<div class="card mb-5">
<div class="card-body">
<form class="row g-3" action="InputProdi/input" method="post">
<div class="col-md-12">
<label for="inputState" class="form-label">Jurusan</label>
<select id="jurusan" name="jurusan" class="form-select">
<option selected="selected">Choose...</option>
<?php 
foreach ($jurusan as $row) {
	echo '
	<option value="'.$row->id_jurusan.'">'.$row->nama_jurusan.'</option>
	';
}
?>
</select>
</div>
<div class="col-md-12">
<label for="inputState" class="form-label">Program Studi</label>
<input name="prodi" class="form-control">
</div>
<div class="col-12">
<button type="submit" class="btn btn-primary">Input</button>
</div>
</form>
</div>
</div>
</section>
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
<div class="modal fade modal-under-nav modal-search modal-close-out" id="searchPagesModal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header border-0 p-0">
<button type="button" class="btn-close btn btn-icon btn-icon-only btn-foreground" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body ps-5 pe-5 pb-0 border-0">
<input id="searchPagesInput" class="form-control form-control-xl borderless ps-0 pe-0 mb-1 auto-complete" type="text" autocomplete="off">
</div>
<div class="modal-footer border-top justify-content-start ps-5 pe-5 pb-3 pt-3 border-0">
<span class="text-alternate d-inline-block m-0 me-3">
<i data-cs-icon="arrow-bottom" data-cs-size="15" class="text-alternate align-middle me-1"></i>
<span class="align-middle text-medium">Navigate</span>
</span>
<span class="text-alternate d-inline-block m-0 me-3">
<i data-cs-icon="arrow-bottom-left" data-cs-size="15" class="text-alternate align-middle me-1"></i>
<span class="align-middle text-medium">Select</span>
</span>
</div>
</div>
</div>
</div>
<script src="js/vendor/jquery-3.5.1.min.js"></script>
<script src="js/vendor/bootstrap.bundle.min.js"></script>
<script src="js/vendor/OverlayScrollbars.min.js"></script>
<script src="js/vendor/autoComplete.min.js"></script>
<script src="js/vendor/clamp.min.js"></script>
<script src="js/cs/scrollspy.js"></script><script src="js/vendor/select2.full.min.js"></script><script src="js/vendor/datepicker/bootstrap-datepicker.min.js"></script><script src="js/vendor/tagify.min.js"></script>
<script src="font/CS-Line/csicons.min.js"></script>
<script src="js/base/helpers.js"></script>
<script src="js/base/globals.js"></script>
<script src="js/base/nav.js"></script>
<!-- <script src="js/base/search.js"></script> -->
<script src="js/base/settings.js"></script>
<script src="js/base/init.js"></script>
<script src="js/forms/layouts.js"></script>
<script src="js/common.js"></script>
<script src="js/scripts.js"></script>
<script type="text/javascript">
    $('#jurusan').on('change paste click',function() {
     var jurusan = $('#jurusan').val(); 
     $.ajax({
           type: 'POST', 
           url: 'Ajax/prodi',
           data: {jurusan:jurusan},
           success: function(response) {
           // console.log(response);
           $('#prodi').html(response); 
           }
       });
    });
    
</script>
</body>

<!-- Mirrored from acorn-html-classic-dashboard.coloredstrategies.com/Interface.Forms.Layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Aug 2021 16:03:11 GMT -->
</html>
