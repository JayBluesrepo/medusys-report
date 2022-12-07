<?php namespace App\Models;

use CodeIgniter\Model;

class conferenceModel extends Model
{
    protected $table ='conference_list';
    protected $allowedFields = ['id','org_id','role_id','conference_name','date','time','link','status','created_at','created_by','updated_at','updated_by'];
}
?>