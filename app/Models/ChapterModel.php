<?php namespace App\Models;

use CodeIgniter\Model;

class ChapterModel extends Model
{
    protected $table ='chapter';
    protected $allowedFields = ['id','org_id','field_names','fields','category_name',
                                'category','chapter_name','created_at'];
}
?>