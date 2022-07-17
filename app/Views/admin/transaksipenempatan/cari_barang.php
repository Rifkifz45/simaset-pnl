<!DOCTYPE html>
<html lang="en">
   <head>
      <title>CodeIgniter4 DataTables</title>
      <!-- Meta -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="CodeIgniter4-DataTables is Server-side DataTable library for CodeIgniter4. CodeIgniter4-DataTables is CodeIgniter4 Library to handle server-side processing of DataTables jQuery Plugin via AJAX option by using Query Builder CodeIgniter 4">
      <meta name="author" content="Hermawan Ramadhan">
      <link rel="shortcut icon" href="favicon.ico">
      <!-- Google Font -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">
      <!-- FontAwesome JS-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" integrity="sha512-F5QTlBqZlvuBEs9LQPqc1iZv2UMxcVXezbHzomzS6Df4MZMClge/8+gXrKw2fl5ysdk4rWjR0vKS7NNkfymaBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <!-- Plugins CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.6.0/styles/monokai-sublime.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css" integrity="sha512-PT0RvABaDhDQugEbpNMwgYBCnGCiTZMh9yOzUsJHDgl/dMhD9yjHAwoumnUk3JydV3QTcIkNDuN40CJxik5+WQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!-- Theme CSS -->  
      <link id="theme-style" rel="stylesheet" href="https://codeigniter4-datatables.hermawan.dev/assets/css/theme.css">
      <link rel="stylesheet" href="https://codeigniter4-datatables.hermawan.dev/assets/css/hermawan.dev.css">
      <!-- Javascript -->          
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha512-bnIvzh6FU75ZKxp0GXLH9bewza/OIw6dLVh9ICg0gogclmYGguQJWl8U30WpbsGTqbIiAwxTsbe76DErLq5EDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha512-M5KW3ztuIICmVIhjSqXe01oV2bpe248gOxqmlcYrEzAvws7Pw3z6BK0iGbrwvdrUQUhi3eXgtxp5I8PDo9YfjQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js" integrity="sha512-OQlawZneA7zzfI6B1n1tjUuo3C5mtYuAWpQdg+iI9mkDoo7iFzTqnQHf+K5ThOWNJ9AbXL4+ZDwH7ykySPQc+A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <!-- Page Specific JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.6.0/highlight.min.js" integrity="sha512-zol3kFQ5tnYhL7PzGt0LnllHHVWRGt2bTCIywDiScVvLIlaDOVJ6sPdJTVi0m3rA660RT+yZxkkRzMbb1L8Zkw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.2/jquery.scrollTo.min.js" integrity="sha512-BLT+loVwmqdzlGIU9gxbSpRUwhs9I1uWkNkdAJEUM82s337R9T0pBk007MwaJjVTGhOHsovV4y6o/IwscSAglw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js" integrity="sha512-Y2IiVZeaBwXG1wSV7f13plqlmFOx8MdjuHyYFVoYzhyRr3nH/NMDjTBSswijzADdNzMyWNetbLMfOpIPl6Cv9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   </head>
   <body>
      <div class="container">
         <h3>Data Inventaris Peralatan</h3>
         <hr>
         <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Filter Bidang : </label>
                    <select name="bidang" id="bidang" class="form-control chosen-select" style="height:100%; width: 100%;">
                        <option value="">...</option>
                        <?php foreach ($bidang as $key => $value): ?>
                            <option value="<?= $value['idtweb_asset'] ?>"><?= $value['golongan'] . $value['bidang'] . " - " . $value['uraian'] ?></option>
                        <?php endforeach ?>                        
                    </select>
                </div>
                
            </div>
        </div>
                  <table id="ip" class="table table-bordered">
                     <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>NUP</th>
                            <th>Nama Barang</th>
                            <th>Kondisi</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <th class="filterhead"></th>
                            <th class="filterhead"></th>
                            <th class="filterhead"></th>
                            <th class="filterhead"></th>
                            <th class="filterhead"></th>
                            <th class="filterhead"></th>
                        </tr>
                    </thead>
                     <tbody></tbody>
                  </table>
                  <div class="callout-block callout-block-danger">
                     <div class="content">
                        <h4 class="callout-title">
                           <span class="callout-icon-holder mr-1">
                           <i class="fas fa-info-circle"></i>
                           </span><!--//icon-holder-->
                           Note
                        </h4>
                        <p>This sample database is provide from : <a href="<?= site_url('admin/inventaris_peralatan') ?>">Data Inventaris Peralatan/</a></p>
                     </div>
                     <!--//content-->
                  </div>
        
        <script type="text/javascript">
            $(document).ready(function() {


        table = $('#ip').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: {
                url: '<?php echo site_url('admin/DT_inventaris_peralatan')?>',
                data: function (d) {
                d.bidang = $('#bidang').val();
                }
            },
            initComplete: function( settings, json ) 
            {

                var indexColumn = 0;

                this.api().columns().every(function () 
                {
                    
                    var column      = this;
                    var input       = document.createElement("input");
                    
                    $(input).attr( 'placeholder', 'Search ' )
                            .addClass('form-control form-control-sm')
                            .css('width', '120px')
                            .appendTo( $('.filterhead:eq('+indexColumn+')').empty() )
                            .on('keyup', function () {
                                column.search($(this).val(), false, false, true).draw();
                            });

                    indexColumn++;
                });
            },
            order: [],
            columns: [
                {data: 'no', orderable: false},
                {data: 'kode_barang'},
                {data: 'nup'},
                {data: 'nama_barang'},
                {data: 'uraian_kondisi'},
                {data: 'action', orderable: false, className: "text-center"},
            ]
        });

        $('#bidang').change(function(event) {
            table.ajax.reload();
        });
    });
         </script>
      </div>
      <!--//docs-wrapper-->
      <script src="https://codeigniter4-datatables.hermawan.dev/assets/js/highlight-custom.js"></script> 
      <script src="https://codeigniter4-datatables.hermawan.dev/assets/js/docs.js"></script> 
      <script src="https://codeigniter4-datatables.hermawan.dev/assets/js/hermawan.dev.js"></script> 
   </body>
</html>