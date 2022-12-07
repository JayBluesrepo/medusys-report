<?php 
namespace App\Controllers\registration;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\RegisterUserModel;

class Forgot_OTP extends BaseController
{
    public function index()
    {
        return view('registration/forgot-otp');
    }

    public function forgot_password(){

        $e_mail = $this->request->getVar('email'); 

        $model = new RegisterUserModel();
        $data = $model->where('email',$e_mail)->first();      
        $f_name = $data['f_name'];
       
        if($data['valid_user'] == 1){
            $six_digit_random_number = random_int(100000, 999999);

            $userData = array(           
                'password_otp'=> $six_digit_random_number
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
                $sessionData = array(                
                    'mail' => $e_mail,
                    'f_name'=>$f_name           
                );
                session()->set($sessionData); 
                $Model = new RegisterUserModel();
                $Model->set($userData);
                $Model->where('email',$e_mail);
                // $Model->where('valid_user',0);
                $update = $Model->update();
                // if($update){
                    return json_encode(array(
                        'result'    => 1,
                        'message'   => 'OTP is sent your email... Please Verify Email-id'
                    ));
                // }
            }
            else{
                return json_encode(array(
                    'result'    => 0,
                    'message'   => 'Register to login'
                ));
            }
        }
        else{
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Register to login'
            ));
        }
    }

    public function forgot_check_otp(){
        $one = $this->request->getVar('one');
        $two = $this->request->getVar('two');
        $three = $this->request->getVar('three');
        $four = $this->request->getVar('four');
        $five = $this->request->getVar('five'); 
        $six = $this->request->getVar('six');

        $email1 = session()->get('mail');
        $pass = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
        // $f_name = session()->get('f_name');
        // $new_user_id = session()->get('new_user_id');
        $otp = $one.$two.$three.$four.$five.$six;
        $model = new RegisterUserModel();
        $data = $model->where('email',$email1)->first();
        $db_otp = $data['password_otp'];
        $f_name = $data['f_name'];
        // print_r($f_name);die();
        
        if($otp == $db_otp){ 
            $setData = array(
                'password'=> $pass
            );
            $model1 = new RegisterUserModel();
            $model1->set($setData);
            $model1->where('email',$email1);
            $update = $model1->update();

            $email = \Config\Services::email();
            $email->setFrom("healthcare@medusyspty.com", "Medusys");            
            $email->setTo($email1);

            $email->setSubject('Medusys Verification code');
            $content = "Hello Dr. ".$f_name."<br/><br/>";
            $content = $content."We received a request to access your Medusys Account. "."<br/><br/>";
            $content = $content."".$email1." through your email address. Your Medusys New Password is: "."<br/><br/>";
            $content = $content." <h3>".$pass."</h3> "."<br/><br/>";
            $content = $content."Should you have any questions, please write to us at contact@medusys.in"."<br/><br/>";
            $content = $content."Regards"."<br/>";
            $content = $content."Medusys Team"."<br/>";

            $email->setMessage($content);
            
            
            if($update && $email->send()){
                return json_encode(array(
                    'result'    => 1,
                    'message'   => 'OTP Matched and check Email'
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
    }

    public function otp_again(){
        $email1 = session()->get('mail');
        $f_name = session()->get('f_name');
        $gamer_id = session()->get('gamer_id');
        $six_digit_random_number = random_int(100000, 999999);
        $model1 = new RegisterUserModel();
        $model1->set('password_otp', $six_digit_random_number);
        $model1->where('gamer_id',$gamer_id);
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

}
?>
