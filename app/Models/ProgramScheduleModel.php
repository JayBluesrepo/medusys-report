<?php namespace App\Models;

use CodeIgniter\Model;

class ProgramScheduleModel extends Model
{
    protected $table ='conf_ps';
    protected $allowedFields = ['ps_id','conference_id','start_time','end_time','date','topic','moderator','speaker','upload_file','upload_data_files','attend_link','zoom_link','zoom_membership_id','zoom_passcode','youtube_link','googlemeet_link','created_at','created_by','updated_at','updated_by'];
}
?>