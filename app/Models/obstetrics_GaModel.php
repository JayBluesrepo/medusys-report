<?php namespace App\Models;
use CodeIgniter\Model;

class obstetrics_GaModel extends Model
{
    protected $table ='obstetrics_procedure_ga';
    protected $allowedFields = ['id','dr_id','patient_id','procedure_date','time','ga_done_by1','ga_done_by2','supervision','ga_inhalational','ga_tiva','airway_management1','airway_management2',
    'opioids_delivery','intra_op_analgesia','ia_opioids','ia_opioids_name_dose','ia_paracetamol','ia_paracetamol_name_dose','ia_nsaids','ia_ketamine','ia_tramadol','ia_nerveblock','ia_others',
    'complications','c_aspiration','c_difficult_intubation','c_failed','c_bronchospasm','c_desaturation','c_awarenese','created_by','created_at','updated_at','updated_by',
    'ia_nsaids_name_dose','ia_ketamine_name_dose','ia_tramadol_name_dose','ia_nerveblock_name_dose','ia_others_name_dose'];
}
?>