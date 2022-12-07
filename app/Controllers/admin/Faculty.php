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
use App\Models\ProgramScheduleModel;
use App\Models\RegisterUserModel;
use App\Models\FacultyModel;


class Faculty extends BaseController
{
    public function __construct()
    {
        require_once APPPATH.'ThirdParty/ssp.class.php';
        $this->db = db_connect();
    }
    
    
    // public function index(){
    // }
    public function index() {

          
        if(session()->get('name')){


        $org_id = session()->get('org_id');

        $conference_id = $_GET['id'];

        $e_library=['z,x,y'];
        $data['faculty'] = $e_library;

        $model = new OrganisationModel();
        $details  = $model->get()->getResultArray();
        $data['org'] = $details;



        $model2 = new Conf_About();
        $model2->where('conference_id',$conference_id);
        $model2->select('title');
        $details4  = $model2->get()->getResultArray();

        
        
        $model3 = new ProgramScheduleModel(); 
        $model3->where('conference_id',$conference_id);
        $model3->select('*'); 
        $speaker  = $model3->get()->getResultArray();

        $data['speaker'] = $speaker;

        $data['title_con'] = $details4;
        $data['conference_id'] = $conference_id;


        return view('admin/faculty', $data);
    }
}
    
 

    
    public function faculty_add(){

    if(session()->get('name')){     
        $org_id = session()->get('org_id');
        $role_id = session()->get('role_id');
        $name = session()->get('dr_id');
        // print_r($_POST);die();


        
        $conferene_id = $this->request->getVar('conferene_id');
        // $profile_pic =$this->request->getVar('profile_pic_fac');
        $ps_faculty_id =$this->request->getVar('speaker_id');
        $speaker = $this->request->getVar('speaker_id');
        $name_fac = $this->request->getVar('name_fac');
        $present_des = $this->request->getVar('present_des_fac');
        $qualification =$this->request->getVar('qualification_fac');
        $special_int = $this->request->getVar('special_int_fac');
        $publication = $this->request->getVar('publication_fac');
        
        // print_r($qualification);die();
        
        $login_id = session()->get('id');

        $profile = $this->request->getFile('profile_pic_fac');
        // print_r($publication);die();
        $profile_pic_fac = '';
        if($profile->isValid() && !$profile->hasMoved()){
            $newName = $profile->getName();
            $profile_pic_fac = $profile->getName();
            $profile->move('images/faculty_profile/', $newName);
        }
        
        $faculty_con = array(
            
            'conference_id'=>$conferene_id,
            'ps_faculty_id'=>$ps_faculty_id,
            'speaker'=> $speaker,
            'profile_pic'=> $profile_pic_fac,
            // 'profile_pic'=> $profile->getClientName(),
            'name'=> $name_fac,
            'present_des'=> $present_des,
            'qualification'=> $qualification,
            'special_int' => $special_int,
            'publication' => $publication,
            'updated_by' =>$name 
        );
 
        
        $model = new FacultyModel(); 
        $model->save($faculty_con);
        $insertedID = $model->insertID();

        if($insertedID){
            return json_encode(array(
                 
                 'data' => $conferene_id,
                 'result'    => 1,
                 'message'     => 'data inserted successfully '
            ));
        }
        else{
            return json_encode(array(
                 'result'    => 0,
                 'message'   => 'Something went wrong.....'
            ));
        }
    }
    
  }


 public function edit_faculty()
    {
        $dr_id = session()->get('dr_id');
        $conference_id = $_GET['id'];


        if($dr_id){

            $e_library=['z,x,y'];
            $data['faculty'] = $e_library;

            $model = new OrganisationModel();
            $details  = $model->get()->getResultArray();
            $data['org'] = $details;

            $org_id = session()->get('org_id');

            $model1 = new Conf_About();
            $model1->where('conference_id',$conference_id);
            $model1->select('title');
            $details2  = $model1->get()->getResultArray();

            $data['title_con'] = $details2;
            $data['conference_id'] = $conference_id;

            $model3 = new ProgramScheduleModel(); 
            $model3->where('conference_id',$conference_id);
            $model3->select('*');
            $data['speaker'] = $model3->get()->getResultArray();

            $data['ps_id'] = $fac_id;

            $model2 = new FacultyModel();
            $model2->select('*');
            $model2->where('conference_id',$conference_id);
            // $model2->where('delete_status','0');
            $data['faculty11'] =$model2->get()->getResultArray();

            $data['dr_id'] =  $dr_id;
            if($data['faculty11']) {
            return view('admin/facultyedit', $data);
            }
            else
            {
                return 'Something went wrong...';
            }
            }
            else{
                return view('login');
            }
    }

    
   public function get_facultly_details()
    {
       
    $dr_id = session()->get('dr_id');
    $fac_id = $this->request->getvar('ps_id');
   
    //print_r($dr_id);die();
        if($dr_id){

            $e_library=['z,x,y'];
        

            $model = new OrganisationModel();
            $details  = $model->get()->getResultArray();
            //$data['org'] = $details;

            $org_id = session()->get('org_id');

            $model = new Conf_About();
            $model->select('*');
            // $data['val']  = $model->where('conference_id',$conference_id);


            $model1 = new FacultyModel();
            $model1->select('*');
            $faculty21 = $model1->where('ps_faculty_id',$fac_id)->first();

           // print_r($faculty21);die();


            if($faculty21){
                return json_encode(array(

                'data' => $faculty21,
                'result'    => 1,
             	'message' => 'Update Faculty Details'
                ));

            }
            else{
                return json_encode(array(
                'result'    => 0,
                'ps_id'     => $fac_id,
             	'message' => 'Enter the details'
                ));
            }

        }
        else{
            return view('login');
        }
    }

    public function update_faculty(){
        if(session()->get('name')){

        $org_id = session()->get('org_id');
        $role_id = session()->get('role_id');
        $name = session()->get('dr_id');

        // print_r($_POST);die();
        if($this->request->getMethod() == 'post'){

        $id = $this->request->getVar('faculty_id');
        // print_r($id);die();
        $conference_id  = $this->request->getVar('conference_id');
        $ps_faculty_id =$this->request->getVar('ps_id');
        $speaker = $this->request->getVar('speaker_id');
        $name_fac = $this->request->getVar('name_fac');
        $present_des = $this->request->getVar('present_des_fac');
        $qualification =$this->request->getVar('qualification_fac');
        $special_int = $this->request->getVar('special_int_fac');
        $publication = $this->request->getVar('publication_fac');
        $update_id = $this->request->getVar('update_id');
        // $total_num = $this->request->getVar('total_num');


        // print_r($conference_id);die();
        if($update_id == 0){  // insert

       

            $profile = $this->request->getFile('profile_pic_fac');
            $profile_pic_fac = $profile->getName();
            $login_id = session()->get('id');


            if($profile_pic_fac != ''){
                   
                    $profile_pic_fac = '';
                    if($profile->isValid() && !$profile->hasMoved()){
                        $newName = $profile->getName();
                        $profile_pic_fac = $profile->getName();
                        $profile->move('images/faculty_profile/', $newName);
                    
                    
                       
                         $faculty_con = array(
                   
                            'profile_pic'=> $profile_pic_fac,
                            'name'=> $name_fac,
                            'present_des'=> $present_des,
                            'qualification'=> $qualification,
                            'special_int' => $special_int,
                            'publication' => $publication,
                            'updated_by' =>$name, 
                            'conference_id' => $conference_id,
                            'ps_faculty_id' => $id,
                            // 'speaker' => $ps_faculty_id,
                        );
                    }
                }

                 // print_r($faculty_con);die();

            $model7 = new FacultyModel();  
            $model7->save($faculty_con);
            $updateadd = $model7->insertID();

        }
        else{  // update

            $profile = $this->request->getFile('profile_pic_fac');
            $profile_pic_fac = $profile->getName();
            $login_id = session()->get('id');
            if($profile_pic_fac != ''){
                   
                    $profile_pic_fac = '';
                    if($profile->isValid() && !$profile->hasMoved()){
                        $newName = $profile->getName();
                        $profile_pic_fac = $profile->getName();
                        $profile->move('images/faculty_profile/', $newName);
                    
                    
                       
                         $faculty_con = array(
                   
                            'profile_pic'=> $profile_pic_fac,
                            'name'=> $name_fac,
                            'present_des'=> $present_des,
                            'qualification'=> $qualification,
                            'special_int' => $special_int,
                            'publication' => $publication,
                            'updated_by' =>$name, 
                            'conference_id' => $conference_id,
                            
                        );
                    }
                }
                else{
                     $faculty_con = array(
			    'profile_pic'=> $profile_pic_fac,
                            'name'=> $name_fac,
                            'present_des'=> $present_des,
                            'qualification'=> $qualification,
                            'special_int' => $special_int,
                            'publication' => $publication,
                            'updated_by' =>$name, 
                            'conference_id' => $conference_id,
                            
                        );
                }
                
                $model6 = new FacultyModel();  
                $model6->set($faculty_con);
                $model6->where('id',$id);
                $update = $model6->update();

           

        }    
         
            if($update || $updateadd){
                return json_encode(array(
                     'result'    => 1,
                     'message'   => 'Faculty Added successfully....',
                     'data'      => $conference_id
                ));
           }
           else{
                return json_encode(array(
                     'result'    => 0,
                     'message'     => 'Something went wrong with faculty.....'
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
        $id = session()->get('id');

        // print_r($org_id);die();

        $dbDetails = array(
            "host"=>$this->db->hostname,
            "user"=>$this->db->username,
            "pass"=>$this->db->password,
            "db"=>$this->db->database,
            "port"=>$this->db->port
        );
        
        $table = "conf_faculty";
        $primaryKey = "id";

        $columns = array(
            array(
                'db'=>'id',
                'dt'=>0,
                'field' => 'id'
            ),
            array(
                'db'=>'conference_id',
                'dt'=>1,
                'field'=>'conference_id'
            ),
            array(
                'db'=>'ps_faculty_id',
                'dt'=>2,
                'field' => 'ps_faculty_id'
            ),
            array(
                'db'=>'speaker',
                'dt'=>3,
                'field' => 'speaker'
            ),
            array(
                'db'=>'profile_pic',
                'dt'=>4,
                'field' => 'profile_pic'
            ),
            array(
                'db'=>'name',
                'dt'=>5,
                'field' => 'name'
            ),
            array(
                'db'=>'present_des',
                'dt'=>6,
                'field' => 'present_des'
            ),
            array(
                'db'=>'qualification',
                'dt'=>7,
                'field' => 'qualification'
            ),
            array(
            	'db'=>'special_int'),
            	'dt'=>8,
            	'field'=>'special_int',
            array(
            	'db'=>'publication',
            	'dt'=>9,
            	'field'=>'publication'
            ),	
            array(
                'db'=>'id',
                'dt'=>10,
                'formatter'=>function($d, $row){
                    return "<div class='btn-group'>
                                <button class='btn btn-sm btn-primary' data-id='".$row['id']."' id='updateCountryBtn'>Update</button>
                                                               
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
