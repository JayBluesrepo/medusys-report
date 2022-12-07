<?php 
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\AdminModel;

class EditUser extends BaseController
{
    public function __construct()
	{
		require_once APPPATH.'ThirdParty/ssp.class.php';
        $this->db = db_connect();
	}

    public function index(){
        $org_id = session()->get('org_id');
        
        if($org_id){
            $edituser=['a,b,c'];
            $data['add_user'] = $edituser;

            // $model = new AdminModel();
            // $user_details  = $model->get()->getResultArray();
            // $data['details'] = $user_details;

            return view('admin/edit-user', $data);
        }else{
            return view('admin/super-admin-login');
        }
        
    }
    public function remove_user(){
        $id  = $this->request->getVar('id');
   
        $delete = new AdminModel();        
        $delete->where('id',$id);
        $deleteID = $delete->delete();
        
        if($deleteID){
            return json_encode(array(
                'result'    => 1,
                'message'   => 'User Deleted Successfully'
            ));
        }
        else{
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Error'
            ));
        }
    }
    public function edit_user(){
        $user_id = $this->request->getVar('id');
        $model  = new AdminModel();
        $data = $model->where('id',$user_id)->first();

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
    public function update_user(){
        
        if($this->request->getMethod() == 'post'){
            $id = $this->request->getVar('uid');
            $organisation = $this->request->getVar('organisation');
            $role = $this->request->getVar('role');
            $userid = $this->request->getVar('userid');
            $password = $this->request->getVar('password');

            $newData = array(
                'user_id'=> $userid,
                'password'=> $password, 
                'organization'=>$organisation,
                'role'=> $role
            );
            
            $model = new AdminModel(); 
            $model->set($newData);
            $model->where('id',$id);
            $update = $model->update();

            if($update){
                return json_encode(array(
                     'result'    => 1,
                     'message'   => 'User Details were Updated successfully....'
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
    public function get_all_users(){

        $dbDetails = array(
            "host"=>$this->db->hostname,
            "user"=>$this->db->username,
            "pass"=>$this->db->password,
            "db"=>$this->db->database,
            "port"=>$this->db->port
        );
        // print_r($dbDetails); die();
        $table = "admin_login";
        $primaryKey = "id";

        $columns = array(
            array(
                "db"=>"id",
                "dt"=>0,
            ),
            array(
                "db"=>"organization",
                "dt"=>1,
            ),
            array(
                "db"=>"role",
                "dt"=>2,
            ),
            array(
                "db"=>"user_id",
                "dt"=>3,
            ),
            array(
                "db"=>"password",
                "dt"=>4,
            ),
            array(
                "db"=>"id",
                "dt"=>5,
                "formatter"=>function($d, $row){
                    return "<div class='btn-group'>
                                  <button class='btn btn-sm btn-primary' data-id='".$row['id']."' id='updateCountryBtn'>Update</button>
                                  <button class='btn btn-sm btn-danger' data-id='".$row['id']."' id='deleteCountryBtn'>Delete</button>
                             </div>";
                }
            ),
        );

        // $model = new AdminModel();
        // $user_details = $model->get()->getResultArray();
        // $data['details'] = $user_details;
        echo json_encode(
            \SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
        );
    }
}
?>