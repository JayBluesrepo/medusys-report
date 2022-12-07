<?php 
namespace App\Controllers\conference;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\RegisterUserModel;
use App\Models\OrganisationModel;
use App\Models\Conf_About;
use App\Models\Conf_paymentModel;

class Payment extends BaseController
{
    public function index()
    {
        $dr_id = session()->get('dr_id');
        $conference_id = $this->request->getPost('conference_id');

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


            $data['dr_id'] =  $dr_id; 
            return view('conference/payment',$data);
        }
        else{
            return view('login');
        }

        return view('coference/payment',$data);
    }
    public function payments()
    {

        $conferece_id = $this->request->getPost('pay_id');
        $amount = $this->request->getPost('amount');
        $transaction_id = $this->request->getVar('transaction_id');

        $email1 = session()->get('email'); 

	//$email1 = 'sowmyayp@gmail.com';
        $pass = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
        date_default_timezone_set('Asia/Kolkata');
        $payment_date_added = date('d-m-Y H:i:s', time());

	
       	$payment = array(
                'conference_id'=>$conferece_id,
                'user_id'=> session()->get('dr_id'),
                'user_name'=> session()->get('name'),
                'amount'=> $amount,
                'pay_id' => $transaction_id
             );

         // print_r($program_schedule);
          
            $model = new Conf_paymentModel(); 
            $model->save($payment);
            $insertedID = $model->insertID();


        $f_name = session()->get('f_name');
       
	$gamer_id = 'GAMER111';

        $email = \Config\Services::email();       
        $email->setFrom("healthcare@medusyspty.com", "Medusys"); 

        $email->setTo($email1);
        $email->setSubject('Medusys Conference – Payment Confirmation');

        $content = 'Hello Dr. '.$f_name.'<br/><br/>';
        $content = $content.' We would like to thank you for registering for Medusys Confirmation<br/><br/>'; 
        $content = $content.'Thank you again for your time and consideration. Looking forward to the great opportunities together. Should you have any questions, please write to us at contact@medusys.in'.'<br/><br/>';
        $content = $content.'Regards <br/>';
        $content = $content.'Medusys Team';

        $email->setMessage($content);
        if($email->send()){ 
            return json_encode(array(
                'result'    => 1
            ));
        }else{
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Payment interrupted! Something went wrong.....'
            ));
        }
    }
}
?>