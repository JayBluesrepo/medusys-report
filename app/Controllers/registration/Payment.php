<?php 
namespace App\Controllers\registration;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\RegisterUserModel;

class Payment extends BaseController
{
    public function index()
    {
        $new_user_id = session()->get('new_user_id');

        if($new_user_id != ''){

            $model = new RegisterUserModel();
            $details = $model->where('id',$new_user_id)->first();
            $data['usercheck'] = $details;
    
            $model->where('id',$new_user_id);
            $details1 = $model->where('verify_email',1)->first();
            $data['otpmatched'] = $details1;
    
            return view('registration/payment',$data);

        }else{
            return redirect()->route("Registration");
        }
        
    }
    public function payments()
    {

       


        $new_user_id = session()->get('new_user_id');
        $pay_id = $this->request->getPost('pay_id');
        $amount = $this->request->getPost('amount');
        $transaction_id = $this->request->getVar('transaction_id');
        $email1 = session()->get('mail');
        $pass = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
        date_default_timezone_set('Asia/Kolkata');
        $payment_date_added = date('d-m-Y H:i:s', time());
        // $gamer_id = "GAMER".random_int(1000, 9999);
        $f_name = session()->get('f_name');



         



       
        $model_gi = new RegisterUserModel();
        $model_gi->select('gamer_id');
        $model_gi->like('gamer_id', 'GAMER');
        //$model_gi->order_by('gamer_id', 'ASC');
        $g_data = $model_gi->get()->getResultArray();
        $last = end($g_data);
       
        // print_r($pay_id);die();
        foreach ($last as $val) {
            
            $gamer_id1 = substr($val,5)+1;
            $gamer_id = 'GAMER'.$gamer_id1;
        }

       

        $setData = array(
            'org_id'=>1,
            'payment_id'=> $pay_id,
            'payment_amount'=> $amount, 
            'payment_status'=> 1,
            'email' => $email1,
            'password'=> $pass,
            'valid_user'=> 1,
            'payment_date_added' => $payment_date_added,
            'transaction_id' => $transaction_id,
            'gamer_id' => $gamer_id,
            'gamer_id_used' => 1
        );


      

        log_message('info', '{payment_id}    {payment_amount}{email}{password}{payment_date_added}{transaction_id}{gamer_id}', $setData); 

        $info = [
            'new_user_id'         => $new_user_id,
            'ip_address' => $this->request->getIPAddress(), 
        ]; 
        log_message('info', 'User {new_user_id} logged into the system from {ip_address}', $info);  


       
        $model1 = new RegisterUserModel();
        $model1->set($setData);
        $model1->where('id',$new_user_id);
        $update = $model1->update();

        $email = \Config\Services::email();       
        $email->setFrom("healthcare@medusyspty.com", "Medusys"); 

        $email->setTo($email1);
        $email->setSubject('Medusys Registration – Login Credentials');

        $content = 'Hello Dr. '.$f_name.'<br/><br/>';
        $content = $content.' We would like to thank you for registering for Medusys <br/><br/>'; 
        $content = $content.'Your GAMER ID is : '.$gamer_id.'<br/>';
        $content = $content.'Your Login id is : '.$email1.'<br/>';
        $content = $content."Your password is : ".$pass.'<br/>';
        $content = $content.'Please login with the user name and password by clicking the link below.<br/><h4> https://medusys.in/login/ </h4><br/>';
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