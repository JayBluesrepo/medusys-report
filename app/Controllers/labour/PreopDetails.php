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
use App\Models\labour_FeedbackModel;
use App\Models\labour_EFeedbackModel;
use App\Models\labour_e_consentModel;


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
            
            $model1 = new labour_PreProcedureModel(); 
            $detail = $model1->where('dr_id',$dr_id)->where('id',$preop_id)->first();
            $data['info'] = $detail;

            

            $csh=['g,h,i'];
            $data['pre'] = $csh; 

            $model4 = new labour_PreProcedureModel();
            $detail1 = $model4->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['preo'] = $detail1;

            $model5 = new labour_post_procedureModel();
            $detail2 = $model5->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['posto'] = $detail2;

            $model3 = new labour_FollowupModel();
            $detail3 = $model3->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['follo'] = $detail3;

            $epiModel = new labour_EpiduralModel();
            $data6  = $epiModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            $spinModel = new labour_SpinalModel();
            $data7  = $spinModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            $cseModel = new labour_combinedSpinalEpiduralModel();
            $data8  = $cseModel->where('patient_id',$patient_id)->first();

            $csaModel = new labour_CSA_Model();
            $data9  = $csaModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            if($data6 || $data7 || $data8 || $data9){
                $sin=['1,12,23'];
                $data['proccheck'] = $sin;
            }

            $patient_Model = new addPatientModel();
            $patient_Model->orderBy('id','DESC');
            $patient_Model->where('dr_id',$dr_id);  
            $patient_Model->select('id, rad_id');
            $patient_Model->like('upload_patient_status_labour',1);
            $dat1 = $patient_Model->get()->getResultArray();
            // if($dat1){
                $data['old_check'] = $dat1;
            // }
            
            $cos=['4,5,6'];
            $data['precheck'] = $cos;

            $Model = new labour_EFeedbackModel();
            $data1  = $Model->where('dr_id',$dr_id)->where('patient_id',$patient_id)->where('submission',1)->first();

            $Models = new labour_FeedbackModel();
            $data4  = $Models->where('dr_id',$dr_id)->where('patient_id',$patient_id)->where('flag',1)->first();
            
            if($data1 || $data4){
                $sins=['1,5,10'];
                $data['feedcheck'] = $sins;
            }

            $models = new labour_e_consentModel(); 
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
            
            return view('labour/preopdetails',$data);

        }else{
            return view('login');
        }
    }

    

    public function edit_preop(){

        $id = $this->request->getVar('id');
        // print_r($id);die();
        $drname = session()->get('name');
        $dr_id = session()->get('dr_id');

        // $speciality = $this->request->getVar('speciality');
        // $sur_location = $this->request->getVar('sur_location');
        // $surgery = $this->request->getVar('surgery');
        // $min_invas = $this->request->getVar('min_invas'); 
        // $optradio = $this->request->getVar('optradio');
        // $asa = $this->request->getVar('asa');
        // $Mellitus = $this->request->getVar('Mellitus');
        // $CVS = $this->request->getVar('CVS');
        // $Respi = $this->request->getVar('Respi');
        // $Fever = $this->request->getVar('Fever');
        // $Renal = $this->request->getVar('Renal');
        // $Bleed = $this->request->getVar('Bleed');
        // $Anaemia = $this->request->getVar('Anaemia');
        // $Malignancy = $this->request->getVar('Malignancy');
        // $Spine = $this->request->getVar('Spine');
        // $Neuro = $this->request->getVar('Neuro');
        // $other = $this->request->getVar('other');
        // $Purpose = $this->request->getVar('Purpose');
        // $Lipid = $this->request->getVar('Lipid');
        // $Resusci = $this->request->getVar('Resusci');
        // $Consent = $this->request->getVar('Consent');
        // $Timeout = $this->request->getVar('Timeout');
        // $Monitoring = $this->request->getVar('Monitoring');

        
        $speciality = $this->request->getVar('speciality');
        $operation_cate = $this->request->getVar('optradio');
        $asa = $this->request->getVar('asa');
        $gravida_parity = $this->request->getVar('gravida_parity'); 

        

        $Mellitus = $this->request->getVar('Mellitus');
        $CVS = $this->request->getVar('CVS');
        $Respi = $this->request->getVar('Respi');
        $Neuro = $this->request->getVar('Neuro');
        $Renal = $this->request->getVar('Renal');
        $Spine = $this->request->getVar('Spine');
        $Fever = $this->request->getVar('Fever');

        $Bleed = $this->request->getVar('Bleed');
        $Anaemia = $this->request->getVar('Anaemia');
        $Malignancy = $this->request->getVar('Malignancy');

        $other_extra = $this->request->getVar('other');


        if($other_extra == ''){
            $other = '';
        }else{
            $other = implode($this->request->getVar('other'), ",");

        }

        $gestational_diabetes = $this->request->getVar('gestational_diabetes');
        $pih = $this->request->getVar('pih');
        $eclampsia = $this->request->getVar('eclampsia');
        $lscs = $this->request->getVar('lscs');
        $placental_abnormalities = $this->request->getVar('placental_abnormalities');
        $premature_rupture = $this->request->getVar('premature_rupture');
        $previous_failed = $this->request->getVar('previous_failed');
        $obstetric_other_extra = $this->request->getVar('obstetric_other');

        if($obstetric_other_extra == ''){
            $obstetric_other = $this->request->getVar('obstetric_other');
        }else{
           
            $obstetric_other = implode($this->request->getVar('obstetric_other'), ",");
        }

        $malposition = $this->request->getVar('malposition');
        $iugr = $this->request->getVar('iugr');
        $large_gestational = $this->request->getVar('large_gestational');

        $foetal_other_extra = $this->request->getVar('foetal_other'); 

        if($foetal_other_extra == ''){
            $foetal_other= '';
        }else{
             $foetal_other = implode($this->request->getVar('foetal_other'), ",");
        }

        $gestational_age = $this->request->getVar('gestational_age'); 
        $cervical = $this->request->getVar('cervical'); 
        $onset_labour = $this->request->getVar('onset_labour'); 
        $entonox = $this->request->getVar('entonox'); 
        $atypical = $this->request->getVar('atypical'); 
        $pnb = $this->request->getVar('pnb'); 
        $cnb = $this->request->getVar('cnb'); 

        $pharma_other_check = $this->request->getVar('pharma_other'); 

        // print_r($pharma_other);die();
        if($pharma_other_check == 'No'){
            $pharma_other = $this->request->getVar('pharma_other'); 
        }else{
            $pharma_other1 = $this->request->getVar('pharma_other'); 
            $pharma_other_input = implode($this->request->getVar('pharma_other_input'), ",");
            $pharma_other = $pharma_other1.','.$pharma_other_input;
        }

        $biofeed = $this->request->getVar('biofeed'); 
        $acupressure = $this->request->getVar('acupressure'); 
        $tens = $this->request->getVar('tens'); 
        $relaxation = $this->request->getVar('relaxation'); 
        $non_pharma_other_check = $this->request->getVar('non_pharma_other');
        
        if($non_pharma_other_check == 'No'){
            $non_pharma_other = $this->request->getVar('non_pharma_other');
        }else{
            $non_pharma_other1 = $this->request->getVar('non_pharma_other');
            $non_pharma_other_input = implode($this->request->getVar('non_pharma_other_input'), ",");
            $non_pharma_other = $non_pharma_other1.','.$non_pharma_other_input;
        }
        


        $Monitoring = $this->request->getVar('Monitoring');
        $Resusci = $this->request->getVar('Resusci');
        $Lipid = $this->request->getVar('Lipid');
        $Timeout = $this->request->getVar('Timeout');
        $Consent = $this->request->getVar('Consent');

        date_default_timezone_set('Asia/Kolkata');
        $updated_at = date('d-m-Y H:i:s', time());

        $newData = array(
            // 'speciality'=> $speciality,
            // 'surgery_location'=> $sur_location,
            // 'surgery'=>$surgery,
            // 'minimally_invasive'=>$min_invas,
            // 'category'=> $optradio,
            // 'asa'=> $asa,
            // 'diabetes_mellitus'=> $Mellitus,
            // 'cvs_disease' => $CVS,
            // 'respiratory_disease'=> $Respi,
            // 'neurological_disorder'=> $Neuro,            
            // 'renal_disorder'=> $Renal,
            // 'spin_back_problem'=> $Spine,
            // 'fever_infection'=> $Fever,
            // 'bleeding_disorder'=> $Bleed,
            // 'anaemia'=>$Anaemia,
            // 'malignancy'=> $Malignancy,
            // 'other'=> $other,
            // 'purpose'=> $Purpose,
            // 'basic_monitering'=> $Monitoring,
            // 'lipid_rescue'=> $Lipid,
            // 'resuscitation_eq'=> $Resusci,
            // 'consent_taken'=> $Consent,
            // 'timeout'=> $Timeout,
            'speciality'=> $speciality,
            'asa'=>$asa,
            'diabetes_mellitus'=>$Mellitus,
            'cvs_disease'=> $CVS,
            'respiratory_disease'=> $Respi,
        
            'neurological_disorder'=> $Neuro,
            'renal_disorder' => $Renal,
            'spin_back_problem'=> $Spine,
        
            'fever_infection'=> $Fever,            
            'bleeding_disorder'=> $Bleed,
            'anaemia'=> $Anaemia,
            'malignancy'=> $Malignancy,
            'other'=> $other,
        
            'operation_cate'=>$operation_cate,
            'gravida'=> $gravida_parity,
            // 'gestational_parity'=> $gravida_parity,
            'gestational_diabetes'=> $gestational_diabetes,
            'pih'=> $pih,
            'eclampsia'=> $eclampsia,
            'lscs'=> $lscs,
            'placental'=> $placental_abnormalities,
            'premature'=> $premature_rupture,
            'previous'=>$previous_failed,
            'obstetric_other'=>$obstetric_other,
            'malposition'=>$malposition,
            'lugr'=>$iugr,
            'large_gestational'=> $large_gestational,
            'foetal_other'=>$foetal_other,
            'gestational_age'=> $gestational_age,
            'cervical'=> $cervical,
            'onset_labour'=> $onset_labour,
            'entonox'=> $entonox,
            'atypical'=> $atypical,
            'pnb'=> $pnb,
            'cnb'=> $cnb,
            'pharmacological_other'=> $pharma_other,
            'bio_feedback'=>$biofeed,
            'acupressure'=>$acupressure,
            'tens'=>$tens,
            'relaxation'=>$relaxation,
        
            'non_pharma_other'=>$non_pharma_other,
            'basic_monitering'=> $Monitoring,
            'lipid_rescue'=>$Lipid,
            'resuscitation_eq'=> $Resusci,
            'consent_taken'=> $Consent,
            'timeout'=> $Timeout,
            'updated_at'=> $updated_at,
            'updated_by'=>$drname
        );
        //print_r($newData); 
       //die();
        $SaveModel = new labour_PreProcedureModel(); 
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
