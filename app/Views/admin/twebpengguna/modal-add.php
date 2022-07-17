<div class="modal" id="add" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary" style="padding: 1rem;">
        <div class="col-md-3">
          <h4 class="modal-title"><div class="text-center">Entry Data Pengguna</div></h4>
        </div>
        <div class="col md-7">

        </div>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('admin/pengguna/create') ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nama_pengguna" class="col-md-3 control-label">Nama Lengkap : </label>
            <div class="col-md-7">
              <input autofocus type="text" id="nama_pengguna" name="nama_pengguna" required placeholder=" Nama Lengkap" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label for="nip" class="col-md-3 control-label">NIP : </label>
            <div class="col-md-7">
              <input id="nip" type="text" name="nip" required placeholder=" NIP / Identitas Lainnya" class="form-control">
            </div>
          </div>


          <div class="form-group">
            <label for="id_kategori_pengguna" class="col-md-3 control-label">Kategori : </label>
            <div class="col-md-7">
            <select class="form-control chosen-select" name="id_kategori_pengguna" id="id_kategori_pengguna_modal" style="width:100%">
              <option value="" selected disabled>Pilih Kategori</option>
               <?php foreach ($kategori as $key => $kat): ?>
                <option value="<?= $kat['id_kategori_pengguna'] ?>"><?= $kat['nama_kategori_pengguna'] ?></option>
              <?php endforeach ?>
            </select>
            </div>
          </div>

          <div class="form-group">
            <label for="pangkat" class="col-md-3 control-label">Pangkat : </label>
            <div class="col-md-7">
              <select name="pangkat" id="pangkat" class="form-control chosen-select" style="width:100% !important">
                <option value="" selected disabled>Pilih Pangkat</option>
                <option value="Juru Muda">Juru Muda</option>
                <option value="Juru Muda Tk.I">Juru Muda Tk.I</option>
                <option value="Juru">Juru</option>
                <option value="Juru Tk.I">Juru Tk.I</option>

                <option value="Pengatur Muda">Pengatur Muda</option>
                <option value="Pengatur Muda Tk.I">Pengatur Muda Tk.I</option>
                <option value="Pengatur">Pengatur</option>
                <option value="Pengatur Tk.I">Pengatur Tk.I</option>

                <option value="Penata Muda">Penata Muda</option>
                <option value="Penata Muda Tk.I">Penata Muda Tk.I</option>
                <option value="Penata">Penata</option>
                <option value="Penata Tk.I">Penata Tk.I</option>

                <option value="Pembina">Pembina</option>
                <option value="Pembina Tk.I">Pembina Tk.I</option>
                <option value="Pembina Utama Muda">Pembina Utama Muda</option>
                <option value="Pembina Utama Madya">Pembina Utama Madya</option>
                <option value="Pembina Utama">Pembina Utama</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="golongan" class="col-md-3 control-label">Golongan : </label>
            <div class="col-md-7">
              <input id="golongan" type="text" name="golongan" required placeholder=" Golongan" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label for="jabatan" class="col-md-3 control-label">Jabatan : </label>
            <div class="col-md-7">
              <input type="text" id="jabatan" name="jabatan" required placeholder=" Jabatan" class="form-control">
            </div>
          </div>

          <div class="form-group">
	        <label for="foto_pengguna" class="col-md-3 control-label">Upload Gambar : </label>
	        <div class="col-md-7">
	          <input type="file" id="id-input-file-2" name="foto_pengguna" />
	        </div>
	      </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>