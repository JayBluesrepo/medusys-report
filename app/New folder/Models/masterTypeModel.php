<?php namespace App\Models;

use CodeIgniter\Model;

class masterTypeModel extends Model
{
protected $table ='master_type'; 
protected $allowedFields = ['id','master_type','created_at','created_by'];
} 
?>