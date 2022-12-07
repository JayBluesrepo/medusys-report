<?php
namespace App\Controllers\obstetrics;
use App\Controllers\BaseController;
use App\Models\addPatientModel;

use App\Models\obstetrics_EFeedbackModel;
use App\Models\obstetrics_manuaFeedbackModel;
use App\Models\obstetrics_SpinalModel;
use App\Models\obstetrics_EpiduralModel;
use App\Models\obstetrics_combinedSpinalEpiduralModel;
use App\Models\obstetrics_CSA_Model;
use App\Models\obstetrics_PreopModel;
use App\Models\obstetrics_PostopModel;
use App\Models\obstetrics_followupModel;
use App\Models\obstetrics_e_consentModel;

class Feedback extends BaseController
{
   
    public function index()
    {
        $dr_id = session()->get('dr_id');
        $patient_id = session()->get('id');
        // if($dr_id){        
            $calc=[];
            $model = new addPatientModel(); 
            $model->where('dr_id',$dr_id);       
            $model->orderBy('id','DESC');
            $details  = $model->get()->getResultArray();
            $data['patient'] = $details;
            $det = $model->where('id',$patient_id)->first();
            $data['focus'] = $det;
            
            $epiModel = new obstetrics_EpiduralModel();
            $data6  = $epiModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            $spinModel = new obstetrics_SpinalModel();
            $data7  = $spinModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            $epiModel1 = new obstetrics_CSA_Model();
            $data3  = $epiModel1->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            $epiModel2 = new obstetrics_combinedSpinalEpiduralModel();
            $data4  = $epiModel2->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            
            $patient_Model = new addPatientModel();
            $patient_Model->orderBy('id','DESC');
            $patient_Model->where('dr_id',$dr_id);  
            $patient_Model->select('id, rad_id');
            $patient_Model->like('upload_patient_status_obstetric',1);
            $dat1 = $patient_Model->get()->getResultArray();
            // if($dat1){
                $data['old_check'] = $dat1;
            // }
            
            if($data6 || $data7 || $data3 || $data4){
                $data2  = $model->where('dr_id',$dr_id)->where('id',$patient_id)->first();
                $data['info'] = $data2;

                $fbk=['s,t,u'];
                $data['feed'] = $fbk;
                
                $Model = new obstetrics_EFeedbackModel();
                $data1  = $Model->where('dr_id',$dr_id)->where('patient_id',$patient_id)->where('submission',1)->first();
                $data['rsend'] = $data1;

                $data3  = $Model->where('dr_id',$dr_id)->where('patient_id',$patient_id)->where('flag',1)->first();
                $data['mails'] = $data3;

                $Models = new obstetrics_manuaFeedbackModel();
                $data4  = $Models->where('dr_id',$dr_id)->where('patient_id',$patient_id)->where('flag',1)->first();
                $data['sub'] = $data4;

                if($data1 || $data4){
                    $sins=['1,5,10'];
                    $data['feedcheck'] = $sins;
                }

                $model4 = new obstetrics_PreopModel();
                $detail1 = $model4->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
                $data['preo'] = $detail1;

                $model5 = new obstetrics_PostopModel();
                $detail2 = $model5->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
                $data['posto'] = $detail2;

                $model3 = new obstetrics_followupModel();
                $detail3 = $model3->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
                $data['follo'] = $detail3;

                $epiModel = new obstetrics_EpiduralModel();
                $data6  = $epiModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

                $spinModel = new obstetrics_SpinalModel();
                $data7  = $spinModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

                $cseModel = new obstetrics_combinedSpinalEpiduralModel();
                $data8  = $cseModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

                $csaModel = new obstetrics_CSA_Model();
                $data9  = $csaModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

                if($data6 || $data7 || $data8 || $data9){
                    $sin=['1,12,23'];
                    $data['proccheck'] = $sin;
                }

                $models = new obstetrics_e_consentModel(); 
                $data12 = $models->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
                $data['ecocheck'] = $data12;

                foreach($details as $key=>$val){
                    $id = ($val['id']);
                    $data5  = $cseModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data6  = $epiModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data7  = $spinModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data8  = $csaModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    if($data5 || $data6 || $data7 || $data8){
                        $data9 = ['a','b','c'];
                    }
                    $data10  = $Models->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data11  = $Model->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    if($data10 || $data11){
                        $data12 = ['A','B','C'];
                    }
                    $data1  = $models->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data2  = $model4->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data3  = $model5->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data4  = $model3->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    if($data1 && $data2 && $data3 && $data4 && $data9 && $data12){
                        $datas['id'] = $id;
                        array_push($calc,$datas);
                    }
                }
                $data['allcheck'] = $calc;

                return view('obstetrics/feedback',$data);
            // }else{
            //     return view('login');
            // }
        }
        else{

            // if($dr_id){            
                echo "<script>alert('Please add procedure details to add follow up details');</script>";

                $dmf=['j,k,l'];
                $data['procs'] = $dmf; 
            
                $model1 = new obstetrics_PreopModel();
                $detail1 = $model1->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
                $data['preo'] = $detail1;

                $model2 = new obstetrics_PostopModel();
                $detail2 = $model2->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
                $data['posto'] = $detail2;

                $model3 = new obstetrics_followupModel();
                $detail3 = $model3->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
                $data['follo'] = $detail3;

                $epiModel = new obstetrics_EpiduralModel();
                $data6  = $epiModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
                $data['epid'] = $data6;

                $spinModel = new obstetrics_SpinalModel();
                $data7  = $spinModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
                $data['spin'] = $data7;

                $cseModel = new obstetrics_combinedSpinalEpiduralModel();
                $data8  = $cseModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
                $data['cse'] = $data8;

                $csaModel = new obstetrics_CSA_Model();
                $data9  = $csaModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
                $data['csa'] = $data9;

                if($data6 || $data7 || $data8 || $data9){
                    $sin=['1,12,23'];
                    $data['proccheck'] = $sin;
                }
                $Model = new obstetrics_EFeedbackModel();
                $data13  = $Model->where('dr_id',$dr_id)->where('patient_id',$patient_id)->where('submission',1)->first();

                $Models = new obstetrics_manuaFeedbackModel();
                $data14  = $Models->where('dr_id',$dr_id)->where('patient_id',$patient_id)->where('flag',1)->first();
                
                if($data13 || $data14){
                    $sins=['1,5,10'];
                    $data['feedcheck'] = $sins;
                }
                $models = new obstetrics_e_consentModel(); 
                $data12 = $models->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
                $data['ecocheck'] = $data12;
                
                foreach($details as $key=>$val){
                    $id = ($val['id']);
                    $data5  = $cseModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data6  = $epiModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data7  = $spinModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data8  = $csaModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    if($data5 || $data6 || $data7 || $data8){
                        $data9 = ['a','b','c'];
                    }
                    $data10  = $Models->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data11  = $Model->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    if($data10 || $data11){
                        $data12 = ['A','B','C'];
                    }
                    $data1  = $models->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data2  = $model1->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data3  = $model2->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data4  = $model3->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    if($data1 && $data2 && $data3 && $data4 && $data9 && $data12){
                        $datas['id'] = $id;
                        array_push($calc,$datas);
                    }
                }
                $data['allcheck'] = $calc;

                return view('obstetrics/proc',$data);
            // }else{
            //     return view('login');
            // }
        } 
    }
}
?>
