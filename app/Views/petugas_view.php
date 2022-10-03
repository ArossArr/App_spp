<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
PETUGAS
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div class="row">
        <div class="col">
        <div class="card border-primary">
            <div class="card-header bg-primary">
                <a href="#" data-petugas="" class="btn btn-outline-light" data-target="#modalPetugas" data-toggle="modal"><i class="fas fa-fw fa-solid fa-user-plus"></i> Tambah Data</a>
            </div>
            <div class="card-body">
                <table class="table table-border">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>No.Hp</th>
                        <th>Jabatan</th>
                        <th>Hak Akses</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $no = 0;
                    foreach ($petugas as $row){
                        $data=$row['id_petugas'].",".$row['nama_petugas'].",".$row['username'].",".$row['password'].",".$row['no_hp'].",".$row['jabatan'].",".$row['hak_akses'].",".base_url('petugas/edit/'.$row['id_petugas']);
                        # code...
                        $no++;
                        ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row['nama_petugas'] ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= $row['no_hp'] ?></td>
                            <td><?= $row['jabatan'] ?></td>
                            <td><?= $row['hak_akses'] ?></td>
                            <td>
                                <a href="" data-petugas="<?=$data?>" data-target="#modalPetugas" data-toggle="modal" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="<?=base_url('petugas/delete/'.$row['id_petugas'])?>" onclick="return confirm('yakin hapus')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>

            <?php if (!empty(session()->getFlashdata("message"))) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata("message")?>
                </div>
                <?php endif?>


            <div class="modal fade" id="modalPetugas" tabindex="-1" aria-labelledby="modalPetugasLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Input Data Petugas</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="form" action="" method="post">
                                    <div class="card-body">
            <div class="form-group">
                <label for="nama_petugas" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama_petugas" id="nama_petugas" class="form-control">
            </div>
            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="no_hp" class="form-label">No Hp</label>
                <input type="number" name="no_hp" id="no_hp" class="form-control">
            </div>
            <div class="form-group">
                <label for="jabatan" class="form-label">Jabatan</label>
                <select name="jabatan" id="jabatan" class="form-control">
                <option value="">Pilih Jabatan Anda</option>
                    <option value="Kepala Sekolah">Kepala Sekolah</option>
                    <option value="Wali Kelas">Wali Kelas</option>
                    <option value="Teller">Teller</option>
                </select>
            </div><br>
            <div class="form-group">
                <label for="hak_akses" class="form-label">Hak Akses</label>
                <select name="hak_akses" id="hak_akses" class="form-control">
                    <option value="">Pilih Hak Akses Anda</option>
                    <option value="Admin">ADMIN</option>
                    <option value="Kasir">KASIR</option>
                </select>
            </div>
            <div class="from-group" id="ubahpassword">
                <label for="harga">Ubah Password</label>
                <input type="checkbox" name="ubahpassword" aria-label="Mau Ubah Password" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i></button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
                                    </form>
        </div>
        </div>
    </div>
</div>
<?= $this->endSection()?>
<?= $this->Section("script")?>
    <script>
    $(document).ready(function(){
        $("#modalPetugas").on('show.bs.modal',function(event){
            var button = $(event.relatedTarget);
                var data = button.data('petugas');
                if(data != ""){
                    const barisdata = data.split(",");
                    $('#nama_petugas').val(barisdata[1]);
                    $('#username').val(barisdata[2]);
                    $('#no_hp').val(barisdata[4]);
                    $('#jabatan').val(barisdata[5]).change();
                    $('#hak_akses').val(barisdata[6]).change();
                   $('#form').attr('action',barisdata[7]);
                }else{
                    $('#nama_petugas').val('');
                    $('#username').val('');
                    $('#no_hp').val('');
                    $('#jabatan').val('').change();
                    $('#hak_akses').val('').change();
                    $('#form').attr('action','/spetugas');
                }
        });
    })
    </script>
<?= $this->endSection()?>