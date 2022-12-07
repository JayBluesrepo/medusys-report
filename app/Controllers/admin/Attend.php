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
use App\Models\ProgramScheduleModel;    

class Attend extends  BaseController
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
        $data['attend'] = $e_library;

        $model = new OrganisationModel();
        $details  = $model->get()->getResultArray();
        $data['org'] = $details;

        $model2 = new Conf_About();
        $model2->where('conference_id',$conference_id);
        $model2->select('title');
        $details5  = $model2->get()->getResultArray();

        $model3 = new ProgramScheduleModel(); 
        $model3->where('conference_id',$conference_id);
        $model3->select('*'); 
        $details6  = $model3->get()->getResultArray();


        $data['title_con'] = $details5;
        $data['conference_id'] = $conference_id;
        
       
        $data['ps_ids'] = $details6;

        return view('admin/attend', $data);
    }
}

    public function attend(){
        if(session()->get('name')){
        $org_id = session()->get('org_id');
        $role_id = session()->get('role_id');
        $name = session()->get('dr_id');
        // print_r($_POST);
        // die();
        $conferene_id = $this->request->getVar('conferene_id');
        $ps_id = $this->request->getVar('ps_id');

    
        $your_date  = $this->request->getVar('datename');
        $date = date("Y-m-d", strtotime($your_date));
 

        $createdate = date('Y-m-d');
        $zoom_link =$this->request->getVar('zoom_link');
        $zoom_membership_id = $this->request->getVar('zoom_membership_id');
        $zoom_passcode = $this->request->getVar('zoom_passcode');
        $youtube_link = $this->request->getVar('youtube_link');
        $googlemeet_link = $this->request->getVar('googlemeet_link');
        $attend_link  = $this->request->getVar('attend_link');
       
        
        $login_id = session()->get('id');
       
         // print_r($conferene_id);
         // print_r($date);
         // die();
        $attend_con = array(
            'zoom_link' => $zoom_link,
            'zoom_membership_id' => $zoom_membership_id,
            'zoom_passcode' => $zoom_passcode,
            'youtube_link' => $youtube_link,
            'googlemeet_link' => $googlemeet_link,
            'attend_link' => $attend_link,
            'created_by' =>$name 
            
        );
        // print_r($registration_con);die();

        $model = new ProgramScheduleModel(); 
        $model->set($attend_con);
        $model->where('conference_id',$conferene_id);
        $model->where('date',$date);        
        $update = $model->update();

         $db = \Config\Database::connect();
        // $query = $db->getLastQuery();
        //echo (string)$query;
        $affected_rows = $db->affectedRows();

        //echo $affected_rows;
        //die();
        if($affected_rows){
            return json_encode(array(   
                 
                 'data' => $conferene_id,
                 'result'    => 1,
                 'message'     => 'Attend links are  updated successfully..'
            ));
        }
        else{
            return json_encode(array(
                 'result'    => 0,
                 'message'     => 'Please enter the correct date...'
            ));
        }
    }
     // ----------------------
           }
    public function single_attend(){

        if(session()->get('name')){
        $org_id = session()->get('org_id');
        $role_id = session()->get('role_id');
        $name = session()->get('dr_id');
        // print_r($_POST);
        // die();
        $conferene_id = $this->request->getVar('conferene_id');
        $ps_id = $this->request->getVar('ps_id');

    
        // $your_date  = $this->request->getVar('datename');
        // $date = date("Y-m-d", strtotime($your_date));
 

        $createdate = date('Y-m-d');
        $zoom_link =$this->request->getVar('zoom_link');
        $zoom_membership_id = $this->request->getVar('zoom_membership_id');
        $zoom_passcode = $this->request->getVar('zoom_passcode');
        $youtube_link = $this->request->getVar('youtube_link');
        $googlemeet_link = $this->request->getVar('googlemeet_link');
        $attend_link  = $this->request->getVar('attend_link');
       
        
        $login_id = session()->get('id');
       
        // print_r($conferene_id);die();
        $attend_conference = array(
            'zoom_link' => $zoom_link,
            'zoom_membership_id' => $zoom_membership_id,
            'zoom_passcode' => $zoom_passcode,
            'youtube_link' => $youtube_link,
            'googlemeet_link' => $googlemeet_link,
            'attend_link' => $attend_link,
            'created_by' =>$name 
            
        );
        // print_r($attend_conference);die();

        $model4 = new ProgramScheduleModel(); 
        $model4->set($attend_conference);
        $model4->where('ps_id',$ps_id);
        //$model4->where('date',$date);        
        $update1 = $model4->update();
        if($update1){
            return json_encode(array(   
                 
                 'data' => $conferene_id,
                 'result'    => 1,
                 'message'     => 'Single Attend link is updated successfully '
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

 public function edit_attend(){
        if(session()->get('name')){
        $conference_id = $_GET['id'];
         
      

        $model  = new ProgramScheduleModel();
        $model->where('conference_id',$conference_id);
        $details11  = $model->get()->getResultArray();
        $data['attend'] = $details11;

        $e_library=['z,x,y'];
        $data['conference'] = $e_library;

        $model = new OrganisationModel();
        $details  = $model->get()->getResultArray();
        $data['org'] = $details;

        $model2 = new Conf_About();
        $model2->where('conference_id',$conference_id);
        $model2->select('title');
        $details5  = $model2->get()->getResultArray();

        $model3 = new ProgramScheduleModel(); 
        $model3->where('conference_id',$conference_id);
        $model3->select('*'); 
        $details6  = $model3->get()->getResultArray();


        $data['title_con_e'] = $details5;
        $data['conference_id'] = $conference_id;
        
       
        $data['ps_ids'] = $details6;

  // print_r($data['values']);die();
        
            if($data['attend']){
            return view('admin/attendedit', $data);
        }
        else{
            return 'Something went wrong...';
           
        }
    }
     else{
            return redirect()->to('Super-Admin'); 
        }
}

    public function update_attend(){
        if(session()->get('name')){

        $org_id = session()->get('org_id');
        $role_id = session()->get('role_id');

        // print_r($role_id);die();
        if($this->request->getMethod() == 'post'){

        //$conference_id = $this->request->getVar('conference_id');

        $conference_id = $this->request->getVar('conferene_id');
        $ps_id = $this->request->getVar('ps_id');

    // print_r($ps_id);die();
        $your_date  = $this->request->getVar('datename_e');
        $date = date("Y-m-d", strtotime($your_date));


        $createdate = date('Y-m-d');
        $zoom_link =$this->request->getVar('zoom_link_e');
        $zoom_membership_id = $this->request->getVar('zoom_membership_id_e');
        $zoom_passcode = $this->request->getVar('zoom_passcode_e');
        $youtube_link = $this->request->getVar('youtube_link_e');
        $googlemeet_link = $this->request->getVar('googlemeet_link_e');
        $attend_link  = $this->request->getVar('attend_link_e');
       
        
        $login_id = session()->get('id');
       

           
                            
        $attend_con = array(
            'zoom_link' => $zoom_link,
            'zoom_membership_id' => $zoom_membership_id,
            'zoom_passcode' => $zoom_passcode,
            'youtube_link' => $youtube_link,
            'googlemeet_link' => $googlemeet_link,
            'attend_link' => $attend_link,
            'updated_by' =>$name 
            
        );
            
          // print_r($attend_con);die();
  

            $model = new ProgramScheduleModel(); 
            $model->set($attend_con);
            $model->where('date',$date);
            $model->where('conference_id',$conference_id);
            $update = $model->update();

        
           
           $this->db = \Config\Database::connect();
           $affected_rows = $this->db->affectedRows();


            if($affected_rows > 0){
                return json_encode(array(
                     'result'    => 1,
                     'message'   => 'Links are Updated successfully....',
                     'data'=>$conference_id
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

public function edit_singleattend(){
        if(session()->get('name')){
        $conference_id = $_GET['id'];
  
        $model  = new ProgramScheduleModel();
        $model->where('conference_id',$conference_id);
        $details15  = $model->get()->getResultArray();
        $data['attend'] = $details15;


        $e_library=['z,x,y'];
        $data['conference'] = $e_library;

        $model = new OrganisationModel();
        $details  = $model->get()->getResultArray();
        $data['org'] = $details;

        $model2 = new Conf_About();
        $model2->where('conference_id',$conference_id);
        $model2->select('title');
        $details5  = $model2->get()->getResultArray();

        $model3 = new ProgramScheduleModel(); 
        $model3->where('conference_id',$conference_id);
        $model3->select('*'); 
        $details6  = $model3->get()->getResultArray();


        $data['title_con_e'] = $details5;
        $data['conference_id'] = $conference_id;
        
       
        $data['ps_ids'] = $details6;

  
        if($data['attend']){

            return view('admin/attendedit', $data);
        }
        else{
            return 'Something went wrong...';
           
        }
    }
     else{
            return redirect()->to('Super-Admin'); 
        }
}

    public function update_attendsingle(){
        if(session()->get('name')){

        $org_id = session()->get('org_id');
        $role_id = session()->get('role_id');

        // print_r($role_id);die();
        if($this->request->getMethod() == 'post'){

        $conference_id = $this->request->getVar('conference_id');
        $ps_id = $this->request->getVar('ps_id');

    
        $your_date  = $this->request->getVar('datename_se');
        $date = date("Y-m-d", strtotime($your_date));

        $createdate = date('Y-m-d');
        $zoom_link =$this->request->getVar('zoom_link_se');
        $zoom_membership_id = $this->request->getVar('zoom_membership_id_se');
        $zoom_passcode = $this->request->getVar('zoom_passcode_se');
        $youtube_link = $this->request->getVar('youtube_link_se');
        $googlemeet_link = $this->request->getVar('googlemeet_link_se');
        $attend_link  = $this->request->getVar('attend_link_se');
       
        
        $login_id = session()->get('id');
     

                $attend_con = array(
            'zoom_link' => $zoom_link,
            'zoom_membership_id' => $zoom_membership_id,
            'zoom_passcode' => $zoom_passcode,
            'youtube_link' => $youtube_link,
            'googlemeet_link' => $googlemeet_link,
            'attend_link' => $attend_link,
            'updated_by' =>$name 
            
        );
            
            // print_r($conference_id);die();


            $model = new ProgramScheduleModel(); 
            $model->set($attend_con);
            $model->where('ps_id',$ps_id);
            $update = $model->update();

                      // print_r($update);die();

            if($update){
                return json_encode(array(
                     'result'    => 1,
                     'message'   => 'Single link Updated successfully....',
                     'data'=>$conference_id
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

    public function get_ps_details(){

        $ps_id = $this->request->getVar('ps_id');   

        $model = new ProgramScheduleModel();
        $details1 = $model->select('*')->where('ps_id',$ps_id)->first();

        if(!empty($details1)){
            return json_encode(array(
                'result'    => 1,
                'message'    => $details1,
            ));
        }
        else{
            return json_encode(array(
                'result'    => 0,
                'message'     => 'No Files Found'                
           
            ));
        }

    }
    public function get_all_users(){
        if(session()->get('name')){
        $ps_id = session()->get('ps_id');

        // print_r($org_id);die();

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
                'db'=>'date',
                'dt'=>2,
                'field' => 'date'
            ),

            array(
                'db'=>'zoom_link',
                'dt'=>3,
                'field' => 'zoom_link'
            ),
            array(
                'db'=>'zoom_membership_id',
                'dt'=>4,
                'field' => 'zoom_membership_id'
            ),
            array(
                'db'=>'zoom_passcode',
                'dt'=>5,
                'field' => 'zoom_passcode'
            ),
             array(
                'db'=>'zoom_passcode',
                'dt'=>6,
                'field' => 'zoom_passcode'
            ),
            array(
                'db'=>'zoom_passcode',
                'dt'=>7,
                'field' => 'zoom_passcode'
            ),
            array(
                'db'=>'youtube_link',
                'dt'=>8,
                'field' => 'youtube_link'
            ),
            array(
                'db'=>'googlemeet_link',
                'dt'=>9,
                'field' => 'googlemeet_link'
            ),
            array(
                'db'=>'attend_link',
                'dt'=>10,
                'field'=>'attend_link',
            ),

            array(
                'db'=>'id',
                'dt'=>11,
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
?>
