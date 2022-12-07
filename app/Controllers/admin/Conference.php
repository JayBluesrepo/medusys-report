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

class Conference extends BaseController
{
    public function __construct()
	{
		require_once APPPATH.'ThirdParty/ssp.class.php';
        $this->db = db_connect();
	}
    
    
    public function index(){
        if(session()->get('name')){
            $e_library=['z,x,y'];
            $data['conference'] = $e_library;

            $model = new OrganisationModel();
            $details  = $model->get()->getResultArray();
            $data['org'] = $details;

            return view('admin/add-conference', $data);
        }
        else{
            return redirect()->to('Super-Admin'); 
        }
    }

    public function add_conference(){

        if(session()->get('name')){
            $org_id = session()->get('org_id');
            $role_id = session()->get('role_id');
            $name = session()->get('name');


            $title_con  = $this->request->getVar('title_con');
            $dates_con_from  = $this->request->getVar('dates_con_from');
            $date_from = date('Y-m-d',strtotime($dates_con_from));
            $dates_con_to  = $this->request->getVar('dates_con_to');
            $date_to = date('Y-m-d',strtotime($dates_con_to));

            $location_con  = $this->request->getVar('location_con');
            $theme_con  = $this->request->getVar('theme_con');
            $intro_con  = $this->request->getVar('intro_con');
            $org_msg_con  = $this->request->getVar('org_msg_con');
            $login_id = session()->get('id');

            $file_up = $this->request->getFile('file_up');
            // $newNames = $file_up->getName();

            if($file_up->isValid() && !$file_up->hasMoved()){
                $newName = $file_up->getName();
                $path =  'public/uploads/brocher';
                $file_up->move($path,$newName);    
                // print_r($file_up->getClientName());die();

            }
            // print_r($file_up->getClientName());die();


            $add_conference = array(

                'brochure'=>$file_up->getClientName(),

                'org_id'=> $org_id,
                'role_id'=> $role_id, 
                // 'conference_id'=>$conference_id,
                'title'=> $title_con,
                'date_from'=> $date_from,
                'date_to' =>$date_to,
                'location'=>$location_con,
                'theme'=> $theme_con,
                'intro'=> $intro_con,
                'org_msg'=> $org_msg_con,
                'created_by' =>$name
            );
            // print_r($add_conference);die();

            $model = new Conf_About(); 
            $model->save($add_conference);
            $insertedID = $model->insertID();
            $data['conference_id'] = $insertedID;
            $data['title_con'] = $title_con;
            if($insertedID){
                return json_encode(array(
                     
                     'data' => $insertedID,
                     'result'    => 1,
                     'message'     => 'New conference is added successfully '
                ));
            }
            else{
                return json_encode(array(
                     'result'    => 0,
                     'message'     => 'Something went wrong.....'
                ));
            }
        }
        else {
            return redirect()->to('Super-Admin'); 
        }
    }
    
    public function edit_conference(){
        if(session()->get('name')){
        $dr_id = session()->get('dr_id');
        $conference_id = $_GET['id'];
         
        // $conference_id = $this->request->getVar('conference_id');
         
        $model  = new Conf_About();
        // $model->set($add_conference);
        $data['values'] = $model->where('conference_id',$conference_id)->first();
       

        // $db = \Config\Database::connect();
        // $affected_rows = $db->affectedRows();


        $e_library=['z,x,y'];
        $data['conference'] = $e_library;

        $model = new OrganisationModel();
        $details  = $model->get()->getResultArray();
        $data['org'] = $details;
  
        if($data['values']){

            return view('admin/edit_conference', $data);
        }
        else{
            return 'Something went wrong...';
           
        }
    }
     else{
            return redirect()->to('Super-Admin'); 
        }
}

    public function update_conference(){
        if(session()->get('name')){

        $org_id = session()->get('org_id');
        $role_id = session()->get('role_id');

        // print_r($role_id);die();
        if($this->request->getMethod() == 'post'){

            $conference_id  = $this->request->getVar('conference_id');

            $title_con  = $this->request->getVar('title_con_e');
            $dates_con_from  = $this->request->getVar('dates_con_from_e');
            $date_from = date('Y-m-d',strtotime($dates_con_from));
            $dates_con_to  = $this->request->getVar('dates_con_to_e');
            $date_to = date('Y-m-d',strtotime($dates_con_to));

            $location_con  = $this->request->getVar('location_con_e');
            $theme_con  = $this->request->getVar('theme_con_e');
            $intro_con  = $this->request->getVar('intro_con_e');
            $org_msg_con  = $this->request->getVar('org_msg_con_e');
            $login_id = session()->get('id');


            $file_up = $this->request->getFile('file');
            // $newNames = $file_up->getName();

            if($file_up->isValid() && !$file_up->hasMoved()){
                $newName = $file_up->getName();
                $path =  'public/uploads/brocher';
                $file_up->move($path,$newName);    
                // print_r($file_up->getClientName());die();

            }
           
            $add_conference = array(    
                'brochure'=>$file_up->getClientName(),
                
                'org_id'=> $org_id,
                'role_id'=> $role_id, 
                // 'conference_id'=>$conference_id,
                'title'=> $title_con,
                'date_from'=> $date_from,
                'location' => $location_con,
                'date_to' =>$date_to,
                'theme'=> $theme_con,
                'intro'=> $intro_con,
                'org_msg'=> $org_msg_con,
                'updated_by' =>$dr_id
            );
            
            // print_r($conference_id);die();


            $model = new Conf_About(); 
            $model->set($add_conference);
            $model->where('conference_id',$conference_id);
            // $model->where('org_id',$org_id);
            // $model->where('role_id',$role_id);
            $update = $model->update();

            // print_r($update);die();
            

            if($update){
                return json_encode(array(
                     'result'    => 1,
                     'message'   => 'Conference Updated successfully....',
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


    public function get_all_users(){
        
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
                'field' => 'conference_id'
            ),
            array(
                'db'=>'title',
                'dt'=>1,
                'field' => 'title'
            ),
            array(
                'db'=>'date_from',
                'dt'=>2,
                'field' => 'date_from'
            ),
            array(
                'db'=>'location',
                'dt'=>3,
                'field' => 'location'
            ),
            array(
                'db'=>'theme',
                'dt'=>4,
                'field' => 'theme'
            ),
            array(
                'db'=>'intro',
                'dt'=>5,
                'field' => 'intro'
            ),
            array(
                'db'=>'org_msg',
                'dt'=>6,
                'field' => 'org_msg'
            ),
            array(
                'db'=>'date_to',
                'dt'=>7,
                'field' => 'date_to'
            ),
            array(
                'db'=>'id',
                'dt'=>8,
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
?>
