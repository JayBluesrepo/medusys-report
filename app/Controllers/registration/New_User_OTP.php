<?php 
namespace App\Controllers\registration;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\RegisterUserModel;

class New_User_OTP extends BaseController
{
    public function index()
    {
        $new_user_id = session()->get('new_user_id');

        if($new_user_id != ''){

            $model = new RegisterUserModel();
            $details = $model->where('id',$new_user_id)->first();
            $data['usercheck'] = $details;
    
            return view('registration/otp-verification',$data);

        }else{
            return redirect()->route("Registration");
        }
        
    }
    public function resend()
    {
        $email1 = session()->get('mail');
        $f_name = session()->get('f_name');
        $new_user_id = session()->get('new_user_id');
        $six_digit_random_number = random_int(100000, 999999);
        $model1 = new RegisterUserModel();
        $model1->set('otp', $six_digit_random_number);
        $model1->where('id',$new_user_id);
        $update = $model1->update(); 
        if($update){
            $email = \Config\Services::email();           
            
            $email->setFrom("healthcare@medusyspty.com", "Medusys"); 
            $email->setTo($email1);

            $email->setSubject('Medusys Registration – OTP for Email Verification resent');
            $content = "Hello Dr. ".$f_name."<br/><br/>";
            $content = $content."Your OTP for Medusys registration is ".$six_digit_random_number.". Please enter the OTP to verify your email ID "."<br/><br/>";
            $content = $content."Should you have any questions, please write to us at contact@medusys.in"."<br/><br/>";
            $content = $content."Regards"."<br/>";
            $content = $content."Medusys Team"."<br/>";

            $email->setMessage($content);
            if($email->send()){
                return json_encode(array(
                    'result'    => 1
                ));
            }else{
                return json_encode(array(
                    'result'    => 0,
                    'message'   => 'Something went wrong.....'
                ));
            }
        }
    }
    public function check_otp(){
        $one = $this->request->getVar('one');
        $two = $this->request->getVar('two');
        $three = $this->request->getVar('three');
        $four = $this->request->getVar('four');
        $five = $this->request->getVar('five'); 
        $six = $this->request->getVar('six');

        $email1 = session()->get('mail');
        $f_name = session()->get('f_name');
        $new_user_id = session()->get('new_user_id');
        $otp = $one.$two.$three.$four.$five.$six;
        $model = new RegisterUserModel();
        $data = $model->where('id',$new_user_id)->first();
        $db_otp = $data['otp'];

        if($email1 != ''){

            if($otp == $db_otp){ 
                $setData = array(
                    'verify_email'=> 1 
                );
                $model1 = new RegisterUserModel();
                $model1->set($setData);
                $model1->where('id',$new_user_id);
                $update = $model1->update();
                
                if($update){
                    return json_encode(array(
                        'result'    => 1,
                        'message'   => 'OTP Matched!'
                    ));
                }else{
                    return json_encode(array(
                        'result'    => 0,
                        'message'   => 'Something went wrong.....'
                    ));
                }
            }
            else{
                echo json_encode(array('result'=>0,'message'=>'Wrong OTP'));
            }

        }else{
            return redirect()->route("Registration");
        }
        
        
    }
}
?>