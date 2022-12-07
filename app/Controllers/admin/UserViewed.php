<?php 
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\RegisterUserModel;
use App\Models\OrganisationModel;
use App\Models\conference_AttendUserModel;
use App\Models\Conf_About;
use App\Models\Conf_paymentModel;




class UserViewed extends BaseController{
   

    use ResponseTrait;
	public function __construct()
	{
		helper(['form']);
        // helper(['url']);
	}

    public function index(){

        $org_id = session()->get('org_id');

        $conference_id = $_GET['id'];
        $data['conf_id'] = $conference_id;

        $e_library=['z,x,y'];
        $data['conferencelist'] = $e_library;

        $model = new OrganisationModel();
        $details  = $model->get()->getResultArray();
        $data['org'] = $details;
       
      
        $model1 = new Conf_About();
        $model1->select('title');
        $details3  = $model1->where('conference_id',$conference_id)->first();
        //  $model1->get()->getResultArray();

        $data['title1'] = $details3;


        // print_r($details3);die();

        return view('admin/user_viewed_v',$data);      
    }

    // public function see_user_viewed_data(){

    //     $conf_id  = $this->request->getVar('id');     
        

    //     $model = new conference_AttendUserModel();
    //     $model->where('conference_id',$conf_id);
    //     $model->orderBy('user_name','ASC');


    //     $data = $model->get()->getResultArray();

    //     // print_r($data);die();

    //     return $this->respondCreated($data);    

    // }   

    public function see_user_viewed_data(){

        $conf_id  = $this->request->getVar('id');     
        
        $model1 = new Conf_About();
        $model1->select('reg_fee');
        $details3  = $model1->where('conference_id',$conf_id)->first();

        // print_r($details3['reg_fee']);die();

        if($details3['reg_fee'] > 0){

            $model = new Conf_paymentModel();
            $model->select('conf_payment.*,register_user.f_name,register_user.l_name,register_user.mobile,register_user.email,register_user.gamer_id');
            $model->join('register_user','conf_payment.user_id = register_user.id','LEFT');
            $model->where('conf_payment.conference_id',$conf_id);
            $model->orderBy('conf_payment.user_name','ASC');
            $data = $model->get()->getResultArray();        

            // print_r($data);print_r('<br>');die();
        }
        else{

            $model = new conference_AttendUserModel();
            $model->select('conference_attend_user.*,register_user.f_name,register_user.l_name,register_user.mobile,register_user.email');
            $model->join('register_user','conference_attend_user.dr_id = register_user.id','LEFT');
            $model->where('conference_attend_user.conference_id',$conf_id);
            $model->orderBy('conference_attend_user.user_name','ASC');
            $data = $model->get()->getResultArray();

            
        }

        // print_r($data);die();

        return $this->respondCreated($data); 
    }   

   
  
}
?>