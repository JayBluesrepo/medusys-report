<?php namespace App\Models;

use CodeIgniter\Model;

class FileUploadModel extends Model
{
    protected $table ='upload_files';
    protected $allowedFields = ['id','org_id','chapter_id','chapter_name','categories_id','field_name','files','name','key_value','link','uploaded_at','created_at','created_by'];
}
?>