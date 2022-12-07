<?php namespace App\Models;

use CodeIgniter\Model;

class labour_PreProcedureModel extends Model
{
protected $table ='labour_pre_procedure'; 
protected $allowedFields = ['id','dr_id','patient_id','speciality','asa','diabetes_mellitus','cvs_disease','respiratory_disease','neurological_disorder','renal_disorder','spin_back_problem','fever_infection','bleeding_disorder','anaemia','malignancy','other','operation_cate','gravida','gestational_parity','gestational_diabetes','pih','eclampsia','lscs','placental','premature','previous','obstetric_other','malposition','lugr','large_gestational','foetal_other','gestational_age','cervical','onset_labour','entonox','atypical','pnb','cnb','pharmacological_other','bio_feedback','acupressure','tens','relaxation','non_pharma_other','basic_monitering','lipid_rescue','resuscitation_eq','consent_taken','timeout','created_at','created_by','updated_at','updated_by','preop_status','flag','upload_patient_status'];
} 


?>


