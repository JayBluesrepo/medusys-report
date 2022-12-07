<?php namespace App\Models;

use CodeIgniter\Model;

class E_LibrarySectionModel extends Model
{
    protected $table ='e_library_section';
    protected $allowedFields = ['id','org_id','master_name','created_at','created_by','updated_at','updated_by'];
}
?>