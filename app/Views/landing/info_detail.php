<?= $this->extend('landing/layout') ?>

<?= $this->section('head') ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<style>
@import url(//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);
tbody > tr {
    cursor: pointer;
}

.result{
    margin-top:20px;
}
</style>
<?= $this->endSection('') ?>

<?= $this->section('content') ?>
<div class="col-xs-12 header-portal">
	<h3 align="center">Search</h3>
	<p align="center">Detail data barang</p>
	<p align="center"> < Kode Barang : <b><?= $data['kode_barang'] ?></b> > &amp; < NUP : <b><?= $data['nup'] ?></b> > </p>
</div>

<div class="row content">
<div class="col-md-12">
<p class="text-center pagination">
	<h4> <i class="fa fa-shopping-cart"></i> Product Detail <small> - click on product for details</small> <a href="<?= site_url('info') ?>" class="btn btn-sm btn-info pull-right" id="back-to-bootsnipp"><i class="fa fa-arrow-left"></i> Back</a></h4>
</p>
<br>
<table class="table table-hover" id="dynamic-table">
      <thead>
        <tr>
          <th>#</th>
          <th>Kode Barang</th>
          <th>NUP</th>
          <th>Tercatat</th>
          <th>Lokasi</th>
          <th>Pengguna</th>
          <th>Kondisi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td><?= $data['kode_barang'] ?></td>
          <td><?= $data['nup'] ?></td>
          <td><?= $data['tercatat'] ?></td>
          <td><?= $data['nama_lokasi'] ?></td>
          <td><?= $data['nama_pengguna'] ?></td>
          <td>
              <?php
              if ($data['id_kondisi'] == "K1") {
                  echo "<span class=\"label label-success\">".$data['uraian_kondisi']."</span>";
              }else if ($data['id_kondisi'] == "K2") {
                  echo "<span class=\"label label-warning\">".$data['uraian_kondisi']."</span>";
              }else if ($data['id_kondisi'] == "K3") {
                  echo "<span class=\"label label-danger\">".$data['uraian_kondisi']."</span>";
              }else if ($data['id_kondisi'] == "K4") {
                  echo "<span class=\"label label-default\">".$data['uraian_kondisi']."</span>";
              }else{
                echo "Tolong untuk melakukan pengecekan pada tabel Kondisi!!";
              }
              ?>
          </td>
        </tr>   
      </tbody>
    </table>  
</div>
</div>

<!-- Modal -->
<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
        <h4 class="modal-title" id="myModalLabel"><i class="text-muted fa fa-shopping-cart"></i> <strong><?= $data['kode_barang'] ?></strong> - <?= $data['nama_barang'] ?> </h4>
      </div>
      <div class="modal-body">
      
        <table class="pull-left col-md-8 ">
             <tbody>
                 <tr>
                     <td class="h6"><strong>Kode Barang</strong></td>
                     <td> </td>
                     <td class="h5"><?= $data['kode_barang'] ?></td>
                 </tr>

                 <tr>
                     <td class="h6"><strong>NUP</strong></td>
                     <td> </td>
                     <td class="h5"><?= $data['nup'] ?></td>
                 </tr>
                 
                 <tr>
                     <td class="h6"><strong>Nama Barang</strong></td>
                     <td> </td>
                     <td class="h5"><?= $data['nama_barang'] ?></td>
                 </tr>

                 <tr>
                     <td class="h6"><strong>Merk</strong></td>
                     <td> </td>
                     <td class="h5"><?= $data['merk'] ?></td>
                 </tr>
                 
                 <tr>
                     <td class="h6"><strong>Tanggal Perolehan</strong></td>
                     <td> </td>
                     <td class="h5"><?= date('d-m-Y', strtotime($data['tgl_perolehan'])) ?></td>
                 </tr>
                 
                 <tr>
                     <td class="h6"><strong>Código de Barras</strong></td>
                     <td> </td>
                     <td class="h5">0321649843</td>
                 </tr>  

                 <tr>
                     <td class="h6"><strong>Unid. por Embalagem</strong></td>
                     <td> </td>
                     <td class="h5">50</td>
                 </tr>                            

                 <tr>
                     <td class="h6"><strong>Quantidade Mínima</strong></td>
                     <td> </td>
                     <td class="h5">50</td>
                 </tr>

                 <tr>
                     <td class="h6"><strong>Preço Atacado</strong></td>
                     <td> </td>
                     <td class="h5">R$ 35,00</td>
                 </tr> 
                
                 <tr>
                     <td class="btn-mais-info text-primary">
                         <br>
                         <i class="open_info fa fa-plus-square-o"></i>
                         <i class="open_info hide fa fa-minus-square-o"></i> Informasi
                     </td>
                     <td> </td>
                     <td class="h5"></td>
                 </tr> 

             </tbody>
        </table>

             
        <div class="col-md-4"> 
            <img src="<?= base_url('uploads/gedung/default.jpg') ?>" alt="teste" class="img-thumbnail">  
        </div>
        
        <div class="clearfix"></div>
        <p class="open_info hide">Barang ini tercatat sebagai</p>
      </div>
        
      <div class="modal-footer">       
        <div class="text-right pull-right col-md-6">
            Harga Satuan: <br/> 
            <span class="h3 text-muted"><strong> Rp. <?= number_format($data['nilai_perolehan_pertama']) ?> </strong></span></span> 
        </div>
    </div>
  </div>
</div>
</div>
<!-- fim Modal-->   
<?= $this->endSection('') ?>

<?= $this->section('script') ?>
<!-- page specific plugin scripts -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<?= $this->include('landing/script.js') ?>

<script>
	$(function () {
    /* BOOTSNIPP FULLSCREEN FIX */
    if (window.location == window.parent.location) {
        $('#back-to-bootsnipp').removeClass('hide');
        $('.alert').addClass('hide');
    } 
    
    $('#fullscreen').on('click', function(event) {
        event.preventDefault();
        window.parent.location = "http://bootsnipp.com/iframe/Q60Oj";
    });
    
    $('tbody > tr').on('click', function(event) {
        event.preventDefault();
        $('#myModal').modal('show');
    })
    
    $('.btn-mais-info').on('click', function(event) {
        $( '.open_info' ).toggleClass( "hide" );
    })
    
     
});
</script>
<?= $this->endSection('') ?>