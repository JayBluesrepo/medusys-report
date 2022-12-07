<?php 
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\AdminModel;
use App\Models\RegisterUserModel;

class AddUser extends BaseController
{
    public function index(){
        $org_id = session()->get('org_id');
        if($org_id ){
            $adduser=['a,b,c'];
            $data['add_user'] = $adduser;
            
            return view('admin/add-user', $data);
        }else{
            return view('admin/super-admin-login');
        }
        
    }

    public function add_user_manually(){

        $role_id = session()->get('role_id');
        if($role_id == '1'){

            $f_name = $this->request->getVar('f_name');
            $l_name = $this->request->getVar('l_name');
            $mobile = $this->request->getVar('mobile');
            $e_mail = $this->request->getVar('email'); 
            $hospital = $this->request->getVar('hospital');
            $city = $this->request->getVar('city');
            $country = $this->request->getVar('country');
            $six_digit_random_number = random_int(100000, 999999);

            $pay_id = '-9999';
            $amount = '-9999';
            $transaction_id = '-9999';

            $pass = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
            date_default_timezone_set('Asia/Kolkata');
            $payment_date_added = date('d-m-Y H:i:s', time());
            // $gamer_id = "GAMER".random_int(1000, 9999);
           
            $model_gi = new RegisterUserModel();
            $model_gi->select('gamer_id');
            $model_gi->like('gamer_id', 'GAMER');
            $g_data = $model_gi->get()->getResultArray();
            $last = end($g_data);
           
            // print_r($pay_id);die();
            foreach ($last as $val) {
                
                $gamer_id1 = substr($val,5)+1;
                $gamer_id = 'GAMER'.$gamer_id1;
            }



            $userData = array(
                'f_name'=> $f_name,
                'l_name'=> $l_name, 
                'mobile'=>$mobile,
                'hospital'=> $hospital,
                'city'=> $city,
                'contry'=> $country,
                'otp'=> $six_digit_random_number,
                'org_id'=>1,
                'payment_id'=> $pay_id,
                'payment_amount'=> $amount, 
                'payment_status'=> 1,
                'email' => $e_mail,
                'password'=> $pass,
                'valid_user'=> 1,
                'payment_date_added' => $payment_date_added,
                'transaction_id' => $transaction_id,
                'gamer_id' => $gamer_id,
                'gamer_id_used' => 1
            );
            // print_r($_POST);
            // print_r($userData);
            // die();

            $email = \Config\Services::email();       
            $email->setFrom("healthcare@medusyspty.com", "Medusys"); 

            $email->setTo($e_mail);
            $email->setSubject('Medusys Registration – Login Credentials');

            $content = 'Hello Dr. '.$f_name.'<br/><br/>';
            $content = $content.' We would like to thank you for registering for Medusys <br/><br/>'; 
            $content = $content.'Your GAMER ID is : '.$gamer_id.'<br/>';
            $content = $content.'Your Login id is : '.$e_mail.'<br/>';
            $content = $content."Your password is : ".$pass.'<br/>';
            $content = $content.'Please login with the user name and password by clicking the link below.<br/><h4> https://medusys.in/login/ </h4><br/>';
            $content = $content.'Thank you again for your time and consideration. Looking forward to the great opportunities together. Should you have any questions, please write to us at contact@medusys.in'.'<br/><br/>';
            $content = $content.'Regards <br/>';
            $content = $content.'Medusys Team';
            $email->setMessage($content);
            if($email->send()){
               $Model = new RegisterUserModel();
               $Model->insert($userData);
               $insertID = $Model->insertID();
               if($insertID){
                    return json_encode(array(
                        'result'    => 1,
                        'message'   => 'User etails has been sent to registration email..'  
                    ));
                }
            }
            else{
                return json_encode(array(
                    'result'    => 0,
                    'message'   => 'Please enter proper e-mail ID'
                ));
            }
        }
        else{
            return json_encode(array(
                    'result'    => 0,
                    'message'   => 'You Dont have access to add users..'
                ));
        }
    }

    public function create_user(){
        
        if($this->request->getMethod() == 'post'){
            $organisation = $this->request->getVar('organisation');
            $role = $this->request->getVar('role');
            $userid = $this->request->getVar('userid');
            $password = $this->request->getVar('password');

            $userData = array(
                'user_id'=> $userid,
                'password'=> $password, 
                'organization'=>$organisation,
                'role'=> $role
            );
            
            $model = new AdminModel(); 
            $model->save($userData);
            $insertedID = $model->insertID();

            if($insertedID){
                return json_encode(array(
                     'result'    => 1,
                     'message'   => 'User Created Successfully.....'
                    //  'msg' => $userData
                ));
           }
           else{
                return json_encode(array(
                     'result'    => 0,
                     'message'     => 'Something went wrong.....'
                ));
            }
        }
    }
}
?>