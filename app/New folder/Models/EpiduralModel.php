<?php namespace App\Models;

use CodeIgniter\Model;

class EpiduralModel extends Model
{
    protected $table ='procedure_epidural';
    protected $allowedFields = ['id','patient_id','patient_status','sedation_if','patient_position','wearing_mask','hand_washing','sterile_gown','sterile_draping','skin_prepartion','anatomical_landmark','epedural_level','epidural_level_name','ultrasound','probe_cover','image_quality','needle_brand','other4','needle_type','other6','needle_size','lor_saline','lor_air','hanging_drop',
    'others','approach','no_attempts','epidral_depth','technique','cath_mark','test_dose','la_regimen','la_ropivacaine','la_bupivacaine','la_levobupivacaine','la_lignocaine','opioid_name','opioid_dose','clonidina_dose','dexmeditomidine_dose','dexamephasone_dose','tramadol_dose','kepamine_dose','midazolam_dose','other7','aj_name','aj_dose','in_analgesia',
    'asr_iv_analgesia','opioids','asr_opioid_name','asr_opioid_dose','asr_multimode','asr_ketamine','asr_other_iv_name','asr_other_iv_dose','tc_equipment','tc_multiple','tc_2_anaestsetist','tc_abondoned','tc_catheter','tc_other','other5','ac_ep_resited','ac_last','ac_re_arrest','ac_ca_arrest','ac_radi_pain',
    'ac_parestsesia','ac_bloody_tap','ac_intra_cath','ac_wet_tap','ac_hypoten','ac_nausea','ac_vomit','ac_high_block','ac_sb_block','ac_motor_block','ac_totla_spinal','ac_adp','other2','ac_other','success_status','onset','motor_level','surgical_anaesthesia','surgery_duration','blood_loss','vasopressor_use','created_by','created_at'];
}
?>