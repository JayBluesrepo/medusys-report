<?php namespace App\Models;

use CodeIgniter\Model;

class MasterListModel extends Model
{
protected $table ='master_list'; 
protected $allowedFields = ['id','master_type_id','master_type_name','name','created_at','created_by'];
} 
?>