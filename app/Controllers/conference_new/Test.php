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


class Test extends BaseController
{
        use ResponseTrait;
    public function __construct()
    {
        helper(['form','url']);
    }

    public function index()
    {
    $dr_id = session()->get('dr_id');

    $info = [
        'dr_id'         => $dr_id,
        'ip_address' => $this->request->getIPAddress(), 
    ];
    //log_message('info', 'User {id} logged into the system from {ip_address}', $info); 
    log_message('info', 'User {dr_id} logged into the system from {ip_address}', $info);  

    die();

        if($dr_id){ 

            include ('public/assets/mpdf/vendor/autoload.php');

            //$mpdf = new \Mpdf\Mpdf();
            $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']); 
            $conference_id = '70';

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
                    $certificate = $model2->where('conference_id',$conference_id)->first();

                    $data['certificate'] = $model2->where('conference_id',$conference_id)->first();


                    $model3 = new RegisterUserModel();
                    $model3->select('*');
                    $user_details = $model3->where('id',$dr_id)->first();

                    $data['user_details'] = $model3->where('id',$dr_id)->first();


                    $name = session()->get('name');
                    $today = date("Y-m-d");

                    $data['name'] = session()->get('name');
                    $data['today'] = date("Y-m-d");
                        


                    $href = base_url('');
                    $content = '';
                    $content .= '<!DOCTYPE html>';
                    $content .= '<html>';
                    $content .= '<head>';
                    $content .= '<meta charset="UTF-8">';
                    $content .= '<meta name="viewport" content="width=device-width, initial-scale=1">';
                    $content .= '<meta http-equiv="X-UA-Compatible" content="IE=Edge" />';
                    $content .= '<title></title>';
                    $content .= '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
                    $content .= '<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;1,400&family=Montserrat&family=Ms+Madi&family=My+Soul&family=Open+Sans&family=Poppins:wght@200;400&family=Roboto:ital,wght@0,300;0,400;0,500;1,300&family=Updock&display=swap" rel="stylesheet">';
                    $content .= '<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js" ></script>';
                    $content .= '</head>';
                    $content .= '<body>';
                    $content .= '<section style="width: 95%; display: flex; justify-content: center; ">';
                    $content .= '<div >';

                    $content .= '<img src="'.base_url('images/certificate/'.'bg-new.png').'" style="height: 700px;">';


                    $content .= '<div >'; 
                    $content .= '<div  style="display: flex;margin-left:27%;">';
                    $content .= '<div  style="width: 33%;">';

                    $content .= '<img src="'.$href.'images/certificate'.$certificate['logo1'].'" style="width:150px;">';   
                    $content .= '</div>';
                    $content .= '<div >';
                    $content .= '<img src="'.$href.'images/certificate'.$certificate['logo2'].'" style="width:150px;">'; 
                    $content .= '</div>';
                    $content .= '<div >';
                    $content .= '<img src="'.$href.'images/certificate'.$certificate['logo3'].'" style="width:150px;">';  
                    $content .= '</div>';
                    $content .= '</div>';
                    $content .= '<div class="" style="padding-left:25%;margin-top: -1%;text-align:center;">';
                    $content .= '<P style="margin-bottom:-10px;font-size: 25px;">CERTIFICATE OF ATTENDANCE</P>';
                    $content .= '<p style="margin: 20px 0;">IS HEREBY GRANTED TO</p>';
                
                    $content .= '<h2 style="margin-top:-15px;font-size: 30px;">DR '.strtoupper($user_details['f_name']." ".$user_details['l_name']).'</h2>';
                    $content .= '<p style="margin-top:-10px;">ATTENDED <b>'."'".strtoupper($val['title'])."'".'</b></p>';
                    $content .= '<p style="margin-top:-5px;">';
                    if($val['date_from'] == $val['date_to']){ 
                        $content .= '<p>'.date('F j, Y',strtotime($val['date_from'])).'</p>';
                    }
                    else{
                        $content .= '<p>'. date('F j, Y',strtotime($val['date_from'])). '  To '.date('F j, Y',strtotime($val['date_to'])).'</p>';
                    }
                    $content .=  '</p>';
                    $content .= '<p style="margin-top:-5px;font-size: 15px;">'.$certificate['accredited_by'].'</p>';
                    $content .= '</div>';
                    $content .= '<div class="bottom">';
                    $content .= '<div class="bottom-1">';
                    $content .= '<p style="margin-bottom:0;width:180px;margin-top: 50%;">Issued On'.date("jS  F Y").'</p>';
                    $content .= '</div>';
                    $content .= '<div class="bottom-1">';

                    $content .= '<img src="'.$href.'assets/images/certificate'.$certificate['signature1'].'" style="width:100px;">'; 
                    $content .= '<p style="font-size: 13px;width: 175px;">'.$certificate['sign1'].'</p>';
                    $content .= '</div>';
                    $content .= '<div class="bottom-1">';
                    $content .= '<img src="'.$href.'assets/images/certificate'.$certificate['signature2'].'" style="width:100px;height: 75px;">'; 
                    $content .= '<p style="font-size: 13px;width: 175px;">'.$certificate['sign2'].'</p>';
                    $content .= '</div>';
                    $content .= '</div>';
                    $content .= '<div class="footer">';
                     $content .= '<img src="'.$href.'images/certificate/'.'footer-logo.png'.'" style="width:75%;">';
                    $content .= '</div>';
                    $content .= '</div>';
                    $content .= '</div>';
                    $content .= '</section>';
                    $content .= '</body>';
                    $content .= '</html>';

                    $mpdf->SetDisplayMode('fullpage');

                    $mpdf->SetWatermarkText('');
                    $mpdf->watermark_font = 'DejaVuSansCondensed';
                    $mpdf->showWatermarkText = true;
                    //print_r($content);die();   

                    $html = view('conference/certificate_v_new',$data);  


                    //  $html;
                    //die();


                    $mpdf->WriteHTML($html); 

                    // $mpdf->WriteHTML($content); 

                    $date = date('d-M-y-H-i');
                    $file='public/uploads/certificates/'.$date.'PatientForm.pdf';
                    $pdf_path ='medusys'.$date.'PatientForm.pdf';





                    $mpdf->Output('public/uploads/certificates/'.$date.'PatientForm.pdf', 'F');

                    $content = '';
                    $email = \Config\Services::email();
                    $email->setFrom("healthcare@medusyspty.com", "Medusys");        
                    $email->setTo('sowmyayp@gmail.com');
                    $email->setSubject('Medusys Registration – OTP for Email Verification');

                    $content = "Hello Dr.<br/><br/>";
                    $content = $content."Should you have any questions, please write to us at contact@medusys.in"."<br/><br/>";
                    $content = $content."Regards"."<br/>";
                    $content = $content."Medusys Team"."<br/>";

                    $email->setMessage($content);
                    //$email->setMessage($content);
                    $email->attach($file); //Your path to pdf
                    if($email->send()){

                    }
                    
                }
                
            }
           
        }
        else{ 
            return view('login');
        }
    }
}