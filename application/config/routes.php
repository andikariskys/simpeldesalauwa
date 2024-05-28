<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'service';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/**Frontend Routes */
$route['authentication']    = 'Service/serviceLogin';
$route['logout']            = 'Service/serviceLogout';
$route['session']           = 'Service/serviceSession';

$route['profile']           = 'Service/serviceProfile';
$route['information']       = 'Service/serviceInformation';
$route['galery']            = 'Service/serviceGalery';
$route['contact']           = 'Service/serviceContact';

//dropdown
$route['parent-income']             = 'Service/serviceParentIncome';
$route['parent-income/add']         = 'Service/addParentIncome';

$route['financial-hardship']        = 'Service/serviceFinancialHardship';
$route['financial-hardship/add']    = 'Service/addFinancialHardship';

$route['birth-certificate']         = 'Service/serviceBirthCertificate';
$route['birth-certificate/add']     = 'Service/addBirthCertificate';

$route['death-certificate']         = 'Service/servicedeathCertificate';
$route['death-certificate/add']     = 'Service/addDeathCertificate';

$route['marriage-letter']           = 'Service/serviceMarriageLetter';
$route['marriage-letter/add']       = 'Service/addMarriageLetter';

$route['police-record-letter']      = 'Service/servicePoliceRecordLetter';
$route['police-record-letter/add']  = 'Service/addPoliceRecordLetter';

// end Frontend Routes

// dashboard
$route['dashboard']         = 'admin';

// profiles
$route['profiles']                  = 'admin/profiles';
$route['profiles/add']              = 'admin/add_profile';
$route['profiles/(:any)/delete']    = 'admin/delete_profile/$1';
$route['profiles/(:any)/update']    = 'admin/update_profile/$1';

// informations
$route['informations']                  = 'admin/informations';
$route['informations/add']              = 'admin/add_information';
$route['informations/(:any)/delete']    = 'admin/delete_information/$1';
$route['informations/(:any)/update']    = 'admin/update_information/$1';

// Surat Keterangan Penghasilan Orang Tua
$route['parent_incomes']                        = 'admin/parent_incomes';
$route['parent_incomes/add']                    = 'admin/add_parent_income';
$route['parent_incomes/(:any)/verification']    = 'admin/verification_parent_income/$1';
$route['parent_incomes/(:any)/delete']          = 'admin/delete_parent_income/$1';
$route['parent_incomes/(:any)/update']          = 'admin/update_parent_income/$1';

// Surat Keterangan Tidak Mampu
$route['financial_hardships']                        = 'admin/financial_hardships';
$route['financial_hardships/add']                    = 'admin/add_financial_hardship';
$route['financial_hardships/(:any)/verification']    = 'admin/verification_financial_hardship/$1';
$route['financial_hardships/(:any)/delete']          = 'admin/delete_financial_hardship/$1';
$route['financial_hardships/(:any)/update']          = 'admin/update_financial_hardship/$1';

// Surat Keterangan Kematian
$route['death_certificates']                        = 'admin/death_certificates';
$route['death_certificates/add']                    = 'admin/add_death_certificate';
$route['death_certificates/(:any)/verification']    = 'admin/verification_death_certificate/$1';
$route['death_certificates/(:any)/delete']          = 'admin/delete_death_certificate/$1';
$route['death_certificates/(:any)/update']          = 'admin/update_death_certificate/$1';

// Surat Keterangan Kelahiran
$route['birth_announcements']                        = 'admin/birth_announcements';
$route['birth_announcements/add']                    = 'admin/add_birth_announcement';
$route['birth_announcements/(:any)/verification']    = 'admin/verification_birth_announcement/$1';
$route['birth_announcements/(:any)/delete']          = 'admin/delete_birth_announcement/$1';
$route['birth_announcements/(:any)/update']          = 'admin/update_birth_announcement/$1';

// Surat Pengantar Nikah
$route['marriage_recommendations']                        = 'admin/marriage_recommendations';
$route['marriage_recommendations/add']                    = 'admin/add_marriage_recommendation';
$route['marriage_recommendations/(:any)/verification']    = 'admin/verification_marriage_recommendation/$1';
$route['marriage_recommendations/(:any)/delete']          = 'admin/delete_marriage_recommendation/$1';
$route['marriage_recommendations/(:any)/update']          = 'admin/update_marriage_recommendation/$1';
