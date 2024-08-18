<main>
<div class="container">
<div class="row">
<div class="col">
<div class="page-title-container">
<div class="row">
<div class="col-12 col-md-7">
<h1 class="mb-0 pb-0 display-4" id="title">Data Dosen</h1>
<nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
<ul class="breadcrumb pt-0">
<li class="breadcrumb-item"><a href="Dashboards.Default.html">Home</a></li>
<li class="breadcrumb-item"><a href="Interface.html">Interface</a></li>
</ul>
</nav>
</div>
</div>
</div>
<div class="data-table-rows slim">
<div class="data-table-responsive-wrapper">
<table id="example" class="data-table nowrap hover">
<thead>
<tr>
<td class="text-muted text-small text-uppercase">id</td>
<td class="text-muted text-small text-uppercase">NIP/NIDN</td>
<td class="text-muted text-small text-uppercase">Nama Dosen</td>
<td class="text-muted text-small text-uppercase">Aksi</td>		
</tr>
</thead>
<tbody>
<?php 	 
foreach ($data as $row) {
	echo '
		<tr>
		<td>'.$row->id_dosen.'</td>
    <td>'.$row->nip_nidn.'</td>
		<td>'.$row->nama.'</td>
		<td>
			<button id="edit1" class="btn btn-sm btn-icon btn-icon-only btn-primary mb-1" type="button">
			<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-edit-square"><path d="M11 2L5.5 2C4.09554 2 3.39331 2 2.88886 2.33706C2.67048 2.48298 2.48298 2.67048 2.33706 2.88886C2 3.39331 2 4.09554 2 5.5L2 14.5C2 15.9045 2 16.6067 2.33706 17.1111C2.48298 17.3295 2.67048 17.517 2.88886 17.6629C3.39331 18 4.09554 18 5.5 18L14.5 18C15.9045 18 16.6067 18 17.1111 17.6629C17.3295 17.517 17.517 17.3295 17.6629 17.1111C18 16.6067 18 15.9045 18 14.5L18 11"></path><path d="M15.4978 3.06224C15.7795 2.78052 16.1616 2.62225 16.56 2.62225C16.9585 2.62225 17.3405 2.78052 17.6223 3.06224C17.904 3.34396 18.0623 3.72605 18.0623 4.12446C18.0623 4.52288 17.904 4.90497 17.6223 5.18669L10.8949 11.9141L8.06226 12.6223L8.7704 9.78966L15.4978 3.06224Z"></path></svg>
			</button>
			<button id="delete1" class="btn btn-sm btn-icon btn-icon-only btn-danger mb-1" type="button">
			<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-bin"><path d="M4 5V14.5C4 15.9045 4 16.6067 4.33706 17.1111C4.48298 17.3295 4.67048 17.517 4.88886 17.6629C5.39331 18 6.09554 18 7.5 18H12.5C13.9045 18 14.6067 18 15.1111 17.6629C15.3295 17.517 15.517 17.3295 15.6629 17.1111C16 16.6067 16 15.9045 16 14.5V5"></path><path d="M14 5L13.9424 4.74074C13.6934 3.62043 13.569 3.06028 13.225 2.67266C13.0751 2.50368 12.8977 2.36133 12.7002 2.25164C12.2472 2 11.6734 2 10.5257 2L9.47427 2C8.32663 2 7.75281 2 7.29981 2.25164C7.10234 2.36133 6.92488 2.50368 6.77496 2.67266C6.43105 3.06028 6.30657 3.62044 6.05761 4.74074L6 5"></path><path d="M2 5H18M12 9V13M8 9V13"></path></svg>
			</button>
		</td>
		</tr>
	';
}
?>
</tbody>
</table>
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

<div class="modal hide fade" id="phoneModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data?</h5>
      </div>
      <div class="modal-body">
        Data yang dihapus tidak dapat di restore.
      </div>
      <div class="modal-footer">
        <input type="hidden" id="jetty1id">
        <a type="button" class="close btn btn-secondary" id="modalClose" data-dismiss="modal">Batal</a>
        <a type="button" id="deletejetty1" class="btn btn-primary">Hapus</a>
      </div>
    </div>
  </div>
</div>

<script src="js/vendor/jquery-3.5.1.min.js"></script>
<script src="js/vendor/bootstrap.bundle.min.js"></script>
<script src="js/vendor/OverlayScrollbars.min.js"></script>
<script src="js/vendor/autoComplete.min.js"></script>
<script src="js/vendor/clamp.min.js"></script>
<script src="js/vendor/bootstrap-submenu.js"></script><script src="js/vendor/datatables.min.js"></script><script src="js/vendor/mousetrap.min.js"></script>
<script src="font/CS-Line/csicons.min.js"></script>
<script src="js/base/helpers.js"></script>
<script src="js/base/globals.js"></script>
<script src="js/base/nav.js"></script>
<script src="js/base/search.js"></script>
<script src="js/base/settings.js"></script>
<script src="js/base/init.js"></script>
<script src="js/cs/datatable.extend.js"></script><script src="js/plugins/datatable.editablerows.js"></script>
<script src="js/common.js"></script>
<script src="js/scripts.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    var table = $('#example').DataTable( {
                          order: [ [ 0, "asc" ] ],
                          buttons: [
                                'copy', 'csv', 'excel', 'pdf', 'print'
                          ],
                            columnDefs: [ {
                                className: 'control',
                                orderable: false,
                            },
                            {
                                    "targets": [ 0 ],
                                    "visible": false,
                                    "searchable": false
                            },
                             ]
                        } );
    $('#example tbody').on('click', '#edit1', function () {
        var data = table.row( $(this).parents('tr') ).data();
        var nmr = data[0];
        window.location.href='EditDosen?id='+nmr;
        // alert( 'You clicked on '+data[0]+'\'s row' );
    });
    $('#example tbody').on('click', '#delete1', function () {
        var data = table.row( $(this).parents('tr') ).data();
        // alert( 'You clicked on '+data[0]+'\'s row' );
        var nmr = data[0];
          $('#jetty1id').val(data[0]);
          $('#phoneModal').modal('show');
    });
    $(function () {
        $('#modalClose').on('click', function () {
            $('#phoneModal').modal('hide');
        })
    });
    $('#deletejetty1').on('click', function () {
	    var id = $('#jetty1id').val();
	    $("#deletejetty1").prop("href", "DataDosen/delete?id="+id)
	});
} );
</script>
</body>

<!-- Mirrored from acorn-html-classic-dashboard.coloredstrategies.com/Interface.Plugins.Datatables.EditableRows.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Aug 2021 16:03:35 GMT -->
</html>
