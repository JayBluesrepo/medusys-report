<?php
namespace App\Controllers\obstetrics;
use App\Controllers\BaseController;
use App\Models\addPatientModel;

use App\Models\obstetrics_PreopModel;
use App\Models\obstetrics_PostopModel;
use App\Models\obstetrics_followupModel;
use App\Models\obstetrics_SpinalModel;
use App\Models\obstetrics_EpiduralModel;
use App\Models\obstetrics_combinedSpinalEpiduralModel;
use App\Models\obstetrics_CSA_Model;
use App\Models\obstetrics_manuaFeedbackModel;
use App\Models\obstetrics_EFeedbackModel;
use App\Models\obstetrics_e_consentModel;
use App\Models\obstetrics_GaModel;


class GaDetails extends BaseController
{
    public function index()
    {
        $dr_id = session()->get('dr_id');
        $id = session()->get('id');
        $patient_id = session()->get('id');
        
        if($dr_id){      
            $calc=[];
            $model = new addPatientModel();
            $model->where('dr_id',$dr_id);        
            $model->orderBy('id','DESC');
            $details1  = $model->get()->getResultArray();
            $data['patient'] = $details1;
            $det = $model->where('id',$patient_id)->first();
            $data['focus'] = $det;            
           

            $model2 = new obstetrics_GaModel(); 
            $detail = $model2->where('dr_id',$dr_id)->where('patient_id',$id)->first();
            $data['info'] = $detail;  
            // print_r($id);die();

            $patient_Model = new addPatientModel();
            $patient_Model->orderBy('id','DESC');
            $patient_Model->where('dr_id',$dr_id);  
            $patient_Model->select('id, rad_id');
            $patient_Model->like('upload_patient_status_obstetric',1);
            $dat1 = $patient_Model->get()->getResultArray();
            // if($dat1){
                $data['old_check'] = $dat1;
            // }          
           
            $q = $detail['success_status'];
            $qq = (array)$q;
            $data['s_stat'] = $qq;

            $dmf=['j,k,l'];
            $data['procs'] = $dmf; 

            $model1 = new obstetrics_PreopModel();
            $detail1 = $model1->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['preo'] = $detail1;

            $model2 = new obstetrics_PostopModel();
            $detail2 = $model2->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
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

            $gaModel = new obstetrics_GaModel();
            $data91  = $gaModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            if($data6 || $data7 || $data8 || $data9 || $data91){
                $sin=['1,12,23'];
                $data['proccheck'] = $sin;
            }

            $Model = new obstetrics_EFeedbackModel();
            $data1  = $Model->where('dr_id',$dr_id)->where('patient_id',$patient_id)->where('submission',1)->first();

            $Models = new obstetrics_manuaFeedbackModel();
            $data4  = $Models->where('dr_id',$dr_id)->where('patient_id',$patient_id)->where('flag',1)->first();
            
            if($data1 || $data4){
                $sins=['1,5,10'];
                $data['feedcheck'] = $sins;
            }

            $models = new obstetrics_e_consentModel(); 
            $data12 = $models->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['ecocheck'] = $data12;

            $preop = new obstetrics_PreopModel();        
            $ga = $preop->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            $data['ga'] = $ga['purpose'];
            
            foreach($details1 as $key=>$val){
                $id = ($val['id']);
                $data5  = $cseModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                $data6  = $epiModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                $data7  = $spinModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                $data8  = $csaModel->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                $data91  = $gaModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

                if($data5 || $data6 || $data7 || $data8 || $data91){
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
                return view('obstetrics/GA_view',$data);
            }else{
                return view('obstetrics/proc',$data);
            }   
        }else{
            return view('login');
        }
    }

    public function add_ga(){
        $dr_id = session()->get('dr_id');
        // $id = session()->get('id');
        $patient_id = session()->get('id');

        $time_m = $this->request->getVar('time_m');
        $ga_done_by1 = $this->request->getVar('ga_done_by1');
        $ga_done_by2 = $this->request->getVar('ga_done_by2');
        $supervision = $this->request->getVar('supervision');
        $ga_inhalational = $this->request->getVar('ga_inhalational');
        $ga_tiva = $this->request->getVar('ga_tiva');
        $airway_management1 = $this->request->getVar('airway_management1');
        $airway_management2 = $this->request->getVar('airway_management2');
        $opioids_delivery = $this->request->getVar('opioids_delivery');
        $intra_op_analgesia = $this->request->getVar('intra_op_analgesia');
        $ia_opioids = $this->request->getVar('ia_opioids');
        $ia_paracetamol = $this->request->getVar('ia_paracetamol');
        $ia_nsaids = $this->request->getVar('ia_nsaids');
        $ia_ketamine = $this->request->getVar('ia_ketamine');
        $ia_tramadol = $this->request->getVar('ia_tramadol');
        $ia_nerveblock = $this->request->getVar('ia_nerveblock');
        $complications = $this->request->getVar('complications');
        $c_aspiration = $this->request->getVar('c_aspiration');
        $c_difficult_intubation = $this->request->getVar('c_difficult_intubation');
        $c_failed = $this->request->getVar('c_failed');
        $c_bronchospasm = $this->request->getVar('c_bronchospasm');
        $c_desaturation = $this->request->getVar('c_desaturation');
        $c_awarenese = $this->request->getVar('c_awarenese');

        $drname = session()->get('name');

        $ia_opioids_name = $this->request->getVar('ia_opioids_name[]');
        $ia_opioids_dose = $this->request->getVar('ia_opioids_dose[]');       

        $array1 = array();
        foreach($ia_opioids_name as $key=> $name){

            $var1 = array(
                'name' => $name,
                'dose' => $ia_opioids_dose[$key]
            );

            array_push($array1,$var1);
        }

        $ia_opioids_name_dose  = json_encode($array1);

        $ia_paracetamol_name = $this->request->getVar('ia_paracetamol_name[]');
        $ia_paracetamol_dose = $this->request->getVar('ia_paracetamol_dose[]');     

        $array2 = array();
        foreach($ia_paracetamol_name as $key=> $name){

            $var2 = array(
                'name' => $name,
                'dose' => $ia_paracetamol_dose[$key]
            );

            array_push($array2,$var2);
        }

        $ia_paracetamol_name_dose  = json_encode($array2);

        $ia_nsaids_name = $this->request->getVar('ia_nsaids_name[]');
        $ia_nsaids_dose = $this->request->getVar('ia_nsaids_dose[]');   

        $array3 = array();
        foreach($ia_nsaids_name as $key=> $name){

            $var3 = array(
                'name' => $name,
                'dose' => $ia_nsaids_dose[$key]
            );

            array_push($array3,$var3);
        }

        $ia_nsaids_name_dose  = json_encode($array3);

        $ia_ketamine_name = $this->request->getVar('ia_ketamine_name[]');
        $ia_ketamine_dose = $this->request->getVar('ia_ketamine_dose[]');   

        $array4 = array();
        foreach($ia_ketamine_name as $key=> $name){

            $var4 = array(
                'name' => $name,
                'dose' => $ia_ketamine_dose[$key]
            );

            array_push($array4,$var4);
        }

        $ia_ketamine_name_dose  = json_encode($array4);

        $ia_tramadol_name = $this->request->getVar('ia_tramadol_name[]');
        $ia_tramadol_dose = $this->request->getVar('ia_tramadol_dose[]');   

        $array5 = array();
        foreach($ia_tramadol_name as $key=> $name){

            $var5 = array(
                'name' => $name,
                'dose' => $ia_tramadol_dose[$key]
            );

            array_push($array5,$var5);
        }

        $ia_tramadol_name_dose  = json_encode($array5);

        $ia_nerveblock_name = $this->request->getVar('ia_nerveblock_name[]');
        $ia_nerveblock_dose = $this->request->getVar('ia_nerveblock_dose[]');   

        $array6 = array();
        foreach($ia_nerveblock_name as $key=> $name){

            $var6 = array(
                'name' => $name,
                'dose' => $ia_nerveblock_dose[$key]
            );

            array_push($array6,$var6);
        }

        $ia_nerveblock_name_dose  = json_encode($array6);


        $ia_others1 = $this->request->getVar('ia_others');
        // $ia_others_input = $this->request->getVar('ia_others_input');   


        if($ia_others1 == 'No'){
            $ia_others_input = '';   
            $ia_others = $ia_others1.','.$ia_others_input;
        }else{
            $ia_others1 = $this->request->getVar('ia_others');
            $ia_others_input = $this->request->getVar('ia_others_input');   
            $ia_others = $ia_others1.','.$ia_others_input;
        }

        $date_time_m = $this->request->getVar('date_time_m');

        $date1 = str_replace('/', '-', $date_time_m);   

        $gaData = array(

            'ia_opioids_name_dose'=>$ia_opioids_name_dose,
            'ia_paracetamol_name_dose'=>$ia_paracetamol_name_dose,
            'ia_nsaids_name_dose'=>$ia_nsaids_name_dose,
            'ia_ketamine_name_dose'=>$ia_ketamine_name_dose,
            'ia_tramadol_name_dose'=>$ia_tramadol_name_dose,
            'ia_nerveblock_name_dose'=>$ia_nerveblock_name_dose,
            // 'ia_others_name_dose'=>,
            'ia_others'=>$ia_others,
            'procedure_date'=>date("Y-m-d",strtotime($date1)),


            'patient_id'=>$patient_id,
            'dr_id'=>$dr_id,
            'time'=>$time_m,
            'ga_done_by1'=>$ga_done_by1,
            'ga_done_by2'=>$ga_done_by2,
            'supervision'=>$supervision,
            'ga_inhalational'=>$ga_inhalational,
            'ga_tiva'=>$ga_tiva,
            'airway_management1'=>$airway_management1,
            'airway_management2'=>$airway_management2,
            'opioids_delivery'=>$opioids_delivery,
            'intra_op_analgesia'=>$intra_op_analgesia,
            'ia_opioids'=>$ia_opioids,
            'ia_paracetamol'=>$ia_paracetamol,
            'ia_nsaids'=>$ia_nsaids,
            'ia_ketamine'=>$ia_ketamine,
            'ia_tramadol'=>$ia_tramadol,
            'ia_nerveblock'=>$ia_nerveblock,
            'complications'=>$complications,
            'c_aspiration'=>$c_aspiration,
            'c_difficult_intubation'=>$c_difficult_intubation,
            'c_failed'=>$c_failed,
            'c_bronchospasm'=>$c_bronchospasm,
            'c_desaturation'=>$c_desaturation,
            'c_awarenese'=>$c_awarenese,
            'created_by'=>$drname
        );

        // print_r($gaData);die();

        $gaModel = new obstetrics_GaModel();        
        $gaModel->save($gaData);
        $insertedID = $gaModel->insertID();

        if($insertedID){
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Data Added Successfully.....',
                'msg' => $insertedID
            ));
        }
        else{
            return json_encode(array(
                 'result'    => 0,
                 'message'     => 'Something went wrong.....'
            ));
        }
    }


    public function edit_ga(){

        $id = $this->request->getVar('id');

        // print_r($id);die(); 
        $dr_id = session()->get('dr_id');
        // $id = session()->get('id');
        $patient_id = session()->get('id');

        $time_m = $this->request->getVar('time_m');
        $ga_done_by1 = $this->request->getVar('ga_done_by1');
        $ga_done_by2 = $this->request->getVar('ga_done_by2');
        $supervision = $this->request->getVar('supervision');
        $ga_inhalational = $this->request->getVar('ga_inhalational');
        $ga_tiva = $this->request->getVar('ga_tiva');
        $airway_management1 = $this->request->getVar('airway_management1');
        $airway_management2 = $this->request->getVar('airway_management2');
        $opioids_delivery = $this->request->getVar('opioids_delivery');
        $intra_op_analgesia = $this->request->getVar('intra_op_analgesia');
        $ia_opioids = $this->request->getVar('ia_opioids');
        $ia_paracetamol = $this->request->getVar('ia_paracetamol');
        $ia_nsaids = $this->request->getVar('ia_nsaids');
        $ia_ketamine = $this->request->getVar('ia_ketamine');
        $ia_tramadol = $this->request->getVar('ia_tramadol');
        $ia_nerveblock = $this->request->getVar('ia_nerveblock');
        $complications = $this->request->getVar('complications');
        $c_aspiration = $this->request->getVar('c_aspiration');
        $c_difficult_intubation = $this->request->getVar('c_difficult_intubation');
        $c_failed = $this->request->getVar('c_failed');
        $c_bronchospasm = $this->request->getVar('c_bronchospasm');
        $c_desaturation = $this->request->getVar('c_desaturation');
        $c_awarenese = $this->request->getVar('c_awarenese');

        $drname = session()->get('name');

        $ia_opioids_name = $this->request->getVar('ia_opioids_name[]');
        $ia_opioids_dose = $this->request->getVar('ia_opioids_dose[]');       

        $array1 = array();
        foreach($ia_opioids_name as $key=> $name){

            $var1 = array(
                'name' => $name,
                'dose' => $ia_opioids_dose[$key]
            );

            array_push($array1,$var1);
        }

        $ia_opioids_name_dose  = json_encode($array1);

        $ia_paracetamol_name = $this->request->getVar('ia_paracetamol_name[]');
        $ia_paracetamol_dose = $this->request->getVar('ia_paracetamol_dose[]');     

        $array2 = array();
        foreach($ia_paracetamol_name as $key=> $name){

            $var2 = array(
                'name' => $name,
                'dose' => $ia_paracetamol_dose[$key]
            );

            array_push($array2,$var2);
        }

        $ia_paracetamol_name_dose  = json_encode($array2);

        $ia_nsaids_name = $this->request->getVar('ia_nsaids_name[]');
        $ia_nsaids_dose = $this->request->getVar('ia_nsaids_dose[]');   

        $array3 = array();
        foreach($ia_nsaids_name as $key=> $name){

            $var3 = array(
                'name' => $name,
                'dose' => $ia_nsaids_dose[$key]
            );

            array_push($array3,$var3);
        }

        $ia_nsaids_name_dose  = json_encode($array3);

        $ia_ketamine_name = $this->request->getVar('ia_ketamine_name[]');
        $ia_ketamine_dose = $this->request->getVar('ia_ketamine_dose[]');   

        $array4 = array();
        foreach($ia_ketamine_name as $key=> $name){

            $var4 = array(
                'name' => $name,
                'dose' => $ia_ketamine_dose[$key]
            );

            array_push($array4,$var4);
        }

        $ia_ketamine_name_dose  = json_encode($array4);

        $ia_tramadol_name = $this->request->getVar('ia_tramadol_name[]');
        $ia_tramadol_dose = $this->request->getVar('ia_tramadol_dose[]');   

        $array5 = array();
        foreach($ia_tramadol_name as $key=> $name){

            $var5 = array(
                'name' => $name,
                'dose' => $ia_tramadol_dose[$key]
            );

            array_push($array5,$var5);
        }

        $ia_tramadol_name_dose  = json_encode($array5);

        $ia_nerveblock_name = $this->request->getVar('ia_nerveblock_name[]');
        $ia_nerveblock_dose = $this->request->getVar('ia_nerveblock_dose[]');   

        $array6 = array();
        foreach($ia_nerveblock_name as $key=> $name){

            $var6 = array(
                'name' => $name,
                'dose' => $ia_nerveblock_dose[$key]
            );

            array_push($array6,$var6);
        }

        $ia_nerveblock_name_dose  = json_encode($array6);


        $ia_others1 = $this->request->getVar('ia_others');
        // $ia_others_input = $this->request->getVar('ia_others_input');   


        if($ia_others1 == 'No'){
            $ia_others_input = '';   
            $ia_others = $ia_others1.','.$ia_others_input;
        }else{
            $ia_others1 = $this->request->getVar('ia_others');
            $ia_others_input = $this->request->getVar('ia_others_input');   
            $ia_others = $ia_others1.','.$ia_others_input;
        }

        $date_time_m = $this->request->getVar('date_time_m');

        $date1 = str_replace('/', '-', $date_time_m);   

        date_default_timezone_set('Asia/Kolkata');
        $updated_at = date('d-m-Y H:i:s', time());

        $gaData = array(

            'ia_opioids_name_dose'=>$ia_opioids_name_dose,
            'ia_paracetamol_name_dose'=>$ia_paracetamol_name_dose,
            'ia_nsaids_name_dose'=>$ia_nsaids_name_dose,
            'ia_ketamine_name_dose'=>$ia_ketamine_name_dose,
            'ia_tramadol_name_dose'=>$ia_tramadol_name_dose,
            'ia_nerveblock_name_dose'=>$ia_nerveblock_name_dose,
            // 'ia_others_name_dose'=>,
            'ia_others'=>$ia_others,
            'procedure_date'=>date("Y-m-d",strtotime($date1)),


            'patient_id'=>$patient_id,
            'dr_id'=>$dr_id,
            'time'=>$time_m,
            'ga_done_by1'=>$ga_done_by1,
            'ga_done_by2'=>$ga_done_by2,
            'supervision'=>$supervision,
            'ga_inhalational'=>$ga_inhalational,
            'ga_tiva'=>$ga_tiva,
            'airway_management1'=>$airway_management1,
            'airway_management2'=>$airway_management2,
            'opioids_delivery'=>$opioids_delivery,
            'intra_op_analgesia'=>$intra_op_analgesia,
            'ia_opioids'=>$ia_opioids,
            'ia_paracetamol'=>$ia_paracetamol,
            'ia_nsaids'=>$ia_nsaids,
            'ia_ketamine'=>$ia_ketamine,
            'ia_tramadol'=>$ia_tramadol,
            'ia_nerveblock'=>$ia_nerveblock,
            'complications'=>$complications,
            'c_aspiration'=>$c_aspiration,
            'c_difficult_intubation'=>$c_difficult_intubation,
            'c_failed'=>$c_failed,
            'c_bronchospasm'=>$c_bronchospasm,
            'c_desaturation'=>$c_desaturation,
            'c_awarenese'=>$c_awarenese,
            'updated_by'=>$drname,
            'updated_at'=>$updated_at
        );

        // print_r($gaData);die();

        $gaModel = new obstetrics_GaModel();        
        $gaModel->set($gaData);
        $gaModel->where('id',$id);
        $gaModel->where('dr_id',$dr_id);
        $update = $gaModel->update();     

        if($update){
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Data Added Successfully.....'
                // 'msg' => $insertedID
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
?>
