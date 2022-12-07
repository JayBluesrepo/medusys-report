<?php namespace App\Controllers\labour;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\addPatientModel;

use App\Models\labour_PreProcedureModel;
use App\Models\labour_post_procedureModel;
use App\Models\labour_FollowupModel;
use App\Models\labour_SpinalModel;
use App\Models\labour_EpiduralModel;
use App\Models\labour_combinedSpinalEpiduralModel;
use App\Models\labour_CSA_Model;
use App\Models\labour_EFeedbackModel;
use App\Models\labour_FeedbackModel;
use App\Models\labour_e_consentModel;

class addPatient extends BaseController
{   
    use ResponseTrait;
	public function __construct()
	{
		helper(['form','url']);
	}
    
    public function index()
    {
        $dr_id = session()->get('dr_id');

        // print_r($dr_id);die();
        if($dr_id){
            $model = new addPatientModel();        
            $model->where('dr_id',$dr_id);
            $details  = $model->get()->getResultArray();
            $data['patient'] = $details;

            return view('cnb/add_patient',$data);
        }else{
            return view('login');
        }
        
    }

    public function adding_new_patient(){

        $dr_id = session()->get('dr_id');
        
        $name  = $this->request->getVar('name');
        $patient_email_id  = $this->request->getVar('patient_email_id');
        $patient_id  = $this->request->getVar('patient_id');
        $gender  = $this->request->getVar('gender');
        $age  = $this->request->getVar('age');
        $weight  = $this->request->getVar('weight');        
        $bmi  = $this->request->getVar('bmi');
        $supervision  = $this->request->getVar('supervision');
        $hospital  = $this->request->getVar('hospital');
        $feet  = $this->request->getVar('feet');
        $inche  = $this->request->getVar('inche'); 
        $cm  = $this->request->getVar('cm'); 
        $date_time  = $this->request->getVar('date_time');
        $time = $this->request->getVar('time');
        $cnb_done_by1  = $this->request->getVar('cnb_done_by1');
        $cnb_done_by2  = $this->request->getVar('cnb_done_by2');

        $height  = $feet.'.'.$inche;    
        $random_id = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);

        $created_by = session()->get('name');


        $newpatient = array(
            'patient_name'=>$name,
            'patient_email_id'=>$patient_email_id,
            'patient_id'=>$patient_id,
            'gender'=>$gender,
            'age'=>$age,
            'weight_kg'=>$weight,
            'bmi'=>$bmi, 
            'supervision'=>$supervision,
            'hospital'=>$hospital,
            'hight'=> $height,
            'cm'=>$cm,
            'procedure_time'=>$date_time,
            'time'=>$time,
            'cnb_done_by1'=>$cnb_done_by1, 
            'cnb_done_by2'=>$cnb_done_by2,
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

    public function check_patient_id(){

        $dr_id = session()->get('dr_id');

        $id_patient = $this->request->getVar('id_patient'); 
        // print_r($seva_name);die();        

        $check = new addPatientModel();
        $data = $check->where('dr_id',$dr_id)->where('patient_id',$id_patient)->first();

        if($data){
            return json_encode(array(
                'result'    => 1,
                'message'     => 'Patient_id already exists'                
            ));
        }
        else{
            return json_encode(array(
                'result'    => 0                
            ));
        }
    }

    public function upload_patient_record(){

        // echo "hi";die();

        $dr_id = session()->get('dr_id');   
        $z = $this->request->getVar('z'); 
        session()->set('check',$z); 
        // $model = new addPatientModel(); 
        // $model -> select('patient_id,id');
        // $model->where('upload_patient_status',1); 
        // $details1  = $model->where('dr_id',$dr_id)->get()->getResultArray();
        // //  $model->get()->getResultArray();

        // // $model1 = new e_consentModel(); 
        // // // $model -> select('patient_id,id');
        // // $model1->where('upload_patient_status',1); 
        // // $details2  = $model1->where('dr_id',$dr_id)->get()->getResultArray();

        // print_r($details2);die();

        $calc=[];
        $model1 = new labour_e_consentModel();
        $model2 = new labour_PreProcedureModel();
        $model3 = new labour_post_procedureModel();
        $model4 = new labour_FollowupModel();
        $model5 = new labour_combinedSpinalEpiduralModel();
        $model6 = new labour_EpiduralModel();
        $model7 = new labour_SpinalModel();
        $model8 = new labour_CSA_Model();
        $model9 = new labour_FeedbackModel();
        $model10 = new labour_EFeedbackModel();

        $model = new addPatientModel(); 
        $model->orderBy('id','DESC'); 
        $model->where('dr_id',$dr_id); 
        $model->where('upload_patient_status_labour',1); 
        $details  = $model->get()->getResultArray();
        foreach($details as $key=>$val){
            $id = ($val['id']);
            $data5  = $model5->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data6  = $model6->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data7  = $model7->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data8  = $model8->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            if($data5 || $data6 || $data7 || $data8){
                $data9 = ['a','b','c'];
            }
            $data10  = $model9->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data11  = $model10->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            if($data10 || $data11){
                $data12 = ['A','B','C'];
            }
            $data1  = $model1->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data2  = $model2->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data3  = $model3->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data4  = $model4->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            if($data1 && $data2 && $data3 && $data4 && $data9 && $data12){
                $datas['id'] = $id;
                array_push($calc,$datas);
            }
        }
        $data1= [];
        if($dr_id && ($z == 'true'))
        {
            // echo "<script>alert('if');</script>";

            $patient_Model = new addPatientModel();
            $patient_Model->orderBy('id','DESC');
            $patient_Model->where('dr_id',$dr_id);  
            $patient_Model->select('id, rad_id');
            $patient_Model->like('upload_patient_status_labour',1);
            $data1 = $patient_Model->get()->getResultArray();
            // print_r($data1); die();
            return json_encode(array(
                'message' => $data1,
                'msg' => $calc
            ));
        }
        elseif($z == 'false'){

            // echo "<script>alert('else');</script>";

            $model = new addPatientModel();
            $model->orderBy('id','DESC');
            $model->where('dr_id',$dr_id); 
            $model->select('id, rad_id');
            $data1  = $model->get()->getResultArray();
            return json_encode(array(
                'message' => $data1,
                'msg' => $calc
            ));
        }
       
    }

    // public function search_patients(){
    //     $patient = $this->request->getVar('user');
    //     $data1= [];
    //     if($patient)
    //     {
    //         $patient_Model = new addPatientModel();
    //         $patient_Model->select('id, patient_id');
    //         $patient_Model->like('patient_id',$patient);
    //         $data1 = $patient_Model->get()->getResultArray();
    //         // print_r($data1); die();
    //         echo json_encode($data1);
    //     }
    //     else{
    //         $model = new addPatientModel();
    //         $model->select('id, patient_id');
    //         $data1  = $model->get()->getResultArray();
    //         echo json_encode($data1);
    //     }
    // }
    public function searching_patients(){
        $dr_id = session()->get('dr_id');
        $check = $this->request->getVar('check');
        $patient = $this->request->getVar('user');
        $calc=[];
        $model1 = new labour_e_consentModel();
        $model2 = new labour_PreProcedureModel();
        $model3 = new labour_post_procedureModel();
        $model4 = new labour_FollowupModel();
        $model5 = new labour_combinedSpinalEpiduralModel();
        $model6 = new labour_EpiduralModel();
        $model7 = new labour_SpinalModel();
        $model8 = new labour_CSA_Model();
        $model9 = new labour_FeedbackModel();
        $model10 = new labour_EFeedbackModel();
        $model = new addPatientModel(); 
        $model->orderBy('id','DESC'); 
        $model->where('dr_id',$dr_id);           
        $details  = $model->get()->getResultArray();
        foreach($details as $key=>$val){
            $id = ($val['id']);
            $data5  = $model5->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data6  = $model6->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data7  = $model7->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data8  = $model8->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            if($data5 || $data6 || $data7 || $data8){
                $data9 = ['a','b','c'];
            }
            $data10  = $model9->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data11  = $model10->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            if($data10 || $data11){
                $data12 = ['A','B','C'];
            }
            $data1  = $model1->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data2  = $model2->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data3  = $model3->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data4  = $model4->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            if($data1 && $data2 && $data3 && $data4 && $data9 && $data12){
                $datas['id'] = $id;
                array_push($calc,$datas);
            }
        }
        $data1= [];
        if($patient)
        {
            if(($check == 'true')){
                $patient_Model = new addPatientModel();
                $patient_Model->orderBy('id','DESC');
                $patient_Model->where('dr_id',$dr_id);  
                $patient_Model->where('upload_patient_status_labour',1);
                $patient_Model->select('id, rad_id');
                $patient_Model->like('rad_id',$patient);
                $datas1 = $patient_Model->get()->getResultArray();
                // print_r($datas1); die();
                return json_encode(array(
                    'message' => $datas1,
                    'msg' => $calc
                ));
            }
        }else{
            $model = new addPatientModel();
            $model->orderBy('id','DESC');
            $model->where('dr_id',$dr_id); 
            $model->where('upload_patient_status_labour',1);
            $model->select('id, rad_id');
            $data1  = $model->get()->getResultArray();
            return json_encode(array(
                'message' => $data1,
                'msg' => $calc
            ));
        }
    }
    public function search_patients(){

        $dr_id = session()->get('dr_id');

        $patient = $this->request->getVar('user');
        $calc=[];
        $model1 = new labour_e_consentModel();
        $model2 = new labour_PreProcedureModel();
        $model3 = new labour_post_procedureModel();
        $model4 = new labour_FollowupModel();
        $model5 = new labour_combinedSpinalEpiduralModel();
        $model6 = new labour_EpiduralModel();
        $model7 = new labour_SpinalModel();
        $model8 = new labour_CSA_Model();
        $model9 = new labour_FeedbackModel();
        $model10 = new labour_EFeedbackModel();
        $model = new addPatientModel(); 
        $model->orderBy('id','DESC'); 
        $model->where('dr_id',$dr_id);           
        $details  = $model->get()->getResultArray();
        foreach($details as $key=>$val){
            $id = ($val['id']);
            $data5  = $model5->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data6  = $model6->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data7  = $model7->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data8  = $model8->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            if($data5 || $data6 || $data7 || $data8){
                $data9 = ['a','b','c'];
            }
            $data10  = $model9->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data11  = $model10->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            if($data10 || $data11){
                $data12 = ['A','B','C'];
            }
            $data1  = $model1->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data2  = $model2->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data3  = $model3->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data4  = $model4->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            if($data1 && $data2 && $data3 && $data4 && $data9 && $data12){
                $datas['id'] = $id;
                array_push($calc,$datas);
            }
        }
        $data1= [];
        if($patient)
        {
            $patient_Model = new addPatientModel();
            $patient_Model->orderBy('id','DESC');
            $patient_Model->where('dr_id',$dr_id);  
            $patient_Model->select('id, rad_id');
            $patient_Model->like('rad_id',$patient);
            $data1 = $patient_Model->get()->getResultArray();
            // print_r($data1); die();
            return json_encode(array(
                'message' => $data1,
                'msg' => $calc
            ));
            
        }
        else{
            $model = new addPatientModel();
            $model->orderBy('id','DESC');
            $model->where('dr_id',$dr_id); 
            $model->select('id, rad_id');
            $data1  = $model->get()->getResultArray();
            return json_encode(array(
                'message' => $data1,
                'msg' => $calc
            ));
        }
    }
}
?>
