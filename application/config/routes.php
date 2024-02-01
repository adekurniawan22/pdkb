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
$route['404_override'] = 'custom404';
$route['translate_uri_dashes'] = TRUE;

// Route Login
$route['default_controller'] = 'auth/login';
$route['proses-login'] = 'auth/proses_login';

// Route Dashboard
$route['dashboard'] = 'dashboard/index';

// Route Personil
$route['personil'] = 'personil/index';
$route['personil/tambah-personil'] = 'personil/tambah_personil';
$route['personil/proses-tambah-personil'] = 'personil/proses_tambah_personil';
$route['personil/edit-personil'] = 'personil/edit_personil';
$route['personil/proses-edit-personil'] = 'personil/proses_edit_personil';
$route['personil/lihat-sertifikat'] = 'personil/get_sertifikat';

// Route SPKI
$route['spki'] = 'spki/index';
$route['spki/tambah-spki'] = 'spki/tambah_spki';
$route['spki/proses-tambah-spki'] = 'spki/proses_tambah_spki';
$route['spki/edit-spki'] = 'spki/edit_spki';
$route['spki/proses-edit-spki'] = 'spki/proses_edit_spki';
$route['spki/pdf'] = 'spki/cetak_spki';

// Route laporan_pekerjaan
$route['laporan-pekerjaan'] = 'laporan_pekerjaan/index';
$route['laporan-pekerjaan/tambah-laporan-pekerjaan'] = 'laporan_pekerjaan/tambah_laporan_pekerjaan';
$route['laporan-pekerjaan/proses-tambah-laporan-pekerjaan'] = 'laporan_pekerjaan/proses_tambah_laporan_pekerjaan';
$route['laporan-pekerjaan/edit-laporan-pekerjaan'] = 'laporan_pekerjaan/edit_laporan_pekerjaan';
$route['laporan-pekerjaan/proses-edit-laporan-pekerjaan'] = 'laporan_pekerjaan/proses_edit_laporan_pekerjaan';
$route['laporan-pekerjaan/pdf'] = 'laporan_pekerjaan/cetak_laporan_pekerjaan';

// Route Warehouse Alat Kerja
$route['alat-kerja'] = 'alat_kerja/index';
$route['alat-kerja/tambah-alat-kerja'] = 'alat_kerja/tambah_alat_kerja';
$route['alat-kerja/proses-tambah-alat-kerja'] = 'alat_kerja/proses_tambah_alat_kerja';
$route['alat-kerja/edit-alat-kerja'] = 'alat_kerja/edit_alat_kerja';
$route['alat-kerja/proses-edit-alat-kerja'] = 'alat_kerja/proses_edit_alat_kerja';

// Route Warehouse Alat Kerja
$route['atasan/histori-alat-kerja'] = 'histori_alat/atasan';
$route['histori-alat-kerja'] = 'histori_alat/index';
$route['histori-alat-kerja/tambah-histori-alat-kerja'] = 'histori_alat/tambah_histori_alat_kerja';
$route['histori-alat-kerja/proses-tambah-histori-alat-kerja'] = 'histori_alat/proses_tambah_histori_alat_kerja';
$route['histori-alat-kerja/pdf'] = 'histori_alat/cetak_histori_alat_kerja';

// Route Profil
$route['profil'] = 'profil/index';
$route['profil/proses-edit-profil'] = 'profil/proses_edit_profil';
$route['profil/proses-edit-password'] = 'profil/proses_edit_password';
