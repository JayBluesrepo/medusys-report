<?php 
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ApiModel;
use App\Models\RegisterUserModel;
use App\Models\addPatientModel;
use App\Models\conferenceModel;
use App\Models\E_LibrarySectionModel;
use App\Models\CategoriesModel;


class Dashboard extends ResourceController
{
    use ResponseTrait;
    public function __construct()
    {
        helper(['form']);
    }
    public function dashboard1() 
    {
        // print_r("hello");die();

        return view('dashboard/dashboard-1');
       
    }

    public function dashboard2() 
    {
        $dr_id = session()->get('dr_id');
        $org_id = session()->get('org_id');


        $model = new RegisterUserModel();
        $model->select('last_login');
        $login = $model->where('id', $dr_id)->first();

        $data['last_date'] = date("d-m-Y ", strtotime($login['last_login']) );
        $data['last_time'] = date("H:i:s", strtotime($login['last_login']) );

        // ---------------------cnb-------------------

            $patient_Model = new addPatientModel();
            $patient_Model->orderBy('id','DESC');
            $patient_Model->where('dr_id',$dr_id);  
            $patient_Model->select('id, rad_id');
            $patient_Model->like('upload_patient_status',1);
            $c_dat1 = $patient_Model->get()->getResultArray();
            $data['c_old_check'] = count($c_dat1);

            $db = \Config\Database::connect();
            $builder = $db->table('cnb_preop'); 
            $query = $builder->select("COUNT(cnb_preop.id) as count");
            $builder->join('cnb_patient_details', 'cnb_patient_details.id = cnb_preop.patient_id');
            $query = $builder->where('cnb_patient_details.upload_patient_status',0);
            $query = $builder->where('cnb_patient_details.dr_id',$dr_id);
            $query = $builder->get(); 
            $record = $query->getResult();

            foreach($record as $row) {
                $data['c_patient'] = $row->count;
    
            }

            // echo $data['c_patient'];
            // die();

        //    -------------------------labour------------------ 


            $patient_Model = new addPatientModel();
            $patient_Model->orderBy('id','DESC');
            $patient_Model->where('dr_id',$dr_id);  
            $patient_Model->select('id, rad_id');
            $patient_Model->like('upload_patient_status_labour',1);
            $l_dat1 = $patient_Model->get()->getResultArray();
            $data['l_old_check'] = count($l_dat1);


            $model = new addPatientModel(); 
            $model->orderBy('id','DESC');
            $model->where('dr_id',$dr_id);            
            $l_details  = $model->get()->getResultArray();
           // $data['l_patient'] = count($l_details);




            $db = \Config\Database::connect();
            $builder = $db->table('labour_pre_procedure'); 
            $query = $builder->select("COUNT(labour_pre_procedure.id) as count");
            $builder->join('cnb_patient_details', 'cnb_patient_details.id = labour_pre_procedure.patient_id');
            $query = $builder->where('cnb_patient_details.upload_patient_status_labour',0);
            $query = $builder->where('cnb_patient_details.dr_id',$dr_id);
            $query = $builder->get(); 
            $record = $query->getResult();

            foreach($record as $row) {
                $data['l_patient'] = $row->count;
    
            }


// ---------------------------obstetric------------------
            $patient_Model = new addPatientModel();
            $patient_Model->orderBy('id','DESC');
            $patient_Model->where('dr_id',$dr_id);  
            $patient_Model->select('id, rad_id');
            $patient_Model->like('upload_patient_status_obstetric',1);
            $o_dat1 = $patient_Model->get()->getResultArray();
            $data['o_old_check'] = count($o_dat1);

            $model->orderBy('id','DESC');
            $model->where('dr_id',$dr_id);            
            $o_details  = $model->get()->getResultArray();
            //$data['o_patient'] = count($o_details);


            $db = \Config\Database::connect();
            $builder = $db->table('obstetrics_pre_op'); 
            $query = $builder->select("COUNT(obstetrics_pre_op.id) as count");
            $builder->join('cnb_patient_details', 'cnb_patient_details.id = obstetrics_pre_op.patient_id');
            $query = $builder->where('cnb_patient_details.upload_patient_status_obstetric',0);
            $query = $builder->where('cnb_patient_details.dr_id',$dr_id);
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

        // print_r($data['guidelines']);die();
        return view('dashboard/dashboard-2',$data);
       
    }

    public function dashboard3() 
    {
        
        // print_r("hello");die();
        return view('dashboard/dashboard');
       
    }
}


?>