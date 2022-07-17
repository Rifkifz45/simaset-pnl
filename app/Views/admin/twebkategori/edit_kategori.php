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

				<li>
					<a href="<?= site_url('admin/kategori') ?>">Kategori</a>
				</li>
				<li class="active"><?= $kategori['golongan'] . "." . $kategori['bidang'] . "." . $kategori['kelompok'] . "." . $kategori['sub_kelompok'] . "." . $kategori['sub_sub_kelompok'] ?></li>
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
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<form id="validation-form" action="<?= site_url('admin/kategori/update') ?>" class="form-horizontal" method="POST">
					<div class='row'>
					   <div class='col-xs-8'>
					      <div class='widget-box'>
					         <div class='widget-header'>
					            <h4 class='widget-title'>EDIT TWEB ASSET</h4>
					            <div class='widget-toolbar'>
					               <button class='btn btn-minier btn-primary' type='submit' name='submit'><i class='ace-icon fa fa-save'></i>Update</button>
					               <button type="button" class='btn btn-minier btn-info' onclick='Redirect()'><i class='ace-icon fa fa-arrow-left'></i>Back</button>
					               <a href='#' data-action='collapse'>
					               <i class='ace-icon fa fa-chevron-up'></i>
					               </a>
					            </div>
					         </div>
					         <div class='widget-body'>
					            <div class='widget-main'>
					               <table class='table table-condensed table-bordered input-sm'>
					                  <tbody>
					                     <tr>
					                        <th width='170px' scope='row'><h6>Kode Golongan</h6></th>
					                        <td>
					                        	<input type="hidden" name="idtweb_asset" name="idtweb_asset" value="<?= $kategori['idtweb_asset'] ?>">
					                        	<input value="<?= $kategori['golongan'] ?>" type="text" id="golongan" name="golongan" required placeholder=" 2 untuk Tanah, 3 untuk Peralatan Mesin dll" maxlength="3" class="form-control">
					                        </td>
					                     </tr>
					                     <tr>
					                        <th scope='row'><h6>Kode Bidang</h6></th>
					                        <td>
					                           <input value="<?= $kategori['bidang'] ?>" id="bidang" type="text" name="bidang" required placeholder=" Kode Bidang berdasarkan inputan golongan" maxlength="3" class="form-control">
					                        </td>
					                     </tr>
					                     <tr>
					                        <th scope='row'><h6>Kode Kelompok</h6></th>
					                        <td>
					                           <input value="<?= $kategori['kelompok'] ?>" id="kelompok" type="text" value="*" name="kelompok" required placeholder=" Kode Kelompok berdasarkan inputan Bidang" maxlength="3" class="form-control">
					                        </td>
					                     </tr>
					                     <tr>
					                        <th scope='row'><h6>Kode Sub Kelompok</h6></th>
					                        <td>
					                           <input value="<?= $kategori['sub_kelompok'] ?>" id="sub_kelompok" type="text" name="sub_kelompok" required placeholder=" Kode Sub Kelompok berdasarkan inputan Kelompok" maxlength="3" class="form-control">
					                        </td>
					                     </tr>
					                     <tr>
					                        <th scope='row'><h6>Kode Sub-sub Kelompok</h6></th>
					                        <td>
					                           <input value="<?= $kategori['sub_sub_kelompok'] ?>" id="sub_sub_kelompok" type="text" name="sub_sub_kelompok" required placeholder=" Kode Sub-sub Kelompok berdasarkan inputan Sub Kelompok" maxlength="3" class="form-control">
					                        </td>
					                     </tr>
					                     <tr>
					                        <th scope='row'><h6>Uraian</h6></th>
					                        <td>
					                           <input autofocus onfocus="this.setSelectionRange(this.value.length,this.value.length);" value="<?= $kategori['uraian'] ?>" id="uraian" type="text" name="uraian" required placeholder=" Uraian dari Kode barang yang diinput" maxlength="255" class="form-control">
					                        </td>
					                     </tr>
					                     <tr>
					                        <th scope='row'><h6>Keterangan</h6></th>
					                        <td>
					                           <textarea class="form-control" id="keterangan" name="keterangan" placeholder=" Keterangan" maxlength="255"><?= $kategori['keterangan'] ?></textarea>
					                     </tr>
					                  </tbody>
					               </table>
					            </div>
					         </div>
					      </div>
					   </div>
					   <!-- /.span -->
					</div>
					</form>
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
	function Redirect() {
		window.location="<?= site_url('admin/kategori') ?>";
	}
</script>
<?= $this->endSection('') ?>