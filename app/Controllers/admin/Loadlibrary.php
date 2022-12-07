<?php 
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\CategoriesModel;
use App\Models\FileUploadModel;
use App\Models\OrganisationModel;

class Loadlibrary extends BaseController
{
    public function __construct()
	{
		require_once APPPATH.'ThirdParty/ssp.class.php';
        $this->db = db_connect();
	}
    
    
    public function index(){
        $org_id = session()->get('org_id');
        if($org_id){
            $e_library=['a,b,c'];
            $data['e_library'] = $e_library;
    
            $model = new OrganisationModel();
            $details  = $model->get()->getResultArray();
            $data['org'] = $details;
    
            return view('admin/loadlibrary_v', $data);
        }else{
            return view('admin/super-admin-login');
        }
       
    }

    public function delete_disease(){
        $org_id = session()->get('org_id');

        $id  = $this->request->getVar('id');
        $file = $this->request->getVar('file_name');        
      
        // print_r($file);die();
        $delete = new FileUploadModel();        
        $delete->where('categories_id',$id)->where('name',$file); 
        $deleteID = $delete->delete();
        
        if($deleteID){
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Deleted Successfully'
            ));
        }
        else{
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Error'
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
        
        $table = "categories";
        $primaryKey = "id";
        
        $columns = array(
            array(
                'db'=>'`c`.`id`',
                'dt'=>0,
                'field' => 'id'
            ),
            array(
                'db'=>'`c`.`fields`',
                'dt'=>1,
                'field' => 'fields'
            ),
            array(
                'db'=>'`c`.`category_name`',
                'dt'=>2,
                'field' => 'category_name'
            ),
            array(
                'db'=>'`uf`.`name`',
                'dt'=>3,
                'field' => 'name'
            ),
            array(
                'db'=>'`uf`.`link`',
                'dt'=>4,
                'field' => 'link'
            ),
            array(
                'db'=>'`uf`.`files`',
                'dt'=>5,
                'field' => 'files'
            ),
            array(
                'db'=>'`c`.`id`',
                'dt'=>6,
                'formatter'=>function($d, $row){

                    if($row['files']){
                        return "<div class='btn-group'>                           
                            <button class='btn btn-sm btn-primary' data-id='".$row['id'].",".$row['files']."' id='updateCountryBtn'>Download</button>                           
                            <button class='btn btn-sm btn-danger' data-id='".$row['id'].",".$row['name']."' id='deleteCountryBtn'>Delete</button>                            
                            <button class='btn btn-sm btn-success' data-id='".$row['id'].",".$row['files'].",".$row['link']."' id='viewCountryBtn'>View</button>
                        </div>";
                    }else{
                        return "<div class='btn-group'>                           
                                               
                            <button class='btn btn-sm btn-danger' data-id='".$row['id'].",".$row['name']."' id='deleteCountryBtn'>Delete</button>                            
                            <button class='btn btn-sm btn-success' data-id='".$row['id'].",".$row['files'].",".$row['link']."' id='viewCountryBtn'>View</button>
                        </div>";
                    }
                    
                }
            ),
        );
        $joinQuery = "FROM `{$table}` AS `c` RIGHT JOIN `upload_files` AS `uf` ON (`uf`.`categories_id` = `c`.`id`)";
        echo json_encode(
            \SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $joinQuery, "`uf`.`org_id`='$org_id'")
        );
    }
}
?>
