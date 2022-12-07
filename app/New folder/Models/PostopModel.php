<?php namespace App\Models;
use CodeIgniter\Model;

class PostopModel extends Model
{
    protected $table ='cnb_postop';
    protected $allowedFields = ['id','patient_id','ps_postproc','ps_30mins','ps_1hr','nvs_postproc','nvs_30mins','nvs_1hr','ss_postproc','ss_30mins','ss_1hr','time_spent','intravenous_opioids','intra_name_dose','oral_opioids','oral_name_dose','tramadol','tram_name_dose','nsaid','nsa_name_dose',
    'paracetamol','para_name_dose','la_regimen','la_regimen_select','la_ropivacaine','la_bupivacaine','la_levobupivacaine','la_lignocaine','repeat','la_repeat_ropi','la_repeat_bupi','la_repeat_levo','la_repeat_ligno','other','other_name_dose','vasopressor_use_in_recovery','created_by','created_at','updated_at','updated_by'];
}
?>