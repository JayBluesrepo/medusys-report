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
// use App\Models\FacultyModel;
use App\Models\CertificateModel;

class Certificateupload extends  BaseController
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
        $data['certificate'] = $e_library;

        $model = new OrganisationModel();
        $details  = $model->get()->getResultArray();
        $data['org'] = $details;

        $model3 = new Conf_About();
        $model3->where('conference_id',$conference_id);
        $model3->select('title');
        $details7  = $model3->get()->getResultArray();

        $model3 = new CertificateModel(); 
        $model3->where('conference_id',$conference_id);
        $model3->select('*'); 
        $speaker  = $model3->get()->getResultArray();

        $data['title_con'] = $details7;
        $data['conference_id'] = $conference_id;
      

        return view('admin/certificateupload', $data);
    }
}

    public function certificateupload(){
        // print_r('hii');die();
        if(session()->get('name')){
        $org_id = session()->get('org_id');
        $role_id = session()->get('role_id');
        $name = session()->get('dr_id');

        $id = $this->request->getVar('id');
        $conferene_id = $this->request->getVar('conferene_id');
        // $ps_id = $this->request->getVar('ps_id');        
        // $logo1 =$this->request->getVar('logo1');
        // $logo2 = $this->request->getVar('logo2');
        // $logo3 = $this->request->getVar('logo3');
        $accredited_by = $this->request->getVar('accredited_by');
        
        $sign1 = $this->request->getVar('sign1');
       
        $sign2 = $this->request->getVar('sign2');

        $profile1 = $this->request->getFile('logo1');
        $profile2 = $this->request->getFile('logo2');
        $profile3 = $this->request->getFile('logo3');

        $signature_img1 = $this->request->getFile('signature1');
        $signature_img2 = $this->request->getFile('signature2');

        $logo1 = '';
        $logo2 = '';
        $logo3 = '';
        $signature1 = '';
        $signature2 = '';
        if($profile1->isValid() && !$profile1->hasMoved()){
            $logo1 = $profile1->getName();
            $profile1->move('images/certificate/', $logo1);
        }
    
        if($profile2->isValid() && !$profile2->hasMoved()){
            $logo2 = $profile2->getName();
            $profile2->move('images/certificate/', $logo2);
        }

        if($profile3->isValid() && !$profile3->hasMoved()){
            $logo3 = $profile3->getName();
            $profile3->move('images/certificate/', $logo3);
        }

        if($signature_img1->isValid() && !$signature_img1->hasMoved()){
            $signature1 = $signature_img1->getName();
            $signature_img1->move('images/certificate/', $signature1);
        }

        if($signature_img2->isValid() && !$signature_img2->hasMoved()){
            $signature2 = $signature_img2->getName();
            $signature_img2->move('images/certificate/', $signature2);
        }
        

        
        $login_id = session()->get('id');
      
        // print_r($conferene_id);die();
        $certificate_con = array(
            // 'org_id'=> $org_id,
            // 'role_id'=> $role_id, 
            'conference_id'=>$conferene_id,

            'id' => $id,
            'logo1' => $logo1,
            'logo2'=> $logo2,
            'logo3'=> $logo3, 
            'accredited_by'=>$accredited_by,
            'signature1' => $signature1,
            'sign1'=> $sign1,
            'signature2' => $signature2,
            'sign2'=> $sign2,
            'created_by' =>$name 
            
        );


        $model = new CertificateModel(); 
        $model->save($certificate_con);
        $insertedID = $model->insertID();

        // die();
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
    public function edit_certificate(){
        if(session()->get('name')){

        $dr_id = session()->get('dr_id');    
        $conference_id = $_GET['id'];
         
        if($dr_id) {
          
       
        $model3 = new Conf_About();
        $model3->where('conference_id',$conference_id);
        $model3->select('title');
        $details7  = $model3->get()->getResultArray();

        $data['title_con_e'] = $details7;
        $data['conference_id'] = $conference_id;

        $e_library=['z,x,y'];
        $data['certificate'] = $e_library;

        $model = new OrganisationModel();
        $details  = $model->get()->getResultArray();
        $data['org'] = $details;

        $model  = new CertificateModel();
        $model->where('conference_id',$conference_id);
        $details11  = $model->get()->getResultArray();
        $data['certifi'] = $details11;  
                
        $data['dr_id'] =  $dr_id; 
        return view('admin/certificateedit', $data);
        }
        else{
            return view('login');
        }
    }
     else{
            return redirect()->to('Super-Admin'); 
        }
}

    public function update_certificate(){

        if(session()->get('name')){

        $org_id = session()->get('org_id');
        $role_id = session()->get('role_id');

        // print_r($role_id);die();
        if($this->request->getMethod() == 'post'){

        $id = $this->request->getVar('id');
        $conferene_id = $this->request->getVar('con_id');


        $accredited_by = $this->request->getVar('accredited_by_e');
        $sign1 = $this->request->getVar('sign1_e');       
        $sign2 = $this->request->getVar('sign2_e');

        $profile1 = $this->request->getFile('logo1_e');
        $profile2 = $this->request->getFile('logo2_e');
        $profile3 = $this->request->getFile('logo3_e');

        $signature_img1 = $this->request->getFile('signature1_e');
        $signature_img2 = $this->request->getFile('signature2_e');

        $logo1 = '';
        $logo2 = '';
        $logo3 = '';
        $signature1 = '';
        $signature2 = '';

        if($profile1->isValid() && !$profile1->hasMoved()){
            $logo1 = $profile1->getName();
            $profile1->move('images/certificate/', $logo1);
            $certificate_con1 = array(
                'logo1' => $logo1
                
            );

            $model = new CertificateModel(); 
            $model->set($certificate_con1);
            $model->where('id',$id);
            $update = $model->update();

        }

        if($profile2->isValid() && !$profile2->hasMoved()){
            $logo2 = $profile2->getName();
            $profile2->move('images/certificate/', $logo2);

            $certificate_con2 = array(
                'logo2' => $logo2
                
            );

            $model = new CertificateModel(); 
            $model->set($certificate_con2);
            $model->where('id',$id);
            $update = $model->update();

        }

        if($profile3->isValid() && !$profile3->hasMoved()){
            $logo3 = $profile3->getName();
            $profile3->move('images/certificate/', $logo3);

            $certificate_con = array(
                'logo3' => $logo3
                
            );

            $model = new CertificateModel(); 
            $model->set($certificate_con);
            $model->where('id',$id);
            $update = $model->update();

        }
 
        if($signature_img1->isValid() && !$signature_img1->hasMoved()){
            $signature1 = $signature_img1->getName();
            $signature_img1->move('images/certificate/', $signature1);

            $certificate_con = array(
                'signature1' => $signature1
                
            );

            $model = new CertificateModel(); 
            $model->set($certificate_con);
            $model->where('id',$id);
            $update = $model->update();
        }

        if($signature_img2->isValid() && !$signature_img2->hasMoved()){
            $signature2 = $signature_img2->getName();
            $signature_img2->move('images/certificate/', $signature2);

            $certificate_con = array(
                'signature2' => $signature2
                
            );

            $model = new CertificateModel(); 
            $model->set($certificate_con);
            $model->where('id',$id);
            $update = $model->update();
        }
        

        
        $dr_id = session()->get('dr_id');   
      
       
        $certificate_con5 = array( 
            'accredited_by'=>$accredited_by,
            'sign1'=> $sign1,
            'sign2'=> $sign2,
	    'conference_id' => $conferene_id,
            'uploaded_by' =>$dr_id 
            
        );


            $model = new CertificateModel(); 
            $model->set($certificate_con5);
            $model->where('id',$id);
            $update = $model->update();


            if($update){
                return json_encode(array(
                     'result'    => 1,
                     'message'   => 'Updated successfully....',
                     'data'=>$conferene_id
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

    public function del_certificate(){
        if(session()->get('name')){

        $dr_id = session()->get('dr_id');    
        $conference_id = $_GET['id'];
         
        if($dr_id) {
          
       
        $model3 = new Conf_About();
        $model3->where('conference_id',$conference_id);
        $model3->select('title');
        $details7  = $model3->get()->getResultArray();

        $data['title_con_e'] = $details7;
        $data['conference_id'] = $conference_id;

        $e_library=['z,x,y'];
        $data['certificate'] = $e_library;

        $model = new OrganisationModel();
        $details  = $model->get()->getResultArray();
        $data['org'] = $details;

        $model  = new CertificateModel();
        $model->where('conference_id',$conference_id);
        $details11  = $model->get()->getResultArray();
        $data['certifi'] = $details11;  
                
        $data['dr_id'] =  $dr_id; 
        return view('admin/certificateedit', $data);
        }
        else{
            return view('login');
        }
    }
     else{
            return redirect()->to('Super-Admin'); 
        }
}

    public function delete_certificate(){

        if(session()->get('name')){

        $org_id = session()->get('org_id');
        $role_id = session()->get('role_id');

        // print_r($role_id);die();
        if($this->request->getMethod() == 'post'){

        $id = $this->request->getVar('id');
        $conferene_id = $this->request->getVar('con_id');

        $logo = $this->request->getVar('col_name');

        

        
        $dr_id = session()->get('dr_id');   
      
        // print_r($conferene_id);die();
        $certificate_con = array( 
            $logo => '',
                     
        );

            $model = new CertificateModel(); 
            $model->set($certificate_con);
            $model->where('id',$id);
            $delete = $model->update();
 

            if($delete){
                return json_encode(array(
                     'result'    => 1,
                     'message'   => 'Updated successfully....',
                     'data'=>$conferene_id
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
        $id = session()->get('id');

        // print_r($org_id);die();

        $dbDetails = array(
            "host"=>$this->db->hostname,
            "user"=>$this->db->username,
            "pass"=>$this->db->password,
            "db"=>$this->db->database,
            "port"=>$this->db->port
        );
        
        $table = "conf_certificate";
        $primaryKey = "id";

        $columns = array(
            array(
                'db'=>'conference_id',
                'dt'=>0,
                'field'=>'conference_id',
            ),
            array(
                'db'=>'ps_id',
                'dt'=>1,
                'field' => 'ps_id'
            ),
            array(
                'db'=>'id',
                'dt'=>2,
                'field' => 'id'
            ),
            array(
                'db'=>'logo1',
                'dt'=>3,
                'field'=>'logo1',
            ),
            array(
                'db'=>'logo2',
                'dt'=>4,
                'field' => 'logo2'
            ),
            array(
                'db'=>'logo3',
                'dt'=>5,
                'field' => 'logo3'
            ),
            array(
                'db'=>'accredited_by',
                'dt'=>6,
                'field'=>'accredited_by',
            ),
            array(
                'db'=>'signature1',
                'dt'=>7,
                'field' => 'signature1'
            ),
            array(
                'db'=>'sign1',
                'dt'=>8,
                'field' => 'sign1'
            ),
            array(
                'db'=>'signature2',
                'dt'=>9,
                'field' => 'signature2'
            ),
            array(
                'db'=>'sign2',
                'dt'=>10,
                'field' => 'sign2'
            ),
            array(
                'db'=>'id',
                'dt'=>11,
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
