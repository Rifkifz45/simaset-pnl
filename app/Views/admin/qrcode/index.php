<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Home</a>
				</li>
				<li class="active">QR Code</li>
			</ul><!-- /.breadcrumb -->

			<div class="nav-search" id="nav-search">
				<form class="form-search">
					<span class="input-icon">
						<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
						<i class="ace-icon fa fa-search nav-search-icon"></i>
					</span>
				</form>
			</div><!-- /.nav-search -->
		</div>

		<div class="page-content">
			<?= $this->include('admin/configurejs') ?>
         <div class="space-6"></div>

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
               <div class="row">
                  <div class="col-xs-12">
                     <div class="widget-box">
                        <div class="widget-header">
                           <h4 class="widget-title">QR CODE</h4>
                           <div class="widget-toolbar">
                              <a href="#" data-action="fullscreen" class="orange2">
                                 <i class="ace-icon fa fa-expand"></i>
                              </a>

                              <a href="#" data-action="reload">
                                 <i class="ace-icon fa fa-refresh"></i>
                              </a>

                              <a href="#" data-action="collapse">
                                 <i class="ace-icon fa fa-chevron-up"></i>
                              </a>

                              <a href="#" data-action="close">
                                 <i class="ace-icon fa fa-times"></i>
                              </a>
                           </div>
                        </div>
                        <div class="widget-body">
                           <div class="widget-main">
                              <div>
                                 <table id="dynamic-table" class="table table-striped table-bordered dataTable no-footer">
                                 <thead>
                                    <tr>
                                       <th class="center"> # </th>
                                       <th> Kode Barang </th>
                                       <th> Nama Barang </th>
                                       <th> Kategori </th>
                                       <th> Jumlah </th>
                                       <th> Satuan </th>
                                       <th>
                                          <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                                          Action
                                       </th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php foreach ($bidang as $key => $value): ?>
                                 <tr>
                                    <td class="center"><?= $key+1 ?></td>
                                    <td class="center"><?= $value['golongan'] . $value['bidang'] ?></td>
                                    <td><?= $value['uraian'] ?></td>
                                    <td>
                                       <?php
                                       if ($value['golongan'] == 2) {
                                          echo "Tanah";
                                       }else if ($value['golongan'] == 3) {
                                          echo "Peralatan dan Mesin";
                                       }else if ($value['golongan'] == 4) {
                                          echo "Gedung dan Bangunan";
                                       }else if ($value['golongan'] == 5) {
                                          echo "Jalan, Irigasi dan Jembatan";
                                       }else if ($value['golongan'] == 6) {
                                          echo "Aset Tetap Lainnya";
                                       }else if ($value['golongan'] == 7) {
                                          echo "Konstruksi Dalam Pengerjaan";
                                       }else if ($value['golongan'] == 8) {
                                          echo "Aset Tak Berwujud";
                                       }else{
                                          echo "None";
                                       }
                                       ?>
                                    </td>
                                    <td>
                                       <?php
                                         $db = \Config\Database::connect();
                                         $kode = $value['idtweb_asset'];
                                         if ($value['golongan'] == 2) {
                                          $inv_tanah = $db->table('inventaris_tanah')->where('idtweb_asset', $kode);
                                          echo $inv_tanah->countAllResults();
                                         } else if ($value['golongan'] == 3) {
                                          $inv_prl = $db->table('inventaris_peralatan')->where('idtweb_asset', $kode);
                                          echo $inv_prl->countAllResults();
                                         } else if ($value['golongan'] == 4) {
                                          $inv_jalan = $db->table('inventaris_gedung')->where('idtweb_asset', $kode);
                                          echo $inv_jalan->countAllResults();
                                         } else if ($value['golongan'] == 5) {
                                          $inv_jalan = $db->table('inventaris_jalan')->where('idtweb_asset', $kode);
                                          echo $inv_jalan->countAllResults();
                                         } else if ($value['golongan'] == 6) {
                                          $inv_jalan = $db->table('inventaris_asset')->where('idtweb_asset', $kode);
                                          echo $inv_jalan->countAllResults();
                                         } else if ($value['golongan'] == 7) {
                                          $inv_jalan = $db->table('inventaris_konstruksi')->where('idtweb_asset', $kode);
                                          echo $inv_jalan->countAllResults();
                                         } else if ($value['golongan'] == 8) {
                                          $inv_jalan = $db->table('inventaris_takberwujud')->where('idtweb_asset', $kode);
                                          echo $inv_jalan->countAllResults();
                                         } else{
                                          echo "None";
                                         }
                                     ?>
                                    </td>
                                    <td>Buah</td>
                                    <td class="center">
                                       <div class="action-buttons">
                                          <a title="Detail" href="<?= site_url('admin/cetak-label/'.$value['idtweb_asset']) ?>" class="blue" href="#">
                                             <i class="ace-icon fa fa-search-plus bigger-130"></i>
                                          </a>
                                    </td>
                                 </tr>
                                 <?php endforeach ?>
                                 </tbody>
                              </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.span -->
               </div>
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<!-- page specific plugin scripts -->
<script src="<?= base_url('') ?>/template/assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.flash.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.html5.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.print.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.colVis.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/dataTables.select.min.js"></script>
<?= $this->include('admin/qrcode/script.js') ?>
<?= $this->endSection('') ?>