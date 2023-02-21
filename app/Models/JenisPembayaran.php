<?php 
namespace App\Models;

use CodeIgniter\Model;

class JenisPembayaran extends Model{
    protected $table      = 'jenis_pembayaran';
    protected $primaryKey = 'id_jp';    
    protected $allowedFields = ['nama_jenis_pembayaran','nominal','tahun_ajaran'];

    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
}