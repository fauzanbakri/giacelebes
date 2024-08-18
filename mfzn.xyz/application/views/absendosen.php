<main>

<div class="container">

<div class="row">

<div class="col">

<div class="page-title-container">

<div class="row">

<div class="col-12 col-md-7">

<h1 class="mb-0 pb-0 display-4" id="title">Kehadiran Dosen</h1>

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

<table style="font-size: 12px" id="example" class="data-table">

<thead>

<tr>

<td class="text-muted text-small text-uppercase">id</td>

<td class="text-muted text-small text-uppercase">Jurusan</td>

<td class="text-muted text-small text-uppercase">Prodi</td>

<td class="text-muted text-small text-uppercase">Kelas</td>

<td class="text-muted text-small text-uppercase">Mata Kuliah</td>

<td class="text-muted text-small text-uppercase">Nama</td>

<td class="text-muted text-small text-uppercase">Hari</td>

<td class="text-muted text-small text-uppercase">Waktu & Tanggal</td>	

<td class="text-muted text-small text-uppercase">Ruangan</td> 

</tr>

</thead>

<tbody>

<?php 	 

foreach ($data as $row) {

	if ($row->hari=='Mon') {

		$hari='Senin';

	}else if ($row->hari=='Tue') {

		$hari='Selasa';

	}else if ($row->hari=='Wed') {

		$hari='Rabu';

	}else if ($row->hari=='Thu') {

		$hari='Kamis';

	}else if ($row->hari=='Fri') {

		$hari='Jumat';

	}else{

		$hari = 'undefined';

	}

	echo '

		<tr>

		<td>'.$row->id_dhd.'</td>

		<td>'.$row->nama_jurusan.'</td>

		<td>'.$row->nama_prodi.'</td>

		<td>'.$row->nama_kelas.'</td>

		<td>'.$row->nama_mk.'</td>

		<td>'.$row->nama.'</td>

		<td>'.$hari.'</td>

		<td>'.$row->timestamp.'</td>

    <td>'.$row->ruangan.'</td>

		</tr>

	';

}

?>

</tbody>

</table>
<a href="DownloadAbsenDosen" class="btn btn-primary">Download Absen</a>
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

                            initComplete: function () {

				            this.api().columns([1,2,3,4,5,6,7,8]).every( function () {

				                var column = this;

				                var select = $('<br><select><option value=""></option></select>')

				                    .appendTo( $(column.header()) )

				                    .on( 'change', function () {

				                        var val = $.fn.dataTable.util.escapeRegex(

				                            $(this).val()

				                        );

				 

				                        column

				                            .search( val ? '^'+val+'$' : '', true, false )

				                            .draw();

				                    } );

				 

				                column.data().unique().sort().each( function ( d, j ) {

				                    select.append( '<option value="'+d+'">'+d+'</option>' )

				                } );

				            } );

				        },

                          order: [ [ 0, "desc" ] ],

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

        window.location.href='EditJadwal?id='+nmr;

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

	    $("#deletejetty1").prop("href", "LihatJadwal/delete?id="+id)

	});

} );

</script>

</body>



<!-- Mirrored from acorn-html-classic-dashboard.coloredstrategies.com/Interface.Plugins.Datatables.EditableRows.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Aug 2021 16:03:35 GMT -->

</html>

