<?php 
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\CategoriesModel;
use App\Models\FileUploadModel;
use App\Models\RegisterUserModel;
use App\Models\OrganisationModel;


class SuperAdminLogin extends BaseController{
      
    
    public function index(){          
       
        $data = array();
        if($this->request->getMethod() == 'post'){           

            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
           
            $where = [
               'email' => $username,
               'password'  => $password
            ];

            $model = new RegisterUserModel();
            $uname = $model->where('email', $username)->first();
            $pwd = $model->where('password', $password)->first();
            $data = $model->where($where)->first();

            // print_r($data);die();            

            if($data){

                $log_status = new RegisterUserModel();
                $login_st = $log_status->where('email', $username)->first();              
		            if($data['role_id'] != 0){
                	$sessionData = array(
                        'name'=>$data['f_name'],
                        'dr_id'=>$data['id'],
                        'gamer_id'=>$data['gamer_id'],
                        'email'=>$data['email'],
                    	'role_id'=>$data['role_id'],
			            'org_id'=>$data['org_id'], 
				                     
                	);
                	session()->set($sessionData);
            
                	echo json_encode(array('result' => 1));               
                
            	}else{
		            echo json_encode(array(
                        'result'    => 0,
                        'message'	  => 'Access Denied....'
                    ));
		        }
	        }
            else
            {                  
                if(!($uname) && !($pwd)){
                    echo json_encode(array(
                        'result'    => 0,
                        'message'	  => 'Invalid username & Password'
                    ));
                }
                else if(!($uname)){
                    echo json_encode(array(
                        'result'    => 2,
                        'message'	  => 'Invalid username'
                    ));
                }
                else if(!($pwd)){
                    echo json_encode(array(
                        'result'    => 3,
                        'message'	  => 'Invalid Password'
                    ));
                }
		else if(!($pwd)){
                    echo json_encode(array(
                        'result'    => 3,
                        'message'	  => 'Invalid Password'
                    ));
                }else{
                    echo json_encode(array(
                        'result'    => 4,
                        'message'	  => 'Please enter correctly'                        
                    ));
                }
            }
        }
    }
    

    public function change_org(){

        // $org = $this->request->getVar('org');
        // print_r($org);die();

        $org_id = $this->request->getVar('org');    
        $entry_id = $this->request->getVar('entry_id');         

        // print_r($entry_id);die();

        $model  = new RegisterUserModel();
        $details = $model->where('id',$entry_id)->first();
         
                

        // print_r($role_id);die();
        $sessionData = array(
            'name'=>$details['f_name'],
            'dr_id'=>$details['id'],
            'gamer_id'=>$details['gamer_id'],
            'email'=>$details['email'],
            'org_id'=>$org_id
            // 'role_id'=>$details['role_id']  
        );
        session()->set($sessionData);
    
        echo json_encode(array(
            'result'    => 1,
            'message'   => 'valid',
            'role_id'   => $details['role_id']          
        ));
    }
}
?>
