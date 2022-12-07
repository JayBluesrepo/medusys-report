<?php namespace App\Models;

use CodeIgniter\Model;

class e_consentModel extends Model
{
protected $table ='e_consent'; 
protected $allowedFields = ['id','dr_id','patient_id','message','flag','created_at','created_by','updated_at','updated_by','upload_patient_status'];
} 
?>