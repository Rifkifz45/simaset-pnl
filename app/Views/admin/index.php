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
        <li class="active">Dashboard</li>
      </ul>
      <!-- /.breadcrumb -->
      <div class="nav-search" id="nav-search">
        <form class="form-search">
          <span class="input-icon">
          <input class="nav-search-input" class="typeahead scrollable" type="text" placeholder="States of USA" />
          <i class="ace-icon fa fa-search nav-search-icon"></i>
          </span>
        </form>
      </div>
      <!-- /.nav-search -->
    </div>
    <div class="page-content">
      <!-- /.page-header -->
      <?= $this->include('admin/configurejs') ?>
      <div class="row">
        <div class="col-xs-12">
          <!-- PAGE CONTENT BEGINS -->
          <div class="alert alert-block alert-success" style="margin-bottom:15px">
            <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
            </button>
            <i class="ace-icon fa fa-check green"></i>
            <strong>Welcome to SIMASET PNL Version 1.0.</strong>
            <small> Aplikasi Sistem Informasi Geografis Manajemen Aset Tetap pada
            Politeknik Negeri Lhokseumawe</small
              >
              <div class="space-6"></div>
              <p class=""><button class="btn btn-sm btn-success">Download Manual Book</button></p>
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

<?= $this->section('script') ?>

<script src="<?= base_url() ?>/template/assets/js/jquery-typeahead.js"></script>
<script type="text/javascript">
      jQuery(function($){     
        
        ///////////////////
          
        //typeahead.js
        //example taken from plugin's page at: https://twitter.github.io/typeahead.js/examples/
        var substringMatcher = function(strs) {
          return function findMatches(q, cb) {
            var matches, substringRegex;
           
            // an array that will be populated with substring matches
            matches = [];
           
            // regex used to determine if a string contains the substring `q`
            substrRegex = new RegExp(q, 'i');
           
            // iterate through the pool of strings and for any string that
            // contains the substring `q`, add it to the `matches` array
            $.each(strs, function(i, str) {
              if (substrRegex.test(str)) {
                // the typeahead jQuery plugin expects suggestions to a
                // JavaScript object, refer to typeahead docs for more info
                matches.push({ value: str });
              }
            });
      
            cb(matches);
          }
         }
      
         $('input.typeahead').typeahead({
          hint: true,
          highlight: true,
          minLength: 1
         }, {
          name: 'states',
          displayKey: 'value',
          source: substringMatcher(ace.vars['US_STATES']),
          limit: 10
         });
          
          
        ///////////////
        

      
      });
    </script>
<?= $this->endSection('') ?>