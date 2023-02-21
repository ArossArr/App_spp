<?php 
namespace App\Controllers;
use App\Models\Petugas;
use CodeIgniter\Controller;


class LoginController extends BaseController{
  protected $petugass;
    public function index(){
      return view('login_view');
    }
    public function login(){
      $petugass = new Petugas();
      $username = $this->request->getPost('username');
      $password = $this->request->getPost('password');

      $dataPetugas = $petugass->where(['username'=>$username])->first();
      d ($dataPetugas);
      if($dataPetugas){
        if(password_verify($password,$dataPetugas['password'])){
          session()->set([
            'username'=> $dataPetugas['username'],
            'nama_petugas'=> $dataPetugas['nama_petugas'],
            'hak_akses'=> $dataPetugas['hak_akses'],
            'id_petugas'=> $dataPetugas['id_petugas'],
            'logged_in' => true,
          ]);
          return redirect('home');
        } else {
          session()->setFlashdata('error','username password salah');
        return $this->response->redirect('/');
        }
      } else {
        session()->setFlashdata('error','username tidak ditemukan');
        return $this->response->redirect('/');
      }
    }
    function logout(){
      session()->destroy();
      return $this->response->redirect('/');
    }

}