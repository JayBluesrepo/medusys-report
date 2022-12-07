<?php namespace App\Models;

use CodeIgniter\Model;

class conference_EventModel extends Model
{
    protected $table ='conf_events';
    protected $allowedFields = ['id','conference_id','event_name','amount','created_by'];
}
?>