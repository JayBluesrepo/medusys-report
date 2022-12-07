<?php namespace App\Controllers;
// use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
// use App\Models\UsersModel;
use App\Models\RegisterUserModel;
use App\Models\AdminModel;

class Login extends ResourceController
{
    // protected $session;
    use ResponseTrait;
	public function __construct()
	{
		helper(['form']);

        // $this->session = \Config\Services::session();
        // $this->session->start();
	}

    public function index(){
        $data = array();
        if($this->request->getMethod() == 'post'){            

           $username = $this->request->getVar('username');
           $password = $this->request->getVar('password');


           $model = new RegisterUserModel();
            $where = [
               'email' => $username,
               'password'  => $password
           ];
           $uname = $model->where('email', $username)->first();
           $pwd = $model->where('password', $password)->first();
           $model->where('valid_user',1);
           $data = $model->where($where)->first();

          


            if($data){

                $log_status = new RegisterUserModel();
                $login_st = $log_status->where('email', $username)->first();  
                $login_count = $login_st['login_count'];
                $last_login = $login_st['present_login'];

                date_default_timezone_set('Asia/Kolkata');   
                $present_login = date('d-m-Y H:i:s', time());
    
                $add = $login_count+1; 
    
                $count_login = array(
                    'login_count'=>$add,
                    'present_login'=>$present_login,
                    'last_login'=>$last_login
                );

                $log_status->set($count_login);      
                $log_status->where('email',$username);        
                $update = $log_status->update();


                $sessionData = array(
                    
                    'name'=>$data['f_name'],
                    'dr_id'=>$data['id'],
                    'gamer_id'=>$data['gamer_id'],
                    'email'=>$data['email'],
                    'org_id'=>$data['org_id']                
                );
               
                session()->set($sessionData);                

                echo json_encode(array(
                   'result'    => 1,
                   'login_count'    => $login_count
                ));
            }
            else{  

                if(!($uname) && !($pwd)){
                   echo json_encode(array(
                       'result'    => 0,
                       'message'	  => 'Invalid username & Password'
                   ));
                }
                elseif(!($uname)){
                    echo json_encode(array(
                        'result'    => 2,
                        'message'	  => 'Invalid username'
                    ));
                }
                elseif(!($pwd)){
                    echo json_encode(array(
                        'result'    => 3,
                        'message'	  => 'Invalid Password'
                    ));
                }
                else{
                    echo json_encode(array(
                        'result'    => 4,
                        'message'	  => 'Please enter correctly'                        
                    ));
                }
            }
        }
    }

    public function check_email(){

        $email = $this->request->getVar('email');

        $check = new RegisterUserModel();
        $data = $check->where('email',$email)->first();

        // print_r($data);die();

        if($data){
            return json_encode(array(
                'result'    => 1
                // 'message'     => 'E-mail is not register'                
            ));
        }
        else{
            return json_encode(array(
                'result'    => 0,
                'msg' => 'Register to login'                
            ));
        }

    }
}   