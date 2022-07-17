<?= $this->extend('landing/layout') ?>

<?= $this->section('head') ?>
<script src="<?= base_url('') ?>/leaflet/leaflet.js"></script>
<link rel="stylesheet" href="<?= base_url('') ?>/leaflet/leaflet.css">
<?= $this->endSection('') ?>

<?= $this->section('content') ?>
<!-- Breadcrumb section -->
<div class="site-breadcrumb">
	<div class="container">
		<a href="#"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
		<span>Contact</span>
	</div>
</div>
<!-- Breadcrumb section end -->


<!-- Courses section -->
<section class="contact-page spad pt-0">
	<div class="container">
		<div class="map-section">
			<div class="contact-info-warp" style="z-index: 1;">
				<div class="contact-info">
					<h4>Address</h4>
					<p>40 Baria Street 133/2, NewYork City, US</p>
				</div>
				<div class="contact-info">
					<h4>Phone</h4>
					<p>(+88) 111 555 666</p>
				</div>
				<div class="contact-info">
					<h4>Email</h4>
					<p>infodeercreative@gmail.com</p>
				</div>
				<div class="contact-info">
					<h4>Working time</h4>
					<p>Monday - Friday: 08 AM - 06 PM</p>
				</div>
			</div>
			<!-- Google map -->
			<div class="map" id="map-canvas" style="overflow:hidden;"></div>
		</div>
		<div class="contact-form spad pb-0">
			<div class="section-title text-center">
				<h3>GET IN TOUCH</h3>
				<p>Contact us for best deals and offer</p>
			</div>
			<form class="comment-form --contact">
				<div class="row">
					<div class="col-lg-4">
						<input type="text" placeholder="Your Name">
					</div>
					<div class="col-lg-4">
						<input type="text" placeholder="Your Email">
					</div>
					<div class="col-lg-4">
						<input type="text" placeholder="Subject">
					</div>
					<div class="col-lg-12">
						<textarea placeholder="Message"></textarea>
						<div class="text-center">
							<button class="site-btn">SUBMIT</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
<!-- Courses section end-->
<?= $this->endSection('') ?>

<?= $this->section('script') ?>
<script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
<link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet' />
<script>
  var map = L.map('map-canvas', {
    fullscreenControl: {
        pseudoFullscreen: false
    }
  }).setView({lat: 5.11956173670643, lon:97.15696081841716}, 17);

    L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
    subdomains:['mt0','mt1','mt2','mt3']
	})
    .addTo(map);

    var marker = L.marker([5.118010717039227, 97.15739080878149]).addTo(map)
    .bindPopup("<h4>Gudang Perlengkapan PNL</h4>");

</script>
<?= $this->endSection() ?>