<?php namespace App\Models;

use CodeIgniter\Model;

class AccessControlModel extends Model
{
    protected $table ='access_control';
    protected $allowedFields = ['id','role_id','role','modal1_1','modal1_2','modal2_1','modal2_2','created_at'];
}
?>