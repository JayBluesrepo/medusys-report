<?php 
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Dashboard extends BaseController{

	public function __construct()
    {
        require_once APPPATH.'ThirdParty/ssp.class.php';
        $this->db = db_connect();
    }

    public function index(){

    	$org_id = session()->get('org_id');

        return view('admin/dashboard', $data);

    }
}
?>