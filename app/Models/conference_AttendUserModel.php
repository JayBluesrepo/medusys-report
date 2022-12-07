<?php namespace App\Models;

use CodeIgniter\Model;

class conference_AttendUserModel extends Model
{
    protected $table ='conference_attend_user';
    protected $allowedFields = ['id','conference_id','dr_id','org_id','user_name','gamer_id','created_at','created_by'];
}
?>