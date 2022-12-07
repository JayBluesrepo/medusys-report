<?php namespace App\Models;

use CodeIgniter\Model;

class obstetrics_PreopModel extends Model
{
protected $table ='obstetrics_pre_op'; 
protected $allowedFields = ['id','dr_id','patient_id','speciality','speciality_other','asa','diabetes_mellitus','cvs_disease','respiratory_disease','neurological_disorder','renal_disorder','spin_back_problem','fever_infection','bleeding_disorder','anaemia','malignancy','other','operation_cate','gravida','gestational_parity','gestational_diabetes','pih','eclampsia','lscs','placental','premature','previous','obstetric_other','malposition','lugr','large_gestational','foetal_other','gestational_age','created_at','created_by','updated_at','updated_by','preop_status','flag','upload_patient_status','surgery_list_options','surgery_list_other','anaesthesia_administered'];
} 


?>


