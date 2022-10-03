<?php 
namespace App\Controllers;


use App\Models\Petugas;
class PetugasController extends BaseController{
  protected $petugass;
  function __construct(){
    $this->petugass = new Petugas();
  }
  public function index(){
    $data['petugas'] = $this->petugass->findAll();
    return view('petugas_view',$data);
  }
  public function form(){
    return view('fpetugas');
  }
  public function save()
  {
      $this->petugass->insert([
          'nama_petugas'=>$this->request->getPost('nama_petugas'),
          'username'=>$this->request->getPost('username'),
          'password'=>password_hash($this->request->getPost('password'),PASSWORD_DEFAULT),
          'no_hp'=>$this->request->getPost('no_hp'),
          'jabatan'=>$this->request->getPost('jabatan'),
          'hak_akses'=>$this->request->getPost('hak_akses'),
      ]);

      return redirect('petugas');
  
  }
  public function edit($id)
    {
        $data = array('nama_petugas'=>$this->request->getPost('nama_petugas'),
        'username'=>$this->request->getPost('username'),
        'no_hp'=>$this->request->getPost('no_hp'),
        'jabatan'=>$this->request->getPost('jabatan'),
        'hak_akses'=>$this->request->getPost('hak_akses')
        );
        $this->petugass->update($id, $data);
        session()->setFlashdata('message','Data user berhasil di edit');
        return redirect('petugas')->with('Sukses nihh!!!','update berhasil');
    
    }
  public function delete($id)
  {
    $this->petugass->delete($id);
    session()->setFlashdata('massage','Data PEtugas Berhasil');
    return redirect('petugas');
  }
}