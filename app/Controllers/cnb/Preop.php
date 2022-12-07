<?php namespace App\Controllers\cnb;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\addPatientModel;
use App\Models\PreopModel;
use App\Models\masterTypeModel;
use App\Models\MasterListModel;
use App\Models\PostopModel;
use App\Models\FollowupModel;
use App\Models\SpinalModel;
use App\Models\EpiduralModel;
use App\Models\combinedSpinalEpiduralModel;
use App\Models\CSA_Model;
use App\Models\FeedbackModel;
use App\Models\EFeedbackModel;
use App\Models\e_consentModel;


class Preop extends BaseController
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
            $calc=[];
            $model = new addPatientModel();  
            $model->where('dr_id',$dr_id);      
            $model->orderBy('id','DESC');
            $details  = $model->get()->getResultArray();
            $data['patient'] = $details;
            $det = $model->where('id',$patient_id)->first();
            $data['focus'] = $det;
            
            $model2 = new PreopModel(); 
            $detail = $model2->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['info'] = $detail;
            $flag = $detail['flag'];
            $preop_status = $detail['preop_status'];
            
            $model1 = new masterTypeModel();
            $model1->limit(9);
            $model1->groupBy('master_type')->orderBy('id','ASC');
            $master_type = $model1->get()->getResultArray();
            $data['master_type'] = $master_type; 

            // print_r($master_type);die();

            $csh=['g,h,i'];
            $data['pre'] = $csh; 
            
            $patient_Model = new addPatientModel();
            $patient_Model->orderBy('id','DESC');
            $patient_Model->where('dr_id',$dr_id);  
            $patient_Model->select('id, rad_id');
            $patient_Model->like('upload_patient_status',1);
            $dat1 = $patient_Model->get()->getResultArray();
            // if($dat1){
                $data['old_check'] = $dat1;
            // }
            
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
            $data8  = $cseModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            $csaModel = new CSA_Model();
            $data9  = $csaModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            if($data6 || $data7 || $data8 || $data9){
                $sin=['1,12,23'];
                $data['proccheck'] = $sin;
            }

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

            if($flag == '1' && $preop_status == '1'){
                $cos=['4,5,6'];
                $data['precheck'] = $cos;
                return view('cnb/preopdetails',$data);
            }else{
                return view('cnb/Pre-op',$data);
            }  
        }else{
            return view('login');
        }   
    }

    public function search_option(){

        $sul = $this->request->getVar('sul');
        $sul1 = explode('-',$sul);
        // print_r($sul1[0]);die();
        $model = new MasterListModel();  
        $model->select('name');
        $model->where('master_type_id',$sul1[0])->orderBy('id','ASC');
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

    public function add_preop(){

        $patient_id = session()->get('id');
        $drname = session()->get('name');
        $dr_id = session()->get('dr_id');

        $speciality = $this->request->getVar('speciality');
        $sur_location1 = $this->request->getVar('sur_location');
        $sur_location = explode('-',$sur_location1);        
        $surgery = $this->request->getVar('surgery');

        // print_r($surgery);
        // print_r($sur_location[0]);
        // print_r($sur_location[1]);
        // die();

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

        $speciality1 = $this->request->getVar('speciality');

        if($speciality1 == 'Other'){
            $speciality = $this->request->getVar('speciality');
            $speciality_other = $this->request->getVar('speciality_other');
        }else{
            $speciality = $this->request->getVar('speciality');
            $speciality_other = '';
        }




        $preopData = array(
            'speciality_other'=>$speciality_other,
            'patient_id'=>$patient_id,
            'speciality'=> $speciality,
            'surgery_location'=> $sur_location[1],
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
            'preop_status'=>1,
            'flag'=>1,
            'created_by'=>$drname,
            'dr_id'=>$dr_id
        );

        $preopModel = new PreopModel(); 
        $preopModel->save($preopData);
        $insertedID = $preopModel->insertID();

        // $add_preop_list = array(
        //     'master_type_id'=>$sur_location[0],
        //     'master_type_name'=>$sur_location[1],
        //     'name'=>$surgery
        // );

        // $listmodel = new MasterListModel(); 
        // $listmodel->save($add_preop_list);
        // $list_insert = $listmodel->insertID();


        if($insertedID){
            return json_encode(array(
                'result'    => 1,
                'message'     => 'Preop data Added Successfully.....',
                'msg' => $insertedID
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
