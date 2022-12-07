<?php namespace App\Models;

use CodeIgniter\Model;

class FollowupModel extends Model
{
    protected $table ='cnb_followup';
    protected $allowedFields = ['id','dr_id','patient_id','duration','postdural_puncture','backache_epidural','perst_motor','perst_sensory','asep_meningi','bacterial_meningi','epidural_abs','perm_neuro_compli','catheter','epidural_haema','others','other','followup_proc','created_by','created_at','updated_at','updated_by','upload_patient_status'];
}
?>