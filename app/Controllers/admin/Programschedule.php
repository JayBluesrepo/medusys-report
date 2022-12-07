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

class Programschedule extends BaseController
{
    public function __construct()
    {
        require_once APPPATH.'ThirdParty/ssp.class.php';
        $this->db = db_connect();
    }

    // public function index(){

    // }
    public function program(){
        

       
        $org_id = session()->get('org_id');

        $conference_id = $_GET['id'];


        $e_library=['z,x,y'];
        $data['programschedule'] = $e_library;

        $model = new OrganisationModel();
        $details  = $model->get()->getResultArray();
        $data['org'] = $details;

        $model = new RegisterUserModel();
        // $model->where('org_id',$org_id);
        $model->select('f_name')->orderBy('id','DESC');
        $model->select('l_name')->orderBy('id','DESC');
        $details1  = $model->get()->getResultArray();
        $data['dr_name'] = $details1;

       
        $model1 = new Conf_About();
        $model1->where('conference_id',$conference_id);
        $model1->select('title');
        $details2  = $model1->get()->getResultArray();


        $data['title_con'] = $details2;
        $data['conference_id'] = $conference_id;


        // print_r($conference_id);die();

        return view('admin/program-schedule', $data);
    }
    public function program_schedule(){
        //$db = \Config\Database::connect();
        $org_id = session()->get('org_id');
        $role_id = session()->get('role_id');
        $name = session()->get('name');

        $start_time  = $this->request->getVar('start_time[]');
        $end_time  = $this->request->getVar('end_time[]');
        //for date format
        $dates  = $this->request->getVar('datename');
        $createdate = date('Y-m-d');

        $topic  = $this->request->getVar('topic');
        $moderator  = $this->request->getVar('moderator_con_sub');
        $speaker  = $this->request->getVar('speaker_con_sub');
        $upload_file  = $this->request->getVar('upload_file');
        $ps_id = $this->request->getVar('ps_id');
        // $delete_status = $this->request->getVar('delete_status');
        $conferene_id = $this->request->getVar('conferene_id');

        // print_r($conferene_id);die();


         
     
        // print_r($_POST);
           // die();

        $login_id = session()->get('id');

        foreach($start_time as $key=>$val){

         // $seva_date1 = date('Y-m-d',strtotime($s_date));

            $program_schedule = array(
                // 'org_id'=> $org_id,
                // 'role_id'=> $role_id, 
                'conference_id'=>$conferene_id,
                'start_time'=> $start_time[$key],
                'end_time'=> $end_time[$key],
                'date'=> date('Y-m-d',strtotime($dates[$key])),
                'topic'=> $topic[$key],
                'moderator'=> $moderator[$key],
                'speaker'=> $speaker[$key],
                'upload_file'=>$upload_file[$key],
                // 'delete_status'=>$delete_status,
                'created_by' =>$name
             );

         // print_r($program_schedule);
          
            $model = new ProgramScheduleModel(); 
            $model->save($program_schedule);
            $insertedID = $model->insertID();

        }
         // echo $insertedID;
         // die();

            
        
        // die();
        if($insertedID){
            return json_encode(array(
                 
                'data' => $conferene_id,
                 'result'    => 1,
                 'message'     => 'data inserted successfully '
            ));
        
        }else{
            return json_encode(array(
                 'result'    => 0,
                 'message'     => 'Something wrong.....'
            ));
        }
    
    
    // public function get_sub_category(){
    //     $moderator_con_sub  = $this->request->getVar('moderator_con_sub');
    //      $speaker_con_sub  = $this->request->getVar('speaker_con_sub');
    }

public function edit_programschedule(){
        if(session()->get('name')){
        $conference_id = $_GET['id'];
         // print_r($conference_id);die();
        
        $model  = new ProgramScheduleModel();
        $model->where('conference_id',$conference_id);
        $details11  = $model->get()->getResultArray();
        $data['programs'] = $details11;

        

        $e_library=['z,x,y'];
        $data['programschedule'] = $e_library;

        $model = new OrganisationModel();
        $details  = $model->get()->getResultArray();
        $data['org'] = $details;

        $model5 = new RegisterUserModel();
        $model5->select('f_name')->orderBy('id','DESC');
	    $model5->select('l_name')->orderBy('id','DESC');
        $details4  = $model5->get()->getResultArray();
        $data['dr_name'] = $details4;
        

        $model1 = new Conf_About();
        $model1->where('conference_id',$conference_id);
        $model1->select('title');
        $details2  = $model1->get()->getResultArray();




        $data['title_con_e'] = $details2;
        $data['conference_id'] = $conference_id;


        if($data['programs']){

            return view('admin/program-scheduleedit', $data);
        }
        else{
            return 'Something went wrong...';
           
        }
    }
     else{
            return redirect()->to('Super-Admin'); 
        }
}


public function add_programschedule(){
        if(session()->get('name')){

        $org_id = session()->get('org_id');
        $role_id = session()->get('role_id');
        $id = session()->get('dr_id');
        
        if($this->request->getMethod() == 'post'){


        // $ps_id = $this->request->getVar('ps_id');

        
       
        $start_time  = $this->request->getVar('start_time_a');
        $end_time  = $this->request->getVar('end_time_a');
        //for date format
        $dates  = $this->request->getVar('datename_a'); 
        $createdate = date('Y-m-d');

        $topic  = $this->request->getVar('topic_a');
        $moderator  = $this->request->getVar('moderator_con_sub_a');
        $speaker  = $this->request->getVar('speaker_con_sub_a');
        $upload_file  = $this->request->getVar('upload_file_a');
        // $delete_status = $this->request->getVar('delete_status');

        $login_id = session()->get('dr_id');

        $conferene_id = $this->request->getVar('conferene_id');

           


        foreach($start_time as $key=>$val){
           
            $program_schedule = array(
               
                'start_time'=> $start_time[$key],
                'end_time'=> $end_time[$key],
                'date'=> date('Y-m-d',strtotime($dates[$key])),
                'topic'=> $topic[$key],
                'moderator'=> $moderator[$key],
                'speaker'=> $speaker[$key],
                'upload_file'=>$upload_file[$key],
                'conference_id'=>$conferene_id,
                // 'delete_status'=>$delete_status,
                'updated_by' =>$id
             );
            
            
            $model5 = new ProgramScheduleModel();  
            $model5->save($program_schedule);
            $addID = $model5->insertID();
      
        } 

            if($addID){

                return json_encode(array(
                     'result'    => 1,
                     'message'   => 'Added successfully....',
                     'data'=>    $conferene_id
                ));
           }
           else{
                return json_encode(array(
                     'result'    => 0,
                     'message'     => 'Something went wrong with ADD.....'
                ));
            }
        }
         else{
            return redirect()->to('Super-Admin'); 
        }
    }

}


public function upd_programschedule(){
        if(session()->get('name')){
        $conference_id = $_GET['id'];
         print_r($conference_id);die();
        
        $model2  = new ProgramScheduleModel();
        $model2->where('conference_id',$conference_id);
        $details11  = $model2->get()->getResultArray();
        $data['programs'] = $details11;

        

        $e_library=['z,x,y'];
        $data['programschedule'] = $e_library;

        $model = new OrganisationModel();
        $details  = $model->get()->getResultArray();
        $data['org'] = $details;

        $model5 = new RegisterUserModel();
        $model5->select('f_name','l_name')->orderBy('id','DESC');
        $details4  = $model5->get()->getResultArray();
        $data['dr_name'] = $details4;
        

        $model1 = new Conf_About();
        $model1->where('conference_id',$conference_id);
        $model1->select('title');
        $details2  = $model1->get()->getResultArray();


        $data['title_con_e'] = $details2;
        $data['conference_id'] = $conference_id;

        // print_r($data['programs']);die();
        if($data['programs']){

            return view('admin/program-scheduleupdate', $data);
        }
        else{
            return 'Something went wrong...';
           
        }
    }
     else{
            return redirect()->to('Super-Admin'); 
        }
}

public function update_programschedule(){
    if(session()->get('name')){
        // print_r($_POST);die();
        $org_id = session()->get('org_id');
        $role_id = session()->get('role_id');
        $id = session()->get('dr_id');
        
        if($this->request->getMethod() == 'post'){


        $ps_id = $this->request->getVar('ps_id[]');

        
       
        $start_time  = $this->request->getVar('start_time_e');
        $end_time  = $this->request->getVar('end_time_e');
        //for date format
        $dates  = $this->request->getVar('datename_e'); 
        $createdate = date('Y-m-d');

        $topic  = $this->request->getVar('topic_e');
        $moderator  = $this->request->getVar('moderator_con_sub_e');
        $speaker  = $this->request->getVar('speaker_con_sub_e');
        $upload_file  = $this->request->getVar('upload_file_e');
        // $delete_status = $this->request->getVar('delete_status');

        $login_id = session()->get('dr_id');

        $conferene_id = $this->request->getVar('conferene_id');


        foreach($start_time as $key=>$val){

            $program_schedule = array(
               
                'start_time'=> $start_time[$key],
                'end_time'=> $end_time[$key],
                'date'=> date('Y-m-d',strtotime($dates[$key])),
                'topic'=> $topic[$key],
                'moderator'=> $moderator[$key],
                'speaker'=> $speaker[$key],
                'upload_file'=>$upload_file[$key],
                'conference_id'=>$conferene_id,
                'ps_id'=>$ps_id[$key],
                // 'delete_status'=>$delete_status,
                'updated_by' =>$id
             );
            
            if($ps_id[$key] === "new"){

            $model6 = new ProgramScheduleModel();  
            $model6->save($program_schedule);
            $updateID = $model6->insertID();

            }
            else{ 
                $model6 = new ProgramScheduleModel();  
                $model6->set($program_schedule);
                $model6->where('ps_id',$ps_id[$key]);
                $updateID = $model6->update();
            }
      
        } 

            if($updateID){

                return json_encode(array(
                     'result'    => 1,
                     'message'   => 'updated successfully....',
                     'data'=>    $conferene_id
                ));
           }
           else{
                return json_encode(array(
                     'result'    => 0,
                     'message'     => 'Something went wrong with ADD.....'
                ));
            }
        }
         else{
            return redirect()->to('Super-Admin'); 
        }
    }

}


public function del_programschedule(){
        if(session()->get('name')){
        $conference_id = $_GET['id'];
         
        
        $model  = new ProgramScheduleModel();
        $model->where('conference_id',$conference_id);
        $details11  = $model->get()->getResultArray();
        $data['programs'] = $details11;

        

        $e_library=['z,x,y'];
        $data['programschedule'] = $e_library;

        $model = new OrganisationModel();
        $details  = $model->get()->getResultArray();
        $data['org'] = $details;

        $model5 = new RegisterUserModel();
        $model5->select('f_name','l_name')->orderBy('id','DESC');
        $details4  = $model5->get()->getResultArray();
        $data['dr_name'] = $details4;
        

        $model1 = new Conf_About();
        $model1->where('conference_id',$conference_id);
        $model1->select('title');
        $details2  = $model1->get()->getResultArray();


        $data['title_con_e'] = $details2;
        $data['conference_id'] = $conference_id;


        if($data['programs']){

            return view('admin/program-scheduledelete', $data);
        }
        else{
            return 'Something went wrong...';
           
        }
    }
     else{
            return redirect()->to('Super-Admin'); 
        }
}




public function delete_programschedule(){
 if(session()->get('name')){

        $org_id = session()->get('org_id');
        $role_id = session()->get('role_id');
        $id = session()->get('dr_id');
        
        if($this->request->getMethod() == 'post'){


        $ps_id = $this->request->getVar('ps_id');
        $conferene_id = $this->request->getVar('con_id');

        // print_r($con_id);die();
            
            
            $model = new ProgramScheduleModel(); 
            // $model->set($program_schedule);
            $model->where('ps_id',$ps_id);
            $delete = $model->delete();

            if($delete){

                return json_encode(array(
                     'result'    => 1,
                     'message'   => 'Deleted successfully....',
                     'data'=>    $conferene_id
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
        $ps_id = session()->get('ps_id');

     

        $dbDetails = array(
            "host"=>$this->db->hostname,
            "user"=>$this->db->username,
            "pass"=>$this->db->password,
            "db"=>$this->db->database,
            "port"=>$this->db->port
        );
        
        $table = "conf_ps";
        $primaryKey = "ps_id";

        $columns = array(
            array(
                'db'=>'ps_id',
                'dt'=>0,
                'field'=>'ps_id'
                ),
            array(
                'db'=>'conference_id',
                'dt'=>1,
                'field' => 'conference_id'
            ),
            array(
                'db'=>'start_time',
                'dt'=>2,
                'field' => 'start_time'
            ),
            array(
                'db'=>'end_time',
                'dt'=>3,
                'field' => 'end_time'
            ),
             array(
                'db'=>'date',
                'dt'=>4,
                'field' => 'date'
            ),
            array(
                'db'=>'topic',
                'dt'=>5,
                'field' => 'topic'
            ),
            array(
                'db'=>'moderator',
                'dt'=>6,
                'field' => 'moderator'
            ),
            array(
                'db'=>'speaker',
                'dt'=>7,
                'field' => 'speaker'
            ),
            array(
                'db'=>'upload_file',
                'dt'=>8,
                'field'=> 'upload_file' 
            ),
            array(
                'db'=>'id',
                'dt'=>9,
                'formatter'=>function($d, $row){
                    return "<div class='btn-group'>
                                <button class='btn btn-sm btn-primary' data-id='".$row['ps_id']."' id='updateCountryBtn'>Update</button>
                                                               
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
