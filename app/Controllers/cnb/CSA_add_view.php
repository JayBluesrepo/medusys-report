<?php namespace App\Controllers\cnb;
use App\Controllers\BaseController;
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

        $dr_id = session()->get('dr_id');
        $patient_id = session()->get('id');
        if($dr_id){
        
            $csa_id = $this->request->getVar('id');
            // print_r($csa_id);die();
            $calc=[];
            $model = new addPatientModel(); 
            $model->orderBy('id','DESC');
            $model->where('dr_id',$dr_id);
            $details1  = $model->get()->getResultArray();
            $data['patient'] = $details1;
            $det = $model->where('id',$patient_id)->first();
            $data['focus'] = $det;

            $patient_Model = new addPatientModel();
            $patient_Model->orderBy('id','DESC');
            $patient_Model->where('dr_id',$dr_id);  
            $patient_Model->select('id, rad_id');
            $patient_Model->like('upload_patient_status',1);
            $dat1 = $patient_Model->get()->getResultArray();
            // if($dat1){
                $data['old_check'] = $dat1;
            // }
            
            $model = new MasterListModel();        
            $model->where('master_type_name','Spinal Needle Brand')->orderBy('id','ASC');
            $details  = $model->get()->getResultArray();
            $data['spinal_needle_brand'] = $details;

            $model = new MasterListModel();        
            $model->where('master_type_name','Spinal Needle Type csa')->orderBy('id','ASC');
            $details  = $model->get()->getResultArray();
            $data['spinal_needle_type'] = $details;
            
            $model1 = new CSA_Model(); 
            $detail = $model1->where('dr_id',$dr_id)->where('id',$csa_id)->first();
            $data['info'] = $detail;

            
            $success_stat = $detail['success'];
            $success_status = (array)$success_stat;
            $data['success_status'] = $success_status;

            $dmf=['j,k,l'];
            $data['procs'] = $dmf; 
        
            $model1 = new PreopModel();
            $detail1 = $model1->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['preo'] = $detail1;

            $model2 = new PostopModel();
            $detail2 = $model2->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
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
            
            return view('cnb/add_csa_view',$data); 
        }else{
            return view('login');
        }      
       
    }   
    
    public function update_csa(){
        $patient_id = session()->get('id');

        $id = $this->request->getVar('id');
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

        $csa = $this->request->getVar('csa_e');
        $anatomical_landmark = $this->request->getVar('landmark_e');  
        $probe_cover = $this->request->getVar('epidural_probe_cover');
        $image_quality = $this->request->getVar('epidural_image_quality');
        $ultrasound = $this->request->getVar('epidural_ultra_sound');
        $csa_spinal_level = $this->request->getVar('csa_spinal_level');
        $csa_spinal_level_name = $this->request->getVar('csa_spinal_level_name');
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
        $spinal_attempts = $this->request->getVar('spinal_attempts');
        $catheter_type = $this->request->getVar('catheter_type');
        $skin_mark = $this->request->getVar('skin_mark');
        
        $la_regimen = $this->request->getVar('la_regimen');

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

        

        $aj_opioid_name = $this->request->getVar('epidural_opioid_name[]');
        $aj_opioid_dose = $this->request->getVar('epidural_opioid_dose[]');

        $array = array();
        foreach($aj_opioid_name as $key=> $name){

            $var = array(
                'name' => $name,
                'dose' => $aj_opioid_dose[$key]
            );

            array_push($array,$var);
        }
        $opioid_aj  = json_encode($array);

        $epidural_clonidne_dose = $this->request->getVar('epidural_clonidne_dose');
        $epidural_dexmedito_dose = $this->request->getVar('epidural_dexmedito_dose');
        $epidural_dexametha_dose = $this->request->getVar('epidural_dexametha_dose');
        $epidural_tramadol_dose = $this->request->getVar('epidural_tramadol_dose');
        $epidural_ketamine_dose = $this->request->getVar('epidural_ketamine_dose');
        $epidural_midazolam_dose = $this->request->getVar('epidural_midazolam_dose');
        $epidural_opioid_status = $this->request->getVar('epidural_opioid_status');
        $ajuvant_status = $this->request->getVar('ajuvant_status');

        $epidural_aj_name = $this->request->getVar('epidural_aj_name[]');
        $epidural_aj_dose = $this->request->getVar('epidural_aj_dose[]');

        $array1 = array();
        foreach($epidural_aj_name as $key=> $name){

            $var1 = array(
                'name' => $name,
                'dose' => $epidural_aj_dose[$key]
            );

            array_push($array1,$var1);
        }
        $other_aj_name_dose  = json_encode($array1);

        $asr_status = $this->request->getVar('asr_status');

        $asr_inhalation = $this->request->getVar('asr_spinal_inhalation');
        $asr_iv_analgesia = $this->request->getVar('asr_spinal_iv_analgesia');

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
        $tc_none = $this->request->getVar('tc_none');
        $ac_status = $this->request->getVar('ac_status');
        $ac_last = $this->request->getVar('ac_last');
        $ac_respi_arrest = $this->request->getVar('ac_respira_arrest');
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
        $onset_surgical = $this->request->getVar('surgical_onset');
        $duration_surgery = $this->request->getVar('duration_of_surgery');
        $blood_loss = $this->request->getVar('blood_loss');
        $vasopressor = $this->request->getVar('vasopressor_use');

        date_default_timezone_set('Asia/Kolkata');
        $updated_at = date('d-m-Y H:i:s', time());

        $final1 = $this->request->getVar('final1');
        if($final1 != ',,,'){
            $sl_cold_l = $this->request->getVar('final1');
        }else{
            $sl_cold_l ='';
        }

        $final2 = $this->request->getVar('final2');
        if($final2 != ',,,'){
            $sl_cold_r = $this->request->getVar('final2');
        }else{
            $sl_cold_r ='';
        }

        $final3 = $this->request->getVar('final3');
        if($final3 != ',,,'){
            $sl_touch_l = $this->request->getVar('final3');
        }else{
            $sl_touch_l ='';
        }
        $final4 = $this->request->getVar('final4');
        if($final4 != ',,,'){
            $sl_touch_r = $this->request->getVar('final4');
        }else{
            $sl_touch_r ='';
        }
        $final5 = $this->request->getVar('final5');
        if($final5 != ',,,'){
            $sl_pinpriek_l = $this->request->getVar('final5');
        }else{
            $sl_pinpriek_l ='';
        }
        $final6 = $this->request->getVar('final6');
        if($final6 != ',,,'){
            $sl_pinpriek_r = $this->request->getVar('final6');
        }else{
            $sl_pinpriek_r ='';
        }

        $drname = session()->get('name');
        $dr_id = session()->get('dr_id');

        // $skin_prep = $this->request->getVar('skin_prep_e');
        $skin_prep1 = $this->request->getVar('skin_prep_e');

        if($skin_prep1 == 'Other'){
            $skin_prep1 = $this->request->getVar('skin_prep_e');
            $skin_prep_input = $this->request->getVar('skin_prep_other');
            $skin_prep = $skin_prep1.','.$skin_prep_input;
        }else{
            $skin_prep = $this->request->getVar('skin_prep_e');
        }


        $date = $this->request->getVar('date_time_m');
        $time = $this->request->getVar('time_m');
        $cnb_done_by1 = $this->request->getVar('cnb_done_by1');
        $cnb_done_by2 = $this->request->getVar('cnb_done_by2');
        $supervision = $this->request->getVar('supervision');
        $date1 = str_replace('/', '-', $date); 

        // print_r($drname);die();

        $update_csa = array(

            'procedure_date'=>date('Y-m-d',strtotime($date1)),
            'time'=>$time,
            'cnb1'=>$cnb_done_by1,
            'cnb2'=>$cnb_done_by2,
            'supervision'=>$supervision,
            
            'patient_id'=>$patient_id,
            'patient_status'=>$neuraxial,            
            'patient_position'=> $patient_position,
            'wearing_mask'=>$wear_mask,
            'hand_washing'=>$hand_washing,
            'sterile_gown'=>$sterile_gown,
            'sterile_draping'=>$sterile_draping,
            'skin_prep'=>$skin_prep,
            'csa'=>$csa,            
            'anatomical_landmark'=>$anatomical_landmark,
            'probe_cover'=>$probe_cover,
            'image_quality'=>$image_quality,
            'ultra_sound'=>$ultrasound,
            'spinal_level'=>$csa_spinal_level,
            'spinal_level_name'=>$csa_spinal_level_name,
            'needle_brand'=>$spinal_needle_brand,
            'needle_type'=>$spinal_needle_type,
            'needle_size'=>$spinal_needle_size,
            'approach'=>$spinal_approach,
            'no_attempts'=>$spinal_attempts,
            'catheter_type'=> $catheter_type,
            'catheter_mark'=>$skin_mark,
            'la_regimen'=>$la_regimen,
            'lignocaline'=>$spinal_lignocaine,
            'bupivacaine'=>$spinal_bupivacaine,
            'rupivacaine'=>$spinal_ropivacaine,
            'prilocaine'=>$spinal_prilocaine,
            'chloroprocaine'=>$spinal_2chloroprocaine,
            'other_la'=>$spinal_other,
            'opioid_aj'=>$epidural_opioid_status,
            'opioid_aj_name_dose'=>$opioid_aj,
            'clonidne_aj'=>$epidural_clonidne_dose,
            'dexmeditomidine_aj'=>$epidural_dexmedito_dose,
            'dexamethasone_aj'=>$epidural_dexametha_dose,
            'tramadol_aj'=>$epidural_tramadol_dose,
            'ketamine_aj'=>$epidural_ketamine_dose,
            'midazolam_aj'=>$epidural_midazolam_dose,
            'aj'=>$ajuvant_status,
            'other_aj_name_dose'=>$other_aj_name_dose,
            'asr'=>$asr_status,
            'asr_inhalation'=>$asr_inhalation,
            'asr_iv_analgesia'=>$asr_iv_analgesia,
            'asr_opioid_name_dose'=>$asr_opioids_name_dose,
            'asr_multi_model'=>$asr_multi_modal,
            'asr_ketamine'=>$asr_ketamine,
            'asr_other_name_dose'=>$asr_other_iv_aj,
            'tc_equipment'=>$complication_equipment ,
            'tc_multiple_attempts'=>$complication_multi_attempts,
            'tc_2_anaesthetist'=>$complication_2nd_anaesthe,
            'tc_failure_space'=>$complication_failure_space,
            'tc_catheter_related'=>$complication_catheter,
            'tc_other'=>$complication_other,
            'complication_none'=> $tc_none,
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
            'ac_none'=> $ac_none,
            'success'=>$success,
            'success_onset'=>$onset,
            'motor_level'=> $motor_level,
            'onset_surgical_anaesthesia'=>$onset_surgical,
            'duration_surgery'=>$duration_surgery,
            'blood_loss'=>$blood_loss,
            'vasopressor_use'=>$vasopressor,
            'updated_by'=>$drname,
            'updated_at'=>$updated_at,
            'sl_cold_l'=>$sl_cold_l,
            'sl_cold_r'=>$sl_cold_r,             
            'sl_touch_l'=>$sl_touch_l,             
            'sl_touch_r'=>$sl_touch_r,             
            'sl_pinpriek_l'=>$sl_pinpriek_l,             
            'sl_pinpriek_r'=>$sl_pinpriek_r  
        );

        // print_r($update_csa);die();

        $csa_update = new CSA_Model(); 
        $csa_update->set($update_csa);
        $csa_update->where('id',$id);
        $csa_update->where('dr_id',$dr_id);
        $update = $csa_update->update();
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

