<?= $this->extend('approver/layout') ?>
<?= $this->section('content') ?>
<div class="main-content">
  <div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="ace-icon fa fa-home home-icon"></i>
          <a href="#">Home</a>
        </li>
        <li class="active">Dashboard</li>
      </ul>
      <!-- /.breadcrumb -->
      <div class="nav-search" id="nav-search">
        <form class="form-search">
          <span class="input-icon">
          <input
            type="text"
            placeholder="Search ..."
            class="nav-search-input"
            id="nav-search-input"
            autocomplete="off"
            />
          <i class="ace-icon fa fa-search nav-search-icon"></i>
          </span>
        </form>
      </div>
      <!-- /.nav-search -->
    </div>
    <div class="page-content">
      <?= $this->include('approver/configurejs') ?>
      <div class="page-header">
        <h1>Dashboard <small> Overview / Stats </small></h1>
      </div>
      <!-- /.page-header -->
      <div class="row">
        <div class="col-xs-12">
          <!-- PAGE CONTENT BEGINS -->
          <div class="alert alert-block alert-success">
            <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
            </button>
            <i class="ace-icon fa fa-check green"></i>
            <strong>Welcome to SIMASET PNL Version 1.0</strong>
            <small>
            . Aplikasi Sistem Informasi Geografis Manajemen Aset Tetap pada
            Politeknik Negeri Lhokseumawe</small
              >
          </div>
          <div class="row">
            <div class="col-sm-12 infobox-container">
              <div class="space-2"></div>
              <div class="infobox infobox-blue infobox-large" style="width: 270px;">
                <div class="infobox-icon">
                  <i class="ace-icon fa fa-line-chart"></i>
                </div>
                <div class="infobox-data">
                  <div class="infobox-content" style="max-width: 200px">Total Number of Assets</div>
                  <div class="infobox-content bigger-120"><?= number_format(10000) ?></div>
                </div>
              </div>
              <div class="infobox infobox-green infobox-large" style="width: 270px;">
                <div class="infobox-icon">
                  <i class="ace-icon fa fa-check"></i>
                </div>
                <div class="infobox-data">
                  <div class="infobox-content" style="max-width: 200px">Total Asset Distributed</div>
                  <div class="infobox-content bigger-120"><?= number_format(6000) ?></div>
                </div>
              </div>
              <div class="infobox infobox-red infobox-large" style="width: 270px;">
                <div class="infobox-icon">
                  <i class="ace-icon fa fa-times"></i>
                </div>
                <div class="infobox-data">
                  <div class="infobox-content" style="max-width: 200px">Total Asset to Distributed</div>
                  <div class="infobox-content bigger-120"><?= number_format(3844) ?></div>
                </div>
              </div>
              <div class="infobox infobox-pink infobox-large" style="width: 270px;">
                <div class="infobox-icon">
                  <i class="ace-icon fa fa-chain-broken"></i>
                </div>
                <div class="infobox-data">
                  <div class="infobox-content" style="max-width: 200px">Total Assets Undefined</div>
                  <div class="infobox-content bigger-120"><?= number_format(156) ?></div>
                </div>
              </div>
            </div>
            <div class="vspace-12-sm"></div>
          </div>
          <!-- /.row -->
          <!-- PAGE CONTENT ENDS -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.page-content -->
  </div>
</div>
<?= $this->endSection() ?>