<?= $this->extend('index_2') ?>

<?= $this->section('head') ?>
<style>
	<?= $this->include('jquery.dataTables.min.css') ?>
</style>
<style>
    .site-footer{
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        text-align: center;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div id="content" class="site-content">
<div class="container">
<header class="entry-header">
	<h1 class="entry-title">Statistik Asset</h1>
</header>
<br>
<a href="<?= site_url('statistik-detail') ?>"><i class="fa fa-angle-double-right"></i> See Detail Here</a>
	<!-- .inner-wrapper -->
</div>
<!-- .container -->
</div>
<?= $this->endSection('') ?>