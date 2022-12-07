<?php
namespace App\Controllers\labour;
use App\Controllers\BaseController;
use App\Models\addPatientModel;

use App\Models\labour_SpinalModel;
use App\Models\MasterListModel;
use App\Models\labour_PreProcedureModel;
use App\Models\labour_post_procedureModel;
use App\Models\labour_FollowupModel;
use App\Models\labour_EpiduralModel;
use App\Models\labour_combinedSpinalEpiduralModel;
use App\Models\labour_CSA_Model;
use App\Models\labour_FeedbackModel;
use App\Models\labour_EFeedbackModel;
use App\Models\labour_e_consentModel;

class SpinalDetails extends BaseController
{
    public function index()
    {
        $dr_id = session()->get('dr_id');
        $id = session()->get('id');

        if($dr_id){
            $spin_id = $this->request->getVar('id');
            $calc=[];
            $model = new addPatientModel(); 
            $model->orderBy('id','DESC');
            $model->where('dr_id',$dr_id);
            $details1  = $model->get()->getResultArray();
            $data['patient'] = $details1;
            $det = $model->where('id',$id)->first();
            $data['focus'] = $det;
            
            $model = new MasterListModel();        
            $model->where('master_type_name','Spinal Needle Brand')->orderBy('id','ASC');
            $details  = $model->get()->getResultArray();
            $data['spinal_needle_brand'] = $details;

            $model = new MasterListModel();        
            $model->where('master_type_name','Spinal Needle Type')->orderBy('id','ASC');
            $details  = $model->get()->getResultArray();
            $data['spinal_needle_type'] = $details;
            
            $patient_Model = new addPatientModel();
            $patient_Model->orderBy('id','DESC');
            $patient_Model->where('dr_id',$dr_id);  
            $patient_Model->select('id, rad_id');
            $patient_Model->like('upload_patient_status_labour',1);
            $dat1 = $patient_Model->get()->getResultArray();
            // if($dat1){
                $data['old_check'] = $dat1;
            // }
            
            $model1 = new labour_SpinalModel(); 
            $detail = $model1->where('dr_id',$dr_id)->where('id',$spin_id)->first();
            $data['info'] = $detail;

            $s = $detail['needle_brand'];
            if($s == 'Other'){
                $ss = (array)$s;
                $data['n_brand'] = $ss;
            }
            $t = $detail['needle_type'];
            if($t == 'Other'){
                $tt = (array)$t;
                $data['n_type'] = $tt;
            }
            $r = $detail['tc_other'];
            if($r == 'No'){
                $rr = (array)$r;
                $data['t_other'] = $rr;
            }
            $p = $detail['ac_other'];
            if($p == 'No'){
                $pp = (array)$p;
                $data['a_other'] = $pp;
            }
            $q = $detail['success_status'];
            $qq = (array)$q;
            $data['s_stat'] = $qq;

            $dmf=['j,k,l'];
            $data['procs'] = $dmf; 
            
            $model1 = new labour_PreProcedureModel();
            $detail1 = $model1->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data['preo'] = $detail1;

            $model2 = new labour_post_procedureModel();
            $detail2 = $model2->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data['posto'] = $detail2;

            $model3 = new labour_FollowupModel();
            $detail3 = $model3->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data['follo'] = $detail3;

            $epiModel = new labour_EpiduralModel();
            $data6  = $epiModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();

            $spinModel = new labour_SpinalModel();
            $data7  = $spinModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();

            $cseModel = new labour_combinedSpinalEpiduralModel();
            $data8  = $cseModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();

            $csaModel = new labour_CSA_Model();
            $data9  = $csaModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();

            if($data6 || $data7 || $data8 || $data9){
                $sin=['1,12,23'];
                $data['proccheck'] = $sin;
            }

            $Model = new labour_EFeedbackModel();
            $data1  = $Model->where('dr_id',$dr_id)->where('patient_id',$id)->where('submission',1)->first();

            $Models = new labour_FeedbackModel();
            $data4  = $Models->where('dr_id',$dr_id)->where('patient_id',$id)->where('flag',1)->first();
            
            if($data1 || $data4){
                $sins=['1,5,10'];
                $data['feedcheck'] = $sins;
            }

            $models = new labour_e_consentModel(); 
            $data12 = $models->where('dr_id',$dr_id)->where('patient_id',$id)->first();
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
            
            return view('labour/spinaldetails',$data);
        }else{
            return view('login');
        }
    }
    
    public function edit_spinal(){
        $id = $this->request->getVar('id');
        $radiovalue = $this->request->getVar('optradio');
        if($radiovalue == 'Sedation'){
            $sedation_if = $this->request->getVar('sedation_if');
            $patient_status = $radiovalue.' -> '.$sedation_if;
        }else{
            $patient_status = $this->request->getVar('optradio');
        }
        $patient_pos = $this->request->getVar('patient_pos');
        $wearing_mask = $this->request->getVar('wearing_mask');
        $hand_washing = $this->request->getVar('hand_washing'); 
        $sterile_gown = $this->request->getVar('sterile_gown');
        $sterile_draping = $this->request->getVar('sterile_draping');
        $skin_prep = $this->request->getVar('skin_prep');
        $maternal_fever = $this->request->getVar('maternal_fever');

         if($maternal_fever == '')
            $maternal_fever = 'No';


        $foetal_CTG = $this->request->getVar('foetal_CTG');

        if($foetal_CTG == '')
            $foetal_CTG = 'No';

        if($skin_prep == 'Other'){
            $skin_prep_other = $this->request->getVar('skin_prep_other');
            $skin_prep =  $skin_prep."-".$skin_prep_other;
        } 
        $anatomical_landmark = $this->request->getVar('anatomical_landmark');

        $ultrasound = $this->request->getVar('ultrasoun');
        $probe_cover = $this->request->getVar('probe_cover');
        $image_quality = $this->request->getVar('image_quality'); 

        $spinal_level = $this->request->getVar('spinal_level');
        $spinal_level_name = $this->request->getVar('spinal_type');
        $needle_brand = $this->request->getVar('needle_brand');
        $Other1 = $this->request->getVar('Other1');
        $needle_type = $this->request->getVar('needle_type');
        $other6 = $this->request->getVar('other6');
        $needle_size = $this->request->getVar('needle_size');
        $approach = $this->request->getVar('approach');
        $no_attempts = $this->request->getVar('no_attempts');
        $lignocaine = $this->request->getVar('lignocaine');
        $ligno_per = $this->request->getVar('ligno_per');
        $ligno_ml = $this->request->getVar('ligno_ml');
        $ligno_mg = $this->request->getVar('ligno_mg');
        $la_lignocaine = $lignocaine.','.$ligno_per.','.$ligno_ml.','.$ligno_mg;
        $bupivacaine = $this->request->getVar('bupivacaine');
        $bupi_per = $this->request->getVar('bupi_per');
        $bupi_ml = $this->request->getVar('bupi_ml');
        $bupi_mg = $this->request->getVar('bupi_mg');
        $la_bupivacaine = $bupivacaine.','.$bupi_per.','.$bupi_ml.','.$bupi_mg;
        $ropivacaine = $this->request->getVar('ropivacaine');
        $ropi_per = $this->request->getVar('ropi_per');
        $ropi_ml = $this->request->getVar('ropi_ml');
        $ropi_mg = $this->request->getVar('ropi_mg');
        $la_ropivacaine = $ropivacaine.','.$ropi_per.','.$ropi_ml.','.$ropi_mg;
        $prilocaine = $this->request->getVar('prilocaine');
        $pril_per = $this->request->getVar('pril_per');
        $pril_ml = $this->request->getVar('pril_ml');
        $pril_mg = $this->request->getVar('pril_mg');
        $la_prilocaine = $prilocaine.','.$pril_per.','.$pril_ml.','.$pril_mg;
        $chloroprocaine = $this->request->getVar('chloroprocaine');
        $chloro_per = $this->request->getVar('chloro_per');
        $chloro_ml = $this->request->getVar('chloro_ml');
        $chloro_mg = $this->request->getVar('chloro_mg');
        $la_chloroprocaine = $chloroprocaine.','.$chloro_per.','.$chloro_ml.','.$chloro_mg;
        $local_anaesthetic = $this->request->getVar('local_anaesthetic');
        $oth_name = $this->request->getVar('oth_name');
        $oth_per = $this->request->getVar('oth_per');
        $oth_ml = $this->request->getVar('oth_ml');
        $oth_mg = $this->request->getVar('oth_mg');
        $la_otheraine = $local_anaesthetic.','.$oth_name.','.$oth_per.','.$oth_ml.','.$oth_mg;
        $opioid_n = $this->request->getVar('opioid_name[]');
        $opioid_name = implode($opioid_n, ",");
        $opioid_d = $this->request->getVar('opioid_dose[]');
        $opioid_dose = implode($opioid_d, ",");
        $clonidne = $this->request->getVar('clonidne');
        $dexmeditomidine = $this->request->getVar('dexmeditomidine');
        $dexamethasone = $this->request->getVar('dexamethasone');
        $tramadol = $this->request->getVar('tramadol');
        $ketamine = $this->request->getVar('ketamine');
        $midazolam = $this->request->getVar('midazolam');
        $adrenaline = $this->request->getVar('adrenal');
        $Other7 = $this->request->getVar('Other7');
        $aj_n = $this->request->getVar('aj_name[]');
        $aj_name = implode($aj_n, ",");
        $aj_d = $this->request->getVar('aj_dose[]');
        $aj_dose = implode($aj_d, ",");
        $analgesia_none = $this->request->getVar('analgesia_none');
        $in_analgesia = $this->request->getVar('in_analgesia');
        $asr_iv_analgesia = $this->request->getVar('asr_iv_analgesia');
        $Opioids = $this->request->getVar('Opioids');
        $asr_opioid_n = $this->request->getVar('asr_opioid_name[]');
        $asr_opioid_name = implode($asr_opioid_n, ",");
        $asr_opioid_d = $this->request->getVar('asr_opioid_dose[]');
        $asr_opioid_dose = implode($asr_opioid_d, ",");
        $asr_multimode = $this->request->getVar('asr_multimode');
        $Ketamine1 = $this->request->getVar('Ketamine1');
        // $Dexmedeto = $this->request->getVar('Dexmedeto');
        // $Cloni = $this->request->getVar('Cloni');
        // $Trama = $this->request->getVar('Trama');
        // $Magnes = $this->request->getVar('Magnes');
        $asr_other_iv_name = $this->request->getVar('asr_other_iv_name');
        $asr_other_iv_dose = $this->request->getVar('asr_other_iv_dose');
        $tc_equipment = $this->request->getVar('tc_equipment');
        $tc_multiple = $this->request->getVar('tc_multiple');
        $tc_2_anaestsetist = $this->request->getVar('tc_2_anaestsetist');
        $tc_abondoned = $this->request->getVar('tc_abondoned');
        // $tc_catheter = $this->request->getVar('tc_catheter');
        $tc_other = $this->request->getVar('tc_other');
        $other4 = $this->request->getVar('other4');
        $tc_none = $this->request->getVar('tc_none');
        $ac_re_arrest = $this->request->getVar('ac_re_arrest');
        $ac_ca_arrest = $this->request->getVar('ac_ca_arrest');
        $ac_radi_pain = $this->request->getVar('ac_radi_pain');
        $ac_parestsesia = $this->request->getVar('ac_parestsesia');
        $ac_bloody_tap = $this->request->getVar('ac_bloody_tap');
        $ac_hypoten = $this->request->getVar('ac_hypoten');
        $ac_nausea = $this->request->getVar('ac_nausea');
        $ac_vomit = $this->request->getVar('ac_vomit');
        $ac_high_block = $this->request->getVar('ac_high_block');
        $ac_sb_block = $this->request->getVar('ac_sb_block');
        $ac_total_spinal = $this->request->getVar('ac_total_spinal');
        $ac_other = $this->request->getVar('ac_other');
        $other5 = $this->request->getVar('other5');
        $ac_none = $this->request->getVar('ac_none');
        $success_status = $this->request->getVar('optradio2');
        if($success_status == 'Complete Success'){
            $onset = $this->request->getVar('comp1');
        }elseif($success_status == 'Partial Success'){
            $onset = $this->request->getVar('part');
        }else{
            $onset = '';
        }
        $motor_level = $this->request->getVar('motor_level');
        $surgical_anaesthesia = $this->request->getVar('surgical_anaesthesia');
        $surgery_duration = $this->request->getVar('surgery_duration');
        $blood_loss = $this->request->getVar('blood_loss');
        $vasopressor_use = $this->request->getVar('vasopressor_use');

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

        $date = $this->request->getVar('date_time_m');
        $time = $this->request->getVar('time_m');
        $cnb_done_by1 = $this->request->getVar('cnb_done_by1');
        $cnb_done_by2 = $this->request->getVar('cnb_done_by2');
        $supervision = $this->request->getVar('supervision');
        $date1 = str_replace('/', '-', $date); 

        $spinData = array(
            'patient_status'=> $patient_status,
            'procedure_date'=>date('Y-m-d',strtotime($date1)),
            'time'=>$time,
            'cnb1'=>$cnb_done_by1,
            'cnb2'=>$cnb_done_by2,
            'supervision'=>$supervision,
            'patient_position'=> $patient_pos, //optional
            'wearing_mask'=>$wearing_mask,
            'hand_washing'=>$hand_washing,
            'sterile_gown'=> $sterile_gown,
            'sterile_draping'=> $sterile_draping,
            'skin_prepartion'=> $skin_prep,
            'anatomical_landmark' => $anatomical_landmark,
            'spinal_level'=> $spinal_level,
            'spinal_level_name'=> $spinal_level_name,
            'needle_brand'=> $needle_brand,
            'other4'=> $Other1,  //optional
            'needle_type'=>$needle_type,  
            'other6'=> $other6,  //optional
            'needle_size'=> $needle_size,
            'approach'=>$approach,  
            'no_attempts'=> $no_attempts, 
            'la_lignocaine'=> $la_lignocaine,
            'la_bupivacaine'=> $la_bupivacaine,
            'la_ropivacaine'=> $la_ropivacaine,
            'la_prilocaine'=> $la_prilocaine,
            'la_2_chloroprocaine'=> $la_chloroprocaine,
            'la_otheraine'=> $la_otheraine,
            'opioid_name'=> $opioid_name,
            'opioid_dose'=>$opioid_dose,  
            'clonidina_dose'=> $clonidne, 
            'dexmeditomidine_dose'=> $dexmeditomidine,
            'dexamephasone_dose'=> $dexamethasone,
            'tramadol_dose'=> $tramadol,
            'ketamine_dose'=> $ketamine,
            'midazolam_dose'=> $midazolam,
            'adrenaline_dose'=>$adrenaline,
            'other7'=> $Other7,
            'aj_name'=> $aj_name,
            'aj_dose'=> $aj_dose,
            'analgesia_none'=> $analgesia_none,
            'in_analgesia'=> $in_analgesia,
            'asr_iv_analgesia'=>$asr_iv_analgesia, 
            'opioids'=>$Opioids, 
            'asr_opioid_name'=> $asr_opioid_name,  
            'asr_opioid_dose'=> $asr_opioid_dose,
            'asr_multimode'=> $asr_multimode,
            'asr_ketamine'=> $Ketamine1,
            // 'asr_dexmedetomidine'=> $Dexmedeto,
            // 'asr_clonidine'=> $Cloni,
            // 'asr_tramadol'=>$Trama,  
            // 'asr_magnesium'=> $Magnes, 
            'asr_other_iv_name'=> $asr_other_iv_name,
            'asr_other_iv_dose'=> $asr_other_iv_dose,
            'tc_equipment'=> $tc_equipment,
            'tc_multiple'=> $tc_multiple,
            'tc_2_anaestsetist'=> $tc_2_anaestsetist,
            'tc_abondoned'=> $tc_abondoned,
            // 'tc_catheter'=> $tc_catheter,
            'tc_other'=> $tc_other,
            'other5'=> $other4,
            'complication_none'=> $tc_none,
            'ac_re_arrest'=> $ac_re_arrest, 
            'ac_ca_arrest'=> $ac_ca_arrest,
            'ac_radi_pain'=> $ac_radi_pain,
            'ac_parestsesia'=> $ac_parestsesia,
            'ac_bloody_tap'=> $ac_bloody_tap,
            'ac_hypoten'=> $ac_hypoten,
            'ac_nausea'=> $ac_nausea,
            'ac_vomit'=> $ac_vomit,
            'ac_high_block'=> $ac_high_block,
            'ac_sb_block'=> $ac_sb_block,
            'ac_totla_spinal'=> $ac_total_spinal,
            'ac_other'=> $ac_other,
            'other2'=> $other5,
            'ac_none'=> $ac_none,
            'success_status'=> $success_status,
            'onset'=> $onset,
            'motor_level'=> $motor_level,
            // 'surgical_anaesthesia'=> $surgical_anaesthesia,
            // 'surgery_duration'=> $surgery_duration,
            // 'blood_loss'=> $blood_loss,
            'vasopressor_use'=> $vasopressor_use,
            'updated_at'=>$updated_at,
            'updated_by'=>$drname,
            'sl_cold_l'=>$sl_cold_l,
            'sl_cold_r'=>$sl_cold_r,             
            'sl_touch_l'=>$sl_touch_l,             
            'sl_touch_r'=>$sl_touch_r,             
            'sl_pinpriek_l'=>$sl_pinpriek_l,             
            'sl_pinpriek_r'=>$sl_pinpriek_r,
            'ultra_sound'=>$ultrasound,
            'probe_cover'=>$probe_cover,
            'image_quality'=>$image_quality,
            'maternal_fever'=>$maternal_fever,
            'foetal_CTG'=>$foetal_CTG,   

        ); 
        //print_r($_POST);
        //print_r($spinData);
        //die();   
        $spinModel = new labour_SpinalModel(); 
        $spinModel->set($spinData);
        $spinModel->where('id',$id); 
        $spinModel->where('dr_id',$dr_id);
        $update = $spinModel->update();
        if($update){
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Spinal data Updated Successfully.....'
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
