<?php namespace App\Controllers\flowD;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class e_consent extends BaseController
{   
    use ResponseTrait;
	public function __construct()
	{
		helper(['form','url']);
	}
   
    public function index()
    {
        return view('flowD/comes-soon');
    } 
}
?>