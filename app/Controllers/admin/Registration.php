<?php 
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\CategoriesModel;
use App\Models\FileUploadModel;
use App\Models\OrganisationModel;
use App\Models\conferenceModel;
use App\Models\Conf_About;
use App\Models\FacultyModel;

class Registration extends  BaseController
{
    public function __construct()
	{
		require_once APPPATH.'ThirdParty/ssp.class.php';
        $this->db = db_connect();
	}
    
    
    public function index(){
     if(session()->get('name')){
        $org_id = session()->get('org_id');

        $conference_id = $_GET['id'];

        $e_library=['z,x,y'];
        $data['registration'] = $e_library;

        $model = new OrganisationModel();
        $details  = $model->get()->getResultArray();
        $data['org'] = $details;
// print_r($org_id);die();
        $model2 = new Conf_About();
        $model2->where('conference_id',$conference_id);
        $model2->select('title');
        $details4  = $model2->get()->getResultArray();

     
        
        // $model3 = new ProgramScheduleModel(); 
        // $model3->where('conference_id',$conference_id);
        // $model3->select('*'); 
        // $speaker  = $model3->get()->getResultArray();

        // $data['speaker'] = $speaker;

        $data['title_con'] = $details4;
        $data['conference_id'] = $conference_id;

        return view('admin/registration', $data);
     }
    }

    public function con_registration(){
        // print_r('hii');die()
     if(session()->get('name')){
        $org_id = session()->get('org_id');
        $role_id = session()->get('role_id');
        $name = session()->get('dr_id');

        $conferene_id = $this->request->getVar('conferene_id');
        

        $reg_fee_reg  = $this->request->getVar('reg_fee_reg');
        $reg_details_reg  = $this->request->getVar('reg_details_reg');
        
        $login_id = session()->get('id');
       
        // print_r($conferene_id);die();
        $registration_con = array(
            'org_id'=> $org_id,
            'role_id'=> $role_id, 
            'conference_id'=>$conferene_id,
            // 'conference_id'=>$conference_id,
            // 'title'=> $title_con,
            'reg_fee'=> $reg_fee_reg,
            'reg_details'=> $reg_details_reg,
            'created_by' =>$name 
            
        );
        // print_r($registration_con);die();

        // $csa_update = new CSA_Model(); 
        // $csa_update->set($update_csa);
        // $csa_update->where('conferene_id',$conferene_id);
        // $update = $csa_update->update();

        $model = new Conf_About(); 
        $model->set($registration_con);
        $model->where('conference_id',$conferene_id);        
        $update = $model->update();



        if($update){
            return json_encode(array(   
                 
                 'data' => $conferene_id,
                 'result'    => 1,
                 'message'     => 'Registration inserted successfully '
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

public function edit_registration(){
        if(session()->get('name')){
        $conference_id = $_GET['id'];
         
        // $conference_id = $this->request->getVar('conference_id');
         
        // $model  = new Conf_About();
        // // $model->set($add_conference);
        // $data['values'] = $model->where('conference_id',$conference_id)

        $model1 = new Conf_About();
            $model1->select('*');
            $model1->where('conference_id',$conference_id);
            $data['registr'] =$model1->get()->getResultArray();
 
       

        // $db = \Config\Database::connect();
        // $affected_rows = $db->affectedRows();


        $e_library=['z,x,y'];
        $data['registration'] = $e_library;

        $model = new OrganisationModel();
        $details  = $model->get()->getResultArray();
        $data['org'] = $details;

        $model2 = new Conf_About();
        $model2->where('conference_id',$conference_id);
        $model2->select('title');
        $details4  = $model2->get()->getResultArray();

        $data['title_con_e'] = $details4;
        $data['conference_id'] = $conference_id;
  // print_r($data['values']);die();
        if($data['registr']){

            return view('admin/registrationedit', $data);
        }
        else{
            return 'Something went wrong...';
           
        }
    }
     else{
            return redirect()->to('Super-Admin'); 
        }
}

    public function update_registration(){
        if(session()->get('name')){

        $org_id = session()->get('org_id');
        $role_id = session()->get('role_id');

        // print_r($role_id);die();
        if($this->request->getMethod() == 'post'){

        $conference_id  = $this->request->getVar('conference_id');

        $reg_fee_reg  = $this->request->getVar('reg_fee_reg_e');
        $reg_details_reg  = $this->request->getVar('reg_details_reg_e');
        
        $login_id = session()->get('id');
        
           
            $registration_con = array(
            'org_id'=> $org_id,
            'role_id'=> $role_id, 
            'conference_id'=>$conference_id,
            'reg_fee'=> $reg_fee_reg,
            'reg_details'=> $reg_details_reg,
            'created_by' =>$name 
            
        );
 
            
            
            $model = new Conf_About(); 
            $model->set($registration_con);
            $model->where('conference_id',$conference_id);
            $update = $model->update();


            // print_r($update);die();
            

            if($update){
                return json_encode(array(
                     'result'    => 1,
                     'message'   => 'Registration Updated successfully....',
                     'data'      => $conference_id
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
            return redirect()->to('Super-Admin'); 
        }
    }

}



    public function get_all_users(){
     if(session()->get('name')){
        $conference_id = session()->get('conference_id');

        // print_r($org_id);die();

        $dbDetails = array(
            "host"=>$this->db->hostname,
            "user"=>$this->db->username,
            "pass"=>$this->db->password,
            "db"=>$this->db->database,
            "port"=>$this->db->port
        );
        
        $table = "conf_about";
        $primaryKey = "conference_id";

        $columns = array(
            array(
                'db'=>'conference_id',
                'dt'=>0,
                'field'=>'conference_id',
            ),
            array(
                'db'=>'reg_fee',
                'dt'=>1,
                'field' => 'reg_fee'
            ),
            array(
                'db'=>'reg_details',
                'dt'=>2,
                'field' => 'reg_details'
            ),
            
            array(
                'db'=>'id',
                'dt'=>3,
                'formatter'=>function($d, $row){
                    return "<div class='btn-group'>
                                <button class='btn btn-sm btn-primary' data-id='".$row['conference_id']."' id='updateCountryBtn'>Update</button>
                                                               
                            </div>";
                }
            ),
        );
        
        echo json_encode(
            \SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
        );
    }

    }
}
?>
