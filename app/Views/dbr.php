<?= $this->extend('index_2') ?>

<?= $this->section('head') ?>
<link rel="stylesheet" href="<?= base_url('') ?>/magnific/dist/magnific-popup.css">
<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/dist/css/select2.css" />
<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/dist/css/select2-bootstrap.css" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div id="content" class="site-content">
<div class="container">
	<div class="inner-wrapper">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<article id="post-108" class="post-108 page type-page status-publish hentry">
					<header class="entry-header">
						<h1 class="entry-title">Report Daftar Barang</h1>
					</header>
					<!-- .entry-header -->
					<div class="entry-content">
						<div role="form" id="wpcf7-f110-p108-o1" lang="en-US" dir="ltr">
							<div class="screen-reader-response">
								<p role="status" aria-live="polite" aria-atomic="true"></p>
								<ul></ul>
							</div>
							<form  action="<?= site_url('cetak/dbr') ?>" method="post" class="wpcf7-form init" data-status="init">
								<p>
								<label> Pilih Gedung<br>
									<span class="wpcf7-form-control-wrap your-name">
									<select class="js-example-basic-single" aria-required="true" aria-invalid="false" name="id_gedung" id="id_gedung" style="width: 100%;" required>
										<option selected disabled value="">Pilih Gedung</option>
										<?php foreach ($gedung as $key => $ged): ?>
											<option value="<?= $ged['id_gedung'] ?>"><?= $ged['nama_gedung'] ?></option>
										<?php endforeach ?>
									</select>
									</span>
								</label>
								</p>
								<p>
								<label> Pilih Lokasi<br>
									<span class="wpcf7-form-control-wrap your-name">
									<select class="js-example-basic-single" aria-required="true" aria-invalid="false" name="id_lokasi" id="id_lokasi" style="width: 100%;" required>
										<option selected disabled value="" size="40">...</option>
									</select>
									</span>
								</label>
								</p>
								<p><input type="submit" value="Send" class="wpcf7-form-control has-spinner wpcf7-submit"><span class="wpcf7-spinner"></span></p>
								<div class="wpcf7-response-output" aria-hidden="true"></div>
							</form>
						</div>
					</div>
					<!-- .entry-content -->
					<footer class="entry-footer">
						Note: Report akan dihasilkan dalam bentuk PDF dalam bentuk list barang, beserta Signature danri penanggung jawab ruangan dan juga Wadir II.
					</footer>
					<!-- .entry-footer -->
				</article>
				<!-- #post-## -->
			</main>
			<!-- #main -->
		</div>
	</div>
	<!-- .inner-wrapper -->
</div>
<!-- .container -->
</div>
<?= $this->endSection('') ?>

<?= $this->section('script') ?>
<script>
	<?= $this->include('jquery-3.5.1.js') ?>
</script>
<script src="<?= base_url('') ?>/template/assets/css/dist/js/select2.min.js"></script>
<script>
	$(document).ready(function () {

	$('.js-example-basic-single').select2();
    $('#id_gedung').change(function(){
            var gedung_id = $('#id_gedung').val();

            $.ajax({
                url:"<?php echo site_url('admin/penempatan/getruangan'); ?>",
                method:"POST",
                data:{gedung_id:gedung_id},
                dataType:"JSON",
                success:function(data){
                    var html = "";
                    var i;
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="'+data[i].id_lokasi+'">'+data[i].nama_lokasi +'</option>';
                    };

                    $('#id_lokasi').html(html);
                },
            });
        });
});
</script>
<?= $this->endSection('') ?>