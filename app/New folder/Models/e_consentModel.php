<?php namespace App\Models;

use CodeIgniter\Model;

class e_consentModel extends Model
{
protected $table ='e_consent'; 
protected $allowedFields = ['id','patient_id','message','flag','created_at','created_by'];
} 
?>