<?php 
namespace App\Controllers\obstetrics;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\addPatientModel;

use App\Models\obstetrics_PostopModel;
use App\Models\obstetrics_EpiduralModel;
use App\Models\obstetrics_SpinalModel;
use App\Models\obstetrics_combinedSpinalEpiduralModel;
use App\Models\obstetrics_CSA_Model;
use App\Models\obstetrics_PreopModel;
use App\Models\obstetrics_followupModel;
// use App\Models\FollowupCumulativeModel;
use App\Models\obstetrics_manuaFeedbackModel;
use App\Models\obstetrics_EFeedbackModel;
use App\Models\obstetrics_e_consentModel;
use App\Models\obstetrics_GaModel;


class Pacu extends BaseController
{   
    use ResponseTrait;
	public function __construct()
	{
		helper(['form','url']);
	}
    public function index()
    {
        $dr_id = session()->get('dr_id');
        $patient_id = session()->get('id');
        // print_r($patient_id);die();
        // if($dr_id){        
            $calc=[];
            $model = new addPatientModel(); 
            $model->where('dr_id',$dr_id);       
            $model->orderBy('id','DESC');
            $details  = $model->get()->getResultArray();
            $data['patient'] = $details;        
            $det = $model->where('id',$patient_id)->first();
            $data['focus'] = $det;
            
            $epiModel = new obstetrics_EpiduralModel();
            $data1  = $epiModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            $spinModel = new obstetrics_SpinalModel();
            $data2  = $spinModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            $epiModel1 = new obstetrics_CSA_Model();
            $data3  = $epiModel1->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            $epiModel2 = new obstetrics_combinedSpinalEpiduralModel();
            $data4  = $epiModel2->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
            
            $gaModel = new obstetrics_GaModel();
            $data91  = $gaModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();

            $patient_Model = new addPatientModel();
            $patient_Model->orderBy('id','DESC');
            $patient_Model->where('dr_id',$dr_id);  
            $patient_Model->select('id, rad_id');
            $patient_Model->like('upload_patient_status_obstetric',1);
            $dat1 = $patient_Model->get()->getResultArray();
            // if($dat1){
                $data['old_check'] = $dat1;
            // }
            
            if($data1 || $data2 || $data3 || $data4 || $data91){
                $model1 = new obstetrics_PostopModel(); 
                $detail = $model1->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
                $data['info'] = $detail;

                $dmk=['m,n,o'];
                $data['post'] = $dmk; 
                
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
                
                $gaModel = new obstetrics_GaModel();
                $data911  = $gaModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
                
                if($data6 || $data7 || $data8 || $data9 || $data911){
                    $sin=['1,12,23'];
                    $data['proccheck'] = $sin;
                }

                $Model = new obstetrics_EFeedbackModel();
                $data13  = $Model->where('dr_id',$dr_id)->where('patient_id',$patient_id)->where('submission',1)->first();

                $Models = new obstetrics_manuaFeedbackModel();
                $data14  = $Models->where('dr_id',$dr_id)->where('patient_id',$patient_id)->where('flag',1)->first();
                
                if($data13 || $data14){
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
                    $data2  = $model4->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data3  = $model5->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data4  = $model3->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                   

                    if($data1 && $data2 && $data3 && $data4 && $data9 && $data12 && $data91){
                        $datas['id'] = $id;
                        array_push($calc,$datas);
                    }
                }
                $data['allcheck'] = $calc;

                if(!empty($detail)){
                    $tan=['7,8,9'];
                    $data['postcheck'] = $tan;
                    return view('obstetrics/pacudetails',$data);
                }else{
                    return view('obstetrics/pacu',$data);
                } 
            // }else{
            //     return view('login');
            // }
        }
        else{

            // if($dr_id){           
                echo "<script>alert('Please add procedure details to add follow up details');</script>";

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
                $data['epid'] = $data6;

                $spinModel = new obstetrics_SpinalModel();
                $data7  = $spinModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
                $data['spin'] = $data7;

                $cseModel = new obstetrics_combinedSpinalEpiduralModel();
                $data8  = $cseModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
                $data['cse'] = $data8;

                $csaModel = new obstetrics_CSA_Model();
                $data9  = $csaModel->where('dr_id',$dr_id)->where('patient_id',$patient_id)->first();
                $data['csa'] = $data9;

                if($data6 || $data7 || $data8 || $data9){
                    $sin=['1,12,23'];
                    $data['proccheck'] = $sin;
                }

                $Model = new obstetrics_EFeedbackModel();
                $data13  = $Model->where('dr_id',$dr_id)->where('patient_id',$patient_id)->where('submission',1)->first();

                $Models = new obstetrics_manuaFeedbackModel();
                $data14  = $Models->where('dr_id',$dr_id)->where('patient_id',$patient_id)->where('flag',1)->first();
                
                if($data13 || $data14){
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
                    $data2  = $model1->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data3  = $model2->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    $data4  = $model3->where('dr_id',$dr_id)->where('patient_id',$id)->first();
                    if($data1 && $data2 && $data3 && $data4 && $data9 && $data12){
                        $datas['id'] = $id;
                        array_push($calc,$datas);
                    }
                }
                $data['allcheck'] = $calc;

                return view('obstetrics/proc',$data);
            // }else{
            //     return view('login');
            // }
        } 
    }
    public function add_postop(){

        $patient_id = session()->get('id');
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

        $normal = $this->request->getVar('normal');
        $acidosis = $this->request->getVar('acidosis');
        $naloxone = $this->request->getVar('naloxone');
        $hypoglecemia = $this->request->getVar('hypoglecemia');
        $birth_trauma = $this->request->getVar('birth_trauma');
        $apgar = $this->request->getVar('apgar');
        $foetal_other1 = $this->request->getVar('foetal_other');
        

        if($foetal_other1 == 'Yes'){

            $foetal_other = $this->request->getVar('foetal_other');
            $foetal_other_input = $this->request->getVar('foetal_other_input');

        }else{

            $foetal_other = $this->request->getVar('foetal_other');
            $foetal_other_input = '';
            
        }

        $duration_stay = $this->request->getVar('duration_stay');
      


        $drname = session()->get('name');
        $dr_id = session()->get('dr_id');

        $procedure_date = '';

        $db = \Config\Database::connect();


        $builder = $db->table('procedure_csa');
		$query = $builder->select("procedure_date");
	    $query = $builder->where('patient_id',$patient_id);
		$query = $builder->get();
	    $record = $query->getResult();
		foreach($record as $row) {
			$procedure_date = $row->procedure_date;
		}

        $builder = $db->table('procedure_cse');
		$query = $builder->select("procedure_date");
	    $query = $builder->where('patient_id',$patient_id);
		$query = $builder->get();
	    $record = $query->getResult();
		foreach($record as $row) {
			$procedure_date = $row->procedure_date;
		}

        $builder = $db->table('procedure_spinal');
		$query = $builder->select("procedure_date");
	    $query = $builder->where('patient_id',$patient_id);
		$query = $builder->get();
	    $record = $query->getResult();
		foreach($record as $row) {
			$procedure_date = $row->procedure_date;
		}

        $builder = $db->table('procedure_epidural');
		$query = $builder->select("procedure_date");
	    $query = $builder->where('patient_id',$patient_id);
		$query = $builder->get();
	    $record = $query->getResult();
		foreach($record as $row) {
			$procedure_date = $row->procedure_date;
		}

        $postopData = array(

            'procedure_date'=>$procedure_date,

            'patient_id'=>$patient_id,
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
            'normal'=>$normal,
            'acidosis'=>$acidosis,
            'naloxone'=>$naloxone,
            'hypoglecemia'=>$hypoglecemia,
            'birth_trauma'=>$birth_trauma,
            'apgar'=>$apgar,
            'foetal_other'=>$foetal_other,
            'other_input'=>$foetal_other_input,
            'duration_stay'=>$duration_stay,

            'created_by'=>$drname,
            'dr_id'=>$dr_id
        );
        
        $postopModel = new obstetrics_PostopModel(); 
        $postopModel->save($postopData);        
        $insertedID = $postopModel->insertID();
        if($insertedID){
            $model = new addPatientModel();
            $models = new obstetrics_e_consentModel(); 
            $model1 = new obstetrics_PreopModel();
            $cseModel = new obstetrics_combinedSpinalEpiduralModel();
            $epiModel = new obstetrics_EpiduralModel();
            $spinModel = new obstetrics_SpinalModel();
            $csaModel = new obstetrics_CSA_Model();
            $model2 = new obstetrics_PostopModel();
            $data = [
                'upload_patient_status' => 1
            ];
            $data_obstetrics = array(
                'upload_patient_status_obstetric' => 1
            );
            $model->set($data_obstetrics);
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
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Postop data Added Successfully.....',
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
}
?>
