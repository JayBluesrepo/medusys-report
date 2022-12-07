<?php namespace App\Models;

use CodeIgniter\Model;

class CategoriesModel extends Model
{
    protected $table ='categories';
    protected $allowedFields = ['id','org_id','field_names','fields','category_name','created_at'];
}
?>