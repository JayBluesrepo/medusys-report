<?php namespace App\Models;

use CodeIgniter\Model;

class FeedbackModel extends Model
{
    protected $table ='manual_feedback';
    protected $allowedFields = ['id','dr_id','patient_id','drowsiness','pain_at_surgery','thirst','hoarseness','sore_throat','nausea_vomiting','feeling_cold','confusion_disorientation','backpain','shivering','pain_before_surgery',
    'anaesthesist_involved','well_managed','anaesthesist_time','regional_anaesthesia_info','anaesthesia_satisfaction','pain_therapy_satisfaction','nausea_vomit_satisfaction','numbness_limb_bothering','numbness_pain_experience',
    'similar_op_again','overall_satisfaction','any_suggestions','created_by','created_at','flag','updated_at','updated_by','upload_patient_status'];
}
?>