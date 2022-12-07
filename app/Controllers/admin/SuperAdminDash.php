<?php 
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\CategoriesModel;
use App\Models\OrganisationModel;
use App\Models\RegisterUserModel;
use App\Models\E_LibrarySectionModel;
use App\Models\conferenceModel;
use App\Models\addPatientModel;

class SuperAdminDash extends BaseController{
  
    public function index(){
        $dr_id = session()->get('dr_id');
        $org_id = session()->get('org_id');
        // print_r($org_id );die();
        if($dr_id ){

            $dash=['a,b,c'];
            $data['dash_b'] = $dash;

            $model8 = new OrganisationModel();
            $details  = $model8->get()->getResultArray();
            $data['org'] = $details;

            $model = new OrganisationModel(); 
            $details = $model->get()->getResultArray();           
            $data['no_org'] = $details;

            $model1 = new RegisterUserModel();
            $model1->where('role_id',3);
            $model1->where('org_id', $org_id);
            $details1 = $model1->get()->getResultArray(); 
            $data['moduler_role'] = $details1;

            $model2 = new RegisterUserModel();
            $model2->where('role_id',4);
            $model2->where('org_id', $org_id);
            $details2 = $model2->get()->getResultArray(); 
            $data['faculty_role'] = $details2;

            $model3 = new RegisterUserModel();
            $model3->where('role_id',0);
            $model3->where('org_id', $org_id);
            $model3->where('valid_user', 1);
            $details3 = $model3->get()->getResultArray(); 
            $data['totaluser_role'] = $details3;
         
            $model4 = new RegisterUserModel();
            $model4->where('valid_user',1);
            $model4->where('org_id', $org_id);
            $details4 = $model4->get()->getResultArray(); 
            $data['active_valid'] = $details4;

            date_default_timezone_set('Asia/Kolkata');   
            $current_date = date('Y-m-d H:i:s', time());
            $previous_date = date("Y-m-d H:i:s",strtotime("-1 month"));
            $model5 = new RegisterUserModel();                
            $model5->where('created_at >=',$previous_date);          
            $model5->where('created_at <=',$current_date);
            $model5->where('org_id', $org_id);
            $details5 = $model5->get()->getResultArray(); 
            $data['lastmonth_user'] = $details5;

            $model6 = new E_LibrarySectionModel();
            $model6->where('org_id', $org_id);
            $details7 = $model6->get()->getResultArray(); 
            $data['total_elibrary'] = $details7;

            $model7 = new conferenceModel();
            $model7->where('org_id', $org_id);
            $details8 = $model7->get()->getResultArray(); 
            $data['total_conference'] = $details8;

            // $model7 = new RegisterUserModel();
            // $model7->select('last_login');
            // // $model1->where('password');
            // // $model1->where('email');
            // $model7->where('role_id',1);
            // $details7 = $model7->get()->getResultArray(); 
            // $data['lastuser_loggedin'] = $details7;

            // print_r(count($details7));die();

            $details16 = date('d-m-Y');

            $data['crnt_date'] = $details16;



            // ---------------------cnb-------------------

            $patient_Model = new addPatientModel();
            $patient_Model->orderBy('id','DESC');
            $patient_Model->where('org_id',$org_id);  
            $patient_Model->select('id, rad_id');
            $patient_Model->like('upload_patient_status',1);
            $c_dat1 = $patient_Model->get()->getResultArray();
            $data['c_old_check'] = count($c_dat1);


            $model = new addPatientModel(); 
            $model->orderBy('id','DESC');
            $model->where('org_id',$org_id);            
            $c_details  = $model->get()->getResultArray();
            //$data['c_patient'] = count($c_details);


            $db = \Config\Database::connect();
            $builder = $db->table('cnb_preop'); 
            $query = $builder->select("COUNT(cnb_preop.id) as count");
            $builder->join('cnb_patient_details', 'cnb_patient_details.id = cnb_preop.patient_id');
            $query = $builder->where('cnb_patient_details.upload_patient_status',0);
            $query = $builder->where('cnb_patient_details.org_id',$org_id);
            $query = $builder->get(); 
            $record = $query->getResult();

            foreach($record as $row) {
                $data['c_patient'] = $row->count;
    
            }

        //    -------------------------labour------------------ 


            $patient_Model = new addPatientModel();
            $patient_Model->orderBy('id','DESC');
            $patient_Model->where('org_id',$org_id);  
            $patient_Model->select('id, rad_id');
            $patient_Model->like('upload_patient_status_labour',1);
            $l_dat1 = $patient_Model->get()->getResultArray();
            $data['l_old_check'] = count($l_dat1);


            $model = new addPatientModel(); 
            $model->orderBy('id','DESC');
            $model->where('org_id',$org_id);            
            $l_details  = $model->get()->getResultArray();
            //$data['l_patient'] = count($l_details);

            $db = \Config\Database::connect();
            $builder = $db->table('labour_pre_procedure'); 
            $query = $builder->select("COUNT(labour_pre_procedure.id) as count");
            $builder->join('cnb_patient_details', 'cnb_patient_details.id = labour_pre_procedure.patient_id');
            $query = $builder->where('cnb_patient_details.upload_patient_status_labour',0);
            $query = $builder->where('cnb_patient_details.org_id',$org_id);
            $query = $builder->get(); 
            $record = $query->getResult();

            foreach($record as $row) {
                $data['l_patient'] = $row->count;
    
            }


// ---------------------------obstetric------------------
            $patient_Model = new addPatientModel();
            $patient_Model->orderBy('id','DESC');
            $patient_Model->where('org_id',$org_id);  
            $patient_Model->select('id, rad_id');
            $patient_Model->like('upload_patient_status_obstetric',1);
            $o_dat1 = $patient_Model->get()->getResultArray();
            $data['o_old_check'] = count($o_dat1);

            $model->orderBy('id','DESC');
            $model->where('org_id',$org_id);            
            $o_details  = $model->get()->getResultArray();
            //$data['o_patient'] = count($o_details);


            $db = \Config\Database::connect();
            $builder = $db->table('obstetrics_pre_op'); 
            $query = $builder->select("COUNT(obstetrics_pre_op.id) as count");
            $builder->join('cnb_patient_details', 'cnb_patient_details.id = obstetrics_pre_op.patient_id');
            $query = $builder->where('cnb_patient_details.upload_patient_status_obstetric',0);
            $query = $builder->where('cnb_patient_details.org_id',$org_id);
            $query = $builder->get(); 
            $record = $query->getResult();

            foreach($record as $row) {
                $data['o_patient'] = $row->count;
    
            }



// ----------------conference list------------

        $conf_Model = new conferenceModel();
        $conf_Model->where('org_id',$org_id);
        $conf_count = $conf_Model->get()->getResultArray();
        $data['conf_count'] = count($conf_count);


// ----------------conference list------------

        $library_Model = new E_LibrarySectionModel();
        $library_Model->where('org_id',$org_id);
        $library_count = $library_Model->get()->getResultArray();
        $data['library_count'] = count($library_count);

// -----------------guidelines----------------------


    $findsub = new CategoriesModel();
    $findsub->where('org_id',$org_id); 
    $guidelines = $findsub->where('field_names','Guidelines')->findAll(); 
    $data['guidelines'] = count($guidelines);      

            return view('admin/super-admin-dashboard', $data);
        }else{
            return view('admin/super-admin-login');
        }

        
    }

    public function power_bi_dash(){

        $dr_id = session()->get('dr_id');
       
        if($dr_id ){

            $dash=['a,b,c'];
            $data['dash_b'] = $dash;

            $model = new OrganisationModel();
            $details  = $model->get()->getResultArray();
            $data['org'] = $details;

            return view('admin/Power-BI-dashboard', $data);
        }else{
            return view('admin/super-admin-login');
        }
    }
}
?>