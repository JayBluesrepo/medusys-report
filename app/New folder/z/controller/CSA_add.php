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

class CSA_add extends BaseController
{
    use ResponseTrait;
	public function __construct()
	{
		helper(['form','url']);
	}
    
    public function index()
    {
        $patient_id = session()->get('id');
        // print_r($patient_id);die();

        $model = new addPatientModel();       
        $details  = $model->get()->getResultArray();
        $data['patient'] = $details; 
        $det = $model->where('id',$patient_id)->first();
        $data['focus'] = $det;

        $model1 = new CSA_Model(); 
        $detail = $model1->where('patient_id',$patient_id)->first();
        $data['info'] = $detail;

        $model = new MasterListModel();        
        $model->where('master_type_name','Spinal Needle Brand')->orderBy('id','ASC');
        $details  = $model->get()->getResultArray();
        $data['spinal_needle_brand'] = $details;

        $model = new MasterListModel();        
        $model->where('master_type_name','Spinal Needle Type')->orderBy('id','ASC');
        $details  = $model->get()->getResultArray();
        $data['spinal_needle_type'] = $details;

        $success_stat = $detail['success'];
        $success_status = (array)$success_stat;
        $data['success_status'] = $success_status;

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

        $preop = new PreopModel();        
        $ga = $preop->where('patient_id',$patient_id)->first();
        $data['ga'] = $ga['purpose'];
        
        if(!empty($detail)){
            return view('add_csa_view',$data);
        }else{
            return view('add-csa',$data);
        } 
    }

    public function csa_procedure(){
        $patient_id = session()->get('id');

        $patient_status = $this->request->getVar('optradio');
        if($patient_status == 'Sedation'){
            $neuraxial1 = $this->request->getVar('sedation_if');
            $neuraxial = $patient_status.' - '.$neuraxial1;
        }else{
            $neuraxial = $this->request->getVar('optradio');
        } 
        $patient_position = $this->request->getVar('patient_pos');
        $wearing_mask = $this->request->getVar('wearing_mask');
        $hand_washing = $this->request->getVar('hand_washing');
        $sterile_gown = $this->request->getVar('sterile_gown');
        $sterile_draping = $this->request->getVar('sterile_draping');
        $skin_prep = $this->request->getVar('skin_prep');
        $csa = $this->request->getVar('csa');
        $anatomical_landmark = $this->request->getVar('anatomical_landmark');
        $ultrasound = $this->request->getVar('ultrasoun');
        $probe_cover = $this->request->getVar('probe_cover');
        $image_quality = $this->request->getVar('image_quality');
        $csa_spinal_level = $this->request->getVar('csa_spinal_level');
        $csa_spinal_level_name = $this->request->getVar('csa_spinal_level_name');


        $needle_brand1 = $this->request->getVar('needle_brand');
        if($needle_brand1 == 'Other'){
            $needle_brand_other = $this->request->getVar('needle_brand_other');
            $needle_brand = $needle_brand1.' - '.$needle_brand_other;
        }else{
            $needle_brand = $this->request->getVar('needle_brand');
        }

        $needle_type1 = $this->request->getVar('needle_type');
        if($needle_type1 == 'Other'){
            $needle_type_other = $this->request->getVar('needle_type_other');
            $needle_type = $needle_type1.' - '.$needle_type_other; 
        }else{
            $needle_type = $this->request->getVar('needle_type');
        }       
        $needle_size = $this->request->getVar('needle_size');
        $approach = $this->request->getVar('approach');
        $no_attempts = $this->request->getVar('no_attempts');
        $catheter_type = $this->request->getVar('catheter_type');
        $catheter_skin_mark = $this->request->getVar('catheter_skin_mark');
        $la_regimen = $this->request->getVar('la_regimen');

        $lignocaine_option = $this->request->getVar('spinal_lignoca_option1');
        $lignocaine_persent = $this->request->getVar('spinal_lignoca_persent1');
        $lignocaine_ml = $this->request->getVar('spinal_lignoca_ml1');
        $lignocaine_mg = $this->request->getVar('spinal_lignoca_mg1');
        $lignocaine = $lignocaine_option.','.$lignocaine_persent.','.$lignocaine_ml.','.$lignocaine_mg;

        $bupivacaine_option = $this->request->getVar('spinal_bupivaca_option2');
        $bupivacaine_persent = $this->request->getVar('spinal_bupivaca_persent2');
        $bupivacaine_ml = $this->request->getVar('spinal_bupivaca_ml2');
        $bupivacaine_mg = $this->request->getVar('spinal_bupivaca_mg2');
        $bupivacaine = $bupivacaine_option.','.$bupivacaine_persent.','.$bupivacaine_ml.','.$bupivacaine_mg;

        $ropivacaine_option = $this->request->getVar('spinal_ropivaca_option3');
        $ropivacaine_persent = $this->request->getVar('spinal_ropivaca_persent3');
        $ropivacaine_ml = $this->request->getVar('spinal_ropivaca_ml3');
        $ropivacaine_mg = $this->request->getVar('spinal_ropivaca_mg3');
        $ropivacaine = $ropivacaine_option.','.$ropivacaine_persent.','.$ropivacaine_ml.','.$ropivacaine_mg;

        $prilocaine_option = $this->request->getVar('spinal_priloca_option4');
        $prilocaine_persent = $this->request->getVar('spinal_priloca_persent4');
        $prilocaine_ml = $this->request->getVar('spinal_priloca_ml4');
        $prilocaine_mg = $this->request->getVar('spinal_priloca_mg4');
        $prilocaine = $prilocaine_option.','.$prilocaine_persent.','.$prilocaine_ml.','.$prilocaine_mg;

        $chloroprocaine_option = $this->request->getVar('spinal_2chloropro_option5');
        $chloroprocaine_persent = $this->request->getVar('spinal_2chloropro_persent5');
        $chloroprocaine_ml = $this->request->getVar('spinal_2chloropro_ml5');
        $chloroprocaine_mg = $this->request->getVar('spinal_2chloropro_mg5');
        $chloroprocaine = $chloroprocaine_option.','.$chloroprocaine_persent.','.$chloroprocaine_ml.','.$chloroprocaine_mg;

        $other_option = $this->request->getVar('spinal_other_input6');
        $other_persent = $this->request->getVar('spinal_other_persent6');
        $other_ml = $this->request->getVar('spinal_other_ml6');
        $other_mg = $this->request->getVar('spinal_other_mg6');
        $other = $other_option.','.$other_persent.','.$other_ml.','.$other_mg;
        
        
        $ajuvant_status = $this->request->getVar('ajuvant_status');
        $opioid_status = $this->request->getVar('epidural_opioid_status');

        $opioid_name = $this->request->getVar('epidural_opioid_name[]');
        $opioid_dose = $this->request->getVar('epidural_opioid_dose[]');
       
        $array = array();
        foreach($opioid_name as $key=> $name){

            $var = array(
                'name' => $name,
                'dose' => $opioid_dose[$key]
            );

            array_push($array,$var);
        }
        $opioid_aj_name_dose  = json_encode($array);

        $clonidne_dose = $this->request->getVar('epidural_clonidne_dose');
        $dexmedito_dose = $this->request->getVar('epidural_dexmedito_dose');
        $dexametha_dose = $this->request->getVar('epidural_dexametha_dose');
        $tramadol_dose = $this->request->getVar('epidural_tramadol_dose');
        $ketamine_dose = $this->request->getVar('epidural_ketamine_dose');
        $midazolam_dose = $this->request->getVar('epidural_midazolam_dose');
       
        $aj_name = $this->request->getVar('epidural_aj_name[]');
        $aj_dose = $this->request->getVar('epidural_aj_dose[]');
       
        $array1 = array();
        foreach($aj_name as $key=> $name){

            $var1 = array(
                'name' => $name,
                'dose' => $aj_dose[$key]
            );

            array_push($array1,$var1);
        }
        $other_aj_name_dose  = json_encode($array1);

        $asr_status = $this->request->getVar('asr_status');
        $asr_inhalation = $this->request->getVar('asr_spinal_inhalation');
        $asr_iv_analgesia = $this->request->getVar('asr_spinal_iv_analgesia');
        // $asr_opioids = $this->request->getVar('asr_opioids_spinal');

        $asr_opioid_name = $this->request->getVar('asr_opioid_name_spinal[]');
        $asr_opioid_dose = $this->request->getVar('asr_opioid_dose_spinal[]');

        $array2 = array();
        foreach($asr_opioid_name as $key=> $name){

            $var2 = array(
                'name' => $name,
                'dose' => $asr_opioid_dose[$key]
            );

            array_push($array2,$var2);
        }
        $asr_opioids_name_dose  = json_encode($array2);

        $asr_multi_modal = $this->request->getVar('asr_multi_modal');
        $asr_ketamine = $this->request->getVar('asr_ketamine');
        // $asr_dexmedetomi = $this->request->getVar('asr_dexmedetomi');
        // $asr_clonidine = $this->request->getVar('asr_clonidine');
        // $asr_tramadol = $this->request->getVar('asr_tramadol');
        // $asr_magnesium = $this->request->getVar('asr_magnesium');
        // $asr_other_iv = $this->request->getVar('asr_other_iv');

        $asr_name_aj = $this->request->getVar('asr_name_aj');
        $asr_name_dose = $this->request->getVar('asr_name_dose');

        $array3 = array();      

        $var3 = array(
            'name' => $asr_name_aj,
            'dose' => $asr_name_dose
        );

        array_push($array3,$var3);
       
        $asr_other_iv_aj  = json_encode($array3);

        $complication_equipment = $this->request->getVar('complication_equipment');
        $complication_multi_attempts = $this->request->getVar('complication_multi_attempts');
        $complication_2nd_anaesthe = $this->request->getVar('complication_2nd_anaesthe');
        $complication_failure_space = $this->request->getVar('complication_failure_space');
        $complication_catheter = $this->request->getVar('complication_catheter');
        $complication_other_check = $this->request->getVar('complication_other_check');
        
        if($complication_other_check == 'Yes'){
            $complication_other_check = $this->request->getVar('complication_other_check');
            $complication_other1 = $this->request->getVar('complication_other');
            $complication_other = $complication_other_check.','.$complication_other1;
        }else{
            $complication_other = $this->request->getVar('complication_other_check');
        }

        $ac_status = $this->request->getVar('ac_status');
        $ac_last = $this->request->getVar('ac_last');
        $ac_respi_arrest = $this->request->getVar('ac_respi_arrest');
        $ac_cardiac_arrest = $this->request->getVar('ac_cardiac_arrest');
        $ac_radicular_pain = $this->request->getVar('ac_radicular_pain');
        $ac_paresthesia_pain = $this->request->getVar('ac_paresthesia_pain');
        $ac_bloody_tap = $this->request->getVar('ac_bloody_tap');
        $ac_hypotension = $this->request->getVar('ac_hypotension');
        $ac_nausea = $this->request->getVar('ac_nausea');
        $ac_vomiting = $this->request->getVar('ac_vomiting');
        $ac_high_block = $this->request->getVar('ac_high_block');
        $ac_subdural_block = $this->request->getVar('ac_subdural_block');


        $ac_total_spinal = $this->request->getVar('ac_total_spinal');
        $ac_other1 = $this->request->getVar('ac_other');
        $ac_other_input = $this->request->getVar('ac_other_input');
        if($ac_other1 == 'Yes'){
            $ac_other = $ac_other1.','.$ac_other_input;            
        }else{
            $ac_other = $this->request->getVar('ac_other');
        }

        $success = $this->request->getVar('success_option');
        if($success == 'Complete Success'){
            $onset = $this->request->getVar('comp1ete_success_onset');
        }elseif($success == 'Partial Success'){
            $onset = $this->request->getVar('partial_success_onset');
        }else{
            $onset = '';
        }

        $motor_level = $this->request->getVar('motor_level');
        $onset_surgical = $this->request->getVar('onset_surgical');
        $duration_surgery = $this->request->getVar('duration_surgery');
        $blood_loss = $this->request->getVar('blood_loss');
        $vasopressor = $this->request->getVar('vasopressor');




        // print_r($neuraxial);die();

        $csa_details = array(
            'patient_id'=>$patient_id,
            'patient_status'=>$neuraxial,
            'patient_position'=>$patient_position,
            'wearing_mask'=>$wearing_mask,
            'hand_washing'=>$hand_washing,
            'sterile_gown'=>$sterile_gown,
            'sterile_draping'=>$sterile_draping,
            'skin_prep'=>$skin_prep,
            'csa'=>$csa,
            'anatomical_landmark'=>$anatomical_landmark,
            'ultra_sound'=>$ultrasound,
            'probe_cover'=>$probe_cover,
            'image_quality'=>$image_quality,
            'spinal_level'=>$csa_spinal_level,
            'spinal_level_name'=>$csa_spinal_level_name,
            'needle_brand'=>$needle_brand,
            'needle_type'=>$needle_type,
            'needle_size'=>$needle_size,
            'approach'=>$approach,
            'no_attempts'=>$no_attempts,
            'catheter_type'=>$catheter_type,
            'catheter_mark'=>$catheter_skin_mark,
            'la_regimen'=>$la_regimen,
            'lignocaline'=>$lignocaine,
            'bupivacaine'=>$bupivacaine,
            'rupivacaine'=>$ropivacaine,
            'prilocaine'=>$prilocaine,
            'chloroprocaine'=>$chloroprocaine,
            'other_la'=>$other,
            'aj'=>$ajuvant_status,
            'opioid_aj'=>$opioid_status,
            'opioid_aj_name_dose'=>$opioid_aj_name_dose,
            'clonidne_aj'=>$clonidne_dose,
            'dexmeditomidine_aj'=>$dexmedito_dose,
            'dexamethasone_aj'=>$dexametha_dose,
            'tramadol_aj'=>$tramadol_dose,
            'ketamine_aj'=>$ketamine_dose,
            'midazolam_aj'=>$midazolam_dose,            
            'other_aj_name_dose'=>$other_aj_name_dose,
            'asr'=>$asr_status,
            'asr_inhalation'=>$asr_inhalation,
            'asr_iv_analgesia'=>$asr_iv_analgesia,
            'asr_opioid_name_dose'=>$asr_opioids_name_dose,
            'asr_multi_model'=>$asr_multi_modal,
            'asr_ketamine'=>$asr_ketamine,
            // 'asr_dexmedetomidine'=>$asr_dexmedetomi,
            // 'asr_clonidine'=>$asr_clonidine,
            // 'asr_tramadol'=>$asr_tramadol,
            // 'asr_magnesium'=>$asr_magnesium,
            'asr_other_name_dose'=>$asr_other_iv_aj,

            'tc_equipment'=>$complication_equipment ,
            'tc_multiple_attempts'=>$complication_multi_attempts,
            'tc_2_anaesthetist'=>$complication_2nd_anaesthe,
            'tc_failure_space'=>$complication_failure_space,
            'tc_catheter_related'=>$complication_catheter,
            'tc_other'=>$complication_other,
            'ac_status'=>$ac_status,
            'ac_last'=>$ac_last,
            'ac_respiratory_arrest'=>$ac_respi_arrest,
            'ac_cardiac_arrest'=>$ac_cardiac_arrest,
            'ac_radicular_pain'=>$ac_radicular_pain,
            'ac_paresthesia_pain'=>$ac_paresthesia_pain,
            'ac_bloody_tap'=>$ac_bloody_tap,
            'ac_hypotension'=>$ac_hypotension,
            'ac_nausea'=>$ac_nausea,
            'ac_vomiting'=>$ac_vomiting,
            'ac_high_block'=>$ac_high_block,
            'ac_subdural_block'=>$ac_subdural_block,
            'ac_total_spinal'=>$ac_total_spinal,
            'ac_other'=>$ac_other,
            'success'=>$success,
            'success_onset'=>$onset,
            'motor_level'=> $motor_level,
            'onset_surgical_anaesthesia'=>$onset_surgical,
            'duration_surgery'=>$duration_surgery,
            'blood_loss'=>$blood_loss,
            'vasopressor_use'=>$vasopressor,

        );

        // print_r($csa_details);die();

        $adding_details = new CSA_Model();
        $adding_details->save($csa_details);
        $insert_procedure = $adding_details->insertID();

        if($insert_procedure){
            return json_encode(array(
                'result'    => 1,
                'message'     => 'CSA Added Successfully.....',
                'msg' => $insert_procedure
            ));
       }
       else{
            return json_encode(array(
                 'result'    => 0,
                 'message'     => 'Something went wrong in CSA.....'
            ));
        }

    }
    
}
?>
