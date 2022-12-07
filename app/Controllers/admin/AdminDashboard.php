<?php 
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\CategoriesModel;
use App\Models\FileUploadModel;
use App\Models\OrganisationModel;
use App\Models\RegisterUserModel;
use App\Models\E_LibrarySectionModel;
use App\Models\conferenceModel;


class AdminDashboard extends BaseController{

    public function __construct()
    {
        require_once APPPATH.'ThirdParty/ssp.class.php';
        $this->db = db_connect();
    }
  
    public function index(){
        $dr_id = session()->get('dr_id');
        // print_r($dr_id );die();
        if($dr_id ){

            $dash=['a,b,c'];
            $data['dash_a'] = $dash;

            // $model = new OrganisationModel();
            // $model->select('*');
            // $details  = $model->get()->num_rows();
            // $data['org'] = $details;

            $model = new OrganisationModel(); 
            $details = $model->get()->getResultArray();           
            $data['org'] = $details;


            // // print_r(count($details));die();
           
            $model1 = new RegisterUserModel();
            $model1->where('role_id',3);
            $model1->where('org_id',1);
            $details1 = $model1->get()->getResultArray(); 
            $data['moduler_role'] = $details1;

            // print_r($details1);die();

            $model2 = new RegisterUserModel();
            $model2->where('role_id',4);
            $model2->where('org_id',1);
            $details2 = $model2->get()->getResultArray(); 
            $data['faculty_role'] = $details2;

            $model3 = new RegisterUserModel();
            $model3->where('role_id',0);
            $model3->where('org_id', 1);
            $details3 = $model3->get()->getResultArray(); 
            $data['totaluser_role'] = $details3;
         
            $model4 = new RegisterUserModel();
            $model4->where('valid_user',1);
            $details4 = $model4->get()->getResultArray(); 
            $data['active_valid'] = $details4;

            date_default_timezone_set('Asia/Kolkata');   
            $current_date = date('Y-m-d H:i:s', time());
            $previous_date = date("Y-m-d H:i:s",strtotime("-1 month"));
            $model5 = new RegisterUserModel();                
            $model5->where('created_at >=',$previous_date);          
            $model5->where('created_at <=',$current_date);
            $model3->where('org_id', 1);
            $details5 = $model5->get()->getResultArray(); 
            $data['lastmonth_user'] = $details5;

	    
            $model7 = new conferenceModel();
            $model7->where('org_id', 1);
            $details8 = $model7->get()->getResultArray(); 
            $data['total_conference'] = $details8;

            $model6 = new E_LibrarySectionModel();
            $model6->where('org_id', 1);
            $details7 = $model6->get()->getResultArray(); 
            $data['total_elibrary'] = $details7;
            

            // print_r(count($details5));die();

            $details16 = date('Y-m-d');
            $data['crnt_date'] = $details16;


            return view('admin/dashboard-1', $data);
        }else{
            return view('admin/super-admin-login');
        }

        
    }

 }   

