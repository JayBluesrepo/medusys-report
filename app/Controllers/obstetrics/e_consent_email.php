<?php

namespace App\Controllers\cnb;

use App\Controllers\BaseController;

class e_consent_email extends BaseController
{
    public function email(){
        // $email = $this->input->post('email');
        $email1 = session()->get('patient_email_id');

        // print_r($email1);die();
        $message = $this->request->getVar('message');
        

        $email = \Config\Services::email();
        

        $email->setFrom("healthcare@medusyspty.com", "Medusys");
        $email->setTo($email1);
        // $email->setCC('another@another-example.com');
        // $email->setBCC('them@their-example.com');

        $email->setSubject('Consent Email to Patient.');        
        $con = '<div>';
        $con .= '<h5><b>Hello Sir / Madam</b></h5>';
        $con .= '<p style="color:blcak;">Please note that you have provided consent to the doctor to utilize your de-identified clinical data from routine activity on Medusys app towards improvement in safety and quality.</p>';
        $con .= '<h5>'.$message.'</h5>';
        $con .= '<h5><b>Thank You</b></h5>';
        $con .= '<h5>Medusys - Global Anasthaesia Society</h5>';
        $con .= '<h5>Healthcare Team</h5>';
        $con .= '</div>';
        $email->setMessage($con);

        if($email->send()){
            return json_encode(array(
                'result'    => 1,
                'message' => 'Email Sent Successfully'
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