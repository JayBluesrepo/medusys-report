<?php namespace App\Models;

use CodeIgniter\Model;

class CertificateModel extends Model
{
    protected $table ='conf_certificate';
    // protected $primaryKey = 'conference_id';
    protected $allowedFields = ['id','conference_id','ps_id','logo1','logo2','logo3','accredited_by','signature1','sign1','signature2','sign2','created_at','created_by','updated_at','updated_by',];
}
?>