<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\addPatientModel;
use App\Models\CSA_Model;
use App\Models\MasterListModel;
use App\Models\PreopModel;
use App\Models\PostopModel;
use App\Models\FollowupModel;
use App\Models\SpinalModel;
use App\Models\combinedSpinalEpiduralModel;
use App\Models\EpiduralModel;
use App\Models\FeedbackModel;
use App\Models\EFeedbackModel;
use App\Models\e_consentModel;

class CSA_add_view extends BaseController
{   
    use ResponseTrait;
	public function __construct()
	{
		helper(['form','url']);
	}

    public function index(){          

        $csa_id = $this->request->getVar('id');
        $patient_id = session()->get('id');
        // print_r($csa_id);die();

        $model = new addPatientModel();        
        $details  = $model->get()->getResultArray();
        $data['patient'] = $details;
        $det = $model->where('id',$patient_id)->first();
        $data['focus'] = $det;
        
        $model1 = new CSA_Model(); 
        $detail = $model1->where('id',$csa_id)->first();
        $data['info'] = $detail;

        $dmf=['j,k,l'];
        $data['procs'] = $dmf; 
      
        $model1 = new PreopModel();
        $detail1 = $model1->where('patient_id',$patient_id)->first();
        $data['preo'] = $detail1;

        $model2 = new PostopModel();
        $detail2 = $model2->where('patient_id',$patient_id)->first();
        $data['posto'] = $detail2;

        $model3 = new FollowupModel();
        $detail3 = $model3->where('patient_id',$patient_id)->first();
        $data['follo'] = $detail3;

        $epiModel = new EpiduralModel();
        $data6  = $epiModel->where('patient_id',$patient_id)->first();

        $spinModel = new SpinalModel();
        $data7  = $spinModel->where('patient_id',$patient_id)->first();

        $cseModel = new combinedSpinalEpiduralModel();
        $data8  = $cseModel->where('patient_id',$patient_id)->first();

        $csaModel = new CSA_Model();
        $data9  = $csaModel->where('patient_id',$patient_id)->first();

        if($data6 || $data7 || $data8 || $data9){
            $sin=['1,12,23'];
            $data['proccheck'] = $sin;
        }

        $Model = new EFeedbackModel();
        $data1  = $Model->where('patient_id',$patient_id)->where('submission',1)->first();

        $Models = new FeedbackModel();
        $data4  = $Models->where('patient_id',$patient_id)->where('flag',1)->first();
        
        if($data1 || $data4){
            $sins=['1,5,10'];
            $data['feedcheck'] = $sins;
        }

        $models = new e_consentModel(); 
        $data12 = $models->where('patient_id',$patient_id)->first();
        $data['ecocheck'] = $data12;
        
        return view('add_csa_view',$data);       
       
    }   
    
    

    
}
?>

