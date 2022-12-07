<?php 
namespace App\Controllers\registration;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\RegisterUserModel;

class Registration extends BaseController
{
    public function index()
    {      
        return view('registration/register-form');
    }
    public function check_mail(){
        $email = $this->request->getVar('email');       
        $check_mail = new RegisterUserModel();
        $data = $check_mail->where('email',$email)->first();
        
        if($data){
            return json_encode(array(
                'result'    => 0,
                'message'   => 'E-mail Id already exist...'                
            ));
        }
        else{
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Found new mail ID. please continue'                
            ));
        }
    }
    public function add_user(){
        $f_name = $this->request->getVar('f_name');
        $l_name = $this->request->getVar('l_name');
        $mobile = $this->request->getVar('mobile');
        $e_mail = $this->request->getVar('email'); 
        $hospital = $this->request->getVar('hospital');
        $city = $this->request->getVar('city');
        $country = $this->request->getVar('country');
        $six_digit_random_number = random_int(100000, 999999);

        $userData = array(
            'f_name'=> $f_name,
            'l_name'=> $l_name, 
            'mobile'=>$mobile,
            'hospital'=> $hospital,
            'city'=> $city,
            'contry'=> $country,
            'otp'=> $six_digit_random_number
        );

        $email = \Config\Services::email();
        $email->setFrom("healthcare@medusyspty.com", "Medusys");        
        $email->setTo($e_mail);
        $email->setSubject('Medusys Registration – OTP for Email Verification');

        $content = "Hello Dr. ".$f_name."<br/><br/>";
		$content = $content."Your OTP for Medusys registration is ".$six_digit_random_number.". Please enter the OTP to verify your email ID "."<br/><br/>";
		$content = $content."Should you have any questions, please write to us at contact@medusys.in"."<br/><br/>";
		$content = $content."Regards"."<br/>";
		$content = $content."Medusys Team"."<br/>";

        $email->setMessage($content);
        if($email->send()){
            $Model = new RegisterUserModel();
            $Model->insert($userData);
            $insertID = $Model->insertID();
            if($insertID){
                $sessionData = array(   
                    'f_name'=>$f_name,
                     'mail' => $e_mail,
                     'new_user_id' =>  $insertID         
                );
                session()->set($sessionData); 
                return json_encode(array(
                    'result'    => 1,
                    'message'   => 'OTP is sent your email... Please Verify Email-id'  
                ));
            }
        }else{
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Please enter proper e-mail ID'
            ));
        }
    }
}
?>