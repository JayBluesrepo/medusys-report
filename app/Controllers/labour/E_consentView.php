<?php namespace App\Controllers\labour;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\addPatientModel;

use App\Models\labour_e_consentModel;
use App\Models\labour_PreProcedureModel;
use App\Models\labour_post_procedureModel;
use App\Models\labour_FollowupModel;
use App\Models\labour_EpiduralModel;
use App\Models\labour_combinedSpinalEpiduralModel;
use App\Models\labour_CSA_Model;
use App\Models\labour_FeedbackModel;
use App\Models\labour_EFeedbackModel;
use App\Models\labour_SpinalModel;

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
            
            $model1 = new labour_e_consentModel(); 
            $detail = $model1->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data['info'] = $detail;

            $bsh=['d,e,f'];
            $data['eco'] = $bsh; 

            $patient_Model = new addPatientModel();
            $patient_Model->orderBy('id','DESC');
            $patient_Model->where('dr_id',$dr_id);  
            $patient_Model->select('id, rad_id');
            $patient_Model->like('upload_patient_status_labour',1);
            $dat1 = $patient_Model->get()->getResultArray();
            // if($dat1){
                $data['old_check'] = $dat1;
            // }
            
            $model1 = new labour_PreProcedureModel();
            $detail1 = $model1->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data['preo'] = $detail1;

            $model2 = new labour_post_procedureModel();
            $detail2 = $model2->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data['posto'] = $detail2;

            $model3 = new labour_FollowupModel();
            $detail3 = $model3->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data['follo'] = $detail3;

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

            $Models = new labour_FeedbackModel();
            $data4  = $Models->where('dr_id',$dr_id)->where('patient_id',$id)->where('flag',1)->first();
            
            if($data1 || $data4){
                $sins=['1,5,10'];
                $data['feedcheck'] = $sins;
            }

            $models = new labour_e_consentModel(); 
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
            
            return view('labour/e_consent_success',$data);
        }else{
            return view('login');
        }
        
    }   

    
}
?>

