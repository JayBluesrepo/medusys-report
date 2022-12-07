<?php namespace App\Models;

use CodeIgniter\Model;

class ConferencefeedbackModel extends Model
{
    protected $table ='conf_feedback'; 
    protected $allowedFields = ['id','conference_id','ps_id','user_name','user_id','rating','review','created_at','created_by'];
} 
?> 