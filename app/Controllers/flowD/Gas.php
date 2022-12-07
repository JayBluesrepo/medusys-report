<?php namespace App\Controllers\flowD;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\addPatientModel;

class Gas extends BaseController
{   
    use ResponseTrait;
	public function __construct()
	{
		helper(['form','url']);
	}

   
    public function index(){
        $dr_id = session()->get('dr_id');       
        // $z = session()->get('check'); 
        // print_r($z);die();
        $model = new addPatientModel(); 
        $model->orderBy('id','DESC');
        $model->where('dr_id',$dr_id);            
        $details  = $model->get()->getResultArray();
        $data['patient'] = $details;

        unset($_SESSION['check']);
        unset($_SESSION['pa_name']);

       
        return view('flowD/gas',$data);   
    }
  
    public function searching_patients(){
        
        $dr_id = session()->get('dr_id');
        $patient = $this->request->getVar('user');       
      
        $model = new addPatientModel();
        $model->orderBy('id','DESC');
        $model->where('dr_id',$dr_id); 
        $model->where('upload_patient_status',1);
        $model->select('id, rad_id');
        $model->like('rad_id',$patient);
        $data1  = $model->get()->getResultArray();
        return json_encode(array(
            'message' => $data1
           
        ));
       
    }

    public function adding_new_patient(){

        $dr_id = session()->get('dr_id');

        $org_id = session()->get('org_id');

        // print_r($org_id);die();

        
        $name1  = $this->request->getVar('name');

        if($name1 == ''){
            $name = 'No Name';
        }else{
            $name  = $this->request->getVar('name');
        }
        $patient_email_id  = $this->request->getVar('patient_email_id');
        $patient_id  = $this->request->getVar('patient_id');
        $gender  = $this->request->getVar('gender');
        $age  = $this->request->getVar('age');
        $weight  = $this->request->getVar('weight');        
        $bmi  = $this->request->getVar('bmi');     
        $hospital  = $this->request->getVar('hospital_m');
        $feet  = $this->request->getVar('feet');
        $inche  = $this->request->getVar('inche'); 
        $cm  = $this->request->getVar('cm');       

        $height  = $feet.'.'.$inche;    
        $random_id = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);

        $created_by = session()->get('name');


        $newpatient = array(
            'org_id'=>$org_id,
            'patient_name'=>$name,
            'patient_email_id'=>$patient_email_id,
            'patient_id'=>$patient_id,
            'gender'=>$gender,
            'age'=>$age,
            'weight_kg'=>$weight,
            'bmi'=>$bmi,            
            'hospital'=>$hospital,
            'hight'=> $height,
            'cm'=>$cm,          
            'rad_id'=>$random_id,
            'created_by'=>$created_by, 
            'dr_id'=>$dr_id
        );

        // print_r($newpatient);
        // die();

        $adding_patient = new addPatientModel();
        $adding_patient->save($newpatient);
        $insert_patient = $adding_patient->insertID();

        if($insert_patient){
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
    
}
?>

