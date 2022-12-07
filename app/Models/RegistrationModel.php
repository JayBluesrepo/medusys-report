<?php namespace App\Models;

use CodeIgniter\Model;

class Registration extends Model
{
    protected $table ='conf_reg';
    // protected $primaryKey = 'conference_id';
    protected $allowedFields = ['id','conference_id','reg_fee','reg_details','created_at','created_by','updated_at','updated_by',];
}
?>