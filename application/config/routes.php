<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'service';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/**Frontend Routes */
$route['login'] = 'Service/serviceLoginPage';
$route['register'] = 'Service/serviceRegister';
$route['registration'] = 'Service/procces_regis';
$route['authentication'] = 'Service/serviceLogin';
$route['logout'] = 'Service/serviceLogout';
$route['session'] = 'Service/serviceSession';

$route['profile'] = 'Service/serviceProfile';
$route['sejarah'] = 'Service/serviceHistory';
$route['visi-misi'] = 'Service/serviceVisionMision';
$route['struktur'] = 'Service/serviceStructure';

$route['information'] = 'Service/serviceInformation';
$route['galery'] = 'Service/serviceGalery';
$route['contact'] = 'Service/serviceContact';

//dropdown
$route['parent-income'] = 'Service/serviceParentIncome';
$route['parent-income/add'] = 'Service/addParentIncome';
$route['parent-income/cetak'] = 'Service/printParentIncome';

$route['financial-hardship'] = 'Service/serviceFinancialHardship';
$route['financial-hardship/add'] = 'Service/addFinancialHardship';
$route['financial-hardship/cetak'] = 'Service/printFinancialHardship';

$route['birth-certificate'] = 'Service/serviceBirthCertificate';
$route['birth-certificate/add'] = 'Service/addBirthCertificate';
$route['birth-certificate/cetak'] = 'Service/printBirthCertificate';

$route['death-certificate'] = 'Service/servicedeathCertificate';
$route['death-certificate/add'] = 'Service/addDeathCertificate';
$route['death-certificate/cetak'] = 'Service/printDeathCertificate';

$route['marriage-letter'] = 'Service/serviceMarriageLetter';
$route['marriage-letter/add'] = 'Service/addMarriageLetter';
$route['marriage-letter/cetak'] = 'Service/printMarriageLetter';

$route['police-record-letter'] = 'Service/servicePoliceRecordLetter';
$route['police-record-letter/add'] = 'Service/addPoliceRecordLetter';
$route['police-record-letter/cetak'] = 'Service/printPoliceRecordLetter';

// end Frontend Routes

// Dashboard
$route['dashboard'] = 'admin';

// Profil
$route['profiles'] = 'admin/profiles';
$route['profiles/add'] = 'admin/add_profile';
$route['profiles/(:any)/delete'] = 'admin/delete_profile/$1';
$route['profiles/(:any)/update'] = 'admin/update_profile/$1';

// Informasi
$route['informations'] = 'admin/informations';
$route['informations/add'] = 'admin/add_information';
$route['informations/(:any)/delete'] = 'admin/delete_information/$1';
$route['informations/(:any)/update'] = 'admin/update_information/$1';

// Surat Keterangan Penghasilan Orang Tua
$route['parent_incomes'] = 'admin/parent_incomes';
$route['parent_incomes/add'] = 'admin/add_parent_income';
$route['parent_incomes/(:any)/verification'] = 'admin/verification_parent_income/$1';
$route['parent_incomes/(:any)/delete'] = 'admin/delete_parent_income/$1';
$route['parent_incomes/(:any)/update'] = 'admin/update_parent_income/$1';
$route['parent_incomes/(:any)/print'] = 'admin/print_parent_income/$1';

// Surat Keterangan Tidak Mampu
$route['financial_hardships'] = 'admin/financial_hardships';
$route['financial_hardships/add'] = 'admin/add_financial_hardship';
$route['financial_hardships/(:any)/verification'] = 'admin/verification_financial_hardship/$1';
$route['financial_hardships/(:any)/delete'] = 'admin/delete_financial_hardship/$1';
$route['financial_hardships/(:any)/update'] = 'admin/update_financial_hardship/$1';
$route['financial_hardships/(:any)/print'] = 'admin/print_financial_hardship/$1';

// Surat Keterangan Kematian
$route['death_certificates'] = 'admin/death_certificates';
$route['death_certificates/add'] = 'admin/add_death_certificate';
$route['death_certificates/(:any)/verification'] = 'admin/verification_death_certificate/$1';
$route['death_certificates/(:any)/delete'] = 'admin/delete_death_certificate/$1';
$route['death_certificates/(:any)/update'] = 'admin/update_death_certificate/$1';
$route['death_certificates/(:any)/print'] = 'admin/print_death_certificate/$1';


// Surat Keterangan Kelahiran
$route['birth_announcements'] = 'admin/birth_announcements';
$route['birth_announcements/add'] = 'admin/add_birth_announcement';
$route['birth_announcements/(:any)/verification'] = 'admin/verification_birth_announcement/$1';
$route['birth_announcements/(:any)/delete'] = 'admin/delete_birth_announcement/$1';
$route['birth_announcements/(:any)/update'] = 'admin/update_birth_announcement/$1';
$route['birth_announcements/(:any)/print'] = 'admin/print_birth_announcement/$1';

// Surat Pengantar Nikah
$route['marriage_recommendations'] = 'admin/marriage_recommendations';
$route['marriage_recommendations/add'] = 'admin/add_marriage_recommendation';
$route['marriage_recommendations/(:any)/verification'] = 'admin/verification_marriage_recommendation/$1';
$route['marriage_recommendations/(:any)/delete'] = 'admin/delete_marriage_recommendation/$1';
$route['marriage_recommendations/(:any)/update'] = 'admin/update_marriage_recommendation/$1';
$route['marriage_recommendations/(:any)/print'] = 'admin/print_marriage_recommendation/$1';


// Surat Pengantar Keterangan Catatan Kepolisian
$route['police_reports'] = 'admin/police_reports';
$route['police_reports/add'] = 'admin/add_police_report';
$route['police_reports/(:any)/verification'] = 'admin/verification_police_report/$1';
$route['police_reports/(:any)/delete'] = 'admin/delete_police_report/$1';
$route['police_reports/(:any)/update'] = 'admin/update_police_report/$1';
$route['police_reports/(:any)/print'] = 'admin/print_police_report/$1';


// Galeri
$route['galleries'] = 'admin/galleries';
$route['galleries/add'] = 'admin/add_gallery';
$route['galleries/(:any)/delete'] = 'admin/delete_gallery/$1';
$route['galleries/(:any)/update'] = 'admin/update_gallery/$1';

// Kontak
$route['contacts'] = 'admin/contacts';
$route['contacts/add'] = 'admin/add_contact';
$route['contacts/(:any)/delete'] = 'admin/delete_contact/$1';
$route['contacts/(:any)/update'] = 'admin/update_contact/$1';

// User
$route['users'] = 'admin/users';
$route['users/add'] = 'admin/add_user';
$route['users/(:any)/delete'] = 'admin/delete_user/$1';
$route['users/(:any)/update'] = 'admin/update_user/$1';
$route['users/(:any)/reset_password'] = 'admin/update_user/$1/reset';
