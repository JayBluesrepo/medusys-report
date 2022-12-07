<?php namespace App\Controllers\library;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\CategoriesModel;
use App\Models\FileUploadModel;
use App\Models\E_LibrarySectionModel;


class E_Library extends BaseController
{   
    use ResponseTrait;
	public function __construct()
	{
		helper(['form','url']);
	}
   
    public function index(){

        $dr_id = session()->get('dr_id');

        $section = new E_LibrarySectionModel();
        $details = $section->findAll();
        $data['section'] = $details;

        // print_r($details);die();

        if($dr_id){
            return view('library/e-library',$data);
        }else{
            return redirect()->route("login");
        }

    } 

    public function find_sub_categories(){
        $id = $this->request->getVar('id');

        // print_r($id);die();
        $findsub = new CategoriesModel();
        $details = $findsub->where('field_names',$id)->findAll(); 
        // $data['subpart'] = $details;  

        // print_r($details);die();

        if(!empty($details)){
            return json_encode(array(
                'result'    => 1,
            ));
        }
        else{
            return json_encode(array(
                'result'    => 0,
                'message'     => 'No Sub Categories Found'                
           
            ));
        }

    }

    public function search_all_details(){

        $field = $this->request->getVar('field_input');
        // print_r($field);die();

        $data1= [];
        // if($field)
        // {
            $patient_Model = new FileUploadModel();
            $patient_Model->select('upload_files.*,categories.category_name,categories.id,categories.fields');
            $patient_Model->join('categories','upload_files.categories_id=categories.id');
            // $patient_Model->select('id,files,categories_id');
            // $patient_Model->where('categories_id',$id);
            $patient_Model->like('upload_files.files',$field);
            $patient_Model->orLike('upload_files.name',$field);
            $patient_Model->orLike('upload_files.key_value',$field);
            // $patient_Model->group_end();
            
            $data1 = $patient_Model->get()->getResultArray();

            // print_r($data1); die();

            echo json_encode($data1);
        // }
        // else{
        //     print_r($field); die();

        //     $model = new FileUploadModel();
        //     // $model->select('id,files,categories_id,');
        //     // $model->where('categories_id',$id);
        //     $data2  = $model->get()->getResultArray();
        //     print_r('data2');
        //     print_r($data2); die();

        //     echo json_encode($data2);
        // }
    }

   
}
?>