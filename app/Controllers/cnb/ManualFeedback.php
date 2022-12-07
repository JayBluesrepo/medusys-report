<?php
namespace App\Controllers\cnb;
use App\Controllers\BaseController;
use App\Models\addPatientModel;
use App\Models\FeedbackModel;
use App\Models\SpinalModel;
use App\Models\EpiduralModel;
use App\Models\combinedSpinalEpiduralModel;
use App\Models\FollowupCumulativeModel;
use App\Models\CSA_Model;
use App\Models\PreopModel;
use App\Models\PostopModel;
use App\Models\FollowupModel;
use App\Models\EFeedbackModel;
use App\Models\e_consentModel;

class ManualFeedback extends BaseController
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
            
            $fbk=['s,t,u'];
            $data['feed'] = $fbk; 

            $Model = new EFeedbackModel();
            $data1  = $Model->where('dr_id',$dr_id)->where('patient_id',$patient_id)->where('submission',1)->first();

            $Models = new FeedbackModel();
            $data4  = $Models->where('dr_id',$dr_id)->where('patient_id',$patient_id)->where('flag',1)->first();

            if($data1 || $data4){
                $sins=['1,5,10'];
                $data['feedcheck'] = $sins;
            }
            
            $patient_Model = new addPatientModel();
            $patient_Model->orderBy('id','DESC');
            $patient_Model->where('dr_id',$dr_id);  
            $patient_Model->select('id, rad_id');
            $patient_Model->like('upload_patient_status',1);
            $dat1 = $patient_Model->get()->getResultArray();
            // if($dat1){
                $data['old_check'] = $dat1;
            // }

            $model4 = new PreopModel();
            $detail1 = $model4->where('dr_id',$dr_id)->where('dr_id',$dr_id)->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['preo'] = $detail1;

            $model5 = new PostopModel();
            $detail2 = $model5->where('dr_id',$dr_id)->where('dr_id',$dr_id)->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['posto'] = $detail2;

            $model3 = new FollowupModel();
            $detail3 = $model3->where('dr_id',$dr_id)->where('dr_id',$dr_id)->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['follo'] = $detail3;

            $epiModel = new EpiduralModel();
            $data6  = $epiModel->where('dr_id',$dr_id)->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            $spinModel = new SpinalModel();
            $data7  = $spinModel->where('dr_id',$dr_id)->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            $cseModel = new combinedSpinalEpiduralModel();
            $data8  = $cseModel->where('dr_id',$dr_id)->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            $csaModel = new CSA_Model();
            $data9  = $csaModel->where('dr_id',$dr_id)->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            if($data6 || $data7 || $data8 || $data9){
                $sin=['1,12,23'];
                $data['proccheck'] = $sin;
            }

            $models = new e_consentModel(); 
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

            return view('cnb/manual_feedback',$data);
        // }else{
        //     return view('login');
        // }
    }
    public function show_manual(){

        $dr_id = session()->get('dr_id');
        $patient_id = session()->get('id');
        // if($dr_id){        
            $Model = new FeedbackModel(); 
            $Model->where('dr_id',$dr_id);
            $Model->where('flag',1);
            $data1  = $Model->where('patient_id',$patient_id)->first();

            $feed_id = $data1['id'];
            
            $model1 = new FeedbackModel(); 
            $detail = $model1->where('dr_id',$dr_id)->where('id',$feed_id)->first();
            $data['info'] = $detail;
            
            return view('cnb/feedback_details',$data);
        // }else{
        //     return view('login');
        // }
    }
    public function add_feed(){
        
        $patient_id = session()->get('id');
        $drowsiness = $this->request->getVar('option1');
        $pain_at_surgery = $this->request->getVar('option2');
        $thirst = $this->request->getVar('option3'); 
        $hoarseness = $this->request->getVar('option4');
        $sore_throat = $this->request->getVar('option5');
        $nausea_vomiting = $this->request->getVar('option6');
        $feeling_cold = $this->request->getVar('option7');
        $confusion_disorientation = $this->request->getVar('option8');
        $backpain = $this->request->getVar('option9');
        $shivering = $this->request->getVar('option10');
        
        $anaesthesist_time = $this->request->getVar('option14');
        $regional_anaesthesia_info = $this->request->getVar('option15');
        $anaesthesia_satisfaction = $this->request->getVar('option16');
        $pain_therapy_satisfaction = $this->request->getVar('option17');
        $nausea_vomit_satisfaction = $this->request->getVar('option18');
        $numbness_limb_bothering = $this->request->getVar('option19');
        $numbness_pain_experience = $this->request->getVar('option20');
        $similar_op_again = $this->request->getVar('option21');
        $overall_satisfaction = $this->request->getVar('overall_satisfaction');
        $any_suggestions = $this->request->getVar('any_suggestions');

        // $pain_before_surgery = $this->request->getVar('option11');
        // $anaesthesist_involved = $this->request->getVar('option12');
        // $well_managed = $this->request->getVar('option13');

        $pain_before_surgery1 = $this->request->getVar('option11');
        $anaesthesist_involved1 = $this->request->getVar('option12');


        if($pain_before_surgery1 == 'Yes' && $anaesthesist_involved1 == 'Yes'){
            $pain_before_surgery = $this->request->getVar('option11');
            $anaesthesist_involved = $this->request->getVar('option12');
            $well_managed = $this->request->getVar('option13');
        }else if($pain_before_surgery1 == 'No'){
            $pain_before_surgery = $this->request->getVar('option11');
            $anaesthesist_involved = '';
            $well_managed = '';
        }else if($pain_before_surgery1 == 'Yes' && $anaesthesist_involved1 == 'No'){
            $pain_before_surgery = $this->request->getVar('option11');
            $anaesthesist_involved = $this->request->getVar('option12');
            $well_managed = '';
        }

        $drname = session()->get('name');
        $dr_id = session()->get('dr_id');

        $feedData = array(
            'patient_id'=>$patient_id,
            'drowsiness'=> $drowsiness,
            'pain_at_surgery'=> $pain_at_surgery, 
            'thirst'=>$thirst,
            'hoarseness'=>$hoarseness,
            'sore_throat'=> $sore_throat,
            'nausea_vomiting'=> $nausea_vomiting,
            'feeling_cold'=> $feeling_cold,
            'confusion_disorientation' => $confusion_disorientation,
            'backpain'=> $backpain,
            'shivering'=> $shivering,          
            'pain_before_surgery'=> $pain_before_surgery, 
            'anaesthesist_involved'=> $anaesthesist_involved, 
            'well_managed'=> $well_managed,
            'anaesthesist_time'=> $anaesthesist_time,  
            'regional_anaesthesia_info'=>$regional_anaesthesia_info,  
            'anaesthesia_satisfaction'=> $anaesthesia_satisfaction,  
            'pain_therapy_satisfaction'=> $pain_therapy_satisfaction,
            'nausea_vomit_satisfaction'=> $nausea_vomit_satisfaction,
            'numbness_limb_bothering'=> $numbness_limb_bothering,
            'numbness_pain_experience'=> $numbness_pain_experience,
            'similar_op_again'=> $similar_op_again,
            'overall_satisfaction'=> $overall_satisfaction,
            'any_suggestions'=> $any_suggestions,
            'flag'=>1,
            'created_by'=>$drname,
            'dr_id'=>$dr_id
        );
        $feedModel = new FeedbackModel(); 
        $feedModel->save($feedData);
        $insertedID = $feedModel->insertID();
        if($insertedID){
            $model = new addPatientModel();
            $models = new e_consentModel(); 
            $model1 = new PreopModel();
            $cseModel = new combinedSpinalEpiduralModel();
            $epiModel = new EpiduralModel();
            $spinModel = new SpinalModel();
            $csaModel = new CSA_Model();
            $model2 = new PostopModel();
            $model3 = new FollowupModel();
            $models3 = new FollowupCumulativeModel();
            $Model = new EFeedbackModel();
            $Models = new FeedbackModel();
            $data = [
                'upload_patient_status' => 1
            ];
            $model->set($data);
            $model->where('dr_id',$dr_id)->where('id', $patient_id);
            $insertID1 = $model->update();
            $models->set($data);
            $models->where('dr_id',$dr_id)->where('patient_id', $patient_id);
            $insertID2 = $models->update();
            $model1->set($data);
            $model1->where('dr_id',$dr_id)->where('patient_id', $patient_id);
            $insertID3 = $model1->update();
            $cseModel->set($data);
            $cseModel->where('dr_id',$dr_id)->where('patient_id', $patient_id);
            $insertID4 = $cseModel->update();
            $epiModel->set($data);
            $epiModel->where('dr_id',$dr_id)->where('patient_id', $patient_id);
            $insertID5 = $epiModel->update();
            $spinModel->set($data);
            $spinModel->where('dr_id',$dr_id)->where('patient_id', $patient_id);
            $insertID6 = $spinModel->update();
            $csaModel->set($data);
            $csaModel->where('dr_id',$dr_id)->where('patient_id', $patient_id);
            $insertID7 = $csaModel->update();
            $model2->set($data);
            $model2->where('dr_id',$dr_id)->where('patient_id', $patient_id);
            $insertID8 = $model2->update();
            $model3->set($data);
            $model3->where('dr_id',$dr_id)->where('patient_id', $patient_id);
            $insertID9 = $model3->update();
            $models3->set($data);
            $models3->where('dr_id',$dr_id)->where('patient_id', $patient_id);
            $insertID10 = $models3->update();
            $Models->set($data);
            $Models->where('dr_id',$dr_id)->where('patient_id', $patient_id);
            $insertID11 = $Models->update();
            $Model->set($data);
            $Model->where('dr_id',$dr_id)->where('patient_id', $patient_id);
            $insertID12 = $Model->update();
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Feedback data Added Successfully.....',
                'msg' => $insertedID
            ));
       }
       else{
            return json_encode(array(
                 'result'    => 0,
                 'message'     => 'Something went wrong.....'
            ));
        }
    }
}
?>
