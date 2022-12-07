<?php namespace App\Controllers\obstetrics;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\addPatientModel;

use App\Models\obstetrics_PreopModel;
use App\Models\obstetrics_PostopModel;
use App\Models\obstetrics_followupModel;
use App\Models\obstetrics_SpinalModel;
use App\Models\obstetrics_EpiduralModel;
use App\Models\obstetrics_combinedSpinalEpiduralModel;
use App\Models\obstetrics_CSA_Model;
use App\Models\obstetrics_EFeedbackModel;
use App\Models\obstetrics_manuaFeedbackModel;
use App\Models\obstetrics_e_consentModel;
use App\Models\obstetrics_GaModel;
use App\Models\RegisterUserModel;


class Dashboard extends BaseController
{
    use ResponseTrait;
	public function __construct()
	{
		helper(['form','url']);
	}

    public function index()
    {
        $dr_id = session()->get('dr_id');
        // $id = session()->get('id');

        // print_r($id);die();

        // $model2 = new obstetrics_PreopModel();
        // $ga_det = $model2->where('dr_id',$dr_id)->where


        if($dr_id){
            $calc=[];
            $model1 = new obstetrics_e_consentModel();
            $model2 = new obstetrics_PreopModel();
            $model3 = new obstetrics_PostopModel();
            $model4 = new obstetrics_followupModel();
            $model5 = new obstetrics_combinedSpinalEpiduralModel();
            $model6 = new obstetrics_EpiduralModel();
            $model7 = new obstetrics_SpinalModel();
            $model8 = new obstetrics_CSA_Model();
            $model9 = new obstetrics_manuaFeedbackModel();
            $model10 = new obstetrics_EFeedbackModel();
            $model = new addPatientModel(); 
            $model->orderBy('id','DESC');
            $model->where('dr_id',$dr_id);            
            $details  = $model->get()->getResultArray();
            $data['patient'] = $details;
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
            $patient_Model = new addPatientModel();
            $patient_Model->orderBy('id','DESC');
            $patient_Model->where('dr_id',$dr_id);  
            $patient_Model->select('id, rad_id');
            $patient_Model->like('upload_patient_status_obstetric',1);
            $dat1 = $patient_Model->get()->getResultArray();
            $data['old_check'] = $dat1;
            // print_r($calc); die();
            $data['allcheck'] = $calc;
            
            return view('obstetrics/dashboard',$data);
        }else{
            return view('login');
        }
    }

    public function see_password(){

        $dr_id = session()->get('dr_id');

        // print_r($dr_id);die();


        $pass = $this->request->getVar('pass');
        $patient_id = $this->request->getVar('patient_id');     

        // print_r($pass);die();

        $model = new RegisterUserModel();
        $model->select('password');
        $model->where('id',$dr_id);
        $password1 = $model->get()->getResultArray();

        $password = $password1[0]['password'];      


        if($password == $pass){

            $model2 = new addPatientModel();
            $model2->select('patient_name');
            $model2->orderBy('id','DESC');

            $p_name = $model2->where('dr_id',$dr_id)->findAll();  
                  
            // print_r($p_name);die();

            $sessionData = array(                    
                'pa_name'=> 1                             
            );

            // print_r($sessionData);die();
           
            session()->set($sessionData);       

            return json_encode(array(
                'result'    => 1,
                'message'   => 'see the patient name'
            ));

        }else{

            return json_encode(array(
                'result'    => 0,
                'message'   => 'Password is Incorrect......'
            ));

        }      
    }
    

    public function select_patient(){

        $dr_id = session()->get('dr_id');

        // $id = $_GET['id'];

        if($dr_id){        
            $id  = $this->request->getVar('id');
            $calc=[];
            $model = new addPatientModel(); 
            $model->where('id',$id); 
            $model->where('dr_id',$dr_id);
            $details1  = $model->get()->getResultArray();
            $det = $model->where('id',$id)->first();
            $data1['patient'] = $details1;
            $email = $details1[0]['patient_email_id'];       
            $data['focus'] = $det;

            $sessionData = array(
                'id' => $id,
                'patient_email_id'=>$email
            );
            session()->set($sessionData);
            
            $model = new addPatientModel();
            $model->where('dr_id',$dr_id);
            $model->orderBy('id','DESC');            
            $details  = $model->get()->getResultArray();
            $data['patient'] = $details;

            $selectPatient = new addPatientModel();
            $selectPatient->where('dr_id',$dr_id);
            $fetch_patient = $selectPatient->where('id',$id)->first();
            $data['info'] = $fetch_patient;

            $patient_Model = new addPatientModel();
            $patient_Model->orderBy('id','DESC');
            $patient_Model->where('dr_id',$dr_id);  
            $patient_Model->select('id, rad_id');
            $patient_Model->like('upload_patient_status_obstetric',1);
            $dat1 = $patient_Model->get()->getResultArray();
            // if($dat1){
                $data['old_check'] = $dat1;
            // }
            $bash=['a,b,c'];
            $data['pat'] = $bash;

            // print_r($dat1);die();

            $sine=['1,2,3'];
            $data['pcheck'] = $sine;

            $model1 = new obstetrics_PreopModel();
            $model1->where('dr_id',$dr_id);        
            $detail1 = $model1->where('patient_id',$id)->first();
            $data['preo'] = $detail1;


            $ga_data = new obstetrics_PreopModel();
            $ga_data->select('anaesthesia_administered');
            $ga_data->where('dr_id',$dr_id);        
            $ga_condition = $ga_data->where('patient_id',$id)->first();
            $data['anaesthesia_administered'] = $ga_condition;

            // print_r($ga_condition);die();

            $model2 = new obstetrics_PostopModel();
            $model2->where('dr_id',$dr_id);        
            $detail2 = $model2->where('patient_id',$id)->first();
            $data['posto'] = $detail2;

            $model3 = new obstetrics_followupModel();
            $model3->where('dr_id',$dr_id);
            $detail3 = $model3->where('patient_id',$id)->first();
            $data['follo'] = $detail3;

            $epiModel = new obstetrics_EpiduralModel();
            $epiModel->where('dr_id',$dr_id);
            $data6  = $epiModel->where('patient_id',$id)->first();

            $spinModel = new obstetrics_SpinalModel();
            $spinModel->where('dr_id',$dr_id);
            $data7  = $spinModel->where('patient_id',$id)->first();

            $cseModel = new obstetrics_combinedSpinalEpiduralModel();
            $cseModel->where('dr_id',$dr_id);
            $data8  = $cseModel->where('patient_id',$id)->first();

            $csaModel = new obstetrics_CSA_Model();
            $csaModel->where('dr_id',$dr_id);
            $data9  = $csaModel->where('patient_id',$id)->first();

            if($data6 || $data7 || $data8 || $data9){
                $sin=['1,12,23'];
                $data['proccheck'] = $sin;
            }

            $Model = new obstetrics_EFeedbackModel();
            $Model->where('dr_id',$dr_id);
            $data1  = $Model->where('patient_id',$id)->where('submission',1)->first();

            $Models = new obstetrics_manuaFeedbackModel();
            $Models->where('dr_id',$dr_id);
            $data4  = $Models->where('patient_id',$id)->where('flag',1)->first();
            
            if($data1 || $data4){
                $sins=['1,5,10'];
                $data['feedcheck'] = $sins;
            }

            $models = new obstetrics_e_consentModel();
            $models->where('dr_id',$dr_id);
            $data12 = $models->where('patient_id',$id)->first();
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
            
            return view('obstetrics/patient_details',$data);
            
        }else{
            return view('login');
        }
        
    }
}
?>
