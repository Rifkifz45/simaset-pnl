<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
        <script language="JavaScript" src="https://code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>
        <script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
        <script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js" type="text/javascript"></script>
        <script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css" />
    </head>
    <body>
    <div class="container">
        <div class="row">
            <h2 class="text-center"> Data Inventaris Peralatan </h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Filter Kategori</label>
                    <select name="bidang" id="bidang" class="form-control">
                        <option value="">Pilih Kategori</option>
                        <option value="1">Halo</option>
                    </select>
                </div>
                <table id="ip" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>NUP</th>
                            <th>Nama Barang</th>
                            <th>Tercatat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
        table = $('#ip').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '<?php echo site_url('admin/DT_inventaris_peralatan')?>',
                data: function (d) {
                d.bidang = $('#bidang').val();
                }
            },
            order: [],
            columns: [
                {data: 'no', orderable: false},
                {data: 'kode_barang'},
                {data: 'nup'},
                {data: 'nama_barang'},
                {data: 'tercatat'},
                {data: 'action', orderable: false},
            ]
        });

        $('#bidang').change(function(event) {
            table.ajax.reload();
        });
    });
    </script>
    </body>
</html>