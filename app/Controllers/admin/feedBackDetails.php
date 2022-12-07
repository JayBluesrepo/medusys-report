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
use App\Models\ConferencefeedbackModel;
use App\Models\ProgramScheduleModel;





class feedBackDetails extends BaseController{
   

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

        return view('admin/feed_back_details_v',$data);      
    }

    

    // public function feed_back_data(){

    //     $conf_id  = $this->request->getVar('id');     
        
    //     $model1 = new Conf_About();
    //     $model1->select('reg_fee');
    //     $details3  = $model1->where('conference_id',$conf_id)->first();

    //     if($details3['reg_fee'] > 0){

    //         $model = new Conf_paymentModel();
    //         $model->select('conf_payment.*,register_user.f_name,register_user.l_name,register_user.mobile,register_user.email,register_user.gamer_id');
    //         $model->join('register_user','conf_payment.user_id = register_user.id');
    //         $model->where('conf_payment.conference_id',$conf_id);
    //         $model->orderBy('conf_payment.user_name','ASC');
    //         $data = $model->get()->getResultArray();
    //     }
    //     else{

    //         $model = new conference_AttendUserModel();
    //         $model->select('conference_attend_user.*,register_user.f_name,register_user.l_name,register_user.mobile,register_user.email');
    //         $model->join('register_user','conference_attend_user.dr_id = register_user.id');
    //         $model->where('conference_attend_user.conference_id',$conf_id);
    //         $model->orderBy('conference_attend_user.user_name','ASC');
    //         $data = $model->get()->getResultArray();
    //     }

    //     // print_r($data);die();

    //     return $this->respondCreated($data); 
    // }   

    public function feed_back_data(){
        
        $conf_id  = $this->request->getVar('id');     

        $model1 = new ProgramScheduleModel();
        $model1->select('conf_ps.*,conf_feedback.user_name,conf_feedback.rating,conf_feedback.review');
        $model1->join('conf_feedback','conf_ps.ps_id = conf_feedback.ps_id');
        $model1->where('conf_ps.conference_id',$conf_id);
        $model1->orderBy('conf_feedback.user_name','ASC');
        $data = $model1->get()->getResultArray();

        // print_r($data);die();
        return $this->respondCreated($data); 
    }
  
}
?>