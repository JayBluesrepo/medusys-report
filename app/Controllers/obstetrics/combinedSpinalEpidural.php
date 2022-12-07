<?php namespace App\Controllers\obstetrics;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\addPatientModel;

use App\Models\obstetrics_combinedSpinalEpiduralModel;
use App\Models\MasterListModel;
use App\Models\obstetrics_PreopModel;
use App\Models\obstetrics_PostopModel;
use App\Models\obstetrics_followupModel;
use App\Models\obstetrics_SpinalModel;
use App\Models\obstetrics_CSA_Model;
use App\Models\obstetrics_EpiduralModel;
use App\Models\obstetrics_manuaFeedbackModel;
use App\Models\obstetrics_EFeedbackModel;
use App\Models\obstetrics_e_consentModel;

class combinedSpinalEpidural extends BaseController
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

            $model2 = new obstetrics_combinedSpinalEpiduralModel(); 
            $detail = $model2->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['info'] = $detail; 
            
            // print_r($detail);die();
            
            $r = $detail['tc_other'];         
            if($r == 'No'){
                $rr = (array)$r;
                $data['t_other'] = $rr;
            }
            $test = $detail['needle_brand'];
            $other = explode((' - '),$test);
            // print_r($other[0]);die();
            if($other[0] == 'Other'){
                $other1 = (array)$other[0];
                $data['needle_other'] = $other1;
            }
            $type1 = $detail['needle_type'];
            $type = explode((' - '),$type1);
            // print_r($type[0]);die();
            if($type[0] == 'Other'){
                $type2 = (array)$type[0];
                $data['needle_type'] = $type2;
            }

            $snb = $detail['spinal_needle_brand'];
            $other_snb = explode((' - '),$snb);
            // print_r($other_snb[0]);die();
            if($other_snb[0] == 'Other'){
                $other_snb1 = (array)$other_snb[0];
                $data['spinal_nb'] = $other_snb1;
            }
            $snt = $detail['spinal_needle_type'];
            $type_snt = explode((' - '),$snt);
            // print_r($type[0]);die();
            if($type_snt[0] == 'Other'){
                $type_snt1 = (array)$type_snt[0];
                $data['spinal_nt'] = $type_snt1;
            }

            $ac_other1 = $detail['ac_other'];   
            if($ac_other1 == 'No'){
                $acute_complication = (array)$ac_other1;
                $data['a_complication'] = $acute_complication;
            }      
            $success_stat = $detail['success'];
            $success_status = (array)$success_stat;
            $data['success_status'] = $success_status;

            $dmf=['j,k,l'];
            $data['procs'] = $dmf; 

            $model1 = new obstetrics_PreopModel();
            $detail1 = $model1->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['preo'] = $detail1;

            $model2 = new obstetrics_PostopModel();
            $detail2 = $model2->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
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

            if($data6 || $data7 || $data8 || $data9){
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

            $preop = new obstetrics_PreopModel();        
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
                $data10  = $Models->where('patient_id',$id)->first();
                $data11  = $Model->where('patient_id',$id)->first();
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
                return view('obstetrics/combined-spinal-view',$data);
            }else{
                return view('obstetrics/combined_spinal_epidural',$data);
            }  
        }else{
            return view('login');
        }
        
    }   
    
    public function add_combined_procedure(){
        $patient_id = session()->get('id');

        $drname = session()->get('name');
        $dr_id = session()->get('dr_id');
        // print_r($patient_id);die();
       

       
        
        $radiovalue = $this->request->getVar('neuraxial_block');
        if($radiovalue == 'Sedation'){
            $neuraxial1 = $this->request->getVar('neuraxial_block_option');
            $neuraxial = $radiovalue.' - '.$neuraxial1;
        }else{
            $neuraxial = $this->request->getVar('neuraxial_block');
        }   
        
        
        $patient_position = $this->request->getVar('patient_position');
        $wear_mask = $this->request->getVar('wear_mask');
        $hand_washing = $this->request->getVar('hand_washing');
        $sterile_gown = $this->request->getVar('sterile_gown');
        $sterile_draping = $this->request->getVar('sterile_draping');

       
        $skin_prep1 = $this->request->getVar('skin_prep');       

        if($skin_prep1 == 'Other'){
            $skin_prep1 = $this->request->getVar('skin_prep');
            $skin_prep_input = $this->request->getVar('skin_prep_other');
            $skin_prep = $skin_prep1.','.$skin_prep_input;
        }else{
            $skin_prep = $this->request->getVar('skin_prep');
        }

        $cse_technique = $this->request->getVar('cse_technique');
        $anatomical_landmark = $this->request->getVar('anatomical_landmark');
        $epidural_level = $this->request->getVar('epidural_level_input');
        $epidural_level_name = $this->request->getVar('epidural_level_input_name');

        $probe_cover = $this->request->getVar('probe_cover');
        $image_quality = $this->request->getVar('image_quality');
        $ultrasound = $this->request->getVar('ultrasound_check_box');

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
        $epidural_other1 = $this->request->getVar('others[]');
        $epidural_other = implode($epidural_other1 , ",");       
     
        $epidural_approach = $this->request->getVar('epidural_approach');
        $epidural_attempts = $this->request->getVar('epidural_no_attempts');
        $epidural_depth = $this->request->getVar('epidural_depth');
        $onset_of_surgical = $this->request->getVar('onset_of_surgical');


        $epidural_tech = $this->request->getVar('epidural_tech');
        if($epidural_tech == 'Single Shot'){
            $epidural_tech = $this->request->getVar('epidural_tech');
        }else{
            $epidural_tech1 = $this->request->getVar('epidural_tech');
            $epidural_catheter = $this->request->getVar('epidural_catheter');
            $epidural_tech  = $epidural_tech1.' - '.$epidural_catheter;
        }

        $test_dose = $this->request->getVar('test_dose_check_box');
        $epidural_intra_operative = $this->request->getVar('epidural_intra_operative');
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
        // $epidural_adrenaline_dose = $this->request->getVar('epidural_adrenaline_dose');

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

        // $spinal_landmark = $this->request->getVar('spinal_landmark');
        $spinal_level = $this->request->getVar('spinal_level_input');
        $spinal_level_name = $this->request->getVar('spinal_level_input_name');


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
        $spinal_no_attempts = $this->request->getVar('spinal_no_attempts');

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
        $spinal_adrenaline_dose = $this->request->getVar('spinal_adrenaline_dose');
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
        $duration_surgery = $this->request->getVar('duration_surgery');
        $blood_loss = $this->request->getVar('blood_loss');
        $vasopressor_use = $this->request->getVar('vasopressor_use');

        $spinal_anaesthetic = $this->request->getVar('spinal_anaesthetic');
        $spinal_anaesth_other = $this->request->getVar('spinal_anaesth_other');

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

        $date = $this->request->getVar('date_m');
        $date1 = str_replace('/', '-', $date);      

        $time = $this->request->getVar('time_m');
        $cnb_done_by1 = $this->request->getVar('cnb_done_by1');
        $cnb_done_by2 = $this->request->getVar('cnb_done_by2');
        $supervision = $this->request->getVar('supervision');

        $spinal_ketamine = $this->request->getVar('spinal_ketamine_dose');
        $spinal_midazolam = $this->request->getVar('spinal_midazolam_dose');
        $ac_intera_epidural = $this->request->getVar('ac_intera_epidural');
        $failure_spinal_compo = $this->request->getVar('failure_spinal_compo');


        // print_r($failure_spinal_compo);die();
        $combined_details = array(

            'aj_spinal_ketamine'=>$spinal_ketamine,
            'aj_spinal_midazolam'=>$spinal_midazolam,
            'ac_intera_epidural'=>$ac_intera_epidural,
            'failure_spinal_compo'=>$failure_spinal_compo,

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
            'epidural_level_name'=>$epidural_level_name,
            'probe_cover'=>$probe_cover,
            'image_quality'=>$image_quality,           
            'ultrasound'=>$ultrasound,
            'needle_brand'=>$epidural_needle_brand,
            'needle_type'=>$epidural_needle_type,
            'needle_size'=>$epidural_needle_size,
            'lor_saline'=>$lor_air,
            'lor_air'=>$lor_saline,

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
            // 'adrenaline_dose'=>$epidural_adrenaline_dose,
            'aj_epidural_other'=>$aj_epidural_other,
            // 'spinal_landamark'=> $spinal_landmark,
            'spinal_level'=>$spinal_level,
            'spinal_level_name'=>$spinal_level_name,

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
            'ac_none'=> $ac_none, 
            'success'=>$success,
            'success_onset'=>$onset,
            
            'motor_level'=>$motor_level,
            'duration_surgery'=>$duration_surgery,
            'blood_loss'=>$blood_loss,
            'vasopressor_use'=>$vasopressor_use,
            'created_by'=>$drname,
            'dr_id'=>$dr_id,
            'onset_of_surgical'=>$onset_of_surgical,
            'sl_cold_l'=>$sl_cold_l,
            'sl_cold_r'=>$sl_cold_r,             
            'sl_touch_l'=>$sl_touch_l,             
            'sl_touch_r'=>$sl_touch_r,             
            'sl_pinpriek_l'=>$sl_pinpriek_l,             
            'sl_pinpriek_r'=>$sl_pinpriek_r,
            'complication_none'=>$complication_none           

        );

        // print_r($combined_details );die();


        
        $adding_combined_details = new obstetrics_combinedSpinalEpiduralModel();
        $adding_combined_details->save($combined_details);
        $insert_procedure = $adding_combined_details->insertID();

        if($insert_procedure){
            return json_encode(array(
                'result'    => 1,
                'message'     => 'Added Successfully.....',
                'msg' => $insert_procedure
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

