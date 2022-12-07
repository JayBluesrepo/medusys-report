<?php namespace App\Models;

use CodeIgniter\Model;

class PreopModel extends Model
{
    protected $table ='cnb_preop';
    protected $allowedFields = ['id','patient_id','speciality','surgery_location','surgery','minimally_invasive','category','asa','diabetes_mellitus','cvs_disease','respiratory_disease','neurological_disorder','renal_disorder','spin_back_problem','fever_infection','bleeding_disorder','anaemia','malignancy','other','purpose','basic_monitering','lipid_rescue','resuscitation_eq','consent_taken','timeout','created_by','created_at','updated_at','updated_by','preop_status','flag'];
}
?>