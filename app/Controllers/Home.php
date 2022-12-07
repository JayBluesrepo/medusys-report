<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\addPatientModel;

class Home extends BaseController
{
    // public function index()
    // {   
    //     $model = new addPatientModel();           
    //     $details  = $model->get()->getResultArray();
    //     $data['patient'] = $details;

    //     return view('cnb/login');
    // }

    public function index()
    {   
        return view('includes/header-mels');
       
    }

    public function login(){
        //echo 'hello';
        //die();
        $model = new addPatientModel();           
        $details  = $model->get()->getResultArray();
        $data['patient'] = $details;

        return view('login');
    }

    public function super_admin(){

        return view('admin/super-admin-login');

    }
}
?>
