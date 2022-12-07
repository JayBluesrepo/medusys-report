<?php namespace App\Controllers\library;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\CategoriesModel;
use App\Models\FileUploadModel;

class Guidelines extends BaseController{   
    use ResponseTrait;
	public function __construct()
	{
		helper(['form','url']);
	}
   
    public function index(){

        $dr_id = session()->get('dr_id');
        // print_r($dr_id);die();
        if($dr_id){

            $values = $_GET['id'];
            $findsub = new CategoriesModel();
            $details = $findsub->where('field_names',$values)->findAll(); 
            $data['subpart'] = $details;      


            return view('library/guidelines',$data);

        }else{
            return redirect()->route("login");
        }
        
    } 

    // public function search_details(){
    //     $field = $this->request->getVar('field');
    //     $id = $this->request->getVar('id');        
    //     // print_r($id);die();

    //     $data1= [];
    //     if($field)
    //     {
    //         $patient_Model = new CategoriesModel();
    //         $patient_Model->select('id,field_names,category_name');
    //         $patient_Model->where('field_names',$id);
    //         $patient_Model->like('category_name',$field);
    //         $data1 = $patient_Model->get()->getResultArray();
    //         // print_r($data1); die();
    //         echo json_encode($data1);
    //     }
    //     else{
    //         $model = new CategoriesModel();
    //         $model->select('id,field_names,category_name');
    //         $model->where('field_names',$id);
    //         $data2  = $model->get()->getResultArray();
    //         echo json_encode($data2);
    //     }
    // }

    public function search_details(){
        $field = $this->request->getVar('field');
        $id = $this->request->getVar('id');        
        // print_r($id);die();

        $data1= [];
        
        $patient_Model = new FileUploadModel();
        $patient_Model->select('upload_files.*,categories.category_name,categories.id,categories.fields,,categories.field_names');
        $patient_Model->join('categories','upload_files.categories_id=categories.id');
        // $patient_Model->select('id,files,categories_id');
        $patient_Model->like('upload_files.files',$field);
        $patient_Model->where('categories.field_names',$id)->orLike('categories.category_name',$field);
        $patient_Model->where('upload_files.field_name',$id)->orLike('upload_files.name',$field);
        $patient_Model->where('upload_files.field_name',$id)->orLike('upload_files.key_value',$field);
        $patient_Model->where('upload_files.field_name',$id);
        $data1 = $patient_Model->get()->getResultArray();
        // print_r($data1); die();
        echo json_encode($data1);
       
    }
  
}
?>