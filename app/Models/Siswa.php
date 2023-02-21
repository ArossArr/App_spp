<?php 
namespace App\Models;

use CodeIgniter\Model;

class Siswa extends Model{
    protected $table      = 'tbsiswa';
    protected $primaryKey = 'id_siswa';
    protected $allowedFields = ['nama_siswa','nis','kelas','tahun_masuk','no_rek','jk'];
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
}