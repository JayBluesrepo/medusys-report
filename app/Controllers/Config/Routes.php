<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Home::index');
$routes->resource('customer');
$routes->add('login','Home::login');
$routes->add('Re-OTP','registration/Forgot_OTP::otp_again');
// $routes->post('/Dashboard','CNB\Dashboard::index');
$routes->add('Registration','registration/Registration::index');
$routes->add('Existing_Member','registration/Existing_Member::index');
$routes->add('New-User-OTP','registration/New_User_OTP');
$routes->add('Payment','registration/Payment');
$routes->add('Thankyou','registration/Thankyou');
$routes->add('Check-User-OTP','registration/OTP');





/*--------------------------------------------------- CNB routes (START)------------------------------------- */

//--------------------------------  Dashboard - add patient ----------------------------------------- //
$routes->add('log-out','Logout::logout');
$routes->post('check-email-login','Login::check_email');
$routes->post('searchingPatients','cnb\addPatient::searching_patients');
$routes->post('searchPatients','cnb\addPatient::search_patients');
$routes->post('upload-patient-record','cnb\addPatient::upload_patient_record');
$routes->post('check-patient-id','cnb\addPatient::check_patient_id');
$routes->post('adding-new-patient','cnb\addPatient::adding_new_patient');
$routes->add('selectPatient','cnb\Dashboard::select_patient');

//----------------------------------  patient details ----------------------------------- //
$routes->post('History','cnb\patientDetails::history');
$routes->post('edit-patient-fetch','cnb\patientDetails::edit_patient_fetch');
$routes->post('delete-patient','cnb\patientDetails::delete_patient');
$routes->post('edit-patient-details','cnb\patientDetails::edit_patient_details');

// ------------------------- e-consent ------------------------------------------------------ //
$routes->post('e-mail','cnb\E_consent::email');

// --------------------------------------------------- pre-op --------------------------------- //
$routes->post('searchOption','cnb\Preop::search_option');
$routes->post('add-preop','cnb\Preop::add_preop');
$routes->post('search-option','cnb\PreopDetails::search_option');
$routes->post('editPreop','cnb\PreopDetails::edit_preop');

// ------------------------------------------------- procedure-------------------------------  //
$routes->post('add-combined-procedure','cnb\combinedSpinalEpidural::add_combined_procedure');
$routes->post('updateSpinalEpidural','cnb\combinedSpinalView::update_spinal_epidural');

$routes->post('addEpi','cnb\Epidural::add_epi');
$routes->post('editEpidu','cnb\EpiDetails::edit_epidu');

$routes->post('addSpin','cnb\Spinal::add_spin');
$routes->post('editSpinal','cnb\SpinalDetails::edit_spinal');

$routes->post('csa-procedure','cnb\CSA_add::csa_procedure');
$routes->post('updateCsa','cnb\CSA_add_view::update_csa');

//-------------------------------------------  post-op -------------------------------------- //
$routes->post('add-postop','cnb\Pacu::add_postop');
$routes->post('editPostop','cnb\PacuDetails::edit_postop');

// -------------------------------------------- follow-up ------------------------------- //
$routes->post('addFollow','cnb\followUp::add_follow');
$routes->post('editFollowup','cnb\FollowupDetails::edit_followup');

// ------------------------------------------- feedback ----------------------------------- //
$routes->post('addFeed','cnb\ManualFeedback::add_feed');
$routes->post('Resend','cnb\E_Feedback::resend');
$routes->post('add-efeed','cnb\E_Feedback::add_efeed');

/*--------------------------------------------------- CNB routes (END)------------------------------------- */


// ------------------------------------------registration (START) ----------------------------------

// --------------------------------- existing member------------ //
$routes->post('existingMember','registration\Existing_Member::check_gamer_id');
$routes->post('checkMail','registration\Existing_Member::check_mail');
$routes->post('checkUser','registration\Existing_Member::check_user');

//--------------------------- existing member OTP----------------------- //
$routes->post('Resend-otp','registration\OTP::resend');
$routes->post('checkOtp','registration\OTP::check_otp');

// ------------------------------new member ------------------------------------------//
$routes->post('check-mail','registration\Registration::check_mail');
$routes->post('addUser','registration\Registration::add_user');

//-------------------------------- new member OTP --------------------------------------//
$routes->post('re-send','registration\New_User_OTP::resend');
$routes->post('check-otp','registration\New_User_OTP::check_otp');

//------------------------------------- payment -------------------------------------------//
$routes->post('pay','registration\Payment::payments');

// ------------------------------------------registration (END)----------------------------------

// ---------------------------login(forgot password)-------------------------------------------

$routes->post('Forgot-Password','registration\Forgot_OTP::forgot_password');
$routes->post('Forgot-Check-OTP','registration\Forgot_OTP::forgot_check_otp');

// ------------------------------------my Account ----------------------------------------------------

$routes->post('My-Account-update','flowD\MyAccount::myaccount');
$routes->post('update-password','flowD\MyAccount::update_password');
$routes->post('check-email','flowD\MyAccount::check_email');

//----------------------------------- conference-------------------------------------



// --------------------------------------------------Flow Dashbord(START)------------------------------------

$routes->add('Dashboard','flowD/Specialities'); 
$routes->add('User','flowD/GasUser'); 
$routes->add('Gas','flowD/Gas'); 
$routes->add('Clinic-Databases','flowD/ClinicDatabases'); 
$routes->add('Patient-Management-System','flowD/PatientSystem'); 
$routes->add('Mels-Cme','flowD/MelsCme'); 
$routes->add('My-Account','flowD/MyAccount'); 

$routes->add('ICU','flowD/ICU'); 
$routes->add('Chronic-Pain','flowD/Chronic_Pain'); 
$routes->add('General-Medicine','flowD/General_Medicine'); 
$routes->add('cardiology','flowD/Cardiology'); 
$routes->add('endocrinology','flowD/Endocrinology'); 
$routes->add('General-Surgery','flowD/General_Surgery'); 
$routes->add('orthopaedics','flowD/Orthopaedics'); 
$routes->add('obstetrics','flowD/Obstetrics'); 

$routes->add('e-PHQ','flowD/e_phq'); 
$routes->add('tele-health','flowD/Tele_health'); 
$routes->add('e-consent','flowD/e_consent'); 
$routes->add('e-com','flowD/e_com'); 
$routes->add('patient-ecare','flowD/Patient_ecare');

$routes->add('pnb','flowD/PNB'); 
$routes->add('labour-analgesia','flowD/labour_analgesia'); 
// $routes->add('obstetrics-anaesthesia','flowD/obstetrics_anaesthesia'); 
$routes->add('anaesthesia-logbook','flowD/anaesthesia_logbook'); 


$routes->add('forum','flowD/Forum'); 
 
// $routes->add('e-library','flowD/E_Library'); 
// $routes->add('collaborate','flowD/Collaborate'); 

$routes->add('e-library','library/E_Library');                                       /*Changed*/
$routes->add('collaborate','flowD/Collaborate'); 
// $routes->add('Guidelines','library/Guidelines'); 



$routes->add('Types-Of-Categories','library/Guidelines');
$routes->add('sub-categories-type','library/Guidelines1');
$routes->post('search-details','library/Guidelines::search_details');
$routes->post('search-sub-details','library/Guidelines1::search_sub_details');
$routes->post('find-details','library/Guidelines1::find_details');


/* super admin */
$routes->add('Add-Access','admin/AddAccess');
// $routes->add('Add-User','admin/EditUser');
$routes->add('Add-Edit-User','admin/EditUser');
$routes->add('Add-Category','admin/Elibrary');
$routes->add('e-Library-Upload-File','admin/Loadlibrary');
// $routes->add('Super-Admin','admin/SuperAdminDash');
// $routes->add('Add-User','admin/AddUser');
$routes->add('Super-Admin-Dashboard','admin/SuperAdminDash');
$routes->add('super-admin','Home::super_admin');
$routes->add('admin/login','Home::super_admin');
$routes->add('Add-User','admin/AddUser');
$routes->post('Super-Admin-Login','admin/SuperAdminLogin');

$routes->post('create-user','admin/AddUser::create_user');
$routes->post('remove-user','admin/EditUser::remove_user');
$routes->post('edit-user','admin/EditUser::edit_user');
$routes->post('update-user','admin/EditUser::update_user');
// $routes->post('getAllUsers','admin/EditUser::get_all_users');
// $routes->get('data-layout', 'admin/EditUser::server_side_table_ssp_listing_layout');
$routes->get('list-data', 'admin/EditUser::get_all_users');

//$routes->get('login', 'Login::index',['filter'=>'usersnoauthfilter']);

/*------------ add access --------------*/
// $routes->post('saveMels','admin/AddAccess::save_mels');
$routes->post('saveAccess','admin/AddAccess::save_access');

/*------------ e-library --------------*/
$routes->get('list-datas', 'admin/Elibrary::get_all_users');
$routes->post('saveCategories','admin/Elibrary::save_category');
$routes->post('listFieldData','admin/Uploads::list_field_data');
$routes->post('uploadFile','admin/Uploads::upload_file');
$routes->post('remove-disease','admin/Elibrary::remove_disease');
$routes->post('edit-disease','admin/Elibrary::edit_disease');
$routes->post('update-disease','admin/Elibrary::update_disease');
$routes->post('delete-disease-data','admin/Loadlibrary::delete_disease');
$routes->post('edit-file','admin/Uploads::edit_file');

/*------------ load-library --------------*/
$routes->get('library-data', 'admin/Loadlibrary::get_all_users');
$routes->post('Delete-File', 'admin/Uploads::delete_file');

$routes->post('update-disease-data','admin/Elibrary::update_disease_data');

$routes->post('search-all-details', 'library/E_Library::search_all_details');
$routes->get('library-section', 'admin/AddAccess::get_all_users');
$routes->post('add-library-section', 'admin/AddAccess::add_library');
$routes->post('delete-e-library', 'admin/AddAccess::delete_library');
$routes->post('edit-e-library', 'admin/AddAccess::edit_library');
$routes->post('edit-e-library-section', 'admin/AddAccess::edit_e_library_section');
$routes->post('find-sub-categories', 'library/E_Library::find_sub_categories');
$routes->post('find-sub', 'admin/Uploads::find_sub');
$routes->post('table-details', 'admin/Uploads::table_details'); 
$routes->post('edit-elibrary', 'admin/Uploads::update_disease'); 
$routes->get('show-all-user-data', 'admin/UserManagement::show_all_user_data'); 
$routes->get('show-row-details', 'admin/UserManagement::show_row_details'); 


$routes->add('user-management','admin/UserManagement');

$routes->post('change-action', 'admin/UserManagement::change_action'); 
$routes->post('edit-change-action', 'admin/UserManagement::edit_change_action'); 
$routes->post('change-org', 'admin/SuperAdminLogin::change_org'); 

$routes->add('Conference','admin/Conference');   
$routes->get('conference-data', 'admin/Conference::get_all_users');  
$routes->post('add-conference','admin/Conference::add_conference'); 
$routes->post('edit-conference','admin/Conference::edit_conference'); 
$routes->post('update-conference','admin/Conference::update_conference');  
$routes->get('conference-all-data', 'Conference/Conference::conference_all_data');  

// ---------------------------------------------- LABOUR ----------------------------------------

$routes->post('searchingPatients-gas', 'flowD/Gas::searching_patients'); 
$routes->post('adding-new-patient-gas-page', 'flowD/Gas::adding_new_patient'); 
$routes->post('searchingPatientsDetails','labour/addPatient::search_patients');
$routes->add('Patients-labour','labour/Dashboard::select_patient');
$routes->post('upload-patient-record-search','labour/addPatient::upload_patient_record');


$routes->post('History-labour','labour\patientDetails::history');
$routes->post('delete-patient-labour','labour\patientDetails::delete_patient');
$routes->post('e-mail-labour','labour\E_consent::email');
$routes->post('edit-pre-procedure','labour\PreopDetails::edit_preop');
$routes->post('updateSpinalEpidural-labour','labour\combinedSpinalView::update_spinal_epidural');
$routes->post('editEpidu-labour','labour\EpiDetails::edit_epidu');
$routes->post('editSpinal-labour','labour\SpinalDetails::edit_spinal');
$routes->post('updateCsa-labour','labour\CSA_add_view::update_csa');
$routes->post('editPostop-labour','labour\PacuDetails::edit_postop');
$routes->post('Resend-labour','labour\E_Feedback::resend');
$routes->post('addFeed-labour','labour\ManualFeedback::add_feed');
$routes->post('add-efeed-labour','labour\E_Feedback::add_efeed');


//----------------------------------  patient details ----------------------------------- //

$routes->post('edit-patient-labour','labour\patientDetails::edit_patient_fetch');
$routes->post('add-pre-procedure','labour\Preop::add_preop');
$routes->post('labour-add-combined-procedure','labour\combinedSpinalEpidural::add_combined_procedure');
$routes->post('labour-addEpi','labour\Epidural::add_epi');
$routes->post('labour-addSpin','labour\Spinal::add_spin');
$routes->post('labour-csa-procedure','labour\CSA_add::csa_procedure');
$routes->post('labour-add-postop','labour\Pacu::add_postop');
$routes->post('labour-addFollow','labour\followUp::add_follow');
$routes->post('labour-editFollowup','labour\FollowupDetails::edit_followup');


// *
// * ---------------------------------------------------------------------------
// *                        Obstetrics & Anaesthesia
// * ---------------------------------------------------------------------------
// *

// $routes->add('obstetrics-anaesthesia','flowD/obstetrics_anaesthesia'); 

$routes->add('selectPatient-obstetrics','obstetrics\Dashboard::select_patient');
$routes->post('edit-patient-obstetrics','obstetrics\patientDetails::edit_patient_fetch');

$routes->post('e-mail-obstetrics','obstetrics\E_consent::email');
$routes->post('add-preop-obstetrics','obstetrics\Preop::add_preop');
$routes->post('add-combined-procedure-obstetrics','obstetrics\combinedSpinalEpidural::add_combined_procedure');
$routes->post('addSpin-obstetrics','obstetrics\Spinal::add_spin');
$routes->post('csa-procedure-obstetrics','obstetrics\CSA_add::csa_procedure');
$routes->post('addEpi-obstetrics','obstetrics\Epidural::add_epi');
$routes->post('searchPatients-obstetrics','obstetrics\addPatient::search_patients');


// ------------ new -----------

$routes->post('add-postop-obstetrics','obstetrics\Pacu::add_postop');
$routes->post('addFollow-obstetrics','obstetrics\followUp::add_follow');
$routes->post('addFeed-obstetrics','obstetrics\ManualFeedback::add_feed');
$routes->post('upload-patient-record-obstetrics','obstetrics\addPatient::upload_patient_record');
$routes->post('History-obstetrics','obstetrics\patientDetails::history');
$routes->post('edit-patient-fetch-obstetrics','obstetrics\patientDetails::edit_patient_fetch');
$routes->post('edit-patient-details-obstetrics','obstetrics\patientDetails::edit_patient_details');
$routes->post('add-efeed-obstetrics','obstetrics\E_Feedback::add_efeed');
$routes->post('Resend-obstetrics','obstetrics\E_Feedback::resend');
$routes->post('editPreop-obstetrics','obstetrics\PreopDetails::edit_preop');
$routes->post('editFollowup-obstetrics','obstetrics\FollowupDetails::edit_followup');



//----------------------------------  Conference details ----------------------------------- //
$routes->add('conference-workshops','conference/Conference::index');
$routes->add('Conference-Details','conference\conference::conference_about');
$routes->add('Programs','conference\conference::programs');
$routes->add('Faculty-Details','conference\conference::faculty_details');
$routes->post('indivisual-facultly-details','conference\conference::indivisual_facultly_details');
$routes->add('Registration-Details','conference\conference::registration_details');
$routes->add('Attend-Conference','conference\conference::attend_conference');
$routes->add('Feedback','conference\conference::feedback');
$routes->post('update-feedback','conference\conference::update_feedback');
$routes->add('Certificate','conference\conference::certificate');
$routes->post('Conference-pay','conference\Payment::payments');

/*
 * --------------------------------------------------------------------
 * Report Routing
 * --------------------------------------------------------------------
 */


$routes->add('reports-analytics','cnb/Reports');
$routes->add('n_report','cnb/Reports::n_report');
$routes->add('safety','cnb/Reports::safety');
$routes->add('surgical','cnb/Reports::surgical');
$routes->add('speciality','cnb/Reports::speciality');
$routes->add('location','cnb/Reports::location');
$routes->add('purpose','cnb/Reports::purpose'); 
$routes->add('consultant','cnb/Reports::consultant');
$routes->add('patient_status','cnb/Reports::patient_status');
$routes->add('sterility_features','cnb/Reports::sterility_features');
$routes->add('anatomical','cnb/Reports::anatomical');
$routes->add('ultra_sound','cnb/Reports::ultra_sound');
$routes->add('needle_brand','cnb/Reports::needle_brand');

$routes->add('report1','cnb/Reports::n_report1');
$routes->add('report2','cnb/Reports::n_report2');
$routes->add('report3','cnb/Reports::n_report3');

$routes->add('bar','cnb/Reports::bar');
$routes->get('/report', 'cnb/Reports::initChart');



/*
 * --------------------------------------------------------------------
 * Admin Add-Conference
 * --------------------------------------------------------------------
 */

$routes->add('PowerBI','admin/SuperAdminDash::power_bi_dash');   


//for conference-about
$routes->add('Conference','admin/Conference');   
$routes->get('conference-data', 'admin/Conference::get_all_users');  
$routes->post('add-conference','admin/Conference::add_conference'); 
$routes->add('edit-conference','admin/Conference::edit_conference'); 
$routes->post('update-conference','admin/Conference::update_conference'); 
$routes->get('conference-all-data', 'Conference/Conference::conference_all_data');  


//for conference program-schedule

$routes->add('Program-schedule','admin/Programschedule::program');
$routes->get('programschedule-data', 'admin/Programschedule::get_all_users');
$routes->post('program-schedule','admin/Programschedule::program_schedule');
$routes->add('program-scheduleedit','admin/Programschedule::edit_programschedule');
$routes->post('update-programschedule','admin/Programschedule::update_programschedule'); 
$routes->get('program-schedule-all-data', 'Programschedule/Programschedule::program-schedule_all_data');  

$routes->add('Faculty','admin/Faculty');
$routes->get('faculty-data','admin/Faculty::get_all_users');
$routes->post('faculty-add','admin/Faculty::faculty_add');
$routes->add('facultyedit','admin/Faculty::edit_faculty');
$routes->post('update-facultyedit','admin/Faculty::update_faculty'); 
$routes->get('faculty-all-data', 'Faculty/Faculty::faculty_all_data');  


$routes->add('conference-registration','admin/registration');
// $routes->add('Registration','admin/Registration');
$routes->get('registration-data','admin/conference-registration::get_all_users');
$routes->post('registration-add','admin/Registration::con_registration');
$routes->add('edit-registration','admin/Registration::edit_registration');
$routes->post('update-registration','admin/Registration::update_registration'); 
$routes->get('registration-all-data', 'Registration/Registration::registration_all_data');  


$routes->add('Attend','admin/Attend');
$routes->get('attend-data','admin/Attend::get_all_users');
$routes->post('attend-add','admin/Attend::attend');
$routes->post('attend-add-single','admin/Attend::single_attend');

$routes->add('edit-attend','admin/Attend::edit_attend');
$routes->post('update-attend','admin/Attend::update_attend'); 

$routes->add('edit-attendsingle','admin/Attend::edit_attendsingle');
$routes->post('update-attend-single','admin/Attend::update_attendsingle');
$routes->get('attend-all-data', 'Attend/Attend::attend_all_data');  

$routes->add('Certificateupload','admin/Certificateupload');
$routes->get('certificateupload-data','admin/Certificateupload::get_all_users');
$routes->post('certificateupload-add','admin/Certificateupload::certificateupload');
$routes->add('edit-certificate','admin/Certificateupload::edit_certificate'); 
$routes->post('update-certificate','admin/Certificateupload::update_certificate'); 
$routes->get('certificateupload-all-data', 'Certificateupload/Certificateupload::certificateupload_all_data');

//conference list
$routes->add('Conferencelist','admin/Conferencelist');
$routes->get('conferencelist','admin/Conferencelist::conference_list');
$routes->post('conferencelist-add','admin/Conferencelist::get_all_users');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
