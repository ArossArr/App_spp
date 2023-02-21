<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\JenisPembayaran;
class JpController extends Controller{
  protected $jpp;
  function __construct(){
    $this->jpp = new JenisPembayaran();
  }
  public function index(){
    $data['jp'] = $this->jpp->findAll();
    return view('jp_view',$data);
  }
  public function save(){
    $this->jpp->insert([
      'nama_jenis_pembayaran'=> $this->request->getPost('nama_jenis_pembayaran'),
      'nominal'=> $this->request->getPost('nominal'),
      'tahun_ajaran'=> $this->request->getPost('tahun_ajaran'),
    ]);
    return redirect('jp');
  }
  public function delete($id){
    $this->jpp->delete($id);
    session()->setFlashdata('message','Data Berhasil Dihapus');
    return redirect('jp');
  }
  public function edit($id){
    $data = array('nama_jenis_pembayaran'=>$this->request->getPost('nama_jenis_pembayaran'),
    'nominal'=>$this->request->getPost('nominal'),
    'tahun_ajaran'=>$this->request->getPost('tahun_ajaran'),
    );
    $this->jpp->update($id,$data);
    session()->setFlashdata('message','Data user berhasil di edit');
    return redirect('jp')->with('Sukses nihh!!!','update berhasil');
  }
}