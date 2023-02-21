<?php 
namespace App\Controllers;


use App\Models\Siswa;
class SiswaController extends BaseController{
  protected $siswaa;
  function __construct(){
    $this->siswaa = new Siswa();
  }
  public function index(){
    $data['siswa'] = $this->siswaa->findAll();
    return view('siswa_view',$data);
  }
  public function save(){
    $this->siswaa->insert([
      'nama_siswa'=>$this->request->getPost('nama_siswa'),
      'nis'=>$this->request->getPost('nis'),
      'kelas'=>$this->request->getPost('kelas'),
      'tahun_masuk'=>$this->request->getPost('tahun_masuk'),
      'no_rek'=>$this->request->getPost('no_rek'),
      'jk'=>$this->request->getPost('jk'),
    ]);
    return redirect('siswa');
  }
  public function delete($id)
  {
    $this->siswaa->delete($id);
    session()->setFlashdata('massage','Berhasil Dihapus');
    return redirect('siswa');
  }
  public function edit($id){
    $data = array ('nama_siswa'=>$this->request->getPost('nama_siswa'),
    'nis'=>$this->request->getPost('nis'),
    'kelas'=>$this->request->getPost('kelas'),
    'tahun_masuk'=>$this->request->getPost('tahun_masuk'),
    'no_rek'=>$this->request->getPost('no_rek'),
    'jk'=>$this->request->getPost('jk'),
    );
    $this->siswaa->update($id,$data);
    session()->setFlashdata('message','Data user berhasil di edit');
    return redirect('siswa')->with('Sukses nihh!!!','update berhasil');
  }
}