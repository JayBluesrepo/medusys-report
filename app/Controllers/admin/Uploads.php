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


class Uploads extends BaseController
{
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

            return view('admin/uploads', $data);

        }else{
            
            return view('admin/super-admin-login');

        }
        
    }

    public function find_sub(){

        $org_id = session()->get('org_id');
        $id = $this->request->getVar('id');

        $find_sub_cate = new CategoriesModel();
        $details = $find_sub_cate->where('field_names',$id)->where('org_id',$org_id)->findAll();

        if($details){
            return json_encode(array(
                'result'    => 1,
                'message'  =>$details
            ));
        }
        else{
            return json_encode(array(
                'result'    => 0,
                'message'     => 'No Sub Categories Found....'                
           
            ));
        }

    }

    public function find_chapter(){

        $org_id = session()->get('org_id');
        $id = $this->request->getVar('id');
        $category = $this->request->getVar('id1');
        


        $find_sub_cate = new ChapterModel();
        $details = $find_sub_cate->where('field_names',$id)->where('org_id',$org_id)->where('category',$category)->findAll();
        
        if($details){
            return json_encode(array(
                'result'    => 1,
                'message'  =>$details
            ));
        }
        else{
            return json_encode(array(
                'result'    => 0,
                'message'     => 'No Sub Categories Found....'                
           
            ));
        }

    }

    public function table_details(){
        $id = $this->request->getVar('id');
        $org_id = session()->get('org_id');
        
        $table_details = new FileUploadModel();
        $table_details->select('upload_files.*,categories.id,categories.category_name');
        $table_details->join('categories','upload_files.categories_id=categories.id');
        $table_details->where('upload_files.org_id',$org_id);
        $details1 = $table_details->where('upload_files.field_name',$id)->findAll();      
    

        $model = new FileUploadModel();
        $model->select('id');
        $model->where('org_id',$org_id);
        $details  = $model->get()->getResultArray();
        // print_r($details1);die();

        if($details1){
            return json_encode(array(
                'result'    => 1,
                'message'  =>$details1,
                'msg'=> $details
            ));
        }
        else{
            return json_encode(array(
                'result'    => 0,
                'message'     => 'No Data Found in table'                
           
            ));
        }
    }
    
    public function upload_file(){
        $org_id = session()->get('org_id');
        $created_by = session()->get('name');

        // print_r($created_by);die();
        $category_id  = $this->request->getVar('id');
       
        $file_up = $this->request->getFile('file_up');
        $list = $this->request->getVar('select_list');
        $link = $this->request->getVar('link_field');
        $key_word = $this->request->getVar('key');
        $title_name = $this->request->getVar('title_name');


        $chapter_id  = $this->request->getVar('chapter');
        $chapter_name  = $this->request->getVar('chapter_name');

        if($chapter_id == 'null')
            $chapter_id = 0;
        if($chapter_name == 'null')
            $chapter_name = 'Not - selected';


        // print_r($z);print_r($x);print_r($y);die();
        $model1 = new CategoriesModel();
        $det = $model1->where('id',$category_id)->first();
        $field_names = $det['field_names'];

        $newNames = $file_up->getName();
        // print_r($newNames);die();

        // print_r($newNames);die();
        // $models = new FileUploadModel();
        // $file = $models->where('files',$newNames)->first();
        // if($file){
        //     return json_encode(array(
        //         'result'    => 2,
        //         'message'   => 'File Already exists'
        //     ));
        // }
        
        // return $result_upload;
       
        if($list == 'Upload Files'){            
            if($file_up->isValid() && !$file_up->hasMoved()){
                $newName = $file_up->getName();
                $path =  'public/uploads';
                $file_up->move($path,$newName);
    
            //    echo 'hello';
            }
            $newData = array(
                'chapter_name'=> $chapter_name,
                'chapter_id'=> $chapter_id,
                'categories_id'=> $category_id,
                'field_name'=> $field_names,             
                'key_value'=>$key_word,
                'name'=>$title_name,
                'org_id'=>$org_id,
                'created_by'=>$created_by,
                'files' => $file_up->getClientName()
            ); 
        }else{
            
            $newData = array(
                'chapter_name'=> $chapter_name,
                'chapter_id'=> $chapter_id,
                'categories_id'=> $category_id,
                'field_name'=> $field_names,
                'link'=>$link,
                'name'=>$title_name,
                'key_value'=>$key_word,
                'org_id'=>$org_id,
                'created_by'=>$created_by,
                // 'files' => $file_up->getClientName()
            );
        }
       // print_r($_POST);
         //print_r($newData);die();
        
        $model = new FileUploadModel(); 
        $model->save($newData);
        $insertedID = $model->insertID();

        if($insertedID){
            return json_encode(array(
                'result'    => 1,
                'message'   => 'File Added successfully..'
            ));
        }
        else{
            return json_encode(array(
                'result'    => 0,
                'message'   => 'File Not Added...'
            ));
        }
    }

    public function delete_file(){
        $org_id = session()->get('org_id');
        
        $id  = $this->request->getVar('file');       

        // print_r($org_id);die();
        $delete = new FileUploadModel();        
        $delete->where('id',$id); 
        $delete->where('org_id',$org_id); 
        $deleteID = $delete->delete();
        // print_r($file);die();
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

    public function edit_file(){

        $user_id = $this->request->getVar('id');
        $file_name = $this->request->getVar('file_name');
        $model  = new CategoriesModel();
        $data = $model->where('id',$user_id)->first();

        $models  = new FileUploadModel();
        $data1 = $models->where('files',$file_name)->first();
        if(!$data1){
          $data1 = ['files'=>''];
        }
        
        if($data || $data1){
            return json_encode(array(
                  'result'    => 1,
                  'message'   => $data,
                  'msg'   =>   $data1
                ));
        }
        else{
            return json_encode(array(
                  'result'    => 0,
                  'message'   => 'Something went wrong...'
            ));
        }
    }

    public function update_disease(){
        
        if($this->request->getMethod() == 'post'){
            $id = $this->request->getVar('cid');
            // print_r($id); die();
            $file_name = $this->request->getVar('file_name1');
            // $category_name = $this->request->getVar('category_name');
            

            date_default_timezone_set('Asia/Kolkata');
            $updated_at = date('d-m-Y H:i:s', time());

            // if($uploadFile->isValid() && !$uploadFile->hasMoved()){
                // if(file_exists("uploads/".$old_file_name)){
                //     unlink("uploads/".$old_file_name);
                // }
                // $newName = $uploadFile->getName();
                // $uploadFile->move('uploads/', $newName);
            // }
            // else{
            //     $newName = $old_file_name;
            // }
            $uploadFile = $this->request->getFile('file');
            $newName = $uploadFile->getName();

            
            if($uploadFile->isValid() && !$uploadFile->hasMoved()){
                $newName = $uploadFile->getName();
                $path =  'public/uploads';
                $uploadFile->move($path,$newName);
    
            }

            $newData = array(
                'files'=> $uploadFile->getClientName(),
                'uploaded_at' => $updated_at,
                'name'=>$file_name
            );

            // $model = new CategoriesModel(); 
            // $model->set($newData);
            // $model->where('id',$id);
            // $update1 = $model->update();

            // $fileData = array(
            //     'files'=> $newName
            // );

            $model2 = new FileUploadModel();
            $model2->set($newData);
            $model2->where('id',$id);
            $update2 = $model2->update();

            if($update2){
                return json_encode(array(
                     'result'    => 1,
                     'message'   => 'Details were Updated successfully....'
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
  
    
    
}
?>
