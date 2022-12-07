<?php namespace App\Controllers\labour;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\addPatientModel;

use App\Models\labour_CSA_Model;
use App\Models\MasterListModel;
use App\Models\labour_PreProcedureModel;
use App\Models\labour_post_procedureModel;
use App\Models\labour_FollowupModel;
use App\Models\labour_SpinalModel;
use App\Models\labour_combinedSpinalEpiduralModel;
use App\Models\labour_EpiduralModel;
use App\Models\labour_FeedbackModel;
use App\Models\labour_EFeedbackModel;
use App\Models\labour_e_consentModel;

class CSA_add extends BaseController
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
        // print_r($patient_id);die();
        if($dr_id){        
            $calc=[];
            $model = new addPatientModel(); 
            $model->where('dr_id',$dr_id);
            $model->orderBy('id','DESC');
            $details1  = $model->get()->getResultArray();
            $data['patient'] = $details1; 
            $det = $model->where('id',$patient_id)->first();
            $data['focus'] = $det;

            $model1 = new labour_CSA_Model(); 
            $detail = $model1->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['info'] = $detail;

            $patient_Model = new addPatientModel();
            $patient_Model->orderBy('id','DESC');
            $patient_Model->where('dr_id',$dr_id);  
            $patient_Model->select('id, rad_id');
            $patient_Model->like('upload_patient_status_labour',1);
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

            $success_stat = $detail['success'];
            $success_status = (array)$success_stat;
            $data['success_status'] = $success_status;

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

            $preop = new labour_PreProcedureModel();        
            $ga = $preop->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['ga'] = $ga['purpose'];
            
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

            if(!empty($detail)){
                return view('labour/add_csa_view',$data);
            }else{
                return view('labour/add-csa',$data);
            } 
        }else{
            return view('login');
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

        if($skin_prep == 'Other'){
            $skin_prep_other = $this->request->getVar('skin_prep_other');
            $skin_prep =  $skin_prep."-".$skin_prep_other;
        }
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

        $local_anaesthetic = $this->request->getVar('local_anaesthetic');
        $other_option = $this->request->getVar('spinal_other_input6');
        $other_persent = $this->request->getVar('spinal_other_persent6');
        $other_ml = $this->request->getVar('spinal_other_ml6');
        $other_mg = $this->request->getVar('spinal_other_mg6');
        $other = $local_anaesthetic.','.$other_option.','.$other_persent.','.$other_ml.','.$other_mg;
        
        
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
        $adrenaline_dose = $this->request->getVar('epidural_adrenaline_dose');

       
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

            //$complication_other1_array = implode($complication_other1, ","); 

            $complication_other = $complication_other_check.','.$complication_other1;
        }else{
            $complication_other = $this->request->getVar('complication_other_check');
        }
        $tc_none = $this->request->getVar('tc_none');
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

        $maternal_fever = $this->request->getVar('maternal_fever');

        $foetal_CTG = $this->request->getVar('foetal_CTG');


        $ac_other1 = $this->request->getVar('ac_other');
        $ac_other_input = $this->request->getVar('ac_other_input');
        if($ac_other1 == 'Yes'){
            //$ac_other_input_array = implode($ac_other_input, ",");
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
        $onset_surgical = $this->request->getVar('onset_surgical');
        $duration_surgery = $this->request->getVar('duration_surgery');
        $blood_loss = $this->request->getVar('blood_loss');
        $vasopressor = $this->request->getVar('vasopressor');

        $final1 = $this->request->getVar('final1');
        if(!empty($final1)){
            $sl_cold_l = $this->request->getVar('final1');
        }else{
            $sl_cold_l ='';
        }

        $final2 = $this->request->getVar('final2');
        if(!empty($final2)){
            $sl_cold_r = $this->request->getVar('final2');
        }else{
            $sl_cold_r ='';
        }

        $final3 = $this->request->getVar('final3');
        if(!empty($final3)){
            $sl_touch_l = $this->request->getVar('final3');
        }else{
            $sl_touch_l ='';
        }
        $final4 = $this->request->getVar('final4');
        if(!empty($final4)){
            $sl_touch_r = $this->request->getVar('final4');
        }else{
            $sl_touch_r ='';
        }
        $final5 = $this->request->getVar('final5');
        if(!empty($final5)){
            $sl_pinpriek_l = $this->request->getVar('final5');
        }else{
            $sl_pinpriek_l ='';
        }
        $final6 = $this->request->getVar('final6');
        if(!empty($final6)){
            $sl_pinpriek_r = $this->request->getVar('final6');
        }else{
            $sl_pinpriek_r ='';
        }

        $drname = session()->get('name');
        $dr_id = session()->get('dr_id');

        $date = $this->request->getVar('date_m');
        $time = $this->request->getVar('time_m');
        $cnb_done_by1 = $this->request->getVar('cnb_done_by1');
        $cnb_done_by2 = $this->request->getVar('cnb_done_by2');
        $supervision = $this->request->getVar('supervision');

        $date1 = str_replace('/', '-', $date);      

        // print_r(date('Y-m-d',strtotime($date1)));die();

        $csa_details = array(
            'patient_id'=>$patient_id,
            'procedure_date'=>date('Y-m-d',strtotime($date1)),
            'time'=>$time,
            'cnb1'=>$cnb_done_by1,
            'cnb2'=>$cnb_done_by2,
            'supervision'=>$supervision,
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
            'adrenaline_aj'=>$adrenaline_dose,       
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

            'maternal_fever'=>$maternal_fever,
            'foetal_CTG'=>$foetal_CTG,


            'ac_total_spinal'=>$ac_total_spinal,
            'ac_other'=>$ac_other,
            'ac_none'=> $ac_none,
            'success'=>$success,
            'success_onset'=>$onset,
            'motor_level'=> $motor_level,
            // 'onset_surgical_anaesthesia'=>$onset_surgical,
            // 'duration_surgery'=>$duration_surgery,
            // 'blood_loss'=>$blood_loss,
            'vasopressor_use'=>$vasopressor,
            'created_by'=>$drname,
            'dr_id'=>$dr_id,
            'sl_cold_l'=>$sl_cold_l,
            'sl_cold_r'=>$sl_cold_r,             
            'sl_touch_l'=>$sl_touch_l,             
            'sl_touch_r'=>$sl_touch_r,             
            'sl_pinpriek_l'=>$sl_pinpriek_l,             
            'sl_pinpriek_r'=>$sl_pinpriek_r 
        );

        // print_r($csa_details);die();

        $adding_details = new labour_CSA_Model();
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
