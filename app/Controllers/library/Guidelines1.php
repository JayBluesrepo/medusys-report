<?php namespace App\Controllers\library;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\FileUploadModel;
use App\Models\CategoriesModel;


class Guidelines1 extends BaseController
{   
    use ResponseTrait;
	public function __construct()
	{
		helper(['form','url']);
	}
   
    public function index()
    {
        $values = $_GET['id'];
        $dr_id = session()->get('dr_id');


        $findsub = new FileUploadModel();
        $details = $findsub->where('categories_id',$values)->findAll(); 
        $data['subpart'] = $details;   

        $subcatename = new CategoriesModel();
        $details1 = $subcatename->select('fields,category_name')->where('id',$values)->first();
        $data['category_name'] = $details1;

        // print_r($details1);die();
        if($dr_id){
            return view('library/guidelines-1',$data);
        }else{
            return redirect()->route("login");
        }

    } 
    public function show_files(){
        $z = $this->request->uri->getSegment(4);
        $dr_id = session()->get('dr_id');

        if($dr_id){
            return view('library/show_files_v'); 
        }else{
            return redirect()->route("login");
        }
    }
    public function find_details(){

        $values = $this->request->getVar('id');   


        $findsub = new FileUploadModel();
        $details = $findsub->where('categories_id',$values)->findAll(); 
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
                'message'     => 'No Files Found'                
           
            ));
        }

    }

    public function search_sub_details(){
        $field = $this->request->getVar('filed_input');
        $id = $this->request->getVar('id');   

        // print_r($id);die();
        $data1= [];
        // if($field)
        // {
            $patient_Model = new FileUploadModel();
            // $patient_Model->select('id,files,categories_id');
            $patient_Model->like('files',$field);
            $patient_Model->where('categories_id',$id)->orLike('name',$field);
            $patient_Model->where('categories_id',$id)->orLike('key_value',$field);
            $patient_Model->where('categories_id',$id);
            $data1 = $patient_Model->get()->getResultArray();

            // print_r($data1); die();

            echo json_encode($data1);
        // }
        // else{
        //     $model = new FileUploadModel();
        //     // $model->select('id,files,categories_id,');
        //     $model->where('categories_id',$id);
        //     $data2  = $model->get()->getResultArray();
        //     echo json_encode($data2);
        // }
    }
  
}
?>