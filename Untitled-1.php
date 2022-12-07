<?php 


$builder = $db->table('cnb_postop');
        $query = $builder->select("AVG(cnb_patient_details.age) as average, STDDEV(cnb_patient_details.age) as std, MAX(cnb_patient_details.age) as maxage,MIN(cnb_patient_details.age) as minage,MAX(cnb_patient_details.weight_kg) as maxweight,MIN(cnb_patient_details.weight_kg) as minweight,AVG(cnb_patient_details.weight_kg) as weight_average, STDDEV(cnb_patient_details.weight_kg) as weight_std");

        $builder->join('cnb_patient_details', 'cnb_patient_details.id = cnb_postop.patient_id');
        $query = $builder->where('cnb_postop.procedure_date >=',date('Y-m-d',strtotime($from_date)));
        $query = $builder->where('cnb_postop.procedure_date <=',date('Y-m-d',strtotime($to_date)));
        $query = $builder->get();
        $record = $query->getResult();