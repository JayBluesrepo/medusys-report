<?php namespace App\Controllers\obstetrics;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\addPatientModel;

use App\Models\obstetrics_e_consentModel;
use App\Models\obstetrics_PreopModel;
use App\Models\obstetrics_PostopModel;
use App\Models\obstetrics_followupModel;
use App\Models\obstetrics_EpiduralModel;
use App\Models\obstetrics_combinedSpinalEpiduralModel;
use App\Models\obstetrics_CSA_Model;
use App\Models\FeedbackModel;
use App\Models\EFeedbackModel;
use App\Models\obstetrics_SpinalModel;
use App\Models\obstetrics_GaModel;


class E_consentView extends BaseController
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

        if($dr_id){
            $calc=[];       
            $model = new addPatientModel();        
            $model->orderBy('id','DESC');
            $model->where('dr_id',$dr_id);
            $details  = $model->get()->getResultArray();
            $data['patient'] = $details;
            $det = $model->where('id',$id)->first();
            $data['focus'] = $det;
            
            $model1 = new obstetrics_e_consentModel(); 
            $detail = $model1->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data['info'] = $detail;

            $bsh=['d,e,f'];
            $data['eco'] = $bsh; 

            $patient_Model = new addPatientModel();
            $patient_Model->orderBy('id','DESC');
            $patient_Model->where('dr_id',$dr_id);  
            $patient_Model->select('id, rad_id');
            $patient_Model->like('upload_patient_status_obstetric',1);
            $dat1 = $patient_Model->get()->getResultArray();
            // if($dat1){
                $data['old_check'] = $dat1;
            // }
            
            $model1 = new obstetrics_PreopModel();
            $detail1 = $model1->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data['preo'] = $detail1;

            $model2 = new obstetrics_PostopModel();
            $detail2 = $model2->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data['posto'] = $detail2;

            $model3 = new obstetrics_followupModel();
            $detail3 = $model3->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data['follo'] = $detail3;

            $epiModel = new obstetrics_EpiduralModel();
            $data6  = $epiModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();

            $spinModel = new obstetrics_SpinalModel();
            $data7  = $spinModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();

            $cseModel = new obstetrics_combinedSpinalEpiduralModel();
            $data8  = $cseModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();

            $csaModel = new obstetrics_CSA_Model();
            $data9  = $csaModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();

            $gaModel = new obstetrics_GaModel();
            $data911  = $gaModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();

            if($data6 || $data7 || $data8 || $data9 || $data911){
                $sin=['1,12,23'];
                $data['proccheck'] = $sin;
            }

            $Model = new EFeedbackModel();
            $data1  = $Model->where('dr_id',$dr_id)->where('patient_id',$id)->where('submission',1)->first();

            $Models = new FeedbackModel();
            $data4  = $Models->where('dr_id',$dr_id)->where('patient_id',$id)->where('flag',1)->first();
            
            if($data1 || $data4){
                $sins=['1,5,10'];
                $data['feedcheck'] = $sins;
            }

            $models = new obstetrics_e_consentModel(); 
            $data12 = $models->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data['ecocheck'] = $data12;

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
            
            return view('obstetrics/e_consent_success',$data);
        }else{
            return view('login');
        }
        
    }   

    
}
?>

