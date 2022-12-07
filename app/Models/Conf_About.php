<?php namespace App\Models;

use CodeIgniter\Model;

class Conf_About extends Model
{
    protected $table ='conf_about';
    // protected $primaryKey = 'conference_id';
    protected $allowedFields = ['org_id','conference_id','title','date_from','date_to','location','theme','intro','org_msg','created_at','reg_fee','reg_details','created_by','updated_at','updated_by','brochure'];
}
?>