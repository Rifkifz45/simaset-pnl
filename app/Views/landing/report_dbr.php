<?= $this->extend('landing/layout') ?>

<?= $this->section('head') ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" integrity="sha256-FdatTf20PQr/rWg+cAKfl6j4/IY3oohFAJ7gVC3M34E=" crossorigin="anonymous">
<!-- select2-bootstrap4-theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme/dist/select2-bootstrap4.min.css"> <!-- for live demo page -->

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col-xs-12 header-portal">
    <h3 align="center">Report in PDF</h3>
    <p align="center">Cetak daftar barang dalam ruangan</p>
  </div>
</div>
<div class="row content" style="margin-top: -10px;">
  <div class="col-md-2" style="margin-top:50px ;">
    
  </div>
  <!--.col -->
  <div class="col-md-10">
    <h3> Tracking Data Lokasi Aset </h3> How to write to a HTML page without reloading and without using server side scripting.
    <div><br></div>
    <!-- NOTE: TB3 form width default is 100%, so they expan to your <div> -->
    <form action="<?= site_url('cetak/dbr') ?>" method="post">
	  <div class="form-group">
	    <label for="id_gedung">Pilih Gedung</label>
	    <select style="width: 100%;" class="form-control select2-single" name="id_gedung" id="id_gedung" required>
	    	<option selected disabled value="">Pilih Gedung</option>
	      <?php foreach ($gedung as $key => $ged): ?>
			<option value="<?= $ged['id_gedung'] ?>"><?= $ged['nama_gedung'] ?></option>
		<?php endforeach ?>
	    </select>
	  </div>
	  <div class="form-group">
	    <label for="id_lokasi">Pilih Lokasi</label>
	    <select style="width: 100%;" class="form-control select2-single" name="id_lokasi" id="id_lokasi" required style="overflow:scroll;">
	    	<option selected disabled value="">...</option>
	    </select>
	  </div>
	  <div class="form-group">
	    <label for="id_lokasi">Token</label>
	    <input type="text" name="token" id="token" class="form-control" placeholder="Enter a token (html allowed)" required>
	  </div>
	  <button type="submit" class="btn btn-success" value="Submit">Take Report!</button>
	</form>
    </div>
    <!--.col -->
  </div>


<?= $this->endSection('') ?>

<?= $this->section('script') ?>
<script>
	<?= $this->include('jquery-3.5.1.js') ?>
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js" integrity="sha256-AFAYEOkzB6iIKnTYZOdUf9FFje6lOTYdwRJKwTN5mks=" crossorigin="anonymous"></script>

<script>
	$(document).ready(function () {
	$("#id_gedung").select2({
		theme: "bootstrap4"
	});

	$("#id_lokasi").select2({
	  theme: "bootstrap4"
	});

    $('#id_gedung').change(function(){
        var gedung_id = $('#id_gedung').val();

        $.ajax({
            url:"<?php echo site_url('test/lock'); ?>",
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