<?php 

namespace App\Controllers\cnb;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ApiModel;
 


class UserReports extends ResourceController
{

    use ResponseTrait;

	public function index() {
        // report analytics
        return view('flowD/reports');  
		               
    }

    public function user_reports_home() {

    	$name = session()->get('name');

        return view('cnb/userReports/user_cnb-reports');  
		               
    }

     public function user_z(){

		$db = \Config\Database::connect();

    	$name = session()->get('name');
    	$dr_id = session()->get('dr_id');


		
		
		$builder = $db->table('cnb_postop');
		$query = $builder->select("COUNT(id) as count");
		$query = $builder->where('procedure_date >=',date('Y-m-d',strtotime($_POST['from_date'])));
		$query = $builder->where('procedure_date <=',date('Y-m-d',strtotime($_POST['to_date'])));
		$query = $builder->where('dr_id ',$dr_id);
		$query = $builder->get();
		$record = $query->getResult();

		$total = $record[0]->count;
// print_r
		
		$audit = array(
        	'from_date' => $_POST['from_date'],
        	'to_date'   => $_POST['to_date'],
			'total' => $total
        );
// print_r($audit);die();
        session()->set($audit);

		// if($total > 0){
			return json_encode(array(
				'result'    => 1,
				'total'    => $total,
				'message'   => 'session created.....'
		   ));

		// }else{

		// 	return json_encode(array(
		// 		'result'    => 0,
		// 		'message'   => 'No Data Found....'
		//    ));
		// }
           
    }


	public function user_n_report() {

		$db = \Config\Database::connect();
		
		$dr_id = session()->get('dr_id');
		// print_r($dr_id);die();
	   
		if($dr_id != ''){
		
		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
		$count = session()->get('total');

	
	
		if($from_date == '' && $to_date == ''){
			 return view('includes/user-reports-date-header'); 
		}
		else if($from_date != '' && $to_date != ''  && $count <= 0){

				return view('includes/user-reports-date-header'); 
		}
		else {
	
	
		   
			$total = 0;
			$products = [];
	
			$total_nc = 0;
	
			// csa
	
			$builder = $db->table('cnb_postop');
			$query = $builder->select("COUNT(cnb_postop.id) as count");
			$builder->join('procedure_csa', 'procedure_csa.patient_id = cnb_postop.patient_id');
			$query = $builder->where('procedure_csa.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			$query = $builder->where('procedure_csa.procedure_date <=',date('Y-m-d',strtotime($to_date)));
			$query = $builder->where('cnb_postop.dr_id ',$dr_id);
			$query = $builder->get();
			$record = $query->getResult();
	
			foreach($record as $row) {
				$total += floatval($row->count);
				$csa_total = floatval($row->count);
			}
	
	// print_r($record);die();
			// cse
	
			$builder = $db->table('cnb_postop');
			$query = $builder->select("COUNT(cnb_postop.id) as count");
			$builder->join('procedure_cse', 'procedure_cse.patient_id = cnb_postop.patient_id');
			$query = $builder->where('procedure_cse.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			$query = $builder->where('procedure_cse.procedure_date <=',date('Y-m-d',strtotime($to_date)));
			$query = $builder->where('cnb_postop.dr_id ',$dr_id);
			$query = $builder->get();
			$record = $query->getResult();
	
			foreach($record as $row) {
				$total += floatval($row->count);
				$cse_total = floatval($row->count);
			}
	
	
			// 	procedure_epidural
	
	
			$builder = $db->table('cnb_postop');
			$query = $builder->select("COUNT(cnb_postop.id) as count");
			$builder->join('procedure_epidural', 'procedure_epidural.patient_id = cnb_postop.patient_id');
			$query = $builder->where('procedure_epidural.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			$query = $builder->where('procedure_epidural.procedure_date <=',date('Y-m-d',strtotime($to_date)));
			$query = $builder->where('cnb_postop.dr_id ',$dr_id);
			$query = $builder->get();
			$record = $query->getResult();
	
			foreach($record as $row) {
				$total += floatval($row->count);
				$e_total = floatval($row->count);
			}
	
			// 	procedure_spinal
	
	
			$builder = $db->table('cnb_postop');
			$query = $builder->select("COUNT(cnb_postop.id) as count");
			$builder->join('procedure_spinal', 'procedure_spinal.patient_id = cnb_postop.patient_id','left');
			$query = $builder->where('procedure_spinal.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			$query = $builder->where('procedure_spinal.procedure_date <=',date('Y-m-d',strtotime($to_date)));
			$query = $builder->where('cnb_postop.dr_id ',$dr_id);
			$query = $builder->get();
	
			$record = $query->getResult();
	
			foreach($record as $row) {
				$total += floatval($row->count);
				$s_total = floatval($row->count);
			}
			 
	
	
			$products[] = array(
				 'day'   => 'N`',
				 'sell' => $total
			);
	
	
			// nc csa
	
			$builder = $db->table('cnb_postop');
			$query = $builder->select("COUNT(cnb_postop.id) as count");
			$builder->join('procedure_csa', 'procedure_csa.patient_id = cnb_postop.patient_id');
			$builder->join('manual_feedback', 'manual_feedback.patient_id = cnb_postop.patient_id');
			$builder->join('cnb_followup', 'cnb_followup.patient_id = cnb_postop.patient_id');
			$query = $builder->where('procedure_csa.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			$query = $builder->where('procedure_csa.procedure_date <=',date('Y-m-d',strtotime($to_date)));
			$query = $builder->where('cnb_postop.dr_id ',$dr_id);
	
			$query = $builder->get();
			$record = $query->getResult();
	
			foreach($record as $row) {
				$total_nc += floatval($row->count);
			}
	
	
	
			//nc cse
	
	
			$builder = $db->table('cnb_postop');
			$query = $builder->select("COUNT(cnb_postop.id) as count");
			$builder->join('procedure_cse', 'procedure_cse.patient_id = cnb_postop.patient_id');
			$builder->join('manual_feedback', 'manual_feedback.patient_id = cnb_postop.patient_id');
			$builder->join('cnb_followup', 'cnb_followup.patient_id = cnb_postop.patient_id');
			$query = $builder->where('procedure_cse.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			$query = $builder->where('procedure_cse.procedure_date <=',date('Y-m-d',strtotime($to_date)));
			$query = $builder->where('cnb_postop.dr_id ',$dr_id);
			$query = $builder->get();
			$record = $query->getResult();
	
			foreach($record as $row) {
				$total_nc += floatval($row->count);
			}
	
	
		   // nc epidural
	
	
			$builder = $db->table('cnb_postop');
			$query = $builder->select("COUNT(cnb_postop.id) as count");
			$builder->join('procedure_epidural', 'procedure_epidural.patient_id = cnb_postop.patient_id');
			$builder->join('manual_feedback', 'manual_feedback.patient_id = cnb_postop.patient_id');
			$builder->join('cnb_followup', 'cnb_followup.patient_id = cnb_postop.patient_id');
			$query = $builder->where('procedure_epidural.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			$query = $builder->where('procedure_epidural.procedure_date <=',date('Y-m-d',strtotime($to_date)));
			$query = $builder->where('cnb_postop.dr_id ',$dr_id);
			$query = $builder->get();
			$record = $query->getResult();
	
			foreach($record as $row) {
				$total_nc += floatval($row->count);
			}
	
			// nc spinal
	
			$builder = $db->table('cnb_postop');
			$query = $builder->select("COUNT(cnb_postop.id) as count");
			$builder->join('procedure_spinal', 'procedure_spinal.patient_id = cnb_postop.patient_id');
			$builder->join('manual_feedback', 'manual_feedback.patient_id = cnb_postop.patient_id');
			$builder->join('cnb_followup', 'cnb_followup.patient_id = cnb_postop.patient_id');
			$query = $builder->where('procedure_spinal.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			$query = $builder->where('procedure_spinal.procedure_date <=',date('Y-m-d',strtotime($to_date)));
			$query = $builder->where('cnb_postop.dr_id ',$dr_id);
			$query = $builder->get();
			$record = $query->getResult();
	
			foreach($record as $row) {
				$total_nc += floatval($row->count);
			}
	
	
			$products[] = array(
				'day'   => 'Nc',
				'sell' => $total_nc
			);
	
	
	// print_r($s_total);die();
			$e_number = (($e_total/$total)*100);
			$s_number = (($s_total/$total)*100);
			$csa_number = (($csa_total/$total)*100);
			$cse_number = (($cse_total/$total)*100);
						   
			// echo number_format((float)$number, 2, '.', '')."%";
	
			// print_r($e_number);die(); 
	
			 $s_products[] = array(
			  'day'   => 'Ns',
			  'sell' => $s_total
				);
			 $cse_products[] = array(
			  'day'   => 'Ncse',
			  'sell' => $csa_total
				);
			 $csa_products[] = array(
			  'day'   => 'Ncsa',
			  'sell' => $cse_total
				);
			 $e_products[] = array(
			  'day'   => 'Ne',
			  'sell' => $e_total 
				);
	
	
			 $data['products'] = ($products);
	
			 $data['s_products'] = ($s_products);
	
			 $data['cse_products'] = ($cse_products);
	
			 $data['csa_products'] = ($csa_products);
	
			 $data['e_products'] = ($e_products);
	
	
	
	
			$data['total'] = $total; 
			$data['total_nc'] = $total_nc;    
	
	
			$data['products'] = ($products);
	
			 $data['s_total'] = ($s_total);
	
			 $data['cse_total'] = ($cse_total);
	
			 $data['csa_total'] = ($csa_total);
	
			 $data['e_total'] = ($e_total);
	
			 $n_value = array(
				'n' => $total,
				'nc'   => $total_nc,
				's_total' => $s_total,
				'e_total' => $e_total,
				'cse_total' => $cse_total,
				'csa_total' => $csa_total
			);
	
			session()->set($n_value);
	
	
			$data['e_perc'] = number_format((float)$e_number, 1, '.', '')."%";
			$data['s_perc'] = number_format((float)$s_number, 1, '.', '')."%";
			$data['csa_perc'] = number_format((float)$csa_number, 1, '.', '')."%";
			$data['cse_perc'] = number_format((float)$cse_number, 1, '.', '')."%";
		  
	
			return view('cnb/userReports/user_n_report', $data);
			}    
			
		}else{
			return redirect()->route("login");
		}
				  
		}

public function user_procedure_success() {  
  
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){
			$total = session()->get('n');
			if(session()->get('e_total') > 1){
				$e_total = session()->get('e_total');
			}else{
				$e_total = 1;
			}
	
			if(session()->get('s_total') > 1){
				$s_total = session()->get('s_total');
			}else{
				$s_total = 1;
			}
	
			if(session()->get('cse_total') > 1){
				$cse_total = session()->get('cse_total');
			}else{
				$cse_total = 1;
			}
	
			if(session()->get('csa_total') > 1){
				$csa_total = session()->get('csa_total');
			}else{
				$csa_total = 1;
			}
	
			$total_s=0;
			$total_e=0;
			$total_cse=0;
			$total_csa=0;
	
	
			// --------------------SPINAL-------------------
			// --------------------SPINAL COMPLETE-------------------
			$builder = $db->table('cnb_postop');
			$query = $builder->select("COUNT(cnb_postop.id) as count");
			$builder->join('procedure_spinal', 'procedure_spinal.patient_id = cnb_postop.patient_id');
			$query = $builder->where('procedure_spinal.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			$query = $builder->where('procedure_spinal.procedure_date <=',date('Y-m-d',strtotime($to_date)));
			$query = $builder->where('procedure_spinal.success_status ','Complete Success');
			$query = $builder->where('cnb_postop.dr_id ',$dr_id);
			$query = $builder->get();
			$record = $query->getResult();
	
			foreach($record as $row) {
				$total_s += floatval($row->count);
				$s_complete = floatval($row->count);
	
			}
			// --------------------SPINAL PARTIAL-------------------
	
			$builder = $db->table('cnb_postop');
			$query = $builder->select("COUNT(cnb_postop.id) as count");
			$builder->join('procedure_spinal', 'procedure_spinal.patient_id = cnb_postop.patient_id');
			$query = $builder->where('procedure_spinal.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			$query = $builder->where('procedure_spinal.procedure_date <=',date('Y-m-d',strtotime($to_date)));
			$query = $builder->where('procedure_spinal.success_status ','Partial Success');
			$query = $builder->where('cnb_postop.dr_id ',$dr_id);
			$query = $builder->get();
			$record = $query->getResult();
	
			foreach($record as $row) {
				$total_s += floatval($row->count);
				$s_partial = floatval($row->count);
			}
	
			// --------------------SPINAL FAILURE-------------------
			$builder = $db->table('cnb_postop');
			$query = $builder->select("COUNT(cnb_postop.id) as count");
			$builder->join('procedure_spinal', 'procedure_spinal.patient_id = cnb_postop.patient_id');
			$query = $builder->where('procedure_spinal.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			$query = $builder->where('procedure_spinal.procedure_date <=',date('Y-m-d',strtotime($to_date)));
			$query = $builder->where('procedure_spinal.success_status ','Failure');
			$query = $builder->where('cnb_postop.dr_id ',$dr_id);
			$query = $builder->get();
			$record = $query->getResult();
	
			foreach($record as $row) {
				$total_s += floatval($row->count);
				$s_failure = floatval($row->count);
			}
	
			
	
			// --------------------CSE-------------------
			// --------------------CSE COMPLETE-------------------
			$builder = $db->table('cnb_postop');
			$query = $builder->select("COUNT(cnb_postop.id) as count");
			$builder->join('procedure_cse', 'procedure_cse.patient_id = cnb_postop.patient_id');
			$query = $builder->where('procedure_cse.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			$query = $builder->where('procedure_cse.procedure_date <=',date('Y-m-d',strtotime($to_date)));
			$query = $builder->where('procedure_cse.success','Complete Success');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
			$query = $builder->get();
			$record = $query->getResult();
	
			foreach($record as $row) {
				$total_cse += floatval($row->count);
				$cse_complete = floatval($row->count);
	
			}
	
			// --------------------CSE PARTIAL-------------------
	
			$builder = $db->table('cnb_postop');
			$query = $builder->select("COUNT(cnb_postop.id) as count");
			$builder->join('procedure_cse', 'procedure_cse.patient_id = cnb_postop.patient_id');
			$query = $builder->where('procedure_cse.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			$query = $builder->where('procedure_cse.procedure_date <=',date('Y-m-d',strtotime($to_date)));
			$query = $builder->where('procedure_cse.success','Partial Success');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
			$query = $builder->get();
			$record = $query->getResult();
	
			foreach($record as $row) {
				$total_cse += floatval($row->count);
				$cse_partial = floatval($row->count);
			}
	
			// --------------------CSE FAILURE-------------------
			$builder = $db->table('cnb_postop');
			$query = $builder->select("COUNT(cnb_postop.id) as count");
			$builder->join('procedure_cse', 'procedure_cse.patient_id = cnb_postop.patient_id');
			$query = $builder->where('procedure_cse.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			$query = $builder->where('procedure_cse.procedure_date <=',date('Y-m-d',strtotime($to_date)));
			$query = $builder->where('procedure_cse.success','Failure');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
			$query = $builder->get();
			$record = $query->getResult();
	
			foreach($record as $row) {
				$total_cse += floatval($row->count);
				$cse_failure = floatval($row->count);
			}
	
			
	
			// --------------------CSA-------------------
			// --------------------CSA COMPLETE-------------------
			$builder = $db->table('cnb_postop');
			$query = $builder->select("COUNT(cnb_postop.id) as count");
			$builder->join('procedure_csa', 'procedure_csa.patient_id = cnb_postop.patient_id');
			$query = $builder->where('procedure_csa.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			$query = $builder->where('procedure_csa.procedure_date <=',date('Y-m-d',strtotime($to_date)));
			$query = $builder->where('procedure_csa.success','Complete Success');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
			$query = $builder->get();
			$record = $query->getResult();
	
			foreach($record as $row) {
				$total_csa += floatval($row->count);
				$csa_complete = floatval($row->count);
	
			}
	
			// --------------------CSA PARTIAL-------------------
	
			$builder = $db->table('cnb_postop');
			$query = $builder->select("COUNT(cnb_postop.id) as count");
			$builder->join('procedure_csa', 'procedure_csa.patient_id = cnb_postop.patient_id');
			$query = $builder->where('procedure_csa.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			$query = $builder->where('procedure_csa.procedure_date <=',date('Y-m-d',strtotime($to_date)));
			$query = $builder->where('procedure_csa.success','Partial Success');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
			$query = $builder->get();
			$record = $query->getResult();
	
			foreach($record as $row) {
				$total_csa += floatval($row->count);
				$csa_partial = floatval($row->count);
			}
	
			// --------------------CSA FAILURE-------------------
			$builder = $db->table('cnb_postop');
			$query = $builder->select("COUNT(cnb_postop.id) as count");
			$builder->join('procedure_csa', 'procedure_csa.patient_id = cnb_postop.patient_id');
			$query = $builder->where('procedure_csa.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			$query = $builder->where('procedure_csa.procedure_date <=',date('Y-m-d',strtotime($to_date)));
			$query = $builder->where('procedure_csa.success','Failure');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
			$query = $builder->get();
			$record = $query->getResult();
	
			foreach($record as $row) {
				$total_csa += floatval($row->count);
				$csa_failure = floatval($row->count);
			}
	
			
	
	// --------------------EPIDURAL-------------------
			// --------------------EPIDURAL COMPLETE-------------------
			$builder = $db->table('cnb_postop');
			$query = $builder->select("COUNT(cnb_postop.id) as count");
			$builder->join('procedure_epidural', 'procedure_epidural.patient_id = cnb_postop.patient_id');
			$query = $builder->where('procedure_epidural.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			$query = $builder->where('procedure_epidural.procedure_date <=',date('Y-m-d',strtotime($to_date)));
			$query = $builder->where('procedure_epidural.success_status ','Complete Success');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
			$query = $builder->get();
			$record = $query->getResult();
	
			foreach($record as $row) {
				$total_e += floatval($row->count);
				$e_complete = floatval($row->count);
	
			}
			
			// --------------------EPIDURAL PARTIAL-------------------
	
			$builder = $db->table('cnb_postop');
			$query = $builder->select("COUNT(cnb_postop.id) as count");
			$builder->join('procedure_epidural', 'procedure_epidural.patient_id = cnb_postop.patient_id');
			$query = $builder->where('procedure_epidural.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			$query = $builder->where('procedure_epidural.procedure_date <=',date('Y-m-d',strtotime($to_date)));
			$query = $builder->where('procedure_epidural.success_status ','Partial Success');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
			$query = $builder->get();
			$record = $query->getResult();
	
			foreach($record as $row) {
				$total_e += floatval($row->count);
				$e_partial = floatval($row->count);
			}
	
			// --------------------EPIDURAL FAILURE-------------------
			$builder = $db->table('cnb_postop');
			$query = $builder->select("COUNT(cnb_postop.id) as count");
			$builder->join('procedure_epidural', 'procedure_epidural.patient_id = cnb_postop.patient_id');
			$query = $builder->where('procedure_epidural.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			$query = $builder->where('procedure_epidural.procedure_date <=',date('Y-m-d',strtotime($to_date)));
			$query = $builder->where('procedure_epidural.success_status ','Failure');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
			$query = $builder->get();
			$record = $query->getResult();
			
			foreach($record as $row) {
				$total_e += floatval($row->count);
				$e_failure += floatval($row->count);
			}
	
			$all_total = $e_total+$s_total+$cse_total+$csa_total;
			$complete_total = $e_complete+$s_complete+$csa_complete+$cse_complete;
			$partial_total = $e_partial+$s_partial+$cse_partial+$csa_partial;
			$failure_total = $e_failure+$s_failure+$csa_failure+$cse_failure;
	
			$success_status[] = array(
				'day'   => 'Completed',
				'sell' => $complete_total,
				'perc' =>number_format((float)(($complete_total/$all_total)*100), 1, '.', '')."%",
	
			);
			$success_status[] = array(
				'day'   => 'Partial',
				'sell' => $partial_total,
				'perc' =>number_format((float)(($partial_total/$all_total)*100), 1, '.', '')."%",
	
			);
			$success_status[] = array(
				'day'   => 'Failure',
				'sell' => $failure_total,
				'perc' =>number_format((float)(($failure_total/$all_total)*100), 1, '.', '')."%",
	
			);
	
	
			$all_success[] = array(
				'name'   => 'Combined Spinal Epidural',
				'n' => $total_cse,
				'complete' =>$cse_complete."(".number_format((float)(($cse_complete/$cse_total)*100), 1, '.', '')."%)",
				'partial' =>$cse_partial."(".number_format((float)(($cse_partial/$cse_total)*100), 1, '.', '')."%)",
				'failure' =>$cse_failure."(".number_format((float)(($cse_failure/$cse_total)*100), 1, '.', '')."%)",
			);
	
	
			$all_success[] = array(
				'name'   => 'Epidural alone',
				'n' => $total_e,
				'complete' =>$e_complete."(".number_format((float)(($e_complete/$e_total)*100), 1, '.', '')."%)",
				'partial' =>$e_partial."(".number_format((float)(($e_partial/$e_total)*100), 1, '.', '')."%)",
				'failure' =>$e_failure."(".number_format((float)(($e_failure/$e_total)*100), 1, '.', '')."%)",
			);
	
			$all_success[] = array(
				'name'   => 'Spinal alone',
				'n' => $total_s,
				'complete' =>$s_complete."(".number_format((float)(($s_complete/$s_total)*100), 1, '.', '')."%)",
				'partial' =>$s_partial."(".number_format((float)(($s_partial/$s_total)*100), 1, '.', '')."%)",
				'failure' =>$s_failure."(".number_format((float)(($s_failure/$s_total)*100), 1, '.', '')."%)",
			);
	
			$all_success[] = array(
				'name'   => 'CSA - Continuous Spinal Anaesthesia',
				'n' => $total_csa,
				'complete' =>$csa_complete."(".number_format((float)(($csa_complete/$csa_total)*100), 1, '.', '')."%)",
				'partial' =>$csa_partial."(".number_format((float)(($csa_partial/$csa_total)*100), 1, '.', '')."%)",
				'failure' =>$csa_failure."(".number_format((float)(($csa_failure/$csa_total)*100), 1, '.', '')."%)",
			);
	
	
			$data['products'] = ($products);
			$data['success_status'] = $success_status;
			$data['all_success'] = $all_success;
			$data['total'] = $total;   
	
			return view('cnb/userReports/user_procedure_success', $data);             
		
	}
	else{
			return redirect()->route("user-n-report");
		}


    }
	public function user_asa() {  
        $db = \Config\Database::connect();

        $from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

        if($from_date && $to_date  && $n_type != 'NULL'){

        	$total = session()->get('n');
			$asa = [];


	        $builder = $db->table('cnb_postop');
		    $query = $builder->select("COUNT(cnb_postop.id) as count");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
		    $query = $builder->where('cnb_preop.asa','ASA 1');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->groupBy('asa'); 
		    $query = $builder->get();
		    $record = $query->getResult();
			
			if($record){
				foreach($record as $row) {
					$asa[] = array(
						'day'   => 'ASA 1',
						'sell' => floatval($row->count)
					);
				}
			}
			else{
				$asa[] = array(
						'day'   => 'ASA 1',
						'sell' => 0
					);
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("COUNT(cnb_postop.id) as count");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
		    $query = $builder->where('cnb_preop.asa','ASA 2');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->groupBy('asa'); 
		    $query = $builder->get();
		    $record = $query->getResult();
			
			if($record){
				foreach($record as $row) {
					$asa[] = array(
						'day'   => 'ASA 2',
						'sell' => floatval($row->count)
					);
				}
			}
			else{
				$asa[] = array(
						'day'   => 'ASA 2',
						'sell' => 0
					);
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("COUNT(cnb_postop.id) as count");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
		    $query = $builder->where('cnb_preop.asa','ASA 3');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->groupBy('asa'); 
		    $query = $builder->get();
		    $record = $query->getResult();
			
			if($record){
				foreach($record as $row) {
					$asa[] = array(
						'day'   => 'ASA 3',
						'sell' => floatval($row->count)
					);
				}
			}
			else{
				$asa[] = array(
						'day'   => 'ASA 3',
						'sell' => 0
					);
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("COUNT(cnb_postop.id) as count");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
		    $query = $builder->where('cnb_preop.asa','ASA 4');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->groupBy('asa'); 
		    $query = $builder->get();
		    $record = $query->getResult();
			
			if($record){
				foreach($record as $row) {
					$asa[] = array(
						'day'   => 'ASA 4',
						'sell' => floatval($row->count)
					);
				}
			}
			else{
				$asa[] = array(
						'day'   => 'ASA 4',
						'sell' => 0
					);
			}

				$data['asa'] = ($asa);

				$data['total'] = $total;

				return view('cnb/userReports/user_asa_v', $data);
		}
		else{
				return redirect()->route("user-n-report");
			}
}
    public function user_demography() {
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){

			$total = session()->get('n');
			$data['total_n'] = $total; 


			$builder = $db->table('cnb_postop');
		    $query = $builder->select("AVG(cnb_patient_details.age) as average, STDDEV(cnb_patient_details.age) as std, MAX(cnb_patient_details.age) as maxage,MIN(cnb_patient_details.age) as minage,MAX(cnb_patient_details.weight_kg) as maxweight,MIN(cnb_patient_details.weight_kg) as minweight,AVG(cnb_patient_details.weight_kg) as weight_average, STDDEV(cnb_patient_details.weight_kg) as weight_std");

		    $builder->join('cnb_patient_details', 'cnb_patient_details.id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			foreach($record as $row) {
				$max_age = $row->maxage;
				$min_age = $row->minage;

				$maxweight = $row->maxweight;
				$minweight = $row->minweight;
				$average = $row->average;
				$std = $row->std;

				$weight_average = $row->weight_average;
				$weight_std = $row->weight_std;
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("count(cnb_postop.id) as female");
		    $builder->join('cnb_patient_details', 'cnb_patient_details.id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_patient_details.gender','Female');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			foreach($record as $row) {
				$female = $row->female;
			}


			$products[] = array(
				    'day'   => 'Female',
				    'sell' => $female
			);


			$builder = $db->table('cnb_postop');
		    $query = $builder->select("count(cnb_postop.id) as male");
		    $builder->join('cnb_patient_details', 'cnb_patient_details.id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_patient_details.gender','Male');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			foreach($record as $row) {
				$male = $row->male;
			}
			$products[] = array(
				    'day'   => 'Male',
				    'sell' => $male
			);

			$bmi = [];


			$builder = $db->table('cnb_postop');
		    $query = $builder->select("count(cnb_postop.id) as bmi");
		    $builder->join('cnb_patient_details', 'cnb_patient_details.id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_patient_details.bmi >=','30');
			$query = $builder->where('cnb_patient_details.bmi <=','34.99');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();
		
		
			foreach($record as $row) {
				
				$bmi1 = $row->bmi;
				$bmi[] = array(
				    'day'   => 'bmi >= 30',
				    'sell' => $bmi1
				);
			}


			$builder = $db->table('cnb_postop');
		    $query = $builder->select("count(cnb_postop.id) as bmi");
		    $builder->join('cnb_patient_details', 'cnb_patient_details.id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_patient_details.bmi >=','35');
			$query = $builder->where('cnb_patient_details.bmi <=','39.99');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();
		
		
			foreach($record as $row) {
				
				$bmi2 = $row->bmi;
				$bmi[] = array(
				    'day'   => 'bmi >= 35',
				    'sell' => $bmi2
				);
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("count(cnb_postop.id) as bmi");
		    $builder->join('cnb_patient_details', 'cnb_patient_details.id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_patient_details.bmi >=','40');
			$query = $builder->where('cnb_patient_details.bmi <=','39.99');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();
		
		
			foreach($record as $row) { 
				
				$bmi3 = $row->bmi;
				$bmi[] = array(
				    'day'   => 'bmi >= 40',
				    'sell' => $bmi3
				);
			}



		

		$data['bmi1'] = $bmi1;
		$data['bmi2'] = $bmi2;
		$data['bmi3'] = $bmi3;
		$data['total_n'] = $total; 
		$data['max_age'] = $max_age; 
		$data['min_age'] = $min_age; 
		$data['female'] = $female;
		$data['male'] = $male; 
		$data['maxweight'] = $maxweight; 
		$data['minweight'] = $minweight;

		$data['average'] = number_format((float)$average, 1, '.', '');
		$data['std'] = number_format((float)$std, 1, '.', '');


		$data['weight_average'] = number_format((float)$weight_average, 1, '.', '');
		$data['weight_std'] = number_format((float)$weight_std, 1, '.', '');



		$data['products'] = ($products); 
		$data['bmi'] = ($bmi);  


		// print_r($data['bmi1']);
		// print_r("<br>");
		// print_r($data['bmi1']);
		// print_r("<br>");
		// print_r($data['bmi1']);die();

		return view('cnb/userReports/user_demography_v', $data);       
		
	}else{
		return redirect()->route("user-n-report");
	}
    }

public function user_late_complication() {  
        
			$db = \Config\Database::connect();

			$from_date = session()->get('from_date');
			$to_date = session()->get('to_date');
            $dr_id = session()->get('dr_id');
			$n = session()->get('n');
    	$n_type = gettype($n);

			if($from_date && $to_date  && $n_type != 'NULL'){

			$total = session()->get('n');

			$products = [];
		
			$postdural_puncture = 0;
			$backache_epidural = 0;

			$perst_sensory = 0;
			$perst_motor = 0;


			$asep_meningi = 0;
			$bacterial_meningi = 0;
			$epidural_abs = 0;
			$perm_neuro_compli = 0;
			$catheter = 0;
			$epidural_haema = 0;
			$others = 0;


			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, cnb_followup.postdural_puncture,cnb_followup.backache_epidural,cnb_followup.perst_motor,cnb_followup.perst_sensory,cnb_followup.asep_meningi,cnb_followup.bacterial_meningi,cnb_followup.epidural_abs,cnb_followup.perm_neuro_compli,cnb_followup.catheter,cnb_followup.epidural_haema,cnb_followup.others");
		    $builder->join('cnb_followup', 'cnb_followup.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->postdural_puncture == 'Yes'){
							$postdural_puncture = $postdural_puncture + 1;
					}
					if($row->backache_epidural == 'Yes'){
							$backache_epidural = $backache_epidural + 1;
					}
					if($row->perst_sensory == 'Yes'){
							$perst_sensory = $perst_sensory + 1;
					}
					if($row->perst_motor == 'Yes'){
							$perst_motor = $perst_motor + 1;
					}
					if($row->asep_meningi == 'Yes'){
							$asep_meningi = $asep_meningi + 1;
					}
					if($row->bacterial_meningi == 'Yes'){
							$bacterial_meningi = $bacterial_meningi + 1;
					}
					if($row->epidural_abs == 'Yes'){
							$epidural_abs = $epidural_abs + 1;
					}
					if($row->perm_neuro_compli == 'Yes'){
							$perm_neuro_compli = $perm_neuro_compli + 1;
					}
					if($row->catheter == 'Yes'){
							$catheter = $catheter + 1;
					}
					if($row->epidural_haema == 'Yes'){
							$epidural_haema = $epidural_haema + 1;
					}
					if($row->others == 'Yes'){
							$others = $others + 1;
					}

				}
			}

			

			$products[] = array(
				'day'   => 'Post-Dural Puncture Headachedural',
				'sell' => $postdural_puncture
			);
			$products[] = array(
				'day'   => 'Backache at Epidural Site',
				'sell' => $backache_epidural
			);
			$products[] = array(
				'day'   => 'Persistent Motor Deficit',
				'sell' => $perst_motor
			);
			$products[] = array(
				'day'   => 'Persistent Sensory Deficit',
				'sell' => $perst_sensory
			);
			$products[] = array(
				'day'   => 'Aseptic Meningitis',
				'sell' => $asep_meningi
			);
			$products[] = array(
				'day'   => 'Bacterial Meningitis',
				'sell' => $bacterial_meningi
			);
			$products[] = array(
				'day'   => 'Epidural Abscess',
				'sell' => $epidural_abs
			);
			$products[] = array(
				'day'   => 'Permanent Neurological Complication',
				'sell' => $perm_neuro_compli
			);
			$products[] = array(
				'day'   => 'Catheter Related Issues',
				'sell' => $catheter
			);
			$products[] = array(
				'day'   => 'Epidural Haematoma',
				'sell' => $epidural_haema
			);
			$products[] = array(
				'day'   => 'Others',
				'sell' => $others
			);

			
		
			$data['products'] = ($products); 
	      
	        $data['total'] = $total;
	        $data['total_n'] = $total; 

			return view('cnb/userReports/user_late_complication_v', $data);              
			
		}
		else{
			return redirect()->route("user-n-report");
		}
    }






    public function user_bar() {
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){
	       
		$builder = $db->table('cnb_preop');
	    $query = $builder->select("COUNT(id) as count, COUNT(asa) as s,asa as day");
	        if($from_date && $to_date){
          $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        }
        $query = $builder->where('cnb_preop.dr_id ',$dr_id);
		$query = $builder->groupBy('asa');
		$query = $builder->get();
	        $data['products'] = $query->getResult();

		$data['products'] = $query->getResult();


		return view('cnb/userReports/user_bar', $data); 

	}else{
		return redirect()->route("user-n-report");
	}
   }
   //------------------------ procedure---------------//

      public function user_surgical() {  
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){

		$builder = $db->table('cnb_postop');
		$query = $builder->select("COUNT(id) as count");
		if($from_date && $to_date){
          $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        }
        $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		$query = $builder->get();
		$record = $query->getResult();

		foreach($record as $row) {
			$total += floatval($row->count);
		}

		$data['total_n'] = $total; 

		$builder = $db->table('cnb_preop');
		$query = $builder->select("COUNT(id) as count, category as s");
		if($from_date && $to_date){
          $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        }
        $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		$query = $builder->groupBy('category');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$products = [];
		foreach($record as $row) {
			$products[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}

		//$query = $db->getLastQuery();
		//echo (string)$query;
		//print_r($products); 

		$data['products'] = ($products);

		$data['total'] = $total;       
		//$query = $db->getLastQuery();


		return view('cnb/userReports/user_surgical_v', $data);                

	}else{
		return redirect()->route("user-n-report");
	}
    }
    public function user_speciality() {  
        
		$db = \Config\Database::connect();

        $from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

        if($from_date && $to_date  && $n_type != 'NULL'){

        	$total = session()->get('n');
			$products = [];


	        $builder = $db->table('cnb_postop');
		    $query = $builder->select("COUNT(cnb_postop.id) as count");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
		    $query = $builder->where('cnb_preop.speciality','General Surgery');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();
			
			if($record){
				foreach($record as $row) {
					$products[] = array(
						'day'   => 'General Surgery',
						'sell' => floatval($row->count)
					);
				}
			}
			else{
				$products[] = array(
						'day'   => 'General Surgery',
						'sell' => 0
					);
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("COUNT(cnb_postop.id) as count");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
		    $query = $builder->where('cnb_preop.speciality','Gynaecology');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();
			
			if($record){
				foreach($record as $row) {
					$products[] = array(
						'day'   => 'Gynaecology',
						'sell' => floatval($row->count)
					);
				}
			}
			else{
				$products[] = array(
						'day'   => 'Gynaecology',
						'sell' => 0
					); 
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("COUNT(cnb_postop.id) as count");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
		    $query = $builder->where('cnb_preop.speciality','Orthopaedics');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();
			
			if($record){
				foreach($record as $row) {
					$products[] = array(
						'day'   => 'Orthopaedics',
						'sell' => floatval($row->count)
					);
				}
			}
			else{
				$products[] = array(
						'day'   => 'ASA 3',
						'sell' => 0
					);
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("COUNT(cnb_postop.id) as count");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
		    $query = $builder->where('cnb_preop.speciality','Plastic surgery');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();
			
			if($record){
				foreach($record as $row) {
					$products[] = array(
						'day'   => 'Plastic surgery',
						'sell' => floatval($row->count)
					);
				}
			}
			else{
				$products[] = array(
						'day'   => 'Plastic surgery',
						'sell' => 0
					);
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("COUNT(cnb_postop.id) as count");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
		    $query = $builder->where('cnb_preop.speciality','Cardiothoracic surgery');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();
			
			if($record){
				foreach($record as $row) {
					$products[] = array(
						'day'   => 'Cardiothoracic surgery',
						'sell' => floatval($row->count)
					);
				}
			}
			else{
				$products[] = array(
						'day'   => 'Cardiothoracic surgery',
						'sell' => 0
					);
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("COUNT(cnb_postop.id) as count");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
		    $query = $builder->where('cnb_preop.speciality','Vascular Surgery');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();
			
			if($record){
				foreach($record as $row) {
					$products[] = array(
						'day'   => 'Vascular Surgery',
						'sell' => floatval($row->count)
					);
				}
			}
			else{
				$products[] = array(
						'day'   => 'Vascular Surgery',
						'sell' => 0
					);
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("COUNT(cnb_postop.id) as count");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
		    $query = $builder->where('cnb_preop.speciality','Neuro-spine');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();
			
			if($record){
				foreach($record as $row) {
					$products[] = array(
						'day'   => 'Neuro-spine',
						'sell' => floatval($row->count)
					);
				}
			}
			else{
				$products[] = array(
						'day'   => 'Neuro-spine',
						'sell' => 0
					);
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("COUNT(cnb_postop.id) as count");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
		    $query = $builder->where('cnb_preop.speciality','Urology');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();
			
			if($record){
				foreach($record as $row) {
					$products[] = array(
						'day'   => 'Urology',
						'sell' => floatval($row->count)
					);
				}
			}
			else{
				$products[] = array(
						'day'   => 'Urology',
						'sell' => 0
					);
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("COUNT(cnb_postop.id) as count");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
		    $query = $builder->where('cnb_preop.speciality','Other');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();
			
			if($record){
				foreach($record as $row) {
					$products[] = array(
						'day'   => 'Other',
						'sell' => floatval($row->count)
					);
				}
			}
			else{
				$products[] = array(
						'day'   => 'Other',
						'sell' => 0
					);
			}


				$data['products'] = ($products);

				$data['total_n'] = $total;

				return view('cnb/userReports/user_speciality_v', $data);
		}
		else{
				return redirect()->route("user-n-report");
			}
    }
    public function user_location() {  
        
		$db = \Config\Database::connect();

        $from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

        if($from_date && $to_date  && $n_type != 'NULL'){

        	$total = session()->get('n');
			$products = [];


	        $builder = $db->table('cnb_postop');
		    $query = $builder->select("COUNT(cnb_postop.id) as count");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
		    $query = $builder->where('cnb_preop.surgery_location','Thorax');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();
			
			if($record){
				foreach($record as $row) {
					$products[] = array(
						'day'   => 'Thorax',
						'sell' => floatval($row->count)
					);
				}
			}
			else{
				$products[] = array(
						'day'   => 'Thorax',
						'sell' => 0
					);
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("COUNT(cnb_postop.id) as count");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
		    $query = $builder->where('cnb_preop.surgery_location','Spine and Spinal Cord');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();
			
			if($record){
				foreach($record as $row) {
					$products[] = array(
						'day'   => 'Spine and Spinal Cord',
						'sell' => floatval($row->count)
					);
				}
			}
			else{
				$products[] = array(
						'day'   => 'Spine and Spinal Cord',
						'sell' => 0
					); 
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("COUNT(cnb_postop.id) as count");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
		    $query = $builder->where('cnb_preop.surgery_location','Upper Abdomen');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();
			
			if($record){
				foreach($record as $row) {
					$products[] = array(
						'day'   => 'Upper Abdomen',
						'sell' => floatval($row->count)
					);
				}
			}
			else{
				$products[] = array(
						'day'   => 'Upper Abdomen',
						'sell' => 0
					);
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("COUNT(cnb_postop.id) as count");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
		    $query = $builder->where('cnb_preop.surgery_location','Lower Abdomen');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();
			
			if($record){
				foreach($record as $row) {
					$products[] = array(
						'day'   => 'Lower Abdomen',
						'sell' => floatval($row->count)
					);
				}
			}
			else{
				$products[] = array(
						'day'   => 'Lower Abdomen',
						'sell' => 0
					);
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("COUNT(cnb_postop.id) as count");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
		    $query = $builder->where('cnb_preop.surgery_location','Perineum');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();
			
			if($record){
				foreach($record as $row) {
					$products[] = array(
						'day'   => 'Perineum',
						'sell' => floatval($row->count)
					);
				}
			}
			else{
				$products[] = array(
						'day'   => 'Perineum',
						'sell' => 0
					);
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("COUNT(cnb_postop.id) as count");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
		    $query = $builder->where('cnb_preop.surgery_location','Pelvis (Except Hip)');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();
			
			if($record){
				foreach($record as $row) {
					$products[] = array(
						'day'   => 'Pelvis (Except Hip)',
						'sell' => floatval($row->count)
					);
				}
			}
			else{
				$products[] = array(
						'day'   => 'Pelvis (Except Hip)',
						'sell' => 0
					);
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("COUNT(cnb_postop.id) as count");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
		    $query = $builder->where('cnb_preop.surgery_location','Upper Leg (Except Knee)');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();
			
			if($record){
				foreach($record as $row) {
					$products[] = array(
						'day'   => 'Upper Leg (Except Knee)',
						'sell' => floatval($row->count)
					);
				}
			}
			else{
				$products[] = array(
						'day'   => 'Upper Leg (Except Knee)',
						'sell' => 0
					);
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("COUNT(cnb_postop.id) as count");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
		    $query = $builder->where('cnb_preop.surgery_location','Knee and Popliteal Area');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();
			
			if($record){
				foreach($record as $row) {
					$products[] = array(
						'day'   => 'Knee and Popliteal Area',
						'sell' => floatval($row->count)
					);
				}
			}
			else{
				$products[] = array(
						'day'   => 'Knee and Popliteal Area',
						'sell' => 0
					);
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("COUNT(cnb_postop.id) as count");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
		    $query = $builder->where('cnb_preop.surgery_location','Lower Leg (Below Knee)');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();
			
			if($record){
				foreach($record as $row) {
					$products[] = array(
						'day'   => 'Lower Leg (Below Knee)',
						'sell' => floatval($row->count)
					);
				}
			}
			else{
				$products[] = array(
						'day'   => 'Lower Leg (Below Knee)',
						'sell' => 0
					);
			}


				$data['products'] = ($products);

				$data['total_n'] = $total;

				return view('cnb/userReports/user_location_v', $data);
		}
		else{
				return redirect()->route("user-n-report");
			}
    }
    public function user_purpose() {  
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){

			$total = session()->get('n');
			$products = [];

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("COUNT(cnb_postop.id) as count");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
		    $query = $builder->where('cnb_preop.purpose','Sole/Primary Anaesthetic');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();
			
			if($record){
				foreach($record as $row) {
					$products[] = array(
						'day'   => 'Sole/Primary Anaesthetic',
						'sell' => floatval($row->count)
					);
				}
			}
			else{
				$products[] = array(
						'day'   => 'Sole/Primary Anaesthetic',
						'sell' => 0
					);
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("COUNT(cnb_postop.id) as count");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
		    $query = $builder->where('cnb_preop.purpose','For Analgesia only');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();
			
			if($record){
				foreach($record as $row) {
					$products[] = array(
						'day'   => 'For Analgesia only',
						'sell' => floatval($row->count)
					);
				}
			}
			else{
				$products[] = array(
						'day'   => 'For Analgesia only',
						'sell' => 0
					);
			}


			$data['products'] = ($products);

			$data['total_n'] = $total;

			return view('cnb/userReports/user_purpose_v', $data);      
			
		}
		else{
			return redirect()->route("user-n-report");
		}
    }

    public function user_consultant() {  
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){

		$builder = $db->table('cnb_postop');
		$query = $builder->select("COUNT(id) as count");
		if($from_date && $to_date){
          $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        }
        $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		$query = $builder->get();
		$record = $query->getResult();

		foreach($record as $row) {
			$total += floatval($row->count);
		}

		$data['total_n'] = $total; 

		$builder = $db->table('cnb_patient_details');
		$query = $builder->select("COUNT(id) as count, cnb_done_by2 as s");
		if($from_date && $to_date){
          $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        }
        $query = $builder->where('cnb_patient_details.dr_id ',$dr_id);
		$query = $builder->groupBy('cnb_done_by2');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$products = [];
		foreach($record as $row) {
			$products[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}

		$builder = $db->table('cnb_patient_details');
		$query = $builder->select("COUNT(id) as count, supervision as s");
		if($from_date && $to_date){
          $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        }
        $query = $builder->where('cnb_patient_details.dr_id ',$dr_id);
		$query = $builder->groupBy('supervision');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$supervision = [];
		foreach($record as $row) {
			$supervision[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}

		//$query = $db->getLastQuery();
		//echo (string)$query;
		//print_r($products); 

		$data['products'] = ($products);
		$data['supervision'] = ($supervision);

		$data['total'] = $total;       
		//$query = $db->getLastQuery();


		return view('cnb/userReports/user_consultant_v', $data);         
		
	}else{
		return redirect()->route("user-n-report");
	}
    }

    public function user_patient_status() {  
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){

		$total = session()->get('n');
			$patient_position = [];

			$awake = 0;
			$sedation = 0;
			$ga = 0;

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_csa.patient_status as patient_status");
		    $builder->join('procedure_csa', 'procedure_csa.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->patient_status == 'Awake'){
							$awake = $awake + 1;
					}
					else if($row->patient_status == 'Sedation'){
							$sedation = $sedation + 1;
					}
					else if($row->patient_status == 'GA'){
							$ga = $ga + 1;
					}
				}
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_cse.patient_status as patient_status");
		    $builder->join('procedure_cse', 'procedure_cse.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->patient_status == 'Awake'){
							$awake = $awake + 1;
					}
					else if($row->patient_status == 'Sedation'){
							$sedation = $sedation + 1;
					}
					else if($row->patient_status == 'GA'){
							$ga = $ga + 1;
					}
				}
			}
			
			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_spinal.patient_status as patient_status");
		    $builder->join('procedure_spinal', 'procedure_spinal.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->patient_status == 'Awake'){
							$awake = $awake + 1;
					}
					else if($row->patient_status == 'Sedation'){
							$sedation = $sedation + 1;
					}
					else if($row->patient_status == 'GA'){
							$ga = $ga + 1;
					}
				}
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_epidural.patient_status as patient_status");
		    $builder->join('procedure_epidural', 'procedure_epidural.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->patient_status == 'Awake'){
							$awake = $awake + 1;
					}
					else if($row->patient_status == 'Sedation'){
							$sedation = $sedation + 1;
					}
					else if($row->patient_status == 'GA'){
							$ga = $ga + 1;
					}
				}
			}

			
			$patient_position[] = array(
				'day'   => 'Awake',
				'sell' => $awake
			);
			$patient_position[] = array(
				'day'   => 'Sedation',
				'sell' => $sedation
			);
			$patient_position[] = array(
				'day'   => 'GA',
				'sell' => $ga
			);
				

			//$query = $db->getLastQuery();
			//echo (string)$query;
			//print_r($products); 

			$data['products'] = ($patient_position);
			$data['patient_position'] = ($patient_position);

			$data['total'] = $total;
			$data['total_n'] = $total;       
			//$query = $db->getLastQuery();


			return view('cnb/userReports/user_patient_status_v', $data);    
			
		}
		else{
			return redirect()->route("user-n-report");
		}
    }

     public function user_sterility_features() {  
        
			$db = \Config\Database::connect();

			$from_date = session()->get('from_date');
			$to_date = session()->get('to_date');
            $dr_id = session()->get('dr_id');
			$n = session()->get('n');
    	$n_type = gettype($n);

			if($from_date && $to_date  && $n_type != 'NULL'){

			$total = session()->get('n');

			$products = [];
			$other = [];


			$wearing_mask = 0;
			$hand_washing = 0;

			$sterile_gown = 0;
			$sterile_draping = 0;


			$Alcohol = 0;
			$Chlorhexidine = 0;
			$Betadine = 0;
			$Combinations = 0;
			$Other = 0;


			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_csa.wearing_mask,procedure_csa.hand_washing,procedure_csa.sterile_gown,procedure_csa.sterile_draping,procedure_csa.skin_prep");
		    $builder->join('procedure_csa', 'procedure_csa.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->wearing_mask == 'Yes'){
							$wearing_mask = $wearing_mask + 1;
					}
					if($row->hand_washing == 'Yes'){
							$hand_washing = $hand_washing + 1;
					}
					if($row->sterile_gown == 'Yes'){
							$sterile_gown = $sterile_gown + 1;
					}
					if($row->sterile_draping == 'Yes'){
							$sterile_draping = $sterile_draping + 1;
					}

					if($row->skin_prepartion == 'Alcohol'){
							$Alcohol = $Alcohol + 1;
					}
					else if($row->skin_prepartion == 'Chlorhexidine'){
							$Chlorhexidine = $Chlorhexidine + 1;
					}
					else if($row->skin_prepartion == 'Betadine'){
							$Betadine = $Betadine + 1;
					}
					else if($row->skin_prepartion == 'Combinations'){
							$Combinations = $Combinations + 1;
					}
					else if(substr($row->skin_prepartion,0,4) == 'Other'){
							$Other = $Other + 1;
					}
				}
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_spinal.wearing_mask,procedure_spinal.hand_washing,procedure_spinal.sterile_gown,procedure_spinal.sterile_draping,procedure_spinal.skin_prepartion");
		    $builder->join('procedure_spinal', 'procedure_spinal.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->wearing_mask == 'Yes'){
							$wearing_mask = $wearing_mask + 1;
					}
					if($row->hand_washing == 'Yes'){
							$hand_washing = $hand_washing + 1;
					}
					if($row->sterile_gown == 'Yes'){
							$sterile_gown = $sterile_gown + 1;
					}
					if($row->sterile_draping == 'Yes'){
							$sterile_draping = $sterile_draping + 1;
					}

					if($row->skin_prepartion == 'Alcohol'){
							$Alcohol = $Alcohol + 1;
					}
					else if($row->skin_prepartion == 'Chlorhexidine'){
							$Chlorhexidine = $Chlorhexidine + 1;
					}
					else if($row->skin_prepartion == 'Betadine'){
							$Betadine = $Betadine + 1;
					}
					else if($row->skin_prepartion == 'Combinations'){
							$Combinations = $Combinations + 1;
					}
					else if(substr($row->skin_prepartion,0,4) == 'Other'){
							$Other = $Other + 1;
					}
				}
			}


			$products[] = array(
				'day'   => 'Wearing Cap & Mask',
				'sell' => $wearing_mask
			);
			$products[] = array(
				'day'   => 'Hand Washing',
				'sell' => $hand_washing
			);
			$products[] = array(
				'day'   => 'Sterile Gown',
				'sell' => $sterile_gown
			);
			$products[] = array(
				'day'   => 'Sterile Draping',
				'sell' => $sterile_draping
			);


			$other[] = array(
				'day'   => 'Alcohol',
				'sell' => $Alcohol
			);
			$other[] = array(
				'day'   => 'Chlorhexidine',
				'sell' => $Chlorhexidine
			);
			$other[] = array(
				'day'   => 'Betadine',
				'sell' => $Betadine
			);
			$other[] = array(
				'day'   => 'Combinations',
				'sell' => $Combinations 
			);

			$other[] = array(
				'day'   => 'Other',
				'sell' => $Other
			);
		
			$data['products'] = ($products); 
	        $data['other'] = ($other); 
	        $data['total'] = $total; 
	        $data['total_n'] = $total; 

			return view('cnb/userReports/user_sterility_features_v', $data);              
			
		}
		else{
			return redirect()->route("user-n-report");
		}
    }

    public function user_anatomical() {  
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){

				$total = session()->get('n');
				$patient_position = [];

				$landmark1 = 0;
				$landmark2 = 0;
				$landmark3 = 0;
 
				$approach1 = 0;
				$approach2 = 0;

				$avg_csa = 0;
				$avg_cse = 0;
				$avg_spianl = 0;
				$avg_epidural = 0;

				$builder = $db->table('cnb_postop');
			    $query = $builder->select("cnb_postop.id as count, procedure_csa.anatomical_landmark,procedure_csa.approach,procedure_csa.no_attempts");
			    $builder->join('procedure_csa', 'procedure_csa.patient_id = cnb_postop.patient_id');
			    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
                $query = $builder->where('cnb_postop.dr_id ',$dr_id);
			    $query = $builder->get();
			    $record = $query->getResult();

				if($record){
					foreach($record as $row) {
						if($row->anatomical_landmark == 'Easily Palpable'){
								$landmark1 = $landmark1 + 1; 
						}
						else if($row->anatomical_landmark == 'Poorly Palpable'){
								$landmark2 = $landmark2 + 1;
						}
						else if($row->anatomical_landmark == 'Non-Palpable'){
								$landmark3 = $landmark3 + 1;
						}

						if($row->approach == 'Midline'){
							$approach1 = $approach1 + 1;
						}
						else if($row->approach == 'Paramedian'){
							$approach2 = $approach2 + 1;
						}

						$avg_csa +=  $row->no_attempts;

					}
				}

				$builder = $db->table('cnb_postop');
			    $query = $builder->select("cnb_postop.id as count, procedure_cse.anatomical_landmark,procedure_cse.approach,procedure_cse.no_attempts");
			    $builder->join('procedure_cse', 'procedure_cse.patient_id = cnb_postop.patient_id');
			    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
                $query = $builder->where('cnb_postop.dr_id ',$dr_id);
			    $query = $builder->get();
			    $record = $query->getResult();

				if($record){
					foreach($record as $row) {
						if($row->anatomical_landmark == 'Easily Palpable'){
								$landmark1 = $landmark1 + 1; 
						}
						else if($row->anatomical_landmark == 'Poorly Palpable'){
								$landmark2 = $landmark2 + 1;
						}
						else if($row->anatomical_landmark == 'Non-Palpable'){
								$landmark3 = $landmark3 + 1;
						}

						if($row->approach == 'Midline'){
							$approach1 = $approach1 + 1;
						}
						else if($row->approach == 'Paramedian'){
							$approach2 = $approach2 + 1;
						}

						$avg_cse +=  $row->no_attempts;
					}
				}

				$builder = $db->table('cnb_postop');
			    $query = $builder->select("cnb_postop.id as count, procedure_spinal.anatomical_landmark,procedure_spinal.approach,procedure_spinal.no_attempts");
			    $builder->join('procedure_spinal', 'procedure_spinal.patient_id = cnb_postop.patient_id');
			    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
                $query = $builder->where('cnb_postop.dr_id ',$dr_id);
			    $query = $builder->get();
			    $record = $query->getResult();

				if($record){
					foreach($record as $row) {
						if($row->anatomical_landmark == 'Easily Palpable'){
								$landmark1 = $landmark1 + 1; 
						}
						else if($row->anatomical_landmark == 'Poorly Palpable'){
								$landmark2 = $landmark2 + 1;
						}
						else if($row->anatomical_landmark == 'Non-Palpable'){
								$landmark3 = $landmark3 + 1;
						}

						if($row->approach == 'Midline'){
							$approach1 = $approach1 + 1;
						}
						else if($row->approach == 'Paramedian'){
							$approach2 = $approach2 + 1;
						}

						$avg_spinal +=  $row->no_attempts;
					}
				}


		 // $db = \Config\Database::connect();
		 // $query = $db->getLastQuery();
		 // echo $query;

		 // die();


				$builder = $db->table('cnb_postop');
			    $query = $builder->select("cnb_postop.id as count, procedure_epidural.anatomical_landmark,procedure_epidural.approach,procedure_epidural.no_attempts");
			    $builder->join('procedure_epidural', 'procedure_epidural.patient_id = cnb_postop.patient_id');
			    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
                $query = $builder->where('cnb_postop.dr_id ',$dr_id);
			    $query = $builder->get();
			    $record = $query->getResult();

				if($record){
					foreach($record as $row) {
						if($row->anatomical_landmark == 'Easily Palpable'){
								$landmark1 = $landmark1 + 1; 
						}
						else if($row->anatomical_landmark == 'Poorly Palpable'){
								$landmark2 = $landmark2 + 1;
						}
						else if($row->anatomical_landmark == 'Non-Palpable'){
								$landmark3 = $landmark3 + 1;
						}

						if($row->approach == 'Midline'){
							$approach1 = $approach1 + 1;
						}
						else if($row->approach == 'Paramedian'){
							$approach2 = $approach2 + 1;
						}
						$avg_epidural +=  $row->no_attempts;
					}
				}

			$products[] = array(
				'day'   => 'Easily Palpable',
				'sell' => $landmark1
			);
			$products[] = array(
				'day'   => 'Poorly Palpable',
				'sell' => $landmark2
			);
			$products[] = array(
				'day'   => 'Non-Palpable',
				'sell' => $landmark3
			);

			$approach[] = array(
				'day'   => 'Midline',
				'sell' => $approach1
			);
			$approach[] = array(
				'day'   => 'Paramedian',
				'sell' => $approach2
			);

			$attempts[] = array(
				'day'   => 'Combined Spinal Epidural',
				'sell' => $avg_cse
			);
			$attempts[] = array(
				'day'   => 'Epidural alone',
				'sell' => $avg_epidural
			);
			$attempts[] = array(
				'day'   => 'Spinal alone',
				'sell' => $avg_spinal
			);
			$attempts[] = array(
				'day'   => 'CSA - Continuous SpinalAnaesthesia',
				'sell' => $avg_csa
			);



		//$query = $db->getLastQuery();
		//echo (string)$query;
		//print_r($products); 

		$data['products'] = ($products);
		$data['approach'] = ($approach);
		$data['attempts'] = ($attempts);

		$data['total'] = $total; 
		$data['total_n'] = $total;       
		//$query = $db->getLastQuery();


		return view('cnb/userReports/user_anatomical_v', $data);               
		
	}else{
		return redirect()->route("user-n-report");
	}
    }

    public function user_ultra_sound() {  
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);


		if($from_date && $to_date  && $n_type != 'NULL'){

			$yes = 0;
			$no = 0;

			$poor = 0;
			$avg = 0;
			$good = 0;

			$total_num = 0;

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_csa.ultra_sound,procedure_csa.image_quality");
		    $builder->join('procedure_csa', 'procedure_csa.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->ultrasound == 'Yes'){
							$yes = $yes + 1;
							$total_num = $total_num  + 1;
					}
					else if($row->ultrasound == 'No'){
							$no = $no + 1;
							$total_num = $total_num  + 1;
					}
					if($row->image_quality == 'Poor'){
							$poor = $poor +1; 
					}
					else if($row->image_quality == 'Good'){
							$good = $good +1; 
					}
					else if($row->image_quality == 'Average'){
							$avg = $avg +1; 
					}
				}
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_cse.ultrasound,procedure_cse.image_quality");
		    $builder->join('procedure_cse', 'procedure_cse.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->ultrasound == 'Yes'){
							$yes = $yes + 1;
							$total_num = $total_num  + 1;
					}
					else if($row->ultrasound == 'No'){
							$no = $no + 1;
							$total_num = $total_num  + 1;
					}
					if($row->image_quality == 'Poor'){
							$poor = $poor +1; 
					}
					else if($row->image_quality == 'Good'){
							$good = $good +1; 
					}
					else if($row->image_quality == 'Average'){
							$avg = $avg +1; 
					}
				}
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_spinal.ultra_sound,procedure_spinal.image_quality");
		    $builder->join('procedure_spinal', 'procedure_spinal.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->ultrasound == 'Yes'){
							$yes = $yes + 1;
							$total_num = $total_num  + 1;
					}
					else if($row->ultrasound == 'No'){
							$no = $no + 1;
							$total_num = $total_num  + 1;
					}
					if($row->image_quality == 'Poor'){
							$poor = $poor +1; 
					}
					else if($row->image_quality == 'Good'){
							$good = $good +1; 
					}
					else if($row->image_quality == 'Average'){
							$avg = $avg +1; 
					}
				}
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_epidural.ultrasound,procedure_epidural.image_quality");
		    $builder->join('procedure_epidural', 'procedure_epidural.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->ultrasound == 'Yes'){
							$yes = $yes + 1;
							$total_num = $total_num  + 1;
					}
					else if($row->ultrasound == 'No'){
							$no = $no + 1;
							$total_num = $total_num  + 1;
					}
					if($row->image_quality == 'Poor'){
							$poor = $poor +1; 
					}
					else if($row->image_quality == 'Good'){
							$good = $good +1; 
					}
					else if($row->image_quality == 'Average'){
							$avg = $avg +1; 
					}
					
				}
			}

			$products[] = array(
				'day'   => 'Yes',
				'sell' => $yes
			);
			$products[] = array(
				'day'   => 'No',
				'sell' => $no
			);

			$image_quality[] = array(
				'day'   => 'Poor',
				'sell' => $poor
			);
			$image_quality[] = array(
				'day'   => 'Average',
				'sell' => $avg
			);
			$image_quality[] = array(
				'day'   => 'Good',
				'sell' => $good
			);

			


			$data['products'] = ($products);
			$data['image_quality'] = ($image_quality);

			// $data['total_n'] = $total_num;       
			$data['total_n'] = session()->get('n');;       
			//$query = $db->getLastQuery();


			return view('cnb/userReports/user_ultra_sound_v', $data);        
			
		}
		else{
			return redirect()->route("user-n-report");
		}
    }

       	 public function user_needle_brand() {  
        
			$db = \Config\Database::connect();

			$from_date = session()->get('from_date');
			$to_date = session()->get('to_date');
            $dr_id = session()->get('dr_id');
			$n = session()->get('n');
    	$n_type = gettype($n);

			if($from_date && $to_date  && $n_type != 'NULL'){

			$total = session()->get('n');

			
			$products = [];
			

			$needle_brand = 0;
						
			$B_Braun = 0;
			$Vygon = 0;
			$Polymed = 0;
			$Portex = 0;
			$Top = 0;
			$BD = 0;
			$Pajunk = 0;
			$Romsons = 0;
			$Other = 0;

						
			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_epidural.needle_brand");
		    $builder->join('procedure_epidural', 'procedure_epidural.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->needle_type == 'B-Braun'){
							$B_Braun = $B_Braun + 1;
					}
					else if($row->needle_type == 'Vygon'){
							$Vygon = $Vygon + 1;
					}
					else if($row->needle_type == 'Polymed'){
							$Polymed = $Polymed + 1;
					}
					else if($row->needle_type == 'Portex'){
							$Portex = $Portex + 1;
					}
					else if($row->needle_type == 'Top'){
							$Top = $Top + 1;
					}
					else if($row->needle_type == 'BD'){
							$BD = $BD + 1;
					}
					else if($row->needle_type == 'Pajunk'){
							$Pajunk = $Pajunk + 1;
					}
					else if($row->needle_type == 'Romsons'){
							$Romsons = $Romsons + 1;
					}
					else if(substr($row->needle_type,0,4) == 'Other'){
							$Other = $Other + 1;
					}

				}
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_cse.needle_brand");
		    $builder->join('procedure_cse', 'procedure_cse.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->needle_type == 'B-Braun'){
							$B_Braun = $B_Braun + 1;
					}
					else if($row->needle_type == 'Vygon'){
							$Vygon = $Vygon + 1;
					}
					else if($row->needle_type == 'Polymed'){
							$Polymed = $Polymed + 1;
					}
					else if($row->needle_type == 'Portex'){
							$Portex = $Portex + 1;
					}
					else if($row->needle_type == 'Top'){
							$Top = $Top + 1;
					}
					else if($row->needle_type == 'BD'){
							$BD = $BD + 1;
					}
					else if($row->needle_type == 'Pajunk'){
							$Pajunk = $Pajunk + 1;
					}
					else if($row->needle_type == 'Romsons'){
							$Romsons = $Romsons + 1;
					}
					else if(substr($row->needle_type,0,4) == 'Other'){
							$Other = $Other + 1;
					}

				}
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_spinal.needle_brand");
		    $builder->join('procedure_spinal', 'procedure_spinal.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->needle_type == 'B-Braun'){
							$B_Braun = $B_Braun + 1;
					}
					else if($row->needle_type == 'Vygon'){
							$Vygon = $Vygon + 1;
					}
					else if($row->needle_type == 'Polymed'){
							$Polymed = $Polymed + 1;
					}
					else if($row->needle_type == 'Portex'){
							$Portex = $Portex + 1;
					}
					else if($row->needle_type == 'Top'){
							$Top = $Top + 1;
					}
					else if($row->needle_type == 'BD'){
							$BD = $BD + 1;
					}
					else if($row->needle_type == 'Pajunk'){
							$Pajunk = $Pajunk + 1;
					}
					else if($row->needle_type == 'Romsons'){
							$Romsons = $Romsons + 1;
					}
					else if(substr($row->needle_type,0,4) == 'Other'){
							$Other = $Other + 1;
					}


				}
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_csa.needle_brand");
		    $builder->join('procedure_csa', 'procedure_csa.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->needle_type == 'B-Braun'){
							$B_Braun = $B_Braun + 1;
					}
					else if($row->needle_type == 'Vygon'){
							$Vygon = $Vygon + 1;
					}
					else if($row->needle_type == 'Polymed'){
							$Polymed = $Polymed + 1;
					}
					else if($row->needle_type == 'Portex'){
							$Portex = $Portex + 1;
					}
					else if($row->needle_type == 'Top'){
							$Top = $Top + 1;
					}
					else if($row->needle_type == 'BD'){
							$BD = $BD + 1;
					}
					else if($row->needle_type == 'Pajunk'){
							$Pajunk = $Pajunk + 1;
					}
					else if($row->needle_type == 'Romsons'){
							$Romsons = $Romsons + 1;
					}
					else if(substr($row->needle_type,0,4) == 'Other'){
							$Other = $Other + 1;
					}

				}
			}


			$products[] = array(
				'day'   => 'B-Braun',
				'sell' => $B_Braun
			);
			$products[] = array(
				'day'   => 'Vygon',
				'sell' => $Vygon
			);
			$products[] = array(
				'day'   => 'Polymed',
				'sell' => $Polymed
			);
			$products[] = array(
				'day'   => 'Portex',
				'sell' => $Portex
			);
			$products[] = array(
				'day'   => 'Top',
				'sell' => $Top
			);
			$products[] = array(
				'day'   => 'BD',
				'sell' => $BD
			);
			$products[] = array(
				'day'   => 'Pajunk',
				'sell' => $Pajunk
			);
			$products[] = array(
				'day'   => 'Romsons',
				'sell' => $Romsons
			);
			$products[] = array(
				'day'   => 'Other',
				'sell' => $Other
			);
			
			$data['products'] = ($products);
			
	         
	        $data['total'] = $total; 
	        $data['total_n'] = $total; 

			return view('cnb/userReports/user_needle_brand_v', $data);              
		}else{
		return redirect()->route("user-n-report");
	}	
		
    }


	public function user_cse_technique() {  
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);


		if($from_date && $to_date  && $n_type != 'NULL'){

			$total = session()->get('n');
			$total_rows = 0;
			$products = [];

			$single = 0;
			$double = 0;
			$dpe = 0;

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_cse.cse_technique as cse_technique");
		    $builder->join('procedure_cse', 'procedure_cse.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();


		    if($record){
				foreach($record as $row) {
					$total_rows = $total_rows + 1;
					if($row->cse_technique == 'Single Interspace Technique (Needle through Needle)'){
							$single = $single + 1;
					}
					else if($row->cse_technique == 'Double Interspace Technique'){
							$double = $double + 1;
					}
					else if($row->cse_technique == 'DPE:Dural Puncture Epidural Technique'){
							$dpe = $dpe + 1;
					}
				}
			}

			$products[] = array(
				'day'   => 'Single Interspace Technique (Needle through Needle)',
				'sell' => $single
			);
			$products[] = array(
				'day'   => 'Double Interspace Technique',
				'sell' => $double
			);
			$products[] = array(
				'day'   => 'DPE:Dural Puncture Epidural Technique',
				'sell' => $dpe
			);

			

			$data['products'] = ($products);
			
			$data['total_n'] = $total_rows;  
			$data['total'] = $total_rows;    

			return view('cnb/userReports/user_cse_technique_v', $data);       
		}
		else{
			return redirect()->route("user-n-report");
		}
    }


	public function user_csa_technique() {  
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){

		$total = session()->get('n');

			$products = [];

			$total_rows = 0;

			$intentional = 0;
			$accidental = 0;
	

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_csa.csa as csa");
		    $builder->join('procedure_csa', 'procedure_csa.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();




		    if($record){
				foreach($record as $row) {
					$total_rows = $total_rows + 1;
					if($row->csa == 'Intentional'){
							$intentional = $intentional + 1;
					}
					else if($row->csa == 'Accidental'){
							$accidental = $accidental + 1;
					}
				}
			}

			$products[] = array(
				'day'   => 'Intentional',
				'sell' => $intentional
			);
			$products[] = array(
				'day'   => 'Accidental',
				'sell' => $accidental
			);
			

			$data['products'] = ($products);
			
			$data['total_n'] = $$total_rows;  
			$data['total'] = $$total_rows;  


			$data['products'] = ($products);   

			return view('cnb/userReports/user_csa_technique_v', $data);       
			
		}
		else{
			return redirect()->route("user-n-report");
		}
    }

	public function user_stay_duration() {  
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){

		$builder = $db->table('cnb_followup');
		$query = $builder->select("COUNT(id) as count");
		if($from_date && $to_date){
          $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        }
        $query = $builder->where('cnb_followup.dr_id ',$dr_id);
		$query = $builder->get();
		$record = $query->getResult();

		$total = 0;
		$id = [];

		foreach($record as $row) {
			$total += floatval($row->count);
		}

		$data['total_n'] = $total; 

		$builder = $db->table('cnb_followup');
		$query = $builder->select("COUNT(id) as count,	duration as s");
		if($from_date && $to_date){
          $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        }
        $query = $builder->where('cnb_followup.dr_id ',$dr_id);
		$query = $builder->groupBy('duration');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$products = [];
		foreach($record as $row) {
			$products[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}

		

		$data['products'] = ($products);
		
		$data['total'] = $total;    

		// print_r($data);die();

		return view('cnb/userReports/user_stay_duration_v', $data);       
		
	}else{
		return redirect()->route("user-n-report");
	}
    }

//3.1 started
  //   public function Procedure_Outcomes() {  
        
		// $db = \Config\Database::connect();

		

		// return view('cnb/userReports/user_Procedure_Outcomes_v', $data);                
  //   }

  public function user_technical_problems() {  
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){

			$none = 0;
			$equipment = 0;
			$multipal = 0;
			$second = 0;
			$technique = 0;
			$catheter = 0;
			$failure  = 0;
			$others = 0;

//            ------------------------------SPINAL-------------------
			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_spinal.tc_equipment, procedure_spinal.tc_multiple, procedure_spinal.tc_2_anaestsetist, procedure_spinal.tc_abondoned,procedure_spinal.tc_other,");
		    $builder->join('procedure_spinal', 'procedure_spinal.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->tc_equipment == 'Yes'){
							$equipment = $equipment + 1;
					}
					if($row->tc_2_anaestsetist == 'Yes'){
							$second = $second + 1;
					}
					if($row->tc_abondoned == 'Yes'){
							$technique = $technique + 1;
					}

					if($row->tc_multiple == 'Yes'){
							$multipal = $multipal + 1;
					}
					if($row->tc_other == 'Yes'){
							$others = $others + 1;
					}
					
				}
			}


			 //            ------------------------------EPIDURAL-------------------

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_epidural.tc_equipment, procedure_epidural.tc_multiple, procedure_epidural.tc_2_anaestsetist, procedure_epidural.tc_abondoned,procedure_epidural.tc_catheter,procedure_epidural.tc_other,");
		    $builder->join('procedure_epidural', 'procedure_epidural.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->tc_equipment == 'Yes'){
							$equipment = $equipment + 1;
					}
					if($row->tc_2_anaestsetist == 'Yes'){
							$second = $second + 1;
					}
					if($row->tc_abondoned == 'Yes'){
							$technique = $technique + 1;
					}

					if($row->tc_multiple == 'Yes'){
							$multipal = $multipal + 1;
					}
					if($row->tc_catheter == 'Yes'){
						$catheter = $catheter + 1;
				}
					if($row->tc_other == 'Yes'){
							$others = $others + 1;
					}
					
				}
			}

			

			 //            ------------------------------CSA-------------------

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_csa.tc_equipment, procedure_csa.tc_multiple_attempts, procedure_csa.tc_2_anaesthetist, procedure_csa.tc_failure_space,procedure_csa.tc_catheter_related,procedure_csa.tc_other");
		    $builder->join('procedure_csa', 'procedure_csa.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->tc_equipment == 'Yes'){
							$equipment = $equipment + 1;
					}
					if($row->tc_2_anaestsetist == 'Yes'){
							$second = $second + 1;
					}
					if($row->tc_failure_space == 'Yes'){
							$technique = $technique + 1;
					}

					if($row->tc_multiple_attempts == 'Yes'){
							$multipal = $multipal + 1;
					}
					if($row->tc_catheter_related == 'Yes'){
						$catheter = $catheter + 1;
					}
					if($row->tc_other == 'Yes'){
							$others = $others + 1;
					}
					
				}
			}
			
			//            ------------------------------CSE-------------------

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_cse.tc_equipment, procedure_cse.tc_multiple_attempts, procedure_cse.tc_2nd_anaesthetist, procedure_cse.tc_failure_space,procedure_cse.tc_catheter_related,procedure_cse.tc_other");
		    $builder->join('procedure_cse', 'procedure_cse.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			// print_r($record);die();

			if($record){
				foreach($record as $row) {
					if($row->tc_equipment == 'Yes'){
							$equipment = $equipment + 1;
					}
					if($row->tc_2nd_anaesthetist == 'Yes'){
							$second = $second + 1;
					}
					if($row->tc_failure_space == 'Yes'){
							$technique = $technique + 1;
					}

					if($row->tc_multiple_attempts == 'Yes'){
							$multipal = $multipal + 1;
					}
					if($row->tc_catheter_related == 'Yes'){
						$catheter = $catheter + 1;
					}
					if($row->tc_other == 'Yes'){
							$others = $others + 1;
					}
					
				}
			}

			$total = session()->get('n');
			$products[] = array(
				'day'   => 'None',
				'sell' => $none,
				'perc' => number_format((float)(($none/$total)*100), 1, '.', '')."%",
			);
			$products[] = array(
				'day'   => 'Equipment related',
				'sell' => $equipment,
				'perc' => number_format((float)(($equipment/$total)*100), 1, '.', '')."%",
			);
			$products[] = array(
				'day'   => 'Multiple Attempts',
				'sell' => $multipal,
				'perc' => number_format((float)(($multipal/$total)*100), 1, '.', '')."%",

			);
			$products[] = array(
				'day'   => 'Second Anaesthetist',
				'sell' => $second,
				'perc' => number_format((float)(($second/$total)*100), 1, '.', '')."%",

			);
			$products[] = array(
				'day'   => 'Technique Abandoned/failure to find space',
				'sell' => $technique,
				'perc' => number_format((float)(($technique/$total)*100), 1, '.', '')."%",

			);
			$products[] = array(
				'day'   => 'Catheter Related',
				'sell' => $catheter,
				'perc' => number_format((float)(($catheter/$total)*100), 1, '.', '')."%",

			);
			$products[] = array(
				'day'   => 'Failure of spinal component of CSE',
				'sell' => $failure,
				'perc' => number_format((float)(($failure/$total)*100), 1, '.', '')."%",

			);
			$products[] = array(
				'day'   => 'Other',
				'sell' => $others,
				'perc' => number_format((float)(($others/$total)*100), 1, '.', '')."%",

			);

			
			// print_r($none);
			// print_r("<br>");
			// print_r($equipment);
			// print_r("<br>");
			// print_r($multipal);
			// print_r("<br>");
			// print_r($second);
			// print_r("<br>");
			// print_r($technique);
			// print_r("<br>");
			// print_r($catheter);
			// print_r("<br>");
			// print_r($failure);
			// print_r("<br>");
			// print_r($products);
			// print_r("<br>");
			// die();

		$data['products'] = $products;
		$data['total'] = $total;
		return view('cnb/userReports/user_technical-problems_v', $data);                            

	}else{
		return redirect()->route("user-n-report");
	}
    }
  
   public function user_acute_problems() {  
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){

			$none = 0;
			$epidural = 0;
			$last = 0;
			$respiratory = 0;
			$cardiac = 0;
			$radicular = 0;
			$paresthesia  = 0;
			$bloody  = 0;
			$wettap  = 0;
			$hypotension  = 0;
			$nausea  = 0;
			$vomiting  = 0;
			$subdural  = 0;
			$high = 0;
			$intrathecal  = 0;
			$totalSpinal  = 0;
			$accidental  = 0;
			$others = 0;


			//            ------------------------------SPINAL-------------------
			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_spinal.ac_re_arrest, procedure_spinal.ac_ca_arrest, procedure_spinal.ac_radi_pain, procedure_spinal.ac_parestsesia,procedure_spinal.ac_bloody_tap,procedure_spinal.ac_hypoten,procedure_spinal.ac_nausea,procedure_spinal.ac_vomit,procedure_spinal.ac_high_block,procedure_spinal.ac_sb_block,procedure_spinal.ac_totla_spinal,procedure_spinal.ac_other,procedure_spinal.ac_none,");
		    $builder->join('procedure_spinal', 'procedure_spinal.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
						if($row->ac_re_arrest == 'Yes'){
						$respiratory = $respiratory + 1;
						}
						if($row->ac_ca_arrest == 'Yes'){
						$cardiac = $cardiac + 1;
						}
						if($row->ac_radi_pain == 'Yes'){
						$radicular = $radicular + 1;
						}
						if($row->ac_parestsesia == 'Yes'){
						$paresthesia = $paresthesia + 1;
						}
						if($row->ac_bloody_tap == 'Yes'){
						$bloody = $bloody + 1;
						}
						if($row->ac_hypoten == 'Yes'){
						$hypotension = $hypotension + 1;
						}
						if($row->ac_nausea == 'Yes'){
						$nausea = $nausea + 1;
						}
						if($row->ac_vomit == 'Yes'){
						$vomiting = $vomiting + 1;
						}
						if($row->ac_high_block == 'Yes'){
						$high = $high + 1;
						}
						if($row->ac_sb_block == 'Yes'){
						$subdural = $subdural + 1;
						}
						if($row->ac_totla_spinal == 'Yes'){
						$totalSpinal = $totalSpinal + 1;
						}
						if($row->ac_other == 'Yes'){
						$others = $others + 1;
						}
						if($row->ac_none == 'Yes'){
						$none = $none + 1;
						}
					
					
				}
			}


				//            ------------------------------CSA-------------------
				$builder = $db->table('cnb_postop');
				$query = $builder->select("cnb_postop.id as count, procedure_csa.ac_last, procedure_csa.ac_respiratory_arrest, procedure_csa.ac_cardiac_arrest, procedure_csa.ac_radicular_pain,procedure_csa.ac_paresthesia_pain,procedure_csa.ac_bloody_tap,procedure_csa.ac_hypotension,procedure_csa.ac_nausea,procedure_csa.ac_vomiting,procedure_csa.ac_high_block,procedure_csa.ac_subdural_block,procedure_csa.ac_total_spinal,procedure_csa.ac_other,procedure_csa.ac_none");
				$builder->join('procedure_csa', 'procedure_csa.patient_id = cnb_postop.patient_id');
				$query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
				$query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
                $query = $builder->where('cnb_postop.dr_id ',$dr_id);
				$query = $builder->get();
				$record = $query->getResult();
	
				if($record){
					foreach($record as $row) {
							if($row->ac_last == 'Yes'){
							$last = $last + 1;
							}
							if($row->ac_respiratory_arrest == 'Yes'){
							$respiratory = $respiratory + 1;
							}
							if($row->ac_cardiac_arrest == 'Yes'){
							$cardiac = $cardiac + 1;
							}
							if($row->ac_radicular_pain == 'Yes'){
							$radicular = $radicular + 1;
							}
							if($row->ac_paresthesia_pain == 'Yes'){
							$paresthesia = $paresthesia + 1;
							}
							if($row->ac_bloody_tap == 'Yes'){
							$bloody = $bloody + 1;
							}
							if($row->ac_hypotension == 'Yes'){
							$hypotension = $hypotension + 1;
							}
							if($row->ac_nausea == 'Yes'){
							$nausea = $nausea + 1;
							}
							if($row->ac_vomiting == 'Yes'){
							$vomiting = $vomiting + 1;
							}
							if($row->ac_high_block == 'Yes'){
							$high = $high + 1;
							}
							if($row->ac_subdural_block == 'Yes'){
							$subdural = $subdural + 1;
							}
							if($row->ac_total_spinal == 'Yes'){
							$totalSpinal = $totalSpinal + 1;
							}
							if($row->ac_other == 'Yes'){
							$others = $others + 1;
							}
							if($row->ac_none == 'Yes'){
							$none = $none + 1;
							}
						
						
					}
				}

				//            ------------------------------EPIDURAL-------------------
				$builder = $db->table('cnb_postop');
				$query = $builder->select("cnb_postop.id as count, procedure_epidural.ac_last, procedure_epidural.ac_re_arrest, procedure_epidural.ac_ca_arrest, procedure_epidural.ac_radi_pain,procedure_epidural.ac_parestsesia,procedure_epidural.ac_bloody_tap,procedure_epidural.ac_intra_cath,procedure_epidural.ac_hypoten,procedure_epidural.ac_nausea,procedure_epidural.ac_vomit,procedure_epidural.ac_high_block,procedure_epidural.ac_sb_block,procedure_epidural.ac_totla_spinal,procedure_epidural.ac_other");
				$builder->join('procedure_epidural', 'procedure_epidural.patient_id = cnb_postop.patient_id');
				$query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
				$query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
                $query = $builder->where('cnb_postop.dr_id ',$dr_id);
				$query = $builder->get();
				$record = $query->getResult();
	
				if($record){
					foreach($record as $row) {
							if($row->ac_last == 'Yes'){
							$last = $last + 1;
							}
							if($row->ac_re_arrest == 'Yes'){
							$respiratory = $respiratory + 1;
							}
							if($row->ac_ca_arrest == 'Yes'){
							$cardiac = $cardiac + 1;
							}
							if($row->ac_radi_pain == 'Yes'){
							$radicular = $radicular + 1;
							}
							if($row->ac_parestsesia == 'Yes'){
							$paresthesia = $paresthesia + 1;
							}
							if($row->ac_bloody_tap == 'Yes'){
							$bloody = $bloody + 1;
							}
							if($row->ac_hypoten == 'Yes'){
							$hypotension = $hypotension + 1;
							}
							if($row->ac_nausea == 'Yes'){
							$nausea = $nausea + 1;
							}
							if($row->ac_vomit == 'Yes'){
							$vomiting = $vomiting + 1;
							}
							if($row->ac_high_block == 'Yes'){
							$high = $high + 1;
							}
							if($row->ac_sb_block == 'Yes'){
							$subdural = $subdural + 1;
							}
							if($row->ac_totla_spinal == 'Yes'){
							$totalSpinal = $totalSpinal + 1;
							}
							if($row->ac_other == 'Yes'){
							$others = $others + 1;
							}
							if($row->ac_intra_cath == 'Yes'){
							$intrathecal = $intrathecal + 1;
							}
						
						
					}
				}

				//            ------------------------------CSE-------------------
				$builder = $db->table('cnb_postop');
				$query = $builder->select("cnb_postop.id as count, procedure_cse.ac_epidural_resited, procedure_cse.ac_local_anaesthetic, procedure_cse.ac_respiratory_arrest, procedure_cse.ac_cardiac_arrest, procedure_cse.ac_radicular_pain,procedure_cse.ac_paresthesia_pain,procedure_cse.ac_bloody_tap,procedure_cse.ac_hypotension,procedure_cse.ac_nausea,procedure_cse.ac_vomiting,procedure_cse.ac_high_block,procedure_cse.ac_subdural_block,procedure_cse.ac_tatal_spinal,procedure_cse.ac_other,procedure_cse.ac_none,procedure_cse.ac_intrathecal_epi_catheter");
				$builder->join('procedure_cse', 'procedure_cse.patient_id = cnb_postop.patient_id');
				$query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
				$query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
                $query = $builder->where('cnb_postop.dr_id ',$dr_id);
				$query = $builder->get();
				$record = $query->getResult();
	
				if($record){
					foreach($record as $row) {
							if($row->ac_epidural_resited == 'Yes'){
							$epidural = $epidural + 1;
							}
							if($row->ac_local_anaesthetic == 'Yes'){
							$last = $last + 1;
							}
							if($row->ac_respiratory_arrest == 'Yes'){
							$respiratory = $respiratory + 1;
							}
							if($row->ac_cardiac_arrest == 'Yes'){
							$cardiac = $cardiac + 1;
							}
							if($row->ac_radicular_pain == 'Yes'){
							$radicular = $radicular + 1;
							}
							if($row->ac_paresthesia_pain == 'Yes'){
							$paresthesia = $paresthesia + 1;
							}
							if($row->ac_bloody_tap == 'Yes'){
							$bloody = $bloody + 1;
							}
							if($row->ac_hypotension == 'Yes'){
							$hypotension = $hypotension + 1;
							}
							if($row->ac_nausea == 'Yes'){
							$nausea = $nausea + 1;
							}
							if($row->ac_vomiting == 'Yes'){
							$vomiting = $vomiting + 1;
							}
							if($row->ac_high_block == 'Yes'){
							$high = $high + 1;
							}
							if($row->ac_subdural_block == 'Yes'){
							$subdural = $subdural + 1;
							}
							if($row->ac_tatal_spinal == 'Yes'){
							$totalSpinal = $totalSpinal + 1;
							}
							if($row->ac_other == 'Yes'){
							$others = $others + 1;
							}
							if($row->ac_intrathecal_epi_catheter == 'Yes'){
							$intrathecal = $intrathecal + 1;
							}
							if($row->ac_none == 'Yes'){
								$none = $none + 1;
							}
						
						
					}
				}

				$total = session()->get('n');
				$products[] = array(
					'day'   => 'Epidural re-sited',
					'sell' => $epidural,
					'perc' => number_format((float)(($epidural/$total)*100), 1, '.', '')."%",
				);
				$products[] = array(
					'day'   => 'Local Anaesthetic systemic toxicity (LAST)',
					'sell' => $last,
					'perc' => number_format((float)(($last/$total)*100), 1, '.', '')."%",
				);
				$products[] = array(
					'day'   => 'Respiratory Arrest',
					'sell' => $respiratory,
					'perc' => number_format((float)(($respiratory/$total)*100), 1, '.', '')."%",
				);
				$products[] = array(
					'day'   => 'Cardiac Arrest',
					'sell' => $cardiac,
					'perc' => number_format((float)(($cardiac/$total)*100), 1, '.', '')."%",
				);
				$products[] = array(
					'day'   => 'Radicular Pain (needle/catheter)',
					'sell' => $radicular,
					'perc' => number_format((float)(($radicular/$total)*100), 1, '.', '')."%",
				);
				$products[] = array(
					'day'   => 'Paresthesia (needle/catheter)',
					'sell' => $paresthesia,
					'perc' => number_format((float)(($paresthesia/$total)*100), 1, '.', '')."%",
				);
				$products[] = array(
					'day'   => 'Bloody Tap ( needle/catheter)',
					'sell' => $bloody,
					'perc' => number_format((float)(($bloody/$total)*100), 1, '.', '')."%",
				);
				$products[] = array(
					'day'   => 'Wet Tap/Dural puncture (Needle/Catheter)',
					'sell' => $wettap,
					'perc' => number_format((float)(($wettap/$total)*100), 1, '.', '')."%",
				);
				$products[] = array(
					'day'   => 'Hypotension',
					'sell' => $hypotension,
					'perc' => number_format((float)(($hypotension/$total)*100), 1, '.', '')."%",
				);
				$products[] = array(
					'day'   => 'Nausea',
					'sell' => $nausea,
					'perc' => number_format((float)(($nausea/$total)*100), 1, '.', '')."%",
				);
				$products[] = array(
					'day'   => 'Vomiting',
					'sell' => $vomiting,
					'perc' => number_format((float)(($vomiting/$total)*100), 1, '.', '')."%",
				);
				$products[] = array(
					'day'   => 'High block',
					'sell' => $high,
					'perc' => number_format((float)(($high/$total)*100), 1, '.', '')."%",
				);
				$products[] = array(
					'day'   => 'Subdural Block',
					'sell' => $subdural,
					'perc' => number_format((float)(($subdural/$total)*100), 1, '.', '')."%",
				);
				$products[] = array(
					'day'   => 'Intrathecal migration of epidural catheter',
					'sell' => $intrathecal,
					'perc' => number_format((float)(($intrathecal/$total)*100), 1, '.', '')."%",
				);
				$products[] = array(
					'day'   => 'Total Spinal',
					'sell' => $totalSpinal,
					'perc' => number_format((float)(($totalSpinal/$total)*100), 1, '.', '')."%",
				);
				$products[] = array(
					'day'   => 'Accidental Dural Puncture',
					'sell' => $accidental,
					'perc' => number_format((float)(($accidental/$total)*100), 1, '.', '')."%",
				);
				$products[] = array(
					'day'   => 'Other',
					'sell' => $others,
					'perc' => number_format((float)(($others/$total)*100), 1, '.', '')."%",
				);

				$data['products'] = $products;
				$data['total'] = $total;
				// print_r($total);die();

		return view('cnb/userReports/user_acute_problems_v', $data);        
		
	}else{
		return redirect()->route("user-n-report");
	}
    } 

    public function user_OP_Analgesia() {  
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);


		if($from_date && $to_date  && $n_type != 'NULL'){
			$none = 0;
			$inhalation = 0;
			$IV = 0;
			$opioids = 0;
			$paracetamol = 0;
			$ketamine = 0;
			$others = 0;
	
	
	
			//            ------------------------------CSE-------------------
			$builder = $db->table('cnb_postop');
			$query = $builder->select("cnb_postop.id as count, procedure_cse.in_analgesia, procedure_cse.asr_iv_analgesia, procedure_cse.asr_opioids, procedure_cse.asr_multi_modal, procedure_cse.asr_ketamine,procedure_cse.asr_other");
			$builder->join('procedure_cse', 'procedure_cse.patient_id = cnb_postop.patient_id');
			$query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			$query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
			$query = $builder->get();
			$record = $query->getResult();
	
			if($record){
				foreach($record as $row) {
						
						if($row->in_analgesia == 'Yes'){
						$inhalation = $inhalation + 1;
						}
						if($row->asr_iv_analgesia == 'Yes'){
						$IV = $IV + 1;
						}
						if($row->asr_opioids == 'Yes'){
						$opioids = $opioids + 1;
						}
						if($row->asr_multi_modal == 'Yes'){
						$paracetamol = $paracetamol + 1;
						}
						if($row->asr_ketamine == 'Yes'){
						$ketamine = $ketamine + 1;
						}
						if($row->asr_other == 'Yes'){
						$others = $others + 1;
						}
				}
			}
	
				//            ------------------------------SPINAL-------------------
				$builder = $db->table('cnb_postop');
				$query = $builder->select("cnb_postop.id as count, procedure_spinal.in_analgesia, procedure_spinal.asr_iv_analgesia, procedure_spinal.opioids, procedure_spinal.asr_multimode, procedure_spinal.asr_ketamine,procedure_spinal.asr_other_iv_name");
				$builder->join('procedure_spinal', 'procedure_spinal.patient_id = cnb_postop.patient_id');
				$query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
				$query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
                $query = $builder->where('cnb_postop.dr_id ',$dr_id);
				$query = $builder->get();
				$record = $query->getResult();
		
				if($record){
					foreach($record as $row) {
							
							if($row->in_analgesia == 'Yes'){
							$inhalation = $inhalation + 1;
							}
							if($row->asr_iv_analgesia == 'Yes'){
							$IV = $IV + 1;
							}
							if($row->opioids == 'Yes'){
							$opioids = $opioids + 1;
							}
							if($row->asr_multimode == 'Yes'){
							$paracetamol = $paracetamol + 1;
							}
							if($row->asr_ketamine == 'Yes'){
							$ketamine = $ketamine + 1;
							}
							if($row->asr_other_iv_name != ''){
							$others = $others + 1;
							}
					}
				}
	
					//            ------------------------------EPIDURAL-------------------
					$builder = $db->table('cnb_postop');
					$query = $builder->select("cnb_postop.id as count, procedure_epidural.in_analgesia, procedure_epidural.asr_iv_analgesia, procedure_epidural.opioids, procedure_epidural.asr_multimode, procedure_epidural.asr_ketamine,procedure_epidural.asr_other_iv_name");
					$builder->join('procedure_epidural', 'procedure_epidural.patient_id = cnb_postop.patient_id');
					$query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
					$query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
                    $query = $builder->where('cnb_postop.dr_id ',$dr_id);
					$query = $builder->get();
					$record = $query->getResult();
			
					if($record){
						foreach($record as $row) {
								
								if($row->in_analgesia == 'Yes'){
								$inhalation = $inhalation + 1;
								}
								if($row->asr_iv_analgesia == 'Yes'){
								$IV = $IV + 1;
								}
								if($row->opioids == 'Yes'){
								$opioids = $opioids + 1;
								}
								if($row->asr_multimode == 'Yes'){
								$paracetamol = $paracetamol + 1;
								}
								if($row->asr_ketamine == 'Yes'){
								$ketamine = $ketamine + 1;
								}
								if($row->asr_other_iv_name != ''){
								$others = $others + 1;
								}
						}
					}
	
					//            ------------------------------CSA-------------------
					$builder = $db->table('cnb_postop');
					$query = $builder->select("cnb_postop.id as count, procedure_csa.asr_inhalation, procedure_csa.asr_iv_analgesia, procedure_csa.asr_multi_model, procedure_csa.asr_ketamine, procedure_csa.asr_opioid_name_dose, procedure_csa.asr_other_name_dose");
					$builder->join('procedure_csa', 'procedure_csa.patient_id = cnb_postop.patient_id');
					$query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
					$query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
                    $query = $builder->where('cnb_postop.dr_id ',$dr_id);
					$query = $builder->get();
					$record = $query->getResult();
			
					if($record){
						foreach($record as $row) {
								
								if($row->asr_inhalation == 'Yes'){
								$inhalation = $inhalation + 1;
								}
								if($row->asr_iv_analgesia == 'Yes'){
								$IV = $IV + 1;
								}

								$asr_opioid_name_dose = json_decode($row->asr_opioid_name_dose);
								$op_name = 0;
								foreach($asr_opioid_name_dose as $val){
									if($val->name != ''){
									$op_name += 1;
									}
								}

								if($op_name > 0){
									$opioids = $opioids + 1;
								}

								if($row->asr_multimode == 'Yes'){
								$paracetamol = $paracetamol + 1;
								}
								if($row->asr_ketamine == 'Yes'){
								$ketamine = $ketamine + 1;
								}

								$asr_other_name_dose = json_decode($row->asr_other_name_dose);
								$other_name = 0;
								foreach($asr_other_name_dose as $val){
									if($val->name != ''){
									$other_name += 1;
									}
								}

								if($other_name > 0){
									$others = $others + 1;
								}
						}
					}
	
					$total = session()->get('n');
					$products[] = array(
						'day'   => 'Inhalation Analgesia',
						'sell' => $inhalation,
						'perc' => number_format((float)(($inhalation/$total)*100), 1, '.', '')."%",
					);
					$products[] = array(
						'day'   => 'IV analgesia',
						'sell' => $IV,
						'perc' => number_format((float)(($IV/$total)*100), 1, '.', '')."%",
					);
					$products[] = array(
						'day'   => 'Opioids',
						'sell' => $opioids,
						'perc' => number_format((float)(($opioids/$total)*100), 1, '.', '')."%",
					);
					$products[] = array(
						'day'   => 'Paracetamol / Anti-Inflammatories',
						'sell' => $paracetamol,
						'perc' => number_format((float)(($paracetamol/$total)*100), 1, '.', '')."%",
					);
					$products[] = array(
						'day'   => 'Ketamine',
						'sell' => $ketamine,
						'perc' => number_format((float)(($ketamine/$total)*100), 1, '.', '')."%",
					);
					$products[] = array(
						'day'   => 'Others',
						'sell' => $others,
						'perc' => number_format((float)(($others/$total)*100), 1, '.', '')."%",
					);
	
					$data['products'] = $products;
					$data['total'] = $total;
	
			return view('cnb/userReports/user_OP_Analgesia_v', $data);        
		
	}else{
		return redirect()->route("user-n-report");
	}
    }

     public function user_IV_Supplements() {  
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);


		if($from_date && $to_date  && $n_type != 'NULL'){

		$builder = $db->table('procedure_epidural');
		$query = $builder->select("COUNT(id) as count, la_regimen as s");
		if($from_date && $to_date){
          	$query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          	$query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        	}
            $query = $builder->where('procedure_epidural.dr_id ',$dr_id);
		$query = $builder->groupBy('la_regimen');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$la_regimen = [];
		foreach($record as $row) {
			$la_regimen[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}


		$data['products'] = ($products);
		$data['la_regimen'] = $la_regimen;

		$data['total'] = $total;

		return view('cnb/userReports/user_IV_Supplements_v', $data);      
		
	}else{
		return redirect()->route("user-n-report");
	}
    }

     public function user_Outcome_characteristics() {  
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){
			$timing = 0;
			$duration = 0;
			$bloodLose = 0;
			$vasopressor = 0;
	
	
	
			//            ------------------------------CSE-------------------
			$builder = $db->table('cnb_postop');
			$query = $builder->select("cnb_postop.id as count, STDDEV(procedure_cse.onset_of_surgical) as cse_timing, STDDEV(procedure_cse.duration_surgery) as cse_duration, STDDEV(procedure_cse.blood_loss) as cse_blood, STDDEV(procedure_cse.vasopressor_use) as cse_vasopressor,AVG(procedure_cse.onset_of_surgical) as cse_timing_avg, AVG(procedure_cse.duration_surgery) as cse_duration_avg, AVG(procedure_cse.blood_loss) as cse_blood_avg, AVG(procedure_cse.vasopressor_use) as cse_vasopressor_avg");
			// $query = $builder->select("cnb_postop.id as count, STDDEV(procedure_cse.onset_of_surgical) as cse_timing, STDDEV(procedure_cse.duration_surgery) as cse_duration, STDDEV(procedure_cse.blood_loss) as cse_blood,AVG(procedure_cse.onset_of_surgical) as cse_timing_avg, AVG(procedure_cse.duration_surgery) as cse_duration_avg, AVG(procedure_cse.b.lood_loss) as cse_blood_avg");

			// $query = $builder->select("cnb_postop.id as count, SUM(procedure_cse.onset_of_surgical)AS Total");

			$builder->join('procedure_cse', 'procedure_cse.patient_id = cnb_postop.patient_id');
			$query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			$query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
			$query = $builder->get();
			$record = $query->getResult();


	
			if($record){
				foreach($record as $row) {
						
					$cse_timing		= $row->cse_timing;
					$cse_duration	=$row->cse_duration;
					$cse_blood		=$row->cse_blood;
					$cse_vasopressor	=$row->cse_vasopressor;

					$cse_timing_avg	= $row->cse_timing_avg;
					$cse_duration_avg	=$row->cse_duration_avg;
					$cse_blood_avg		=$row->cse_blood_avg;
					$cse_vasopressor_total	=$row->cse_vasopressor_total;

					
				}
			}
				//            ------------------------------CSA-------------------
				$builder = $db->table('cnb_postop');
				// $query = $builder->select("cnb_postop.id as count, STDDEV(procedure_csa.onset_surgical_anaesthesia) as csa_timing, STDDEV(procedure_csa.duration_surgery) as csa_duration, STDDEV(procedure_csa.blood_loss) as csa_blood, AVG(procedure_csa.onset_surgical_anaesthesia) as csa_timing_avg, AVG(procedure_csa.duration_surgery) as csa_duration_avg, AVG(procedure_csa.blood_loss) as csa_blood_avg");
				
				$query = $builder->select("cnb_postop.id as count, STDDEV(procedure_csa.onset_surgical_anaesthesia) as csa_timing, STDDEV(procedure_csa.duration_surgery) as csa_duration, STDDEV(procedure_csa.blood_loss) as csa_blood, STDDEV(procedure_csa.vasopressor_use) as csa_vasopressor,	AVG(procedure_csa.onset_surgical_anaesthesia) as csa_timing_avg, AVG(procedure_csa.duration_surgery) as csa_duration_avg, AVG(procedure_csa.blood_loss) as csa_blood_avg, AVG(procedure_csa.vasopressor_use) as csa_vasopressor_avg	");
				$builder->join('procedure_csa', 'procedure_csa.patient_id = cnb_postop.patient_id');
				$query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
				$query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
                $query = $builder->where('cnb_postop.dr_id ',$dr_id);
				$query = $builder->get();
				$record = $query->getResult();
		
				if($record){
					foreach($record as $row) {
							

						$csa_timing=number_format((float)$row->csa_timing, 2, '.', '');
						$csa_duration=number_format((float)$row->csa_duration, 2, '.', '');
						$csa_blood=number_format((float)$row->csa_blood, 2, '.', '');
						$csa_vasopressor=number_format((float)$row->csa_vasopressor, 2, '.', '');

						$csa_timing_avg=number_format((float)$row->csa_timing_avg, 2, '.', '');
						$csa_duration_avg=number_format((float)$row->csa_duration_avg, 2, '.', '');
						$csa_blood_avg=number_format((float)$row->csa_blood_avg, 2, '.', '');
						$csa_vasopressor_total=number_format((float)$row->csa_vasopressor_total, 2, '.', '');
					}
				}



				//            ------------------------------SPINAL-------------------
				$builder = $db->table('cnb_postop');
				// $query = $builder->select("cnb_postop.id as count, STDDEV(procedure_spinal.surgical_anaesthesia) as s_timing, STDDEV(procedure_spinal.surgery_duration) as s_duration, STDDEV(procedure_spinal.blood_loss) as s_blood,AVG(procedure_spinal.surgical_anaesthesia) as s_timing_avg, AVG(procedure_spinal.surgery_duration) as s_duration_avg, AVG(procedure_spinal.blood_loss) as s_blood_avg");
				
				$query = $builder->select("cnb_postop.id as count, STDDEV(procedure_spinal.surgical_anaesthesia) as s_timing, STDDEV(procedure_spinal.surgery_duration) as s_duration, STDDEV(procedure_spinal.blood_loss) as s_blood, STDDEV(procedure_spinal.vasopressor_use) as s_vasopressor,AVG(procedure_spinal.surgical_anaesthesia) as s_timing_avg, AVG(procedure_spinal.surgery_duration) as s_duration_avg, AVG(procedure_spinal.blood_loss) as s_blood_avg, AVG(procedure_spinal.vasopressor_use) as s_vasopressor_avg");
				$builder->join('procedure_spinal', 'procedure_spinal.patient_id = cnb_postop.patient_id');
				$query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
				$query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
                $query = $builder->where('cnb_postop.dr_id ',$dr_id);
				$query = $builder->get();
				$record = $query->getResult();
		
				if($record){
					foreach($record as $row) {
							
						$s_timing=number_format((float)$row->s_timing, 2, '.', '');
						$s_duration=number_format((float)$row->s_duration, 2, '.', '');
						$s_blood=number_format((float)$row->s_blood, 2, '.', '');
						$s_vasopressor=number_format((float)$row->s_vasopressor, 2, '.', '');

						$s_timing_avg=number_format((float)$row->s_timing_avg, 2, '.', '');
						$s_duration_avg=number_format((float)$row->s_duration_avg, 2, '.', '');
						$s_blood_avg=number_format((float)$row->s_blood_avg, 2, '.', '');
						$s_vasopressor_total=number_format((float)$row->s_vasopressor_total, 2, '.', '');
					}
				}

				//            ------------------------------EPIDURAL-------------------
				$builder = $db->table('cnb_postop');
				// $query = $builder->select("cnb_postop.id as count, STDDEV(procedure_epidural.surgical_anaesthesia) as e_timing, STDDEV(procedure_epidural.surgery_duration) as e_duration, STDDEV(procedure_epidural.blood_loss) as e_blood,AVG(procedure_epidural.surgical_anaesthesia) as e_timing_avg, AVG(procedure_epidural.surgery_duration) as e_duration_avg, AVG(procedure_epidural.blood_loss) as e_blood_avg");
				
				$query = $builder->select("cnb_postop.id as count, STDDEV(procedure_epidural.surgical_anaesthesia) as e_timing, STDDEV(procedure_epidural.surgery_duration) as e_duration, STDDEV(procedure_epidural.blood_loss) as e_blood, STDDEV(procedure_epidural.vasopressor_use) as e_vasopressor,AVG(procedure_epidural.surgical_anaesthesia) as e_timing_avg, AVG(procedure_epidural.surgery_duration) as e_duration_avg, AVG(procedure_epidural.blood_loss) as e_blood_avg, AVG(procedure_epidural.vasopressor_use) as e_vasopressor_avg");
				$builder->join('procedure_epidural', 'procedure_epidural.patient_id = cnb_postop.patient_id');
				$query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
				$query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
                $query = $builder->where('cnb_postop.dr_id ',$dr_id);
				$query = $builder->get();
				$record = $query->getResult();
						if($record){
					foreach($record as $row) {
							
						$e_timing=number_format((float)$row->e_timing, 2, '.', '');
						$e_duration=number_format((float)$row->e_duration, 2, '.', '');
						$e_blood=number_format((float)$row->e_blood, 2, '.', '');
						$e_vasopressor=number_format((float)$row->e_vasopressor, 2, '.', '');

						$e_timing_avg=number_format((float)$row->e_timing_avg, 2, '.', '');
						$e_duration_avg=number_format((float)$row->e_duration_avg, 2, '.', '');
						$e_blood_avg=number_format((float)$row->e_blood_avg, 2, '.', '');
						$e_vasopressor_total=number_format((float)$row->e_vasopressor_total, 2, '.', '');
					}
				}
                $total = session()->get('n');
				$products[] = array(
					'name'   => 'Time to surgical anaesthesia (mins)',
					'cse' => "(".$cse_timing_avg."±".$cse_timing.")",
					'epidural' => "(".$e_timing_avg."±".$e_timing.")",
					'spinal' => "(".$s_timing_avg."±".$s_timing.")",
					'csa' => "(".$csa_timing_avg."±".$csa_timing.")",
				);

				$products[] = array(
					'name'   => 'Duration of surgery (mins) ',
					'cse' => "(".$cse_duration_avg."±".$cse_duration.")",
					'epidural' => "(".$e_duration_avg."±".$e_duration.")",
					'spinal' => "(".$s_duration_avg."±".$s_duration.")",
					'csa' => "(".$csa_duration_avg."±".$csa_duration.")",
				);

				$products[] = array(
					'name'   => 'Blood loss ml',
					'cse' => "(".$cse_blood_avg."±".$cse_blood.")",
					'epidural' => "(".$e_blood_avg."±".$e_blood.")",
					'spinal' => "(".$s_blood_avg."±".$s_blood.")",
					'csa' => "(".$csa_blood_avg."±".$csa_blood.")",
				);
				// 'perc' => number_format((float)(($others/$total)*100), 1, '.', '')."%",
				$products[] = array(
					'name'   => 'Vasopressor use',
					// 'cse' => "(".$cse_vasopressor_avg."±".$cse_vasopressor.")",
					// 'epidural' => "(".$e_vasopressor_avg."±".$e_vasopressor.")",
					// 'spinal' => "(".$s_vasopressor_avg."±".$s_vasopressor.")",
					// 'csa' => "(".$csa_vasopressor_avg."±".$csa_vasopressor.")",

					'cse' => number_format((float)(($cse_vasopressor_total/$total)*100), 1, '.', '')."%",
					'epidural' => number_format((float)(($csa_vasopressor_total/$total)*100), 1, '.', '')."%",
					'spinal' => number_format((float)(($s_vasopressor_total/$total)*100), 1, '.', '')."%",
					'csa' => number_format((float)(($e_vasopressor_total/$total)*100), 1, '.', '')."%",
				);
				// print_r($products);die();
			$data['products'] = $products;
			$data['total'] = session()->get('n');

		return view('cnb/userReports/user_Outcome_characteristics_v', $data);    
		
	}else{
		return redirect()->route("user-n-report");
	}
    }

    
     public function user_Pain_Score() {  
        
		$db = \Config\Database::connect();

	

			$from_date = session()->get('from_date');
			$to_date = session()->get('to_date');
            $dr_id = session()->get('dr_id');
			$n = session()->get('n');
    	$n_type = gettype($n);

// print_r($from_date);	
// print_r($to_date);die();		

			$total = session()->get('n');
// print_r($total);die();
if($from_date && $to_date  && $n_type != 'NULL'){
			$products = [];
			$products1 = [];
			$products2 = [];
			
			$ps_postproc = 0;
			$ps_30mins = 0;
			$ps_1hr = 0;
		
			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count,cnb_postop.ps_postproc");
		    // $builder->join('cnb_postop', 'cnb_postop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->Mild >= 0 && $row->ps_postproc  <=4){
							$ps_postproc = $ps_postproc + 1;
					}
				
					else if($row->Moderator >= 5 && $row->ps_postproc <=7){
							$ps_postproc = $ps_postproc + 1;
					}
					else if($row->Severe >=8 && $row->ps_postproc <=10){
							$ps_postproc = $ps_postproc + 1;
					}
				}
			}

			

			
			

		    $builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count,cnb_postop.ps_30mins");
		    // $builder->join('cnb_postop', 'cnb_postop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->Mild >= 0 && $row->ps_30mins  <=4){
							$ps_30mins = $ps_30mins + 1;
					}
				
					else if($row->Moderator >= 5 && $row->ps_30mins <=7){
							$ps_30mins = $ps_30mins + 1;
					}
					else if($row->Severe >=8 && $row->ps_30mins <=10){
							$ps_30mins = $ps_30mins + 1;
					}
				}	
			}

			

		    $builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count,cnb_postop.ps_1hr");
		    // $builder->join('cnb_postop', 'cnb_postop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->Mild >= 0 && $row->ps_1hr  <=4){
							$ps_1hr = $ps_1hr + 1;
					}
				
					else if($row->Moderator >= 5 && $row->ps_1hrs <=7){
							$ps_1hr = $ps_1hr + 1;
					}
					else if($row->Severe >=8 && $row->ps_30mins <=10){
							$ps_1hr = $ps_1hr + 1;
					}
				}	
			}

			
			$products[] = array(
				'day'   => 'Mild(0-4)',
				'sell' => $ps_postproc
			);
			$products[] = array(
				'day'   => 'Moderate(5-6)',
				'sell' => $ps_postproc
			);
			$products[] = array(
				'day'   => 'Severe(8-10)',
				'sell' => $ps_postproc
			);

			$products1[] = array(
				'day'   => 'Mild(0-4)',
				'sell' => $ps_30mins
			);
			$products1[] = array(
				'day'   => 'Moderate(5-6)',
				'sell' => $ps_30mins
			);
			$products1[] = array(
				'day'   => 'Severe(8-10)',
				'sell' => $ps_30mins
			);
			

			$products2[] = array(
				'day'   => 'Mild(0-4)',
				'sell' => $ps_1hr
			);
			$products2[] = array(
				'day'   => 'Moderate(5-6)',
				'sell' => $ps_1hr
			);
			$products2[] = array(
				'day'   => 'Severe(8-10)',
				'sell' => $ps_1hr
			);
			
			

						
		
		$data['products'] = ($products); 
		$data['products1'] = ($products1);
		$data['products2'] = ($products2);
	        // $data['other'] = ($other); 
	       
	        $data['total_n'] = $total; 
// print_r('hellp');
			return view('cnb/userReports/user_Pain_Score_v', $data);     
			
		}else{
			return redirect()->route("user-n-report");
		}
		
 
}


		                
    

      public function user_Nausea() {  
        
		$db = \Config\Database::connect();

	

			$from_date = session()->get('from_date');
			$to_date = session()->get('to_date');
            $dr_id = session()->get('dr_id');
			$n = session()->get('n');
    	$n_type = gettype($n);
		if($from_date && $to_date  && $n_type != 'NULL'){
// print_r($from_date);	
// print_r($to_date);die();		

			$total = session()->get('n');
// print_r($total);die();
			$products = [];
			$products1 = [];
			$products2 = [];
			
			$nvs_postproc = 0;
			$nvs_30mins = 0;
			$nvs_1hr = 0;
		
			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count,cnb_postop.nvs_postproc");
		    // $builder->join('cnb_postop', 'cnb_postop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->Mild >= 0 && $row->nvs_postproc  <=4){
							$nvs_postproc = $nvs_postproc + 1;
					}
				
					else if($row->Moderator >= 5 && $row->nvs_postproc <=7){
							$nvs_postproc = $nvs_postproc + 1;
					}
					else if($row->Severe >=8 && $row->nvs_postproc <=10){
							$nvs_postproc = $nvs_postproc + 1;
					}
				}
			}

			

			
			

		    $builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count,cnb_postop.nvs_30mins");
		    // $builder->join('cnb_postop', 'cnb_postop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->Mild >= 0 && $row->nvs_30mins  <=4){
							$nvs_30mins = $nvs_30mins + 1;
					}
				
					else if($row->Moderator >= 5 && $row->nvs_30mins <=7){
							$nvs_30mins = $nvs_30mins + 1;
					}
					else if($row->Severe >=8 && $row->nvs_30mins <=10){
							$nvs_30mins = $nvs_30mins + 1;
					}
				}	
			}

			

		    $builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count,cnb_postop.nvs_1hr");
		    // $builder->join('cnb_postop', 'cnb_postop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->Mild >= 0 && $row->nvs_1hr  <=4){
							$nvs_1hr = $nvs_1hr + 1;
					}
				
					else if($row->Moderator >= 5 && $row->nvs_1hr <=7){
							$nvs_1hr = $nvs_1hr + 1;
					}
					else if($row->Severe >=8 && $row->nvs_1hr <=10){
							$nvs_1hr = $nvs_1hr + 1;
					}
				}	
			}

			
			$products[] = array(
				'day'   => 'Mild(0-4)',
				'sell' => $nvs_postproc
			);
			$products[] = array(
				'day'   => 'Moderate(5-6)',
				'sell' => $nvs_postproc
			);
			$products[] = array(
				'day'   => 'Severe(8-10)',
				'sell' => $nvs_postproc
			);

			$products1[] = array(
				'day'   => 'Mild(0-4)',
				'sell' => $nvs_30mins
			);
			$products1[] = array(
				'day'   => 'Moderate(5-6)',
				'sell' => $nvs_30mins
			);
			$products1[] = array(
				'day'   => 'Severe(8-10)',
				'sell' => $nvs_30mins
			);
			

			$products2[] = array(
				'day'   => 'Mild(0-4)',
				'sell' => $nvs_1hr
			);
			$products2[] = array(
				'day'   => 'Moderate(5-6)',
				'sell' => $nvs_1hr
			);
			$products2[] = array(
				'day'   => 'Severe(8-10)',
				'sell' => $nvs_1hr
			);
			
			

						
		
		$data['products'] = ($products); 
		$data['products1'] = ($products1);
		$data['products2'] = ($products2);
	        // $data['other'] = ($other); 
	       
	        $data['total_n'] = $total; 

			return view('cnb/userReports/user_Nausea_v', $data);       
			
			
		}else{
			return redirect()->route("user-n-report");
		}
		
 
}


     public function user_Sedation_Scores() {  
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);


		if($from_date && $to_date   && $n_type != 'NULL'){

			$total = session()->get('n');
			$products = [];

			$total_entered = 0;

			$builder = $db->table('cnb_postop');
			$query = $builder->select("COUNT(cnb_postop.id) as count");
			$query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			$query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
			$query = $builder->where('cnb_postop.ss_postproc','0-Awake'); 
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
			$query = $builder->get();
			$record = $query->getResult();

			if($record){
				foreach($record as $row) { 
					$products[] = array(
						'day'   => '0-Awake',
						'sell' => floatval($row->count)
					);
					$total_entered += floatval($row->count);
				}
			}
			else{
				$products[] = array(
						'day'   => '0-Awake',
						'sell' => 0
					);
			}

			$builder = $db->table('cnb_postop');
			$query = $builder->select("COUNT(cnb_postop.id) as count");
			$query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			$query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
			$query = $builder->where('cnb_postop.ss_postproc','1-Mild, easy to rouse'); 
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
			$query = $builder->get();
			$record = $query->getResult();

			if($record){
				foreach($record as $row) {
					$products[] = array(
						'day'   => 'Mild (score=1)',
						'sell' => floatval($row->count)
					);
					$total_entered += floatval($row->count);
				}
			}
			else{
				$products[] = array(
						'day'   => 'Mild (score=1)',
						'sell' => 0
					);
			}

			$builder = $db->table('cnb_postop');
			$query = $builder->select("COUNT(cnb_postop.id) as count");
			$query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			$query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
			$query = $builder->where('cnb_postop.ss_postproc','2-Moderate, easy to rouse, unable to remain'); 
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
			$query = $builder->get();
			$record = $query->getResult();

			if($record){
				foreach($record as $row) {
					$products[] = array(
						'day'   => 'Moderate (score=2)',
						'sell' => floatval($row->count)
					);
					$total_entered += floatval($row->count);
				}
			}
			else{
				$products[] = array(
						'day'   => 'Moderate (score=2)',
						'sell' => 0
					);
			}

			$builder = $db->table('cnb_postop');
			$query = $builder->select("COUNT(cnb_postop.id) as count");
			$query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			$query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
			$query = $builder->where('cnb_postop.ss_postproc','3-Difficult to rouse'); 
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
			$query = $builder->get();
			$record = $query->getResult();

			if($record){
				foreach($record as $row) {
					$products[] = array(
						'day'   => 'Difficult to rouse(Score=3)',
						'sell' => floatval($row->count)
					);
					$total_entered += floatval($row->count);
				}
			}
			else{
				$products[] = array(
						'day'   => '3-Difficult to rouse',
						'sell' => 0
					);
			}

			$data['products'] = ($products); 
	    	$data['total'] = $total_entered;

			return view('cnb/userReports/user_Sedation_Scores_v', $data); 
		
		}
		else{
			return redirect()->route("user-n-report");
		}
    }

     public function user_Recovery() {  
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){

		$builder = $db->table('cnb_postop');
		$query = $builder->select("COUNT(id) as count, time_spent as s");
		if($from_date && $to_date){
          $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        }
        $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		$query = $builder->groupBy('time_spent');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$time_spent = [];
		foreach($record as $row) {
			$time_spent[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}


		$data['products'] = ($products);
		$data['time_spent'] = ($time_spent);

		$data['total2'] = $time_spent;
		$data['total'] = $total;     

		return view('cnb/userReports/user_Recovery_v', $data);    
		
	}else{
		return redirect()->route("user-n-report");
	}
    }

     public function user_Analgesia() {  
        
			$db = \Config\Database::connect();

			$from_date = session()->get('from_date');
			$to_date = session()->get('to_date');
            $dr_id = session()->get('dr_id');
			$n = session()->get('n');
    	$n_type = gettype($n);

			if($from_date && $to_date  && $n_type != 'NULL'){

			$total = session()->get('n');

			$products = [];
			


			$intravenous_opioids = 0;
			$oral_opioids = 0;
			$tramadol = 0;
			$nsaid = 0;
			$paracetamol = 0;
			$la_regimen = 0;
			$other = 0;
			


			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, cnb_postop.intravenous_opioids,cnb_postop.oral_opioids,cnb_postop.tramadol,cnb_postop.nsaid,cnb_postop.paracetamol,cnb_postop.la_regimen,cnb_postop.other");
		   
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->intravenous_opioids == 'Yes'){
							$intravenous_opioids = $intravenous_opioids + 1;
					}
					if($row->oral_opioids == 'Yes'){
							$oral_opioids = $oral_opioids + 1;
					}
					if($row->tramadol == 'Yes'){
							$tramadol = $tramadol + 1;
					}
					if($row->nsaid == 'Yes'){
							$nsaid = $nsaid + 1;
					}
					if($row->paracetamol == 'Yes'){
							$paracetamol = $paracetamol + 1;
					}
					if($row->la_regimen == 'Yes'){
							$la_regimen = $la_regimen + 1;
					}
					if($row->other == 'Yes'){
							$other = $other + 1;
					}
					
				}
			}

			

			$products[] = array(
				'day'   => 'Intravenous Opioids',
				'sell' => $intravenous_opioids
			);
			$products[] = array(
				'day'   => 'Oral Opioids',
				'sell' => $oral_opioids
			);
			$products[] = array(
				'day'   => 'Tramadol',
				'sell' => $tramadol
			);
			$products[] = array(
				'day'   => 'Nsaid',
				'sell' => $nsaid
			);
			$products[] = array(
				'day'   => 'Paracetamol',
				'sell' => $paracetamol
			);
			$products[] = array(
				'day'   => 'La Regimen',
				'sell' => $la_regimen
			);
			$products[] = array(
				'day'   => 'Other',
				'sell' => $other
			);

			
			$data['products'] = ($products); 
	        
	        $data['total'] = $total; 
	        $data['total_n'] = $total; 

			return view('cnb/userReports/user_Analgesia_v', $data);              
			
		}
		else{
			return redirect()->route("user-n-report");
		}
    }
	
	
	 public function user_Co_Morbid() {  
        
			$db = \Config\Database::connect();

			$from_date = session()->get('from_date');
			$to_date = session()->get('to_date');
            $dr_id = session()->get('dr_id');
			$n = session()->get('n');
    	$n_type = gettype($n);

			if($from_date && $to_date  && $n_type != 'NULL'){

			$total = session()->get('n');

			$products = [];
		
			$diabetes_mellitus = 0;
			$cvs_disease = 0;

			$respiratory_disease = 0;
			$neurological_disorder = 0;


			$renal_disorder = 0;
			$spin_back_problem = 0;
			$fever_infection = 0;
			$bleeding_disorder = 0;
			$anaemia = 0;
			$malignancy = 0;
			$other = 0;


			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, cnb_preop.diabetes_mellitus,cnb_preop.cvs_disease,cnb_preop.respiratory_disease,cnb_preop.neurological_disorder,cnb_preop.renal_disorder,cnb_preop.spin_back_problem,cnb_preop.fever_infection,cnb_preop.bleeding_disorder,cnb_preop.anaemia,cnb_preop.malignancy,cnb_preop.other");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->diabetes_mellitus == 'Yes'){
							$diabetes_mellitus = $diabetes_mellitus + 1;
					}
					if($row->cvs_disease == 'Yes'){
							$cvs_disease = $cvs_disease + 1;
					}
					if($row->respiratory_disease == 'Yes'){
							$respiratory_disease = $respiratory_disease + 1;
					}
					if($row->neurological_disorder == 'Yes'){
							$neurological_disorder = $neurological_disorder + 1;
					}
					if($row->renal_disorder == 'Yes'){
							$renal_disorder = $renal_disorder + 1;
					}
					if($row->spin_back_problem == 'Yes'){
							$spin_back_problem = $spin_back_problem + 1;
					}
					if($row->fever_infection == 'Yes'){
							$fever_infection = $fever_infection + 1;
					}
					if($row->bleeding_disorder == 'Yes'){
							$bleeding_disorder = $bleeding_disorder + 1;
					}
					if($row->anaemia == 'Yes'){
							$anaemia = $anaemia + 1;
					}
					if($row->malignancy == 'Yes'){
							$malignancy = $malignancy + 1;
					}
					if($row->other == 'Yes'){
							$other = $other + 1;
					}

				}
			}

			

			$products[] = array(
				'day'   => 'Diabetis Mellitus',
				'sell' => $diabetes_mellitus
			);
			$products[] = array(
				'day'   => 'CVS disease',
				'sell' => $cvs_disease
			);
			$products[] = array(
				'day'   => 'Respiratory disease',
				'sell' => $respiratory_disease
			);
			$products[] = array(
				'day'   => 'Neurological disorders',
				'sell' => $neurological_disorder
			);
			$products[] = array(
				'day'   => 'Renal Disorders',
				'sell' => $renal_disorder
			);
			$products[] = array(
				'day'   => 'Spine/back Deformities',
				'sell' => $spin_back_problem
			);
			$products[] = array(
				'day'   => 'Fever / Infection',
				'sell' => $fever_infection
			);
			$products[] = array(
				'day'   => 'Bleeding disorder',
				'sell' => $bleeding_disorder
			);
			$products[] = array(
				'day'   => 'Anaemia',
				'sell' => $anaemia
			);
			$products[] = array(
				'day'   => 'Malignancy',
				'sell' => $malignancy
			);
			$products[] = array(
				'day'   => 'Other',
				'sell' => $other
			);

			
		
			$data['products'] = ($products); 
	      
	        $data['total'] = $total; 
	        $data['total_n'] = $total; 

			return view('cnb/userReports/user_morbid_v', $data);              
			
		}
		else{
			return redirect()->route("user-n-report");
		}
    }
    
    

    public function user_Anasthetic() {  
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){



        	$total = session()->get('n');
			$cnb_done_by2 = [];
			$senior_c = 0;
			$junior_c = 0;

			$senior_t = 0;
			$junior_t = 0;

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_csa.cnb2 as done_by");
		    $builder->join('procedure_csa', 'procedure_csa.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->done_by == 'Senior Consultant'){
							$senior_c = $senior_c + 1;
					}
					else if($row->done_by == 'Junior Consultant'){
							$junior_c = $junior_c + 1;
					}
					else if($row->done_by == 'Senior Trainee'){
							$senior_t = $senior_t + 1;
					}
					else if($row->done_by == 'Junior Trainee'){
							$junior_t = $junior_t + 1;
					}
				}
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_cse.cnb2 as done_by");
		    $builder->join('procedure_cse', 'procedure_cse.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->done_by == 'Senior Consultant'){
							$senior_c = $senior_c + 1;
					}
					else if($row->done_by == 'Junior Consultant'){
							$junior_c = $junior_c + 1;
					}
					else if($row->done_by == 'Senior Trainee'){
							$senior_t = $senior_t + 1;
					}
					else if($row->done_by == 'Junior Trainee'){
							$junior_t = $junior_t + 1;
					}
				}
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_spinal.cnb2 as done_by");
		    $builder->join('procedure_spinal', 'procedure_spinal.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->done_by == 'Senior Consultant'){
							$senior_c = $senior_c + 1;
					}
					else if($row->done_by == 'Junior Consultant'){
							$junior_c = $junior_c + 1;
					}
					else if($row->done_by == 'Senior Trainee'){
							$senior_t = $senior_t + 1;
					}
					else if($row->done_by == 'Junior Trainee'){
							$junior_t = $junior_t + 1;
					}
				}
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_epidural.cnb2 as done_by");
		    $builder->join('procedure_epidural', 'procedure_epidural.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->done_by == 'Senior Consultant'){
							$senior_c = $senior_c + 1;
					}
					else if($row->done_by == 'Junior Consultant'){
							$junior_c = $junior_c + 1;
					}
					else if($row->done_by == 'Senior Trainee'){
							$senior_t = $senior_t + 1;
					}
					else if($row->done_by == 'Junior Trainee'){
							$junior_t = $junior_t + 1;
					}
				}
			}

			
			$cnb_done_by2[] = array(
				'day'   => 'Senior Consultant',
				'sell' => $senior_c
			);
			$cnb_done_by2[] = array(
				'day'   => 'Junior Consultant',
				'sell' => $junior_c
			);
			$cnb_done_by2[] = array(
				'day'   => 'Senior Trainee',
				'sell' => $senior_t
			);
			$cnb_done_by2[] = array(
				'day'   => 'Junior Trainee',
				'sell' => $junior_t
			);
				


			$data['cnb_done_by2'] = ($cnb_done_by2);

			$data['total'] = $total;   

			
			return view('cnb/userReports/user_anasthetic_v', $data);    
		
		}
		else{
			return redirect()->route("user-n-report");
		}
    }


     public function user_Supervision() {  
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){

			$total = session()->get('n');
			$supervision = [];

			$d_supervision = 0;
			$i_supervision = 0;

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_csa.supervision as supervision");
		    $builder->join('procedure_csa', 'procedure_csa.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->supervision == 'Independent Supervision'){
							$i_supervision = $i_supervision + 1;
					}
					else if($row->supervision == 'Direct Supervision'){
							$d_supervision = $d_supervision + 1;
					}
				}
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_cse.supervision as supervision");
		    $builder->join('procedure_cse', 'procedure_cse.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->supervision == 'Independent Supervision'){
							$i_supervision = $i_supervision + 1;
					}
					else if($row->supervision == 'Direct Supervision'){
							$d_supervision = $d_supervision + 1;
					}
				}
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_spinal.supervision as supervision");
		    $builder->join('procedure_spinal', 'procedure_spinal.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->supervision == 'Independent Supervision'){
							$i_supervision = $i_supervision + 1;
					}
					else if($row->supervision == 'Direct Supervision'){
							$d_supervision = $d_supervision + 1;
					}
				}
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_epidural.supervision as supervision");
		    $builder->join('procedure_epidural', 'procedure_epidural.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->supervision == 'Independent Supervision'){
							$i_supervision = $i_supervision + 1;
					}
					else if($row->supervision == 'Direct Supervision'){
							$d_supervision = $d_supervision + 1;
					}
				}
			}

			
			$supervision[] = array(
				'day'   => 'Independent Supervision',
				'sell' => $i_supervision
			);
			$supervision[] = array(
				'day'   => 'Direct Supervision',
				'sell' => $d_supervision
			);
				

		$data['products'] = ($products);
		$data['supervision'] = ($supervision);

		$data['total'] = $total;   
// print_r($total2);die();
		
		return view('cnb/userReports/user_supervision_v', $data);       
		
	}else{
		return redirect()->route("user-n-report");
	}
    }   
    public function user_Sedation() {  
       $db = \Config\Database::connect();

       $from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){
			$total = session()->get('n');
			$patient_position = [];

			$awake = 0;
			$sedation = 0;
			$ga = 0;

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_csa.patient_status as patient_status");
		    $builder->join('procedure_csa', 'procedure_csa.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->patient_status == 'Sedation -> 1-Mild easy to rouse'){
							$awake = $awake + 1;
					}
					else if($row->patient_status == 'Sedation -> 2-Moderate,easy to rouse,unable to remain awake'){
							$sedation = $sedation + 1;
					}
					else if($row->patient_status == 'Sedation -> 3-Difficult to rouse'){
							$ga = $ga + 1;
					}
				}
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_cse.patient_status as patient_status");
		    $builder->join('procedure_cse', 'procedure_cse.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->patient_status == 'Sedation -> 1-Mild easy to rouse'){
							$awake = $awake + 1;
					}
					else if($row->patient_status == 'Sedation -> 2-Moderate,easy to rouse,unable to remain awake'){
							$sedation = $sedation + 1;
					}
					else if($row->patient_status == 'Sedation -> 3-Difficult to rouse'){
							$ga = $ga + 1;
					}
				}
			}
			
			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_spinal.patient_status as patient_status");
		    $builder->join('procedure_spinal', 'procedure_spinal.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->patient_status == 'Sedation -> 1-Mild easy to rouse'){
							$awake = $awake + 1;
					}
					else if($row->patient_status == 'Sedation -> 2-Moderate,easy to rouse,unable to remain awake'){
							$sedation = $sedation + 1;
					}
					else if($row->patient_status == 'Sedation -> 3-Difficult to rouse'){
							$ga = $ga + 1;
					}
				}
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_epidural.patient_status as patient_status");
		    $builder->join('procedure_epidural', 'procedure_epidural.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->patient_status == 'Sedation -> 1-Mild easy to rouse'){
							$awake = $awake + 1;
					}
					else if($row->patient_status == 'Sedation -> 2-Moderate,easy to rouse,unable to remain awake'){
							$sedation = $sedation + 1;
					}
					else if($row->patient_status == 'Sedation -> 3-Difficult to rouse'){
							$ga = $ga + 1;
					}
				}
			}

			
			$patient_position[] = array(
				'day'   => '1-Mild easy to rouse',
				'sell' => $awake
			);
			$patient_position[] = array(
				'day'   => 'Moderate,easy to rouse,unable to remain awake',
				'sell' => $sedation
			);
			$patient_position[] = array(
				'day'   => '3-Difficult to rouse',
				'sell' => $ga
			);
				

				
			$data['products'] = ($patient_position); 
	    	$data['total'] = $total;


			return view('cnb/userReports/user_Sedation_v', $data);       
			
		}else{
			return redirect()->route("user-n-report");
		}
    }


   public function user_PatientPositon() {  
       $db = \Config\Database::connect();

       $from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){

	    $total = session()->get('n');
			$patient_position = [];

			$lateral = 0;
			$sitting = 0;
			$prone = 0;
	

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_csa.patient_position as patient_position");
		    $builder->join('procedure_csa', 'procedure_csa.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);

		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->patient_position == 'Lateral'){
							$lateral = $lateral + 1;
					}
					else if($row->patient_position == 'Sitting'){
							$sitting = $sitting + 1;
					}
					else if($row->patient_position == 'Prone'){
							$prone = $prone + 1;
					}
				}
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_cse.patient_position as patient_position");
		    $builder->join('procedure_cse', 'procedure_cse.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->patient_position == 'Lateral'){
							$lateral = $lateral + 1;
					}
					else if($row->patient_position == 'Sitting'){
							$sitting = $sitting + 1;
					}
					else if($row->patient_position == 'Prone'){
							$prone = $prone + 1;
					}
				}
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_spinal.patient_position as patient_position");
		    $builder->join('procedure_spinal', 'procedure_spinal.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->patient_position == 'Lateral'){
							$lateral = $lateral + 1;
					}
					else if($row->patient_position == 'Sitting'){
							$sitting = $sitting + 1;
					}
					else if($row->patient_position == 'Prone'){
							$prone = $prone + 1;
					}
				}
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_epidural.patient_position as patient_position");
		    $builder->join('procedure_epidural', 'procedure_epidural.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->patient_position == 'Lateral'){
							$lateral = $lateral + 1;
					}
					else if($row->patient_position == 'Sitting'){
							$sitting = $sitting + 1;
					}
					else if($row->patient_position == 'Prone'){
							$prone = $prone + 1;
					}
				}
			}

			
			$patient_position[] = array(
				'day'   => 'Lateral',
				'sell' => $lateral
			);
			$patient_position[] = array(
				'day'   => 'Sitting',
				'sell' => $sitting
			);
			$patient_position[] = array(
				'day'   => 'Prone',
				'sell' => $prone
			);
				
			$data['patient_position'] = ($patient_position);

			$data['total'] = $total;

			return view('cnb/userReports/user_Patientpositon_v', $data);            
			
		}else{
			return redirect()->route("user-n-report");
		}
    }

    public function user_vertibral_intraspace() {  
       $db = \Config\Database::connect();

       $from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){
// epidural level
		$builder = $db->table('procedure_epidural');
		$query = $builder->select("COUNT(id) as count, epedural_level as s");
		if($from_date && $to_date){
          $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        }
        $query = $builder->where('procedure_epidural.dr_id ',$dr_id);
		$query = $builder->groupBy('epedural_level');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$epedural_level = [];
		foreach($record as $row) {
			$epedural_level[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}


		$data['products'] = ($products);
		$data['epedural_level'] = $epedural_level;

		$data['total'] = $total;
// epidural_name
		$builder = $db->table('procedure_epidural');
		$query = $builder->select("COUNT(id) as count, 	epidural_level_name as s");
		if($from_date && $to_date){
          $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        }
        $query = $builder->where('procedure_epidural.dr_id ',$dr_id);
		$query = $builder->groupBy('epidural_level_name');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$epidural_level_name = [];
		foreach($record as $row) {
			$epidural_level_name[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}


		$data['products'] = ($products);
		$data['epidural_level_name'] = $epidural_level_name;

		$data['total'] = $total;

		

		return view('cnb/userReports/user_Vertebral_v', $data);       
		
	}else{
		return redirect()->route("user-n-report");
	}
    }

    public function user_Approach() {  
       $db = \Config\Database::connect();

       $from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){

	    $total = session()->get('n');
				$patient_position = [];

				$landmark1 = 0;
				$landmark2 = 0;
				$landmark3 = 0;
 
				$approach1 = 0;
				$approach2 = 0;

				$avg_csa = 0;
				$avg_cse = 0;
				$avg_spianl = 0;
				$avg_epidural = 0;

				$builder = $db->table('cnb_postop');
			    $query = $builder->select("cnb_postop.id as count, procedure_csa.anatomical_landmark,procedure_csa.approach,procedure_csa.no_attempts");
			    $builder->join('procedure_csa', 'procedure_csa.patient_id = cnb_postop.patient_id');
			    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
                $query = $builder->where('cnb_postop.dr_id ',$dr_id);
			    $query = $builder->get();
			    $record = $query->getResult();

				if($record){
					foreach($record as $row) {
						if($row->anatomical_landmark == 'Easily Palpable'){
								$landmark1 = $landmark1 + 1; 
						}
						else if($row->anatomical_landmark == 'Poorly Palpable'){
								$landmark2 = $landmark2 + 1;
						}
						else if($row->anatomical_landmark == 'Non-Palpable'){
								$landmark3 = $landmark3 + 1;
						}

						if($row->approach == 'Midline'){
							$approach1 = $approach1 + 1;
						}
						else if($row->approach == 'Paramedian'){
							$approach2 = $approach2 + 1;
						}

						$avg_csa +=  $row->no_attempts;

					}
				}

				$builder = $db->table('cnb_postop');
			    $query = $builder->select("cnb_postop.id as count, procedure_cse.anatomical_landmark,procedure_cse.approach,procedure_cse.no_attempts");
			    $builder->join('procedure_cse', 'procedure_cse.patient_id = cnb_postop.patient_id');
			    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
                $query = $builder->where('cnb_postop.dr_id ',$dr_id);
			    $query = $builder->get();
			    $record = $query->getResult();

				if($record){
					foreach($record as $row) {
						if($row->anatomical_landmark == 'Easily Palpable'){
								$landmark1 = $landmark1 + 1; 
						}
						else if($row->anatomical_landmark == 'Poorly Palpable'){
								$landmark2 = $landmark2 + 1;
						}
						else if($row->anatomical_landmark == 'Non-Palpable'){
								$landmark3 = $landmark3 + 1;
						}

						if($row->approach == 'Midline'){
							$approach1 = $approach1 + 1;
						}
						else if($row->approach == 'Paramedian'){
							$approach2 = $approach2 + 1;
						}

						$avg_cse +=  $row->no_attempts;
					}
				}

				$builder = $db->table('cnb_postop');
			    $query = $builder->select("cnb_postop.id as count, procedure_spinal.anatomical_landmark,procedure_spinal.approach,procedure_spinal.no_attempts");
			    $builder->join('procedure_spinal', 'procedure_spinal.patient_id = cnb_postop.patient_id');
			    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
                $query = $builder->where('cnb_postop.dr_id ',$dr_id);
			    $query = $builder->get();
			    $record = $query->getResult();

				if($record){
					foreach($record as $row) {
						if($row->anatomical_landmark == 'Easily Palpable'){
								$landmark1 = $landmark1 + 1; 
						}
						else if($row->anatomical_landmark == 'Poorly Palpable'){
								$landmark2 = $landmark2 + 1;
						}
						else if($row->anatomical_landmark == 'Non-Palpable'){
								$landmark3 = $landmark3 + 1;
						}

						if($row->approach == 'Midline'){
							$approach1 = $approach1 + 1;
						}
						else if($row->approach == 'Paramedian'){
							$approach2 = $approach2 + 1;
						}

						$avg_spinal +=  $row->no_attempts;
					}
				}


		 // $db = \Config\Database::connect();
		 // $query = $db->getLastQuery();
		 // echo $query;

		 // die();


				$builder = $db->table('cnb_postop');
			    $query = $builder->select("cnb_postop.id as count, procedure_epidural.anatomical_landmark,procedure_epidural.approach,procedure_epidural.no_attempts");
			    $builder->join('procedure_epidural', 'procedure_epidural.patient_id = cnb_postop.patient_id');
			    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
                $query = $builder->where('cnb_postop.dr_id ',$dr_id);
			    $query = $builder->get();
			    $record = $query->getResult();

				if($record){
					foreach($record as $row) {
						if($row->anatomical_landmark == 'Easily Palpable'){
								$landmark1 = $landmark1 + 1; 
						}
						else if($row->anatomical_landmark == 'Poorly Palpable'){
								$landmark2 = $landmark2 + 1;
						}
						else if($row->anatomical_landmark == 'Non-Palpable'){
								$landmark3 = $landmark3 + 1;
						}

						if($row->approach == 'Midline'){
							$approach1 = $approach1 + 1;
						}
						else if($row->approach == 'Paramedian'){
							$approach2 = $approach2 + 1;
						}
						$avg_epidural +=  $row->no_attempts;
					}
				}

			$products[] = array(
				'day'   => 'Easily Palpable',
				'sell' => $landmark1
			);
			$products[] = array(
				'day'   => 'Poorly Palpable',
				'sell' => $landmark2
			);
			$products[] = array(
				'day'   => 'Non-Palpable',
				'sell' => $landmark3
			);

			$approach[] = array(
				'day'   => 'Midline',
				'sell' => $approach1
			);
			$approach[] = array(
				'day'   => 'Paramedian',
				'sell' => $approach2
			);

			$attempts[] = array(
				'day'   => 'Combined Spinal Epidural',
				'sell' => $avg_cse
			);
			$attempts[] = array(
				'day'   => 'Epidural alone',
				'sell' => $avg_epidural
			);
			$attempts[] = array(
				'day'   => 'Spinal alone',
				'sell' => $avg_spinal
			);
			$attempts[] = array(
				'day'   => 'CSA - Continuous SpinalAnaesthesia',
				'sell' => $avg_csa
			);



		//$query = $db->getLastQuery();
		//echo (string)$query;
		//print_r($products); 

		$data['products'] = ($products);
		$data['approach'] = ($approach);
		$data['attempts'] = ($attempts);

		$data['total'] = $total; 
		$data['total_n'] = $total;       
			return view('cnb/userReports/user_approach_v', $data);      
			
		}else{
			return redirect()->route("user-n-report");
		}
    }

       public function user_no_attempts() {  
       $db = \Config\Database::connect();

        $from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){

	    $total = session()->get('n');
				$patient_position = [];

				$landmark1 = 0;
				$landmark2 = 0;
				$landmark3 = 0;
 
				$approach1 = 0;
				$approach2 = 0;

				$avg_csa = 0;
				$avg_cse = 0;
				$avg_spianl = 0;
				$avg_epidural = 0;

				$builder = $db->table('cnb_postop');
			    $query = $builder->select("cnb_postop.id as count, procedure_csa.anatomical_landmark,procedure_csa.approach,procedure_csa.no_attempts");
			    $builder->join('procedure_csa', 'procedure_csa.patient_id = cnb_postop.patient_id');
			    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
                $query = $builder->where('cnb_postop.dr_id ',$dr_id);
			    $query = $builder->get();
			    $record = $query->getResult();

				if($record){
					foreach($record as $row) {
						if($row->anatomical_landmark == 'Easily Palpable'){
								$landmark1 = $landmark1 + 1; 
						}
						else if($row->anatomical_landmark == 'Poorly Palpable'){
								$landmark2 = $landmark2 + 1;
						}
						else if($row->anatomical_landmark == 'Non-Palpable'){
								$landmark3 = $landmark3 + 1;
						}

						if($row->approach == 'Midline'){
							$approach1 = $approach1 + 1;
						}
						else if($row->approach == 'Paramedian'){
							$approach2 = $approach2 + 1;
						}

						$avg_csa +=  $row->no_attempts;

					}
				}

				$builder = $db->table('cnb_postop');
			    $query = $builder->select("cnb_postop.id as count, procedure_cse.anatomical_landmark,procedure_cse.approach,procedure_cse.no_attempts");
			    $builder->join('procedure_cse', 'procedure_cse.patient_id = cnb_postop.patient_id');
			    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
                $query = $builder->where('cnb_postop.dr_id ',$dr_id);
			    $query = $builder->get();
			    $record = $query->getResult();

				if($record){
					foreach($record as $row) {
						if($row->anatomical_landmark == 'Easily Palpable'){
								$landmark1 = $landmark1 + 1; 
						}
						else if($row->anatomical_landmark == 'Poorly Palpable'){
								$landmark2 = $landmark2 + 1;
						}
						else if($row->anatomical_landmark == 'Non-Palpable'){
								$landmark3 = $landmark3 + 1;
						}

						if($row->approach == 'Midline'){
							$approach1 = $approach1 + 1;
						}
						else if($row->approach == 'Paramedian'){
							$approach2 = $approach2 + 1;
						}

						$avg_cse +=  $row->no_attempts;
					}
				}

				$builder = $db->table('cnb_postop');
			    $query = $builder->select("cnb_postop.id as count, procedure_spinal.anatomical_landmark,procedure_spinal.approach,procedure_spinal.no_attempts");
			    $builder->join('procedure_spinal', 'procedure_spinal.patient_id = cnb_postop.patient_id');
			    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
                $query = $builder->where('cnb_postop.dr_id ',$dr_id);
			    $query = $builder->get();
			    $record = $query->getResult();

				if($record){
					foreach($record as $row) {
						if($row->anatomical_landmark == 'Easily Palpable'){
								$landmark1 = $landmark1 + 1; 
						}
						else if($row->anatomical_landmark == 'Poorly Palpable'){
								$landmark2 = $landmark2 + 1;
						}
						else if($row->anatomical_landmark == 'Non-Palpable'){
								$landmark3 = $landmark3 + 1;
						}

						if($row->approach == 'Midline'){
							$approach1 = $approach1 + 1;
						}
						else if($row->approach == 'Paramedian'){
							$approach2 = $approach2 + 1;
						}

						$avg_spinal +=  $row->no_attempts;
					}
				}


		 // $db = \Config\Database::connect();
		 // $query = $db->getLastQuery();
		 // echo $query;

		 // die();


				$builder = $db->table('cnb_postop');
			    $query = $builder->select("cnb_postop.id as count, procedure_epidural.anatomical_landmark,procedure_epidural.approach,procedure_epidural.no_attempts");
			    $builder->join('procedure_epidural', 'procedure_epidural.patient_id = cnb_postop.patient_id');
			    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
                $query = $builder->where('cnb_postop.dr_id ',$dr_id);
			    $query = $builder->get();
			    $record = $query->getResult();

				if($record){
					foreach($record as $row) {
						if($row->anatomical_landmark == 'Easily Palpable'){
								$landmark1 = $landmark1 + 1; 
						}
						else if($row->anatomical_landmark == 'Poorly Palpable'){
								$landmark2 = $landmark2 + 1;
						}
						else if($row->anatomical_landmark == 'Non-Palpable'){
								$landmark3 = $landmark3 + 1;
						}

						if($row->approach == 'Midline'){
							$approach1 = $approach1 + 1;
						}
						else if($row->approach == 'Paramedian'){
							$approach2 = $approach2 + 1;
						}
						$avg_epidural +=  $row->no_attempts;
					}
				}

			$products[] = array(
				'day'   => 'Easily Palpable',
				'sell' => $landmark1
			);
			$products[] = array(
				'day'   => 'Poorly Palpable',
				'sell' => $landmark2
			);
			$products[] = array(
				'day'   => 'Non-Palpable',
				'sell' => $landmark3
			);

			$approach[] = array(
				'day'   => 'Midline',
				'sell' => $approach1
			);
			$approach[] = array(
				'day'   => 'Paramedian',
				'sell' => $approach2
			);

			$attempts[] = array(
				'day'   => 'Combined Spinal Epidural',
				'sell' => $avg_cse
			);
			$attempts[] = array(
				'day'   => 'Epidural alone',
				'sell' => $avg_epidural
			);
			$attempts[] = array(
				'day'   => 'Spinal alone',
				'sell' => $avg_spinal
			);
			$attempts[] = array(
				'day'   => 'CSA - Continuous SpinalAnaesthesia',
				'sell' => $avg_csa
			);



		//$query = $db->getLastQuery();
		//echo (string)$query;
		//print_r($products); 

		$data['products'] = ($products);
		$data['approach'] = ($approach);
		$data['no_attempts'] = ($attempts);

		$data['total'] = $total; 
		$data['total_n'] = $total;       
			return view('cnb/userReports/user_noattempts_v', $data);      
			
		}else{
			return redirect()->route("user-n-report");
		}
    }

     public function user_Technique() {  
       $db = \Config\Database::connect();
       $from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);


		if($from_date && $to_date  && $n_type != 'NULL'){

	    $builder = $db->table('procedure_epidural');
		$query = $builder->select("COUNT(id) as count, technique as s");
		if($from_date && $to_date){
          $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        }
        $query = $builder->where('procedure_epidural.dr_id ',$dr_id);
		$query = $builder->groupBy('technique');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$technique = [];
		foreach($record as $row) {
			$technique[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}


		$data['products'] = ($products);
		$data['technique'] = $technique;

		$data['total'] = $total;
// cath mark
		$builder = $db->table('procedure_epidural');
		$query = $builder->select("COUNT(id) as count, 	cath_mark as s");
		if($from_date && $to_date){
          $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        }
        $query = $builder->where('procedure_epidural.dr_id ',$dr_id);
		$query = $builder->groupBy('cath_mark');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$cath_mark = [];
		foreach($record as $row) {
			$cath_mark[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}


		$data['products'] = ($products);
		$data['cath_mark'] = $cath_mark;

		$data['total'] = $total;

			return view('cnb/userReports/user_technique', $data);       
			
			
		}else{
			return redirect()->route("user-n-report");
		}
    }

        public function user_Epidural_LA() {  
         
        
    $db = \Config\Database::connect();

  

      $from_date = session()->get('from_date');
      $to_date = session()->get('to_date');
      $dr_id = session()->get('dr_id');
	  $n = session()->get('n');
    	$n_type = gettype($n);
   
      if($from_date && $to_date  && $n_type != 'NULL'){
      $total = session()->get('n');

      $products = [];
      $products1 = [];
      
      $la_ropivacaine = 0;
      $la_bupivacaine = 0;
      $la_levobupivacaine = 0;
      $la_lignocaine = 0;

      $la_ropivacaine1 = 0;
      $la_bupivacaine1 = 0;
      $la_levobupivacaine1 = 0;
      $la_lignocaine1 = 0;

     
        $builder = $db->table('cnb_postop');
        $query = $builder->select("cnb_postop.id as count, procedure_epidural.la_ropivacaine,procedure_epidural.la_bupivacaine,procedure_epidural.la_levobupivacaine,procedure_epidural.la_lignocaine");
        $builder->join('procedure_epidural', 'procedure_epidural.patient_id = cnb_postop.patient_id');
        $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
        $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
        $query = $builder->where('cnb_postop.dr_id ',$dr_id);
        $query = $builder->get();
        $record = $query->getResult();
	
    
      if($record){
        foreach($record as $row) {
			if(strpos($row->la_ropivacaine, 'Without') == true){
				$la_ropivacaine = $la_ropivacaine + 1;
				}
			if(strpos($row->la_bupivacaine, 'Without') == true){
				$la_bupivacaine = $la_bupivacaine + 1;
					}
			if(strpos($row->la_levobupivacaine, 'Without') == true){
				$la_levobupivacaine = $la_levobupivacaine + 1;
			}
			if(strpos($row->la_lignocaine, 'Without') == true){
				$la_lignocaine = $la_lignocaine + 1;
			}

			if(strpos($row->la_ropivacaine, 'With') == true){
				$la_ropivacaine1 = $la_ropivacaine1 + 1;
			}
			
			if(strpos($row->la_bupivacaine, 'With') == true){
				$la_bupivacaine1 = $la_bupivacaine1 + 1;
				}
			
			if(strpos($row->la_levobupivacaine, 'With') == true){
				$la_levobupivacaine1 = $la_levobupivacaine1 + 1;
				}
            
			if(strpos($row->la_lignocaine, 'With') == true){
				$la_lignocaine1 = $la_lignocaine1 + 1;
				}
            
        }
      }

	$builder = $db->table('cnb_postop');
        $query = $builder->select("cnb_postop.id as count, procedure_cse.la_ropivacaine,procedure_cse.la_bupivacaine,procedure_cse.la_levobupivacaine,procedure_cse.la_lignocaine");
        $builder->join('procedure_cse', 'procedure_cse.patient_id = cnb_postop.patient_id');
        $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
        $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
        $query = $builder->where('cnb_postop.dr_id ',$dr_id);
        $query = $builder->get();
        $record = $query->getResult();
	
    
      if($record){
        foreach($record as $row) {
			if(strpos($row->la_ropivacaine, 'Without') == true){
				$la_ropivacaine = $la_ropivacaine + 1;
				}
			if(strpos($row->la_levobupivacaine, 'Without') == true){
				$la_bupivacaine = $la_bupivacaine + 1;
					}
			if(strpos($row->la_bupivacaine, 'Without') == true){
				$la_levobupivacaine = $la_levobupivacaine + 1;
			}
			if(strpos($row->la_lignocaine, 'Without') == true){
				$la_lignocaine = $la_lignocaine + 1;
			}

			if(strpos($row->la_ropivacaine, 'With') == true){
				$la_ropivacaine1 = $la_ropivacaine1 + 1;
			}
			
			if(strpos($row->la_bupivacaine, 'With') == true){
				$la_bupivacaine1 = $la_bupivacaine1 + 1;
				}
			
			if(strpos($row->la_levobupivacaine, 'With') == true){
				$la_levobupivacaine1 = $la_levobupivacaine1 + 1;
				}
            
			if(strpos($row->la_lignocaine, 'With') == true){
				$la_lignocaine1 = $la_lignocaine1 + 1;
				}
            
        }
      }


      
      $products[] = array(
        'day'   => 'la_ropivacaine',
        'sell' => $la_ropivacaine
      );
      $products[] = array(
        'day'   => 'la_bupivacaine',
        'sell' => $la_bupivacaine
      );
      $products[] = array(
        'day'   => 'la_levobupivacaine',
        'sell' => $la_levobupivacaine
      );
      $products[] = array(
        'day'   => 'la_lignocaine',
        'sell' => $la_lignocaine
      );  

      $products1[] = array(
        'day'   => 'la_ropivacaine1',
        'sell' => $la_ropivacaine1
      );
      $products1[] = array(
        'day'   => 'la_bupivacaine1',
        'sell' => $la_bupivacaine1
      );
      $products1[] = array(
        'day'   => 'la_levobupivacaine1',
        'sell' => $la_levobupivacaine1
      );
      $products1[] = array(
        'day'   => 'la_lignocaine1',
        'sell' => $la_lignocaine1
      );
      
    
      $data['products'] = ($products); 
      $data['products1'] = ($products1);

      $data['total_n'] = $total; 

      return view('cnb/userReports/user_epiduralLA_v', $data);             
    }else{
		return redirect()->route("user-n-report");
	}
 
}

   public function user_CSA_LA() {  
         
        
    $db = \Config\Database::connect();

  

      $from_date = session()->get('from_date');
      $to_date = session()->get('to_date');
      $dr_id = session()->get('dr_id');
	  $n = session()->get('n');
    	$n_type = gettype($n);

// print_r($from_date);  
// print_r($to_date);die();    
	if($from_date && $to_date  && $n_type != 'NULL'){
      $total = session()->get('n');
// print_r($total);die();
      $products = [];
 
      
      $la_ropivacaine = 0;
      $la_bupivacaine = 0;
      $la_prilocaine = 0;
      $la_lignocaine = 0;
      $la_2_chloroprocaine = 0;
      $la_otheraine = 0;

      $la_ropivacaine1 = 0;
      $la_bupivacaine1 = 0;
      $la_prilocaine1 = 0;
      $la_lignocaine1 = 0;
      $la_2_chloroprocaine1 = 0;
      $la_otheraine1 = 0;

     
        $builder = $db->table('cnb_postop');
        $query = $builder->select("cnb_postop.id as count,procedure_spinal.la_ropivacaine,procedure_spinal.la_bupivacaine,procedure_spinal.la_prilocaine,procedure_spinal.la_lignocaine,procedure_spinal.la_otheraine");
        $builder->join('procedure_spinal', 'procedure_spinal.patient_id = cnb_postop.patient_id');
        $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
        $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
        $query = $builder->where('cnb_postop.dr_id ',$dr_id);
        $query = $builder->get();
        $record = $query->getResult();

      if($record){
        foreach($record as $row) {
			if(strpos($row->la_ropivacaine, 'Heavy') == true){
				$la_ropivacaine = $la_ropivacaine + 1;
				}
			if(strpos($row->la_bupivacaine , 'Heavy') == true){
				$la_bupivacaine = $la_bupivacaine + 1;
					}
			if(strpos($row->la_prilocaine, 'Heavy') == true){
				$la_prilocaine = $la_prilocaine + 1;
			}
			if(strpos($row->la_lignocaine, 'Heavy') == true){
				$la_lignocaine = $la_lignocaine + 1;
			}
			
			if(strpos($row->la_otheraine, 'Heavy') == true){
				$la_otheraine = $la_otheraine + 1;
			}

			if(strpos($row->la_ropivacaine, 'Iso/Hypobaric') == true){
				$la_ropivacaine1 = $la_ropivacaine1 + 1;
			}
			
			if(strpos($row->la_bupivacaine, 'Iso/Hypobaric') == true){
				$la_bupivacaine1 = $la_bupivacaine1 + 1;
				} 
			if(strpos($row->la_prilocaine, 'Iso/Hypobaric') == true){
				$la_prilocaine1 = $la_prilocaine1 + 1;
			}         
			if(strpos($row->la_lignocaine, 'Iso/Hypobaric') == true){
				$la_lignocaine1 = $la_lignocaine1 + 1;
				}
           
			if(strpos($row->la_otheraine, 'with Hypobaric') == true){
				$la_otheraine1 = $la_otheraine1 + 1;
			}
        }
      }

	$builder = $db->table('cnb_postop');
        $query = $builder->select("cnb_postop.id as count,procedure_cse.la_ropivacaine,procedure_cse.la_bupivacaine,procedure_cse.la_levobupivacaine,procedure_cse.la_lignocaine");
        $builder->join('procedure_cse', 'procedure_cse.patient_id = cnb_postop.patient_id');
        $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
        $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
        $query = $builder->where('cnb_postop.dr_id ',$dr_id);
        $query = $builder->get();
        $record = $query->getResult();

      if($record){
        foreach($record as $row) {
			if(strpos($row->la_ropivacaine, 'Heavy') == true){
				$la_ropivacaine = $la_ropivacaine + 1;
				}
			if(strpos($row->la_bupivacaine , 'Heavy') == true){
				$la_bupivacaine = $la_bupivacaine + 1;
					}
			if(strpos($row->la_levobupivacaine , 'Heavy') == true){
				$la_levobupivacaine = $la_levobupivacaine + 1;
					}
			if(strpos($row->la_lignocaine, 'Heavy') == true){
				$la_lignocaine = $la_lignocaine + 1;
			}
			
			

			if(strpos($row->la_ropivacaine, 'Iso/Hypobaric') == true){
				$la_ropivacaine1 = $la_ropivacaine1 + 1;
			}
			
			if(strpos($row->la_bupivacaine, 'Iso/Hypobaric') == true){
				$la_bupivacaine1 = $la_bupivacaine1 + 1;
				}   
			 if(strpos($row->la_levobupivacaine , 'Heavy') == true){
				$la_levobupivacaine1 = $la_levobupivacaine1 + 1;
					}     
			if(strpos($row->la_lignocaine, 'Iso/Hypobaric') == true){
				$la_lignocaine1 = $la_lignocaine1 + 1;
				}
           
        }
      }


$builder = $db->table('cnb_postop');
        $query = $builder->select("cnb_postop.id as count,procedure_csa.rupivacaine,procedure_csa.chloroprocaine,procedure_csa.prilocaine,procedure_csa.bupivacaine,procedure_csa.lignocaline");
        $builder->join('procedure_csa', 'procedure_csa.patient_id = cnb_postop.patient_id');
        $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
        $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
        $query = $builder->where('cnb_postop.dr_id ',$dr_id);
        $query = $builder->get();
        $record = $query->getResult();

      if($record){
        foreach($record as $row) {
			if(strpos($row->rupivacaine, 'Heavy') == true){
				$la_ropivacaine = $la_ropivacaine + 1;
				}
			if(strpos($row->bupivacaine , 'Heavy') == true){
				$la_bupivacaine = $la_bupivacaine + 1;
					}
			if(strpos($row->prilocaine, 'Heavy') == true){
				$la_prilocaine = $la_prilocaine + 1;
			}
			if(strpos($row->lignocaine, 'Heavy') == true){
				$la_lignocaine = $la_lignocaine + 1;
			}
			if(strpos($row->chloroprocaine, 'Heavy') == true){
				$la_2_chloroprocaine1 = $la_2_chloroprocaine1 + 1;
			}

			if(strpos($row->ropivacaine, 'Iso/Hypobaric') == true){
				$la_ropivacaine1 = $la_ropivacaine1 + 1;
			}
			
			if(strpos($row->bupivacaine, 'Iso/Hypobaric') == true){
				$la_bupivacaine1 = $la_bupivacaine1 + 1;
				}   
			if(strpos($row->prilocaine, 'Iso/Hypobaric') == true){
				$la_prilocaine1 = $la_prilocaine1 + 1;
			}       
			if(strpos($row->lignocaine, 'Iso/Hypobaric') == true){
				$la_lignocaine1 = $la_lignocaine1 + 1;
				}
           
			if(strpos($row->chloroprocaine, 'with Hypobaric') == true){
				$la_2_chloroprocaine1 = $la_2_chloroprocaine1 + 1;
			}
        }
      }

      

      $products[] = array(
        'day'   => 'la_ropivacaine',
        'sell' => $la_ropivacaine
      );
      $products[] = array(
        'day'   => 'la_bupivacaine',
        'sell' => $la_bupivacaine
      );
      $products[] = array(
        'day'   => 'la_prilocaine',
        'sell' => $la_prilocaine
      ); 
      $products[] = array(
        'day'   => 'la_lignocaine',
        'sell' => $la_lignocaine
      ); 
    
      $products[] = array(
        'day'   => 'la_otheraine',
        'sell' => $la_otheraine
      ); 
      $products[] = array(
        'day'   => 'la_2_chloroprocaine1',
        'sell' => $la_2_chloroprocaine
      );
      $products1[] = array(
        'day'   => 'la_ropivacaine1',
        'sell' => $la_ropivacaine1
      );
      $products1[] = array(
        'day'   => 'la_bupivacaine1',
        'sell' => $la_bupivacaine1
      );
      $products1[] = array(
        'day'   => 'la_prilocaine1',
        'sell' => $la_prilocaine1
      ); 
      $products1[] = array(
        'day'   => 'la_lignocaine1',
        'sell' => $la_lignocaine1
      );
  
      $products1[] = array(
        'day'   => 'la_otheraine1',
        'sell' => $la_otheraine1
      ); 
      $products1[] = array(
        'day'   => 'la_2_chloroprocaine1',
        'sell' => $la_2_chloroprocaine1
      );
 
 
      $data['products'] = ($products); 
      $data['products1'] = ($products1);

      $data['total_n'] = $total; 

      return view('cnb/userReports/user_csaLA_v', $data);             
    }else{
		return redirect()->route("user-n-report");
	}
 
}// Epidural Component Single Dose
    public function user_epidural_singledose() {  
        $db = \Config\Database::connect();

        $from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){
// ropivaccine
        $builder = $db->table('procedure_epidural');
		$query = $builder->select("COUNT(id) as count, 	la_ropivacaine as s");
		if($from_date && $to_date){
          $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        }
        $query = $builder->where('procedure_epidural.dr_id ',$dr_id);
		$query = $builder->groupBy('la_ropivacaine');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$la_ropivacaine = [];
		foreach($record as $row) {
			$la_ropivacaine[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}

		$data['products'] = ($products);
		$data['la_ropivacaine'] = ($la_ropivacaine);

		$data['total'] = $la_ropivacaine;
// Bupivaccine
		$builder = $db->table('procedure_epidural');
		$query = $builder->select("COUNT(id) as count, la_bupivacaine as s");
		if($from_date && $to_date){
          $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        }
        $query = $builder->where('procedure_epidural.dr_id ',$dr_id);
		$query = $builder->groupBy('la_bupivacaine');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$la_bupivacaine = [];
		foreach($record as $row) {
			$la_bupivacaine[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}


		$data['products'] = ($products);
		$data['la_bupivacaine'] = ($la_bupivacaine);

		$data['total1'] = $la_bupivacaine;
// levobupivaccine
		$builder = $db->table('procedure_epidural');
		$query = $builder->select("COUNT(id) as count, la_levobupivacaine as s");
		if($from_date && $to_date){
          $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        }
        $query = $builder->where('procedure_epidural.dr_id ',$dr_id);
		$query = $builder->groupBy('la_levobupivacaine');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$la_levobupivacaine = [];
		foreach($record as $row) {
			$la_levobupivacaine[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}


		$data['products'] = ($products);
		$data['la_levobupivacaine'] = ($la_levobupivacaine);

		$data['total2'] = $la_levobupivacaine;
// ligovaccine
		$builder = $db->table('procedure_epidural');
		$query = $builder->select("COUNT(id) as count, la_lignocaine as s");
		if($from_date && $to_date){
          $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        }
        $query = $builder->where('procedure_epidural.dr_id ',$dr_id);
		$query = $builder->groupBy('la_lignocaine');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$la_lignocaine = [];
		foreach($record as $row) {
			$la_lignocaine[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}


		$data['products'] = ($products);
		$data['la_lignocaine'] = ($la_lignocaine);

		$data['total3'] = $la_lignocaine;
//opiod name
		$builder = $db->table('procedure_epidural');
		$query = $builder->select("COUNT(id) as count, opioid_name as s");
		if($from_date && $to_date){
          $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        }
        $query = $builder->where('procedure_epidural.dr_id ',$dr_id);
		$query = $builder->groupBy('opioid_name');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$opioid_name = [];
		foreach($record as $row) {
			$opioid_name[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}


		$data['products'] = ($products);
		$data['opioid_name'] = ($opioid_name);

		$data['total4'] = $opioid_name;
// opioid dose
		$builder = $db->table('procedure_epidural');
		$query = $builder->select("COUNT(id) as count, opioid_dose as s");
		if($from_date && $to_date){
          $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        }
        $query = $builder->where('procedure_epidural.dr_id ',$dr_id);
		$query = $builder->groupBy('opioid_dose');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$opioid_dose = [];
		foreach($record as $row) {
			$opioid_dose[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}

		$data['products'] = ($products);
		$data['opioid_dose'] = ($opioid_dose);

		$data['total5'] = $opioid_dose;
// Clonidne with Dose(mcgm)
		$builder = $db->table('procedure_epidural');
		$query = $builder->select("COUNT(id) as count, clonidina_dose as s");
		if($from_date && $to_date){
          $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        }
        $query = $builder->where('procedure_epidural.dr_id ',$dr_id);
		$query = $builder->groupBy('clonidina_dose');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$clonidina_dose = [];
		foreach($record as $row) {
			$clonidina_dose[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}


		$data['products'] = ($products);
		$data['clonidina_dose'] = ($clonidina_dose);

		$data['total6'] = $clonidina_dose;
// Dexmeditomidine with Dose(mcgm)
		$builder = $db->table('procedure_epidural');
		$query = $builder->select("COUNT(id) as count, dexmeditomidine_dose as s");
		if($from_date && $to_date){
          $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        }
        $query = $builder->where('procedure_epidural.dr_id ',$dr_id);
		$query = $builder->groupBy('dexmeditomidine_dose');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$dexmeditomidine_dose = [];
		foreach($record as $row) {
			$dexmeditomidine_dose[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}


		// $data['products'] = ($products);
		$data['dexmeditomidine_dose'] = ($dexmeditomidine_dose);

		$data['total7'] = $dexmeditomidine_dose;
// Dexamethasone with Dose(mg)
		$builder = $db->table('procedure_epidural');
		$query = $builder->select("COUNT(id) as count, dexmeditomidine_dose as s");
		if($from_date && $to_date){
          $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        }
		$query = $builder->groupBy('dexmeditomidine_dose');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$dexmeditomidine_dose = [];
		foreach($record as $row) {
			$dexmeditomidine_dose[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}


		$data['products'] = ($products);
		$data['dexmeditomidine_dose'] = ($dexmeditomidine_dose);

		$data['total7'] = $dexmeditomidine_dose;


		return view('cnb/userReports/user_epidural_singledose_v', $data);    
		
	}else{
		return redirect()->route("user-n-report");
	}
    }
public function user_median_sensory() {  
        $db = \Config\Database::connect();

        $from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){
// motor level
        $builder = $db->table('procedure_epidural');
		$query = $builder->select("COUNT(id) as count, motor_level as s");
		if($from_date && $to_date){
          $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        }
        $query = $builder->where('procedure_epidural.dr_id ',$dr_id);
		$query = $builder->groupBy('motor_level');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$motor_level = [];
		foreach($record as $row) {
			$motor_level[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}


		$data['products'] = ($products);
		$data['motor_level'] = ($motor_level);

		$data['total'] = $total;
// onset of surgical_anaesthesia
		$builder = $db->table('procedure_epidural');
		$query = $builder->select("COUNT(id) as count, onset as s");
		if($from_date && $to_date){
          $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        }
        $query = $builder->where('procedure_epidural.dr_id ',$dr_id);
		$query = $builder->groupBy('onset');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$onset = [];
		foreach($record as $row) {
			$onset[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}


		$data['products'] = ($products);
		$data['onset'] = ($onset);

		$data['total'] = $total;



        return view('cnb/userReports/user_median_sensory_v', $data);      
		
	}else{
		return redirect()->route("user-n-report");
	}
    }


          public function user_motor_block() {  
        $db = \Config\Database::connect();

        $from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){


        $builder = $db->table('procedure_epidural');
		$query = $builder->select("COUNT(id) as count, ac_motor_block as s");
		if($from_date && $to_date){
          $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        }
        $query = $builder->where('procedure_epidural.dr_id ',$dr_id);
		$query = $builder->groupBy('ac_motor_block');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$ac_motor_block = [];
		foreach($record as $row) {
			$ac_motor_block[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}


		$data['products'] = ($products);
		$data['ac_motor_block'] = ($ac_motor_block);

		$data['total'] = $total;



        return view('cnb/userReports/user_motor_block_v', $data);             
		
	}else{
		return redirect()->route("user-n-report");
	}
    }
// Rahul
       	 public function user_epidural_needle() {  
        
			$db = \Config\Database::connect();

			$from_date = session()->get('from_date');
			$to_date = session()->get('to_date');
            $dr_id = session()->get('dr_id');
			$n = session()->get('n');
    	$n_type = gettype($n);

			if($from_date && $to_date  && $n_type != 'NULL'){

			$total = session()->get('n');

			
			$products = [];
			$other1 = [];
			$products1 = [];
			$products2 = [];

			$needle_type = 0;
			$needle_size = 0;

			
			$Touhy = 0;
			$Crawford = 0;
			$Hustead = 0;
			$Other = 0;


			$g1 = 0;
			$g2 = 0;
			$g3 = 0;
			$g4= 0;
			$g5 = 0;
			$g6 = 0;
			$g7 = 0;
			$g8 = 0;
			$g9 = 0;


						
			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_epidural.needle_type,procedure_epidural.needle_size,procedure_epidural.needle_type,procedure_epidural.needle_size,procedure_epidural.needle_type,procedure_epidural.needle_size");
		    $builder->join('procedure_epidural', 'procedure_epidural.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->needle_type == 'Hustead'){
							$Hustead = $Hustead + 1;
					}
					else if($row->needle_type == 'Crawford'){
							$Crawford = $Crawford + 1;
					}
					else if($row->needle_type == 'Touhy'){
							$Touhy = $Touhy + 1;
					}
					else if(substr($row->needle_type,0,4) == 'Other'){
							$Other = $Other + 1;
					}

					if($row->needle_size == '16G'){
							$g1 = $g1 + 1;
					}
					else if($row->needle_size == '17G'){
							$g2 = $g2 + 1;
					}
					else if($row->needle_size == '18G'){
							$g3 = $g3 + 1;
					}
					else if($row->needle_size == '19G'){
							$g4 = $g4 + 1;
					}
					else if($row->needle_size == '20G'){
							$g5 = $g5 + 1;
					}
					else if($row->needle_size == '21G'){
							$g6 = $g6 + 1;
					}
					else if($row->needle_size == '22G'){
							$g7 = $g7 + 1;
					}
					else if($row->needle_size == '23G'){
							$g8 = $g8 + 1;
					}
					else if($row->needle_size == '24G'){
							$g9 = $g9 + 1;
					}
				}
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_cse.needle_type,procedure_cse.needle_size");
		    $builder->join('procedure_cse', 'procedure_cse.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->needle_type == 'Hustead'){
							$Hustead = $Hustead + 1;
					}
					else if($row->needle_type == 'Crawford'){
							$Crawford = $Crawford + 1;
					}
					else if($row->needle_type == 'Touhy'){
							$Touhy = $Touhy + 1;
					}
					else if(substr($row->needle_type,0,4) == 'Other'){
							$Other = $Other + 1;
					}

					if($row->needle_size == '16G'){
							$g1 = $g1 + 1;
					}
					else if($row->needle_size == '17G'){
							$g2 = $g2 + 1;
					}
					else if($row->needle_size == '18G'){
							$g3 = $g3 + 1;
					}
					else if($row->needle_size == '19G'){
							$g4 = $g4 + 1;
					}
					else if($row->needle_size == '20G'){
							$g5 = $g5 + 1;
					}
					else if($row->needle_size == '21G'){
							$g6 = $g6 + 1;
					}
					else if($row->needle_size == '22G'){
							$g7 = $g7 + 1;
					}
					else if($row->needle_size == '23G'){
							$g8 = $g8 + 1;
					}
					else if($row->needle_size == '24G'){
							$g9 = $g9 + 1;
					}
				}
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_spinal.needle_type,procedure_spinal.needle_size");
		    $builder->join('procedure_spinal', 'procedure_spinal.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->needle_type == 'Hustead'){
							$Hustead = $Hustead + 1;
					}
					else if($row->needle_type == 'Crawford'){
							$Crawford = $Crawford + 1;
					}
					else if($row->needle_type == 'Touhy'){
							$Touhy = $Touhy + 1;
					}
					else if(substr($row->needle_type,0,4) == 'Other'){
							$Other = $Other + 1;
					}

					if($row->needle_size == '16G'){
							$g1 = $g1 + 1;
					}
					else if($row->needle_size == '17G'){
							$g2 = $g2 + 1;
					}
					else if($row->needle_size == '18G'){
							$g3 = $g3 + 1;
					}
					else if($row->needle_size == '19G'){
							$g4 = $g4 + 1;
					}
					else if($row->needle_size == '20G'){
							$g5 = $g5 + 1;
					}
					else if($row->needle_size == '21G'){
							$g6 = $g6 + 1;
					}
					else if($row->needle_size == '22G'){
							$g7 = $g7 + 1;
					}
					else if($row->needle_size == '23G'){
							$g8 = $g8 + 1;
					}
					else if($row->needle_size == '24G'){
							$g9 = $g9 + 1;
					}
				}
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("cnb_postop.id as count, procedure_csa.needle_type,procedure_csa.needle_size");
		    $builder->join('procedure_csa', 'procedure_csa.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();

			if($record){
				foreach($record as $row) {
					if($row->needle_type == 'B-Braun'){
							$B_Braun = $B_Braun + 1;
					}
					else if($row->needle_type == 'Vygon'){
							$Vygon = $Vygon + 1;
					}
					else if($row->needle_type == 'Polymed'){
							$Polymed = $Polymed + 1;
					}
					else if($row->needle_type == 'Portex'){
							$Portex = $Portex + 1;
					}
					else if($row->needle_type == 'Top'){
							$Top = $Top + 1;
					}
					else if($row->needle_type == 'BD'){
							$BD = $BD + 1;
					}
					else if($row->needle_type == 'Pajunk'){
							$Pajunk = $Pajunk + 1;
					}
					else if($row->needle_type == 'Romsons'){
							$Romsons = $Romsons + 1;
					}
					else if(substr($row->needle_type,0,4) == 'Other'){
							$Other = $Other + 1;
					}

					if($row->needle_size == '16G'){
							$g1 = $g1 + 1;
					}
					else if($row->needle_size == '17G'){
							$g2 = $g2 + 1;
					}
					else if($row->needle_size == '18G'){
							$g3 = $g3 + 1;
					}
					else if($row->needle_size == '19G'){
							$g4 = $g4 + 1;
					}
					else if($row->needle_size == '20G'){
							$g5 = $g5 + 1;
					}
					else if($row->needle_size == '21G'){
							$g6 = $g6 + 1;
					}
					else if($row->needle_size == '22G'){
							$g7 = $g7 + 1;
					}
					else if($row->needle_size == '23G'){
							$g8 = $g8 + 1;
					}
					else if($row->needle_size == '24G'){
							$g9 = $g9 + 1;
					}
				}
			}


			$products[] = array(
				'day'   => 'Touhy',
				'sell' => $Touhy 
			);
			$products[] = array(
				'day'   => 'Crawford',
				'sell' => $Crawford 
			);
			$products[] = array(
				'day'   => 'Hustead ',
				'sell' => $Hustead 
			);
			
			$products[] = array(
				'day'   => 'Other',
				'sell' => $Other
			);

			$other1[] = array(
				'day'   => '16G',
				'sell' => $g1
			);
			$other1[] = array(
				'day'   => '17G',
				'sell' => $g2
			);
			$other1[] = array(
				'day'   => '18G',
				'sell' => $g3
			);
			$other1[] = array(
				'day'   => '19G',
				'sell' => $g4
			);
			$other1[] = array(
				'day'   => '20G',
				'sell' => $g5
			);
			$other1[] = array(
				'day'   => '21G',
				'sell' => $g6
			);
			$other1[] = array(
				'day'   => '22G',
				'sell' => $g7
			);
			$other1[] = array(
				'day'   => '23G',
				'sell' => $g8
			);
			$other1[] = array(
				'day'   => '24G',
				'sell' => $g9
			);


			

			
			$data['products'] = ($products);
			$data['other1'] = ($other1); 
	         
	        $data['total'] = $total; 
	        $data['total_n'] = $total; 

			return view('cnb/userReports/user_epidural_needle_v', $data);              
		}else{
		return redirect()->route("user-n-report");
	}	
		
    }
    public function user_spinal_needle() {  
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){

		$builder = $db->table('procedure_spinal');
		$query = $builder->select("COUNT(id) as count");
        $query = $builder->where('procedure_spinal.dr_id ',$dr_id);
		$query = $builder->get();
		$record = $query->getResult();

		$total = 0;
		$procedure_epidural = [];

		foreach($record as $row) {
			$total += floatval($row->count);

		}

		$data['total_n'] = $total; 

		$builder = $db->table('procedure_spinal');
		$query = $builder->select("COUNT(id) as count,needle_type as s");
		if($from_date && $to_date){
          $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        }
        $query = $builder->where('procedure_spinal.dr_id ',$dr_id);
		$query = $builder->groupBy('needle_type');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$products = [];
		foreach($record as $row) {
			$products[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}

		

		$data['products'] = ($products);
		
		$data['total'] = $total;  
		
		

		$builder = $db->table('procedure_spinal');
		$query = $builder->select("COUNT(id) as count,needle_size as s");
		if($from_date && $to_date){
          $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        }
        $query = $builder->where('procedure_spinal.dr_id ',$dr_id);
		$query = $builder->groupBy('needle_size');
		$query = $builder->get();
		$record1 = $query->getResult();
		$total = 0;
		$products1 = [];
		foreach($record1 as $row) {
			$products1[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			 $total += floatval($row->count);
		}

		

		$data['products1'] = $products1;
		$data['total'] = $total;

		return view('cnb/userReports/user_epidural_needle_v', $data);         

		
	}else{
		return redirect()->route("user-n-report");
	}
    }

	
	 public function user_csa_needle() {  
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){

		$builder = $db->table('procedure_csa');
		$query = $builder->select("COUNT(id) as count");
        $query = $builder->where('procedure_csa.dr_id ',$dr_id);
		$query = $builder->get();
		$record = $query->getResult();

		$total = 0;
		$procedure_epidural = [];

		foreach($record as $row) {
			$total += floatval($row->count);

		}

		$data['total_n'] = $total; 

		$builder = $db->table('procedure_csa');
		$query = $builder->select("COUNT(id) as count,needle_type as s");
		if($from_date && $to_date){
          $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        }
        $query = $builder->where('procedure_csa.dr_id ',$dr_id);
		$query = $builder->groupBy('needle_type');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$products = [];
		foreach($record as $row) {
			$products[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}

		

		$data['products'] = ($products);
		
		$data['total'] = $total;  
		
		

		$builder = $db->table('procedure_csa');
		$query = $builder->select("COUNT(id) as count,needle_size as s");
		if($from_date && $to_date){
          $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        }
        $query = $builder->where('procedure_csa.dr_id ',$dr_id);
		$query = $builder->groupBy('needle_size');
		$query = $builder->get();
		$record1 = $query->getResult();
		$total = 0;
		$products1 = [];
		foreach($record1 as $row) {
			$products1[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			 $total += floatval($row->count);
		}

		

		$data['products1'] = $products1;
		$data['total'] = $total;

		return view('cnb/userReports/user_csa_needle_v', $data);         

		
	}else{
		return redirect()->route("user-n-report");
	}
    }

    public function user_epidural_adjuvant() {
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);


		if($from_date && $to_date  && $n_type != 'NULL'){
			$total11 = 0;
			$total12 = 0;
			$all_total1 = 0;
			$builder = $db->table('procedure_epidural');
			$query = $builder->select("count(opioid_dose) as NO");
			$query = $builder->where('opioid_dose ','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record3 = $query->getResult();
			foreach($record3 as $row) {
				$opioid_dose3 = $row->NO;
				$total11 += floatval($row->NO);
				$all_total1 += floatval($row->NO);
			}
			$opioide[] = array(
					'day'   => 'NO',
					'sell' => $opioid_dose3,
			);
	
			$builder = $db->table('procedure_epidural');
			$query = $builder->select("count(opioid_dose) as YES");
			$query = $builder->where('opioid_dose !=','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record2 = $query->getResult();
	
			foreach($record2 as $row) {
				$opioid_dose = $row->YES;
				$total12 += floatval($row->YES);
				$all_total1 += floatval($row->YES);
			}
			$opioide[] = array(
					'day'   => 'YES',
					'sell' => $opioid_dose
			);
	
			$o_number1 = (($total11/$all_total1)*100);
			$o_number2 = (($total12/$all_total1)*100);
	
			$data['o_perc1'] = number_format((float)$o_number1, 2, '.', '')."%";
			$data['o_perc2'] = number_format((float)$o_number2, 2, '.', '')."%";
			$data['total11'] = $total11;
			$data['total12'] = $total12;
	
			$data['opioide'] = ($opioide); 
	
	
			//  ---------------------------OPIOIDE ADJUVANT----------------------
			$total21 = 0;
			$total22 = 0;
			$all_total2 = 0;
			$builder = $db->table('procedure_epidural');
			$query = $builder->select("count(clonidina_dose) as NO");
			$query = $builder->where('clonidina_dose ','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record4 = $query->getResult();
			foreach($record4 as $row) {
				$clonidina_dose = $row->NO;
				$total21 += floatval($row->NO);
				$all_total2 += floatval($row->NO);
			}
			$clonidina[] = array(
					'day'   => 'NO',
					'sell' => $clonidina_dose
			);
	
			$builder = $db->table('procedure_epidural');
			$query = $builder->select("count(clonidina_dose) as YES");
			$query = $builder->where('clonidina_dose !=','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record5 = $query->getResult();
	
			foreach($record5 as $row) {
				$clonidina_dose = $row->YES;
				$total22 += floatval($row->YES);
				$all_total2 += floatval($row->YES);
			}
			$clonidina[] = array(
					'day'   => 'YES',
					'sell' => $clonidina_dose
			);
	
	
			$c_number1 = (($total21/$all_total2)*100);
			$c_number2 = (($total22/$all_total2)*100);
	
			$data['c_perc1'] = number_format((float)$c_number1, 2, '.', '')."%";
			$data['c_perc2'] = number_format((float)$c_number2, 2, '.', '')."%";
			$data['total21'] = $total21;
			$data['total22'] = $total22;
			$data['clonidina'] = ($clonidina); 
	// print_r($data);die();
			//  ---------------------------dexmeditomidine ADJUVANT----------------------
			$total31 = 0;
			$total32 = 0;
			$all_total3 = 0;
			$builder = $db->table('procedure_epidural');
			$query = $builder->select("count(dexmeditomidine_dose) as NO");
			$query = $builder->where('dexmeditomidine_dose ','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record6 = $query->getResult();
			foreach($record6 as $row) {
				$dexmeditomidine_dose = $row->NO;
				$total31 += floatval($row->NO);
				$all_total3 += floatval($row->NO);
			}
			$dexmeditomidine[] = array(
					'day'   => 'NO',
					'sell' => $dexmeditomidine_dose
			);
	
			$builder = $db->table('procedure_epidural');
			$query = $builder->select("count(dexmeditomidine_dose) as YES");
			$query = $builder->where('dexmeditomidine_dose !=','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record7 = $query->getResult();
	
			foreach($record7 as $row) {
				$dexmeditomidine_dose = $row->YES;
				$total32 += floatval($row->YES);
				$all_total3 += floatval($row->YES);
			}
			$dexmeditomidine[] = array(
					'day'   => 'YES',
					'sell' => $dexmeditomidine_dose
			);
	
			$de_number1 = (($total31/$all_total3)*100);
			$de_number2 = (($total32/$all_total3)*100);
	
			$data['de_perc1'] = number_format((float)$de_number1, 2, '.', '')."%";
			$data['de_perc2'] = number_format((float)$de_number2, 2, '.', '')."%";
			$data['total31'] = $total31;
			$data['total32'] = $total32;
			$data['dexmeditomidine'] = ($dexmeditomidine); 
	
	
			//  ---------------------------dexamephasone ADJUVANT----------------------
	
			$total41 = 0;
			$total42 = 0;
			$all_total4 = 0;
			$builder = $db->table('procedure_epidural');
			$query = $builder->select("count(dexamephasone_dose) as NO");
			$query = $builder->where('dexamephasone_dose ','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record8 = $query->getResult();
			foreach($record8 as $row) {
				$dexamephasone_dose = $row->NO;
				$total41 += floatval($row->NO);
				$all_total4 += floatval($row->NO);
			}
			$dexamephasone[] = array(
					'day'   => 'NO',
					'sell' => $dexamephasone_dose
			);
	
			$builder = $db->table('procedure_epidural');
			$query = $builder->select("count(dexamephasone_dose) as YES");
			$query = $builder->where('dexamephasone_dose !=','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record9 = $query->getResult();
	
			foreach($record9 as $row) {
				$dexamephasone_dose = $row->YES;
				$total42 += floatval($row->YES);
				$all_total4 += floatval($row->YES);
			}
			$dexamephasone[] = array(
					'day'   => 'YES',
					'sell' => $dexamephasone_dose
			);
	
			$da_number1 = (($total41/$all_total4)*100);
			$da_number2 = (($total42/$all_total4)*100);
	
			$data['da_perc1'] = number_format((float)$da_number1, 2, '.', '')."%";
			$data['da_perc2'] = number_format((float)$da_number2, 2, '.', '')."%";
			$data['total41'] = $total41;
			$data['total42'] = $total42;
			$data['dexamephasone'] = ($dexamephasone);
	
	
			//  ---------------------------tramadol ADJUVANT----------------------
	
			$total51 = 0;
			$total52 = 0;
			$all_total5 = 0;
			$builder = $db->table('procedure_epidural');
			$query = $builder->select("count(tramadol_dose) as NO");
			$query = $builder->where('tramadol_dose ','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record10 = $query->getResult();
			foreach($record10 as $row) {
				$tramadol_dose = $row->NO;
				$total51 += floatval($row->NO);
				$all_total5 += floatval($row->NO);
			}
			$tramadol[] = array(
					'day'   => 'NO',
					'sell' => $tramadol_dose
			);
	
			$builder = $db->table('procedure_epidural');
			$query = $builder->select("count(tramadol_dose) as YES");
			$query = $builder->where('tramadol_dose !=','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record11 = $query->getResult();
	
			foreach($record11 as $row) {
				$tramadol_dose = $row->YES;
				$total52 += floatval($row->YES);
				$all_total5 += floatval($row->YES);
			}
			$tramadol[] = array(
					'day'   => 'YES',
					'sell' => $tramadol_dose
			);
	
			$t_number1 = (($total51/$all_total5)*100);
			$t_number2 = (($total52/$all_total5)*100);
	
			$data['t_perc1'] = number_format((float)$t_number1, 2, '.', '')."%";
			$data['t_perc2'] = number_format((float)$t_number2, 2, '.', '')."%";
			$data['total51'] = $total51;
			$data['total52'] = $total52;
			$data['tramadol'] = ($tramadol);
	
	
			//  ---------------------------kepamine ADJUVANT----------------------
	
			$total61 = 0;
			$total62 = 0;
			$all_total6 = 0;
			$builder = $db->table('procedure_epidural');
			$query = $builder->select("count(kepamine_dose) as NO");
			$query = $builder->where('kepamine_dose ','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record12 = $query->getResult();
			foreach($record12 as $row) {
				$kepamine_dose = $row->NO;
				$total61 += floatval($row->NO);
				$all_total6 += floatval($row->NO);
			}
			$kepamine[] = array(
					'day'   => 'NO',
					'sell' => $kepamine_dose
			);
	
			$builder = $db->table('procedure_epidural');
			$query = $builder->select("count(kepamine_dose) as YES");
			$query = $builder->where('kepamine_dose !=','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record13 = $query->getResult();
	
			foreach($record13 as $row) {
				$kepamine_dose = $row->YES;
				$total62 += floatval($row->YES);
				$all_total6 += floatval($row->YES);
			}
			$kepamine[] = array(
					'day'   => 'YES',
					'sell' => $kepamine_dose
			);
			$k_number1 = (($total61/$all_total6)*100);
			$k_number2 = (($total62/$all_total6)*100);
	
			$data['k_perc1'] = number_format((float)$k_number1, 2, '.', '')."%";
			$data['k_perc2'] = number_format((float)$k_number2, 2, '.', '')."%";
			$data['total61'] = $total61;
			$data['total62'] = $total62;
	
			$data['kepamine'] = ($kepamine);
	
	
				//  ---------------------------midazolam ADJUVANT----------------------
	
				$total71 = 0;
				$total72 = 0;
				$all_total7 = 0;
				$builder = $db->table('procedure_epidural');
				$query = $builder->select("count(midazolam_dose) as NO");
				$query = $builder->where('midazolam_dose ','');
				if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
				$query = $builder->get();
				$record14 = $query->getResult();
				foreach($record14 as $row) {
					$midazolam_dose = $row->NO;
					$total71 += floatval($row->NO);
				$all_total7 += floatval($row->NO);
				}
				$midazolam[] = array(
						'day'   => 'NO',
						'sell' => $midazolam_dose
				);
		
				$builder = $db->table('procedure_epidural');
				$query = $builder->select("count(midazolam_dose) as YES");
				$query = $builder->where('midazolam_dose !=','');
				if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
				$query = $builder->get();
				$record15 = $query->getResult();
		
				foreach($record15 as $row) {
					$midazolam_dose = $row->YES;
					$total72 += floatval($row->YES);
				$all_total7 += floatval($row->YES);
					
				}
				$midazolam[] = array(
						'day'   => 'YES',
						'sell' => $midazolam_dose
				);
	
				$m_number1 = (($total71/$all_total7)*100);
				$m_number2 = (($total72/$all_total7)*100);
	
				$data['m_perc1'] = number_format((float)$m_number1, 2, '.', '')."%";
				$data['m_perc2'] = number_format((float)$m_number2, 2, '.', '')."%";
				$data['total71'] = $total71;
				$data['total72'] = $total72;
	
				$data['midazolam'] = ($midazolam);
	
					//  ---------------------------other ADJUVANT----------------------
	
					$total81 = 0;
					$total82 = 0;
					$all_total8 = 0;
					$builder = $db->table('procedure_epidural');
					$query = $builder->select("count(other7) as NO");
					$query = $builder->where('other7 ','NO');
					if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
					$query = $builder->get();
					$record16 = $query->getResult();
					foreach($record16 as $row) {
						$other7 = $row->NO;
						$total81 += floatval($row->NO);
					   $all_total8 += floatval($row->NO);
					}
					$other[] = array(
							'day'   => 'NO',
							'sell' => $other7
					);
			
					$builder = $db->table('procedure_epidural');
					$query = $builder->select("count(other7) as YES");
					$query = $builder->where('other7 ','YES');
					if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
					$query = $builder->get();
					$record17 = $query->getResult();
			
					foreach($record17 as $row) {
						$other7 = $row->YES;
						$total82 += floatval($row->YES);
				$all_total8 += floatval($row->YES);
					}
					$other[] = array(
							'day'   => 'YES',
							'sell' => $other7
					);
	
					$oth_number1 = (($total81/$all_total8)*100);
				   $oth_number2 = (($total82/$all_total8)*100);
	
					$data['oth_perc1'] = number_format((float)$oth_number1, 2, '.', '')."%";
					$data['oth_perc2'] = number_format((float)$oth_number2, 2, '.', '')."%";
					$data['total81'] = $total81;
					$data['total82'] = $total82;
	
					$data['other'] = ($other);

		return view('cnb/userReports/user_epidural_adjuvant_v', $data);           
		
	}else{
		return redirect()->route("user-n-report");
	}
    }

	public function user_component_adjuvant() {
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){
		
		$opioid = 0;
		$clonidine = 0;
		$dexmeditomidine = 0;
		$dexamethasone = 0;
		$tramadol = 0;
		$ketamine = 0;
		$midazolam = 0;
		$adrenaline = 0;
		$other = 0;



		//            ------------------------------CSE-------------------
		$builder = $db->table('cnb_postop');
		$query = $builder->select("cnb_postop.id as count, procedure_cse.opioid_name, procedure_cse.clonidina_dose, procedure_cse.dexmeditomidine_dose, procedure_cse.dexamephasone_dose, procedure_cse.trmadol_dose,procedure_cse.kepamine_dose, procedure_cse.midazolam_dose, procedure_cse.adrenaline_dose, procedure_cse.aj_epidural_other, procedure_cse.aj_spinal_opioid, procedure_cse.aj_spinal_clonidne, procedure_cse.aj_spinal_dexmeditomidine, procedure_cse.aj_spinal_dexamethasone, procedure_cse.aj_spinal_tramadol, procedure_cse.aj_spinal_adrenaline, procedure_cse.aj_spinal_other");
		$builder->join('procedure_cse', 'procedure_cse.patient_id = cnb_postop.patient_id');
		$query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		$query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
        $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		$query = $builder->get();
		$record = $query->getResult();
		// print_r($record);die();

		if($record){
			foreach($record as $row) {
					
					if($row->opioid_name != ''){
					$opioid = $opioid + 1;
					}
					if($row->clonidina_dose != ''){
					$clonidine = $clonidine + 1;
					}
					if($row->dexmeditomidine_dose != ''){
					$dexmeditomidine = $dexmeditomidine + 1;
					}
					if($row->dexamephasone_dose != ''){
					$dexamethasone = $dexamethasone + 1;
					}
					if($row->trmadol_dose != ''){
					$tramadol = $tramadol + 1;
					}
					if($row->kepamine_dose != ''){
					$ketamine = $ketamine + 1;
					}
					if($row->midazolam_dose != ''){
					$midazolam = $midazolam + 1;
					}
					if($row->adrenaline_dose != ''){
					$adrenaline = $adrenaline + 1;
					}

					$aj_epidural_other = json_decode($row->aj_epidural_other);
					$ep_name = 0;
					foreach($aj_epidural_other as $val){
						if($val->name != ''){
							$ep_name += 1;
						}
					}
					if($ep_name > 0){
					$other = $other + 1;
					}


					if($row->aj_spinal_opioid != ''){
					$opioid = $opioid + 1;
					}
					if($row->aj_spinal_clonidne != ''){
					$clonidine = $clonidine + 1;
					}
					if($row->aj_spinal_dexmeditomidine != ''){
					$dexmeditomidine = $dexmeditomidine + 1;
					}
					if($row->aj_spinal_dexamethasone != ''){
					$dexamethasone = $dexamethasone + 1;
					}
					if($row->aj_spinal_tramadol != ''){
					$tramadol = $tramadol + 1;
					}
					if($row->aj_spinal_adrenaline != ''){
					$adrenaline = $adrenaline + 1;
					}

					$aj_spinal_other = json_decode($row->aj_spinal_other);
					$sp_name = 0;
					foreach($aj_spinal_other as $val){
						if($val->name != ''){
							$sp_name += 1;
						}
					}

					if($sp_name > 0){
						$other = $other + 1;
						}

			}
		}



			//            ------------------------------EPIDURAL-------------------
			$builder = $db->table('cnb_postop');
			$query = $builder->select("cnb_postop.id as count, procedure_epidural.opioid_name, procedure_epidural.clonidina_dose, procedure_epidural.dexmeditomidine_dose, procedure_epidural.dexamephasone_dose, procedure_epidural.tramadol_dose,procedure_epidural.kepamine_dose, procedure_epidural.midazolam_dose,procedure_epidural.other7");
			$builder->join('procedure_epidural', 'procedure_epidural.patient_id = cnb_postop.patient_id');
			$query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
			$query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
			$query = $builder->get();
			$record = $query->getResult();
	
			if($record){
				foreach($record as $row) {
						
						if($row->opioid_name != ''){
						$opioid = $opioid + 1;
						}
						if($row->clonidina_dose != ''){
						$clonidine = $clonidine + 1;
						}
						if($row->dexmeditomidine_dose != ''){
						$dexmeditomidine = $dexmeditomidine + 1;
						}
						if($row->dexamephasone_dose != ''){
						$dexamethasone = $dexamethasone + 1;
						}
						if($row->tramadol_dose != ''){
						$tramadol = $tramadol + 1;
						}
						if($row->kepamine_dose != ''){
						$ketamine = $ketamine + 1;
						}
						if($row->midazolam_dose != ''){
						$midazolam = $midazolam + 1;
						}
						
						if($row->other7 == 'Yes'){
						$other = $other + 1;
						}
	
				}
			}

				//            ------------------------------SPINAL-------------------
				$builder = $db->table('cnb_postop');
				$query = $builder->select("cnb_postop.id as count, procedure_spinal.opioid_name, procedure_spinal.clonidina_dose, procedure_spinal.dexmeditomidine_dose, procedure_spinal.dexamephasone_dose, procedure_spinal.tramadol_dose, procedure_spinal.ketamine_dose, procedure_spinal.midazolam_dose,procedure_spinal.adrenaline_dose,procedure_spinal.other7");
				$builder->join('procedure_spinal', 'procedure_spinal.patient_id = cnb_postop.patient_id');
				$query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
				$query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
                $query = $builder->where('cnb_postop.dr_id ',$dr_id);
				$query = $builder->get();
				$record = $query->getResult();

				if($record){
					foreach($record as $row) {
							
							if($row->opioid_name != ''){
							$opioid = $opioid + 1;
							}
							if($row->clonidina_dose != ''){
							$clonidine = $clonidine + 1;
							}
							if($row->dexmeditomidine_dose != ''){
							$dexmeditomidine = $dexmeditomidine + 1;
							}
							if($row->dexamephasone_dose != ''){
							$dexamethasone = $dexamethasone + 1;
							}
							if($row->tramadol_dose != ''){
							$tramadol = $tramadol + 1;
							}
							if($row->ketamine_dose != ''){
							$ketamine = $ketamine + 1;
							}
							if($row->midazolam_dose != ''){
							$midazolam = $midazolam + 1;
							}
							if($row->adrenaline_dose != ''){
							$adrenaline = $adrenaline + 1;
							}
							if($row->other7 == 'Yes'){
							$other = $other + 1;
							}
		
					}
				}

				//            ------------------------------CSA-------------------
				$builder = $db->table('cnb_postop');
				$query = $builder->select("cnb_postop.id as count, procedure_csa.opioid_aj, procedure_csa.clonidne_aj, procedure_csa.dexmeditomidine_aj, procedure_csa.dexamethasone_aj, procedure_csa.tramadol_aj, procedure_csa.ketamine_aj, procedure_csa.midazolam_aj,procedure_csa.adrenaline_aj,procedure_csa.other_aj_name_dose");
				$builder->join('procedure_csa', 'procedure_csa.patient_id = cnb_postop.patient_id');
				$query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
				$query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
                $query = $builder->where('cnb_postop.dr_id ',$dr_id);
				$query = $builder->get();
				$record = $query->getResult();

		
				if($record){
					foreach($record as $row) {
							
							if($row->opioid_aj == 'Yes'){
							$opioid = $opioid + 1;
							}
							if($row->clonidne_aj != ''){
							$clonidine = $clonidine + 1;
							}
							if($row->dexmeditomidine_aj != ''){
							$dexmeditomidine = $dexmeditomidine + 1;
							}
							if($row->dexamethasone_aj != ''){
							$dexamethasone = $dexamethasone + 1;
							}
							if($row->tramadol_aj != ''){
							$tramadol = $tramadol + 1;
							}
							if($row->ketamine_aj != ''){
							$ketamine = $ketamine + 1;
							}
							if($row->midazolam_aj != ''){
							$midazolam = $midazolam + 1;
							}
							if($row->adrenaline_aj != ''){
							$adrenaline = $adrenaline + 1;
							}

							$other_aj_name_dose = json_decode($row->other_aj_name_dose);
							$csa_name = 0;
							foreach($other_aj_name_dose as $val){
								if($val->name != ''){
									$csa_name += 1;
								}
							}
		
							if($csa_name > 0){
								$other = $other + 1;
								}
		
					}
				}
		
				$total = session()->get('n');
				$products[] = array(
					'day'   => 'Opioid',
					'sell' => $opioid,
					'perc' => number_format((float)(($opioid/$total)*100), 1, '.', '')."%",
				);
				$products[] = array(
					'day'   => 'Clonidine',
					'sell' => $clonidine,
					'perc' => number_format((float)(($clonidine/$total)*100), 1, '.', '')."%",
				);
				$products[] = array(
					'day'   => 'Dexmeditomidine',
					'sell' => $dexmeditomidine,
					'perc' => number_format((float)(($dexmeditomidine/$total)*100), 1, '.', '')."%",
				);
				$products[] = array(
					'day'   => 'Dexamethasone',
					'sell' => $dexamethasone,
					'perc' => number_format((float)(($dexamethasone/$total)*100), 1, '.', '')."%",
				);
				$products[] = array(
					'day'   => 'Tramadol',
					'sell' => $tramadol,
					'perc' => number_format((float)(($tramadol/$total)*100), 1, '.', '')."%",
				);
				$products[] = array(
					'day'   => 'Ketamine',
					'sell' => $ketamine,
					'perc' => number_format((float)(($ketamine/$total)*100), 1, '.', '')."%",
				);
				$products[] = array(
					'day'   => 'Midazolam ',
					'sell' => $midazolam,
					'perc' => number_format((float)(($midazolam/$total)*100), 1, '.', '')."%",
				);
				$products[] = array(
					'day'   => 'Adrenaline',
					'sell' => $adrenaline,
					'perc' => number_format((float)(($adrenaline/$total)*100), 1, '.', '')."%",
				);
				$products[] = array(
					'day'   => 'Other',
					'sell' => $other,
					'perc' => number_format((float)(($other/$total)*100), 1, '.', '')."%",
				);


			$data['products'] = $products;
			$data['total'] = $total;
		return view('cnb/userReports/user_component_adjuvant_v', $data);   
		
	}else{
		return redirect()->route("user-n-report");
	}
    }
	public function user_spinal_adjuvant() {
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){
		
			$total11 = 0;
			$total12 = 0;
			$all_total1 = 0;
				$builder = $db->table('procedure_spinal');
				$query = $builder->select("count(opioid_dose) as NO");
				$query = $builder->where('opioid_dose ','');
				if($from_date && $to_date){
				  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
				  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
				}
				$query = $builder->get();
				$record3 = $query->getResult();
				foreach($record3 as $row) {
					$opioid_dose3 = $row->NO;
					$total11 += floatval($row->NO);
					$all_total1 += floatval($row->NO);
				}
				$opioide[] = array(
						'day'   => 'NO',
						'sell' => $opioid_dose3
				);
		
				$builder = $db->table('procedure_spinal');
				$query = $builder->select("count(opioid_dose) as YES");
				$query = $builder->where('opioid_dose !=','');
				if($from_date && $to_date){
				  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
				  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
				}
				$query = $builder->get();
				$record2 = $query->getResult();
		
				foreach($record2 as $row) {
					$opioid_dose = $row->YES;
					$total12 += floatval($row->YES);
				$all_total1 += floatval($row->YES);
				}
				$opioide[] = array(
						'day'   => 'YES',
						'sell' => $opioid_dose
				);
		
				$o_number1 = (($total11/$all_total1)*100);
			$o_number2 = (($total12/$all_total1)*100);
		
			$data['o_perc1'] = number_format((float)$o_number1, 2, '.', '')."%";
			$data['o_perc2'] = number_format((float)$o_number2, 2, '.', '')."%";
			$data['total11'] = $total11;
			$data['total12'] = $total12;
		
		
				$data['opioide'] = ($opioide); 
		
		
				//  ---------------------------OPIOIDE ADJUVANT----------------------
				$total21 = 0;
				$total22 = 0;
				$all_total2 = 0;
		
				$builder = $db->table('procedure_spinal');
				$query = $builder->select("count(clonidina_dose) as NO");
				$query = $builder->where('clonidina_dose ','');
				if($from_date && $to_date){
				  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
				  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
				}
				$query = $builder->get();
				$record4 = $query->getResult();
				foreach($record4 as $row) {
					$clonidina_dose = $row->NO;
					$total21 += floatval($row->NO);
					$all_total2 += floatval($row->NO);			
				}
				$clonidina[] = array(
						'day'   => 'NO',
						'sell' => $clonidina_dose
				);
		
				$builder = $db->table('procedure_spinal');
				$query = $builder->select("count(clonidina_dose) as YES");
				$query = $builder->where('clonidina_dose !=','');
				if($from_date && $to_date){
				  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
				  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
				}
				$query = $builder->get();
				$record5 = $query->getResult();
		
				foreach($record5 as $row) {
					$clonidina_dose = $row->YES;
					$total22 += floatval($row->YES);
					$all_total2 += floatval($row->YES);
				}
				$clonidina[] = array(
						'day'   => 'YES',
						'sell' => $clonidina_dose
				);
		
				$c_number1 = (($total21/$all_total2)*100);
				$c_number2 = (($total22/$all_total2)*100);
			
				$data['c_perc1'] = number_format((float)$c_number1, 2, '.', '')."%";
				$data['c_perc2'] = number_format((float)$c_number2, 2, '.', '')."%";
				$data['total21'] = $total21;
				$data['total22'] = $total22;
				$data['clonidina'] = ($clonidina); 
		
				//  ---------------------------dexmeditomidine ADJUVANT----------------------
				$total31 = 0;
				$total32 = 0;
				$all_total3 = 0;
				$builder = $db->table('procedure_spinal');
				$query = $builder->select("count(dexmeditomidine_dose) as NO");
				$query = $builder->where('dexmeditomidine_dose ','');
				if($from_date && $to_date){
				  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
				  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
				}
				$query = $builder->get();
				$record6 = $query->getResult();
				foreach($record6 as $row) {
					$dexmeditomidine_dose = $row->NO;
					$total31 += floatval($row->NO);
				$all_total3 += floatval($row->NO);
				}
				$dexmeditomidine[] = array(
						'day'   => 'NO',
						'sell' => $dexmeditomidine_dose
				);
		
				$builder = $db->table('procedure_spinal');
				$query = $builder->select("count(dexmeditomidine_dose) as YES");
				$query = $builder->where('dexmeditomidine_dose !=','');
				if($from_date && $to_date){
				  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
				  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
				}
				$query = $builder->get();
				$record7 = $query->getResult();
		
				foreach($record7 as $row) {
					$dexmeditomidine_dose = $row->YES;
					$total32 += floatval($row->YES);
				$all_total3 += floatval($row->YES);
				}
				$dexmeditomidine[] = array(
						'day'   => 'YES',
						'sell' => $dexmeditomidine_dose
				);
		
				$de_number1 = (($total31/$all_total3)*100);
				$de_number2 = (($total32/$all_total3)*100);
			
				$data['de_perc1'] = number_format((float)$de_number1, 2, '.', '')."%";
				$data['de_perc2'] = number_format((float)$de_number2, 2, '.', '')."%";
				$data['total31'] = $total31;
				$data['total32'] = $total32;
				$data['dexmeditomidine'] = ($dexmeditomidine); 
		
		
				//  ---------------------------dexamephasone ADJUVANT----------------------
		
				$total41 = 0;
			$total42 = 0;
			$all_total4 = 0;
				$builder = $db->table('procedure_spinal');
				$query = $builder->select("count(dexamephasone_dose) as NO");
				$query = $builder->where('dexamephasone_dose ','');
				if($from_date && $to_date){
				  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
				  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
				}
				$query = $builder->get();
				$record8 = $query->getResult();
				foreach($record8 as $row) {
					$dexamephasone_dose = $row->NO;
					$total41 += floatval($row->NO);
				$all_total4 += floatval($row->NO);
				}
				$dexamephasone[] = array(
						'day'   => 'NO',
						'sell' => $dexamephasone_dose
				);
		
				$builder = $db->table('procedure_spinal');
				$query = $builder->select("count(dexamephasone_dose) as YES");
				$query = $builder->where('dexamephasone_dose !=','');
				if($from_date && $to_date){
				  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
				  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
				}
				$query = $builder->get();
				$record9 = $query->getResult();
		
				foreach($record9 as $row) {
					$dexamephasone_dose = $row->YES;
					$total42 += floatval($row->YES);
				$all_total4 += floatval($row->YES);
				}
				$dexamephasone[] = array(
						'day'   => 'YES',
						'sell' => $dexamephasone_dose
				);
		
				$da_number1 = (($total41/$all_total4)*100);
				$da_number2 = (($total42/$all_total4)*100);
			
				$data['da_perc1'] = number_format((float)$da_number1, 2, '.', '')."%";
				$data['da_perc2'] = number_format((float)$da_number2, 2, '.', '')."%";
				$data['total41'] = $total41;
				$data['total42'] = $total42;
				$data['dexamephasone'] = ($dexamephasone);
		
		
				//  ---------------------------tramadol ADJUVANT----------------------
		
				$total51 = 0;
				$total52 = 0;
				$all_total5 = 0;
				$builder = $db->table('procedure_spinal');
				$query = $builder->select("count(tramadol_dose) as NO");
				$query = $builder->where('tramadol_dose ','');
				if($from_date && $to_date){
				  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
				  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
				}
				$query = $builder->get();
				$record10 = $query->getResult();
				foreach($record10 as $row) {
					$tramadol_dose = $row->NO;
					$total51 += floatval($row->NO);
				$all_total5 += floatval($row->NO);
				}
				$tramadol[] = array(
						'day'   => 'NO',
						'sell' => $tramadol_dose
				);
		
				$builder = $db->table('procedure_spinal');
				$query = $builder->select("count(tramadol_dose) as YES");
				$query = $builder->where('tramadol_dose !=','');
				if($from_date && $to_date){
				  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
				  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
				}
				$query = $builder->get();
				$record11 = $query->getResult();
		
				foreach($record11 as $row) {
					$tramadol_dose = $row->YES;
					$total52 += floatval($row->YES);
				$all_total5 += floatval($row->YES);
				}
				$tramadol[] = array(
						'day'   => 'YES',
						'sell' => $tramadol_dose
				);
		
				$t_number1 = (($total51/$all_total5)*100);
				$t_number2 = (($total52/$all_total5)*100);
			
				$data['t_perc1'] = number_format((float)$t_number1, 2, '.', '')."%";
				$data['t_perc2'] = number_format((float)$t_number2, 2, '.', '')."%";
				$data['total51'] = $total51;
				$data['total52'] = $total52;
				$data['tramadol'] = ($tramadol);
		
		
				//  ---------------------------kepamine ADJUVANT----------------------
		
				$total61 = 0;
				$total62 = 0;
				$all_total6 = 0;
				$builder = $db->table('procedure_spinal');
				$query = $builder->select("count(ketamine_dose) as NO");
				$query = $builder->where('ketamine_dose ','');
				if($from_date && $to_date){
				  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
				  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
				}
				$query = $builder->get();
				$record12 = $query->getResult();
				foreach($record12 as $row) {
					$ketamine_dose = $row->NO;
					$total61 += floatval($row->NO);
					$all_total6 += floatval($row->NO);
				}
				$ketamine[] = array(
						'day'   => 'NO',
						'sell' => $ketamine_dose
				);
		
				$builder = $db->table('procedure_spinal');
				$query = $builder->select("count(ketamine_dose) as YES");
				$query = $builder->where('ketamine_dose !=','');
				if($from_date && $to_date){
				  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
				  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
				}
				$query = $builder->get();
				$record13 = $query->getResult();
		
				foreach($record13 as $row) {
					$ketamine_dose = $row->YES;
					$total62 += floatval($row->YES);
					$all_total6 += floatval($row->YES);
				}
				$ketamine[] = array(
						'day'   => 'YES',
						'sell' => $ketamine_dose
				);
		
				$k_number1 = (($total61/$all_total6)*100);
				$k_number2 = (($total62/$all_total6)*100);
			
				$data['k_perc1'] = number_format((float)$k_number1, 2, '.', '')."%";
				$data['k_perc2'] = number_format((float)$k_number2, 2, '.', '')."%";
				$data['total61'] = $total61;
				$data['total62'] = $total62;
				$data['ketamine'] = ($ketamine);
		
		
					//  ---------------------------midazolam ADJUVANT----------------------
		
		
					$total71 = 0;
					$total72 = 0;
					$all_total7 = 0;
					$builder = $db->table('procedure_spinal');
					$query = $builder->select("count(midazolam_dose) as NO");
					$query = $builder->where('midazolam_dose ','');
					if($from_date && $to_date){
				  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
				  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
				}
					$query = $builder->get();
					$record14 = $query->getResult();
					foreach($record14 as $row) {
						$midazolam_dose = $row->NO;
						$total71 += floatval($row->NO);
						$all_total7 += floatval($row->NO);
					}
					$midazolam[] = array(
							'day'   => 'NO',
							'sell' => $midazolam_dose
					);
			
					$builder = $db->table('procedure_spinal');
					$query = $builder->select("count(midazolam_dose) as YES");
					$query = $builder->where('midazolam_dose !=','');
					if($from_date && $to_date){
				  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
				  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
				}
					$query = $builder->get();
					$record15 = $query->getResult();
			
					foreach($record15 as $row) {
						$midazolam_dose = $row->YES;
						$total72 += floatval($row->YES);
						$all_total7 += floatval($row->YES);
					}
					$midazolam[] = array(
							'day'   => 'YES',
							'sell' => $midazolam_dose
					);
		
					$m_number1 = (($total71/$all_total7)*100);
				$m_number2 = (($total72/$all_total7)*100);
		
				$data['m_perc1'] = number_format((float)$m_number1, 2, '.', '')."%";
				$data['m_perc2'] = number_format((float)$m_number2, 2, '.', '')."%";
				$data['total71'] = $total71;
				$data['total72'] = $total72;
					$data['midazolam'] = ($midazolam);
		
						//  ---------------------------midazolam ADJUVANT----------------------
		
						$total91 = 0;
						$total92 = 0;
						$all_total9 = 0;
						$builder = $db->table('procedure_spinal');
						$query = $builder->select("count(adrenaline_dose) as NO");
						$query = $builder->where('adrenaline_dose ','');
						if($from_date && $to_date){
				  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
				  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
				}
						$query = $builder->get();
						$record18 = $query->getResult();
						foreach($record18 as $row) {
							$adrenaline_dose = $row->NO;
							$total91 += floatval($row->NO);
							$all_total9 += floatval($row->NO);
						}
						$adrenaline[] = array(
								'day'   => 'NO',
								'sell' => $adrenaline_dose
						);
				
						$builder = $db->table('procedure_spinal');
						$query = $builder->select("count(adrenaline_dose) as YES");
						$query = $builder->where('adrenaline_dose !=','');
						if($from_date && $to_date){
				  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
				  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
				}
						$query = $builder->get();
						$record19 = $query->getResult();
				
						foreach($record19 as $row) {
							$adrenaline_dose = $row->YES;
							$total92 += floatval($row->YES);
								$all_total9 += floatval($row->YES);
						}
						$adrenaline[] = array(
								'day'   => 'YES',
								'sell' => $adrenaline_dose
						);
			
						$a_number1 = (($total91/$all_total9)*100);
						$a_number2 = (($total92/$all_total9)*100);
				 
						 $data['a_perc1'] = number_format((float)$a_number1, 2, '.', '')."%";
						 $data['a_perc2'] = number_format((float)$a_number2, 2, '.', '')."%";
						 $data['total91'] = $total91;
						 $data['total92'] = $total92;
						$data['adrenaline'] = ($adrenaline);
		
						//  ---------------------------other ADJUVANT----------------------
		
						$total81 = 0;
						$total82 = 0;
						$all_total8 = 0;
					$builder = $db->table('procedure_spinal');
					$query = $builder->select("count(other7) as NO");
					$query = $builder->where('other7 ','NO');
					if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
					$query = $builder->get();
					$record16 = $query->getResult();
					foreach($record16 as $row) {
						$other7 = $row->NO;
						$total81 += floatval($row->NO);
						$all_total8 += floatval($row->NO);
					}
					$other[] = array(
							'day'   => 'NO',
							'sell' => $other7
					);
			
					$builder = $db->table('procedure_spinal');
					$query = $builder->select("count(other7) as YES");
					$query = $builder->where('other7 ','YES');
					$query = $builder->get();
					$record17 = $query->getResult();
			
					foreach($record17 as $row) {
						$other7 = $row->YES;
						$total82 += floatval($row->YES);
							$all_total8 += floatval($row->YES);
					}
					$other[] = array(
							'day'   => 'YES',
							'sell' => $other7
					);
					$oth_number1 = (($total81/$all_total8)*100);
					$oth_number2 = (($total82/$all_total8)*100);
			 
					 $data['oth_perc1'] = number_format((float)$oth_number1, 2, '.', '')."%";
					 $data['oth_perc2'] = number_format((float)$oth_number2, 2, '.', '')."%";
					 $data['total81'] = $total81;
					 $data['total82'] = $total82;
					$data['other'] = ($other);
		
		return view('cnb/userReports/user_spinal_adjuvant_v', $data);         
		
	}else{
		return redirect()->route("user-n-report");
	}
    }


	public function user_csa_adjuvant() {
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){
		
			$total11 = 0;
			$total12 = 0;
			$all_total1 = 0;
			$builder = $db->table('procedure_csa');
			$query = $builder->select("count(opioid_aj) as NO");
			$query = $builder->where('opioid_aj ','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record3 = $query->getResult();
			foreach($record3 as $row) {
				$opioid_dose3 = $row->NO;
				$total11 += floatval($row->NO);
				$all_total1 += floatval($row->NO);
			}
			$opioide[] = array(
					'day'   => 'NO',
					'sell' => $opioid_dose3
			);
	
			$builder = $db->table('procedure_csa');
			$query = $builder->select("count(opioid_aj) as YES");
			$query = $builder->where('opioid_aj !=','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record2 = $query->getResult();
	
			foreach($record2 as $row) {
				$opioid_dose = $row->YES;
				$total12 += floatval($row->YES);
		$all_total1 += floatval($row->YES);
			}
			$opioide[] = array(
					'day'   => 'YES',
					'sell' => $opioid_dose
			);
			$o_number1 = (($total11/$all_total1)*100);
			$o_number2 = (($total12/$all_total1)*100);
			
			$data['o_perc1'] = number_format((float)$o_number1, 2, '.', '')."%";
			$data['o_perc2'] = number_format((float)$o_number2, 2, '.', '')."%";
			$data['total11'] = $total11;
			$data['total12'] = $total12;
			
			$data['opioide'] = ($opioide); 
	
	
			//  ---------------------------OPIOIDE ADJUVANT----------------------
			$total21 = 0;
			$total22 = 0;
			$all_total2 = 0;
	
			$builder = $db->table('procedure_csa');
			$query = $builder->select("count(clonidne_aj) as NO");
			$query = $builder->where('clonidne_aj ','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record4 = $query->getResult();
			foreach($record4 as $row) {
				$clonidina_dose = $row->NO;
				$total21 += floatval($row->NO);
			$all_total2 += floatval($row->NO);		
			}
			$clonidina[] = array(
					'day'   => 'NO',
					'sell' => $clonidina_dose
			);
	
			$builder = $db->table('procedure_csa');
			$query = $builder->select("count(clonidne_aj) as YES");
			$query = $builder->where('clonidne_aj !=','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record5 = $query->getResult();
	
			foreach($record5 as $row) {
				$clonidina_dose = $row->YES;
				$total22 += floatval($row->YES);
			$all_total2 += floatval($row->YES);
			}
			$clonidina[] = array(
					'day'   => 'YES',
					'sell' => $clonidina_dose
			);
	
			$c_number1 = (($total21/$all_total2)*100);
			$c_number2 = (($total22/$all_total2)*100);
		
			$data['c_perc1'] = number_format((float)$c_number1, 2, '.', '')."%";
			$data['c_perc2'] = number_format((float)$c_number2, 2, '.', '')."%";
			$data['total21'] = $total21;
			$data['total22'] = $total22;
			$data['clonidina'] = ($clonidina); 
	
			//  ---------------------------dexmeditomidine ADJUVANT----------------------
			$total31 = 0;
			$total32 = 0;
			$all_total3 = 0;
			$builder = $db->table('procedure_csa');
			$query = $builder->select("count(dexmeditomidine_aj) as NO");
			$query = $builder->where('dexmeditomidine_aj ','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record6 = $query->getResult();
			foreach($record6 as $row) {
				$dexmeditomidine_dose = $row->NO;
				$total31 += floatval($row->NO);
				$all_total3 += floatval($row->NO);
			}
			$dexmeditomidine[] = array(
					'day'   => 'NO',
					'sell' => $dexmeditomidine_dose
			);
	
			$builder = $db->table('procedure_csa');
			$query = $builder->select("count(dexmeditomidine_aj) as YES");
			$query = $builder->where('dexmeditomidine_aj !=','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record7 = $query->getResult();
	
			foreach($record7 as $row) {
				$dexmeditomidine_dose = $row->YES;
				$total32 += floatval($row->YES);
		$all_total3 += floatval($row->YES);
			}
			$dexmeditomidine[] = array(
					'day'   => 'YES',
					'sell' => $dexmeditomidine_dose
			);
	
			$de_number1 = (($total31/$all_total3)*100);
			$de_number2 = (($total32/$all_total3)*100);
		
			$data['de_perc1'] = number_format((float)$de_number1, 2, '.', '')."%";
			$data['de_perc2'] = number_format((float)$de_number2, 2, '.', '')."%";
			$data['total31'] = $total31;
			$data['total32'] = $total32;
			$data['dexmeditomidine'] = ($dexmeditomidine); 
	
	
			//  ---------------------------dexamephasone ADJUVANT----------------------
	
			$total41 = 0;
			$total42 = 0;
			$all_total4 = 0;
			$builder = $db->table('procedure_csa');
			$query = $builder->select("count(dexamethasone_aj) as NO");
			$query = $builder->where('dexamethasone_aj ','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record8 = $query->getResult();
			foreach($record8 as $row) {
				$dexamephasone_dose = $row->NO;
				$total41 += floatval($row->NO);
		$all_total4 += floatval($row->NO);
			}
			$dexamephasone[] = array(
					'day'   => 'NO',
					'sell' => $dexamephasone_dose
			);
	
			$builder = $db->table('procedure_csa');
			$query = $builder->select("count(dexamethasone_aj) as YES");
			$query = $builder->where('dexamethasone_aj !=','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record9 = $query->getResult();
	
			foreach($record9 as $row) {
				$dexamephasone_dose = $row->YES;
				$total42 += floatval($row->YES);
				$all_total4 += floatval($row->YES);
			}
			$dexamephasone[] = array(
					'day'   => 'YES',
					'sell' => $dexamephasone_dose
			);
	
			$da_number1 = (($total41/$all_total4)*100);
		$da_number2 = (($total42/$all_total4)*100);
	
		$data['da_perc1'] = number_format((float)$da_number1, 2, '.', '')."%";
		$data['da_perc2'] = number_format((float)$da_number2, 2, '.', '')."%";
		$data['total41'] = $total41;
		$data['total42'] = $total42;
			$data['dexamephasone'] = ($dexamephasone);
	
	
			//  ---------------------------tramadol ADJUVANT----------------------
	
			$total51 = 0;
			$total52 = 0;
			$all_total5 = 0;
			$builder = $db->table('procedure_csa');
			$query = $builder->select("count(tramadol_aj) as NO");
			$query = $builder->where('tramadol_aj ','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record10 = $query->getResult();
			foreach($record10 as $row) {
				$tramadol_dose = $row->NO;
				$total51 += floatval($row->NO);
		$all_total5 += floatval($row->NO);
			}
			$tramadol[] = array(
					'day'   => 'NO',
					'sell' => $tramadol_dose
			);
	
			$builder = $db->table('procedure_csa');
			$query = $builder->select("count(tramadol_aj) as YES");
			$query = $builder->where('tramadol_aj !=','');if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record11 = $query->getResult();
	
			foreach($record11 as $row) {
				$tramadol_dose = $row->YES;
				$total52 += floatval($row->YES);
				$all_total5 += floatval($row->YES);
			}
			$tramadol[] = array(
					'day'   => 'YES',
					'sell' => $tramadol_dose
			);
			$t_number1 = (($total51/$all_total5)*100);
		$t_number2 = (($total52/$all_total5)*100);
	
		$data['t_perc1'] = number_format((float)$t_number1, 2, '.', '')."%";
		$data['t_perc2'] = number_format((float)$t_number2, 2, '.', '')."%";
		$data['total51'] = $total51;
		$data['total52'] = $total52;
			$data['tramadol'] = ($tramadol);
	
	
			//  ---------------------------kepamine ADJUVANT----------------------
	
			$total61 = 0;
			$total62 = 0;
			$all_total6 = 0;
			$builder = $db->table('procedure_csa');
			$query = $builder->select("count(ketamine_aj) as NO");
			$query = $builder->where('ketamine_aj ','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record12 = $query->getResult();
			foreach($record12 as $row) {
				$ketamine_dose = $row->NO;
				$total61 += floatval($row->NO);
				$all_total6 += floatval($row->NO);
			}
			$ketamine[] = array(
					'day'   => 'NO',
					'sell' => $ketamine_dose
			);
	
			$builder = $db->table('procedure_csa');
			$query = $builder->select("count(ketamine_aj) as YES");
			$query = $builder->where('ketamine_aj !=','');if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record13 = $query->getResult();
	
			foreach($record13 as $row) {
				$ketamine_dose = $row->YES;
				$total62 += floatval($row->YES);
			$all_total6 += floatval($row->YES);
			}
			$ketamine[] = array(
					'day'   => 'YES',
					'sell' => $ketamine_dose
			);
	
			$k_number1 = (($total61/$all_total6)*100);
			$k_number2 = (($total62/$all_total6)*100);
		
			$data['k_perc1'] = number_format((float)$k_number1, 2, '.', '')."%";
			$data['k_perc2'] = number_format((float)$k_number2, 2, '.', '')."%";
			$data['total61'] = $total61;
			$data['total62'] = $total62;
			$data['ketamine'] = ($ketamine);
	
	
				//  ---------------------------midazolam ADJUVANT----------------------
	
				$total71 = 0;
				$total72 = 0;
				$all_total7 = 0;
				$builder = $db->table('procedure_csa');
				$query = $builder->select("count(midazolam_aj) as NO");
				$query = $builder->where('midazolam_aj ','');
				if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
				$query = $builder->get();
				$record14 = $query->getResult();
				foreach($record14 as $row) {
					$midazolam_dose = $row->NO;
					$total71 += floatval($row->NO);
				$all_total7 += floatval($row->NO);
				}
				$midazolam[] = array(
						'day'   => 'NO',
						'sell' => $midazolam_dose
				);
		
				$builder = $db->table('procedure_csa');
				$query = $builder->select("count(midazolam_aj) as YES");
				$query = $builder->where('midazolam_aj !=','');
				if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
				$query = $builder->get();
				$record15 = $query->getResult();
		
				foreach($record15 as $row) {
					$midazolam_dose = $row->YES;
					$total72 += floatval($row->YES);
				$all_total7 += floatval($row->YES);
				}
				$midazolam[] = array(
						'day'   => 'YES',
						'sell' => $midazolam_dose
				);
				$m_number1 = (($total71/$all_total7)*100);
				$m_number2 = (($total72/$all_total7)*100);
			
				$data['m_perc1'] = number_format((float)$m_number1, 2, '.', '')."%";
				$data['m_perc2'] = number_format((float)$m_number2, 2, '.', '')."%";
				$data['total71'] = $total71;
				$data['total72'] = $total72;
				$data['midazolam'] = ($midazolam);
	
					//  ---------------------------midazolam ADJUVANT----------------------
	
					$total91 = 0;
					$total92 = 0;
					$all_total9 = 0;
					$builder = $db->table('procedure_csa');
					$query = $builder->select("count(adrenaline_aj) as NO");
					$query = $builder->where('adrenaline_aj ','');
					if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
					$query = $builder->get();
					$record18 = $query->getResult();
					foreach($record18 as $row) {
						$adrenaline_dose = $row->NO;
						$total91 += floatval($row->NO);
					$all_total9 += floatval($row->NO);
					}
					$adrenaline[] = array(
							'day'   => 'NO',
							'sell' => $adrenaline_dose
					);
			
					$builder = $db->table('procedure_csa');
					$query = $builder->select("count(adrenaline_aj) as YES");
					$query = $builder->where('adrenaline_aj !=','');
					if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
					$query = $builder->get();
					$record19 = $query->getResult();
			
					foreach($record19 as $row) {
						$adrenaline_dose = $row->YES;
						$total92 += floatval($row->YES);
						$all_total9 += floatval($row->YES);
					}
					$adrenaline[] = array(
							'day'   => 'YES',
							'sell' => $adrenaline_dose
					);
					$a_number1 = (($total91/$all_total9)*100);
					$a_number2 = (($total92/$all_total9)*100);
			 
					 $data['a_perc1'] = number_format((float)$a_number1, 2, '.', '')."%";
					 $data['a_perc2'] = number_format((float)$a_number2, 2, '.', '')."%";
					 $data['total91'] = $total91;
					 $data['total92'] = $total92;
					$data['adrenaline'] = ($adrenaline);
	
					//  ---------------------------other ADJUVANT----------------------
	
					$total81 = 0;
					$total82 = 0;
					$all_total8 = 0;
					$builder = $db->table('procedure_csa');
					$query = $builder->select("count(aj) as NO");
					$query = $builder->where('aj ','NO');
					if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
					$query = $builder->get();
					$record16 = $query->getResult();
					foreach($record16 as $row) {
						$other7 = $row->NO;
						$total81 += floatval($row->NO);
					$all_total8 += floatval($row->NO);
					}
					$other[] = array(
							'day'   => 'NO',
							'sell' => $other7
					);
			
					$builder = $db->table('procedure_csa');
					$query = $builder->select("count(aj) as YES");
					$query = $builder->where('aj ','YES');
					if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
					$query = $builder->get();
					$record17 = $query->getResult();
			
					foreach($record17 as $row) {
						$other7 = $row->YES;
						$total82 += floatval($row->YES);
						$all_total8 += floatval($row->YES);
					}
					$other[] = array(
							'day'   => 'YES',
							'sell' => $other7
					);
					$oth_number1 = (($total81/$all_total8)*100);
					$oth_number2 = (($total82/$all_total8)*100);
			 
					 $data['oth_perc1'] = number_format((float)$oth_number1, 2, '.', '')."%";
					 $data['oth_perc2'] = number_format((float)$oth_number2, 2, '.', '')."%";
					 $data['total81'] = $total81;
					 $data['total82'] = $total82;
					$data['other'] = ($other);
	
		return view('cnb/userReports/user_csa_adjuvant_v', $data);   
		
	}else{
		return redirect()->route("user-n-report");
	}
    }


	public function user_epidural_component_adjuvant() {
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){
		
			$total11 = 0;
			$total12 = 0;
			$all_total1 = 0;
			$builder = $db->table('procedure_cse');
			$query = $builder->select("count(opioid_dose) as NO");
			$query = $builder->where('opioid_dose ','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record3 = $query->getResult();
			foreach($record3 as $row) {
				$opioid_dose3 = $row->NO;
				$total11 += floatval($row->NO);
				$all_total1 += floatval($row->NO);
			}
			$opioide[] = array(
					'day'   => 'NO',
					'sell' => $opioid_dose3
			);
	
			$builder = $db->table('procedure_cse');
			$query = $builder->select("count(opioid_dose) as YES");
			$query = $builder->where('opioid_dose !=','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record2 = $query->getResult();
	
			foreach($record2 as $row) {
				$opioid_dose = $row->YES;
				$total12 += floatval($row->YES);
		$all_total1 += floatval($row->YES);
			}
			$opioide[] = array(
					'day'   => 'YES',
					'sell' => $opioid_dose
			);
			$o_number1 = (($total11/$all_total1)*100);
			$o_number2 = (($total12/$all_total1)*100);
			
			$data['o_perc1'] = number_format((float)$o_number1, 2, '.', '')."%";
			$data['o_perc2'] = number_format((float)$o_number2, 2, '.', '')."%";
			$data['total11'] = $total11;
			$data['total12'] = $total12;
			
			$data['opioide'] = ($opioide); 
	
	
			//  ---------------------------OPIOIDE ADJUVANT----------------------
	
			$total21 = 0;
			$total22 = 0;
			$all_total2 = 0;
			$builder = $db->table('procedure_cse');
			$query = $builder->select("count(clonidina_dose) as NO");
			$query = $builder->where('clonidina_dose ','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record4 = $query->getResult();
			foreach($record4 as $row) {
				$clonidina_dose = $row->NO;
				$total21 += floatval($row->NO);
			$all_total2 += floatval($row->NO);	
			}
			$clonidina[] = array(
					'day'   => 'NO',
					'sell' => $clonidina_dose
			);
	
			$builder = $db->table('procedure_cse');
			$query = $builder->select("count(clonidina_dose) as YES");
			$query = $builder->where('clonidina_dose !=','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record5 = $query->getResult();
	
			foreach($record5 as $row) {
				$clonidina_dose = $row->YES;
				$total22 += floatval($row->YES);
			$all_total2 += floatval($row->YES);
			}
			$clonidina[] = array(
					'day'   => 'YES',
					'sell' => $clonidina_dose
			);
	
			$c_number1 = (($total21/$all_total2)*100);
		$c_number2 = (($total22/$all_total2)*100);
	
		$data['c_perc1'] = number_format((float)$c_number1, 2, '.', '')."%";
		$data['c_perc2'] = number_format((float)$c_number2, 2, '.', '')."%";
		$data['total21'] = $total21;
		$data['total22'] = $total22;
			$data['clonidina'] = ($clonidina); 
	
			//  ---------------------------dexmeditomidine ADJUVANT----------------------
			$total31 = 0;
			$total32 = 0;
			$all_total3 = 0;
	
			$builder = $db->table('procedure_cse');
			$query = $builder->select("count(dexmeditomidine_dose) as NO");
			$query = $builder->where('dexmeditomidine_dose ','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record6 = $query->getResult();
			foreach($record6 as $row) {
				$dexmeditomidine_dose = $row->NO;
				$total31 += floatval($row->NO);
				$all_total3 += floatval($row->NO);
			}
			$dexmeditomidine[] = array(
					'day'   => 'NO',
					'sell' => $dexmeditomidine_dose
			);
	
			$builder = $db->table('procedure_cse');
			$query = $builder->select("count(dexmeditomidine_dose) as YES");
			$query = $builder->where('dexmeditomidine_dose !=','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record7 = $query->getResult();
	
			foreach($record7 as $row) {
				$dexmeditomidine_dose = $row->YES;
				$total32 += floatval($row->YES);
				$all_total3 += floatval($row->YES);
			}
			$dexmeditomidine[] = array(
					'day'   => 'YES',
					'sell' => $dexmeditomidine_dose
			);
	
			$de_number1 = (($total31/$all_total3)*100);
			$de_number2 = (($total32/$all_total3)*100);
		
			$data['de_perc1'] = number_format((float)$de_number1, 2, '.', '')."%";
			$data['de_perc2'] = number_format((float)$de_number2, 2, '.', '')."%";
			$data['total31'] = $total31;
			$data['total32'] = $total32;
			$data['dexmeditomidine'] = ($dexmeditomidine); 
	
	
			//  ---------------------------dexamephasone ADJUVANT----------------------
	
			$total41 = 0;
			$total42 = 0;
			$all_total4 = 0;
			$builder = $db->table('procedure_cse');
			$query = $builder->select("count(dexamephasone_dose) as NO");
			$query = $builder->where('dexamephasone_dose ','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record8 = $query->getResult();
			foreach($record8 as $row) {
				$dexamephasone_dose = $row->NO;
				$total41 += floatval($row->NO);
		$all_total4 += floatval($row->NO);
			}
			$dexamephasone[] = array(
					'day'   => 'NO',
					'sell' => $dexamephasone_dose
			);
	
			$builder = $db->table('procedure_cse');
			$query = $builder->select("count(dexamephasone_dose) as YES");
			$query = $builder->where('dexamephasone_dose !=','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record9 = $query->getResult();
	
			foreach($record9 as $row) {
				$dexamephasone_dose = $row->YES;
				$total42 += floatval($row->YES);
				$all_total4 += floatval($row->YES);
			}
			$dexamephasone[] = array(
					'day'   => 'YES',
					'sell' => $dexamephasone_dose
			);
	
			$da_number1 = (($total41/$all_total4)*100);
		$da_number2 = (($total42/$all_total4)*100);
	
		$data['da_perc1'] = number_format((float)$da_number1, 2, '.', '')."%";
		$data['da_perc2'] = number_format((float)$da_number2, 2, '.', '')."%";
		$data['total41'] = $total41;
		$data['total42'] = $total42;
			$data['dexamephasone'] = ($dexamephasone);
	
	
			//  ---------------------------tramadol ADJUVANT----------------------
	
			$total51 = 0;
			$total52 = 0;
			$all_total5 = 0;
			$builder = $db->table('procedure_cse');
			$query = $builder->select("count(trmadol_dose) as NO");
			$query = $builder->where('trmadol_dose ','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record10 = $query->getResult();
			foreach($record10 as $row) {
				$tramadol_dose = $row->NO;
				$total51 += floatval($row->NO);
				$all_total5 += floatval($row->NO);
			}
			$tramadol[] = array(
					'day'   => 'NO',
					'sell' => $tramadol_dose
			);
	
			$builder = $db->table('procedure_cse');
			$query = $builder->select("count(trmadol_dose) as YES");
			$query = $builder->where('trmadol_dose !=','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record11 = $query->getResult();
	
			foreach($record11 as $row) {
				$tramadol_dose = $row->YES;
				$total52 += floatval($row->YES);
		$all_total5 += floatval($row->YES);
			}
			$tramadol[] = array(
					'day'   => 'YES',
					'sell' => $tramadol_dose
			);
			$t_number1 = (($total51/$all_total5)*100);
		$t_number2 = (($total52/$all_total5)*100);
	
		$data['t_perc1'] = number_format((float)$t_number1, 2, '.', '')."%";
		$data['t_perc2'] = number_format((float)$t_number2, 2, '.', '')."%";
		$data['total51'] = $total51;
		$data['total52'] = $total52;
			$data['tramadol'] = ($tramadol);
	
	
			//  ---------------------------kepamine ADJUVANT----------------------
	
			$total61 = 0;
			$total62 = 0;
			$all_total6 = 0;
			$builder = $db->table('procedure_cse');
			$query = $builder->select("count(kepamine_dose) as NO");
			$query = $builder->where('kepamine_dose ','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record12 = $query->getResult();
			foreach($record12 as $row) {
				$kepamine_dose = $row->NO;
				$total61 += floatval($row->NO);
			$all_total6 += floatval($row->NO);
			}
			$kepamine[] = array(
					'day'   => 'NO',
					'sell' => $kepamine_dose
			);
	
			$builder = $db->table('procedure_cse');
			$query = $builder->select("count(kepamine_dose) as YES");
			$query = $builder->where('kepamine_dose !=','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record13 = $query->getResult();
	
			foreach($record13 as $row) {
				$kepamine_dose = $row->YES;
				$total62 += floatval($row->YES);
			$all_total6 += floatval($row->YES);
			}
			$kepamine[] = array(
					'day'   => 'YES',
					'sell' => $kepamine_dose
			);
	
			$k_number1 = (($total61/$all_total6)*100);
		$k_number2 = (($total62/$all_total6)*100);
	
		$data['k_perc1'] = number_format((float)$k_number1, 2, '.', '')."%";
		$data['k_perc2'] = number_format((float)$k_number2, 2, '.', '')."%";
		$data['total61'] = $total61;
		$data['total62'] = $total62;
			$data['ketamine'] = ($kepamine);
	
	
				//  ---------------------------midazolam ADJUVANT----------------------
	
				$total71 = 0;
				$total72 = 0;
				$all_total7 = 0;
				$builder = $db->table('procedure_cse');
				$query = $builder->select("count(midazolam_dose) as NO");
				$query = $builder->where('midazolam_dose ','');
				if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
				$query = $builder->get();
				$record14 = $query->getResult();
				foreach($record14 as $row) {
					$midazolam_dose = $row->NO;
					$total71 += floatval($row->NO);
				$all_total7 += floatval($row->NO);
				}
				$midazolam[] = array(
						'day'   => 'NO',
						'sell' => $midazolam_dose
				);
		
				$builder = $db->table('procedure_cse');
				$query = $builder->select("count(midazolam_dose) as YES");
				$query = $builder->where('midazolam_dose !=','');
				if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
				$query = $builder->get();
				$record15 = $query->getResult();
		
				foreach($record15 as $row) {
					$midazolam_dose = $row->YES;
					$total72 += floatval($row->YES);
				$all_total7 += floatval($row->YES);
				}
				$midazolam[] = array(
						'day'   => 'YES',
						'sell' => $midazolam_dose
				);
	
				$m_number1 = (($total71/$all_total7)*100);
		$m_number2 = (($total72/$all_total7)*100);
	
		$data['m_perc1'] = number_format((float)$m_number1, 2, '.', '')."%";
		$data['m_perc2'] = number_format((float)$m_number2, 2, '.', '')."%";
		$data['total71'] = $total71;
		$data['total72'] = $total72;
				$data['midazolam'] = ($midazolam);
	
	
								//  ---------------------------adrenaline ADJUVANT----------------------
	
								$total91 = 0;
								$total92 = 0;
								$all_total9 = 0;
								$builder = $db->table('procedure_cse');
								$query = $builder->select("count(adrenaline_dose) as NO");
								$query = $builder->where('adrenaline_dose ','');
								if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
								$query = $builder->get();
								$record18 = $query->getResult();
								foreach($record18 as $row) {
									$adrenaline_dose = $row->NO;
									$total91 += floatval($row->NO);
									$all_total9 += floatval($row->NO);
								}
								$adrenaline[] = array(
										'day'   => 'NO',
										'sell' => $adrenaline_dose
								);
						
								$builder = $db->table('procedure_cse');
								$query = $builder->select("count(adrenaline_dose) as YES");
								$query = $builder->where('adrenaline_dose !=','');
								if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
								$query = $builder->get();
								$record19 = $query->getResult();
						
								foreach($record19 as $row) {
									$adrenaline_dose = $row->YES;
									$total92 += floatval($row->YES);
						$all_total9 += floatval($row->YES);
								}
								$adrenaline[] = array(
										'day'   => 'YES',
										'sell' => $adrenaline_dose
								);
	
								$a_number1 = (($total91/$all_total9)*100);
				$a_number2 = (($total92/$all_total9)*100);
		 
				 $data['a_perc1'] = number_format((float)$a_number1, 2, '.', '')."%";
				 $data['a_perc2'] = number_format((float)$a_number2, 2, '.', '')."%";
				 $data['total91'] = $total91;
				 $data['total92'] = $total92;
								$data['adrenaline'] = ($adrenaline);
	
				
	
					//  ---------------------------other ADJUVANT----------------------
	
	
					$builder = $db->table('procedure_cse');
					$query = $builder->select("count(aj_epidural_other) as NO");
					$query = $builder->where('aj_epidural_other ','NO');
					if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
					$query = $builder->get();
					$record16 = $query->getResult();
					foreach($record16 as $row) {
						$other7 = $row->NO;
					
					}
					$other[] = array(
							'day'   => 'NO',
							'sell' => $other7
					);
			
					$builder = $db->table('procedure_cse');
					$query = $builder->select("count(aj_epidural_other) as YES");
					$query = $builder->where('aj_epidural_other ','YES');
					if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
					$query = $builder->get();
					$record17 = $query->getResult();
			
					foreach($record17 as $row) {
						$other7 = $row->YES;
						
						
					}
					$other[] = array(
							'day'   => 'YES',
							'sell' => $other7
					);
	
	
					$data['other'] = ($other);
	
		return view('cnb/userReports/user_epidural_component_adjuvant_v', $data);   
		
	}else{
		return redirect()->route("user-n-report");
	}
    }



	
	public function user_spinal_component_adjuvant() {
         	
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){
		
			$total11 = 0;
			$total12 = 0;
			$all_total1 = 0;
			$builder = $db->table('procedure_cse');
			$query = $builder->select("count(aj_spinal_opioid) as NO");
			$query = $builder->where('aj_spinal_opioid ','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record3 = $query->getResult();
			foreach($record3 as $row) {
				$opioid_dose3 = $row->NO;
				$total11 += floatval($row->NO);
				$all_total1 += floatval($row->NO);
			}
			$opioide[] = array(
					'day'   => 'NO',
					'sell' => $opioid_dose3
					
			);
	
			$builder = $db->table('procedure_cse');
			$query = $builder->select("count(aj_spinal_opioid) as YES");
			$query = $builder->where('aj_spinal_opioid !=','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record2 = $query->getResult();
	
			foreach($record2 as $row) {
				$opioid_dose = $row->YES;
				$total12 += floatval($row->YES);
		$all_total1 += floatval($row->YES);
			}
			$opioide[] = array(
					'day'   => 'YES',
					'sell' => $opioid_dose
			);
	
			$o_number1 = (($total11/$all_total1)*100);
			$o_number2 = (($total12/$all_total1)*100);
			
			$data['o_perc1'] = number_format((float)$o_number1, 2, '.', '')."%";
			$data['o_perc2'] = number_format((float)$o_number2, 2, '.', '')."%";
			$data['total11'] = $total11;
			$data['total12'] = $total12;
	
			$data['opioide'] = ($opioide); 
	
	
			//  ---------------------------OPIOIDE ADJUVANT----------------------
			$total21 = 0;
			$total22 = 0;
			$all_total2 = 0;
			$builder = $db->table('procedure_cse');
			$query = $builder->select("count(aj_spinal_clonidne) as NO");
			$query = $builder->where('aj_spinal_clonidne ','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record4 = $query->getResult();
			foreach($record4 as $row) {
				$clonidina_dose = $row->NO;
				$total21 += floatval($row->NO);
				$all_total2 += floatval($row->NO);			
			}
			$clonidina[] = array(
					'day'   => 'NO',
					'sell' => $clonidina_dose
			);
	
			$builder = $db->table('procedure_cse');
			$query = $builder->select("count(aj_spinal_clonidne) as YES");
			$query = $builder->where('aj_spinal_clonidne !=','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record5 = $query->getResult();
	
			foreach($record5 as $row) {
				$clonidina_dose = $row->YES;
				$total22 += floatval($row->YES);
			$all_total2 += floatval($row->YES);
			}
			$clonidina[] = array(
					'day'   => 'YES',
					'sell' => $clonidina_dose
			);
	
			$c_number1 = (($total21/$all_total2)*100);
			$c_number2 = (($total22/$all_total2)*100);
		
			$data['c_perc1'] = number_format((float)$c_number1, 2, '.', '')."%";
			$data['c_perc2'] = number_format((float)$c_number2, 2, '.', '')."%";
			$data['total21'] = $total21;
			$data['total22'] = $total22;
			$data['clonidina'] = ($clonidina); 
	
			//  ---------------------------dexmeditomidine ADJUVANT----------------------
			$total31 = 0;
			$total32 = 0;
			$all_total3 = 0;
			$builder = $db->table('procedure_cse');
			$query = $builder->select("count(aj_spinal_dexmeditomidine) as NO");
			$query = $builder->where('aj_spinal_dexmeditomidine ','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record6 = $query->getResult();
			foreach($record6 as $row) {
				$dexmeditomidine_dose = $row->NO;
				$total31 += floatval($row->NO);
				$all_total3 += floatval($row->NO);
			}
			$dexmeditomidine[] = array(
					'day'   => 'NO',
					'sell' => $dexmeditomidine_dose
			);
	
			$builder = $db->table('procedure_cse');
			$query = $builder->select("count(aj_spinal_dexmeditomidine) as YES");
			$query = $builder->where('aj_spinal_dexmeditomidine !=','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record7 = $query->getResult();
	
			foreach($record7 as $row) {
				$dexmeditomidine_dose = $row->YES;
				$total32 += floatval($row->YES);
		$all_total3 += floatval($row->YES);
			}
			$dexmeditomidine[] = array(
					'day'   => 'YES',
					'sell' => $dexmeditomidine_dose
			);
	
			$de_number1 = (($total31/$all_total3)*100);
		$de_number2 = (($total32/$all_total3)*100);
	
		$data['de_perc1'] = number_format((float)$de_number1, 2, '.', '')."%";
		$data['de_perc2'] = number_format((float)$de_number2, 2, '.', '')."%";
		$data['total31'] = $total31;
		$data['total32'] = $total32;
			$data['dexmeditomidine'] = ($dexmeditomidine); 
	
	
			//  ---------------------------dexamephasone ADJUVANT----------------------
	
			$total41 = 0;
			$total42 = 0;
			$all_total4 = 0;
			$builder = $db->table('procedure_cse');
			$query = $builder->select("count(aj_spinal_dexamethasone) as NO");
			$query = $builder->where('aj_spinal_dexamethasone ','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record8 = $query->getResult();
			foreach($record8 as $row) {
				$dexamephasone_dose = $row->NO;
				$total41 += floatval($row->NO);
				$all_total4 += floatval($row->NO);
			}
			$dexamephasone[] = array(
					'day'   => 'NO',
					'sell' => $dexamephasone_dose
			);
	
			$builder = $db->table('procedure_cse');
			$query = $builder->select("count(aj_spinal_dexamethasone) as YES");
			$query = $builder->where('aj_spinal_dexamethasone !=','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record9 = $query->getResult();
	
			foreach($record9 as $row) {
				$dexamephasone_dose = $row->YES;
				$total42 += floatval($row->YES);
				$all_total4 += floatval($row->YES);
			}
			$dexamephasone[] = array(
					'day'   => 'YES',
					'sell' => $dexamephasone_dose
			);
	
			$da_number1 = (($total41/$all_total4)*100);
			$da_number2 = (($total42/$all_total4)*100);
		
			$data['da_perc1'] = number_format((float)$da_number1, 2, '.', '')."%";
			$data['da_perc2'] = number_format((float)$da_number2, 2, '.', '')."%";
			$data['total41'] = $total41;
			$data['total42'] = $total42;
			$data['dexamephasone'] = ($dexamephasone);
	
	
			//  ---------------------------tramadol ADJUVANT----------------------
	
			$total51 = 0;
			$total52 = 0;
			$all_total5 = 0;
			$builder = $db->table('procedure_cse');
			$query = $builder->select("count(aj_spinal_tramadol) as NO");
			$query = $builder->where('aj_spinal_tramadol ','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record10 = $query->getResult();
			foreach($record10 as $row) {
				$tramadol_dose = $row->NO;
				$total51 += floatval($row->NO);
				$all_total5 += floatval($row->NO);
			}
			$tramadol[] = array(
					'day'   => 'NO',
					'sell' => $tramadol_dose
			);
	
			$builder = $db->table('procedure_cse');
			$query = $builder->select("count(aj_spinal_tramadol) as YES");
			$query = $builder->where('aj_spinal_tramadol !=','');
			if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
			$query = $builder->get();
			$record11 = $query->getResult();
	
			foreach($record11 as $row) {
				$tramadol_dose = $row->YES;
				$total52 += floatval($row->YES);
				$all_total5 += floatval($row->YES);
			}
			$tramadol[] = array(
					'day'   => 'YES',
					'sell' => $tramadol_dose
			);
	
			$t_number1 = (($total51/$all_total5)*100);
			$t_number2 = (($total52/$all_total5)*100);
		
			$data['t_perc1'] = number_format((float)$t_number1, 2, '.', '')."%";
			$data['t_perc2'] = number_format((float)$t_number2, 2, '.', '')."%";
			$data['total51'] = $total51;
			$data['total52'] = $total52;
			$data['tramadol'] = ($tramadol);
	
	
			
	
					//  ---------------------------adrenaline ADJUVANT----------------------
	
					$total91 = 0;
					$total92 = 0;
					$all_total9 = 0;
					$builder = $db->table('procedure_cse');
					$query = $builder->select("count(aj_spinal_adrenaline) as NO");
					$query = $builder->where('aj_spinal_adrenaline ','');
					if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
					$query = $builder->get();
					$record18 = $query->getResult();
					foreach($record18 as $row) {
						$adrenaline_dose = $row->NO;
						$total91 += floatval($row->NO);
						$all_total9 += floatval($row->NO);
					}
					$adrenaline[] = array(
							'day'   => 'NO',
							'sell' => $adrenaline_dose
					);
			
					$builder = $db->table('procedure_cse');
					$query = $builder->select("count(aj_spinal_adrenaline) as YES");
					$query = $builder->where('aj_spinal_adrenaline !=','');
					if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
					$query = $builder->get();
					$record19 = $query->getResult();
			
					foreach($record19 as $row) {
						$adrenaline_dose = $row->YES;
						$total92 += floatval($row->YES);
						$all_total9 += floatval($row->YES);
					}
					$adrenaline[] = array(
							'day'   => 'YES',
							'sell' => $adrenaline_dose
					);
	
					$a_number1 = (($total91/$all_total9)*100);
					$a_number2 = (($total92/$all_total9)*100);
			 
					 $data['a_perc1'] = number_format((float)$a_number1, 2, '.', '')."%";
					 $data['a_perc2'] = number_format((float)$a_number2, 2, '.', '')."%";
					 $data['total91'] = $total91;
					 $data['total92'] = $total92;
					$data['adrenaline'] = ($adrenaline);
	
				
	
					//  ---------------------------other ADJUVANT----------------------
	
	
					$total81 = 0;
					$total82 = 0;
					$all_total8 = 0;
					$builder = $db->table('procedure_cse');
					$query = $builder->select("count(aj_epidural_other) as NO");
					$query = $builder->where('aj_epidural_other ','NO');
					if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
					$query = $builder->get();
					$record16 = $query->getResult();
					foreach($record16 as $row) {
						$other7 = $row->NO;
					}
					// $other[] = array(
					// 		'day'   => 'NO',
					// 		'sell' => $other7
					// );
			
					$builder = $db->table('procedure_cse');
					$query = $builder->select("aj_epidural_other");
					if($from_date && $to_date){
			  $query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
			  $query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
			}
					// $query = $builder->like('aj_epidural_other','[{"name":"","dose":""}]');
	
					
					$query = $builder->get();
					$record17 = $query->getResult();
					
					foreach($record17 as $key => $row) {
						$other = $record17[11]->aj_epidural_other;
						// foreach($other as $key =>$val){
							
						// 	$other7 = $val;
						// }
						// print_r($other);die();
					}
	
					$other[] = array(
						'day'   => 'YES',
						'sell' => $other7
					);
					$data['other'] = ($other);
	
				
		return view('cnb/userReports/user_spinal_component_adjuvant_v', $data);      
		
	}else{
		return redirect()->route("user-n-report");
	}
    }
  
   public function user_safety() {  
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);

		if($from_date && $to_date  && $n_type != 'NULL'){

			$total = session()->get('n'); 
			$builder = $db->table('cnb_postop');
		    $query = $builder->select("COUNT(cnb_postop.id) as count");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
		    $query = $builder->where('cnb_preop.basic_monitering','YES');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();
			
			if($record){
				foreach($record as $row) {
					$other16[] = array(
						'day'   => 'Basic Monitoring',
						'sell' => floatval($row->count)
					);
				}
			}
			else{
				$other16[] = array(
						'day'   => 'Basic Monitoring',
						'sell' => 0
					);
			}


			$builder = $db->table('cnb_postop');
		    $query = $builder->select("COUNT(cnb_postop.id) as count");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
		    $query = $builder->where('cnb_preop.resuscitation_eq','YES'); 
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();
			
			if($record){
				foreach($record as $row) {
					$other16[] = array(
						'day'   => 'Resuscitation Equipment Available',
						'sell' => floatval($row->count)
					);
				}
			}
			else{
				$other16[] = array(
						'day'   => 'Resuscitation Equipment Available',
						'sell' => 0
					);
			}


			$builder = $db->table('cnb_postop');
		    $query = $builder->select("COUNT(cnb_postop.id) as count");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
		    $query = $builder->where('cnb_preop.lipid_rescue','YES');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();
			
			if($record){
				foreach($record as $row) {
					$other16[] = array(
						'day'   => 'Lipid Rescue Available',
						'sell' => floatval($row->count)
					);
				}
			}
			else{
				$other16[] = array(
						'day'   => 'Lipid Rescue Available',
						'sell' => 0
					);
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("COUNT(cnb_postop.id) as count");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
		    $query = $builder->where('cnb_preop.consent_taken','YES'); 
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();
			
			if($record){
				foreach($record as $row) {
					$other16[] = array(
						'day'   => 'Consent Taken',
						'sell' => floatval($row->count)
					);
				}
			}
			else{
				$other16[] = array(
						'day'   => 'Consent Taken',
						'sell' => 0
					);
			}

			$builder = $db->table('cnb_postop');
		    $query = $builder->select("COUNT(cnb_postop.id) as count");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
		    $query = $builder->where('cnb_preop.timeout','YES');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();
			
			if($record){
				foreach($record as $row) {
					$other16[] = array(
						'day'   => 'Time Out / Correct Side Check Done',
						'sell' => floatval($row->count)
					);
				}
			}
			else{
				$other16[] = array(
						'day'   => 'Time Out / Correct Side Check Done',
						'sell' => 0
					);
			}
	        $data['other16'] = $other16; 
	        $data['total'] = $total; 
			return view('cnb/userReports/user_safety_v', $data);     
			
		}
		else{
			return redirect()->route("user-n-report");
		}
    }
     public function user_surgery() {  
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);


		if($from_date && $to_date  && $n_type != 'NULL'){

			$total = session()->get('n'); 
			$builder = $db->table('cnb_postop');
		    $query = $builder->select("COUNT(cnb_postop.id) as count");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
		    $query = $builder->where('cnb_preop.category','Elective');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();
			
			if($record){
				foreach($record as $row) {
					$category[] = array(
						'day'   => 'Elective',
						'sell' => floatval($row->count)
					);
				}
			}
			else{
				$category[] = array(
						'day'   => 'Basic Monitoring',
						'sell' => 0
					);
			}



			$total = session()->get('n'); 
			$builder = $db->table('cnb_postop');
		    $query = $builder->select("COUNT(cnb_postop.id) as count");
		    $builder->join('cnb_preop', 'cnb_preop.patient_id = cnb_postop.patient_id');
		    $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
		    $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
		    $query = $builder->where('cnb_preop.category','Emergency');
            $query = $builder->where('cnb_postop.dr_id ',$dr_id);
		    $query = $builder->get();
		    $record = $query->getResult();
			
			if($record){
				foreach($record as $row) {
					$category[] = array(
						'day'   => 'Emergency',
						'sell' => floatval($row->count)
					);
				}
			}
			else{
				$category[] = array(
						'day'   => 'Basic Monitoring',
						'sell' => 0
					);
			}

			$data['category'] = ($category);
			$data['total'] = $total;   
			return view('cnb/userReports/user_surgery', $data);

		}
		else{
			return redirect()->route("user-n-report");
		}
    }
	
		public function user_Epidural_Component_Single_Dose() {  
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);


		if($from_date && $to_date  && $n_type != 'NULL'){

		$builder = $db->table('procedure_epidural');
		$query = $builder->select("COUNT(id) as count, la_regimen as s");
		if($from_date && $to_date){
          	$query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          	$query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        	}
		$query = $builder->groupBy('la_regimen');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$la_regimen = [];
		foreach($record as $row) {
			$la_regimen[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}


		$data['products'] = ($products);
		$data['la_regimen'] = $la_regimen;

		$data['total'] = $total;

		return view('cnb/userReports/user_epidural_component_single_dose', $data);      
		
	}else{
		return redirect()->route("user-n-report");
	}
    }
		public function user_Epidural_Component_Sala_Dose() {  
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);


		if($from_date && $to_date  && $n_type != 'NULL'){

		$builder = $db->table('procedure_epidural');
		$query = $builder->select("COUNT(id) as count, la_regimen as s");
		if($from_date && $to_date){
          	$query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          	$query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        	}
		$query = $builder->groupBy('la_regimen');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$la_regimen = [];
		foreach($record as $row) {
			$la_regimen[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}


		$data['products'] = ($products);
		$data['la_regimen'] = $la_regimen;

		$data['total'] = $total;

		return view('cnb/userReports/user_epidural_component_sala_dose', $data);      
		
	}else{
		return redirect()->route("user-n-report");
	}
    }
		public function user_Spinal_Component_Single_Dose() {  
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);


		if($from_date && $to_date  && $n_type != 'NULL'){

		$builder = $db->table('procedure_epidural');
		$query = $builder->select("COUNT(id) as count, la_regimen as s");
		if($from_date && $to_date){
          	$query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          	$query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        	}
		$query = $builder->groupBy('la_regimen');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$la_regimen = [];
		foreach($record as $row) {
			$la_regimen[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}


		$data['products'] = ($products);
		$data['la_regimen'] = $la_regimen;

		$data['total'] = $total;

		return view('cnb/userReports/user_Spinal_Component_Single_Dose', $data);      
		
	}else{
		return redirect()->route("user-n-report");
	}
    }
	public function user_Spinal_Component_Combo_Dose() {  
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);


		if($from_date && $to_date  && $n_type != 'NULL'){

		$builder = $db->table('procedure_epidural');
		$query = $builder->select("COUNT(id) as count, la_regimen as s");
		if($from_date && $to_date){
          	$query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          	$query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        	}
		$query = $builder->groupBy('la_regimen');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$la_regimen = [];
		foreach($record as $row) {
			$la_regimen[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}


		$data['products'] = ($products);
		$data['la_regimen'] = $la_regimen;

		$data['total'] = $total;

		return view('cnb/userReports/user_Spinal_Component_Combo_Dose', $data);      
		
	}else{
		return redirect()->route("user-n-report");
	}
    }
	public function user_Epidural_Single_Dose() {  
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);


		if($from_date && $to_date  && $n_type != 'NULL'){

		$builder = $db->table('procedure_epidural');
		$query = $builder->select("COUNT(id) as count, la_regimen as s");
		if($from_date && $to_date){
          	$query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          	$query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        	}
		$query = $builder->groupBy('la_regimen');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$la_regimen = [];
		foreach($record as $row) {
			$la_regimen[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}


		$data['products'] = ($products);
		$data['la_regimen'] = $la_regimen;

		$data['total'] = $total;

		return view('cnb/userReports/user_Epidural_Single_Dose', $data);      
		
	}else{
		return redirect()->route("user-n-report");
	}
    }
		public function user_Epidural_Sala_Combo_Dose() {  
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);


		if($from_date && $to_date  && $n_type != 'NULL'){

		$builder = $db->table('procedure_epidural');
		$query = $builder->select("COUNT(id) as count, la_regimen as s");
		if($from_date && $to_date){
          	$query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          	$query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        	}
		$query = $builder->groupBy('la_regimen');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$la_regimen = [];
		foreach($record as $row) {
			$la_regimen[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}


		$data['products'] = ($products);
		$data['la_regimen'] = $la_regimen;

		$data['total'] = $total;

		return view('cnb/userReports/user_Epidural_Sala_Combo_Dose', $data);      
		
	}else{
		return redirect()->route("user-n-report");
	}
    }
	public function user_Spinal_Dose() {  
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);


		if($from_date && $to_date  && $n_type != 'NULL'){

		$builder = $db->table('procedure_epidural');
		$query = $builder->select("COUNT(id) as count, la_regimen as s");
		if($from_date && $to_date){
          	$query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          	$query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        	}
		$query = $builder->groupBy('la_regimen');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$la_regimen = [];
		foreach($record as $row) {
			$la_regimen[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}


		$data['products'] = ($products);
		$data['la_regimen'] = $la_regimen;

		$data['total'] = $total;

		return view('cnb/userReports/user_Spinal_Dose', $data);      
		
	}else{
		return redirect()->route("user-n-report");
	}
    }
		public function user_Spinal_Combo_Dose() {  
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);


		if($from_date && $to_date  && $n_type != 'NULL'){

		$builder = $db->table('procedure_epidural');
		$query = $builder->select("COUNT(id) as count, la_regimen as s");
		if($from_date && $to_date){
          	$query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          	$query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        	}
		$query = $builder->groupBy('la_regimen');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$la_regimen = [];
		foreach($record as $row) {
			$la_regimen[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}


		$data['products'] = ($products);
		$data['la_regimen'] = $la_regimen;

		$data['total'] = $total;

		return view('cnb/userReports/user_Spinal_Combo_Dose', $data);      
		
	}else{
		return redirect()->route("user-n-report");
	}
    }
		public function user_csa_Component_single_Dose() {  
        
		$db = \Config\Database::connect();

		$from_date = session()->get('from_date');
		$to_date = session()->get('to_date');
        $dr_id = session()->get('dr_id');
		$n = session()->get('n');
    	$n_type = gettype($n);


		if($from_date && $to_date  && $n_type != 'NULL'){

		$builder = $db->table('procedure_epidural');
		$query = $builder->select("COUNT(id) as count, la_regimen as s");
		if($from_date && $to_date){
          	$query = $builder->where('created_at >=',date('Y-m-d',strtotime($from_date)));
          	$query = $builder->where('created_at <=',date('Y-m-d',strtotime($to_date)));
        	}
		$query = $builder->groupBy('la_regimen');
		$query = $builder->get();
		$record = $query->getResult();
		$total = 0;
		$la_regimen = [];
		foreach($record as $row) {
			$la_regimen[] = array(
			'day'   => $row->s,
			'sell' => floatval($row->count)
			);
			$total += floatval($row->count);
		}


		$data['products'] = ($products);
		$data['la_regimen'] = $la_regimen;

		$data['total'] = $total;

		return view('cnb/userReports/user_csa_Component_single_Dose', $data);      
		
	}else{
		return redirect()->route("user-n-report");
	}
    }
}