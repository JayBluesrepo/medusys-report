<?php namespace App\Models;

use CodeIgniter\Model;

class Conf_paymentModel extends Model
{
    protected $table = 'conf_payment';
    protected $allowedFields = ['id','conference_id','user_id','user_name','amount','pay_id'];
}
?>