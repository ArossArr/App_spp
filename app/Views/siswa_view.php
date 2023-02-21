<?=$this->extend('layouts/admin')?>
<?=$this->section('title')?>
SISWA
<?=$this->endSection()?>
<?=$this->section('content')?>
<div class="row">
  <div class="col">
    <div class="card border">
      <div class="card-header bg-primary">
        <a href="#" data-siswa="" class="btn btn-outline-light" data-target="#modalSiswa" data-toggle="modal"><i class="fas fa-user-plus"></i> Tambah Siswa</a>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Nis</th>
            <th>Kelas</th>
            <th>Tahun Masuk</th>
            <th>No Rekening</th>
            <th>Jenis Kelamin</th>
            <th>aksi</th>
          </tr>
          <?php
          $no=0;
          foreach($siswa as $row){
            $data = $row['nama_siswa'] . "," . $row['nis'] . "," . $row['kelas'] . "," . $row['tahun_masuk'] . "," . $row['no_rek'] . "," . $row['jk'] . "," . base_url('siswa/edit/' . $row['id_siswa']);
            $no++;
            ?>
            <tr>
              <td><?=$no?></td>
              <td><?=$row['nama_siswa']?></td>
              <td><?=$row['nis']?></td>
              <td><?=$row['kelas']?></td>
              <td><?=$row['tahun_masuk']?></td>
              <td><?=$row['no_rek']?></td>
              <td><?=$row['jk']?></td>
              <td>
              <a href="" data-siswa="<?= $data?>" data-target="#modalSiswa" data-toggle="modal" class="btn btn-warning"><i class="fas fa-edit"></i></a>
              <a href="<?=base_url('siswa/delete/'.$row['id_siswa'])?>" onclick="return confirm('yakin hapus')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
            <?php
          }
          ?>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalSiswa" tabindex="-1" aria-labelledby="modalSiswaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLabel">Input Data Siswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <form action="" id="fsiswa" method="post">
        <div class="card-body">
          <div class="form-group">
            <label for="nama_siswa" class="form-label">Nama Siswa</label>
            <input type="text" name="nama_siswa" id="nama_siswa" class="form-control">
          </div>
          <div class="form-group">
            <label for="nis" class="form-label">NIS</label>
            <input type="text" name="nis" id="nis" class="form-control">
          </div>
          <div class="form-group">
            <label for="kelas" class="form-label">Kelas</label><br>
            <select name="kelas" id="kelas" class="form-control ">
              <option value="" class="text-center">== Pilih Kelas ==</option>
              <option value="XII RPL 1">XII RPL 1</option>
              <option value="XII RPL 2">XII RPL 2</option>
              <option value="XII MM 1">XII MM 1</option>
              <option value="XII MM 2">XII MM 2</option>
              <option value="XII OTKP 1">XII OTKP 1</option>
              <option value="XII OTKP 2">XII OTKP 2</option>
              <option value="XII OTKP 3">XII OTKP 3</option>
              <option value="XII BDP 1">XII BDP 1</option>
              <option value="XII BDP 2">XII BDP 2</option>
              <option value="XII BDP 3">XII BDP 3</option>
              <option value="XII AKL 1">XII AKL 1</option>
              <option value="XII AKL 2">XII AKL 2</option>
              <option value="XII AKL 3">XII AKL 3</option>
              <option value="XII AKL 4">XII AKL 4</option>
              <option value="XII AKL 5">XII AKL 5</option>
            </select>
          </div>
          <div class="form-group">
            <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
            <input type="text" name="tahun_masuk" id="tahun_masuk" class="form-control">
          </div>
          <div class="form-group">
            <label for="no_rek" class="form-label">No Rekening</label>
            <input type="text" name="no_rek" id="no_rek" class="form-control">
          </div>
          <div class="form-group">
            <label for="jk" class="form-label">Jenis Kelamin</label><br>
            <select name="jk" id="jk" class="form-control">
              <option value="" class="text-center">== Jenis Kelamin ==</option>
              <option value="L">Laki Laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i></button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">X</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php if (!empty(session()->getFlashdata('message'))) : ?>

<div class="alert alert-success">
    <?php echo session()->getFlashdata('message'); ?>
</div>

<?php endif ?>
<?=$this->endSection()?>
<?=$this->section('script')?>
<script>
  $(document).ready(function () {
    $("#modalSiswa").on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var data = button.data('siswa');
        
        if (data != "") {
            const barisdata = data.split(",");
            $('#nama_siswa').val(barisdata[0]);
            $('#nis').val(barisdata[1]);
            $('#kelas').val(barisdata[2]).change();
            $('#tahun_masuk').val(barisdata[3]);
            $('#no_rek').val(barisdata[4]);
            $('#jk').val(barisdata[5]).change();
            $('#fsiswa').attr('action', barisdata[6]);
        } else {
            $('#nama_siswa').val('');
            $('#nis').val('');
            $('#kelas').val('').change();
            $('#tahun_masuk').val('');
            $('#no_rek').val('');
            $('#jk').val('').change();
            $('#fsiswa').attr('action', '/ssiswa');
        }
    });
})
</script>
<?=$this->endSection()?>