<?php 
namespace App\Models;

use CodeIgniter\Model;

class DetailTransaksi extends Model{
    protected $table                = 'detail_transaksi';
    protected $primaryKey           = 'id_detail_transaksi';
    protected $allowedFields        = ['id_transaksi','id_jp','bulan_dibayar'];
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
}