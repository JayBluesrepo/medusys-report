<?php 
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\CategoriesModel;
use App\Models\FileUploadModel;
use App\Models\E_LibrarySectionModel;
use App\Models\OrganisationModel;
use App\Models\ChapterModel;



class Chapters extends BaseController
{
    public function __construct()
	{
		require_once APPPATH.'ThirdParty/ssp.class.php';
        $this->db = db_connect();
	}

    public function index(){
        $org_id = session()->get('org_id');
        if($org_id){

            $e_library=['a,b,c'];
            $data['e_library'] = $e_library;

            $section = new E_LibrarySectionModel();
            $section->where('org_id',$org_id);
            $details = $section->findAll();
            $data['section'] = $details;

            $model = new OrganisationModel();        
            $details  = $model->get()->getResultArray();
            $data['org'] = $details;

            return view('admin/chapters_v', $data);

        }else{
            return view('admin/super-admin-login');
        }
        
    }

    public function save_chapter(){
        $org_id = session()->get('org_id');

        $field_name = $this->request->getVar('field_name');
        $fields = $this->request->getVar('fields');
        $fields1 = $this->request->getVar('field1');
        $category = $this->request->getVar('category');
        $chapter = $this->request->getVar('chapter');
        
        $categoryData = array(
            'field_names'=> $field_name,
            'fields'=> $fields,
            'category_name'=> $fields1,
            'category'=> $category,
            'chapter_name'=> $chapter,
            'org_id'=> $org_id
        );

        $model = new ChapterModel(); 
        $model->save($categoryData);
        $insertedID = $model->insertID(); 

        if($insertedID){
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Chapter data added Successfully.....'
            ));
        }
        else{
            return json_encode(array(
                'result'    => 0,
                'message'     => 'Something went wrong.....'
            ));
        }
    }

    public function remove_chapter(){
        $org_id = session()->get('org_id');

        $id  = $this->request->getVar('id');
        // $file = $this->request->getVar('file_name');
   
        $delete = new ChapterModel();        
        $delete->where('id',$id); 
        $delete->where('org_id',$org_id);
        $deleteID = $delete->delete();
        

        
        if($deleteID){
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Deleted Successfully'
            ));
        }
        else{
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Error'
            ));
        }
    }

    public function edit_chapter(){
        $org_id = session()->get('org_id');

        $user_id = $this->request->getVar('id');
        //$file_name = $this->request->getVar('file_name');
        $model  = new ChapterModel();
        $model->where('org_id',$org_id);
        $data = $model->where('id',$user_id)->first();

        // $models  = new FileUploadModel();
        // $data1 = $models->where('files',$file_name)->first();
        // if(!$data1){
        //   $data1 = ['files'=>''];
        // }
        
        if($data){
            return json_encode(array(
                  'result'    => 1,
                  'message'   => $data
                ));
        }
        else{
            return json_encode(array(
                  'result'    => 0,
                  'message'   => 'Something went wrong...'
            ));
        }
    }

    public function update_chapter_data(){

        $org_id = session()->get('org_id');

        if($this->request->getMethod() == 'post'){
            $id = $this->request->getVar('cid');
            $field_names = $this->request->getVar('field_names');
            $fields = $this->request->getVar('fields');
            $category = $this->request->getVar('category');
            $chapter = $this->request->getVar('chapter');
            

            $newData = array(
                'field_names'=> $field_names,
                'fields'=> $fields, 
                'category_name'=> $category,
                'chapter_name'=>$chapter
            );

            $model = new ChapterModel(); 
            $model->set($newData);
            $model->where('id',$id);
            $model->where('org_id',$org_id);
            $update1 = $model->update();

            // $fileData = array(
            //     'files'=> $newName
            // );

            // $model2 = new FileUploadModel();
            // $model2->set($fileData);
            // $model2->where('categories_id',$id);
            // $update2 = $model2->update();

            if($update1){
                return json_encode(array(
                     'result'    => 1,
                     'message'   => 'Chapter Details were Updated successfully....'
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

    public function get_all_chapters(){

        $org_id = session()->get('org_id');
        $cat = $this->request->getVar('cat');
        // print_r($org_id); die();
        $dbDetails = array(
            "host"=>$this->db->hostname,
            "user"=>$this->db->username,
            "pass"=>$this->db->password,
            "db"=>$this->db->database,
            "port"=>$this->db->port
        );

        $table = "chapter";
        $primaryKey = "id";

        $columns = array(
            array(
                "db"=>"id",
                "dt"=>0,
            ),
            // array(
            //     "db"=>"field_names",
            //     "dt"=>1,
            // ),
            array(
                "db"=>"fields",
                "dt"=>1,
            ),
            array(
                "db"=>"category_name",
                "dt"=>2,
            ),
            array(
                "db"=>"chapter_name",
                "dt"=>3,
            ),
            array(
                "db"=>"id",
                "dt"=>4,
                "formatter"=>function($d, $row){
                    return "<div class='btn-group'>
                                  <button type='button' class='btn btn-sm btn-primary' data-id='".$row['id']."' id='updateCountryBtn'>Update</button>
                                  <button type='button' class='btn btn-sm btn-danger' data-id='".$row['id']."' id='deleteCountryBtn'>Delete</button>
                             </div>";
                }
            ),
        );
        
        echo json_encode(
            \SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, null, "field_names='$cat' AND org_id='$org_id'")
        );
    }
}
?>
