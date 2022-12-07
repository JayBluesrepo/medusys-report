<?php
namespace App\Controllers;
use App\Models\addPatientModel;
use App\Models\EpiduralModel;
use App\Models\MasterListModel;
use App\Models\SpinalModel;
use App\Models\PreopModel;
use App\Models\PostopModel;
use App\Models\FollowupModel;
use App\Models\combinedSpinalEpiduralModel;
use App\Models\CSA_Model;
use App\Models\FeedbackModel;
use App\Models\EFeedbackModel;
use App\Models\e_consentModel;

class EpiDetails extends BaseController
{
    public function index()
    {
        $epi_id = $this->request->getVar('id');
        $id = session()->get('id');

        $model = new addPatientModel();        
        $details  = $model->get()->getResultArray();
        $data['patient'] = $details;
        $det = $model->where('id',$id)->first();
        $data['focus'] = $det;
        
        $model1 = new EpiduralModel(); 
        $detail = $model1->where('id',$epi_id)->first();
        $data['info'] = $detail;

        $model = new MasterListModel();        
        $model->where('master_type_name','Epidural Needle Brand')->orderBy('id','ASC');
        $details  = $model->get()->getResultArray();
        $data['epidural_needle_brand'] = $details;

        $model = new MasterListModel();        
        $model->where('master_type_name','Epidural Needle Type')->orderBy('id','ASC');
        $details  = $model->get()->getResultArray();
        $data['epidural_needle_type'] = $details;
       
        $dmf=['j,k,l'];
        $data['procs'] = $dmf;
        
        $model1 = new PreopModel();
        $detail1 = $model1->where('patient_id',$id)->first();
        $data['preo'] = $detail1;

        $model2 = new PostopModel();
        $detail2 = $model2->where('patient_id',$id)->first();
        $data['posto'] = $detail2;

        $model3 = new FollowupModel();
        $detail3 = $model3->where('patient_id',$id)->first();
        $data['follo'] = $detail3;

        $epiModel = new EpiduralModel();
        $data6  = $epiModel->where('patient_id',$id)->first();

        $spinModel = new SpinalModel();
        $data7  = $spinModel->where('patient_id',$id)->first();

        $cseModel = new combinedSpinalEpiduralModel();
        $data8  = $cseModel->where('patient_id',$id)->first();

        $csaModel = new CSA_Model();
        $data9  = $csaModel->where('patient_id',$id)->first();

        if($data6 || $data7 || $data8 || $data9){
            $sin=['1,12,23'];
            $data['proccheck'] = $sin;
        }
        $Model = new EFeedbackModel();
        $data1  = $Model->where('patient_id',$id)->where('submission',1)->first();

        $Models = new FeedbackModel();
        $data4  = $Models->where('patient_id',$id)->where('flag',1)->first();
        
        if($data1 || $data4){
            $sins=['1,5,10'];
            $data['feedcheck'] = $sins;
        }

        $models = new e_consentModel(); 
        $data12 = $models->where('patient_id',$id)->first();
        $data['ecocheck'] = $data12;

        return view('epidetails',$data);
    }
    
    public function edit_epidu(){
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
        $anatomical_landmark = $this->request->getVar('anatomical_landmark');
        $epidural = $this->request->getVar('epidural_level');
        $epidural_level_name = $this->request->getVar('epidural_type');
        $ultra_sound = $this->request->getVar('ultra_sound');
        $probe_cover = $this->request->getVar('probe_cover');
        $image_quality = $this->request->getVar('image_quality');
        $needle_brand = $this->request->getVar('needle_brand');
        $Other1 = $this->request->getVar('Other1');
        $needle_type = $this->request->getVar('needle_type');
        $other6 = $this->request->getVar('other6');
        $needle_size = $this->request->getVar('needle_size');
        $lor_saline = $this->request->getVar('lor_saline');
        $lor_air = $this->request->getVar('lor_air');
        $hanging_drop = $this->request->getVar('hanging_drop');
        $others1 = $this->request->getVar('others[]');
        $others = implode($others1, " - ");
        $approach = $this->request->getVar('approach');
        $no_attempts = $this->request->getVar('no_attempts');
        $epidral_depth = $this->request->getVar('epidral_depth');
        $technique = $this->request->getVar('optradio1');
        $cath_mark = $this->request->getVar('cath_mark');
        $test_dose = $this->request->getVar('test_dose');
        $la_regimen = $this->request->getVar('la_regimen');
        $ropivacaine = $this->request->getVar('ropivacaine');
        $ropi_per = $this->request->getVar('ropi_per');
        $ropi_ml = $this->request->getVar('ropi_ml');
        $ropi_mg = $this->request->getVar('ropi_mg');
        $la_ropivacaine = $ropivacaine.','.$ropi_per.','.$ropi_ml.','.$ropi_mg;
        $bupivacaine = $this->request->getVar('bupivacaine');
        $bupi_per = $this->request->getVar('bupi_per');
        $bupi_ml = $this->request->getVar('bupi_ml');
        $bupi_mg = $this->request->getVar('bupi_mg');
        $la_bupivacaine = $bupivacaine.','.$bupi_per.','.$bupi_ml.','.$bupi_mg;
        $levobupivacaine = $this->request->getVar('levobupivacaine');
        $levo_per = $this->request->getVar('levo_per');
        $levo_ml = $this->request->getVar('levo_ml');
        $levo_mg = $this->request->getVar('levo_mg');
        $la_levobupivacaine = $levobupivacaine.','.$levo_per.','.$levo_ml.','.$levo_mg;
        $Lignocaine = $this->request->getVar('Lignocaine');
        $ligno_per = $this->request->getVar('ligno_per');
        $ligno_ml = $this->request->getVar('ligno_ml');
        $ligno_mg = $this->request->getVar('ligno_mg');
        $la_lignocaine = $Lignocaine.','.$ligno_per.','.$ligno_ml.','.$ligno_mg;
        $opioid_n = $this->request->getVar('opioid_name[]');
        $opioid_name = implode($opioid_n, ",");
        $opioid_d = $this->request->getVar('opioid_dose[]');
        $opioid_dose = implode($opioid_d, ",");
        $clonidne = $this->request->getVar('clonidne');
        $dexmeditomidine = $this->request->getVar('dexmeditomidine');
        $dexamethasone = $this->request->getVar('dexamethasone');
        $tramadol = $this->request->getVar('tramadol');
        $ketamin = $this->request->getVar('ketamin');
        $midazolam = $this->request->getVar('midazolam');
        $Other7 = $this->request->getVar('Other7');
        $aj_n = $this->request->getVar('aj_name[]');
        $aj_name = implode($aj_n, ",");
        $aj_d = $this->request->getVar('aj_dose[]');
        $aj_dose = implode($aj_d, ",");
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
        $tc_catheter = $this->request->getVar('tc_catheter');
        $tc_other = $this->request->getVar('tc_other');
        $other4 = $this->request->getVar('other4');
        $ac_ep_resited = $this->request->getVar('ac_ep_resited');
        $ac_last = $this->request->getVar('ac_last');
        $ac_re_arrest = $this->request->getVar('ac_re_arrest');
        $ac_ca_arrest = $this->request->getVar('ac_ca_arrest');
        $ac_radi_pain = $this->request->getVar('ac_radi_pain');
        $ac_parestsesia = $this->request->getVar('ac_parestsesia');
        $ac_bloody_tap = $this->request->getVar('ac_bloody_tap');
        $ac_intra_cath = $this->request->getVar('ac_intra_cath');
        $ac_wet_tap = $this->request->getVar('ac_wet_tap');
        $ac_hypoten = $this->request->getVar('ac_hypoten');
        $ac_nausea = $this->request->getVar('ac_nausea');
        $ac_vomit = $this->request->getVar('ac_vomit');
        $ac_high_block = $this->request->getVar('ac_high_block');
        $ac_sb_block = $this->request->getVar('ac_sb_block');
        $ac_motor_block = $this->request->getVar('ac_motor_block');
        $ac_total_spinal = $this->request->getVar('ac_total_spinal');
        $ac_adp = $this->request->getVar('ac_adp');
        $ac_other = $this->request->getVar('ac_other');
        $other5 = $this->request->getVar('other5');
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
        $epiduData = array(
            'patient_status'=> $patient_status,
            'patient_position'=> $patient_pos, //optional
            'wearing_mask'=>$wearing_mask,
            'hand_washing'=>$hand_washing,
            'sterile_gown'=> $sterile_gown,
            'sterile_draping'=> $sterile_draping,
            'skin_prepartion'=> $skin_prep,
            'anatomical_landmark' => $anatomical_landmark,
            'epedural_level'=> $epidural,
            'epidural_level_name'=> $epidural_level_name,
            'ultrasound'=> $ultra_sound,          
            'probe_cover'=> $probe_cover, //optional
            'image_quality'=> $image_quality, //optional
            'needle_brand'=> $needle_brand,
            'other4'=> $Other1,  //optional
            'needle_type'=>$needle_type,  
            'other6'=> $other6,  //optional
            'needle_size'=> $needle_size,
            'lor_saline'=> $lor_saline,
            'lor_air'=> $lor_air,
            'hanging_drop'=> $hanging_drop,
            'others'=> $others,
            'approach'=>$approach,  
            'no_attempts'=> $no_attempts, 
            'epidral_depth'=> $epidral_depth,
            'technique'=> $technique,
            'cath_mark'=> $cath_mark,
            'test_dose'=> $test_dose,
            'la_regimen'=> $la_regimen,
            'la_ropivacaine'=> $la_ropivacaine,
            'la_bupivacaine'=> $la_bupivacaine,
            'la_levobupivacaine'=> $la_levobupivacaine,
            'la_lignocaine'=> $la_lignocaine,
            'opioid_name'=> $opioid_name,
            'opioid_dose'=>$opioid_dose,  
            'clonidina_dose'=> $clonidne, 
            'dexmeditomidine_dose'=> $dexmeditomidine,
            'dexamephasone_dose'=> $dexamethasone,
            'tramadol_dose'=> $tramadol,
            'kepamine_dose'=> $ketamin,
            'midazolam_dose'=> $midazolam,
            'other7'=> $Other7,
            'aj_name'=> $aj_name,
            'aj_dose'=> $aj_dose,
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
            'tc_catheter'=> $tc_catheter,
            'tc_other'=> $tc_other,
            'other5'=> $other4,
            'ac_ep_resited'=> $ac_ep_resited,
            'ac_last'=>$ac_last,  
            'ac_re_arrest'=> $ac_re_arrest, 
            'ac_ca_arrest'=> $ac_ca_arrest,
            'ac_radi_pain'=> $ac_radi_pain,
            'ac_parestsesia'=> $ac_parestsesia,
            'ac_bloody_tap'=> $ac_bloody_tap,
            'ac_intra_cath'=> $ac_intra_cath,
            'ac_wet_tap'=> $ac_wet_tap,
            'ac_hypoten'=> $ac_hypoten,
            'ac_nausea'=> $ac_nausea,
            'ac_vomit'=> $ac_vomit,
            'ac_high_block'=> $ac_high_block,
            'ac_sb_block'=> $ac_sb_block,
            'ac_motor_block'=> $ac_motor_block,
            'ac_totla_spinal'=> $ac_total_spinal,
            'ac_adp'=> $ac_other,
            'ac_other'=> $ac_other,
            'other2'=> $other5,
            'success_status'=> $success_status,
            'onset'=> $onset,
            'motor_level'=> $motor_level,
            'surgical_anaesthesia'=> $surgical_anaesthesia,
            'surgery_duration'=> $surgery_duration,
            'blood_loss'=> $blood_loss,
            'vasopressor_use'=> $vasopressor_use
        );
        $epiModel = new EpiduralModel(); 
        $epiModel->set($epiduData);
        $epiModel->where('id',$id);
        $update = $epiModel->update();
        if($update){
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Epidural data Updated Successfully.....'
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