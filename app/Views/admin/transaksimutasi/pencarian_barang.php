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
      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      <style>
.form-control:focus {
    border: 1px solid #34495e;
}

.select2.select2-container {
  width: 100% !important;
}

.select2.select2-container .select2-selection {
  border: 1px solid #ccc;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  height: 34px;
  margin-bottom: 15px;
  outline: none !important;
  transition: all .15s ease-in-out;
}

.select2.select2-container .select2-selection .select2-selection__rendered {
  color: #333;
  line-height: 32px;
  padding-right: 33px;
}

.select2.select2-container .select2-selection .select2-selection__arrow {
  background: #f8f8f8;
  border-left: 1px solid #ccc;
  -webkit-border-radius: 0 3px 3px 0;
  -moz-border-radius: 0 3px 3px 0;
  border-radius: 0 3px 3px 0;
  height: 32px;
  width: 33px;
}

.select2.select2-container.select2-container--open .select2-selection.select2-selection--single {
  background: #f8f8f8;
}

.select2.select2-container.select2-container--open .select2-selection.select2-selection--single .select2-selection__arrow {
  -webkit-border-radius: 0 3px 0 0;
  -moz-border-radius: 0 3px 0 0;
  border-radius: 0 3px 0 0;
}

.select2.select2-container.select2-container--open .select2-selection.select2-selection--multiple {
  border: 1px solid #34495e;
}

.select2.select2-container .select2-selection--multiple {
  height: auto;
  min-height: 34px;
}

.select2.select2-container .select2-selection--multiple .select2-search--inline .select2-search__field {
  margin-top: 0;
  height: 32px;
}

.select2.select2-container .select2-selection--multiple .select2-selection__rendered {
  display: block;
  padding: 0 4px;
  line-height: 29px;
}

.select2.select2-container .select2-selection--multiple .select2-selection__choice {
  background-color: #f8f8f8;
  border: 1px solid #ccc;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  margin: 4px 4px 0 0;
  padding: 0 6px 0 22px;
  height: 24px;
  line-height: 24px;
  font-size: 12px;
  position: relative;
}

.select2.select2-container .select2-selection--multiple .select2-selection__choice .select2-selection__choice__remove {
  position: absolute;
  top: 0;
  left: 0;
  height: 22px;
  width: 22px;
  margin: 0;
  text-align: center;
  color: #e74c3c;
  font-weight: bold;
  font-size: 16px;
}

.select2-container .select2-dropdown {
  background: transparent;
  border: none;
  margin-top: -5px;
}

.select2-container .select2-dropdown .select2-search {
  padding: 0;
}

.select2-container .select2-dropdown .select2-search input {
  outline: none !important;
  border: 1px solid #34495e !important;
  border-bottom: none !important;
  padding: 4px 6px !important;
}

.select2-container .select2-dropdown .select2-results {
  padding: 0;
}

.select2-container .select2-dropdown .select2-results ul {
  background: #fff;
  border: 1px solid #34495e;
}

.select2-container .select2-dropdown .select2-results ul .select2-results__option--highlighted[aria-selected] {
  background-color: #3498db;
}
      </style>
   </head>
   <body>
      <div class="container">
         <h3>Data Inventaris Peralatan</h3>
         <hr>
         <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Filter Lokasi : </label>
                    <select name="bidang" id="bidang" class="form-control" style="height:150px !important">
                        <option value="">...</option>
                        <?php foreach ($lokasi as $key => $value): ?>
                            <option value="<?= $value['id_lokasi'] ?>"><?= $value['nama_gedung'] . " - " . $value['nama_lokasi'] ?></option>
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
                            <th>Lokasi / Pengguna</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <th class=""></th>
                            <th class="filterhead"></th>
                            <th class="filterhead"></th>
                            <th class="filterhead"></th>
                            <th class=""></th>
                            <th class=""></th>
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
                url: '<?php echo site_url('admin/DT_inventaris_peralatan2')?>',
                data: function (d) {
                d.bidang = $('#bidang').val();
                }
            },
            initComplete: function( settings, json ) 
            {

                var indexColumn = -1;

                this.api().columns().every(function () 
                {
                    
                    var column      = this;
                    var input       = document.createElement("input");
                    
                    $(input).attr( 'placeholder', 'Search ' )
                            .addClass('form-control form-control-sm')
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
                {data: 'lokasi'},
                {data: 'action', orderable: false, className: "text-center"},
            ]
        });

        $('#bidang').change(function(event) {
            table.ajax.reload();
        });
    });

            $(document).ready(function() {
                $('#bidang').select2({
                closeOnSelect: true
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