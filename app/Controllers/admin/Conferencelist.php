<?php 
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\CategoriesModel;
use App\Models\FileUploadModel;
use App\Models\OrganisationModel;
use App\Models\conferenceModel;
use App\Models\Conf_About;
use App\Models\ProgramScheduleModel;
use App\Models\RegisterUserModel;

class Conferencelist extends BaseController
{
    public function __construct()
    {
        require_once APPPATH.'ThirdParty/ssp.class.php';
        $this->db = db_connect();
    }

    // public function index(){

    // }
    public function index(){
        

        $org_id = session()->get('org_id');

        $conference_id = $_GET['id'];


        $e_library=['z,x,y'];
        $data['conferencelist'] = $e_library;

        $model = new OrganisationModel();
        $details  = $model->get()->getResultArray();
        $data['org'] = $details;

        
        // $model3 = new ProgramScheduleModel(); 
        // $model3->where('ps_id');
        // $model3->select('*'); 
        // $details3 = $model3->get()->getResultArray();

        // // $db = \Config\Database::connect();
        // // $query = $db->getLastQuery();
        // // echo (string)$query;
        // // $affected_rows = $db->affectedRows();
        // // die();


        // $moderator['moderator'] = $details3;
        // $speaker['speaker'] = $details3;
        // // print_r($details3);die();
      
        $model1 = new Conf_About();
        $model1->select('*');
        $details2  = $model1->get()->getResultArray();


        $data['title_con'] = $details2;
        $data['dates_con_from'] = $details2;
        $data['dates_con_to'] = $details2;
        $data['conference_id'] = $conference_id;



        // print_r($data['date_from']);die();

        return view('admin/conferencelist', $data);
    }
    public function conference_list(){
        //$db = \Config\Database::connect();
        $org_id = session()->get('org_id');
        $role_id = session()->get('role_id');
        $name = session()->get('name');
        
        $conference_id = $this->request->getVar('conference_id');

        $login_id = session()->get('id');

            $conference_list = array( 
                'conference_id'=>$conferene_id,
                'created_by' =>$name
             );

          
           $model = new Conf_About(); 
            $model->set($conference_list);
            $model->where('conference_id',$conference_id);
            $update = $model->update();

        
        if($update){
            return json_encode(array(
                 
                'data' => $conference_id,
                 'result'    => 1,
                 'message'     => 'data inserted successfully '
            ));
        
        }else{
            return json_encode(array(
                 'result'    => 0,
                 'message'     => 'Something went wrong.....'
            ));
        }
    }




 public function get_all_users(){
        
        $conference_id = session()->get('conference_id');

        // print_r($org_id);die();

        $dbDetails = array(
            "host"=>$this->db->hostname,
            "user"=>$this->db->username,
            "pass"=>$this->db->password,
            "db"=>$this->db->database,
            "port"=>$this->db->port
        );
        
        $table = "conf_about";
        $primaryKey = "conference_id";

        $columns = array(
            array(
                'db'=>'conference_id',
                'dt'=>0,
                'field' => 'conference_id'
            ),
            array(
                'db'=>'title',
                'dt'=>1,
                'field' => 'title'
            ),
            array(
                'db'=>'date_from',
                'dt'=>2,
                'field' => 'date_from'
            ),
            array(
                'db'=>'date_to',
                'dt'=>3,
                'field' => 'date_to'
            ),
            array(
                'db'=>'theme',
                'dt'=>4,
                'field' => 'theme'
            ),
            array(
                'db'=>'intro',
                'dt'=>5,
                'field' => 'intro'
            ),
            array(
                'db'=>'org_msg',
                'dt'=>6,
                'field' => 'org_msg'
            ),
            array(
                'db'=>'date_to',
                'dt'=>7,
                'field' => 'date_to'
            ),
            array(
                'db'=>'id',
                'dt'=>8,
                'formatter'=>function($d, $row){
                    return "<div class='btn-group'>
                                <button class='btn btn-sm btn-primary' data-id='".$row['conference_id']."' id='updateCountryBtn'>Update</button>
                                                               
                            </div>";
                }
            ),
        );
        
        echo json_encode(
            \SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
        );
    }

    
}
?>
