<?php namespace App\Models;

use CodeIgniter\Model;

class FacultyModel extends Model
{
    protected $table ='conf_faculty'; 
    protected $allowedFields = ['id','conference_id','ps_faculty_id','speaker','profile_pic','name','present_des','qualification','special_int','publication','created_at','created_by','updated_at','updated_by'];
} 
?>