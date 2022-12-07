<?php namespace App\Models;

use CodeIgniter\Model;

class FollowupCumulativeModel extends Model
{
    protected $table ='cnb_followup_cumulative';
    protected $allowedFields = ['id','patient_id','followup_id','days','la_ropivacaine','la_bupivacaine','la_levobupivacaine','la_lignocaine','created_by','created_at','updated_at','updated_by'];
}
?>