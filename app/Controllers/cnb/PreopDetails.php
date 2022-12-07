<?php namespace App\Controllers\cnb;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\addPatientModel;
use App\Models\PreopModel;
use App\Models\PostopModel;
use App\Models\FollowupModel;
use App\Models\SpinalModel;
use App\Models\EpiduralModel;
use App\Models\combinedSpinalEpiduralModel;
use App\Models\CSA_Model;
use App\Models\FeedbackModel;
use App\Models\EFeedbackModel;
use App\Models\e_consentModel;
use App\Models\masterTypeModel;
use App\Models\MasterListModel;

class PreopDetails extends BaseController
{   
    use ResponseTrait;
	public function __construct()
	{
		helper(['form','url']);
	}
    
    public function index()
    {
        $dr_id = session()->get('dr_id');
        $patient_id = session()->get('id');

        if($dr_id){
            $preop_id = $this->request->getVar('id');
            $calc=[];
            $model = new addPatientModel(); 
            $model->where('dr_id',$dr_id);
            $model->orderBy('id','DESC');
            $details  = $model->get()->getResultArray();
            $data['patient'] = $details;
            $det = $model->where('id',$patient_id)->first();
            $data['focus'] = $det;
            
            $model1 = new PreopModel(); 
            $detail = $model1->where('dr_id',$dr_id)->where('id',$preop_id)->first();
            $data['info'] = $detail;

            $model_master = new masterTypeModel();
            $model_master->limit(9);
            $model_master->groupBy('master_type')->orderBy('id','ASC');
            $master_type = $model_master->get()->getResultArray();
            $data['master_type'] = $master_type; 

            $csh=['g,h,i'];
            $data['pre'] = $csh; 

            $model4 = new PreopModel();
            $detail1 = $model4->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['preo'] = $detail1;

            $model5 = new PostopModel();
            $detail2 = $model5->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['posto'] = $detail2;

            $model3 = new FollowupModel();
            $detail3 = $model3->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['follo'] = $detail3;

            $epiModel = new EpiduralModel();
            $data6  = $epiModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            $spinModel = new SpinalModel();
            $data7  = $spinModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            $cseModel = new combinedSpinalEpiduralModel();
            $data8  = $cseModel->where('patient_id',$patient_id)->first();

            $csaModel = new CSA_Model();
            $data9  = $csaModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            if($data6 || $data7 || $data8 || $data9){
                $sin=['1,12,23'];
                $data['proccheck'] = $sin;
            }

            $patient_Model = new addPatientModel();
            $patient_Model->orderBy('id','DESC');
            $patient_Model->where('dr_id',$dr_id);  
            $patient_Model->select('id, rad_id');
            $patient_Model->like('upload_patient_status',1);
            $dat1 = $patient_Model->get()->getResultArray();
            // if($dat1){
                $data['old_check'] = $dat1;
            // }
            
            $cos=['4,5,6'];
            $data['precheck'] = $cos;

            $Model = new EFeedbackModel();
            $data1  = $Model->where('dr_id',$dr_id)->where('patient_id',$patient_id)->where('submission',1)->first();

            $Models = new FeedbackModel();
            $data4  = $Models->where('dr_id',$dr_id)->where('patient_id',$patient_id)->where('flag',1)->first();
            
            if($data1 || $data4){
                $sins=['1,5,10'];
                $data['feedcheck'] = $sins;
            }

            $models = new e_consentModel(); 
            $data12 = $models->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
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
                $data2  = $model4->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                $data3  = $model5->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                $data4  = $model3->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                if($data1 && $data2 && $data3 && $data4 && $data9 && $data12){
                    $datas['id'] = $id;
                    array_push($calc,$datas);
                }
            }
            $data['allcheck'] = $calc;
            
            return view('cnb/preopdetails',$data);

        }else{
            return view('login');
        }
    }

    public function search_option(){

        $sul = $this->request->getVar('sul');
        // $sul1 = explode('-',$sul);
        // print_r($sul1[0]);die();
        $model = new MasterListModel();  
        $model->select('name');
        $model->where('master_type_name',$sul)->orderBy('id','ASC');
        $details = $model->findAll();
        
        if($details){
            return json_encode(array(
                'result'    => 1,
                'message'   => $details
            ));
        }
        else{
        	return json_encode(array(
                'result'    => 0,
                'message'     => 'No data Found'
            ));
        }

        // print_r($details);
        // die();
    }

    public function edit_preop(){
        $id = $this->request->getVar('id');
        // print_r($id);die();
        $drname = session()->get('name');
        $dr_id = session()->get('dr_id');

        $sur_location = $this->request->getVar('sur_location');
        $surgery = $this->request->getVar('surgery');
        $min_invas = $this->request->getVar('min_invas'); 
        $optradio = $this->request->getVar('optradio');
        $asa = $this->request->getVar('asa');
        $Mellitus = $this->request->getVar('Mellitus');
        $CVS = $this->request->getVar('CVS');
        $Respi = $this->request->getVar('Respi');
        $Fever = $this->request->getVar('Fever');
        $Renal = $this->request->getVar('Renal');
        $Bleed = $this->request->getVar('Bleed');
        $Anaemia = $this->request->getVar('Anaemia');
        $Malignancy = $this->request->getVar('Malignancy');
        $Spine = $this->request->getVar('Spine');
        $Neuro = $this->request->getVar('Neuro');
        $other = $this->request->getVar('other');
        $Purpose = $this->request->getVar('Purpose');
        $Lipid = $this->request->getVar('Lipid');
        $Resusci = $this->request->getVar('Resusci');
        $Consent = $this->request->getVar('Consent');
        $Timeout = $this->request->getVar('Timeout');
        $Monitoring = $this->request->getVar('Monitoring');

        date_default_timezone_set('Asia/Kolkata');
        $updated_at = date('d-m-Y H:i:s', time());

        $speciality1 = $this->request->getVar('speciality');

        if($speciality1 == 'Other'){
            $speciality = $this->request->getVar('speciality');
            $speciality_other = $this->request->getVar('speciality_other');
        }else{
            $speciality = $this->request->getVar('speciality');
            $speciality_other = '';
        }


        $newData = array(
            
            'speciality_other'=>$speciality_other,
            'speciality'=> $speciality,
            'surgery_location'=> $sur_location,
            'surgery'=>$surgery,
            'minimally_invasive'=>$min_invas,
            'category'=> $optradio,
            'asa'=> $asa,
            'diabetes_mellitus'=> $Mellitus,
            'cvs_disease' => $CVS,
            'respiratory_disease'=> $Respi,
            'neurological_disorder'=> $Neuro,            
            'renal_disorder'=> $Renal,
            'spin_back_problem'=> $Spine,
            'fever_infection'=> $Fever,
            'bleeding_disorder'=> $Bleed,
            'anaemia'=>$Anaemia,
            'malignancy'=> $Malignancy,
            'other'=> $other,
            'purpose'=> $Purpose,
            'basic_monitering'=> $Monitoring,
            'lipid_rescue'=> $Lipid,
            'resuscitation_eq'=> $Resusci,
            'consent_taken'=> $Consent,
            'timeout'=> $Timeout,
            'updated_at'=> $updated_at,
            'updated_by'=>$drname
        );
        $SaveModel = new PreopModel(); 
        $SaveModel->set($newData);
        $SaveModel->where('id',$id);
        $SaveModel->where('dr_id',$dr_id);
        $update = $SaveModel->update();

        if($update){
            return json_encode(array(
                'result'    => 1,
                'message'     => 'Preop data Updated Successfully.....'
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
