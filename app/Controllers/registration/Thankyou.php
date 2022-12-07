<?php 
namespace App\Controllers\registration;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\RegisterUserModel;

class Thankyou extends BaseController
{
    public function index()
    {
        $gamer_id = session()->get('gamer_id');
        $email1 = session()->get('mail');
        if($email1 != ''){

            $model = new RegisterUserModel();
            $details = $model->where('gamer_id',$gamer_id)->first();
            $otp = $details['otp'];
            if($otp){
                $data['usercheck'] = $details;
            }
    
            $model->where('email',$email1);
            $details1 = $model->where('valid_user',1)->first();
            $data['otpmatched'] = $details1;
    
            return view('registration/thank-you',$data);

        }else{
            return redirect()->route("Registration");
        }
        
    }
}
?>