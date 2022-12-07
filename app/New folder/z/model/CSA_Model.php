<?php namespace App\Models;

use CodeIgniter\Model;

class CSA_Model extends Model
{
protected $table ='procedure_csa'; 
protected $allowedFields = ['id','patient_id','patient_status','patient_position','wearing_mask','hand_washing','sterile_gown','sterile_draping','skin_prep','csa','anatomical_landmark','spinal_level','spinal_level_name','ultra_sound','probe_cover','image_quality','needle_brand','needle_type','needle_size','approach','no_attempts','catheter_type','catheter_mark','la_regimen','lignocaline','bupivacaine','rupivacaine','prilocaine','chloroprocaine','other_la','opioid_aj','opioid_aj_name_dose','clonidne_aj','dexmeditomidine_aj','dexamethasone_aj','tramadol_aj','ketamine_aj','midazolam_aj','aj','other_aj_name_dose','asr','asr_inhalation','asr_iv_analgesia','asr_opioid_name_dose','asr_multi_model','asr_ketamine','asr_other_name_dose','tc_equipment','tc_multiple_attempts','tc_2_anaesthetist','tc_failure_space','tc_catheter_related','tc_other','ac_status','ac_last','ac_respiratory_arrest','ac_cardiac_arrest','ac_radicular_pain','ac_paresthesia_pain','ac_bloody_tap','ac_hypotension','ac_nausea','ac_vomiting','ac_high_block','ac_subdural_block','ac_total_spinal','ac_other','success','success_onset','motor_level','onset_surgical_anaesthesia','duration_surgery','blood_loss','vasopressor_use'];
} 
?>