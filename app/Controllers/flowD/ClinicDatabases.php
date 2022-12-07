<?php namespace App\Controllers\flowD;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;


class ClinicDatabases extends BaseController
{   
    use ResponseTrait;
	public function __construct()
	{
		helper(['form','url']);
	}

   
    public function index()
    {
        // $gamer_id = session()->get('gamer_id');
        // $email1 = session()->get('mail');
        // $model = new RegisterUserModel();
        // $details = $model->where('gamer_id',$gamer_id)->first();
        // $otp = $details['otp'];
        // if($otp){
        //     $data['usercheck'] = $details;
        // }

        return view('flowD/clinic-databases');
    }
  

    
}
?>

