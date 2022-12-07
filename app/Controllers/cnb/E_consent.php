<?php namespace App\Controllers\cnb;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\addPatientModel;
use App\Models\e_consentModel;
use App\Models\PreopModel;
use App\Models\PostopModel;
use App\Models\FollowupModel;
use App\Models\EpiduralModel;
use App\Models\combinedSpinalEpiduralModel;
use App\Models\CSA_Model;
use App\Models\FeedbackModel;
use App\Models\EFeedbackModel;
use App\Models\SpinalModel;

class E_consent extends BaseController
{   
    use ResponseTrait;
	public function __construct()
	{
		helper(['form','url']);
	}

    public function index()
    {   
        $patient_id = session()->get('id');
        $dr_id = session()->get('dr_id');

        // print_r($id);
        // die();
        if($dr_id){        
            $calc=[];
            $model = new addPatientModel(); 
            $model->where('dr_id',$dr_id);       
            $model->orderBy('id','DESC');
            $details  = $model->get()->getResultArray();
            $data['patient'] = $details;
            $det = $model->where('id',$patient_id)->first();
            $data['focus'] = $det;

            $models = new e_consentModel(); 
            $detail = $models->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['info'] = $detail;

            $bsh=['d,e,f'];
            $data['eco'] = $bsh; 

            $model1 = new PreopModel();
            $detail1 = $model1->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['preo'] = $detail1;

            $model2 = new PostopModel();
            $detail2 = $model2->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['posto'] = $detail2;

            $model3 = new FollowupModel();
            $detail3 = $model3->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['follo'] = $detail3;

            $epiModel = new EpiduralModel();
            $data6  = $epiModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            $spinModel = new SpinalModel();
            $data7  = $spinModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            $cseModel = new combinedSpinalEpiduralModel();
            $data8  = $cseModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            $csaModel = new CSA_Model();
            $data9  = $csaModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            if($data6 || $data7 || $data8 || $data9){
                $sin=['1,12,23'];
                $data['proccheck'] = $sin;
            }

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

            if(!empty($detail)){ 
                $data['ecocheck'] = $detail;           
                return view('cnb/e_consent_success',$data);
            }else{
                return view('cnb/e-consent',$data);
            } 
        }else{
            return view('login');
        }
        
    }   

    public function email(){

        $dr_id = session()->get('dr_id');
        $created_by = session()->get('name');
        
        $patient_id = session()->get('id');
        // $email1 = session()->get('patient_email_id');

        $mail = new addPatientModel();
        $mail->select('patient_email_id');
        $email1 = $mail->where('id',$patient_id)->first();    
        
        // print_r($email1);die();
        $message = $this->request->getVar('message');
        

        $email = \Config\Services::email();
        

        $email->setFrom("healthcare@medusyspty.com", "Medusys");
        $email->setTo($email1);
        // $email->setCC('another@another-example.com');
        // $email->setBCC('them@their-example.com');

        $email->setSubject('Consent Email to Patient.');        
        // $con = '<div>';
        // $con .= '<h5><b>Hello Sir / Madam</b></h5>';
        // $con .= '<p style="color:blcak;">Please note that you have provided consent to the doctor to utilize your de-identified clinical data from routine activity on Medusys app towards improvement in safety and quality.</p>';
        // $con .= '<h5>'.$message.'</h5>';
        // $con .= '<h5><b>Thank You</b></h5>';
        // $con .= '<h5>Medusys - Global Anasthaesia Society</h5>';
        // $con .= '<h5>Healthcare Team</h5>';
        // $con .= '</div>';

        $content = "<b>Hello Sir / Madam</b><br/><br/>";
        $content = $content."Please note that you have provided consent to the doctor to utilize your de-identified clinical data from routine activity on Medusys app towards improvement in safety and quality."."<br/><br/>";
        $content = $content." ".$message.""."<br/><br/>";
        $content = $content."Regards"."<br/>";
        $content = $content."Medusys - Global Anasthaesia Society"."<br/>";
        $content = $content."Healthcare Team"."<br/>";
        
        $email->setMessage($content);


        if($email->send()){


            $e_consent_data = array(
                'patient_id'=>$patient_id,
                'message'=>$message,
                'flag'=>1,
                'dr_id'=>$dr_id,
                'created_by'=>$created_by
            );

            $consentModel = new e_consentModel();       
            $consentModel->save($e_consent_data);
            $insertedID = $consentModel->insertID();

            return json_encode(array(
                'result'    => 1,
                'message' => 'Email Sent Successfully',
                'msg' => $insertedID

            ));
        }else{
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Something went wrong.....'
            ));
        }
    }

    
}
?>

