<?php 
namespace App\Models;

use CodeIgniter\Model;

class Transaksi extends Model{
    protected $table      = 'tbtransaksi';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['id_siswa','id_petugas','tanggal_bayar'];
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
}