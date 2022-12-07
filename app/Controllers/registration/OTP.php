<?php 
namespace App\Controllers\registration;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\RegisterUserModel;

class OTP extends BaseController
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
    
            return view('registration/otp-verify',$data);

        }else{
            return redirect()->route("Registration");
        }
        
    }
    public function resend()
    {
        $email1 = session()->get('mail');
        $f_name = session()->get('f_name');
        $gamer_id = session()->get('gamer_id');
        $six_digit_random_number = random_int(100000, 999999);
        $model1 = new RegisterUserModel();
        $model1->set('otp', $six_digit_random_number);
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
    public function check_otp(){
        $one = $this->request->getVar('one');
        $two = $this->request->getVar('two');
        $three = $this->request->getVar('three');
        $four = $this->request->getVar('four');
        $five = $this->request->getVar('five'); 
        $six = $this->request->getVar('six');

        $gamer_id = session()->get('gamer_id');
        $email1 = session()->get('mail');
        $f_name = session()->get('f_name');
        $otp = $one.$two.$three.$four.$five.$six;
        $model = new RegisterUserModel();
        $data = $model->where('gamer_id',$gamer_id)->first();
        $db_otp = $data['otp'];

        if($gamer_id != ''){

            if($otp == $db_otp){
                $pass = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8); 
                $setData = array(
                    'password'=> $pass,
                    'verify_email'=> 1, 
                    'valid_user'=> 1,
                    'email'=>$email1,
                    'gamer_id_used'=> 1,
                    'org_id'=>1
                );
                $model1 = new RegisterUserModel();
                $model1->set($setData);
                $model1->where('gamer_id',$gamer_id);
                $update = $model1->update();
                
                $email = \Config\Services::email();         
                $email->setFrom("healthcare@medusyspty.com", "Medusys"); 
    
                $email->setTo($email1);
                $email->setSubject('Medusys Registration – Login Credentials');
    
                $content = 'Hello Dr. '.$f_name.'<br/><br/>';
                $content = $content.' We would like to thank you for registering for Medusys <br/><br/>'; 
                $content = $content.'Your GAMER ID is : '.$gamer_id.'<br/>';
                $content = $content.'Your Login id is : '.$email1.'<br/>';
                $content = $content."Your password is : ".$pass.'<br/>';
                $content = $content.'Please login with the user name and password by clicking the link below.<br/><h4> https://medusys.in/login/ </h4><br/>';
                $content = $content.'Thank you again for your time and consideration. Looking forward to the great opportunities together. Should you have any questions, please write to us at contact@medusys.in'.'<br/><br/>';
                $content = $content.'Regards <br/>';
                $content = $content.'Medusys Team';
    
                $email->setMessage($content);
                if($email->send()){
                    return json_encode(array(
                        'result'    => 1,
                        'message'   => 'OTP Matched! UserName and Password is sent to your email....'
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