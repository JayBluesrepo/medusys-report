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


class Preop extends BaseController
{
    use ResponseTrait;
	public function __construct()
	{
		helper(['form','url']);
	}

    public function index()
    {  
        //echo 'Hello';
        //die();
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
            
            $model2 = new labour_PreProcedureModel(); 
            $detail = $model2->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['info'] = $detail;
            $flag = $detail['flag'];
            $preop_status = $detail['preop_status'];          

            $csh=['g,h,i'];
            $data['pre'] = $csh; 
            
            $patient_Model = new addPatientModel();
            $patient_Model->orderBy('id','DESC');
            $patient_Model->where('dr_id',$dr_id);  
            $patient_Model->select('id, rad_id');
            $patient_Model->like('upload_patient_status_labour',1);
            $dat1 = $patient_Model->get()->getResultArray();
            // if($dat1){
                $data['old_check'] = $dat1;
            // }
            
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
            $data8  = $cseModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            $csaModel = new labour_CSA_Model();
            $data9  = $csaModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            if($data6 || $data7 || $data8 || $data9){
                $sin=['1,12,23'];
                $data['proccheck'] = $sin;
            }

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
            if($flag == '1' && $preop_status == '1'){
                
                $cos=['4,5,6'];
                $data['precheck'] = $cos;
                return view('labour/preopdetails',$data);
            }else{
                return view('labour/Pre-op',$data);
            }  
        }else{
            return view('login');
        }   
    }

  

    public function add_preop(){
        //print_r($_POST);
        //die();
        $patient_id = session()->get('id');
        $drname = session()->get('name');
        $dr_id = session()->get('dr_id');

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

        $other_extra = $this->request->getVar('other[]');
        $other_impo = implode($other_extra, ",");
        if($other_impo == '' || $other_impo == ','){
            $other = '';
        }else{
            $other_fil = $this->request->getVar('other[]');
            $other = implode($other_fil, ",");
        }
        // print_r($other);die();

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
            $pharma_other_input = $this->request->getVar('pharma_other_input'); 
            $pharma_other_input_implode = implode($pharma_other_input, ",");
            $pharma_other = $pharma_other1.','.$pharma_other_input_implode;
            //$pharma_other = $pharma_other_input_implode;
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
            $non_pharma_other_input = $this->request->getVar('non_pharma_other_input');

            $non_pharma_other_input_implode = implode($non_pharma_other_input, ",");

            $non_pharma_other = $non_pharma_other1.','.$non_pharma_other_input_implode;
            //$non_pharma_other = $non_pharma_other_input_implode;
        }
        
        //echo $pharma_other;
        //die();

        $Monitoring = $this->request->getVar('Monitoring');
        $Resusci = $this->request->getVar('Resusci');
        $Lipid = $this->request->getVar('Lipid');
        $Timeout = $this->request->getVar('Timeout');
        $Consent = $this->request->getVar('Consent');


        // $Purpose = $this->request->getVar('Purpose');

        $preopData = array(
            'dr_id'=>$dr_id,
            'patient_id'=> $patient_id,
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
           
            'created_by'=> $drname,
           
            'preop_status'=> 1,
            'flag'=>1,        
            
        );

        // print_r($preopData);die();

        $preopModel = new labour_PreProcedureModel(); 
        $preopModel->save($preopData);
        $insertedID = $preopModel->insertID();       


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
