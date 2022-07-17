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
            <li class="active">User Login</li>
         </ul>
         <!-- /.breadcrumb -->
         <div class="nav-search" id="nav-search">
            <form class="form-search">
               <span class="input-icon">
               <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
               <i class="ace-icon fa fa-search nav-search-icon"></i>
               </span>
            </form>
         </div>
         <!-- /.nav-search -->
      </div>
      <div class="page-content">
         <!-- /.page-header -->
         <div class="row">
            <div class="col-xs-12">
               <!-- PAGE CONTENT BEGINS -->
               <div class='row'>
                  <div class='col-xs-12'>
                     <div class='widget-box'>
                        <div class='widget-header'>
                           <h4 class='widget-title'>USER LOGIN</h4>
                           <div class="widget-toolbar">
                           <a href="#" data-action="fullscreen" class="orange2">
                              <i class="ace-icon fa fa-expand"></i>
                           </a>

                           <a href="#" data-action="reload">
                              <i class="ace-icon fa fa-refresh"></i>
                           </a>

                           <a href="#" data-action="collapse">
                              <i class="ace-icon fa fa-chevron-up"></i>
                           </a>

                           <a href="#" data-action="close">
                              <i class="ace-icon fa fa-times"></i>
                           </a>
                        </div>
                        </div>
                        <div class='widget-body'>
                           <div class='widget-main'>
                              <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                              <thead>
                                 <tr>
                                    <th class="center"> # </th>
                                    <th> Nama </th>
                                    <th> Username </th>
                                    <th> Email / Phone </th>
                                    <th> Level </th>
                                    <th> Joined </th>
                                    <th> Status </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php foreach ($user as $key => $value): ?>
                                 <tr>
                                    <td class="center"><?= $key + 1 ?></td>
                                    <td><?= $value['nama_user'] ?></td>
                                    <td><?= $value['username'] ?></td>
                                    <td><b><?= $value['email'] . "</b><br>" . $value['phone'] ?></td>
                                    <td class="center" style="vertical-align:middle;">
                                       <?php
                                          if ($value['level'] == 1) {
                                             echo "<span class=\"label label-sm label-success\">Admin</span>";
                                          }else if($value['level'] == 2){
                                             echo "<span class=\"label label-sm label-info arrowed arrowed-right\">Approver</span>";
                                          }else if($value['level'] == 3){
                                             echo "<span class=\"label label-sm label-inverse arrowed-in\">Penanggung Jawab</span>";
                                          }else{
                                             echo "";
                                          }
                                          ?>
                                    </td>
                                    <td><?= date("d/m/Y", strtotime($value['created_at'])); ?></td>
                                    <td class="center" style="vertical-align:middle">
                                       <?php
                                          if ($value['status_akun'] == 0) {
                                             echo "
                                             <span class=\"label label-warning\">
                                                Unverified
                                             </span>";
                                          }else if($value['status_akun'] == 1){
                                             echo "
                                             <span class=\"label label-success arrowed\">
                                                Verified
                                             </span>";
                                          }else if($value['status_akun'] == 2){
                                             echo "
                                             <span class=\"label label-danger arrowed-in\">
                                                Blocked
                                             </span>";
                                          }else{
                                             echo "";
                                          }
                                          ?>
                                    </td>
                                 </tr>
                                 <?php endforeach ?>
                              </tbody>
                           </table>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.span -->
               </div>
               <!-- PAGE CONTENT ENDS -->
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.page-content -->
   </div>
</div>
<!-- /.main-content -->
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<!-- page specific plugin scripts -->
<script src="<?= base_url('') ?>/template/assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.flash.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.html5.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.print.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.colVis.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/dataTables.select.min.js"></script>
<script type="text/javascript">
   $(document).on('shown.bs.modal', function (e) {
        $('[autofocus]', e.target).focus();
      });

   jQuery(function($) {
      //initiate dataTables plugin
      var myTable = $('#dynamic-table')
      //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
      .DataTable( {
         bAutoWidth: false,
         "aoColumns": [
           { "bSortable": false },
           null, null, null, null, null,
           { "bSortable": false }
         ],
         "aaSorting": [],
         drawCallback: function () {
            $('[rel="tooltip"]').tooltip({trigger: "hover"});
         }
       });   
   })
</script>
<?= $this->endSection('') ?>