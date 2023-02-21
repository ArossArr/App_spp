<?=$this->extend('layouts/admin')?>
<?=$this->section('title')?>
JENIS PEMBAYARAN
<?=$this->endSection()?>
<?=$this->Section('content')?>
<div class="row">
  <div class="col">
    <div class="card border">
      <div class="card-header bg-primary">
        <a href="#" data-jp="" class="btn btn-outline-light"  data-target="#modalJp" data-toggle="modal"><i class="fas fa-user-plus"></i>Tambah Pembayaran</a>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <tr>
            <th>NO</th>
            <th>Jenis Pembayaran</th>
            <th>Nominal</th>
            <th>Tahun Ajaran</th>
            <th>Aksi</th>
          </tr>
          <?php
          $no=0;
          foreach($jp as $row){
            $data = $row['nama_jenis_pembayaran'].",".$row['nominal'].",".$row['tahun_ajaran'].",".base_url('jp/edit/'. $row['id_jp']);
            $no++;
            ?>
            <tr>
              <td><?=$no?></td>
              <td><?=$row['nama_jenis_pembayaran']?></td>
              <td><?=$row['nominal']?></td>
              <td><?=$row['tahun_ajaran']?></td>
              <td>
                <a href="" data-jp="<?=$data?>" class="btn btn-warning" data-target="#modalJp" data-toggle="modal" ><i class="fas fa-edit"></i></a>
                <a href="<?=base_url('jp/delete/'.$row['id_jp'])?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
<div class="modal fade" tabindex="-1" id="modalJp" aria-labelledby="modalJpLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLabel">Input Jenis Pembayaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <form action="" id="fjp" method="post">
            <div class="card-body">
              <div class="form-group">
                <label for="nama_jenis_pembayaran" class="form-group">Jenis Pembayaran</label>
                <input type="text" name="nama_jenis_pembayaran" id="nama_jenis_pembayaran" class="form-control">
              </div>
              <div class="form-group">
                <label for="nominal" class="form-group">Nominal</label>
                <input type="text" name="nominal" id="nominal" class="form-control">
              </div>
              <div class="form-group">
                <label for="tahun_ajaran" class="form-group">Tahun Ajaran</label>
                <input type="text" name="tahun_ajaran" id="tahun_ajaran" class="form-control">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i></button>
                <button type="submit" class="btn btn-secondary" data-dismiss="modal"><i class="">X</i></button>
              </div>
          </form>
      </div>
    </div>
  </div>
</div>
<?php if (!empty(session()->getFlashdata('message'))) : ?>

<div class="alert alert-success">
    <?php echo session()->getFlashdata('message'); ?>
</div>

<?php endif ?>
<?=$this->endSection()?>
<?=$this->Section("script")?>
  <script>
    $(document).ready(function(){
      $("#modalJp").on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);
        var data = button.data('jp');
        
        if (data != ""){
          const barisdata = data.split(",");
          $('#nama_jenis_pembayaran').val(barisdata[0]);
          $('#nominal').val(barisdata[1]);
          $('#tahun_ajaran').val(barisdata[2]);
          $('#fjp').attr('action', barisdata[3]);
        } else {
          $('#nama_jenis_pembayaran').val('');
          $('#nominal').val('');
          $('#tahun_ajaran').val('');
          $('#fjp').attr('action', '/sjp');
        }
      });
    });
  </script>
<?=$this->endSection()?>

