<?php
namespace App\Controllers\cnb;
use App\Controllers\BaseController;
use App\Models\addPatientModel;
use App\Models\PreopModel;
use App\Models\PostopModel;
use App\Models\FollowupModel;
use App\Models\SpinalModel;
use App\Models\EpiduralModel;
use App\Models\combinedSpinalEpiduralModel;
use App\Models\CSA_Model;
use App\Models\FeedbackModel;
use App\Models\EFeedbackModel;
use App\Models\e_consentModel;

class PacuDetails extends BaseController
{
    public function index()
    {
        $dr_id = session()->get('dr_id');
        
        // if($dr_id){
            $calc=[];
            $pacu_id = $this->request->getVar('id');
            $patient_id = session()->get('id');

            $model = new addPatientModel();
            $model->where('dr_id',$dr_id);
            $model->orderBy('id','DESC');
            $details  = $model->get()->getResultArray();
            $data['patient'] = $details;
            $det = $model->where('id',$patient_id)->first();
            $data['focus'] = $det;
            
            $model1 = new PostopModel(); 
            $detail = $model1->where('dr_id',$dr_id)->where('id',$pacu_id)->first();
            $data['info'] = $detail;

            $dmk=['m,n,o'];
            $data['post'] = $dmk; 
            
            $model4 = new PreopModel();
            $detail1 = $model4->where('dr_id',$dr_id)->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['preo'] = $detail1;

            $model5 = new PostopModel();
            $detail2 = $model5->where('dr_id',$dr_id)->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['posto'] = $detail2;

            $model3 = new FollowupModel();
            $detail3 = $model3->where('dr_id',$dr_id)->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['follo'] = $detail3;

            $epiModel = new EpiduralModel();
            $data6  = $epiModel->where('dr_id',$dr_id)->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            $spinModel = new SpinalModel();
            $data7  = $spinModel->where('dr_id',$dr_id)->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            $cseModel = new combinedSpinalEpiduralModel();
            $data8  = $cseModel->where('dr_id',$dr_id)->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            $csaModel = new CSA_Model();
            $data9  = $csaModel->where('dr_id',$dr_id)->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            if($data6 || $data7 || $data8 || $data9){
                $sin=['1,12,23'];
                $data['proccheck'] = $sin;
            }
            $patient_Model = new addPatientModel();
            $patient_Model->orderBy('id','DESC');
            $patient_Model->where('dr_id',$dr_id);  
            $patient_Model->select('id, rad_id');
            $patient_Model->like('upload_patient_status',1);
            $dat1 = $patient_Model->get()->getResultArray();
            // if($dat1){
                $data['old_check'] = $dat1;
            // }
            
            $tan=['7,8,9'];
            $data['postcheck'] = $tan;

            $Model = new EFeedbackModel();
            $data1  = $Model->where('dr_id',$dr_id)->where('dr_id',$dr_id)->where('patient_id',$patient_id)->where('submission',1)->first();

            $Models = new FeedbackModel();
            $data4  = $Models->where('dr_id',$dr_id)->where('dr_id',$dr_id)->where('patient_id',$patient_id)->where('flag',1)->first();
            
            if($data1 || $data4){
                $sins=['1,5,10'];
                $data['feedcheck'] = $sins;
            }
            $models = new e_consentModel(); 
            $data12 = $models->where('dr_id',$dr_id)->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['ecocheck'] = $data12;
            
            foreach($details as $key=>$val){
                $id = ($val['id']);
                $data5  = $cseModel->where('dr_id',$dr_id)->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                $data6  = $epiModel->where('dr_id',$dr_id)->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                $data7  = $spinModel->where('dr_id',$dr_id)->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                $data8  = $csaModel->where('dr_id',$dr_id)->where('dr_id',$dr_id)->where('patient_id',$id)->first();
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

            return view('cnb/pacudetails',$data);
        // }else{
        //     return view('login');
        // }
    }
    public function edit_postop(){
        $id = $this->request->getVar('id');
        $ps_postproc = $this->request->getVar('ps_postproc');
        $ps_30mins = $this->request->getVar('ps_30mins');
        $ps_1hr = $this->request->getVar('ps_1hr');
        $nvs_postproc = $this->request->getVar('nvs_postproc'); 
        $nvs_30mins = $this->request->getVar('nvs_30mins');
        $nvs_1hr = $this->request->getVar('nvs_1hr');
        $ss_postproc = $this->request->getVar('ss_postproc');
        $ss_30mins = $this->request->getVar('ss_30mins');
        $ss_1hr = $this->request->getVar('ss_1hr');
        $time_spent = $this->request->getVar('time_spent');
        $intra_op = $this->request->getVar('intra_op');
        $intra_name = $this->request->getVar('intra_name[]');
        $intra_dose = $this->request->getVar('intra_dose[]');
        $array1 = array();
        foreach($intra_name as $key=>$name){
            $var1 = array(
                'name' => $name,
                'dose' => $intra_dose[$key]
            );
            array_push($array1,$var1);
        }
        $intra_name_dose  = json_encode($array1);
        $oral_op = $this->request->getVar('oral_op');
        $oral_name = $this->request->getVar('oral_name[]');
        $oral_dose = $this->request->getVar('oral_dose[]');
        $array2 = array();
        foreach($oral_name as $key=>$name){
            $var2 = array(
                'name' => $name,
                'dose' => $oral_dose[$key]
            );
            array_push($array2,$var2);
        }
        $oral_name_dose  = json_encode($array2);
        $tram = $this->request->getVar('tram');
        $tram_name = $this->request->getVar('tram_name[]');
        $tram_dose = $this->request->getVar('tram_dose[]');
        $array3 = array();
        foreach($tram_name as $key=>$name){
            $var3 = array(
                'name' => $name,
                'dose' => $tram_dose[$key]
            );
            array_push($array3,$var3);
        }
        $tram_name_dose  = json_encode($array3);
        $nsaid = $this->request->getVar('nsaid');
        $nsa_name = $this->request->getVar('nsa_name[]');
        $nsa_dose = $this->request->getVar('nsa_dose[]');
        $array4 = array();
        foreach($nsa_name as $key=>$name){
            $var4 = array(
                'name' => $name,
                'dose' => $nsa_dose[$key]
            );
            array_push($array4,$var4);
        }
        $nsa_name_dose  = json_encode($array4);
        $paracetemol = $this->request->getVar('paracetemol');
        $para_name = $this->request->getVar('para_name[]');
        $para_dose = $this->request->getVar('para_dose[]');
        $array5 = array();
        foreach($para_name as $key=>$name){
            $var5 = array(
                'name' => $name,
                'dose' => $para_dose[$key]
            );
            array_push($array5,$var5);
        }
        $para_name_dose  = json_encode($array5);
        $othered = $this->request->getVar('othered');
        $other_name = $this->request->getVar('other_name[]');
        $other_dose = $this->request->getVar('other_dose[]');
        $array6 = array();
        foreach($other_name as $key=>$name){
            $var6 = array(
                'name' => $name,
                'dose' => $other_dose[$key]
            );
            array_push($array6,$var6);
        }
        $other_name_dose  = json_encode($array6);
        $la_regi = $this->request->getVar('la_regi');
        $la_regimen_select = $this->request->getVar('la_regimen_select');
        $ropivacaine = $this->request->getVar('ropivacaine');
        $ropi_per = $this->request->getVar('ropi_per');
        $ropi_ml = $this->request->getVar('ropi_ml');
        $ropi_mg = $this->request->getVar('ropi_mg');
        $la_ropivacaine = $ropivacaine.','.$ropi_per.','.$ropi_ml.','.$ropi_mg;
        $bupivacaine = $this->request->getVar('bupivacaine');
        $bupi_per = $this->request->getVar('bupi_per');
        $bupi_ml = $this->request->getVar('bupi_ml');
        $bupi_mg = $this->request->getVar('bupi_mg');
        $la_bupivacaine = $bupivacaine.','.$bupi_per.','.$bupi_ml.','.$bupi_mg;
        $levobupivacaine = $this->request->getVar('levobupivacaine');
        $levo_per = $this->request->getVar('levo_per');
        $levo_ml = $this->request->getVar('levo_ml');
        $levo_mg = $this->request->getVar('levo_mg');
        $la_levobupivacaine = $levobupivacaine.','.$levo_per.','.$levo_ml.','.$levo_mg;
        $Lignocaine = $this->request->getVar('Lignocaine');
        $ligno_per = $this->request->getVar('ligno_per');
        $ligno_ml = $this->request->getVar('ligno_ml');
        $ligno_mg = $this->request->getVar('ligno_mg');
        $la_lignocaine = $Lignocaine.','.$ligno_per.','.$ligno_ml.','.$ligno_mg;
        $la_repeat = $this->request->getVar('la_repeat');
        $repeat_ropi = $this->request->getVar('repeat_ropi');
        $repropi_per = $this->request->getVar('repropi_per');
        $repropi_ml = $this->request->getVar('repropi_ml');
        $repropi_mg = $this->request->getVar('repropi_mg');
        $la_repeat_ropi = $repeat_ropi.','.$repropi_per.','.$repropi_ml.','.$repropi_mg;
        $repeat_bupi = $this->request->getVar('repeat_bupi');
        $repbupi_per = $this->request->getVar('repbupi_per');
        $repbupi_ml = $this->request->getVar('repbupi_ml');
        $repbupi_mg = $this->request->getVar('repbupi_mg');
        $la_repeat_bupi = $repeat_bupi.','.$repbupi_per.','.$repbupi_ml.','.$repbupi_mg;
        $repeat_levo = $this->request->getVar('repeat_levo');
        $replevo_per = $this->request->getVar('replevo_per');
        $replevo_ml = $this->request->getVar('replevo_ml');
        $replevo_mg = $this->request->getVar('replevo_mg');
        $la_repeat_levo = $repeat_levo.','.$replevo_per.','.$replevo_ml.','.$replevo_mg;
        $repeat_ligno = $this->request->getVar('repeat_ligno');
        $repligno_per = $this->request->getVar('repligno_per');
        $repligno_ml = $this->request->getVar('repligno_ml');
        $repligno_mg = $this->request->getVar('repligno_mg');
        $la_repeat_ligno = $repeat_ligno.','.$repligno_per.','.$repligno_ml.','.$repligno_mg;
        $vasopressor = $this->request->getVar('vasopressor');
        date_default_timezone_set('Asia/Kolkata');
        $updated_at = date('d-m-Y H:i:s', time());
        $updated_by = session()->get('name');

        $dr_id = session()->get('dr_id');

        $postopData = array(
            'ps_postproc'=> $ps_postproc,
            'ps_30mins'=> $ps_30mins,
            'ps_1hr'=>$ps_1hr,
            'nvs_postproc'=>$nvs_postproc,
            'nvs_30mins'=> $nvs_30mins,
            'nvs_1hr'=> $nvs_1hr,
            'ss_postproc'=> $ss_postproc,
            'ss_30mins' => $ss_30mins,
            'ss_1hr'=> $ss_1hr,
            'time_spent'=> $time_spent, 
            'intravenous_opioids'=> $intra_op,
            'intra_name_dose'=> $intra_name_dose,
            'oral_opioids'=>$oral_op,
            'oral_name_dose'=>$oral_name_dose,
            'tramadol'=> $tram,
            'tram_name_dose'=> $tram_name_dose,
            'nsaid'=> $nsaid,
            'nsa_name_dose' => $nsa_name_dose,
            'paracetamol'=> $paracetemol,
            'para_name_dose'=> $para_name_dose,
            'la_regimen'=>$la_regi,
            'la_regimen_select'=> $la_regimen_select,
            'la_ropivacaine'=> $la_ropivacaine,
            'la_bupivacaine'=> $la_bupivacaine,
            'la_levobupivacaine' => $la_levobupivacaine,
            'la_lignocaine'=> $la_lignocaine,
            'repeat'=> $la_repeat, 
            'la_repeat_ropi'=> $la_repeat_ropi,
            'la_repeat_bupi'=> $la_repeat_bupi,
            'la_repeat_levo'=>$la_repeat_levo,
            'la_repeat_ligno'=>$la_repeat_ligno,
            'other'=> $othered,
            'other_name_dose'=> $other_name_dose,        
            'vasopressor_use_in_recovery'=> $vasopressor,
            'updated_by'=>$updated_by,
            'updated_at'=>$updated_at,

        );
        $psModel = new PostopModel(); 
        $psModel->set($postopData);
        $psModel->where('id',$id);
        $psModel->where('dr_id',$dr_id);
        $update = $psModel->update();
        if($update){
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Postop data Updated Successfully.....'
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
