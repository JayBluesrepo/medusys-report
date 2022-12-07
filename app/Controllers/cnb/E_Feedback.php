<?php namespace App\Controllers\cnb;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\EFeedbackModel;
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
use App\Models\e_consentModel;
use App\Models\RegisterUserModel;


class E_Feedback extends BaseController
{ 
    public function index()
    {   
        $dr_id = session()->get('dr_id');
        $name = session()->get('name');

        $patient_id = session()->get('id');

        $mail = new addPatientModel();
        $mail->select('patient_email_id');
        $email1 = $mail->where('id',$patient_id)->first();

        // if($dr_id){        
            // $email1 = session()->get('patient_email_id');
            $pass = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6); 
            
            $email = \Config\Services::email();
            
            $email->setFrom("healthcare@medusyspty.com", "E_Feedback");
            $email->setTo($email1);

            $email->setSubject('Online feedback');
            $href = 'https://medusys.in/public/cnb/E_Feedback/view_feedback?id='.$pass.'';           
                
                $find_dr = new RegisterUserModel();
                $z = $find_dr->where('id',$dr_id)->first();
                $hospital = $z['hospital'];

                // print_r($hospital);die(); 

                $content .= '<html>';
                $content .= '<head>';
                $content .= '<title></title>';
                $content .= '</head>';
                $content .= '<body>';
                $content .= '<div class="main_one" style="width: 900px; background: #F1F4F8; margin: auto; left: 0; right: 0; padding-top: 40px; padding-bottom: 40px;" >';
                $content .= '<div class="main" style="width: 700px; background: white; margin: auto; left: 0; right: 0;">';
                // $content .= '<div class="img1" style="text-align: center;">';
                // $content .= '<img src="'.$href.'/assets/images/'.$upload_logo.'" style="padding: 30px 0px; width:15%;">';
                // $content .= '</div>';
                // $content .= '<div class="img2">';
                // $content .= '<img src="'.$href.'/assets/images/Thanks.png" style="width: 100%">';
                // $content .= '</div>';
                $content .= '<div class="cont">';
                $content .= '<h2 style="text-align: center; color: #003188; font-weight: bold; font-size: 45px;">We Appreciate your <br> feedback!</h2>';
                $content .= '<p style="text-align: justify; padding: 0px 15px;line-height: 1.6; font-size: 19px;">Your anaesthetist is the specialist doctor responsible for your safety and comfort during and immediately after your surgery. Your feedback will be highly appreciated by our anaesthetist and anaesthesia team.<br>
                The entire survey should only take about 5 minutes to complete and the purpose of the survey is to identify areas of improvement and focus on professional development. We would appreciate your time and rest assured that your feedback will remain anonymous.</p>';
                $content .= '<p style="text-align:center !important;"><a href="'.$href.'" style="background: #F8B370;color: white;padding: 15px 60px;border-radius: 30px;text-decoration: none;font-size: 27px;">CLICK HERE</a></p>'; 
                $content .= '<p style="text-align: justify; padding: 0px 15px;line-height: 1.6; font-size: 19px;" >Best Regards,<br>'.$name.'</p>';
                $content .= '</div>';
                
                // $content .= '<div class="last" style="text-align: center; padding-bottom: 10px; border-top: 1px solid #0000006b; padding-top: 30px; margin-top: 25px;">';
                // $content .= '<img src="'.$href.'/assets/images/'.$upload_logo.'" style="width:15%;">';
                // $content .= '</div>';
                /*$content .= '<div class="last2" style="text-align: center;">';
                $content .= '<img src="'.$href.'/assets/images/twitter.png" style="width: 5%;">';
                $content .= '<img src="'.$href.'/assets/images/facebook.png"  style="width: 5%;">';
                $content .= '<img src="'.$href.'/assets/images/instagram.png"  style="width: 5%;">';
                $content .= '<img src="'.$href.'/assets/images/linkedin.png"  style="width: 5%;">';
                $content .= '</div>';*/
                $content .= '<div  style="width: 100%; clear: both; height: 85px; padding-top: 20px; ">';
                $content .= '<div style="width: 50%; float: left; padding-left: 15px; font-size: 19px;">';
                $content .= '<p>Hospital Name: '.$hospital.'</p>';
                // $content .= '<p>Doctor Name: '.$name.'</p>';

                // $content .= '<p>Address :<br> '.$res->hospital_address.'</p>';
                $content .= '</div>';

                // $content .= '<div style="width: 40%; float: right; font-size: 19px;">';
                // $content .= '<p>email id:<br>'.$res->hospital_email.'</p>';
                // $content .= '</div>';
                $content .= '</div>';

                $content .= '<div  style="width: 100%; clear: both; height: 85px; padding-top: 0px; padding-bottom: 30px;">';
                // $content .= '<div style="width: 60%; float: left; font-size: 19px;">';
                // $content .= '<p style="margin-top:0px !important; padding-left:15px;">Website:<br>'.$res->website.'</p>';
                // $content .= '</div>';
                // $content .= '<div style="width: 40%; float: left; font-size: 19px;">';
                // $content .= '<p style="margin-top:0px !important;">Phone number:<br>'.$res->hospital_contact_number.'</p>';
                // $content .= '</div>';
                $content .= '</div>';
                $content .= '</div>';
                $content .= '</div>';
                $content .= '</body>';
                $content .= '</html>';

                $email->setMessage($content);
        
            
            if($email->send()){
                $efModel = new EFeedbackModel();
                $data = [
                    'track' => $pass,
                    'flag'  => 1,
                    'patient_id'=>$patient_id,
                    'dr_id'=>$dr_id
                ];
                $efModel->insert($data);
                $insertID = $efModel->insertID();

                return json_encode(array(
                    'result'    => 1
                ));
            }else{
                return json_encode(array(
                    'result'    => 0,
                    'message'   => 'Something went wrong.....'
                ));
            }
        // }else{
        //     return view('login');
        // }
        
    }
    public function view_feedback()
    {
        $dr_id = session()->get('dr_id');
        // if($dr_id){        
            $tra = $this->request->getVar('id');
            $qq = (array)$tra;
            $data['track'] = $qq;

            $patient_id = session()->get('id');
            $model  = new EFeedbackModel();
            $data1  = $model->where('track',$tra)->first();
            $data['test'] = $data1;
            // print_r($data1); die();

            return view('cnb/e-feedback', $data);
        // }else{
        //     return view('login');
        // }
    }
    public function show_feedback()
    {
        $dr_id = session()->get('dr_id');
        $patient_id = session()->get('id');
        
        // if($dr_id){        
            $Model = new EFeedbackModel(); 
            $Model->where('flag',0);
            $data1  = $Model->where('patient_id',$patient_id)->first();
            $efeed_id = $data1['id'];

            $model = new addPatientModel();        
            $details  = $model->get()->getResultArray();
            $data['patient'] = $details;
            
            $model1 = new EFeedbackModel(); 
            $detail = $model1->where('id',$efeed_id)->first();
            $data['info'] = $detail;
        
            $fbk=['s,t,u'];
            $data['feed'] = $fbk; 

            return view('cnb/e-feedbackdetails',$data);
        // }else{
        //     return view('login');
        // }
    }

    public function resend()
    {
        $patient_id = session()->get('id');
        $dr_id = session()->get('dr_id');    
        $name = session()->get('name');       


        // $email1 = session()->get('patient_email_id');
        $mail = new addPatientModel();
        $mail->select('patient_email_id');
        $email1 = $mail->where('id',$patient_id)->first();

        $pass = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
        $efModel = new EFeedbackModel();
        $efModel->set('track',  $pass);
        $efModel->where('patient_id',$patient_id);
        $update = $efModel->update(); 
        if($update){
            $email = \Config\Services::email();
           
            $email->setFrom("healthcare@medusyspty.com", "E_Feedback");
            $email->setTo($email1);
            $email->setSubject('Online feedback');        

            $href = 'https://medusys.in/public/cnb/E_Feedback/view_feedback?id='.$pass.'';           
            
            $find_dr = new RegisterUserModel();
            $z = $find_dr->where('id',$dr_id)->first();
            $hospital = $z['hospital'];

            // print_r($hospital);die();

            $content .= '<html>';
            $content .= '<head>';
            $content .= '<title></title>';
            $content .= '</head>';
            $content .= '<body>';
            $content .= '<div class="main_one" style="width: 900px; background: #F1F4F8; margin: auto; left: 0; right: 0; padding-top: 40px; padding-bottom: 40px;" >';
            $content .= '<div class="main" style="width: 700px; background: white; margin: auto; left: 0; right: 0;">';
            // $content .= '<div class="img1" style="text-align: center;">';
            // $content .= '<img src="'.$href.'/assets/images/'.$upload_logo.'" style="padding: 30px 0px; width:15%;">';
            // $content .= '</div>';
            // $content .= '<div class="img2">';
            // $content .= '<img src="'.$href.'/assets/images/Thanks.png" style="width: 100%">';
            // $content .= '</div>';
            $content .= '<div class="cont">';
            $content .= '<h2 style="text-align: center; color: #003188; font-weight: bold; font-size: 45px;">We Appreciate your <br> feedback!</h2>';
            $content .= '<p style="text-align: justify; padding: 0px 15px;line-height: 1.6; font-size: 19px;">Your anaesthetist is the specialist doctor responsible for your safety and comfort during and immediately after your surgery. Your feedback will be highly appreciated by our anaesthetist and anaesthesia team.<br>
            The entire survey should only take about 5 minutes to complete and the purpose of the survey is to identify areas of improvement and focus on professional development. We would appreciate your time and rest assured that your feedback will remain anonymous.</p>';
            $content .= '<p style="text-align:center !important;"><a href="'.$href.'" style="background: #F8B370;color: white;padding: 15px 60px;border-radius: 30px;text-decoration: none;font-size: 27px;">CLICK HERE</a></p>'; 
            $content .= '<p style="text-align: justify; padding: 0px 15px;line-height: 1.6; font-size: 19px;" >Best Regards,<br>'.$name.'</p>';
            $content .= '</div>';
            
            // $content .= '<div class="last" style="text-align: center; padding-bottom: 10px; border-top: 1px solid #0000006b; padding-top: 30px; margin-top: 25px;">';
            // $content .= '<img src="'.$href.'/assets/images/'.$upload_logo.'" style="width:15%;">';
            // $content .= '</div>';
            /*$content .= '<div class="last2" style="text-align: center;">';
            $content .= '<img src="'.$href.'/assets/images/twitter.png" style="width: 5%;">';
            $content .= '<img src="'.$href.'/assets/images/facebook.png"  style="width: 5%;">';
            $content .= '<img src="'.$href.'/assets/images/instagram.png"  style="width: 5%;">';
            $content .= '<img src="'.$href.'/assets/images/linkedin.png"  style="width: 5%;">';
            $content .= '</div>';*/
            $content .= '<div  style="width: 100%; clear: both; height: 85px; padding-top: 20px; ">';
            $content .= '<div style="width: 50%; float: left; padding-left: 15px; font-size: 19px;">';
            $content .= '<p>Hospital Name: '.$hospital.'</p>';
            // $content .= '<p>Doctor Name: '.$name.'</p>';

            // $content .= '<p>Address :<br> '.$res->hospital_address.'</p>';
            $content .= '</div>';

            // $content .= '<div style="width: 40%; float: right; font-size: 19px;">';
            // $content .= '<p>email id:<br>'.$res->hospital_email.'</p>';
            // $content .= '</div>';
            $content .= '</div>';

            $content .= '<div  style="width: 100%; clear: both; height: 85px; padding-top: 0px; padding-bottom: 30px;">';
            // $content .= '<div style="width: 60%; float: left; font-size: 19px;">';
            // $content .= '<p style="margin-top:0px !important; padding-left:15px;">Website:<br>'.$res->website.'</p>';
            // $content .= '</div>';
            // $content .= '<div style="width: 40%; float: left; font-size: 19px;">';
            // $content .= '<p style="margin-top:0px !important;">Phone number:<br>'.$res->hospital_contact_number.'</p>';
            // $content .= '</div>';
            $content .= '</div>';
            $content .= '</div>';
            $content .= '</div>';
            $content .= '</body>';
            $content .= '</html>';

            $email->setMessage($content);
            if($email->send()){
                return json_encode(array(
                    'result'    => 1
                ));
            }else{
                return json_encode(array(
                    'result'    => 0,
                    'message'   => 'Something went wrong.....'
                ));
            }
        }
    }
    public function add_efeed(){

        $track_id = $this->request->getVar('track_id'); //url track
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

        $dr_id = session()->get('dr_id');
        $patient_id = session()->get('id');


        $efeedData = array(
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
            'submission'=>1,
            'flag'=>0,
            'upload_patient_status' => 1
        );
        $model  = new EFeedbackModel();
        $data  = $model->where('track',$track_id)->where('submission',0)->first();
        if($data){
            $efeedModel = new EFeedbackModel(); 
            $efeedModel->set($efeedData);
            $efeedModel->where('track',$track_id);
            $update = $efeedModel->update(); 
            if($update){
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
                return json_encode(array(
                    'result'    => 1,
                    'message'   => 'E-Feedback data Added Successfully.....'
                ));
            }
            else{
                return json_encode(array(
                    'result'    => 0,
                    'message'   => 'Something went wrong.....'
                ));
            }
        }
        else{
            return json_encode(array(
                'result'    => 2,
                'message'   => 'Patient already exists.....'
            ));
        }
    }
}
?>
