<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth Implements FilterInterface{
  public function before(RequestInterface $request, $argument = null){
    if (!session()->get('logged_in')){
      return redirect()->to('/');
    }
  }
  public function after(RequestInterface $request, ResponseInterface $response, $argument = null){

  }
}
?>