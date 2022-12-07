<?php 
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\RegisterUserModel;
use App\Models\OrganisationModel;


class UserManagement extends BaseController
{
    // public function __construct()
	// {
	// 	require_once APPPATH.'ThirdParty/ssp.class.php';
    //     $this->db = db_connect();
	// }

    use ResponseTrait;
	public function __construct()
	{
		helper(['form']);
        // helper(['url']);
	}

    public function index(){

        $org_id = session()->get('org_id');
        $role_id = session()->get('role_id');

        if($org_id){
            $edituser=['z,x,y'];
            $data['user_management'] = $edituser;          
    
            if($org_id == 1 ){ //super admin
                $model = new OrganisationModel();
                // $model->where('id',$temple_id);
                $details  = $model->get()->getResultArray();
                $data['org'] = $details;
            }
            else{
                $model = new OrganisationModel();
                // $model->where('id',$org_id);
                $details  = $model->get()->getResultArray();
                $data['org'] = $details;
            }  
    
            // $model = new AdminModel();
            // $user_details  = $model->get()->getResultArray();
            // $data['details'] = $user_details;
    
            return view('admin/user-management', $data);
        }else{
            return view('admin/super-admin-login');
        }
      
    }
     
    public function show_all_user_data(){

        $org_id = session()->get('org_id');

        $model = new RegisterUserModel();
        $model->where('org_id',$org_id);
        $model->where('valid_user',1);

        $model->orderBy('f_name','ASC');

        $data  = $model->get()->getResultArray();

        // print_r($data);die();
       
        return $this->respondCreated($data);
    
    }

    public function show_row_details(){
        $id = $_GET['id']; 
        $org_id = session()->get('org_id');

        $search = new RegisterUserModel();
        $search->where('id',$id)->where('org_id',$org_id);
        $data1 = $search->get()->getResultArray();
        // print_r($data1);die();

        return $this->respondCreated($data1);

    }

    public function change_action(){
        $org_id = session()->get('org_id');

        $id  = $this->request->getVar('id');
        // print_r($id);die();
        $model = new RegisterUserModel();
        $model->where('org_id',$org_id);
        $data = $model->where('id',$id)->first();            
      
        // print_r($data);die();
        if($data){
            return json_encode(array(
                'result'    => 1,
                'message'   => $data
            ));
        }
        else{
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Something went wrong...'
            ));
        }

    }

    public function edit_change_action(){

        $org_id = session()->get('org_id');
        $section_name  = $this->request->getVar('section_name');
        $id  = $this->request->getVar('id');        
        
        $newData = array(
            'role_id'=>$section_name          
        );

        $model = new RegisterUserModel();
        $model->set($newData);
        // $model->where('role_id',$section_name);
        $model->where('id',$id);
        $updatez = $model->update();

        // print_r($update);die();

        if($updatez){
            return json_encode(array(
                 'result'    => 1,
                 'message'   => 'Updated successfully....'
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