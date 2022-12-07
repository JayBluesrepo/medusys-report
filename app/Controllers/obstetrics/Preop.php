<?php namespace App\Controllers\obstetrics;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\addPatientModel;

use App\Models\obstetrics_PreopModel;
use App\Models\masterTypeModel;
use App\Models\MasterListModel;
use App\Models\obstetrics_PostopModel;
use App\Models\obstetrics_followupModel;
use App\Models\obstetrics_SpinalModel;
use App\Models\obstetrics_EpiduralModel;
use App\Models\obstetrics_combinedSpinalEpiduralModel;
use App\Models\obstetrics_CSA_Model;
use App\Models\obstetrics_manuaFeedbackModel;
use App\Models\obstetrics_EFeedbackModel;
use App\Models\obstetrics_e_consentModel;
use App\Models\obstetrics_GaModel;



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
            
            $model2 = new obstetrics_PreopModel(); 
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
            $patient_Model->like('upload_patient_status_obstetric',1);
            $dat1 = $patient_Model->get()->getResultArray();
            // if($dat1){
                $data['old_check'] = $dat1;
            // }
            
            $model4 = new obstetrics_PreopModel();
            $detail1 = $model4->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['preo'] = $detail1;

            $model5 = new obstetrics_PostopModel();
            $detail2 = $model5->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['posto'] = $detail2;

            $model3 = new obstetrics_followupModel();
            $detail3 = $model3->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['follo'] = $detail3;

            $epiModel = new obstetrics_EpiduralModel();
            $data6  = $epiModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            $spinModel = new obstetrics_SpinalModel();
            $data7  = $spinModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            $cseModel = new obstetrics_combinedSpinalEpiduralModel();
            $data8  = $cseModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            $csaModel = new obstetrics_CSA_Model();
            $data9  = $csaModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            $gaModel = new obstetrics_GaModel();
            $data911  = $gaModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            if($data6 || $data7 || $data8 || $data9 || $data911){
                $sin=['1,12,23'];
                $data['proccheck'] = $sin;
            }

            $Model = new obstetrics_EFeedbackModel();
            $data1  = $Model->where('dr_id',$dr_id)->where('patient_id',$patient_id)->where('submission',1)->first();

            $Models = new obstetrics_manuaFeedbackModel();
            $data4  = $Models->where('dr_id',$dr_id)->where('patient_id',$patient_id)->where('flag',1)->first();
            
            if($data1 || $data4){
                $sins=['1,5,10'];
                $data['feedcheck'] = $sins;
            }
            
            $models = new obstetrics_e_consentModel(); 
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
                return view('obstetrics/preopdetails',$data);
            }else{
                return view('obstetrics/Pre-op',$data);
            }  
        }else{
            return view('login');
        }   
    }

  

    public function add_preop(){

        $patient_id = session()->get('id');
        $drname = session()->get('name');
        $dr_id = session()->get('dr_id');

        $operation_cate = $this->request->getVar('optradio');
        $asa = $this->request->getVar('asa');
        $gravida = $this->request->getVar('gravida_parity'); 

        $Mellitus = $this->request->getVar('Mellitus');
        $CVS = $this->request->getVar('CVS');
        $Respi = $this->request->getVar('Respi');
        $Neuro = $this->request->getVar('Neuro');

        $Fever = $this->request->getVar('Fever');
        $Renal = $this->request->getVar('Renal');

        $Bleed = $this->request->getVar('Bleed');
        $Anaemia = $this->request->getVar('Anaemia');
        $Malignancy = $this->request->getVar('Malignancy');
        $Spine = $this->request->getVar('Spine');

        $other_extra = $this->request->getVar('other[]');
        $other_impo = implode($other_extra, ",");
        if($other_impo == '' || $other_impo == ','){
            $other = '';
        }else{
            $other_fil = $this->request->getVar('other[]');
            $other = implode($other_fil, ",");
        }

        $gestational_diabetes = $this->request->getVar('gestational_diabetes');
        $pih = $this->request->getVar('pih');
        $eclampsia = $this->request->getVar('eclampsia');
        $lscs = $this->request->getVar('lscs');
        $placental_abnormalities = $this->request->getVar('placental_abnormalities');
        $premature_rupture = $this->request->getVar('premature_rupture');
        $previous_failed = $this->request->getVar('previous_failed');

        $obstetric_other_extra = $this->request->getVar('obstetric_other[]');
        $obstetric_other_extra_impo = implode($obstetric_other_extra, ",");

        if($obstetric_other_extra_impo == '' || $obstetric_other_extra_impo == ','){
            $obstetric_other = '';
        }else{
            $obstetric_other1= $this->request->getVar('obstetric_other[]');
            $obstetric_other = implode($obstetric_other1, ",");
        }
        // $obstetric_other_input = $this->request->getVar('obstetric_other_input');

        $malposition = $this->request->getVar('malposition');
        $iugr = $this->request->getVar('iugr');
        $large_gestational = $this->request->getVar('large_gestational');
        
        $foetal_other_extra = $this->request->getVar('foetal_other[]'); 
        $foetal_other_extra_impo = implode($foetal_other_extra, ",");


        if($foetal_other_extra_impo == '' || $foetal_other_extra_impo == ','){
            $foetal_other= '';
        }else{
            $foetal_other1= $this->request->getVar('foetal_other[]');
            $foetal_other = implode($foetal_other1, ",");
        }
        // $foetal_other_input = $this->request->getVar('foetal_other_input'); 

        $gestational_age = $this->request->getVar('gestational_age'); 
        $anaesthesia_administered = $this->request->getVar('anaesthesia_administered'); 

        $speciality_option = $this->request->getVar('surgery_list'); 

        if($speciality_option == 'Lower Segment Caesarean Section (LSCS)'){
            $surgery_list = $this->request->getVar('surgery_list'); 
            $category_lscs = $this->request->getVar('category_lscs'); 
            $indication_options = $this->request->getVar('indication_options'); 
            $surgery_list_options = $surgery_list.','.$category_lscs.','.$indication_options;
            $surgery_list_other = '';
        }else if($speciality_option == 'Other'){
            $surgery_list_options = $this->request->getVar('surgery_list'); 
            $surgery_list_other_array = $this->request->getVar('surgery_list_other'); 
            $surgery_list_other = implode(",",$surgery_list_other_array); 
            
        }else{
            $surgery_list_options = $this->request->getVar('surgery_list'); 
            $surgery_list_other = '';
        }

        // $speciality = $this->request->getVar('speciality');

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
            'surgery_list_options'=>$surgery_list_options,
            'surgery_list_other'=>$surgery_list_other,
            'patient_id'=>$patient_id,
            'speciality'=> $speciality,
            'asa'=>$asa,
            'diabetes_mellitus'=>$Mellitus,
            'cvs_disease'=>$CVS,
            'respiratory_disease'=>$Respi,
            'neurological_disorder'=>$Neuro,
            'renal_disorder'=>$Renal,
            'spin_back_problem'=>$Spine,
            'fever_infection'=>$Fever,
            'bleeding_disorder'=>$Bleed,
            'anaemia'=>$Anaemia,
            'malignancy'=>$Malignancy,
            'other'=>$other,
            'operation_cate'=>$operation_cate,
            'gravida'=>$gravida,
            'gestational_diabetes'=>$gestational_diabetes,
            'pih'=>$pih,
            'eclampsia'=>$eclampsia,
            'lscs'=>$lscs,
            'placental'=>$placental_abnormalities,
            'premature'=>$premature_rupture,
            'previous'=>$previous_failed,
            'obstetric_other'=>$obstetric_other,
            'malposition'=>$malposition,
            'lugr'=>$iugr,
            'large_gestational'=>$large_gestational,
            'foetal_other'=>$foetal_other,
            'gestational_age'=>$gestational_age,        
            'anaesthesia_administered'=>$anaesthesia_administered,
            'preop_status'=>1,
            'flag'=>1,
            'created_by'=>$drname,
            'dr_id'=>$dr_id
        );

        $preopModel = new obstetrics_PreopModel(); 
        $preopModel->save($preopData);
        $insertedID = $preopModel->insertID();

        if($insertedID){
            return json_encode(array(
                'result'    => 1,
                'message'     => 'data Added Successfully.....',
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
