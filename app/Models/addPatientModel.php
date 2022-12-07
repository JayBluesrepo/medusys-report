<?php namespace App\Models;

use CodeIgniter\Model;

class addPatientModel extends Model
{
protected $table ='cnb_patient_details'; 
protected $allowedFields = ['id','org_id','dr_id','patient_name','patient_id','rad_id','patient_email_id','gender','age','weight_kg','hight','cm','bmi','procedure_time','time','cnb_done_by1','cnb_done_by2','supervision','hospital_id','hospital','e_consent','created_by','created_at','flag','updated_at','updated_by','upload_patient_status','upload_patient_status_labour','upload_patient_status_obstetric'];


} 
?>
