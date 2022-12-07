<?php namespace App\Controllers\labour;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\addPatientModel;

use App\Models\labour_PreProcedureModel;
use App\Models\masterTypeModel;
use App\Models\MasterListModel;
use App\Models\labour_combinedSpinalEpiduralModel;
use App\Models\labour_post_procedureModel;
use App\Models\labour_FollowupModel;
use App\Models\labour_SpinalModel;
use App\Models\labour_CSA_Model;
use App\Models\labour_EpiduralModel;
use App\Models\labour_FeedbackModel;
use App\Models\labour_EFeedbackModel;
use App\Models\labour_e_consentModel;

class combinedSpinalView extends BaseController
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
            $details1  = $model->get()->getResultArray();
            $data['patient'] = $details1;
            $det = $model->where('id',$patient_id)->first();
            $data['focus'] = $det;
            
            $model1 = new labour_combinedSpinalEpiduralModel(); 
            $detail = $model1->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['info'] = $detail;  
            // print_r($detail);die();
            $patient_Model = new addPatientModel();
            $patient_Model->orderBy('id','DESC');
            $patient_Model->where('dr_id',$dr_id);  
            $patient_Model->select('id, rad_id');
            $patient_Model->like('upload_patient_status_labour',1);
            $dat1 = $patient_Model->get()->getResultArray();
            // if($dat1){
                $data['old_check'] = $dat1;
            // }

            $success_stat = $detail['success'];
            $success_status = (array)$success_stat;
            $data['success_status'] = $success_status;
            
            $model = new MasterListModel();        
            $model->where('master_type_name','Epidural Needle Brand')->orderBy('id','ASC');
            $details  = $model->get()->getResultArray();
            $data['epidural_needle_brand'] = $details;

            $model = new MasterListModel();        
            $model->where('master_type_name','Epidural Needle Type')->orderBy('id','ASC');
            $details  = $model->get()->getResultArray();
            $data['epidural_needle_type'] = $details;

            $model = new MasterListModel();        
            $model->where('master_type_name','Spinal Needle Brand')->orderBy('id','ASC');
            $details  = $model->get()->getResultArray();
            $data['spinal_needle_brand'] = $details;

            $model = new MasterListModel();        
            $model->where('master_type_name','Spinal Needle Type')->orderBy('id','ASC');
            $details  = $model->get()->getResultArray();
            $data['spinal_needle_type'] = $details;

            $model2 = new labour_combinedSpinalEpiduralModel(); 
            $detail = $model2->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['info'] = $detail;  

            $dmf=['j,k,l'];
            $data['procs'] = $dmf; 
        
            $model1 = new labour_PreProcedureModel();
            $detail1 = $model1->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['preo'] = $detail1;

            $model2 = new labour_post_procedureModel();
            $detail2 = $model2->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
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
            
            foreach($details1 as $key=>$val){
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
            
            return view('labour/combined-spinal-view',$data);   
        }else{
            return view('login');
        }
    }

    public function update_spinal_epidural(){
        $patient_id = session()->get('id');

        $id = $this->request->getVar('id');
        // print_r($patient_id);die();
        $radiovalue = $this->request->getVar('patient_status_e');
        if($radiovalue == 'Sedation'){
            $neuraxial1 = $this->request->getVar('sedation_opt_e');
            $neuraxial = $radiovalue.' - '.$neuraxial1;
        }else{
            $neuraxial = $this->request->getVar('patient_status_e');
        }   
        $patient_position = $this->request->getVar('patient_position_e');
        $wear_mask = $this->request->getVar('wearing_mask_e');       
        $hand_washing = $this->request->getVar('hand_washing_e');
        $sterile_gown = $this->request->getVar('sterile_gown_e');
        $sterile_draping = $this->request->getVar('sterile_draping_e');

        //$skin_prep = $this->request->getVar('skin_prep_e');
        $skin_prep = $this->request->getVar('skin_prep');

        if($skin_prep == 'Other'){  
            $skin_prep_other = $this->request->getVar('skin_prep_other'); 
            $skin_prep =  $skin_prep."-".$skin_prep_other;
        }
        $cse_technique = $this->request->getVar('cse_tech_e');
        $anatomical_landmark = $this->request->getVar('landmark_e');

        $epidural_level = $this->request->getVar('epidural_level_input');
        $probe_cover = $this->request->getVar('epidural_probe_cover');
        $image_quality = $this->request->getVar('epidural_image_quality');
        $ultrasound = $this->request->getVar('epidural_ultra_sound');

        $epidural_brand = $this->request->getVar('epidural_brand');
        if($epidural_brand == 'Other'){
            $epidural_needle_brand1 = $this->request->getVar('epidural_brand_input');
            $epidural_needle_brand = $epidural_brand.' - '.$epidural_needle_brand1;
        }else{
            $epidural_needle_brand = $this->request->getVar('epidural_brand');
        }
        // print_r($epidural_needle_brand);die();
        $epidural_type = $this->request->getVar('epidural_needle_type');
        if($epidural_type == 'Other'){
            $epidural_needle_type1 = $this->request->getVar('epidural_needle_input');
            $epidural_needle_type = $epidural_type.' - '.$epidural_needle_type1; 
        }else{
            $epidural_needle_type = $this->request->getVar('epidural_needle_type');
        }
        $epidural_needle_size = $this->request->getVar('epidural_needle_size');

        $lor_saline = $this->request->getVar('lor_saline');
        $lor_air = $this->request->getVar('lor_air');
        $hanging_drop = $this->request->getVar('hanging_drop');
        // print_r($lor_air);die();
        $epidural_other1 = $this->request->getVar('others[]');
        $epidural_other = implode($epidural_other1 , ",");       
     
        $epidural_approach = $this->request->getVar('epidural_approach');
        $epidural_attempts = $this->request->getVar('epidural_attempts');
        $epidural_depth = $this->request->getVar('epidural_depth');

        $epidural_tech = $this->request->getVar('epidural_tech');
        if($epidural_tech == 'Single Shot'){
            $epidural_tech = $this->request->getVar('epidural_tech');
        }else{
            $epidural_tech1 = $this->request->getVar('epidural_tech');
            $epidural_catheter = $this->request->getVar('epidural_catheter');
            $epidural_tech  = $epidural_tech1.' - '.$epidural_catheter;
        }

        $test_dose = $this->request->getVar('test_dose');
        $epidural_intra_operative = $this->request->getVar('intra_operative_la');
        $epidural_ropiva1 = $this->request->getVar('epidural_ropiva');
        $epidural_ropiva_persent = $this->request->getVar('epidural_ropiva_persent');
        $epidural_ropiva_ml = $this->request->getVar('epidural_ropiva_ml');
        $epidural_ropiva_mg = $this->request->getVar('epidural_ropiva_mg');
        $epidural_ropiva = $epidural_ropiva1.','.$epidural_ropiva_persent.','.$epidural_ropiva_ml.','.$epidural_ropiva_mg;

        $epidural_bupiva1 = $this->request->getVar('epidural_bupiva');
        $epidural_bupiva_persent = $this->request->getVar('epidural_bupiva_persent');
        $epidural_bupiva_ml = $this->request->getVar('epidural_bupiva_ml');
        $epidural_bupiva_mg = $this->request->getVar('epidural_bupiva_mg');
        $epidural_bupiva = $epidural_bupiva1.','.$epidural_bupiva_persent.','.$epidural_bupiva_ml.','.$epidural_bupiva_mg;

        $epidural_levabup1 = $this->request->getVar('epidural_levabup');
        $epidural_levabup_persent = $this->request->getVar('epidural_levabup_persent');
        $epidural_levabup_ml = $this->request->getVar('epidural_levabup_ml');
        $epidural_levabup_mg = $this->request->getVar('epidural_levabup_mg');
        $epidural_levabup = $epidural_levabup1.','.$epidural_levabup_persent.','.$epidural_levabup_ml.','.$epidural_levabup_mg;

        $epidural_lignoca1 = $this->request->getVar('epidural_lignoca');
        $epidural_lignoca_persent = $this->request->getVar('epidural_lignoca_persent');
        $epidural_lignoca_ml = $this->request->getVar('epidural_lignoca_ml');
        $epidural_lignoca_mg = $this->request->getVar('epidural_lignoca_mg');
        $epidural_lignoca = $epidural_lignoca1.','.$epidural_lignoca_persent.','.$epidural_lignoca_ml.','.$epidural_lignoca_mg;

        $epidural_opioid_name1 = $this->request->getVar('epidural_opioid_name[]');
        $epidural_opioid_name = implode(",",$epidural_opioid_name1);

        $epidural_opioid_dose1 = $this->request->getVar('epidural_opioid_dose[]');
        $epidural_opioid_dose = implode(",",$epidural_opioid_dose1);  

        $epidural_clonidne_dose = $this->request->getVar('epidural_clonidne_dose');
        $epidural_dexmedito_dose = $this->request->getVar('epidural_dexmedito_dose');
        $epidural_dexametha_dose = $this->request->getVar('epidural_dexametha_dose');
        $epidural_tramadol_dose = $this->request->getVar('epidural_tramadol_dose');
        $epidural_ketamine_dose = $this->request->getVar('epidural_ketamine_dose');
        $epidural_midazolam_dose = $this->request->getVar('epidural_midazolam_dose');
        //$epidural_adrenaline_dose = $this->request->getVar('epidural_adrenaline_dose');

        $epidural_aj_name = $this->request->getVar('epidural_aj_name[]');
        $epidural_aj_dose = $this->request->getVar('epidural_aj_dose[]');

        $array = array();
        foreach($epidural_aj_name as $key=> $name){

            $var2 = array(
                'name' => $name,
                'dose' => $epidural_aj_dose[$key]
            );

            array_push($array,$var2);
        }

        $aj_epidural_other  = json_encode($array);

        // ------------------------------spinal started--------------------------------------

        $spinal_landmark = $this->request->getVar('spinal_landmark');
        $spinal_level = $this->request->getVar('spinal_level_input');

        $spinal_brand = $this->request->getVar('spinal_needel_brand');
        if($spinal_brand == 'Other'){
            $spinal_needle_brand1 = $this->request->getVar('spinal_needel_brand_input');
            $spinal_needle_brand = $spinal_brand.' - '.$spinal_needle_brand1;
        }else{
            $spinal_needle_brand = $this->request->getVar('spinal_needel_brand');
        }

        $spinal_type = $this->request->getVar('spinal_needel_type');
        if($spinal_type == 'Other'){
            $spinal_needle_type1 = $this->request->getVar('spinal_needel_type_input');
            $spinal_needle_type = $spinal_type.' - '.$spinal_needle_type1;
        }else{
            $spinal_needle_type = $this->request->getVar('spinal_needel_type');
        }

        $spinal_needle_size = $this->request->getVar('spinal_needle_size');
        $spinal_approach = $this->request->getVar('spinal_approach');
        $spinal_no_attempts = $this->request->getVar('spinal_attempts');
        $spinal_anaesthetic = $this->request->getVar('spinal_anaesthetic');
      

        $spinal_lignocaine_option = $this->request->getVar('spinal_lignoca_option1');
        $spinal_lignocaine_persent = $this->request->getVar('spinal_lignoca_persent1');
        $spinal_lignocaine_ml = $this->request->getVar('spinal_lignoca_ml1');
        $spinal_lignocaine_mg = $this->request->getVar('spinal_lignoca_mg1');
        $spinal_lignocaine = $spinal_lignocaine_option.','.$spinal_lignocaine_persent.','.$spinal_lignocaine_ml.','.$spinal_lignocaine_mg;

        $spinal_bupivacaine_option = $this->request->getVar('spinal_bupivaca_option2');
        $spinal_bupivacaine_persent = $this->request->getVar('spinal_bupivaca_persent2');
        $spinal_bupivacaine_ml = $this->request->getVar('spinal_bupivaca_ml2');
        $spinal_bupivacaine_mg = $this->request->getVar('spinal_bupivaca_mg2');
        $spinal_bupivacaine = $spinal_bupivacaine_option.','.$spinal_bupivacaine_persent.','.$spinal_bupivacaine_ml.','.$spinal_bupivacaine_mg;

        $spinal_ropivacaine_option = $this->request->getVar('spinal_ropivaca_option3');
        $spinal_ropivacaine_persent = $this->request->getVar('spinal_ropivaca_persent3');
        $spinal_ropivacaine_ml = $this->request->getVar('spinal_ropivaca_ml3');
        $spinal_ropivacaine_mg = $this->request->getVar('spinal_ropivaca_mg3');
        $spinal_ropivacaine = $spinal_ropivacaine_option.','.$spinal_ropivacaine_persent.','.$spinal_ropivacaine_ml.','.$spinal_ropivacaine_mg;

        $spinal_prilocaine_option = $this->request->getVar('spinal_priloca_option4');
        $spinal_prilocaine_persent = $this->request->getVar('spinal_priloca_persent4');
        $spinal_prilocaine_ml = $this->request->getVar('spinal_priloca_ml4');
        $spinal_prilocaine_mg = $this->request->getVar('spinal_priloca_mg4');
        $spinal_prilocaine = $spinal_prilocaine_option.','.$spinal_prilocaine_persent.','.$spinal_prilocaine_ml.','.$spinal_prilocaine_mg;

        $spinal_2chloroprocaine_option = $this->request->getVar('spinal_2chloropro_option5');
        $spinal_2chloroprocaine_persent = $this->request->getVar('spinal_2chloropro_persent5');
        $spinal_2chloroprocaine_ml = $this->request->getVar('spinal_2chloropro_ml5');
        $spinal_2chloroprocaine_mg = $this->request->getVar('spinal_2chloropro_mg5');
        $spinal_2chloroprocaine = $spinal_2chloroprocaine_option.','.$spinal_2chloroprocaine_persent.','.$spinal_2chloroprocaine_ml.','.$spinal_2chloroprocaine_mg;

        $local_anaesthetic = $this->request->getVar('local_anaesthetic');
        $spinal_other_option = $this->request->getVar('spinal_other_input6');
        $spinal_other_persent = $this->request->getVar('spinal_other_persent6');
        $spinal_other_ml = $this->request->getVar('spinal_other_ml6');
        $spinal_other_mg = $this->request->getVar('spinal_other_mg6');
        $spinal_other = $local_anaesthetic.','.$spinal_other_option.','.$spinal_other_persent.','.$spinal_other_ml.','.$spinal_other_mg;

        $spinal_opioid_name = $this->request->getVar('spinal_opioid_name[]');
        $spinal_opioid_dose= $this->request->getVar('spinal_opioid_dose[]');

        $array1 = array();
        foreach($spinal_opioid_name as $key=> $name){

            $var = array(
                'name' => $name,
                'dose' => $spinal_opioid_dose[$key]
            );

            array_push($array1,$var);
        }
        $aj_spinal_other  = json_encode($array1);

        $spinal_clonidne_dose = $this->request->getVar('spinal_clonidne_dose');
        $spinal_dexmedito_dose = $this->request->getVar('spinal_dexmedito_dose');
        $spinal_dexametha_dose = $this->request->getVar('spinal_dexametha_dose');
        $spinal_tramadol_dose = $this->request->getVar('spinal_tramadol_dose');
        //$spinal_adrenaline_dose = $this->request->getVar('spinal_adrenaline_dose');
        $spinal_aj_name = $this->request->getVar('spinal_aj_name[]');
        $spinal_aj_dose = $this->request->getVar('spinal_aj_dose[]');

        $array2 = array();
        foreach($spinal_aj_name as $key=> $name){

            $var3 = array(
                'name' => $name,
                'dose' => $spinal_aj_dose[$key]
            );

            array_push($array2,$var3);
        }
        $aj_spinal_other1  = json_encode($array2);

        $asr_spinal_inhalation = $this->request->getVar('asr_spinal_inhalation');
        $asr_spinal_iv_analgesia = $this->request->getVar('asr_spinal_iv_analgesia');
        $asr_opioids_spinal = $this->request->getVar('asr_opioids_spinal');
        $asr_opioid_name_spinal = $this->request->getVar('asr_opioid_name_spinal[]');
        $asr_opioid_dose_spinal = $this->request->getVar('asr_opioid_dose_spinal[]');

        
        $array3 = array();
        foreach($asr_opioid_name_spinal as $key=> $name){

            $var4 = array(
                'name' => $name,
                'dose' => $asr_opioid_dose_spinal[$key]
            );

            array_push($array3,$var4);
        }
        $asr_opioids_name_dose  = json_encode($array3);

        $asr_multi_modal = $this->request->getVar('asr_multi_modal');
        $asr_ketamine = $this->request->getVar('asr_ketamine');
        // $asr_dexmedetomi = $this->request->getVar('asr_dexmedetomi');
        // $asr_clonidine = $this->request->getVar('asr_clonidine');
        // $asr_tramadol = $this->request->getVar('asr_tramadol');
        // $asr_magnesium = $this->request->getVar('asr_magnesium');
        $asr_other_iv = $this->request->getVar('asr_other_iv');

        $asr_name_aj = $this->request->getVar('asr_name_aj');
        $asr_name_dose = $this->request->getVar('asr_name_dose');

        $array4 = array();      

        $var5 = array(
            'name' => $asr_name_aj,
            'dose' => $asr_name_dose
        );

        array_push($array4,$var5);
       
        $asr_other_iv_aj  = json_encode($array4);

        $complication_equipment = $this->request->getVar('complication_equipment');
        $complication_multi_attempts = $this->request->getVar('complication_multi_attempts');
        $complication_2nd_anaesthe = $this->request->getVar('complication_2nd_anaesthe');
        $complication_failure_space = $this->request->getVar('complication_failure_space');
        $complication_catheter = $this->request->getVar('complication_catheter');
        $complication_other_check = $this->request->getVar('complication_other_check');
        $complication_other = $this->request->getVar('complication_other');
        $complication_none = $this->request->getVar('complication_none');


        $ac_epidural_resited = $this->request->getVar('ac_epidural_resited');
        $ac_last = $this->request->getVar('ac_last');
        $ac_respira_arrest = $this->request->getVar('ac_respira_arrest');
        $ac_cardiac_arrest = $this->request->getVar('ac_cardiac_arrest');
        $ac_rasicular_pain = $this->request->getVar('ac_rasicular_pain');
        $ac_paresthesia_pain = $this->request->getVar('ac_paresthesia_pain');
        $ac_bloody_tap = $this->request->getVar('ac_bloody_tap');
        // $ac_wet_tap = $this->request->getVar('ac_wet_tap');
        $ac_hypotension = $this->request->getVar('ac_hypotension');
        $ac_nausea = $this->request->getVar('ac_nausea');
        $ac_vomiting = $this->request->getVar('ac_vomiting');
        $ac_high_block = $this->request->getVar('ac_high_block');
        $ac_subdural_block = $this->request->getVar('ac_subdural_block');
        // $ac_motor_block = $this->request->getVar('ac_motor_block');
        $ac_total_spinal = $this->request->getVar('ac_total_spinal');
        // $ac_accidental = $this->request->getVar('ac_accidental');
        $ac_other = $this->request->getVar('ac_other');
        $ac_other_input = $this->request->getVar('ac_other_input');
        $ac_none = $this->request->getVar('ac_none');


        $success = $this->request->getVar('success_option');
        if($success == 'Complete Success'){
            $onset = $this->request->getVar('comp1ete_success_onset');
        }elseif($success == 'Partial Success'){
            $onset = $this->request->getVar('partial_success_onset');
        }else{
            $onset = '';
        }

        $motor_level = $this->request->getVar('motor_level');
        $duration_surgery = $this->request->getVar('duration_of_surgery');
        $blood_loss = $this->request->getVar('blood_loss');
        $vasopressor_use = $this->request->getVar('vasopressor_use');
        $epidural_level_input_name = $this->request->getVar('epidural_level_input_name');


        
        $spinal_anaesth_other = $this->request->getVar('spinal_anaesth_other');

        $onset_of_surgical = $this->request->getVar('onset_of_surgical_anaesthesia');

        date_default_timezone_set('Asia/Kolkata');
        $updated_at = date('d-m-Y H:i:s', time());

        $drname = session()->get('name');
        $dr_id = session()->get('dr_id');

        $final1 = $this->request->getVar('final1');
        if($final1 != 'm-,,m-undefined,'){
            $sl_cold_l1 = $this->request->getVar('final1');
            $sl_cold_l_explode = explode(',',$sl_cold_l1);
            $zx = $sl_cold_l_explode[0];
            $zx_sub = substr($zx,2);
            $xz = $sl_cold_l_explode[2]; 
            $xz_sub = substr($xz,2);
            $sl_cold_l =$zx_sub.','.$sl_cold_l_explode[1].','.$xz_sub.','.$sl_cold_l_explode[3];

        }else{
            $sl_cold_l ='';
        }

        $final2 = $this->request->getVar('final2');
        if($final2 != 'm-,,m-undefined,'){
            $sl_cold_r1 = $this->request->getVar('final2');
            $sl_cold_r_explode = explode(',',$sl_cold_r1);
            $zx = $sl_cold_r_explode[0];
            $zx_sub = substr($zx,2);
            $xz = $sl_cold_r_explode[2]; 
            $xz_sub = substr($xz,2);
            $sl_cold_r =$zx_sub.','.$sl_cold_r_explode[1].','.$xz_sub.','.$sl_cold_r_explode[3];
        }else{
            $sl_cold_r ='';
        }

        $final3 = $this->request->getVar('final3');
        if($final3 != 'm-,,m-undefined,'){
            $sl_touch_l1 = $this->request->getVar('final3');
            $sl_touch_l_explode = explode(',',$sl_touch_l1);
            $zx = $sl_touch_l_explode[0];
            $zx_sub = substr($zx,2);
            $xz = $sl_touch_l_explode[2]; 
            $xz_sub = substr($xz,2);
            $sl_touch_l =$zx_sub.','.$sl_touch_l_explode[1].','.$xz_sub.','.$sl_touch_l_explode[3];
        }else{
            $sl_touch_l ='';
        }
        $final4 = $this->request->getVar('final4');
        if($final4 != 'm-,,m-undefined,'){
            $sl_touch_r1 = $this->request->getVar('final4');
            $sl_touch_r_explode = explode(',',$sl_touch_r1);
            $zx = $sl_touch_r_explode[0];
            $zx_sub = substr($zx,2);
            $xz = $sl_touch_r_explode[2]; 
            $xz_sub = substr($xz,2);
            $sl_touch_r =$zx_sub.','.$sl_touch_r_explode[1].','.$xz_sub.','.$sl_touch_r_explode[3];
        }else{
            $sl_touch_r ='';
        }
        $final5 = $this->request->getVar('final5');
        if($final5 != 'm-,,m-undefined,'){
            $sl_pinpriek_l1 = $this->request->getVar('final5');
            $sl_pinpriek_l_explode = explode(',',$sl_pinpriek_l1);
            $zx = $sl_pinpriek_l_explode[0];
            $zx_sub = substr($zx,2);
            $xz = $sl_pinpriek_l_explode[2]; 
            $xz_sub = substr($xz,2);
            $sl_pinpriek_l =$zx_sub.','.$sl_pinpriek_l_explode[1].','.$xz_sub.','.$sl_pinpriek_l_explode[3];
        }else{
            $sl_pinpriek_l ='';
        }
        $final6 = $this->request->getVar('final6');
        if($final6 != 'm-,,m-undefined,'){
            $sl_pinpriek_r1 = $this->request->getVar('final6');
            $sl_pinpriek_r_explode = explode(',',$sl_pinpriek_r1);
            $zx = $sl_pinpriek_r_explode[0];
            $zx_sub = substr($zx,2);
            $xz = $sl_pinpriek_r_explode[2]; 
            $xz_sub = substr($xz,2);
            $sl_pinpriek_r =$zx_sub.','.$sl_pinpriek_r_explode[1].','.$xz_sub.','.$sl_pinpriek_r_explode[3];
        }else{
            $sl_pinpriek_r ='';
        }
        
        // print_r($sl_pinpriek_r);die();

        $date = $this->request->getVar('date_time_m');
        $date1 = str_replace('/', '-', $date); 

        $time = $this->request->getVar('time_m');
        $cnb_done_by1 = $this->request->getVar('cnb_done_by1');
        $cnb_done_by2 = $this->request->getVar('cnb_done_by2');
        $supervision = $this->request->getVar('supervision');

        $intrathecal_migration = $this->request->getVar('intrathecal_migration');
        $maternal_fever = $this->request->getVar('maternal_fever');
        $foetal_CTG = $this->request->getVar('foetal_CTG');
        $tc_failure_spinal_component = $this->request->getVar('tc_failure_spinal_component');

        $spinal_midazolam_dose = $this->request->getVar('spinal_midazolam_dose');
        $spinal_ketamin_dose = $this->request->getVar('spinal_ketamin_dose');
        $update_combined = array(

            'patient_id'=>$patient_id,
            'procedure_date'=>date('Y-m-d',strtotime($date1)),
            'time'=>$time,
            'cnb1'=>$cnb_done_by1,
            'cnb2'=>$cnb_done_by2,
            'supervision'=>$supervision,
            'patient_status'=>$neuraxial,
            'patient_position'=> $patient_position,
            'wearing_mask'=>$wear_mask,
            'hand_washing'=>$hand_washing,
            'sterile_gown'=>$sterile_gown,
            'sterile_draping'=>$sterile_draping,
            'skin_prepartion'=>$skin_prep,
            'cse_technique'=>$cse_technique,            
            'anatomical_landmark'=>$anatomical_landmark,
            'epidural_level'=>$epidural_level,
            'probe_cover'=>$probe_cover,
            'image_quality'=>$image_quality,           
            'ultrasound'=>$ultrasound,
            'needle_brand'=>$epidural_needle_brand,
            'needle_type'=>$epidural_needle_type,
            'needle_size'=>$epidural_needle_size,
            'lor_saline'=>$lor_saline,
            'lor_air'=>$lor_air,
            'hanging_drop'=>$hanging_drop,
            'epidural_other'=>$epidural_other,
            'approach'=>$epidural_approach,
            'no_attempts'=>$epidural_attempts,
            'epidral_depth'=>$epidural_depth,
            'technique'=>$epidural_tech,
            'test_dose'=>$test_dose,
            'la_regimen'=>$epidural_intra_operative,
            'la_ropivacaine'=>$epidural_ropiva,
            'la_bupivacaine'=>$epidural_bupiva,
            'la_levobupivacaine'=>$epidural_levabup,
            'la_lignocaine'=>$epidural_lignoca,
            'opioid_name'=>$epidural_opioid_name,
            'opioid_dose'=>$epidural_opioid_dose,
            'clonidina_dose'=>$epidural_clonidne_dose,
            'dexmeditomidine_dose'=>$epidural_dexmedito_dose,
            'dexamephasone_dose'=>$epidural_dexametha_dose,
            'trmadol_dose'=>$epidural_tramadol_dose,
            'kepamine_dose'=>$epidural_ketamine_dose,
            'midazolam_dose'=>$epidural_midazolam_dose,
            //'adrenaline_dose'=>$epidural_adrenaline_dose,
            'aj_epidural_other'=>$aj_epidural_other,
            'spinal_landamark'=> $spinal_landmark,
            'spinal_level'=>$spinal_level,
            'spinal_needle_brand'=>$spinal_needle_brand,
            'spinal_needle_type'=>$spinal_needle_type,
            'spinal_needle_size'=>$spinal_needle_size,
            'spinal_approach'=>$spinal_approach,
            'spinal_no_attempts'=>$spinal_no_attempts,
            'spinal_anaesthetic'=>$spinal_anaesthetic,
            'spinal_lignocaine_an'=>$spinal_lignocaine,
            'spinal_bupivacaine_an'=>$spinal_bupivacaine,
            'spinal_ropivacaine_an'=>$spinal_ropivacaine,
            'spinal_prilocaine_an'=>$spinal_prilocaine,
            'spinal_2chloroprocaine_an'=>$spinal_2chloroprocaine,
            'spinal_anaesth_other'=>$spinal_anaesth_other,
            'other_spinal_an'=>$spinal_other,
            'aj_spinal_opioid'=>$aj_spinal_other,
            'aj_spinal_clonidne'=>$spinal_clonidne_dose,
            'aj_spinal_dexmeditomidine'=>$spinal_dexmedito_dose,
            'aj_spinal_dexamethasone'=>$spinal_dexametha_dose,
            'aj_spinal_tramadol'=>$spinal_tramadol_dose,

            
            'aj_spinal_ketamin'=>$spinal_ketamin_dose,
            'aj_spinal_midazolam'=>$spinal_midazolam_dose,


            'aj_spinal_adrenaline'=>$spinal_adrenaline_dose,
            'aj_spinal_other'=>$aj_spinal_other1,
            'in_analgesia'=>$asr_spinal_inhalation,
            'asr_iv_analgesia'=>$asr_spinal_iv_analgesia,
            'asr_opioids'=>$asr_opioids_spinal, 
            'asr_opioids_name_dose'=>$asr_opioids_name_dose,
            'asr_multi_modal'=>$asr_multi_modal,          
            'asr_ketamine'=>$asr_ketamine,
            // 'asr_dexmedetomidine'=>$asr_dexmedetomi,
            // 'asr_clonidine'=>$asr_clonidine,
            // 'asr_tramadol'=>$asr_tramadol,
            // 'asr_magnesium'=>$asr_magnesium,
            'asr_other'=>$asr_other_iv,
            'asr_other_iv_aj'=>$asr_other_iv_aj,

            'tc_equipment'=>$complication_equipment,
            'tc_multiple_attempts'=>$complication_multi_attempts,
            'tc_2nd_anaesthetist'=>$complication_2nd_anaesthe,
            'tc_failure_space'=>$complication_failure_space,
            'tc_catheter_related'=>$complication_catheter,
            'tc_other'=>$complication_other_check,
            'tc_other_input'=>$complication_other,

            'ac_epidural_resited'=>$ac_epidural_resited,
            'ac_local_anaesthetic'=>$ac_last,
            'ac_respiratory_arrest'=>$ac_respira_arrest,
            'ac_cardiac_arrest'=>$ac_cardiac_arrest,
            'ac_radicular_pain'=>$ac_rasicular_pain,
            'ac_paresthesia_pain'=>$ac_paresthesia_pain,
            'ac_bloody_tap'=>$ac_bloody_tap,
            // 'ac_wet_tap'=>$ac_wet_tap,
            'ac_hypotension'=>$ac_hypotension,
            'ac_nausea'=>$ac_nausea,
            'ac_vomiting'=>$ac_vomiting,
            'ac_high_block'=>$ac_high_block,
            'ac_subdural_block'=>$ac_subdural_block,
            // 'ac_moto_block'=>$ac_motor_block,
            'ac_tatal_spinal'=>$ac_total_spinal,
            // 'ac_accidental_dural'=>$ac_accidental,
            'ac_other'=>$ac_other,
            'ac_other_input'=>$ac_other_input,
            'success'=>$success,
            'success_onset'=>$onset,
            
            'motor_level'=>$motor_level,
            // 'duration_surgery'=>$duration_surgery,
            // 'blood_loss'=>$blood_loss,
            'vasopressor_use'=>$vasopressor_use,
            // 'onset_of_surgical'=>$onset_of_surgical,
            'updated_by'=>$drname,
            'updated_at'=>$updated_at,
            'sl_cold_l'=>$sl_cold_l,
            'sl_cold_r'=>$sl_cold_r,             
            'sl_touch_l'=>$sl_touch_l,             
            'sl_touch_r'=>$sl_touch_r,             
            'sl_pinpriek_l'=>$sl_pinpriek_l,             
            'sl_pinpriek_r'=>$sl_pinpriek_r,
            'ac_none'=> $ac_none, 
            'complication_none'=>$complication_none,
            'epidural_level_name'=>$epidural_level_input_name ,
            'intrathecal_migration' => $intrathecal_migration,
            'maternal_fever' => $maternal_fever,
            'foetal_CTG' => $foetal_CTG          

        );

        // print_r($update_combined);die();

        $combined_update = new labour_combinedSpinalEpiduralModel(); 
        $combined_update->set($update_combined);
        $combined_update->where('id',$id);
        $combined_update->where('dr_id',$dr_id);
        $update = $combined_update->update();
        if($update){
            return json_encode(array(
                'result'    => 1,
                'message'   => ' Updated Successfully.....'
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
