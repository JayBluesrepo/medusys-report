<?php 
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\CategoriesModel;
use App\Models\FileUploadModel;
use App\Models\OrganisationModel;
use App\Models\RegisterUserModel;


class DashboardFaculty extends BaseController{

    public function __construct()
    {
        require_once APPPATH.'ThirdParty/ssp.class.php';
        $this->db = db_connect();
    }
  
    public function index(){
        if(session()->get('name')){
        $dr_id = session()->get('dr_id');
        // print_r($dr_id );die();
        if($dr_id ){

            $dash=['a,b,c'];
            $data['dash_a'] = $dash;


            $model = new OrganisationModel(); 
            $details = $model->get()->getResultArray();           
            $data['no_org'] = $details;
            $org_id = session()->get('org_id');

            $model1  = new RegisterUserModel();
            $model1->select('last_login');
            $current_login =  $dr_id;

        
            // $details2 = $dr_id;
            // $data['last_login'] = $dr_id;
            // print_r($dr_id);die();


            $details16 = date('Y-m-d');
            $data['crnt_date'] = $details16;



            return view('admin/dashboard-2', $data);
        }else{
            return view('admin/super-admin-login');
        }

        }
    }

 }   

