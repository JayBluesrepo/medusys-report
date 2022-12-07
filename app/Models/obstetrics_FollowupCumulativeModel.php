<?php namespace App\Models;

use CodeIgniter\Model;

class obstetrics_FollowupCumulativeModel extends Model
{
    protected $table ='obstetrics_followup_cumulative';
    protected $allowedFields = ['id','dr_id','patient_id','followup_id','days','la_ropivacaine','la_bupivacaine','la_levobupivacaine','la_lignocaine','created_by','created_at','updated_at','updated_by','upload_patient_status'];
}
?>