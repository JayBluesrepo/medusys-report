<?php namespace App\Controllers\labour;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\addPatientModel;

use App\Models\labour_FollowupModel;
use App\Models\labour_SpinalModel;
use App\Models\labour_EpiduralModel;
use App\Models\labour_FollowupCumulativeModel;
use App\Models\labour_combinedSpinalEpiduralModel;
use App\Models\labour_CSA_Model;
use App\Models\labour_PreProcedureModel;
use App\Models\labour_post_procedureModel;
use App\Models\labour_FeedbackModel;
use App\Models\labour_EFeedbackModel;
use App\Models\labour_e_consentModel;

class followUp extends BaseController
{   
    use ResponseTrait;
	public function __construct()
	{
		helper(['form','url']);
	}

    public function index()
    {   
        $dr_id = session()->get('dr_id');
        $id = session()->get('id');        
        $patient_id = session()->get('id');
        // if($dr_id){        
            $calc=[];
            $model = new addPatientModel();
            $model->where('dr_id',$dr_id);
            $model->orderBy('id','DESC');
            $details  = $model->get()->getResultArray();
            $data['patient'] = $details;
            $det = $model->where('id',$patient_id)->first();
            $data['focus'] = $det;
            
            $patient_Model = new addPatientModel();
            $patient_Model->orderBy('id','DESC');
            $patient_Model->where('dr_id',$dr_id);  
            $patient_Model->select('id, rad_id');
            $patient_Model->like('upload_patient_status_labour',1);
            $dat1 = $patient_Model->get()->getResultArray();
            // if($dat1){
                $data['old_check'] = $dat1;
            // }
            
            $epiModel = new labour_EpiduralModel();
            $data1  = $epiModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();

            $spinModel = new labour_SpinalModel();
            $data2  = $spinModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();

            $epiModel1 = new labour_CSA_Model();
            $data3  = $epiModel1->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            $epiModel2 = new labour_combinedSpinalEpiduralModel();
            $data4  = $epiModel2->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            
            $model4 = new labour_PreProcedureModel();
            $detail1 = $model4->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['preo'] = $detail1;

            // print_r($detail1);die();
            
            if($data1 || $data2 || $data3 || $data4){
                $bms=['p,q,r'];
                $data['foll'] = $bms;
                
                $model1 = new labour_FollowupModel(); 
                $detail = $model1->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
                $data['info'] = $detail;
                $follow_id = $detail['id'];

                $model2 = new labour_FollowupCumulativeModel();
                $model2->where('dr_id',$dr_id)->where('patient_id',$patient_id);
                $data3 = $model2->where('followup_id',$follow_id)->findAll();
                $data['info1'] = $data3;

                $model4 = new labour_PreProcedureModel();
                $detail1 = $model4->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
                $data['preo'] = $detail1;

                $model5 = new labour_post_procedureModel();
                $detail2 = $model5->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
                $data['posto'] = $detail2;

                $model3 = new labour_FollowupModel();
                $detail3 = $model3->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
                $data['follo'] = $detail3;

                $epiModel = new labour_EpiduralModel();
                $data6  = $epiModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

                $spinModel = new labour_SpinalModel();
                $data7  = $spinModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

                $cseModel = new labour_combinedSpinalEpiduralModel();
                $data8  = $cseModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

                $csaModel = new labour_CSA_Model();
                $data9  = $csaModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

                if($data6 || $data7 || $data8 || $data9){
                    $sin=['1,12,23'];
                    $data['proccheck'] = $sin;
                }

                $Model = new labour_EFeedbackModel();
                $data13  = $Model->where('dr_id',$dr_id)->where('patient_id',$patient_id)->where('submission',1)->first();

                $Models = new labour_FeedbackModel();
                $data14  = $Models->where('dr_id',$dr_id)->where('patient_id',$patient_id)->where('flag',1)->first();
                
                if($data13 || $data14){
                    $sins=['1,5,10'];
                    $data['feedcheck'] = $sins;
                }

                $models = new labour_e_consentModel(); 
                $data12 = $models->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
                $data['ecocheck'] = $data12;

                foreach($details as $key=>$val){
                    $id = ($val['id']);
                    $data5  = $cseModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data6  = $epiModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data7  = $spinModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data8  = $csaModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    if($data5 || $data6 || $data7 || $data8){
                        $data9 = ['a','b','c'];
                    }
                    $data10  = $Models->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data11  = $Model->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    if($data10 || $data11){
                        $data12 = ['A','B','C'];
                    }
                    $data1  = $models->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data2  = $model1->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data3  = $model2->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data4  = $model3->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    if($data1 && $data2 && $data3 && $data4 && $data9 && $data12){
                        $datas['id'] = $id;
                        array_push($calc,$datas);
                    }
                }
                $data['allcheck'] = $calc;

                if(!empty($detail)){
                    $cot=['10,11,12'];
                    $data['follcheck'] = $cot;
                    return view('labour/followup_details',$data);
                }else{
                    return view('labour/follow_up',$data);
                }
            // }else{
            //     return view('login');
            // }
        }
        else{

            // if($dr_id){                 
               
               
                $model1 = new labour_FollowupModel(); 
                $detail = $model1->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
                $data['info'] = $detail;
                $follow_id = $detail['id'];

                $model2 = new labour_FollowupCumulativeModel();
                $model2->where('dr_id',$dr_id)->where('patient_id',$patient_id);
                $data3 = $model2->where('followup_id',$follow_id)->findAll();
                $data['info1'] = $data3;
            
                $model1 = new labour_PreProcedureModel();
                $detail1 = $model1->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
                $data['preo'] = $detail1;

                $model2 = new labour_post_procedureModel();
                $detail2 = $model2->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
                $data['posto'] = $detail2;

                $model3 = new labour_FollowupModel();
                $detail3 = $model3->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
                $data['follo'] = $detail3;

                $epiModel = new labour_EpiduralModel();
                $data6  = $epiModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
                $data['epid'] = $data6;

                $spinModel = new labour_SpinalModel();
                $data7  = $spinModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
                $data['spin'] = $data7;

                $cseModel = new labour_combinedSpinalEpiduralModel();
                $data8  = $cseModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
                $data['cse'] = $data8;

                $csaModel = new labour_CSA_Model();
                $data9  = $csaModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
                $data['csa'] = $data9;

                if($data6 || $data7 || $data8 || $data9){
                    $sin=['1,12,23'];
                    $data['proccheck'] = $sin;
                }
                $Model = new labour_EFeedbackModel();
                $data13  = $Model->where('dr_id',$dr_id)->where('patient_id',$patient_id)->where('submission',1)->first();

                $Models = new labour_FeedbackModel();
                $data14  = $Models->where('dr_id',$dr_id)->where('patient_id',$patient_id)->where('flag',1)->first();
                
                if($data13 || $data14){
                    $sins=['1,5,10'];
                    $data['feedcheck'] = $sins;
                }
                $models = new labour_e_consentModel(); 
                $data12 = $models->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
                $data['ecocheck'] = $data12;
                
                foreach($details as $key=>$val){
                    $id = ($val['id']);
                    $data5  = $cseModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data6  = $epiModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data7  = $spinModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data8  = $csaModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    if($data5 || $data6 || $data7 || $data8){
                        $data9 = ['a','b','c'];
                    }
                    $data10  = $Models->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data11  = $Model->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    if($data10 || $data11){
                        $data12 = ['A','B','C'];
                    }
                    $data1  = $models->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data2  = $model1->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data3  = $model2->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data4  = $model3->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    if($data1 && $data2 && $data3 && $data4 && $data9 && $data12){
                        $datas['id'] = $id;
                        array_push($calc,$datas);
                    }
                }
                $data['allcheck'] = $calc;
                

                if($detail1['cnb'] == 'No'){

                    $bms=['p,q,r'];
                    $data['foll'] = $bms;


                    if(!empty($detail)){
                        $cot=['10,11,12'];
                        $data['follcheck'] = $cot;
                        return view('labour/followup_details',$data);
                    }else{
                        return view('labour/follow_up',$data);
                    }

                }else{
                    echo "<script>alert('Please add procedure details to add follow up details');</script>";

                    $dmf=['j,k,l'];
                    $data['procs'] = $dmf; 

                    return view('labour/proc',$data);
                }

            // }else{
            //     return view('login');
            // }
        }
    }   
    public function add_follow(){
        $patient_id = session()->get('id');
        $duration = $this->request->getVar('duration');
        $postdural_puncture = $this->request->getVar('postdural_puncture');
        $backache_epidural = $this->request->getVar('backache_epidural');
        $perst_motor = $this->request->getVar('perst_motor'); 
        $perst_sensory = $this->request->getVar('perst_sensory');
        $asep_meningi = $this->request->getVar('asep_meningi');
        $bacterial_meningi = $this->request->getVar('bacterial_meningi');
        $epidural_abs = $this->request->getVar('epidural_abs');
        $perm_neuro_compli = $this->request->getVar('perm_neuro_compli');
        $catheter = $this->request->getVar('catheter');
        $epidural_haema = $this->request->getVar('epidural_haema');
        $others = $this->request->getVar('others');
        $other1 = $this->request->getVar('other[]');
        $other = implode($other1, ",");
        $followup_proc = $this->request->getVar('optradio');
        $days = $this->request->getVar('days[]');
        $la_ropivacaine = $this->request->getVar('la_ropivacaine[]');
        $la_bupivacaine = $this->request->getVar('la_bupivacaine[]');
        $la_levobupivacaine = $this->request->getVar('la_levobupivacaine[]');
        $la_lignocaine = $this->request->getVar('la_lignocaine[]');
        $drname = session()->get('name');
        $dr_id = session()->get('dr_id');

        $followData = array(
            'patient_id'=>$patient_id,
            'duration'=>$duration,
            'postdural_puncture'=> $postdural_puncture,
            'backache_epidural'=> $backache_epidural,
            'perst_motor'=> $perst_motor, 
            'perst_sensory'=>$perst_sensory,
            'asep_meningi'=>$asep_meningi,
            'bacterial_meningi'=> $bacterial_meningi,
            'epidural_abs'=> $epidural_abs,
            'perm_neuro_compli'=> $perm_neuro_compli,
            'catheter' => $catheter,
            'epidural_haema'=> $epidural_haema,
            'others'=> $others,          
            'other'=> $other, 
            'followup_proc'=> $followup_proc,
            'dr_id'=>$dr_id,
            'created_by'=>$drname
        );
        $followModel = new labour_FollowupModel(); 
        $followModel->save($followData);        
        $insertedID = $followModel->insertID();

        for($i=0; $i<count($days); $i++){
            
            $newadd = [
                'patient_id'=>$patient_id, 
                'followup_id'=>$insertedID,
                'days'=>$days[$i],
                'la_ropivacaine'=>$la_ropivacaine[$i],
                'la_bupivacaine'=>$la_bupivacaine[$i],
                'la_levobupivacaine'=>$la_levobupivacaine[$i],
                'la_lignocaine'=>$la_lignocaine[$i],
                'dr_id'=>$dr_id,
                'created_by'=>$drname
            ];

            $addModel = new labour_FollowupCumulativeModel();
            $addModel->save($newadd);
            $addID = $addModel->insertID();
        };    

        if(($insertedID) && ($addID)){
            $model = new addPatientModel();
            $models = new labour_e_consentModel(); 
            $model1 = new labour_PreProcedureModel();
            $cseModel = new labour_combinedSpinalEpiduralModel();
            $epiModel = new labour_EpiduralModel();
            $spinModel = new labour_SpinalModel();
            $csaModel = new labour_CSA_Model();
            $model2 = new labour_post_procedureModel();
            $model3 = new labour_FollowupModel();
            $models3 = new labour_FollowupCumulativeModel();
            $data = array(
                'upload_patient_status' => 1
            );
            $data_labour = array(
                'upload_patient_status_labour' => 1
            );
            $model->set($data_labour);
            $model->where('dr_id',$dr_id)->where('id', $patient_id);
            $insertID1 = $model->update();
            $models->set($data);
            $models->where('dr_id',$dr_id)->where('patient_id', $patient_id);
            $insertID2 = $models->update();
            $model1->set($data);
            $model1->where('dr_id',$dr_id)->where('patient_id', $patient_id);
            $insertID3 = $model1->update();
            $cseModel->set($data);
            $cseModel->where('dr_id',$dr_id)->where('patient_id', $patient_id);
            $insertID4 = $cseModel->update();
            $epiModel->set($data);
            $epiModel->where('dr_id',$dr_id)->where('patient_id', $patient_id);
            $insertID5 = $epiModel->update();
            $spinModel->set($data);
            $spinModel->where('dr_id',$dr_id)->where('patient_id', $patient_id);
            $insertID6 = $spinModel->update();
            $csaModel->set($data);
            $csaModel->where('dr_id',$dr_id)->where('patient_id', $patient_id);
            $insertID7 = $csaModel->update();
            $model2->set($data);
            $model2->where('dr_id',$dr_id)->where('patient_id', $patient_id);
            $insertID8 = $model2->update();
            $model3->set($data);
            $model3->where('dr_id',$dr_id)->where('patient_id', $patient_id);
            $insertID9 = $model3->update();
            $models3->set($data);
            $models3->where('dr_id',$dr_id)->where('patient_id', $patient_id);
            $insertID10 = $models3->update();
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Followup data Added Successfully.....',
                'msg' => $insertedID
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
?>

