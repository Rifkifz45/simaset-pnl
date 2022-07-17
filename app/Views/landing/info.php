<?= $this->extend('landing/layout') ?> <?= $this->section('content') ?>

<div class="row">
  <div class="col-xs-12 header-portal">
    <h3 align="center">Search</h3>
    <p align="center">Detail data barang</p>
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
    <form action="<?= site_url('info/detail') ?>" method="post">
      <label for="kode_barang">Kode Barang:</label>
      <input type="text" name="kode_barang" id="kode_barang" class="form-control" placeholder="Enter an item code (html allowed)" required>
      <br>
      <label for="nup">NUP:</label>
      <input type="text" name="nup" id="nup" class="form-control" placeholder="Enter an item NUP (html allowed)" required>
      <br>
      <label for="token">Token:</label>
      <input type="text" name="token" id="token" class="form-control" placeholder="Enter a token (html allowed)" required>
      <br>
      <button type="submit" class="btn btn-success" value="Submit">Find It!</button>
    </form>
    </div>
    <!--.col -->
  </div>
  <!--./row --> <?= $this->endSection('') ?>