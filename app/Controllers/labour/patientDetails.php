<?php namespace App\Controllers\labour;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\addPatientModel;

use App\Models\labour_PreProcedureModel;
use App\Models\labour_combinedSpinalEpiduralModel;
use App\Models\labour_EpiduralModel;
use App\Models\labour_SpinalModel;
use App\Models\labour_CSA_Model;
use App\Models\labour_post_procedureModel;
use App\Models\labour_FollowupModel;
use App\Models\labour_FeedbackModel;
use App\Models\labour_EFeedbackModel;
use App\Models\labour_e_consentModel;

class patientDetails extends BaseController
{   
    use ResponseTrait;
	public function __construct()
	{
		helper(['form','url']);
	}

    public function index()
    {
        $id = session()->get('id');
        $dr_id = session()->get('dr_id');

        // $name = session()->get('name');
        // print_r($dr_id);
        // die();
        if($dr_id){       
            $calc=[];
            $model = new addPatientModel();
            $model->where('dr_id',$dr_id);        
            $model->orderBy('id','DESC');        
            $details  = $model->get()->getResultArray();
            $data['patient'] = $details;
            $det = $model->where('id',$id)->first();
            $data['focus'] = $det;
            
            $selectPatient = new addPatientModel(); 
            $selectPatient->where('dr_id',$dr_id);        
            $fetch_patient = $selectPatient->where('id',$id)->first();
            $data['info'] = $fetch_patient;

            $patient_Model = new addPatientModel();
            $patient_Model->orderBy('id','DESC');
            $patient_Model->where('dr_id',$dr_id);  
            $patient_Model->select('id, rad_id');
            $patient_Model->like('upload_patient_status_labour',1);
            $dat1 = $patient_Model->get()->getResultArray();
            // if($dat1){
                $data['old_check'] = $dat1;
            // }

            $bash=['a,b,c'];
            $data['pat'] = $bash; 

            $sine=['1,2,3'];
            $data['pcheck'] = $sine;

            $model1 = new labour_PreProcedureModel();
            $detail1 = $model1->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data['preo'] = $detail1;

            $model2 = new labour_post_procedureModel();
            $detail2 = $model2->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data['posto'] = $detail2;

            $model3 = new labour_FollowupModel();
            $detail3 = $model3->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data['follo'] = $detail3;

            $model4 = new labour_e_consentModel();
            $detail4 = $model4->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data['econ'] = $detail4;

            // print_r($detail4);die();

            $epiModel = new labour_EpiduralModel();
            $data6  = $epiModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();

            $spinModel = new labour_SpinalModel();
            $data7  = $spinModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();

            $cseModel = new labour_combinedSpinalEpiduralModel();
            $data8  = $cseModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();

            $csaModel = new labour_CSA_Model();
            $data9  = $csaModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();

            if($data6 || $data7 || $data8 || $data9){
                $sin=['1,12,23'];
                $data['proccheck'] = $sin;
            }

            $Model = new labour_EFeedbackModel();
            $data1  = $Model->where('dr_id',$dr_id)->where('patient_id',$id)->where('submission',1)->first();
            $data['ef'] = $data1;

            $Models = new labour_FeedbackModel();
            $data4  = $Models->where('dr_id',$dr_id)->where('patient_id',$id)->where('flag',1)->first();
            $data['mf'] = $data4;
            
            if($data1 || $data4){
                $sins=['1,5,10'];
                $data['feedcheck'] = $sins;
            }

            $models = new labour_e_consentModel(); 
            $data12 = $models->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data['ecocheck'] = $data12;

            if($data12 && $detail1 && $detail2 && $detail3 && $sin && $sins){
                $uploads=['a,12,n'];
                $data['upload'] = $uploads;
            }
            
            foreach($details as $key=>$val){
                $id = ($val['id']);
                $data5  = $cseModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                $data6  = $epiModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                $data7  = $spinModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                $data8  = $csaModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                if($data5 || $data6 || $data7 || $data8){
                    $data9 = ['a','b','c'];
                }
                $data10  = $Models->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                $data11  = $Model->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                if($data10 || $data11){
                    $data12 = ['A','B','C'];
                }
                $data1  = $models->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                $data2  = $model1->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                $data3  = $model2->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                $data4  = $model3->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                if($data1 && $data2 && $data3 && $data4 && $data9 && $data12){
                    $datas['id'] = $id;
                    array_push($calc,$datas);
                }
            }
            $data['allcheck'] = $calc;

            return view('labour/patient_details',$data);
            // print_r($data);die();
        }else{
            return view('login');
        }
    }   

    public function edit_patient_fetch(){

        // $id = $this->request->getVar('id');
        $id = session()->get('id');
        $dr_id = session()->get('dr_id');

        
        $model  = new addPatientModel();
        $data = $model->where('dr_id',$dr_id)->where('id',$id)->first();
        
        
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

    public function history(){
        $id = session()->get('id');
        $drname = session()->get('name');

        $dr_id = session()->get('dr_id');


        // print_r($drname);die();

        $selectPatient = new addPatientModel(); 
        $fetch_patient = $selectPatient->where('dr_id',$dr_id)->where('id',$id)->first();
        $data['info'] = $fetch_patient;

        $model1 = new labour_PreProcedureModel();
        $detail1 = $model1->where('dr_id',$dr_id)->where('patient_id',$id)->first();
        $data['preo'] = $detail1;

        $model2 = new labour_post_procedureModel();
        $detail2 = $model2->where('dr_id',$dr_id)->where('patient_id',$id)->first();
        $data['posto'] = $detail2;

        $model3 = new labour_FollowupModel();
        $detail3 = $model3->where('dr_id',$dr_id)->where('patient_id',$id)->first();
        $data['follo'] = $detail3;

        $model4 = new labour_e_consentModel();
        $detail4 = $model4->where('dr_id',$dr_id)->where('patient_id',$id)->first();
        $data['econ'] = $detail4;

        $Model = new labour_EFeedbackModel();
        $data1  = $Model->where('dr_id',$dr_id)->where('patient_id',$id)->first();
        $data['ef'] = $data1;

        $Models = new labour_FeedbackModel();
        $data4  = $Models->where('dr_id',$dr_id)->where('patient_id',$id)->first();
        $data['mf'] = $data4;

        $epiModel = new labour_EpiduralModel();
        $data6  = $epiModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();

        $spinModel = new labour_SpinalModel();
        $data7  = $spinModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();

        $cseModel = new labour_combinedSpinalEpiduralModel();
        $data8  = $cseModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();

        $csaModel = new labour_CSA_Model();
        $data9  = $csaModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();
       

        // print_r($id);die();
        if($fetch_patient || $detail1 || $detail2 || $detail3 || $detail4 || $data1 || $data4){
            return json_encode(array(
                'result'    => 1,
                // 'message'   => 'Patient Deleted Successfully',
                'drname' => $drname,
                'patient' =>$fetch_patient,
                'e_consent' =>$detail4,
                'preop'=>$detail1,
                'pacu'=>$detail2,
                'follow_up'=>$detail3,
                'm_feedback'=>$data4,
                'e_feedback'=>$data1,
                'cse'=>$data8,
                'epidural'=>$data6,
                'spinal'=>$data7,
                'csa'=>$data9

            ));
        }
        else{
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Error'
            ));
        }

    }

    public function delete_patient(){
        $patient_id = $this->request->getVar('patient_id');
        $dr_id = session()->get('dr_id');

        $delete = new addPatientModel();        
        $delete->set('upload_patient_status_labour',0);
        $delete->where('dr_id',$dr_id)->where('id',$patient_id);
        $deleteID1 = $delete->update();

        $delete1 = new labour_PreProcedureModel();
        $delete1->where('dr_id',$dr_id)->where('patient_id',$patient_id);        
        $deleteID2 = $delete1->delete();

        $delete2 = new labour_combinedSpinalEpiduralModel();
        $delete2->where('dr_id',$dr_id)->where('patient_id',$patient_id);        
        $deleteID3 = $delete2->delete();

        $delete3 = new labour_EpiduralModel();        
        $delete3->where('dr_id',$dr_id)->where('patient_id',$patient_id);
        $deleteID4 = $delete3->delete();

        $delete4 = new labour_SpinalModel();
        $delete4->where('dr_id',$dr_id)->where('patient_id',$patient_id);        
        $deleteID5 = $delete4->delete();

        $delete9 = new labour_CSA_Model();
        $delete9->where('dr_id',$dr_id)->where('patient_id',$patient_id);        
        $deleteID10 = $delete9->delete();

        $delete10 = new labour_e_consentModel();
        $delete10->where('dr_id',$dr_id)->where('patient_id',$patient_id);        
        $deleteID11 = $delete10->delete();

        $delete5 = new labour_post_procedureModel();
        $delete5->where('dr_id',$dr_id)->where('patient_id',$patient_id);        
        $deleteID6 = $delete5->delete();

        $delete6 = new labour_FollowupModel();        
        $delete6->where('dr_id',$dr_id)->where('patient_id',$patient_id);
        $deleteID7 = $delete6->delete();

        $delete7 = new labour_FeedbackModel();
        $delete7->where('dr_id',$dr_id)->where('patient_id',$patient_id);        
        $deleteID8 = $delete7->delete();

        $delete8 = new labour_EFeedbackModel();
        $delete8->where('patient_id',$patient_id);        
        $deleteID9 = $delete8->delete();

        if($deleteID1 && $deleteID2 && $deleteID3 && $deleteID4 && $deleteID5 && $deleteID6 && $deleteID7 && $deleteID8 && $deleteID9 && $deleteID10 && $deleteID11){
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Patient Deleted Successfully'
            ));
        }
        else{
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Error'
            ));
        }
    }
    
    public function edit_patient_details(){

        $id = session()->get('id');
        $dr_id = session()->get('dr_id');

        // print_r($id);
        // die();
        $name = $this->request->getVar('name_m');
        $patient_email = $this->request->getVar('email_id_m');
        $patient_id = $this->request->getVar('patient_id_m');
        $gender = $this->request->getVar('gender_m');
        $age = $this->request->getVar('age_m');
        $weight = $this->request->getVar('weight_m');
        $bmi = $this->request->getVar('bmi_m');        
        $block_procedure = $this->request->getVar('date_time_m');
        $time_m = $this->request->getVar('time_m');
        $cnb_done_by1 = $this->request->getVar('cnb_done_by1_m');
        $cnb_done_by2 = $this->request->getVar('cnb_done_by2_m');
        $supervision = $this->request->getVar('supervision_m');
        $hospital = $this->request->getVar('hospital_m');
        $feet = $this->request->getVar('feet_m');
        $inche = $this->request->getVar('inche_m');
        $cm = $this->request->getVar('cm_m');
        $height  = $feet.'.'.$inche;   
        
        date_default_timezone_set('Asia/Kolkata');   
        $updated_at = date('d-m-Y H:i:s', time());  
        $updated_by = session()->get('name');

        $org_id = session()->get('org_id');


        $updated = array(

            'org_id'=>$org_id,

            'patient_name'=>$name,
            'patient_email_id'=>$patient_email,
            'patient_id'=>$patient_id,
            'gender'=>$gender,
            'age'=>$age,
            'weight_kg'=>$weight,
            'bmi'=>$bmi, 
            'procedure_time'=>$block_procedure,
            'time'=>$time_m,
            'supervision'=>$supervision,
            'hospital'=>$hospital,
            'hight'=> $height,
            'cm'=>$cm,
            'cnb_done_by1'=>$cnb_done_by1, 
            'cnb_done_by2'=>$cnb_done_by2,
            'updated_at'=>$updated_at,
            'updated_by'=>$updated_by, 
        );

        $patient_details_edit = new addPatientModel(); 
        $patient_details_edit->set($updated);
        $patient_details_edit->where('id',$id);
        $patient_details_edit->where('dr_id',$dr_id);
        $update = $patient_details_edit->update();

        if($update){
            return json_encode(array(
                'result'    => 1,
                'message'     => 'Patient data Updated Successfully.....'
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
