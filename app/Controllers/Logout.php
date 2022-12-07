<?php 
namespace App\Controllers;
// use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
// use CodeIgniter\Controller;
// use CodeIgniter\HTTP\CLIRequest;
// use CodeIgniter\HTTP\IncomingRequest;
// use CodeIgniter\HTTP\RequestInterface;
// use CodeIgniter\HTTP\ResponseInterface;
// use Psr\Log\LoggerInterface;

class Logout extends ResourceController
{
    use ResponseTrait;
    public function __construct()
    {
        helper(['form']);
    }
    public function logout() 
    {
        // $session=session();
        // $array_items = ['dr_id','name','gamer_id','email'];
        // $session->remove($array_items);
        // $session->destroy();
         
        // $dr_id = session()->get('dr_id');
        // session_destroy($dr_id);
        // $this->session->sess_destroy();

        // session()->remove($dr_id);

	    $session = \Config\Services::session();           
        $session->destroy();

        return redirect()->to(base_url("login"));
    }
}


?>