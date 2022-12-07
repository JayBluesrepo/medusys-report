<?php namespace App\Controllers\flowD;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\RegisterUserModel;



class MyAccount extends BaseController
{   
    use ResponseTrait;
	public function __construct()
	{
		helper(['form','url']);
	}

   
    public function index(){   
        // $id = session()->get('id');
        $dr_id = session()->get('dr_id');     
        
        $model = new RegisterUserModel();        
        $details = $model->where('id',$dr_id)->first();
        $data['myaccount'] = $details;        

        return view('flowD/my-account',$data);
    }

    public function myaccount(){

        $dr_id = session()->get('dr_id');   

        // print_r($dr_id);die();

        $model = new RegisterUserModel();   
        $model ->select('password');     
        $array_str = $model->where('id',$dr_id)->first();        
        $old_password = implode(" ", $array_str);        
        
        // print_r($old_password);die();

        $old_pwd = $this->request->getVar('old_password');
        $new_pwd = $this->request->getVar('new_password');
        $conf_pwd = $this->request->getVar('confirm_password');

        $old_pwd_length = strlen($old_pwd);
        $new_pwd_length = strlen($new_pwd);
        $conf_pwd_length = strlen($conf_pwd);


        // print_r($conf_pwd_length);die();

        $first_name = $this->request->getVar('f_name');
        $last_name = $this->request->getVar('l_name');
      
        $mobile = $this->request->getVar('phone');
        $email = $this->request->getVar('email');
        $hospital = $this->request->getVar('hospital');
        $city = $this->request->getVar('city');
        $country = $this->request->getVar('country');

        if($old_pwd_length == 0 && $new_pwd_length == 0 && $conf_pwd_length == 0){

            $update_account = array(
                'f_name'=>$first_name,
                'l_name'=>$last_name,
                'mobile'=>$mobile,
                'email'=>$email,
                'hospital'=>$hospital,
                'city'=>$city,
                'contry'=>$country
            );
        }else{

            if($old_pwd == $old_password){

                if($new_pwd == $conf_pwd){

                    $update_account = array(
                        'f_name'=>$first_name,
                        'l_name'=>$last_name,
                        'mobile'=>$mobile,
                        'email'=>$email,
                        'hospital'=>$hospital,
                        'city'=>$city,
                        'contry'=>$country,
                        'password'=>$new_pwd
                    );

                    $usrModel = new RegisterUserModel();
                    $usrModel->set($update_account);
                    $usrModel->where('password',$old_password);
                    $update = $usrModel->update();

                    if($update){
                        return json_encode(array(
                            'result'    => 1,
                            'message'   => 'Your Password Updated successfully..'
                        ));
                    }
                    else{
                        return json_encode(array(
                            'result'    => 0,
                            'message'   => 'Something went wrong...'
                        ));
                    }

                }else{
                    return json_encode(array(
                        'result'    => 0,
                        'message'     => 'new password and confirm password must be same'
                    ));
                }
                

            }else{

                return json_encode(array(
                    'result'    => 0,
                    'message'     => 'please enter correct old password'
                ));
            }
            
        }
        

        // print_r($update_account);die();

        $ac_update = new RegisterUserModel();  
        $ac_update->set($update_account);      
        $ac_update->where('id',$dr_id);        
        $update = $ac_update->update();
        if($update){
            return json_encode(array(
                'result'    => 1,
                'message'   => ' Updated Successfully.....'
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
?>

