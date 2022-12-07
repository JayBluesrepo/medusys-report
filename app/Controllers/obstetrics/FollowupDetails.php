<?php
namespace App\Controllers\obstetrics;
use App\Controllers\BaseController;
use App\Models\addPatientModel;

use App\Models\obstetrics_followupModel;
use App\Models\obstetrics_FollowupCumulativeModel;
use App\Models\obstetrics_PostopModel;
use App\Models\obstetrics_EpiduralModel;
use App\Models\obstetrics_SpinalModel;
use App\Models\obstetrics_combinedSpinalEpiduralModel;
use App\Models\obstetrics_CSA_Model;
use App\Models\obstetrics_PreopModel;
use App\Models\FeedbackModel;
use App\Models\EFeedbackModel;
use App\Models\obstetrics_e_consentModel;

class FollowupDetails extends BaseController
{
    public function index()
    {
        $dr_id = session()->get('dr_id');
        $patient_id = session()->get('id');
        
        // if($dr_id){
            $follow_id = $this->request->getVar('id');        
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
            $patient_Model->like('upload_patient_status',1);
            $dat1 = $patient_Model->get()->getResultArray();
            // if($dat1){
                $data['old_check'] = $dat1;
            // }
            
            $model1 = new obstetrics_followupModel(); 
            $detail = $model1->where('dr_id',$dr_id)->where('id',$follow_id)->first();
            $data['info'] = $detail;

            $model2 = new obstetrics_FollowupCumulativeModel();
            $model2->where('dr_id',$dr_id)->where('patient_id',$patient_id);
            $data1 = $model2->where('followup_id',$follow_id)->findAll();
            $data['info1'] = $data1;

            $bms=['p,q,r'];
            $data['foll'] = $bms;

            $cot=['10,11,12'];
            $data['follcheck'] = $cot;

            $model4 = new obstetrics_PreopModel();
            $detail1 = $model4->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['preo'] = $detail1;

            $model5 = new obstetrics_PostopModel();
            $detail2 = $model5->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['posto'] = $detail2;

            $model3 = new obstetrics_followupModel();
            $detail3 = $model3->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['follo'] = $detail3;

            $epiModel = new obstetrics_EpiduralModel();
            $data6  = $epiModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            $spinModel = new obstetrics_SpinalModel();
            $data7  = $spinModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            $cseModel = new obstetrics_combinedSpinalEpiduralModel();
            $data8  = $cseModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            $csaModel = new obstetrics_CSA_Model();
            $data9  = $csaModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            if($data6 || $data7 || $data8 || $data9){
                $sin=['1,12,23'];
                $data['proccheck'] = $sin;
            }
            $Model = new EFeedbackModel();
            $data1  = $Model->where('dr_id',$dr_id)->where('patient_id',$patient_id)->where('submission',1)->first();

            $Models = new FeedbackModel();
            $data4  = $Models->where('dr_id',$dr_id)->where('patient_id',$patient_id)->where('flag',1)->first();
            
            if($data1 || $data4){
                $sins=['1,5,10'];
                $data['feedcheck'] = $sins;
            }
            $models = new obstetrics_e_consentModel(); 
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
                $data2  = $model4->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                $data3  = $model5->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                $data4  = $model3->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                if($data1 && $data2 && $data3 && $data4 && $data9 && $data12){
                    $datas['id'] = $id;
                    array_push($calc,$datas);
                }
            }
            $data['allcheck'] = $calc;

            return view('obstetrics/followup_details',$data);
        // }else{
        //     return view('login');
        // }
    }
    public function edit_followup(){
        $id = $this->request->getVar('id');
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
        if($other1){
            $other = implode($other1, ",");
        }
        $followup_proc = $this->request->getVar('optradio');
        $days = $this->request->getVar('days[]');
        $la_ropivacaine = $this->request->getVar('la_ropivacaine[]');
        $la_bupivacaine = $this->request->getVar('la_bupivacaine[]');
        $la_levobupivacaine = $this->request->getVar('la_levobupivacaine[]');
        $la_lignocaine = $this->request->getVar('la_lignocaine[]');
        
        date_default_timezone_set('Asia/Kolkata');
        $updated_at = date('d-m-Y H:i:s', time());

        $drname = session()->get('name');
        $dr_id = session()->get('dr_id');

        $delete = new obstetrics_FollowupCumulativeModel();        
        $delete->where('patient_id',$patient_id);
        $delete->where('dr_id',$dr_id);
        $delete->where('followup_id',$id);
        $deleteID = $delete->delete();

        $followupData = array(
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
            'updated_at'=>$updated_at,
            'updated_by'=>$drname,
            'upload_patient_status' => 1
            // 'dr_id'=>$dr_id
        );
        $follupModel = new obstetrics_followupModel(); 
        $follupModel->set($followupData);
        $follupModel->where('id',$id);
        $follupModel->where('dr_id',$dr_id);
        $updatedfollowID = $follupModel->update();
        // print_r($updatedfollowID); die();
        for($i=0; $i<count($days); $i++){
            
            $newset = [ 
                'patient_id'=>$patient_id, 
                'followup_id'=>$id,
                'days'=>$days[$i],
                'la_ropivacaine'=>$la_ropivacaine[$i],
                'la_bupivacaine'=>$la_bupivacaine[$i],
                'la_levobupivacaine'=>$la_levobupivacaine[$i],
                'la_lignocaine'=>$la_lignocaine[$i],
                'updated_at'=>$updated_at,
                'updated_by'=>$drname,
                'dr_id'=>$dr_id,
                'upload_patient_status' => 1
            ];

            $addModel = new obstetrics_FollowupCumulativeModel();
            $addModel->save($newset);
            $upID = $addModel->insertID();
        };  

        if(($updatedfollowID)){
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Followup data Updated Successfully.....'
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
