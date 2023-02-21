<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use App\Models\JenisPembayaran;
use App\Models\Siswa;
class TransaksiController extends BaseController{

  protected $transaksi,$JenisPembayaran,$siswa,$detailtransaksi,$db,$session;

  function __construct(){
    $this->transaksi = new Transaksi();
    $this->detailtransaksi = new DetailTransaksi();
    $this->siswa = new Siswa();
    $this->session = session();
    $this->transaksi = new Transaksi();
    $this->db = \Config\Database::connect();
  }
  public function index(){
    return view('transaksi_view');
  }
  public function cari(){
    $bulan = array();
    $trans = array();
      if($this->request->getVar('no_rek')!=null)
      {
        $no_rek = $this->request->getVar('no_rek');
        $data_siswa = $this->siswa->where('no_rek',$no_rek)->first();
        $sel = $this->db->table('tbsiswa a, jenis_pembayaran b');
        if($data_siswa!=null)
        {
          $where = "a.tahun_masuk = b.tahun_ajaran and a.id_siswa =".$data_siswa['id_siswa'];
          $sel->where($where);
          $query = $sel->get();
          foreach ($query->getResult() as $row){
            $seltrans = $this->db->table('tbtransaksi a, detail_transaksi b');
           $wheretrans = "a.id_transaksi = b.id_transaksi and a.id_siswa =".$data_siswa['id_siswa']." and b.id_jp=".$row->id_jp;

            $seltrans->where($wheretrans);
            $hasil = $seltrans->countAllResults();
            if ($hasil > 0) {
                $seltrans = $this->db->table('tbtransaksi a, detail_transaksi b');
                $wheretrans = "a.id_transaksi = b.id_transaksi and a.id_siswa =".$data_siswa['id_siswa']." and b.id_jp=".$row->id_jp;
                $seltrans->where($wheretrans);
                $htrans = $seltrans->get();
                foreach($htrans->getResult() as $row1){
                  if ($row->id_jp == $row->id_jp) {
                    $trans[$row->nama_jenis_pembayaran] = $row1->id_transaksi;
                  }
                }
                $bulan[$row->nama_jenis_pembayaran] = 0;
            } else {
              $bulan[$row->nama_jenis_pembayaran] = $row->id_jp;
            }
          }
        }
    $data['trans'] = $trans;
    $data['spp'] = $bulan;
    $data['siswa'] = $data_siswa;
    return view('cari_view',$data);
  } else {
    return view('transaksi_view');
  }
}
 public function bayar($bulan,$id,$id_jp)
 {
  $tanggal = Date("Y-m-d");
  //dd($tanggal);
  $idtrans = $this->transaksi->insert([
    "id_siswa"=>$id,
    "id_petugas" => $this->session->get("id_petugas"),
    "tanggal_bayar"=>$tanggal,
  ]);
  //dd($idtrans);
  $siswaa = $this->siswa->find($id);
  $this->detailtransaksi->insert([
    "id_transaksi"=>$idtrans,
    "bulan_bayar"=>$bulan,
    "id_jp"=>$id_jp,
  ]);
  return redirect()->to("/caritagihan?no_rek=".$siswaa['no_rek']);
 }
 public function bill($id){
  $seltrans = $this->db->table('tbtransaksi a, detail_transaksi b, tbsiswa c, tbpetugas d, jenis_pembayaran e');
  $wheretrans = "a.id_transaksi = b.id_transaksi and a.id_siswa = c.id_siswa and d.id_petugas = a.id_petugas and b.id_jp = e.id_jp and a.id_transaksi='$id'";
  $seltrans->where($wheretrans);
  $q = $seltrans->get();
  foreach ($q->getResult()as $row){
    $kelas = $row->kelas;
    $nama_siswa = $row->nama_petugas;
    $petugas = $row->nama_petugas;
    $jp = $row->nama_jenis_pembayaran;
    $nominal = $row->nominal;

  }
  $data['kelas']=$kelas;
  $data['nama_siswa']=$nama_siswa;
  $data['petugas']=$petugas;
  $data['jp']=$jp;
  $data['nominal']=$nominal;
    return view('bil',$data);
 }
}