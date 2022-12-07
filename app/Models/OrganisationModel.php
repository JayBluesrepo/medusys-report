<?php namespace App\Models;

use CodeIgniter\Model;

class OrganisationModel extends Model
{
protected $table ='organisation_role'; 
protected $allowedFields = ['id','organisation_name','created_at','created_by'];
} 
?>