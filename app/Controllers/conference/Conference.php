<?php
namespace App\Controllers\conference ;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\OrganisationModel;
use App\Models\Conf_About;
use App\Models\ProgramScheduleModel;
use App\Models\RegisterUserModel;
use App\Models\FacultyModel;
use App\Models\ConferencefeedbackModel;
use App\Models\CertificateModel;
use App\Models\Conf_paymentModel;
use App\Models\conference_AttendUserModel;


class Conference extends BaseController
{
        use ResponseTrait;
    public function __construct()
    {
        helper(['form','url']);
    }

    public function index()
    {
    $dr_id = session()->get('dr_id');

        if($dr_id){

            $e_library=['z,x,y'];
            $data['conference'] = $e_library;

            $model = new OrganisationModel();
            $details  = $model->get()->getResultArray();
            $data['org'] = $details;

            $org_id = session()->get('org_id');
            $model1 = new Conf_About();
            $model1->where('org_id',$org_id);
            $model1->select('*');
            $data['con_upcoming']  = $model1->get()->getResultArray();

            $data['dr_id'] =  $dr_id;
            return view('conference/conference_home',$data);
        }
        else{
            return view('login');
        }
    }
    public function conference_about()
    {
    $dr_id = session()->get('dr_id');
    $conference_id = $_GET['id'];
    
        if($dr_id){

            $e_library=['z,x,y'];
            $data['conference'] = $e_library;

            $model = new OrganisationModel();
            $details  = $model->get()->getResultArray();
            $data['org'] = $details;

            $org_id = session()->get('org_id');
            $model1 = new Conf_About();

            $model1->select('*');
            $data['val']  = $model1->where('conference_id',$conference_id)->first();

            $data['dr_id'] =  $dr_id; 
            return view('conference/conference_about',$data);
        }
        else{
            return view('login');
        }
    }
    public function programs()
    {
        $dr_id = session()->get('dr_id');
        $conference_id = $_GET['id'];

        if($dr_id){

            $e_library=['z,x,y'];
            $data['conference'] = $e_library;

            $model = new OrganisationModel();
            $details  = $model->get()->getResultArray();
            $data['org'] = $details;

            $org_id = session()->get('org_id');

            $model = new Conf_About();
            $model->select('*');
            $data['val']  = $model->where('conference_id',$conference_id)->first();


            $model1 = new ProgramScheduleModel();
            $model1->select('*');
            $model1->where('conference_id',$conference_id);
            $data['programs'] = $model1->get()->getResultArray();

            $data['dr_id'] =  $dr_id; 
            return view('conference/program_schedule',$data);
        }
        else{
            return view('login');
        }
    }
    public function faculty_details()
    {
        $dr_id = session()->get('dr_id');
        $conference_id = $_GET['id'];

        if($dr_id){

            $e_library=['z,x,y'];
            $data['conference'] = $e_library;

            $model = new OrganisationModel();
            $details  = $model->get()->getResultArray();
            $data['org'] = $details;

            $org_id = session()->get('org_id');

            $model = new Conf_About();
            $model->select('*');
            $data['val']  = $model->where('conference_id',$conference_id)->first();

	    $model3 = new ProgramScheduleModel(); 
            $model3->where('conference_id',$conference_id);
            $model3->select('*');
            $data['speaker'] = $model3->get()->getResultArray();

            $model1 = new FacultyModel();
            $model1->select('*');
            $model1->where('conference_id',$conference_id);
            $data['faculty'] =$model1->get()->getResultArray();
            $data['dr_id'] =  $dr_id; 
            return view('conference/faculty_details',$data);
        }
        else{
            return view('login');
        }
    }
    public function registration_details()
    {
        $dr_id = session()->get('dr_id');
        $conference_id = $_GET['id'];

        if($dr_id){

            $e_library=['z,x,y'];
            $data['conference'] = $e_library;

            $model = new OrganisationModel();
            $details  = $model->get()->getResultArray();
            $data['org'] = $details;

            $org_id = session()->get('org_id');

            $model = new Conf_About();
            $model->select('*');
            $data['val']  = $model->where('conference_id',$conference_id)->first();


            $model1 = new FacultyModel();
            $model1->select('*');
            $model1->where('conference_id',$conference_id);
            $data['faculty'] =$model1->get()->getResultArray();
            $data['dr_id'] =  $dr_id; 


            $model2 = new Conf_paymentModel(); 
            $model2->select('*');
            $model2->where('conference_id',$conference_id);
            $data['payment'] = $model2->where('user_id',$dr_id)->first();
            //$data['payment'] =$model2->get()->getResultArray();
            

            return view('conference/conference_registation',$data);
        }
        else{
            return view('login');
        }
    }
    public function attend_conference()
    {
        $dr_id = session()->get('dr_id');
        $conference_id = $_GET['id'];
        $name = session()->get('name');
        $gamer_id = session()->get('gamer_id');
        // print_r($name);die();

        if($dr_id){
        
            $model = new Conf_About();
            $model->select('*');
            $data['val']  = $model->where('conference_id',$conference_id)->first();
            if($data['val']['reg_fee'] != 0){
                $model2 = new Conf_paymentModel();
                $model2->select('*');
                $model2->where('conference_id',$conference_id);
                $model2->where('user_id',$dr_id);
                $payment =$model2->get()->getResultArray();
            
                if($payment){


                    $e_library=['z,x,y'];
                    $data['conference'] = $e_library;

                    $model = new OrganisationModel();
                    $details  = $model->get()->getResultArray();
                    $data['org'] = $details;

                    $org_id = session()->get('org_id');

                    $model1 = new ProgramScheduleModel();
                    $model1->select('*');
                    $model1->where('conference_id',$conference_id);
                    $data['attend_link'] =$model1->get()->getResultArray();
                    $data['dr_id'] =  $dr_id; 

                    $procedure_date = '';

                    $db = \Config\Database::connect();

                    $builder = $db->table('conference_attend_user');
                    $query = $builder->select("count(gamer_id) as gamer");
                    $query = $builder->where('conference_id',$conference_id);
                    $query = $builder->where('gamer_id',$gamer_id);
                    $query = $builder->get();
                    $record = $query->getResult();
                    foreach($record as $row) {
                        $procedure_date = $row->gamer;
                    }

                    // print_r($procedure_date);die();

                    $details = array(
                        'conference_id'=>$conference_id,
                        'org_id'=>$org_id,
                        'user_name'=>$name,
                        'gamer_id'=>$gamer_id,
                        'created_by'=>$name,
                        'dr_id'=>$dr_id
                    );

                    // print_r($details);die();

                    if($procedure_date == 0){
                        $attend_con = new conference_AttendUserModel();        
                        $attend_con->save($details);
                        $insertedID = $attend_con->insertID();
                    }


                    return view('conference/attend_conference',$data);
                }
                else{
                    return view('conference/no_payment',$data);
                }
            }
            else{

                $e_library=['z,x,y'];
                $data['conference'] = $e_library;

                $model = new OrganisationModel();
                $details  = $model->get()->getResultArray();
                $data['org'] = $details;

                $org_id = session()->get('org_id');

                $model1 = new ProgramScheduleModel();
                $model1->select('*');
                $model1->where('conference_id',$conference_id);
                $data['attend_link'] =$model1->get()->getResultArray();
                $data['dr_id'] =  $dr_id; 


                $procedure_date = '';

                $db = \Config\Database::connect();

                $builder = $db->table('conference_attend_user');
                $query = $builder->select("count(gamer_id) as gamer");
                $query = $builder->where('conference_id',$conference_id);
                $query = $builder->where('gamer_id',$gamer_id);
                $query = $builder->get();
                $record = $query->getResult();
                foreach($record as $row) {
                    $procedure_date = $row->gamer;
                }

                // print_r($procedure_date);die();

                $details = array(
                    'conference_id'=>$conference_id,
                    'org_id'=>$org_id,
                    'user_name'=>$name,
                    'gamer_id'=>$gamer_id,
                    'created_by'=>$name,
                    'dr_id'=>$dr_id
                );

                // print_r($details);die();

                if($procedure_date == 0){
                    $attend_con = new conference_AttendUserModel();        
                    $attend_con->save($details);
                    $insertedID = $attend_con->insertID();
                }

                


                return view('conference/attend_conference',$data);
            }
        }
        else{
            return view('login');
        }
    }

    public function conference_attend_user(){
        
        $dr_id = session()->get('dr_id');
        $org_id = session()->get('org_id');
        $name = session()->get('name');
        $gamer_id = session()->get('gamer_id');
        $conference_id = $_GET['id'];

        // print_r($conference_id );die();

        $procedure_date = '';

        $db = \Config\Database::connect();

        $builder = $db->table('conference_attend_user');
        $query = $builder->select("count(gamer_id) as gamer");
        $query = $builder->where('conference_id',$conference_id);
        $query = $builder->where('gamer_id',$gamer_id);
        $query = $builder->get();
        $record = $query->getResult();
        foreach($record as $row) {
            $procedure_date = $row->gamer;
        }

        // print_r($procedure_date);die();

        $details = array(
            'conference_id'=>$conference_id,
            'org_id'=>$org_id,
            'user_name'=>$name,
            'gamer_id'=>$gamer_id,
            'created_by'=>$name,
            'dr_id'=>$dr_id
        );

        // print_r($details);die();

        if($procedure_date == 0){
            $attend_con = new conference_AttendUserModel();        
            $attend_con->save($details);
            $insertedID = $attend_con->insertID();
        }
    }

    public function feedback()
    {
        $dr_id = session()->get('dr_id');
        $conference_id = $_GET['id'];
        
        if($dr_id){

                $model = new Conf_About();
                $model->select('*');
                $data['val']  = $model->where('conference_id',$conference_id)->first();


                if($data['val']['reg_fee'] != 0){
                    $e_library=['z,x,y'];
                    $data['conference'] = $e_library;

                    $model = new OrganisationModel();
                    $details  = $model->get()->getResultArray();
                    $data['org'] = $details;

                    $org_id = session()->get('org_id');

                    $model2 = new Conf_paymentModel();
                    $model2->select('*');
                    $model2->where('conference_id',$conference_id);
                    $model2->where('user_id',$dr_id);
                    $payment =$model2->get()->getResultArray();
                
                    if($payment){
                        $model1 = new ProgramScheduleModel();
                        $model1->select('*');
                        $model1->where('conference_id',$conference_id);
                        $data['programs'] =$model1->get()->getResultArray();
                        $data['dr_id'] =  $dr_id;

                        $today = date('Y-m-d');
                        if(strtotime($data['val']['date_to']) > strtotime($today)){ 
                            return view('conference/no_time',$data); 
                        }
                        else{
                            return view('conference/feedback',$data);
                        } 
                    }
                    else{
                        return view('conference/no_payment',$data);
                    }
                }
                else{
                    $model1 = new ProgramScheduleModel();
                    $model1->select('*');
                    $model1->where('conference_id',$conference_id);
                    $data['programs'] =$model1->get()->getResultArray();
                    $data['dr_id'] =  $dr_id; 
                    $today = date('Y-m-d'); 
                    if(strtotime($data['val']['date_to']) > strtotime($today)){ 
                        return view('conference/no_time',$data); 
                    }
                    else{
                        return view('conference/feedback',$data);
                    }
                }
        }
        else{
            return view('login');
        }
    }
     public function certificate()
    {

        $dr_id = session()->get('dr_id');
        
        if($dr_id){
            $conference_id = $_GET['id'];

            $model = new Conf_About();
            $model->select('*');
            $data['val']  = $model->where('conference_id',$conference_id)->first();
            if($data['val']){ 
                $model1 = new ConferencefeedbackModel();
                $model1->select('*');
                $model1->where('conference_id',$conference_id);
                $model1->where('created_by',$dr_id);
                $feedback = $model1->get()->getResultArray();
                if($feedback){
                        $model2 = new CertificateModel();
                        $model2->select('*');
                        $data['certificate'] = $model2->where('conference_id',$conference_id)->first();


                        $model3 = new RegisterUserModel();
                        $model3->select('*');
                        $data['user_details'] = $model3->where('id',$dr_id)->first();

                      

                        $data['name'] = session()->get('name');
                        $data['today'] = date("Y-m-d");


                        include ('public/assets/mpdf/vendor/autoload.php');
                        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']); 

                        $email1 = session()->get('email'); 





                        $mpdf->SetDisplayMode('fullpage');

                        $mpdf->SetWatermarkText('');
                        $mpdf->watermark_font = 'DejaVuSansCondensed';
                        $mpdf->showWatermarkText = true;

                        $html = view('conference/certificate_v_new',$data);  

                        $mpdf->WriteHTML($html); 

                        $date = date('d-M-y-H-i');
                        $file='public/uploads/certificates/'.$date.'certificate.pdf';
                        $pdf_path ='medusys'.$date.'certificate.pdf';

                        $mpdf->Output('public/uploads/certificates/'.$date.'certificate.pdf', 'F');

                        $content = ''; 
                        $email = \Config\Services::email();
                        $email->setFrom("healthcare@medusyspty.com", "Medusys");        
                        $email->setTo($email1);
                        $email->setSubject('Medusys Certifiacte');

                        $content = "Hello Dr. ".$data['name']."<br/><br/>";
                        $content = $content."We would like to thank you for attending and providing feedback to Medusys GAS Conference."."<br/><br/>";
                        $content = $content."Please find the attached certificate of participation."."<br/><br/>";
                        $content = $content."Thank you again for your time and consideration. Looking forward to the great opportunities together. Should you have any questions, please write to us at contact@medusys.in
."."<br/><br/>"; 

                        $content = $content."Regards"."<br/>";
                        $content = $content."Medusys Team"."<br/>";

                        $email->setMessage($content);
                        //$email->setMessage($content);
                        $email->attach($file); //Your path to pdf
                         if($email->send()){ 

                         } 

                        return view('conference/certificate_v',$data);
                    
                }
                else{
                    
                    return view('conference/no_feedback',$data);
                }
                
            }
            else{
                return view('invalid_url');
            }


            
        }
        else{
            return view('login');
        }
    }
    
    public function update_feedback()
    {
   // print_r($_POST);
   // die();
    $dr_id = session()->get('dr_id'); 
    $name = session()->get('name'); 
    $conference_id = $this->request->getvar('conference_id');
        if($dr_id){

        $org_id = session()->get('org_id');


        $model1 = new ProgramScheduleModel();
        $model1->select('*');
        $model1->where('conference_id',$conference_id);
        $programs =$model1->get()->getResultArray();
        $review = $this->request->getvar('comment');

        $i = 1;

        foreach($programs as $key=>$val){
            $radio = 'optradio'.$i;
            $feedaback = $this->request->getvar($radio);

            $feedbback = array(
                'conference_id'=>$conference_id,
                'ps_id'=> $programs[$key]['ps_id'],
                'rating'=> $feedaback,
                'review'=> $review,
                'user_name' =>$name,
                'created_by' =>$dr_id
             );
      //print_r($feedbback);
          
            $model = new ConferencefeedbackModel(); 
            $model->save($feedbback);
            $insertedID = $model->insertID();
            $i++;

        }
        if($insertedID){
                    return json_encode(array(
                 
                    'data' => $faculty,
                    'result'    => 1,
                    'message'     => 'Feedback Inserted Succesfully..You can Download the certificate..'
                    ));
        
            }
            else{
                    return json_encode(array(
                        'result'    => 0,
                        'message'     => 'Something went wrong.....'
                    ));
            }

        }
        else{
            return view('login');
        }
    }
    public function indivisual_facultly_details()
    {
    $dr_id = session()->get('dr_id');
    $fac_id = $this->request->getvar('id');
    
    
        if($dr_id){

            $e_library=['z,x,y'];
            $data['conference'] = $e_library;

            $model = new OrganisationModel();
            $details  = $model->get()->getResultArray();
            $data['org'] = $details;

            $org_id = session()->get('org_id');

            $model = new Conf_About();
            $model->select('*');
            $data['val']  = $model->where('conference_id',$conference_id)->first();


            $model1 = new FacultyModel();
            $model1->select('*');
            $faculty = $model1->where('id',$fac_id)->first();
            if($faculty){
                return json_encode(array(

                'data' => $faculty,
                'result'    => 1,
                'message'     => 'update Data'
                ));

            }
            else{
                return json_encode(array(
                'result'    => 0,
                'message'     => 'Something went wrong.....'
                ));
            }

        }
        else{
            return view('login');
        }
    }
}
?>