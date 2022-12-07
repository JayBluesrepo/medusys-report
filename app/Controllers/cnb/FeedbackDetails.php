<?php
namespace App\Controllers\cnb;
use App\Controllers\BaseController;
use App\Models\addPatientModel;
use App\Models\FeedbackModel;

class FeedbackDetails extends BaseController
{
    public function index()
    {
        $dr_id = session()->get('dr_id');
        
        // if($dr_id){        
            $feed_id = $this->request->getVar('id');

            $model = new addPatientModel();   
            $model->orderBy('id','DESC');
            $details  = $model->get()->getResultArray();
            $data['patient'] = $details;
            
            $model1 = new FeedbackModel(); 
            $detail = $model1->where('id',$feed_id)->first();
            $data['info'] = $detail;

            return view('cnb/feedback_details',$data);
        // }else{
        //     return view('login');
        // }
    }
}
?>