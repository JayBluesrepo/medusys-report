<?php 
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\AccessControlModel;
use App\Models\E_LibrarySectionModel;
use App\Models\OrganisationModel;


class AddAccess extends BaseController{

    public function __construct()
	{
		require_once APPPATH.'ThirdParty/ssp.class.php';
        $this->db = db_connect();
	}

    public function index(){        

        $org_id = session()->get('org_id');

        if($org_id){
            $addaccess=['a,b,c'];
            $data['add_library'] = $addaccess;

            $model = new OrganisationModel();
            $details  = $model->get()->getResultArray();
            $data['org'] = $details;

            return view('admin/access', $data);
        }else{
            return view('admin/super-admin-login');
        }
        
    }

    public function add_library(){

        $org_id = session()->get('org_id');


        $name  = $this->request->getVar('section_name');

        $newlibrary = array(
            'master_name'=>$name,
            'org_id'=>$org_id
        );

        $e_library = new E_LibrarySectionModel();
        // $e_library->where('org_id',$org_id);
        $e_library->save($newlibrary);
        $insert_section = $e_library->insertID();

        // print_r($insert_section);die();

        if($insert_section){
            return json_encode(array(
                 'result'    => 1,
                 'message'     => 'Added Successfully.....'                 
                 ));
        }
        else{
            return json_encode(array(
                 'result'    => 0,
                 'message'     => 'Something went wrong.....'
                 ));
        }


        
    }

    public function delete_library(){
        $org_id = session()->get('org_id');
        $id  = $this->request->getVar('id');
        
        // print_r($id);die();
        $delete = new E_LibrarySectionModel();        
        $delete->where('id',$id); 
        $delete->where('org_id',$org_id);
        $deleteID = $delete->delete();
        
        if($deleteID){
            return json_encode(array(
                'result'    => 1,
                'message'   => 'e-Library Deleted Successfully'
            ));
        }
        else{
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Error'
            ));
        }

    }

    public function edit_library(){
        $org_id = session()->get('org_id');
        $id  = $this->request->getVar('id');
        // print_r($id);die();
        $model  = new E_LibrarySectionModel();
        $model->where('org_id',$org_id);
        $data = $model->where('id',$id)->first();

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

    public function edit_e_library_section(){
        $org_id = session()->get('org_id');
        $id  = $this->request->getVar('get_id');
        $name  = $this->request->getVar('section_name_edit');
        date_default_timezone_set('Asia/Kolkata');
        $updated_at = date('d-m-Y H:i:s', time());
        
        $newData = array(
            'master_name'=>$name,
            'updated_at'=>$updated_at
        );

        $model = new E_LibrarySectionModel();
        $model->set($newData);
        $model->where('id',$id);
        $model->where('org_id',$org_id);
        $update = $model->update();

        if($update){
            return json_encode(array(
                 'result'    => 1,
                 'message'   => 'e-Library Updated successfully....'
            ));
        }
        else{
            return json_encode(array(
                 'result'    => 0,
                 'message'     => 'Something went wrong.....'
            ));
        }

    }

    public function get_all_users(){
        $org_id = session()->get('org_id');

        $dbDetails = array(
            "host"=>$this->db->hostname,
            "user"=>$this->db->username,
            "pass"=>$this->db->password,
            "db"=>$this->db->database,
            "port"=>$this->db->port
        );
        
        $table = "e_library_section";
        $primaryKey = "id";

        $columns = array(
            array(
                'db'=>'id',
                'dt'=>0,
                'field' => 'id'
            ),
            array(
                'db'=>'master_name',
                'dt'=>1,
                'field' => 'names'
            ),
            array(
                'db'=>'created_at',
                'dt'=>2,
                'field' => 'created_at'
            ),
            // array(
            //     'db'=>'`uf`.`files`',
            //     'dt'=>3,
            //     'field' => 'files'
            // ),
            array(
                'db'=>'id',
                'dt'=>3,
                'formatter'=>function($d, $row){
                    return "<div class='btn-group'>
                                <button class='btn btn-sm btn-primary' data-id='".$row['id']."' id='updateCountryBtn'>Update</button>
                                <button class='btn btn-sm btn-danger' data-id='".$row['id']."' id='deleteCountryBtn'>Delete</button>                                  
                            </div>";
                }
            ),
        );
       
        // $joinQuery = "FROM `{$table}` AS `c` LEFT JOIN `upload_files` AS `uf` ON (`uf`.`categories_id` = `c`.`id`)";
        echo json_encode(
            \SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, null, "org_id='$org_id'")
        );
    }
    

}
?>
