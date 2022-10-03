<?=$this->extend('layouts/admin')?>
<?=$this->section('title')?>
 Form IsI
<?= $this->endSection()?>
<?= $this->section('content')?>
<div class="card">
  <div class="card-header bg-primary">
    <b class="text-white">Petugas</b>
  </div>
    <form action="/spetugas" method="post">
      <div class="modal-body">
            <div class="form-group">
                <label for="nama_petugas" class="form-label">Nama Petugas</label>
                <input type="text" name="nama_petugas" id="nama_petugas" class="form-control">
            </div>
            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="no_hp" class="form-label">No.Hp</label>
                <input type="text" name="no_hp" id="no_hp" class="form-control">
            </div>
            <div class="form-group">
              <label for="jabatan" class="form-label">Jabatan</label><br>
                <select name="jabatan" id="jabatan">
                  <option value="">== Pilih Jabatan ==</option>
                  <option value="Kepala Sekolah">Kepala Sekolah</option>
                  <option value="Wali Kelas">Wali Kelas</option>
                  <option value="Teller">Teller</option>
                </select>
            </div>
            <div class="form-group">
              <label for="hak_akses" class="form-label">Hak Akses</label><br>
                <select name="hak_akses" id="hak_akses">
                  <option value="Admin">Admin</option>
                  <option value="Kasir">Kasir</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?= $this->endSection()?>