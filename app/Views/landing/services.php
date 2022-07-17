<?= $this->extend('landing/layout') ?>

<?= $this->section('content') ?>

<!-- Breadcrumb section -->
<div class="site-breadcrumb">
	<div class="container">
		<a href="#"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
		<span>Services</span>
	</div>
</div>
<!-- Breadcrumb section end -->


<!-- About section -->
<section class="about-section spad pt-0">
	<div class="container">
		<div class="section-title text-center">
			<h3>WELCOME TO SimasetPNL</h3>
			<p>Let children creative and make a different</p>
		</div>
		<div class="row">
			<div class="col-lg-6 about-text">
				<h5>Definition</h5>
				<p>Quick Respont (QR) Aset merupakan aplikasi manajemen aset yang dikembangkan sebagai upaya penatausahaan aset Barang Milik Negara (BMN) di lingkungan Politeknik Negeri Lhokseumawe. Penggunaan QR Code pada setiap aset akan mempercepat proses identifikasi atau pencarian aset sehingga mampu memberikan manfaat dalam proses inventarisasi dan mempermudah proses penyusunan laporan aset barang.</p>
				<h5 class="pt-4">Our Services</h5>
				<p>Led at felis arcu. Integer lorem lorem, tincidunt eu congue et, mattis ut ante. Nami suscipit, lectus id efficitur ornare, leo libero convalis nulla, vitae dignissim .</p>
				<ul class="about-list">
					<li><i class="fa fa-check-square-o"></i> Terlaksananya tertib asset dengan menggunakan QR-Code.</li>
					<li><i class="fa fa-check-square-o"></i> Melakukan pengecekan barang secara berkala</li>
					<li><i class="fa fa-check-square-o"></i> Melakukan perbaikan barang yang mengalami kerusakan kecil.</li>
					<li><i class="fa fa-check-square-o"></i> Melaksanakan tugas lain yang diperintahkan oleh atasan.</li>
				</ul>
			</div>
			<div class="col-lg-6 pt-5 pt-lg-0">
				<img src="<?= base_url('') ?>/unica/img/about.jpg" alt="">
			</div>
		</div>
	</div>
</section>
<!-- About section end-->

<!-- Gallery section -->
<div class="gallery-section">
	<div class="gallery">
		<div class="grid-sizer"></div>
		<div class="gallery-item gi-big set-bg" data-setbg="<?= base_url('') ?>/unica/img//gallery/1.jpg">
			<a class="img-popup" href="<?= base_url('') ?>/unica/img/gallery/1.jpg"><i class="ti-plus"></i></a>
		</div>
		<div class="gallery-item set-bg" data-setbg="<?= base_url('') ?>/unica/img/gallery/2.jpg">
			<a class="img-popup" href="<?= base_url('') ?>/unica/img/gallery/2.jpg"><i class="ti-plus"></i></a>
		</div>
		<div class="gallery-item set-bg" data-setbg="<?= base_url('') ?>/unica/img/gallery/3.jpg">
			<a class="img-popup" href="<?= base_url('') ?>/unica/img/gallery/3.jpg"><i class="ti-plus"></i></a>
		</div>
		<div class="gallery-item gi-long set-bg" data-setbg="<?= base_url('') ?>/unica/img/gallery/5.jpg">
			<a class="img-popup" href="<?= base_url('') ?>/unica/img//gallery/5.jpg"><i class="ti-plus"></i></a>
		</div>
		<div class="gallery-item gi-big set-bg" data-setbg="<?= base_url('') ?>/unica/img//gallery/8.jpg">
			<a class="img-popup" href="<?= base_url('') ?>/unica/img//gallery/8.jpg"><i class="ti-plus"></i></a>
		</div>
		<div class="gallery-item gi-long set-bg" data-setbg="<?= base_url('') ?>/unica/img/gallery/4.jpg">
			<a class="img-popup" href="<?= base_url('') ?>/unica/img//gallery/4.jpg"><i class="ti-plus"></i></a>
		</div>
		<div class="gallery-item set-bg" data-setbg="<?= base_url('') ?>/unica/img//gallery/6.jpg">
			<a class="img-popup" href="<?= base_url('') ?>/unica/img//gallery/6.jpg"><i class="ti-plus"></i></a>
		</div>
		<div class="gallery-item set-bg" data-setbg="<?= base_url('') ?>/unica/img//gallery/7.jpg">
			<a class="img-popup" href="<?= base_url('') ?>/unica/img//gallery/7.jpg"><i class="ti-plus"></i></a>
		</div>
	</div>
</div>
<!-- Gallery section -->

<?= $this->endSection('') ?>