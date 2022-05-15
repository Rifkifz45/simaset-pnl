<!-- MODAL LOAD ASET -->
<div id="detail" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><span class="label label-inverse"> # Detail Data</span> &nbsp; Detail Aset yang ingin ditempatkan</h5>
			</div>
			<div class="modal-body">
				<div>
					<table id="table_item" class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th class="center"> # </th>
								<th> Kode Barang </th>
								<th> NUP </th>
								<th> Nama Barang </th>
								<th> Merk / Tipe </th>
								<th> Pengguna </th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($detail as $key => $value): ?>
							<tr>
								<td><?= $key + 1 ?></td>
								<td><?= $value->kode_barang ?></td>
								<td><?= $value->nup; ?></td>
								<td><?= $value->nama_barang; ?></td>
								<td><?= $value->merk; ?></td>
								<td><?= $value->nama_pengguna; ?></td>
							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<a href="javascript:;" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</a>
			</div>
		</div>
	</div>
</div>
<!-- END MODAL LOAD -->

<?= $this->section('script') ?>
<script type="text/javascript">
	jQuery(function($) {
		//initiate dataTables plugin
		var myTable = $('#table_item')
		.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
		.DataTable( {
			bAutoWidth: false,
			"aoColumns": [
			  { "bSortable": false },
			  null, null, null, null,
			  { "bSortable": false }
			],
			"aaSorting": [],
			// "bProcessing": true,
			// "bServerSide": true,
			//"processing": true, //Feature control the processing indicator.
            //"serverSide": true, //Feature control DataTables' server-side processing mode.

            // Load data for the table's content from an Ajax source
			//,
			//"sScrollY": "200px",
			//"bPaginate": true,
	
			//"sScrollX": "100%",
			"sScrollXInner": "120%",
			"bScrollCollapse": true,
			//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
			//you may want to wrap the table inside a "div.dataTables_borderWrap" element		
	    });

	
		////
	
		setTimeout(function() {
			$($('.tableTools-container')).find('a.dt-button').each(function() {
				var div = $(this).find(' > div').first();
				if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
				else $(this).tooltip({container: 'body', title: $(this).text()});
			});
		}, 500);	
	
		$(document).on('click', '#table_item .dropdown-toggle', function(e) {
			e.stopImmediatePropagation();
			e.stopPropagation();
			e.preventDefault();
		});
	})
</script>
<?= $this->endSection('') ?>