<?php namespace App\Models;

use CodeIgniter\Model;

class SpinalModel extends Model
{
    protected $table ='procedure_spinal';
    protected $allowedFields = ['id','dr_id','patient_id','patient_status','patient_position','wearing_mask','hand_washing','sterile_gown','sterile_draping','skin_prepartion','anatomical_landmark','spinal_level','spinal_level_name','needle_brand','other4','needle_type','other6','needle_size','approach','no_attempts',
    'la_lignocaine','la_ropivacaine','la_bupivacaine','la_prilocaine','la_2_chloroprocaine','la_otheraine','opioid_name','opioid_dose','clonidina_dose','dexmeditomidine_dose','dexamephasone_dose','tramadol_dose','adrenaline_dose','other7','aj_name','aj_dose','in_analgesia',
    'asr_iv_analgesia','opioids','asr_opioid_name','asr_opioid_dose','asr_multimode','asr_ketamine','asr_other_iv_name','asr_other_iv_dose','tc_equipment','tc_multiple','tc_2_anaestsetist','tc_abondoned','tc_catheter','tc_other','other5','ac_re_arrest','ac_ca_arrest','ac_radi_pain',
    'ac_parestsesia','ac_bloody_tap','ac_hypoten','ac_nausea','ac_vomit','ac_high_block','ac_sb_block','ac_totla_spinal','other2','ac_other','success_status','onset','motor_level','surgical_anaesthesia','surgery_duration','blood_loss','vasopressor_use','created_by','created_at','updated_at','updated_by','sl_cold_l','sl_cold_r','sl_touch_l','sl_touch_r','sl_pinpriek_l','sl_pinpriek_r','upload_patient_status','complication_none','ac_none','analgesia_none','ketamine_dose','midazolam_dose',
    'procedure_date','time','cnb1','cnb2','supervision','ultra_sound','probe_cover','image_quality'];
}
?>